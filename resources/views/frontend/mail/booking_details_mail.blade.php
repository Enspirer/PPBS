<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    
<style>
   
    .invoice {
        background: #F5F5F5;
        padding: 10px 50px 50px 50px;
    }

    .invoice-company {
        font-size: 20px
    }
   
    .invoice-date,
    .invoice-from,
    .invoice-to {
        display: table-cell;
        width: 1%
    }

    .invoice-from,
    .invoice-to {
        padding-right: 20px
    }

    .invoice-date .date,
    .invoice-from strong,
    .invoice-to strong {
        font-size: 16px;
        font-weight: 600
    }

    .invoice-date {
        text-align: right;
        padding-left: 20px
    }

    .invoice-price {
        background: #f0f3f4;
        display: table;
        width: 100%
    }

    .invoice-price .invoice-price-left,
    .invoice-price .invoice-price-right {
        display: table-cell;
        padding: 20px;
        font-size: 20px;
        font-weight: 600;
        width: 75%;
        position: relative;
        vertical-align: middle
    }

    .invoice-price .invoice-price-left .sub-price {
        display: table-cell;
        vertical-align: middle;
        padding: 0 20px
    }

    .invoice-price small {
        font-size: 12px;
        font-weight: 400;
        display: block
    }

    .invoice-price .invoice-price-row {
        display: table;
        float: left
    }

    .invoice-price .invoice-price-right {
        width: 25%;
        background: #2d353c;
        color: #fff;
        font-size: 28px;
        text-align: right;
        vertical-align: bottom;
        font-weight: 300
    }

    .invoice-price .invoice-price-right small {
        display: block;
        opacity: .6;
        position: absolute;
        top: 10px;
        left: 10px;
        font-size: 12px
    }

    .invoice-footer {
        border-top: 1px solid #ddd;
        padding-top: 10px;
        font-size: 10px
    }

    .invoice-note {
        color: #999;
        margin-top: 80px;
        font-size: 85%
    }

    .invoice>div:not(.invoice-footer) {
        margin-bottom: 20px
    }

    .btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
        color: #2d353c;
        background: #fff;
        border-color: #d9dfe3;
    }

