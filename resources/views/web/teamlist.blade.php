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
          <span>The <span class="de-em">Team (List)</span></span>
          <small>Our team of stars! (Vector images by <a href="http://www.vectorportal.com/">Vectorportal</a>)</small>
        </h2>
        
        <!-- The team list -->
        <div class="team team-list margin-top-large">
          
          <!--Team Member jimi-->
          <div class="team-member">
            <div class="row">
              <div class="col-sm-2">
                <a href="team-member.htm" title="View Jimi's profile">
                  <img src="img/team/jimi.jpg" class="img-thumbnail" alt="Jimi" />
                </a>
              </div>
              <div class="col-sm-10">
                <h4 class="name">
                  <a href="team-member.htm" title="View Jimi's profile">Jimi</a>
                </h4>
                <p class="role">Founder & developer</p>
                <p>Aliquam amet sino turpis. Esse eu meus nutus tincidunt ullamcorper utrum. Consectetuer facilisi iaceo ille imputo luptatum occuro olim volutpat.</p>
                <div class="social-media-branding social-media-branding-sm">
                  <!--@todo: replace with real social share links -->
                  <a href="#" class="social-link branding-twitter"><i class="fa fa-twitter-square"></i></a>
                  <a href="#" class="social-link branding-facebook"><i class="fa fa-facebook-square"></i></a>
                  <a href="#" class="social-link branding-linkedin"><i class="fa fa-linkedin-square"></i></a>
                  <a href="#" class="social-link branding-google-plus"><i class="fa fa-google-plus-square"></i></a>
                </div>
              </div>
            </div>
          </div>
          
          <!--Team Member adele-->
          <div class="team-member">
            <div class="row">
              <div class="col-sm-2">
                <a href="team-member.htm" title="View Adele's profile">
                  <img src="img/team/adele.jpg" class="img-thumbnail" alt="Adele" />
                </a>
              </div>
              <div class="col-sm-10">
                <h4 class="name">
                  <a href="team-member.htm" title="View Adele's profile">Adele</a>
                </h4>
                <p class="role">Founder & designer</p>
                <p>Sagaciter uxor zelus. Eu interdico neque nisl praesent virtus. Decet dignissim fere feugiat pala refoveo typicus. Exputo quae saepius. Aliquip dignissim duis macto nostrud odio populus quadrum vel zelus.</p>
                <div class="social-media-branding social-media-branding-sm">
                  <!--@todo: replace with real social share links -->
                  <a href="#" class="social-link branding-twitter"><i class="fa fa-twitter-square"></i></a>
                  <a href="#" class="social-link branding-facebook"><i class="fa fa-facebook-square"></i></a>
                  <a href="#" class="social-link branding-linkedin"><i class="fa fa-linkedin-square"></i></a>
                  <a href="#" class="social-link branding-google-plus"><i class="fa fa-google-plus-square"></i></a>
                </div>
              </div>
            </div>
          </div>
          
          <!--Team Member bono-->
          <div class="team-member">
            <div class="row">
              <div class="col-sm-2">
                <a href="team-member.htm" title="View Bono's profile">
                  <img src="img/team/bono.jpg" class="img-thumbnail" alt="Bono" />
                </a>
              </div>
              <div class="col-sm-10">
                <h4 class="name">
                  <a href="team-member.htm" title="View Bono's profile">Bono</a>
                </h4>
                <p class="role">The Tech Guy</p>
                <p>Hos pertineo praesent. Lenis metuo pecus pertineo plaga voco. Comis nibh nimis nulla roto tego. Abigo causa distineo plaga quadrum.</p>
                <div class="social-media-branding social-media-branding-sm">
                  <!--@todo: replace with real social share links -->
                  <a href="#" class="social-link branding-twitter"><i class="fa fa-twitter-square"></i></a>
                  <a href="#" class="social-link branding-facebook"><i class="fa fa-facebook-square"></i></a>
                  <a href="#" class="social-link branding-linkedin"><i class="fa fa-linkedin-square"></i></a>
                  <a href="#" class="social-link branding-google-plus"><i class="fa fa-google-plus-square"></i></a>
                </div>
              </div>
            </div>
          </div>
          
          <!--Team Member robert-->
          <div class="team-member">
            <div class="row">
              <div class="col-sm-2">
                <a href="team-member.htm" title="View Robert's profile">
                  <img src="img/team/robert.jpg" class="img-thumbnail" alt="Robert" />
                </a>
              </div>
              <div class="col-sm-10">
                <h4 class="name">
                  <a href="team-member.htm" title="View Robert's profile">Robert</a>
                </h4>
                <p class="role">Junior designer</p>
                <p>Pertineo torqueo tum wisi. Esse et in nisl populus tum utinam vulputate. Comis dolore humo macto mauris roto. Abluo aliquam comis damnum feugiat mauris pagus scisco sit tum.</p>
                <div class="social-media-branding social-media-branding-sm">
                  <!--@todo: replace with real social share links -->
                  <a href="#" class="social-link branding-twitter"><i class="fa fa-twitter-square"></i></a>
                  <a href="#" class="social-link branding-facebook"><i class="fa fa-facebook-square"></i></a>
                  <a href="#" class="social-link branding-linkedin"><i class="fa fa-linkedin-square"></i></a>
                  <a href="#" class="social-link branding-google-plus"><i class="fa fa-google-plus-square"></i></a>
                </div>
              </div>
            </div>
          </div>
          
          <!--Team Member steve-->
          <div class="team-member">
            <div class="row">
              <div class="col-sm-2">
                <a href="team-member.htm" title="View Steve's profile">
                  <img src="img/team/steve.jpg" class="img-thumbnail" alt="Steve" />
                </a>
              </div>
              <div class="col-sm-10">
                <h4 class="name">
                  <a href="team-member.htm" title="View Steve's profile">Steve</a>
                </h4>
                <p class="role">Sales Manager</p>
                <p>Brevitas euismod iusto luctus populus te venio. Diam ideo lucidus minim pagus sino vereor virtus zelus. Et gravis immitto occuro vulpes.</p>
                <div class="social-media-branding social-media-branding-sm">
                  <!--@todo: replace with real social share links -->
                  <a href="#" class="social-link branding-twitter"><i class="fa fa-twitter-square"></i></a>
                  <a href="#" class="social-link branding-facebook"><i class="fa fa-facebook-square"></i></a>
                  <a href="#" class="social-link branding-linkedin"><i class="fa fa-linkedin-square"></i></a>
                  <a href="#" class="social-link branding-google-plus"><i class="fa fa-google-plus-square"></i></a>
                </div>
              </div>
            </div>
          </div>
          
          <!--Team Member jolie-->
          <div class="team-member">
            <div class="row">
              <div class="col-sm-2">
                <a href="team-member.htm" title="View Jolie's profile">
                  <img src="img/team/jolie.jpg" class="img-thumbnail" alt="Jolie" />
                </a>
              </div>
              <div class="col-sm-10">
                <h4 class="name">
                  <a href="team-member.htm" title="View Jolie's profile">Jolie</a>
                </h4>
                <p class="role">Marketing Expert</p>
                <p>Dolor enim nulla praesent tation te. Decet defui et melior pala utinam. Iusto iustum praemitto quidne tincidunt velit. Laoreet pecus proprius quae refero saepius sino valde vulputate.</p>
                <div class="social-media-branding social-media-branding-sm">
                  <!--@todo: replace with real social share links -->
                  <a href="#" class="social-link branding-twitter"><i class="fa fa-twitter-square"></i></a>
                  <a href="#" class="social-link branding-facebook"><i class="fa fa-facebook-square"></i></a>
                  <a href="#" class="social-link branding-linkedin"><i class="fa fa-linkedin-square"></i></a>
                  <a href="#" class="social-link branding-google-plus"><i class="fa fa-google-plus-square"></i></a>
                </div>
              </div>
            </div>
          </div>
          
          <!--Team Member obama-->
          <div class="team-member">
            <div class="row">
              <div class="col-sm-2">
                <a href="team-member.htm" title="View Obama's profile">
                  <img src="img/team/obama.jpg" class="img-thumbnail" alt="Obama" />
                </a>
              </div>
              <div class="col-sm-10">
                <h4 class="name">
                  <a href="team-member.htm" title="View Obama's profile">Obama</a>
                </h4>
                <p class="role">Project Manager</p>
                <p>Huic lucidus secundum virtus vulpes. Eligo metuo tamen vereor voco volutpat. Illum jus tamen vereor. Abbas antehabeo camur eligo haero ideo quibus valetudo.</p>
                <div class="social-media-branding social-media-branding-sm">
                  <!--@todo: replace with real social share links -->
                  <a href="#" class="social-link branding-twitter"><i class="fa fa-twitter-square"></i></a>
                  <a href="#" class="social-link branding-facebook"><i class="fa fa-facebook-square"></i></a>
                  <a href="#" class="social-link branding-linkedin"><i class="fa fa-linkedin-square"></i></a>
                  <a href="#" class="social-link branding-google-plus"><i class="fa fa-google-plus-square"></i></a>
                </div>
              </div>
            </div>
          </div>
          
          <!--Team Member kate-->
          <div class="team-member">
            <div class="row">
              <div class="col-sm-2">
                <a href="team-member.htm" title="View Kate's profile">
                  <img src="img/team/kate.jpg" class="img-thumbnail" alt="Kate" />
                </a>
              </div>
              <div class="col-sm-10">
                <h4 class="name">
                  <a href="team-member.htm" title="View Kate's profile">Kate</a>
                </h4>
                <p class="role">Project Manager</p>
                <p>Abdo refero similis turpis vindico. Acsi esse fere illum neo persto. Illum jumentum obruo zelus. At conventio dolore elit incassum neque patria premo ullamcorper verto.</p>
                <div class="social-media-branding social-media-branding-sm">
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
        
        <!--Customer testimonial-->
        <div class="block testimonials margin-top-large margin-bottom-large" id="testimonials">
          <h3 class="title-divider">
            <span>Highly <span class="de-em">Recommended</span></span>
            <small>99% of our customers recommend us!</small>
          </h3>
          <div class="row">
            <div class="col-md-4">
              <blockquote>
                <p>"It's totally awesome, we're could imagine life without it!"</p>
                <small>
                  <img src="img/team/jimi.jpg" alt="Jimi Bloggs" class="img-circle" />
                  Jimi Bloggs <span class="spacer">/</span> <a href="#">@mrjimi</a>
                </small>
              </blockquote>
            </div>
            <div class="col-md-4">
              <blockquote>
                <p>"10 out of 10, highly recommended!"</p>
                <small>
                  <img src="img/team/steve.jpg" alt="Jimi Bloggs" class="img-circle" />
                  Steve Bloggs <span class="spacer">/</span> <a href="#">Founder of Apple</a>
                </small>
              </blockquote>
            </div>
            <div class="col-md-4">
              <blockquote>
                <p>"Our productivity & sales are up! Couldn't be happier!"</p>
                <small>
                  <img src="img/team/adele.jpg" alt="Adele Bloggs" class="img-circle" />
                  Adele Bloggs <span class="spacer">/</span> <a href="#">@iamadele</a>
                </small>
              </blockquote>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop