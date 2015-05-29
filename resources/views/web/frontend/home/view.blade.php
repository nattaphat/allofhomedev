@extends('layouts.main')

@section('slider')
    @include('layouts._partials.topslide')
@stop

@section('jshome')
    <script type="text/javascript">
        var centreGot = true;
    </script>
    {!! $map['js'] !!}
@stop

@section('content')

    <div class="container">
        <div class="row">
            @include('layouts._partials.articleSlide')
        </div>


        <div class="row">

            <div class="col-md-3">
                <div>
                    <a href="#">
                        <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                             alt="Banner 1" class="img-responsive" />
                    </a>
                </div>
                <div style="padding-top: 20px;">
                    <a href="#">
                        <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                             alt="Banner 2" class="img-responsive" />
                    </a>
                </div>
                <div style="padding-top: 20px;">
                    <a href="#">
                        <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                             alt="Banner 1" class="img-responsive" />
                    </a>
                </div>
                <div style="padding-top: 20px;">
                    <a href="#">
                        <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                             alt="Banner 2" class="img-responsive" />
                    </a>
                </div>
            </div>

            {{--#### Content ####--}}
            <div class="col-md-9">
                {{--#### Google Map ####--}}
                <div class="row">
                    <div class="panel panel-success">
                        <div class="panel-body">
                            Google Map:
                            {!! $map['html'] !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="panel panel-success">
                        <div class="panel-body">

                            <!-- Blog post -->
                            <div class="row blog-post">
                                <div class="col-md-12">
                                    <div class="media-body">
                                        <div class="sections"><span class="type">โครงการบ้านใหม่</span> / <a href="#" class="tag">{{ $project->project_name }}</a></div>
                                        <h3 class="title media-heading" style="padding-top: 10px;">
                                            {{ $catHome->title }}
                                        </h3>
                                        <div class="sections">
                                            <ul class="list-inline">
                                                <li>
                                                    ลงประกาศโดย:
                                                </li>
                                                <li>
                                                    <i class="fa fa-user"></i> {{ App\User::getFullName($catHome->user_id) }}
                                                </li>
                                                <li>
                                                    <i class="fa fa-calendar"></i> {{ App\Models\AllFunction::getDateTimeThai($catHome->created_at) }}
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- Meta details mobile -->
                                        <ul class="list-inline meta text-muted">
                                            <li><i class="fa fa-calendar"></i> {{ App\Models\AllFunction::getDateTimeThai($catHome->created_at) }} </li>
                                            <li><i class="fa fa-user"></i> <a href="#">{{ App\User::getFullName($catHome->user_id) }}</a></li>
                                        </ul>

                                        <!--Main content of post-->
                                        <div class="blog-content">
                                            @if($catHome->video_url != null && $catHome->video_url != "")
                                                <?php
                                                $iframe = \App\Models\AllFunction::convertYoutube($catHome->video_url);
                                                ?>
                                                @if($iframe != "")
                                                    <div class="blog-media" style="padding-top: 30px; text-align: center;">
                                                        {!! $iframe !!}
                                                    </div>
                                                @endif
                                            @endif
                                            <p style="text-indent: 30px; padding-top: 10px;">{!! str_replace("\n","<br>", $catHome->subtitle) !!}</p>

                                            <div class="row">
                                                <div class="row pricing-stack pricing-table margin-top-lg">
                                                    <div class="col-md-3 pricing-table-features hidden-xs hidden-sm">
                                                        <div class="well" style="margin-top: 0px;">
                                                            <ul class="pricing-table-features-list">
                                                                <li class="title" style="
                                                                    padding-top: 15px !important;
                                                                    padding-bottom: 10px !important;
                                                                    font-size: 18px !important;
                                                                    height: 50px;">
                                                                    คุณสมบัติ</li>
                                                                <li>ชื่อโครงการ</li>
                                                                <li>บริษัทเจ้าของโครงการ</li>
                                                                <li>ที่ตั้งโครงการ</li>
                                                                <li>ทำเล/ย่าน</li>
                                                                <li>รูปแบบบ้าน</li>
                                                                <li>พื้นที่โครงการ</li>
                                                                <li>จำนวนยูนิต</li>
                                                                <li>รูปแบบบ้าน : พื้นที่เริ่มต้น</li>
                                                                <li>พื้นที่บ้านเริ่มต้น</li>
                                                                <li>การก่อสร้างตัวบ้าน</li>
                                                                <li>สไตล์การออกแบบ</li>
                                                                <li>โครงการผ่าน EIA</li>
                                                                <li>ช่วงราคาขาย</li>
                                                                <li>เริ่มก่อสร้าง</li>
                                                                <li>คาดว่าแล้วเสร็จ</li>
                                                                <li>เว็บไซต์โครงการ</li>
                                                                <li>Facebook</li>
                                                                <li class="price last">ราคาเริ่มต้น</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9 pricing-table-plan">
                                                        <div class="well"  style="margin-top: 0px;">
                                                            <ul class="pricing-table-features-list">
                                                                <li class="title" style="
                                                                    padding-top: 15px !important;
                                                                    padding-bottom: 10px !important;
                                                                    font-size: 18px !important;
                                                                    height: 50px;">
                                                                    รายละเอียด</li>
                                                                <li style="text-align: left"><span class="visible-xs visible-sm">
                                                                        ชื่อโครงการ: </span>{{ $project->project_name }}</li>
                                                                <li style="text-align: left"><span class="visible-xs visible-sm">
                                                                        บริษัทเจ้าของโครงการ: </span>{{ $project->project_company_owner }}</li>
                                                                <li style="text-align: left"><span class="visible-xs visible-sm">
                                                                        ที่ตั้งโครงการ: </span>{{ $project->getFullPrjAddress($project->id) }}</li>
                                                                <li style="text-align: left"><span class="visible-xs visible-sm">
                                                                        ทำเล/ย่าน: </span>{{ ($project->subarea_id == null)? "-" :
                                                                        \App\Models\SubArea::find($project->subarea_id)->subarea_name  }}</li>
                                                                <li style="text-align: left"><span class="visible-xs visible-sm">
                                                                        รูปแบบบ้าน: </span><?php
                                                                    $project_type = unserialize($catHome->project_type);
                                                                    foreach($project_type as $key=>$value)
                                                                    {
                                                                        switch($value)
                                                                        {
                                                                            case "1":
                                                                                echo "<i class='fa fa-check-square-o'></i> บ้านเดี่ยว";
                                                                                break;
                                                                            case "2":
                                                                                echo "<i class='fa fa-check-square-o'></i> บ้านแฝด";
                                                                                break;
                                                                            case "3":
                                                                                echo "<i class='fa fa-check-square-o'></i> ทาวน์โฮม";
                                                                                break;
                                                                            case "4":
                                                                                echo "<i class='fa fa-check-square-o'></i> คอนโด";
                                                                                break;
                                                                        }
                                                                    }
                                                                    ?></li>
                                                                <li style="text-align: left"><span class="visible-xs visible-sm">
                                                                        พื้นที่โครงการ: </span>
                                                                    @if($catHome->project_area != null && $catHome->project_area != "")
                                                                        {{ $catHome->project_area }} ไร่
                                                                    @else
                                                                        - &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ไร่
                                                                    @endif</li>
                                                                <li style="text-align: left"><span class="visible-xs visible-sm">
                                                                        จำนวนยูนิต: </span>
                                                                    @if($catHome->num_unit != null && $catHome->num_unit != "")
                                                                        {{ $catHome->num_unit }} ยูนิต
                                                                    @else
                                                                        - &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ยูนิต
                                                                    @endif
                                                                </li>
                                                                <li style="text-align: left"><span class="visible-xs visible-sm">
                                                                        รูปแบบบ้าน : พื้นที่เริ่มต้น: </span>
                                                                    @if($catHome->home_type_per_area != null && $catHome->home_type_per_area != "")
                                                                        {!! str_replace("\n","<br>", $catHome->home_type_per_area) !!}
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </li>
                                                                <li style="text-align: left"><span class="visible-xs visible-sm">
                                                                        พื้นที่บ้านเริ่มต้น: </span>
                                                                    @if($catHome->home_area != null && $catHome->home_area != "")
                                                                        {!! str_replace("\n","<br>", $catHome->home_area) !!}
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </li>
                                                                <li style="text-align: left"><span class="visible-xs visible-sm">
                                                                        การก่อสร้างตัวบ้าน: </span>
                                                                    @if($catHome->home_material != null && $catHome->home_material != "")
                                                                        {!! str_replace("\n","<br>", $catHome->home_material) !!}
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </li>
                                                                <li style="text-align: left"><span class="visible-xs visible-sm">
                                                                        สไตล์การออกแบบ: </span>
                                                                    @if($catHome->home_style != null && $catHome->home_style != "")
                                                                        {!! str_replace("\n","<br>", $catHome->home_style) !!}
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </li>
                                                                <li style="text-align: left"><span class="visible-xs visible-sm">
                                                                        โครงการผ่าน EIA: </span>
                                                                    @if($catHome->eia == null) - @elseif($catHome->eia == true) ผ่าน @else ไม่ผ่าน @endif
                                                                </li>
                                                                <li style="text-align: left"><span class="visible-xs visible-sm">
                                                                        ช่วงราคาขาย: </span>
                                                                    {{ \App\Models\AllFunction::getMoneyWithoutDecimal($catHome->sell_price_from) }} &nbsp;
                                                                    ถึง &nbsp; {{ \App\Models\AllFunction::getMoneyWithoutDecimal($catHome->sell_price_to) }} &nbsp;&nbsp;&nbsp;บาท
                                                                </li>
                                                                <li style="text-align: left"><span class="visible-xs visible-sm">
                                                                        เริ่มก่อสร้าง: </span>
                                                                    {{ \App\Models\AllFunction::getDateThai($catHome->construct_date) }}
                                                                </li>
                                                                <li style="text-align: left"><span class="visible-xs visible-sm">
                                                                        คาดว่าแล้วเสร็จ: </span>
                                                                    {{ \App\Models\AllFunction::getDateThai($catHome->finish_date) }}
                                                                </li>
                                                                <li style="text-align: left"><span class="visible-xs visible-sm">
                                                                        เว็บไซต์โครงการ: </span>
                                                                    {{ ($project->website == null)? "-" : $project->website }}
                                                                </li>
                                                                <li style="text-align: left"><span class="visible-xs visible-sm">
                                                                        Facebook: </span>
                                                                    {{ ($project->facebook == null)? "-" : $project->facebook }}
                                                                </li>

                                                                <li class="price">
                                                                    <span class="digits">
                                                                        {{ \App\Models\AllFunction::getMoneyWithoutDecimal($catHome->sell_price) }}
                                                                    </span> &nbsp; บาท</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <ul class="list-inline" style="padding-top: 30px;">
                                                <li><strong>แผนผังโครงการ:</strong></li>
                                            </ul>
                                            <div style="padding-left: 20px;">
                                                <?php
                                                if($picLayout != null)
                                                {
                                                    foreach($picLayout as $pic)
                                                    {
                                                        echo '
                                                            <img src="'.$pic->filepath.'"
                                                             alt="'.$pic->filename.'" class="img-responsive"
                                                             style="display: block; margin-left: auto; margin-right: auto" /><br>';
                                                    }
                                                }
                                                ?>
                                                <p style="text-indent: 30px;">{!! str_replace("\n","<br>", $catHome->project_layout) !!}</p>
                                            </div>
                                            <ul class="list-inline" style="padding-top: 30px;">
                                                <li><strong>สภาพแวดล้อมโครงการ:</strong></li>
                                            </ul>
                                            <div style="padding-left: 20px;">
                                                <?php
                                                if($picEnv != null)
                                                {
                                                    foreach($picEnv as $pic)
                                                    {
                                                        echo '
                                                            <img src="'.$pic->filepath.'"
                                                             alt="'.$pic->filename.'" class="img-responsive"
                                                             style="display: block; margin-left: auto; margin-right: auto" /><br>';
                                                    }
                                                }
                                                ?>
                                                <p style="text-indent: 30px;">{!! str_replace("\n","<br>", $catHome->project_env) !!}</p>
                                            </div>
                                            <ul class="list-inline" style="padding-top: 30px;">
                                                <li><strong>บรรยากาศบ้านตกแต่ง:</strong></li>
                                            </ul>
                                            <div style="padding-left: 20px;">
                                                <?php
                                                if($picScene != null)
                                                {
                                                    foreach($picScene as $pic)
                                                    {
                                                        echo '
                                                            <img src="'.$pic->filepath.'"
                                                             alt="'.$pic->filename.'" class="img-responsive"
                                                             style="display: block; margin-left: auto; margin-right: auto" /><br>';
                                                    }
                                                }
                                                ?>
                                                <p style="text-indent: 30px;">{!! str_replace("\n","<br>", $catHome->project_scene) !!}</p>
                                            </div>
                                            <ul class="list-inline" style="padding-top: 30px;">
                                                <li><strong>บรรยากาศบ้านจริงเมื่อรับมอบ:</strong></li>
                                            </ul>
                                            <div style="padding-left: 20px;">
                                                <?php
                                                if($picDeliver != null)
                                                {
                                                    foreach($picDeliver as $pic)
                                                    {
                                                        echo '
                                                            <img src="'.$pic->filepath.'"
                                                             alt="'.$pic->filename.'" class="img-responsive"
                                                             style="display: block; margin-left: auto; margin-right: auto"/><br>';
                                                    }
                                                }
                                                ?>
                                                <p style="text-indent: 30px;">{!! str_replace("\n","<br>", $catHome->project_deliver) !!}</p>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul class="list-inline" style="padding-top: 30px;">
                                                        <li><strong>รายละเอียดส่วนกลาง:</strong></li>
                                                    </ul>
                                                    <div style="padding-left: 20px;">
                                                        <ul class="list-inline">
                                                            <li>กองทุนสำรอง:</li>
                                                            <li>
                                                                @if($catHome->spare_price != null && $catHome->spare_price != "")
                                                                    {{ \App\Models\AllFunction::getMoneyWithoutDecimal($catHome->spare_price) }} &nbsp;&nbsp;&nbsp; บ/ตร.ว.
                                                                @else
                                                                    - &nbsp;&nbsp;&nbsp; บ/ตร.ว.
                                                                @endif
                                                            </li>
                                                        </ul>
                                                        <ul class="list-inline">
                                                            <li>ค่าส่วนกลาง:</li>
                                                            <li>
                                                                @if($catHome->spare_price != null && $catHome->spare_price != "")
                                                                    {{ \App\Models\AllFunction::getMoneyWithoutDecimal($catHome->central_price) }} &nbsp;&nbsp;&nbsp; บ/ตร.ว.
                                                                @else
                                                                    - &nbsp;&nbsp;&nbsp; บ/ตร.ว.
                                                                @endif
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- สิ่งอำนวยความสะดวก -->
                                                    <ul class="list-inline" style="padding-top: 30px;">
                                                        <li><strong>สิ่งอำนวยความสะดวก:</strong></li>
                                                    </ul>
                                                    <div class="row" style="padding-left: 30px;  padding-bottom: 10px;">
                                                        @foreach($facility as $fac)
                                                            <div class="col-md-6"><i class="fa fa-caret-right"></i> &nbsp;&nbsp;
                                                                {{ \App\Models\Facility::getFacilityName($fac->facility_id) }} </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="row" style="padding-left: 30px;">
                                                        อื่นๆ: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        {{ ($project->facility_str == null || $project->facility_str == "")? "-" : $project->facility_str }}
                                                    </div>
                                                    <!-- สถานที่ใกล้เคียง -->
                                                    <ul class="list-inline" style="padding-top: 30px;">
                                                        <li><strong>สถานที่ใกล้เคียง:</strong></li>
                                                    </ul>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สถานี BTS: @if($bts == null || count($bts) == 0)
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - <br> @endif
                                                    <div class="row" style="padding-left: 30px;  padding-bottom: 10px;">
                                                        @foreach($bts as $item)
                                                            <div class="col-md-6"><i class="fa fa-caret-right"></i> &nbsp;&nbsp;
                                                                {{ \App\Models\Bts::getBtsName($item->bts_id) }}</div>
                                                        @endforeach
                                                    </div>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สถานี MRT: @if($mrt == null || count($mrt) == 0)
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - <br> @endif
                                                    <div class="row" style="padding-left: 30px;  padding-bottom: 10px;">
                                                        @foreach($mrt as $item)
                                                            <div class="col-md-6"><i class="fa fa-caret-right"></i> &nbsp;&nbsp;
                                                                {{ \App\Models\Mrt::getMrtName($item->mrt_id) }} </div>
                                                        @endforeach
                                                    </div>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Airport Rail Link: @if($apl == null || count($apl) == 0)
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - <br> @endif
                                                    <div class="row" style="padding-left: 30px;  padding-bottom: 10px;">
                                                        @foreach($apl as $item)
                                                            <div class="col-md-6"><i class="fa fa-caret-right"></i> &nbsp;&nbsp;
                                                                {{ \App\Models\AirportRailLink::getAplinkName($item->apl_id) }} </div>
                                                        @endforeach
                                                    </div>
                                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อื่นๆ: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ ($project->nearby_str == "")? "-" : $project->nearby_str }}</p>
                                                </div>
                                                <div class="col-md-6">
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
                                        </div>
                                        <!-- Post Tags -->
                                        <div class="tag-cloud post-tag-cloud">
                                            <h4>
                                                Tags
                                            </h4>
                                            @if($tag != null && count($tag) > 0)
                                                @foreach($tag as $item)
                                                    <a href="#" class="tag">{{ App\Models\TagSub::getTagSubName($item->tag_sub_id) }}</a>
                                                @endforeach
                                            @endif
                                        </div><br>
                                        <!-- #### Share Widget -->
                                        <div class="row">
                                            <div class="col-md-3 pull-left">
                                                <h4 class="text-light">
                                                    Favourite:
                                                </h4>
                                                <a href="#">
                                                    <button type="button" class="btn btn-success btn-sm">
                                                        <i class="fa fa-heart-o fa-lg"></i> &nbsp;&nbsp;
                                                        เพิ่มเป็นรายการโปรด</button>
                                                </a>
                                            </div>
                                            <div class="col-md-3 pull-right">
                                                <h4 class="text-light">
                                                    Share it:
                                                </h4>
                                                <a href="#" class="social-link branding-twitter">
                                                    <i class="fa fa-twitter-square fa-3x"></i></a>
                                                <a href="#" class="social-link branding-facebook">
                                                    <i class="fa fa-facebook-square fa-3x"></i></a>
                                                <a href="#" class="social-link branding-line">
                                                    <img src="../../img/icon/icon-line.jpeg" alt="Line"
                                                         style="max-width: 35px;" />
                                                </a>
                                            </div>
                                        </div>

                                        <div class="block block-callout post-block">
                                            <!-- About The Author -->
                                            <div class="post-author">
                                                <h4>
                                                    ข้อมูลการติดต่อ:
                                                </h4>
                                                <div style="padding-left: 20px;">
                                                    <p>
                                                        <strong>ชื่อบริษัท:</strong> &nbsp;&nbsp; {{ $catHome->contact_company_name }}
                                                    </p>
                                                    <p>
                                                        <strong>
                                                            เบอร์โทรศัพท์:</strong> &nbsp;&nbsp; {{ $catHome->contact_telephone }}
                                                    </p>
                                                    <p>
                                                        <strong>
                                                            อีเมล์:</strong> &nbsp;&nbsp; {{ $catHome->contact_email }}
                                                    </p>
                                                    <p>
                                                        <strong>
                                                            เว็บไซต์:</strong> &nbsp;&nbsp; {{ $catHome->contact_website }}
                                                    </p>
                                                    @if($catHome->contact_lineid != null && $catHome->contact_lineid != "")
                                                        <p>
                                                            <strong>
                                                                LINE ID:</strong> &nbsp;&nbsp; {{ $catHome->contact_lineid }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--#### ข้อมูลผู้ติดต่อ ####--}}
                <div class="row">
                    <div class="panel panel-success">
                        <div class="panel-body">

                            <!--Comments-->
                            <div class="comment" id="comments">
                                <h5>ความคิดเห็นทั้งหมด (10)</h5><br/>
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
                </div>

            </div>
        </div>
    </div>
@stop