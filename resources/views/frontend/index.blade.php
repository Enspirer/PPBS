@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<!-- <div class="container-fluid" > -->
<h1 class="display-4 text-center" style="color:#455A64; font-weight: 400; font-family: Roboto,Helvetica,Arial,sans-serif;">Tour Booking</h1>

    <div class="row mb-4 d-flex justify-content-center" style="margin-top:50px;">
        <div class="col-4">
            <div class="card mb-5">
                <div class="card-header text-light" style="background-color:#1565c0;">
                    <h4 style="font-size: 24px; font-weight: 100; margin:0">Book Your Ride!</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('frontend.booking.store')}}" method="post" >
                    {{csrf_field()}}

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="booking_type" value="One Way" id="flexRadioDefault1" onchange="myFunctionr()">
                            <label class="form-check-label" for="flexRadioDefault1">
                                One Way
                            </label>                        
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="booking_type" value="Return" id="flexRadioDefault2" onchange="myFunctionr()">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Return
                            </label>                        
                        </div>

                        <div class="form-group mt-4">
                            <label>Pickup From</label>
                            <select class="form-control" id="pickup_from" name="pickup_from" required onchange="myFunctionr()">
                                <option value="" selected disabled>Select...</option> 
                                @foreach($location as $locate) 
                                    <option value="{{ $locate->id }}">{{ $locate->name }}</option>  
                                @endforeach                              
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Destination</label>
                            <select class="form-control" id="destination" name="destination" required onchange="myFunctionr()">
                                <option value="" selected disabled>Select...</option> 
                                @foreach($location as $locate) 
                                    <option value="{{ $locate->id }}">{{ $locate->name }}</option>  
                                @endforeach                              
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Passengers</label>

                            <div class="row mt-3">
                                <div class="col-4">
                                <label style="font-size:14px;">Adults</label>
                                    <select class="form-control" id="adults" name="adults" required onchange="myFunctionr()">
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
                                <label style="font-size:14px;">Child</label>
                                    <select class="form-control" id="child" name="child" required onchange="myFunctionr()">
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
                                <label style="font-size:14px;">Baby</label>
                                    <select class="form-control" name="baby" id="baby"  required onchange="myFunctionr()">
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

                        <div class="form-group mt-4">
                            <h1 class="display-4" style="color:#ff5252; font-weight: 500;" onchange="myFunctionr()"><span>&#8364;</span>
                            <span id="result">0.00</span></h1>                        
                        </div>

                        <input type="hidden" name="result_value" id="result_value">
                        <input type="submit" class="btn btn-secondary" value="Complete Your Booking">
                    </form>


                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->


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
                console.log(obj.price);
                // console.log(status);
                // alert("Data: " + output + "\nStatus: " + status);
                $('#result').html(obj.price);
                $('#result_value').val(obj.price);

            }
            
        );
    }

</script>
<!-- </div> -->
@endsection


@push('after-scripts')
<script>

// $('#baby').change(function(){
//     var settings = {
//     "url": "{{url('/')}}/api/api_booking",
//     "method": "POST",
//     "timeout": 0,
//     "dataType": "json",
//     };

//     $.ajax(settings).done(function (response) {
//         console.log(response);
//     });
  
// });



</script>




@endpush  

