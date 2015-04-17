@extends('layouts.main')

@section('content')
    <div class="container">
        <!-- Login form -->
        <form
                class="form-login form-wrapper form-medium"
                action="{{route('postforgetpwd')}}"
                id="frm_signin"
                method="post"
                role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group @if ($errors->has('email')) {{ "has-error" }} @endif">
                <label class="sr-only" for="email">Input with warning</label>
                <input
                        type="text"
                        id="email"
                        name="email"
                        class="form-control email"
                        placeholder="Email Or Username"
                        value="{{Input::old('email')}}"
                        >
                <p class="help-block">
                    {{ $errors->first('email') }}
                </p>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary loginaction">Send Password Reset Link</button>
            </div>

            @if( $errors->has('email_sent'))
                <ul class="alert alert-success">
                    <li>{{ $errors->first('email_sent') }}</li>
                </ul>
            @endif
        </form>

    </div>
@stop