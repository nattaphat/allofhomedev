<div class="boxreview">
    @if($pic != null && count($pic) > 0)
    <h2 class="h-review-inner">รีวิวโครงการ</h2>
    @endif
    <div class="pic-project">
        @if($pic != null && count($pic) > 0)
        <div class="preview">
            <div id="slider" class="flexslider" style="margin: 0 0 0 0px; background: #5fc4c2; border: 2px solid #5fc4c2;">
                <ul class="slides">
                    <?php $k = 0; ?>
                    @foreach($pic as $p)
                        <li>
                            <img src="{{ $p->file_path }}" alt="{{ $p->file_name }}" width="642" height="402" />
                        </li>
                        <?php $k++; if($k == 8){ break; } ?>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="list-preview">
            <ul class="list-preview-ul">
                <?php $k = 0; ?>
                @foreach($pic as $p)
                    <li>
                        <img src="{{ $p->file_path }}" alt="{{ $p->file_name }}" width="106" height="93" />
                    </li>
                    <?php $k++; if($k == 8){ break; } ?>
                @endforeach
            </ul>
        </div>
        <div class="clear"></div>
        @endif
        <div class="text-preview">
            <h3>{{ $catHome->title }}</h3>
            <p style="text-indent: 20px;">{{ $catHome->subtitle }}</p>
        </div>
    </div>
</div>
