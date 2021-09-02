@extends('backend.layouts.app')

@section('title', __('Booking Rates'))

@section('content')
    

<div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <strong>Booking Rates&nbsp;</strong>

                    <div class="btn btn-info pull-right ml-3" data-toggle="modal" data-target="#exampleModal">Add New</div>
                   
                </div><!--card-header-->

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="villadatatable" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Booking Type</th>
                                <th scope="col">Start Point</th>
                                <th scope="col">End Point</th>
                                <th scope="col">1-4 Price</th>
                                <th scope="col">5-8 Price</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->


    <!-- Modal insert -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
         
                <form action="{{route('admin.booking_rates.store')}}" method="post">
                
                    {{csrf_field()}}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

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

                        <div class="form-group">
                            <label class="fw-bold">1-4 Persons Price</label>
                            <input type="number" class="form-control" name="one_four_price" required>
                        </div>
                        <div class="form-group">
                            <label class="fw-bold">5-8 Persons Price</label>
                            <input type="number" class="form-control" name="five_eight_price" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" value="Add New">
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- Modal edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <span id="form_result"></span>
                <form action="{{route('admin.booking_rates.update')}}" method="post">
                   
                    {{csrf_field()}}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                       
                        <div class="form-group">
                            <label class="fw-bold">Booking Type</label>
                            <select class="form-control" name="booking_type" id="booking_type" required>
                                <option value="One Way">One Way</option>   
                                <option value="Return">Return</option>                                
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="fw-bold">Start Point</label>
                            <select class="form-control" name="start_point" id="start_point" required>
                                @foreach($location as $locate) 
                                    <option value="{{ $locate->id }}">{{ $locate->name }}</option>  
                                @endforeach                              
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="fw-bold">End Point</label>
                            <select class="form-control" name="end_point" id="end_point" required>
                                @foreach($location as $locate) 
                                    <option value="{{ $locate->id }}">{{ $locate->name }}</option>  
                                @endforeach                              
                            </select>
                        </div>

                        

                        <div class="form-group">
                            <label class="fw-bold">1-4 Persons Price</label>
                            <input type="number" class="form-control" name="one_four_price" id="one_four_price" required>
                        </div>
                        <div class="form-group">
                            <label class="fw-bold">5-8 Persons Price</label>
                            <input type="number" class="form-control" name="five_eight_price" id="five_eight_price" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" name="action_button" id="action_button" value="Update">
                    </div>
                </form>

            </div>
        </div>
    </div>

     <!-- Modal delete -->
     <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="ModalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form name="importform" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-header">
                        <h3 class="modal-title" id="ModalDeleteLabel">Delete</h3>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Are you sure you want to remove This?</h5>
                        </div>                        

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" name="ok_button" id="ok_button">Delete</button>
                       
                    </div>
                </form>

            </div>
        </div>
    </div>
    

    <script type="text/javascript">
        $(function () {
            var table = $('#villadatatable').DataTable({
                processing: true,
                ajax: "{{route('admin.booking_rates.getDetails')}}",
                serverSide: true,
                order: [[0, "desc"]],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'booking_type', name: 'booking_type'},
                    {data: 'start_point', name: 'start_point'},
                    {data: 'end_point', name: 'end_point'},
                    {data: 'one_four_price', name: 'one_four_price'},
                    {data: 'five_eight_price', name: 'five_eight_price'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $(document).on('click', '.edit', function(){

            var user_id;

            var user_id = $(this).attr('id');
            $('#form_result').html('');
            $.ajax({
            url :"booking_rates/edit/"+user_id,

            dataType:"json",
            success:function(data)
            {
                $('#booking_type').val(data.result.booking_type);
                $('#start_point').val(data.result.start_point);
                $('#end_point').val(data.result.end_point);
                $('#one_four_price').val(data.result.one_four_price);
                $('#five_eight_price').val(data.result.five_eight_price);
                $('#hidden_id').val(user_id);
                $('#editModal').modal('show');
            }
            })
            });    

            var user_id;

            $(document).on('click', '.delete', function(){
            user_id = $(this).attr('id');
            $('#confirmModal').modal('show');
            });

            $('#ok_button').click(function(){
            $.ajax({
            url:"booking_rates/destroy/"+user_id,
            
            success:function(data)
            {
                setTimeout(function(){
                $('#confirmModal').modal('hide');
                $('#villadatatable').DataTable().ajax.reload();
                });
            }
            })
            });

          
        });
    </script>



@endsection
