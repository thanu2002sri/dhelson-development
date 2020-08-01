@extends('layouts.app')
@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
<link rel="stylesheet" typel="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
<style>
.dataTables_wrapper > div {
    background-color: #ffffff !important; 
    border: 0 !important;
    border-top-width: 0 !important;
}

</style>
@endsection 
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
                <div class="block-title text-center">
                    <h2>Dhelson Express {{ $title }}</h2>                   
                </div>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered table-vcenter display" style="width:100%">
                            <thead>                              
                                <tr role="row">
                                    <th class="text-center text-nowrap">SI</th>
                                    <th class="text-center text-nowrap">Branch ID</th>
                                    <th class="text-center text-nowrap">Profile ID</th>
                                    <th class="text-center text-nowrap">Support Name</th>
                                    <th class="text-center text-nowrap">Support Email</th>
                                    <th class="text-center text-nowrap">Support Phone</th>
                                    <th class="text-center text-nowrap">Status</th>
                                    <th class="text-center sorting_disabled" style="width: 73px;" rowspan="1" colspan="1" aria-label=""><i class="fa fa-flash"></i>
 </tr>
                            </thead>

                            <tbody>   
                                @foreach($customercares as $key => $customercare)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @if(!empty($customercare->branch))
                                            <td><strong>{{ $customercare->branch }}</strong></td>
                                        @else
                                            <td>-</td>
                                        @endif
                                        
                                        <td><strong>{{ $customercare->profile_id }}</strong></td>
                                        <td><strong>{{ $customercare->name }}</strong></td>
                                        <td><strong>{{ $customercare->email }}</strong></td>
                                        <td><strong>{{ $customercare->phone }}</strong></td>
                                        @if(!empty($customercare->status) && $customercare->status!='0')
                                            <td><span class="label label-danger">PENDING</span></td>
                                        @else
                                            <td><span class="label label-success">ACTIVE</span></td>
                                        @endif
                                        <td class="text-center">
                                                <a href="{{ route('edit.customercare', array('id' => $customercare->id)) }}" data-toggle="modal" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                                <a href="#remove-customercare-{{ $customercare->id }}" data-toggle="modal" title="" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete User"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <div id="remove-customercare-{{ $customercare->id }}" data-id= '{{ $customercare->id }}' class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h3 class="modal-title"><strong>Delete Support</strong></h3>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        Are you sure you want to delete the Support?
                                                    </div>
                                                    <div class="modal-footer">
                                                    <div class="colo-md-4 col-md-offset-5">
                                                        <a href="{{ route('delete.customercare', array('id' => $customercare->id)) }}" class="btn btn-effect-ripple btn-primary pull-left">YES</a>
                                                        <button type="button" class="btn btn-effect-ripple btn-danger pull-left" data-dismiss="modal">NO</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
        </div>
        <!-- END Edit Distributor -->
<!-- END Main Container -->
</div>
<!-- END content -->
@endsection

@section('scripts')

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
    $('#example').DataTable();
</script>
@endsection 