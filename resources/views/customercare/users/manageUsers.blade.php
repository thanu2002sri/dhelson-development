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
                    <h2>Manage Users</h2>                       
                </div>
                        <div class="table-responsive">
                        <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center text-nowrap" style="width: 50px;">S.NO</th>
                                <th class="text-center text-nowrap">Profile ID</th>
                                <th class="text-center text-nowrap">User Name</th>
                                <th class="text-center text-nowrap">Registered By</th>
                                <th class="text-center text-nowrap">Phone</th>
                                <th class="text-center text-nowrap">KYC Status</th>
                                <th class="text-center text-nowrap">Balance</th>
                                <th class="text-center text-nowrap sorting_disabled" style="width: 73px;" rowspan="1" colspan="1" aria-label=""><i class="fa fa-flash"></i></th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach($users as $key => $user)
                                    <tr role="row" class="odd">
                                        <td class="text-center text-nowrap">{{ $loop->iteration }}</td>
                                        <td class="text-center text-nowrap">{{ $user->user_id  }}</td>
                                        <td class="text-center text-nowrap">{{ $user->name }}</td>
                                        <td class="text-center text-nowrap">{{ DB::table('users')->where('id', json_decode($user->extras)->agent_details->agent_id)->first()->name }}</td> 
                                        <td class="text-center text-nowrap">{{ $user->phone }}</td>
                                        <td class="text-center text-nowrap"><span class="label label-success">{{ $user->kyc_status ? $user->kyc_status : 'Nill' }}</span></td>
                                        <td class="text-center text-nowrap">{{ $user->wallet_balance ? $user->wallet_balance : '0.00' }} <b>AED</b></td>
                                        <td class="text-center text-nowrap">
                                                {{-- <a href="{{ route('edit.user', array('id' => $user->id)) }}" data-toggle="modal" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a> --}}

                                            <a href="#" data-toggle="modal" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
        </div>
        <!-- END Edit Distributor -->


<!-- START Remove Modal -->
@foreach($users as $key => $user)
<div id="remove-distr-{{ $user->id }}" data-id= '{{ $user->id }}' class="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title"><strong>Delete User</strong></h3>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete the User?
                </div>
                <div class="modal-footer">
                    <a href="{{ route('delete.user', array('id' => $user->id)) }}" class="btn btn-effect-ripple btn-primary">YES</a>
                    <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">NO</button>
                </div>
            </div>
        </div>
    </div>
 @endforeach
    <!-- END Remove Modal -->
<!-- END Main Container -->
</div>
<!-- END content -->
@endsection