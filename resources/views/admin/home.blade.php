@extends('layouts.app')

@section('content')
<!-- Page content -->
    <div id="page-content">
            <!-- First Row -->
            <div class="row">
                <!-- Simple Stats Widgets -->
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ url('admin/manage-branches') }}" class="widget">
                        <div class="widget-content widget-content-mini text-right clearfix">
                            <div class="widget-icon pull-left themed-background-info">
                                <i class="fa fa-university text-light-op" style="padding-top: 12px"></i>
                            </div>
                            <h2 class="widget-heading h3 text-danger">
                            <strong><span data-toggle="counter" data-to="{{ $branch_count }}"></span></strong>
                            </h2>
                            <span class="text-muted">BRANCHES</span>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <a href="{{ url('admin/manage-agents') }}" class="widget">
                        <div class="widget-content widget-content-mini text-right clearfix">
                            <div class="widget-icon pull-left themed-background-default">
                                <i class="fas fa-users text-light-op" style="padding-top: 12px"></i>
                            </div>
                            <h2 class="widget-heading h3 text-danger">
                                <strong><span data-toggle="counter" data-to="{{ $agent_count }}"></span></strong>
                            </h2>
                            <span class="text-muted">AGENTS</span>
                        </div>
                    </a>
                </div>
                
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ url('admin/manage-incharges') }}" class="widget">
                        <div class="widget-content widget-content-mini text-right clearfix">
                            <div class="widget-icon pull-left themed-background-default">
                                <i class="fas fa-users text-light-op" style="padding-top: 12px"></i>
                            </div>
                            <h2 class="widget-heading h3 text-danger">
                                <strong><span data-toggle="counter" data-to="{{ $incharge_count }}"></span></strong>
                            </h2>
                            <span class="text-muted">INCHARGE</span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ url('admin/manage-guards') }}" class="widget">
                        <div class="widget-content widget-content-mini text-right clearfix">
                            <div class="widget-icon pull-left themed-background-default">
                                <i class="fas fa-users text-light-op" style="padding-top: 12px"></i>
                            </div>
                            <h2 class="widget-heading h3 text-danger">
                                <strong><span data-toggle="counter" data-to="{{ $guard_count }}"></span></strong>
                            </h2>
                            <span class="text-muted">GUARDS</span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ url('admin/manage-customercare') }}" class="widget">
                        <div class="widget-content widget-content-mini text-right clearfix">
                            <div class="widget-icon pull-left themed-background-default">
                                <i class="fas fa-users text-light-op" style="padding-top: 12px"></i>
                            </div>
                            <h2 class="widget-heading h3 text-danger">
                                <strong><span data-toggle="counter" data-to="{{ $customercare_count }}"></span></strong>
                            </h2>
                            <span class="text-muted">SUPPORT</span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ url('/admin/#') }}" class="widget">
                        <div class="widget-content widget-content-mini text-right clearfix">
                            <div class="widget-icon pull-left themed-background-danger">
                                <i class="fa fa-shopping-cart text-light-op" style="padding-top: 12px"></i>
                            </div>
                            <h2 class="widget-heading h3 text-danger">
                            <strong><span data-toggle="counter" data-to="3"></span></strong>
                            </h2>
                            <span class="text-muted">PENDING ORDERS</span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ url('admin/#') }}" class="widget">
                        <div class="widget-content widget-content-mini text-right clearfix">
                            <div class="widget-icon pull-left themed-background-success">
                                <i class="fa fa-shopping-cart text-light-op" style="padding-top: 12px"></i>
                            </div>
                            <h2 class="widget-heading h3 text-success">
                                <strong><span data-toggle="counter" data-to="8"></span></strong>
                            </h2>
                            <span class="text-muted">ORDER COMPLETE</span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ url('/admin/#') }}" class="widget">
                        <div class="widget-content widget-content-mini text-right clearfix">
                            <div class="widget-icon pull-left themed-background-default">
                                <i class="fas fa-truck text-light-op" style="padding-top: 12px"></i>
                            </div>
                            <h2 class="widget-heading h3">
                                <strong><span data-toggle="counter" data-to="5"></span></strong>
                            </h2>
                            <span class="text-muted">TRANSIT REQUEST</span>
                        </div>
                    </a>
                </div>
                
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ url('admin/#') }}" class="widget">
                        <div class="widget-content widget-content-mini text-right clearfix">
                            <div class="widget-icon pull-left themed-background-warning">
                                <i class="fas fa-truck text-light-op" style="padding-top: 12px"></i>
                            </div>
                            <h2 class="widget-heading h3 text-success">
                                <strong><span data-toggle="counter" data-to="4"></span></strong>
                            </h2>
                            <span class="text-muted">IN TRANSIT</span>
                        </div>
                    </a>
                </div>
                
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ url('admin/#') }}" class="widget">
                        <div class="widget-content widget-content-mini text-right clearfix">
                            <div class="widget-icon pull-left themed-background-success">
                                <i class="fas fa-truck text-light-op" style="padding-top: 12px"></i>
                            </div>
                            <h2 class="widget-heading h3 text-success">
                                <strong><span data-toggle="counter" data-to="6"></span></strong>
                            </h2>
                            <span class="text-muted">TRANSIT DELIVERED</span>
                        </div>
                    </a>
                </div>
               
                <!-- END Simple Stats Widgets -->
            </div>
            <!-- END First Row -->
        </div>
        <!-- Page content -->
      
@endsection