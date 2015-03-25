@extends('layouts.main')

@section('content')
<div class="container">
    <h2 class="title-divider">
      <span>Theme Elements</span>
    </h2>
    <!--Intro-->
    <p>AppStrap contains <a href="http://getbootstrap.com/">all the standard Twitter Bootstrap goodies</a> and more, here's a quick overview of some of the key elements.</p>
    
    <!--Row 1-->
    <div class="row">
      <div class="col-md-12">
        <!--@Element: buttons-->
        <h3 class="title-divider">
          <span>Buttons</span>
        </h3>
        <h4>
          Default
        </h4>
        <h5 class="margin-top-md">
          Mini
        </h5>
        <button type="button" class="btn btn-default btn-xs">Default</button>
        <button type="button" class="btn btn-xs btn-primary">Primary</button>
        <button type="button" class="btn btn-xs btn-info">Info</button>
        <button type="button" class="btn btn-xs btn-success">Success</button>
        <button type="button" class="btn btn-xs btn-warning">Warning</button>
        <button type="button" class="btn btn-xs btn-danger">Danger</button>
        <button type="button" class="btn btn-link">Link</button>
        <h5 class="margin-top-md">
          Small
        </h5>
        <button type="button" class="btn btn-default btn-sm">Default</button>
        <button type="button" class="btn btn-sm btn-primary">Primary</button>
        <button type="button" class="btn btn-sm btn-info">Info</button>
        <button type="button" class="btn btn-sm btn-success">Success</button>
        <button type="button" class="btn btn-sm btn-warning">Warning</button>
        <button type="button" class="btn btn-sm btn-danger">Danger</button>
        <button type="button" class="btn btn-link">Link</button>
        <br />
        <h5 class="margin-top-md">
          Medium
        </h5>
        <button type="button" class="btn btn-default btn-default">Default</button>
        <button type="button" class="btn btn-primary">Primary</button>
        <button type="button" class="btn btn-info">Info</button>
        <button type="button" class="btn btn-success">Success</button>
        <button type="button" class="btn btn-warning">Warning</button>
        <button type="button" class="btn btn-danger">Danger</button>
        <button type="button" class="btn btn-link">Link</button>
        <br />
        <h5 class="margin-top-md">
          Large
        </h5>
        <button type="button" class="btn btn-default btn-lg">Default</button>
        <button type="button" class="btn btn-lg btn-primary">Primary</button>
        <button type="button" class="btn btn-lg btn-info">Info</button>
        <button type="button" class="btn btn-lg btn-success">Success</button>
        <button type="button" class="btn btn-lg btn-warning">Warning</button>
        <button type="button" class="btn btn-lg btn-danger">Danger</button>
        <button type="button" class="btn btn-link">Link</button>
        <br />
        
        <!-- Button Dropdowns -->
        <h4 class="margin-top-lg">
          Buttons Dropdown
        </h4>
        <!-- Split button default -->
        <div class="btn-group">
          <button type="button" class="btn btn-default">Action</button>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span> <span class="sr-only">Toggle Dropdown</span> </button>
          <ul class="dropdown-menu dropdown-menu-default" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </div>
        
        <!-- Split button primary -->
        <div class="btn-group">
          <button type="button" class="btn btn-primary">Action</button>
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span> <span class="sr-only">Toggle Dropdown</span> </button>
          <ul class="dropdown-menu dropdown-menu-primary" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </div>
        <!-- Split button info -->
        <div class="btn-group">
          <button type="button" class="btn btn-info">Action</button>
          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span> <span class="sr-only">Toggle Dropdown</span> </button>
          <ul class="dropdown-menu dropdown-menu-info" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </div>
        <!-- Split button success -->
        <div class="btn-group">
          <button type="button" class="btn btn-success">Action</button>
          <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span> <span class="sr-only">Toggle Dropdown</span> </button>
          <ul class="dropdown-menu dropdown-menu-success" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </div>
        <!-- Split button warning -->
        <div class="btn-group">
          <button type="button" class="btn btn-warning">Action</button>
          <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span> <span class="sr-only">Toggle Dropdown</span> </button>
          <ul class="dropdown-menu dropdown-menu-warning" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </div>
        <!-- Split button danger -->
        <div class="btn-group">
          <button type="button" class="btn btn-danger">Action</button>
          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span> <span class="sr-only">Toggle Dropdown</span> </button>
          <ul class="dropdown-menu dropdown-menu-danger" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </div>
        
        <!-- Toggle Buttons -->
        <h4 class="margin-top-lg">
          Toggles 
          <small>Powered by <a href="http://www.bootstrap-switch.org/">Bootstrap Switch</a>.</small>
        </h4>
        <h5 class="margin-top-lg">
          Sizes
        </h5>
        <input type="checkbox" data-toggle="switch" checked data-size="large">
        <input type="checkbox" data-toggle="switch" checked>
        <input type="checkbox" data-toggle="switch" checked data-size="small">
        <input type="checkbox" data-toggle="switch" checked data-size="mini">
        <h5 class="margin-top-lg">
          On / Off Colours
        </h5>
        <input type="checkbox" data-toggle="switch" checked data-on-color="primary" data-off-color="default">
        <input type="checkbox" data-toggle="switch" checked data-on-color="info" data-off-color="success">
        <input type="checkbox" data-toggle="switch" checked data-on-color="success" data-off-color="warning">
        <input type="checkbox" data-toggle="switch" checked data-on-color="warning" data-off-color="danger">
        <input type="checkbox" data-toggle="switch" checked data-on-color="danger" data-off-color="default">
        <input type="checkbox" data-toggle="switch" checked data-on-color="default" data-off-color="primary">
        <p class="margin-top-lg">Simply add data data-toggle="switch" to any radio or checkbox element:</p>
        <pre class="language-markup">
          Example:
          <br />
          <code>&lt;input type="checkbox" data-toggle="switch" checked></code>
        </pre>
        <p>Find more examples at <a href="http://www.bootstrap-switch.org/">Bootstrap Switch</a>.</p>
        
        <!--@Element: Accordion-->
        <h3 class="title-divider">
          <span>Accordion</span>
        </h3>
        <div class="row">
          <div class="col-md-6">
            <h4>
              Default
            </h4>
            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Collapsible Group Item #1 </a> 
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                  <div class="panel-body">Aliquip distineo dolus haero huic olim veniam. Ad amet caecus eum saluto virtus voco. Exputo inhibeo tego.</div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Collapsible Group Item #2 </a> 
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                  <div class="panel-body">Exerci iustum lenis minim natu similis wisi. Autem facilisi gravis interdico loquor meus pala sudo te.</div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> Collapsible Group Item #3 </a> 
                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                  <div class="panel-body">Blandit consectetuer sit te vel. Esse ibidem jus minim probo proprius. Distineo esse genitus gilvus modo obruo odio secundum suscipit vulpes.</div>
                </div>
              </div>
            </div>
            <p>You can apply all default Bootstrap panel styles to individual panels as well ie. .panel-primary, .panel-success, .panel-info, .panel-warning, .panel-danger.</p>
          </div>
          <div class="col-md-6">
            <h4>
              List Style
            </h4>
            <!-- List Accordion -->
            <div class="panel-group panel-group-list-style" id="list-accordion">
              <div class="panel panel-default">
                <div class="panel-heading"> <a data-toggle="collapse" data-parent="#list-accordion" href="#collapseOneList" class="panel-title">Our Mission</a> </div>
                <div id="collapseOneList" class="collapse in">
                  <div class="panel-body">Acsi erat lucidus meus refoveo rusticus. Aptent incassum iriure pecus persto tincidunt. Antehabeo at damnum euismod iaceo ludus obruo sit tation.</div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading"> <a data-toggle="collapse" data-parent="#list-accordion" href="#collapseTwoList" class="panel-title collapsed">Our Process</a> </div>
                <div id="collapseTwoList" class="collapse">
                  <div class="panel-body">Consequat dolore nutus pertineo pneum sagaciter suscipit validus. Abluo distineo hos inhibeo metuo meus paratus utinam.</div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading"> <a data-toggle="collapse" data-parent="#list-accordion" href="#collapseThreeList" class="panel-title collapsed">How We Work</a> </div>
                <div id="collapseThreeList" class="collapse">
                  <div class="panel-body">Accumsan cogo hendrerit neque praemitto roto similis utinam vel. Blandit ea ibidem iriure macto pala tamen.</div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading"> <a data-toggle="collapse" data-parent="#list-accordion" href="#collapseFourList" class="panel-title collapsed">What We Do</a> </div>
                <div id="collapseFourList" class="collapse">
                  <div class="panel-body">Abluo blandit exputo importunus utrum. Bene imputo mauris nostrud tamen tum utinam.</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!--@Element: Carousel-->
        <h3 class="title-divider">
          <span>Carousel</span>
        </h3>
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
        
        <!--@Element: Alerts-->
        <h3 class="title-divider">
          <span>Alerts</span>
        </h3>
        <div class="alert alert-info">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4>
            Nothing much happening!
          </h4>
          Just saying...... 
        </div>
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4>
            Looking good!
          </h4>
          All systems are go!! 
        </div>
        <div class="alert alert-warning">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4>
            Warning!
          </h4>
          Danger, High voltage!! 
        </div>
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4>
            Error!
          </h4>
          Server meltdown pending!!! 
        </div>
      </div>
    </div>
    <!--Row 1-->
    
    <!--Row 2-->
    <h3 class="title-divider">
      <span>Typography</span>
    </h3>
    <div class="row">
      <div class="col-md-8">
        <h4>
          Jumbotron (.jumbotron)
        </h4>
        <div class="jumbotron">
          <h1>
            Oi! Look at me!!
          </h1>
          <p>Integer. Tortor enim, phasellus aliquam! Turpis urna egestas et rhoncus elementum habitasse, quis! Auctor dolor et, tortor ridiculus facilisis integer integer! A odio pellentesque, velit placerat cras ultricies elementum lundium.</p>
          <p><a class="btn btn-primary btn-large">Learn more</a></p>
        </div>
        
        <h4 class="margin-top-large">
          Tables
        </h4>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Username</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td rowspan="2">1</td>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <td>Mark</td>
              <td>Otto</td>
              <td>@TwBootstrap</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <td>3</td>
              <td colspan="2">Larry the Bird</td>
              <td>@twitter</td>
            </tr>
          </tbody>
        </table>
        
        <h4 class="margin-top-large">
          Responsive Text Size
        </h4>
        <div class="row">
          <div class="col-xs-6 col-sm-3">
            <h5>
              Screen xs
            </h5>
            <div>.font-xs-x1</div>
            <div>.font-xs-x2</div>
            <div>.font-xs-x3</div>
            <div>.font-xs-x4</div>
            <div>.font-xs-x5</div>
            <div>.font-xs-x6</div>
            <div>.font-xs-x7</div>
            <div>.font-xs-x8</div>
            <div>.font-xs-x9</div>
            <div>.font-xs-x10</div>
          </div>
          <div class="col-xs-6 col-sm-3">
            <h5>
              Screen sm
            </h5>
            <div>.font-sm-x1</div>
            <div>.font-sm-x2</div>
            <div>.font-sm-x3</div>
            <div>.font-sm-x4</div>
            <div>.font-sm-x5</div>
            <div>.font-sm-x6</div>
            <div>.font-sm-x7</div>
            <div>.font-sm-x8</div>
            <div>.font-sm-x9</div>
            <div>.font-sm-x10</div>
          </div>
          <div class="col-xs-6 col-sm-3">
            <h5>
              Screen md
            </h5>
            <div>.font-md-x1</div>
            <div>.font-md-x2</div>
            <div>.font-md-x3</div>
            <div>.font-md-x4</div>
            <div>.font-md-x5</div>
            <div>.font-md-x6</div>
            <div>.font-md-x7</div>
            <div>.font-md-x8</div>
            <div>.font-md-x9</div>
            <div>.font-md-x10</div>
          </div>
          <div class="col-xs-6 col-sm-3">
            <h5>
              Screen lg
            </h5>
            <div>.font-lg-x1</div>
            <div>.font-lg-x2</div>
            <div>.font-lg-x3</div>
            <div>.font-lg-x4</div>
            <div>.font-lg-x5</div>
            <div>.font-lg-x6</div>
            <div>.font-lg-x7</div>
            <div>.font-lg-x8</div>
            <div>.font-lg-x9</div>
            <div>.font-lg-x10</div>
          </div>
        </div>
        <h5 class="margin-top-md">
          Example:
        </h5>
        <h2 class="font-xs-x2 font-md-x3">
          Resize the page to see me change
        </h2>
        <pre class="language-markup">
          <code>&lt;h2 class="font-xs-x2 font-md-x3">Resize the page to see me change&lt;/h2></code>
        </pre>
      </div>
      
      <div class="col-md-4">
        <h4>
          Quotes
        </h4>
        <blockquote>
          <p>"It's totally awesome, we're could imagine life without it!"</p>
          <footer>
            <img src="img/team/jimi.jpg" alt="Jimi Bloggs" class="img-circle">
            Jimi Bloggs <span class="spacer">/</span> <a href="#">@mrjimi</a>
          </footer>
        </blockquote>
        <h4 class="margin-top-large">
          Fancy Text (.fancy)
        </h4>
        <p>Normal text with something <span class="fancy">a bit fancy can be nice!</span>.</p>
        <h4 class="margin-top-large">
          Text Spacers (.spacer)
        </h4>
        <p>Please <span class="spacer">//</span> give <span class="spacer">//</span> me <span class="spacer">//</span> some <span class="spacer">//</span> space!</p>
        <h4 class="margin-top-large">
          Icons Included:
        </h4>
        <p class="lead">
          <a href="http://getbootstrap.com/components/#glyphicons"><span class="glyphicon glyphicon-thumbs-up"></span> 180 Bootstrap 3 Glyphicons</a>
        </p>
        <p class="lead">
          <a href="http://fortawesome.github.io/Font-Awesome/"><i class="fa fa-magic"></i> 439 Font Awesome Icons</a>
        </p>
        <p class="lead">
          <a href="http://lipis.github.io/flag-icon-css/"><span class="flag-icon flag-icon-gb"></span> Flag Icons</a>
        </p>
      </div>
    </div>
    <!--Row 2-->
    
    <!--Tools-->
    <h3 class="title-divider">
      <span>Useful tools</span>
    </h3>
    <div class="row">
      <div class="col-md-8">
        <h4>
          Horizontal Tabs
        </h4>
        <div class="tabbable">
          <ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">Tab 1</a></li>
            <li><a href="#tab2" data-toggle="tab">Tab 2</a></li>
            <li class="dropdown">
              <a href="#" id="#tab3" class="dropdown-toggle" data-toggle="dropdown">Dropdown Tab<b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="#vtab3">
                <li><a href="#tab3" tabindex="-1" data-toggle="tab">Dropdown Tab 1</a></li>
                <li><a href="#tab4" tabindex="-1" data-toggle="tab">Dropdown Tab 2</a></li>
              </ul>
            </li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade in active" id="tab1">
              <p>Dignissim tincidunt mattis lorem, sagittis nisi, amet ut pulvinar lectus cursus ac! Enim turpis odio dis. Non ut vel, nisi dapibus? Velit augue tortor, ut ac ac nec tortor nec, mauris massa.</p>
            </div>
            <div class="tab-pane fade" id="tab2">
              <p>Aliquet risus, penatibus, ac integer ultricies ultricies elementum augue proin habitasse placerat. Nunc habitasse duis, elementum, porttitor porta? Purus, ac odio. Habitasse, egestas vut.</p>
            </div>
            <div class="tab-pane fade" id="tab3">
              <p>Turpis elit, egestas nec etiam! Porta parturient amet! Eros aenean sit lacus sagittis massa? Massa a nunc! Nisi vut! Lundium, dictumst, nunc enim, natoque, cras nec, dictumst et rhoncus!</p>
            </div>
            <div class="tab-pane fade" id="tab4">
              <p>Dignissim enim in vel urna tortor nascetur rhoncus parturient ultricies, purus lundium velit nec arcu et dolor vel. </p>
            </div>
          </div>
        </div>
        
        <h4 class="margin-top-large">
          Vertical Tabs
        </h4>
        <div class="tabbable tabs-left vertical-tabs">
          <ul id="myTab2" class="nav nav-tabs nav-stacked col-sm-4 col-md-4">
            <li class="active"><a href="#vtab1" data-toggle="tab">Tab 1</a></li>
            <li><a href="#vtab2" data-toggle="tab">Tab 2</a></li>
            <li class="dropdown">
              <a href="#" id="#vtab3" class="dropdown-toggle" data-toggle="dropdown">Dropdown Tab<b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="#vtab3">
                <li><a href="#vtab3" tabindex="-1" data-toggle="tab">Dropdown Tab 1</a></li>
                <li><a href="#vtab4" tabindex="-1" data-toggle="tab">Dropdown Tab 2</a></li>
              </ul>
            </li>
          </ul>
          <div id="myTab2Content" class="tab-content col-sm-8 col-md-8">
            <div class="tab-pane fade in active" id="vtab1">
              <p>Dignissim tincidunt mattis lorem, sagittis nisi, amet ut pulvinar lectus cursus ac! Enim turpis odio dis. Non ut vel, nisi dapibus? Velit augue tortor, ut ac ac nec tortor nec, mauris massa.</p>
            </div>
            <div class="tab-pane fade" id="vtab2">
              <p>Aliquet risus, penatibus, ac integer ultricies ultricies elementum augue proin habitasse placerat. Nunc habitasse duis, elementum, porttitor porta? Purus, ac odio. Habitasse, egestas vut.</p>
            </div>
            <div class="tab-pane fade" id="vtab3">
              <p>Turpis elit, egestas nec etiam! Porta parturient amet! Eros aenean sit lacus sagittis massa? Massa a nunc! Nisi vut! Lundium, dictumst, nunc enim, natoque, cras nec, dictumst et rhoncus!</p>
            </div>
            <div class="tab-pane fade" id="vtab4">
              <p>Dignissim enim in vel urna tortor nascetur rhoncus parturient ultricies, purus lundium velit nec arcu et dolor vel. </p>
            </div>
          </div>
        </div>
        
        <h4 class="margin-top-large">
          Pagination
        </h4>
        <ul class="pagination">
          <li class="disabled"><a href="#">&laquo;</a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">&raquo;</a></li>
        </ul>
        
        <h4 class="margin-top-large">
          Code Syntax Highlighting
        </h4>
        <pre class="language-css">
          <code>p { color: red; }</code>
        </pre>
        <pre class="language-markup">
          <code>&lt;h2 class="font-xs-x2 font-md-x3">AppStrap&lt;/h2></code>
        </pre>
        <a href="http://prismjs.com/examples.html#different-markup">More examples on prismjs.com</a>. 
      </div>
      
      <div class="col-md-4">
        <h4>
          Tool Tip (data-toggle="tooltip")
        </h4>
        <p>Tooltip can really useful, maybe <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Did that help?"> on top</a>, or <a href="#" data-toggle="tooltip" data-placement="bottom" data-original-title="Any good?">below</a> or even <a href="#" data-toggle="tooltip" data-placement="left" data-original-title="I like left best">left</a> or <a href="#" data-toggle="tooltip" data-placement="right" data-original-title="Right you are!">right</a>. </p>
        
        <h4 class="margin-top-large">
          Popovers (data-toggle="popover")
        </h4>
        <p>Popovers are also really useful to explain something when you have a bit more to say, maybe <a href="#" data-toggle="popover" data-placement="top" data-content="Integer. Tortor enim, phasellus aliquam! Turpis urna egestas et rhoncus elementum habitasse, quis!" data-original-title="Did that help?"> on top</a>, or <a href="#" data-toggle="popover" data-placement="bottom" data-content="Integer. Tortor enim, phasellus aliquam!" data-original-title="Any good?">below</a> or even <a href="#" data-toggle="popover" data-placement="left" data-content="Integer. Tortor enim, phasellus aliquam!" data-original-title="I like left best">left</a> or <a href="#" data-toggle="popover" data-placement="right" data-content="Integer. Tortor enim, phasellus aliquam!" data-original-title="Right you are!">right</a>. </p>
        
        <h4 class="margin-top-large">
          Modals (data-toggle="modal")
        </h4>
        <p>For full requirements see: <a href="http://getbootstrap.com/javascript/#modals">http://getbootstrap.com/javascript/#modals</a></p>
        <a data-toggle="modal" href="#login-modal" class="btn btn-primary btn-lg">Login</a> or <a data-toggle="modal" href="#signup-modal" class="btn btn-primary btn-lg">Sign Up</a> 
      </div>
    </div>
    <!--Tools-->
  </div>
@stop