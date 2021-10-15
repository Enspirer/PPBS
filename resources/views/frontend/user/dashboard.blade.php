@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('css/user_dashboard.css') }}">
@endpush

<section id="agent-tabs">
    <div class="container">
        <div class="">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="flex-shrink-0 p-3 bg-white" style="">
                            <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                                <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
                                <span class="fs-5 fw-semibold">Bookings</span>
                            </a>
                            <ul class="nav mb-3 mt-2" id="pills-tab" role="tablist">
                                <li class="nav-item me-3 upcoming mt-2" role="presentation" style="padding: 5px;background: #eeeeee;border-radius: 18px;">
                                    <a class="nav-link active" id="pills-upcoming-tab" data-bs-toggle="pill" data-bs-target="#pills-upcoming" type="button" role="tab" aria-controls="pills-upcoming" aria-selected="false">Upcoming Bookings</a>
                                </li>
                                <li class="nav-item me-3 completed mt-2" role="presentation" style="padding: 5px;background: #eeeeee;border-radius: 18px;">
                                    <a class="nav-link" id="pills-completed-tab" data-bs-toggle="pill" data-bs-target="#pills-completed" type="button" role="tab" aria-controls="pills-completed" aria-selected="false">Completed Bookings</a>
                                </li>
                                <li class="nav-item me-3 cancelled mt-2" role="presentation" style="padding: 5px;background: #eeeeee;border-radius: 18px;">
                                    <a class="nav-link" id="pills-cancelled-tab" data-bs-toggle="pill" data-bs-target="#pills-cancelled" type="button" role="tab" aria-controls="pills-cancelled" aria-selected="false">Cancelled Bookings</a>
                                </li>
                                <!-- <li class="nav-item me-3 draft mt-2" role="presentation" style="padding: 5px;background: #eeeeee;border-radius: 18px;">
                                    <a class="nav-link" id="pills-draft-tab" data-bs-toggle="pill" data-bs-target="#pills-draft" type="button" role="tab" aria-controls="pills-draft" aria-selected="false">Draft Bookings</a>
                                </li> -->
                            </ul>
                        </div>

                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">

                                <div class="tab-content mt-2" id="pills-tabContent">

                                    <div class="tab-pane fade show active" id="pills-upcoming" role="tabpanel" aria-labelledby="pills-upcoming-tab">
                                        
                                        <table class="table table-striped table-bordered" id="villadatatable" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Booking Type</th>
                                                    <th scope="col">Booking Number</th>
                                                    <th scope="col">Pickup Date</th>
                                                    <th scope="col">Total Price</th>
                                                    <th scope="col">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>

                                    </div>


                                    <div class="tab-pane fade" id="pills-completed" role="tabpanel" aria-labelledby="pills-completed-tab">
                                        
                                        <table class="table table-striped table-bordered" id="villadatatable2" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Booking Type</th>
                                                    <th scope="col">Booking Number</th>
                                                    <th scope="col">Pickup Date</th>
                                                    <th scope="col">Total Price</th>
                                                    <th scope="col">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>

                                    </div>

                                    <div class="tab-pane fade" id="pills-cancelled" role="tabpanel" aria-labelledby="pills-cancelled-tab">
                                       
                                        <table class="table table-striped table-bordered" id="villadatatable3" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Booking Type</th>
                                                    <th scope="col">Booking Number</th>
                                                    <th scope="col">Pickup Date</th>
                                                    <th scope="col">Total Price</th>
                                                    <th scope="col">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>

                                    </div>

                                    <div class="tab-pane fade" id="pills-draft" role="tabpanel" aria-labelledby="pills-draft-tab">
                                        
                                        <table class="table table-striped table-bordered" id="villadatatable4" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Booking Type</th>
                                                    <th scope="col">Booking Number</th>
                                                    <th scope="col">Pickup Date</th>
                                                    <th scope="col">Total Price</th>
                                                    <th scope="col">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>    


    <script>
        let color;

        $('#agent-tabs .nav-item').on('mouseenter', function(){
            color = $(this).children('.nav-link').css('color');
            $(this).css('backgroundColor', color);
            $(this).children('.nav-link').css('color' , 'white');
        }).on('mouseleave', function() {
            $(this).css('backgroundColor', '');
            $(this).children('.nav-link').css('color' , color);
        });
    </script>

    

    <script type="text/javascript">
        $(function () {
            var table = $('#villadatatable').DataTable({
                processing: true,
                ajax: "{{route('frontend.user.pending.getPendingDetails')}}",
                serverSide: true,
                order: [[0, "desc"]],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'booking_type', name: 'booking_type'},
                    {data: 'booking_number', name: 'booking_number'},
                    {data: 'pickup_date', name: 'pickup_date'},
                    {data: 'total_price', name: 'total_price'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            }); 
        });

        $(function () {
            var table = $('#villadatatable2').DataTable({
                processing: true,
                ajax: "{{route('frontend.user.completed.getCompletedDetails')}}",
                serverSide: true,
                order: [[0, "desc"]],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'booking_type', name: 'booking_type'},
                    {data: 'booking_number', name: 'booking_number'},
                    {data: 'pickup_date', name: 'pickup_date'},
                    {data: 'total_price', name: 'total_price'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            }); 
        });

        $(function () {
            var table = $('#villadatatable3').DataTable({
                processing: true,
                ajax: "{{route('frontend.user.cancelled.getCancelledDetails')}}",
                serverSide: true,
                order: [[0, "desc"]],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'booking_type', name: 'booking_type'},
                    {data: 'booking_number', name: 'booking_number'},
                    {data: 'pickup_date', name: 'pickup_date'},
                    {data: 'total_price', name: 'total_price'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            }); 
        });

        $(function () {
            var table = $('#villadatatable4').DataTable({
                processing: true,
                ajax: "{{route('frontend.user.draft.getDraftDetails')}}",
                serverSide: true,
                order: [[0, "desc"]],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'booking_type', name: 'booking_type'},
                    {data: 'booking_number', name: 'booking_number'},
                    {data: 'pickup_date', name: 'pickup_date'},
                    {data: 'total_price', name: 'total_price'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            }); 
        });
    </script>

@endsection
