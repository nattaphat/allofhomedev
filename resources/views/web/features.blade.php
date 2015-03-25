@extends('layouts.main')

@section('content')
<div class="container">
    <!-- Services -->
    <div class="block features">
      <h2 class="title-divider">
        <span>Core <span class="de-em">Features</span></span>
        <small>Core features included in all plans.</small>
      </h2>
      <div class="row list-unstyled">
        <div class="feature col-sm-6 col-md-3">
          <img src="img/features/feature-1.png" alt="Feature 1" class="img-responsive" />
          <h3 class="title">
            <a href="#">Mobile <span class="de-em">Friendly</span></a>
          </h3>
          <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
        </div>
        <div class="feature col-sm-6 col-md-3">
          <img src="img/features/feature-2.png" alt="Feature 2" class="img-responsive" />
          <h3 class="title">
            <a href="#">24/7 <span class="de-em">Support</span></a>
          </h3>
          <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
        </div>
        <div class="feature col-sm-6 col-md-3">
          <img src="img/features/feature-3.png" alt="Feature 3" class="img-responsive" />
          <h3 class="title">
            <a href="#">Free Upgrade <span class="de-em">Assistance</span></a>
          </h3>
          <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
        </div>
        <div class="feature col-sm-6 col-md-3">
          <img src="img/features/feature-4.png" alt="Feature 4" class="img-responsive" />
          <h3 class="title">
            <a href="#">99.9% <span class="de-em">Uptime</span></a>
          </h3>
          <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
        </div>
      </div>
      <div class="row">
        <!-- Secondary features -->
        <div class="col-md-9">
          <h3 class="title-divider">
            <span>Bonus <span class="de-em">Features</span></span>
            <small>Bonus features only included in our Pro & Pro + plans.</small>
          </h3>
          <div class="tabbable tabs-left vertical-tabs bold-tabs row">
            <ul class="nav nav-tabs nav-stacked col-sm-4 col-md-4">
              <li class="active">
                <a href="#tab1" data-toggle="tab">
                  Mobile Friendly 
                  <small>Cause mobile matters</small>
                  <i class="fa fa-angle-right"></i>
                </a>
              </li>
              <li>
                <a href="#tab2" data-toggle="tab">
                  24/7 Support 
                  <small>When you need it most</small>
                  <i class="fa fa-angle-right"></i>
                </a>
              </li>
              <li>
                <a href="#tab3" data-toggle="tab">
                  Upgrade Assistance 
                  <small>FREE upgrades for life!</small>
                  <i class="fa fa-angle-right"></i>
                </a>
              </li>
              <li>
                <a href="#tab4" data-toggle="tab">
                  99.9% Uptime 
                  <small>Rhoncus adipiscing</small>
                  <i class="fa fa-angle-right"></i>
                </a>
              </li>
            </ul>
            <div class="tab-content col-sm-8 col-md-8">
              <div class="feature tab-pane active col-sm-12 col-md-12" id="tab1">
                <img src="img/features/feature-1.png" alt="Feature 1" class="img-responsive" />
                <h3 class="title visible-phone">
                  Mobile Friendly
                </h3>
                <!--only show on mobile when tabs are open-->
                <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
                <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. </p>
              </div>
              <div class="feature tab-pane col-sm-12 col-md-12" id="tab2">
                <img src="img/features/feature-2.png" alt="Feature 2" class="img-responsive" />
                <h3 class="title visible-phone">
                  24/7 Support
                </h3>
                <!--only show on mobile when tabs are open-->
                <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
                <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. </p>
              </div>
              <div class="feature tab-pane col-sm-12 col-md-12" id="tab3">
                <img src="img/features/feature-3.png" alt="Feature 3" class="img-responsive" />
                <h3 class="title visible-phone">
                  Upgrade Assistance
                </h3>
                <!--only show on mobile when tabs are open-->
                <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
                <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. </p>
              </div>
              <div class="feature tab-pane col-sm-12 col-md-12" id="tab4">
                <img src="img/features/feature-4.png" alt="Feature 4" class="img-responsive" />
                <h3 class="title visible-phone">
                  99.9% Uptime
                </h3>
                <!--only show on mobile when tabs are open-->
                <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
                <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. </p>
              </div>
            </div>
          </div>
        </div>
        <!--Contact block-->
        <div class="col-md-3">
          <h3 class="title-divider">
            <span>Questions?</span> 
            <small>Get in touch!</small>
          </h3>
          <p>
            <abbr title="Phone"><i class="fa fa-phone"></i></abbr>
            019223 8092344
          </p>
          <p>
            <abbr title="Email"><i class="fa fa-envelope"></i></abbr>
            info@themelize.me
          </p>
          <p>
            <abbr title="Address"><i class="fa fa-home"></i></abbr>
            Sunshine House, Sunville. SUN12 8LU.
          </p>
          <form id="callback-form" action="#" class="bordered-top-medium" role="form">
            <div class="input-group">
              <label class="sr-only" for="callback-number">Your Number</label>
              <input type="tel" class="form-control" id="callback-number" placeholder="Your Number">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">Get Callback</button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@stop