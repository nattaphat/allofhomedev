<ul>
    @if($catArticleVip != null)
        @foreach($catArticleVip as $item)
            <li>
                <?php
                $pics = \App\Models\Picture::where('pictureable_id', '=', $item->id)
                        ->where('pictureable_type', '=', 'App\\Models\\CatArticle')
                        ->get();
                ?>
                <p class="pic">
                    @if(isset($pics) && count($pics) > 0)
                        <a href="{{ url('article')."/".$item->id }}">
                            <img data-src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                 style="width: 250px; height: 150px;" /></a>
                    @else
                        &nbsp;
                    @endif
                </p>
                <div class="text">
                    <h3><a href="{{ url('article')."/".$item->id }}">{{ $item->title }}</a></h3>
                    <p class="update">วันที่ลงประกาศ  {{ \App\Models\AllFunction::getDateTimeThai($item->created_at) }}</p>
                    <p class="p-subtitle">{{ $item->subtitle }}</p>
                </div>
                <div class="clear"></div>
            </li>
        @endforeach
    @endif
    @if($catArticle != null)
        @foreach($catArticle as $item)
            <li>
                <?php
                $pics = \App\Models\Picture::where('pictureable_id', '=', $item->id)
                        ->where('pictureable_type', '=', 'App\\Models\\CatArticle')
                        ->get();
                ?>
                <p class="pic">
                    @if(isset($pics) && count($pics) > 0)
                        <a href="{{ url('article')."/".$item->id }}">
                            <img data-src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                 style="width: 250px; height: 150px;" /></a>
                    @else
                        &nbsp;
                    @endif
                </p>
                <div class="text">
                    <h3><a href="{{ url('article')."/".$item->id }}">{{ $item->title }}</a></h3>
                    <p class="update">วันที่ลงประกาศ  {{ \App\Models\AllFunction::getDateTimeThai($item->created_at) }}</p>
                    <p class="p-subtitle">{{ $item->subtitle }}</p>
                </div>
                <div class="clear"></div>
            </li>
        @endforeach
    @endif
</ul>
<a class="btn-viewmore" href="#">ดูเพิ่มเติม</a>
{!! str_replace('/?', '?', $catArticle->render()) !!}