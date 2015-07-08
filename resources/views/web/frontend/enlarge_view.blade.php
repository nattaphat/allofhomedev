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
        .boxreview h2{
            background:none;
            height:46px;
            text-indent:0;
            margin-bottom:0px;
            color: #5cc5c1;
            display: block;
            padding-right: 20px;
            float: left;
            margin-top: 0px;
        }
        .boxreview h2.lineColor {
            display: inline;
            width: 621px;
            padding-right: 0px;
            margin-top: 20px;
            background-color: #5cc5c1;
            height: 6px;
        }
        .lineDescription
        {
            position: relative;
            top: -15px;
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
                <h2>ข้อมูลเจ้าของร้านค้า</h2>
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
            <h2>ติดต่อเจ้าของร้านค้า</h2>
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
                <a href="mailto:?Subject={{ $catConstruct->title }}&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 {{ Request::fullUrl() }}">
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
                <a href="http://www.tumblr.com/share/link?url={{ Request::fullUrl() }}&amp;title={{ $catConstruct->title }}" target="_blank">
                    <img src="{{ asset('images/logo/tumblr.png') }}" alt="Tumblr" />
                </a>

                <!-- Twitter -->
                <a href="https://twitter.com/share?url={{ Request::fullUrl() }}&amp;name={{ $catConstruct->title }}&amp;hashtags=allofhome" target="_blank">
                    <img src="{{ asset('images/logo/twitter.png') }}" alt="Twitter" />
                </a>
            </div>
            <a href="#" class="btn-favorite">เพิ่มเป็นรายการโปรด</a>
        </div>
    </div>

    <div class="boxMap">
        <h2>พิกัดที่ตั้งร้านค้า :</h2>
        <div class="map-google">
            {!! $map['html'] !!}
        </div>
        <a href="#" class="btn-searchggm">ค้าหาเส้นทางจาก Google Map</a>
    </div>

    <div class="boxVdoReview">
        @if($catConstruct->video_url != null && $catConstruct->video_url != "")
            <?php
            $iframe = \App\Models\AllFunction::convertYoutube($catConstruct->video_url);
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
                <h3>ข้อมูลบริษัทเจ้าของร้านค้า :</h3>
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
                    @if($catConstruct->website != null && $catConstruct->website != "")
                        <li>
                            <span class="title">เว็บไซต์ :</span>
                            <span class="info">{{ $catConstruct->website }}</span>
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
            <h3>ข้อมูลเบื้องต้นร้านค้า :</h3>
            <ul>
                <li>
                    <span class="title">ชื่อร้านค้า :</span>
                    <span class="info">{{ $brand->brand_name }}</span>
                </li>
                <li>
                    <span class="title">ที่ตั้งร้านค้า :</span>
                    <span class="info">{{ $catConstruct->getFullPrjAddress($catConstruct->id) }}</span>
                </li>


                @if($catConstruct->service_day_time != null && $catConstruct->service_day_time != "")
                    <li>
                        <span class="title">วันเวลาเปิดบริการ :</span>
                        <span class="info">{!! str_replace("\n","<br>", $catConstruct->service_day_time) !!}</span>
                    </li>
                @endif

                @if($catConstruct->credit_card != null && $catConstruct->credit_card != "")
                    <li>
                        <span class="title">บริการบัตรเครดิต :</span>
                        <span class="info">{{ ($catConstruct->credit_card) == true? "มี" : "ไม่มี"  }}</span>
                    </li>
                @endif

                @if($catConstruct->parking != null && $catConstruct->parking != "")
                    <li>
                        <span class="title">ที่จอดรถ :</span>
                        <span class="info">{{ ($catConstruct->parking) == true? "มี" : "ไม่มี" }}</span>
                    </li>
                @endif

                @if($catConstruct->website != null && $catConstruct->website != "")
                    <li>
                        <span class="title">เว็บไซต์ร้านค้า :</span>
                        <span class="info">{{ $catConstruct->website }}</span>
                    </li>
                @endif
                @if($brand->facebook != null && $brand->facebook != "")
                    <li>
                        <span class="title">Facebook :</span>
                        <span class="info">{{ $brand->facebook }}</span>
                    </li>
                @endif

            </ul>
        </div>

        @if($pic != null && count($pic) > 0)
            <div id="collapsible-panels" class="data-project">
                <a href="#" class="head-data">ผลงาน</a>
                <div class="detail">
                    @foreach($pic as $p)
                        <div>
                            <div>
                                <img src="{{ $p->file_path }}" alt="{{ $p->file_name }}" />
                            </div>
                            <div>
                                @if($p->description != null && $p->description != "")
                                    <?php $pieces = explode("\n", $p->description); ?>
                                    @foreach($pieces as $pdesc)
                                        <p class="description">
                                            {!! str_replace(" ", "&nbsp", $pdesc) !!}
                                        </p>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <p class="remark">* ข้อมูล และภาพถ่ายต่างๆ อาจมีการเปลี่ยนแปลง โดยทางเราไม่จำเป็นต้องแจ้งให้ทราบล่วงหน้า</p>
            </div>
        @endif

    </div>

    <div class="boxContactProject">
        <h2>ติดต่อร้านค้า</h2>
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
        <div class="comment-fb"><img src="{{ asset('images/test/commentfb.jpg') }}" /></div>
    </div>

    <div class="boxShowBrand">
        <h2>แสดงร้านค้าตามแบรนด์</h2>
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