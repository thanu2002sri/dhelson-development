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

        <!-- Add Distributor -->
        <div class="block full">
            <div class="block-title">
                <h2>Edit User</h2>                       
            </div>
            <fieldset disabled="disabled">

            <form action="{{ route('update.user') }}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                {{-- <div class="form-group">
                        <label class="col-md-2 form-field-margin control-label" for="example-select2">User Type</label>
                        <div class="col-md-5 form-field-margin">
                            <select id="distr-security-question" name="user_type" value="{{ old('user_type') }}" autocomplete="user_type" autofocus class="select-select2 @error('user_type') is-invalid @enderror" style="width: 100%;" data-placeholder="Select User Type" required>
                                <option value="">Please select User</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                <option value="admin">Admin</option>
                                <option value="distributor">Distributor</option>
                                <option value="agent">Agent</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        @error('user_type')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                   </div>  --}}
                    
                    <div class="form-group">
                        <div class="col-sm-2 form-field-margin">
                                <label class="control-label">User Name</label>
                        </div>
                            
                        <div class="col-sm-5 form-field-margin">
                            
                            <input type="text" name="name" value="{{ $user->name }}" autocomplete="name" autofocus class="form-control @error('name') is-invalid @enderror" placeholder="Enter User Name" required>
                        </div>
                        @error('name')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                            <div class="col-sm-2 form-field-margin">
                                    <label class="control-label" for="distr-first-name">Phone Number</label>
                            </div>
                        <div class="col-sm-5 form-field-margin">
                            <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-phone-alt"></i></span>
                                    <input type="text" name="phone" value="{{ $user->phone }}" autocomplete="phone" autofocus class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Distributor Phone Number" required>
                            </div>
                            @error('phone')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                            <div class="col-sm-2 form-field-margin">
                            <label class="control-label" for="distr-first-name">Email</label>
                            </div>
                        <div class="col-sm-5 form-field-margin">
                            <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                                    <input type="email" name="email" value="{{ $user->email }}" autocomplete="email" autofocus class="form-control @error('email') is-invalid @enderror" placeholder="Enter Distributor Email" required>
                            </div>
                            @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                            <label class="col-md-2 form-field-margin control-label" for="example-select2">Security Question</label>
                            <div class="col-md-5 form-field-margin">
                                <select id="distr-security-question" name="security_question" value="{{ json_decode($user->extras)->security_details->security_question }}" autocomplete="security_question" autofocus class="select-select2 @error('security_question') is-invalid @enderror" style="width: 100%;" data-placeholder="Select Security Question" required>
                                    <option value=""></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    
                                    <option {{ json_decode($user->extras)->security_details->security_question=='What is your favourite colour?' ? "selected" : "" }} value="What is your favourite colour?">What is your favourite colour?</option>
                                    <option {{ json_decode($user->extras)->security_details->security_question=='What is your pet number?' ? "selected" : "" }} value="What is your pet name?">What is your pet name?</option>
                                    <option {{ json_decode($user->extras)->security_details->security_question=='What is your lucky number?' ? "selected" : "" }} value="What is your lucky number?">What is your lucky number?</option>
                                    <option {{ json_decode($user->extras)->security_details->security_question=='What is your first school name?' ? "selected" : "" }} value="What is your first school name?">What is your first school name?</option>
                                </select>
                            </div>
                            @error('security_question')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 form-field-margin">
                                <label class="control-label">Security Answer</label>
                        </div>
                        <div class="col-sm-5 form-field-margin">
                            <input type="text" name="security_answer" value="{{ json_decode($user->extras)->security_details->security_answer }}" autocomplete="security_answer" autofocus class="form-control @error('security_answer') is-invalid @enderror" placeholder="Enter Security Answer" required>
                        </div>   
                        @error('security_answer')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- <div class="form-group">
                            <label style=" margin-top: 12px; " class="col-md-2 control-label" for="example-chosen-multiple">Select Services</label>
                            <div class="col-md-5" style=" margin-top: 12px;" >
                                <select id="dist-services" name="dist-services" class="select-chosen" data-placeholder="Select Services" style="width: 250px;" multiple>
                                    <option value="United States">E-Recharge</option>
                                    <option value="United Kingdom">KYC Validation</option>
                                    <option value="Afghanistan">Add Agents</option>
                                </select>
                            </div>
                        </div> -->                        
                        
                       
                    <div class="form-group">

                        <div class="col-sm-2 form-field-margin">
                                <label class="control-label" for="distr-kyc-files">KYC Upload</label>
                    </div>
                            <div class="col-sm-6 form-field-margin">
                                    
                                    <input type="file" name="kyc_file" class="@error('kyc_file') is-invalid @enderror" value="{{ json_decode($user->extras)->kyc_details->kyc_file }}" autocomplete="kyc_file" autofocus>
                                    @error('kyc_file')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror  
                            </div>
                    </div>
                    <div class="form-group form-actions">
                            <div class="col-sm-9 col-sm-offset-2">
                                    <button type="submit" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;">Update</button>
                                    <button type="reset" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;">Reset</button>
                            </div>
                    </div>
                    @csrf
                </form>
            </fieldset>
        </div>
    <!-- END Add Distributors -->
</div>
<!-- END content -->
@endsection