</style>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
    <div class="col-md-12">
        <div class="invoice p-5">
            <!-- begin invoice-company -->
            <div class="invoice-company text-inverse f-w-600">

                <table width="100%">
                    <tr>
                        <td width="50%"><h5 class="invoice-inverse">Booking Number: {{$booking_details['booking_number']}}</h5></td>
                 
                    </tr>            
                </table>    

            </div>

            <hr>

            <div class="invoice-company text-inverse f-w-600">
                <table width="100%">
                    <tr>
                        <td width="70%">
                            <table>
                                <tr>
                                    <td align="right"><small style="padding-right: 20px">From:</small></td>
                                    <td><small class="invoice-from"><strong class="text-inverse">Paris Private Transfer</strong> info@parisprivatetransfer.com</small></td>
                                </tr>
                                <tr>
                                    <td align="right"><small style="padding-right: 20px">Date:</small></td>
                                    <td><small class="invoice-from"><strong class="text-inverse">{{ date('F d,Y') }}</strong></small></td>
                                </tr>
                                <tr>
                                    <td align="right"><small style="padding-right: 20px">To:</small></td>
                                    <td><small class="invoice-from"><strong class="text-inverse">{{$booking_details['name']}}</strong> {{$booking_details['email']}}</small></td>
                                </tr>
                            </table>
                        </td>
                        <td align="right"><img src="{{url('img/logo.png')}}" style="width: 40%;"></td>
                    </tr>            
                </table>
            </div>

            <hr>

            <div class="invoice-header">
                <div class="invoice-from">
                <address class="mt-2 mb-2" style="margin-top:12px;">
                    <strong style="border-bottom:1px solid #23282c;">Traveller Information</strong><br>
                        <table class="mt-3" width="380px">
                            <tr>
                            <td><h3 style="margin:0; margin-top:12px;">Name:</h3></td>
                            <td><h3 style="margin:0; margin-top:12px;">{{$booking_details['name']}}</h3></td>
                            </tr>
                            <tr>
                            <td><h3 style="margin:0">Email:</h3></td>
                            <td><h3 style="margin:0">{{$booking_details['email']}}</h3></td>
                            </tr>
                            <tr>
                            <td><h3 style="margin:0">Phone:</h3></td>
                            <td><h3 style="margin:0">{{$booking_details['phone_number']}}</h3></td>
                            </tr>
                        </table>
                </address>
                
                </div>
                <div class="invoice-to">
                <address class="mt-2 mb-2">
                    <strong style="border-bottom:1px solid #23282c;">Carrier Details</strong><br>
                        <table class="mt-3" width="380px">
                            <tr>
                            <td><h3 style="margin:0; margin-top:12px;">Adults:</h3></td>
                            <td><h3 style="margin:0; margin-top:12px;">{{$booking_details['adults']}}</h3></td>
                            </tr>
                            <tr>
                            <td><h3 style="margin:0">Children:</h3></td>
                            <td><h3 style="margin:0">{{$booking_details['child']}}</h3></td>
                            </tr>
                            <tr>
                            <td><h3 style="margin:0">Babies:</h3></td>
                            <td><h3 style="margin:0">{{$booking_details['baby']}}</h3></td>
                            </tr>
                            <tr>
                            <td><h3 style="margin:0">Passengers:</h3></td>
                            <td><h3 style="margin:0">{{$booking_details['passengers_count']}}</h3></td>
                            </tr>
                            <tr>
                            <td><h3 style="margin:0">Vehicle Number:</h3></td>
                            <td><h3 style="margin:0">{{$booking_details['vehicle_number']}}</h3></td>
                            </tr>
                            <tr>
                            <td><h3 style="margin:0">Luggages:</h3></td>
                            <td><h3 style="margin:0">{{$booking_details['luggage']}}</h3></td>
                            </tr>
                        </table>
                </address>
                </div>            
            </div>

            <hr>

            <div class="invoice-header">
                <div class="invoice-from">
                <address class="mt-2 mb-2" style="margin-top:12px;">
                    <strong style="border-bottom:1px solid #23282c;">Pick-up Information</strong><br>
                        <table class="mt-3" width="380px">
                            <tr>
                            <td><h3 style="margin:0; margin-top:12px;">From:</h3></td>
                            <td><h3 style="margin:0; margin-top:12px;">{{$booking_details['pickup_from']}}</h3></td>
                            </tr>
                            <tr>
                            <td><h3 style="margin:0;">Date:</h3></td>
                            <td><h3 style="margin:0;">{{$booking_details['pickup_date']}}</h3></td>
                            </tr>
                            <tr>
                            <td><h3 style="margin:0;">Time:</h3></td>
                            <td><h3 style="margin:0;">{{$booking_details['pickup_time']}}</h3></td>
                            </tr>
                            <tr>
                            <td><h3 style="margin:0;">Address:</h3></td>
                            <td><h3 style="margin:0;">{{$booking_details['pickup_address']}}</h3></td>
                            </tr>
                        </table>
                </address>
                
                </div>
                <div class="invoice-to">
                <address class="mt-2 mb-2">
                    <strong style="border-bottom:1px solid #23282c;">Drop-of Information</strong><br>
                        <table class="mt-3" width="380px">
                            <tr>
                                <td><h3 style="margin:0; margin-top:12px;">To:</h3></td>
                                <td><h3 style="margin:0; margin-top:12px;">{{$booking_details['destination']}}</h3></td>
                            </tr>
                        </table>
                </address>
                </div>            
            </div>

            <hr>

            <div class="invoice-header">
                <div class="invoice-from">
                <table class="mt-3" width="35%">                        
                    <tr>
                        <td><h3 style="margin:0;">Booking Type:</h3></td>
                        <td><h3 style="margin:0;">{{$booking_details['booking_type']}}</h3></td>
                    </tr>
                    <tr>
                        <td><h3 style="margin:0;">Total Price:</h3></td>
                        <td><h3 style="margin:0;">&euro;{{$booking_details['total_price']}}</h3></td>
                    </tr>
                    <tr>
                        <td><h3 style="margin:0;">Payment Method:</h3></td>
                        <td><h3 style="margin:0;">{{$booking_details['payment_method']}}</h3></td>
                    </tr>
                </table>               
                </div>                        
            </div>
                

            <!-- begin invoice-footer -->
            <div class="invoice-footer mt-5 p-3" style="margin:20px 0 20px 0; border-top: 2px solid #A9A9A9; border-bottom: 2px solid #A9A9A9" align="center">
                <h3 class="text-center m-b-5 f-w-600">Thank you for booking with parisprivatetransfer.com<br>
                Please check your details are correct and reconfirm, Our Contact number 0033652300255</h3>

                <h3 class="text-center m-b-5 f-w-600 mt-3">Orders are subject to our terms & conditions. We welcome all comments on the service we provide.<br>
                Have a pleasant journey!</h3>
            </div>
            <!-- end invoice-footer -->
            
        </div>
    </div>
    </div>
</body>
</html>