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

             <!-- Add Support -->
             <div class="block full">
                <form action="{{ url('/admin/'.$customercare->id.'/update-customercare') }}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    @csrf 
                <div class="block-title text-center">
                        <h2>Dhelson Express {{ $title }}</h2>    
                        
                        <div class="pull-right" style="padding-right: 40px;padding-top:2px;">
                            <select id="distr-security-question" name="status" value="{{ $customercare->status }}" autocomplete="status" autofocus class="select-select2 @error('status') is-invalid @enderror" style="width: 100%;" data-placeholder="Select Status" required>
                                <option value="">Select Status</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->

                                    @if(!empty($customercare->status) && $customercare->status!="0")
                                        <option value="0">ACTIVE</option>
                                        <option selected="selected" value="1">DEACTIVE</option>
                                    @else
                                        <option selected="selected" value="0">ACTIVE</option>
                                        <option value="1">DEACTIVE</option>
                                    @endif 
                            </select> 
                        </div>
                    </div>
                     
                              <br>
                                <div class="form-group">
                                    <div class="col-sm-2 form-field-margin">
                                            <label class="control-label" for="distr-first-name">Support Name</label>
                                    </div>
                                    <div class="col-sm-5">
                                        
                                        <input type="text" required name="name" value="{{ $customercare->name }}" autocomplete="name" autofocus class="form-control form-field-margin @error('name') is-invalid @enderror" placeholder="Enter Support Name" >
                                        @error('name')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror  
                                    </div>
                                    <div class="col-sm-5 form-field-margin">
                                        <div class="input-group">
                                                <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                                                
                                                <input required type="email" name="email" value="{{ $customercare->email }}" autocomplete="email" autofocus class="form-control @error('email') is-invalid @enderror" placeholder="Enter Support Email" >
                                        </div>
                                        @error('email')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>  
                                     
                                </div>
                            
                            
                            <div class="form-group">
                                    <div class="col-sm-2 form-field-margin">
                                            <label class="control-label">( Pan | Aadhar ) Number</label>
                                    </div>
                                    <div class="col-sm-5 form-field-margin">
                                                
                                        <input type="text" name="pan" value="{{ $customercare->pan }}" autocomplete="pan" autofocus class="form-control @error('pan') is-invalid @enderror" placeholder="Enter Support Pan Card" >
                                        @error('pan')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                
                                    <div class="col-sm-5 form-field-margin">
                                                
                                        <input type="text" name="aadhar" value="{{ $customercare->aadhar }}" autocomplete="aadhar" autofocus class="form-control @error('aadhar') is-invalid @enderror" placeholder="Enter Support Aadhar Number" >
                                        @error('aadhar')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2 form-field-margin">
                                        <label class="control-label">( Pan | Aadhar ) Upload</label>
                                </div>
                            
                            <div class="col-sm-5 form-field-margin">
                                <input type="file" name="aadhar_pic" class="@error('aadhar_pic') is-invalid @enderror" value="{{ $customercare->aadhar_pic }}" autocomplete="aadhar_pic" autofocus >
                                @error('aadhar_pic')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-5 form-field-margin">
                                <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-phone-alt"></i></span>
                                        <input required type="text" name="phone" value="{{ $customercare->phone }}" autocomplete="phone" autofocus class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Support Phone Number" >
                                        @error('phone')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>
                        </div>

                            <div class="form-group">
                                <div class="col-sm-2 form-field-margin">
                                        <label class="control-label">Support Address</label>
                                </div>
                            <div class="col-sm-10 form-field-margin">
                                <textarea required autofocus value="{{ $customercare->address }}" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Support Address"  name="address" rows="4">{{ $customercare->address }}</textarea>
                                @error('address')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label style=" margin-top: 12px; " class="col-md-2 control-label" for="example-datepicker">Support Pincode</label>
                            <div class="col-sm-5" style=" margin-top: 12px; ">
                                    <input required minlength="6" maxlength="6" pattern="[0-9]*" type="text" name="pincode" value="{{ $customercare->pincode }}" autocomplete="pincode" autofocus class="form-control @error('pincode') is-invalid @enderror" placeholder="Enter Support Pincode" >
                                    @error('pincode')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="col-sm-5" style=" margin-top: 12px; ">
                                <input required type="text" name="city" value="{{ $customercare->city }}" autocomplete="city" autofocus class="form-control @error('city') is-invalid @enderror" placeholder="Enter Support City" >
                                @error('city')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                            
                    </div>
                    <div class="form-group">
                            <label style=" margin-top: 12px; " class="col-md-2 control-label" for="example-datepicker">Support State</label>
                            <div class="col-sm-5" style=" margin-top: 12px; ">
                                
                                    <input required type="text" name="state" value="{{ $customercare->state }}" autocomplete="state" autofocus class="form-control @error('state') is-invalid @enderror" placeholder="Enter Support State" >
                                    @error('state')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="col-sm-5" style=" margin-top: 12px; ">
                            
                                <input required type="text" name="country" value="{{ $customercare->country }}" autocomplete="country" autofocus class="form-control @error('country') is-invalid @enderror" placeholder="Enter Support Country" >
                                @error('country')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>

                    
                    <div class="form-group form-actions">
                        <div class="col-sm-7 col-sm-offset-5">
                                <button type="submit" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;">Submit</button>
                                <button type="reset" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;">Reset</button>
                        </div>
                </div>
</div>
            </form>
        <!-- END Add Supports -->
<!-- END Main Container -->
</div>
<!-- END content -->
@endsection