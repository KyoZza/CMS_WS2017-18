<nav class="admin navbar navbar-inverse main-color-bg">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/admin') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="/">View Website</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li>
                        <a href="#" id="page-color">Page Color</a>
              
                        {!! Form::open(['action' => ['AdminController@setPageColor', str_replace('/', '.', Request::path())], 'method' => 'POST']) !!}
                            <div class="form-group" style="display: none">
                                {{Form::text('color', '', ['id' => 'nav-color-picker-value'])}}
                                {{Form::hidden('_method', 'PUT')}} <!-- To spoof a PUT request instead of POST -->
                                {{Form::submit('Submit', ['id' => 'nav-color-picker-submit'])}}
                            </div>
                        {!! Form::close() !!}
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle main-color-bg" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            <img src="{{Auth::user()->avatar === null ? '/storage/general_images/transparent.png' : '/storage/user_images/'.Auth::user()->avatar}}" 
                                width="26px" style="border: 1px solid #ddd; margin-right: 4px">
                            Yo, {{ Auth::user()->name }} <span class="caret"></span>
                            
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="users/{{Auth::user()->id}}">
                                    Profile
                                </a>

                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>          
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>