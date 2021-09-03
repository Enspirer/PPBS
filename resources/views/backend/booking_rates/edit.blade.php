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

               
                @foreach(json_decode($booking_rates->price_details) as $book)                   
                    <div class="form-group">
                        <label class="fw-bold">{{ $pass->name }}</label>
                        <input type="hidden" class="form-control" name="name[]" value="{{ $book->name }}" required>
                        <input type="number" class="form-control" name="price[]" value="{{ $book->price }}" required>
                    </div>
                @endforeach
               
                    
                </div>
            </div>    
        </div>  
    </div>
</form>
<br><br>

  


@endsection
