@extends('layouts.main')

@section('content')
<div class="container">
    <div class="block">
      <!--Default Pricing Table-->
      <h2 class="title-divider">
        <span>Pricing <span class="de-em">Plans Tables</span></span>
        <small>Compare our pricing plans.</small>
      </h2>
      <!--Stack 1: 3 plans-->
      <div class="row pricing-stack pricing-table margin-top-lg">
        <div class="col-md-3 pricing-table-features hidden-xs hidden-sm">
          <div class="well title-hidden">
            <ul class="pricing-table-features-list">
              <li class="title">Features</li>
              <li class="price">Price</li>
              <li>User Accounts</li>
              <li>Private Projects</li>
              <li>Public Projects</li>
              <li>Disk Space</li>
              <li>Monthly Bandwidth</li>
              <li>24/7 Email Support</li>
              <li class="last">Phone Support</li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 pricing-table-plan">
          <div class="well">
            <ul class="pricing-table-features-list">
              <li class="title">Starter</li>
              <li class="price"><span class="digits">Free!</span></li>
              <li><span class="visible-xs visible-sm">User Accounts: </span>3</li>
              <li><span class="visible-xs visible-sm">Private Projects: </span>3</li>
              <li><span class="visible-xs visible-sm">Public Projects: </span>Unlimited</li>
              <li><span class="visible-xs visible-sm">Disk Space: </span>5GB</li>
              <li><span class="visible-xs visible-sm">Monthly Bandwidth: </span>1GB</li>
              <li><span class="visible-xs visible-sm">24/7 Email Support: </span><i class="fa fa-check"></i></li>
              <li><span class="visible-xs visible-sm">Phone Support: </span><i class="fa fa-times"></i></li>
              <li class="sign-up-btn last"><a class="btn btn-primary">Sign Up</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 pricing-table-plan">
          <div class="well active">
            <ul class="pricing-table-features-list">
              <li class="title"><span class="em">Pro</span> <span class="fancy">Plus</span></li>
              <li class="price">
                <span class="currency">$</span> 
                <span class="digits">49<span>.95</span></span>
                <span class="term">/MO</span>
              </li>
              <li><span class="visible-xs visible-sm">User Accounts: </span>50</li>
              <li><span class="visible-xs visible-sm">Private Projects: </span>50</li>
              <li><span class="visible-xs visible-sm">Public Projects: </span>Unlimited</li>
              <li><span class="visible-xs visible-sm">Disk Space: </span>50GB</li>
              <li><span class="visible-xs visible-sm">Monthly Bandwidth: </span>10GB</li>
              <li><span class="visible-xs visible-sm">24/7 Email Support: </span><i class="fa fa-check"></i></li>
              <li><span class="visible-xs visible-sm">Phone Support: </span><i class="fa fa-times"></i></li>
              <li class="sign-up-btn last"><a class="btn btn-primary">Sign Up</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 pricing-table-plan">
          <div class="well">
            <ul class="pricing-table-features-list">
              <li class="title">Starter <span class="fancy">Plus</span></li>
              <li class="price">
                <span class="currency">$</span> 
                <span class="digits">19<span>.95</span></span>
                <span class="term">/MO</span>
              </li>
              <li><span class="visible-xs visible-sm">User Accounts: </span>10</li>
              <li><span class="visible-xs visible-sm">Private Projects: </span>10</li>
              <li><span class="visible-xs visible-sm">Public Projects: </span>Unlimited</li>
              <li><span class="visible-xs visible-sm">Disk Space: </span>10GB</li>
              <li><span class="visible-xs visible-sm">Monthly Bandwidth: </span>2GB</li>
              <li><span class="visible-xs visible-sm">24/7 Email Support: </span><i class="fa fa-check"></i></li>
              <li><span class="visible-xs visible-sm">Phone Support: </span><i class="fa fa-check"></i></li>
              <li class="sign-up-btn last"><a class="btn btn-primary">Sign Up</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!--Stack 2: 4 plans-->
      <div class="row pricing-stack pricing-table margin-top-lg">
        <div class="col-md-4 pricing-table-features hidden-xs hidden-sm">
          <div class="well title-hidden">
            <ul class="pricing-table-features-list">
              <li class="title">Features</li>
              <li class="price">Price</li>
              <li>User Accounts</li>
              <li>Private Projects</li>
              <li>Public Projects</li>
              <li>Disk Space</li>
              <li>Monthly Bandwidth</li>
              <li>24/7 Email Support</li>
              <li class="last">Phone Support</li>
            </ul>
          </div>
        </div>
        <div class="col-md-2 pricing-table-plan">
          <div class="well">
            <ul class="pricing-table-features-list">
              <li class="title">Starter</li>
              <li class="price"><span class="digits">Free!</span></li>
              <li><span class="visible-xs visible-sm">User Accounts: </span>3</li>
              <li><span class="visible-xs visible-sm">Private Projects: </span>3</li>
              <li><span class="visible-xs visible-sm">Public Projects: </span>Unlimited</li>
              <li><span class="visible-xs visible-sm">Disk Space: </span>5GB</li>
              <li><span class="visible-xs visible-sm">Monthly Bandwidth: </span>1GB</li>
              <li><span class="visible-xs visible-sm">24/7 Email Support: </span><i class="fa fa-check"></i></li>
              <li><span class="visible-xs visible-sm">Phone Support: </span><i class="fa fa-times"></i></li>
              <li class="sign-up-btn last"><a class="btn btn-primary">Sign Up</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-2 pricing-table-plan">
          <div class="well">
            <ul class="pricing-table-features-list">
              <li class="title">Starter <span class="fancy">Plus</span></li>
              <li class="price">
                <span class="currency">$</span> 
                <span class="digits">19<span>.95</span></span>
                <span class="term">/MO</span>
              </li>
              <li><span class="visible-xs visible-sm">User Accounts: </span>10</li>
              <li><span class="visible-xs visible-sm">Private Projects: </span>10</li>
              <li><span class="visible-xs visible-sm">Public Projects: </span>Unlimited</li>
              <li><span class="visible-xs visible-sm">Disk Space: </span>10GB</li>
              <li><span class="visible-xs visible-sm">Monthly Bandwidth: </span>2GB</li>
              <li><span class="visible-xs visible-sm">24/7 Email Support: </span><i class="fa fa-check"></i></li>
              <li><span class="visible-xs visible-sm">Phone Support: </span><i class="fa fa-times"></i></li>
              <li class="sign-up-btn last"><a class="btn btn-primary">Sign Up</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-2 pricing-table-plan">
          <div class="well">
            <ul class="pricing-table-features-list">
              <li class="title"><span class="em">Pro</span> <span class="fancy">Plus</span></li>
              <li class="price">
                <span class="currency">$</span> 
                <span class="digits">49<span>.95</span></span>
                <span class="term">/MO</span>
              </li>
              <li><span class="visible-xs visible-sm">User Accounts: </span>50</li>
              <li><span class="visible-xs visible-sm">Private Projects: </span>50</li>
              <li><span class="visible-xs visible-sm">Public Projects: </span>Unlimited</li>
              <li><span class="visible-xs visible-sm">Disk Space: </span>50GB</li>
              <li><span class="visible-xs visible-sm">Monthly Bandwidth: </span>10GB</li>
              <li><span class="visible-xs visible-sm">24/7 Email Support: </span><i class="fa fa-check"></i></li>
              <li><span class="visible-xs visible-sm">Phone Support: </span><i class="fa fa-check"></i></li>
              <li class="sign-up-btn last"><a class="btn btn-primary">Sign Up</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-2 pricing-table-plan">
          <div class="well">
            <ul class="pricing-table-features-list">
              <li class="title"><span class="em">Biz</span> <span class="fancy">Plus</span></li>
              <li class="price">
                <span class="currency">$</span> 
                <span class="digits">99<span>.95</span></span>
                <span class="term">/MO</span>
              </li>
              <li><span class="visible-xs visible-sm">User Accounts: </span>150</li>
              <li><span class="visible-xs visible-sm">Private Projects: </span>150</li>
              <li><span class="visible-xs visible-sm">Public Projects: </span>Unlimited</li>
              <li><span class="visible-xs visible-sm">Disk Space: </span>500GB</li>
              <li><span class="visible-xs visible-sm">Monthly Bandwidth: </span>100GB</li>
              <li><span class="visible-xs visible-sm">24/7 Email Support: </span><i class="fa fa-check"></i></li>
              <li><span class="visible-xs visible-sm">Phone Support: </span><i class="fa fa-check"></i></li>
              <li class="sign-up-btn last"><a class="btn btn-primary">Sign Up</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!--Stack 3: 3 plans alternative-->
      <div class="row pricing-stack pricing-table margin-top-lg">
        <div class="col-md-3 pricing-table-features hidden-xs hidden-sm">
          <div class="well title-hidden">
            <ul class="pricing-table-features-list">
              <li class="title">Features</li>
              <li>User Accounts</li>
              <li>Private Projects</li>
              <li>Public Projects</li>
              <li>Disk Space</li>
              <li>Monthly Bandwidth</li>
              <li>24/7 Email Support</li>
              <li>Phone Support</li>
              <li class="price last">Price</li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 pricing-table-plan">
          <div class="well">
            <ul class="pricing-table-features-list">
              <li class="title">Starter</li>
              <li><span class="visible-xs visible-sm">User Accounts: </span>3</li>
              <li><span class="visible-xs visible-sm">Private Projects: </span>3</li>
              <li><span class="visible-xs visible-sm">Public Projects: </span>Unlimited</li>
              <li><span class="visible-xs visible-sm">Disk Space: </span>5GB</li>
              <li><span class="visible-xs visible-sm">Monthly Bandwidth: </span>1GB</li>
              <li><span class="visible-xs visible-sm">24/7 Email Support: </span><i class="fa fa-check"></i></li>
              <li><span class="visible-xs visible-sm">Phone Support: </span><i class="fa fa-times"></i></li>
              <li class="price"><span class="digits">Free!</span></li>
              <li class="sign-up-btn last"><a class="btn btn-primary">Sign Up</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 pricing-table-plan">
          <div class="well">
            <ul class="pricing-table-features-list">
              <li class="title"><span class="em">Pro</span> <span class="fancy">Plus</span></li>
              <li><span class="visible-xs visible-sm">User Accounts: </span>50</li>
              <li><span class="visible-xs visible-sm">Private Projects: </span>50</li>
              <li><span class="visible-xs visible-sm">Public Projects: </span>Unlimited</li>
              <li><span class="visible-xs visible-sm">Disk Space: </span>50GB</li>
              <li><span class="visible-xs visible-sm">Monthly Bandwidth: </span>10GB</li>
              <li><span class="visible-xs visible-sm">24/7 Email Support: </span><i class="fa fa-check"></i></li>
              <li><span class="visible-xs visible-sm">Phone Support: </span><i class="fa fa-times"></i></li>
              <li class="price">
                <span class="currency">$</span> 
                <span class="digits">49<span>.95</span></span>
                <span class="term">/MO</span>
              </li>
              <li class="sign-up-btn last"><a class="btn btn-primary">Sign Up</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 pricing-table-plan">
          <div class="well">
            <ul class="pricing-table-features-list">
              <li class="title">Starter <span class="fancy">Plus</span></li>
              <li><span class="visible-xs visible-sm">User Accounts: </span>10</li>
              <li><span class="visible-xs visible-sm">Private Projects: </span>10</li>
              <li><span class="visible-xs visible-sm">Public Projects: </span>Unlimited</li>
              <li><span class="visible-xs visible-sm">Disk Space: </span>10GB</li>
              <li><span class="visible-xs visible-sm">Monthly Bandwidth: </span>2GB</li>
              <li><span class="visible-xs visible-sm">24/7 Email Support: </span><i class="fa fa-check"></i></li>
              <li><span class="visible-xs visible-sm">Phone Support: </span><i class="fa fa-check"></i></li>
              <li class="price">
                <span class="currency">$</span> 
                <span class="digits">19<span>.95</span></span>
                <span class="term">/MO</span>
              </li>
              <li class="sign-up-btn last"><a class="btn btn-primary">Sign Up</a></li>
            </ul>
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