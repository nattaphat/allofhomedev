<section class="slider">

    <div class="row" style="padding: 20px 80px 20px 80px;">
        <div id="slider_category" class="flexslider">
            <ul class="slides">
                <?php
                if($pic != null && count($pic) > 0)
                {
                    foreach($pic as $p)
                    {
                        ?>
                    <li>
                        <img src="{{ $p->file_path }}" alt="{{ $p->file_path }}" class="img-responsive" />
                        <p class="flex-caption">{{ $p->description }}</p>
                    </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>

</section>