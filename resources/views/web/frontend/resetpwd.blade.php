@extends('layouts.main')

@section('content')
    <div class="container">
        <!-- Login form -->
        <form
                class="form-login form-wrapper form-medium"
                action="{{route('postresetpwd')}}"
                id="frm_signin"
                method="post"
                role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group @if ($errors->has('email')) {{ "has-error" }} @endif">
                <label class="sr-only" for="email">Input with warning</label>
                <input
                        type="text"
                        id="email"
                        name="email"
                        class="form-control email"
                        placeholder="Email"
                        value="{{Input::old('email')}}"
                        >
                <p class="help-block">
                    {{ $errors->first('email') }}
                </p>
            </div>
            <div class="form-group  @if ($errors->has('password')) {{ "has-error" }} @endif">
                <label class="sr-only" for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control password" placeholder="Password">
                <p class="help-block">
                    {{ $errors->first('password') }}
                </p>
            </div>
            <div class="form-group  @if ($errors->has('password_confirmation')) {{ "has-error" }} @endif">
                <label class="sr-only" for="password_confirmation">Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control password" placeholder="Re-Password">
                <p class="help-block">
                    {{ $errors->first('password_confirmation') }}
                </p>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary loginaction">Reset Password</button>
            </div>

            @if( $errors->has('msg'))
                <ul class="alert alert-danger">
                    <li>{{ $errors->first('msg') }}</li>
                </ul>
            @endif
        </form>

    </div>
@stop