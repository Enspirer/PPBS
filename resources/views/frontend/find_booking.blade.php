@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/find_booking.css') }}">
@endpush

@section('content')

    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-8">
                <table class="table table-bordered table-striped ">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" style="width:50%;">Title</th>
                            <th scope="col" style="width:50%;">Information</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($booking->booking_type == 'One Way')
                            <tr>
                                <td scope="row">Booking ID</td>
                                <td>{{ $booking->id}}</td>
                            </tr>
                            <tr>
                                <td scope="row">Booking Type</td>
                                <td>{{ $booking->booking_type}}</td>
                            </tr>

                            <tr>
                                <td scope="row">Pickup From</td>
                                <td>{{ App\Models\Location::where('id', $booking->pickup_from)->first()->name}}</td>
                            </tr>

                            <tr>
                                <td scope="row">Destination</td>
                                <td>{{ App\Models\Location::where('id', $booking->destination)->first()->name}}</td>
                            </tr>

                            <tr>
                                <td scope="row">Pickup Date</td>
                                <td>{{ $booking->pickup_date}}</td>
                            </tr>

                            <tr>
                                <td scope="row">Pickup Time</td>
                                <td>{{ $booking->pickup_time}}</td>
                            </tr>

                            <tr>
                                <td scope="row">Adults</td>
                                <td>{{ $booking->adults}}</td>
                            </tr>

                            <tr>
                                <td scope="row">Children</td>
                                <td>{{ $booking->child}}</td>
                            </tr>

                            <tr>
                                <td scope="row">Babies</td>
                                <td>{{ $booking->baby}}</td>
                            </tr>

                            <tr>
                                <td scope="row">Arrival Vehicle Number</td>
                                <td>{{ $booking->vehicle_number}}</td>
                            </tr>

                            <tr>
                                <td scope="row">Discount</td>
                                <td>{{ $booking->discount}}</td>
                            </tr>

                            <tr>
                                <td scope="row">Number of Luggages</td>
                                <td>{{ $booking->number_of_luggages}}</td>
                            </tr>

                            <tr>
                                <td scope="row">Total Passengers</td>
                                <td>{{ $booking->passengers_count}}</td>
                            </tr>

                            <tr>
                                <td scope="row">Total Price</td>
                                <td><span>€</span>{{ $booking->total_price}}<span>.00</span></td>
                            </tr>
                        @else

                            <tr>
                                <td scope="row">Booking ID</td>
                                <td>{{ $booking->id}}</td>
                            </tr>
                            <tr>
                                <td scope="row">Booking Type</td>
                                <td>{{ $booking->booking_type}}</td>
                            </tr>

                            <tr>
                                <td scope="row">Pickup From</td>
                                <td>{{ App\Models\Location::where('id', $booking->pickup_from)->first()->name}}</td>
                            </tr>

                            <tr>
                                <td scope="row">Destination</td>
                                <td>{{ App\Models\Location::where('id', $booking->destination)->first()->name}}</td>
                            </tr>

                            <tr>
                                <td scope="row">Pickup Date</td>
                                <td>{{ $booking->pickup_date}}</td>
                            </tr>

                            <tr>
                                <td scope="row">Pickup Time</td>
                                <td>{{ $booking->pickup_time}}</td>
                            </tr>

                            <tr>
                                <td scope="row">Adults</td>
                                <td>{{ $booking->adults}}</td>
                            </tr>

                            <tr>
                                <td scope="row">Children</td>
                                <td>{{ $booking->child}}</td>
                            </tr>

                            <tr>
                                <td scope="row">Babies</td>
                                <td>{{ $booking->baby}}</td>
                            </tr>

                            <tr>
                                <td scope="row">Arrival Vehicle Number</td>
                                <td>{{ $booking->vehicle_number}}</td>
                            </tr>

                            <tr>
                                <td scope="row">Discount</td>
                                <td>{{ $booking->discount}}</td>
                            </tr>

                            <tr>
                                <td scope="row">Number of Luggages</td>
                                <td>{{ $booking->number_of_luggages}}</td>
                            </tr>

                            <tr>
                                <td scope="row">Total Passengers</td>
                                <td>{{ $booking->passengers_count}}</td>
                            </tr>

                            <tr>
                                <td scope="row">Total Price</td>
                                <td><span>€</span>{{ $booking->total_price}}<span>.00</span></td>
                            </tr>

                            <tr>
                                <td scope="row">Departure Date</td>
                                <td>{{ $booking->departure_date}}</td>
                            </tr>
                            <tr>
                                <td scope="row">Departure Time</td>
                                <td>{{ $booking->departure_time}}</td>
                            </tr>
                            <tr>
                                <td scope="row">Return Pickup Address</td>
                                <td>{{ $booking->return_pickup_address}}</td>
                            </tr>
                            <tr>
                                <td scope="row">Return Drop Address</td>
                                <td>{{ $booking->return_drop_address}}</td>
                            </tr>
                            <tr>
                                <td scope="row">Departure Vehicle Number</td>
                                <td>{{ $booking->return_vehicle_number}}</td>
                            </tr>
                            <tr>
                                <td scope="row">Return Passengers Count</td>
                                <td>{{ $booking->return_passengers_count}}</td>
                            </tr>
                            <tr>
                                <td scope="row">Other Information</td>
                                <td>{{ $booking->other_information}}</td>
                            </tr>
                            <tr>
                                <td scope="row">Payment Method</td>
                                <td>{{ $booking->payment_method}}</td>
                            </tr>


                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
