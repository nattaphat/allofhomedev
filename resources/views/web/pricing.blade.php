@extends('layouts.main')

@section('content')
<div class="container">
    <div class="block">
      <!--Default Pricing Table-->
      <h2 class="title-divider">
        <span>Pricing <span class="de-em">Plans</span></span>
        <small>Competitive pricing for all your needs.</small>
      </h2>
      <!--Stack 1: 4 in row-->
      <h3>
        Default Pricing Plans
      </h3>
      <div class="row pricing-stack margin-top-lg">
        <div class="col-md-3">
          <div class="well">
            <h3 class="title">
              Starter
            </h3>
            <p class="price"><span class="fancy">Free!</span></p>
            <ul class="unstyled points">
              <li>3 User Accounts</li>
              <li>3 Private Projects</li>
              <li>Umlimited Public Projects</li>
              <li>5GB of space</li>
            </ul>
            <a class="btn btn-primary">Sign Up</a> 
          </div>
        </div>
        <div class="col-md-3">
          <div class="well active">
            <h3 class="title">
              <span class="em">Pro</span> <span class="fancy">Plus</span>
            </h3>
            <p class="price">
              <span class="currency">$</span> 
              <span class="digits">49<span>.95</span></span>
              <span class="term">/MO</span>
            </p>
            <ul class="unstyled points">
              <li>50 User Accounts</li>
              <li>50 Private Projects</li>
              <li>Umlimited Public Projects</li>
              <li>Unlimited space</li>
            </ul>
            <a class="btn btn-primary">Sign Up</a> 
          </div>
        </div>
        <div class="col-md-3">
          <div class="well active">
            <h3 class="title">
              <span class="em">Biz</span> <span class="fancy">Plus</span>
            </h3>
            <p class="price">
              <span class="currency">$</span> 
              <span class="digits">199<span>.95</span></span>
              <span class="term">/MO</span>
            </p>
            <ul class="unstyled points">
              <li>Umlimited User Accounts</li>
              <li>Umlimited Private Projects</li>
              <li>Umlimited Public Projects</li>
              <li>Unlimited space</li>
            </ul>
            <a class="btn btn-primary">Sign Up</a> 
          </div>
        </div>
        <div class="col-md-3">
          <div class="well">
            <h3 class="title">
              Starter <span class="fancy">Plus</span>
            </h3>
            <p class="price">
              <span class="currency">$</span> 
              <span class="digits">19<span>.95</span></span>
              <span class="term">/MO</span>
            </p>
            <ul class="unstyled points">
              <li>10 User Accounts</li>
              <li>10 Private Projects</li>
              <li>Umlimited Public Projects</li>
              <li>15GB of space</li>
            </ul>
            <a class="btn btn-primary">Sign Up</a> 
          </div>
        </div>
      </div>
      <!--Stack 2: 3 in row-->
      <div class="row pricing-stack margin-top-lg">
        <div class="col-md-offset-1 col-sm-4 col-md-3">
          <div class="well">
            <h3 class="title">
              Starter
            </h3>
            <p class="price"><span class="fancy">Free!</span></p>
            <ul class="unstyled points">
              <li>3 User Accounts</li>
              <li>3 Private Projects</li>
              <li>Umlimited Public Projects</li>
              <li>5GB of space</li>
            </ul>
            <a class="btn btn-primary">Sign Up</a> 
          </div>
        </div>
        <div class="col-sm-4 col-md-4">
          <div class="well active">
            <h3 class="title">
              <span class="em">Pro</span> <span class="fancy">Plus</span>
            </h3>
            <p class="price">
              <span class="currency">$</span> 
              <span class="digits">49<span>.95</span></span>
              <span class="term">/MO</span>
            </p>
            <ul class="unstyled points">
              <li>50 User Accounts</li>
              <li>50 Private Projects</li>
              <li>Umlimited Public Projects</li>
              <li>Unlimited space</li>
            </ul>
            <a class="btn btn-primary">Sign Up</a> 
          </div>
        </div>
        <div class="col-sm-4 col-md-3">
          <div class="well">
            <h3 class="title">
              Starter <span class="fancy">Plus</span>
            </h3>
            <p class="price">
              <span class="currency">$</span> 
              <span class="digits">19<span>.95</span></span>
              <span class="term">/MO</span>
            </p>
            <ul class="unstyled points">
              <li>10 User Accounts</li>
              <li>10 Private Projects</li>
              <li>Umlimited Public Projects</li>
              <li>15GB of space</li>
            </ul>
            <a class="btn btn-primary">Sign Up</a> 
          </div>
        </div>
      </div>
      <!--Stack 3: 4 overlapping-->
      <!-- .pricing-stack-overlap can be applied to the .pricing-stack div to apply to all items or target individual items-->
      <h3 class="bordered-top-large">
        Overlapping Pricing Plans
      </h3>
      <div class="row pricing-stack pricing-stack-overlap margin-top-lg">
        <div class="col-md-3">
          <div class="well">
            <h3 class="title">
              Starter
            </h3>
            <p class="price"><span class="fancy">Free!</span></p>
            <ul class="unstyled points">
              <li>3 User Accounts</li>
              <li>3 Private Projects</li>
              <li>Umlimited Public Projects</li>
              <li>5GB of space</li>
            </ul>
            <a class="btn btn-primary">Sign Up</a> 
          </div>
        </div>
        <div class="col-md-3">
          <div class="well active">
            <h3 class="title">
              <span class="em">Pro</span> <span class="fancy">Plus</span>
            </h3>
            <p class="price">
              <span class="currency">$</span> 
              <span class="digits">49<span>.95</span></span>
              <span class="term">/MO</span>
            </p>
            <ul class="unstyled points">
              <li>50 User Accounts</li>
              <li>50 Private Projects</li>
              <li>Umlimited Public Projects</li>
              <li>Unlimited space</li>
            </ul>
            <a class="btn btn-primary">Sign Up</a> 
          </div>
        </div>
        <div class="col-md-3">
          <div class="well active">
            <h3 class="title">
              <span class="em">Biz</span> <span class="fancy">Plus</span>
            </h3>
            <p class="price">
              <span class="currency">$</span> 
              <span class="digits">199<span>.95</span></span>
              <span class="term">/MO</span>
            </p>
            <ul class="unstyled points">
              <li>Umlimited User Accounts</li>
              <li>Umlimited Private Projects</li>
              <li>Umlimited Public Projects</li>
              <li>Unlimited space</li>
            </ul>
            <a class="btn btn-primary">Sign Up</a> 
          </div>
        </div>
        <div class="col-md-3">
          <div class="well">
            <h3 class="title">
              Starter <span class="fancy">Plus</span>
            </h3>
            <p class="price">
              <span class="currency">$</span> 
              <span class="digits">19<span>.95</span></span>
              <span class="term">/MO</span>
            </p>
            <ul class="unstyled points">
              <li>10 User Accounts</li>
              <li>10 Private Projects</li>
              <li>Umlimited Public Projects</li>
              <li>15GB of space</li>
            </ul>
            <a class="btn btn-primary">Sign Up</a> 
          </div>
        </div>
      </div>
      <!--Stack 4: 3 overlapping-->
      <div class="row pricing-stack pricing-stack-overlap margin-top-lg">
        <div class="col-md-4">
          <div class="well">
            <h3 class="title">
              Starter
            </h3>
            <p class="price"><span class="fancy">Free!</span></p>
            <ul class="unstyled points">
              <li>3 User Accounts</li>
              <li>3 Private Projects</li>
              <li>Umlimited Public Projects</li>
              <li>5GB of space</li>
            </ul>
            <a class="btn btn-primary">Sign Up</a> 
          </div>
        </div>
        <div class="col-md-4">
          <div class="well active">
            <h3 class="title">
              <span class="em">Pro</span> <span class="fancy">Plus</span>
            </h3>
            <p class="price">
              <span class="currency">$</span> 
              <span class="digits">49<span>.95</span></span>
              <span class="term">/MO</span>
            </p>
            <ul class="unstyled points">
              <li>50 User Accounts</li>
              <li>50 Private Projects</li>
              <li>Umlimited Public Projects</li>
              <li>Unlimited space</li>
            </ul>
            <a class="btn btn-primary">Sign Up</a> 
          </div>
        </div>
        <div class="col-md-4">
          <div class="well">
            <h3 class="title">
              Starter <span class="fancy">Plus</span>
            </h3>
            <p class="price">
              <span class="currency">$</span> 
              <span class="digits">19<span>.95</span></span>
              <span class="term">/MO</span>
            </p>
            <ul class="unstyled points">
              <li>10 User Accounts</li>
              <li>10 Private Projects</li>
              <li>Umlimited Public Projects</li>
              <li>15GB of space</li>
            </ul>
            <a class="btn btn-primary">Sign Up</a> 
          </div>
        </div>
      </div>
      <h3 class="bordered-top-large">
        Compressed Pricing Plans
      </h3>
      <!--Stack 5: Compressed-->
      <!-- .pricing-stack-compressed can be applied to the .pricing-stack div to apply to all items or target individual items-->
      <div class="row-80 pricing-stack pricing-stack-compressed margin-top-lg">
        <div class="col-md-4">
          <div class="well">
            <h3 class="title">
              Starter
            </h3>
            <p class="price"><span class="fancy">Free!</span></p>
            <p class="description">3 User Accounts, 3 Private Projects, Umlimited Public Projects and more....</p>
            <a class="btn btn-primary">Sign Up</a> 
          </div>
        </div>
        <div class="col-md-4">
          <div class="well active">
            <h3 class="title">
              <span class="em">Pro</span> <span class="fancy">Plus</span>
            </h3>
            <p class="price">
              <span class="currency">$</span> 
              <span class="digits">49<span>.95</span></span>
              <span class="term">/MO</span>
            </p>
            <p class="description">50 User Accounts, 50 Private Projects, Umlimited Public Projects and more....</p>
            <a class="btn btn-primary">Sign Up</a> 
          </div>
        </div>
        <div class="col-md-4">
          <div class="well">
            <h3 class="title">
              Starter <span class="fancy">Plus</span>
            </h3>
            <p class="price">
              <span class="currency">$</span> 
              <span class="digits">19<span>.95</span></span>
              <span class="term">/MO</span>
            </p>
            <p class="description">10 User Accounts, 10 Private Projects, Umlimited Public Projects and more....</p>
            <a class="btn btn-primary">Sign Up</a> 
          </div>
        </div>
      </div>
      <!--Stack 6: Compressed & overlapping-->
      <div class="row pricing-stack pricing-stack-overlap pricing-stack-compressed margin-top-lg">
        <div class="col-md-4">
          <div class="well">
            <h3 class="title">
              Starter
            </h3>
            <p class="price"><span class="fancy">Free!</span></p>
            <p class="description">3 User Accounts, 3 Private Projects, Umlimited Public Projects and more....</p>
            <a class="btn btn-primary">Sign Up</a> 
          </div>
        </div>
        <div class="col-md-4">
          <div class="well active">
            <h3 class="title">
              <span class="em">Pro</span> <span class="fancy">Plus</span>
            </h3>
            <p class="price">
              <span class="currency">$</span> 
              <span class="digits">49<span>.95</span></span>
              <span class="term">/MO</span>
            </p>
            <p class="description">50 User Accounts, 50 Private Projects, Umlimited Public Projects and more....</p>
            <a class="btn btn-primary">Sign Up</a> 
          </div>
        </div>
        <div class="col-md-4">
          <div class="well">
            <h3 class="title">
              Starter <span class="fancy">Plus</span>
            </h3>
            <p class="price">
              <span class="currency">$</span> 
              <span class="digits">19<span>.95</span></span>
              <span class="term">/MO</span>
            </p>
            <p class="description">10 User Accounts, 10 Private Projects, Umlimited Public Projects and more....</p>
            <a class="btn btn-primary">Sign Up</a> 
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Plan features -->
        <div class="well well-sm text-center">
          <h4 class="inline-el pad-right">
            <span>All Plans <span class="de-em">Include</span>:</span>
          </h4>
          <p class="inline-el pad-left muted">90 day money back guarantee <span class="spacer">//</span> 24/7 telephone support <span class="spacer">//</span> FREE Setup <span class="spacer">//</span> Migration Help <span class="spacer">//</span> Developer API</p>
        </div>
      </div>
    </div>
  </div>
@stop