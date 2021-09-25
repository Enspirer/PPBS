@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/rates.css') }}">
@endpush

@section('content')

    <div class="container-fluid p-0 banner">
        <div class="container">
            <div class="row justify-content-center" style="padding-top: 6rem;">
                <div class="col-5 text-center p-3" style="background: rgba(255, 255, 255, .6);">
                    <h2 class="fw-bold">Taxi and Shuttle from Disneyland</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h4 class="display-6 text-center">One way Transfer</h4>

        <div class="row mt-4">
            <div class="col-12">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">From</th>
                            <th scope="col">Destination</th>
                            <th scope="col">1-3 Pax</th>
                            <th scope="col">4 Pax</th>
                            <th scope="col">5 Pax</th>
                            <th scope="col">6 Pax</th>
                            <th scope="col">7 Pax</th>
                            <th scope="col">8 Pax</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>CDG</td>
                            <td>Paris</td>
                            <td>60 €</td>
                            <td>65 €</td>
                            <td>70 €</td>
                            <td>75 €</td>
                            <td>80 €</td>
                            <td>90 €</td>
                        </tr>
                        <tr>
                            <td>CDG</td>
                            <td>Disneyland</td>
                            <td>60 €</td>
                            <td>65 €</td>
                            <td>70 €</td>
                            <td>75 €</td>
                            <td>80 €</td>
                            <td>90 €</td>
                        </tr>
                        <tr>
                            <td>Orly</td>
                            <td>Paris</td>
                            <td>60 €</td>
                            <td>65 €</td>
                            <td>70 €</td>
                            <td>75 €</td>
                            <td>80 €</td>
                            <td>90 €</td>
                        </tr>
                        <tr>
                            <td>Orley</td>
                            <td>Disneyland</td>
                            <td>60 €</td>
                            <td>65 €</td>
                            <td>70 €</td>
                            <td>75 €</td>
                            <td>80 €</td>
                            <td>90 €</td>
                        </tr>
                        <tr>
                            <td>Beauvais</td>
                            <td>Paris</td>
                            <td>125 €</td>
                            <td>125 €</td>
                            <td>130 €</td>
                            <td>135 €</td>
                            <td>145 €</td>
                            <td>145 €</td>
                        </tr>
                        <tr>
                            <td>Beauvais</td>
                            <td>Disneyland</td>
                            <td>125 €</td>
                            <td>125 €</td>
                            <td>130 €</td>
                            <td>135 €</td>
                            <td>145 €</td>
                            <td>145 €</td>
                        </tr>
                        <tr>
                            <td>Paris</td>
                            <td>Disneyland</td>
                            <td>75 €</td>
                            <td>75 €</td>
                            <td>80 €</td>
                            <td>80 €</td>
                            <td>90 €</td>
                            <td>90 €</td>
                        </tr>
                        <tr>
                            <td>Paris</td>
                            <td>Paris City Center</td>
                            <td>40 €</td>
                            <td>40 €</td>
                            <td>45 €</td>
                            <td>45 €</td>
                            <td>50 €</td>
                            <td>55 €</td>
                        </tr>
                        <tr>
                            <td>Paris</td>
                            <td>CDG</td>
                            <td>60 €</td>
                            <td>65 €</td>
                            <td>70 €</td>
                            <td>75 €</td>
                            <td>80 €</td>
                            <td>90 €</td>
                        </tr>
                        <tr>
                            <td>Paris</td>
                            <td>Orly</td>
                            <td>50 €</td>
                            <td>55 €</td>
                            <td>60 €</td>
                            <td>60 €</td>
                            <td>65 €</td>
                            <td>70 €</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h4 class="display-6 text-center">Two way Transfer</h4>

        <div class="row mt-4">
            <div class="col-12">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">From</th>
                            <th scope="col">Destination</th>
                            <th scope="col">1-3 Pax</th>
                            <th scope="col">4 Pax</th>
                            <th scope="col">5 Pax</th>
                            <th scope="col">6 Pax</th>
                            <th scope="col">7 Pax</th>
                            <th scope="col">8 Pax</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>CDG</td>
                            <td>Paris</td>
                            <td>60 €</td>
                            <td>65 €</td>
                            <td>70 €</td>
                            <td>75 €</td>
                            <td>80 €</td>
                            <td>90 €</td>
                        </tr>
                        <tr>
                            <td>CDG</td>
                            <td>Disneyland</td>
                            <td>60 €</td>
                            <td>65 €</td>
                            <td>70 €</td>
                            <td>75 €</td>
                            <td>80 €</td>
                            <td>90 €</td>
                        </tr>
                        <tr>
                            <td>Orly</td>
                            <td>Paris</td>
                            <td>60 €</td>
                            <td>65 €</td>
                            <td>70 €</td>
                            <td>75 €</td>
                            <td>80 €</td>
                            <td>90 €</td>
                        </tr>
                        <tr>
                            <td>Orley</td>
                            <td>Disneyland</td>
                            <td>60 €</td>
                            <td>65 €</td>
                            <td>70 €</td>
                            <td>75 €</td>
                            <td>80 €</td>
                            <td>90 €</td>
                        </tr>
                        <tr>
                            <td>Beauvais</td>
                            <td>Paris</td>
                            <td>125 €</td>
                            <td>125 €</td>
                            <td>130 €</td>
                            <td>135 €</td>
                            <td>145 €</td>
                            <td>145 €</td>
                        </tr>
                        <tr>
                            <td>Beauvais</td>
                            <td>Disneyland</td>
                            <td>125 €</td>
                            <td>125 €</td>
                            <td>130 €</td>
                            <td>135 €</td>
                            <td>145 €</td>
                            <td>145 €</td>
                        </tr>
                        <tr>
                            <td>Paris</td>
                            <td>Disneyland</td>
                            <td>75 €</td>
                            <td>75 €</td>
                            <td>80 €</td>
                            <td>80 €</td>
                            <td>90 €</td>
                            <td>90 €</td>
                        </tr>
                        <tr>
                            <td>Paris</td>
                            <td>Paris City Center</td>
                            <td>40 €</td>
                            <td>40 €</td>
                            <td>45 €</td>
                            <td>45 €</td>
                            <td>50 €</td>
                            <td>55 €</td>
                        </tr>
                        <tr>
                            <td>Paris</td>
                            <td>CDG</td>
                            <td>60 €</td>
                            <td>65 €</td>
                            <td>70 €</td>
                            <td>75 €</td>
                            <td>80 €</td>
                            <td>90 €</td>
                        </tr>
                        <tr>
                            <td>Paris</td>
                            <td>Orly</td>
                            <td>50 €</td>
                            <td>55 €</td>
                            <td>60 €</td>
                            <td>60 €</td>
                            <td>65 €</td>
                            <td>70 €</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    

@endsection
