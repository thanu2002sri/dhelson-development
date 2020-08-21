@extends('layouts.app')
@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <style>
         .dataTables_wrapper>div {
            background-color: #ffffff !important;
            border: 0 !important;
            border-top-width: 0 !important;
        }

       div#example_wrapper {
            width: 100% !important;
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
            <div class="col-sm-12">
                <form action="{{ route('create.category') }}" method="post" class="form-horizontal form-bordered">
                    <br>
                    @csrf
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-3" style="margin-top: 10px;text-align: center;">
                            <label class="control-label" for="distr-first-name">Category Names</label>
                        </div>
                        <div class="col-sm-3" style="margin-top: 10px;">
                            <input type="text" required name="name" value="{{ old('name') }}" autocomplete="name" autofocus
                                class="form-control form-field-margin @error('name') is-invalid @enderror"
                                placeholder="Enter Category Name">
                            @error('name')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-sm-2 form-field-margin control-label"  style="margin-top: 3px;">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <hr style="border-bottom: 1px solid #dae0e8;">
            <br>
            <div class="">
               
                <table id="example" class="table table-striped table-bordered table-vcenter display" style="width:100%">
                    <thead>
                        <tr role="row">
                            <th class="text-center text-nowrap">S.No</th>
                            <th class="text-center text-nowrap">Category name</th>
                            <th class="text-center text-nowrap">Status</th>
                            <th class="text-center sorting_disabled" style="width: 73px;" rowspan="1" colspan="1" aria-label=""><i class="fa fa-flash"></i>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($categories as $key => $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            @if ($category->name!=0)
                                <td>Deactive</td>
                            @else
                                <td>Active</td>
                            @endif
                            
                            <td class="text-center">
                                <a href="#edit-category-1" data-toggle="modal" title="Edit" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit Category">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="#remove-category-{{ $loop->iteration }}" data-toggle="modal" title="Delete" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete Category">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>

                        <div id="remove-category-{{ $loop->iteration }}" data-id='{{ $category->id }}' class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h3 class="modal-title text-center"><strong>Delete Category</strong></h3>
                                    </div>
                                    <div class="modal-body text-center">
                                        Are you sure you want to delete the <b style="color: red;">{{ $category->name }}</b> Category?
                                    </div>
                                    <div class="modal-footer">
                                        <div class="colo-md-4 col-md-offset-5">
                                            <a href="{{ route('delete.category', array('id' => $category->id )) }}" class="btn btn-effect-ripple btn-primary pull-left">YES</a>
                                            <button type="button" class="btn btn-effect-ripple btn-danger pull-left" data-dismiss="modal">NO</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="edit-category-{{ $loop->iteration }}" data-id='1' class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <form action="{{ route('update.category') }}" method="post" class="form-horizontal form-bordered">
                                        <br>
                                        @csrf
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h3 class="modal-title text-center"><strong>Edit Category</strong></h3>
                                        </div>
                                        <div class="modal-body text-center">
                                            <div class="form-group">
                                                <div style="margin-top: 10px;">
                                                    <input type="text" required name="updated_name" autocomplete="updated_name" value="{{ $category->name }}" autofocus class="form-control form-field-margin @error('updated_name') is-invalid @enderror" placeholder="Enter Category Name">
                                                    @error('updated_name')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="colo-md-4 col-md-offset-5">
                                                <button type="submit" name="id" value="{{ $category->id }}" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative; height:30px; margin-right:240px">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
        $('#example').DataTable({
            responsive: true
        });
    </script>
@endsection
