@if($catIdea != null)
    @foreach($catIdea as $item)
        <li>
            <?php
            $pics = \App\Models\Picture::where('pictureable_id', '=', $item['id'])
                    ->where('pictureable_type', '=', 'App\\Models\\CatIdea')
                    ->get();
            ?>
            <p class="pic">
                @if(isset($pics) && count($pics) > 0)
                    <a href="{{ url('idea')."/".$item['id'] }}">
                        <img src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                             style="width: 250px; height: 150px;" /></a>
                @else
                    &nbsp;
                @endif
            </p>
            <div class="text">
                <h3><a href="{{ url('idea')."/".$item['id'] }}">{{ $item['title'] }}</a></h3>
                <p class="update">วันที่ลงประกาศ  {{ \App\Models\AllFunction::getDateTimeThai($item['created_at']) }}</p>
                <?php
                $subtitle = str_replace("<p class=\"p1\">","<p>",$item['subtitle']);
                $subtitle = str_replace("<p align=\"left\">","<p>",$subtitle);
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
                    echo '<p class="p-subtitle">'.$item['subtitle'].'</p>';
                }
                ?>
            </div>
            <div class="clear"></div>
        </li>
    @endforeach
@endif