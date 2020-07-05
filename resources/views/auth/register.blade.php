<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Zo Pay - Payments Made Easy</title>

        <meta name="description" content="Zo Wallet">
        <meta name="author" content="Strategy64">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('assets/img/icon57.png') }}" sizes="57x57">
        <link rel="apple-touch-icon" href="{{ asset('assets/img/icon72.png') }}" sizes="72x72">
        <link rel="apple-touch-icon" href="{{ asset('assets/img/icon76.png') }}" sizes="76x76">
        <link rel="apple-touch-icon" href="{{ asset('assets/img/icon114.png') }}" sizes="114x114">
        <link rel="apple-touch-icon" href="{{ asset('assets/img/icon120.png') }}" sizes="120x120">
        <link rel="apple-touch-icon" href="{{ asset('assets/img/icon144.png') }}" sizes="144x144">
        <link rel="apple-touch-icon" href="{{ asset('assets/img/icon152.png') }}" sizes="152x152">
        <link rel="apple-touch-icon" href="{{ asset('assets/img/icon180.png') }}" sizes="180x180">
        <!-- END Icons -->

        <script src="https://kit.fontawesome.com/79291a13ed.js" crossorigin="anonymous"></script>

         <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="{{ asset('assets/css/themes.css') }}">

        <!-- Custom CSS for Zo Wallet -->

        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="{{ asset('assets/js/vendor/modernizr-3.3.1.min.js') }}"></script>


        <script src="{{ asset('assets/js/custom.js') }}"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a, .left-link > a {
                color: black;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }
        </style>
        <!-- Styles -->
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-left left-link">
                <a href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
                
            

            {{-- <div class="flex-center position-ref full-height">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif

                <div class="content">
                    <div class="title m-b-md">
                        Laravel
                    </div>

                    <div class="links">
                        <a href="https://laravel.com/docs">Docs</a>
                        <a href="https://laracasts.com">Laracasts</a>
                        <a href="https://laravel-news.com">News</a>
                        <a href="https://blog.laravel.com">Blog</a>
                        <a href="https://nova.laravel.com">Nova</a>
                        <a href="https://forge.laravel.com">Forge</a>
                        <a href="https://github.com/laravel/laravel">GitHub</a>
                    </div>
                </div>
            </div> --}}
            </div>
<!-- Register Container -->
<div id="login-container">
        <!-- Register Header -->
        <h1 class="h2 text-light text-center push-top-bottom animation-slideDown">
            <img src="{{ asset('assets/img/zo-pay-big.png') }}" />
        </h1>
        <!-- END Register Header -->
        @if (Route::has('login'))
            @auth
                <!-- Home Block -->
                <div class="block animation-fadeInQuickInv">
                    <h1 class="text-center"><a href="{{ url('/home') }}">Dashboard</a></h1>
                </div>
                <!-- END Home Block -->
            @else
                
                <!-- Register Block -->
                <div class="block animation-fadeInQuickInv">
                    <!-- Register Title -->
                    <div class="block-title">
                        <div class="block-options pull-right">
                            {{-- <a href="{{ route('password.request') }}" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip" data-placement="left" title="Forgot password"><i class="fas fa-user-edit"></i></a> --}}
                        </div>
                        <h2>{{ __('Register') }}</h2>
                    </div>
                    <!-- END Register Title -->

                    <!-- Login Form -->
                    <form id="form-login" action="{{ route('register') }}" method="post" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                                <div class="col-xs-12">
                                    <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Phone" required autocomplete="email">
    
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group form-actions">
                            <div style=" padding-left: 1%; margin-top: 2%; margin-left: 42%; " class="col-xs-4 text-left">
                                <button style=" font-size: 18px;" type="submit" class="btn btn-effect-ripple btn-sm btn-primary">{{ __('Register') }}</button>
                            </div>
                        </div>
                    </form>
                    <!-- END Register Form -->
                </div>
                <!-- END Register Block -->
            @endauth
        @endif

        <!-- Footer -->
        <footer class="text-muted text-center animation-pullUp">
            <small> &copy; <span>2019</span> </small><a href="#" target="_blank">Zo Pay</a> by <a href="#" target="_blank">Strategy64</a >
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Register Container -->
</div>
<!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
<script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="{{ asset('assets/js/pages/readyLogin.js') }}"></script>
<script>$(function(){ ReadyLogin.init(); });</script>
</body>
</html>

