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
         <div class="col-md-6">
                <div class="block">
                        <div class="block-title  text-center">
                            <h2>Change Password</h2>
                        </div>
                        <br>
                            <form action="{{ route('agent-reset-password') }}" method="post" class="form-horizontal form-bordered">
                               
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="example-colorpicker2">Old Password</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="password" value="{{ old('old_password') }}" id="example-validation-password" name="old_password" class="form-control ui-wizard-content @error('old_password') is-invalid @enderror" placeholder="Enter old password" autocomplete="password" required aria-required="true">
                                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                        </div>
                                        @error('old_password')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="example-colorpicker3">New Password</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="password" value="{{ old('new_password') }}" id="example-validation-password" name="new_password" class="form-control ui-wizard-content @error('new_password') is-invalid @enderror" placeholder="Enter new password" required aria-required="true">
                                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                        </div>
                                        @error('new_password')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="example-colorpicker4">Confirm password</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="text" id="example-validation-password" value="{{ old('confirm_password') }}" name="confirm_password" class="form-control ui-wizard-content @error('confirm_password') is-invalid @enderror" placeholder="Confirm password" required aria-required="true">
                                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                        </div>
                                        @error('confirm_password')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group form-actions">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;">Update</button>
                                        <button type="reset" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;">Reset</button>
                                    </div>
                                </div>
                                @csrf
                            </form>
                            
                </div>
         </div>
         <div class="col-md-6">
                <div class="block">
                        <div class="block-title text-center">
                            
                            <h2>Change Transaction Pin</h2>
                        </div>
                        <br>
                            <form action="{{ route('agent-reset-pin') }}" method="post" class="form-horizontal form-bordered">
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="example-colorpicker">Old Pin</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="password" value="{{ old('old_pin') }}" id="example-validation-password" name="old_pin" class="form-control ui-wizard-content @error('old_pin') is-invalid @enderror" placeholder="Enter old pin" required aria-required="true">
                                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                        </div>
                                        @error('old_pin')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="example-colorpicker2">New Pin</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="password" value="{{ old('new_pin') }}" id="example-validation-password" name="new_pin" class="form-control ui-wizard-content @error('new_pin') is-invalid @enderror" placeholder="Enter new pin" required="" aria-required="true">
                                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                        </div>
                                        @error('new_pin')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="example-colorpicker3">Confirm Pin</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="text" value="{{ old('confirm_pin') }}" id="example-validation-password" name="confirm_pin" class="form-control ui-wizard-content @error('confirm_pin') is-invalid @enderror" placeholder="Enter confirm pin" required="" aria-required="true">
                                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                        </div>
                                        @error('confirm_pin')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group form-actions">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;">Update</button>
                                        <button type="reset" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;">Reset</button>
                                    </div>
                                </div>
                                @csrf
                            </form>
                </div>
         </div>

            <!-- END Add Agents -->
    <!-- END Main Container -->
    </div>
    <!-- END content -->
@endsection