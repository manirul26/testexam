@extends('layouts.app3')
@section('content')
<div class="content-wrapper" style="background-color:#fdfcfc">
    <div class="container-fluid" >
	<div class="panel panel-default" style="margin-top: 10px;">
  <div class="panel-heading">
  	<p style="margin-top: 5px; text-align: left; font-size: 16px; font-weight: bold;">Add New Product</p>
  </div>
  <div class="panel-body">
   
 			<form class="form-horizontal" id="signupform" >
 
			@csrf
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div id="showdata"></div>
			<div class="messagedata"></div>
                                                                      
			<div class="row">
				<div class="col-md-6">
					
						<div class="form-group">
							<label class="col-md-3 control-label">Product Code/barcode:</label>
							<div class="col-md-9">                                            
							<input type="text" class="validate[required] form-control" id="pcode" name="pcode"  placeholder="Proudct Code / scan barcode ">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Proudct Name</label>
							<div class="col-md-9">                                            
					
							<input type="text" class="validate[required] form-control" id="pname" name="pname"  placeholder="Proudct Name">
                                          
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Brand</label>
							<div class="col-md-9">                                            
							<input type="text" class="form-control" id="brand" name="brand"  placeholder="Product Brand">			  
							</div>
						</div>						<div class="form-group">							<label class="col-md-3 control-label">Product Qty</label>							<div class="col-md-9">                                            							<input type="text" class="form-control" id="proudctqty" name="proudctqty"  placeholder="0">			  							</div>						</div>


				</div><!-- col-md-6 -->
				<div class="col-md-6">

            <div class="form-group" style="margin-bottom: 20px; text-align:center">
							
				<button class="btn btn-primary Save" style="border-radius: 10px 10px 15px 0px;">Submit</button>
				 
				<a href="{{ route('addproduct')}}" style="border-radius: 10px 10px 15px 0px;" class="btn btn-primary">Clear</a>
						
			</div>	
			</form>	  
   
   
   
   
  </div>
</div>
	
	
	
			
				</div><!-- col-md-6 -->
			</div> <!-- row -->
	</div> <!-- -->
</div> <!-- container-fluid -->
 <!-- Modal -->
<div id="userModal" class="modal fade">  
      <div class="modal-dialog">  
           <form id="user_form" method="post">  
                <div class="modal-content">  
                     <div class="modal-header">  
                          <button type="button" class="close" data-dismiss="modal">&times;</button>  
                          <h4 class="modal-title">Update Product Category</h4>  
                     </div>  
                     <div class="modal-body">
<div id="editformpage"></div>
                     </div>  
                     <div class="modal-footer">  
                         
                          <input type="submit" name="action" id="action" class="btn btn-success editbutton" value="Update" />  
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
						  <div id="showmessage"></div>
                     </div>  
                </div>  
           </form>  
      </div>  
 </div>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirm</h4>
        <p>Are you sure you want to Delete this Data ?</p>
        <div id="deleteid"></div>
        <input type="text" id="deletetxtid" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="modal-btn-si" onClick="yesbutton()">Yes</button>
        <button type="button" class="btn btn-primary" id="modal-btn-no" onClick="nobutton()">No</button>
      </div>
    </div>
  </div>
</div>
<!------ Include the above in your HEAD tag ---------->
@endsection
<script type="text/javascript" src="{{ asset('Asset/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('Asset/js/toastr.min.js') }}"></script>
<script src="{{ asset('Asset/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" id="theme" href="{{ asset('Asset/js/toastr.min.css') }}"/>
<link href="{{ asset('Asset/sweetAlert/sweetalert.css')}}" rel="stylesheet">
<script src="{{ asset('Asset/sweetAlert/sweetalert.js')}}"></script>
<script type="text/javascript">
       $('document').ready(function()
	   { 
            $("#signupform").validate({
                rules: {
                   // code: "required",
                    pcode: "required",
                    pname: "required",                    brand: "required",                },
                messages: {

                    pcode: "Insert the Product Code",
                    pname: "Insert the product name",                    brand: "Insert the product name",

                },
                submitHandler: function(form) {
 			var _token = $('input[name="_token"]').val();
			var brand = $('#brand').val();
			var pcode = $('#pcode').val();
			var pname = $('#pname').val();
			$.ajax({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url:'./addproduct/adddatapost',
			type: "GET",
			data: { pcode:pcode,_token:_token,pname:pname,brand:brand},
			//processData: false,
			//contentType: false, pcode pname brand
			success: function(data, status, xhr) {
			//alert(data);
			     if(data == 'save')
			 	{
			 		alert('save')
					
			 	}
			 	else if(data == 'warning')
			 	{
					alert('Product Code Exits, please change ID')
			 	}
			 	else if(data == 'Required')
			 	{
			 		alert('Insert the required Fileds')
			 	}
			 	else
			 	{
			 		alert('Failed')
			 	} 
		//	alert(data);
			
			//$('#level1').html(data);
			}
			});
					
                }
            });  
});
</script>