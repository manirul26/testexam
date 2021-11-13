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
							<label class="col-md-3 control-label">Product Code:</label>
							<div class="col-md-9">                                            
							<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-pencil" style="
    margin-bottom: 8px;
"></span></span>
							<input type="text" class="validate[required] form-control" id="pcode" name="pcode"  placeholder="Proudct Code" value="{{ $ppls->pcode }}">
							
							</div>                                            

							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Proudct Name</label>
							<div class="col-md-9">                                            
							<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-pencil" style="margin-bottom: 8px;"></span></span>
							<input type="text" class="validate[required] form-control" id="pname" name="pname"  placeholder="Proudct Name"  value="{{ $ppls->pname }}">
							</div>                                            

							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Description</label>
							<div class="col-md-9">                                            
							<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-pencil" style="margin-bottom: 8px;"></span></span>
							<input type="text" class="form-control" id="Description" name="Description"  placeholder="Proudct Name"  value="{{ $ppls->Description }}">
	<input type="hidden" class="form-control" id="autoID" name="autoID"  placeholder="Proudct Name"  value="{{ $ppls->id }}">

							</div>                                            

							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Color</label>
							<div class="col-md-9">                                            
							<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-pencil" style="margin-bottom: 8px;"></span></span>
							<input type="text" class="form-control" id="xcolor" name="xcolor"  placeholder="Example: Red, White, Green etc" value="{{ $ppls->xcolor }}">
							</div>                                            

							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Size</label>
							<div class="col-md-9">                                            
							<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-pencil" style="margin-bottom: 8px;"></span></span>
							<input type="text" class="form-control" id="xsize" name="xsize"  placeholder="Ex: 12X12 inch"  value="{{ $ppls->xsize }}">
							</div>                                            

							</div>
						</div>
						<div class="form-group" style="margin-bottom: 20px">
							<label class="col-md-3 control-label">Measurment Unit</label>
							<div class="col-md-9">        
							<select name="unit" id="unit" class="validate[required] select form-control"  
								data-show-subtext="true" data-live-search="true" style="width:200px">
								<option value="{{ $ppls->Unit }}" >{{ $ppls->Unit }}</option>
								<?php
								$data = DB::table('xunit')->where('bussid','=',$userid) 
								->get();
								foreach($data as $row) {
								//echo $row->Question;
								?>
								<option value="<?php echo $row->Unit ?>"><?php echo $row->Unit ?></option>
								<?php 
								} 
								?>
									
							</select>
							</div>
						</div>
						<div class="form-group" style="margin-bottom: 20px">
							<label class="col-md-3 control-label">Category</label>
							<div class="col-md-9">        
							<select name="Category" id="Category" class="select form-control"  
								data-show-subtext="true" data-live-search="true" style="width:200px">
<?php
$productgroupcode = $ppls->Productgroup;
  $user = DB::table('productgroup')->where('ID','=',$productgroupcode)->where('BussId','=',session()->get('bussid'))->first();

$PoductGroupName = $user->PoductGroupName;
?>

								<option value="{{ $ppls->Productgroup }}" ><?php echo $PoductGroupName ?></option>
								<?php
								$data = DB::table('productgroup')->where('BussId','=',$userid) 
								->get();
								foreach($data as $row) {
								//echo $row->Question;
								?>
								<option value="<?php echo $row->ID ?>"><?php echo $row->PoductGroupName ?></option>
								<?php 
								} 
								?>
									
							</select>
							</div>
						</div>
						<div class="form-group" style="margin-bottom: 20px">
							<label class="col-md-3 control-label">Sub Category</label>
							<div class="col-md-9">        
							<select name="SubCategory" id="SubCategory" class="validate[required] form-control">
<?php
$Productcategory = $ppls->Productcategory;
  $user = DB::table('productsubcategory')->where('ID','=',$Productcategory)->where('BussId','=',session()->get('bussid'))->first();

$productsubcategoryname = $user->productsubcategoryname;
?>


								<option value="{{ $ppls->Productcategory }}" >
									<?php echo $productsubcategoryname ?>
								</option>
							</select>
							</div>
						</div>
						<div class="form-group" style="margin-bottom: 20px">
							<label class="col-md-3 control-label">Status</label>
							<div class="col-md-9">        
							<select name="status" id="status" class="select form-control"  
								data-show-subtext="true" data-live-search="true" style="width:200px">
							<?php if($ppls->Status=="0")
							{
								$status = "Inactive"; 
							} else{
								$status = "Active"; 
							} ?>		
							<option value="{{ $ppls->Status }}"><?php echo $status ?></option>
							<option value="1">Active</option>
							<option value="0">Inactive</option>
							</select>
							</div>
						</div>  
						<div class="form-group" style="margin-bottom: 20px">
							<label class="col-md-3 control-label">Opening Balance</label>
							<div class="col-md-9">        
							<input type="text" class="validate[required] select form-control" name="openingbal" id="openingbal" placeholder="0" style="
    border: 1px solid silver;
    height: 31px;
    border-radius: 2px;" value="{{ $ppls->openingbal }}"/>
	<span id="span_full_name"></span>

							</div>
						</div>						
					
						


			
				</div><!-- col-md-6 -->
				<div class="col-md-6">
						<div class="form-group">
						<label class="col-md-3 control-label">Opening Bal. Date</label>
						<div class="col-md-5">
						<div class="input-group">
						<input type="text" id="Openingbaldata" name="Openingbaldata" class="form-control" value="06-06-2014" data-date="06-06-2014" data-date-format="dd-mm-yyyy" data-date-viewmode="years" value="{{ $ppls->openingDate }}"/>
						<span class="input-group-addon"><span class="glyphicon glyphicon-calendar" style="
						margin-bottom: 8px;
						"></span></span>
						</div>
						</div>
						</div>
						<div class="form-group">
						<label class="col-md-3 control-label">Expiry Date</label>
						<div class="col-md-5">
						<div class="input-group">
						<input type="text" id="expirydate" name="expirydate" class="form-control" value="06-06-2014" data-date="06-06-2014" data-date-format="dd-mm-yyyy" data-date-viewmode="years" value="{{ $ppls->ExpairDate }}"/>
						<span class="input-group-addon"><span class="glyphicon glyphicon-calendar" style="
						margin-bottom: 8px;
						"></span></span>
						</div>
						</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">D.P. Price</label>
							<div class="col-md-9">                                            
							<div class="input-group">
							 <input type="text" id="currentbalance" name="currentbalance" class="form-control" placeholder="0" value="{{ $ppls->DPPrice }}" style="
    color: green;
    font-weight: bold;
