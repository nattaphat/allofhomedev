@extends('layouts.main')

@section('body')
<body class="page page-backstretch-boxed page-boxed">
<!-- Backstretch Plugin Invoke backstretch using data-toggle="backstretch" on any element. Options: data-backstretch-target="SELECTOR" - element to apply backstretch to [element requires height & width or to wrap other elements], if blank it will attach to the full page data-backstretch-imgs="IMAGES" - a common separated list of images to use, multiple images will be made into a slideshow data-duration="MILLISECONDS" - the amount of time in between slides data-fade="MILLISECONDS" - value that determines how quickly the next image will fade in data-backstretch-overlay="false" - default to true, applies semi transparent overlay to the backstretch target data-backstretch-overlay-opacity="0.4" - the opacity value of the overlay, default is 0.7 setting via CSS -->
    <div data-toggle="backstretch" data-backstretch-target="self" data-backstretch-overlay-opacity="0.7" data-backstretch-imgs="img/backstretch/runners-unsplash.jpg,img/backstretch/fence-unsplash.jpg,img/backstretch/view-unsplash.jpg,img/backstretch/bails-unsplash.jpg">
@overwrite

@section('content')
<div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="font-xs-x5 font-md-x5">
            Backstretch Plugin <i class="fa fa-expand primary-colour font-xs-x4 font-md-x5"></i>
          </h2>
          <p>A simple jQuery plugin that allows you to add a dynamically-resized, slideshow-capable background image to any page or element seamless integrated into AppStrap.</p>
          <p>Invoke backstretch using data-toggle="backstretch" on any element.</p>
          <h3>
            Options:
          </h3>
          <ul>
            <li>
              <code>data-backstretch-target="SELECTOR"</code>
              - element to apply backstretch to, if blank it will attach to the full page
            </li>
            <li>
              <code>data-backstretch-imgs="IMAGES"</code>
              - a common separated list of images to use, multiple images will be made into a slideshow
            </li>
            <li>
              <code>data-duration="MILLISECONDS"</code>
              - the amount of time in between slides
            </li>
            <li>
              <code>data-fade="MILLISECONDS"</code>
              - value that determines how quickly the next image will fade in
            </li>
            <li>
              <code>data-backstretch-overlay="false"</code>
              - default to true, applies semi transparent overlay to the backstretch target
            </li>
            <li>
              <code>data-backstretch-overlay-opacity="0.4"</code>
              - the opacity value of the overlay (0 - 1), default is 0.7 setting via CSS
            </li>
          </ul>
          <p>
            Example:
            <br />
            <pre class="language-markup">
              <code>&lt;div data-toggle="backstretch" data-backstretch-imgs="img/backstretch/runners-unsplash.jpg,img/backstretch/fence-unsplash.jpg,img/backstretch/view-unsplash.jpg,img/backstretch/bails-unsplash.jpg">&lt;/div></code>
            </pre>
          </p>
        </div>
      </div>
    </div>
@stop