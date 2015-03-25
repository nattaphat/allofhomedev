@extends('layouts.main')

@section('content')
<div class="container">
    <!-- Login form -->
    <form class="form-login form-wrapper form-narrow">
      <h3 class="title-divider">
        <span>Login</span> 
        <small>Not signed up? <a href="pricing.htm">Sign up here</a>.</small>
      </h3>
      <div class="form-group">
        <label class="sr-only" for="login-email-page">Email</label>
        <input type="email" id="login-email-page" class="form-control email" placeholder="Email">
      </div>
      <div class="form-group">
        <label class="sr-only" for="login-password-page">Password</label>
        <input type="password" id="login-password-page" class="form-control password" placeholder="Password">
      </div>
      <button type="button" class="btn btn-primary">Login</button>
      | <a href="#">Forgotten Password?</a> 
    </form>
</div>
@stop