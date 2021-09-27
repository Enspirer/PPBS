@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/booking.css') }}">
    <link rel="stylesheet" href="{{ url('css/booking_customer.css') }}">
@endpush

@section('content')

    <div class="container mt-3">
        <div class="row justify-content-center pt-5 text-center">
            <p>Airport Paris rivers Specializing Online GDG Private Taxi & Cabs Booking</p>
            <h2 style="color: #1F1A7D">Book Your Private Taxi Online Now</h2>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <ul id="bar">
                <li class="active">Inquire</li>
                <li class="active">Information</li>
                <li>Payment</li>
                <li>Confirm</li>
            </ul>
            <div class="col-7">
                <form id="booking-form" style="margin-top: 4rem;">
                    <fieldset>
                        <div class="row border" style="color: #1C1952">
                            <div class="col-12 px-5 py-3">
                            <h5>Book Your Ride Now</h5>
                                <div class="row mt-4">
                                    <div class="col-8" >
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="booking_type" value="One Way" id="flexRadioDefault1" onchange="myFunction()" required>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        One Way
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="booking_type" value="Return" id="flexRadioDefault2" onchange="myFunction()">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                       Both Way
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <p class="mb-2">Pickup Place</p>
                                        <select class="form-control" id="pickup_from" name="pickup_from" required onchange="myFunction()">
                                            <option value="" selected disabled>Select...</option> 
                                                <option value=""></option>    
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <p class="mb-2">Destination Place</p>
                                        <select class="form-control" id="destination" name="destination" required onchange="myFunction()">
                                            <option value="" selected disabled>Select...</option> 
                                                <option value=""></option>  
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <p class="mb-2">Pickup Date</p>
                                        <input type="date" class="form-control">
                                    </div>

                                    <div class="col-6">
                                        <p class="mb-2">Pickup Time</p>
                                        <input type="time" class="form-control">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-8">
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="mb-2">Adults</p>
                                                <select class="form-control" id="adults" name="adults" required onchange="myFunction()">
                                                    <option value="" selected disabled>Select...</option>   
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                </select>
                                            </div>

                                            <div class="col-4">
                                                <p class="mb-2">Child</p>
                                                <select class="form-control" id="child" name="child" required onchange="myFunction()">
                                                    <option value="" selected disabled>Select...</option>  
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                </select>
                                            </div>

                                            <div class="col-4">
                                                <p class="mb-2">Baby</p>
                                                <select class="form-control" id="baby" name="baby" required onchange="myFunction()">
                                                    <option value="" selected disabled>Select...</option>    
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-5 mb-4">
                                    <div class="col-8">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <input type="button" class="btn text-white rounded next" style="background-color: #FF9701" value="NEXT"></input>
                                            </div>
                                            <div class="col-6">
                                                <h4 class="fw-bold" onchange="myFunction()">
                                                    <span id="result">€00.00</span>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </fieldset>

                    <fieldset>
                        <div class="row border" style="color: #1C1952">
                            <div class="col-12 px-5 py-3" style="background: rgba(255, 255, 255, .8);">
                            <h5>Book Your Ride Now</h5>
                                <div class="row mt-4">
                                    <div class="col-8" >
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="booking_type" value="One Way" id="one-check" required>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        One Way
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="booking_type" value="Return" id="both-check">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Both Way
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12">
                                        <label for="name" class="form-label">Your Name</label>
                                        <input type="text" class="form-control" name="name" id="name" required>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label for="text" class="form-label">Mobile Number</label>
                                        <input type="text" class="form-control" name="number" id="number" required>
                                    </div>

                                    <div class="col-6">
                                        <label for="name" class="form-label">Arrival Flight or Train Number</label>
                                        <input type="text" class="form-control" name="address" id="address" required>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12">
                                        <label for="name" class="form-label">Pickup Terminal Address</label>
                                        <input type="text" class="form-control" name="address" id="address" required>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12">
                                        <label for="drop_address" class="form-label">Drop Address</label>
                                        <input type="text" class="form-control" name="drop_address" id="drop_address" required>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <p class="mb-2">Number of passengers Total</p>
                                        <select class="form-control" id="total_passengers" name="total_passengers" required>
                                            <option value="" selected disabled>Select...</option>   
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <p class="mb-2">Number of Baby Seats</p>
                                        <select class="form-control" id="baby_seats" name="baby_seats" required>
                                            <option value="" selected disabled>Select...</option>  
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                    </div> 
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <p class="mb-2">Number of Luggage's</p>
                                        <select class="form-control" id="total_passengers" name="total_passengers" required>
                                            <option value="" selected disabled>Select...</option>   
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="both mt-5 d-none">
                                    <h5>Passenger Return Detail</h5>
                                    
                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <p class="mb-2">Departure Date</p>
                                            <input type="date" class="form-control">
                                        </div>
            
                                        <div class="col-6">
                                            <p class="mb-2">Departure Time</p>
                                            <input type="time" class="form-control">
                                        </div>
                                    </div>
            
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <label for="vehicle_number" class="form-label">Departure Flight or Train Number</label>
                                            <input type="text" class="form-control" name="vehicle_number" id="vehicle_number" required>
                                        </div>
                                    </div>
            
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <label for="name" class="form-label">Pickup Place or Address</label>
                                            <input type="text" class="form-control" name="address" id="address" required>
                                        </div>
                                    </div>
            
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <label for="drop_address" class="form-label">Drop Airport or Address</label>
                                            <input type="text" class="form-control" name="drop_address" id="drop_address" required>
                                        </div>
                                    </div>
            
                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <p class="mb-2">Number of passengers Total</p>
                                            <select class="form-control" id="total_passengers" name="total_passengers" required>
                                                <option value="" selected disabled>Select...</option>   
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                            </select>
                                        </div>
                                    </div>
            
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <label for="drop_address" class="form-label">Other Information</label>
                                            <textarea class="form-control" name="other" row="7"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-5 mb-4 justify-content-center">
                                    <div class="col-8">
                                        <div class="row align-items-center">
                                            <div class="col-6 text-center">
                                                <input type="button" class="previous btn text-white rounded" style="background-color: #FF9701" value="PREVIOUS"></input>
                                            </div>

                                            <div class="col-6 text-center">
                                                <input type="button" class="next btn text-white rounded" style="background-color: #FF9701" value="NEXT"></input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="row border banner" style="color: #1C1952">
                            <div class="col-8 px-5 py-3" style="background: rgba(255, 255, 255, .8);">
                                <h5>Payment Information</h5>

                                <div class="row mt-5 mb-4 align-items-center">
                                    <div class="col-6">
                                        <a href="#" class="btn text-decoration-none p-3" style="border: 1px solid #FF9701">Pay upon Arrival</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="btn text-decoration-none px-4" style="background: rgba(101, 101, 101, .6);"><img src="{{ url('img/booking/paypal.png')}}" alt="" style="height: 3rem;"></a>
                                    </div>
                                </div>

                                <div class="row mt-5 mb-4">
                                    <div class="col-12">
                                        <div class="row align-items-center">
                                            <div class="col-4 text-center">
                                                <input type="button" class="previous btn text-white rounded" style="background-color: #FF9701" value="PREVIOUS"></input>
                                            </div>

                                            <div class="col-4 text-center">
                                                <input type="button" class="btn text-white rounded next" style="background-color: #FF9701" value="NEXT"></input>
                                            </div>
                                            <div class="col-4 text-center">
                                                <h4 class="fw-bold" onchange="myFunction()">
                                                    <span id="result">€00.00</span>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="row border banner" style="color: #1C1952">
                            <div class="col-8 px-5 py-3" style="background: rgba(255, 255, 255, .8);">
                                <h5>Confirm your book</h5>

                                <p class="mt-2" style="font-size:0.9rem;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>

                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="radio" name="booking_type" value="One Way" id="flexRadioDefault1" onchange="myFunction()" required>
                                    <label class="form-check-label" for="flexRadioDefault1" style="font-size: 0.9rem;">
                                        Agree with this
                                    </label>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="row align-items-center">
                                            <div class="col-4 text-center">
                                                <input type="button" class="previous btn text-white rounded" style="background-color: #FF9701" value="PREVIOUS"></input>
                                            </div>

                                            <div class="col-4 text-center">
                                                <input type="submit" class="btn text-white rounded" style="background-color: #FF9701" value="BOOK NOW"></input>
                                            </div>
                                            <div class="col-4 text-center">
                                                <h4 class="fw-bold" onchange="myFunction()">
                                                    <span id="result">€00.00</span>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        
    </div>

@endsection


@push('after-scripts')
    <script>

        let current_fs, next_fs, previous_fs;

        $(".previous").click(function(){

            current_fs = $(this).parents('fieldset');
            previous_fs = $(this).parents('fieldset').prev();

            $("#bar li").eq($("fieldset").index(current_fs)).removeClass("active");


            current_fs.animate({
                top: '200px'
            }, 200, function(){

                current_fs.css('top', '0');

                current_fs.hide();

                previous_fs.show();
            });
        });

        $(".next").click(function(){

            current_fs = $(this).parents('fieldset');
            next_fs = $(this).parents('fieldset').next();


            $("#bar li").eq($("fieldset").index(next_fs)).addClass("active");


            current_fs.animate({
                top: '200px'
            }, 200, function(){

                current_fs.css('top', '0');

                current_fs.hide();

                next_fs.show();
            });
        });
    </script>

    <script>
        $('#both-check').on('click', function() {
            $('.both').removeClass('d-none');
        });

        $('#one-check').on('click', function() {
            $('.both').addClass('d-none');
        });
    </script>
@endpush
