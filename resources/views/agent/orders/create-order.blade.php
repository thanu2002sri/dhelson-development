@extends('layouts.app')

@section('styles')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/site.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/richtext.min.css') }}">
    <style>
       
        .text-center
        {
            font-weight: 600;
        }
        .image-preview-input {
            position: relative;
            overflow: hidden;
            margin: 0px;    
            color: #333;
            background-color: #fff;
            border-color: #ccc;    
        }
        .image-preview-input input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }
        .image-preview-input-title {
            margin-left:2px;
        }

         /* Always set the map height explicitly to define the size of the div
        * element that contains the map. */
        #map {
            height: 250px;
        }
        #description {
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
        }

        #infowindow-content .title {
            font-weight: bold;
        }

        #infowindow-content {
            display: none;
        }

        #map #infowindow-content {
            display: inline;
        }

        .pac-card {
            margin: 10px 10px 0 0;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            background-color: #fff;
            font-family: Roboto;
        }

        #pac-container {
            padding-bottom: 12px;
            margin-right: 12px;
        }

        .pac-controls {
            display: inline-block;
            padding: 5px 11px;
        }

        .pac-controls label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        #pac-input {
            height: 30px;
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 155px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 400px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        #title {
            color: #fff;
            background-color: #4d90fe;
            font-size: 25px;
            font-weight: 500;
            padding: 6px 12px;
        }
        #target {
            width: 345px;
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
                {{-- <div class="header-section">
                    <h1>{{ $title }}</h1>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- END Page Header -->

             <!-- Add Incharge -->
             <div class="block full">
                <div class="block-title text-center">
                        <h2 style="font-size: 20px;">Dhelson Express - {{ $title }}</h2>                        
                    </div>
                    <form action="{{ route('create.incharge') }}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                        @csrf  
                              <br>
                              <h3 class="text-center">Consigner Details</h3>
                              <hr>
                                <div class="form-group">
                                
                                    <div class="col-sm-4">
                                        <label class="control-label" for="distr-first-name">Consigner Name</label>
                                        <input type="text" required name="consigner_name" value="{{ old('consigner_name') }}" autocomplete="consigner_name" autofocus class="form-control form-field-margin @error('consigner_name') is-invalid @enderror" placeholder="Enter Consigner Name" >
                                        @error('consigner_name')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror  
                                    </div>
                                    <div class="col-sm-4 form-field-margin">
                                        <label class="control-label" for="distr-first-name">Consigner Email</label>
                                        <div class="input-group">
                                                <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                                                
                                                <input required type="email" name="consigner_email" value="{{ old('consigner_email') }}" autocomplete="consigner_email" autofocus class="form-control @error('consigner_email') is-invalid @enderror" placeholder="Enter Consigner Email" >
                                        </div>
                                        @error('consigner_email')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-4 form-field-margin">
                                        <label class="control-label">Consigner Phone</label>
                                        <div class="input-group">
                                                <span class="input-group-addon"><i class="fas fa-phone-alt"></i></span>
                                                <input required type="text" name="consigner_phone" value="{{ old('consigner_phone') }}" autocomplete="consigner_phone" autofocus class="form-control @error('consigner_phone') is-invalid @enderror" placeholder="Enter Consigner Phone Number" >
                                                @error('consigner_phone')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                        </div>
                                    </div>
                                     
                                </div>

                                <div class="form-group">
                                    
                                        <div class="col-sm-6 form-field-margin">  
                                            <label class="control-label">Consigner Photo</label>
                                            <!-- image-preview-filename input [CUT FROM HERE]-->
                                            <div class="input-group image-preview">
                                                <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                                <span class="input-group-btn">
                                                    <!-- image-preview-clear button -->
                                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                        <span class="glyphicon glyphicon-remove"></span> Clear
                                                    </button>
                                                    <!-- image-preview-input -->
                                                    <div class="btn btn-default image-preview-input">
                                                        <span class="glyphicon glyphicon-folder-open"></span>
                                                        <span class="image-preview-input-title">Upload Photo</span>
                                                        <input type="file" accept="image/png, image/jpeg, image/gif" name="consigner_photo"/> <!-- rename it -->
                                                    </div>
                                                </span>
                                            </div><!-- /input-group image-preview [TO HERE]--> 
                                        </div>

                                        <div class="col-sm-6 form-field-margin">  
                                            <label class="control-label">Consigner Aadhar</label>
                                            <!-- image-preview-filename input [CUT FROM HERE]-->
                                            <div class="input-group image-preview">
                                                <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                                <span class="input-group-btn">
                                                    <!-- image-preview-clear button -->
                                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                        <span class="glyphicon glyphicon-remove"></span> Clear
                                                    </button>
                                                    <!-- image-preview-input -->
                                                    <div class="btn btn-default image-preview-input">
                                                        <span class="glyphicon glyphicon-folder-open"></span>
                                                        <span class="image-preview-input-title">Upload Aadhar</span>
                                                        <input type="file" accept="image/png, image/jpeg, image/gif" name="consigner_aadhar"/> <!-- rename it -->
                                                    </div>
                                                </span>
                                            </div><!-- /input-group image-preview [TO HERE]--> 
                                        </div>
                                    </div>

                                    <h3 class="text-center">Consignee Details</h3>
                                    <hr>
                                    <div class="form-group">
                                
                                        <div class="col-sm-4 form-field-margin">
                                            <label class="control-label" for="distr-first-name">Consignee Name</label>
                                            <input type="text" required name="consignee_name" value="{{ old('consignee_name') }}" autocomplete="consignee_name" autofocus class="form-control form-field-margin @error('consignee_name') is-invalid @enderror" placeholder="Enter Consignee Name" >
                                            @error('consignee_name')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror  
                                        </div>
    
                                        <div class="col-sm-4 form-field-margin">
                                            <label class="control-label">Consignee Phone</label>
                                            <div class="input-group">
                                                    <span class="input-group-addon"><i class="fas fa-phone-alt"></i></span>
                                                    <input required type="text" name="consignee_phone" value="{{ old('consignee_phone') }}" autocomplete="consignee_phone" autofocus class="form-control @error('consignee_phone') is-invalid @enderror" placeholder="Enter Consignee Phone Number" >
                                                    @error('consignee_phone')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                            </div>

                                        </div>
                                        <div class="col-sm-4 form-field-margin">
                                            <label class="control-label" for="distr-first-name">Consignee ID (Any Government ID)</label>
                                            <input type="text" required name="consignee_id" value="{{ old('consignee_id') }}" autocomplete="consignee_id" autofocus class="form-control form-field-margin @error('consignee_id') is-invalid @enderror" placeholder="Enter Consignee ID" >
                                            @error('consignee_id')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror  
                                        </div>
                                         
                                    </div>
                                    
                                    <div class="form-group">
                                
                                        <div class="col-sm-12 form-field-margin">
                                            <label class="control-label">Get Address</label>
                                            <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                                            <div id="map"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                
                                        <div class="col-sm-12 form-field-margin">
                                            <label class="control-label">Address</label>
                                            <textarea id="address" required autofocus value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Incharge Address"  name="address" rows="4"></textarea>
                                            @error('address')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                            
                                        <div class="col-sm-4 form-field-margin">
                                            <label class="control-label">Pincode</label>
                                                <input id="pincode" required minlength="6" maxlength="6" pattern="[0-9]*" type="text" name="pincode" value="{{ old('pincode') }}" autocomplete="pincode" autofocus class="form-control @error('pincode') is-invalid @enderror" placeholder="Enter Pincode" >
                                                @error('pincode')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="col-sm-4 form-field-margin">
                                            <label class="control-label">City</label>
                                            <input id="city" required type="text" name="city" value="{{ old('city') }}" autocomplete="city" autofocus class="form-control @error('city') is-invalid @enderror" placeholder="Enter City" >
                                            @error('city')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    
                                    <div class="col-sm-4 form-field-margin">
                                        <label class="control-label">State</label>
                                            <input id="state" required type="text" name="state" value="{{ old('state') }}" autocomplete="state" autofocus class="form-control @error('state') is-invalid @enderror" placeholder="Enter State" >
                                            @error('state')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
            
                                    
                                </div>
            
                                <div class="form-group">

                                    <div class="col-sm-4 form-field-margin">
                                        <label class="control-label">Country</label>
                                        <input id="country" required type="text" name="country" value="{{ old('country') }}" autocomplete="country" autofocus class="form-control @error('country') is-invalid @enderror" placeholder="Enter Country" >
                                        @error('country')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                        
                                    <div class="col-sm-4 form-field-margin">
                                        <label class="control-label">Latitude</label>
                                            <input id="latitude" required minlength="6" maxlength="6" pattern="[0-9]*" type="text" name="pincode" value="{{ old('pincode') }}" autocomplete="pincode" autofocus class="form-control @error('pincode') is-invalid @enderror" placeholder="Enter Latitude" >
                                            @error('pincode')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="col-sm-4 form-field-margin">
                                        <label class="control-label">Longtitude</label>
                                        <input id="longtitude" required type="text" name="city" value="{{ old('city') }}" autocomplete="city" autofocus class="form-control @error('city') is-invalid @enderror" placeholder="Enter Longtitude" >
                                        @error('city')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                                    <h3 class="text-center">Shipment Details</h3>
                                    <hr>
                                    <div class="card-body after-add-more">
                                        <div class="form-group">

                                        
                                        <div class="form-group">
                                            
                                            <div class="col-sm-3 form-field-margin">
                                                <label class="control-label" for="distr-first-name">Shipment Name</label>
                                                <input type="text" required name="shipment_name" value="{{ old('shipment_name') }}" autocomplete="shipment_name" autofocus class="form-control form-field-margin @error('shipment_name') is-invalid @enderror" placeholder="Enter Shipment Name" >
                                                @error('shipment_name')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror  
                                            </div>

                                            <div class="col-sm-3 form-field-margin">
                                                <label class="control-label">Shipment Photo ( Front )</label>
                                                <div class="input-group image-preview">
                                                    <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                                    <span class="input-group-btn">
                                                        <!-- image-preview-clear button -->
                                                        <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                            <span class="glyphicon glyphicon-remove"></span> Clear
                                                        </button>
                                                        <!-- image-preview-input -->
                                                        <div class="btn btn-default image-preview-input">
                                                            <span class="glyphicon glyphicon-folder-open"></span>
                                                            <span class="image-preview-input-title">Upload Photo</span>
                                                            <input type="file" accept="image/png, image/jpeg, image/gif" name="shipment_front"/> <!-- rename it -->
                                                        </div>
                                                    </span>
                                                </div>
                                                @error('shipment_front')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-sm-3 form-field-margin">
                                                <label class="control-label">Shipment Photo ( Back )</label>
                                                <div class="input-group image-preview">
                                                    <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                                    <span class="input-group-btn">
                                                        <!-- image-preview-clear button -->
                                                        <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                            <span class="glyphicon glyphicon-remove"></span> Clear
                                                        </button>
                                                        <!-- image-preview-input -->
                                                        <div class="btn btn-default image-preview-input">
                                                            <span class="glyphicon glyphicon-folder-open"></span>
                                                            <span class="image-preview-input-title">Upload Photo</span>
                                                            <input type="file" accept="image/png, image/jpeg, image/gif" name="shipment_back"/> <!-- rename it -->
                                                        </div>
                                                    </span>
                                                </div>
                                                @error('shipment_back')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-sm-3 form-field-margin">
                                                <label class="control-label">Shipment Photo With Consigner</label>
                                                <div class="input-group image-preview">
                                                    <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                                    <span class="input-group-btn">
                                                        <!-- image-preview-clear button -->
                                                        <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                            <span class="glyphicon glyphicon-remove"></span> Clear
                                                        </button>
                                                        <!-- image-preview-input -->
                                                        <div class="btn btn-default image-preview-input">
                                                            <span class="glyphicon glyphicon-folder-open"></span>
                                                            <span class="image-preview-input-title">Upload Photo</span>
                                                            <input type="file" accept="image/png, image/jpeg, image/gif" name="shipment_img"/> <!-- rename it -->
                                                        </div>
                                                    </span>
                                                </div>
                                                @error('shipment_img')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="col-sm-4 form-field-margin">
                                                <label class="control-label">Invoice Photo</label>
                                                <div class="input-group image-preview">
                                                    <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                                    <span class="input-group-btn">
                                                        <!-- image-preview-clear button -->
                                                        <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                            <span class="glyphicon glyphicon-remove"></span> Clear
                                                        </button>
                                                        <!-- image-preview-input -->
                                                        <div class="btn btn-default image-preview-input">
                                                            <span class="glyphicon glyphicon-folder-open"></span>
                                                            <span class="image-preview-input-title">Upload Photo</span>
                                                            <input type="file" accept="image/png, image/jpeg, image/gif" name="consigner_aadhar"/> <!-- rename it -->
                                                        </div>
                                                    </span>
                                                </div>
                                                @error('consigner_photo')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-sm-4 form-field-margin">
                                                <label class="control-label">Invoice Date</label>
                                                <select id="distr-security-question" name="security_question" style="width: 100%;" value="{{ old('security_question') }}" autocomplete="security_question" autofocus class="select-select2 @error('security_question') is-invalid @enderror" style="width: 100%;" data-placeholder="Select Unit Price" required>
                                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                    <option value="3">Upto - 3 Months</option>
                                                    <option value="3.1">3 - 6 Months</option>
                                                    <option value="6.1">6 - 12 Months</option>
                                                    <option value="12.1">Above - 12 Months</option>
                                                </select>
                                                @error('consigner_photo')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-sm-4 form-field-margin">
                                                <label class="control-label">Insured Amount</label>
                                                <input readonly type="text" required name="consigner_name" value="{{ old('consigner_name') }}" autocomplete="consigner_name" autofocus class="form-control form-field-margin @error('consigner_name') is-invalid @enderror" placeholder="Enter Insured Amount" >
                                                @error('consigner_photo')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <div class="col-sm-4 form-field-margin">
                                                <label class="control-label">Shipment Quantity</label>
                                                <select id="distr-security-question" name="security_question" style="width: 100%;" value="{{ old('security_question') }}" autocomplete="security_question" autofocus class="select-select2 @error('security_question') is-invalid @enderror" style="width: 100%;" data-placeholder="Select Quantity" required>

                                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                </select>
                                                @error('consigner_photo')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-sm-4 form-field-margin">
                                                <label class="control-label">Shipment Weight</label>
                                                <select id="distr-security-question" name="security_question" style="width: 100%;" value="{{ old('security_question') }}" autocomplete="security_question" autofocus class="select-select2 @error('security_question') is-invalid @enderror" style="width: 100%;" data-placeholder="Select Weight" required>

                                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                    <option value="3">Upto - 3 Kg</option>
                                                    <option value="6">3 - 6 Kg</option>
                                                    <option value="6.1">Above - 6 Kg</option>
                                                </select>
                                                @error('consigner_photo')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-sm-4 form-field-margin">
                                                <label class="control-label">Unit Price ( Invoice Price )</label>
                                                <select id="distr-security-question" name="security_question" style="width: 100%;" value="{{ old('security_question') }}" autocomplete="security_question" autofocus class="select-select2 @error('security_question') is-invalid @enderror" style="width: 100%;" data-placeholder="Select Unit Price" required>
                                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                    <option value="100000">Upto - 1,00,000</option>
                                                    <option value="200000">2,00,000</option>
                                                    <option value="400000">4,00,000</option>
                                                    <option value="400001">Above - 4,00,000</option>
                                                </select>
                                                @error('consigner_photo')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-group">
                                                
                                            <div class="col-sm-3 form-field-margin">
                                                <label class="control-label" for="distr-first-name">Transit Amount</label>
                                                <input readonly type="text" required name="consigner_name" value="{{ old('consigner_name') }}" autocomplete="consigner_name" autofocus class="form-control form-field-margin @error('consigner_name') is-invalid @enderror" placeholder="Enter Transit Amount" >
                                                @error('consigner_name')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror  
                                            </div>

                                        <div class="col-sm-3 form-field-margin">
                                            <label class="control-label">Transit Tax</label>
                                            <input readonly type="text" required name="consigner_name" value="{{ old('consigner_name') }}" autocomplete="consigner_name" autofocus class="form-control form-field-margin @error('consigner_name') is-invalid @enderror" placeholder="Enter Transit Tax" >
                                            @error('consigner_photo')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                            <div class="col-sm-3 form-field-margin">
                                                <label class="control-label">Transit Total Amount</label>
                                                <input readonly type="text" required name="consigner_name" value="{{ old('consigner_name') }}" autocomplete="consigner_name" autofocus class="form-control form-field-margin @error('consigner_name') is-invalid @enderror" placeholder="Enter Transit Total Amount" >
                                                @error('consigner_photo')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-sm-3 form-field-margin">
                                                <label class="control-label">Select Destination Agency</label>
                                                    <input id="state" required type="text" name="state" value="{{ old('state') }}" autocomplete="state" autofocus class="form-control @error('state') is-invalid @enderror" placeholder="Select Destination Agency" >
                                                    @error('state')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                    
                                            {{-- <div class="col-sm-3 form-field-margin">
                                                <div style="margin: 3rem 6.5rem;" >
                                                    <button class="form-field-margin btn btn-primary waves-effect waves-light add-more pull-right" type="button">Add More &nbsp;<i class="fas fa-plus"></i></button>
                                                </div>
                                            
                                            </div> --}}
                                        
                                    </div>
                                </div>
                        </div>
                            
                        

                            <div class="form-group">
                                
                                <div class="col-sm-12 form-field-margin">
                                    <label class="control-label">Shipment Description</label>
                                        <textarea id="content" required autofocus value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Address"  name="address" rows="4"></textarea>
                                            @error('consigner_phone')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                </div>
                            </div>

                        
                        

                    <h3 class="text-center">Payment Details</h3>
                    <hr>

                    <div class="form-group" style="padding: 0px 20px;">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>

                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="text-center">Transit Total Amount</th>
                                        <input type="hidden" class="totalAmt" name="total_amount" value="0">
                                        <th class="text-center"><i class="fas fa-rupee-sign"></i> <span class="totalAmt">0.00</span></th>
                                    </tr>

                                    <tr>
                                        <th style="border-bottom: 1px solid red !important;" class="text-center">Transit Tax : 18%</th>
                                        <input type="hidden" class="serviceTax" name="total_tax" value="0">
                                        <th style="border-bottom: 1px solid red !important;" class="text-center"><i class="fas fa-rupee-sign"></i> <span class="serviceTax">0.00</span></th>
                                    </tr>
                                    <tr>
                                        <th style="border: 1px solid red !important;" class="text-center">Transit Grand Total</th>
                                        <input type="hidden" class="grandTotal" name="grand_total" value="0">
                                        <th style="border: 1px solid red !important;" class="text-center"><i class="fas fa-rupee-sign"></i> <span class="grandTotal">0.00</span></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-8">
                            <canvas id="signature" height="100" style="border: 2px dashed grey;width:-webkit-fill-available;"></canvas>
                            <br>
                            
                            <label class="control-label">Consigner Signature</label>
                            <button type="button" class="btn btn-success pull-right" id="clear-signature">Clear</button>
                        </div>
                        
                        {{-- <button type="button" class="btn btn-success" id="btn-save">Save</button> --}}
                        <input type="hidden" id="signature" name="signature">
                        <input type="hidden" name="signaturesubmit" value="1">
                    </div>
                    
                    <div class="form-group form-actions">
                        <div class="col-sm-7 col-sm-offset-5">
                                <button type="submit" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;">Place Order</button>
                                <button type="reset" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;">Cancel</button>
                        </div>
                </div>
                           
                        </form>
            </div>
         
        <!-- END Add Incharges -->
<!-- END Main Container -->
</div>
<!-- END content -->
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('assets/js/jquery.richtext.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvuspZieDAMlpAVAe2qwlvkk8oQU34dtg&libraries=places&callback=initAutocomplete"
async defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
    

    <script>
        $('#from_date').datepicker({});
        $('#to_date').datepicker({});

        $(document).ready(function() {
            $('#content').richText();
        });

        $(document).on('click', '#close-preview', function(){ 
            $('.image-preview').popover('hide');
            // Hover befor close the preview
            $('.image-preview').hover(
                function () {
                $('.image-preview').popover('show');
                }, 
                function () {
                $('.image-preview').popover('hide');
                }
            );    
        });

        $(function() {
            // Create the close button
            var closebtn = $('<button/>', {
                type:"button",
                text: 'x',
                id: 'close-preview',
                style: 'font-size: initial;',
            });
            closebtn.attr("class","close pull-right");
            // Set the popover default content
            $('.image-preview').popover({
                trigger:'manual',
                html:true,
                title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
                content: "There's no image",
                placement:'bottom'
            });
            // Clear event
            $('.image-preview-clear').click(function(){
                $('.image-preview').attr("data-content","").popover('hide');
                $('.image-preview-filename').val("");
                $('.image-preview-clear').hide();
                $('.image-preview-input input:file').val("");
                $(".image-preview-input-title").text("Browse"); 
            }); 
            // Create the preview image
            $(".image-preview-input input:file").change(function (){     
                var img = $('<img/>', {
                    id: 'dynamic',
                    width:250,
                    height:200
                });      
                var file = this.files[0];
                var reader = new FileReader();
                // Set preview image into the popover data-content
                reader.onload = function (e) {
                        $(".image-preview-input-title").text("Change");
                        $(".image-preview-clear").show();
                        $(".image-preview-filename").val(file.name);            
                        img.attr('src', e.target.result);
                        $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
                }        
                reader.readAsDataURL(file);
            });  
        });


        function initAutocomplete() {
            
            var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 20.593683, lng: 78.962883},
            zoom: 5,
            mapTypeId: 'roadmap'
            });

            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
            });
            var country = state = city = area = address = pincode = street = "";
            var markers = [];

            searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
            return;
            }

            markers.forEach(function(marker) {
            marker.setMap(null);
            });
            markers = [];

            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                var arrAddress = place;
                //console.log(arrAddress.address_components);
                arrAddress.address_components.forEach(function(address_component) {
                    if (address_component.types[0] == "sublocality_level_2" && address_component.types[2] == "political" ) {
                        street = address_component.long_name;
                    }
                    if (address_component.types[0] == "sublocality_level_1" && address_component.types[2] == "political" ) {
                        area = address_component.long_name;
                    }
                    if (address_component.types[0] == "locality") {
                    city = address_component.long_name;
                    }
                    if (address_component.types[0] == "administrative_area_level_1") {
                    state = address_component.long_name;
                    }
                    if (address_component.types[0] == "country") {
                    country = address_component.long_name;
                    }
                    if (address_component.types[0] == "postal_code") {
                        pincode = address_component.long_name;
                    }
            });
            $('#pincode').val(pincode);
            $('#city').val(city);
            $('#state').val(state);
            $('#country').val(country);
            $('#latitude').val(place.geometry.location.lat());
            $('#longtitude').val(place.geometry.location.lng());
            address = street+', '+area+', '+city+' - '+pincode+', '+state+', '+country;
            $('#address').val(address);
            /*  console.log(street+','+area+','+city+','+pincode+','+state+','+country);
            console.log( "Latitude - "+ place.geometry.location.lat()+','+"Longitude - " + place.geometry.location.lng()); */
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };  

            markers.push(new google.maps.Marker({
                map: map,
                icon: icon,
                title: place.name,
                position: place.geometry.location
            }));

            if (place.geometry.viewport) {
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
            });
                map.fitBounds(bounds);
            });
        }

        /* =========================== Dynamic Add More =========================== */

        $(document).ready(function() {

            var max_fields = 20; //maximum input boxes allowed
            var wrapper = $(".after-add-more"); //Fields wrapper
            var pcs_wrapper = $(".after-add-more-pcs"); //Fields wrapper
            var add_button = $(".add-more"); //Add button ID
            var pcs_add_button = $(".add-more-pcs"); //Add button ID

            var x = 1;
            $(add_button).click(function(e) {
                e.preventDefault();
                x++;
            $(wrapper).append('<div class="form-group '+x+' control"><div class="form-group"><div class="col-sm-3 form-field-margin"><label class="control-label" for="distr-first-name">Shipment Name</label><input type="text" required name="consigner_name" value="{{ old('consigner_name') }}" autocomplete="consigner_name" autofocus class="form-control form-field-margin @error('consigner_name') is-invalid @enderror" placeholder="Enter Shipment Name" >@error('consigner_name')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror </div><div class="col-sm-3 form-field-margin"><label class="control-label">Shipment Photo</label><div class="input-group image-preview"><input type="text" class="form-control image-preview-filename" disabled="disabled"><span class="input-group-btn"><!-- image-preview-clear button --><button type="button" class="btn btn-default image-preview-clear" style="display:none;"><span class="glyphicon glyphicon-remove"></span> Clear</button><!-- image-preview-input --><div class="btn btn-default image-preview-input"><span class="glyphicon glyphicon-folder-open"></span><span class="image-preview-input-title">Upload Photo</span><input type="file" accept="image/png, image/jpeg, image/gif" name="consigner_aadhar"/> <!-- rename it --></div></span></div>@error("consigner_photo")<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="col-sm-3 form-field-margin"><label class="control-label">Shipment Quantity</label><input type="text" required name="consigner_name" value="{{ old("consigner_name") }}" autocomplete="consigner_name" autofocus class="form-control form-field-margin @error("consigner_name") is-invalid @enderror" placeholder="Enter Shipment Quantity" >@error("consigner_photo")<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="col-sm-3 form-field-margin"><label class="control-label">Shipment Weight</label><input type="text" required name="consigner_name" value="{{ old("consigner_name") }}" autocomplete="consigner_name" autofocus class="form-control form-field-margin @error("consigner_name") is-invalid @enderror" placeholder="Enter Shipment Weight" >@error("consigner_photo")<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror</div></div><div class="form-group"><div class="col-sm-3 form-field-margin"><label class="control-label">Unit Price ( Invoice Price )</label><input type="text" required name="consigner_name" value="{{ old("consigner_name") }}" autocomplete="consigner_name" autofocus class="form-control form-field-margin @error("consigner_name") is-invalid @enderror" placeholder="Enter Shipment Price" >@error("consigner_photo")<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="col-sm-3 form-field-margin"><label class="control-label">Invoice Date</label><input type="text" value="" id="from_date" name="from_date" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" placeholder="Select Date" readonly>                      {{-- <input type="text" required name="consigner_name" value="{{ old("consigner_name") }}" autocomplete="consigner_name" autofocus class="form-control form-field-margin @error("consigner_name") is-invalid @enderror" placeholder="Enter Consigner Name" > --}}@error("consigner_photo")<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="col-sm-3 form-field-margin"><label class="control-label">Amount</label><input type="text" required name="consigner_name" value="{{ old("consigner_name") }}" autocomplete="consigner_name" autofocus class="form-control form-field-margin @error("consigner_name") is-invalid @enderror" placeholder="Enter Shipment Amount" >@error("consigner_photo")<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="col-sm-3 form-field-margin"><label class="control-label">Insured Amount</label><input type="text" required name="consigner_name" value="{{ old("consigner_name") }}" autocomplete="consigner_name" autofocus class="form-control form-field-margin @error("consigner_name") is-invalid @enderror" placeholder="Enter Insured Amount" >@error("consigner_photo")<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror</div></div><div class="form-group"><div class="col-sm-3 form-field-margin"><label class="control-label" for="distr-first-name">Transit Amount</label><input type="text" required name="consigner_name" value="{{ old("consigner_name") }}" autocomplete="consigner_name" autofocus class="form-control form-field-margin @error("consigner_name") is-invalid @enderror" placeholder="Enter Transit Amount" >@error("consigner_name")<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror  </div><div class="col-sm-3 form-field-margin"><label class="control-label">Transit Tax</label><input type="text" required name="consigner_name" value="{{ old("consigner_name") }}" autocomplete="consigner_name" autofocus class="form-control form-field-margin @error("consigner_name") is-invalid @enderror" placeholder="Enter Transit Tax" >@error("consigner_photo")<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="col-sm-3 form-field-margin"><label class="control-label">Transit Total Amount</label><input type="text" required name="consigner_name" value="{{ old("consigner_name") }}" autocomplete="consigner_name" autofocus class="form-control form-field-margin @error("consigner_name") is-invalid @enderror" placeholder="Enter Transit Total Amount" >@error("consigner_photo")<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="col-sm-3 form-field-margin"><div style="margin: 3rem 6.5rem;" ><button class="form-field-margin btn btn-danger waves-effect waves-light remove" type="button">Remove &nbsp; <i class="fas fa-trash-alt"></i></button></div></div></div></div>'); //add input box
            });

            $("body").on("click", ".remove", function() {
                $(this).parents(".control").remove();
                /* totalCaluculation(); */
            });
        });

    </script>

