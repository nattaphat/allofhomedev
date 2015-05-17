@extends('app')

@section('content')
    <br><br><br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Login</h4></div>
                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST" action="{{route('postsignin')}}">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group @if ($errors->has('email_or_username')) {{ "has-error" }} @endif">
                                <label class="col-md-4 control-label">Email or Username</label>
                                <div class="col-md-6">
                                    <input
                                            type="text"
                                            id="email_or_username"
                                            name="email_or_username"
                                            class="form-control email"
                                            placeholder="Email or Username"
                                            value="{{Input::old('email_or_username')}}"
                                            >
                                    <p class="help-block">
                                        {{ $errors->first('email_or_username') }}
                                    </p>
                                </div>
                            </div>

                            <div class="form-group @if ($errors->has('password')) {{ "has-error" }} @endif">
                                <label class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input
                                            type="password"
                                            name="password"
                                            id="password"
                                            class="form-control password"
                                            placeholder="Password">
                                    <p class="help-block">
                                        {{ $errors->first('password') }}
                                    </p>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" @if(Input::old('rememberme')) {{"checked"}} @endif  name="rememberme" id="rememberme"> Remember me.
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                                        Login
                                    </button>
                                </div>
                            </div>

                        </form>

                        @if( $errors->has('msg'))
                            <ul class="alert alert-danger">
                                <li>{{ $errors->first('msg') }}</li>
                            </ul>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
