<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Dhelson Express</title>

        <meta name="description" content="Zo Wallet">
        <meta name="author" content="Strategy64">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Icons -->
         <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
         <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
         <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
         <link rel="manifest" href="/site.webmanifest">
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
                color: #454e59;
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
                    <a href="{{ url('/dashboard') }}">Home</a>
                    @else
                    @endauth
                </div>
            @endif

            </div>

            <!-- Login Container -->
            <div id="login-container">
                <!-- Login Header -->
                <h1 class="h2 text-light text-center push-top-bottom animation-slideDown">
                    <img src="{{ asset('assets/img/zo-pay-big.png') }}" />
                </h1>
                <!-- END Login Header -->
                {{-- @if (!Auth::guest())
                    @auth
                        <!-- Home Block -->
                        <div class="block animation-fadeInQuickInv">
                        <h1 class="text-center"> Dashboard</h1>
                        <div class="text-center">
                            <p>Thank you {{ Auth::user()->name }} for logging in, you will be redirected to your Dashboard. <a href="http://./{{ Auth::user()->type }}/dashboard/">Click here if you are not redirected</a> </p>
                        </div>
                        
                        <meta http-equiv="Refresh" content="3; url=./{{ Auth::user()->type }}/dashboard/">
                        </div>
                        <!-- END Home Block -->
                    @else --}}
                    @if (auth()->check()) 
                    {{-- print_r(auth()->check());
                    exit; --}}
                    <!-- Home Block -->
                        <div class="block animation-fadeInQuickInv">
                        <h1 class="text-center">  <a href="https://zopay.me/{{ Auth::user()->type }}/dashboard/">Click here if you are not redirected</a> </p></h1>
                        <div class="text-center">
                            <p>Thank you {{ Auth::user()->name }} for logging in, you will be redirected to your Dashboard. <a href="https://./{{ Auth::user()->type }}/dashboard/">Click here if you are not redirected</a> </p>
                        </div>
                        
                        <meta http-equiv="Refresh" content="3; url=./{{ Auth::user()->type }}/dashboard/">
                        </div>
                        <!-- END Home Block -->
                    @else
                        <!-- Login Block -->
                        <div class="block animation-fadeInQuickInv">
                            <!-- Login Title -->
                            <div class="block-title">
                                <h2>Login</h2>
                            </div>
                            <!-- END Login Title -->
    
                            <!-- Login Form -->
                            <form id="form-login" action="{{ route('login') }}" method="post" class="form-horizontal">
                                @csrf
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter email" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Enter password" autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group form-actions" style=" margin-top: -3% !important; ">
                                    <div class="row">
                                    <div style=" padding-left: 1%; margin-top: 2%; margin-left: 42%; " class="col-xs-4 text-left">
                                        <button style=" font-size: 18px;" type="submit" class="btn btn-effect-ripple btn-sm btn-primary"> Submit</button>
                                    </div>
                                    <div style="text-align: center;padding-left: 5%;" class="col-xs-7 hide">
                                        <label class="csscheckbox csscheckbox-primary">
                                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <span></span>
                                        </label>
                                        Remember Me
                                    </div>
                                    {{-- <div style="font-size: 16px; margin-top: 0.6%; margin-left: -4%;" class="col-xs-5">
                                    <a href="{{ route('forgot.password') }}" >
                                        Forgot Password?</a> --}}
                                    </div>
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
                    <small> &copy; <span>2019</span> </small><a href="#" target="_blank">Zo Pay</a> by <a href="#" target="_blank">Strategy64</a >
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
        <script>$(function(){ ReadyLogin.init(); });</script>
        <script src="{{ asset('assets/js/toastr.min.js') }}" type="text/javascript"></script>
        <script>
            @if(Session::has('success'))
                toastr["success"]("{{ Session::get('success') }}", "Success",
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "positionClass": "toast-bottom-left",
                        "onclick": null,
                        "showDuration": "1000",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut",
                    }
                );
            @endif

            @if(Session::has('error'))
                toastr["error"]("{{ Session::get('error') }}", "oops!",
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "positionClass": "toast-bottom-left",
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
