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
            width: 808px;
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
        <h2>Tags</h2>
        <h2 class="lineColor"></h2>
        <div class="clear"></div>
        <span class="lineDescription">รายการ Tags</span>

        <div class="list-article">
            <ul>
                @if($tag_list != null && count($tag_list) > 0)
                    @foreach($tag_list as $item)
                        <?php
                        $catTag = null;
                        $urlTo = "";
                        if($item->tagable_type == "App\\Models\\CatHome")
                        {
                            $catTag = \DB::table('cat_home')
                                    ->select('id', 'title','subtitle', 'created_at')
                                    ->where('id', '=', $item->tagable_id)
                                    ->get();
                            $urlTo =  url("home/view/")."/";
                        }
                        elseif($item->tagable_type == "App\\Models\\CatConstruct")
                        {
                            $catTag = \DB::table('cat_construct')
                                    ->select('id', 'title','subtitle', 'created_at')
                                    ->where('id', '=', $item->tagable_id)
                                    ->get();
                            $urlTo =  url("shop/")."/";
                        }
                        elseif($item->tagable_type == "App\\Models\\CatArticle")
                        {
                            $catTag = \DB::table('cat_article')
                                    ->select('id', 'title','subtitle', 'created_at')
                                    ->where('id', '=', $item->tagable_id)
                                    ->get();
                            $urlTo =  url("article/")."/";
                        }
                        elseif($item->tagable_type == "App\\Models\\CatIdea")
                        {
                            $catTag = \DB::table('cat_idea')
                                    ->select('id', 'title','subtitle', 'created_at')
                                    ->where('id', '=', $item->tagable_id)
                                    ->get();
                            $urlTo =  url("idea/")."/";
                        }
                        ?>

                        @if($catTag != null)
                            <li>
                                <?php
                                    $pics = \App\Models\Picture::where('pictureable_id', '=', $catTag[0]->id)
                                        ->where('pictureable_type', '=', $item->tagable_type)
                                        ->get();
                                ?>
                                <p class="pic">
                                    @if(isset($pics) && count($pics) > 0)
                                        <a href="{{ $urlTo.$item->id }}">
                                            <img src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                                 style="width: 250px; height: 150px;" /></a>
                                    @else
                                        &nbsp;
                                    @endif
                                </p>
                                <div class="text">
                                    <h3><a href="{{ $urlTo.$catTag[0]->id }}">{{ $catTag[0]->title }}</a></h3>
                                    <p class="update">วันที่ลงประกาศ  {{ \App\Models\AllFunction::getDateTimeThai($catTag[0]->created_at) }}</p>
                                    <p class="p-subtitle">{{ $catTag[0]->subtitle }}</p>
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