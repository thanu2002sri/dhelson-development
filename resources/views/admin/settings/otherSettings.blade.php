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

         <!-- Add Agent -->

            
             <div class="row">
                 
             <div class="col-lg-6">
            <div class="block full">
                <div class="block-title" style=" text-align: center; ">
                    <h2>Insured Settings</h2>                       
                </div>
  
            <form action="{{ route('insured.settings') }}" method="post" class="form-horizontal form-control-borderless">
                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-4 control-label" style=" text-align: center; ">Upto 3 Months</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->upto_3_months}}" disabled>
                                                    <span class="input-group-addon"><i class="fa fa-percentage"></i></span>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-4 control-label" style=" text-align: center; ">Upto 3 - 6 Months</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->upto_3_6_months}}" disabled>
                                                    <span class="input-group-addon"><i class="fa fa-percentage"></i></span>
                                                </div>

                                            </div>
                                        </div>
                                    
                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-4 control-label" style=" text-align: center; ">Upto 6 - 12 Months</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->upto_6_12_months}}" disabled>
                                                    <span class="input-group-addon"><i class="fa fa-percentage"></i></i></span>
                                                </div>

                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-4 control-label" style=" text-align: center; ">Above 12 Months</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->above_12_months}}" disabled>
                                                    <span class="input-group-addon"><i class="fa fa-percentage"></i></i></span>
                                                </div>

                                            </div>
                                        </div>

                                 
                                    <h4 style="margin: 15px 0;text-align: center;font-weight: 700;">Update </h4>  
                                    
                                      
                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-4 control-label" style=" text-align: center; ">Upto 3 Months</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" name="upto_3_months" class="form-control" value="{{$settings->upto_3_months}}" >
                                                    <span class="input-group-addon"><i class="fa fa-percentage"></i></span>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-4 control-label" style=" text-align: center; ">Upto 3 - 6 Months</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" name="upto_3_6_months" class="form-control" value="{{$settings->upto_3_6_months}}" >
                                                    <span class="input-group-addon"><i class="fa fa-percentage"></i></span>
                                                </div>                                                
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-4 control-label" style=" text-align: center; ">Upto 6 - 12 Months</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" name="upto_6_12_months" class="form-control" value="{{$settings->upto_6_12_months}}" >
                                                    <span class="input-group-addon"><i class="fa fa-percentage"></i></span>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-4 control-label" style=" text-align: center; ">Above 12 Months</label>
                                            <div class="col-md-4">
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

             <div class="col-lg-6">
                <div class="block full">
                    <div class="block-title" style=" text-align: center; ">
                        <h2>Transit Settings</h2>                       
                    </div>
      
                <form action="{{ route('transit.settings') }}" method="post" class="form-horizontal form-control-borderless">
                                            <div class="form-group">
                                                <label class="col-md-8 control-label" style=" text-align: center; ">Transit Tax</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                    <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->transit_tax}}" disabled>
                                                        <span class="input-group-addon"><i class="fa fa-percentage"></i></span>
                                                    </div>
    
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                
                                                <label class="col-md-8 control-label" style=" text-align: center; ">Quantity - 1 - Weight < 3 Kgs - Price < 1,00,000</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                    <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->transit_priceOne}}" disabled>
                                                        <span class="input-group-addon"><i class="fa fa-inr" aria-hidden="true"></i></i></span>
                                                    </div>
    
                                                </div>
                                            </div>
    
                                            <div class="form-group">
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
                                            </div>
    
                                     
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
    
                                            
                                        <div class="form-group form-actions remove-margin" style=" text-align: center; ">
                                            <button type="submit" class="btn btn-effect-ripple btn-primary" onclick="#">Save</button>
                                        </div>
                                        @csrf
                                    </form>                                               
                
                 </div>

                 </div>
            
        </div>
         
    <!-- END content -->
@endsection