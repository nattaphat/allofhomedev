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
          <span>The <span class="de-em">Team</span></span>
          <small>Our team of stars! (Vector images by <a href="http://www.vectorportal.com/">Vectorportal</a>)</small>
        </h2>
        <!-- The team list -->
        <div class="team team-list margin-top-large">
          
          <!--Team Member jimi-->
          <div class="team-member team-member-full">
            <div class="row">
              <div class="col-sm-2">
                <img src="img/team/jimi.jpg" class="img-thumbnail" alt="Jimi" />
              </div>
              <div class="col-sm-7">
                <h3 class="name">
                  Jimi
                </h3>
                <p class="role">Founder & developer</p>
                <p class="member-since">Team member since: Oct 2013</p>
                <p>Loquor quis vero. Commodo ea genitus ille iusto mauris nulla pecus praemitto si. Dolus gravis macto tincidunt. Damnum luctus molior obruo probo quibus uxor.</p>
                <p>Exputo gravis lucidus odio pecus similis. Comis nunc quidne vulpes zelus. Acsi at inhibeo nulla paulatim pertineo quis vulputate. Jugis lucidus minim.</p>
                <p>Abbas abdo inhibeo lobortis loquor nimis olim scisco suscipit. Consectetuer elit neque ulciscor velit virtus. Duis erat macto patria ratis suscipere volutpat. Ex in incassum premo si suscipit. Aliquam erat eum immitto magna praesent premo typicus. Abluo bene valetudo. Abigo at causa gilvus in mauris vulpes.</p>
                <div class="social-media-branding">
                  <!--@todo: replace with real social share links -->
                  <a href="#" class="social-link branding-twitter"><i class="fa fa-twitter-square"></i></a>
                  <a href="#" class="social-link branding-facebook"><i class="fa fa-facebook-square"></i></a>
                  <a href="#" class="social-link branding-linkedin"><i class="fa fa-linkedin-square"></i></a>
                  <a href="#" class="social-link branding-google-plus"><i class="fa fa-google-plus-square"></i></a>
                </div>
              </div>
              <div class="col-sm-3">
                <h5 class="margin-top-large">
                  Posts By Jimi
                </h5>
                <div class="blog-roll-mini">
                  <!-- Member blog posts 1 -->
                  <div class="row blog-post">
                    <div class="col-xs-3">
                      <div class="blog-media">
                        <a href="blog-post.htm">
                          <img src="img/blog/fly.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                        </a>
                      </div>
                    </div>
                    <div class="col-xs-9">
                      <h5>
                        <a href="#">Abdo Huic Paratus Tamen</a>
                      </h5>
                    </div>
                  </div>
                  <!-- Member blog posts 2 -->
                  <div class="row blog-post">
                    <div class="col-xs-3">
                      <div class="blog-media">
                        <a href="blog-post.htm">
                          <img src="img/blog/butterfly.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                        </a>
                      </div>
                    </div>
                    <div class="col-xs-9">
                      <h5>
                        <a href="#">Accumsan Dolore Humo Volutpat</a>
                      </h5>
                    </div>
                  </div>
                  <!-- Member blog posts 3 -->
                  <div class="row blog-post">
                    <div class="col-xs-3">
                      <div class="blog-media">
                        <a href="blog-post.htm">
                          <img src="img/blog/fly.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                        </a>
                      </div>
                    </div>
                    <div class="col-xs-9">
                      <h5>
                        <a href="#">Augue Iaceo Molior Singularis</a>
                      </h5>
                    </div>
                  </div>
                  <!-- Member blog posts 4 -->
                  <div class="row blog-post">
                    <div class="col-xs-3">
                      <div class="blog-media">
                        <a href="blog-post.htm">
                          <img src="img/blog/fly.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                        </a>
                      </div>
                    </div>
                    <div class="col-xs-9">
                      <h5>
                        <a href="#">Amet Dignissim Genitus Ratis</a>
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- The team list -->
        <div class="team team-list margin-top-large">
          <h4>
            Other Team Members
          </h4>
          
          <!--Team Member jimi-->
          <div class="team-member team-member-active">
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
                <p>Autem bene dolus loquor. Blandit singularis sit te tincidunt. Acsi appellatio duis feugiat hendrerit ideo iusto loquor quidne. Amet distineo illum mauris mos ratis.</p>
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
                <p>Aliquam ea esca gravis patria paulatim praemitto quadrum tation tincidunt. Autem esse ideo letalis nibh saluto tego ullamcorper virtus volutpat.</p>
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
                <p>Gravis ideo imputo incassum quidem singularis. Abdo euismod ibidem. Aliquam aptent blandit gemino obruo. Damnum nunc refoveo. Dolore exerci illum jugis quis uxor.</p>
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
                <p>Capto damnum decet humo illum quidem. Abbas os quis te. Hendrerit iriure olim verto ymo. Caecus diam huic iaceo imputo minim refero ulciscor volutpat.</p>
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
                <p>Cogo ea hos neque quis rusticus sagaciter sit. Abdo euismod ibidem sed wisi. Abluo appellatio eros gemino genitus minim roto velit zelus.</p>
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
                <p>Antehabeo incassum quadrum. Augue lucidus natu valde. Rusticus tation vel. Modo quadrum sudo zelus. Antehabeo elit hendrerit metuo molior pagus.</p>
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
                <p>Brevitas decet jugis letalis nunc verto. Camur dolor ex macto quis rusticus typicus. Dolor feugiat hos suscipit typicus vindico voco volutpat.</p>
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
                <p>At exputo suscipit. Erat lucidus magna olim pagus populus sino sudo suscipere valde. Ad cui damnum erat importunus luctus populus quadrum vulpes zelus.</p>
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
      </div>
    </div>
  </div>
@stop