@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
    <style>
        .dataTables_wrapper>div {
           background-color: #ffffff !important;
           border: 0 !important;
           border-top-width: 0 !important;
       }

      div#example_wrapper {
           width: auto !important;
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
            <br>
            <form action="{{ route('create.sub.category') }}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-sm-offset-2" style=" margin-top: 12px; ">
                            <select id="distr-security-question" name="category" value="{{ old('category') }}" autocomplete="category" autofocus class="form-control select-select2 @error('category') is-invalid @enderror" style="width: 100%;" data-placeholder="Select Category" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $key => $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                            </select>
                        </div>
                        <div class="col-sm-3" style=" margin-top: 12px; form-field-margin control-label">
                            <input type="text" name="name" value="{{ old('name') }}" autocomplete="name" autofocus class="form-control @error('name') is-invalid @enderror" placeholder="Enter Subcategory" required>
                            @error('name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-2" style=" margin-top: 12px; form-field-margin control-label">
                            <button type="submit" class="btn btn-effect-ripple btn-primary">Submit</button required>
                        </div>
                    </div>
                </div>
            </form>
                <div class="">
                    <table id="example" class="table table-striped table-bordered table-vcenter display" style="width:100%">
                        <thead>
                            <tr role="row">
                                <th class="text-center text-nowrap">S.No</th>
                                <th class="text-center text-nowrap">Category</th>
                                <th class="text-center text-nowrap">Subcategory</th>
                                <th class="text-center text-nowrap">Status</th>
                                <th class="text-center sorting_disabled" style="width: 73px;" rowspan="1" colspan="1" aria-label=""><i class="fa fa-flash"></i>
</tr>
                        </thead>

                        <tbody>
                            @foreach ($subcategories as $key => $subcategy)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>Active</td>
                                    <td class="text-center">
                                        <a href="#edit-customercare-1" data-toggle="modal" title=""
                                            class="btn btn-effect-ripple btn-xs btn-success"
                                            style="overflow: hidden; position: relative;" data-original-title="Edit User"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="#remove-customercare-1" data-toggle="modal" title=""
                                            class="btn btn-effect-ripple btn-xs btn-danger"
                                            style="overflow: hidden; position: relative;"
                                            data-original-title="Delete User"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            <div id="remove-customercare-1" data-id='1' class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h3 class="modal-title" style="text-align:center;"><strong>Delete Support</strong></h3>
                                        </div>
                                        <div class="modal-body text-center">
                                            Are you sure you want to delete the Support?
                                        </div>
                                        <div class="modal-footer">
                                            <div class="colo-md-4 col-md-offset-5">
                                                <a href="{{ route('delete.customercare', ['id' => 1]) }}" class="btn btn-effect-ripple btn-primary pull-left">YES</a>
                                                <button type="button" class="btn btn-effect-ripple btn-danger pull-left" data-dismiss="modal">NO</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="edit-customercare-1" data-id='1' class="modal" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h3 class="modal-title"><strong>Edit Category</strong></h3>
                                        </div>
                                        <div class="modal-body text-center">
                                            <label for="fname"></label>
                                            <input type="text" id="fname" name="fname" placeholder="enter category" style="margin-left:20px; padding-left:20px; text-align: start; padding-left:1px">
                                        </div>
                                        <div class="modal-footer">
                                            <div class="colo-md-4 col-md-offset-5">
                                                <button type="reset" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative; height:30px; margin-right:240px">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tbody>
                    </table>
                </div>
</div>
    </div>

    <!-- END Edit Distributor -->
    <!-- END Main Container -->
    </div>
    <!-- END content -->
@endsection

@section('scripts')

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script>
        $('#example').DataTable();
    </script>
@endsection
