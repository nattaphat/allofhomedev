@extends('layouts.tag_list')

@section('jshome')
    <style type="text/css">
        .boxArticle h2{
            background:none;
            height:46px;
            text-indent:0;
            margin-bottom:0px;
            color: #5cc5c1;
            display: block;
            padding-right: 20px;
            float: left;
        }
        .boxArticle h2.lineColor {
            display: inline;
            width: 801px;
            padding-right: 0px;
            margin-top: 23px;
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

    <!-- Article -->
    <div class="boxArticle">
        <h2>ค้นหา</h2>
        <h2 class="lineColor"></h2>
        <div class="clear"></div>
        <span class="lineDescription">รายการที่ค้นหา</span>

        <div class="list-article">
            <ul>
                @if($searchCatConstruct != null && count($searchCatConstruct) > 0)
                    @foreach($searchCatConstruct as $item)
                        <?php $urlTo =  url("shop/")."/"; ?>
                        <li>
                            <?php
                            $pics = \App\Models\Picture::where('pictureable_id', '=', $item->id)
                                    ->where('pictureable_type', '=', 'App\\Models\\CatConstruct')
                                    ->get();
                            ?>
                            <p class="pic">
                                @if(isset($pics) && count($pics) > 0)
                                    <a href="{{ $urlTo.$item->id }}">
                                        <img data-src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                             style="width: 250px; height: 150px;" /></a>
                                @else
                                    &nbsp;
                                @endif
                            </p>
                            <div class="text">
                                <h3><a href="{{ $urlTo.$item->id }}">{{ $item->title }}</a></h3>
                                <p class="update">วันที่ลงประกาศ  {{ \App\Models\AllFunction::getDateTimeThai($item->created_at) }}</p>
                                <?php
                                $subtitle = str_replace("<p class=\"p1\">","<p>",$item->subtitle);
                                if (preg_match_all('~<p>(?P<paragraphs>.*?)</p>~is', $subtitle, $matches))
                                {
                                    $str = "";
                                    for($i=0; $i< count($matches['paragraphs']); $i++)
                                    {
                                        $str = $str."<br>".$matches['paragraphs'][$i];
                                    }
                                    echo '<p class="p-subtitle">'.preg_replace('/^(?:<br\s*\/?>\s*)+/', '', $str).'</p>';
                                }
                                else
                                {
                                    echo '<p class="p-subtitle">'.$item->subtitle.'</p>';
                                }
                                ?>
                            </div>
                            <div class="clear"></div>
                        </li>
                    @endforeach
                @endif

                @if($searchPictureCatConstruct != null && count($searchPictureCatConstruct) > 0)
                    <?php $last_pictureable_id = "" ?>
                    @foreach($searchPictureCatConstruct as $item)
                        <?php
                            if($item->pictureable_id == $last_pictureable_id)
                                continue;
                            else
                                $last_pictureable_id = $item->pictureable_id;

                            $urlTo =  url("shop/")."/";
                            $find = $searchCatConstruct->find($item->pictureable_id);
                        ?>
                        @if($find == null)
                            <?php
                                $cat = \App\Models\CatConstruct::find($item->pictureable_id);
                            ?>
                            <li>
                                <?php
                                $pics = \App\Models\Picture::where('pictureable_id', '=', $cat->id)
                                        ->where('pictureable_type', '=', 'App\\Models\\CatConstruct')
                                        ->get();
                                ?>
                                <p class="pic">
                                    @if(isset($pics) && count($pics) > 0)
                                        <a href="{{ $urlTo.$cat->id }}">
                                            <img data-src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                                 style="width: 250px; height: 150px;" /></a>
                                    @else
                                        &nbsp;
                                    @endif
                                </p>
                                <div class="text">
                                    <h3><a href="{{ $urlTo.$cat->id }}">{{ $cat->title }}</a></h3>
                                    <p class="update">วันที่ลงประกาศ  {{ \App\Models\AllFunction::getDateTimeThai($cat->created_at) }}</p>
                                    <?php
                                    $subtitle = str_replace("<p class=\"p1\">","<p>",$cat->subtitle);
                                    if (preg_match_all('~<p>(?P<paragraphs>.*?)</p>~is', $subtitle, $matches))
                                    {
                                        $str = "";
                                        for($i=0; $i< count($matches['paragraphs']); $i++)
                                        {
                                            $str = $str."<br>".$matches['paragraphs'][$i];
                                        }
                                        echo '<p class="p-subtitle">'.preg_replace('/^(?:<br\s*\/?>\s*)+/', '', $str).'</p>';
                                    }
                                    else
                                    {
                                        echo '<p class="p-subtitle">'.$cat->subtitle.'</p>';
                                    }
                                    ?>
                                </div>
                                <div class="clear"></div>
                            </li>
                        @endif
                    @endforeach
                @endif

                @if($searchCatArticle != null && count($searchCatArticle) > 0)
                    @foreach($searchCatArticle as $item)
                        <?php $urlTo =  url("article/")."/"; ?>
                        <li>
                            <?php
                            $pics = \App\Models\Picture::where('pictureable_id', '=', $item->id)
                                    ->where('pictureable_type', '=', 'App\\Models\\CatArticle')
                                    ->get();
                            ?>
                            <p class="pic">
                                @if(isset($pics) && count($pics) > 0)
                                    <a href="{{ $urlTo.$item->id }}">
                                        <img data-src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                             style="width: 250px; height: 150px;" /></a>
                                @else
                                    &nbsp;
                                @endif
                            </p>
                            <div class="text">
                                <h3><a href="{{ $urlTo.$item->id }}">{{ $item->title }}</a></h3>
                                <p class="update">วันที่ลงประกาศ  {{ \App\Models\AllFunction::getDateTimeThai($item->created_at) }}</p>
                                <?php
                                $subtitle = str_replace("<p class=\"p1\">","<p>",$item->subtitle);
                                if (preg_match_all('~<p>(?P<paragraphs>.*?)</p>~is', $subtitle, $matches))
                                {
                                    $str = "";
                                    for($i=0; $i< count($matches['paragraphs']); $i++)
                                    {
                                        $str = $str."<br>".$matches['paragraphs'][$i];
                                    }
                                    echo '<p class="p-subtitle">'.preg_replace('/^(?:<br\s*\/?>\s*)+/', '', $str).'</p>';
                                }
                                else
                                {
                                    echo '<p class="p-subtitle">'.$item->subtitle.'</p>';
                                }
                                ?>
                            </div>
                            <div class="clear"></div>
                        </li>
                    @endforeach
                @endif

                @if($searchPictureCatArticle != null && count($searchPictureCatArticle) > 0)
                    <?php $last_pictureable_id = "" ?>
                    @foreach($searchPictureCatArticle as $item)
                        <?php
                        if($item->pictureable_id == $last_pictureable_id)
                            continue;
                        else
                            $last_pictureable_id = $item->pictureable_id;

                        $urlTo =  url("article/")."/";
                        $find = $searchCatArticle->find($item->pictureable_id);
                        ?>
                        @if($find == null)
                            <?php
                            $cat = \App\Models\CatArticle::find($item->pictureable_id);
                            ?>
                            <li>
                                <?php
                                $pics = \App\Models\Picture::where('pictureable_id', '=', $cat->id)
                                        ->where('pictureable_type', '=', 'App\\Models\\CatArticle')
                                        ->get();
                                ?>
                                <p class="pic">
                                    @if(isset($pics) && count($pics) > 0)
                                        <a href="{{ $urlTo.$cat->id }}">
                                            <img data-src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                                 style="width: 250px; height: 150px;" /></a>
                                    @else
                                        &nbsp;
                                    @endif
                                </p>
                                <div class="text">
                                    <h3><a href="{{ $urlTo.$cat->id }}">{{ $cat->title }}</a></h3>
                                    <p class="update">วันที่ลงประกาศ  {{ \App\Models\AllFunction::getDateTimeThai($cat->created_at) }}</p>
                                    <?php
                                    $subtitle = str_replace("<p class=\"p1\">","<p>",$cat->subtitle);
                                    if (preg_match_all('~<p>(?P<paragraphs>.*?)</p>~is', $subtitle, $matches))
                                    {
                                        $str = "";
                                        for($i=0; $i< count($matches['paragraphs']); $i++)
                                        {
                                            $str = $str."<br>".$matches['paragraphs'][$i];
                                        }
                                        echo '<p class="p-subtitle">'.preg_replace('/^(?:<br\s*\/?>\s*)+/', '', $str).'</p>';
                                    }
                                    else
                                    {
                                        echo '<p class="p-subtitle">'.$cat->subtitle.'</p>';
                                    }
                                    ?>
                                </div>
                                <div class="clear"></div>
                            </li>
                        @endif
                    @endforeach
                @endif

                @if($searchCatIdea != null && count($searchCatIdea) > 0)
                    @foreach($searchCatIdea as $item)
                        <?php $urlTo =  url("idea/")."/"; ?>
                        <li>
                            <?php
                            $pics = \App\Models\Picture::where('pictureable_id', '=', $item->id)
                                    ->where('pictureable_type', '=', 'App\\Models\\CatIdea')
                                    ->get();
                            ?>
                            <p class="pic">
                                @if(isset($pics) && count($pics) > 0)
                                    <a href="{{ $urlTo.$item->id }}">
                                        <img data-src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                             style="width: 250px; height: 150px;" /></a>
                                @else
                                    &nbsp;
                                @endif
                            </p>
                            <div class="text">
                                <h3><a href="{{ $urlTo.$item->id }}">{{ $item->title }}</a></h3>
                                <p class="update">วันที่ลงประกาศ  {{ \App\Models\AllFunction::getDateTimeThai($item->created_at) }}</p>
                                <?php
                                $subtitle = str_replace("<p class=\"p1\">","<p>",$item->subtitle);
                                if (preg_match_all('~<p>(?P<paragraphs>.*?)</p>~is', $subtitle, $matches))
                                {
                                    $str = "";
                                    for($i=0; $i< count($matches['paragraphs']); $i++)
                                    {
                                        $str = $str."<br>".$matches['paragraphs'][$i];
                                    }
                                    echo '<p class="p-subtitle">'.preg_replace('/^(?:<br\s*\/?>\s*)+/', '', $str).'</p>';
                                }
                                else
                                {
                                    echo '<p class="p-subtitle">'.$item->subtitle.'</p>';
                                }
                                ?>
                            </div>
                            <div class="clear"></div>
                        </li>
                    @endforeach
                @endif

                @if($searchPictureCatIdea != null && count($searchPictureCatIdea) > 0)
                    <?php $last_pictureable_id = "" ?>
                    @foreach($searchPictureCatIdea as $item)
                        <?php
                        if($item->pictureable_id == $last_pictureable_id)
                            continue;
                        else
                            $last_pictureable_id = $item->pictureable_id;

                        $urlTo =  url("idea/")."/";
                        $find = $searchCatIdea->find($item->pictureable_id);
                        ?>
                        @if($find == null)
                            <?php
                            $cat = \App\Models\CatIdea::find($item->pictureable_id);
                            ?>
                            <li>
                                <?php
                                $pics = \App\Models\Picture::where('pictureable_id', '=', $cat->id)
                                        ->where('pictureable_type', '=', 'App\\Models\\CatIdea')
                                        ->get();
                                ?>
                                <p class="pic">
                                    @if(isset($pics) && count($pics) > 0)
                                        <a href="{{ $urlTo.$cat->id }}">
                                            <img data-src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                                 style="width: 250px; height: 150px;" /></a>
                                    @else
                                        &nbsp;
                                    @endif
                                </p>
                                <div class="text">
                                    <h3><a href="{{ $urlTo.$cat->id }}">{{ $cat->title }}</a></h3>
                                    <p class="update">วันที่ลงประกาศ  {{ \App\Models\AllFunction::getDateTimeThai($cat->created_at) }}</p>
                                    <?php
                                    $subtitle = str_replace("<p class=\"p1\">","<p>",$cat->subtitle);
                                    if (preg_match_all('~<p>(?P<paragraphs>.*?)</p>~is', $subtitle, $matches))
                                    {
                                        $str = "";
                                        for($i=0; $i< count($matches['paragraphs']); $i++)
                                        {
                                            $str = $str."<br>".$matches['paragraphs'][$i];
                                        }
                                        echo '<p class="p-subtitle">'.preg_replace('/^(?:<br\s*\/?>\s*)+/', '', $str).'</p>';
                                    }
                                    else
                                    {
                                        echo '<p class="p-subtitle">'.$cat->subtitle.'</p>';
                                    }
                                    ?>
                                </div>
                                <div class="clear"></div>
                            </li>
                        @endif
                    @endforeach
                @endif

            </ul>
        </div>
    </div>

@stop