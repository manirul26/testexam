@extends('layouts.app3')

@section('content')
<?php $userid = session()->get('bussid'); ?>
<div class="content-wrapper" style="background-color:#fdfcfc">
    <div class="container-fluid" >
	 @foreach ($ppl as $ppls)
			<!--<form class="form-horizontal" id="signupform" style="border-top: 2px solid #00a0c6;margin-top: 87px; background-color: #e9f6f9">-->
            <form action="registrationsubmitEdit" class="form-horizontal" method="post" style="border-top: 2px solid #00a0c6;margin-top: 87px; background-color: #e9f6f9">
 
			@csrf
			<input type="hidden" name="_token" value="{{ csrf_token() }}">


			<p style="margin-top: 5px; text-align: center; font-size: 14px; font-weight: bold;">Update Product Information </p>
			<div id="showdata"></div>
			<div class="messagedata"></div>
                                                                      

			<div class="row">

				<div class="col-md-6">
					
						<div class="form-group">
							<label class="col-md-3 control-label">Product ID</label>
							<div class="col-md-9">                                            
							<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-pencil" style="
    margin-bottom: 8px;
"></span></span>
							<input type="text" class="validate[required] form-control" id="pcode" name="pcode"  placeholder="Proudct Code" value="{{ $ppls->productid }}">
							
							</div>                                            

							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Proudct Name</label>
							<div class="col-md-9">                                            
							<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-pencil" style="margin-bottom: 8px;"></span></span>
							<input type="text" class="validate[required] form-control" id="pname" name="pname"  placeholder="Proudct Name"  value="{{ $ppls->proudctname }}">
							</div>                                            

							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Brand</label>
							<div class="col-md-9">                                            
							<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-pencil" style="margin-bottom: 8px;"></span></span>
							<input type="text" class="form-control" id="brand" name="brand"  placeholder="Proudct Name"  value="{{ $ppls->productbrand }}">
	<input type="hidden" class="form-control" id="autoID" name="autoID"  placeholder="Proudct Name"  value="{{ $ppls->productid}}">

							</div>                                            

							</div>
						</div>
						<div class="form-group">							<label class="col-md-3 control-label">Product Qty</label>							<div class="col-md-9">                                            							<div class="input-group">							<span class="input-group-addon"><span class="fa fa-pencil" style="margin-bottom: 8px;"></span></span>							<input type="text" class="form-control" id="qty" name="qty"  placeholder="0"  value="{{ $ppls->productquantity }}">							</div>                                            							</div>						</div>
						
						


			
				</div><!-- col-md-6 -->
				

         


            <div class="form-group" style="margin-bottom: 20px; text-align:center">
							
				<button class="btn btn-primary Save" style="border-radius: 10px 10px 15px 0px;">Submit</button>
				 
				<a href="{{ route('addproductlist')}}" style="border-radius: 10px 10px 15px 0px;" class="btn btn-primary">Back</a>
						
			</div>	

			</form>		
 @endforeach		 			
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



<script>


    @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"

        switch(type){
            case 'info':
                 toastr.info("{{ Session::get('message') }}");
                 break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>




<script type="text/javascript">

$(document).ready(function(){
//alert('Monir');
		$('#Category').on('change',function() {
			$('#level1').html('');
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

