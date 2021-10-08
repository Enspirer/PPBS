@extends('backend.layouts.app')

@section('title', __('Booking Invoice'))

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('css/booking_print.css') }}">
@endpush

<div class="container text-right">
   <div class="col-md-12">
      <a href="javascript:;" onclick="window.print()" class="btn btn-md btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg text-danger"></i> Print</a>
   </div>
</div>

<br>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
   <div class="col-md-12">
      <div class="invoice">
         <!-- begin invoice-company -->
         <div class="invoice-company text-inverse f-w-600">
            <span class="pull-right hidden-print">
            <!-- <a href="javascript:;" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a> -->
            <img src="{{url('img/logo.png')}}" style="width: 80px; height:50px; margin-top:-10px;">
         </span>
            Paris Private Transfer 
         </div>
         <!-- end invoice-company -->
         <!-- begin invoice-header -->
         <div class="invoice-header">

            <div class="invoice-from">
               <!-- <small>from</small> -->
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">Paris Private Transfer</strong><br>
                  12345 Sunny Road,<br>
                  Sunnyville, CA 12345<br>
                  Phone: 0033652300255<br>
                  Email: info@parisprivatetransfer.com
               </address>
            </div>
            <div class="invoice-to">
               <!-- <small>to</small> -->
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">{{$booking_print->customer_name}}</strong><br>
                  <!-- Street Address<br>
                  City, Zip Code<br> -->
                  Phone: {{$booking_print->customer_telephone}}<br>
                  Email: {{$booking_print->customer_email}}
               </address>
            </div>
            <div class="invoice-date">
               <!-- <small>Invoice / July period</small> -->
               <div class="date text-inverse m-t-5">{{ date('F d,Y') }}</div>
               <br>
               <div class="invoice-detail">
                  Booking Number: {{$booking_print->booking_number}}<br>
                  Booked Date: {{ date('F d,Y', strtotime($booking_print->created_at)) }}
               </div>
            </div>
         </div>
         <!-- end invoice-header -->
         <!-- begin invoice-content -->
         <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="table-responsive">
               <table class="table table-invoice">
                  <!-- <thead>
                     <tr>
                        <th>TASK DESCRIPTION</th>
                        <th class="text-left" width="10%">RATE</th>
                        <th class="text-center" width="10%">HOURS</th>
                        <th class="text-right" width="20%">LINE TOTAL</th>
                     </tr>
                  </thead> -->
                  <tbody>
                     <tr>
                        <td>
                           <span class="text-inverse">Name</span><br>
                           <!-- <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id sagittis arcu.</small> -->
                        </td>
                        <td class="text-right">{{$booking_print->customer_name}}</td>
                        <!-- <td class="text-center">50</td>
                        <td class="text-right">$2,500.00</td> -->
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Email Address</span><br>
                        </td>
                        <td class="text-right">{{$booking_print->customer_email}}</td>
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Booking Number</span><br>
                        </td>
                        <td class="text-right">{{$booking_print->booking_number}}</td>
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Phone Number</span><br>
                        </td>
                        <td class="text-right">{{$booking_print->customer_telephone}}</td>
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Pickup From</span><br>
                        </td>
                        <td class="text-right">
                           @if(App\Models\Location::where('id',$booking_print->pickup_from)->first() == null)
                              <span class="badge badge-danger">Location Deleted</span>
                           @elseif(App\Models\Location::where('id',$booking_print->pickup_from)->first()->status == 'Disabled')                                 
                              <span class="badge badge-warning">{{ App\Models\Location::where('id',$tour_booking->pickup_from)->first()->name }} &nbsp; ( Location Disabled )</span>
                           @else
                              {{ App\Models\Location::where('id',$booking_print->pickup_from)->first()->name }}
                           @endif 
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Destination</span><br>
                        </td>
                        <td class="text-right">
                           @if(App\Models\Location::where('id',$booking_print->destination)->first() == null)
                              <span class="badge badge-danger">Location Deleted</span>
                           @elseif(App\Models\Location::where('id',$booking_print->destination)->first()->status == 'Disabled')                                 
                              <span class="badge badge-warning">{{ App\Models\Location::where('id',$tour_booking->destination)->first()->name }} &nbsp; ( Location Disabled )</span>
                           @else
                              {{ App\Models\Location::where('id',$booking_print->destination)->first()->name }}
                           @endif 
                        
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Pickup Date</span><br>
                        </td>
                        <td class="text-right">{{$booking_print->pickup_date}}</td>
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Pickup Time</span><br>
                        </td>
                        <td class="text-right">{{$booking_print->pickup_time}}</td>
                     </tr>

                     <tr>
                        <td>
                           <span class="text-inverse">Pickup Address</span><br>
                        </td>
                        <td class="text-right">{{$booking_print->pickup_address}}</td>
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Drop Address</span><br>
                        </td>
                        <td class="text-right">{{$booking_print->drop_address}}</td>
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Vehicle Number</span><br>
                        </td>
                        <td class="text-right">{{$booking_print->vehicle_number}}</td>
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Luggages Count</span><br>
                        </td>
                        <td class="text-right">{{$booking_print->number_of_luggages}}</td>
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Payment Method</span><br>
                        </td>
                        <td class="text-right">{{$booking_print->payment_method}}</td>
                     </tr>
                     
                     <tr>
                        <td>
                           <span class="text-inverse">Adults Count</span><br>
                        </td>
                        <td class="text-right">{{$booking_print->adults}}</td>
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Childs Count</span><br>
                        </td>
                        <td class="text-right">{{$booking_print->child}}</td>
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Baby Count</span><br>
                        </td>
                        <td class="text-right">{{$booking_print->baby}}</td>
                     </tr>
                     
                  </tbody>
               </table>
            </div>



            @if($booking_print->booking_type == 'Return')

               <div class="invoice-price mb-5 ">
                  <div class="sub-price text-center">
                     <h4 class="text-inverse" style="font-weight:bold; padding:20px">Passenger Return Details</h4>
                  </div>
               </div>

               <div class="table-responsive">
                  <table class="table table-invoice">
                     <tbody>
                        <tr>
                           <td>
                              <span class="text-inverse">Pick Up Address</span><br>
                           </td>
                           <td class="text-right">{{$booking_print->return_pickup_address}}</td>
                        </tr>
                        <tr>
                           <td>
                              <span class="text-inverse">Drop Address</span><br>
                           </td>
                           <td class="text-right">{{$booking_print->return_drop_address}}</td>
                        </tr>
                        <tr>
                           <td>
                              <span class="text-inverse">Vehicle Number</span><br>
                           </td>
                           <td class="text-right">{{$booking_print->return_vehicle_number}}</td>
                        </tr>                  
                        <tr>
                           <td>
                              <span class="text-inverse">Departure Date</span><br>
                           </td>
                           <td class="text-right">{{$booking_print->departure_date}}</td>
                        </tr>
                        <tr>
                           <td>
                              <span class="text-inverse">Departure Time</span><br>
                           </td>
                           <td class="text-right">{{$booking_print->departure_time}}</td>
                        </tr>

                        <tr>
                           <td>
                              <span class="text-inverse">Other Information</span><br>
                           </td>
                           <td class="text-right">{{$booking_print->other_information}}</td>
                        </tr>
                        
                     </tbody>
                  </table>
               </div>
            @endif   



            <!-- end table-responsive -->
            <!-- begin invoice-price -->
            <div class="invoice-price">
               <div class="invoice-price-left">
                  <div class="invoice-price-row">
                     <div class="sub-price">
                        <small>Booking Type</small>
                        <span class="text-inverse">{{$booking_print->booking_type}}</span>
                     </div>
                     <!-- <div class="sub-price">
                        <i class="fa fa-plus text-muted"></i>
                     </div> -->
                     <div class="sub-price text-center">
                        <small>PASSENGERS COUNT</small>
                        <span class="text-inverse">{{$booking_print->passengers_count}}</span>
                     </div>

                     @if($booking_print->booking_type == 'Return')
                     <div class="sub-price text-center">
                        <small>RETURN PASSENGERS COUNT</small>
                        <span class="text-inverse">{{$booking_print->return_passengers_count}}</span>
                     </div>
                     @endif

                     <div class="sub-price text-center">
                        <small>Booking Status</small>
                        @if($booking_print->status == 'Approved')
                           <span class="text-inverse" style="color:green">{{$booking_print->status}}</span>
                        @elseif($booking_print->status == 'Disapproved')
                           <span class="text-inverse" style="color:red">{{$booking_print->status}}</span>
                        @else
                           <span class="text-inverse" style="color:#DE970B">{{$booking_print->status}}</span>
                        @endif
                     </div>

                  </div>
               </div>
               <div class="invoice-price-right">
                  <small>TOTAL PRICE</small> <span class="f-w-600">${{$booking_print->total_price}}</span>
               </div>
            </div>
            <!-- end invoice-price -->
         </div>
         <!-- end invoice-content -->
         <!-- begin invoice-note -->
         <!-- <div class="invoice-note">
            * Make all cheques payable to [Your Company Name]<br>
            * Payment is due within 30 days<br>
            * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
         </div> -->
         <!-- end invoice-note -->
         <!-- begin invoice-footer -->
         <div class="invoice-footer mt-5">
            <p class="text-center m-b-5 f-w-600">
               THANK YOU FOR YOUR BUSINESS
            </p>
            <p class="text-center">
               <!-- <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> matiasgallipoli.com</span> -->
               <span class="m-r-10"><i class="fas fa-fw fa-lg fa-phone-volume"></i> 0033652300255</span>
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> info@parisprivatetransfer.com</span>
            </p>
         </div>
         <!-- end invoice-footer -->
      </div>
   </div>
</div>












@endsection
