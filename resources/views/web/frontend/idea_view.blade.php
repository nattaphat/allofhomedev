@extends('layouts.main_view')

@section('jshome')

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
            width: 723px;
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

        .other_detail{
            margin-top: 20px;
        }

        .other_detail p{
            text-indent: 50px;
            margin-top: 10px;
            margin-left: 20px;
            margin-right: 20px;
            letter-spacing: 0.8px;
            line-height: 23px;
        }

    </style>
@stop

@section('jsbody')

@stop

@section('content')

    <div class="boxreview">

        <h2>ไอเดียแต่งบ้าน</h2>
        <h2 class="lineColor"></h2>
        <div class="clear"></div>
        <span class="lineDescription">DIY ด้วยตัวคุณเอง</span>

        <div class="pic-project">
            @if($pic != null && count($pic) > 0)
                <div class="preview">
                    <div id="slider" class="flexslider" style="margin: 0 0 0 0px;
                    /*background: #5fc4c2; */
                    /*border: 2px solid #5fc4c2;*/
                    border: none;
                    box-shadow: none;
                    ">
                        <ul class="slides">
                            <?php $k = 0; ?>
                            @foreach($pic as $p)
                                <li style="height: 402px;">
                                    <table style="height:100%;
                               width: 100%;
                               margin: 0;
                               padding: 0;
                               border: none;">
                                        <tr>
                                            <td style="vertical-align: middle;
                                       text-align: center;">
                                                <img data-src="{{ $p->file_path }}" alt="{{ $p->file_name }}" />
                                            </td>
                                        </tr>
                                    </table>
                                </li>
                                <?php $k++; if($k == 8){ break; } ?>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="list-preview">
                    <ul class="list-preview-ul">
                        <?php $k = 0; ?>
                        @foreach($pic as $p)
                            <li>
                                <img data-src="{{ $p->file_path }}" alt="{{ $p->file_name }}" width="106" height="93" />
                            </li>
                            <?php $k++; if($k == 8){ break; } ?>
                        @endforeach
                    </ul>
                </div>
                <div class="clear"></div>
            @endif
            <div class="text-preview" style="margin-top: 20px;">
                @if(isset($catIdea) && $catIdea != null)
                    <h3 style="line-height: 28px; letter-spacing: 1.25px;">{{ $catIdea->title }}</h3>
                    <p style="
                    line-height: 23px;
                    text-indent: 30px;
                    text-align: justify;
                    letter-spacing: 0.8px;
                    margin-top: 10px;
                    ">{{ $catIdea->subtitle }}</p>
                @endif
            </div>
        </div>
    </div>

    <div class="boxMember">
        <div class="button">
            <div id="share-buttons">
                <!-- Email -->
                <a href="mailto:?Subject={{ $catIdea->title }}&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 {{ Request::fullUrl() }}">
                    <img data-src="{{ asset('images/logo/email.png') }}" alt="Email" />
                </a>

                <!-- Facebook -->
                <a href="http://www.facebook.com/sharer.php?u={{ Request::fullUrl() }}" target="_blank">
                    <img data-src="{{ asset('images/logo/facebook.png') }}" alt="Facebook" />
                </a>

                <!-- Google+ -->
                <a href="https://plus.google.com/share?url={{ Request::fullUrl() }}" target="_blank">
                    <img data-src="{{ asset('images/logo/google.png') }}" alt="Google" />
                </a>

                <!-- LinkedIn -->
                <a href="http://www.linkedin.com/shareIdea?mini=true&amp;url={{ Request::fullUrl() }}" target="_blank">
                    <img data-src="{{ asset('images/logo/linkedin.png') }}" alt="LinkedIn" />
                </a>

                <!-- Print -->
                <a href="javascript:;" onclick="window.print()">
                    <img data-src="{{ asset('images/logo/print.png') }}" alt="Print" />
                </a>
                <!-- Tumblr-->
                <a href="http://www.tumblr.com/share/link?url={{ Request::fullUrl() }}&amp;title={{ $catIdea->title }}" target="_blank">
                    <img data-src="{{ asset('images/logo/tumblr.png') }}" alt="Tumblr" />
                </a>

                <!-- Twitter -->
                <a href="https://twitter.com/share?url={{ Request::fullUrl() }}&amp;name={{ $catIdea->title }}&amp;hashtags=allofhome" target="_blank">
                    <img data-src="{{ asset('images/logo/twitter.png') }}" alt="Twitter" />
                </a>
            </div>
            <a href="#" class="btn-favorite">เพิ่มเป็นรายการโปรด</a>
        </div>
    </div>

    <div class="boxVdoReview">
        @if($catIdea->video_url != null && $catIdea->video_url != "")
            <?php
            $iframe = \App\Models\AllFunction::convertYoutube($catIdea->video_url);
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

        @if($catIdea->other_detail != null && $catIdea->other_detail != "")
            <div class="other_detail">
                {!! $catIdea->other_detail !!}
            </div>
        @endif

        @if($pic != null && count($pic) > 0)
            <div id="collapsible-panels" class="data-project">
                <a href="#" class="head-data active">รายละเอียด</a>
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
            </div>
        @endif

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
            <div class="fb-comments" data-href="https://www.facebook.com/allofhome" data-width="873"
                 data-numposts="10" data-order-by="reverse_time"></div>
        </div>
    </div>

@stop