@extends('layouts.main')

@section('content')
<div class="container">
    <h2 class="title-divider">
      <span>กระทู้ <span class="de-em">ล่าสุด</span></span>
      <small>We love to talk!</small>
    </h2>
    
    <div class="row">
      <!--Blog Timeline -->
      <div class="col-md-9">
        <div class="timeline blog-timeline">
          <div class="timeline-breaker">2014</div>
          
          <!--Timeline item 1-->
          <div class="timeline-item blog-post animated fadeIn de-02">
            <div class="blog-media">
              <a href="blog-post.htm">
                <img src="img/blog/butterfly.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
              </a>
            </div>
            <div class="row margin-top-md">
              <div class="col-md-2 date-md">
                <div class="timeline-item-date date-wrapper"> <span class="date-m">Feb</span> <span class="date-d">08</span> </div>
              </div>
              <div class="col-md-10">
                <div class="tags"><a href="#" class="tag">general</a> / <a href="#" class="type">image</a></div>
                <h4 class="timeline-item-title">
                  <a href="#">Duis Hendrerit Roto Usitas Vindico</a>
                </h4>
                <p class="timeline-item-description">Defui elit jumentum letalis pecus quibus suscipit tincidunt validus. Brevitas gilvus metuo nimis saepius sit. Causa immitto minim qui saepius tincidunt veniam venio.</p>
                <ul class="list-inline links">
                  <li>
                    <a href="blog-post.htm" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                  </li>
                  <li>
                    <a href="blog-post.htm#comments" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> 20 Comments</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <!--Timeline item 2-->
          <div class="timeline-item blog-post animated right fadeIn de-02">
            <div class="blog-media">
              <a href="blog-post.htm">
                <img src="img/blog/water-pump.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
              </a>
            </div>
            <div class="row margin-top-md">
              <div class="col-md-2 date-md">
                <div class="timeline-item-date date-wrapper"> <span class="date-m">Feb</span> <span class="date-d">06</span> </div>
              </div>
              <div class="col-md-10">
                <div class="tags"><a href="#" class="tag">design</a> / <a href="#" class="type">image</a></div>
                <h4 class="timeline-item-title">
                  <a href="#">Blandit Conventio Imputo Macto Valetudo</a>
                </h4>
                <p class="timeline-item-description">Augue ex haero iaceo pecus quibus quidem quis te. Aptent at cogo illum importunus iustum macto minim oppeto praemitto. Conventio eligo laoreet modo.</p>
                <ul class="list-inline links">
                  <li>
                    <a href="blog-post.htm" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                  </li>
                  <li>
                    <a href="blog-post.htm#comments" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> 15 Comments</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <!--Timeline item 3-->
          <div class="timeline-item blog-post animated highlight fadeIn de-02">
            <div class="blog-media">
              <a href="blog-post.htm">
                <img src="img/blog/fly.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
              </a>
            </div>
            <div class="row margin-top-md">
              <div class="col-md-2 date-md">
                <div class="timeline-item-date date-wrapper"> <span class="date-m">Feb</span> <span class="date-d">05</span> </div>
              </div>
              <div class="col-md-10">
                <div class="tags"><a href="#" class="tag">jobs</a> / <a href="#" class="type">image</a></div>
                <h4 class="timeline-item-title">
                  <a href="#">Abluo Et Eu Iaceo Uxor</a>
                </h4>
                <p class="timeline-item-description">Commodo gravis ibidem letalis singularis torqueo vicis vulputate. Abluo comis conventio dignissim euismod imputo iustum quia validus. Abbas blandit euismod mauris mos oppeto.</p>
                <ul class="list-inline links">
                  <li>
                    <a href="blog-post.htm" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                  </li>
                  <li>
                    <a href="blog-post.htm#comments" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> 28 Comments</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <!--Timeline item 4-->
          <div class="timeline-item blog-post animated right fadeIn de-02">
            <div class="blog-media">
              <div class="slider-wrapper">
                <div class="flexslider slider-mini-nav" data-slidernav="auto" data-transition="fade">
                  <div class="slides">
                    <div class="slide">
                      <img src="img/blog/frog.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                    </div>
                    <div class="slide">
                      <img src="img/blog/water-pump.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                    </div>
                    <div class="slide">
                      <img src="img/blog/ladybird.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                    </div>
                    <div class="slide">
                      <img src="img/blog/butterfly.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row margin-top-md">
              <div class="col-md-2 date-md">
                <div class="timeline-item-date date-wrapper"> <span class="date-m">Feb</span> <span class="date-d">04</span> </div>
              </div>
              <div class="col-md-10">
                <div class="tags"><a href="#" class="tag">jobs</a> / <a href="#" class="type">slideshow</a></div>
                <h4 class="timeline-item-title">
                  <a href="#">Suscipit Ut Vel Velit Veniam</a>
                </h4>
                <p class="timeline-item-description">Esca haero neque paratus usitas veniam. Commoveo hendrerit ludus luptatum praemitto scisco uxor. Duis inhibeo meus praemitto. Amet camur fere natu paratus utrum vel verto.</p>
                <ul class="list-inline links">
                  <li>
                    <a href="blog-post.htm" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                  </li>
                  <li>
                    <a href="blog-post.htm#comments" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> 22 Comments</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <!--Timeline item 5-->
          <div class="timeline-item blog-post animated fadeIn de-02">
            <div class="blog-media">
              <a href="blog-post.htm">
                <img src="img/blog/fly.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
              </a>
            </div>
            <div class="row margin-top-md">
              <div class="col-md-2 date-md">
                <div class="timeline-item-date date-wrapper"> <span class="date-m">Feb</span> <span class="date-d">02</span> </div>
              </div>
              <div class="col-md-10">
                <div class="tags"><a href="#" class="tag">coding</a> / <a href="#" class="type">image</a></div>
                <h4 class="timeline-item-title">
                  <a href="#">Abigo Brevitas Eu Exputo Immitto</a>
                </h4>
                <p class="timeline-item-description">Appellatio facilisi ludus pneum qui quibus roto saluto te ulciscor. Aliquip commodo defui gilvus imputo nibh paulatim ratis refero vero.</p>
                <ul class="list-inline links">
                  <li>
                    <a href="blog-post.htm" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                  </li>
                  <li>
                    <a href="blog-post.htm#comments" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> 59 Comments</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <!--Timeline item 6-->
          <div class="timeline-item blog-post animated right fadeIn de-02">
            <div class="blog-media">
              <object width="560" height="315">
                <param name="movie" value="//www.youtube.com/v/qpWlaOeGZ_4?hl=en_US&amp;version=3&amp;rel=0"></param>
                <param name="allowFullScreen" value="true"></param>
                <param name="allowscriptaccess" value="always"></param>
                <embed src="//www.youtube.com/v/qpWlaOeGZ_4?hl=en_US&amp;version=3&amp;rel=0" type="application/x-shockwave-flash" width="560" height="315" allowscriptaccess="always" allowfullscreen="true"></embed>
              </object>
            </div>
            <div class="row margin-top-md">
              <div class="col-md-2 date-md">
                <div class="timeline-item-date date-wrapper"> <span class="date-m">Feb</span> <span class="date-d">01</span> </div>
              </div>
              <div class="col-md-10">
                <div class="tags"><a href="#" class="tag">design</a> / <a href="#" class="type">video</a></div>
                <h4 class="timeline-item-title">
                  <a href="#">Brevitas Diam Olim Sed Utinam</a>
                </h4>
                <p class="timeline-item-description">Cogo conventio dignissim exerci macto nulla nutus pagus quis virtus. Ibidem saluto sudo ulciscor vereor verto. Ad consequat jus saluto.</p>
                <ul class="list-inline links">
                  <li>
                    <a href="blog-post.htm" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                  </li>
                  <li>
                    <a href="blog-post.htm#comments" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> 45 Comments</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="timeline-breaker timeline-breaker-middle">2013</div>
          
          <!--Timeline item 7-->
          <div class="timeline-item blog-post animated fadeIn de-02">
            <div class="blog-media">
              <a href="blog-post.htm">
                <img src="img/blog/water-pump.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
              </a>
            </div>
            <div class="row margin-top-md">
              <div class="col-md-2 date-md">
                <div class="timeline-item-date date-wrapper"> <span class="date-m">Jan</span> <span class="date-d">31</span> </div>
              </div>
              <div class="col-md-10">
                <div class="tags"><a href="#" class="tag">design</a> / <a href="#" class="type">image</a></div>
                <h4 class="timeline-item-title">
                  <a href="#">Lobortis Pagus Tego Verto Virtus</a>
                </h4>
                <p class="timeline-item-description">Abdo appellatio nutus si ulciscor vereor. Elit luctus olim patria uxor. Distineo dolore jugis. Esca exerci facilisis loquor minim vereor zelus.</p>
                <ul class="list-inline links">
                  <li>
                    <a href="blog-post.htm" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                  </li>
                  <li>
                    <a href="blog-post.htm#comments" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> 33 Comments</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <!--Timeline item 8-->
          <div class="timeline-item blog-post animated right fadeIn de-02">
            <div class="blog-media">
              <iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/113479203&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_artwork=true"></iframe>
            </div>
            <div class="row margin-top-md">
              <div class="col-md-2 date-md">
                <div class="timeline-item-date date-wrapper"> <span class="date-m">Jan</span> <span class="date-d">30</span> </div>
              </div>
              <div class="col-md-10">
                <div class="tags"><a href="#" class="tag">design</a> / <a href="#" class="type">audio</a></div>
                <h4 class="timeline-item-title">
                  <a href="#">Accumsan Metuo Nostrud Nunc Torqueo</a>
                </h4>
                <p class="timeline-item-description">Augue camur eligo eros qui quibus quidne singularis. Cui distineo melior ratis. Autem immitto lucidus quidem ratis scisco tincidunt venio.</p>
                <ul class="list-inline links">
                  <li>
                    <a href="blog-post.htm" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                  </li>
                  <li>
                    <a href="blog-post.htm#comments" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> 67 Comments</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <!--Timeline item 9-->
          <div class="timeline-item blog-post animated fadeIn de-02">
            <div class="blog-media">
              <a href="blog-post.htm">
                <img src="img/blog/butterfly.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
              </a>
            </div>
            <div class="row margin-top-md">
              <div class="col-md-2 date-md">
                <div class="timeline-item-date date-wrapper"> <span class="date-m">Jan</span> <span class="date-d">28</span> </div>
              </div>
              <div class="col-md-10">
                <div class="tags"><a href="#" class="tag">coding</a> / <a href="#" class="type">image</a></div>
                <h4 class="timeline-item-title">
                  <a href="#">Adipiscing Blandit Damnum Obruo Verto</a>
                </h4>
                <p class="timeline-item-description">Duis esca fere huic nunc. Abbas abluo comis diam et hos luptatum minim praesent typicus. Dignissim illum suscipere. At valde ymo.</p>
                <ul class="list-inline links">
                  <li>
                    <a href="blog-post.htm" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                  </li>
                  <li>
                    <a href="blog-post.htm#comments" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> 46 Comments</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <!--Timeline item 10-->
          <div class="timeline-item blog-post animated right fadeIn de-02">
            <div class="blog-media">
              <a href="blog-post.htm">
                <img src="img/blog/ape.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
              </a>
            </div>
            <div class="row margin-top-md">
              <div class="col-md-2 date-md">
                <div class="timeline-item-date date-wrapper"> <span class="date-m">Jan</span> <span class="date-d">27</span> </div>
              </div>
              <div class="col-md-10">
                <div class="tags"><a href="#" class="tag">general</a> / <a href="#" class="type">image</a></div>
                <h4 class="timeline-item-title">
                  <a href="#">Augue Dolus Eum Pecus Quadrum</a>
                </h4>
                <p class="timeline-item-description">Esse iustum pagus. Ad capto feugiat inhibeo iustum minim occuro persto quadrum singularis. Acsi commodo hos incassum uxor virtus. Antehabeo cui gilvus imputo modo quadrum quidne utrum.</p>
                <ul class="list-inline links">
                  <li>
                    <a href="blog-post.htm" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                  </li>
                  <li>
                    <a href="blog-post.htm#comments" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> 40 Comments</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <!--Timeline item 11-->
          <div class="timeline-item blog-post animated fadeIn de-02">
            <div class="blog-media">
              <a href="blog-post.htm">
                <img src="img/blog/frog.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
              </a>
            </div>
            <div class="row margin-top-md">
              <div class="col-md-2 date-md">
                <div class="timeline-item-date date-wrapper"> <span class="date-m">Jan</span> <span class="date-d">26</span> </div>
              </div>
              <div class="col-md-10">
                <div class="tags"><a href="#" class="tag">general</a> / <a href="#" class="type">image</a></div>
                <h4 class="timeline-item-title">
                  <a href="#">Decet Ludus Persto Sagaciter Scisco</a>
                </h4>
                <p class="timeline-item-description">Ibidem tego venio. Aptent camur erat jumentum os. Commodo consequat macto quadrum saluto. Dignissim humo lenis ratis zelus. Causa et gravis magna natu nobis quidne roto vindico.</p>
                <ul class="list-inline links">
                  <li>
                    <a href="blog-post.htm" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                  </li>
                  <li>
                    <a href="blog-post.htm#comments" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> 83 Comments</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <!--Timeline item 12-->
          <div class="timeline-item blog-post animated right fadeIn de-02">
            <div class="blog-media">
              <a href="blog-post.htm">
                <img src="img/blog/ladybird.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
              </a>
            </div>
            <div class="row margin-top-md">
              <div class="col-md-2 date-md">
                <div class="timeline-item-date date-wrapper"> <span class="date-m">Jan</span> <span class="date-d">24</span> </div>
              </div>
              <div class="col-md-10">
                <div class="tags"><a href="#" class="tag">weather</a> / <a href="#" class="type">image</a></div>
                <h4 class="timeline-item-title">
                  <a href="#">Abico Acsi Jumentum Paratus Quis</a>
                </h4>
                <p class="timeline-item-description">Bene blandit consequat gilvus proprius sino velit virtus. Esca paulatim sed. Abbas illum metuo molior nisl valetudo. Gilvus magna ymo.</p>
                <ul class="list-inline links">
                  <li>
                    <a href="blog-post.htm" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                  </li>
                  <li>
                    <a href="blog-post.htm#comments" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> 27 Comments</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="timeline-breaker timeline-breaker-bottom"><a href="#" class="btn btn-link">Load More</a></div>
        </div>
      </div>
      
      <!--Sidebar-->
      <div class="col-md-3 sidebar sidebar-right">
        <div class="inner">
          
          <!-- @Element: Search form -->
          <div class="block">
            <form role="form">
              <div class="input-group">
                <label class="sr-only" for="search-field">Search</label>
                <input type="search" class="form-control" id="search-field" placeholder="Search">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button">Go!</button>
                </span>
              </div>
            </form>
          </div>
          
          <!-- @Element: Tag cloud -->
          <div class="block">
            <h4 class="title-divider">
              <span>Tags</span>
            </h4>
            <div class="tag-cloud">
              <span><a href="#">culture</a> (4)</span>
              <span><a href="#">general</a> (48)</span>
              <span><a href="#">coding</a> (31)</span>
              <span><a href="#">design</a> (58)</span>
              <span><a href="#">weather</a> (41)</span>
              <span><a href="#">jobs</a> (70)</span>
              <span><a href="#">health</a> (36)</span>
            </div>
          </div>
          
          <!-- @Element: Archive -->
          <div class="block">
            <h4 class="title-divider">
              <span>Archive</span>
            </h4>
            <ul class="list-unstyled list-lg tags">
              <li><i class="fa fa-angle-right fa-fw"></i> <a href="#">February 2015</a> (46)</li>
              <li><i class="fa fa-angle-right fa-fw"></i> <a href="#">January 2015</a> (93)</li>
              <li><i class="fa fa-angle-right fa-fw"></i> <a href="#">December 2014</a> (89)</li>
              <li><i class="fa fa-angle-right fa-fw"></i> <a href="#">November 2014</a> (100)</li>
              <li><i class="fa fa-angle-right fa-fw"></i> <a href="#">October 2014</a> (28)</li>
              <li><i class="fa fa-angle-right fa-fw"></i> <a href="#">September 2014</a> (31)</li>
              <li><i class="fa fa-angle-right fa-fw"></i> <a href="#">August 2014</a> (88)</li>
            </ul>
          </div>
          
          <!-- @Element: Popular/recent tabs -->
          <div class="block">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#popular" data-toggle="tab">Popular</a></li>
              <li><a href="#latest" data-toggle="tab">Latest</a></li>
            </ul>
            <div class="tab-content tab-content-bordered">
              <!-- Popular tab content -->
              <div class="tab-pane fade in active blog-roll-mini" id="popular">
                <!-- Popular blog post 1 -->
                <div class="row blog-post">
                  <div class="col-xs-4">
                    <div class="blog-media">
                      <a href="blog-post.htm">
                        <img src="img/blog/fly.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                      </a>
                    </div>
                  </div>
                  <div class="col-xs-8">
                    <h5>
                      <a href="#">Consequat Luctus Magna Pecus</a>
                    </h5>
                  </div>
                </div>
                <!-- Popular blog post 2 -->
                <div class="row blog-post">
                  <div class="col-xs-4">
                    <div class="blog-media">
                      <a href="blog-post.htm">
                        <img src="img/blog/ladybird.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                      </a>
                    </div>
                  </div>
                  <div class="col-xs-8">
                    <h5>
                      <a href="#">Aptent Elit Tego Utinam</a>
                    </h5>
                  </div>
                </div>
                <!-- Popular blog post 3 -->
                <div class="row blog-post">
                  <div class="col-xs-4">
                    <div class="blog-media">
                      <a href="blog-post.htm">
                        <img src="img/blog/frog.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                      </a>
                    </div>
                  </div>
                  <div class="col-xs-8">
                    <h5>
                      <a href="#">Acsi Dolor Jumentum Typicus</a>
                    </h5>
                  </div>
                </div>
                <!-- Popular blog post 4 -->
                <div class="row blog-post">
                  <div class="col-xs-4">
                    <div class="blog-media">
                      <a href="blog-post.htm">
                        <img src="img/blog/water-pump.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                      </a>
                    </div>
                  </div>
                  <div class="col-xs-8">
                    <h5>
                      <a href="#">Diam Dolor Saluto Valde</a>
                    </h5>
                  </div>
                </div>
              </div>
              <!-- Latest tab content -->
              <div class="tab-pane fade blog-roll-mini" id="latest">
                <!-- Latest blog post 1 -->
                <div class="row blog-post">
                  <div class="col-xs-4">
                    <div class="blog-media">
                      <a href="blog-post.htm">
                        <img src="img/blog/butterfly.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                      </a>
                    </div>
                  </div>
                  <div class="col-xs-8">
                    <h5>
                      <a href="#">Abico Decet Natu Utinam</a>
                    </h5>
                  </div>
                </div>
                <!-- Latest blog post 2 -->
                <div class="row blog-post">
                  <div class="col-xs-4">
                    <div class="blog-media">
                      <a href="blog-post.htm">
                        <img src="img/blog/frog.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                      </a>
                    </div>
                  </div>
                  <div class="col-xs-8">
                    <h5>
                      <a href="#">Antehabeo Eum Luptatum Veniam</a>
                    </h5>
                  </div>
                </div>
                <!-- Latest blog post 3 -->
                <div class="row blog-post">
                  <div class="col-xs-4">
                    <div class="blog-media">
                      <a href="blog-post.htm">
                        <img src="img/blog/water-pump.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                      </a>
                    </div>
                  </div>
                  <div class="col-xs-8">
                    <h5>
                      <a href="#">Meus Nunc Odio Sudo</a>
                    </h5>
                  </div>
                </div>
                <!-- Latest blog post 4 -->
                <div class="row blog-post">
                  <div class="col-xs-4">
                    <div class="blog-media">
                      <a href="blog-post.htm">
                        <img src="img/blog/fly.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                      </a>
                    </div>
                  </div>
                  <div class="col-xs-8">
                    <h5>
                      <a href="#">Dolor Imputo In Utrum</a>
                    </h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- @Element: Subscrive button -->
          <div class="block">
            <a href="#" class="btn btn-warning"><i class="fa fa-rss"></i> Subscribe via RSS feed</a>
          </div>
          
          <!-- Follow Widget -->
          <div class="block">
            <h4 class="title-divider">
              <span>Follow Us On</span>
            </h4>
            <!--@todo: replace with real social media links -->
            <ul class="list-unstyled social-media-branding">
              <li>
                <a href="#" class="social-link branding-twitter"><i class="fa fa-twitter-square fa-fw"></i> Twitter</a>
              </li>
              <li>
                <a href="#" class="social-link branding-facebook"><i class="fa fa-facebook-square fa-fw"></i> Facebook</a>
              </li>
              <li>
                <a href="#" class="social-link branding-linkedin"><i class="fa fa-linkedin-square fa-fw"></i> LinkedIn</a>
              </li>
              <li>
                <a href="#" class="social-link branding-google-plus"><i class="fa fa-google-plus-square fa-fw"></i> Google+</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--.container-->
@stop