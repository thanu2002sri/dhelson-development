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
                                            <label class="col-md-4 control-label" style=" text-align: center; ">Current Min Zopay Balance</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->minimum_balance}}" disabled>
                                                    <span class="input-group-addon">AED</span>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-4 control-label" style=" text-align: center; ">Kyc Pending Days</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->kyc_pending_days}}" disabled>
                                                    <span class="input-group-addon">Days</span>
                                                </div>

                                            </div>
                                        </div>
                                    
                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-4 control-label" style=" text-align: center; ">Kyc Pending Amount Limit</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->kyc_pending_amount}}" disabled>
                                                    <span class="input-group-addon">AED</i></span>
                                                </div>

                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-4 control-label" style=" text-align: center; ">Monthly Transaction Limit</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->monthly_txn_limit}}" disabled>
                                                    <span class="input-group-addon">AED</i></span>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-4 control-label" style=" text-align: center; ">KYC Expiry Grace Period</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->after_kyc_expiry_days}}" disabled>
                                                    <span class="input-group-addon">Days</span>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-4 control-label" style=" text-align: center; ">KYC Expiry Notification Limit</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->before_kyc_expiry_days}}" disabled>
                                                    <span class="input-group-addon">Days</span>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-4 control-label" style=" text-align: center; ">Month Start Date</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->month_start_date}}" disabled>
                                                    <span class="input-group-addon"></span>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-4 control-label" style=" text-align: center; ">Month End Date</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                <input type="text" id="user-discount-d" name="example-disabled" class="form-control" placeholder="{{$settings->month_end_date}}" disabled>
                                                    <span class="input-group-addon"></span>
                                                </div>

                                            </div>
                                        </div>
                                    <h4 style="margin: 15px 0;text-align: center;font-weight: 700;">Update </h4>  
                                    
                                      
                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-4 control-label" style=" text-align: center; ">Min Zopay Wallet Balance</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" id="zopay-commission-id" name="minimum_balance" class="form-control" value="{{$settings->minimum_balance}}" >
                                                    <span class="input-group-addon">AED</span>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-4 control-label" style=" text-align: center; ">Kyc Pending Days</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" id="zopay-commission-id" name="kyc_pending_days" class="form-control" value="{{$settings->kyc_pending_days}}" >
                                                    <span class="input-group-addon">Days</span>
                                                </div>                                                
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-4 control-label" style=" text-align: center; ">Kyc Pending Amount Limit</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" id="zopay-commission-id" name="kyc_pending_amount" class="form-control" value="{{$settings->kyc_pending_amount}}" >
                                                    <span class="input-group-addon">AED</span>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-4 control-label" style=" text-align: center; ">Monthly Transaction Amount Limit</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" id="zopay-commission-id" name="monthly_txn_limit" class="form-control" value="{{$settings->monthly_txn_limit}}" >
                                                    <span class="input-group-addon">AED</span>
                                                </div>                                                
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-4 control-label" style=" text-align: center; ">KYC Expiry Grace Period</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" id="zopay-commission-id" name="after_kyc_expiry_days" class="form-control" value="{{$settings->after_kyc_expiry_days}}" >
                                                    <span class="input-group-addon">Days</span>
                                                </div>                                                
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-4 control-label" style=" text-align: center; ">KYC Expiry Notification Limit</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" id="zopay-commission-id" name="before_kyc_expiry_days" class="form-control" value="{{$settings->before_kyc_expiry_days}}" >
                                                    <span class="input-group-addon">Days</span>
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