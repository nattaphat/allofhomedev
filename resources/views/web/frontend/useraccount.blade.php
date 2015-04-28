@extends('layouts.main')

@section('content')
    <div class="container">
        <!-- Sign Up form -->
        <div class="row">
            <form
                action="{{route('user_postaccinfo')}}"
                method="post"
                class="form-login form-wrapper form-medium" role="form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h3 class="title-divider">
                    <span>ข้อมูลบัญชีใช้งาน</span>
                </h3>
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
                    <select class="form-control" name="salary" id="salary">
                        <option>-กรุณาเลือกเงินเดือน-</option>
                        @foreach ($salary as $key => $value)
                            <option value="{{ $value->id }}" @if($userInfo->salary_id == $value->id) selected="true" @endif> {{ $value->range }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="telephone">เบอร์โทร/มือถือ</label>
                    <input type="text" value="{!! $userInfo->telephone !!}" class="form-control" name="telephone" id="telephone" placeholder="02-123-4567 ต่อ 123">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="birthday">วัน-เดือน-ปี เกิด</label>
                    <input type="text" value="{!! $userInfo->birthday !!}" class="form-control" name="birthday" id="birthday" placeholder="วว-ดด-ปปปป วันเดือนปีเกิด">
                </div>
                <div class="form-group">
                    <div class="radio">
                        <label>
                            <input type="radio" name="sex" id="optionsRadios1" value="male" @if($userInfo->sex == "male") checked @endif>
                            ชาย
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="sex" id="optionsRadios2" value="female" @if($userInfo->sex == "female") checked @endif>
                            หญิง
                        </label>
                    </div>
                </div>
                <div class="form-group">

                </div>
                <div class="form-group">
                    <textarea class="form-control" id="address" name="address"
                              rows="5" placeholder="ระบุที่อยู่" style="resize:none">{!! $userInfo->address !!}</textarea>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="occupation">อาชีพ</label>
                    <input type="text" value="{!! $userInfo->occupation !!}" class="form-control" name="occupation" id="occupation" placeholder="อาชีพ">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="newsletter" name="newsletter" value=true checked>
                        ฉันต้องการรับข่าวสารจากทางเว็บไซต์</a>
                    </label>
                </div>

<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input type="checkbox" id="acc_teme" name="acc_teme" value="term">-->
<!--                        ฉันยอมรับ <a href="" target="_blank">เงื่อนไขการใช้งาน</a>-->
<!--                    </label>-->
<!--                </div>-->
                <button class="btn btn-primary" type="submit">บันทึก</button>
                </br>
                @if( $errors->has('msg'))
                <ul class="alert alert-success">
                    <li>{{ $errors->first('msg') }}</li>
                </ul>
                @endif
            </form>
        </div>
    </div>
@stop