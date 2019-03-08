    <header role="banner">
      <nav class="navbar navbar-expand-md navbar-dark bg-light">
        <div class="container">
          <a class="navbar-brand" href="/">LuxuryHotel</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
            <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
              <li class="nav-item">
                <a class="nav-link {{Request::is('/')? 'active':''}}" href="/">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Rooms</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="#">Room Videos</a>
                  <a class="dropdown-item" href="#">Presidential Room</a>
                  <a class="dropdown-item" href="#">Luxury Room</a>
                  <a class="dropdown-item" href="#">Deluxe Room</a>
                </div>
              </li>
{{--               <li class="nav-item">
                <a class="nav-link" href="blog.html">Blog</a>
              </li> --}}
              <li class="nav-item">
                <a class="nav-link {{Request::is('about-us')? 'active':''}}" href="{{route('aboutus')}}">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{Request::is('contact-us')? 'active':''}}" href="{{route('contactus')}}">Contact</a>
              </li>
              

                @guest
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#myModal" href="">{{ __('Login') }}</a>
                    </li>
                    
                    
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" data-target="#myModalReg" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    
                @else
                @if(Auth::user()->role->id == 1)
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="rooms.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle"></i> {{ Auth::user()->name }}</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown04">
                    <a class="dropdown-item" target="_blank" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    {{-- <a class="dropdown-item" href="rooms.html">Sign Out</a> --}}
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </div>
                </li>
                @else
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="rooms.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle"></i> {{ Auth::user()->name }}</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown04">
                    <a class="dropdown-item" href="{{route('customer.dashboard')}}">Dashboard</a>
                    <a class="dropdown-item" href="rooms.html">Profile Settings</a>
                    <a class="dropdown-item" href="rooms.html">My Booking</a>
                    {{-- <a class="dropdown-item" href="rooms.html">Sign Out</a> --}}
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </div>
                </li>
                @endif
                @endguest
            </ul>
          </div>
        </div>
      </nav>
    </header>