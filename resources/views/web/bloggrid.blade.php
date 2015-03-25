@extends('layouts.main')

@section('content')
<div class="container">
    <h2 class="title-divider">
      <span>Company <span class="de-em">Blog</span></span>
      <small>We love to talk!</small>
    </h2>
    
    <div class="row">
      <!--Blog Timeline -->
      <div class="col-md-9">
        <div class="blog-roll blog-grid" data-toggle="isotope-grid" data-isotope-options='{"itemSelector": ".grid-item"}'>
          <div class="row">
            
            <!--Timeline item 1-->
            <div class="col-sm-6 col-md-4 grid-item">
              <div class="blog-post">
                <div class="blog-media">
                  <a href="blog-post.htm">
                    <img src="img/blog/fly.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                  </a>
                </div>
                <div class="margin-top-md">
                  <div class="date-wrapper date-wrapper-horizontal">
<span class="date-m">February</span>
<span class="date-d">08</span> </div>
                  <div class="tags"><a href="#" class="tag">weather</a> / <a href="#" class="type">image</a></div>
                  <h4 class="timeline-item-title">
                    <a href="#">Natu Obruo Tego Veniam Zelus</a>
                  </h4>
                  <p class="timeline-item-description">Abdo defui dolor gilvus jumentum proprius venio voco. Ad autem commodo et imputo lucidus meus refoveo sit usitas.</p>
                  <a href="blog-post.htm" class="btn btn-link"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                </div>
              </div>
            </div>
            
            <!--Timeline item 2-->
            <div class="col-sm-6 col-md-4 grid-item">
              <div class="blog-post">
                <div class="blog-media">
                  <a href="blog-post.htm">
                    <img src="img/blog/bee.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                  </a>
                </div>
                <div class="margin-top-md">
                  <div class="date-wrapper date-wrapper-horizontal">
<span class="date-m">February</span>
<span class="date-d">06</span> </div>
                  <div class="tags"><a href="#" class="tag">general</a> / <a href="#" class="type">image</a></div>
                  <h4 class="timeline-item-title">
                    <a href="#">Acsi Dignissim Meus Similis Ulciscor</a>
                  </h4>
                  <p class="timeline-item-description">Genitus jumentum meus paratus voco. Caecus consequat decet et humo illum immitto similis singularis te.</p>
                  <a href="blog-post.htm" class="btn btn-link"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                </div>
              </div>
            </div>
            
            <!--Timeline item 3-->
            <div class="col-sm-6 col-md-4 grid-item">
              <div class="blog-post">
                <div class="blog-media">
                  <a href="blog-post.htm">
                    <img src="img/blog/frog.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                  </a>
                </div>
                <div class="margin-top-md">
                  <div class="date-wrapper date-wrapper-horizontal">
<span class="date-m">February</span>
<span class="date-d">05</span> </div>
                  <div class="tags"><a href="#" class="tag">design</a> / <a href="#" class="type">image</a></div>
                  <h4 class="timeline-item-title">
                    <a href="#">Esca Laoreet Tamen Ullamcorper Zelus</a>
                  </h4>
                  <p class="timeline-item-description">In incassum luptatum melior nunc praesent suscipit tego. Iustum probo quae.</p>
                  <a href="blog-post.htm" class="btn btn-link"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                </div>
              </div>
            </div>
            
            <!--Timeline item 4-->
            <div class="col-sm-6 col-md-4 grid-item">
              <div class="blog-post">
                <div class="blog-media">
                  <div class="slider-wrapper">
                    <div class="flexslider slider-mini-nav" data-slidernav="auto" data-transition="fade">
                      <div class="slides">
                        <div class="slide">
                          <img src="img/blog/frog.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                        </div>
                        <div class="slide">
                          <img src="img/blog/ladybird.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                        </div>
                        <div class="slide">
                          <img src="img/blog/butterfly.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                        </div>
                        <div class="slide">
                          <img src="img/blog/bee.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="margin-top-md">
                  <div class="date-wrapper date-wrapper-horizontal">
