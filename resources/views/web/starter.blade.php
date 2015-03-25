@extends('layouts.main')

@section('slider')
    @include('layouts._partials.highlight_static')
@stop

@section('content')
<div class="container">
    <h2 class="title-divider">
      <span>Starter Snippets</span> 
      <small>Page starter snippets you can copy & paste to make new pages & layouts</small>
    </h2>
    <!--@EXAMPLE: Content Region With No Sidebars-->
    <h3 class="title-divider">
      <span>Example 1: <span class="de-em">Content Region With No Sidebars</span></span>
    </h3>
    <div class="row">
      <div class="col-md-12">Content Region With No Sidebars</div>
    </div>
    <!--@EXAMPLE: End of Content Region With No Sidebars-->
    <hr />
    <!--@EXAMPLE: Content Region With Left Sidebar-->
    <h3 class="title-divider">
      <span>Example 2: <span class="de-em">Content Region With Left Sidebar</span></span>
    </h3>
    <div class="row">
      <!--Content Area-->
      <div class="col-md-9 col-md-push-3"> Content Region With Left Sidebar </div>
      <!--Sidebar-->
      <div class="col-md-3 col-md-pull-9 sidebar sidebar-left">
        <div class="inner">
          Sidebar Left 
          <small>(use .inner wrapper to add border and padding)</small>
        </div>
      </div>
    </div>
    <!--@EXAMPLE: Content Region With Left Sidebar-->
    <hr />
    <!--@EXAMPLE: Content Region With Right Sidebar-->
    <h3 class="title-divider">
      <span>Example 3: <span class="de-em">Content Region With Right Sidebar</span></span>
    </h3>
    <div class="row">
      <!--Content Area-->
      <div class="col-md-9"> Content Region With Right Sidebar </div>
      <!--Sidebar-->
      <div class="col-md-3 sidebar sidebar-right">
        <div class="inner"> Sidebar right </div>
      </div>
    </div>
    <!--@EXAMPLE: Content Region With Right Sidebar-->
    <hr />
    <!--@EXAMPLE: Content Region With Both Sidebars-->
    <h3 class="title-divider">
      <span>Example 4: <span class="de-em">Content Region With Both Sidebars (left -> content -> Right)</span></span>
    </h3>
    <div class="row">
      <!--Content Area-->
      <div class="col-md-6 col-md-push-3"> Content Region With Both Sidebars </div>
      <!--Sidebar Left-->
      <div class="col-md-3 col-md-pull-6 sidebar sidebar-left">
        <div class="inner"> Sidebar Left </div>
      </div>
      <!--Sidebar Right-->
      <div class="col-md-3 sidebar sidebar-right">
        <div class="inner"> Sidebar Right </div>
      </div>
    </div>
    <!--@EXAMPLE: End of Content Region With Both Sidebars-->
    <hr />
    <!--@EXAMPLE: Content Region With Both Sidebars Stacked-->
    <h3 class="title-divider">
      <span>Example 5: <span class="de-em">Content Region With Both Sidebars Stacked (content -> sidebar 1 -> sidebar 2)</span></span>
    </h3>
    <div class="row">
      <!--Content Area-->
      <div class="col-md-6"> Content Region With Both Sidebars Stacked </div>
      <!--Sidebar Left-->
      <div class="col-md-3 sidebar sidebar-right">
        <div class="inner"> Sidebar 1 </div>
      </div>
      <!--Sidebar Right-->
      <div class="col-md-3 sidebar sidebar-right">
        <div class="inner"> Sidebar 2 </div>
      </div>
    </div>
    <!--@EXAMPLE: End of Content Region With Both Sidebars Stacked-->
  </div>
@stop