@extends('layouts.main')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="row-90">
          <h2 class="error-code font-xs-x7 font-md-x10">
            404 <i class="fa fa-file-text primary-colour font-xs-x6 font-md-x10"></i>
          </h2>
          <h2 class="error-message font-xs-x2 font-md-x2">
            Oops, This Page Could Not Be Found!
          </h2>
          <p class="error-details font-xs-x1">Enim nisi massa nascetur, pulvinar porttitor ut sed penatibus, tincidunt? Phasellus lacus, eros, mid lorem ridiculus amet, urna? Ultricies et et mus nisi lundium! Pulvinar enim, duis et. </p>
        </div>
      </div>
      <div class="col-md-4">
        <h4>
          Maybe you were looking for:
        </h4>
        <ul class="list-lg">
          <li><i class="fa fa-fw fa-angle-right"></i> <a href="index.htm">Home</a></li>
          <li><i class="fa fa-fw fa-angle-right"></i> <a href="features.htm">Features</a></li>
          <li><i class="fa fa-fw fa-angle-right"></i> <a href="pricing.htm">Pricing</a></li>
          <li><i class="fa fa-fw fa-angle-right"></i> <a href="customers.htm">Customers</a></li>
        </ul>
        <form class="error-search margin-top-md">
          <h4>
            Or Search for it:
          </h4>
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search the site">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Search</button>
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>
@stop