<span class="date-m">February</span>
<span class="date-d">04</span> </div>
                  <div class="tags"><a href="#" class="tag">design</a> / <a href="#" class="type">slideshow</a></div>
                  <h4 class="timeline-item-title">
                    <a href="#">Ea Erat Probo Valetudo Validus</a>
                  </h4>
                  <p class="timeline-item-description">Huic populus tamen wisi. Antehabeo macto scisco. Adipiscing conventio jus loquor macto modo quis vindico.</p>
                  <a href="blog-post.htm" class="btn btn-link"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                </div>
              </div>
            </div>
            
            <!--Timeline item 5-->
            <div class="col-sm-6 col-md-4 grid-item">
              <div class="blog-post">
                <div class="blog-media">
                  <a href="blog-post.htm">
                    <img src="img/blog/water-pump.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                  </a>
                </div>
                <div class="margin-top-md">
                  <div class="date-wrapper date-wrapper-horizontal">
<span class="date-m">February</span>
<span class="date-d">02</span> </div>
                  <div class="tags"><a href="#" class="tag">coding</a> / <a href="#" class="type">image</a></div>
                  <h4 class="timeline-item-title">
                    <a href="#">Aliquip Antehabeo Jus Natu Nutus</a>
                  </h4>
                  <p class="timeline-item-description">Laoreet magna pagus sino vel. Dolore dolus imputo in mauris minim singularis tation tum.</p>
                  <a href="blog-post.htm" class="btn btn-link"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                </div>
              </div>
            </div>
            
            <!--Timeline item 6-->
            <div class="col-sm-6 col-md-4 grid-item">
              <div class="blog-post">
                <div class="blog-media">
                  <object width="560" height="315">
                    <param name="movie" value="//www.youtube.com/v/qpWlaOeGZ_4?hl=en_US&amp;version=3&amp;rel=0"></param>
                    <param name="allowFullScreen" value="true"></param>
                    <param name="allowscriptaccess" value="always"></param>
                    <embed src="//www.youtube.com/v/qpWlaOeGZ_4?hl=en_US&amp;version=3&amp;rel=0" type="application/x-shockwave-flash" width="560" height="315" allowscriptaccess="always" allowfullscreen="true"></embed>
                  </object>
                </div>
                <div class="margin-top-md">
                  <div class="date-wrapper date-wrapper-horizontal">
<span class="date-m">February</span>
<span class="date-d">01</span> </div>
                  <div class="tags"><a href="#" class="tag">coding</a> / <a href="#" class="type">video</a></div>
                  <h4 class="timeline-item-title">
                    <a href="#">Abbas Haero Jugis Proprius Vereor</a>
                  </h4>
                  <p class="timeline-item-description">Enim erat jumentum refoveo torqueo. Defui exputo iaceo nibh nulla odio probo quae similis suscipere.</p>
                  <a href="blog-post.htm" class="btn btn-link"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                </div>
              </div>
            </div>
            
            <!--Timeline item 7-->
            <div class="col-sm-6 col-md-4 grid-item">
              <div class="blog-post">
                <div class="blog-media">
                  <a href="blog-post.htm">
                    <img src="img/blog/water-pump.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                  </a>
                </div>
                <div class="margin-top-md">
                  <div class="date-wrapper date-wrapper-horizontal">
<span class="date-m">January</span>
<span class="date-d">31</span> </div>
                  <div class="tags"><a href="#" class="tag">weather</a> / <a href="#" class="type">image</a></div>
                  <h4 class="timeline-item-title">
                    <a href="#">Abbas Brevitas Olim Quia Venio</a>
                  </h4>
                  <p class="timeline-item-description">Neque roto tation. Aptent augue et gilvus. Autem exerci exputo iustum jus premo quae.</p>
                  <a href="blog-post.htm" class="btn btn-link"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                </div>
              </div>
            </div>
            
            <!--Timeline item 8-->
            <div class="col-sm-6 col-md-4 grid-item">
              <div class="blog-post">
                <div class="blog-media">
                  <iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/113479203&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_artwork=true"></iframe>
                </div>
                <div class="margin-top-md">
                  <div class="date-wrapper date-wrapper-horizontal">
