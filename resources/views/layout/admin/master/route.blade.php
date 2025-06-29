@extends('layout.auth.master')
@section('contents')


    <!-- page-wrapper Start-->
    @include('paritials.auth.topmenu')
    <!-- Page Header Ends -->

    <!-- Page Body Start-->
    <div class="page-body-wrapper">

        <!-- Page Sidebar Start-->
        @include('paritials.auth.sidemenu')
        <!-- Page Sidebar Ends-->

        <!-- Right sidebar Start-->

        <!-- Right sidebar Ends-->


        <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Route

                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.php"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active">Route</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">

                            <div class="card-body">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-original-title="test" data-bs-target="#exampleModal"><i class="fa fa-plus"></i> Add
                                    Route</button>

                                <div class="btn-popup pull-right">

                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        data-backdrop="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Route</h5>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="" id="form" method="post">
                                                        <div class="form">

                                                            <div class="form-group">
                                                                <label for="validationCustom01" class="mb-1">Select Zonal
                                                                    :</label>
                                                                <select class="custom-select w-100 form-control"
                                                                    name="zonal_id" id="zonal_id" required="">
                                                                    <option value="">--Select--</option>

                                                                    {!! $data->zonaList !!}

                                                                </select>

                                                            </div>

                                                            <div class="form-group">
                                                                <label for="validationCustom01" class="mb-1">Route Name
                                                                    :</label>
                                                                <input class="form-control" id="name" type="text"
                                                                    name="name" required="true">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="validationCustom01"
                                                                    class="mb-1">Status</label>
                                                                <select class="custom-select w-100 form-control"
                                                                    required="" id="status" name="status">


                                                                    <option value="1">Active</option>
                                                                    <option value="0">Inactive</option>

                                                                </select>
                                                                <input type="hidden" name="routeId" value="-1" />
                                                                <input type="hidden" name="createdBy"
                                                                    value="{{ session()->get('userId') }}">
                                                            </div>
                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" id="btnSave"
                                                        type="submit">Save</button>
                                                    <button class="btn btn-secondary" type="button"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <a href="{{ route('route.export') }}" class="btn btn-success px-2 " data-toggle="tooltip" data-placement="top" title="Report" data-original-title="Report"><i
                                    class="fa fa-list"></i> Download Report</a>
                                <div class="datatable-dashv1-list custom-datatable-overright">


                                    <table class="table" id="table" data-click-to-select="true"
                                        data-show-columns="true" data-sort-name="id" data-sort-order="asc"
                                        data-mobile-responsive="true" data-toggle="table" data-sort="true"
                                        data-pagination="true" data-search="true" data-show-refresh="true"
                                        data-key-events="true" data-resizable="true" data-cookie="true"
                                        data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">

                                        <thead>
                                            <tr>
                                                <th data-field="id" data-sortable="true">Route ID</th>
                                                <th data-field="image" data-sortable="true">Zonal</th>
                                                <th data-field="category" data-sortable="true">Route</th>


                                                <th data-field="status" data-sortable="true">Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($data->routeList as $route)
                                            
                                                <tr>
                                                    
                                                    <td>{{str_pad($loop->iteration, 3, '0', STR_PAD_LEFT)}}</td>
                                                    <!--<td>{{ $route->id }}</td>-->
                                                    	<td>
                                                            
                                                            <?php
                                                            
                                                           // dd($route->zonal_id);
                                                            // echo $route->zonal_id;
                                                             
                                                            ?>
                                                            @foreach ($zonal as $zonal1)
                                                             @if($zonal1->id == $route->zonal_id)
                                                             
                                                                {{ $zonal1->name }}
                                                             @endif
                                                              {{-- $rna = App\Models\Zonal::where('id',$route->zonal_id)->get(); --}}
                                                             @endforeach
                                                           
                                                            
                                                            
                                                            </td>
                                                    <td>{{ $route->name }}</td>
												
                                                    <td>

                                                        <label class="switch">
                                                            @if($route->status  == 1){
                                                                <input type="checkbox"
                                                                    onclick="return confirm('you want to Change it?  Please Click Edit Button')"
                                                                    checked id="togBtn">
                                                                }@else{
                                                                    <input type="checkbox"
                                                                    onclick="return confirm('you want to Change it?  Please Click Edit Button')" 
                                                                     id="togBtn">
                                                                }
                                                                @endif
                                                           
                                                            <div class="slider round">                                                              
                                                                    <span class="off">Inactive </span>
                                                               
                                                                    <span class="on">Active</span>
                                                         
                                                                <!--ADDED HTML -->


                                                                <!--END-->
                                                            </div>
                                                        </label>
                                                        
                                                    </td>

                                                    <td><span class="d-flex"> 
                                                        
                                                        
                                                        <button type="button" class="edit_route btn btn-secondary mx-1" value="{{$route->id}}">
                                                            <i class="fa fa-pencil"></i></button>

                                                              
                                                                
                                                                @if (session()->get('log_type') == 'Admin')
                                                                    <form
                                                                    action="{{ route('routedelete', $route->id) }}"
                                                                    method="post">
                                                                    @method('POST')
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-warning mx-1" value="{{$route->id}}"
                                                                        onclick="return confirm('Are you sure, you want to delete it?')"><i
                                                                            class="fa fa-trash"></i>
                                                                    </button>
                                                                </form>
																@endif
                                                                </span>
                                                                </td>
                                                </tr>


                                                     
                                          
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>






                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
            
        </div>
        <div class="btn-popup pull-right">

                                                    <div class="modal fade" id="editroute" tabindex="-1" role="dialog"
                                                        data-backdrop="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Route</h5>
                                                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    {{-- <form class="" action="{{ route('route_update', $route->id) }}" id="form" method="post"> --}}
                                                                    <form class="" id="form" method="post">
                                                                        <div class="form">
                                                                           
                                                                            <input type="hidden" id="editid" name="editid">
                                                                            <div class="form-group">
                                                                                <label for="validationCustom01" class="mb-1">Select Zonal
                                                                                    :</label>
                                                                                <select class="custom-select w-100 form-control"
                                                                                    name="editzonal_name" id="editzonal_id" required="">
                                                                                    <option value="">--Select--</option>
                                                                                   
                                                                                    {!! $data->zonaList !!}
                                    
                                                                                </select>
                                    
                                                                            </div>
                                    
                                                                            <div class="form-group">
                                                                                <label for="validationCustom01" class="mb-1">Route Name
                                                                                    :</label>
                                                                                <input class="form-control"  type="text"
                                                                                    name="editname" id="editname" required="true" >
                                                                            </div>
                                    
                                                                            <div class="form-group">
                                                                                <label for="validationCustom01"
                                                                                    class="mb-1">Status</label>
                                                                                <select class="custom-select w-100 form-control"
                                                                                    required="" name="editstatus" id="editstatus">
                                    
                                    
                                                                                    <option value="1">Active</option>
                                                                                    <option value="0">Inactive</option>
                                    
                                                                                </select>
                                                                                <input type="hidden" name="routeId" value="-1" />
                                                                                <input type="hidden" name="createdBy"
                                                                                    value="{{ session()->get('userId') }}">
                                                                            </div>
                                                                        </div>
                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-primary" id="update_route"
                                                        type="submit" >Update</button>
                                                    <button class="btn btn-secondary" type="button"
                                                        data-bs-dismiss="modal">Close</button>
                                                                </div>
                                    
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
    @endsection
    @push('scripts')
        <script>
            $(function() {
                var validation_option = getValidationOptions({
                    rules: {
                        name: {
                            required: true,
                            remote: {
                                url: "{{ route('checRoutenamePost') }}",
                                type: "post",
                                data: {
                                    name: function() {
                                        return $("#name").val();
                                    },
                                },
                                dataFilter: function(data) {
                                    var json = JSON.parse(data);
                                    if (json != "true") {
                                        $('#name').addClass("is-invalid");
                                        return "\" " + json + " \"";
                                    } else {
                                        return true;
                                    }
                                }
                            }
                        }
                    },
                    messages: {
                        Name: {
                            required: "Required  route name"
                        }
                    }
                });

                $('#form').validate(validation_option);

                $('#btnSave').click(function(event) {
                    event.preventDefault();
                     save(null);
                    
                    $('#exampleModal').modal('hide');
                    location.reload();
                });

                function save(callBack) {
                    if ($('#form').valid()) {
                        var disabled = $('#form').find(':input:disabled').removeAttr('disabled');
                        var formData = $('#form').serializeFormJSON();
                        console.log(formData);
                        disabled.attr('disabled', 'disabled');
                        var url = "{{ url('admin/saveRoute') }}";
                        var successCallBack = function successCallBack(data) {
                            loadJsonToHtml(data);
                             $(".page-body").load(window.location.href + " .page-body");
                        }
                        ajaxPost(formData, url, successCallBack, null);
                        
                    }
                }
            });
        </script>
        <script>
                $(document).on('click','.edit_route', function(e){
                    var editroute1='';
                    var htmlPlan='';
                e.preventDefault();
                var id = $(this).val();
                //    console.log(pin_id);
                $('#editroute').modal('show');
                $.ajax({
                    //   data: $('').serialize(),  {{ url('admin/pincode1') }}/"+pin_id+"/edit"
                    url: "{{ url('admin/editroute') }}/"+id+"/edit",          
                    type: "get",
                    dataType: 'json',
                    success: function (response) {
                         console.log(response);
                        // alert('test');
                            if(response.status == 404)
                            {
                            // alert('test');
                            $('successmessage').html('');
                            $('successmessage').addClass('alert alert-danger');
                            $('successmessage').text(response.message);
                            }
                            else{
                                $('#editid').val(response.editroute.id);
                                $('#editzonal_id').val(response.editroute.zonal_id);
                                $('#editname').val(response.editroute.name);
                                $('#editstatus').val(response.editroute.status);
                            }  
                        }
                    
                });

                });



   $(document).on('click', '#update_route', function (e) {
    e.preventDefault();
    var id = $('#editid').val();
    var zonalid1 = $('#editzonal_id').val();
    var name1 = $('#editname').val();
    var status1 = $('#editstatus').val();
   // alert(name1);
    var url = '{{ route("route_update", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: "POST",
        data: {
            _token: `{{ csrf_token() }}`,
            zonal_id: zonalid1, // Use `zonal_id` to match your Laravel controller
            name: name1,
            status: status1,
        },
        success: function (response) {
            console.log(response);

            // Close the modal
            $('#editroute').modal('hide');

            // Reload the part of the page that needs updating
            $(".page-body").load(window.location.href + " .page-body");
        },
        error: function (xhr) {
            console.error(xhr.responseText); // Log any errors
        },
    });
});
        </script>
    @endpush
