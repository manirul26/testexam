@extends('layouts.app3')

@section('content')

<div class="content-wrapper">

    <div class="container-fluid">

    <div class="row">

    <div class="col-md-12">

				<div style="width: 100%; margin: 0 auto; border-bottom: 1.5px solid silver; height: 57px;margin-bottom: 50px; margin-top:10px;">

					<div style="width: 80%; float: left">

<h3 style="margin-top: 18px;font-size: 23px;">Supplier</h3>

					</div>

					<div style="width: 20%; float: left">

                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

					   <a href="{{ route('newsupplier')}}" class="btn btn-primary" style="background-color: #85C51F;

    color: #fff;

    border: 2px solid transparent;

    transition: background-color .15s;

    font-size: 24px;

    padding: 10px;

    line-height: 27px;

    height: 50px;

    width: 164px;">New Supplier</a>

					</div>

				</div>

		

	

	</div>

	</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


	<div class="row">

		<div class="col-md-12" style="margin-bottom: 50px">

			<div class="col-md-3">

				<h3 style="text-align: left; color: #0D83DD; font-size: 32px">৳ 0 </h3>

				<p style="text-align: left; color: #0D83DD; font-size: 16px;    opacity: .5;">Receive from Supplier</p>

			</div>

			<div class="col-md-3">

			<h3 style="text-align: center; color: #0D83DD; font-size: 32px">৳ 0</h3>

			<p style="text-align: center; color: #0D83DD; font-size: 16px;    opacity: .5;">Over All Due</p>

			</div>

			<div class="col-md-3">

			<h3 style="text-align: right; color: #0D83DD; font-size: 32px">৳ 0</h3>

			<p style="text-align: right; color: #0D83DD; font-size: 16px;    opacity: .5;">Paid Amount </p>

			</div>

		</div>	

	</div>

		

    <div class="row">

    <div class="col-md-12">

	

	

	

	

	

	

<div class="panel panel-default">

			<div class="panel-heading">

					<h3 style="text-align: center;">Supplier List</h3>

					<div class="input-group col-md-6">

					<span class="input-group-addon"><span class="fa fa-search"></span></span>

					<input type="text" class="form-control" id="serach" name="serach" placeholder="Find with Supplier Name " value="">

					<div class="input-group-btn">

					<!-- <button class="btn btn-primary findbutton">Search</button>-->

					<button class="btn btn-primary findreset" style="margin-left: 5px;">Reset</button>

					<a href="{{ route('newsupplier')}}" style="border-radius: 10px 10px 15px 0px;width: 138px; margin-left: 10px;" class="btn btn-primary">Add New Supplier</a>

					</div>

					</div>

					<div class="col-md-3" style="text-align: right;">

					

					</div>			

			</div>

			<div class="panel-body">



<div class="table-responsive">

    <table class="table table-striped table-bordered">

     <thead>

      <tr>

         <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="v_id" style="cursor: pointer">SLNO <span id="id_icon"></span></th>

       <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="CustomerID" style="cursor: pointer">Supplier ID <span id="id_icon"></span></th>

       <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="post_title" style="cursor: pointer">Name <span id="post_title_icon"></span></th>

        <th width="10%" class="sorting" data-sorting_type="asc" data-column_name="post_title" style="cursor: pointer">Address <span id="post_title_icon"></span></th>



        

       <th width="5%">Phone</th>

       <th width="5%">Opening Date</th>

        <th width="5%">Opening Balance</th>

         <th width="5%">Voucher ID</th>



       <th width="5%">Payment</th>

       <th width="5%">Edit</th>

       <th width="5%">Delete</th>

      </tr>

     </thead>

     <tbody>

         <div id="showdatalist"></div>   

     </tbody>

    </table>

    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />

    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />

    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />

</div>							

			

			</div>

		</div>

		</div>

		</div>

		

		

		



	

		</div>

		</div>

</div>









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

        <input type="hidden" id="deletetxtid" value=""/>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default" id="modal-btn-si" onClick="yesbutton()">Yes</button>

        <button type="button" class="btn btn-primary" id="modal-btn-no" onClick="nobutton()">No</button>

      </div>

    </div>

  </div>

</div>













<script type="text/javascript" src="{{ asset('Asset/js/jquery.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('Asset/js/toastr.min.js') }}"></script>

<link rel="stylesheet" type="text/css" id="theme" href="{{ asset('Asset/js/toastr.min.css') }}"/>

<link href="{{ asset('Asset/sweetAlert/sweetalert.css')}}" rel="stylesheet">

<script src="{{ asset('Asset/sweetAlert/sweetalert.js')}}"></script>





<script>

$(document).ready(function() {

    $('.Save').click(function() 

		{

			$('#showdata').html('');

			var FullName = $('#FullName').val();

			var _token = $('input[name="_token"]').val();

			$.ajax({

			headers: {

			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

			},

			url:'./newsupplierlist/adddatapost',

			data:'FullName='+FullName,

			type:'GET',

			//    dataType:"json",

			success:function(data)

			{

			//  alert(data);

			toastr.success(data.message, data.title);

			location.reload();

			$('#showdata').html(data);

			}

			});

			return false;

    });



    $('.editbutton').click(function() 

		{

			$('#showdata').html('');

			var FullNameEdit = $('#FullNameEdit').val();

			var IDEdit = $('#IDEdit').val();

			var status_edit = $('#status_edit').val();

			var _token = $('input[name="_token"]').val();

			$.ajax({

			headers: {

			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

			},

			url:'./newsupplierlist/update_data',

			data:'FullNameEdit='+FullNameEdit+'&status_edit='+status_edit+'&IDEdit='+IDEdit,

			type:'GET',

			//    dataType:"json",

			success:function(data)

			{

				test();

			//  alert(data);

			//toastr.success(data.message, data.title);

			//location.reload();

			$('#showmessage').html(data);

		//	test();



			}

			});

			return false;

  });









    

} );







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



