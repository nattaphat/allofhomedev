<div class="boxMember">
    <div class="left">
        <div class="profile">
            <h2>ข้อมูลเจ้าของร้านค้า</h2>
            <div class="detail">
                <div class="pic-profile">
                    <p><img data-src="{{ \App\Models\Brand::getPathLogo($brand->id) }}" alt="" width="150" height="150"
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
                <div style="clear: both; color: #646464; font-size: 22px; line-height: 23px; height:46px; overflow: hidden;">
                    {{ $brand->brand_name }}
                </div>
                <div class="clear"></div>
            </div>
            @if($brand->display_button == "line")
                <a href="{{ $brand->line_url }}" target="_blank" class="btn-addfriend"></a>
            @elseif($brand->display_button == "facebook")
                <a href="{{ $brand->facebook }}" target="_blank" class="btn-addfriend"></a>
            @elseif($brand->display_button == "website")
                <a href="{{ $catConstruct->website }}" target="_blank" class="btn-addfriend"></a>
            @elseif($brand->display_button == "telephone")
                <a href="{{ $brand->telephone }}" target="_blank" class="btn-addfriend"></a>
            @endif
        </div>
    </div>

    <div class="right">
        <h2>ติดต่อเจ้าของร้านค้า</h2>
        <div class="form">
            {!! Form::text('subject', null, ['placeholder' => 'หัวข้อ']) !!}
            {!! Form::textarea('body', null, ['placeholder' => 'ข้อความ']) !!}
            {!! Form::text('name_contact_back', null, ['placeholder' => 'ชื่อติดต่อกลับ']) !!}
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
                <img data-src="{{ asset('images/logo/email.png') }}" alt="Email" />
            </a>

            <?php
            $test = 'http://www.facebook.com/sharer.php?s=100&p[title]=' .
                    \App\Models\AllFunction::encodeURIComponent('Title') .
                    '&p[summary]=' . \App\Models\AllFunction::encodeURIComponent('Description') .
                    '&p[url]=' . \App\Models\AllFunction::encodeURIComponent(Request::fullUrl()) .
                    '&p[images][0]=' . \App\Models\AllFunction::encodeURIComponent(asset('images/logo/google.png'));
            ?>

            <!-- Facebook -->
            {{--<a class="share-fb-btn" href="http://www.facebook.com/sharer.php?u={{ Request::fullUrl() }}" target="_blank">--}}
                {{--<img data-src="{{ asset('images/logo/facebook.png') }}" alt="Facebook" />--}}
            {{--</a>--}}

            <a rel="nofollow" class="sh-face" href="http://www.facebook.com/sharer.php?u={{ Request::fullUrl() }}" target="_blank">
                <img data-src="{{ asset('images/logo/facebook.png') }}" alt="Facebook" />
            </a>

            <!-- Google+ -->
            <a href="https://plus.google.com/share?url={{ Request::fullUrl() }}" target="_blank">
                <img data-src="{{ asset('images/logo/google.png') }}" alt="Google" />
            </a>

            <!-- LinkedIn -->
            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ Request::fullUrl() }}" target="_blank">
                <img data-src="{{ asset('images/logo/linkedin.png') }}" alt="LinkedIn" />
            </a>

            <!-- Print -->
            <a href="javascript:;" onclick="window.print()">
                <img data-src="{{ asset('images/logo/print.png') }}" alt="Print" />
            </a>
            <!-- Tumblr-->
            <a href="http://www.tumblr.com/share/link?url={{ Request::fullUrl() }}&amp;title={{ $catConstruct->title }}" target="_blank">
                <img data-src="{{ asset('images/logo/tumblr.png') }}" alt="Tumblr" />
            </a>

            <!-- Twitter -->
            <a href="https://twitter.com/share?url={{ Request::fullUrl() }}&amp;name={{ $catConstruct->title }}&amp;hashtags=allofhome" target="_blank">
                <img data-src="{{ asset('images/logo/twitter.png') }}" alt="Twitter" />
            </a>
        </div>
        <a href="#" class="btn-favorite">เพิ่มเป็นรายการโปรด</a>
    </div>
</div>

@if($catConstruct->latitude != null && $catConstruct->latitude != ""
    && $catConstruct->longitude != null && $catConstruct->longitude != "")
    <div class="boxMap">
        <h2>พิกัดที่ตั้งร้านค้า :</h2>
        <div class="map-google">
            {!! $map['html'] !!}
        </div>
        <a href="#" class="btn-searchggm">ค้าหาเส้นทางจาก Google Map</a>
    </div>
