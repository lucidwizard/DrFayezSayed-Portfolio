@guest
<!--
    <div class="" style="width: 100%; text-align: center;">
        <a href='/' style="color: #000; margin-left: 2%; margin-top: 50px;">Return to Home Page</a>
    </div>
-->
@else
<nav class="newNav navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="navContainer">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <!--Dr Fayez Sayed-->
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse myNavBar" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                    <!--
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item col-lg-6 col-md-4 col-sm-4" style="">
                            <a class="nav-link @if ($_SERVER['REQUEST_URI']==='/') active @endif" href="/" style="font-size: 30px; font-weight: 600;">
                            !-- @if($_SERVER['REQUEST_URI']==="/") active @endif --
                                Home
                            </a>
                        </li>
                        <li class="nav-item col-lg-6 col-md-4 col-sm-4" style="">
                            <a class="nav-link @if ($_SERVER['REQUEST_URI']==='/profile') active @endif" href="/profile" style="font-size: 30px; font-weight: 600;">
                                Profile
                            </a>
                        </li>
                        <li class="nav-item col-lg-6 col-md-4 col-sm-4" style="">
                            <a class="nav-link @if ($_SERVER['REQUEST_URI']==='/workexperience') active @endif" href="/workexperience" style="font-size: 30px; font-weight: 600;">
                                Work Experience
                            </a>
                        </li>
                        <li class="nav-item col-lg-6 col-md-4 col-sm-4" style="">
                            <a class="nav-link @if ($_SERVER['REQUEST_URI']==='/achievements') active @endif" href="/achievements" style="font-size: 30px; font-weight: 600;">
                                Achievements
                            </a>
                        </li>
                    </ul>
                    -->
                    <!--<test></test>-->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="font-size: 30px; font-weight: 600;">{{ __('Login') }}</a>
                            </li>
                            
                        @else
                            <li class="nav-item dropup"><!-- instead of dropdown-->
                                <a id="navbarDropdown" class="nav-link dropdown-toggle dark-text" style="font-size: 150%;" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" style="margin-left: auto; margin-right: 0px;" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item dark-text" style=" text-align: center" href="/home">
                                        Dashboard
                                    </a>
                                    <a class="dropdown-item dark-text" style=" text-align: center" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @endguest