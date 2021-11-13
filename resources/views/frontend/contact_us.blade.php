@extends('frontend.layouts.app')

@section('title', 'CDG Airport taxi Paris| Private Disneyland transfer  | private
cabs services')
@section('meta_description','CDG private transfer from Charles
de Gaulle to Eurodisney for low cost check our rates and book online now
Beauvais, Orly')


@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/contact_us.css') }}">
@endpush

@section('content')


@if ( session()->has('message') )

  <body style="text-align:center; background-color: #C0C0C0">

        <div style="padding: 0 100px 0 100px">

            <h1 style="margin-top:200px;" class="display-4">Thank You!</h1><br>
            <p class="lead"><h4>We appreciate you contacting us. One of our member will get back in touch with you soon!<br><br> Have a great day!</h4></p>
            <hr><br>    
            <p class="lead">
                <a class="btn btn-success btn-md" href="{{url('contact-us')}}" role="button">Go Back to Contact Us Page</a>
            </p>
        </div>
        
    </body>

@else  


    <div class="container-fluid p-0 banner">
        <div class="container">
            <div class="row justify-content-center" style="padding-top: 6rem;">
                <div class="col-12 col-md-5 text-center p-3" style="background: rgba(255, 255, 255, .6);">
                    <h2 class="fw-bold">Taxi and Shuttle from Disneyland</h2>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-3 contact-us">
        <div class="row justify-content-center pt-3">
            <div class="col-12 col-md-10">
                <div class="row">
                    <div class="col-12 col-md">
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

                    <div class="col-12 col-md contact">
                        <h3 class="fw-bold mb-3">Contact Us</h3>
                        
                        <div class="row align-items-center mb-3 form">
                            <div class="col-12 p-4">
                                <form action="{{route('frontend.contact_us.store')}}" method="post">
                                {{csrf_field()}}
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Full Name" required>
                                    </div>

                                    <div class="mb-3">
                                        <input type="email" class="form-control" name="email" aria-describedby="email" placeholder="Email" required>
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="subject" aria-describedby="subject" placeholder="Le sujet de la siscussion" required>
                                    </div>

                                    <div class="mb-4">
                                        <textarea name="message" name="message" rows="6" class="form-control" placeholder="Type your message" required></textarea>
                                    </div>

                                    <div class="row justify-content-center mb-4">
                                        <div class="col-12 col-md-10 text-center">
                                            <div class="g-recaptcha" data-callback="checked" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR" style="display: inline-block;"></div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn text-white rounded submit-btn" style="background-color: #FF9701" disabled>Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container cards" style="margin-top: 2rem; margin-bottom: 2.5rem">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="row">
                    <div class="col-12 col-md-4 mb-4 mb-md-0">
                        <div class="card border-0 card">
                            <a href="{{ route('frontend.booking') }}" class="text-decoration-none text-dark">
                                <img src="{{ url('img/contact/1.png') }}" class="card-img-top img-fluid w-100" alt="...">
                                <div class="card-body text-center">
                                    <h6 class="card-title fw-bold mb-2">CDG to Paris 4 Pax 60 Euro</h6>
                                    <div class="text-end">
                                        <p class="fw-bold" style="color: rgb(255, 151, 1);">Book Now</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 mb-4 mb-md-0">
                        <div class="card border-0 card">
                            <a href="{{ route('frontend.booking') }}" class="text-decoration-none text-dark">
                                <img src="{{ url('img/contact/2.png') }}" class="card-img-top" alt="...">
                                <div class="card-body pb-1 text-center">
                                    <h6 class="card-title fw-bold mb-2">CDG to Disney 4 Pax 60 Euro</h6>
                                    <div class="text-end">
                                        <p class="fw-bold" style="color: rgb(255, 151, 1);">Book Now</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 mb-4 mb-md-0">
                        <div class="card border-0 card">
                            <a href="{{ route('frontend.booking') }}" class="text-decoration-none text-dark">
                                <img src="{{ url('img/contact/3.png') }}" class="card-img-top" alt="...">
                                <div class="card-body pb-1 text-center">
                                    <h6 class="card-title fw-bold mb-2">Orly  to Paris 4 Pax 60 Euro</h6>
                                    <div class="text-end">
                                        <p class="fw-bold" style="color: rgb(255, 151, 1);">Book Now</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>


@endif

@endsection


@push('after-scripts')

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function checked() {
        $('.submit-btn').removeAttr('disabled');
    };
    </script>

@endpush
