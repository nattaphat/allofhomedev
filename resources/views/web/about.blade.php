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
	    
	    <!-- About company -->
	    <h4>
	      How It All Began
	    </h4>
	    <p>Iaceo rusticus scisco secundum utinam. Decet eligo fere lenis mos saepius te usitas ymo. Aliquam commoveo hendrerit ille quae ratis saepius te torqueo valetudo.</p>
	    <p>Augue nobis olim pneum validus. Ad bene patria sed vulpes. Blandit decet dolus humo mauris nutus paratus saluto. Blandit importunus iustum ludus quidne valde. At camur commoveo eligo facilisi facilisis qui. Aliquam capto magna neo rusticus. Ad enim feugiat luctus natu neque pneum secundum turpis. Abdo comis plaga quis turpis. Aptent iaceo iusto lenis ludus minim plaga ratis sit. Conventio hendrerit lenis magna persto qui roto saepius sit zelus.</p>
	    <p>Et exerci feugiat nimis persto premo scisco sino valde vicis. Cogo inhibeo loquor mauris pagus pecus quae ratis sit tamen. Capto comis esse facilisis hos inhibeo nostrud premo saepius tamen.</p>
	    <h4 class="margin-top-large">
	      Our Philosophy
	    </h4>
	    <p>Adipiscing brevitas fere gravis olim saluto sino te veniam voco. Causa jumentum laoreet pecus. Camur cogo dignissim erat esca exerci paratus patria tum.</p>
	    <p>Esse refero ulciscor. Autem ex os pecus quae roto. Abdo abico acsi ad ille lobortis macto tincidunt valetudo vereor. Cui dignissim ea jugis luptatum tamen valetudo zelus. Accumsan exerci neque refoveo vero. Accumsan brevitas eros jus macto tum vulpes. Abico cogo dignissim ibidem immitto macto pagus proprius similis wisi. Accumsan augue brevitas dolus elit jus patria probo uxor. Capto elit haero velit ymo. Genitus incassum paratus quae saepius tego tincidunt vulpes.</p>
	    <p>Eros exputo genitus minim obruo paratus praemitto virtus. Brevitas cogo letalis plaga pneum praesent. Exerci facilisis ludus neque obruo plaga quae refero tation venio. Causa eu meus paratus populus quae quidem saepius.</p>
	    
	    <div class="title-divider margin-top-large" id="stats">
	      <h3>
	        <span>Vital <span class="de-em">Stats</span></span>
	        <small>Stats to impress!</small>
	      </h3>
	    </div>
	    <div class="row stats">
	      <div class="col-md-3 stat">
	        <div class="well">1280</div>
	        <small>Happpy Customers</small>
	      </div>
	      <div class="col-md-3 stat">
	        <div class="well">1634</div>
	        <small>GB Transfered</small>
	      </div>
	      <div class="col-md-3 stat">
	        <div class="well">2143</div>
	        <small>Bugs Fixed</small>
	      </div>
	      <div class="col-md-3 stat">
	        <div class="well">12</div>
	        <small>Share Holders</small>
	      </div>
	    </div>
	    
	    <!--Customer testimonial-->
	    <div class="testimonials margin-top-large margin-bottom-large" id="testimonials">
	      <h3 class="title-divider">
	        <span>Highly <span class="de-em">Recommended</span></span>
	        <small>99% of our customers recommend us!</small>
	      </h3>
	      <div class="row">
	        <div class="col-md-4">
	          <blockquote>
	            <p>"It's totally awesome, we're could imagine life without it!"</p>
	            <footer>
	              <img src="img/team/jimi.jpg" alt="Jimi Bloggs" class="img-circle" />
	              Jimi Bloggs <span class="spacer">/</span> <a href="#">@mrjimi</a>
	            </footer>
	          </blockquote>
	        </div>
	        <div class="col-md-4">
	          <blockquote>
	            <p>"10 out of 10, highly recommended!"</p>
	            <footer>
	              <img src="img/team/steve.jpg" alt="Jimi Bloggs" class="img-circle" />
	              Steve Bloggs <span class="spacer">/</span> <a href="#">Founder of Apple</a>
	            </footer>
	          </blockquote>
	        </div>
	        <div class="col-md-4">
	          <blockquote>
	            <p>"Our productivity & sales are up! Couldn't be happier!"</p>
	            <footer>
	              <img src="img/team/adele.jpg" alt="Adele Bloggs" class="img-circle" />
	              Adele Bloggs <span class="spacer">/</span> <a href="#">@iamadele</a>
	            </footer>
	          </blockquote>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
</div>
@stop