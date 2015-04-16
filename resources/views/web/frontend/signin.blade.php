@extends('layouts.main')

@section('content')
<div class="container">
    <!-- Login form -->
    <form
            class="form-login form-wrapper form-medium"
            action="{{route('postsignin')}}"
            id="frm_signin"
            method="post"
            role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group @if ($errors->has('email_or_username')) {{ "has-error" }} @endif">
            <label class="sr-only" for="email_or_username">Input with warning</label>
            <input
                    type="text"
                    id="email_or_username"
                    name="email_or_username"
                    class="form-control email"
                    placeholder="Email Or Username"
                    value="{{Input::old('email_or_username')}}"
                    >
            <p class="help-block">
                {{ $errors->first('email_or_username') }}
            </p>
        </div>
        <div class="form-group  @if ($errors->has('password')) {{ "has-error" }} @endif">
            <label class="sr-only" for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control password" placeholder="Password">
            <p class="help-block">
                {{ $errors->first('password') }}
            </p>
        </div>
        <div class="form-group checkbox">
            <label>
                <input type="checkbox" id="rememberme"> Remember me.
            </label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary loginaction">Login</button> Or
            <button type="button" class="btn btn-primary loginbytw"><i class="fa fa-twitter fa-4"></i> Twitter</button>
            <button type="button" class="btn btn-primary loginbyfb"><i class="fa fa-facebook fa-4"></i> Facebook</button>
        </div>
        <div class="form-group">
            <small>Not a member? <a href="{{URL::to('signup')}}" class="signup">Sign up now!</a></small>
            <br />
            <small><a href="#">Forgotten password?</a></small>
        </div>

        @if( $errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </form>

</div>
@stop