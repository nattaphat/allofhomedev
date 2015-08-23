@extends('layouts.main_view')

@section('jshome')
    {!! $map['js'] !!}

    <style type="text/css">

        #share-buttons img {
            width: 35px;
            padding: 5px;
            border: 0;
            box-shadow: 0;
            display: inline;
        }

    </style>
@stop

@section('jsbody')

@stop

@section('content')

    @include('layouts._partials.picture_preview')

    <div class="boxMember">
        <div class="left">
            <div class="profile">
                <h2>ข้อมูลเจ้าของโครงการ</h2>
                <div class="detail">
                    <div class="pic-profile">
                        <p><img src="{{ \App\Models\Brand::getPathLogo($brand->id) }}" alt="" width="150" height="150"
                                    style="border: 1px solid lightgray"/></p>
                    </div>
                    <div class="info-profile">
                        <ul>
                            <li>
                                <h3>เบอร์โทรศัพท์</h3>
                                <p>{{ $brand->telephone }}</p>
                            </li>
                            <li>
                                <h3>อีเมลล์</h3>
                                <p>{{ $brand->email }}</p>
                            </li>
                            <li>
                                <h3>line ID</h3>
                                <p>{{ $brand->line }}</p>
                            </li>
                        </ul>

                    </div>
                    <div style="color: #000; font-size: 22px; font-weight: normal; width: 100%;
                    clear: both; display: inline-block; overflow: hidden; white-space: nowrap;">
                        {{ $brand->brand_name }}
                    </div>
                    <div class="clear"></div>
                </div>
                <a href="#" class="btn-addfriend"></a>
            </div>
        </div>

        <div class="right">
            <h2>ติดต่อเจ้าของโครงการ</h2>
            <div class="form">
                {!! Form::text('subject', null, ['placeholder' => 'หัวข้อ']) !!}
                {!! Form::textarea('body', null, ['placeholder' => 'ข้อความ']) !!}
                {!! Form::text('telephone_contact_back', null, ['placeholder' => 'เบอร์ติดต่อกลับ']) !!}
            </div>
            <input type="submit" value="" class="btn-submit" />
            <input type="button" value="" class="btn-cancel" />
        </div>
        <div class="clear"></div>
        <!--
        <div class="button">
            <a href="#" class="btn-likepage"></a>
            <a href="#" class="btn-share"></a>
        </div>
        -->
        <div class="button">
            <div id="share-buttons">
                <!-- Email -->
                <a href="mailto:?Subject={{ $catHome->title }}&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 {{ Request::fullUrl() }}">
                    <img src="{{ asset('images/logo/email.png') }}" alt="Email" />
                </a>

                <!-- Facebook -->
                <a href="http://www.facebook.com/sharer.php?u={{ Request::fullUrl() }}" target="_blank">
                    <img src="{{ asset('images/logo/facebook.png') }}" alt="Facebook" />
                </a>

                <!-- Google+ -->
                <a href="https://plus.google.com/share?url={{ Request::fullUrl() }}" target="_blank">
                    <img src="{{ asset('images/logo/google.png') }}" alt="Google" />
                </a>

                <!-- LinkedIn -->
                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ Request::fullUrl() }}" target="_blank">
                    <img src="{{ asset('images/logo/linkedin.png') }}" alt="LinkedIn" />
                </a>

                <!-- Print -->
                <a href="javascript:;" onclick="window.print()">
                    <img src="{{ asset('images/logo/print.png') }}" alt="Print" />
                </a>
                <!-- Tumblr-->
                <a href="http://www.tumblr.com/share/link?url={{ Request::fullUrl() }}&amp;title={{ $catHome->title }}" target="_blank">
                    <img src="{{ asset('images/logo/tumblr.png') }}" alt="Tumblr" />
                </a>

                <!-- Twitter -->
                <a href="https://twitter.com/share?url={{ Request::fullUrl() }}&amp;name={{ $catHome->title }}&amp;hashtags=allofhome" target="_blank">
                    <img src="{{ asset('images/logo/twitter.png') }}" alt="Twitter" />
                </a>
            </div>
            <a href="#" class="btn-favorite">เพิ่มเป็นรายการโปรด</a>
        </div>
    </div>

    <div class="boxMap">
        <h2>พิกัดที่ตั้งโครงการ :</h2>
        <div class="map-google">
            {!! $map['html'] !!}
        </div>
        <a href="#" class="btn-searchggm">ค้าหาเส้นทางจาก Google Map</a>
    </div>

    <div class="boxVdoReview">
        @if($catHome->video_url != null && $catHome->video_url != "")
            <?php
            $iframe = \App\Models\AllFunction::convertYoutube($catHome->video_url);
            ?>
            @if($iframe != "")
                <h2>วิีดิโอรีวิว :</h2>
                <div class="video-container">
                    <div class="vdo-review">
                        {!! $iframe !!}
                    </div>
                </div>
            @endif
        @endif

        <div class="contact-detail">
            <div class="left">
                <h3>ข้อมูลบริษัทเจ้าของโครงการ :</h3>
                <ul>
                    @if($brand->telephone != null && $brand->brand_name != "")
                    <li>
                        <span class="title">ชื่อบริษัท :</span>
                        <span class="info">{{ $brand->brand_name }}</span>
                    </li>
                    @endif
                    @if($brand->telephone != null && $brand->telephone != "")
                    <li>
                        <span class="title">เบอร์โทรศัพท์ :</span>
                        <span class="info">{{ $brand->telephone }}</span>
                    </li>
                    @endif
                    @if($brand->facebook != null && $brand->facebook != "")
                    <li>
                        <span class="title">FB Fanpage :</span>
                        <span class="info">{{ $brand->facebook }}</span>
                    </li>
                    @endif
                    @if($brand->line != null && $brand->line != "")
                    <li>
                        <span class="title">Line ID :</span>
                        <span class="info">{{ $brand->line }}</span>
                    </li>
                    @endif
                    @if($catHome->website != null && $catHome->website != "")
                        <li>
                            <span class="title">เว็บไซต์ :</span>
                            <span class="info">{{ $catHome->website }}</span>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="right">
                <div class="rating">
                    <span><img src="{{ asset('images/blulet/bstar-y.png') }}" alt="" /></span>
                    <span><img src="{{ asset('images/blulet/bstar-y.png') }}" alt="" /></span>
                    <span><img src="{{ asset('images/blulet/bstar-y.png') }}" alt="" /></span>
                    <span><img src="{{ asset('images/blulet/bstar-y.png') }}" alt="" /></span>
                    <span><img src="{{ asset('images/blulet/bstar-g.png') }}" alt="" /></span>
                </div>
                <p class="text">คะแนนกำหนดจากให้ดาวจากผู้ใช้งานจริง</p>
                <div class="scoll">
                    <h3>โครงสร้างคะแนน</h3>
                    <ul>
                        <li>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                        </li>
                        <li>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                        </li>
                        <li>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                        </li>
                        <li>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                        </li>
                        <li>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>

        </div>
        <div class="other-detail">
            <h3>ข้อมูลเบื้องต้นโครงการ :</h3>
            <ul>
                <li>
                    <span class="title">ชื่อโครงการ :</span>
                    <span class="info">{{ $catHome->project_name }}</span>
                </li>
                <li>
                    <span class="title">บริษัทเจ้าของโครงการ :</span>
                    <span class="info">{{ $brand->brand_name }}</span>
                </li>
                <li>
                    <span class="title">ที่ตั้งโครงการ :</span>
                    <span class="info">{{ $catHome->getFullPrjAddress($catHome->id) }}</span>
                </li>
                @if($catHome->subarea_id != null && $catHome->subarea_id != "")
                <li>
                    <span class="title">ทำเล/ย่าน :</span>
                    <span class="info">{{ \App\Models\SubArea::find($catHome->subarea_id)->subarea_name  }}</span>
                </li>
                @endif
                @if(($catHome->area_1 != null && $catHome->area_1 != "") ||
                    ($catHome->area_2 != null && $catHome->area_2 != "") ||
                    ($catHome->area_3 != null && $catHome->area_3 != ""))
                <li>
                    <span class="title">พื้นที่โครงการ :</span>
                    <span class="info">
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
                    </span>
                </li>
                @endif
                @if($catHome->num_building != null && $catHome->num_building != "")
                    <li>
                        <span class="title">จำนวนอาคาร :</span>
                    <span class="info">{{ $catHome->num_building }} อาคาร</span>
                    </li>
                @endif
                @if($catHome->num_unit != null && $catHome->num_unit != "")
                    <li>
                        <span class="title">จำนวนยูนิต :</span>
                    <span class="info">{{ $catHome->num_unit }} ยูนิต</span>
                    </li>
                @endif
                @if($catHome->num_elev_person != null && $catHome->num_elev_person != "")
                    <li>
                        <span class="title">จำนวนลิฟต์โดยสาร :</span>
                        <span class="info">{{ $catHome->num_elev_person }} ตัว</span>
                    </li>
                @endif
                @if($catHome->num_elev_object != null && $catHome->num_elev_object != "")
                    <li>
                        <span class="title">จำนวนลิฟต์ขนส่ง :</span>
                        <span class="info">{{ $catHome->num_elev_object }} ตัว</span>
                    </li>
                @endif
                @if($catHome->ratio_elev != null && $catHome->ratio_elev != "")
                    <li>
                        <span class="title">อัตราส่วนลิฟต์ : ยูนิตพักอาศัย :</span>
                        <span class="info">{{ $catHome->ratio_elev }}</span>
                    </li>
                @endif
                @if($catHome->num_parking != null && $catHome->num_parking != "")
                    <li>
                        <span class="title">จำนวนที่จอดรถ :</span>
                        <span class="info">{{ $catHome->num_parking }} คัน</span>
                    </li>
                @endif
                @if($catHome->percent_parking != null && $catHome->percent_parking != "")
                    <li>
                        <span class="title">เปอร์เซ็นที่จอดรถ :</span>
                        <span class="info">{{ $catHome->percent_parking }} เปอร์เซ็น</span>
                    </li>
                @endif
                @if($catHome->home_type_per_area != null && $catHome->home_type_per_area != "")
                    <li>
                        <span class="title">รูปแบบบ้าน : พื้นที่เริ่มต้น :</span>
                        <span class="info">{!! str_replace("\n","<br>", $catHome->home_type_per_area) !!}</span>
                    </li>
                @endif
                @if($catHome->home_area != null && $catHome->home_area != "")
                    <li>
                        <span class="title">พื้นที่บ้านเริ่มต้น :</span>
                        <span class="info">{!! str_replace("\n","<br>", $catHome->home_area) !!}</span>
                    </li>
                @endif
                @if($catHome->home_material != null && $catHome->home_material != "")
                    <li>
                        <span class="title">การก่อสร้างตัวบ้าน :</span>
                        <span class="info">{!! str_replace("\n","<br>", $catHome->home_material) !!}</span>
                    </li>
                @endif
                @if($catHome->home_style != null && $catHome->home_style != "")
                    <li>
                        <span class="title">สไตล์การออกแบบ :</span>
                        <span class="info">{!! str_replace("\n","<br>", $catHome->home_style) !!}</span>
                    </li>
                @endif
                @if($catHome->eia != null && $catHome->eia != "")
                    <li>
                        <span class="title">โครงการผ่าน EIA :</span>
                        <span class="info">@if($catHome->eia == null) - @elseif($catHome->eia == true) ผ่าน @else ไม่ผ่าน @endif</span>
                    </li>
                @endif
                @if($catHome->sell_price_from != null && $catHome->sell_price_from != ""
                    && $catHome->sell_price_to != null && $catHome->sell_price_to != "")
                    <li>
                        <span class="title">ช่วงราคาขาย :</span>
                        <span class="info">
                            {{ $catHome->sell_price_from }} &nbsp; ถึง &nbsp; {{ $catHome->sell_price_to }} &nbsp;&nbsp;&nbsp;บาท
                        </span>
                    </li>
                @endif
                @if($catHome->construct_date != null && $catHome->construct_date != "")
                    <li>
                        <span class="title">เริ่มก่อสร้าง :</span>
                        <span class="info">{{ \App\Models\AllFunction::getDateThai($catHome->construct_date) }}</span>
                    </li>
                @endif
                @if($catHome->finish_date != null && $catHome->finish_date != "")
                    <li>
                        <span class="title">คาดว่าแล้วเสร็จ :</span>
                        <span class="info">{{ \App\Models\AllFunction::getDateThai($catHome->finish_date) }}</span>
                    </li>
                @endif
                @if($catHome->website != null && $catHome->website != "")
                    <li>
                        <span class="title">เว็บไซต์โครงการ :</span>
                        <span class="info">{{ $catHome->website }}</span>
                    </li>
                @endif
                @if($brand->facebook != null && $brand->facebook != "")
                    <li>
                        <span class="title">Facebook :</span>
                        <span class="info">{{ $brand->facebook }}</span>
                    </li>
                @endif
                @if($catHome->sell_price != null && $catHome->sell_price != "")
                    <li>
                        <span class="title">ราคาเริ่มต้น :</span>
                        <span class="info">
                            <span style="color: #55a79a; font-size:22px;">{{ $catHome->sell_price }}</span> &nbsp;<span style="color: #55a79a;"> บาท </span>
                        </span>
                    </li>
                @endif
                @if($catHome->sell_price_detail != null && $catHome->sell_price_detail != "")
                    <li>
                        <span class="title">รายละเอียดราคา :</span>
                        <span class="info">{!! str_replace("\n","<br>", $catHome->sell_price_detail) !!}</span>
                    </li>
                @endif
            </ul>
        </div>

        @if($catHome->status == 0)
            รอรีวิว
        @else
            @if(($catHome->spare_price != "") || ($catHome->central_price != "") || ($facility != null && count($facility) > 0)
                || ($catHome->facility_str != null && $catHome->facility_str != "") || ($bts != null && count($bts) != 0)
                || ($mrt != null && count($mrt) != 0) || ($apl != null && count($apl) != 0) || ($catHome->nearby_str != "")
                || ($promotion != null && count($promotion) > 0) || ($catHome->promotion_str != null && $catHome->promotion_str != ""))
                <div class="location">
                    <h3>รายละเอียดอื่นๆ :</h3>
                    <ul>
                        @if($catHome->spare_price != "")
                            <li>
                                <span class="title">กองทุนสำรอง :</span>
                                <span class="info">{{ $catHome->spare_price }} &nbsp;&nbsp;&nbsp; บ/ตร.ว.</span>
                            </li>
                        @endif
                        @if($catHome->central_price != "")
                            <li>
                                <span class="title">ค่าส่วนกลาง :</span>
                                <span class="info">{{ $catHome->central_price }} &nbsp;&nbsp;&nbsp; บ/ตร.ว.</span>
                            </li>
                        @endif
                        @if($facility != null && count($facility) > 0)
                            <li>
                                <span class="title">สิ่งอำนวยความสะดวก :</span>
                                <span class="info">
                                    @foreach($facility as $fac)
                                        {{ \App\Models\Facility::getFacilityName($fac->facility_id) }}&nbsp;&nbsp;
                                    @endforeach
                                </span>
                            </li>
                        @endif
                        @if($catHome->facility_str != null && $catHome->facility_str != "")
                            <li>
                                <span class="title"> @if($facility != null && count($facility) > 0) สิ่งอำนวยความสะดวกอื่นๆ : @else สิ่งอำนวยความสะดวก : @endif</span>
                                <span class="info">
                                    {{ $catHome->facility_str }}
                                </span>
                            </li>
                        @endif
                        @if($bts != null && count($bts) != 0)
                            <li>
                                <span class="title">BTS :</span>
                                <span class="info">
                                    @foreach($bts as $item)
                                        {{ \App\Models\Bts::getBtsName($item->bts_id) }}&nbsp;&nbsp;
                                    @endforeach
                                </span>
                            </li>
                        @endif
                        @if($mrt != null && count($mrt) != 0)
                            <li>
                                <span class="title">MRT :</span>
                                <span class="info">
                                    @foreach($mrt as $item)
                                        {{ \App\Models\Mrt::getMrtName($item->mrt_id) }}&nbsp;&nbsp;
                                    @endforeach
                                </span>
                            </li>
                        @endif
                        @if($apl != null && count($apl) != 0)
                            <li>
                                <span class="title">Airport Rail Link :</span>
                                <span class="info">
                                    @foreach($apl as $item)
                                        {{ \App\Models\AirportRailLink::getAplinkName($item->apl_id) }}&nbsp;&nbsp;
                                    @endforeach
                                </span>
                            </li>
                        @endif
                        @if($catHome->nearby_str != "")
                            <li>
                                <span class="title">Airport Rail Link :</span>
                                <span class="info">
                                    {{ $catHome->nearby_str }}
                                </span>
                            </li>
                        @endif
                        @if($promotion != null && count($promotion) > 0)
                            <li>
                                <span class="title">ส่วนลด โปรโมชั่น :</span>
                                <span class="info">
                                    @foreach($promotion as $item)
                                        {{ \App\Models\Promotion::getPromotionName($item->promotion_id) }}&nbsp;&nbsp;
                                    @endforeach
                                </span>
                            </li>
                        @endif
                        @if($catHome->promotion_str != null && $catHome->promotion_str != "")
                            <li>
                                <span class="title"> @if($catHome->promotion_str != null && $catHome->promotion_str != "")ส่วนลด โปรโมชั่นอื่นๆ : @else ส่วนลด โปรโมชั่น : @endif</span>
                                <span class="info">
                                    @foreach($promotion as $item)
                                        {{ \App\Models\Promotion::getPromotionName($item->promotion_id) }}&nbsp;&nbsp;
                                    @endforeach
                                </span>
                            </li>
                        @endif
                    </ul>
                </div>
            @endif

            <div id="collapsible-panels" class="data-project">
                <a href="#" class="head-data active">รีวิวทำเลและการเดินทาง</a>
                <div class="detail">
                    @for($i=3; $i<=10; $i++)
                        @if($catHomePic[$i] != null && count($catHomePic[$i]) > 0)
                            <?php
                            $pics = $catHomePic[$i]; // Array Pics
                            $firstInLoop = true;
                            ?>
                            @foreach($pics as $pic)
                                <div>
                                    @if($firstInLoop)
                                        <div>
                                            <span class="title"><?php echo \App\Models\AllFunction::getTitleCatHomePic($pic->pic_for); ?></span>
                                        </div>
                                        <?php $firstInLoop = false; ?>
                                    @endif
                                    <div>
                                        <img src="{{ $pic->filepath }}" alt="{{ $pic->filename }}" />
                                    </div>
                                    <div>
                                        @if($pic->description != null && $pic->description != "")
                                            <?php $pieces = explode("\n", $pic->description); ?>
                                            @foreach($pieces as $pdesc)
                                                <p class="description">
                                                    {!! str_replace(" ", "&nbsp", $pdesc) !!}
                                                </p>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endfor
                </div>

                <a href="#" class="head-data active">รีวิวส่วนกลาง</a>
                <div class="detail">
                    @for($i=11; $i<=18; $i++)
                        @if($catHomePic[$i] != null && count($catHomePic[$i]) > 0)
                            <?php
                            $pics = $catHomePic[$i]; // Array Pics
                            $firstInLoop = true;
                            ?>
                            @foreach($pics as $pic)
                                <div>
                                    @if($firstInLoop)
                                        <div>
                                            <span class="title"><?php echo \App\Models\AllFunction::getTitleCatHomePic($pic->pic_for); ?></span>
                                        </div>
                                        <?php $firstInLoop = false; ?>
                                    @endif
                                    <div>
                                        <img src="{{ $pic->filepath }}" alt="{{ $pic->filename }}" />
                                    </div>
                                    <div>
                                        @if($pic->description != null && $pic->description != "")
                                            <?php $pieces = explode("\n", $pic->description); ?>
                                            @foreach($pieces as $pdesc)
                                                <p class="description">
                                                    {!! str_replace(" ", "&nbsp", $pdesc) !!}
                                                </p>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endfor
                </div>

                <a href="#" class="head-data active">รีวิวผังโครงการ</a>
                <div class="detail">
                    @for($i=19; $i<=19; $i++)
                        @if($catHomePic[$i] != null && count($catHomePic[$i]) > 0)
                            <?php
                            $pics = $catHomePic[$i]; // Array Pics
                            $firstInLoop = true;
                            ?>
                            @foreach($pics as $pic)
                                <div>
                                    @if($firstInLoop)
                                        <div>
                                            <span class="title"><?php echo \App\Models\AllFunction::getTitleCatHomePic($pic->pic_for); ?></span>
                                        </div>
                                        <?php $firstInLoop = false; ?>
                                    @endif
                                    <div>
                                        <img src="{{ $pic->filepath }}" alt="{{ $pic->filename }}" />
                                    </div>
                                    <div>
                                        @if($pic->description != null && $pic->description != "")
                                            <?php $pieces = explode("\n", $pic->description); ?>
                                            @foreach($pieces as $pdesc)
                                                <p class="description">
                                                    {!! str_replace(" ", "&nbsp", $pdesc) !!}
                                                </p>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endfor
                </div>

                <a href="#" class="head-data active">รีวิวบ้านตัวอย่าง</a>
                <div class="detail">
                    @for($i=20; $i<=31; $i++)
                        @if($catHomePic[$i] != null && count($catHomePic[$i]) > 0)
                            <?php
                            $pics = $catHomePic[$i]; // Array Pics
                            $firstInLoop = true;
                            ?>
                            @foreach($pics as $pic)
                                <div>
                                    @if($firstInLoop)
                                        <div>
                                            <span class="title"><?php echo \App\Models\AllFunction::getTitleCatHomePic($pic->pic_for); ?></span>
                                        </div>
                                        <?php $firstInLoop = false; ?>
                                    @endif
                                    <div>
                                        <img src="{{ $pic->filepath }}" alt="{{ $pic->filename }}" />
                                    </div>
                                    <div>
                                        @if($pic->description != null && $pic->description != "")
                                            <?php $pieces = explode("\n", $pic->description); ?>
                                            @foreach($pieces as $pdesc)
                                                <p class="description">
                                                    {!! str_replace(" ", "&nbsp", $pdesc) !!}
                                                </p>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endfor
                </div>

                <a href="#" class="head-data active">รีวิวบ้านรับมอบ</a>
                <div class="detail">
                    @for($i=32; $i<=43; $i++)
                        @if($catHomePic[$i] != null && count($catHomePic[$i]) > 0)
                            <?php
                            $pics = $catHomePic[$i]; // Array Pics
                            $firstInLoop = true;
                            ?>
                            @foreach($pics as $pic)
                                <div>
                                    @if($firstInLoop)
                                        <div>
                                            <span class="title"><?php echo \App\Models\AllFunction::getTitleCatHomePic($pic->pic_for); ?></span>
                                        </div>
                                        <?php $firstInLoop = false; ?>
                                    @endif
                                    <div>
                                        <img src="{{ $pic->filepath }}" alt="{{ $pic->filename }}" />
                                    </div>
                                    <div>
                                        @if($pic->description != null && $pic->description != "")
                                            <?php $pieces = explode("\n", $pic->description); ?>
                                            @foreach($pieces as $pdesc)
                                                <p class="description">
                                                    {!! str_replace(" ", "&nbsp", $pdesc) !!}
                                                </p>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endfor
                </div>

                <p class="remark">* ข้อมูล และภาพถ่ายต่างๆ อาจมีการเปลี่ยนแปลง โดยทางเราไม่จำเป็นต้องแจ้งให้ทราบล่วงหน้า</p>
            </div>
        @endif
    </div>

    <div class="boxContactProject">
        <h2>ติดต่อโครงการ</h2>
        <div class="call">
            <p>ติดต่อ : {{ $brand->brand_name }}</p>
            <p class="number">{{ $brand->telephone }}</p>
        </div>
    </div>

    <div class="boxTag">
        <h2>Tags : </h2>
        <div class="tags">
            @if($tag != null && count($tag) > 0)
                @foreach($tag as $item)
                    <a href="#">{{ App\Models\TagSub::getTagSubName($item->tag_sub_id) }}</a>
                @endforeach
            @endif
        </div>
        <div class="buttonfb">
            <div><img src="{{ asset('images/test/fb.jpg') }}" /></div>
            <p class="text">ฝากกด like และ share เพื่อเป็นกำลังใจเจ้าของกระทู้ด้วยนะคะ</p>
        </div>
        <div class="comment-fb">
            <div class="fb-comments" data-href="{{ Request::fullUrl() }}" data-width="873"
                 data-numposts="10" data-order-by="reverse_time"></div>
        </div>
    </div>

    <div class="boxFinan">
        <h2>ข้อมูลไฟแนนซ์</h2>
        <div class="form-finan">
            <div class="left">
                <h3>คำนวนค่างวดผ่อนบ้าน</h3>
                <ul>
                    <li>
                        <span class="title">ราคาบ้าน</span>
                        <input type="text" class="enter-data" />
                        <span>บาท</span>
                    </li>
                    <li>
                        <span class="title">จอง</span>
                        <input type="text" class="enter-data" />
                        <span></span>
                    </li>
                    <li>
                        <span class="title">ดาวน์</span>
                        <input type="text" class="enter-data-2" />
                        <span>บาท</span>
                        <span>หรือ</span>
                        <input type="text" class="enter-data-3" />
                        <span>%</span>
                    </li>
                    <li>
                        <span class="title">โอน</span>
                        <input type="text" class="enter-data" />
                        <span></span>
                    </li>
                    <li>
                        <span class="title">ระยะเวลาผ่อนชำระ</span>
                        <input type="text" class="enter-data" />
                        <span></span>
                    </li>
                    <li>
                        <span class="title orange">อัตราดอกเบี้ยต่อปี</span>
                        <input type="text" class="enter-data" />
                        <span>%</span>
                    </li>
                </ul>
                <div class="button">
                    <input type="submit" value="" class="btn-calculate" />
                    <input type="button" class="btn-cancel" />
                </div>
            </div>
            <div class="right">
                <h3>ติดต่อธนาคารเพื่อรับสินเชื่อ</h3>
                <ul>
                    <li><a href="#"><img src="{{ asset('images/logo/tmb.jpg') }}" alt="" /></a></li>
                    <li><a href="#"><img src="{{ asset('images/logo/ktb.jpg') }}" alt="" /></a></li>
                    <li><a href="#"><img src="{{ asset('images/logo/krungsri.png') }}" alt="" /></a></li>
                    <li><a href="#"><img src="{{ asset('images/logo/kasikorn.jpg') }}" alt="" /></a></li>

                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <div class="boxShowBrand">
        <h2>แสดงโครงการตามแบรนด์</h2>
        <ul>
            <li><a href="#"><img src="{{ asset('images/logo/sansiri.jpg') }}" alt="" /></a></li>
            <li><a href="#"><img src="{{ asset('images/logo/ap.jpg') }}" alt="" /></a></li>
            <li><a href="#"><img src="{{ asset('images/logo/gusto.jpg') }}" alt="" /></a></li>
            <li><a href="#"><img src="{{ asset('images/logo/prinsiri.jpg') }}" alt="" /></a></li>
            <li><a href="#"><img src="{{ asset('images/logo/lpn.jpg') }}" alt="" /></a></li>
            <li><a href="#"><img src="{{ asset('images/logo/perfect.jpg') }}" alt="" /></a></li>
            <li><a href="#"><img src="{{ asset('images/logo/noble.jpg') }}" alt="" /></a></li>
            <li><a href="#"><img src="{{ asset('images/logo/pruksa.jpg') }}" alt="" /></a></li>
            <li><a href="#"><img src="{{ asset('images/logo/casa.jpg') }}" alt="" /></a></li>
            <li><a href="#"><img src="{{ asset('images/logo/udelight.jpg') }}" alt="" /></a></li>
            <li><a href="#"><img src="{{ asset('images/logo/ucampus.jpg') }}" alt="" /></a></li>
            <li><a href="#"><img src="{{ asset('images/logo/scasset.jpg') }}" alt="" /></a></li>
        </ul>
        <div class="clear"></div>
    </div>

@stop