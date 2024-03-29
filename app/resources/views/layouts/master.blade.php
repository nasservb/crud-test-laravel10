<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />

    <title>{{config('app.name')}}</title>

    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
    <script src="{{ asset('js/require.min.js')}}"></script>
    <script>
        requirejs.config({
            baseUrl: '{{url('/')}}'
        });
    </script>
    <link href="{{ asset('css/dashboard.css')}}" rel="stylesheet" />
    <script src="{{ asset('js/dashboard.js')}}"></script>

    @yield('css')

</head>
<body class="">


<div class="home-head">
    <div class="container">
        <div class="d-flex">
            @if(!auth()->check())

                <div class="" style="margin-top:15px;">
                    <h3>{{__('common.welcome')}}</h3>
                </div>

            @else

                <div class="dropdown my-4">
                    <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                        <span class="ml-2 d-none d-lg-block">
                          <span class="text-default">{{ Auth::user()->name }}</span>
                          <small class="text-muted d-block mt-1">administrator</small>
                        </span>
                        <ssty class="avatar" style="background-image:  url({{asset('images/default.jpg') }})"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="dropdown-icon fe fe-log-out"></i> log out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    @endif
                </div>

            <div class="dropdown my-4 col-4">Customer Dashboard</div>
        </div>
    </div>

    @yield('content')

    <footer class="footer" style="background-color: rgb(16,50,69)">

        <div class="">
            <div class="container">
                <div class="row" >

                    <div class="col-12">
                        <div class="col-2" style=" margin-left: auto;margin-right: auto; text-align: center;">
                            <img alt="footer-logo" src="{{asset('images/footer-logo.png')}}"/>
                        </div>

                    </div>

                    <div class="col-lg-6 text-center" style="margin-left: auto;margin-right: auto">

                        <div class="row" style="margin-top: 10px; padding-top: 10px; ">
                            <div class="col-6 col-md-3">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="http://127.0.0.1/api/documentation#/"   class="btn btn-white"> {{__('common.documentation')}}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-6 col-md-3 mt-2">
                                <ul class="list-unstyled mb-0">
                                    <li><a  style="color: white;" href="https://github.com/nasservb/crud-test-laravel">{{__('common.github')}}</a></li>
                                </ul>
                            </div>
                            <div class="col-6 col-md-3 mt-2">
                                <ul class="list-unstyled mb-0">
                                    <li><a style="color: white;"  href="https://www.linkedin.com/">{{__('common.linkedin')}}</a></li>
                                </ul>
                            </div>
                            <div class="col-6 col-md-3 mt-2">
                                <ul class="list-unstyled mb-0">
                                    <li><a style="color: white"  href="https://shorturl.at/euVW1">{{__('common.about-title')}}</a></li>
                                </ul>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>

    </footer>

    <div class="" style="background-color:#082231;color:#145379 ">
        <div class="container  ">

            <div class=" p-3 text-center">
                Copyright © 2021 <a href="">my-site</a>text here.
            </div>
        </div>
    </div>
</div>

</body>
</html>
