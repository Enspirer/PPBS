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
                        <tr>
                            <td scope="row">Booking ID</td>
                            <td>{{ $book->id}}</td>
                        </tr>
                        <tr>
                            <td scope="row">Booking Type</td>
                            <td>{{ $book->booking_type}}</td>
                        </tr>

                        <tr>
                            <td scope="row">Pickup From</td>
                            <td>{{ App\Models\Location::where('id', $book->pickup_from)->first()->name}}</td>
                        </tr>

                        <tr>
                            <td scope="row">Destination</td>
                            <td>{{ App\Models\Location::where('id', $book->destination)->first()->name}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
