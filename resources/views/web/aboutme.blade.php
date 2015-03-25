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
          <span>About <span class="de-em">Me</span></span>
          <small>Who I Am</small>
        </h2>
        
        <!-- About me -->
        <div class="row">
          <!-- Image -->
          <div class="col-md-5 col-md-push-7">
            <img src="img/misc/about-me.jpg" alt="About me" class="img-responsive" />
          </div>
          <div class="col-md-7 col-md-pull-5">
            <p class="lead">Drupal and Frontend Developer with an eye for detail. I love code!</p>
            <p>Abbas abluo aliquip damnum nimis refero ullamcorper ut. Jugis jus meus quibus sino. Acsi gemino genitus illum molior quae quidne refero.</p>
            <p>Capto esca nimis wisi. Defui gilvus occuro. Blandit camur diam gravis importunus letalis nobis saluto volutpat. Blandit defui esca gilvus similis tego verto ymo zelus.</p>
            <p>Accumsan amet dolor duis refoveo vicis. Conventio euismod fere humo roto rusticus valetudo vulputate. Appellatio dolore gravis ideo illum neque. Brevitas eros et huic macto magna sudo. Jumentum neo nunc oppeto si. Jumentum melior mos suscipit vero. Jugis jus magna odio probo suscipit.</p>
            <p>Euismod exputo illum. Brevitas genitus laoreet letalis quia valde. Abbas adipiscing distineo facilisis neque premo similis te. Facilisis fere saepius validus vulpes.</p>
            <div class="social-media-branding">
              <!--@todo: replace with real social share links -->
              <a href="#" class="social-link branding-twitter"><i class="fa fa-twitter-square"></i></a>
              <a href="#" class="social-link branding-facebook"><i class="fa fa-facebook-square"></i></a>
              <a href="#" class="social-link branding-linkedin"><i class="fa fa-linkedin-square"></i></a>
              <a href="#" class="social-link branding-google-plus"><i class="fa fa-google-plus-square"></i></a>
            </div>
          </div>
        </div>
        
        <div class="title-divider margin-top-large">
          <h3>
            <span>Services <span class="de-em">& Skills</span></span>
          </h3>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="row margin-top-md">
              <div class="col-md-2"><i class="fa fa-fw fa-3x fa-html5 primary-colour-dark"></i></div>
              <div class="col-md-10">
                <h5 class="margin-top-none">
                  HTML5
                </h5>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100" style="width: 64%;"> 64% </div>
                </div>
              </div>
            </div>
            <div class="row margin-top-md">
              <div class="col-md-2"><i class="fa fa-fw fa-3x fa-css3 primary-colour-dark"></i></div>
              <div class="col-md-10">
                <h5 class="margin-top-none">
                  CSS3
                </h5>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="59" aria-valuemin="0" aria-valuemax="100" style="width: 59%;"> 59% </div>
                </div>
              </div>
            </div>
            <div class="row margin-top-md">
              <div class="col-md-2"><i class="fa fa-fw fa-3x fa-linux primary-colour-dark"></i></div>
              <div class="col-md-10">
                <h5 class="margin-top-none">
                  System Admin
                </h5>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;"> 85% </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row margin-top-md">
              <div class="col-md-2"><i class="fa fa-fw fa-3x fa-android primary-colour-dark"></i></div>
              <div class="col-md-10">
                <h5 class="margin-top-none">
                  Android
                </h5>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;"> 78% </div>
                </div>
              </div>
            </div>
            <div class="row margin-top-md">
              <div class="col-md-2"><i class="fa fa-fw fa-3x fa-windows primary-colour-dark"></i></div>
              <div class="col-md-10">
                <h5 class="margin-top-none">
                  Windows
                </h5>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="79" aria-valuemin="0" aria-valuemax="100" style="width: 79%;"> 79% </div>
                </div>
              </div>
            </div>
            <div class="row margin-top-md">
              <div class="col-md-2"><i class="fa fa-fw fa-3x fa-github-alt primary-colour-dark"></i></div>
              <div class="col-md-10">
                <h5 class="margin-top-none">
                  GitHub
                </h5>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="97" aria-valuemin="0" aria-valuemax="100" style="width: 97%;"> 97% </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Timeline -->
        <h3 class="title-divider margin-top-large">
          <span>Work <span class="de-em">Experience</span></span>
        </h3>
        <div class="timeline timeline-left">
          <div class="timeline-marker"></div>
          <!--Timeline item 1-->
          <div class="timeline-item timeline-item-first animated fadeIn de-02">
            <div class="timeline-item-date">Feb 2011 - March 2012</div>
            <h5 class="timeline-item-title">
              Frontend Developer @ Code Monkeys
            </h5>
            <p class="timeline-item-description">Exputo genitus hos jus luptatum quae qui scisco ullamcorper vel.</p>
          </div>
          <!--Timeline item 2 -->
          <div class="timeline-item animated fadeIn de-04">
            <div class="timeline-item-date">April 2012 - June 2012</div>
            <h5 class="timeline-item-title">
              Freelance Drupal Developer
            </h5>
            <p class="timeline-item-description">Gemino ludus nulla quadrum refoveo sino torqueo vindico. Appellatio esse saepius secundum te.</p>
          </div>
          <!--Timeline item 3- - NOTE: .highlight class -->
          <div class="timeline-item highlight animated fadeIn de-06">
            <div class="timeline-item-date">July 2012 - March 2013</div>
            <h5 class="timeline-item-title">
              Wordpress-er @ One Tree Media Inc.
            </h5>
            <p class="timeline-item-description">Abdo haero mauris nutus. Appellatio aptent erat gilvus gravis os quidem vindico.</p>
          </div>
          <!--Timeline item 4 - NOTE: the .right class-->
          <div class="timeline-item timeline-item-last animated fadeIn de-08">
            <div class="timeline-item-date">Feb 2013 - Present</div>
            <h5 class="timeline-item-title">
              CEO & Developer @ Themelize.me
            </h5>
            <p class="timeline-item-description">Consectetuer ex meus natu neo obruo quia utinam. Hendrerit loquor premo tum.</p>
          </div>
          <div class="timeline-marker timeline-marker-bottom"></div>
        </div>
        
        <!-- Latest Projects-->
        <div class="title-divider margin-top-large">
          <h3>
            <span>Latest <span class="de-em">Projects</span></span>
            <small>See what I've been working on</small>
          </h3>
        </div>
        <div class="projects-grid">
          <!-- Uses magnific popup plugin to show enlarged version of image in gallery @see: http://dimsemenov.com/plugins/magnific-popup/documentation.html -->
          <div class="row" data-toggle="magnific-popup" data-magnific-popup-settings='{"delegate": "a.project", "gallery":{"enabled":true}}'>
            
            <!--Timeline item 1-->
            <div class="col-sm-6 col-md-6 grid-item">
              <a href="img/projects/project-1.jpg" class="project overlay-wrapper">
                <img src="img/projects/project-1-sm.jpg" alt="Project 1" class="img-responsive" />
                <span class="overlay">
                  <i class="fa fa-2x fa-arrow-circle-right primary-colour"></i> 
                  <h5>
                    Cui Iustum Metuo Sed Velit
                  </h5>
                </span>
              </a>
            </div>
            
            <!--Timeline item 2-->
            <div class="col-sm-6 col-md-6 grid-item">
              <a href="img/projects/project-2.jpg" class="project overlay-wrapper">
                <img src="img/projects/project-2-sm.jpg" alt="Project 2" class="img-responsive" />
                <span class="overlay">
                  <i class="fa fa-2x fa-arrow-circle-right primary-colour"></i> 
                  <h5>
                    Camur Luctus Saluto Sit Tation
                  </h5>
                </span>
              </a>
            </div>
            
            <!--Timeline item 3-->
            <div class="col-sm-6 col-md-6 grid-item">
              <a href="img/projects/project-3.jpg" class="project overlay-wrapper">
                <img src="img/projects/project-3-sm.jpg" alt="Project 3" class="img-responsive" />
                <span class="overlay">
                  <i class="fa fa-2x fa-arrow-circle-right primary-colour"></i> 
                  <h5>
                    At Facilisis Pecus Persto Valetudo
                  </h5>
                </span>
              </a>
            </div>
            
            <!--Timeline item 4-->
            <div class="col-sm-6 col-md-6 grid-item">
              <a href="img/projects/project-4.jpg" class="project overlay-wrapper">
                <img src="img/projects/project-4-sm.jpg" alt="Project 4" class="img-responsive" />
                <span class="overlay">
                  <i class="fa fa-2x fa-arrow-circle-right primary-colour"></i> 
                  <h5>
                    Commoveo Haero Quia Saepius Suscipit
                  </h5>
                </span>
              </a>
            </div>
            
            <!--Timeline item 5-->
            <div class="col-sm-6 col-md-6 grid-item">
              <a href="img/projects/project-5.jpg" class="project overlay-wrapper">
                <img src="img/projects/project-5-sm.jpg" alt="Project 5" class="img-responsive" />
                <span class="overlay">
                  <i class="fa fa-2x fa-arrow-circle-right primary-colour"></i> 
                  <h5>
                    Gemino Lenis Loquor Probo Singularis
                  </h5>
                </span>
              </a>
            </div>
            
            <!--Timeline item 6-->
            <div class="col-sm-6 col-md-6 grid-item">
              <a href="img/projects/project-6.jpg" class="project overlay-wrapper">
                <img src="img/projects/project-6-sm.jpg" alt="Project 6" class="img-responsive" />
                <span class="overlay">
                  <i class="fa fa-2x fa-arrow-circle-right primary-colour"></i> 
                  <h5>
                    Antehabeo Autem Gemino Interdico Loquor
                  </h5>
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
</div>
@stop