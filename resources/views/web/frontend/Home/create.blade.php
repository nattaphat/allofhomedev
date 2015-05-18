@extends('layouts.main')

@section('slider')
    @include('layouts._partials.topslide')
@stop

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts._partials.left_menu')
        </div>
        <div class="col-md-9">
            <div class="block features">
                <h2 class="title-divider" >
                    <span style="color: #55a79a;">เพิ่มโครงการบ้านใหม่</span>
                </h2>
                <form class="form-horizontal">
                    <div class="bs-callout bs-callout-success">
                        ข้อมูลโพส
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">หัวข้อประกาศ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">หัวข้อย่อยประกาศ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">ลงประกาศเมื่อ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">ประกาศโดย</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                    </div>
                    <div class="bs-callout bs-callout-success">
                        ข้อมูลผู้ติดต่อ
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">เบอร์ติดต่อโครงการ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">อีเมล</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">เว็บไซต์บริษัท</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Line ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                    </div>
                    <div class="bs-callout bs-callout-success">
                        ข้อมูลเบื้องต้นโครงการ
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@stop