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

    public static function debug_to_console($data) {
        if(is_array($data) || is_object($data))
        {
            echo("<script>console.log('PHP: ".json_encode($data)."');</script>");
        } else {
            echo("<script>console.log('PHP: ".$data."');</script>");
        }
    }

}