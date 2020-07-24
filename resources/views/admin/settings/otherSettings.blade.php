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

div#example_wrapper {
    width: auto !important;
}
.select2-results__option[aria-selected] {
    width: max-content;
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

         <!-- Add Agent -->

            
             <div class="row">
                 
             <div class="col-lg-4">
            <div class="block full">
                <div class="block-title" style=" text-align: center; ">
                    <h2>Insured Settings</h2>                       
                </div>
  
            <form action="{{ route('insured.settings') }}" method="post" class="form-horizontal form-control-borderless">
                                        <div class="form-group">
                                            <label class="col-md-6 control-label" style=" text-align: center; ">Upto 3 Months</label>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->upto_3_months}}" disabled>
                                                    <span class="input-group-addon"><i class="fa fa-percentage"></i></span>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-6 control-label" style=" text-align: center; ">Upto 3 - 6 Months</label>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->upto_3_6_months}}" disabled>
                                                    <span class="input-group-addon"><i class="fa fa-percentage"></i></span>
                                                </div>

                                            </div>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label class="col-md-6 control-label" style=" text-align: center; ">Upto 6 - 12 Months</label>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->upto_6_12_months}}" disabled>
                                                    <span class="input-group-addon"><i class="fa fa-percentage"></i></i></span>
                                                </div>

                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="col-md-6 control-label" style=" text-align: center; ">Above 12 Months</label>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->above_12_months}}" disabled>
                                                    <span class="input-group-addon"><i class="fa fa-percentage"></i></i></span>
                                                </div>

                                            </div>
                                        </div>

                                 
                                    <h4 style="margin: 15px 0;text-align: center;font-weight: 700;">Update </h4>  
                                    
                                      
                                        <div class="form-group">
                                            <label class="col-md-6 control-label" style=" text-align: center; ">Upto 3 Months</label>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" name="upto_3_months" class="form-control" value="{{$settings->upto_3_months}}" >
                                                    <span class="input-group-addon"><i class="fa fa-percentage"></i></span>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label" style=" text-align: center; ">Upto 3 - 6 Months</label>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" name="upto_3_6_months" class="form-control" value="{{$settings->upto_3_6_months}}" >
                                                    <span class="input-group-addon"><i class="fa fa-percentage"></i></span>
                                                </div>                                                
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-6 control-label" style=" text-align: center; ">Upto 6 - 12 Months</label>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" name="upto_6_12_months" class="form-control" value="{{$settings->upto_6_12_months}}" >
                                                    <span class="input-group-addon"><i class="fa fa-percentage"></i></span>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label" style=" text-align: center; ">Above 12 Months</label>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" name="above_12_months" class="form-control" value="{{$settings->above_12_months}}" >
                                                    <span class="input-group-addon"><i class="fa fa-percentage"></i></span>
                                                </div>                                                
                                            </div>
                                        </div>

                                        
                                    <div class="form-group form-actions remove-margin" style=" text-align: center; ">
                                        <button type="submit" class="btn btn-effect-ripple btn-primary" onclick="#">Save</button>
                                    </div>
                                    @csrf
                                </form>                                               
            
             </div>
                 
                              
             
             </div>

             <div class="col-lg-8">
                <div class="block full">
                    <div class="block-title" style=" text-align: center; ">
                        <h2>Transit Settings</h2>                       
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered table-vcenter display" style="width:100%">
                                <thead>
                                    <tr role="row">
                                        <th class="text-center text-nowrap">SI</th>
                                        <th class="text-center text-nowrap">Quantity</th>
                                        <th class="text-center text-nowrap">Weight</th>
                                        <th class="text-center text-nowrap">Unit Price</th>
                                        <th class="text-center text-nowrap">Transit Amount</th>

                                    </tr>
                                </thead>
                                <tbody>   
                                    <tr>
                                        <td>1</td>
                                        <td><strong>2</strong></td>
                                        <td><strong>< 3 Kgs</strong></td>
                                        <td><strong><i class="fa fa-inr" aria-hidden="true"></i> 100000</strong></td>
                                        <td><i class="fa fa-inr" aria-hidden="true"></i> <strong>150</strong></td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                    <hr>
                    <h4 style="margin: 15px 0;text-align: center;font-weight: 700;">Update Transit Settings</h4>  
                    <br>
                <form action="{{ route('transit.settings') }}" method="post" class="form-horizontal form-control-borderless">
                                            {{-- <div class="form-group">
                                                <label class="col-md-8 control-label" style=" text-align: center; ">Transit Tax</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                    <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->transit_tax}}" disabled>
                                                        <span class="input-group-addon"><i class="fa fa-percentage"></i></span>
                                                    </div>
    
                                                </div>
                                            </div> --}}

                                            <div class="form-group">
                                                
                                                <div class="col-md-3">
                                                    <select id="distr-security-question" name="agent_id" value="{{ old('agent_id') }}" autocomplete="agent_id" autofocus class="form-control select-select2 @error('agent_id') is-invalid @enderror" style="width: 100%;" data-placeholder="Select Quantity" required>
                                                        <option value="">Select Quantity</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                    </select>
                                                    @error('agent_id')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-3">
                                                    <select id="distr-security-question" name="agent_id" value="{{ old('agent_id') }}" autocomplete="agent_id" autofocus class="form-control select-select2 @error('agent_id') is-invalid @enderror" style="width: 100%;" data-placeholder="Select Weight" required>
                                                        <option value="">Select Weight</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                        <option value="1">Less than 3 Kgs</option>
                                                        <option value="1">3 - 6 Kgs</option>
                                                        <option value="1">6 - 12 Kgs</option>
                                                        <option value="1">Greater than 12 Kgs</option>
                                                    </select>
                                                    @error('agent_id')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-3">
                                                    <select id="distr-security-question" name="agent_id" value="{{ old('agent_id') }}" autocomplete="agent_id" autofocus class="form-control select-select2 @error('agent_id') is-invalid @enderror" style="width: 100%;" data-placeholder="Select Unit Price" required>
                                                        <option value="">Select Unit Price</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000 - &#8377; 2,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                        <option value="100000">&#8377; 1,00,000</option>
                                                    </select>
                                                    @error('agent_id')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="input-group">
                                                        <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->transit_priceOne}}" disabled>
                                                            <span class="input-group-addon"><i class="fa fa-inr" aria-hidden="true"></i></i></span>
                                                    </div>
                                                </div>

                                                {{-- <label class="col-md-8 control-label" style=" text-align: center; ">Quantity - 1 - Weight < 3 Kgs - Price < 1,00,000</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                    <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->transit_priceOne}}" disabled>
                                                        <span class="input-group-addon"><i class="fa fa-inr" aria-hidden="true"></i></i></span>
                                                    </div>
    
                                                </div>
                                            </div> --}}
    
                                           {{--  <div class="form-group">
                                                <label class="col-md-8 control-label" style=" text-align: center; ">Quantity - 1 - Weight 3 - 6 Kgs - Price < 1,00,000</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                    <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->transit_priceTwo}}" disabled>
                                                        <span class="input-group-addon"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                                    </div>
    
                                                </div>
                                            </div>
                                        
                                           
                                            <div class="form-group">
                                                <label class="col-md-8 control-label" style=" text-align: center; ">Quantity - 1 - Weight < 6 Kgs - Price < 2,00,000</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                    <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->transit_priceThree}}" disabled>
                                                        <span class="input-group-addon"><i class="fa fa-inr" aria-hidden="true"></i></i></span>
                                                    </div>
    
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-8 control-label" style=" text-align: center; ">Quantity - 2 - Weight < 6 Kgs - Price < 2,00,000</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                    <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->transit_priceFour}}" disabled>
                                                        <span class="input-group-addon"><i class="fa fa-inr" aria-hidden="true"></i></i></span>
                                                    </div>
    
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-8 control-label" style=" text-align: center; ">Quantity - 2 - Weight < 6 Kgs - Price < 4,00,000</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                    <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->transit_priceFive}}" disabled>
                                                        <span class="input-group-addon"><i class="fa fa-inr" aria-hidden="true"></i></i></span>
                                                    </div>
    
                                                </div>
                                            </div> --}}
    
                                     {{-- 
                                        <h4 style="margin: 15px 0;text-align: center;font-weight: 700;">Update </h4>  
                                        
                                          
                                            <div class="form-group">
                                                <label class="col-md-8 control-label" style=" text-align: center; ">Transit Tax</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                    <input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" name="transit_tax" class="form-control" value="{{$settings->transit_tax}}" >
                                                        <span class="input-group-addon"><i class="fa fa-percentage"></i></span>
                                                    </div>                                                
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-8 control-label" style=" text-align: center; ">Quantity - 1 - Weight < 3 Kgs - Price < 1,00,000</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                    <input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" name="transit_priceOne" class="form-control" value="{{$settings->transit_priceOne}}" >
                                                        <span class="input-group-addon"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                                    </div>                                                
                                                </div>
                                            </div>
    
                                            <div class="form-group">
                                                <label class="col-md-8 control-label" style=" text-align: center; ">Quantity - 1 - Weight 3 - 6 Kgs - Price < 1,00,000</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                    <input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" name="transit_priceTwo" class="form-control" value="{{$settings->transit_priceTwo}}" >
                                                        <span class="input-group-addon"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                                    </div>                                                
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-8 control-label" style=" text-align: center; ">Quantity - 1 - Weight < 6 Kgs - Price < 2,00,000</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                    <input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" name="transit_priceThree" class="form-control" value="{{$settings->transit_priceThree}}" >
                                                        <span class="input-group-addon"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                                    </div>                                                
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-8 control-label" style=" text-align: center; ">Quantity - 2 - Weight < 6 Kgs - Price < 2,00,000</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                    <input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" name="transit_priceFour" class="form-control" value="{{$settings->transit_priceFour}}" >
                                                        <span class="input-group-addon"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                                    </div>                                                
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-8 control-label" style=" text-align: center; ">Quantity - 2 - Weight < 6 Kgs - Price < 4,00,000</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                    <input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" name="transit_priceFive" class="form-control" value="{{$settings->transit_priceFive}}" >
                                                        <span class="input-group-addon"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                                    </div>                                                
                                                </div>
                                            </div>
     --}}
                                            
                                        <div class="form-group form-actions remove-margin" style=" text-align: center; ">
                                            <br>
                                            <button type="submit" class="btn btn-effect-ripple btn-primary" onclick="#">Save</button>
                                        </div>
                                        @csrf
                                    </form>                                               
                
                 </div>

                 </div>
            
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