@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))


@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/login.css') }}">
@endpush


@section('content')

    <div class="container-fluid p-0 banner">
        <div class="container">
            <div class="row justify-content-center" style="padding-top: 7rem">
                <div class="col-12 col-md-5 p-4 log">
                    <h5 class="text-center fw-bold">Password Reset</h5>
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
                        </div>

                        <div>
                            <button class="btn w-100 text-white mt-2" style="background-color: #FF9701">Send Password Reset Link</button>
                        </div>
                    </form>
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
