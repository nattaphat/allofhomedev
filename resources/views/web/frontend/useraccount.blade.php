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
                    <input type="text" value="{!! $userInfo->firstname !!}" class="form-control" name="first_name" id="first_name" placeholder="ชื่อ">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="last_name">นามสกุล</label>
                    <input type="text" value="{!! $userInfo->lastname !!}" class="form-control" name="last_name" id="last_name" placeholder="นามสกุล">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="username">Userame</label>
                    <input type="text" disabled value="{!! $userInfo->username !!}" class="form-control" id="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="email">Email address</label>
                    <input type="email" disabled value="{!! $userInfo->email !!}" class="form-control" id="email" placeholder="Email address">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="password">ประเภทสมาชิก</label>
                    <input type="text" disabled
                            @if ($userInfo->role == 3)
                                value="สมาชิกทั่วไป"
                            @elseif ($userInfo->role == 4)
                                value="สมาชิก VIP"
                            @elseif ($userInfo->role == 2)
                                value="ผู้ดูแลระบบ (Admin)"
                            @else
                                value="ผู้ดูแลระบบสูงสุด (Super Admin)"
                            @endif
                             class="form-control" id="role" placeholder="Password">
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
                    <input type="text" class="form-control" name="telephone" id="telephone" placeholder="02-123-4567 ต่อ 123">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="birthday">วัน-เดือน-ปี เกิด</label>
                    <input type="text" disabled class="form-control" name="birthday" id="birthday" placeholder="วว-ดด-ปปปป วันเดือนปีเกิด">
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

                </div>
                <div class="form-group">
                    <textarea class="form-control custom-control" id="address" name="address"
                              rows="3" placeholder="ระบุที่อยู่" style="resize:none">

                    </textarea>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="occupation">อาชีพ</label>
                    <input type="text" class="form-control" name="occupation" id="occupation" placeholder="อาชีพ">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="term">
                        ฉันต้องการรับข่าวสารจากทางเว็บไซต์</a>
                    </label>
                </div>

                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="term">
                        ฉันยอมรับ <a href="" target="_blank">เงื่อนไขการใช้งาน</a>
                    </label>
                </div>
                <button class="btn btn-primary" type="submit">บันทึก</button>
            </form>
        </div>
    </div>
@stop