@extends('welcome')

@section('content')
    <!-- Login Title -->
    <div class="block-title">
        <div class="block-options pull-right">
            <a href="reset_password.html" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip" data-placement="left" title="Reset password"><i class="fas fa-user-edit"></i></a>
        </div>
        <h2>Agent Login</h2>
    </div>
    <!-- END Login Title -->
    
    <!-- Login Form -->
    <form id="form-login" action="index.html" method="post" class="form-horizontal">
        <div class="form-group">
            <div class="col-xs-12">
                <input type="text" id="login-email" name="login-email" class="form-control" placeholder="Your email..">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <input type="password" id="login-password" name="login-password" class="form-control" placeholder="Your password..">
            </div>
        </div>
        <div class="form-group form-actions">
            <div style=" padding-right: 12%; " class="col-xs-8 text-center">
                <label class="csscheckbox csscheckbox-primary">
                    <input type="checkbox" id="login-remember-me" name="login-remember-me">
                    <span></span>
                </label>
                Remember Me
            </div>
            <div style=" padding-left: 1%; margin-top: 2%; margin-left: 42%; " class="col-xs-4 text-left">
                <button style=" font-size: 18px;" type="submit" class="btn btn-effect-ripple btn-sm btn-primary"> Submit</button>
            </div>
        </div>
    </form>
    <!-- END Login Form -->
@endsection
    