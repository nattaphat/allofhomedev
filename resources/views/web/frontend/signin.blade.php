@extends('layouts.main')

@section('content')
<div class="container">
    <!-- Login form -->
    <form action="{{route('postlogin')}}" id="frm_sigin" method="post" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label class="sr-only" for="email_or_username">Input with warning</label>
            <input
                    type="email"
                    id="email_or_username"
                    class="form-control email"
                    placeholder="Email Or Username"
                    data-validation-matches-match="email"
                    data-validation-email-message="Invalid email"
                    >
            <p class="help-block"></p>
        </div>
        <div class="form-group">
            <label class="sr-only" for="password">Password</label>
            <input type="password" id="password" class="form-control password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary loginaction">Login</button>
        <div class="checkbox">
            <label>
                <input type="checkbox" id="rememberme"> Remember me.
            </label>
        </div>
    </form>
    <div class="modal-footer">
        <form class="form-inline text-center">
            <div class="form-group">
                <!--@todo: replace with company social media details-->
                <a class="btn btn-block btn-social btn-twitter">
                    <i class="fa fa-twitter"></i> Twitter
                </a>
            </div>
            <div class="form-group">
                <a class="btn btn-block btn-social btn-facebook">
                    <i class="fa fa-facebook"></i> Facebook
                </a>
            </div>
        </form>
    </div>
</div>
@stop