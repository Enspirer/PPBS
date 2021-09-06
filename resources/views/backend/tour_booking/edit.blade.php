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
                                        <!-- <div class="col-12"> -->
                                            <div class="row">
                                                <div class="col-6">
                                                    <h5 class="d-inline-block mb-0 py-2 px-4 text-light" style="background-color: #94ca60;"><span class="mr-2">&#8364;</span>{{ $tour_booking->total_price }}</h5>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-end">
                                                        <h5 class="d-inline-block mb-0 py-2 px-4 text-light" style="background-color: #94ca60;">{{ $tour_booking->booking_type }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- </div> -->

                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <table class="table table-hover table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td width="25%" style="font-weight: 600;">Name</td>
                                                            <td>{{ $tour_booking->customer_title }}.&nbsp;{{ $tour_booking->customer_name }}</td>                                                         
                                                        </tr>                                                                                                             
                                                        <tr>
                                                            <td width="25%" style="font-weight: 600;">Email</td>
                                                            <td>{{ $tour_booking->customer_email }}</td>                                                         
                                                        </tr>
                                                        <tr>
                                                            <td width="25%" style="font-weight: 600;">Phone Number</td>
                                                            <td>{{ $tour_booking->customer_telephone }}</td>                                                         
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="row mt-4 pe-0">
                                            <div class="col-8">
                                                <table class="table table-hover table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td width="25%" style="font-weight: 600;">Pickup From:</td>
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
                                                        <tr>
                                                            <td style="font-weight: 600;">Booked Date:</td>
                                                            <td>{{ $tour_booking->created_at->toDateString() }}</td>
                                                        </tr>
                                                        <!-- <tr>
                                                            <td style="font-weight: 600;">Discount:</td>
                                                            <td></td>
                                                        </tr> -->
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
                                        <!-- <div class="row">
                                            <div class="col-2 pe-0">
                                                <p style="font-weight: 600; color: #212529">Description:</p>
                                            </div>
                                            <div class="col-10 pe-0">
                                                <p style="color: #212529;"></p>
                                            </div>          
                                        </div> -->
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-md-5 p-1">
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
    </form>






<br><br>
@endsection
