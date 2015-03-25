<div class="section-menu">
    <ul class="nav nav-list">
      <li class="nav-header">In This Section</li>
      <li 
        @if( Route::currentRouteName() == 'aboutus_basic') 
            class="active" 
        @endif >
        <a href="{{URL::route('aboutus_basic')}}" class="first">
          About Us 
          <small>Basic Version</small>
          <i class="fa fa-angle-right"></i>
        </a>
      </li>
      <li
        @if( Route::currentRouteName() == 'aboutus_extend') 
            class="active" 
        @endif 
      >
        <a href="{{URL::route('aboutus_extend')}}" class="first">
          About Us 
          <small>Extended Version</small>
          <i class="fa fa-angle-right"></i>
        </a>
      </li>
      <li
        @if( Route::currentRouteName() == 'aboutus_me') 
            class="active" 
        @endif
      >
        <a href="{{ URL::route('aboutus_me') }}" class="first">
          About Me 
          <small>More About Me</small>
          <i class="fa fa-angle-right"></i>
        </a>
      </li>
      <li
        @if( Route::currentRouteName() == 'teamlist') 
            class="active" 
        @endif
      >
        <a href="{{ URL::route('teamlist') }}">
          The Team 
          <small>Team List</small>
          <i class="fa fa-angle-right"></i>
        </a>
      </li>
      <li
        @if( Route::currentRouteName() == 'teamgrid') 
            class="active" 
        @endif
      >
        <a href="{{ URL::route('teamgrid') }}">
          The Team 
          <small>Team Grid</small>
          <i class="fa fa-angle-right"></i>
        </a>
      </li>
      <li
        @if( Route::currentRouteName() == 'teammemb') 
            class="active" 
        @endif
      >
        <a href="{{ URL::route('teammemb') }}">
          Team Member 
          <small>Individual Display</small>
          <i class="fa fa-angle-right"></i>
        </a>
      </li>
      <li
        @if( Route::currentRouteName() == 'contact') 
            class="active" 
        @endif
      >
        <a href="{{ URL::route('contact') }}">
          Contact Us
          <small>How to get in touch</small>
          <i class="fa fa-angle-right"></i>
        </a>
      </li>
    </ul>
</div>