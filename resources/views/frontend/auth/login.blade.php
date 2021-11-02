@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))


@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/login.css') }}">
@endpush


@section('content')

    <div class="container-fluid p-0 banner">
        <div class="container">
            <div class="row pt-5">
                <div class="col-12 col-md-4 p-4 log">
                    <h5 class="text-center fw-bold">Login to your account</h5>
                    <form action="{{route('frontend.auth.login.post')}}" method="post">
                    {{csrf_field()}}

                        <div class="row mt-4">
                            <div class="mb-3">
                            
                                    {{ html()->email('email')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.email'))
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                            </div>

                            <div class="mb-3">

                                    {{ html()->password('password')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.password'))
                                        ->required() }}
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6">
                                <div class="form-check">
                                    {{ html()->label(html()->checkbox('remember', true, 1) . ' ' . __('labels.frontend.auth.remember_me'))->for('remember') }}
                                      
                                </div>
                            </div>

                            <div class="col-6 text-start text-md-right">
                                <a href="{{ route('frontend.auth.password.reset') }}" class="text-decoration-none text-dark" style="font-size: 0.9rem">@lang('labels.frontend.passwords.forgot_password')</a>
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
