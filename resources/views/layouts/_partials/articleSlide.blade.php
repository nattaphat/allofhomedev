<div class="row" style="margin-top: 20px;">
    <div class="col-md-3">
        @include('layouts._partials.left_menu')
    </div>

    <?php
        $catArticle = null;
        if(strrpos(url::current(), "/home") > 0)
        {
            $catArticle = \App\Models\CatArticle::whereRaw('for_cat like \'%"2"%\'')
                    ->where('visible', '=', 'true')->take(5)->get();
        }
        else if(strrpos(url::current(), "/townhome") > 0)
        {
            $catArticle = \App\Models\CatArticle::whereRaw('for_cat like \'%"3"%\'')
                    ->where('visible', '=', 'true')->take(5)->get();
        }
        else if(strrpos(url::current(), "/condo") > 0)
        {
            $catArticle = \App\Models\CatArticle::whereRaw('for_cat like \'%"4"%\'')
                    ->where('visible', '=', 'true')->take(5)->get();
        }
        else if(strrpos(url::current(), "/enlarge") > 0)
        {
            $catArticle = \App\Models\CatArticle::whereRaw('for_cat like \'%"6"%\'')
                    ->where('visible', '=', '1')->take(5)->get();
        }
        else if(strrpos(url::current(), "/constructor") > 0)
        {
            $catArticle = \App\Models\CatArticle::whereRaw('for_cat like \'%"7"%\'')
                    ->where('visible', '=', 'true')->take(5)->get();
        }
        else if(strrpos(url::current(), "/construct") > 0)
        {
            $catArticle = \App\Models\CatArticle::whereRaw('for_cat like \'%"5"%\'')
                    ->where('visible', '=', 'true')->take(5)->get();
        }
        else if(strrpos(url::current(), "/shop") > 0)
        {
            $catArticle = \App\Models\CatArticle::whereRaw('for_cat like \'%"8"%\'')
                    ->where('visible', '=', 'true')->take(5)->get();
        }
        else if(strrpos(url::current(), "/garden") > 0)
        {
            $catArticle = \App\Models\CatArticle::whereRaw('for_cat like \'%"9"%\'')
                    ->where('visible', '=', 'true')->take(5)->get();
        }
        else if(strrpos(url::current(), "/clean") > 0)
        {
            $catArticle = \App\Models\CatArticle::whereRaw('for_cat like \'%"10"%\'')
                    ->where('visible', '=', 'true')->take(5)->get();
        }
        else if(strrpos(url::current(), "/interior") > 0)
        {
            $catArticle = \App\Models\CatArticle::whereRaw('for_cat like \'%"11"%\'')
                    ->where('visible', '=', 'true')->take(5)->get();
        }
        else if(strrpos(url::current(), "/land") > 0)
        {
            $catArticle = \App\Models\CatArticle::whereRaw('for_cat like \'%"12"%\'')
                    ->where('visible', '=', 'true')->take(5)->get();
        }
        else if(strrpos(url::current(), "/secondhand") > 0)
        {
            $catArticle = \App\Models\CatArticle::whereRaw('for_cat like \'%"13"%\'')
                    ->where('visible', '=', 'true')->take(5)->get();
        }
        else if(strrpos(url::current(), "/rent") > 0)
        {
            $catArticle = \App\Models\CatArticle::whereRaw('for_cat like \'%"14"%\'')
                    ->where('visible', '=', 'true')->take(5)->get();
        }
        else if(strrpos(url::current(), "/apartment") > 0)
        {
            $catArticle = \App\Models\CatArticle::whereRaw('for_cat like \'%"15"%\'')
                    ->where('visible', '=', 'true')->take(5)->get();
        }
        else if(strrpos(url::current(), "/article_idea") > 0)
        {
            $catArticle = \App\Models\CatArticle::whereRaw('for_cat like \'%"16"%\'')
                    ->where('visible', '=', 'true')->take(5)->get();
        }
        else
        {
            $catArticle = \App\Models\CatArticle::whereRaw('for_cat like \'%"1"%\'')
                    ->where('visible', '=', 'true')->take(5)->get();
        }
    ?>

    <div class="col-md-6">
        @if($catArticle != null && count($catArticle) > 0)
            <section class="slider">
                <div id="slider_allofhome" class="flexslider">
                    <ul class="slides">
                        @foreach($catArticle as $item)
                            <?php
                                $img = \App\Models\Picture::where("pictureable_type","=","App\\Models\\CatArticle")
                                        ->where("pictureable_id", "=", $item->id)->get();
                            ?>
                            <li>
                                <img src="{{ ($img != null && count($img) > 0)? $img[0]->file_path : "" }}" />
                                <div class="flex-caption" style="margin-top:0px;">
                                    <h5>
                                        <a href="{{ url("article/view") }}/{{ $item->id }}" style="color: #FFFFFF">เรื่อง: {{ $item->title }}</a>
                                    </h5>
                                    <div style="text-indent: 20px;">
                                        <p style="word-wrap: break-word;">{{ $item->subtitle }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        @endif
    </div>

    <div class="col-md-3">
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
    </div>
</div>


