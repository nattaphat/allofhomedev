@extends('layouts.main_v2')

@section('jshome')

@stop

@section('jsbody')

@stop

@section('content')

    <!-- Home, Townhome, Condo -->
    <div class="boxArticle">
        <h2>รีวิวโครงการ</h2>
        <div class="list-article">
            <ul>
                @if($catReview != null)
                    @foreach($catReview as $item)
                        <li>
                            <?php
                            if($item->id == null)
                            {
                                $pics = \App\Models\Picture::where('pictureable_id', '=', $item->pictureable_id)
                                        ->where('pictureable_type', '=', 'App\\Models\\CatReview')
                                        ->get();
                            }
                            else
                            {
                                $pics = \App\Models\Picture::where('pictureable_id', '=', $item->id)
                                        ->where('pictureable_type', '=', 'App\\Models\\CatReview')
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
        {!! str_replace('/?', '?', $catReview->render()) !!}
    </div>
@stop