@extends('backend.layouts.app')

@section('title', __('Create New'))

@section('content')

<form action="{{route('admin.booking_rates.store')}}" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6">
            
            {{csrf_field()}}

                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="fw-bold">Booking Type</label>
                            <select class="form-control" name="booking_type" required>
                                <option value="" selected disabled>Select...</option> 
                                <option value="One Way">One Way</option>   
                                <option value="Return">Return</option>                                
                            </select>
                        </div>
                            
                        <div class="form-group">
                            <label class="fw-bold">Start Point</label>
                            <select class="form-control" name="start_point" required>
                                <option value="" selected disabled>Select...</option> 
                                @foreach($location as $locate) 
                                    <option value="{{ $locate->id }}">{{ $locate->name }}</option>  
                                @endforeach                              
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="fw-bold">End Point</label>
                            <select class="form-control" name="end_point" required>
                                <option value="" selected disabled>Select...</option> 
                                @foreach($location as $locate) 
                                    <option value="{{ $locate->id }}">{{ $locate->name }}</option>  
                                @endforeach                              
                            </select>
                        </div>                   
                                                        
                        
                    </div>
                </div>
                <button type="submit" class="btn btn-success pull-right">Create New</button><br>
                
                <br>
        
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-body">

                @foreach($passengers as $pass)
                    <div class="form-group">
                        <label class="fw-bold">{{ $pass->name }}</label>
                        <input type="hidden" class="form-control" name="name[]" value="{{ $pass->name }}" required>
                        <input type="hidden" class="form-control" name="count[]" value="{{ $pass->count }}" required>
                        <input type="number" class="form-control" name="price[]" required>
                    </div>
                @endforeach
                    
                </div>
            </div>    
        </div>  
    </div>
</form>
<br><br>

  


@endsection
