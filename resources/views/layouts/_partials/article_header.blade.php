@if(isset($articleItems) && count($articleItems) > 0)
    <div class="hilight-content">
        <div class="left">
            {{--<ul>--}}
                {{--<li>--}}
                    {{--<div class="pic"><img src="{{ asset('images/test/pic-2.jpg') }}" alt="" /></div>--}}
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
                    {{--<div class="pic"><img src="{{ asset('images/test/pic-2.jpg') }}" alt="" /></div>--}}
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
                            <div class="pic">
                                @if($pics != null && count($pics) > 0)
                                    <img src="{{ $pics[0]->file_path }}" alt="" />
                                @endif
                            </div>
                            <div class="text-hilight">
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
            <!-- Banner C, D -->
            <div class="side-banner"><img src="{{ asset('images/test/pic-3.jpg') }}" alt="" /></div>
            <div class="side-banner"><img src="{{ asset('images/test/pic-4.jpg') }}" alt="" /></div>
        </div>
        <div class="clear"></div>
    </div>
@endif