<?php namespace App\Models;

use DB;
use Intervention\Image\Facades\Image;

class AllFunction {

    public static function getDateTimeThai($datetime_string)
    {
        $datetime = DB::select(DB::raw("
            select tb.date || ' ' || tb.month || ' ' || tb.year || ' ' || tb.time as datetime
            from
            (
               select to_char(timestamp '".$datetime_string."' + interval '543 year', 'DD') as date,
               case to_char(timestamp '".$datetime_string."' + interval '543 year', 'MM')
                  when '01' then 'ม.ค.'
                  when '02' then 'ก.พ.'
                  when '03' then 'มี.ค.'
                  when '04' then 'เม.ย.'
                  when '05' then 'พ.ค.'
                  when '06' then 'มิ.ย.'
                  when '07' then 'ก.ค.'
                  when '08' then 'ส.ค.'
                  when '09' then 'ก.ย.'
                  when '10' then 'ต.ค.'
                  when '11' then 'พ.ย.'
                  when '12' then 'ธ.ค.'
               end as month,
               to_char(timestamp '".$datetime_string."' + interval '543 year', 'YYYY') as year,
               to_char(timestamp '".$datetime_string."' + interval '543 year', 'HH24:MI:SS') as time
            ) as tb
        "));

        return $datetime[0]->datetime;
    }

    public static function getDateThai($date_string)
    {
        $datetime = DB::select(DB::raw("
            select tb.date || ' ' || tb.month || ' ' || tb.year as date
            from
            (
               select to_char(to_date('".$date_string."', 'YYYY-MM-DD'), 'DD') as date,
               case to_char(to_date('".$date_string."', 'YYYY-MM-DD'), 'MM')
                  when '01' then 'ม.ค.'
                  when '02' then 'ก.พ.'
                  when '03' then 'มี.ค.'
                  when '04' then 'เม.ย.'
                  when '05' then 'พ.ค.'
                  when '06' then 'มิ.ย.'
                  when '07' then 'ก.ค.'
                  when '08' then 'ส.ค.'
                  when '09' then 'ก.ย.'
                  when '10' then 'ต.ค.'
                  when '11' then 'พ.ย.'
                  when '12' then 'ธ.ค.'
               end as month,
               to_char(to_date('".$date_string."', 'YYYY-MM-DD'), 'YYYY') as year
            ) as tb
        "));

        return $datetime[0]->date;
    }

    public static function getMoneyWithoutDecimal($money)
    {
        if($money == null || $money == "")
            return "-";

        $datetime = DB::select(DB::raw("
            select to_char(".$money.", '999,999,999,999,999') as money
        "));

        return $datetime[0]->money;
    }

    public static function getProjectCatHomeDistinct($category)
    {
        $result = DB::select(DB::raw("
            select pj.id as project_id,
            (
                 select ct.id
                 from cat_home ct
                 where ct.project_id = pj.id
                 and ct.status = 1
                 and ct.category = '".$category."'
                 order by updated_at desc
                 LIMIT 1
            ) as cat_home_id
            from
            (
                 select distinct pj.id
                 from project pj
                 inner join cat_home ct on pj.id = ct.project_id
                 where ct.status = 1
                 and ct.category = '".$category."'
            ) as pj
        "));

        return $result;
    }

    public static function convertYoutube($string) {
        $iframe = preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "<iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
            $string
        );

        if(strrpos($iframe, "iframe") === false)
            return "";
        else
            return $iframe;
    }

    ///// #### สร้าง Thumbnail #### //////
    public static function createThumbnailAutoHeight($url, $width, $folder = 'thumbnail')
    {
        try{
            $filename = sha1(date('YmdHisu').rand(0, 99).rand(0, 99)).".png";

            $logo = Image::make($url)->resize($width, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $logo->save(__DIR__."/../../public/".$folder."/".$filename);
            return asset('/').$folder."/".$filename;  // return url path
        }
        catch(\Exception $e)
        {
            return "";
        }
    }

    public static function createThumbnailAutoWidth($url, $height, $folder = 'thumbnail')
    {
        try{
            $filename = sha1(date('YmdHisu').rand(0, 99).rand(0, 99)).".png";

            $logo = Image::make($url)->resize(null, $height, function ($constraint) {
                $constraint->aspectRatio();
            });

            $logo->save(__DIR__."/../../public/".$folder."/".$filename);
            return asset('/').$folder."/".$filename;  // return url path
        }
        catch(\Exception $e)
        {
            return "";
        }
    }

    public static function createThumbnailFix($url, $width, $height, $folder = 'thumbnail')
    {
        try{
            $filename = sha1(date('YmdHisu').rand(0, 99).rand(0, 99)).".png";

            $logo = Image::make($url);

            $h = $logo->height();
            $w = $logo->width();

            if($h > $w)
            {
                $logo->resize(null, $height, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            else
            {
                $logo->resize($width, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }

            $logo->save(__DIR__."/../../public/".$folder."/".$filename);
            return asset('/').$folder."/".$filename;  // return url path
        }
        catch(\Exception $e)
        {
            return "";
        }
    }

    public static function getTitleCatHomePic($for_type)
    {
        $ret = "";
        switch($for_type)
        {
            case "3":
                $ret = "การเดินทางเข้าโครงการ";
                break;
            case "4":
                $ret = "ภาพรวมรอบโครงการ";
                break;
            case "5":
                $ret = "ตลาดสด";
                break;
            case "6":
                $ret = "ห้างสรรพสินค้า";
                break;
            case "7":
                $ret = "ถนนทางเข้าโครงการ";
                break;
            case "8":
                $ret = "ระยะทางจากทางด่วน";
                break;
            case "9":
                $ret = "ระยะทางจาก BTS";
                break;
            case "10":
                $ret = "ระยะทางจาก MRT";
                break;
            case "11":
                $ret = "ทางเข้าโครงการ";
                break;
            case "12":
                $ret = "สวนสาธารณะ";
                break;
            case "13":
                $ret = "สระว่ายน้ำ";
                break;
            case "14":
                $ret = "ฟิตเนส";
                break;
            case "15":
                $ret = "ซาวน่า";
                break;
            case "16":
                $ret = "สตรีม";
                break;
            case "17":
                $ret = "ลิฟต์";
                break;
            case "18":
                $ret = "อื่นๆ";
                break;
            case "19":
                $ret = "ผังโครงการ";
                break;
            case "20":
                $ret = "Plan บ้าน";
                break;
            case "21":
                $ret = "หน้าบ้าน";
                break;
            case "22":
                $ret = "ห้องนั่งเล่น";
                break;
            case "23":
                $ret = "ห้องนอน 1";
                break;
            case "24":
                $ret = "ห้องนอน 2";
                break;
            case "25":
                $ret = "ห้องนอน 3";
                break;
            case "26":
                $ret = "ห้องนอน 4";
                break;
            case "27":
                $ret = "ห้องอเนกประสงค์";
                break;
            case "28":
                $ret = "ห้องครัว";
                break;
            case "29":
                $ret = "ห้องน้ำ";
                break;
            case "30":
                $ret = "ห้องอื่นๆ";
                break;
            case "31":
                $ret = "รอบรั้วตัวบ้าน";
                break;
            case "32":
                $ret = "Plan บ้าน";
                break;
            case "33":
                $ret = "หน้าบ้าน";
                break;
            case "34":
                $ret = "ห้องนั่งเล่น";
                break;
            case "35":
                $ret = "ห้องนอน 1";
                break;
            case "36":
                $ret = "ห้องนอน 2";
                break;
            case "37":
                $ret = "ห้องนอน 3";
                break;
            case "38":
                $ret = "ห้องนอน 4";
                break;
            case "39":
                $ret = "ห้องอเนกประสงค์";
                break;
            case "40":
                $ret = "ห้องครัว";
                break;
            case "41":
                $ret = "ห้องน้ำ";
                break;
            case "42":
                $ret = "ห้องอื่นๆ";
                break;
            case "43":
                $ret = "รอบรั้วตัวบ้าน";
                break;
        }
        return $ret;
    }

    public static function getShopForType($for_type)
    {
        $ret = "";
        switch($for_type)
        {
            case "1":
                $ret = "รับสร้างบ้าน";
                break;
            case "2":
                $ret = "ค้นหาช่างซ่อม/ต่อเติม";
                break;
            case "3":
                $ret = "ผู้รับเหมาก่อสร้าง";
                break;
            case "4":
                $ret = "ร้านค้าต่างๆ";
                break;
            case "5":
                $ret = "บริการจัดสวน";
                break;
            case "6":
                $ret = "บริการทำความสะอาด";
                break;
            case "7":
                $ret = "ออกแบบภายใน/ภายนอก";
                break;
            case "8":
                $ret = "ที่ดิน";
                break;
            case "9":
                $ret = "ที่อยู่อาศัยมือสอง";
                break;
            case "10":
                $ret = "ปล่อยเช่า";
                break;
            case "11":
                $ret = "อพาร์ทเม้นท์";
                break;
        }
        return $ret;
    }

    public static function getArticleForType($for_type)
    {
        $ret = "";
        switch($for_type)
        {
            case "1":
                $ret = "หน้าแรก";
                break;
            case "2":
                $ret = "โครงการบ้านใหม่";
                break;
            case "3":
                $ret = "โครงการทาวน์โฮมใหม่";
                break;
            case "4":
                $ret = "โครงการคอนโดใหม่";
                break;
            case "5":
                $ret = "รับสร้างบ้าน";
                break;
            case "6":
                $ret = "ค้นหาช่างซ่อม/ต่อเติม";
                break;
            case "7":
                $ret = "ผู้รับเหมาก่อสร้าง";
                break;
            case "8":
                $ret = "ร้านค้าต่างๆ";
                break;
            case "9":
                $ret = "บริการจัดสวน";
                break;
            case "10":
                $ret = "บริการทำความสะอาด";
                break;
            case "11":
                $ret = "ออกแบบภายใน/ภายนอก";
                break;
            case "12":
                $ret = "ที่ดิน";
                break;
            case "13":
                $ret = "ที่อยู่อาศัยมือสอง";
                break;
            case "14":
                $ret = "ปล่อยเช่า";
                break;
            case "15":
                $ret = "อพาร์ทเม้นท์";
                break;
            case "16":
                $ret = "บทความ/ไอเดีย";
                break;
        }
        return $ret;
    }

    public static function debug_to_console($data) {
        if(is_array($data) || is_object($data))
        {
            echo("<script>console.log('PHP: ".json_encode($data)."');</script>");
        } else {
            echo("<script>console.log('PHP: ".$data."');</script>");
        }
    }

    public static function getBannerDForMenu($for_menu)
    {
        $ret = "";
        switch($for_menu)
        {
            case "1":
                $ret = "หน้าแรก";
                break;
            case "2":
                $ret = "โครงการบ้านใหม่";
                break;
            case "3":
                $ret = "รับสร้างบ้าน / ช่างซ่อม";
                break;
            case "4":
                $ret = "ร้านค้าและบริการ";
                break;
            case "5":
                $ret = "ซื้อ / ขาย / เช่า";
                break;
            case "6":
                $ret = "บทความ / ไอเดีย";
                break;
        }
        return $ret;
    }

    public static function encodeURIComponent($string) {
        $result = "";
        for ($i = 0; $i < strlen($string); $i++) {
            $result .= \App\Models\AllFunction::encodeURIComponentbycharacter(urlencode($string[$i]));
        }
        return $result;
    }


    public static function encodeURIComponentbycharacter($char) {
        if ($char == "+") { return "%20"; }
        if ($char == "%21") { return "!"; }
        if ($char == "%27") { return '"'; }
        if ($char == "%28") { return "("; }
        if ($char == "%29") { return ")"; }
        if ($char == "%2A") { return "*"; }
        if ($char == "%7E") { return "~"; }
        if ($char == "%80") { return "%E2%82%AC"; }
        if ($char == "%81") { return "%C2%81"; }
        if ($char == "%82") { return "%E2%80%9A"; }
        if ($char == "%83") { return "%C6%92"; }
        if ($char == "%84") { return "%E2%80%9E"; }
        if ($char == "%85") { return "%E2%80%A6"; }
        if ($char == "%86") { return "%E2%80%A0"; }
        if ($char == "%87") { return "%E2%80%A1"; }
        if ($char == "%88") { return "%CB%86"; }
        if ($char == "%89") { return "%E2%80%B0"; }
        if ($char == "%8A") { return "%C5%A0"; }
        if ($char == "%8B") { return "%E2%80%B9"; }
        if ($char == "%8C") { return "%C5%92"; }
        if ($char == "%8D") { return "%C2%8D"; }
        if ($char == "%8E") { return "%C5%BD"; }
        if ($char == "%8F") { return "%C2%8F"; }
        if ($char == "%90") { return "%C2%90"; }
        if ($char == "%91") { return "%E2%80%98"; }
        if ($char == "%92") { return "%E2%80%99"; }
        if ($char == "%93") { return "%E2%80%9C"; }
        if ($char == "%94") { return "%E2%80%9D"; }
        if ($char == "%95") { return "%E2%80%A2"; }
        if ($char == "%96") { return "%E2%80%93"; }
        if ($char == "%97") { return "%E2%80%94"; }
        if ($char == "%98") { return "%CB%9C"; }
        if ($char == "%99") { return "%E2%84%A2"; }
        if ($char == "%9A") { return "%C5%A1"; }
        if ($char == "%9B") { return "%E2%80%BA"; }
        if ($char == "%9C") { return "%C5%93"; }
        if ($char == "%9D") { return "%C2%9D"; }
        if ($char == "%9E") { return "%C5%BE"; }
        if ($char == "%9F") { return "%C5%B8"; }
        if ($char == "%A0") { return "%C2%A0"; }
        if ($char == "%A1") { return "%C2%A1"; }
        if ($char == "%A2") { return "%C2%A2"; }
        if ($char == "%A3") { return "%C2%A3"; }
        if ($char == "%A4") { return "%C2%A4"; }
        if ($char == "%A5") { return "%C2%A5"; }
        if ($char == "%A6") { return "%C2%A6"; }
        if ($char == "%A7") { return "%C2%A7"; }
        if ($char == "%A8") { return "%C2%A8"; }
        if ($char == "%A9") { return "%C2%A9"; }
        if ($char == "%AA") { return "%C2%AA"; }
        if ($char == "%AB") { return "%C2%AB"; }
        if ($char == "%AC") { return "%C2%AC"; }
        if ($char == "%AD") { return "%C2%AD"; }
        if ($char == "%AE") { return "%C2%AE"; }
        if ($char == "%AF") { return "%C2%AF"; }
        if ($char == "%B0") { return "%C2%B0"; }
        if ($char == "%B1") { return "%C2%B1"; }
        if ($char == "%B2") { return "%C2%B2"; }
        if ($char == "%B3") { return "%C2%B3"; }
        if ($char == "%B4") { return "%C2%B4"; }
        if ($char == "%B5") { return "%C2%B5"; }
        if ($char == "%B6") { return "%C2%B6"; }
        if ($char == "%B7") { return "%C2%B7"; }
        if ($char == "%B8") { return "%C2%B8"; }
        if ($char == "%B9") { return "%C2%B9"; }
        if ($char == "%BA") { return "%C2%BA"; }
        if ($char == "%BB") { return "%C2%BB"; }
        if ($char == "%BC") { return "%C2%BC"; }
        if ($char == "%BD") { return "%C2%BD"; }
        if ($char == "%BE") { return "%C2%BE"; }
        if ($char == "%BF") { return "%C2%BF"; }
        if ($char == "%C0") { return "%C3%80"; }
        if ($char == "%C1") { return "%C3%81"; }
        if ($char == "%C2") { return "%C3%82"; }
        if ($char == "%C3") { return "%C3%83"; }
        if ($char == "%C4") { return "%C3%84"; }
        if ($char == "%C5") { return "%C3%85"; }
        if ($char == "%C6") { return "%C3%86"; }
        if ($char == "%C7") { return "%C3%87"; }
        if ($char == "%C8") { return "%C3%88"; }
        if ($char == "%C9") { return "%C3%89"; }
        if ($char == "%CA") { return "%C3%8A"; }
        if ($char == "%CB") { return "%C3%8B"; }
        if ($char == "%CC") { return "%C3%8C"; }
        if ($char == "%CD") { return "%C3%8D"; }
        if ($char == "%CE") { return "%C3%8E"; }
        if ($char == "%CF") { return "%C3%8F"; }
        if ($char == "%D0") { return "%C3%90"; }
        if ($char == "%D1") { return "%C3%91"; }
        if ($char == "%D2") { return "%C3%92"; }
        if ($char == "%D3") { return "%C3%93"; }
        if ($char == "%D4") { return "%C3%94"; }
        if ($char == "%D5") { return "%C3%95"; }
        if ($char == "%D6") { return "%C3%96"; }
        if ($char == "%D7") { return "%C3%97"; }
        if ($char == "%D8") { return "%C3%98"; }
        if ($char == "%D9") { return "%C3%99"; }
        if ($char == "%DA") { return "%C3%9A"; }
        if ($char == "%DB") { return "%C3%9B"; }
        if ($char == "%DC") { return "%C3%9C"; }
        if ($char == "%DD") { return "%C3%9D"; }
        if ($char == "%DE") { return "%C3%9E"; }
        if ($char == "%DF") { return "%C3%9F"; }
        if ($char == "%E0") { return "%C3%A0"; }
        if ($char == "%E1") { return "%C3%A1"; }
        if ($char == "%E2") { return "%C3%A2"; }
        if ($char == "%E3") { return "%C3%A3"; }
        if ($char == "%E4") { return "%C3%A4"; }
        if ($char == "%E5") { return "%C3%A5"; }
        if ($char == "%E6") { return "%C3%A6"; }
        if ($char == "%E7") { return "%C3%A7"; }
        if ($char == "%E8") { return "%C3%A8"; }
        if ($char == "%E9") { return "%C3%A9"; }
        if ($char == "%EA") { return "%C3%AA"; }
        if ($char == "%EB") { return "%C3%AB"; }
        if ($char == "%EC") { return "%C3%AC"; }
        if ($char == "%ED") { return "%C3%AD"; }
        if ($char == "%EE") { return "%C3%AE"; }
        if ($char == "%EF") { return "%C3%AF"; }
        if ($char == "%F0") { return "%C3%B0"; }
        if ($char == "%F1") { return "%C3%B1"; }
        if ($char == "%F2") { return "%C3%B2"; }
        if ($char == "%F3") { return "%C3%B3"; }
        if ($char == "%F4") { return "%C3%B4"; }
        if ($char == "%F5") { return "%C3%B5"; }
        if ($char == "%F6") { return "%C3%B6"; }
        if ($char == "%F7") { return "%C3%B7"; }
        if ($char == "%F8") { return "%C3%B8"; }
        if ($char == "%F9") { return "%C3%B9"; }
        if ($char == "%FA") { return "%C3%BA"; }
        if ($char == "%FB") { return "%C3%BB"; }
        if ($char == "%FC") { return "%C3%BC"; }
        if ($char == "%FD") { return "%C3%BD"; }
        if ($char == "%FE") { return "%C3%BE"; }
        if ($char == "%FF") { return "%C3%BF"; }
        return $char;
    }

}