<script>
   /*  $(document).ready(() => {
        var canvasDiv = document.getElementById('canvasDiv');
        var canvas = document.createElement('canvas');
        canvas.setAttribute('id', 'canvas');
        canvasDiv.appendChild(canvas);
        $("#canvas").attr('height', $("#canvasDiv").outerHeight());
        $("#canvas").attr('width', $("#canvasDiv").width());
        if (typeof G_vmlCanvasManager != 'undefined') {
            canvas = G_vmlCanvasManager.initElement(canvas);
        }
        
        context = canvas.getContext("2d");
        $('#canvas').mousedown(function(e) {
            var offset = $(this).offset()
            var mouseX = e.pageX - this.offsetLeft;
            var mouseY = e.pageY - this.offsetTop;

            paint = true;
            addClick(e.pageX - offset.left, e.pageY - offset.top);
            redraw();
        });

        $('#canvas').mousemove(function(e) {
            if (paint) {
                var offset = $(this).offset()
                //addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
                addClick(e.pageX - offset.left, e.pageY - offset.top, true);
                console.log(e.pageX, offset.left, e.pageY, offset.top);
                redraw();
            }
        });

        $('#canvas').mouseup(function(e) {
            paint = false;
        });

        $('#canvas').mouseleave(function(e) {
            paint = false;
        });

        var clickX = new Array();
        var clickY = new Array();
        var clickDrag = new Array();
        var paint;

        function addClick(x, y, dragging) {
            clickX.push(x);
            clickY.push(y);
            clickDrag.push(dragging);
        }

        $("#reset-btn").click(function() {
            context.clearRect(0, 0, window.innerWidth, window.innerWidth);
            clickX = [];
            clickY = [];
            clickDrag = [];
        });

        var drawing = false;
        var mousePos = {
            x: 300,
            y: 300
        };
        var lastPos = mousePos;

        canvas.addEventListener("touchstart", function(e) {
            mousePos = getTouchPos(canvas, e);
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);


        canvas.addEventListener("touchend", function(e) {
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas.dispatchEvent(mouseEvent);
        }, false);


        canvas.addEventListener("touchmove", function(e) {

            var touch = e.touches[0];
            var offset = $('#canvas').offset();
            var mouseEvent = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);



        // Get the position of a touch relative to the canvas
        function getTouchPos(canvasDiv, touchEvent) {
            var rect = canvasDiv.getBoundingClientRect();
            return {
                x: touchEvent.touches[0].clientX - rect.left,
                y: touchEvent.touches[0].clientY - rect.top
            };
        }


        var elem = document.getElementById("canvas");

        var defaultPrevent = function(e) {
            e.preventDefault();
        }
        elem.addEventListener("touchstart", defaultPrevent, false);
        elem.addEventListener("touchmove", defaultPrevent);

        function redraw() {
            //
            lastPos = mousePos;
            for (var i = 0; i < clickX.length; i++) {
                context.beginPath();
                if (clickDrag[i] && i) {
                    context.moveTo(clickX[i - 1], clickY[i - 1]);
                } else {
                    context.moveTo(clickX[i] - 1, clickY[i]);
                }
                context.lineTo(clickX[i], clickY[i]);
                context.closePath();
                context.stroke();
            }
        }
    })
 */
 jQuery(document).ready(function($){
    
    var canvas = document.getElementById("signature");
    var signaturePad = new SignaturePad(canvas);
    
    $('#clear-signature').on('click', function(){
        signaturePad.clear();
    });
    
});
</script>
@endsection

