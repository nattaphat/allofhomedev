@extends('layouts.main_v2')

@section('jshome')
    <!-- Starrr -->
    <link rel="stylesheet" type="text/css" media="screen" href={{ asset('js/lib/bootstrap-star-rating/css/star-rating.min.css') }}>

    <style type="text/css">
        .rating-xs {
            font-size: 14px;
        }
    </style>

@stop

@section('jsbody')
    <!-- Starrr -->
    <script type="text/javascript" src={{ asset('js/lib/bootstrap-star-rating/js/star-rating.min.js') }}></script>
@stop

@section('content')

    <!-- Article -->
    <div class="boxArticle">
        <h2>บทความและสาระน่ารู้</h2>
        <div class="list-article">
            <ul>
                @if($catArticle != null)
                @foreach($catArticle as $item)
                <li>
                    <?php
                    if($item->id == null)
                    {
                        $pics = \App\Models\Picture::where('pictureable_id', '=', $item->pictureable_id)
                                ->where('pictureable_type', '=', 'App\\Models\\CatArticle')
                                ->get();
                    }
                    else
                    {
                        $pics = \App\Models\Picture::where('pictureable_id', '=', $item->id)
                                ->where('pictureable_type', '=', 'App\\Models\\CatArticle')
                                ->get();
                    }
                    ?>
                    <p class="pic">
                        <img src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                             style="width: 250px; height: 150px;" />
                    </p>
                    <div class="text">
                        <h3><a href="#">{{ $item->title }}</a></h3>
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
        {!! str_replace('/?', '?', $catArticle->render()) !!}
    </div>

@stop