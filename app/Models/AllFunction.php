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
            return asset('temp/')."/".$filename;  // return url path
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
            return asset('temp/')."/".$filename;  // return url path
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
            return asset('temp/')."/".$filename;  // return url path
        }
        catch(\Exception $e)
        {
            return "";
        }
    }

}