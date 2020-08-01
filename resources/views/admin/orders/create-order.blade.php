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

             <!-- Add Incharge -->
             <div class="block full">
                <div class="block-title text-center">
                        <h2>Dhelson Express - {{ $title }}</h2>                        
                    </div>
                    <form action="{{ route('create.incharge') }}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                        @csrf  
                              <br>
                                <div class="form-group">
                                    <div class="col-sm-2 form-field-margin">
                                            <label class="control-label" for="distr-first-name">Incharge Name</label>
                                    </div>
                                    <div class="col-sm-5">
                                        
                                        <input type="text" required name="name" value="{{ old('name') }}" autocomplete="name" autofocus class="form-control form-field-margin @error('name') is-invalid @enderror" placeholder="Enter Incharge Name" >
                                        @error('name')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror  
                                    </div>
                                    <div class="col-sm-5 form-field-margin">
                                        <div class="input-group">
                                                <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                                                
                                                <input required type="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus class="form-control @error('email') is-invalid @enderror" placeholder="Enter Incharge Email" >
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
                                                
                                        <input type="text" name="pan" value="{{ old('pan') }}" autocomplete="pan" autofocus class="form-control @error('pan') is-invalid @enderror" placeholder="Enter Incharge Pan Card" >
                                        @error('pan')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                
                                    <div class="col-sm-5 form-field-margin">
                                                
                                        <input type="text" name="aadhar" value="{{ old('aadhar') }}" autocomplete="aadhar" autofocus class="form-control @error('aadhar') is-invalid @enderror" placeholder="Enter Incharge Aadhar Number" >
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
                                <input required type="file" name="aadhar_pic" class="@error('aadhar_pic') is-invalid @enderror" value="{{ old('aadhar_pic') }}" autocomplete="aadhar_pic" autofocus >
                                @error('aadhar_pic')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-5 form-field-margin">
                                <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-phone-alt"></i></span>
                                        <input required type="text" name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Incharge Phone Number" >
                                        @error('phone')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                         
                            <div class="form-group">
                                <label style=" margin-top: 12px; " class="col-md-2 control-label" for="example-datepicker">Incharge Login Password</label>
                                <div class="col-sm-5" style=" margin-top: 12px; ">
                                        <input required type="password" name="password" value="{{ old('password') }}" autocomplete="password" autofocus class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" >
                                        @error('password')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-sm-5" style=" margin-top: 12px; ">
                                    <input required type="text" name="password_confirmation" value="{{ old('password_confirmation') }}" autocomplete="password_confirmation" autofocus class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Enter Confirm Password" >
                                    @error('password_confirmation')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                            </div>
                        

                            <div class="form-group">
                                <div class="col-sm-2 form-field-margin">
                                        <label class="control-label">Incharge Address</label>
                                </div>
                            <div class="col-sm-10 form-field-margin">
                                <textarea required autofocus value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Incharge Address"  name="address" rows="4"></textarea>
                                @error('address')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label style=" margin-top: 12px; " class="col-md-2 control-label" for="example-datepicker">Incharge Pincode</label>
                            <div class="col-sm-5" style=" margin-top: 12px; ">
                                    <input required minlength="6" maxlength="6" pattern="[0-9]*" type="text" name="pincode" value="{{ old('pincode') }}" autocomplete="pincode" autofocus class="form-control @error('pincode') is-invalid @enderror" placeholder="Enter Incharge Pincode" >
                                    @error('pincode')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="col-sm-5" style=" margin-top: 12px; ">
                                <input required type="text" name="city" value="{{ old('city') }}" autocomplete="city" autofocus class="form-control @error('city') is-invalid @enderror" placeholder="Enter Incharge City" >
                                @error('city')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                            
                    </div>
                    <div class="form-group">
                            <label style=" margin-top: 12px; " class="col-md-2 control-label" for="example-datepicker">Incharge State</label>
                            <div class="col-sm-5" style=" margin-top: 12px; ">
                                
                                    <input required type="text" name="state" value="{{ old('state') }}" autocomplete="state" autofocus class="form-control @error('state') is-invalid @enderror" placeholder="Enter Incharge State" >
                                    @error('state')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="col-sm-5" style=" margin-top: 12px; ">
                            
                                <input required type="text" name="country" value="{{ old('country') }}" autocomplete="country" autofocus class="form-control @error('country') is-invalid @enderror" placeholder="Enter Incharge Country" >
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
                           
                        </form>
            </div>
         
        <!-- END Add Incharges -->
<!-- END Main Container -->
</div>
<!-- END content -->
@endsection