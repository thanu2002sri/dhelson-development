@extends('layouts.app')
@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
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
                               <div>
                                   <div class="table-responsive">
                                   <table id="example" class="table table-striped table-bordered table-vcenter display">
                               <thead>                              
                                <tr role="row">
                                    <th class="text-center text-nowrap">S.No</th>
                                    <th class="text-center text-nowrap">Category</th>
                                    <th class="text-center text-nowrap">Subcategory</th>
                                    <th class="text-center text-nowrap">Quantity</th>
                                    <th class="text-center text-nowrap">Weight</th>
                                    <th class="text-center text-nowrap">Price</th>
                                    <th class="text-center text-nowrap">Distance</th>
                                    <th class="text-center text-nowrap">Transit Amount</th>
                                    <th class="text-center text-nowrap">Transit Tax</th>
                                    <th class="text-center text-nowrap">Status</th>
                                    
                                    <th class="text-center sorting_disabled" style="width: 73px;" rowspan="1" colspan="1" aria-label=""><i class="fa fa-flash"></i>
                                </tr>
                               </thead>


                              <tbody>   
                                
                                    <tr>
                                        <td>1</td>
                                        <td>Gold</td>
                                        <td>Ring</td>
                                        <td>1</td>
                                        <td>60</td>
                                        <td>25000</td>
                                        <td>50</td>
                                        <td>567</td>
                                        <td>235</td>
                                        <td>Active</td>
                                        <td class="text-center">
                                                <a href="#edit-customercare-1" data-toggle="modal" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                                <a href="#remove-customercare-1" data-toggle="modal" title="" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete User"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td>1</td>
                                        <td>Gold</td>
                                        <td>Ring</td>
                                        <td>1</td>
                                        <td>60</td>
                                        <td>25000</td>
                                        <td>50</td>
                                        <td>567</td>
                                        <td>235</td>
                                        <td>Active</td>
                                        
                                        <td class="text-center">
                                                <a href="#edit-customercare-1" data-toggle="modal" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                                <a href="#remove-customercare-1" data-toggle="modal" title="" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete User"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    
                                    <div id="remove-customercare-1" data-id= '1' class="modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                        <a href="{{ route('delete.customercare', array('id' => 1)) }}" class="btn btn-effect-ripple btn-primary pull-left">YES</a>
                                                        <button type="button" class="btn btn-effect-ripple btn-danger pull-left" data-dismiss="modal">NO</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="edit-customercare-1" data-id= '1' class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h3 class="modal-title" style="text-align:center;"><strong>Edit Category</strong></h3>
                                                    </div>
                    <div class="modal-body text-center">
                        <div class="form-group">
                                <div class="col-sm-2 form-field-margin">
                                        <label class="control-label">Description:</label>
                                </div>
                            <div class="col-sm-10 form-field-margin">
                                <textarea required autofocus value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror" placeholder="Description"  name="address" rows="4"></textarea>
                                @error('address')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-8">
                            <canvas id="signature" height="100" style="border: 2px dashed grey;width:-webkit-fill-available;"></canvas>
                            <br>
                            
                            <label class="control-label">Consigner Signature</label>
                            <button type="button" class="btn btn-success pull-right" id="clear-signature">Clear</button>
                        </div>
                        
                        {{-- <button type="button" class="btn btn-success" id="btn-save">Save</button> --}}
                        <input type="hidden" id="signature" name="signature">
                        <input type="hidden" name="signaturesubmit" value="1">
                    </div>
                        </div>
                    </div>
                                <div class="modal-footer">
                                             <div class="colo-md-4">
                                                <div class="col-sm-2" style=" margin-top: 12px; margin-left: 230px" form-field-margin control-label">
                                                     <button type="submit" class="btn btn-effect-ripple btn-primary">Submit</button required>
                                                </div>
                                            </div>
                                </div>
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
            </div>
                               
                </form>
            
           

                                    
                                            
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