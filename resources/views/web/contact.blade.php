@extends('layouts.main')

@section('content')
<div class="container" id="about">
    <div class="row">
        <!-- sidebar -->
        <div class="col-md-3 sidebar">
            <!-- Sections Menu-->
            @include('layouts._partials.about_menu')
        </div>
      <!--main content-->
      <div class="col-md-9">
        <h2 class="title-divider">
          <span>Contact <span class="de-em">Us</span></span>
          <small>Ways To Get In Touch</small>
        </h2>
        <div class="row">
          <div class="col-md-6">
            <form id="contact-form" action="#" role="form">
              <div class="form-group">
                <label class="sr-only" for="contact-name">Name</label>
                <input type="text" class="form-control" id="contact-name" placeholder="Name">
              </div>
              <div class="form-group">
                <label class="sr-only" for="contact-email">Email</label>
                <input type="email" class="form-control" id="contact-email" placeholder="Email">
              </div>
              <div class="form-group">
                <label class="sr-only" for="contact-message">Message</label>
                <textarea rows="12" class="form-control" id="contact-message" placeholder="Message"></textarea>
              </div>
              <input type="button" class="btn btn-primary" value="Send Message">
            </form>
          </div>
          <div class="col-md-6">
            <p>
              <abbr title="Phone"><i class="fa fa-phone"></i></abbr>
              019223 8092344
            </p>
            <p>
              <abbr title="Email"><i class="fa fa-envelope"></i></abbr>
              info@appstrap.me
            </p>
            <p>
              <abbr title="Address"><i class="fa fa-home"></i></abbr>
              Sunshine House, Sunville. SUN12 8LU.
            </p>
            <p>
              <a href="https://maps.google.co.uk/maps?q=London&amp;ie=UTF8&amp;hq=&amp;hnear=London,+United+Kingdom&amp;gl=uk&amp;t=m&amp;ll=51.510238,-0.127029&amp;spn=0.042735,0.102654&amp;z=12&amp;">
                <img src="img/misc/map.png" alt="Location map" class="img-thumbnail" />
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop