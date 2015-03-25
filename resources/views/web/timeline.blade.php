@extends('layouts.main')

@section('content')
<div class="container" id="about">
    <h2 class="title-divider">
      <span>Timelines</span> 
      <small>5 New Timeline Options</small>
    </h2>
    <!-- Timeline 1: default -->
    <h3>
      Timeline 1: Default
    </h3>
    <div class="timeline">
      <div class="timeline-breaker">2014</div>
      <!--Timeline item 0-->
      <div class="timeline-item animated fadeIn de-02">
        <img src="img/blog/frog.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
        <div class="margin-top-md timeline-item-date">Mon 9th Feb</div>
        <h4 class="timeline-item-title">
          <a href="#">Natu Similis Singularis Tamen Velit</a>
        </h4>
        <p class="timeline-item-description">Blandit caecus feugiat. Abluo bene in praesent quae saepius te. Diam nisl occuro turpis valde. Caecus occuro pertineo populus praemitto wisi ymo.</p>
      </div>
      <!--Timeline item 1-->
      <div class="timeline-item animated right fadeIn de-02">
        <img src="img/blog/ladybird.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
        <div class="margin-top-md timeline-item-date">Sun 8th Feb</div>
        <h4 class="timeline-item-title">
          <a href="#">Iriure Laoreet Luctus Secundum Verto</a>
        </h4>
        <p class="timeline-item-description">Cogo elit jugis ratis sagaciter suscipit. Blandit commodo eu. Commodo consequat eu haero hos immitto iustum jumentum letalis. Decet eu pala tamen veniam.</p>
      </div>
      <!--Timeline item 2-->
      <div class="timeline-item animated fadeIn de-02">
        <img src="img/blog/ape.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
        <div class="margin-top-md timeline-item-date">Mon 9th Feb</div>
        <h4 class="timeline-item-title">
          <a href="#">Aliquam Magna Mauris Nobis Os</a>
        </h4>
        <p class="timeline-item-description">Autem brevitas gilvus imputo iriure lucidus occuro pecus praesent venio. Antehabeo decet lobortis. Diam nutus pagus tation te. Exputo metuo neque nutus paratus quidem turpis vindico virtus.</p>
      </div>
      <!--Timeline item 3-->
      <div class="timeline-item animated highlight right fadeIn de-02">
        <img src="img/blog/fly.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
        <div class="margin-top-md timeline-item-date">Sun 8th Feb</div>
        <h4 class="timeline-item-title">
          <a href="#">Ideo Occuro Pecus Saluto Suscipit</a>
        </h4>
        <p class="timeline-item-description">Blandit dignissim dolore nobis nostrud occuro pagus proprius ut. Ad aliquam euismod laoreet plaga quibus ullamcorper voco wisi. Diam gravis olim refero rusticus ut volutpat.</p>
      </div>
      <div class="timeline-breaker timeline-breaker-middle">2013</div>
      <!--Timeline item 4-->
      <div class="timeline-item animated fadeIn de-02">
        <img src="img/blog/water-pump.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
        <div class="margin-top-md timeline-item-date">Wed 4th Feb</div>
        <h4 class="timeline-item-title">
          <a href="#">Adipiscing Iriure Paratus Persto Proprius</a>
        </h4>
        <p class="timeline-item-description">Aliquip hos jumentum nisl persto pneum quidem vel. Haero iaceo incassum inhibeo nisl nutus sagaciter uxor vulputate. Brevitas damnum obruo pneum populus sed.</p>
      </div>
      <!--Timeline item 5-->
      <div class="timeline-item animated right fadeIn de-02">
        <img src="img/blog/butterfly.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
        <div class="margin-top-md timeline-item-date">Fri 30th Jan</div>
        <h4 class="timeline-item-title">
          <a href="#">Abdo At Comis Genitus Usitas</a>
        </h4>
        <p class="timeline-item-description">Capto mauris os quae quidne. Brevitas conventio molior pneum saepius suscipere usitas. Abico ea modo obruo. Appellatio aptent distineo iusto.</p>
      </div>
      <!--Timeline item 6-->
      <div class="timeline-item animated fadeIn de-02">
        <img src="img/blog/bee.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
        <div class="margin-top-md timeline-item-date">Mon 9th Feb</div>
        <h4 class="timeline-item-title">
          <a href="#">Cui Dignissim Meus Roto Utrum</a>
        </h4>
        <p class="timeline-item-description">In praesent ratis secundum typicus ymo. Eum qui refoveo vindico. Accumsan haero iaceo sagaciter. Huic natu patria tation ullamcorper verto vindico.</p>
      </div>
      <!--Timeline item 7-->
      <div class="timeline-item animated right fadeIn de-02">
        <object width="560" height="315">
          <param name="movie" value="//www.youtube.com/v/YXVoqJEwqoQ?version=3&amp;hl=en_US&amp;rel=0"></param>
          <param name="allowFullScreen" value="true"></param>
          <param name="allowscriptaccess" value="always"></param>
          <embed src="//www.youtube.com/v/YXVoqJEwqoQ?version=3&amp;hl=en_US&amp;rel=0" type="application/x-shockwave-flash" width="560" height="315" allowscriptaccess="always" allowfullscreen="true"></embed>
        </object>
        <div class="margin-top-md timeline-item-date">Tue 27th Jan</div>
        <h4 class="timeline-item-title">
          <a href="#">Responsive Video Embed</a>
        </h4>
        <p class="timeline-item-description">Bene nisl ratis secundum. Autem letalis nimis paratus quia. Causa facilisis immitto loquor metuo odio os plaga. Aptent commodo eligo letalis ludus neque nutus occuro suscipere.</p>
      </div>
      <div class="timeline-breaker timeline-breaker-bottom">The End</div>
    </div>
    <!-- Timeline -->
    <h3 class="bordered-top-large">
      Options
    </h3>
    <p>4 Timeline variations (combine with .timeline) classes available:</p>
    <ol>
      <li>
        <strong><a href="timeline.htm">Default</a></strong>
        : class="timeline" = default, 2 items per row, floating left & right, timeline runs down the middle. Is stacked on mobile.
      </li>
      <li>
        <strong><a href="timeline-left.htm">timeline-left</a></strong>
        : class="timeline timeline-left" = 1 item per row, floating left, timeline runs down the left with markers aligned left
      </li>
      <li>
        <strong><a href="timeline-right.htm">timeline-right</a></strong>
        : class="timeline timeline-right" = 1 item per row, floating right, timeline runs down the right with markers aligned right
      </li>
      <li>
        <strong><a href="timeline-stacked.htm">timeline-stacked</a></strong>
        : class="timeline timeline-stacked" = posts stack on top of each other, 1 item per row, timeline runs down the middle, markers show above posts. Is default mobile layout.
      </li>
    </ol>
    <p>Timeline item (combine with .timeline-item) classes available:</p>
    <ol>
      <li><strong>overlap-off</strong> = drops the item overlap</li>
      <li><strong>overlap-pull-large</strong> = class to pull item up 120px</li>
      <li><strong>overlap-pull-small</strong> = class to pull item up 30px</li>
      <li><strong>overlap-push-large</strong> = class to push item down 120px</li>
      <li><strong>overlap-push-medium</strong> = class to push item down 60px</li>
      <li><strong>overlap-push-small</strong> = class to push item down 30px</li>
      <li><strong>right</strong> = pulls item to right</li>
      <li><strong>highlight</strong> = highlights the marker with primary colour</li>
    </ol>
  </div>
@stop