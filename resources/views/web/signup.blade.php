@extends('layouts.main')

@section('content')
<div class="container">
    <!-- Sign Up form -->
    <form class="form-login form-wrapper form-medium" role="form">
      <h3 class="title-divider">
        <span>Sign Up</span> 
        <small>Already signed up? <a href="login.htm">Login here</a>.</small>
      </h3>
      <h5>
        Price Plan
      </h5>
      <select class="form-control">
        <option>Basic</option>
        <option>Pro</option>
        <option>Pro +</option>
      </select>
      <h5>
        Account Information
      </h5>
      <div class="form-group">
        <label class="sr-only" for="signup-first-name-page">First Name</label>
        <input type="text" class="form-control" id="signup-first-name-page" placeholder="First name">
      </div>
      <div class="form-group">
        <label class="sr-only" for="signup-last-name-page">Last Name</label>
        <input type="text" class="form-control" id="signup-last-name-page" placeholder="Last name">
      </div>
      <div class="form-group">
        <label class="sr-only" for="signup-username-page">Userame</label>
        <input type="text" class="form-control" id="signup-username-page" placeholder="Username">
      </div>
      <div class="form-group">
        <label class="sr-only" for="signup-email-page">Email address</label>
        <input type="email" class="form-control" id="signup-email-page" placeholder="Email address">
      </div>
      <div class="form-group">
        <label class="sr-only" for="signup-password-page">Password</label>
        <input type="password" class="form-control" id="signup-password-page" placeholder="Password">
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" value="term">
          I agree with the Terms and Conditions. 
        </label>
      </div>
      <button class="btn btn-primary" type="submit">Sign up</button>
    </form>
  </div>
@stop