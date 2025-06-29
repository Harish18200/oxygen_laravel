@extends('layout.auth.master')
@section('contents')

    @include('paritials.auth.header')?>

<!-- page-wrapper Start-->
@include('paritials.auth.topmenu');
<!-- Page Header Ends -->

<!-- Page Body Start-->
<div class="page-body-wrapper">
	
	<!-- Page Sidebar Start-->
	@include('paritials.auth.sidemenu');
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
                                <h3>Adv Banner
                                   
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active">Adv Banner</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
            @endif
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">                           
                            <div class="card-body">
							 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal"><i class="fa fa-plus"></i> Add Banner</button>                                   
                                <div class="btn-popup pull-right">								
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Adv Banner</h5>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                             
                                                <div class="modal-body">												
                                                    <form class="" action="{{route('advbanner.store')}}" method="post" onsubmit="return confirm('Are you sure, you want to Save it?')" enctype="multipart/form-data" >
                                                        @csrf
                                                        <div class="form">
                                                            <div class="form-group">
                                                                <label for="validationCustom01" class="mb-1"> Title :</label>
                                                                
                                                                <textarea class="form-control h-150px" rows="6" name="title" id="title"></textarea>
                                                            </div>
															 <div class="form-group">
                                                                <label for="validationCustom01" class="mb-1">Sub Title :</label>
                                                                
                                                                <textarea class="form-control h-150px" rows="6" name="sub_title" id="sub_title"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="validationCustom02" class="mb-1"> Image :</label>
                                                                <input class="form-control" require="" name="mainImage" id="mainImage" type="file" accept="image/*">
                                                            </div>
                                                             <div class="form-group">
                                                                <label for="validationCustom01" class="mb-1">Link :</label>
                                                                <input class="form-control" id="link" name="link" type="text" required="true">
                                                            </div>
                                                             <div class="form-group">
                                                                <label for="validationCustom01" class="mb-1">Sort :</label>
                                                                <input class="form-control" id="sort" name="sort" type="number" required="true">
                                                            </div>                                                            
                                                            <div class="col-md-12">
							                    			<div class="" id="dates">
							                    			<div class="form-group row">
							                    			    <div class="form-group mt-2">
                                                                    <label for="validationCustom01" class="mb-1 fw-bold">Status</label>
                                                                    <select name="status" class="custom-select w-100 form-control" required="">
                                                                        <option value="1">Active</option>
                                                                        <option value="0">Deactive</option>
                                    
                                                                    </select>
                                    
                                                                </div>
							                    				<!--<div class="col-md-6">-->
							                    				<!--<label class="">Start Date / Time</label>-->
							                    				<!--	 <input id="example" type="date" value="" name="start_date" id="start_date" class="form-control" placeholder="dd/mm/yy"  />-->
							                    				<!--	 </div>-->
							                    					 
							                    				<!--</div>-->
							                    		  <!--  <div class="form-group row">-->
							                    				<!--<div class="col-md-6">-->
							                    				<!--<label class="">End Date / Time</label>-->
							                    				<!--	 <input id="example1" type="date" class="form-control" name="end_date" id="end_date" placeholder="dd/mm/yy"  />-->
							                    				<!--	 </div>-->
							                    					 
							                    		  <!--  </div>											-->
							                    			</div>												
							                    		    </div>
                                                        </div>                                                   
                                                    												
                                                        <div class="modal-footer">
                                                           <button class="btn btn-primary" type="submit">Save</button>
                                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                                        </div>												
												    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								

                                {{-- Edit Popup --}}

                                <div class="btn-popup pull-right">								
                                    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Edit Banner</h5>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">												
                                                    <form class="" action="{{route('advbanner.update', 0)}}" method="post" onsubmit="return confirm('Are you sure, you want to Update it?')" enctype="multipart/form-data" >
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form">
                                                            <input class="form-control" id="editid" name="editid" type="hidden" >
                                                            <div class="form-group">
                                                                <label for="validationCustom01" class="mb-1"> Title :</label>
                                                                
                                                                <textarea class="form-control h-150px" rows="6" name="edittitle" id="edittitle"></textarea>
                                                            </div>
															 <div class="form-group">
                                                                <label for="validationCustom01" class="mb-1">Sub Title :</label>
                                                                
                                                                <textarea class="form-control h-150px" rows="6" name="editsub_title" id="editsub_title"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="validationCustom02" class="mb-1"> Image :</label>
                                                                <input class="form-control"  name="editmainImage" id="editmainImage" type="file" accept="image/*">
                                                                <input class="form-control"  name="editoldImage" id="editoldImage" type="hidden" accept="image/*">
                                                            </div>
                                                             <div class="form-group">
                                                                <label for="validationCustom01" class="mb-1">Link :</label>
                                                                <input class="form-control" id="editlink" name="editlink" type="text" required="true">
                                                            </div>
                                                             <div class="form-group">
                                                                <label for="validationCustom01" class="mb-1">Sort :</label>
                                                                <input class="form-control" id="editsort" name="editsort" type="number" required="true">
                                                            </div>                                                            
                                                            <div class="col-md-12">
							                    			<div class="" id="dates">
							                    			<div class="form-group row">
							                    			    <div class="form-group mt-2">
                                                                    <label for="validationCustom01" class="mb-1 fw-bold">Status</label>
                                                                    <select name="editstatus" class="custom-select w-100 form-control" required="">
                                                                        <option value="1">Active</option>
                                                                        <option value="0">Deactive</option>
                                    
                                                                    </select>
                                    
                                                                </div>
							                    				<!--<div class="col-md-6">-->
							                    				<!--<label class="">Start Date / Time</label>-->
							                    				<!--	 <input id="editstart_date" type="date" value="" name="editstart_date" id="editstart_date" class="form-control" placeholder="dd/mm/yy"  />-->
							                    				<!--	 </div>-->
							                    					
							                    				<!--</div>-->
							                    		  <!--  <div class="form-group row">-->
							                    				<!--<div class="col-md-6">-->
							                    				<!--<label class="">End Date / Time</label>-->
							                    				<!--	 <input id="editend_date" type="date" class="form-control" name="editend_date" id="editend_date" placeholder="dd/mm/yy"  />							                    					 </div>-->
							                    					
							                    		  <!--  </div>											-->
							                    			</div>												
							                    		    </div>
                                                        </div>                                                   
                                                    												
                                                        <div class="modal-footer">
                                                            <button class="btn btn-primary" type="submit" id="edit_save">Save</button>
                                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                                        </div>												
												    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                





							<div class="datatable-dashv1-list custom-datatable-overright">                            
                                <table class="table" id="table"  data-click-to-select="true"  data-sort-name="id" data-sort-order="asc" data-mobile-responsive="true" data-toggle="table" data-show-columns="true" data-sort="true" data-pagination="true" data-search="true"  data-show-refresh="true" data-key-events="true"  data-resizable="true" data-cookie="true"
                                    data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">  
                                    <thead>
                                     <tr>
                                       <th data-field="id" data-sortable="true">Id</th> 
                                       <th data-field="image" data-sortable="true" >Image</th>
                                       <th data-field="title" data-sortable="true">Title</th>
                                       <th data-field="subtitle" data-sortable="true">Sub Title</th>
                                       <th data-field="link" data-sortable="true">Link</th>
                                       <th data-field="sort" data-sortable="true">Sort</th>
                                       
                                       <th data-field="status" data-sortable="true">Status</th>
									   <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($adbanner as $item)
                                        <tr>
                                             <td>{{ str_pad($loop->iteration, 4, '0', STR_PAD_LEFT);}}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <img src="{{asset('assets/images/banners/adv-baner') . '/' .$item->image}}" alt="" class="img-fluid img-30 me-2 blur-up lazyloaded">
                                                </div>
                                            </td>
                                            <td style="width:100%;">
                                             {{$item->title}}
                                            </td>
                                            <td style="width:100%;">
                                                {{$item->sub_title}}
                                            </td>
                                            <td style="width:100%;">
                                                {{$item->link}}
                                            </td>
                                            <td style="width:100%;">
                                                {{$item->sort}}
                                            </td>
                                           
                                            <td>
                                                <label class="switch">
                                                    {{-- $status = $pin->status --}}
                                                    
                                                     @if($item->status  == 1){
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
                                                         <!--ADDED HTML -->
                                                         <span class="on">Active</span>
                                                         <span class="off">Inactive </span>                                                                
                                                         <!--END-->
                                                     </div>
                                                 </label>

                                            </td>
                                            <td>
                                                <span class="d-flex">
                                                    <button type="button" class="edit_advbaner btn btn-secondary mx-1" value="{{ $item->id }}">
                                                    <i class="fa fa-pencil"></i></button>
                                                     {{-- <a href="#" class="btn btn-secondary mx-1"  data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal1"data-original-title="Edit"><i class="fa fa-pencil"></i> </a> --}}
                                                  <form
                                                     action="{{ route('advbanner.destroy', $item->id) }}"
                                                     method="post">
                                                     @method('DELETE')
                                                     @csrf
                                                     <button type="submit" class="btn btn-warning mx-1"
                                                         onclick="return confirm('Are you sure, you want to delete it?')"><i
                                                         class="fa fa-trash"></i>
                                                     </button>
                                                 </form> 
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
            </div>
            <!-- Container-fluid Ends-->
        </div>

@push('scripts')
<script>
    $(document).on('click', '.edit_advbaner', function(e){

        e.preventDefault();

        //alert('cate_id');
        var ad_id = $(this).val();
        $('#exampleModal1').modal('show');

        var url = "{{route('editadvbanner', ":ad_id")}}";
        url = url.replace(":ad_id", ad_id);

            $.ajax({
            
             url:url,       
             type: "get",
             _token: "csrf",
             dataType: 'json',
             success: function (response) {
                  console.log(response);
                //alert(response);
               if(response.status == 404)
               {
               //  alert('test');
               $('successmessage').html('');
               $('successmessage').addClass('alert alert-danger');
               $('successmessage').text(response.message);
               }

                else{
                   // alert(response);

                $('#editid').val(response.adbanner.id);
                $('#edittitle').val(response.adbanner.title);
                $('#editsub_title').val(response.adbanner.sub_title);
                $('#editoldImage').val(response.adbanner.image);
                $('#editlink').val(response.adbanner.link);
                $('#editsort').val(response.adbanner.sort);
                $('#editstart_date').val(response.adbanner.start_date);
                $('#editend_date').val(response.adbanner.end_date);

                }
            }

            //alert('dfhdgfjftg');
            // error: function (response){

            // }

        });
        
    });

    
// $(document).on('click','.edit_adthfhfgvbaner', function(e){
      
//       e.preventDefault();
//       var cate_id = $(this).val();
//     //  alert(cate_id);
//       //    console.log(pin_id);
//       $('#exampleModal1').modal('show');
//       var url ="{{route('editadvbanner', ":cate_id")}}";
//           url = url.replace(":cate_id", cate_id);
//       $.ajax({
       
//             url:url,       
//             type: "get",
//             dataType: 'json',
//             success: function (response) {
//                  console.log(response);
//                //alert(response);
//                   if(response.status == 404)
//                   {
//                   //  alert('test');
//                   $('successmessage').html('');
//                   $('successmessage').addClass('alert alert-danger');
//                   $('successmessage').text(response.message);
//                   }
//                   else{
//                     alert('gfjgf');
//                       $('#editmain_category_name').val(response.category_main.category_main_name);
//                     //alert(response.category_main.category_main_name);
//                     $('#cate_id').val(cate_id);
//                       var sts = response.category_main.status;
//                        //alert(sts);
//                       if(sts == 49)
//                       {
//                           $('#editstatus').val(1);
  
//                       }
//                       else{
//                           $('#editstatus').val(0);
//                       }
//                       $('#editmain_category_image').val();		
//                        $('#oldeditmain_category_image').val(response.category_main.category_main_image);
                     
                    
//                       // alert(response.category_main.category_main_image);
//                   }
       
                  
           
//               }
          
//         });
  
//       });
</script>
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
    <script>
        // CKEDITOR.replace('title');
        // CKEDITOR.replace('sub_title');
        // CKEDITOR.replace('edittitle');
        // CKEDITOR.replace('editsub_title');
        
    </script>

@endpush
@endsection