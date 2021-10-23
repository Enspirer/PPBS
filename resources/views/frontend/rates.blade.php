@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/rates.css') }}">
@endpush

@section('content')

    <div class="container-fluid p-0 banner">
        <div class="container">
            <div class="row justify-content-center" style="padding-top: 6rem;">
                <div class="col-12 col-md-5 text-center p-3" style="background: rgba(255, 255, 255, .6);">
                    <h2 class="fw-bold">Taxi and Shuttle from Disneyland</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <h4 class="display-6 text-center">One way Transfer</h4>

        <div class="row mt-4">
            <div class="col-12">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">From</th>
                            <th scope="col">Destination</th>
                            <!-- <th scope="col">1-3</th> -->

                            @foreach(App\Models\Passengers::get() as $key => $packs)                

                                    <th scope="col">{{ $packs->name }}</th>
                                    
                            @endforeach

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($oneway_rates as $key => $oneway)
                            <tr>
                                <td>{{ App\Models\Location::where('id',$oneway->start_point)->first()->name }}</td>
                                <td>{{ App\Models\Location::where('id',$oneway->end_point)->first()->name }}</td>
                                
                                
                                @foreach(json_decode($oneway->price_details) as $key => $price)
                                
                                    <td>€ {{ $price->price }}</td>
                                @endforeach
                                
                            </tr>
                        @endforeach
                        
                        
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
                            <!-- <th scope="col">1-3 Pax</th> -->
                            @foreach(App\Models\Passengers::get() as $key => $packs)                

                                    <th scope="col">{{ $packs->name }}</th>
                                    
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($return_rates as $key => $return)
                            <tr>
                                <td>{{ App\Models\Location::where('id',$return->start_point)->first()->name }}</td>
                                <td>{{ App\Models\Location::where('id',$return->end_point)->first()->name }}</td>
                                    
                                @foreach(json_decode($return->price_details) as $key => $price)
                                    <td>€ {{ $price->price }}</td>
                                @endforeach
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    

@endsection
