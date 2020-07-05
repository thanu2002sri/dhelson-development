<!DOCTYPE html>
<html lang="en">
    <head>
    <title>ZOPAY</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    <h2 class='text-center'>Zopay E-Voucher Details! Your Voucher NO: <b style='color:green;'>{{ $body["pin"] }}</b></h2>
    <div class="table-responsive">
    <table class="table table-hover">
    <tr>
    <th>Transaction ID</th>
    <th>Reference ID</th>
    <th>Serial Number</th>
    <th>EAN Number</th>
    <th>Provider</th>
    <th>Product</th>
    <th>Type</th>
    <th>Date</th>
    <th>Amount</th>
    <th>Discount</th>
    <th>After Discount</th>
    <th>Status</th>
    </tr>
    <tr>
    <td>{{ $body["txnID"] }}</td>
    <td>{{ $body["txn_id"] }}</td>
    <td>{{ $body["serial"] }}</td>
    
    <td>{{ $body["ean"] }}</td>
            <td>{{ $body["provider"] }}</td>
            <td>{{ $body["product"] }}</td>
            <td>{{ $body["type"] }}</td>
            <td>{{ $body["date"] }}</td>
            <td>{{ $body["value"] }}</td>
            <td>{{ $body["discount"] }}</td>
            <td>{{ $body["after_amount"] }}</td>
            <td>SUCCESS</td>
            </tr>
            </table>
    </div>
            </body>
    </html>