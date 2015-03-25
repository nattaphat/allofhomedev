@extends('layouts.main')

@section('content')
<div class="container" id="about">
    <h2 class="title-divider">
      <span>Timelines</span> 
      <small>5 New Timeline Options</small>
    </h2>
    <!-- Timeline 3: timeline-right -->
    <h3>
      Timeline 3: .timeline-right
    </h3>
    <div class="timeline timeline-right">
      <div class="timeline-breaker">The Start</div>
      <!--Timeline item 1-->
      <div class="timeline-item animated fadeIn de-02">
        <i class="fa fa-coffee fa-4x pull-left"></i> 
        <div class="timeline-item-date">Feb 2011</div>
        <h4 class="timeline-item-title">
          John & Mike Doe meet for first at Kings College London
        </h4>
        <p class="timeline-item-description">Camur commodo consequat inhibeo jumentum sino suscipere tincidunt. Augue brevitas ea facilisi macto pagus typicus vulpes.</p>
      </div>
      <!--Timeline item 2 - NOTE: the .right class-->
      <div class="timeline-item right animated fadeIn de-02">
        <i class="fa fa-rocket fa-4x pull-left"></i> 
        <div class="timeline-item-date">April 2011</div>
        <h4 class="timeline-item-title">
          John Doe launches first website
        </h4>
        <p class="timeline-item-description">Exputo olim verto. Autem hos mauris os pala. Dolore dolus esse gravis lenis modo pecus quia vereor.</p>
      </div>
      <div class="timeline-breaker timeline-breaker-middle">The Middle</div>
      <!--Timeline item 3- - NOTE: .highlight class -->
      <div class="timeline-item highlight animated fadeIn de-02">
        <i class="fa fa-group fa-4x pull-left"></i> 
        <div class="timeline-item-date">Sept 2011</div>
        <h4 class="timeline-item-title">
          The company was born
        </h4>
        <p class="timeline-item-description">Abbas camur dolor gemino illum neo nibh. Causa dolus elit incassum loquor metuo.</p>
      </div>
      <!--Timeline item 4 - NOTE: the .right class-->
      <div class="timeline-item right animated fadeIn de-02">
        <i class="fa fa-android fa-4x pull-left"></i> 
        <div class="timeline-item-date">Dec 2011</div>
        <h4 class="timeline-item-title">
          Company lands first major client
        </h4>
        <p class="timeline-item-description">Abigo commodo consequat laoreet luptatum melior pagus patria voco. Conventio neo tation.</p>
      </div>
      <div class="timeline-breaker timeline-breaker-bottom">To be continued........</div>
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