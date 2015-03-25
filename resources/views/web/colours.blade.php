@extends('layouts.main')

@section('content')
<div class="container">
    <h2 class="title-divider">
      <span>Theme Colours</span>
    </h2>
    <!--Colours-->
    <p>AppStrap comes with 3 predefined colour schemes/skins which can be used as an example to add your own colour scheme(s).</p>
    <p>Colours can be previewed by clicking on the colour blocks below OR using the colour switcher in the hidden header region above.</p>
    <div class="row colour-switcher page">
      <div class="col-sm-4 col-md-4">
        <h4>
          Green (default) 
          <small>Hex Code: #55A79A</small>
        </h4>
        <a href="#green" class="green active">Green</a> 
      </div>
      <div class="col-sm-4 col-md-4">
        <h4>
          Blue 
          <small>Hex Code: #00ADBB</small>
        </h4>
        <a href="#blue" class="blue">Blue</a>
        <br />
        <small>See: css/colour-blue.css</small>
      </div>
      <div class="col-sm-4 col-md-4">
        <h4>
          Red 
          <small>Hex Code: #BE3E1D</small>
        </h4>
        <a href="#red" class="red">Red</a>
        <br />
        <small>See: css/colour-red.css</small>
      </div>
    </div>
    <p class="margin-top-large"><span class="label label-info">More Info</span> Further information on customising this theme can be found in the README.txt file in the theme bundle.</p>
  </div>
@stop