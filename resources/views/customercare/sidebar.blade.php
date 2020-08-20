
    <!-- Alternative Sidebar -->
    <div id="sidebar-alt" tabindex="-1" aria-hidden="true">
        <!-- Toggle Alternative Sidebar Button (visible only in static layout) -->
        <a href="javascript:void(0)" id="sidebar-alt-close" onclick="App.sidebar('toggle-sidebar-alt');"><i class="fa fa-times"></i></a>

        
    </div>
    <!-- END Alternative Sidebar -->

    <!-- Main Sidebar -->
    <div id="sidebar">
        <!-- Sidebar Brand -->
        <div id="sidebar-brand" class="themed-background">
            <a href="{{ url('/customercare/dashboard') }}" class="sidebar-title">
                <img id="logo_icon" src="{{ asset('assets/img/logo-icon.png') }}" /> 
                <img id="dashboard_logo" src="{{ asset('assets/img/dhelson-logo-1.png') }}" />
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
                        <a href="{{ url('/customercare/dashboard') }}" class=" active"><i class="gi gi-compass sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                    </li>
                     <li class="sidebar-separator">
                        <i class="fa fa-ellipsis-h"></i>
                    </li>
                    
                    <li>
                        <a href="#" class="sidebar-nav-submenu">
                        <i class="fa fa-chevron-left sidebar-nav-indicator"></i><i class="fa fa-shopping-cart sidebar-nav-icon" aria-hidden="true"></i><span class="sidebar-nav-mini-hide">Orders</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ url('/customercare/add-user') }}"><i class="fas fa-tasks sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Booking / New Orders</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/customercare/#') }}"><i class="fas fa-tasks sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Transit Request Orders</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/customercare/#') }}"><i class="fas fa-tasks sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">In-Transit Orders</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/customercare/#') }}"><i class="fas fa-tasks sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Destination Deliver Orders</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/customercare/#') }}"><i class="fas fa-tasks sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Delivery Completed Orders</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/customercare/#') }}"><i class="fas fa-tasks sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Pending Orders</span></a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#" class="sidebar-nav-submenu">
                            <i class="fa fa-chevron-left sidebar-nav-indicator"></i><i class="fas fa-cogs sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Settings</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ url('/customercare/#') }}"><i class="fas fa-user-cog sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Edit Profile</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/customercare/#') }}"><i class="fa fa-cog sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Other</span></a>
                            </li>
                            
                        </ul>
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
            <div class="text-center">
                V 1.1.1 &copy; <a style="text-decoration: none;" href="#" target="_blank">Dhelson Express</a></small>
            </div>
        </div>
        <!-- END Sidebar Extra Info -->
    </div>
    <!-- END Main Sidebar -->

<!-- Main Container -->

    