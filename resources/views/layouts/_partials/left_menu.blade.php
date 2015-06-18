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
<?php
    $catLeftMenu = App\Models\Category::orderBy('id')->get();
?>

<div class="tabbable tabs-left vertical-tabs bold-tabs row">
    <ul class="nav nav-tabs nav-stacked">
        <li class="nav-header">ประกาศหมวดหมู่</li>
        @if($catLeftMenu[0]->visible)
        <li
        @if( Route::currentRouteName() == 'home_index' ||
                Route::currentRouteName() == 'home_create' ||
                Route::currentRouteName() == 'home_update' ||
                Route::currentRouteName() == 'home_view')
            class="active"
                @endif >
            <a href="{{URL::route('home_index')}}" class="first" style="padding-top: 5px; font-size: 14px;">
                {{ $catLeftMenu[0]->category_name }} <i class="fa fa-angle-right"></i>
            </a>
        </li>
        @endif
        @if($catLeftMenu[1]->visible)
        <li
        @if( Route::currentRouteName() == 'townhome_index' ||
                Route::currentRouteName() == 'townhome_create' ||
                Route::currentRouteName() == 'townhome_update' ||
                Route::currentRouteName() == 'townhome_view')
            class="active"
                @endif
                >
            <a href="{{URL::route('townhome_index')}}" class="first" style="padding-top: 5px; font-size: 14px;">
                {{ $catLeftMenu[1]->category_name }}
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
        @endif
        @if($catLeftMenu[2]->visible)
        <li
        @if( Route::currentRouteName() == 'condo_index' ||
                Route::currentRouteName() == 'condo_create' ||
                Route::currentRouteName() == 'condo_update' ||
                Route::currentRouteName() == 'condo_view')
            class="active"
                @endif
                >
            <a href="{{URL::route('condo_index')}}" class="first" style="padding-top: 5px; font-size: 14px;">
                {{ $catLeftMenu[2]->category_name }}
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
        @endif
        @if($catLeftMenu[3]->visible)
        <li
        @if( Route::currentRouteName() == 'interiorDesign_index' ||
                Route::currentRouteName() == 'interiorDesign_create' ||
                Route::currentRouteName() == 'interiorDesign_update' ||
                Route::currentRouteName() == 'interiorDesign_view')
            class="active"
                @endif
                >
            <a href="{{URL::route('interiorDesign_index')}}" class="first" style="padding-top: 5px; font-size: 14px;">
                {{ $catLeftMenu[3]->category_name }}
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
        @endif
        @if($catLeftMenu[4]->visible)
        <li
        @if( Route::currentRouteName() == 'land_index' ||
                Route::currentRouteName() == 'land_create' ||
                Route::currentRouteName() == 'land_update' ||
                Route::currentRouteName() == 'land_view')
            class="active"
                @endif
                >
            <a href="{{URL::route('land_index')}}" class="first" style="padding-top: 5px; font-size: 14px;">
                {{ $catLeftMenu[4]->category_name }}
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
        @endif
        @if($catLeftMenu[5]->visible)
        <li
        @if( Route::currentRouteName() == 'furniture_index' ||
                Route::currentRouteName() == 'furniture_create' ||
                Route::currentRouteName() == 'furniture_update' ||
                Route::currentRouteName() == 'furniture_view')
            class="active"
                @endif
                >
            <a href="{{URL::route('furniture_index')}}" class="first" style="padding-top: 5px; font-size: 14px;">
                {{ $catLeftMenu[5]->category_name }}
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
        @endif
        @if($catLeftMenu[6]->visible)
        <li
        @if( Route::currentRouteName() == 'electric_index' ||
                Route::currentRouteName() == 'electric_create' ||
                Route::currentRouteName() == 'electric_update' ||
                Route::currentRouteName() == 'electric_view')
            class="active"
                @endif
                >
            <a href="{{URL::route('electric_index')}}" class="first" style="padding-top: 5px; font-size: 14px;">
                {{ $catLeftMenu[6]->category_name }}
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
        @endif
        @if($catLeftMenu[7]->visible)
        <li
        @if( Route::currentRouteName() == 'kitchenware_index' ||
                Route::currentRouteName() == 'kitchenware_create' ||
                Route::currentRouteName() == 'kitchenware_update' ||
                Route::currentRouteName() == 'kitchenware_view')
            class="active"
                @endif
                >
            <a href="{{URL::route('kitchenware_index')}}" class="first" style="padding-top: 5px; font-size: 14px;">
                {{ $catLeftMenu[7]->category_name }}
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
        @endif
        @if($catLeftMenu[8]->visible)
        <li
        @if( Route::currentRouteName() == 'contractor_index' ||
                Route::currentRouteName() == 'contractor_create' ||
                Route::currentRouteName() == 'contractor_update' ||
                Route::currentRouteName() == 'contractor_view')
            class="active"
                @endif
                >
            <a href="{{URL::route('contractor_index')}}" class="first" style="padding-top: 5px; font-size: 14px;">
                {{ $catLeftMenu[8]->category_name }}
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
        @endif
        @if($catLeftMenu[9]->visible)
        <li
        @if( Route::currentRouteName() == 'garden_index' ||
                Route::currentRouteName() == 'garden_create' ||
                Route::currentRouteName() == 'garden_update' ||
                Route::currentRouteName() == 'garden_view')
            class="active"
                @endif
                >
            <a href="{{URL::route('garden_index')}}" class="first" style="padding-top: 5px; font-size: 14px;">
                {{ $catLeftMenu[9]->category_name }}
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
        @endif
        @if($catLeftMenu[10]->visible)
        <li
        @if( Route::currentRouteName() == 'oldFurniture_index' ||
                Route::currentRouteName() == 'oldFurniture_create' ||
                Route::currentRouteName() == 'oldFurniture_update' ||
                Route::currentRouteName() == 'oldFurniture_view')
            class="active"
                @endif
                >
            <a href="{{URL::route('oldFurniture_index')}}" class="first" style="padding-top: 5px; font-size: 14px;">
                {{ $catLeftMenu[10]->category_name }}
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
        @endif
    </ul>
</div>

<div class="form-group">
    <a class="btn btn-block btn-social btn-facebook">
        <i class="fa fa-facebook fa-inverse"></i><font color="white"><b></b> Like Facebook<b></b></font>
    </a>
</div>