<!------ Include the above in your HEAD tag ---------->



<script>

$(document).ready(function(){

//var page = 1; 

 	//		var sort_type = ''; 

 //			var sort_by=''; var query='';

 //fetch_data(page, sort_type, column_name, query);





test();



 function test()

 {

 		//alert('xxxx');

 			var page = 1; 

 			var sort_type = 'v_id'; 

 			var sort_by='asc'; var query='';

		   var FullName ='ccccc';

			var _token = $('input[name="_token"]').val();

			$.ajax({

			headers: {

			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

			},

			url:'./newsupplierlist/test',

			data:'page='+page+'&sort_type='+sort_type+'&query='+query,

			type:'GET',

			//    dataType:"json",

			success:function(data)

			{

			//  alert(data);

		//

				$('tbody').html('');

				$('tbody').html(data);

			}

			});





 }

  $('.findreset').click(function() 

	{

	location.reload();

	});

 function clear_icon()

 {

  $('#id_icon').html('');

  $('#post_title_icon').html('');

 }

//https://www.webslesson.info/2018/11/laravel-column-sorting-with-pagination-using-ajax.html

 function fetch_data(page, sort_type, sort_by, query)

 {

 //	alert('');

  $.ajax({

  	headers: {

			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

			},

   url:"./newsupplierlist/fetch_data?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,

   success:function(data)

   {

    $('tbody').html('');

    $('tbody').html(data);

   }

  })

 }



 $(document).on('keyup', '#serach', function(){

  var query = $('#serach').val();

  var column_name = $('#hidden_column_name').val();

  var sort_type = $('#hidden_sort_type').val();

  var page = $('#hidden_page').val();

  fetch_data(page, sort_type, column_name, query);

 });



 $(document).on('click', '.sorting', function(){

  var column_name = $(this).data('column_name');

  var order_type = $(this).data('sorting_type');

  var reverse_order = '';

  if(order_type == 'asc')

  {

   $(this).data('sorting_type', 'desc');

   reverse_order = 'desc';

   clear_icon();

   $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-bottom"></span>');

  }

  if(order_type == 'desc')

  {

   $(this).data('sorting_type', 'asc');

   reverse_order = 'asc';

   clear_icon

   $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-top"></span>');

  }

  $('#hidden_column_name').val(column_name);

  $('#hidden_sort_type').val(reverse_order);

  var page = $('#hidden_page').val();

  var query = $('#serach').val();

  fetch_data(page, reverse_order, column_name, query);

 });



 $(document).on('click', '.pagination a', function(event){

  event.preventDefault();

  var page = $(this).attr('href').split('page=')[1];

  alert(page);

  $('#hidden_page').val(page);

  var column_name = $('#hidden_column_name').val();

  var sort_type = $('#hidden_sort_type').val();



  var query = $('#serach').val();



  $('li').removeClass('active');

        $(this).parent().addClass('active');

  fetch_data(page, sort_type, column_name, query);

 });



 $(document).on('click', '.update', function(){  

 	 $('#userModal').modal('show'); 

       var user_id = $(this).attr("id"); 

	   var _token = $('input[name="_token"]').val();

		$('#showmessage').html('');		   

       $.ajax({  

       		headers: {

			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

			},

            url:"./newsupplierlist/finddata", 

            method:"GET",  

            data:{user_id:user_id},  

            success:function(data)  

            {

  

				$('#editformpage').html(data);



            }  

       })  

  });

//delete

$(document).on('click', '.delete', function(){  

	$('#deleteid').html('');	

 	    $("#mi-modal").modal('show');

       var user_id = $(this).attr("id"); 

	   var _token = $('input[name="_token"]').val();

	 //  alert(user_id);

		$('#deletetxtid').val(user_id);	

  });

//end delete

});

function yesbutton()

{

	 var user_id = $('#deletetxtid').val();	 

	   var _token = $('input[name="_token"]').val();

	  // alert(user_id);

		$('#showmessage').html('');	

         $.ajax({  

       		headers: {

			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

			},

            url:"./newcustomer_listEdit/deleteinfo", 

            method:"GET",  

            data:{user_id:user_id},  

            success:function(data)  

            {

            //  alert(data);



               if(data == 'Delete')

                  {

                  swal("Success!", "Delete Successfully", "success");

                  location.reload();



                  }

                  else if(data == 'Failed')

                  {

                  swal("Exits", "Failed", "warning");

                  }

                  else if(data == 'Exits')

                  {

                  swal("Exits", "Product Code Exits, please change ID", "warning");

                  }

                 

                  else

                  {

                  swal("Failed", "Failed to Insert", "warning");

                  }



              

            }  

       }) 

}

function nobutton()

{



	 $("#mi-modal").modal('hide');

}





</script>








@endsection

