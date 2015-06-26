@extends('layouts.main_v2')

@section('jshome')

@stop

@section('jsbody')

@stop

@section('content')

    <!-- Home, Townhome, Condo -->
    <div class="boxreview">
        <h2>โครงการบ้านใหม่</h2>
        <div class="list-review">
            <ul>
                @if($catHome != null)
                    @foreach($catHome as $item)
                        <li>
                            @if($item->vip)
                                <p class="tag-vip"><img src="{{ asset('images/blulet/vip.png') }}" alt="" /></p>
                            @endif
                            <div class="left">
                                <div class="showpic">
                                    <?php
                                    if($item->id == null)
                                    {
                                        $pics = \App\Models\Picture::where('pictureable_id', '=', $item->pictureable_id)
                                                ->where('pictureable_type', '=', 'App\\Models\\CatHome')
                                                ->get();
                                    }
                                    else
                                    {
                                        $pics = \App\Models\Picture::where('pictureable_id', '=', $item->id)
                                                ->where('pictureable_type', '=', 'App\\Models\\CatHome')
                                                ->get();
                                    }
                                    ?>
                                    @if(count($pics) >= 5)
                                        <p class="pic-hilight">
                                            <img src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                                 style="width: 256px; height: 156px;" />
                                        </p>
                                        <div class="other">
                                            <img src="{{ $pics[1]->file_path }}" alt="{{ $pics[1]->file_name }}"
                                                 style="width: 80px; height: 70px;" />
                                            <img src="{{ $pics[2]->file_path }}" alt="{{ $pics[2]->file_name }}"
                                                 style="width: 80px; height: 70px;" />
                                            <img src="{{ $pics[3]->file_path }}" alt="{{ $pics[3]->file_name }}"
                                                 style="width: 80px; height: 70px;" />
                                            <img src="{{ $pics[4]->file_path }}" alt="{{ $pics[4]->file_name }}"
                                                 style="width: 80px; height: 70px;" />
                                        </div>
                                    @else
                                        <p class="pic-hilight">
                                            <img src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                                 style="width: 256px; height: 156px;" />
                                        <div class="other">
                                            <?php $count = count($pics); ?>
                                            @for($i=1; $i<$count; $i++)
                                                <img src="{{ $pics[$i]->file_path }}" alt="{{ $pics[$i]->file_name }}"
                                                     style="width: 80px; height: 70px;" />
                                            @endfor
                                        </div>
                                        </p>
                                    @endif
                                    <div class="clear"></div>
                                </div>
                                <h3>{{ $item->title }}</h3>
                                <p class="update">วันที่ลงประกาศ  {{ \App\Models\AllFunction::getDateTimeThai($item->created_at) }}</p>
                                <p>{{ $item->subtitle }}</p>
                            </div>
                            <div class="right">
                                <p class="text-price">ราคาเริ่มต้น</p>
                                <p class="price">&nbsp;&nbsp;{{ $item->sell_price }}</p>
                                <div class="rating">
                                    @if($item->avg_rating != null)
                                        &nbsp;&nbsp;<span class="label-success"> {{ $item->avg_rating }} คะแนน</span>
                                        <!--<img src="images/test/rating.jpg" alt="" />-->
                                    @else
                                        &nbsp;&nbsp;<span class="label-success">ยังไม่มีการให้คะแนน</span>
                                    @endif
                                </div>
                                <div class="call">
                                    <?php $brand = \App\Models\Brand::find($item->brand_id) ?>
                                    <p>ติดต่อ : {{ $brand->brand_name }}</p>
                                    <p class="number">{{ $brand->telephone }}</p>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>

    <div class="page_link">
        {!! str_replace('/?', '?', $catHome->render()) !!}
    </div>

@stop