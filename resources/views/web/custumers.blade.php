@extends('layouts.main')

@section('content')
<div class="container">
    <h2 class="title-divider">
      <span>Our <span class="de-em">Customers</span></span>
      <small>99% of our customers recommend us!</small>
    </h2>
    <ul class="nav nav-tabs" data-js="quicksand" data-quicksand-trigger="li >
      a" data-quicksand-target=".customers"> 
      <li class="active"><a href="#" data-quicksand-fid="all">All Industries</a></li>
      <li><a href="#" data-quicksand-fid="type-web">Web</a></li>
      <li><a href="#" data-quicksand-fid="type-design">Design</a></li>
      <li><a href="#" data-quicksand-fid="type-media">Media</a></li>
    </ul>
    <!--Customers-->
    <ul class="row list-unstyled block customers">
      <li class="customer type-design" data-quicksand-id="id-1" data-quicksand-tid="type-design">
        <a href="http://themelize.me">
          <span class="inner-wrapper">
            <span class="img-wrapper">
              <img src="img/customers/customer-1.png" alt="Customer 1" class="img-responsive" />
            </span>
            <span class="title">Customer 1</span> <span class="description">Aliquam erat illum. Abico abigo bene causa laoreet nostrud sudo usitas. Appellatio commodo genitus luptatum mos quidne si utrum validus.</span> 
          </span>
        </a>
      </li>
      <li class="customer type-design" data-quicksand-id="id-2" data-quicksand-tid="type-design">
        <a href="http://themelize.me">
          <span class="inner-wrapper">
            <span class="img-wrapper">
              <img src="img/customers/customer-2.png" alt="Customer 2" class="img-responsive" />
            </span>
            <span class="title">Customer 2</span> <span class="description">Caecus consectetuer dolus huic ibidem lucidus nimis quadrum suscipit vero. Adipiscing mos oppeto os quadrum ulciscor.</span> 
          </span>
        </a>
      </li>
      <li class="customer type-media" data-quicksand-id="id-3" data-quicksand-tid="type-media">
        <a href="http://themelize.me">
          <span class="inner-wrapper">
            <span class="img-wrapper">
              <img src="img/customers/customer-3.png" alt="Customer 3" class="img-responsive" />
            </span>
            <span class="title">Customer 3</span> <span class="description">Diam hendrerit pertineo veniam vulpes. Humo iusto iustum pecus ratis si volutpat zelus. Acsi aliquam iriure os populus ulciscor venio.</span> 
          </span>
        </a>
      </li>
      <li class="customer type-media" data-quicksand-id="id-4" data-quicksand-tid="type-media">
        <a href="http://themelize.me">
          <span class="inner-wrapper">
            <span class="img-wrapper">
              <img src="img/customers/customer-4.png" alt="Customer 4" class="img-responsive" />
            </span>
            <span class="title">Customer 4</span> <span class="description">Augue fere meus persto populus utinam vulputate. Decet molior probo valde wisi. Cogo immitto iusto.</span> 
          </span>
        </a>
      </li>
      <li class="customer type-design" data-quicksand-id="id-5" data-quicksand-tid="type-design">
        <a href="http://themelize.me">
          <span class="inner-wrapper">
            <span class="img-wrapper">
              <img src="img/customers/customer-5.png" alt="Customer 5" class="img-responsive" />
            </span>
            <span class="title">Customer 5</span> <span class="description">Adipiscing antehabeo at damnum duis enim exerci feugiat gilvus luptatum. Aptent capto erat occuro pecus sino ullamcorper.</span> 
          </span>
        </a>
      </li>
      <li class="customer type-web" data-quicksand-id="id-6" data-quicksand-tid="type-web">
        <a href="http://themelize.me">
          <span class="inner-wrapper">
            <span class="img-wrapper">
              <img src="img/customers/customer-6.png" alt="Customer 6" class="img-responsive" />
            </span>
            <span class="title">Customer 6</span> <span class="description">Abico elit euismod ideo immitto imputo occuro sino. Appellatio ideo neque oppeto suscipere tamen. Aliquam autem eros minim premo vero.</span> 
          </span>
        </a>
      </li>
      <li class="customer type-design" data-quicksand-id="id-7" data-quicksand-tid="type-design">
        <a href="http://themelize.me">
          <span class="inner-wrapper">
            <span class="img-wrapper">
              <img src="img/customers/customer-7.png" alt="Customer 7" class="img-responsive" />
            </span>
            <span class="title">Customer 7</span> <span class="description">Conventio distineo exputo pagus ratis roto tum. Incassum obruo pala vel. Duis esse huic iustum pertineo qui singularis suscipere.</span> 
          </span>
        </a>
      </li>
      <li class="customer type-design" data-quicksand-id="id-8" data-quicksand-tid="type-design">
        <a href="http://themelize.me">
          <span class="inner-wrapper">
            <span class="img-wrapper">
              <img src="img/customers/customer-8.png" alt="Customer 8" class="img-responsive" />
            </span>
            <span class="title">Customer 8</span> <span class="description">Abigo sino virtus vulpes. Brevitas defui fere nimis paratus proprius sino suscipere vel. Causa defui exputo quis.</span> 
          </span>
        </a>
      </li>
      <li class="customer type-media" data-quicksand-id="id-9" data-quicksand-tid="type-media">
        <a href="http://themelize.me">
          <span class="inner-wrapper">
            <span class="img-wrapper">
              <img src="img/customers/customer-9.png" alt="Customer 9" class="img-responsive" />
            </span>
            <span class="title">Customer 9</span> <span class="description">Decet genitus quae ullamcorper verto vulputate. Aliquam commoveo ea lenis modo. Ad blandit camur eros lenis mos saepius.</span> 
          </span>
        </a>
      </li>
      <li class="customer type-web" data-quicksand-id="id-10" data-quicksand-tid="type-web">
        <a href="http://themelize.me">
          <span class="inner-wrapper">
            <span class="img-wrapper">
              <img src="img/customers/customer-10.png" alt="Customer 10" class="img-responsive" />
            </span>
            <span class="title">Customer 10</span> <span class="description">Autem esca fere magna mauris natu obruo quidne saepius singularis. Conventio ibidem imputo mos odio paratus paulatim sed voco.</span> 
          </span>
        </a>
      </li>
      <li class="customer type-media" data-quicksand-id="id-11" data-quicksand-tid="type-media">
        <a href="http://themelize.me">
          <span class="inner-wrapper">
            <span class="img-wrapper">
              <img src="img/customers/customer-11.png" alt="Customer 11" class="img-responsive" />
            </span>
            <span class="title">Customer 11</span> <span class="description">Abbas at defui molior vindico zelus. Abico cui ea ideo obruo occuro pneum probo quis.</span> 
          </span>
        </a>
      </li>
      <li class="customer type-media" data-quicksand-id="id-12" data-quicksand-tid="type-media">
        <a href="http://themelize.me">
          <span class="inner-wrapper">
            <span class="img-wrapper">
              <img src="img/customers/customer-12.png" alt="Customer 12" class="img-responsive" />
            </span>
            <span class="title">Customer 12</span> <span class="description">Iustum jumentum laoreet melior tincidunt turpis verto vindico volutpat wisi. At causa fere. Consectetuer obruo sino.</span> 
          </span>
        </a>
      </li>
    </ul>
  </div>
@stop