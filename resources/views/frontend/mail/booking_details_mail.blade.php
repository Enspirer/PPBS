<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <!-- <title>A simple, clean, and responsive HTML invoice template</title> -->
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{url('img/logo.png')}}" style="width:100%; max-width:60px;">
                                <br>
                            </td>
                            
                            <td align="right">
                               <b>Booking Number: {{ $booking_details['booking_number'] }}</b><br>
                                Created: {{ $booking_details['created_at'] }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                             <b>Paris Private Transfer<br>
                                12345 Sunny Road<br>
                                Sunnyville, CA 12345<br>
                                info@parisprivatetransfer.com</b>
                            </td>
                            
                            <td align="right">
                             <b>{{ $booking_details['name'] }}<br>
                                {{ $booking_details['phone_number'] }}<br>                           
                                {{ $booking_details['email'] }}</b>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            
            <tr class="item">
                <td>
                    Name:
                </td>
                
                <td>
                    {{ $booking_details['name'] }}
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Email Address:
                </td>
                
                <td>
                    {{ $booking_details['email'] }}
                </td>
            </tr>
            
            <tr class="item">
                <td>
                Booking Number:
                </td>
                
                <td>
                {{ $booking_details['booking_number'] }}
                </td>
            </tr>

            <tr class="item">
                <td>
                Phone Number:
                </td>
                
                <td>
                {{ $booking_details['phone_number'] }}
                </td>
            </tr>

            <tr class="item">
                <td>
                Pickup From:
                </td>
                
                <td>
                {{ $booking_details['pickup_from'] }}
                </td>
            </tr>

            <tr class="item">
                <td>
                Destination:
                </td>
                
                <td>
                {{ $booking_details['destination'] }}
                </td>
            </tr>

            <tr class="item">
                <td>
                Pickup Date:
                </td>
                
                <td>
                {{ $booking_details['pickup_date'] }}
                </td>
            </tr>

            <tr class="item">
                <td>
                Pickup Time (24 Hours):
                </td>
                
                <td>
                {{ $booking_details['pickup_time'] }}
                </td>
            </tr>

            <tr class="item">
                <td>
                Adults:
                </td>
                
                <td>
                {{ $booking_details['adults'] }}
                </td>
            </tr>

            <tr class="item">
                <td>
                Child:
                </td>
                
                <td>
                {{ $booking_details['child'] }}
                </td>
            </tr>

            <tr class="item">
                <td>
                Baby:
                </td>
                
                <td>
                {{ $booking_details['baby'] }}
                </td>
            </tr>

            <tr class="item">
                <td>
                Pickup Address:
                </td>
                
                <td>
                {{ $booking_details['pickup_address'] }}
                </td>
            </tr>

            <tr class="item">
                <td>
                Drop Address:
                </td>
                
                <td>
                {{ $booking_details['drop_address'] }}
                </td>
            </tr>

            <tr class="item">
                <td>
                Vehicle Number:
                </td>
                
                <td>
                {{ $booking_details['vehicle_number'] }}
                </td>
            </tr>

            <tr class="item">
                <td>
                Luggages:
                </td>
                
                <td>
                {{ $booking_details['luggage'] }}
                </td>
            </tr>

            <tr class="item">
                <td>
                Payment Method:
                </td>
                
                <td>
                {{ $booking_details['payment_method'] }}
                </td>
            </tr>

            <tr class="item">
                <td>
                Booking Type:
                </td>
                
                <td>
                {{ $booking_details['booking_type'] }}
                </td>
            </tr>

            <tr class="item">
                <td>
                Total Price:
                </td>
                
                <td>
                {{ $booking_details['total_price'] }}
                </td>
            </tr>
            
            <!-- <tr class="total">
                <td></td>
                
                <td>
                Phone Number:
                </td>
            </tr> -->
        </table>

        <br>

        <p>Thank you and have a pleasant journey!</p>
        <p>Orders are subject to our terms & conditions. We welcome all comments on the service we provide</p>

        <hr>

    </div>
</body>
</html>