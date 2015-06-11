<div class="row" style="margin-top: 20px;">
    <div class="col-md-3">
        @include('layouts._partials.left_menu')
    </div>

    <?php
        //dd(url::current());

        $catArticle = null;
        if(url::current() == "http://localhost/allofhomedev/public")
        {
            $catArticle = \App\Models\CatArticle::whereRaw('for_cat like \'%"1"%\'')->get();
        }
        else if(strrpos(url::current(), "/home") > 0)
        {
            $catArticle = \App\Models\CatArticle::whereRaw('for_cat like \'%"2"%\'')->get();
        }
        else if(strrpos(url::current(), "/townhome") > 0)
        {
            $catArticle = \App\Models\CatArticle::whereRaw('for_cat like \'%"3"%\'')->get();
        }
        else if(strrpos(url::current(), "/condo") > 0)
        {
            $catArticle = \App\Models\CatArticle::whereRaw('for_cat like \'%"4"%\'')->get();
        }
        else if(strrpos(url::current(), "/review") > 0)
        {
            $catArticle = \App\Models\CatArticle::whereRaw('for_cat like \'%"5"%\'')->get();
        }
        else if(strrpos(url::current(), "/idea") > 0)
        {
            $catArticle = \App\Models\CatArticle::whereRaw('for_cat like \'%"6"%\'')->get();
        }
        else if(strrpos(url::current(), "/article") > 0)
        {
            $catArticle = \App\Models\CatArticle::whereRaw('for_cat like \'%"7"%\'')->get();
        }
        else
        {
            $catArticle = \App\Models\CatArticle::whereRaw('for_cat like \'%"1"%\'')->get();
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


