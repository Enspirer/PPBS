@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/contact_us.css') }}">
@endpush

@section('content')

    <div class="container-fluid p-0 banner">
        <div class="container">
            <div class="row justify-content-center" style="padding-top: 6rem;">
                <div class="col-5 text-center p-3" style="background: rgba(255, 255, 255, .6);">
                    <h2 class="fw-bold">Taxi and Shuttle from Disneyland</h2>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-3">
        <div class="row justify-content-center pt-5">
            <div class="col-10">
                <div class="row">
                    <div class="col">
                        <h3 class="fw-bold mb-3">Information</h3>

                        <div class="row align-items-center mb-3 py-3 information">
                            <div class="col-2 text-center">
                                <img src="{{ url('img/index/ser-1.png') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-10">
                                <h6 class="fw-bold mb-2" style="color: #1F1A7D;">How to find the driver at Paris airport?</h6>
                                <p style="font-size: 0.8rem;">The driver will meet you at the exit gate near the meeting point with your name on it. Don't worry if your flight is delayed, we'll watch you.</p>
                            </div>
                        </div>

                        <div class="row align-items-center mb-3 py-3 information">
                            <div class="col-2 text-center">
                                <img src="{{ url('img/index/ser-1.png') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-10">
                                <h6 class="fw-bold mb-2" style="color: #1F1A7D;">Payment Easy booking, online quote</h6>
                                <p style="font-size: 0.8rem;">Choose the payment method and select the pick-up and destination address as well as the number of passengers. After your reservation you will receive a confirmation by e-mail. Payment can be made on arrival in cash or via Pay Pal.</p>
                            </div>
                        </div>

                        <div class="row align-items-center mb-3 py-3 information">
                            <div class="col-2 text-center">
                                <img src="{{ url('img/index/ser-1.png') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-10">
                                <h6 class="fw-bold mb-2" style="color: #1F1A7D;">Free baby and child seats and luggage</h6>
                                <p style="font-size: 0.8rem;">CDG Door to Door private Transport Service for Disneyland paris hotels low budget convenience of family guaranteed.Free cancellation order with within 3 hours before the Arrival time.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-1"></div>

                    <div class="col services">
                        <h3 class="fw-bold mb-3">Contact Us</h3>
                        
                        <div class="row align-items-center mb-3 form">
                            <div class="col-12 p-4">
                                <form action="">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Full Name" required>
                                    </div>

                                    <div class="mb-3">
                                        <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Email" required>
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="subject" aria-describedby="subject" placeholder="Le sujet de la siscussion" required>
                                    </div>

                                    <div class="mb-3">
                                        <textarea name="message" id="message" rows="6" class="form-control" placeholder="Type your message" required></textarea>
                                    </div>

                                    <button class="btn text-white rounded mt-4" style="background-color: #FF9701">Submit</button>
                                </form>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 6rem;">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row">
                    <div class="col-4">
                        <div class="card border-0 card">
                            <img src="{{ url('img/contact/1.png') }}" class="card-img-top img-fluid w-100" alt="...">
                            <div class="card-body pb-1 text-center">
                                <h6 class="card-title fw-bold mb-2">CDG to Paris 4 Pax 60 Euro</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card border-0 card">
                            <img src="{{ url('img/contact/2.png') }}" class="card-img-top" alt="...">
                            <div class="card-body pb-1 text-center">
                                <h6 class="card-title fw-bold mb-2">CDG to Disney 4 Pax 60 Euro</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card border-0 card">
                            <img src="{{ url('img/contact/3.png') }}" class="card-img-top" alt="...">
                            <div class="card-body pb-1 text-center">
                                <h6 class="card-title fw-bold mb-2">Orly  to Paris 4 Pax 60 Euro</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

@endsection
