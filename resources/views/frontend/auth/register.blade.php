@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.register_box_title'))

@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/login.css') }}">
@endpush

@section('content')
    <div class="container-fluid p-0 banner">
        <div class="container">
            <div class="row pt-5">
                <div class="col-12 col-md-7 p-4 log">
                    <h5 class="text-center fw-bold mb-3">Create an account</h5>
                    <form action="{{ route('frontend.auth.register.post') }}" method="post">
                    {{csrf_field()}}

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    {{ html()->text('first_name')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.first_name'))
                                        ->attribute('maxlength', 191)
                                        ->required()}}
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    {{ html()->text('last_name')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.last_name'))
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    {{ html()->email('email')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.email'))
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="phone" aria-describedby="phone" placeholder="Mobile Number" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    {{ html()->password('password')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.password'))
                                        ->required() }}
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    {{ html()->password('password_confirmation')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                                        ->required() }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12" style="padding-left: 40px;">
                                <div class="mb-3">
                                    <div class="form-check mb-3" id="flexCheckRegister">
                                        <input class="form-check-input" type="checkbox" value="">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            I accept <a href="#" style="color: #1F1A7D;">privacy policy</a> and <a href="#" style="color: #1F1A7D;">general conditions</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row align-items-center">
                            <div class="col-6">
                                <button class="btn w-100 text-white" style="background-color: #FF9701">Sign Up</button>
                            </div>

                            <div class="col-6">
                                <p style="font-size: 0.9rem">Already have an account? <a href="{{ route('frontend.auth.login') }}" class="text-decoration-none" style="color: #1F1A7D;">Login here</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
    @if(config('access.captcha.registration'))
        @captchaScripts
    @endif
@endpush
