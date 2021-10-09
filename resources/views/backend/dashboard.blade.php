@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')

<style>
.card-box {
    position: relative;
    color: #fff;
    padding: 20px 10px 40px;
    margin: 20px 0px;
}
.card-box:hover {
    text-decoration: none;
    color: #f1f1f1;
}
.card-box:hover .icon i {
    font-size: 100px;
    transition: 1s;
    -webkit-transition: 1s;
}
.card-box .inner {
    padding: 5px 10px 0 10px;
}
.card-box h3 {
    font-size: 27px;
    font-weight: bold;
    margin: 0 0 8px 0;
    white-space: nowrap;
    padding: 0;
    text-align: left;
}
.card-box p {
    font-size: 15px;
}
.card-box .icon {
    position: absolute;
    top: auto;
    bottom: 5px;
    right: 5px;
    z-index: 0;
    font-size: 72px;
    color: rgba(0, 0, 0, 0.15);
}
.card-box .card-box-footer {
    position: absolute;
    left: 0px;
    bottom: 0px;
    text-align: center;
    padding: 3px 0;
    color: rgba(255, 255, 255, 0.8);
    background: rgba(0, 0, 0, 0.1);
    width: 100%;
    text-decoration: none;
}
.card-box:hover .card-box-footer {
    background: rgba(0, 0, 0, 0.3);
}
.bg-blue {
    background-color: #00c0ef !important;
}
.bg-green {
    background-color: #00a65a !important;
}
.bg-orange {
    background-color: #f39c12 !important;
}
.bg-red {
    background-color: #d9534f !important;
}
</style>



<div class="container">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card-box" style="background-color: #403F48; border-radius: 15px 15px 15px 15px;">
                <div class="inner">
                    <h3> {{ $bookings_pending }} </h3>
                    <p> New Bookings </p>
                </div>
                <div class="icon">
                    <i class="fas fa-plane-departure mb-4 mr-2" aria-hidden="true"></i>
                </div>
                <a href="{{url('admin/tour_booking')}}" class="card-box-footer" style="border-radius: 0px 0px 15px 15px;">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>        
        <div class="col-lg-3 col-sm-6">
            <div class="card-box" style="background-color: #596C68; border-radius: 15px 15px 15px 15px;">
                <div class="inner">
                    <h3> {{ $bookings }} </h3>
                    <p> All Bookings </p>
                </div>
                <div class="icon">
                    <i class="fas fa-plane-departure mb-4 mr-2" aria-hidden="true"></i>
                </div>
                <a href="{{url('admin/tour_booking')}}" class="card-box-footer" style="border-radius: 0px 0px 15px 15px;">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box" style="background-color: #95A792; border-radius: 15px 15px 15px 15px;">
                <div class="inner">
                    <h3> {{ $users }} </h3>
                    <p> Registered Users </p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus mb-4 mr-2"></i>
                </div>
                <a href="{{url('admin/auth/user')}}" class="card-box-footer" style="border-radius: 0px 0px 15px 15px;">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box" style="background-color: #A0937D; border-radius: 15px 15px 15px 15px;">
                <div class="inner">
                    <h3> {{ $contactus }} </h3>
                    <p> New Inquiries </p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-comments mb-4 mr-2" aria-hidden="true"></i>
                </div>
                <a href="{{url('admin/contact_us')}}" class="card-box-footer" style="border-radius: 0px 0px 15px 15px;">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>    
@endsection
