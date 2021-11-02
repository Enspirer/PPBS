<div class="fixed-top">

    <div class="container-fluid py-2 top-nav" style="background-color: #DFDFDF;">
        <div class="container">
            <div class="row justify-content-sm-start justify-content-lg-end" style="width: 1100px;">
                <div class="col-12 text-center col-lg-3 text-lg-end">
                    <p><i class="bi bi-envelope-fill me-2"></i>info@parisprivatetransfer.com</p>
                </div>

                <div class="col-12 text-center col-lg-2 text-lg-end">
                    <p><i class="bi bi-telephone-fill me-2"></i></i>0033652300255</p>
                </div>

                @auth
                         <a href="{{route('frontend.auth.login')}}" class="" style="width: 90px;color: black"><p style="width: 50px;"><i></i>Dashboard</p></a>
                         <a href="{{route('frontend.auth.logout')}}" class="" style="width: 60px;color: black;"><p style="width: 50px;"><i></i>Logout</p></a>
                @else
                        <a href="{{route('frontend.auth.login')}}" class="" style="width: 60px;color: black"><p style="width: 30px;"><i></i>Login</p></a>
                        <a href="{{route('frontend.auth.register')}}" class="" style="width: 60px;color: black;"><p style="width: 30px;"><i></i>Register</p></a>
                @endauth



            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-light navbar-light p-0 bottom-nav">
        <div class="container position-relative">
            <a class="navbar-brand" href="{{ route('frontend.index') }}">
                <img src="{{ url('img/logo.png') }}" alt="" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto py-4 align-items-center">
                    <li class="nav-item links mb-1 mb-md-0">
                        <a class="nav-link text-decoration-none text-dark p-0 {{ Request::segment(1) == null ? 'active' : null }}" aria-current="page" href="{{ route('frontend.index') }}">HOME</a>
                    </li>
                    <li class="nav-item links mb-1 mb-md-0">
                        <a class="nav-link text-decoration-none text-dark p-0 {{ Request::segment(1) == 'rates' ? 'active' : null }}" href="{{ route('frontend.rates') }}">RATES</a>
                    </li>
                    <li class="nav-item links mb-1 mb-md-0">
                        <a class="nav-link text-decoration-none text-dark p-0 {{ Request::segment(1) == 'online-booking' ? 'active' : null }}" href="{{ route('frontend.booking') }}">ONLINE BOOKING</a>
                    </li>
                    <li class="nav-item links mb-3 mb-md-0">
                        <a class="nav-link text-decoration-none text-dark p-0 {{ Request::segment(1) == 'contact-us' ? 'active' : null }}" href="{{ route('frontend.contact_us') }}">CONTACT</a>
                    </li>
                    <li class="nav-item links mb-3 mb-md-0">
                        <a class="nav-link text-decoration-none text-dark btn rounded-pill px-4" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" style="border: 1px solid rgb(31, 26, 125);">Booking Tracker</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</div>


<form action="{{ route('frontend.find_booking') }}" method="POST" id="modal">
    {{ @csrf_field()}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Find My Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <input type="text" class="form-control" id="booking_id" name="booking_id" aria-describedby="booking_id" onchange="Find_Booking_Function()" placeholder="Booking Number" required>
                    </div>

                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Email Address" onchange="Find_Booking_Function()" required>
                    </div>

                    <div>
                        <p class="fw-bold" id="error" style="color: red;"></p>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn text-white rounded submit_button" id="submit_button" style="background-color: #FF9701" disabled>Booking Tracker</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- <script>

    function validate_booking_id(){
        alert('model');
    }

</script> -->

<script>

    function Find_Booking_Function(){


        booking_id = $('#booking_id').val();
        // alert(booking_id);
        email = $('#email').val();
        // alert(email);

        $.post("{{url('/')}}/api/api_find_booking",
            {
                booking_id: booking_id,
                email: email
            },
            function(booking, status){
                // console.log(booking);

                var obj = JSON.parse(booking);

                if(obj != 'no_data') {
                    $('.submit_button').removeAttr('disabled');
                    $('#error').text('');
                }

                else {
                    $('.submit_button').attr('disabled', 'disabled');;
                    $('#error').text('Please provide the correct booking id and email');
                }

            }

        );
    }


    // function remove() {
    //     alert('dfd');
    // }



</script>



