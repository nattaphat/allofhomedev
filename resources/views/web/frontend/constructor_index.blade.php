@extends('layouts.main_v2')

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
            width: 682px;
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
    <!-- Construct -->
    <div class="boxArticle">
        <h2>ผู้รับเหมาก่อสร้าง</h2>
        <h2 class="lineColor"></h2>
        <div class="clear"></div>
        <span class="lineDescription">ข้อมูลบริษัทผู้รับเหมาก่อสร้างชั้นนำ</span>

        <div class="list-article">
            <ul>
                @if($cat != null)
                    @foreach($cat as $item)
                        <li>
                            <?php
                            if($item->id == null)
                            {
                                $pics = \App\Models\Picture::where('pictureable_id', '=', $item->pictureable_id)
                                        ->where('pictureable_type', '=', 'App\\Models\\CatConstruct')
                                        ->get();
                            }
                            else
                            {
                                $pics = \App\Models\Picture::where('pictureable_id', '=', $item->id)
                                        ->where('pictureable_type', '=', 'App\\Models\\CatConstruct')
                                        ->get();
                            }
                            ?>
                            <p class="pic">
                                <a href="{{ url("constructor")."/".$item->id }}">
                                <img src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                     style="width: 250px; height: 150px;" /></a>
                            </p>
                            <div class="text">
                                <h3><a href="{{ url("constructor")."/".$item->id }}">{{ $item->title }}</a></h3>
                                <p class="update">วันที่ลงประกาศ  {{ \App\Models\AllFunction::getDateTimeThai($item->created_at) }}</p>
                                <p>{{ $item->subtitle }}</p>
                            </div>
                            <div class="clear"></div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>

    <div class="page_link">
        {!! str_replace('/?', '?', $cat->render()) !!}
    </div>

@stop