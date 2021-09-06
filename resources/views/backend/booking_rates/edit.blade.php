@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')

<form action="{{route('admin.booking_rates.update')}}" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6">
            
            {{csrf_field()}}

                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="fw-bold">Booking Type</label>
                            <select class="form-control" name="booking_type" required>
                                <option value="" selected disabled>Select...</option> 
                                <option value="One Way" {{ $booking_rates->booking_type == 'One Way' ? "selected" : ""  }}>One Way</option>   
                                <option value="Return" {{ $booking_rates->booking_type == 'Return' ? "selected" : ""  }}>Return</option>                                
                            </select>
                        </div>
                            
                        <div class="form-group">
                            <label class="fw-bold">Start Point</label>
                            <select class="form-control" name="start_point" required>
                                <option value="" selected disabled>Select...</option> 
                                @foreach($location as $locate) 
                                    <option value="{{ $locate->id }}" {{ $booking_rates->start_point == $locate->id ? "selected" : ""  }}>{{ $locate->name }}</option>  
                                @endforeach                              
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="fw-bold">End Point</label>
                            <select class="form-control" name="end_point" required>
                                <option value="" selected disabled>Select...</option> 
                                @foreach($location as $locate) 
                                    <option value="{{ $locate->id }}" {{$booking_rates->end_point == $locate->id ? "selected" : ""  }}>{{ $locate->name }}</option>  
                                @endforeach                              
                            </select>
                        </div>                   
                                                        
                        
                    </div>
                </div>
                <input type="hidden" class="form-control" name="hidden_id" value="{{ $booking_rates->id }}" required>
                <button type="submit" class="btn btn-success pull-right">Update</button><br>
                
                <br>
        
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-body">

               
                @if($passengers_count == $booking_rates_count)
                    @foreach(json_decode($booking_rates->price_details) as $book)                   
                        <div class="form-group">
                            <label class="fw-bold">{{ $book->name }}</label>
                            <input type="hidden" class="form-control" name="name[]" value="{{ $book->name }}" required>
                            <input type="hidden" class="form-control" name="count[]" value="{{ $book->count }}" required>
                            <input type="number" class="form-control" name="price[]" value="{{ $book->price }}" required>
                        </div>
                    @endforeach
                @elseif($booking_rates->price_details == null) 
                    @foreach($passengers as $pass)
                        <div class="form-group">
                            <label class="fw-bold">{{ $pass->name }}</label>
                            <input type="hidden" class="form-control" name="name[]" value="{{ $pass->name }}" required>
                            <input type="hidden" class="form-control" name="count[]" value="{{ $pass->count }}" required>
                            <input type="number" class="form-control" name="price[]" required>
                        </div>
                    @endforeach                
                @else           
                
                <div align="center" class="mb-4 p-3" style="border: 1px solid black; border-radius: 10px; box-shadow: 3px 3px 4px grey;">
                    <p style="color:red">There are new changes in passengers system. Press 'Reset' button If you want to reset these booking rates and adding new changes in here.</p>
                    <a href="{{route('admin.booking_rates.reset',$booking_rates->id)}}" type="button" class="btn rounded-pill px-4 py-2 me-2 btn-warning">Reset</a>
                </div>

                        @foreach(json_decode($booking_rates->price_details) as $book)                   
                        <div class="form-group">
                            <label class="fw-bold">{{ $book->name }}</label>
                            <input type="hidden" class="form-control" name="name[]" value="{{ $book->name }}" required>
                            <input type="hidden" class="form-control" name="count[]" value="{{ $book->count }}" required>
                            <input type="number" class="form-control" name="price[]" value="{{ $book->price }}" required>
                        </div>
                        @endforeach
               
                @endif

                
               
                    
                </div>
            </div>    
        </div>  
    </div>
</form>
<br><br>

  


@endsection
