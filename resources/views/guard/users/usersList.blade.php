@extends('layouts.app')

@section('content')
    <!-- Page content -->
    <div id="page-content">
            <!-- Page Header -->
            <div class="content-header">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="header-section">
                            <h1>{{ $title }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Page Header -->

            <!-- Edit Distributor -->
            <div class="block full">
                <div class="block-title">
                    <h2>View Users</h2>                       
                </div>
                <div id="view-distr-table" class="table-responsive">
                        <div id="example-datatable_wrapper" class="dataTables_wrapper form-inline no-footer"><div class="row"><div class="col-sm-6 col-xs-5"><div class="dataTables_length" id="example-datatable_length"><label><select name="example-datatable_length" aria-controls="example-datatable" class="form-control"><option value="5">5</option><option value="10">10</option><option value="20">20</option></select></label></div></div><div class="col-sm-6 col-xs-7"><div id="example-datatable_filter" class="dataTables_filter"><label><div class="input-group">
                            <input type="search" class="form-control" placeholder="Search" aria-controls="example-datatable"><span class="input-group-addon"><i class="fa fa-search"></i></span></div></label></div></div></div><table id="example-datatable" class="table table-striped table-bordered table-vcenter dataTable no-footer" role="grid" aria-describedby="example-datatable_info">
                            <thead>
                                <tr role="row"><th class="text-center sorting" style="width: 49px;" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending">S.NO</th><th class="sorting" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 165px;">User</th><th class="sorting" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 165px;">Distributor</th>
                                    <th class="sorting" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 165px;">Agent</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="Email: activate to sort column descending" aria-sort="ascending" style="width: 367px;">Email</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="Email: activate to sort column descending" aria-sort="ascending" style="width: 165px;">Balance</th></tr>
                            </thead>
                            <tbody>   
                            <tr role="row" class="odd">
                                    <td class="text-center">10</td>
                                    <td><strong>AppUser10</strong></td>
                                    <td><strong>Distributor1</strong></td>
                                    <td><strong>Agent1</strong></td>
                                    <td class="sorting_1">app.user10@example.com</td>
                                    <td><span class="label label-info">500 AED</span></td>
                                </tr><tr role="row" class="even">
                                    <td class="text-center">11</td>
                                    <td><strong>AppUser11</strong></td>
                                    <td><strong>Distributor1</strong></td>
                                    <td><strong>Agent2</strong></td>
                                    <td class="sorting_1">app.user11@example.com</td>
                                    <td><span class="label label-info">100 AED</span></td>
                                </tr><tr role="row" class="odd">
                                    <td class="text-center">12</td>
                                    <td><strong>AppUser12</strong></td>
                                    <td><strong>Distributor2</strong></td>
                                    <td><strong>Agent3</strong></td>
                                    <td class="sorting_1">app.user12@example.com</td>
                                    <td><span class="label label-info">50 AED</span></td>
                                </tr><tr role="row" class="even">
                                    <td class="text-center">13</td>
                                    <td><strong>AppUser13</strong></td>
                                    <td><strong>Distributor3</strong></td>
                                    <td><strong>Agent1</strong></td>
                                    <td class="sorting_1">app.user13@example.com</td>
                                    <td><span class="label label-info">67 AED</span></td>
                                </tr><tr role="row" class="odd">
                                    <td class="text-center">14</td>
                                    <td><strong>AppUser14</strong></td>
                                    <td><strong>Distributor2</strong></td>
                                    <td><strong>Agent2</strong></td>
                                    <td class="sorting_1">app.user14@example.com</td>
                                    <td><span class="label label-info">100 AED</span></td>
                                </tr><tr role="row" class="even">
                                    <td class="text-center">15</td>
                                    <td><strong>AppUser15</strong></td>
                                    <td><strong>Distributor1</strong></td>
                                    <td><strong>Agent3</strong></td>
                                    <td class="sorting_1">app.user15@example.com</td>
                                    <td><span class="label label-info">250 AED</span></td>
                                </tr><tr role="row" class="odd">
                                    <td class="text-center">16</td>
                                    <td><strong>AppUser16</strong></td>
                                    <td><strong>Distributor3</strong></td>
                                    <td><strong>Agent2</strong></td>
                                    <td class="sorting_1">app.user16@example.com</td>
                                    <td><span class="label label-info">55 AED</span></td>
                                </tr><tr role="row" class="even">
                                    <td class="text-center">17</td>
                                    <td><strong>AppUser17</strong></td>
                                    <td><strong>Distributor2</strong></td>
                                    <td><strong>Agent1</strong></td>
                                    <td class="sorting_1">app.user17@example.com</td>
                                    <td><span class="label label-info">111 AED</span></td>
                                </tr><tr role="row" class="odd">
                                    <td class="text-center">18</td>
                                    <td><strong>AppUser18</strong></td>
                                    <td><strong>Distributor1</strong></td>
                                    <td><strong>Agent1</strong></td>
                                    <td class="sorting_1">app.user18@example.com</td>
                                    <td><span class="label label-info">110 AED</span></td>
                                </tr><tr role="row" class="even">
                                    <td class="text-center">19</td>
                                    <td><strong>AppUser19</strong></td>
                                    <td><strong>Distributor2</strong></td>
                                    <td><strong>Agent3</strong></td>
                                    <td class="sorting_1">app.user19@example.com</td>
                                    <td><span class="label label-info">200 AED</span></td>
                                </tr></tbody>
                        </table><div class="row"><div class="col-sm-5 hidden-xs"><div class="dataTables_info" id="example-datatable_info" role="status" aria-live="polite"><strong>1</strong>-<strong>10</strong> of <strong>30</strong></div></div><div class="col-sm-7 col-xs-12 clearfix"><div class="dataTables_paginate paging_bootstrap" id="example-datatable_paginate"><ul class="pagination pagination-sm remove-margin"><li class="prev disabled"><a href="javascript:void(0)"><i class="fa fa-chevron-left"></i> </a></li><li class="active"><a href="javascript:void(0)">1</a></li><li><a href="javascript:void(0)">2</a></li><li><a href="javascript:void(0)">3</a></li><li class="next"><a href="javascript:void(0)"> <i class="fa fa-chevron-right"></i></a></li></ul></div></div></div></div>
                    </div>
        </div>
        <!-- END Edit Distributor -->

    
<!-- END Main Container -->
</div>
<!-- END content -->
@endsection