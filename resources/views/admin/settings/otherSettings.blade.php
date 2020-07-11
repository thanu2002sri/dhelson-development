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
             
             <div class="col-lg-3">
                 
             </div>
                 
             <div class="col-lg-6">
            <div class="block full">
                <div class="block-title" style=" text-align: center; ">
                    <h2>Default Settings</h2>                       
                </div>
  
            <form action="{{ route('set.othersettings') }}" method="post" class="form-horizontal form-control-borderless">
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
                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" id="zopay-commission-id" name="upto_3_months" class="form-control" value="{{$settings->upto_3_months}}" >
                                                    <span class="input-group-addon"><i class="fa fa-percentage"></i></span>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-4 control-label" style=" text-align: center; ">Upto 3 - 6 Months</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" id="zopay-commission-id" name="upto_3_6_months" class="form-control" value="{{$settings->upto_3_6_months}}" >
                                                    <span class="input-group-addon"><i class="fa fa-percentage"></i></span>
                                                </div>                                                
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-4 control-label" style=" text-align: center; ">Upto 6 - 12 Months</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" id="zopay-commission-id" name="upto_6_12_months" class="form-control" value="{{$settings->upto_6_12_months}}" >
                                                    <span class="input-group-addon"><i class="fa fa-percentage"></i></span>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-4 control-label" style=" text-align: center; ">Above 12 Months</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" id="zopay-commission-id" name="above_12_months" class="form-control" value="{{$settings->above_12_months}}" >
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
                 
             <div class="col-lg-3">
                 
             </div>                 
             
             </div>
            
        </div>
         
    <!-- END content -->
@endsection