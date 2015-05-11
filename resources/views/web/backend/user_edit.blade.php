@section('jsbody')
    <style>
        .short { width: 300px; }
    </style>
    <script type="text/javascript">
        @if($user->username == "superadmin")
            $('#role').attr("disabled", true);
            $('#status').attr("disabled", true);
        @endif
    </script>
@stop

@extends('layouts.main_backend')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">จัดการผู้ใช้งานระบบ</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    แก้ไขผู้ใช้งานระบบ
                </div>
                <div class="panel-body">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        {!! Form::open(['url' => 'backend/user_editSave']) !!}

                        {!! Form::hidden('id', $user->id) !!}

                        <div class="form-group">
                            {!! Form::label('firstname', 'ชื่อ:') !!}
                            {!! Form::text('firstname', $user->firstname,['readonly', 'class' => 'form-control short']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('lastname', 'นามสกุล:') !!}
                            {!! Form::text('lastname', $user->lastname,['readonly', 'class' => 'form-control short']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('username', 'Username:') !!}
                            {!! Form::text('username', $user->username,['readonly', 'class' => 'form-control short']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'อีเมล์:') !!}
                            {!! Form::text('email', $user->email,['readonly', 'class' => 'form-control short']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('role', 'กลุ่มผู้ใช้งาน:') !!}
                            {!! Form::select('role', array(
                                '1' => 'ผู้ดูแลระบบสูงสุด (superadmin)',
                                '2' => 'ผู้ดูแลระบบ (admin)',
                                '3' => 'สมาชิกทั่วไป (member)',
                                '4' => 'สมาชิก VIP (VIP member)',
                                ),
                                $user->role, ['class' => 'form-control short']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('status', 'สถานะ:') !!}
                            {!! Form::select('status', array(
                                    1 => 'ใช้งาน',
                                    0 => 'ไม่ใช้งาน'
                                ),
                                ($user->status == true)? 1 : 0, ['class' => 'form-control short']) !!}
                        </div>

                        <br>
                        <div class="form-group">
                            {!! Form::submit('บันทึก', ['class'=>'btn btn-primary']) !!}
                            {!! link_to(URL::previous(), 'ยกเลิก', ['class' => 'btn btn-default']) !!}
                        </div>
                        <br><br>

                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </div>

    {{--<div class="row">--}}
        {{--<div class="col-lg-12">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">--}}
                    {{--แก้ไขผู้ใช้งานระบบ--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}

                    {{--<div class="col-md-12">--}}
                        {{--<div class="col-md-1"></div>--}}
                        {{--<div class="col-md-11">--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="lbFirstname">ชื่อ</label>--}}
                                {{--<input class="form-control short" id="lbFirstname" type="text"--}}
                                       {{--value="{{ $user->firstname }}" disabled="">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-12">--}}
                        {{--<div class="col-md-1"></div>--}}
                        {{--<div class="col-md-11">--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="lbFirstname">นามสกุล</label>--}}
                                {{--<input class="form-control short" id="lbFirstname" type="text"--}}
                                       {{--value="{{ $user->lastname }}" disabled="">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-12">--}}
                        {{--<div class="col-md-1"></div>--}}
                        {{--<div class="col-md-11">--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="lbFirstname">Username</label>--}}
                                {{--<input class="form-control short" id="lbFirstname" type="text"--}}
                                       {{--value="{{ $user->username }}" disabled="">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-12">--}}
                        {{--<div class="col-md-1"></div>--}}
                        {{--<div class="col-md-11">--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="lbFirstname">อีเมล์</label>--}}
                                {{--<input class="form-control short" id="lbFirstname" type="text"--}}
                                       {{--value="{{ $user->email }}" disabled="">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-12">--}}
                        {{--<div class="col-md-1"></div>--}}
                        {{--<div class="col-md-11">--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="lbFirstname">หมายเลขโทรศัพท์</label>--}}
                                {{--<input class="form-control short" id="lbFirstname" type="text"--}}
                                       {{--value="{{ $user->email }}" disabled="">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-12">--}}
                        {{--<div class="col-md-1"></div>--}}
                        {{--<div class="col-md-11">--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="lbFirstname">กลุ่มผู้ใช้งาน</label>--}}
                                {{--<input class="form-control short" id="lbFirstname" type="text"--}}
                                       {{--value="{{ $user->email }}" disabled="">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-12">--}}
                        {{--<div class="col-md-1"></div>--}}
                        {{--<div class="col-md-11">--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="lbFirstname">สถานะ</label>--}}
                                {{--<input class="form-control short" id="lbFirstname" type="text"--}}
                                       {{--value="{{ $user->email }}" disabled="">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-12">--}}
                        {{--<div class="col-md-1"></div>--}}
                        {{--<div class="col-md-11">--}}
                            {{--<input type="button" value="บันทึก"></input>--}}
                            {{--<input type="button" value="ยกเลิก" />--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <br><br>
@stop