@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/index.css') }}">
@endpush

@section('content')

    <div class="container-fluid p-0 banner">
        <div class="container">
            <div class="row justify-content-end pt-5 banner-row">
                <div class="col-12 col-lg-5 p-4 cal">
                    <h5>Book Your Ride Now</h5>
                    <form action="{{route('frontend.booking.store')}}" method="post">
                    {{csrf_field()}}

                        <div class="row mt-4">
                            <div class="col-12 col-md-8">
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
                                    @foreach($location as $locate) 
                                        <option value="{{ $locate->id }}">{{ $locate->name }}</option>  
                                    @endforeach   
                                </select>
                            </div>

                            <div class="col-6">
                                <p class="mb-2">Destination Place</p>
                                <select class="form-control" id="destination" name="destination" required onchange="myFunction()">
                                    <option value="" selected disabled>Select...</option> 
                                    @foreach($location as $locate) 
                                        <option value="{{ $locate->id }}">{{ $locate->name }}</option>  
                                    @endforeach  
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-6">
                                <p class="mb-2">Pickup Date</p>
                                <input type="date" class="form-control" name="pickup_date" id="pickup_date">
                            </div>

                            <div class="col-6">
                                <p class="mb-2">Pickup Time</p>
                                <input type="time" class="form-control" name="pickup_time" id="pickup_time">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 col-md-8">
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
                                            <option value="0">0</option>  
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
                                            <option value="0">0</option>   
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
                            <div class="col-12">
                                <div class="row align-items-center">
                                    <div class="col-4">
                                        <input type="hidden" name="result_value" id="result_value">
                                        <input type="submit" class="btn text-white rounded" style="background-color: #FF9701" value="BOOK NOW"></input>
                                    </div>
                                    <div class="col-8 text-end">
                                        <h4 class="fw-bold price" onchange="myFunction()">
                                            <span>€</span><span id="result">0</span><span>.00</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="container cards" style="margin-top: 2rem;">
        <div class="row">
            <div class="col-12 col-md-4 index-card">
                <div class="card border-0 shadow-lg">
                    <img src="{{ url('img/index/card-1.png') }}" class="card-img-top" alt="...">
                    <div class="card-body pb-1">
                        <h5 class="card-title fw-bold mb-2">Disneyland Private Transfer</h5>
                        <p class="card-text">We provide a private taxi service from Charles de Gaulle to Disneyland Paris 42 KM a ride with our experienced drivers at a low cost and all Disney hotels are serviced. Enjoy Disneyland with us because we care about the comfort and safety of your children.</p>

                        <div class="text-end">
                            <a href="#" class="btn p-0"><i class="bi bi-arrow-right-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 index-card">
                <div class="card border-0 shadow-lg">
                    <img src="{{ url('img/index/card-2.png') }}" class="card-img-top" alt="...">
                    <div class="card-body pb-1">
                        <h5 class="card-title fw-bold mb-2">Paris Airport Transport</h5>
                        <p class="card-text">Do you need a private taxi from Charles De Gaulle to Paris city center, it is 32 KM Distance. Paris private transfer drivers welcome you personally, assist and guide you to visit the most beautiful places in the city of Paris. We offer the best prices for reduced cost online booking.</p>

                        <div class="text-end">
                            <a href="#" class="btn p-0"><i class="bi bi-arrow-right-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 index-card">
                <div class="card border-0 shadow-lg">
                    <img src="{{ url('img/index/card-3.png') }}" class="card-img-top" alt="...">
                    <div class="card-body pb-1">
                        <h5 class="card-title fw-bold mb-2">Beauvais Airport Transfer</h5>
                        <p class="card-text">The cheapest direct shuttle from Beauvais airport to Disneyland Paris for your budget. The journey time is 90 minutes. Distance 120 KM from Beauvais Tille airport to Euro disney Val d 'Europe Marne la Valle.</p>

                        <div class="text-end" style="margin-top: 1.4rem;">
                            <a href="#" class="btn p-0"><i class="bi bi-arrow-right-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container tower" style="margin-top: 1rem;">
        <div class="container">
            <div class="row justify-content-center pt-5">
                <div class="col-12 col-md-10">
                    <div class="row">
                        <div class="col-12 col-md">
                            <h3 class="fw-bold mb-3" style="color: #1F1A7D">About Us</h3>
                            <p style="text-align: justify">Paris Private Transfer is a specializing private passengers transport services in France we offer services from Paris CDG Airport to Disneyland, Orly, Beauvais with Clean, comfortable and modern vehicles. Our drivers are professional and friendly competent people, speaking English and well trained to ensure a safe trip. We cover a wide range of destinations, always the right choice for a one-way trip or a return trip to Euro disney Paris Orly Paris Beauvais</p>

                            <button class="btn text-white rounded mt-4" style="background-color: #FF9701">CONTACT US<i class="bi bi-arrow-right text-white ms-3"></i></button>
                        </div>

                        <div class="col-12 col-md-1"></div>

                        <div class="col-12 col-md services">
                            <h3 class="fw-bold mb-3" style="color: #1F1A7D">Our Services</h3>
                            
                            <div class="row align-items-center mb-3">
                                <div class="col-2 text-center">
                                    <img src="{{ url('img/index/ser-1.png') }}" alt="" class="img-fluid">
                                </div>
                                <div class="col-9">
                                    <h6 class="fw-bold mb-2" style="color: #1F1A7D;">CDG Paris Transfer</h6>
                                    <p>Private taxi reception service between CDG airport and the city of Paris.</p>
                                </div>

                                <div class="col-12">
                                    <hr class="mt-3 mb-0">
                                </div>
                                
                            </div>

                            <div class="row align-items-center mb-3">
                                <div class="col-2 text-center">
                                    <img src="{{ url('img/index/ser-2.png') }}" alt="" class="img-fluid">
                                </div>
                                <div class="col-9">
                                    <h6 class="fw-bold mb-2" style="color: #1F1A7D;">Paris Disneyland Transfer</h6>
                                    <p>From CDG Charles de Galle airport to Disney 9 seater minivan services</p>
                                </div>

                                <div class="col-12">
                                    <hr class="mt-3 mb-0">
                                </div>
                            </div>

                            <div class="row align-items-center mb-3">
                                <div class="col-2 text-center">
                                    <img src="{{ url('img/index/ser-3.png') }}" alt="" class="img-fluid">
                                </div>
                                <div class="col-9">
                                    <h6 class="fw-bold mb-2" style="color: #1F1A7D;">Orly Airport transfer</h6>
                                    <p>From Orly airport to disney, quality of private & shared shuttle services</p>
                                </div>

                                <div class="col-12">
                                    <hr class="mt-3 mb-0">
                                </div>
                            </div>

                            <div class="row align-items-center mb-3">
                                <div class="col-2 text-center">
                                    <img src="{{ url('img/index/ser-4.png') }}" alt="" class="img-fluid">
                                </div>
                                <div class="col-9">
                                    <h6 class="fw-bold mb-2" style="color: #1F1A7D;">Paris Beauvais Tille Transfer</h6>
                                    <p>Direct from BVE Airport Beauvais to Disney private cabs service</p>
                                </div>
                            </div>

                            <button class="btn text-white rounded mt-4" style="background-color: #FF9701">BOOK NOW<i class="bi bi-arrow-right text-white ms-3"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container slider" style="margin-top: 1rem;">
        <h2 class="fw-bold text-center mb-4" style="color: #1F1A7D">Booking a private taxi Paris</h2>
        
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="row">
                        <div class="col-12 position-relative py-4 px-5 slide">
                            <img src="{{ url('img/index/quote.png') }}" alt="" class="quote">
                            <h5 class="d-inline-block mb-2">Charles de Gaulle to Euro Disney</h5>
                            <p style="text-align: justify;">Reliable and convenient, the private airport transfer is booked directly with us. Free baby seats, guaranteed family, pleasant private taxi, competitive rates, no waiting fees, payment on arrival.</p>
                        </div>
                    </div>
                    
                </div>

                <div class="swiper-slide">
                    <div class="row">
                        <div class="col-12 position-relative py-4 px-5 slide">
                            <img src="{{ url('img/index/quote.png') }}" alt="" class="quote">
                            <h5 class="d-inline-block mb-2">Orly Airport to Disneyland Paris</h5>
                            <p style="text-align: justify;">If you are looking for Cheapest private Taxi service in Orly.paris private transfer.com offer you best service. Baby seats for children free we do not ask your credit card for the reservation payment can directly to the driver at the end of the transfer.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>


@endsection


@push('after-scripts')
<script>

    function myFunction(){

        if($('#flexRadioDefault1').is(':checked')) {
            checkbox = $("#flexRadioDefault1").val();
        }

        if($('#flexRadioDefault2').is(':checked')) {
            checkbox = $("#flexRadioDefault2").val();
        }
        // console.log(checkbox);
        // alert(checkbox);

        pickup_from = $('#pickup_from').val();
        destination = $('#destination').val();
        adults = $('#adults').val();
        child = $('#child').val();
        baby = $('#baby').val();


        $.post("{{url('/')}}/api/api_booking",
            {
                booking_type: checkbox,
                pickup_from: pickup_from,
                destination: destination,
                adults: adults,
                child: child,
                baby: baby
            },
            function(output, status){                

                var obj = JSON.parse(output);
                $('#result').html(obj.price);
                
                $('#result_value').val(obj.price);

            }
            
        );
    }

</script>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 2,
        spaceBetween: 50,
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        breakpoints: {

            0: {
                slidesPerView: 1,
            },

            576: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            }
        },
    });
</script>
@endpush  

