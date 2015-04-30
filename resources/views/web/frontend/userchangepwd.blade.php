@extends('layouts.main')

@section('content')
    <div class="container">
        <!-- Sign Up form -->
        <form
                class="form-login form-wrapper form-medium"
                action="{{route('user_postpasswd')}}"
                id="frm_signup"
                method="post"
                role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h3 class="title-divider">
                <span>เปลี่ยนรหัสผ่าน</span>
                <p></p>
            </h3>

            <div class="form-group @if ($errors->has('current_password')) {{ "has-error" }} @endif">
                <label class="sr-only" for="current_password">Password</label>
                <input type="password" class="form-control" id="current_password" name="current_password"
                       placeholder="Current Password">
                <p class="help-block">
                      {{ $errors->first('current_password') }}
                </p>
            </div>
            <div class="form-group @if ($errors->has('password')) {{ "has-error" }} @endif">
                <label class="sr-only" for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                       placeholder="Password">
                <p class="help-block">
                    {{ $errors->first('password') }}
                </p>
            </div>

            <div class="form-group @if ($errors->has('password_confirmation')) {{ "has-error" }} @endif">
                <label class="sr-only" for="password_confirmation">Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                       value="{{ old('password_confirmation')}}"
                       placeholder="Re-Password">
                <p class="help-block">
                    {{ $errors->first('password_confirmation') }}
                </p>
            </div>

            </br>
            <button class="btn btn-primary" type="submit">บันทึก</button>

            </br>
            @if( $errors->has('msg'))
                <ul class="alert alert-info">
                    <li>{{ $errors->first('msg') }}</li>
                </ul>
            @endif
        </form>
    </div>
@stop