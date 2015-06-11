{{--<div class="tabbable">--}}
    {{--<ul id="myTab" class="nav nav-tabs">--}}
        {{--<li--}}
        {{--@if( Route::currentRouteName() == 'home_index' ||--}}
                {{--Route::currentRouteName() == 'home_create' ||--}}
                {{--Route::currentRouteName() == 'home_update' ||--}}
                {{--Route::currentRouteName() == 'home_view')--}}
            {{--class="active"--}}
                {{--@endif >--}}
            {{--<a href="{{URL::route('home_index')}}" class="first">--}}
                {{--โครงการบ้านใหม่--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li--}}
        {{--@if( Route::currentRouteName() == 'townhome_index' ||--}}
                {{--Route::currentRouteName() == 'townhome_create' ||--}}
                {{--Route::currentRouteName() == 'townhome_update' ||--}}
                {{--Route::currentRouteName() == 'townhome_view')--}}
            {{--class="active"--}}
                {{--@endif--}}
                {{-->--}}
            {{--<a href="{{URL::route('townhome_index')}}" class="first">--}}
                {{--โครงการทาวน์โฮมใหม่--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li--}}
        {{--@if( Route::currentRouteName() == 'condo_index' ||--}}
                {{--Route::currentRouteName() == 'condo_create' ||--}}
                {{--Route::currentRouteName() == 'condo_update' ||--}}
                {{--Route::currentRouteName() == 'condo_view')--}}
            {{--class="active"--}}
                {{--@endif--}}
                {{-->--}}
            {{--<a href="{{URL::route('condo_index')}}" class="first">--}}
                {{--โครงการคอนโดใหม่--}}
            {{--</a>--}}
        {{--</li>--}}
    {{--</ul>--}}
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
            <a href="{{URL::route('home_index')}}" class="first" style="padding-top: 5px; font-size: 14px;">
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
            <a href="{{URL::route('townhome_index')}}" class="first" style="padding-top: 5px; font-size: 14px;">
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
            <a href="{{URL::route('condo_index')}}" class="first" style="padding-top: 5px; font-size: 14px;">
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
            <a href="{{URL::route('interiorDesign_index')}}" class="first" style="padding-top: 5px; font-size: 14px;">
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
            <a href="{{URL::route('land_index')}}" class="first" style="padding-top: 5px; font-size: 14px;">
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
            <a href="{{URL::route('furniture_index')}}" class="first" style="padding-top: 5px; font-size: 14px;">
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
            <a href="{{URL::route('electric_index')}}" class="first" style="padding-top: 5px; font-size: 14px;">
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
            <a href="{{URL::route('kitchenware_index')}}" class="first" style="padding-top: 5px; font-size: 14px;">
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
            <a href="{{URL::route('contractor_index')}}" class="first" style="padding-top: 5px; font-size: 14px;">
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
            <a href="{{URL::route('garden_index')}}" class="first" style="padding-top: 5px; font-size: 14px;">
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
            <a href="{{URL::route('oldFurniture_index')}}" class="first" style="padding-top: 5px; font-size: 14px;">
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
