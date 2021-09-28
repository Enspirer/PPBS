@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))


@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/login.css') }}">
@endpush


@section('content')

    <div class="container-fluid p-0 banner">
        <div class="container">
            <div class="row pt-5">
                <div class="col-4 p-4 log">
                    <h5 class="text-center fw-bold">Login to your account</h5>
                    <form action="{{route('frontend.booking.store')}}" method="post">
                    {{csrf_field()}}

                        <div class="row mt-4">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="name" aria-describedby="name" name="username" placeholder="Username or Email">
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="name" aria-describedby="name" name="password" placeholder="Password">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Remember Me
                                    </label>
                                </div>
                            </div>

                            <div class="col-6 text-end">
                                <a href="#" class="text-decoration-none text-dark" style="font-size: 0.9rem">Forgot Password?</a>
                            </div>
                        </div>

                        <div>
                            <button class="btn w-100 text-white mt-4" style="background-color: #FF9701">Login</button>
                        </div>
                    </form>

                    <div class="row align-items-center">
                        <div class="col pe-0">
                            <hr>
                        </div>
                        <div class="col-1 p-0 text-center">
                            <p>or</p>
                        </div>
                        <div class="col ps-0">
                            <hr>
                        </div>
                    </div>


                    <div class="row">
                        <p class="fw-bold">
                            Login with
                        </p>
                    </div>
                    <div class="row justify-content-between mx-0 align-items-center">
                        <div class="col-3 p-2">
                            <div class="row align-items-center bg-white p-2">
                                <div class="col-4 p-0">
                                    <img src="{{ url('img/login/fb.png') }}" alt="" class="img-fluid">
                                </div>
                                <div class="col-8 p-0">
                                    <p style="font-size: 0.8rem">Facebook</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-3 p-2">
                            <div class="row align-items-center bg-white p-2">
                                <div class="col-3 p-0">
                                    <img src="{{ url('img/login/google.png') }}" alt="" class="img-fluid">
                                </div>
                                <div class="col-9 pe-0">
                                    <p style="font-size: 0.8rem">Google</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-3 p-2">
                            <div class="row align-items-center bg-white p-2">
                                <div class="col-3 p-0">
                                    <img src="{{ url('img/login/linked.png') }}" alt="" class="img-fluid">
                                </div>
                                <div class="col-9 pe-0">
                                    <p style="font-size: 0.8rem">LinkedIn</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="mt-2" style="font-size: 0.9rem">Don't have an account? <a href="{{ route('frontend.auth.register') }}" class="text-decoration-none" style="color: #1F1A7D;">Register here</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
    @if(config('access.captcha.login'))
        @captchaScripts
    @endif
@endpush
