@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
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
                            <ul class="list-unstyled ps-0" style="padding-left: 30px;">
                                <li class="mb-1" style="padding: 5px;background: #ff9701;color: white;border-radius: 18px;">
                                    <a class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                                        Upcoming Booking
                                    </a>
                                </li>

                                <li class="mb-1" style="padding: 5px;background: #eeeeee;border-radius: 18px;">
                                    <a class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                                        Completed Bookings
                                    </a>
                                </li>

                                <li class="mb-1" style="padding: 5px;background: #eeeeee;border-radius: 18px;">
                                    <a class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                                        Settings
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection
