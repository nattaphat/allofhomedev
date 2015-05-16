{{--<div style="padding-left: 20px;">--}}
    {{--<div class="list-group">--}}
        {{--<a href="{{ URL::to('home/index') }}"--}}
           {{--class="list-group-item list-group-item-success">โครงการบ้านใหม่</a>--}}
        {{--<a href="{{ URL::to('townhome/index') }}"--}}
           {{--class="list-group-item list-group-item-success">โครงการทาวน์โฮมใหม่</a>--}}
        {{--<a href="{{ URL::to('condo/index') }}"--}}
           {{--class="list-group-item list-group-item-success">โครงการคอนโดใหม่</a>--}}
        {{--<a href="{{ URL::to('interiorDesign/index') }}"--}}
           {{--class="list-group-item list-group-item-success">ออกแบบภายใน ภายนอก</a>--}}
        {{--<a href="{{ URL::to('land/index') }}"--}}
           {{--class="list-group-item list-group-item-success">ที่ดินเปล่า</a>--}}
        {{--<a href="{{ URL::to('furniture/index') }}"--}}
           {{--class="list-group-item list-group-item-success">เฟอร์นิเจอร์ ของตกแต่ง</a>--}}
        {{--<a href="{{ URL::to('electric/index') }}"--}}
           {{--class="list-group-item list-group-item-success">เครื่องใช้ไฟฟ้า</a>--}}
        {{--<a href="{{ URL::to('kitchenware/index') }}"--}}
           {{--class="list-group-item list-group-item-success">เครื่องครัว สุขภัณฑ์</a>--}}
        {{--<a href="{{ URL::to('contractor/index') }}"--}}
           {{--class="list-group-item list-group-item-success">วัสดุก่อสร้าง รับเหมา</a>--}}
        {{--<a href="{{ URL::to('garden/index') }}"--}}
           {{--class="list-group-item list-group-item-success">ดูแลสวน</a>--}}
        {{--<a href="{{ URL::to('oldFurniture/index') }}"--}}
           {{--class="list-group-item list-group-item-success">เฟอร์โบราณเก่าเก็บ</a>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--<a class="btn btn-block btn-social btn-facebook">--}}
            {{--<i class="fa fa-facebook"></i> Like Facebook--}}
        {{--</a>--}}
    {{--</div>--}}
{{--</div>--}}



