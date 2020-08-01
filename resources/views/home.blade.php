@extends('layouts.app')

@section('content')
    <!-- Page content -->
    <div id="page-content">
            <!-- First Row -->
            <div class="row">
                <!-- Simple Stats Widgets -->
                <div class="col-sm-6 col-lg-3">
                    <a href="javascript:void(0)" class="widget">
                        <div class="widget-content widget-content-mini text-right clearfix">
                            <div class="widget-icon pull-left themed-background">
                                <i class="fas fa-users text-light-op"></i>
                            </div>
                            <h2 class="widget-heading h3">
                                <strong><span data-toggle="counter" data-to="2835"></span></strong>
                            </h2>
                            <span class="text-muted">DISTRIBUTORS</span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="javascript:void(0)" class="widget">
                        <div class="widget-content widget-content-mini text-right clearfix">
                            <div class="widget-icon pull-left themed-background-success">
                                <i class="fas fa-user-friends text-light-op"></i>
                            </div>
                            <h2 class="widget-heading h3 text-success">
                                <strong><span data-toggle="counter" data-to="2862"></span></strong>
                            </h2>
                            <span class="text-muted">AGENTS</span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="javascript:void(0)" class="widget">
                        <div class="widget-content widget-content-mini text-right clearfix">
                            <div class="widget-icon pull-left themed-background-warning">
                                <i class="fas fa-user text-light-op"></i>
                            </div>
                            <h2 class="widget-heading h3 text-warning">
                                <strong><span data-toggle="counter" data-to="75"></span></strong>
                            </h2>
                            <span class="text-muted">USERS</span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="javascript:void(0)" class="widget">
                        <div class="widget-content widget-content-mini text-right clearfix">
                            <div class="widget-icon pull-left themed-background-danger">
                                <i class="gi gi-wallet text-light-op"></i>
                            </div>
                            <h2 class="widget-heading h3 text-danger">
                                <strong><span data-toggle="counter" data-to="58250"></span> AED</strong>
                            </h2>
                            <span class="text-muted">IN CIRCULATION</span>
                        </div>
                    </a>
                </div>
                <!-- END Simple Stats Widgets -->
            </div>
            <!-- END First Row -->

            <!-- Second Row -->
            {{-- <div class="row">
                <div class="col-sm-6 col-lg-8">
                    <div class="block">
                        <div class="block-title">
                            <h2>KYC Verifications</h2>
                        </div>
                        <div class="table-responsive">
                            <div id="example-datatable_wrapper" class="dataTables_wrapper form-inline no-footer"><div class="row"><div class="col-sm-6 col-xs-5"><div class="dataTables_length" id="example-datatable_length"><label><select name="example-datatable_length" aria-controls="example-datatable" class="form-control"><option value="10">10</option><option value="15">15</option><option value="20">20</option></select></label></div></div><div class="col-sm-6 col-xs-7"><div id="example-datatable_filter" class="dataTables_filter"><label><div class="input-group"><input type="search" class="form-control" placeholder="Search" aria-controls="example-datatable"><span class="input-group-addon"><i class="fa fa-search"></i></span></div></label></div></div></div><table id="example-datatable" class="table table-striped table-bordered table-vcenter dataTable no-footer" role="grid" aria-describedby="example-datatable_info">
                                <thead>
                                    <tr role="row"><th class="text-center" style="width: 49px;" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending">S.NO</th><th class="sorting" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 165px;">User</th><th class="sorting" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 367px;">Email</th><th style="width: 119px;" class="sorting" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Status</th><th class="text-center sorting_disabled" style="width: 73px;" rowspan="1" colspan="1" aria-label=""><i class="fa fa-flash"></i></th></tr>
                                </thead>
                                <tbody>  
                                <tr role="row" class="odd">
                                        <td class="text-center sorting_1">1</td>
                                        <td><strong>AppUser1</strong></td>
                                        <td>app.user1@example.com</td>
                                        <td><span class="label label-info">KYC On hold</span></td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete User"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr><tr role="row" class="even">
                                        <td class="text-center sorting_1">2</td>
                                        <td><strong>AppUser2</strong></td>
                                        <td>app.user2@example.com</td>
                                        <td><span class="label label-success">Active</span></td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete User"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr><tr role="row" class="odd">
                                        <td class="text-center sorting_1">3</td>
                                        <td><strong>AppUser3</strong></td>
                                        <td>app.user3@example.com</td>
                                        <td><span class="label label-danger">Disapproved</span></td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete User"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr><tr role="row" class="even">
                                        <td class="text-center sorting_1">4</td>
                                        <td><strong>AppUser4</strong></td>
                                        <td>app.user4@example.com</td>
                                        <td><span class="label label-info">KYC On hold</span></td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete User"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr><tr role="row" class="odd">
                                        <td class="text-center sorting_1">5</td>
                                        <td><strong>AppUser5</strong></td>
                                        <td>app.user5@example.com</td>
                                        <td><span class="label label-info">KYC On hold</span></td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete User"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr><tr role="row" class="even">
                                        <td class="text-center sorting_1">6</td>
                                        <td><strong>AppUser6</strong></td>
                                        <td>app.user6@example.com</td>
                                        <td><span class="label label-success">Active</span></td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete User"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr><tr role="row" class="odd">
                                        <td class="text-center sorting_1">7</td>
                                        <td><strong>AppUser7</strong></td>
                                        <td>app.user7@example.com</td>
                                        <td><span class="label label-warning">KYC Pending</span></td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete User"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr><tr role="row" class="even">
                                        <td class="text-center sorting_1">8</td>
                                        <td><strong>AppUser8</strong></td>
                                        <td>app.user8@example.com</td>
                                        <td><span class="label label-danger">Disapproved</span></td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete User"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr><tr role="row" class="odd">
                                        <td class="text-center sorting_1">9</td>
                                        <td><strong>AppUser9</strong></td>
                                        <td>app.user9@example.com</td>
                                        <td><span class="label label-success">Active</span></td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete User"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr><tr role="row" class="even">
                                        <td class="text-center sorting_1">10</td>
                                        <td><strong>AppUser10</strong></td>
                                        <td>app.user10@example.com</td>
                                        <td><span class="label label-success">Active</span></td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete User"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr></tbody>
                            </table><div class="row"><div class="col-sm-5 hidden-xs"><div class="dataTables_info" id="example-datatable_info" role="status" aria-live="polite"><strong>1</strong>-<strong>10</strong> of <strong>30</strong></div></div><div class="col-sm-7 col-xs-12 clearfix"><div class="dataTables_paginate paging_bootstrap" id="example-datatable_paginate"><ul class="pagination pagination-sm remove-margin"><li class="prev disabled"><a href="javascript:void(0)"><i class="fa fa-chevron-left"></i> </a></li><li class="active"><a href="javascript:void(0)">1</a></li><li><a href="javascript:void(0)">2</a></li><li><a href="javascript:void(0)">3</a></li><li class="next"><a href="javascript:void(0)"> <i class="fa fa-chevron-right"></i></a></li></ul></div></div></div></div>
                        </div>
                    </div>
                    <!-- END Chart Widget -->
                </div>
                <div class="col-sm-4">
                    <!-- Statistics Widget -->
                    <div class="widget">
                        <div class="widget-content border-bottom">
                            <span class="pull-right text-muted"><i class="fa fa-check"></i></span>
                            Weekly Sales
                        </div>
                        <div class="widget-content border-bottom themed-background-muted text-center">
                            <span id="widget-dashchart-sales">12,15,14,18,16,15,16,17</span>
                        </div>
                        <div class="widget-content widget-content-full-top-bottom border-bottom">
                            <div class="row text-center">
                                <div class="col-xs-6 push-inner-top-bottom border-right">
                                    <h3 class="widget-heading"><i class="gi gi-book_open text-dark push"></i> <br><small>123 Total Transactions</small></h3>
                                </div>
                                <div class="col-xs-6 push-inner-top-bottom">
                                    <h3 class="widget-heading"><i class="gi gi-briefcase text-dark push"></i> <br><small>1 Service</small></h3>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="widget-content widget-content-full">
                            <div class="row text-center">
                                <div class="col-xs-6 push-inner-top-bottom border-right">
                                    <h3 class="widget-heading"><i class="gi gi-briefcase text-dark push"></i> <br><small>1 Service</small></h3>
                                </div>
                                <div class="col-xs-6 push-inner-top-bottom">
                                    <h3 class="widget-heading"><i class="gi gi-truck text-dark push"></i> <br><small>10 </small></h3>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- END Statistics Widget -->
                </div>
            </div> --}}
            <!-- END Second Row -->

            <!-- Third Row -->
                {{-- <div class="block">
                    <div class="block-title">
                        <h2>Recent Transactions</h2>
                    </div>
                    <div class="table-responsive">
                        <div id="example-datatable_wrapper" class="dataTables_wrapper form-inline no-footer"><div class="row"><div class="col-sm-6 col-xs-5"><div class="dataTables_length" id="example-datatable_length"><label><select name="example-datatable_length" aria-controls="example-datatable" class="form-control"><option value="5">5</option><option value="10">10</option><option value="20">20</option></select></label></div></div><div class="col-sm-6 col-xs-7"><div id="example-datatable_filter" class="dataTables_filter"><label><div class="input-group"><input type="search" class="form-control" placeholder="Search" aria-controls="example-datatable"><span class="input-group-addon"><i class="fa fa-search"></i></span></div></label></div></div></div><table id="example-datatable" class="table table-striped table-bordered table-vcenter dataTable no-footer" role="grid" aria-describedby="example-datatable_info">
                            <thead>
                                <tr role="row"><th class="text-center sorting_asc" style="width: 49px;" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending">S.NO</th><th class="text-center sorting_asc" style="width: 49px;" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending">ID</th><th class="sorting" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 165px;">Name</th><th class="sorting" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 367px;">Email</th><th style="width: 119px;" class="sorting" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Status</th><th class="text-center sorting_disabled" style="width: 73px;" rowspan="1" colspan="1" aria-label=""><i class="fa fa-flash"></i></th></tr>
                            </thead>
                            <tbody>

                            <tr role="row" class="odd">
                                    <td class="text-center sorting_1">1</td>
                                    <td class="text-center">100001</td>
                                    <td><strong>AppUser1</strong></td>
                                    <td>app.user1@example.com</td>
                                    <td><span class="label label-success">+ 100 AED</span></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete User"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr><tr role="row" class="even">
                                    <td class="text-center sorting_1">2</td>
                                    <td class="text-center">100002</td>
                                    <td><strong>AppUser2</strong></td>
                                    <td>app.user2@example.com</td>
                                    <td><span class="label label-success">+ 2000 AED</span></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete User"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr><tr role="row" class="odd">
                                    <td class="text-center sorting_1">3</td>
                                    <td class="text-center">100003</td>
                                    <td><strong>Agent1</strong></td>
                                    <td>Agent1@example.com</td>
                                    <td><span class="label label-danger">- 370 AED</span></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete User"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr><tr role="row" class="even">
                                    <td class="text-center sorting_1">4</td>
                                    <td class="text-center">100004</td>
                                    <td><strong>AppUser3</strong></td>
                                    <td>app.user3@example.com</td>
                                    <td><span class="label label-success">+ 1000 AED</span></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete User"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr><tr role="row" class="odd">
                                    <td class="text-center sorting_1">5</td>
                                    <td class="text-center">100005</td>
                                    <td><strong>Distributor1</strong></td>
                                    <td>Distributor1@example.com</td>
                                    <td><span class="label label-success">+ 400 د.إ</span></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete User"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr><tr role="row" class="even">
                                    <td class="text-center sorting_1">6</td>
                                    <td class="text-center">100006</td>
                                    <td><strong>AppUser4</strong></td>
                                    <td>app.user4@example.com</td>
                                    <td><span class="label label-danger">- 100 د.إ</span></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete User"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr><tr role="row" class="odd">
                                    <td class="text-center sorting_1">7</td>
                                    <td class="text-center">100007</td>
                                    <td><strong>AppUser5</strong></td>
                                    <td>app.user5@example.com</td>
                                    <td><span class="label label-warning">Failed</span></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete User"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr><tr role="row" class="even">
                                    <td class="text-center sorting_1">8</td>
                                    <td class="text-center">100008</td>
                                    <td><strong>Agent2</strong></td>
                                    <td>Agent2@example.com</td>
                                    <td><span class="label label-success">+ 1000 د.إ</span></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete User"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr><tr role="row" class="odd">
                                    <td class="text-center sorting_1">9</td>
                                    <td class="text-center">100009</td>
                                    <td><strong>Distributor2</strong></td>
                                    <td>Distributor2@example.com</td>
                                    <td><span class="label label-danger">- 200 د.إ</span></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete User"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr><tr role="row" class="even">
                                    <td class="text-center sorting_1">10</td>
                                    <td class="text-center">100010</td>
                                    <td><strong>AppUser6</strong></td>
                                    <td>app.user6@example.com</td>
                                    <td><span class="label label-warning">Failed</span></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete User"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr></tbody>
                        </table><div class="row"><div class="col-sm-5 hidden-xs"><div class="dataTables_info" id="example-datatable_info" role="status" aria-live="polite"><strong>1</strong>-<strong>10</strong> of <strong>30</strong></div></div><div class="col-sm-7 col-xs-12 clearfix"><div class="dataTables_paginate paging_bootstrap" id="example-datatable_paginate"><ul class="pagination pagination-sm remove-margin"><li class="prev disabled"><a href="javascript:void(0)"><i class="fa fa-chevron-left"></i> </a></li><li class="active"><a href="javascript:void(0)">1</a></li><li><a href="javascript:void(0)">2</a></li><li><a href="javascript:void(0)">3</a></li><li class="next"><a href="javascript:void(0)"> <i class="fa fa-chevron-right"></i></a></li></ul></div></div></div></div>
                </div> --}}
            <!-- END Third Row -->
        </div>
        <!-- END Page Content -->
@endsection
