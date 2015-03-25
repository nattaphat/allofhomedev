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
          <span>About <span class="de-em">Us</span></span>
          <small>What & who makes us tick!</small>
        </h2>
        
        <!-- Showshow - Slider Revolution see: plugins/slider-revolution/examples for help -->
        <div class="slider-wrapper tp-banner-container tp-resizeme" data-page-class="slider-boxed slider-appstrap-theme">
          <div class="tp-banner" data-toggle="slider-rev" data-delay="9000" data-startwidth="1170" data-startheight="420">
            <ul>
              <!-- SLIDE 1 -->
              <li class="slide" data-transition="fade" data-slotamount="5" data-masterspeed="1800">
                <img src="img/patterns/white_wall_hash.png" alt="slidebg1" data-bgfit="normal" data-bgposition="left top" data-bgrepeat="repeat">
                <!-- SLIDE 1 Content-->
                <div class="slide-content">
                  <!--elements within .slide-content are pushed below navbar on "behind"-->
                  <div class="tp-caption sfb ltl" data-x="10" data-y="50" data-speed="400" data-start="800" data-easing="Back.easeOut" data-endspeed="500" data-endeasing="Back.easeIn" data-captionhidden="on">
                    <img src="img/slides/slide1.png" alt="Slide 1" />
                  </div>
                  <h2 class="tp-caption customin randomrotateout" data-x="700" data-y="120" data-speed="400" data-start="1200" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-endspeed="400" data-endeasing="Back.easeIn">
                    AppStrap Bootstrap Theme
                  </h2>
                  <h4 class="tp-caption customin randomrotateout" data-x="700" data-y="160" data-speed="400" data-start="1400" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-endspeed="400" data-endeasing="Back.easeIn">
                    By <a href="http://themelize.me">Themelize.me</a>
                  </h4>
                  <p class="tp-caption customin randomrotateout" data-x="700" data-y="190" data-speed="400" data-start="1600" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-endspeed="400" data-endeasing="Back.easeIn">Perfect for your App, Web service or hosting company!</p>
                  <a href="#" class="tp-caption customin randomrotateout btn btn-lg btn-primary" data-x="700" data-y="220" data-speed="400" data-start="1800" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-endspeed="400" data-endeasing="Back.easeIn">Buy Now</a> 
                </div>
              </li>
              <!-- SLIDE 2 -->
              <li data-transition="curtain-1" data-slotamount="4" data-masterspeed="500" >
                <img src="img/patterns/lightpaperfibers.png" alt="slidebg1" data-bgfit="normal" data-bgposition="left top" data-bgrepeat="repeat">
                <!-- SLIDE 2 Content -->
                <div class="slide-content">
                  <!--elements within .slide-content are pushed below navbar on "behind"-->
                  <div class="tp-caption sfb ltr" data-x="left" data-y="bottom" data-speed="900" data-start="1200" data-easing="Elastic.easeOut" data-endspeed="200" data-endeasing="Power0.easeInOut">
                    <img src="img/slides/slide2-layer1.png" alt="Slide 2 layer 1" />
                  </div>
                  <div class="tp-caption sfb ltr" data-x="right" data-y="bottom" data-speed="700" data-start="1900" data-easing="Elastic.easeOut" data-endspeed="200" data-endeasing="Power0.easeInOut">
                    <img src="img/slides/slide2-layer2.png" alt="Slide 2 layer 2" />
                  </div>
                  <div class="tp-caption sfb ltr" data-x="center" data-y="bottom" data-speed="900" data-start="1500" data-easing="Elastic.easeOut" data-endspeed="200" data-endeasing="Power0.easeInOut">
                    <img src="img/slides/slide2-layer3.png" alt="Slide 2 layer 3" />
                  </div>
                  <h2 class="tp-caption largeblackbg sfb randomrotateout" data-x="center" data-y="30" data-speed="1500" data-start="2300" data-easing="Elastic.easeOut" data-endspeed="200" data-endeasing="Power0.easeInOut">
                    AppStrap Bootstrap Theme
                  </h2>
                </div>
              </li>
            </ul>
            <div class="tp-bannertimer tp-bottom"></div>
          </div>
          <!--end of tp-banner-->
        </div>
        
        <!-- About company -->
        <div class="row margin-top-large">
          <div class="col-md-7">
            <p class="lead">Caecus gilvus haero plaga sino utinam.</p>
            <p>Aptent letalis natu nobis praesent saluto suscipere suscipit uxor vicis. Abico bene illum interdico jumentum nostrud pagus.</p>
            <p>Blandit dolor melior nisl singularis. Abico at patria. Hos humo melior paratus quia secundum wisi. Autem eros genitus ludus modo paratus te. Bene commoveo et facilisi iriure secundum uxor vereor.</p>
          </div>
          <!-- Slideshow banner -->
          <div class="col-md-5">
            <!-- List Accordion -->
            <div class="panel-group panel-group-list-style" id="list-accordion">
              <div class="panel panel-default">
                <div class="panel-heading"> <a data-toggle="collapse" data-parent="#list-accordion" href="#collapseOne" class="panel-title collapsed">Our Mission</a> </div>
                <div id="collapseOne" class="collapse">
                  <div class="panel-body">Abigo enim pagus praemitto qui secundum usitas. Exputo nobis quadrum. Ad amet cogo dignissim hendrerit magna mauris occuro pertineo turpis.</div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading"> <a data-toggle="collapse" data-parent="#list-accordion" href="#collapseTwo" class="panel-title collapsed">Our Process</a> </div>
                <div id="collapseTwo" class="collapse">
                  <div class="panel-body">Comis distineo quae suscipere. Abdo luctus volutpat. Abdo capto metuo nostrud nunc quidne scisco vulpes ymo.</div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading"> <a data-toggle="collapse" data-parent="#list-accordion" href="#collapseThree" class="panel-title collapsed">How We Work</a> </div>
                <div id="collapseThree" class="collapse">
                  <div class="panel-body">Cui humo letalis. Antehabeo caecus laoreet magna voco. Antehabeo caecus dolor jugis jumentum lenis neo.</div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading"> <a data-toggle="collapse" data-parent="#list-accordion" href="#collapseFour" class="panel-title collapsed">What We Do</a> </div>
                <div id="collapseFour" class="collapse">
                  <div class="panel-body">Dolore et imputo nisl obruo occuro quis tego wisi. Comis defui ideo patria refero singularis tum veniam.</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="title-divider margin-top-large">
          <h3>
            <span>Our <span class="de-em">Values</span></span>
          </h3>
        </div>
        <div class="row">
          <div class="col-md-6">
            <!-- List Items -->
            <ul class="fa-ul list-lg">
              <li>
                <i class="fa-li fa fa-check primary-colour"></i> 
                <h4>
                  Conventio Dolus Hendrerit Nutus
                </h4>
                Dignissim facilisi illum nostrud populus zelus. 
              </li>
              <li>
                <i class="fa-li fa fa-check primary-colour"></i> 
                <h4>
                  Nulla Roto Te Wisi
                </h4>
                Aliquam bene imputo qui verto. Bene commoveo dignissim metuo paulatim quibus scisco te. 
              </li>
              <li>
                <i class="fa-li fa fa-check primary-colour"></i> 
                <h4>
                  Hendrerit Qui Quidem Sit
                </h4>
                Commoveo mauris melior. Appellatio decet incassum nulla pecus quadrum sed valetudo vindico ymo. 
              </li>
            </ul>
          </div>
          <div class="col-md-6">
            <!-- List Items -->
            <ul class="fa-ul list-lg">
              <li>
                <i class="fa-li fa fa-check primary-colour"></i> 
                <h4>
                  Capto Praesent Te Valde
                </h4>
                Acsi erat exerci minim rusticus sed similis singularis wisi ymo. 
              </li>
              <li>
                <i class="fa-li fa fa-check primary-colour"></i> 
                <h4>
                  Defui Dolore Luctus Patria
                </h4>
                Autem molior natu sit suscipit uxor velit. 
              </li>
              <li>
                <i class="fa-li fa fa-check primary-colour"></i> 
                <h4>
                  Huic Incassum Persto Quis
                </h4>
                Aliquam aptent caecus consectetuer dolor interdico lucidus nutus praesent. 
              </li>
            </ul>
          </div>
        </div>
        
        <!-- Timeline -->
        <h3 class="title-divider margin-top-large">
          <span>Company <span class="de-em">History</span></span>
        </h3>
        <div class="timeline timeline-left">
          <div class="timeline-marker"></div>
          <!--Timeline item 1-->
          <div class="timeline-item timeline-item-first animated fadeIn de-02">
            <div class="timeline-item-date">Feb 2011</div>
            <h5 class="timeline-item-title">
              Company founders meet for first time
            </h5>
            <p class="timeline-item-description">Abdo magna quidne validus. Diam ea iaceo iustum quibus saluto tation tego torqueo utinam.</p>
          </div>
          <!--Timeline item 2 - NOTE: .highlight class-->
          <div class="timeline-item highlight animated fadeIn de-04">
            <div class="timeline-item-date">April 2011</div>
            <h5 class="timeline-item-title">
              The company was born
            </h5>
            <p class="timeline-item-description">Ad aliquip commoveo et quidem quidne sit suscipere utrum uxor.</p>
          </div>
          <!--Timeline item 3 -->
          <div class="timeline-item animated fadeIn de-06">
            <div class="timeline-item-date">Sept 2011</div>
            <h5 class="timeline-item-title">
              The company lands first major contract
            </h5>
            <p class="timeline-item-description">Interdico plaga qui scisco si sino vel. Abdo causa eu nisl oppeto praemitto sed similis valde virtus.</p>
          </div>
          <!--Timeline item 4-->
          <div class="timeline-item timeline-item-last animated fadeIn de-08">
            <div class="timeline-item-date">Dec 2014</div>
            <h5 class="timeline-item-title">
              Company sold for $1 million
            </h5>
            <p class="timeline-item-description">Cui dolore macto saluto ut voco. Eligo ex nimis pagus paratus praemitto ullamcorper valde.</p>
          </div>
          <div class="timeline-marker timeline-marker-bottom"></div>
        </div>
        
        <!-- Team -->
        <div class="title-divider margin-top-large">
          <h3>
            <span>Our <span class="de-em">Team</span></span>
            <small>Our Team Of Stars</small>
          </h3>
        </div>
        <div class="team team-grid">
          <div class="row" data-toggle="isotope-grid" data-isotope-options='{"layoutMode": "fitRows", "itemSelector": ".grid-item"}'>
            
            <!--Team Member jimi-->
            <div class="col-xs-6 col-sm-4 col-md-3 grid-item">
              <div class="team-member">
                <a href="team-member.htm" title="View Jimi's profile">
                  <img src="img/team/jimi.jpg" class="img-thumbnail" alt="Jimi" />
                </a>
                <h5 class="name">
                  <a href="team-member.htm" title="View Jimi's profile">Jimi</a>
                </h5>
                <p class="role">Founder & developer</p>
                <div class="social-media-branding social-media-branding-xs">
                  <!--@todo: replace with real social share links -->
                  <a href="#" class="social-link branding-twitter"><i class="fa fa-twitter-square"></i></a>
                  <a href="#" class="social-link branding-facebook"><i class="fa fa-facebook-square"></i></a>
                  <a href="#" class="social-link branding-linkedin"><i class="fa fa-linkedin-square"></i></a>
                  <a href="#" class="social-link branding-google-plus"><i class="fa fa-google-plus-square"></i></a>
                </div>
              </div>
            </div>
            
            <!--Team Member adele-->
            <div class="col-xs-6 col-sm-4 col-md-3 grid-item">
              <div class="team-member">
                <a href="team-member.htm" title="View Adele's profile">
                  <img src="img/team/adele.jpg" class="img-thumbnail" alt="Adele" />
                </a>
                <h5 class="name">
                  <a href="team-member.htm" title="View Adele's profile">Adele</a>
                </h5>
                <p class="role">Founder & designer</p>
                <div class="social-media-branding social-media-branding-xs">
                  <!--@todo: replace with real social share links -->
                  <a href="#" class="social-link branding-twitter"><i class="fa fa-twitter-square"></i></a>
                  <a href="#" class="social-link branding-facebook"><i class="fa fa-facebook-square"></i></a>
                  <a href="#" class="social-link branding-linkedin"><i class="fa fa-linkedin-square"></i></a>
                  <a href="#" class="social-link branding-google-plus"><i class="fa fa-google-plus-square"></i></a>
                </div>
              </div>
            </div>
            
            <!--Team Member bono-->
            <div class="col-xs-6 col-sm-4 col-md-3 grid-item">
              <div class="team-member">
                <a href="team-member.htm" title="View Bono's profile">
                  <img src="img/team/bono.jpg" class="img-thumbnail" alt="Bono" />
                </a>
                <h5 class="name">
                  <a href="team-member.htm" title="View Bono's profile">Bono</a>
                </h5>
                <p class="role">The Tech Guy</p>
                <div class="social-media-branding social-media-branding-xs">
                  <!--@todo: replace with real social share links -->
                  <a href="#" class="social-link branding-twitter"><i class="fa fa-twitter-square"></i></a>
                  <a href="#" class="social-link branding-facebook"><i class="fa fa-facebook-square"></i></a>
                  <a href="#" class="social-link branding-linkedin"><i class="fa fa-linkedin-square"></i></a>
                  <a href="#" class="social-link branding-google-plus"><i class="fa fa-google-plus-square"></i></a>
                </div>
              </div>
            </div>
            
            <!--Team Member robert-->
            <div class="col-xs-6 col-sm-4 col-md-3 grid-item">
              <div class="team-member">
                <a href="team-member.htm" title="View Robert's profile">
                  <img src="img/team/robert.jpg" class="img-thumbnail" alt="Robert" />
                </a>
                <h5 class="name">
                  <a href="team-member.htm" title="View Robert's profile">Robert</a>
                </h5>
                <p class="role">Junior designer</p>
                <div class="social-media-branding social-media-branding-xs">
                  <!--@todo: replace with real social share links -->
                  <a href="#" class="social-link branding-twitter"><i class="fa fa-twitter-square"></i></a>
                  <a href="#" class="social-link branding-facebook"><i class="fa fa-facebook-square"></i></a>
                  <a href="#" class="social-link branding-linkedin"><i class="fa fa-linkedin-square"></i></a>
                  <a href="#" class="social-link branding-google-plus"><i class="fa fa-google-plus-square"></i></a>
                </div>
              </div>
            </div>
            
            <!--Team Member steve-->
            <div class="col-xs-6 col-sm-4 col-md-3 grid-item">
              <div class="team-member">
                <a href="team-member.htm" title="View Steve's profile">
                  <img src="img/team/steve.jpg" class="img-thumbnail" alt="Steve" />
                </a>
                <h5 class="name">
                  <a href="team-member.htm" title="View Steve's profile">Steve</a>
                </h5>
                <p class="role">Sales Manager</p>
                <div class="social-media-branding social-media-branding-xs">
                  <!--@todo: replace with real social share links -->
                  <a href="#" class="social-link branding-twitter"><i class="fa fa-twitter-square"></i></a>
                  <a href="#" class="social-link branding-facebook"><i class="fa fa-facebook-square"></i></a>
                  <a href="#" class="social-link branding-linkedin"><i class="fa fa-linkedin-square"></i></a>
                  <a href="#" class="social-link branding-google-plus"><i class="fa fa-google-plus-square"></i></a>
                </div>
              </div>
            </div>
            
            <!--Team Member jolie-->
            <div class="col-xs-6 col-sm-4 col-md-3 grid-item">
              <div class="team-member">
                <a href="team-member.htm" title="View Jolie's profile">
                  <img src="img/team/jolie.jpg" class="img-thumbnail" alt="Jolie" />
                </a>
                <h5 class="name">
                  <a href="team-member.htm" title="View Jolie's profile">Jolie</a>
                </h5>
                <p class="role">Marketing Expert</p>
                <div class="social-media-branding social-media-branding-xs">
                  <!--@todo: replace with real social share links -->
                  <a href="#" class="social-link branding-twitter"><i class="fa fa-twitter-square"></i></a>
                  <a href="#" class="social-link branding-facebook"><i class="fa fa-facebook-square"></i></a>
                  <a href="#" class="social-link branding-linkedin"><i class="fa fa-linkedin-square"></i></a>
                  <a href="#" class="social-link branding-google-plus"><i class="fa fa-google-plus-square"></i></a>
                </div>
              </div>
            </div>
            
            <!--Team Member obama-->
            <div class="col-xs-6 col-sm-4 col-md-3 grid-item">
              <div class="team-member">
                <a href="team-member.htm" title="View Obama's profile">
                  <img src="img/team/obama.jpg" class="img-thumbnail" alt="Obama" />
                </a>
                <h5 class="name">
                  <a href="team-member.htm" title="View Obama's profile">Obama</a>
                </h5>
                <p class="role">Project Manager</p>
                <div class="social-media-branding social-media-branding-xs">
                  <!--@todo: replace with real social share links -->
                  <a href="#" class="social-link branding-twitter"><i class="fa fa-twitter-square"></i></a>
                  <a href="#" class="social-link branding-facebook"><i class="fa fa-facebook-square"></i></a>
                  <a href="#" class="social-link branding-linkedin"><i class="fa fa-linkedin-square"></i></a>
                  <a href="#" class="social-link branding-google-plus"><i class="fa fa-google-plus-square"></i></a>
                </div>
              </div>
            </div>
            
            <!--Team Member kate-->
            <div class="col-xs-6 col-sm-4 col-md-3 grid-item">
              <div class="team-member">
                <a href="team-member.htm" title="View Kate's profile">
                  <img src="img/team/kate.jpg" class="img-thumbnail" alt="Kate" />
                </a>
                <h5 class="name">
                  <a href="team-member.htm" title="View Kate's profile">Kate</a>
                </h5>
                <p class="role">Project Manager</p>
                <div class="social-media-branding social-media-branding-xs">
                  <!--@todo: replace with real social share links -->
                  <a href="#" class="social-link branding-twitter"><i class="fa fa-twitter-square"></i></a>
                  <a href="#" class="social-link branding-facebook"><i class="fa fa-facebook-square"></i></a>
                  <a href="#" class="social-link branding-linkedin"><i class="fa fa-linkedin-square"></i></a>
                  <a href="#" class="social-link branding-google-plus"><i class="fa fa-google-plus-square"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Customer logos -->
        <div class="title-divider margin-top-large">
          <h3>
            <span>Our <span class="de-em">Customers</span></span>
            <small>1000s of Happy Clients</small>
          </h3>
        </div>
        <!-- Logos carousel Uses Owl Carousel plugin All options here are customisable from the data-owl-carousel-settings="{OBJECT}" item via data- attributes: http://www.owlgraphic.com/owlcarousel/#customizing ie. data-settings="{"items": "4", "lazyLoad":"true", "navigation":"true"}" -->
        <div class="customers-carousel" data-toggle="owl-carousel" data-owl-carousel-settings='{"items": 4, "lazyLoad":true, "navigation":true, "scrollPerPage":true}'>
          <a href="#">
            <img data-src="img/customers/customer-1.png" alt="Item 1 image" class="lazyOwl img-responsive underlay" />
            <h6>
              Customer 1
            </h6>
          </a>
          <a href="#">
            <img data-src="img/customers/customer-2.png" alt="Item 2 image" class="lazyOwl img-responsive underlay" />
            <h6>
              Customer 2
            </h6>
          </a>
          <a href="#">
            <img data-src="img/customers/customer-3.png" alt="Item 3 image" class="lazyOwl img-responsive underlay" />
            <h6>
              Customer 3
            </h6>
          </a>
          <a href="#">
            <img data-src="img/customers/customer-4.png" alt="Item 4 image" class="lazyOwl img-responsive underlay" />
            <h6>
              Customer 4
            </h6>
          </a>
          <a href="#">
            <img data-src="img/customers/customer-5.png" alt="Item 5 image" class="lazyOwl img-responsive underlay" />
            <h6>
              Customer 5
            </h6>
          </a>
          <a href="#">
            <img data-src="img/customers/customer-6.png" alt="Item 6 image" class="lazyOwl img-responsive underlay" />
            <h6>
              Customer 6
            </h6>
          </a>
          <a href="#">
            <img data-src="img/customers/customer-7.png" alt="Item 7 image" class="lazyOwl img-responsive underlay" />
            <h6>
              Customer 7
            </h6>
          </a>
          <a href="#">
            <img data-src="img/customers/customer-8.png" alt="Item 8 image" class="lazyOwl img-responsive underlay" />
            <h6>
              Customer 8
            </h6>
          </a>
          <a href="#">
            <img data-src="img/customers/customer-9.png" alt="Item 9 image" class="lazyOwl img-responsive underlay" />
            <h6>
              Customer 9
            </h6>
          </a>
          <a href="#">
            <img data-src="img/customers/customer-10.png" alt="Item 10 image" class="lazyOwl img-responsive underlay" />
            <h6>
              Customer 10
            </h6>
          </a>
          <a href="#">
            <img data-src="img/customers/customer-11.png" alt="Item 11 image" class="lazyOwl img-responsive underlay" />
            <h6>
              Customer 11
            </h6>
          </a>
          <a href="#">
            <img data-src="img/customers/customer-12.png" alt="Item 12 image" class="lazyOwl img-responsive underlay" />
            <h6>
              Customer 12
            </h6>
          </a>
          <a href="#">
            <img data-src="img/customers/customer-13.png" alt="Item 13 image" class="lazyOwl img-responsive underlay" />
            <h6>
              Customer 13
            </h6>
          </a>
          <a href="#">
            <img data-src="img/customers/customer-14.png" alt="Item 14 image" class="lazyOwl img-responsive underlay" />
            <h6>
              Customer 14
            </h6>
          </a>
        </div>
      </div>
    </div>
  </div>
@stop