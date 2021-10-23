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
      <div class="invoice p-5">
         <!-- begin invoice-company -->
         <div class="invoice-company text-inverse f-w-600">
            
            <table>
               <tr>
                  <td align="right"><small class="invoice-from">From:</small></td>
                  <td><small class="invoice-from"><strong class="text-inverse">Paris Private Transfer</strong> info@parisprivatetransfer.com</small></td>
               </tr>
               <tr>
                  <td align="right"><small class="invoice-from">Date:</small></td>
                  <td><small class="invoice-from"><strong class="text-inverse">{{ date('F d,Y') }}</strong></small></td>
               </tr>
               <tr>
                  <td align="right"><small class="invoice-from">To:</small></td>
                  <td><small class="invoice-from"><strong class="text-inverse">{{$booking_print->customer_name}}</strong> {{$booking_print->customer_email}}</small></td>
               </tr>
            </table>
                 
         </div>

         <hr>

         <div class="invoice-company text-inverse f-w-600">
            <table width="100%">
               <tr>
                  <td width="50%"></td>
                  <td><img src="{{url('img/logo.png')}}" style="width: 40%;"></td>
               </tr>            
            </table>
            <table width="100%" class="mt-4">
               <tr>
                  <td width="50%">
                     <h6 class="invoice-inverse">Booking Number: {{$booking_print->booking_number}}</h6>
                  </td>
                  <td>
                     <h6 class="text-inverse">ORDER STATUS: 
                        @if($booking_print->status == 'Approved')
                           <strong class="text-inverse ml-2" style="color:green">{{$booking_print->status}}</strong>
                        @elseif($booking_print->status == 'Disapproved')
                           <strong class="text-inverse ml-2" style="color:red">{{$booking_print->status}}</strong>
                        @else
                           <strong class="text-inverse ml-2" style="color:#DE970B">{{$booking_print->status}}</strong>
                        @endif
                     </h6>  
                  </td>
               </tr> 
            </table>
         </div>

         <hr>

         <div class="invoice-header">
            <div class="invoice-from">
               <address class="mt-2 mb-2">
                  <strong class="text-inverse" style="border-bottom:1px solid #23282c;">Traveller Information</strong><br>
                     <table class="mt-3" width="380px">
                        <tr>
                           <td><h6 class="text-inverse">Name:</h6></td>
                           <td><h6 class="text-inverse">{{$booking_print->customer_name}}</h6></td>
                        </tr>
                        <tr>
                           <td><h6 class="text-inverse">Email:</td>
                           <td><h6 class="text-inverse">{{$booking_print->customer_email}}</h6></td>
                        </tr>
                        <tr>
                           <td><h6 class="text-inverse">Phone:</td>
                           <td><h6 class="text-inverse">{{$booking_print->customer_telephone}}</h6></td>
                        </tr>
                     </table>
               </address>
               
            </div>
            <div class="invoice-to">
               <address class="mt-2 mb-2">
                  <strong class="text-inverse" style="border-bottom:1px solid #23282c;">Carrier Details</strong><br>
                     <table class="mt-3" width="380px">
                        <tr>
                           <td><h6 class="text-inverse">Adults:</td>
                           <td><h6 class="text-inverse">{{$booking_print->adults}}</h6></td>
                        </tr>
                        <tr>
                           <td><h6 class="text-inverse">Children:</td>
                           <td><h6 class="text-inverse">{{$booking_print->child}}</h6></td>
                        </tr>
                        <tr>
                           <td><h6 class="text-inverse">Babies:</td>
                           <td><h6 class="text-inverse">{{$booking_print->baby}}</h6></td>
                        </tr>
                        <tr>
                           <td><h6 class="text-inverse">Passengers:</h6></td>
                           <td><h6 class="text-inverse">{{$booking_print->passengers_count}}</h6></td>
                        </tr>
                        <tr>
                           <td><h6 class="text-inverse">Vehicle Number:</td>
                           <td><h6 class="text-inverse">{{$booking_print->vehicle_number}}</h6></td>
                        </tr>
                        <tr>
                           <td><h6 class="text-inverse">Luggages:</td>
                           <td><h6 class="text-inverse">{{$booking_print->number_of_luggages}}</h6></td>
                        </tr>
                     </table>
               </address>
            </div>            
         </div>

         <hr>

         <div class="invoice-header">
            <div class="invoice-from">
               <address class="mt-2 mb-2">
                  <strong class="text-inverse" style="border-bottom:1px solid #23282c;">Pick-up Information</strong><br>
                     <table class="mt-3" width="380px">
                        <tr>
                           <td><h6 class="text-inverse">From:</h6></td>
                           <td>
                              <h6 class="text-inverse">
                              @if(App\Models\Location::where('id',$booking_print->pickup_from)->first() == null)
                              <span class="badge badge-danger">Location Deleted</span>
                              @elseif(App\Models\Location::where('id',$booking_print->pickup_from)->first()->status == 'Disabled')                                 
                                 <span class="badge badge-warning">{{ App\Models\Location::where('id',$tour_booking->pickup_from)->first()->name }} &nbsp; ( Location Disabled )</span>
                              @else
                                 {{ App\Models\Location::where('id',$booking_print->pickup_from)->first()->name }}
                              @endif 
                              </h6>
                           </td>
                        </tr>
                        <tr>
                           <td><h6 class="text-inverse">Date:</td>
                           <td><h6 class="text-inverse">{{$booking_print->pickup_date}}</h6></td>
                        </tr>
                        <tr>
                           <td><h6 class="text-inverse">Time:</td>
                           <td><h6 class="text-inverse">{{$booking_print->pickup_time}}</h6></td>
                        </tr>
                        <tr>
                           <td><h6 class="text-inverse">Address:</td>
                           <td><h6 class="text-inverse">{{$booking_print->pickup_address}}</h6></td>
                        </tr>
                     </table>
               </address>
               
            </div>
            <div class="invoice-to">
               <address class="mt-2 mb-2">
                  <strong class="text-inverse" style="border-bottom:1px solid #23282c;">Drop-of Information</strong><br>
                     <table class="mt-3" width="380px">
                        <tr>
                           <td><h6 class="text-inverse">To:</h6></td>
                           <td class="text-inverse">
                              <h6 class="text-inverse">
                              @if(App\Models\Location::where('id',$booking_print->destination)->first() == null)
                                 <span class="badge badge-danger">Location Deleted</span>
                              @elseif(App\Models\Location::where('id',$booking_print->destination)->first()->status == 'Disabled')                                 
                                 <span class="badge badge-warning">{{ App\Models\Location::where('id',$tour_booking->destination)->first()->name }} &nbsp; ( Location Disabled )</span>
                              @else
                                 {{ App\Models\Location::where('id',$booking_print->destination)->first()->name }}
                              @endif 
                              </h6>                        
                           </td>
                        </tr>
                     </table>
               </address>
            </div>            
         </div>

         <hr>

         <div class="invoice-header">
            <div class="invoice-from">
               <table class="mt-3" width="30%">                        
                  <tr>
                     <td><h6 class="text-inverse">Booking Type:</td>
                     <td><h6 class="text-inverse">{{$booking_print->booking_type}}</h6></td>
                  </tr>
                  <tr>
                     <td><h6 class="text-inverse">Total Price:</td>
                     <td><h6 class="text-inverse">&euro;{{$booking_print->total_price}}</h6></td>
                  </tr>
                  <tr>
                     <td><h6 class="text-inverse">Payment Method:</td>
                     <td><h6 class="text-inverse">{{$booking_print->payment_method}}</h6></td>
                  </tr>
               </table>               
            </div>                        
         </div>

         

         <!-- end invoice-header -->
         <!-- begin invoice-content -->
         <div class="invoice-content">
            



            @if($booking_print->booking_type == 'Return')

               <div class="invoice-price mb-5 ">
                  <div class="sub-price text-center">
                     <h4 class="text-inverse" style="font-weight:bold; padding:20px">Passenger Return Details</h4>
                  </div>
               </div>

               <hr>
               <div class="invoice-header">
                  <div class="invoice-from">
                     <table class="mt-3" width="100%">                        
                        <tr>
                           <td><h6 class="text-inverse">Pick Up Address:</td>
                           <td><h6 class="text-inverse ml-3">{{$booking_print->return_pickup_address}}</h6></td>
                        </tr>
                        <tr>
                           <td><h6 class="text-inverse">Drop Address:</td>
                           <td><h6 class="text-inverse ml-3">{{$booking_print->return_drop_address}}</h6></td>
                        </tr>
                        <tr>
                           <td><h6 class="text-inverse">Vehicle Number:</td>
                           <td><h6 class="text-inverse ml-3">{{$booking_print->return_vehicle_number}}</h6></td>
                        </tr>
                        <tr>
                           <td><h6 class="text-inverse">Passengers Count:</td>
                           <td><h6 class="text-inverse ml-3">{{$booking_print->return_passengers_count}}</h6></td>
                        </tr>
                        <tr>
                           <td><h6 class="text-inverse">Departure Date:</td>
                           <td><h6 class="text-inverse ml-3">{{$booking_print->departure_date}}</h6></td>
                        </tr>
                        <tr>
                           <td><h6 class="text-inverse">Departure Time:</td>
                           <td><h6 class="text-inverse ml-3">{{$booking_print->departure_time}}</h6></td>
                        </tr>
                        <tr>
                           <td><h6 class="text-inverse">Other Information:</td>
                           <td><h6 class="text-inverse ml-3">{{$booking_print->other_information}}</h6></td>
                        </tr>
                     </table>               
                  </div>                        
               </div>              
            @endif   
            

         <!-- begin invoice-footer -->
         <div class="invoice-footer mt-5 p-3" style="border-top: 2px solid #A9A9A9; border-bottom: 2px solid #A9A9A9">
            <h6 class="text-center m-b-5 f-w-600">Thank you and have a pleasant journey!</h6>

            <h6 class="text-center m-b-5 f-w-600 mt-3" style="color: #4863A0">Orders are subject to our terms & conditions. We welcome all comments on the service we provide.</h6>
         </div>
         <!-- end invoice-footer -->
         
      </div>
   </div>
</div>












@endsection
