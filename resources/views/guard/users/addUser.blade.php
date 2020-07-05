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
             <div class="block full">
                    <div class="block-title">
                        <h2>Add User</h2>                       
                    </div>
                    <form action="{{ route('create.user') }}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                 
                                <div class="form-group">
                                    <div class="col-sm-2 form-field-margin">
                                            <label class="control-label" for="distr-first-name">Name of the User</label>
                                    </div>
                                    <div class="col-sm-5">
                                        
                                        <input type="text" maxlength="25" name="name" value="{{ old('name') }}" autocomplete="name" autofocus class="form-control form-field-margin @error('name') is-invalid @enderror" placeholder="Enter User Name" required>
                                        
                                    </div>  
                                    @error('agent_name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>
                            
                            <div class="form-group">
                                    <div class="col-sm-2 form-field-margin">
                                            <label class="control-label">Phone Number</label>
                                    </div>
                                <div class="col-sm-5 form-field-margin">
                                    <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-phone-alt"></i></span>
                                            <input type="text" name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus class="form-control @error('phone') is-invalid @enderror" placeholder="Enter User Phone Number" required>
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
                                            <label class="control-label">Email</label>
                                    </div>
                                <div class="col-sm-5 form-field-margin">
                                    <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                                            
                                            <input type="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus class="form-control @error('email') is-invalid @enderror" placeholder="Enter User Email" required>
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
                                        
                                        <select id="distr-security-question" name="security_question" style="width: 100%;" value="{{ old('security_question') }}" autocomplete="security_question" autofocus class="select-select2 @error('security_question') is-invalid @enderror" style="width: 100%;" data-placeholder="Select Security Question" required>

                                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            <option value="What is your favourite colour?">What is your favourite colour?</option>
                                            <option value="What is your pet name?">What is your pet name?</option>
                                            <option value="What is your lucky number?">What is your lucky number?</option>
                                            <option value="What is your first school name?">What is your first school name?</option>
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
                                                
                                                         <input type="text" name="security_answer" value="{{ old('security_answer') }}" autocomplete="security_answer" autofocus class="form-control @error('security_answer') is-invalid @enderror" placeholder="Enter Security Answer" required>
                                                     </div>   
                                                     @error('security_answer')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label style=" margin-top: 12px; " class="col-md-2 control-label" for="example-datepicker">Login Password</label>
                                        <div class="col-sm-5" style=" margin-top: 12px; ">
                                                <input type="password" name="password" value="{{ old('password') }}" autocomplete="password" autofocus class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" required>
                                                @error('password')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="col-sm-5" style=" margin-top: 12px; ">
                                            <input type="text" name="password_confirmation" value="{{ old('password_confirmation') }}" autocomplete="password_confirmation" autofocus class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Enter Confirm Password" required>
                                            @error('password_confirmation')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                        
                                </div>
                                <div class="form-group">
                                        <label style=" margin-top: 12px; " class="col-md-2 control-label" for="example-datepicker">Transaction PIN</label>
                                        <div class="col-sm-5" style=" margin-top: 12px; ">
                                            
                                                <input type="password" name="transaction_pin" value="{{ old('transaction_pin') }}" autocomplete="transaction_pin" autofocus class="form-control @error('transaction_pin') is-invalid @enderror" placeholder="Enter Transaction PIN" required>
                                                @error('transaction_pin')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="col-sm-5" style=" margin-top: 12px; ">
                                        
                                            <input type="text" name="confirm_transaction_pin" value="{{ old('confirm_transaction_pin') }}" autocomplete="confirm_transaction_pin" autofocus class="form-control @error('confirm_transaction_pin') is-invalid @enderror" placeholder="Enter Confirm Transaction PIN" required>
                                            @error('confirm_transaction_pin')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div style=" margin-top: 12px; " class="col-sm-4 form-field-margin">
                                                    <label class="control-label">KYC ID</label>
                                                </div>
                                                    <div style=" margin-top: 12px; " class="col-sm-8 form-field-margin">
                                                
                                                        <input type="text" maxlength="15" name="kyc_id" value="{{ old('kyc_id') }}" autocomplete="kyc_id" autofocus class="form-control @error('kyc_id') is-invalid @enderror" placeholder="Enter KYC ID" required>
                                                        @error('kyc_id')
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                      
                                                    </div>   
                                                   
                                            </div>
                                            <div class="col-md-6">
                                                    <div style=" margin-top: 12px; " class="col-sm-4 form-field-margin">
                                                         <label class="control-label">KYC Expiry Date</label>
                                                    </div>
                                                         <div style=" margin-top: 12px; " class="col-sm-8 form-field-margin">
                                                    
                                                             <input type="text" id="kyc_expiry_date" name="kyc_expiry_date" value="{{ old('kyc_expiry_date') }}" autocomplete="kyc_expiry_date" autofocus class="form-control input-datepicker @error('kyc_expiry_date') is-invalid @enderror" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
                                                             @error('kyc_expiry_date')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                         </div>   
                                                         
                                                    </div>
                                            </div>
                                    </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <div style=" margin-top: 12px; " class="col-sm-4 form-field-margin">
                                                <label class="control-label">KYC Upload Front</label>
                                        </div>
                                        <div style=" margin-top: 12px; " class="col-sm-8 form-field-margin">
                                                <input type="file" name="kyc_file_front" class="@error('kyc_file_front') is-invalid @enderror" value="{{ old('kyc_file_front') }}" autocomplete="kyc_file_front" autofocus required>
                                                @error('kyc_file_front')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <br>
                                                <span class="text-danger" role="alert">
                                                    <strong><u>Note:</u> File Size should be below 2MB and only JPEG | PNG | JPG are allowed.</strong>
                                                </span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div style=" margin-top: 12px; " class="col-sm-4 form-field-margin">
                                                <label class="control-label">KYC Upload Back</label>
                                        </div>
                                        <div style=" margin-top: 12px; " class="col-sm-8 form-field-margin">
                                                <input type="file" name="kyc_file_back" class="@error('kyc_file_back') is-invalid @enderror" value="{{ old('kyc_file_back') }}" autocomplete="kyc_file_back" autofocus required>
                                                @error('kyc_file_back')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <br>
                                                <span class="text-danger" role="alert">
                                                    <strong><u>Note:</u> File Size should be below 2MB and only JPEG | PNG | JPG are allowed.</strong>
                                                </span>
                                        </div>
                                    </div>
                                 </div>
                                        
                            <div class="form-group form-actions">
                                    <div class="col-sm-9 col-sm-offset-2">
                                            <button type="submit" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;">Submit</button>
                                            <button type="reset" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;">Reset</button>
                                    </div>
                            </div>
                            @csrf
                        </form>
            </div>
         
        <!-- END Add Agents -->
<!-- END Main Container -->
</div>
<!-- END content -->
@endsection