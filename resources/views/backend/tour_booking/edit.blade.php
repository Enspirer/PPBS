@extends('backend.layouts.app')

@section('title', __('Approval'))

@section('content')
    
    <form action="{{route('admin.tour_booking.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row px-2 py-3">
                                                                        
                                    <!-- <div class="row"> -->
                                        
                                        <div class="row">
                                            <div class="col-12">
                                                <table class="table table-hover table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td width="25%" style="font-weight: 600;">Name:</td>
                                                            <td>{{ $tour_booking->customer_title }}&nbsp;{{ $tour_booking->customer_name }}</td>                                                         
                                                        </tr>                                                                                                             
                                                        <!-- <tr>
                                                            <td width="25%" style="font-weight: 600;">Email</td>
                                                            <td>{{ $tour_booking->customer_email }}</td>                                                         
                                                        </tr> -->
                                                        <tr>
                                                            <td width="25%" style="font-weight: 600;">Phone Number:</td>
                                                            <td>{{ $tour_booking->customer_telephone }}</td>                                                         
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="row mt-1 pe-0">
                                            <div class="col-8">
                                                <table class="table table-hover table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td width="30%" style="font-weight: 600;">Pickup From:</td>
                                                            @if(App\Models\Location::where('id',$tour_booking->pickup_from)->first() == null)
                                                                <td><span class="badge badge-danger">Location Deleted</span></td>
                                                            @elseif(App\Models\Location::where('id',$tour_booking->pickup_from)->first()->status == 'Disabled')
                                                                <td>
                                                                    <span class="badge badge-warning">{{ App\Models\Location::where('id',$tour_booking->pickup_from)->first()->name }} &nbsp; ( Location Disabled )</span>
                                                                </td>
                                                            @else
                                                                <td>{{ App\Models\Location::where('id',$tour_booking->pickup_from)->first()->name }}</td>
                                                            @endif                                                            
                                                        </tr>
                                                                                                             
                                                        <tr>
                                                            <td style="font-weight: 600;">Destination:</td>
                                                            @if(App\Models\Location::where('id',$tour_booking->destination)->first() == null)
                                                                <td><span class="badge badge-danger">Location Deleted</span></td>
                                                            @elseif(App\Models\Location::where('id',$tour_booking->destination)->first()->status == 'Disabled')
                                                                <td>
                                                                    <span class="badge badge-warning">{{ App\Models\Location::where('id',$tour_booking->destination)->first()->name }} &nbsp; ( Location Disabled )</span>
                                                                </td>
                                                            @else
                                                                <td>{{ App\Models\Location::where('id',$tour_booking->destination)->first()->name }}</td>
                                                            @endif 
                                                        </tr>
                                                        <!-- <tr>
                                                            <td style="font-weight: 600;">Booked Date:</td>
                                                            <td>{{ $tour_booking->created_at->toDateString() }}</td>
                                                        </tr> -->
                                                        <tr>
                                                            <td style="font-weight: 600;">Pick Up Date:</td>
                                                            <td>{{ $tour_booking->pickup_date }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 600;">Pick Up Time:</td>
                                                            <td>{{ $tour_booking->pickup_time }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-4">
                                                <table class="table table-hover table-borderless">
                                                    <tbody>                                                      
                                                        <tr>
                                                            <td style="font-weight: 600;">Adults:</td>
                                                            <td>{{ $tour_booking->adults }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 600;">Child:</td>
                                                            <td>{{ $tour_booking->child }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 600;">Baby:</td>
                                                            <td>{{ $tour_booking->baby }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 600;">Total Passengers:</td>
                                                            <td>{{ $tour_booking->passengers_count }}</td>
                                                        </tr>  
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-12">
                                                <table class="table table-hover table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td width="25%" style="font-weight: 600;">Pick Up Address:</td>
                                                            <td>{{ $tour_booking->pickup_address }}</td>                                                         
                                                        </tr>  
                                                        <tr>
                                                            <td width="25%" style="font-weight: 600;">Drop Address;</td>
                                                            <td>{{ $tour_booking->drop_address }}</td>                                                         
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row mt-1 pe-0">
                                            <div class="col-6">
                                                <table class="table table-hover table-borderless">
                                                    <tbody>                                                        
                                                        <tr>
                                                            <td width="50%" style="font-weight: 600;">Vehicle Number:</td>
                                                            <td>{{ $tour_booking->vehicle_number }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-6">
                                                <table class="table table-hover table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td style="font-weight: 600;">Number of Luggages:</td>
                                                            <td>{{ $tour_booking->number_of_luggages }}</td>
                                                        </tr>  
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <table class="table table-hover table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td width="15%" style="font-weight: 600;">Other:</td>
                                                            <td>{{ $tour_booking->other_information }}</td>
                                                        </tr>  
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-md-5 px-2 pt-1">
                
                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">
                            <div class="row mt-1">
                                <div class="col-12">
                                    <table class="table table-hover table-borderless">
                                        <tbody>
                                            <tr>
                                                <td width="50%" style="font-weight: 600;">Total Amount:</td>
                                                <td><span class="mr-2">&#8364;</span>{{ $tour_booking->total_price }}</td>                                                         
                                            </tr>  
                                            <tr>
                                                <td  style="font-weight: 600;">Payment Method:</td>
                                                <td>{{ $tour_booking->payment_method }}</td>                                                         
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600;">Booking type:</td>
                                                <td>{{ $tour_booking->booking_type }}</td>                                                         
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="Approved" {{ $tour_booking->status == 'Approved' ? "selected" : "" }}>Approve</option>   
                                    <option value="Disapproved" {{ $tour_booking->status == 'Disapproved' ? "selected" : "" }}>Disapprove</option> 
                                    <option value="Pending" {{ $tour_booking->status == 'Pending' ? "selected" : "" }}>Pending</option>                               
                                </select>
                            </div>

                            <div class="mt-5 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $tour_booking->id }}"/>
                                <a href="{{route('admin.tour_booking.index')}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        @if($tour_booking->booking_type == 'Return')
            <div class="row">
                <div class="col-md-7 p-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row px-2 py-3">                                                                        
                                    
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <h5 class="d-inline-block mb-0 py-2 px-4">Passenger Return Details</h5>
                                                    <hr>
                                                </div>
                                            </div>
                                            
                                            <div class="row mt-1">
                                                <div class="col-12">
                                                    <table class="table table-hover table-borderless">
                                                        <tbody>
                                                            <tr>
                                                                <td width="25%" style="font-weight: 600;">Pick Up Address:</td>
                                                                <td>{{ $tour_booking->return_pickup_address }}</td>                                                         
                                                            </tr>  
                                                            <tr>
                                                                <td width="25%" style="font-weight: 600;">Drop Address:</td>
                                                                <td>{{ $tour_booking->return_drop_address }}</td>                                                         
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row mt-1 pe-0">
                                                <div class="col-6">
                                                    <table class="table table-hover table-borderless">
                                                        <tbody>                                                        
                                                            <tr>
                                                                <td width="50%" style="font-weight: 600;">Departure Date:</td>
                                                                <td>{{ $tour_booking->departure_date }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="font-weight: 600;">Departure Time:</td>
                                                                <td>{{ $tour_booking->departure_time }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-6">
                                                    <table class="table table-hover table-borderless">
                                                        <tbody>
                                                            <tr>
                                                                <td style="font-weight: 600;">Vehicle Number:</td>
                                                                <td>{{ $tour_booking->return_vehicle_number }}</td>
                                                            </tr>  
                                                            <tr>
                                                                <td style="font-weight: 600;">Total Passengers:</td>
                                                                <td>{{ $tour_booking->return_passengers_count }}</td>
                                                            </tr> 
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div> 
                                    
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                
            </div>

        @endif

    </form>






<br><br>
@endsection
