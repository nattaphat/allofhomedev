@extends('layouts.main')

@section('slider')
    @include('layouts._partials.topslide')
@stop

@section('jshome')
    <!-- Starrr -->
    <link rel="stylesheet" type="text/css" media="screen" href={{ asset('js/lib/bootstrap-star-rating/css/star-rating.min.css') }}>

    <style type="text/css">
        .rating-xs {
            font-size: 14px;
        }
    </style>

    <script type="text/javascript">
        var centreGot = true;
    </script>
    {!! $map['js'] !!}
@stop

@section('jsbody')
    <!-- Starrr -->
    <script type="text/javascript" src={{ asset('js/lib/bootstrap-star-rating/js/star-rating.min.js') }}></script>
@stop

@section('content')

    <div class="container-fluid">

        <div class="row" style="margin-top: 30px;">
            {{--#### Banner ####--}}
            <div class="col-md-3" style="margin-top: 30px;">
                <div>
                    <a href="#">
                        <img src="{{ asset('img/ad_300x250.png') }}"
                             alt="Banner 2" class="img-responsive img-center" style="height: 208px; width: 250px;" />
                    </a>
                </div>
                <div style="padding-top: 20px;">
                    <a href="#">
                        <img src="{{ asset('img/ad_300x250.png') }}"
                             alt="Banner 2" class="img-responsive img-center" style="height: 208px; width: 250px;" />
                    </a>
                </div>
                <div style="padding-top: 20px;">
                    <a href="#">
                        <img src="{{ asset('img/ad_300x250.png') }}"
                             alt="Banner 2" class="img-responsive img-center" style="height: 208px; width: 250px;" />
                    </a>
                </div>
                <div style="padding-top: 20px;">
                    <a href="#">
                        <img src="{{ asset('img/ad_300x250.png') }}"
                             alt="Banner 2" class="img-responsive img-center" style="height: 208px; width: 250px;" />
                    </a>
                </div>
            </div>{{--#### Banner ####--}}

            {{--#### Content ####--}}
            <div class="col-md-9">
                {{--#### Google Map + Table Specification ####--}}
                <div class="row" style="margin-top:20px;">
                    <div class="panel panel-success">
                        <div class="panel-body">

                            @if($pic != null && count($pic) > 0)
                                <!-- Pictures -->
                                @include('layouts._partials.slidePictureCategory')
                            @endif

                            Google Map:
                            {!! $map['html'] !!}
                            <a href="{{ $catHome->map_url }}" target="_blank" class="pull-right">แสดงแผนที่</a>
                            <p class="lead" style="text-indent: 30px; padding-top: 10px;">
                                {!! str_replace("\n","<br>", $catHome->subtitle) !!}</p>
                            <!-- ### Table ### -->
                            <div class="blog-media" style="margin: 30px 0px 10px 0px; border-top: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6;">
                                <table class="table table-striped table-responsive" style="margin-bottom: 0px;">
                                    <thead>
                                    <tr style="
                                                        vertical-align: middle;
                                                        padding-top: 15px !important;
                                                        padding-bottom: 10px !important;
                                                        font-size: 18px !important;
                                                        height: 40px;">
                                        <td class="col-md-3 text-center" style="border-right: 1px solid #dddddd;">คุณสมบัติ</td>
                                        <td class="text-center">รายละเอียด</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-right" style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 0px;">
                                            ชื่อโครงการ</td>
                                        <td style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 20px;">
                                            {{ $catHome->project_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 0px;">
                                            บริษัทเจ้าของโครงการ</td>
                                        <td style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 20px;">
                                            {{ $catHome->project_owner }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 0px;">
                                            ที่ตั้งโครงการ</td>
                                        <td style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 20px;">
                                            {{ $catHome->getFullPrjAddress($catHome->id) }}
                                        </td>
                                    </tr>
                                    @if($catHome->subarea_id != null && $catHome->subarea_id != "")
                                        <tr>
                                            <td class="text-right" style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 0px;">
                                                ทำเล/ย่าน</td>
                                            <td style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 20px;">
                                                {{ \App\Models\SubArea::find($catHome->subarea_id)->subarea_name  }}
                                            </td>
                                        </tr>
                                    @endif
                                    @if(($catHome->area_1 != null && $catHome->area_1 != "") ||
                                        ($catHome->area_2 != null && $catHome->area_2 != "") ||
                                        ($catHome->area_3 != null && $catHome->area_3 != ""))
                                        <tr>
                                            <td class="text-right" style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 0px;">
                                                พื้นที่โครงการ</td>
                                            <td style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 20px;">
                                                @if($catHome->area_1 != "" && $catHome->area_2 != "" && $catHome->area_3 != "")
                                                    {{ $catHome->area_1 }} - {{ $catHome->area_2 }} - {{ $catHome->area_3 }} ไร่
                                                @else
                                                    @if($catHome->area_1 != "")
                                                        {{ $catHome->area_1 }} ไร่ &nbsp;
                                                    @endif
                                                    @if($catHome->area_2 != "")
                                                        {{ $catHome->area_2 }} งาน &nbsp;
                                                    @endif
                                                    @if($catHome->area_3 != "")
                                                        {{ $catHome->area_3 }} วา &nbsp;
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                    @if($catHome->num_building != null && $catHome->num_building != "")
                                        <tr>
                                            <td class="text-right" style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 0px;">
                                                จำนวนอาคาร</td>
                                            <td style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 20px;">
                                                {{ $catHome->num_building }} อาคาร
                                            </td>
                                        </tr>
                                    @endif
                                    @if($catHome->num_unit != null && $catHome->num_unit != "")
                                        <tr>
                                            <td class="text-right" style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 0px;">
                                                จำนวนยูนิต</td>
                                            <td style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 20px;">
                                                {{ $catHome->num_unit }} ยูนิต
                                            </td>
                                        </tr>
                                    @endif
                                    @if($catHome->num_elev_person != null && $catHome->num_elev_person != "")
                                        <tr>
                                            <td class="text-right" style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 0px;">
                                                จำนวนลิฟต์โดยสาร</td>
                                            <td style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 20px;">
                                                {{ $catHome->num_elev_person }} ตัว
                                            </td>
                                        </tr>
                                    @endif
                                    @if($catHome->num_elev_object != null && $catHome->num_elev_object != "")
                                        <tr>
                                            <td class="text-right" style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 0px;">
                                                จำนวนลิฟต์ขนส่ง</td>
                                            <td style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 20px;">
                                                {{ $catHome->num_elev_object }} ตัว
                                            </td>
                                        </tr>
                                    @endif
                                    @if($catHome->ratio_elev != null && $catHome->ratio_elev != "")
                                        <tr>
                                            <td class="text-right" style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 0px;">
                                                อัตราส่วนลิฟต์ : ยูนิตพักอาศัย</td>
                                            <td style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 20px;">
                                                {{ $catHome->ratio_elev }}
                                            </td>
                                        </tr>
                                    @endif
                                    @if($catHome->num_parking != null && $catHome->num_parking != "")
                                        <tr>
                                            <td class="text-right" style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 0px;">
                                                จำนวนที่จอดรถ</td>
                                            <td style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 20px;">
                                                {{ $catHome->num_parking }} คัน
                                            </td>
                                        </tr>
                                    @endif
                                    @if($catHome->percent_parking != null && $catHome->percent_parking != "")
                                        <tr>
                                            <td class="text-right" style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 0px;">
                                                เปอร์เซ็นที่จอดรถ</td>
                                            <td style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 20px;">
                                                {{ $catHome->percent_parking }} เปอร์เซ็น
                                            </td>
                                        </tr>
                                    @endif
                                    @if($catHome->home_type_per_area != null && $catHome->home_type_per_area != "")
                                        <tr>
                                            <td class="text-right" style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 0px;">
                                                รูปแบบบ้าน : พื้นที่เริ่มต้น</td>
                                            <td style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 20px;">
                                                {!! str_replace("\n","<br>", $catHome->home_type_per_area) !!}
                                            </td>
                                        </tr>
                                    @endif
                                    @if($catHome->home_area != null && $catHome->home_area != "")
                                        <tr>
                                            <td class="text-right" style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 0px;">
                                                พื้นที่บ้านเริ่มต้น</td>
                                            <td style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 20px;">
                                                {!! str_replace("\n","<br>", $catHome->home_area) !!}
                                            </td>
                                        </tr>
                                    @endif
                                    @if($catHome->home_material != null && $catHome->home_material != "")
                                        <tr>
                                            <td class="text-right" style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 0px;">
                                                การก่อสร้างตัวบ้าน</td>
                                            <td style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 20px;">
                                                {!! str_replace("\n","<br>", $catHome->home_material) !!}
                                            </td>
                                        </tr>
                                    @endif
                                    @if($catHome->home_style != null && $catHome->home_style != "")
                                        <tr>
                                            <td class="text-right" style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 0px;">
                                                สไตล์การออกแบบ</td>
                                            <td style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 20px;">
                                                {!! str_replace("\n","<br>", $catHome->home_style) !!}
                                            </td>
                                        </tr>
                                    @endif
                                    @if($catHome->eia != null && $catHome->eia != "")
                                        <tr>
                                            <td class="text-right" style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 0px;">
                                                โครงการผ่าน EIA</td>
                                            <td style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 20px;">
                                                @if($catHome->eia == null) - @elseif($catHome->eia == true) ผ่าน @else ไม่ผ่าน @endif
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td class="text-right" style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 0px;">
                                            ช่วงราคาขาย</td>
                                        <td style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 20px;">
                                            {{ $catHome->sell_price_from }} &nbsp;
                                            ถึง &nbsp; {{ $catHome->sell_price_to }} &nbsp;&nbsp;&nbsp;บาท
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 0px;">
                                            เริ่มก่อสร้าง</td>
                                        <td style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 20px;">
                                            {{ \App\Models\AllFunction::getDateThai($catHome->construct_date) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 0px;">
                                            คาดว่าแล้วเสร็จ</td>
                                        <td style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 20px;">
                                            {{ \App\Models\AllFunction::getDateThai($catHome->finish_date) }}
                                        </td>
                                    </tr>
                                    @if($catHome->website != null && $catHome->website != "")
                                        <tr>
                                            <td class="text-right" style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 0px;">
                                                เว็บไซต์โครงการ</td>
                                            <td style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 20px;">
                                                {{ $catHome->website }}
                                            </td>
                                        </tr>
                                    @endif
                                    @if($catHome->facebook != null && $catHome->facebook != "")
                                        <tr>
                                            <td class="text-right" style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 0px;">
                                                Facebook</td>
                                            <td style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 20px;">
                                                {{ $catHome->facebook }}
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td class="text-right" style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 0px;">
                                            <span style="color: #55a79a; font-size:22px;">ราคาเริ่มต้น</span>
                                        </td>
                                        <td style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 20px; vertical-align: bottom;">
                                            <span style="color: #55a79a; font-size:22px;">
                                                {{ $catHome->sell_price }}
                                            </span> &nbsp;<span style="color: #55a79a;"> บาท </span>
                                        </td>
                                    </tr>
                                    @if($catHome->sell_price_detail != null && $catHome->sell_price_detail != "")
                                        <tr>
                                            <td class="text-right" style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 0px;">
                                                รายละเอียดราคา</td>
                                            <td style="border-right: 1px solid #dddddd; padding: 10px 20px 10px 20px;">
                                                {!! str_replace("\n","<br>", $catHome->sell_price_detail) !!}
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div><!-- ### Table ### -->
                        </div>
                    </div>
                </div>{{--#### Google Map + Table Specification ####--}}

                <!-- Review Detail -->
                <div class="row">
                    <div class="panel panel-success">
                        <div class="panel-body">
                            <div class="row blog-post">
                                <div class="col-md-12">

                                    <div class="media-body">
                                        <div class="sections"><span class="type">{{ $catHome->project_name }}</span> / <a href="#" class="tag">{{ $catHome->project_owner }}</a></div>
                                        <h3 class="title media-heading" style="text-indent:-64px; margin-left:64px; padding-top: 10px;">
                                            เรื่อง: &nbsp; {{ $catHome->title }}
                                        </h3>
                                        <div class="sections">
                                            <ul class="list-inline">
                                                <li>
                                                    ลงประกาศเมื่อ:
                                                </li>
                                                <li>
                                                    <i class="fa fa-calendar"></i> &nbsp; {{ App\Models\AllFunction::getDateTimeThai($catHome->created_at) }}
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Youtube -->
                                        <div class="blog-content">
                                            @if($catHome->video_url != null && $catHome->video_url != "")
                                                <?php
                                                $iframe = \App\Models\AllFunction::convertYoutube($catHome->video_url);
                                                ?>
                                                @if($iframe != "")
                                                    <div class="row">
                                                        <div class="col-md-1"></div>
                                                        <div class="blog-media col-md-10" style="padding-top: 30px; text-align: center;">
                                                            <div class="embed-responsive embed-responsive-16by9">
                                                                {!! $iframe !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1"></div>
                                                    </div>
                                                @endif
                                            @endif
                                        </div><!-- Youtube -->
                                    </div>

                                    <?php
                                    function getTitleCatHomePic($for_type)
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
                                    ?>

                                    <!-- Review Detail -->
                                    <div class="row" style="margin-top:40px;">
                                        <div class="col-md-12">
                                            <div class="panel-group" id="accordion">
                                                <!-- รีวิวทำเลและการเดินทาง -->
                                                <div class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" href="#collapseOne">
                                                                รีวิวทำเลและการเดินทาง </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            @if($catHome->review_status == 0)
                                                                รอรีวิว
                                                            @else
                                                                @for($i=3; $i<=10; $i++)
                                                                    @if($catHomePic[$i] != null && count($catHomePic[$i]) > 0)
                                                                        <?php
                                                                        $pics = $catHomePic[$i]; // Array Pics
                                                                        $firstInLoop = true;
                                                                        ?>
                                                                        @foreach($pics as $pic)
                                                                            <div class="row" style="margin-top: 20px;">
                                                                                @if($firstInLoop)
                                                                                    <div class="col-md-12">
                                                                                        <h4><?php echo getTitleCatHomePic($pic->pic_for); ?></h4>
                                                                                    </div>
                                                                                    <?php $firstInLoop = false; ?>
                                                                                @endif
                                                                                <div class="col-md-12">
                                                                                    <img src="{{ $pic->filepath }}" alt="{{ $pic->filename }}" class="img-responsive"
                                                                                         style="display: block; margin-left: auto; margin-right: auto;">
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <p style="text-indent: 30px;">
                                                                                        {{ $pic->description }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
                                                                @endfor
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div><!-- รีวิวทำเลและการเดินทาง -->
                                                <!-- รีวิวส่วนกลาง -->
                                                <div class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" href="#collapseTwo">
                                                                รีวิวส่วนกลาง </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseTwo" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            @if($catHome->review_status == 0)
                                                                รอรีวิว
                                                            @else
                                                                @for($i=11; $i<=18; $i++)
                                                                    @if($catHomePic[$i] != null && count($catHomePic[$i]) > 0)
                                                                        <?php
                                                                        $pics = $catHomePic[$i]; // Array Pics
                                                                        $firstInLoop = true;
                                                                        ?>
                                                                        @foreach($pics as $pic)
                                                                            <div class="row" style="margin-top: 20px;">
                                                                                @if($firstInLoop)
                                                                                    <div class="col-md-12">
                                                                                        <h4><?php echo getTitleCatHomePic($pic->pic_for); ?></h4>
                                                                                    </div>
                                                                                    <?php $firstInLoop = false; ?>
                                                                                @endif
                                                                                <div class="col-md-12">
                                                                                    <img src="{{ $pic->filepath }}" alt="{{ $pic->filename }}" class="img-responsive"
                                                                                         style="display: block; margin-left: auto; margin-right: auto;">
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <p style="text-indent: 30px;">
                                                                                        {{ $pic->description }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
                                                                @endfor
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div><!-- รีวิวส่วนกลาง -->
                                                <!-- รีวิวผังโครงการ -->
                                                <div class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" href="#collapseThree">
                                                                รีวิวผังโครงการ </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            @if($catHome->review_status == 0)
                                                                รอรีวิว
                                                            @else
                                                                @for($i=19; $i<=19; $i++)
                                                                    @if($catHomePic[$i] != null && count($catHomePic[$i]) > 0)
                                                                        <?php
                                                                        $pics = $catHomePic[$i]; // Array Pics
                                                                        $firstInLoop = true;
                                                                        ?>
                                                                        @foreach($pics as $pic)
                                                                            <div class="row" style="margin-top: 20px;">
                                                                                @if($firstInLoop)
                                                                                    <div class="col-md-12">
                                                                                        <h4><?php echo getTitleCatHomePic($pic->pic_for); ?></h4>
                                                                                    </div>
                                                                                    <?php $firstInLoop = false; ?>
                                                                                @endif
                                                                                <div class="col-md-12">
                                                                                    <img src="{{ $pic->filepath }}" alt="{{ $pic->filename }}" class="img-responsive"
                                                                                         style="display: block; margin-left: auto; margin-right: auto;">
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <p style="text-indent: 30px;">
                                                                                        {{ $pic->description }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
                                                                @endfor
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div><!-- รีวิวผังโครงการ -->
                                                <!-- รีวิวบ้านตัวอย่าง -->
                                                <div class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" href="#collapseFour">
                                                                รีวิวบ้านตัวอย่าง </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseFour" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            @if($catHome->review_status == 0)
                                                                รอรีวิว
                                                            @else
                                                                @for($i=20; $i<=31; $i++)
                                                                    @if($catHomePic[$i] != null && count($catHomePic[$i]) > 0)
                                                                        <?php
                                                                        $pics = $catHomePic[$i]; // Array Pics
                                                                        $firstInLoop = true;
                                                                        ?>
                                                                        @foreach($pics as $pic)
                                                                            <div class="row" style="margin-top: 20px;">
                                                                                @if($firstInLoop)
                                                                                    <div class="col-md-12">
                                                                                        <h4><?php echo getTitleCatHomePic($pic->pic_for); ?></h4>
                                                                                    </div>
                                                                                    <?php $firstInLoop = false; ?>
                                                                                @endif
                                                                                <div class="col-md-12">
                                                                                    <img src="{{ $pic->filepath }}" alt="{{ $pic->filename }}" class="img-responsive"
                                                                                         style="display: block; margin-left: auto; margin-right: auto;">
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <p style="text-indent: 30px;">
                                                                                        {{ $pic->description }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
                                                                @endfor
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div><!-- รีวิวบ้านตัวอย่าง -->
                                                <!-- รีวิวบ้านรับมอบ -->
                                                <div class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" href="#collapseFive">
                                                                รีวิวบ้านรับมอบ </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseFive" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            @if($catHome->review_status == 0)
                                                                รอรีวิว
                                                            @else
                                                                @for($i=32; $i<=43; $i++)
                                                                    @if($catHomePic[$i] != null && count($catHomePic[$i]) > 0)
                                                                        <?php
                                                                        $pics = $catHomePic[$i]; // Array Pics
                                                                        $firstInLoop = true;
                                                                        ?>
                                                                        @foreach($pics as $pic)
                                                                            <div class="row" style="margin-top: 20px;">
                                                                                @if($firstInLoop)
                                                                                    <div class="col-md-12">
                                                                                        <h4><?php echo getTitleCatHomePic($pic->pic_for); ?></h4>
                                                                                    </div>
                                                                                    <?php $firstInLoop = false; ?>
                                                                                @endif
                                                                                <div class="col-md-12">
                                                                                    <img src="{{ $pic->filepath }}" alt="{{ $pic->filename }}" class="img-responsive"
                                                                                         style="display: block; margin-left: auto; margin-right: auto;">
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <p style="text-indent: 30px;">
                                                                                        {{ $pic->description }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
                                                                @endfor
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div><!-- รีวิวบ้านรับมอบ -->
                                                <!-- รายละเอียดอื่นๆ -->
                                                <div class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" href="#collapseSix">
                                                                รายละเอียดอื่นๆ </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseSix" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            @if($catHome->review_status == 0)
                                                                รอรีวิว
                                                            @else
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <!-- ค่าส่วนกลาง -->
                                                                        @if($catHome->spare_price != "" || $catHome->central_price != "")
                                                                            <div class="row" style="padding-left: 20px;">
                                                                                <div class="col-md-12">
                                                                                    @if($catHome->spare_price != "")
                                                                                        <ul class="list-inline">
                                                                                            <li>กองทุนสำรอง:</li>
                                                                                            <li>
                                                                                                {{ $catHome->spare_price }} &nbsp;&nbsp;&nbsp; บ/ตร.ว.
                                                                                            </li>
                                                                                        </ul>
                                                                                    @endif
                                                                                    @if($catHome->central_price != "")
                                                                                        <ul class="list-inline">
                                                                                            <li>ค่าส่วนกลาง:</li>
                                                                                            <li>
                                                                                                {{ $catHome->central_price }} &nbsp;&nbsp;&nbsp; บ/ตร.ว.
                                                                                            </li>
                                                                                        </ul>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        @endif

                                                                        @if(($facility != null && count($facility) > 0) || $catHome->facility_str != "")
                                                                            <!-- สิ่งอำนวยความสะดวก -->
                                                                            <ul class="list-inline" style="padding-top: 20px;">
                                                                                <li><strong>สิ่งอำนวยความสะดวก:</strong></li>
                                                                            </ul>
                                                                            @if(count($facility) > 0)
                                                                                <div class="row" style="padding-left: 30px;  padding-bottom: 10px;">
                                                                                    @foreach($facility as $fac)
                                                                                        <div class="col-md-6"><i class="fa fa-caret-right"></i> &nbsp;&nbsp;
                                                                                            {{ \App\Models\Facility::getFacilityName($fac->facility_id) }} </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            @endif
                                                                            @if($catHome->facility_str != "")
                                                                                <div class="row" style="padding-left: 30px;">
                                                                                    อื่นๆ: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    {{ ($catHome->facility_str == null || $catHome->facility_str == "")? "-" : $catHome->facility_str }}
                                                                                </div>
                                                                            @endif
                                                                        @endif

                                                                        @if($bts != null || $mrt != null || $apl != null || $catHome->nearby_str != "")
                                                                            <!-- สถานที่ใกล้เคียง -->
                                                                            <ul class="list-inline" style="padding-top: 20px;">
                                                                                <li><strong>สถานที่ใกล้เคียง:</strong></li>
                                                                            </ul>
                                                                            @if($bts != null && count($bts) > 0)
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สถานี BTS:
                                                                                <div class="row" style="padding-left: 30px;  padding-bottom: 10px;">
                                                                                    @foreach($bts as $item)
                                                                                        <div class="col-md-6"><i class="fa fa-caret-right"></i> &nbsp;&nbsp;
                                                                                            {{ \App\Models\Bts::getBtsName($item->bts_id) }}</div>
                                                                                    @endforeach
                                                                                </div>
                                                                            @endif
                                                                            @if($mrt != null && count($mrt) > 0)
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สถานี MRT:
                                                                                <div class="row" style="padding-left: 30px;  padding-bottom: 10px;">
                                                                                    @foreach($mrt as $item)
                                                                                        <div class="col-md-6"><i class="fa fa-caret-right"></i> &nbsp;&nbsp;
                                                                                            {{ \App\Models\Mrt::getMrtName($item->mrt_id) }} </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            @endif
                                                                            @if($apl != null && count($apl) > 0)
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Airport Rail Link:
                                                                                <div class="row" style="padding-left: 30px;  padding-bottom: 10px;">
                                                                                    @foreach($apl as $item)
                                                                                        <div class="col-md-6"><i class="fa fa-caret-right"></i> &nbsp;&nbsp;
                                                                                            {{ \App\Models\AirportRailLink::getAplinkName($item->apl_id) }} </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            @endif
                                                                            @if($catHome->nearby_str != "")
                                                                                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อื่นๆ: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ ($catHome->nearby_str == "")? "-" : $catHome->nearby_str }}</p>
                                                                            @endif
                                                                        @endif

                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <!-- ส่วนลด โปรโมชั่น -->
                                                                        @if(($promotion != null && count($promotion) > 0) ||
                                                                        ($catHome->promotion_str != null && $catHome->promotion_str != ""))
                                                                            <div class="focus-box pull-right" style="width: 95%">
                                                                                <h5>
                                                                                    ส่วนลด โปรโมชั่น
                                                                                </h5>
                                                                                <ul class="fa-ul list-lg">
                                                                                    @foreach($promotion as $item)
                                                                                        <li><i class="fa-li fa fa-check primary-colour"></i> &nbsp;&nbsp;
                                                                                            {{ \App\Models\Promotion::getPromotionName($item->promotion_id) }}</li>
                                                                                    @endforeach
                                                                                </ul>
                                                                                @if($catHome->promotion_str != null && $catHome->promotion_str != "")
                                                                                    <p style="text-indent: 20px;">{!! str_replace("\n","<br>", $catHome->promotion_str) !!}</p>
                                                                                @endif
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div><!-- รายละเอียดอื่นๆ -->

                                            </div>
                                        </div>
                                    </div><!-- Review Detail -->

                                    <!-- ส่วนของการให้คะแนน -->
                                    <div class="row" style="margin-top:0px;">
                                        <div class="col-md-12">
                                            <strong>คะแนนความคิดเห็น ({{ $catHome->num_rating }})</strong>

                                            <div class="form-group" style="padding-top:10px;">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-5">ความพึงพอใจในเจ้าของโครงการ</div>
                                                <div class="col-md-5">
                                                    <input value="{{ $catHome->avg_score1 }}" type="number" class="rating"
                                                           min=0 max=5 step=0.01 data-size="xs" data-stars="5"
                                                           data-show-clear="false" data-show-caption="false" readonly=true>
                                                </div>
                                            </div>

                                            <div class="form-group" style="padding-top:10px;">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-5">ความพึงพอใจในรูปแบบบ้านด้านนอก</div>
                                                <div class="col-md-5">
                                                    <input value="{{ $catHome->avg_score2 }}" type="number" class="rating"
                                                           min=0 max=5 step=0.01 data-size="xs" data-stars="5"
                                                           data-show-clear="false" data-show-caption="false" readonly=true>
                                                </div>
                                            </div>

                                            <div class="form-group" style="padding-top:10px;">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-5">ความพึงพอใจในรูปแบบบ้านด้านใน</div>
                                                <div class="col-md-5">
                                                    <input value="{{ $catHome->avg_score3 }}" type="number" class="rating"
                                                           min=0 max=5 step=0.01 data-size="xs" data-stars="5"
                                                           data-show-clear="false" data-show-caption="false" readonly=true>
                                                </div>
                                            </div>

                                            <div class="form-group" style="padding-top:10px;">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-5">ความพึงพอใจในส่วนกลาง</div>
                                                <div class="col-md-5">
                                                    <input value="{{ $catHome->avg_score4 }}" type="number" class="rating"
                                                           min=0 max=5 step=0.01 data-size="xs" data-stars="5"
                                                           data-show-clear="false" data-show-caption="false" readonly=true>
                                                </div>
                                            </div>

                                            <div class="form-group" style="padding-top:10px;">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-5">ความพึงพอใจในข้อมูลเบื้องต้นโครงการ</div>
                                                <div class="col-md-5">
                                                    <input value="{{ $catHome->avg_score5 }}" type="number" class="rating"
                                                           min=0 max=5 step=0.01 data-size="xs" data-stars="5"
                                                           data-show-clear="false" data-show-caption="false" readonly=true>
                                                </div>
                                            </div>

                                            <div class="form-group" style="padding-top:10px;">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-5">สภาพแวดล้อมโครงการ</div>
                                                <div class="col-md-5">
                                                    <input value="{{ $catHome->avg_score6 }}" type="number" class="rating"
                                                           min=0 max=5 step=0.01 data-size="xs" data-stars="5"
                                                           data-show-clear="false" data-show-caption="false" readonly=true>
                                                </div>
                                            </div>

                                            <div class="form-group" style="padding-top:10px;">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-5">ความเหมาะสมของทำเลที่ตั้ง</div>
                                                <div class="col-md-5">
                                                    <input value="{{ $catHome->avg_score7 }}" type="number" class="rating"
                                                           min=0 max=5 step=0.01 data-size="xs" data-stars="5"
                                                           data-show-clear="false" data-show-caption="false" readonly=true>
                                                </div>
                                            </div>

                                            <div class="form-group" style="padding-top:10px;">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-5">ความเหมาะสมของราคา</div>
                                                <div class="col-md-5">
                                                    <input value="{{ $catHome->avg_score8 }}" type="number" class="rating"
                                                           min=0 max=5 step=0.01 data-size="xs" data-stars="5"
                                                           data-show-clear="false" data-show-caption="false" readonly=true>
                                                </div>
                                            </div>

                                            <div class="form-group" style="padding-top:10px;">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-5">เงื่อนไขการจอง</div>
                                                <div class="col-md-5">
                                                    <input value="{{ $catHome->avg_score9 }}" type="number" class="rating"
                                                           min=0 max=5 step=0.01 data-size="xs" data-stars="5"
                                                           data-show-clear="false" data-show-caption="false" readonly=true>
                                                </div>
                                            </div>

                                            <div class="form-group" style="padding-top:20px;">
                                                <label class="col-md-7 label-control text-right">
                                                    คะแนนเฉลี่ย &nbsp; {{ ($catHome->avg_rating == null)? "0" : $catHome->avg_rating }} / 5 &nbsp; คะแนน
                                                </label>
                                                <div class="col-md-5">
                                                    <input value="{{ $catHome->avg_rating }}" type="number" class="rating"
                                                           min=0 max=5 step=0.01 data-size="xs" data-stars="5"
                                                           data-show-clear="false" data-show-caption="false" readonly=true>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- ส่วนของการให้คะแนน -->


                                    <div class="row">
                                        <!-- Post Tags -->
                                        <div class="col-md-12">
                                            <div class="tag-cloud post-tag-cloud">
                                                <h4>
                                                    Tags
                                                </h4>
                                                @if($tag != null && count($tag) > 0)
                                                    @foreach($tag as $item)
                                                        <a href="#" class="tag">{{ App\Models\TagSub::getTagSubName($item->tag_sub_id) }}</a>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div><!-- Post Tags -->

                                        <!-- Favourite -->
                                        <div class="col-md-6" style="margin-top:20px;">
                                            <h4 class="text-light">
                                                เพิ่มรายการโปรด:
                                            </h4>
                                            <a href="#">
                                                <button type="button" class="btn btn-success btn-sm">
                                                    <i class="fa fa-heart-o fa-lg" style="color: #ffffff"></i> &nbsp;&nbsp;
                                                    เพิ่มเป็นรายการโปรด</button>
                                            </a>
                                        </div><!-- Favourite -->

                                        <!-- Share It -->
                                        <div class="col-md-6" style="margin-top:20px;">
                                            <h4 class="text-light">
                                                แชร์ต่อให้เพื่อน:
                                            </h4>
                                            <a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter" style="color: #ffffff"></i></a>
                                            <a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook" style="color: #ffffff"></i></a>
                                            <a href="#" class="social-link branding-line">
                                                <img src="../../img/icon/icon-line.jpeg" alt="Line" style="max-width: 35px;" />
                                            </a>
                                        </div><!-- Share It -->

                                        <!-- ข้อมูลการติดต่อ -->
                                        <div class="col-md-12">
                                            <div class="block block-callout post-block">
                                                <!-- About The Author -->
                                                <div class="post-author">
                                                    <div class="focus-box pull-right" style="max-height: 160px; max-width: 160px;">
                                                        <?php $logo = \App\Models\Attachment::find($catHome->project_owner_logo); ?>
                                                        <img src="{{ $logo->path }}" alt="{{ $logo->filename }}" class="img-responsive"
                                                             style="max-height: 100px; max-width: 100px; display: block;
                                                             margin-left: auto; margin-right: auto">
                                                    </div>
                                                    <h4>
                                                        ข้อมูลการติดต่อ:
                                                    </h4>
                                                    <div style="padding-left: 40px;">
                                                        <p>
                                                            <strong>ชื่อบริษัท:</strong> &nbsp;&nbsp; {{ $catHome->project_owner }}
                                                        </p>
                                                        <p>
                                                            <strong>
                                                                เบอร์โทรศัพท์:</strong> &nbsp;&nbsp; {{ $catHome->telephone }}
                                                        </p>
                                                        @if($catHome->email != null && $catHome->email != "")
                                                            <p>
                                                                <strong>
                                                                    อีเมล์:</strong> &nbsp;&nbsp; {{ $catHome->email }}
                                                            </p>
                                                        @endif
                                                        @if($catHome->website != null && $catHome->website != "")
                                                            <p>
                                                                <strong>
                                                                    เว็บไซต์:</strong> &nbsp;&nbsp; {{ $catHome->website }}
                                                            </p>
                                                        @endif
                                                        @if($catHome->line != null && $catHome->line != "")
                                                            <p>
                                                                <strong>
                                                                    LINE ID:</strong> &nbsp;&nbsp; {{ $catHome->line }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- ข้อมูลการติดต่อ -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Review Detail -->

                <div class="row"><!--Comments-->
                    <div class="panel panel-success">
                        <div class="panel-body">
                            <div class="comment" id="comments">
                                <h5>ความคิดเห็นทั้งหมด ({{ $catHome->num_comment }})</h5><br/>
                                <div class="row">
                                    <div class="block block-callout post-block" style="margin: 0em 10px 0em 10px;">
                                        <div class="post-author">
                                            @for($i=0; $i<10; $i++)
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img src="http://i.ytimg.com/vi/RscymgpZEGQ/hqdefault.jpg"
                                                             alt="User" class="img-responsive" />
                                                    </div>
                                                    <div class="col-md-9">
                                                        <ul class="list-inline meta text-muted">
                                                            <li><i class="fa fa-user"></i> Thitima Admin</li>
                                                            <li><i class="fa fa-calendar"></i> 02/07/2558</li>
                                                        </ul>
                                                        <p>a nec in sed hac ultrices cursusa nec in sed hac ultrices cursusa nec in sed hac ultrices cursusa nec in sed hac ultrices cursus</p>
                                                    </div>
                                                </div>
                                                @if($i != 9)
                                                    <hr>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                                <form id="comment-form" class="comment-form" role="form"
                                      action="#" method="get">
                                    <h5>แสดงความคิดเห็น</h5>
                                    <div class="form-group">
                                        <label class="sr-only" for="comment-name">Name</label>
                                        <input type="text" class="form-control" id="comment-name" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="comment-name">Email</label>
                                        <input type="email" class="form-control" id="comment-email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="comment-comment">Comment</label>
                                        <textarea rows="8" class="form-control" id="comment-comment" placeholder="Comment"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div><!--Comments-->

            </div>{{--#### Content ####--}}
        </div>

    </div>
@stop