{{--<div class="tabbable tabs-left vertical-tabs bold-tabs row">--}}
    {{--<ul class="nav nav-tabs nav-stacked">--}}
        {{--<li class="active">--}}
            {{--<a href="#tab1" data-toggle="tab" aria-expanded="true">--}}
                {{--โครงการบ้านใหม่--}}
                {{--<i class="fa fa-angle-right"></i>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="#tab1" data-toggle="tab" aria-expanded="false">--}}
                {{--โครงการคอนโดใหม่--}}
                {{--<i class="fa fa-angle-right"></i>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="#tab1" data-toggle="tab">--}}
                {{--โครงการทาวน์โฮมใหม่--}}
                {{--<i class="fa fa-angle-right"></i>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="#tab1" data-toggle="tab">--}}
                {{--ออกแบบภายใน ภายนอก--}}
                {{--<i class="fa fa-angle-right"></i>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="#tab1" data-toggle="tab">--}}
                {{--ที่ดินเปล่า--}}
                {{--<i class="fa fa-angle-right"></i>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="#tab1" data-toggle="tab">--}}
                {{--เฟอร์นิเจอร์ ของตกแต่ง--}}
                {{--<i class="fa fa-angle-right"></i>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="#tab1" data-toggle="tab">--}}
                {{--เครื่องใช้ไฟฟ้า--}}
                {{--<i class="fa fa-angle-right"></i>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="#tab1" data-toggle="tab">--}}
                {{--เครื่องครัว สุขภัณฑ์--}}
                {{--<i class="fa fa-angle-right"></i>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="#tab1" data-toggle="tab">--}}
                {{--วัสดุก่อสร้าง รับเหมา--}}
                {{--<i class="fa fa-angle-right"></i>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="#tab1" data-toggle="tab">--}}
                {{--ดูแลสวน--}}
                {{--<i class="fa fa-angle-right"></i>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="#tab1" data-toggle="tab">--}}
                {{--เฟอร์โบราณเก่าเก็บ--}}
                {{--<i class="fa fa-angle-right"></i>--}}
            {{--</a>--}}
        {{--</li>--}}
    {{--</ul>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
    {{--<a class="btn btn-block btn-social btn-facebook">--}}
        {{--<i class="fa fa-facebook fa-inverse"></i><font color="white"><b></b> Like Facebook<b></b></font>--}}
    {{--</a>--}}
{{--</div>--}}

<div class="tabbable tabs-left vertical-tabs bold-tabs row">
    <ul class="nav nav-tabs nav-stacked">
        <li class="nav-header">ประกาศหมวดหมู่</li>
        <li
        @if( Route::currentRouteName() == 'home_index' ||
                Route::currentRouteName() == 'home_create' ||
                Route::currentRouteName() == 'home_update' ||
                Route::currentRouteName() == 'home_view')
            class="active"
                @endif >
            <a href="{{URL::route('home_index')}}" class="first">
                โครงการบ้านใหม่ <i class="fa fa-angle-right"></i>
            </a>
        </li>
        <li
        @if( Route::currentRouteName() == 'townhome_index' ||
                Route::currentRouteName() == 'townhome_create' ||
                Route::currentRouteName() == 'townhome_update' ||
                Route::currentRouteName() == 'townhome_view')
            class="active"
                @endif
                >
            <a href="{{URL::route('townhome_index')}}" class="first">
                โครงการทาวน์โฮมใหม่
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
        <li
        @if( Route::currentRouteName() == 'condo_index' ||
                Route::currentRouteName() == 'condo_create' ||
                Route::currentRouteName() == 'condo_update' ||
                Route::currentRouteName() == 'condo_view')
            class="active"
                @endif
                >
            <a href="{{URL::route('condo_index')}}" class="first">
                โครงการคอนโดใหม่
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
        <li
        @if( Route::currentRouteName() == 'interiorDesign_index' ||
                Route::currentRouteName() == 'interiorDesign_create' ||
                Route::currentRouteName() == 'interiorDesign_update' ||
                Route::currentRouteName() == 'interiorDesign_view')
            class="active"
                @endif
                >
            <a href="{{URL::route('interiorDesign_index')}}" class="first">
                ออกแบบภายใน ภายนอก
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
        <li
        @if( Route::currentRouteName() == 'land_index' ||
                Route::currentRouteName() == 'land_create' ||
                Route::currentRouteName() == 'land_update' ||
                Route::currentRouteName() == 'land_view')
            class="active"
                @endif
                >
            <a href="{{URL::route('land_index')}}" class="first">
                ที่ดินเปล่า
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
        <li
        @if( Route::currentRouteName() == 'furniture_index' ||
                Route::currentRouteName() == 'furniture_create' ||
                Route::currentRouteName() == 'furniture_update' ||
                Route::currentRouteName() == 'furniture_view')
            class="active"
                @endif
                >
            <a href="{{URL::route('furniture_index')}}" class="first">
                เฟอร์นิเจอร์ ของตกแต่ง
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
        <li
        @if( Route::currentRouteName() == 'electric_index' ||
                Route::currentRouteName() == 'electric_create' ||
                Route::currentRouteName() == 'electric_update' ||
                Route::currentRouteName() == 'electric_view')
            class="active"
                @endif
                >
            <a href="{{URL::route('electric_index')}}" class="first">
                เครื่องใช้ไฟฟ้า
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
        <li
        @if( Route::currentRouteName() == 'kitchenware_index' ||
                Route::currentRouteName() == 'kitchenware_create' ||
                Route::currentRouteName() == 'kitchenware_update' ||
                Route::currentRouteName() == 'kitchenware_view')
            class="active"
                @endif
                >
            <a href="{{URL::route('kitchenware_index')}}" class="first">
                เครื่องครัว สุขภัณฑ์
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
        <li
        @if( Route::currentRouteName() == 'contractor_index' ||
                Route::currentRouteName() == 'contractor_create' ||
                Route::currentRouteName() == 'contractor_update' ||
                Route::currentRouteName() == 'contractor_view')
            class="active"
                @endif
                >
            <a href="{{URL::route('contractor_index')}}" class="first">
                วัสดุก่อสร้าง รับเหมา
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
        <li
        @if( Route::currentRouteName() == 'garden_index' ||
                Route::currentRouteName() == 'garden_create' ||
                Route::currentRouteName() == 'garden_update' ||
                Route::currentRouteName() == 'garden_view')
            class="active"
                @endif
                >
            <a href="{{URL::route('garden_index')}}" class="first">
                ดูแลสวน
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
        <li
        @if( Route::currentRouteName() == 'oldFurniture_index' ||
                Route::currentRouteName() == 'oldFurniture_create' ||
                Route::currentRouteName() == 'oldFurniture_update' ||
                Route::currentRouteName() == 'oldFurniture_view')
            class="active"
                @endif
                >
            <a href="{{URL::route('oldFurniture_index')}}" class="first">
                เฟอร์โบราณเก่าเก็บ
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
    </ul>
</div>

<div class="form-group">
    <a class="btn btn-block btn-social btn-facebook">
        <i class="fa fa-facebook fa-inverse"></i><font color="white"><b></b> Like Facebook<b></b></font>
    </a>
</div>
