<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <!--<![endif]-->
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>{{ $title }}</title>

        <meta name="description" content="Dhelson Express">
        <meta name="author" content="">
        {{-- <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0"> --}}
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
       {{--  <link rel="manifest" href="/site.webmanifest"> --}}
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins.css') }}">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}">

        <link rel="stylesheet" href="{{ URL::asset('assets/css/themes.css') }}">

        <!-- Custom CSS for Zo Wallet -->

        <link rel="stylesheet" href="{{ URL::asset('assets/css/custom.css') }}">
       
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="{{ URL::asset('assets/js/vendor/modernizr-3.3.1.min.js') }}"></script>
        <script src="https://kit.fontawesome.com/79291a13ed.js" crossorigin="anonymous"></script>
        {{-- <link href="{{ URL::asset('assets/css/toastr.min.css') }}" rel="stylesheet" type="text/css" /> --}}
     
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
        <style>
            .sidebar-title
            {
                background-color: #ffffff !important;
            }
            img#dashboard_logo {
                margin-left: 15% !important;
            }
            .sidebar-nav ul a {
                margin: 0 0 0 11px !important;
                padding-left: 0 !important;
            }
            div#example_wrapper
            {
                width: max-content !important;
            }
            div#zopay-table_wrapper
            {
                width: max-content !important;
            } 
            * {
             margin: 0;
             padding: 0;
            }
         .notification-box {
         position: fixed;
         z-index: 99;
         top: 10px;
         right: 181px;
         width: 50px;
          height: 130px;
         text-align: center;
         }
         .notification-bell {
         animation: bell 1s 1s both infinite;
         }
        .notification-bell * {
         display: block;
         margin: 0 auto;
         background-color: #fff;
         box-shadow: 0px 0px 15px #fff;
         }
        .bell-top {
         width: 6px;
         height: 6px;
         border-radius: 3px 3px 0 0;
        }
        .bell-middle {
         width: 22px;
         height: 15px;
          margin-top: 1px;
          border-radius: 12.5px 12.5px 0 0;
        }
        .bell-bottom {
         position: relative;
         z-index: 0;
          width: 32px;
         height: 2px;
        }
        .bell-bottom::before,
        .bell-bottom::after {
         content: '';
         position: absolute;
         top: -4px;
        }
       .bell-bottom::before {
        left: 1px;
         border-bottom: 4px solid #fff;
         border-right: 0 solid transparent;
        border-left: 4px solid transparent;
        }
         .bell-bottom::after {
         right: 1px;
         border-bottom: 4px solid #fff;
         border-right: 4px solid transparent;
          border-left: 0 solid transparent;
        }
       .bell-rad {
        width: 8px;
        height: 4px;
        margin-top: 2px;
        border-radius: 0 0 4px 4px;
        animation: rad 1s 2s both infinite;
       }
      .notification-count {
        position: absolute;
         z-index: 1;
        top: -6px;
        right: -1px;
        width: 23px;
        height: 22px;
        line-height: 23px;
        font-size: 16px;
        border-radius: 50%;
        background-color: #ff4927;
        color: #fff;
        animation: zoom 3s 3s both infinite;
        }
      @keyframes bell {
      0% { transform: rotate(0); }
     10% { transform: rotate(30deg); }
     20% { transform: rotate(0); }
     80% { transform: rotate(0); }
     90% { transform: rotate(-30deg); }
     100% { transform: rotate(0); }
     }
    @keyframes rad {
     0% { transform: translateX(0); }
     10% { transform: translateX(6px); }
     20% { transform: translateX(0); }
     80% { transform: translateX(0); }
     90% { transform: translateX(-6px); }
     100% { transform: translateX(0); }
    }
    @keyframes zoom {
    0% { opacity: 0; transform: scale(0); }
    10% { opacity: 1; transform: scale(1); }
    50% { opacity: 1; }
     51% { opacity: 0; }
    100% { opacity: 0; }
    }
   @keyframes moon-moving {
     0% {
    transform: translate(-200%, 600%);
    }
   100% {
    transform: translate(800%, -200%);
    }
}
        </style>
        @yield('styles')
    </head>
<body>

    <div id="page-wrapper" class="page-loading">

        <div class="preloader">
            <div class="inner">
                <!-- Animation spinner for all modern browsers -->
                <div class="preloader-spinner themed-background hidden-lt-ie10"></div>

                <!-- Text for IE9 -->
                <h3 class="text-primary visible-lt-ie10"><strong>Loading..</strong></h3>
            </div>
        </div>
        <!-- END Preloader -->
        <div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
            {{-- <!-- Alternative Sidebar -->
            <div id="sidebar-alt" tabindex="-1" aria-hidden="true">
                <!-- Toggle Alternative Sidebar Button (visible only in static layout) -->
                <a href="javascript:void(0)" id="sidebar-alt-close" onclick="App.sidebar('toggle-sidebar-alt');"><i class="fa fa-times"></i></a>

                
            </div>
            <!-- END Alternative Sidebar --> --}}

            {{-- <!-- Main Sidebar -->
            <div id="sidebar">
                    <!-- Sidebar Brand -->
                    <div id="sidebar-brand" class="themed-background">
                        <a href="{{ url('/admin/dashboard') }}" class="sidebar-title">
                            <img id="logo_icon" src="{{ asset('assets/img/logo-icon.png') }}" /> 
                            <img id="dashboard_logo" src="{{ asset('assets/img/Zo-Pay.png') }}" />
                        </a>
                    </div>
                    <!-- END Sidebar Brand -->

                    <!-- Wrapper for scrolling functionality -->
                    <div id="sidebar-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <!-- Sidebar Navigation -->
                            <ul class="sidebar-nav">
                                <li>
                                    <a href="{{ url('/admin/dashboard') }}" class=" active"><i class="gi gi-compass sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                                </li>
                                 <li class="sidebar-separator">
                                    <i class="fa fa-ellipsis-h"></i>
                                </li>
                                <li>
                                        <a href="#" class="sidebar-nav-submenu">
                                            <i class="fa fa-chevron-left sidebar-nav-indicator"></i><i class="fas fa-users-cog sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Manage Distributors</span></a>
                                <ul>
                                        <li>
                                            <a href="add-distributor.html"><i class="fas fa-user-plus sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Add Distributor</span></a>
                                        </li>
                                        <li>
                                            <a href="edit-distributor.html"><i class="fas fa-user-plus sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Edit Distributor</span></a>
                                        </li>
                                        <li>
                                            <a href="view-distributors.html"><i class="fas fa-user-plus sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Distributors List</span></a>
                                        </li>
                                </ul>
                                </li>

                                <li>
                                        <a href="#" class="sidebar-nav-submenu">
                                            <i class="fa fa-chevron-left sidebar-nav-indicator"></i><i class="fas fa-users-cog sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Manage Agents</span></a>
                                <ul>
                                        <li>
                                            <a href="add-agent.html"><i class="fas fa-user-plus sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Add Agent</span></a>
                                        </li>
                                        <li>
                                            <a href="edit-agent.html"><i class="fas fa-user-edit sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Edit Agent</span></a>
                                        </li>
                                        <li>
                                            <a href="view-agents.html"><i class="fas fa-th-list sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Agents List</span></a>
                                        </li>
                                </ul>
                                </li>
                                

                                <li>
                                        <a href="#" class="sidebar-nav-submenu">
                                            <i class="fa fa-chevron-left sidebar-nav-indicator"></i><i class="fas fa-users-cog sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Manage Users</span></a>
                                <ul>
                                        <li>
                                            <a href="edit-user.html"><i class="fas fa-user-plus sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Edit User</span></a>
                                        </li>
                                        <li>
                                            <a href="view-users.html"><i class="fas fa-user-edit sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">View Users</span></a>
                                        </li>
                                </ul>
                                </li>
                                 
                                <li>
                                        <a href="#" class="sidebar-nav-submenu">
                                            <i class="fa fa-chevron-left sidebar-nav-indicator"></i><i class="fas fa-wallet sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Wallet</span></a>
                                <ul>
                                        <li>
                                            <a href="send-money-sa.html"><i class="fas fa-user-plus sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Send Money</span></a>
                                        </li>
                                        <li>
                                            <a href="view-wallet-tranactions.html"><i class="fas fa-user-edit sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Recent Transactions</span></a>
                                        </li>
                                </ul>
                                </li>

                                <li>
                                    <a href="#"><i class="fas fa-money-bill-wave sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Manage Commisions</span></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fas fa-cogs sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Settings</span></a>
                                </li>
                            </ul>
                            <!-- END Sidebar Navigation -->

                            <!-- END Color Themes -->
                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->

                    <!-- Sidebar Extra Info -->
                    <div id="sidebar-extra-info" class="sidebar-content sidebar-nav-mini-hide">
                        <!-- <div class="push-bit">
                            <span class="pull-right">
                                <a href="javascript:void(0)" class="text-muted"><i class="fa fa-plus"></i></a>
                            </span>
                            <small><strong>1 GB</strong> / 100 GB</small>
                        </div>
                        <div class="progress progress-mini push-bit">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 1%"></div>
                        </div> -->
                        <div class="text-center">
                            V 0.9.0 &copy; <a style="text-decoration: none;" href="#" target="_blank">Dhelson Express</a></small>
                        </div>
                    </div>
                    <!-- END Sidebar Extra Info -->
                </div>
                <!-- END Main Sidebar -->

            <!-- Main Container --> --}}
            @if (getUerRole(Auth::user()->role)->role=='admin')
                @include('admin.sidebar')
            @endif
            @if (getUerRole(Auth::user()->role)->role=='agent')
                @include('agent.sidebar')
            @endif
            @if (getUerRole(Auth::user()->role)->role=='incharge')
                @include('incharge.sidebar')
            @endif
            @if (getUerRole(Auth::user()->role)->role=='guard')
                @include('guard.sidebar')
            @endif
            @if (getUerRole(Auth::user()->role)->role=='customercare')
                @include('customercare.sidebar')
            @endif

            <div id="main-container">
                <header class="navbar navbar-inverse navbar-fixed-top">
                    <!-- Left Header Navigation -->
                    <ul class="nav navbar-nav-custom">
                        <!-- Main Sidebar Toggle Button -->
                        <li>
                            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                                <i class="fa fa-ellipsis-v fa-fw animation-fadeInRight" id="sidebar-toggle-mini"></i>
                                <i class="fa fa-bars fa-fw animation-fadeInRight" id="sidebar-toggle-full"></i>
                            </a>
                        </li>
                        <!-- END Main Sidebar Toggle Button -->

                        <!-- Header Link -->
                        <li class="hidden-xs animation-fadeInQuick">
                            <a href="">
                                <strong>
                                        @if (Auth::check()) 
                                            {{ ucwords(getUerRole(Auth::user()->role)->name) }} Dashboard
                                        @endif
                                </strong>
                            </a>
                        </li>
                        <!-- END Header Link -->
                    </ul>
                    <!-- END Left Header Navigation -->

                    <!-- Right Header Navigation -->
                    <ul class="nav navbar-nav-custom pull-right">
                    <li class="hidden-xs animation-fadeInQuick">
                        
                            <a href="">
                            <div class="notification-box">
                              <span class="notification-count">6</span>
                            <div class="notification-bell">
                              <span class="bell-top"></span>
                              <span class="bell-middle"></span>
                              <span class="bell-bottom"></span>
                              <span class="bell-rad"></span>
                            </div>
                            </div>
                            </a>
                        </li>
                        <li class="hidden-xs animation-fadeInQuick">
                        
                            <a href="">
                                <strong>
                                        @if (Auth::check()) 
                                            {{ Auth::user()->name }}
                                        @endif
                                </strong>
                            </a>
                        </li>
                        <!-- User Dropdown -->
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('assets/img/placeholders/avatars/avatar9.jpg') }}" alt="avatar">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-header">
                                    <strong>
                                        @if (Auth::check())
                                            {{ Auth::user()->name }}
                                        @endif
                                    </strong>
                                </li>
                                <li>
                                    {{-- <a href="{{ url('/'.getUerRole(Auth::user()->role)->role.'/edit-profile') }}">
                                        <i class="fa fa-pencil-square fa-fw pull-right"></i>
                                        Profile
                                    </a> --}}
                                    <a href="{{ url('/'.getUerRole(Auth::user()->role)->role.'/#') }}">
                                        <i class="fa fa-pencil-square fa-fw pull-right"></i>
                                        Profile
                                    </a>
                                </li>
                                <li class="divider"><li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                       
                                        <i class="fa fa-power-off fa-fw pull-right"></i>
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <!-- END User Dropdown -->
                    </ul>
                    <!-- END Right Header Navigation -->
                </header>
                <!-- END Header -->

                @yield('content')

            </div>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->
    </div>
  
    <!-- END Page Wrapper -->
            
        <!-- Start Transactions Edit Modal-->
        <div id="wallet-transaction" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="modal-title"><strong>Edit Transaction</strong></h3>
                        </div>
                        <form id="transaction-form" action="#" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
                                <div class="form-group">
                                        <div class="col-sm-4 form-field-margin">
                                                <label class="control-label" >Transaction Id</label>
                                           </div>
                                        <div class="col-md-5 form-field-margin">
                                            <input type="text" id="agent-id" name="agent-id" class="form-control" value="19989" disabled="" required>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                            <div class="col-sm-4 form-field-margin">
                                                    <label class="control-label" for="distr-first-name">Name/ID</label>
                                            </div>
                                        <div class="col-sm-5 form-field-margin">
                                                    <input type="text" class="form-control"  value="AppUser1" disabled="" required>                                                                       
                                        </div>
                                    </div> 
                                <div class="form-group">
                                        <div class="col-sm-4 form-field-margin">
                                                <label class="control-label">Email</label>
                                        </div>
                                    <div class="col-sm-7 form-field-margin">
                                        <div class="input-group">
                                                <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                                                <input type="email" name="distr-email" class="form-control" value="app.user10@example.com	" required>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-md-4 control-label form-field-margin " >Transaction  Status</label>
                                        <div class="col-md-5 form-field-margin">
                                            <select name="transaction-status" class="select-select2 select2-hidden-accessible" style="width: 100%;" data-placeholder="Change Status" tabindex="-1" aria-hidden="true">
                                                <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                <option value="1">Successful</option>
                                                <option value="2">Rejected</option>
                                                <option value="2">Failed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <div class="col-sm-4 form-field-margin">
                                                    <label class="control-label" >Transaction Amount</label>
                                               </div>
                                            <div class="col-md-5 form-field-margin">
                                                <input type="text" name="agent-id" class="form-control" value="100" disabled="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <label class="col-md-4 control-label form-field-margin" for="example-textarea-input">Remarks</label>
                                                <div class="col-md-7 form-field-margin">
                                                    <textarea id="example-textarea-input" name="example-textarea-input" rows="3" class="form-control" placeholder="Remarks.."></textarea>
                                                </div>
                                            </div> 
                                        <div class="form-group">
                                                <label style=" margin-top: 12px; " class="col-md-4 control-label" for="example-datepicker">Transaction PIN</label>
                                                <div class="col-sm-2" style=" margin-top: 12px; ">
                                                    <input type="password" class="form-control" placeholder="PIN"  maxlength="6" required>
                                                </div>
                                                <div class="col-sm-2" style=" margin-top: 12px; ">
                                                    <input type="password" class="form-control" placeholder="PIN"  maxlength="6" required>
                                                </div>    
                                        </div>
                                <div class="form-group form-actions">
                                        <div class="col-sm-9 col-sm-offset-4">
                                                <button type="submit" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;">Save</button>
                                                <button type="reset" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;" data-dismiss="modal">Close</button>
                                        </div>
                                </div>
                                @csrf
                            </form>
                    </div>
                </div>
            </div>
            <!-- End Transactions Edit Modal-->  
                
                <!-- END Remove KYC Modal -->
    
    
    <script type="text/javascript" src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins.js') }}"></script>
    

    <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
    <!-- Plugins Intitialization -->
    <script type="text/javascript" src="{{ asset('assets/js/pages/readyDashboard.js') }}"></script>
    <!-- Tables -->
    <script type="text/javascript" src="{{ asset('assets/js/pages/uiTables.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    {{-- <script src="{{ asset('assets/js/toastr.min.js') }}" type="text/javascript"></script> --}}

    <script src="{{ asset('assets/js/formsWizard.js') }}" type="text/javascript"></script>
        
    @yield('scripts')



    <script type="text/javascript">
        $(function(){
            ReadyDashboard.init();
            UiTables.init();
        });
        $('.input-datepicker').datepicker({
            startDate: 'today'
        });

        $(document).on('keydown', 'input[pattern]', function(e){
            var input = $(this);
            var oldVal = input.val();
            var regex = new RegExp(input.attr('pattern'), 'g');

            setTimeout(function(){
                var newVal = input.val();
                if(!regex.test(newVal)){
                    input.val(oldVal); 
                }
            }, 0);
        });

        @if(Session::has('success'))
            /* toastr["success"]("{{ Session::get('success') }}", "Success",
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
                    "hideMethod": "fadeOut",
                }
            ); */


            swal({
                title: "Success!",
                text:  "{{ Session::get('success') }}",
                icon: "success",
                type: "success",
                timer: 2000,
                showConfirmButton: false
            });
            window.setTimeout(function(){ } ,2000);
                //location.reload();
        @endif

        @if(Session::has('error'))
            /* toastr["error"]("{{ Session::get('error') }}", "oops!",
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
            ); */

            swal({
                title: "Error!",
                text:  "{{ Session::get('error') }}",
                icon: "error",
                type: "error",
                timer: 2000,
                showConfirmButton: false
            });
            window.setTimeout(function(){ } ,2000);
        @endif
    </script>
</body>
</html>
