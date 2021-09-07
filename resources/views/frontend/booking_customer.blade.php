@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
<!-- <div class="container-fluid pt-3" style="background-color:#ededed"> -->
    
    <form action="{{route('frontend.booking_customer.store')}}" method="post" >
    {{csrf_field()}}
        <div class="row" style="margin-top:10px;">
            <div class="col-3 ">
                <div class="row p-4">
                    
                        <div class="card" style="background-color:#ededed">
                            <div class="card-header" style="background-color:#ffe192;">
                                <div class="row">
                                    <!-- <div class="col-6"> -->
                                        <h4 class="mb-3" style="font-size: 24px; font-weight: 100; margin:0">Your Price</h4>
                                    <!-- </div>
                                    <div class="col-6"> -->
                                        <h4 style="font-weight: 500;" onchange="myFunctionr()"><span>&#8364;</span>
                                        <span id="result">{{ $booking->total_price }}</span></h4> 
                                    <!-- </div>-->
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{route('frontend.booking.store')}}" method="post" >
                                {{csrf_field()}}

                                
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="booking_type" value="One Way" id="flexRadioDefault1" onchange="myFunctionr()" {{ $booking->booking_type == 'One Way' ? "checked" : "" }}>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            One Way
                                        </label>                        
                                    </div>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="radio" name="booking_type" value="Return" id="flexRadioDefault2" onchange="myFunctionr()" {{ $booking->booking_type == 'Return' ? "checked" : "" }}>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Return
                                        </label>                        
                                    </div>

                                    <div class="form-group mt-4">
                                        <label>Pickup From</label>
                                        <select class="form-control" id="pickup_from" name="pickup_from" required onchange="myFunctionr()">
                                            @foreach($location as $locate) 
                                                <option value="{{ $locate->id }}" {{ $booking->pickup_from == $locate->id ? "selected" : "" }}>{{ $locate->name }}</option>  
                                            @endforeach                              
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Destination</label>
                                        <select class="form-control" id="destination" name="destination" required onchange="myFunctionr()">
                                            @foreach($location as $locate) 
                                                <option value="{{ $locate->id }}" {{ $booking->destination == $locate->id ? "selected" : "" }}>{{ $locate->name }}</option>  
                                            @endforeach                              
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Passengers</label>

                                        <div class="row mt-3">
                                            <div class="col-4">
                                            <label style="font-size:14px;">Adults</label>
                                                <select class="form-control" id="adults" name="adults" required onchange="myFunctionr()"> 
                                                        <!-- <option value="0" {{ $booking->adults == 0 ? "selected" : "" }}>1</option> -->
                                                        <option value="1" {{ $booking->adults == 1 ? "selected" : "" }}>1</option>
                                                        <option value="2" {{ $booking->adults == 2 ? "selected" : "" }}>2</option>
                                                        <option value="3" {{ $booking->adults == 3 ? "selected" : "" }}>3</option>
                                                        <option value="4" {{ $booking->adults == 4 ? "selected" : "" }}>4</option>
                                                        <option value="5" {{ $booking->adults == 5 ? "selected" : "" }}>5</option>
                                                        <option value="6" {{ $booking->adults == 6 ? "selected" : "" }}>6</option>
                                                        <option value="7" {{ $booking->adults == 7 ? "selected" : "" }}>7</option>
                                                        <option value="8" {{ $booking->adults == 8 ? "selected" : "" }}>8</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                            <label style="font-size:14px;">Child</label>
                                                <select class="form-control" id="child" name="child" required onchange="myFunctionr()"> 
                                                        <option value="0" {{ $booking->child == 0 ? "selected" : "" }}>0</option> 
                                                        <option value="1" {{ $booking->child == 1 ? "selected" : "" }}>1</option>
                                                        <option value="2" {{ $booking->child == 2 ? "selected" : "" }}>2</option>
                                                        <option value="3" {{ $booking->child == 3 ? "selected" : "" }}>3</option>
                                                        <option value="4" {{ $booking->child == 4 ? "selected" : "" }}>4</option>
                                                        <option value="5" {{ $booking->child == 5 ? "selected" : "" }}>5</option>
                                                        <option value="6" {{ $booking->child == 6 ? "selected" : "" }}>6</option>
                                                        <option value="7" {{ $booking->child == 7 ? "selected" : "" }}>7</option>
                                                        <option value="8" {{ $booking->child == 8 ? "selected" : "" }}>8</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                            <label style="font-size:14px;">Baby</label>
                                                <select class="form-control" name="baby" id="baby"  required onchange="myFunctionr()">
                                                        <option value="0" {{ $booking->baby == 0 ? "selected" : "" }}>0</option> 
                                                        <option value="1" {{ $booking->baby == 1 ? "selected" : "" }}>1</option>
                                                        <option value="2" {{ $booking->baby == 2 ? "selected" : "" }}>2</option>
                                                        <option value="3" {{ $booking->baby == 3 ? "selected" : "" }}>3</option>
                                                        <option value="4" {{ $booking->baby == 4 ? "selected" : "" }}>4</option>
                                                        <option value="5" {{ $booking->baby == 5 ? "selected" : "" }}>5</option>
                                                        <option value="6" {{ $booking->baby == 6 ? "selected" : "" }}>6</option>
                                                        <option value="7" {{ $booking->baby == 7 ? "selected" : "" }}>7</option>
                                                        <option value="8" {{ $booking->baby == 8 ? "selected" : "" }}>8</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <input type="hidden" name="result_value" id="result_value">
                                    <!-- <input type="submit" class="btn btn-secondary" value="Complete You Booking"> -->
                                </form>


                            </div>
                        </div>
                    
                </div>
            </div>



            <div class="col-9">
                <div class="row p-4" >
                        <div class="card" style="background-color:#ededed">
                            <div class="card-header" style="background-color:#ffe192;">
                                <h4 style="font-size: 24px; font-weight: 100; margin:0">Personal Details</h4>
                            </div>
                            <div class="card-body">
                                

                                    <div class="form-group">
                                        <div class="row mt-3">
                                            <div class="col-2">
                                            <label style="font-size:14px;">Title</label>
                                                <select class="form-control" id="title" name="title" required> 
                                                    <option value="" selected disabled>Select...</option> 
                                                    <option value="Mr">Mr</option> 
                                                    <option value="Mrs">Mrs</option>
                                                    <option value="Miss">Miss</option>
                                                    <option value="Ms">Ms</option>  
                                                </select>
                                            </div>
                                            <div class="col-6">
                                            <label style="font-size:14px;">Full Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Name" required>
                                            </div>
                                            <div class="col-4">
                                            <label style="font-size:14px;">Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row mt-3">
                                            <div class="col-3">
                                            <label style="font-size:14px;">Mobile Number</label>
                                                <input type="number" class="form-control" name="telephone" placeholder="Mobile Number" required>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center mt-5">
                                        <input type="hidden" name="hidden_id" value="{{ $booking->id }}">
                                        <input type="submit" class="btn" value="Book Now" style="background-color:#ffe192;">
                                    </div>                          


                            </div>
                        </div>
                </div>
            </div>

        </div>
    </form>
<!-- </div> -->
    

<script>

    function myFunctionr(){

        if($('#flexRadioDefault1').is(':checked')) {
            checkbox = $("#flexRadioDefault1").val();
        }

        if($('#flexRadioDefault2').is(':checked')) {
            checkbox = $("#flexRadioDefault2").val();
        }
        // console.log(checkbox);
        // alert(checkbox);

        pickup_from = $('#pickup_from').val();
        // console.log(pickup_from);
        destination = $('#destination').val();
        // console.log(destination);
        adults = $('#adults').val();
        // console.log(adults);
        child = $('#child').val();
        // console.log(child);
        baby = $('#baby').val();
        // console.log(baby);

        // alert(pickup_from);

        // var obj = JSON.parse(data);

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
                // console.log(obj.price);
                // console.log(status);
                // alert("Data: " + output + "\nStatus: " + status);
                $('#result').html(obj.price);
                $('#result_value').val(obj.price);

            }
            
        );
    }

</script>


@endsection


@push('after-scripts')

@endpush  