<span class="date-m">January</span>
<span class="date-d">30</span> </div>
                  <div class="tags"><a href="#" class="tag">design</a> / <a href="#" class="type">audio</a></div>
                  <h4 class="timeline-item-title">
                    <a href="#">Aliquam Obruo Refero Ulciscor Velit</a>
                  </h4>
                  <p class="timeline-item-description">Neque sagaciter singularis. Dignissim nisl sit. Aliquam magna torqueo. Abbas hos iusto refoveo veniam.</p>
                  <a href="blog-post.htm" class="btn btn-link"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                </div>
              </div>
            </div>
            
            <!--Timeline item 9-->
            <div class="col-sm-6 col-md-4 grid-item">
              <div class="blog-post">
                <div class="blog-media">
                  <a href="blog-post.htm">
                    <img src="img/blog/fly.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                  </a>
                </div>
                <div class="margin-top-md">
                  <div class="date-wrapper date-wrapper-horizontal">
<span class="date-m">January</span>
<span class="date-d">28</span> </div>
                  <div class="tags"><a href="#" class="tag">weather</a> / <a href="#" class="type">image</a></div>
                  <h4 class="timeline-item-title">
                    <a href="#">Adipiscing Damnum Genitus Meus Singularis</a>
                  </h4>
                  <p class="timeline-item-description">Augue commodo consequat eum inhibeo modo quia te valetudo. Fere iaceo plaga vel vulpes vulputate.</p>
                  <a href="blog-post.htm" class="btn btn-link"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                </div>
              </div>
            </div>
            
            <!--Timeline item 10-->
            <div class="col-sm-6 col-md-4 grid-item">
              <div class="blog-post">
                <div class="blog-media">
                  <a href="blog-post.htm">
                    <img src="img/blog/butterfly.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                  </a>
                </div>
                <div class="margin-top-md">
                  <div class="date-wrapper date-wrapper-horizontal">
<span class="date-m">January</span>
<span class="date-d">27</span> </div>
                  <div class="tags"><a href="#" class="tag">general</a> / <a href="#" class="type">image</a></div>
                  <h4 class="timeline-item-title">
                    <a href="#">Facilisis Pertineo Premo Quidem Virtus</a>
                  </h4>
                  <p class="timeline-item-description">Hendrerit iustum pecus. Aliquam quis ulciscor vicis. Camur esca huic nulla patria.</p>
                  <a href="blog-post.htm" class="btn btn-link"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                </div>
              </div>
            </div>
            
            <!--Timeline item 11-->
            <div class="col-sm-6 col-md-4 grid-item">
              <div class="blog-post">
                <div class="blog-media">
                  <a href="blog-post.htm">
                    <img src="img/blog/butterfly.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                  </a>
                </div>
                <div class="margin-top-md">
                  <div class="date-wrapper date-wrapper-horizontal">
<span class="date-m">January</span>
<span class="date-d">26</span> </div>
                  <div class="tags"><a href="#" class="tag">weather</a> / <a href="#" class="type">image</a></div>
                  <h4 class="timeline-item-title">
                    <a href="#">Dolor Gravis In Loquor Secundum</a>
                  </h4>
                  <p class="timeline-item-description">Aliquip at eu paulatim tum. Commoveo diam eros hendrerit praesent quia refoveo.</p>
                  <a href="blog-post.htm" class="btn btn-link"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                </div>
              </div>
            </div>
            
            <!--Timeline item 12-->
            <div class="col-sm-6 col-md-4 grid-item">
              <div class="blog-post">
                <div class="blog-media">
                  <a href="blog-post.htm">
                    <img src="img/blog/fly.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                  </a>
                </div>
                <div class="margin-top-md">
                  <div class="date-wrapper date-wrapper-horizontal">
