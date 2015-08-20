@if(isset($articleItems)&& $articleItems != null && count($articleItems) > 0)
    <div class="hilight-content">
        <div class="left">
            {{--<ul>--}}
            {{--<li>--}}
            {{--<div class="pic"><img data-src="{{ asset('images/test/pic-2.jpg') }}" alt="" /></div>--}}
            {{--<div class="tag-day">--}}
            {{--<p>02</p>--}}
            {{--<p>มีค 2558</p>--}}
            {{--</div>--}}
            {{--<div class="text-hilight">--}}
            {{--<h2>เรื่อง: Furniture Show 2015 วันที่ 13-21 มิ.ย. 58</h2>--}}
            {{--<p>Furniture Show 2015 ระหว่างวันที่ 13-21 มิถุนายน 2558 ศูนย์แสดงสินค้าและการประชุม อิมแพ็ค เมืองทองธานี</p>--}}
            {{--</div>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<div class="pic"><img data-src="{{ asset('images/test/pic-2.jpg') }}" alt="" /></div>--}}
            {{--<div class="tag-day">--}}
            {{--<p>02</p>--}}
            {{--<p>มีค 2558</p>--}}
            {{--</div>--}}
            {{--<div class="text-hilight">--}}
            {{--<h2>เรื่อง: Furniture Show 2015 วันที่ 13-21 มิ.ย. 58</h2>--}}
            {{--<p>Furniture Show 2015 ระหว่างวันที่ 13-21 มิถุนายน 2558 ศูนย์แสดงสินค้าและการประชุม อิมแพ็ค เมืองทองธานี</p>--}}
            {{--</div>--}}
            {{--</li>--}}
            {{--</ul>--}}

            <div id="articleSlider" class="flexslider">
                <ul class="slides">
                    @foreach($articleItems as $item)
                        <?php
                        $pics = \App\Models\Picture::getUrlPicture($item->id, 'App\\Models\\CatArticle');
                        ?>
                        <li>
                            <div class="pic" style="width: 555px;">
                                @if($pics != null && count($pics) > 0)
                                    <img data-src="{{ $pics[0]->file_path }}" alt="" />
                                @endif
                            </div>
                            <div class="text-hilight" style="width: 500px;">
                                <a href="{{ url('article')."/".$item->id }}"><h3 class="article-title">
                                        {{ $item->title }}
                                    </h3></a>
                                <p class="article-subtitle">{{ $item->subtitle }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
        <div class="right">
            <!-- Banner D -->
            @if($bannerD != null)
                @if(isset($bannerD[0]))
                    <div class="side-banner">
                        <a href="{{ $bannerD[0]->url }}" target="_blank">
                            <img data-src="{{ $bannerD[0]->file_path }}" alt="{{ $bannerD[0]->banner_name }}" width="300" height="250" />
                        </a>
                    </div>
                @endif
                @if(isset($bannerD[1]))
                    <div class="side-banner">
                        <a href="{{ $bannerD[1]->url }}" target="_blank">
                            <img data-src="{{ $bannerD[1]->file_path }}" alt="{{ $bannerD[1]->banner_name }}" width="300" height="250" />
                        </a>
                    </div>
                @endif
            @endif
        </div>
        <div class="clear"></div>
    </div>
@endif