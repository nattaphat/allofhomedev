@extends('layouts.main')

@section('content')
<div class="container">
    <!-- Sign Up form -->
    <div class="row">
        <form
                class="form-login form-wrapper form-medium"
                action="{{route('postsignup')}}"
                id="frm_signup"
                method="post"
                role="form">
            <input type="hidden" id="role_id" name="role_id" value="3">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h3 class="title-divider">
                <span>ลงทะเบียนใช้งาน</span>
                <small>ลงทะเบียนเรียบร้อยแล้ว?
                    <a href="{{ URL::to('login') }}" data-toggle="modal">เข้าสู่ระบบที่นี่</a>.
                </small>
            </h3>
            <h5>
                ข้อมูลบัญชีใช้งาน
            </h5>

            <div class="form-group @if ($errors->has('first_name')) {{ "has-error" }} @endif">
                <label class="sr-only" for="first_name">ชื่อ</label>
                <input type="text" class="form-control" id="first_name" name="first_name"
                       value="{{ old('first_name')}}" placeholder="ชื่อ">
                <p class="help-block">
                    {{ $errors->first('first_name') }}
                </p>
            </div>
            <div class="form-group @if ($errors->has('last_name')) {{ "has-error" }} @endif">
                <label class="sr-only" for="last_name">นามสกุล</label>
                <input type="text" class="form-control" id="last_name" name="last_name"
                       value="{{ old('last_name')}}"
                       placeholder="นามสกุล">
                <p class="help-block">
                    {{ $errors->first('last_name') }}
                </p>
            </div>
            <div class="form-group @if ($errors->has('username')) {{ "has-error" }} @endif">
                <label class="sr-only" for="username">Userame</label>
                <input type="text" class="form-control" id="username" name="username"
                       value="{{ old('username')}}"
                       placeholder="Username">
                <p class="help-block">
                    {{ $errors->first('username') }}
                </p>
            </div>
            <div class="form-group @if ($errors->has('email')) {{ "has-error" }} @endif">
                <label class="sr-only" for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email"
                       value="{{ old('email')}}"
                       placeholder="Email address">
                <p class="help-block">
                    {{ $errors->first('email') }}
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

            <div class="form-group @if ($errors->has('g-recaptcha-response')) {{ "has-error" }} @endif">
                {!! Recaptcha::render() !!}
                <p class="help-block">
                    {{ $errors->first('g-recaptcha-response') }}
                </p>
            </div>

            </br>
            <button class="btn btn-primary" type="submit">Sign up</button>

            </br>
            @if( $errors->has('msg'))
                <ul class="alert alert-info">
                    <li>{{ $errors->first('msg') }}</li>
                </ul>
            @endif
        </form>
    </div>
  </div>
@stop