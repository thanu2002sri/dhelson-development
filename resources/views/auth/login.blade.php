<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Dhelson Express</title>

        <meta name="description" content="Dhelson Express">
        <meta name="author" content="Strategy64">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
        <link rel="manifest" href="/site.webmanifest">

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
        <link href="{{ URL::asset('assets/css/toastr.min.css') }}" rel="stylesheet" type="text/css" />
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
            <div class="top-left left-link hide">
                <a href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                       {{--  <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif --}}
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

            <!-- Login Container -->
            <div id="login-container">
                <!-- Login Header -->
                <h1 class="h2 text-light text-center push-top-bottom animation-slideDown">
                    <img src="{{ asset('assets/img/dhelson-logo.png') }}" />
                </h1>
                <!-- END Login Header -->
                @if (Route::has('login'))
                    @auth
                        <!-- Home Block -->
                        <div class="block animation-fadeInQuickInv">
                            <h1 class="text-center"> Dashboard</h1>
                            <div class="text-center">
                                <p>Thank you {{ Auth::user()->name }} for logging in, you will be redirected to your Dashboard. <a href="{{ url('/').getUerRole(Auth::user()->role)->role }}/dashboard/">Click here if you are not redirected</a> </p>
                            </div>
                            
                            <meta http-equiv="Refresh" content="3; url=./{{ getUerRole(Auth::user()->role)->role }}/dashboard/">
                            </div>
                        <!-- END Home Block -->
                    @else
                        
                        <!-- Login Block -->
                        <div class="block animation-fadeInQuickInv">
                            <!-- Login Title -->
                            <div class="block-title hide">
                                <div class="block-options pull-right">
                                    <a href="{{ route('password.request') }}" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip" data-placement="left" title="Forgot password"><i class="fas fa-user-edit"></i></a>
                                </div>
                                <h2>Login</h2>
                            </div>
                            <!-- END Login Title -->
    
                            <!-- Login Form -->
                            <form id="form-login" action="{{ route('login') }}" method="post" class="form-horizontal">
                                @csrf
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input id="email" placeholder="Enter email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input id="password" type="password" placeholder="Enter password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group form-actions">
                                    <div style=" padding-right: 12%; " class="col-xs-8 text-center hide">
                                        <label class="csscheckbox csscheckbox-primary">
                                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <span></span>
                                        </label>
                                        Remember Me
                                    </div>
                                    <div style=" padding-left: 1%; margin-top: 2%; margin-left: 42%; " class="col-xs-4 text-left">
                                        <button style=" font-size: 18px;" type="submit" class="btn btn-effect-ripple btn-sm btn-primary"> Submit</button>
                                    </div>
                                </div>


                            </form>
                            <!-- END Login Form -->
                        </div>
                        <!-- END Login Block -->
                    @endauth
                @endif

                <!-- Footer -->
                <footer class="text-muted text-center animation-pullUp">
                <small> &copy; <span>2020</span> </small><a href="#" target="_blank">Dhelson Express</a>{{--  by <a href="#" target="_blank">R & M</a > --}}
                </footer>
                <!-- END Footer -->
            </div>
            <!-- END Login Container -->
        </div>
        <!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
        <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="{{ asset('assets/js/pages/readyLogin.js') }}"></script>
        <script src="{{ asset('assets/js/toastr.min.js') }}" type="text/javascript"></script>
        <script>$(function(){ ReadyLogin.init(); });</script>
        <script>
            @if(Session::has('error'))
                toastr["error"]("{{ Session::get('error') }}", "Oops!",
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "positionClass": "toast-top-right",
                        "onclick": null,
                        "showDuration": "1000",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                );
            @endif
        </script>
    </body>
</html>