<span class="date-m">January</span>
<span class="date-d">24</span> </div>
                  <div class="tags"><a href="#" class="tag">jobs</a> / <a href="#" class="type">image</a></div>
                  <h4 class="timeline-item-title">
                    <a href="#">Iustum Ludus Melior Occuro Sudo</a>
                  </h4>
                  <p class="timeline-item-description">Esca fere iustum quibus ulciscor usitas validus velit. Conventio diam distineo suscipere volutpat.</p>
                  <a href="blog-post.htm" class="btn btn-link"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="pagination">
          <button type="button" class="btn btn-default btn-lg btn-block">Load More</button>
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
              <span><a href="#">culture</a> (44)</span>
              <span><a href="#">general</a> (56)</span>
              <span><a href="#">coding</a> (71)</span>
              <span><a href="#">design</a> (57)</span>
              <span><a href="#">weather</a> (80)</span>
              <span><a href="#">jobs</a> (61)</span>
              <span><a href="#">health</a> (11)</span>
            </div>
          </div>
          
          <!-- @Element: Archive -->
          <div class="block">
            <h4 class="title-divider">
              <span>Archive</span>
            </h4>
            <ul class="list-unstyled list-lg tags">
              <li><i class="fa fa-angle-right fa-fw"></i> <a href="#">February 2015</a> (90)</li>
              <li><i class="fa fa-angle-right fa-fw"></i> <a href="#">January 2015</a> (26)</li>
              <li><i class="fa fa-angle-right fa-fw"></i> <a href="#">December 2014</a> (42)</li>
              <li><i class="fa fa-angle-right fa-fw"></i> <a href="#">November 2014</a> (55)</li>
              <li><i class="fa fa-angle-right fa-fw"></i> <a href="#">October 2014</a> (39)</li>
              <li><i class="fa fa-angle-right fa-fw"></i> <a href="#">September 2014</a> (59)</li>
              <li><i class="fa fa-angle-right fa-fw"></i> <a href="#">August 2014</a> (4)</li>
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
                      <a href="#">Huic Letalis Pagus Saluto</a>
                    </h5>
                  </div>
                </div>
                <!-- Popular blog post 2 -->
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
                      <a href="#">Damnum Iaceo Modo Sino</a>
                    </h5>
                  </div>
                </div>
                <!-- Popular blog post 3 -->
                <div class="row blog-post">
                  <div class="col-xs-4">
                    <div class="blog-media">
                      <a href="blog-post.htm">
                        <img src="img/blog/bee.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                      </a>
                    </div>
                  </div>
                  <div class="col-xs-8">
                    <h5>
                      <a href="#">Accumsan Cui Hos Vindico</a>
                    </h5>
                  </div>
                </div>
                <!-- Popular blog post 4 -->
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
                      <a href="#">Nulla Paulatim Saepius Tamen</a>
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
                        <img src="img/blog/bee.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                      </a>
                    </div>
                  </div>
                  <div class="col-xs-8">
                    <h5>
                      <a href="#">Aptent Eum Rusticus Saepius</a>
                    </h5>
                  </div>
                </div>
                <!-- Latest blog post 2 -->
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
                      <a href="#">Cogo Feugiat Praemitto Saepius</a>
                    </h5>
                  </div>
                </div>
                <!-- Latest blog post 3 -->
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
                      <a href="#">Ille Minim Singularis Tego</a>
                    </h5>
                  </div>
                </div>
                <!-- Latest blog post 4 -->
                <div class="row blog-post">
                  <div class="col-xs-4">
                    <div class="blog-media">
                      <a href="blog-post.htm">
                        <img src="img/blog/bee.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                      </a>
                    </div>
                  </div>
                  <div class="col-xs-8">
                    <h5>
                      <a href="#">Facilisis Suscipit Tego Vulpes</a>
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
@stop