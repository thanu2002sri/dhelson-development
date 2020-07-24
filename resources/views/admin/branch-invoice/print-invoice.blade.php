@extends('layouts.app')
@section('styles')
    <style>
        .fa-file-invoice:before {
            content: "\f570";
        }
        .fa-file-invoice-dollar:before {
            content: "\f571";
        }
        .font-16 {
            font-size: 16px;
        }
        h3 {
            line-height: 30px;
            margin: 10px 0;
            font-weight: 600;
        }
        h4 {
            line-height: 22px;
        }
        * {
            outline: none !important;
        }
        .float-right {
            float: right!important;
        }
        strong {
            color: #212529;
        }
        .p-2 {
            padding: .5rem!important;
        }
        .font-20 {
            font-size: 20px;
        }
        .table > tbody > tr > td, .table > tfoot > tr > td, .table > thead > tr > td {
            padding: 15px 12px;
        }
        .table td, .table th {
            vertical-align: middle;
            border-top: 1px solid #dee2e6;
        }
        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }
        @media screen and (max-width: 767px)
        {
            .table-responsive {
                border: none !important;
            }
        }
        .col-6 {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%;
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }
        .col-12 {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%;
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
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
                        <div class="header-section">
                            <h1>{{ $title }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Page Header -->

            <div class="block full">
                <div class="container-fluid">



    <div class="row">
        <div class="col-12">
            <div class="invoice-title">
                <h4 class="float-right font-16"><strong>Branch ID # {{ $branch->branch_id }}</strong></h4>
                <h3 class="m-t-0">
                    <img src="{{ asset('assets/img/dhelson-logo-1.png') }}" alt="logo" width="150" height="50">
                </h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-6">
                    <address>
                        <strong>Main Branch:</strong><br>
                        Dhelson Express<br>
                        H.No: 5-190/1,<br>
                        Bhagyanagar, Kanuru, Vijayawada-520007.<br>
                        Phone No: <b><span style="font-size:16px;">8885181818</span></b><br>
                        Mail ID: <b><span style="font-size:16px;">info@dhelsonexpress.com</span></b><br>
                        Link: www.dhelsonexpress.com
                    </address>
                </div>
                <div class="col-6 text-right">
                    <address>
                        <strong>Agency Details:</strong><br>
                        {{ $branch->name }}<br>
                        {{ $branch->city }} - {{ $branch->pincode }}.<br> 
                        Phone No: <b><span style="font-size:16px;">{{ $branch->phone }}</span></b><br>
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-6 m-t-30">
                    <address>
                        <strong>Agency Mail:</strong><br>
                        {{ $branch->email }}
                    </address>
                </div>
                <div class="col-6 m-t-30 text-right">
                    <address>
                        <strong>Created Date:</strong><br>
                        {{ $branch->created_at }}<br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>


      
          
                <div class="p-2">
                    <h3 class="font-20"><strong>Order summary </strong></h3>
                </div>
                
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr style="border-top: 1px solid #ddd;">
                                <td class="text-center"><strong>Branch ID</strong></td>
                                <td class="text-center"><strong>Agent ID</strong></td>
                                <td class="text-center"><strong>Name</strong></td>
                                <td class="text-center"><strong>Email</strong></td>
                                <td class="text-center"><strong>Phone</strong></td>
                                <td class="text-center"><strong>Status</strong></td>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                                        
                                <tr>
                                    <td class="text-center">{{ $branch->branch_id }}</td>
                                    <td class="text-center">{{ $agent->profile_id }}</td>
                                    <td class="text-center">{{ $agent->name }}</td>
                                    <td class="text-center">{{ $agent->email }}</td>
                                    <td class="text-center">{{ $agent->phone }}</td>
                                    @if(!empty($agent->status) && $agent->status=='0')
                                        <td class="text-center">Active</td> 
                                    @else
                                        <td class="text-center">Deactive</td>   
                                    @endif
                                                                           
                                </tr>

                            <tr>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line text-center">
                                    <strong>Amount</strong></td>
                                <td class="thick-line text-center"><i class="fas fa-rupee-sign"></i> {{ $branch->amount }}</td>
                            </tr>
                            
                            <tr>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line text-center">
                                    <strong>Tax</strong></td>
                                <td class="thick-line text-center"><i class="fas fa-rupee-sign"></i> {{ $branch->tax }}</td>
                            </tr>

                            <tr>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line text-center">
                                    <strong>Total Amount</strong></td>
                                <td class="thick-line text-center"><i class="fas fa-rupee-sign"></i> {{ $branch->total_amount }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="d-print-none mo-mt-2">
                        <div class="float-right">
                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                            <!-- <a href="#" class="btn btn-primary waves-effect waves-light">Send</a> -->
                        </div>
                    </div>
                
                </div>

            </div>

    </div>
    <!-- END content -->
@endsection