@endif

<div class="boxVdoReview">
    @if($catConstruct->video_url != null && $catConstruct->video_url != "")
        <?php
        $iframe = \App\Models\AllFunction::convertYoutube($catConstruct->video_url);
        ?>
        @if($iframe != "")
            <h2>วิดีโอรีวิว :</h2>
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
                @if($brand->brand_name != null && $brand->brand_name != "")
                    <li>
                        <span class="title">ชื่อร้านค้า :</span>
                        <span class="info">{{ $brand->brand_name }}</span>
                    </li>
                @endif
                <?php $location = $catConstruct->getFullPrjAddress($catConstruct->id); ?>
                @if($location != null && $location != "")
                    <li>
                        <span class="title">ที่ตั้งร้านค้า :</span>
                        <span class="info">{{ $location }}</span>
                    </li>
                @endif
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

                @if($brand->telephone != null && $brand->telephone != "")
                    <li>
                        <span class="title">เบอร์โทรศัพท์ :</span>
                        <span class="info">{{ $brand->telephone }}</span>
                    </li>
                @endif

                @if($brand->email != null && $brand->email != "")
                    <li>
                        <span class="title">อีเมล์ :</span>
                        <span class="info">{{ $brand->email }}</span>
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

                @if($catConstruct->sell_price != null && $catConstruct->sell_price != "")
                    <li>
                        <span class="title">ราคาเริ่มต้น :</span>
                    <span class="info">
                        <span style="color: #55a79a; font-size:22px;">{{ $catConstruct->sell_price }}</span> &nbsp;<span style="color: #55a79a;"> บาท </span>
                    </span>
                    </li>
                @endif
                @if($catConstruct->sell_price_detail != null && $catConstruct->sell_price_detail != "")
                    <li>
                        <span class="title">รายละเอียดราคา :</span>
                        <span class="info">{!! str_replace("\n","<br>", $catConstruct->sell_price_detail) !!}</span>
                    </li>
                @endif

            </ul>
        </div>
        <div class="right">
            <div class="rating">
                <span><img data-src="{{ asset('images/blulet/bstar-y.png') }}" alt="" /></span>
                <span><img data-src="{{ asset('images/blulet/bstar-y.png') }}" alt="" /></span>
                <span><img data-src="{{ asset('images/blulet/bstar-y.png') }}" alt="" /></span>
                <span><img data-src="{{ asset('images/blulet/bstar-y.png') }}" alt="" /></span>
                <span><img data-src="{{ asset('images/blulet/bstar-g.png') }}" alt="" /></span>
            </div>
            <p class="text">คะแนนกำหนดจากให้ดาวจากผู้ใช้งานจริง</p>
            <div class="scoll">
                <h3>โครงสร้างคะแนน</h3>
                <ul>
                    <li>
                        <span><img data-src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                        <span><img data-src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                        <span><img data-src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                        <span><img data-src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                        <span><img data-src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                    </li>
                    <li>
                        <span><img data-src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                        <span><img data-src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                        <span><img data-src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                        <span><img data-src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                    </li>
                    <li>
                        <span><img data-src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                        <span><img data-src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                        <span><img data-src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                    </li>
                    <li>
                        <span><img data-src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                        <span><img data-src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                    </li>
                    <li>
                        <span><img data-src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>

    </div>

    @if($pic != null && count($pic) > 0)
        <div id="collapsible-panels" class="data-project">
            <a href="#" class="head-data active">ผลงาน</a>
            <div class="detail">
                @foreach($pic as $p)
                    <div>
                        <div>
                            <img data-src="{{ $p->file_path }}" alt="{{ $p->file_name }}" />
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
                <a href="{{ url('tag_list')."/".$item->tag_sub_id }}" target="_blank">{{ App\Models\TagSub::getTagSubName($item->tag_sub_id) }}</a>
            @endforeach
        @endif
    </div>
    <div class="buttonfb">
        <div>
            <div class="fb-like" data-href="https://www.facebook.com/allofhome" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
        </div>
        <p class="text">ฝากกด like และ share เพื่อเป็นกำลังใจเจ้าของกระทู้ด้วยนะคะ</p>
    </div>
    <div class="comment-fb">
        <div class="fb-comments" data-href="http://103.4.217.227/shop/18" data-width="873" data-numposts="10"></div>
    </div>
</div>

@include('layouts._partials.brand_part')