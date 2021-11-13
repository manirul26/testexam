@extends('layouts.header')
@section('content')
<?php $userid = session()->get('bussid'); ?>
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
							<input type="text" class="form-control" id="Description" name="Description"  placeholder="Proudct Description if Any">			  
							</div>
						</div>


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
$(document).ready(function(){
//alert('Monir');
		$('#Category').on('change',function() {
			//$('#level1').html('');
			$('#SubCategory').html('');
			var _token = $('input[name="_token"]').val();
			var bussid = $('#bussid').val();
			var Category = $('#Category').val();
		//	 alert(bussid+AccountType);
			$.ajax({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url:'./addproduct/findsubcategory',
			type: "GET",
			data: { bussid : bussid, Category : Category},
			//processData: false,
			//contentType: false,
			success: function(data, status, xhr) {
			// console.log(data);
			//alert(data);
			//$('.level2').html(data);
			$('#SubCategory').html(data);
			}
			});
		}); // add close
			
			//$(document).on('submit', '#validate', function(event){  
			//		alert();
			//});
});
</script>
<script type="text/javascript">
       $('document').ready(function()
	   { 
            $("#signupform").validate({
                rules: {
                   // code: "required",
                    pcode: "required",
                    pname: "required",
                    Category: "required",
                    SubCategory: "required",
                    Discount: "required",
                    level1: "required",
                    salesprice: "required",
                    Purchaseprice: "required",
                    Category: "required",
                    SubCategory: "required",
                    unit: "required",
                    Points: "required"
                },
                messages: {
                 //   code: "Please enter your Employee Code",
                    pcode: "Insert the Product Code",
                    unit: "Select the Unit from List",
                    pname: "Insert the product name",
                    Category: "select the category from list",
                    Discount: "Insert the discount",
                    SubCategory: "Insert the Required Fields",
                    level1: "Insert the Required Fields",
                    salesprice: "Insert the Required Fields",
                    Purchaseprice: "Insert the Required Fields",
                    SubCategory: "Insert the Required Fields",
                    Points: "Insert the Required Fields"
                   
                },
                submitHandler: function(form) {
 			var _token = $('input[name="_token"]').val();
			var bussid = $('#bussid').val();
			var pcode = $('#pcode').val();
			var pname = $('#pname').val();
			var Description = $('#Description').val();
			var xcolor = $('#xcolor').val();
			var xsize = $('#xsize').val();
			var unit = $('#unit').val();
			var Category = $('#Category').val();
			var SubCategory = $('#SubCategory').val();
			var status = $('#status').val();
			var expirydate = $('#expirydate').val();
			var currentbalance = $('#currentbalance').val();
			
			var salesprice = $('#salesprice').val();
			var Purchaseprice = $('#Purchaseprice').val();
			var Discount = $('#Discount').val();
			var Vat = $('#Vat').val();
            var Points = $('#Points').val();
            var alertstock = $('#alertstock').val();
            var level1 = $('#level1').val();
var openingbal = $('#openingbal').val();
var Openingbaldata = $('#Openingbaldata').val();
           // alert(level1);
					var jdate='dd';
			$.ajax({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url:'./addproduct/adddatapost',
			type: "GET",
			data: { bussid : bussid, pcode:pcode,_token:_token,pname:pname,Description:Description,unit:unit,Category:Category,SubCategory:SubCategory,status:status,Openingbaldata:Openingbaldata,expirydate:expirydate,currentbalance:currentbalance,salesprice:salesprice,Purchaseprice:Purchaseprice,Discount:Discount,Vat:Vat,Points:Points,alertstock:alertstock,level1:level1,openingbal:openingbal},
			//processData: false,
			//contentType: false,
			success: function(data, status, xhr) {
			//alert(data);
			     if(data == 'save')
			 	{
			 		swal("Success!", "Saved Successfully", "success");
					
			 	}
			 	else if(data == 'warning')
			 	{
			 		swal("Exits", "Product Code Exits, please change ID", "warning");
			 	}
			 	else if(data == 'Required')
			 	{
			 		swal("Required", "Insert the Required Fields", "warning");
			 	}
			 	else
			 	{
			 		swal("Failed", "Failed to Insert", "warning");
			 	} 
		//	alert(data);
			
			//$('#level1').html(data);
			}
			});
					
                }
            });  
});
</script>