"/>
                                                <span class="input-group-addon">.00</span>
                             <input type="hidden" id="bussid" name="bussid" class="form-control" placeholder="0" value="<?php echo $userid ?>"/>
                                               
							</div>                                            

							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Sales Price</label>
							<div class="col-md-9">                                            
							<div class="input-group">
							 <input type="text" id="salesprice" name="salesprice" class="form-control" placeholder="0"  value="{{ $ppls->salesprice }}" style="
    color: #05718b;
    font-weight: bold;
"/>
						                        <span class="input-group-addon">.00</span>
						  
						                       
							</div>                                            

							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Purchase Price</label>
							<div class="col-md-9">                                            
							<div class="input-group">
							 <input type="text" id="Purchaseprice" name="Purchaseprice" class="form-control" placeholder="0"  value="{{ $ppls->unitcose }}" style="
    color: red;
    font-weight: bold;
"/>
						                        <span class="input-group-addon">.00</span>
						  
						                       
							</div>                                            

							</div>
						</div>



						<div class="form-group" style="margin-bottom: 20px">
						  <label class="col-md-3 control-label">Discount</label>
						  <div class="col-md-9">        
						      <div class="input-group">
						      <input type="text" id="Discount" name="Discount" class="form-control" placeholder="0" value="{{ $ppls->Discount }}"/>
						                        <span class="input-group-addon">.00</span>
						      </div>                                            

						  </div>
						</div> 

						<div class="form-group" style="margin-bottom: 20px">
						  <label class="col-md-3 control-label">Vat/Tax (%) </label>
						  <div class="col-md-9">        
						      <div class="input-group">
						      <input type="text" id="Vat" name="Vat" class="form-control" placeholder="0" value="{{ $ppls->vat }}"/>
						      <span class="input-group-addon">.00</span>
						      </div>                                            

						  </div>
						</div>

						<div class="form-group" style="margin-bottom: 20px">
						  <label class="col-md-3 control-label">Points</label>
						  <div class="col-md-9">        
						      <div class="input-group">
						      <input type="text" id="Points" name="Points" class="form-control" placeholder="0" value="{{ $ppls->points }}"/>
						      <span class="input-group-addon">.00</span>
						      </div>                                            

						  </div>
						</div> 

						<div class="form-group" style="margin-bottom: 20px">
						  <label class="col-md-3 control-label">Alert Stock</label>
						  <div class="col-md-9">        
						      <div class="input-group">
						      <input type="text" id="alertstock" name="alertstock" class="form-control" placeholder="0" value="{{ $ppls->alertstock }}"/>
						      <span class="input-group-addon">.00</span>
						      </div>                                            

						  </div>
						</div>   

						<div class="form-group" style="margin-bottom: 20px">
							<label class="col-md-3 control-label">Account Code</label>
							<div class="col-md-9">        
								<select name="level1" id="level1" class="form-control select"  
								data-show-subtext="true" data-live-search="true"  
								 style="z-index: 111111;">

<?php
$assetacc = $ppls->assetacc;
  $user = DB::table('accounts')->where('accountno','=',$assetacc)->where('bussid','=',session()->get('bussid'))->first();

$account_name = $user->account_name;
?>

								<option value="{{ $ppls->assetacc }}">
									
									<?php echo $account_name ?>

								</option>
								<?php
								$data = DB::table('accounts')->where('bussid','=',$userid) 
								->get();
								foreach($data as $row) {
								//echo $row->Question;
								?>
								<option value="<?php echo $row->accountno ?>"><?php echo $row->account_name ?></option>
								<?php 
								} 
								?>
								</select>
							</div>
						</div> 
						
						


         


            <div class="form-group" style="margin-bottom: 20px; text-align:center">
							
				<button class="btn btn-primary Save" style="border-radius: 10px 10px 15px 0px;">Submit</button>
				 
				<a href="{{ route('addproductlist')}}" style="border-radius: 10px 10px 15px 0px;" class="btn btn-primary">Clear</a>
						
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

