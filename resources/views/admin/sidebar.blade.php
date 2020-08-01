
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
            <a href="{{ url('/admin/dashboard') }}" class="sidebar-title">
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
                        <a href="{{ url('/admin/dashboard') }}" class=" active"><i class="gi gi-compass sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                    </li>
                     <li class="sidebar-separator">
                        <i class="fa fa-ellipsis-h"></i>
                    </li>

                    <li>
                        <a href="#" class="sidebar-nav-submenu">
                            <i class="fa fa-chevron-left sidebar-nav-indicator"></i><i class="fa fa-university sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Branches</span>
                        </a>
                        <ul>
                            <li>
                    
                                <a href="{{ url('/admin/add-branch') }}"><i class="fas fa-plus sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Create Branch</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/manage-branches') }}"><i class="fa fa-list sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Manage Branch</span></a>
                            </li>
                        </ul>
                    </li>

                    <li>
                            <a href="#" class="sidebar-nav-submenu">
                                <i class="fa fa-chevron-left sidebar-nav-indicator"></i><i class="fas fa-user-friends sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Agent Management</span></a>
                    <ul>
                            <li>
                                <a id="add-distributor" href="{{ url('/admin/create-agent') }}"><i class="fas fa-user-plus sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Create Agent</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/manage-agents') }}"><i class="fas fa-user-friends sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Manage Agent</span></a>
                            </li>
                    </ul>
                    </li>

                    <li>
                        <a href="#" class="sidebar-nav-submenu">
                                <i class="fa fa-chevron-left sidebar-nav-indicator"></i><i class="fas fa-user-friends sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Incharge Management</span></a>
                    <ul>
                            <li>
                                <a id="add-distributor" href="{{ url('/admin/create-incharge') }}"><i class="fas fa-user-plus sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Create Incharge</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/manage-incharges') }}"><i class="fas fa-user-friends sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Manage Incharge</span></a>
                            </li>
                    </ul>
                    </li>

                    <li>
                        <a href="#" class="sidebar-nav-submenu">
                                <i class="fa fa-chevron-left sidebar-nav-indicator"></i><i class="fas fa-user-friends sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Guard Management</span></a>
                    <ul>
                            <li>
                                <a id="add-distributor" href="{{ url('/admin/create-guard') }}"><i class="fas fa-user-plus sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Create Guard</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/manage-guards') }}"><i class="fas fa-user-friends sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Manage Guard</span></a>
                            </li>
                    </ul>
                    </li>

                    <li>
                        <a href="#" class="sidebar-nav-submenu">
                                <i class="fa fa-chevron-left sidebar-nav-indicator"></i><i class="fas fa-user-friends sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Support Management</span></a>
                    <ul>
                            <li>
                                <a id="add-distributor" href="{{ url('/admin/create-customercare') }}"><i class="fas fa-user-plus sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Create Support</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/manage-customercare') }}"><i class="fas fa-user-friends sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Manage Support</span></a>
                            </li>
                    </ul>
                    </li>

                    <li>
                        <a href="#" class="sidebar-nav-submenu">
                        <i class="fa fa-chevron-left sidebar-nav-indicator"></i><i class="fa fa-shopping-cart sidebar-nav-icon" aria-hidden="true"></i><span class="sidebar-nav-mini-hide">Orders</span>
                        </a>
                        <ul>
                
                            <li>
                                <a href="{{ url('/admin/#') }}"><i class="fas fa-tasks sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Transit Request Orders</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/#') }}"><i class="fas fa-tasks sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">In-Transit Orders</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/#') }}"><i class="fas fa-tasks sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Destination Deliver Orders</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/#') }}"><i class="fas fa-tasks sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Delivery Completed Orders</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/#') }}"><i class="fas fa-tasks sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Pending Orders</span></a>
                            </li>
                        </ul>
                    </li>
                    
                    
                    
                    <li>
                        <a href="#" class="sidebar-nav-submenu">
                            <i class="fa fa-chevron-left sidebar-nav-indicator"></i><i class="fas fa-cogs sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Settings</span>
                        </a>
                        <ul>
                            <li>
                    
                                <a href="{{ url('/admin/categories') }}"><i class="fas fa-tasks sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Category</span></a>
                            </li>
                            <li>
                    
                                 <a href="{{ url('/admin/sub-categories') }}"><i class="fas fa-tasks sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Subcategory</span></a>
                            </li>

                            <li>
                    
                                 <a href="{{ url('/admin/transit-settings') }}"><i class="fas fa-tasks sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Transit Settings</span></a>
                            </li>

                            
                            <li>
                                <a href="{{ url('/admin/') }}"><i class="fas fa-user-cog sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Edit Profile</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/other-settings') }}"><i class="fa fa-cog sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Other</span></a>
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

    