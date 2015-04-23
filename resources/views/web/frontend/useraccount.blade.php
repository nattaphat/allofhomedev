@extends('layouts.main')

@section('content')
    <div class="container">
        <!-- Sign Up form -->
        <div class="row">
            <form class="form-login form-wrapper form-medium" role="form">
                <input type="hidden" id="role_id" name="role_id" value="3">
                <h3 class="title-divider">
                    <span>ลงทะเบียนใช้งาน</span>
                    <small>ลงทะเบียนเรียบร้อยแล้ว? <a href="{{ URL::to('login') }}" data-toggle="modal">เข้าสู่ระบบที่นี่</a>.</small>
                </h3>
                <h5>
                    ข้อมูลบัญชีใช้งาน
                </h5>

                <div class="form-group">
                    <article class="thumbnail">
                        <img src="//placehold.it/100x100" id="userInfoPhoto" class="img-circle" alt="รูปโปรไฟล์">
                    </article>

                    <input id="userInfoPhotoUpload" type="file" class="file" data-preview-file-type="text">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="first_name">ชื่อ</label>
                    <input type="text" class="form-control" id="first_name" placeholder="ชื่อ">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="last_name">นามสกุล</label>
                    <input type="text" class="form-control" id="last_name" placeholder="นามสกุล">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="username">Userame</label>
                    <input type="text" class="form-control" id="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Email address">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <select class="form-control" id="salary">
                        <option>-กรุณาเลือกเงินเดือน-</option>
                        @foreach ($salary as $key => $value)
                            <option id="{{ $value->id }}" > {{ $value->range }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="telephone">เบอร์โทร/มือถือ</label>
                    <input type="text" class="form-control" id="telephone" placeholder="02-123-4567 ต่อ 123">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="birthday">วัน-เดือน-ปี เกิด</label>
                    <input type="text" class="form-control" id="birthday" placeholder="วว-ดด-ปปปป วันเดือนปีเกิด">
                </div>
                <div class="form-group">
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                            ชาย
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                            หญิง
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <select class="form-control" id="prov">
                        <option>-กรุณาเลือกจังหวัด-</option>
                        @foreach ($prov as $key => $value)
                            <option id="{{ $value->id }}" > {{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control amph" id="amph">
                        <option>-กรุณาเลือกอำเภอ-</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control tamb" id="tamb">
                        <option>-กรุณาเลือกตำบล-</option>
                    </select>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="term">
                        ฉันยอมรับ <a href="" target="_blank">เงื่อนไขการใช้งาน</a>
                    </label>
                </div>
                <button class="btn btn-primary" type="submit">Sign up</button>
            </form>
        </div>
    </div>
@stop