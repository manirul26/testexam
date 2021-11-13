@extends('layouts.app3')

@section('content')
<?php $bussid = session()->get('bussid'); ?>
<div class="content-wrapper">

    <div class="container-fluid">

      <div class="row">

    <div class="col-md-12" style="border-bottom: 1px solid silver;margin-top: 21px;">

					<div class="col-md-9">

                        <h3 style="font-size: 23px;">Customer/Supplier</h3>

					</div>


					<div class="col-md-3">
<div class="btn-group">
<button type="button" class="btn btn-info btn-lg createnewaccount" data-toggle="modal" data-target="#userModal" 
style="width: 111px;margin-right: 10px;border-radius: 10px;padding: 5px;">New Client</button>


<a href="#" class="btn btn-default">Menu</a>

<a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>

<ul class="dropdown-menu" style="margin-left: 52px;">
<li><a href="#">Client Ledger</a></li>
<li><a href="#">Client Due List</a></li>
</ul>

</div>
					</div>



	</div>

	</div>





	<div class="row">

		<div class="col-md-12" style="margin-bottom: 50px; margin-top: 40px;">

			<div class="col-md-4">

						<h3 style="text-align: left; color: #0D83DD; font-size: 32px"> 



<?php

$orderObj = DB::table('companyinformation')->select('currency')->where('c_phone','=',session()->get('bussid'))->first();

if ($orderObj) {



echo $orderNr = $orderObj->currency;

}

else

{



}

$p = DB::table('journal')->where('pagename','=', 'New Invoice')->where('bussid','=', session()->get('bussid'))->get();

$totalpoints=0;

foreach($p as $rows) {

	 $totalpoints += $rows->Total;

}

echo " ".$totalpoints;

?>		

		</h3>

				<p style="text-align: left; color: #0D83DD; font-size: 16px;    opacity: .5;">Receive from Client</p>

			</div>

			<div class="col-md-4">

		<h3 style="text-align: center; color: #0D83DD; font-size: 32px"><?php echo $orderNr ?> 

<?php		

$pp = DB::table('journal')

->where('pagename','=', 'New Invoice')

->where('paymenttype','=', 'Due')

->where('bussid','=', session()->get('bussid'))->get();

$totaldues =0;

foreach($pp as $rowss) {

	 $totaldues += $rowss->Total;

}

echo " ".$totaldues;



?>		

		</h3>

			<p style="text-align: center; color: #0D83DD; font-size: 16px;    opacity: .5;">Over All Due</p>

			</div>

			<div class="col-md-4">

		<h3 style="text-align: right; color: #0D83DD; font-size: 32px"><?php echo $orderNr ?>  

<?php		

$pp = DB::table('journal')

->where('pagename','=', 'New Invoice')

->where('paymenttype','=', 'Cash')

->where('bussid','=', session()->get('bussid'))->get();

$totalcash =0;

foreach($pp as $rowss) {

	 $totalcash += $rowss->Total;

}

echo " ".$totalcash;



?>		

</h3>

			<p style="text-align: right; color: #0D83DD; font-size: 16px;    opacity: .5;">Paid Amount </p>

			</div>

		</div>	

	</div>



		

    <div class="row">

    <div class="col-md-12">

<div class="panel panel-default">



					<div class="col-md-6">

						<h3 style="margin-top: 18px;font-size: 23px;margin-left: 5px;opacity: .5;">All List</h3>

				

					</div>

					<div class="input-group col-md-6" style="text-align: right;">

						<span class="input-group-addon"><span class="fa fa-search"></span></span>

					<input type="text" class="form-control" id="serach" name="serach" placeholder="Find with Customer Name " value="">

					<div class="input-group-btn">

					<!-- <button class="btn btn-primary findbutton">Search</button>-->

					<button class="btn btn-primary findreset" style="margin-left: 5px;">Reset</button>

					</div>			

			</div>

			<div class="panel-body">



<div class="table-responsive">

    <table class="table table-striped table-bordered">

     <thead>

      <tr>

         <th width="80%" class="sorting" data-sorting_type="asc" data-column_name="v_id" style="cursor: pointer">Description <span id="id_icon"></span></th>





       <th width="5%">Op Amt</th>

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

                          <h4 class="modal-title">
                                <div id="pagetitle"></div>
                          </h4>  

                     </div>  

                     <div class="modal-body">

<!--- --->

    <div class="container-fluid">
 <?php 

                          $orderObj = DB::table('vendo')->select('CustomerID')
                          ->where('bussid','=',session()->get('bussid'))
                          ->latest('CustomerID')->first();

                          if ($orderObj) {



                          $orderNr = $orderObj->CustomerID;

                          $removed1char = substr($orderNr, 4);

                          $generateOrder_nr = $stpad = 'ACC-' . str_pad($removed1char + 1, 8, "0", STR_PAD_LEFT);

                          }

                          else

                          {



                          $generateOrder_nr = 'ACC-' . str_pad(1, 8, "0", STR_PAD_LEFT);

                          }



                      ?>
      

                        @csrf

                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
     

                      <div class="col-md-12" style="display: none">

                      <label for="firstname" class="col-md-2 control-label">Date</label>

                      <div class="col-md-4">

                      <?php //echo $query; 



                      $date= date('d-m-Y');

                      $time = date("d/m/y : H:i:s", time());

                      ?>





                      <input class="calender form-control" type="date" id="Jdate" name="dates" value="<?php echo date('Y-m-d'); ?>"/>

                      <input type="text" class="form-control calender" name="xdate" id="bussid" value="<?php echo $bussid; ?>"  required/>



                      <input type="hidden" name="xuser" id='xuser' value=""/>

                      <input type="hidden" name="bussid" id='bussid' value="<?php echo $bussid ?>"/>



                      </div>

                      <label for="firstname" class="col-md-2 control-label">Customer ID</label>

                      <div class="col-md-4">

                      <input type="text" name="Jno" id="Jno" value="<?php echo $generateOrder_nr ?>" 
                      class="form-control "/>  
                      </div>   

        

                </div>

    

             



         <div class="col-md-12" style=" margin-top: 2px;">


                    <div class="form-group col-md-6">

                      <label>First Name</label>


                        <input type="text" id="CID" name="CID" class="form-control" placeholder="First Name">
                    </div>

                    <div class="form-group col-md-6">
                      <label>Last Name</label>

                    <input type="text" id="Area" name="Area" class="form-control" placeholder="Last Name">


                     </div>

        </div>  

        <div class="col-md-12" style=" margin-top: 2px;">

                    <div class="form-group  col-md-6">

                      <label>Company Name</label>

                        <input type="text" id="name" name="name" class="form-control" placeholder="Company Name">
                    </div>

                    <div class="form-group  col-md-6">
                      <label>Email</label>


                         <input type="text" class="form-control calender" id="Email" name="Email" dir="ltr" placeholder="Email" size="18" value="">


                     </div>

        </div> 
        <div class="col-md-12" style=" margin-top: 2px;">

                    <div class="form-group  col-md-6">

                      <label>Mobile No</label>

                         <input type="text" class="form-control calender" id="Phone" name="Phone" dir="ltr" size="18" placeholder="Mobile No" value="">


                    </div>

                    <div class="form-group  col-md-6">
                      <label>Address</label>


                         <input type="text" class="form-control calender" id="addressBox" name="addressBox" dir="ltr" placeholder="Address....." size="18" value="">


                     </div>

        </div>  
                <div class="col-md-12" style=" margin-top: 2px;">

                    <div class="form-group  col-md-6">

                      <label>Country</label>

                         <input type="text" class="form-control calender" 
                         id="District" name="District" dir="ltr" placeholder="Country" size="18" value="">
 

                    </div>

                    <div class="form-group  col-md-6">
                      <label>Web Site</label>

                    <input type="text" id="url" class="form-control" value="" placeholder="URL" />


                     </div>

        </div>  



        <div class="col-md-12" style=" margin-top: 2px;">

                    <div class="form-group col-md-6">

                      <label>Opening Balance Date</label>


                        <input type="date" class="form-control calender" id="vendosince" name="vendosince" dir="ltr" size="18" value="<?php echo date('Y-m-d'); ?>">

                    </div>
                    <div class="form-group col-md-6">
                      <label>Opening Balance </label>

                   <input type="text" id="balance" class="form-control" value="0.00" />
                   <input type="hidden" id="actionupdate" class="form-control" value="" />
                   <input type="hidden" id="autoid" class="form-control" value="" />
                 

               

                    </div>

        </div>  
                <div class="col-md-12" style=" margin-top: 2px;">

                    <div class="form-group col-md-6">

                      <label>Type</label>

                        <select name="customertype" id="customertype" class="form-control" required="">
                           
                             <option value="Customer">Customer</option>
                              <option value="Supplier">Supplier</option>
                        </select>

                    </div>

        </div>      



        <!-- -->



        <!-- -->

    </div>

<!-- -->
                    <div id="messagedatapage"></div>

                     </div>  

                     <div class="modal-footer">  

                         

                          <input type="submit" name="action" id="action" class="btn btn-success addJournal_cmdadd" value="Update" />  

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

    $('.addJournal_cmdadd').click(function () 
    {

        var jdate = $('#Jdate').val();
        var jno = $('#Jno').val();
        var xuser = $('#xuser').val();
        var bussid = $('#bussid').val();
        var name = $('#name').val();
        var addressBox = $('#addressBox').val();
        var vendosince = $('#vendosince').val();
        var balance = $('#balance').val();
        var Phone = $('#Phone').val();
        var Mobile = $('#Mobile').val();
        var District = $('#District').val();
        var Thana = $('#Thana').val();
        var Email = $('#Email').val();
        var url = $('#url').val();
        var CID = $('#CID').val();
        var Area = $('#Area').val();
        var customertype = $('#customertype').val();
         var actionupdate = $('#actionupdate').val();
         var autoid = $('#autoid').val();
        var _token = $('input[name="_token"]').val();
         var actionupdate = $('#actionupdate').val();
       // alert(name);

    $('#messagedatapage').html('');

      if(jdate=='' || bussid=='' || name=="" || addressBox=="" || vendosince=="" || Mobile=="" || District=="" ||  Thana=="" || CID=="" || Area=="")
      {

        $('#messagedatapage').html('<div class="alert alert-danger"><strong>Required !</strong> Insert the required Failed.</div>'); 
        return false;

      }
      else {


 ////////////////////////////////////////////////////////////////////////////////////////
            $.ajax({

            headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            },

            url:'./newcustomer/adddatapost',

            data:'jdate='+jdate+'&jno='+jno+'&xuser='+xuser+'&bussid='+bussid+'&_token='+_token+'&name='+name+'&addressBox='+addressBox+'&vendosince='+vendosince+'&balance='+balance+'&Phone='+Phone+'&Mobile='+Mobile+'&District='+District+'&Thana='+Thana+'&Email='+Email+'&url='+url+'&CID='+CID+'&Area='+Area+'&actionupdate='+actionupdate+'&autoid='+autoid+'&customertype='+customertype,

            type:'GET',

            //    dataType:"json",

            success:function(data)

            {

              //alert(data);

            toastr.success(data.message, data);

            location.reload();

            $('#showdata').html(data);

            }

            });

            return false;      
 /////////////////////////////////////////////////////////////////////////////////////////          

////////////////////////////////////////////////////////////////////////////////////////////
         }  
      });

    $('.Save').click(function() 

		{

			$('#showdata').html('');

			var FullName = $('#FullName').val();

			var _token = $('input[name="_token"]').val();

			$.ajax({

			headers: {

			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

			},

			url:'./newcustomerlist/adddatapost',

			data:'FullName='+FullName,

			type:'GET',

			//    dataType:"json",

			success:function(data)

			{

			//  alert(data);

			toastr.success(data.message, data.title);

			//location.reload();

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

			url:'./newcustomerlist/update_data',

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

			url:'./newcustomerlist/test',

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

	///location.reload();

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

   url:"./newcustomerlist/fetch_data?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,

   success:function(data)

   {

    $('tbody').html('');

    $('tbody').html(data);

   }

  })

 }

  function fetch_data_search(page, sort_type, sort_by, query)

 {

 // alert('');

  $.ajax({

    headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            },

   url:"./newcustomerlist/fetch_data_search?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,

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

  fetch_data_search(page, sort_type, column_name, query);

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
 $(document).on('click', '.createnewaccount', function(){  

   //  $('#userModal').modal('show'); 
 var jno = $('#Jno').val('');

        $('#name').val('');

        $('#addressBox').val('');

        $('#vendosince').val('');

        $('#balance').val('');

        $('#Phone').val('');

        $('#Mobile').val('');

        $('#District').val('');

        $('#Thana').val('');

        $('#Email').val('');

        $('#url').val('');

        $('#CID').val('');
         $('#autoid').val('');

        var Area = $('#Area').val('');
     $('#actionupdate').val('add');
     $('#messagedatapage').html('');
     $('#pagetitle').html('Create New Client');

       $('#editformpage').html('');
  


  });


 $(document).on('click', '.update', function(){  

 	 $('#userModal').modal('show'); 
    $('#pagetitle').html('Edit Client');
       var user_id = $(this).attr("id"); 
      // alert(user_id);

	   var _token = $('input[name="_token"]').val();

		$('#showmessage').html('');		   

       $.ajax({  

       		headers: {

			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

			},

            url:"./newcustomerlist/finddata", 

            method:"GET",  

            data:{user_id:user_id},  

            success:function(data)  

            {

                var data = $.parseJSON(data);
              //  console.log('dddd' + data[0]['v_id']);
				//$('#editformpage').html(data);
              //  alert(data[0].v_id);
                        var jdate = $('#Jdate').val(data[0].Date);

        var jno = $('#Jno').val(data[0].CustomerID);

        var name = $('#name').val(data[0].name);

        var addressBox = $('#addressBox').val(data[0].addr);

        var vendosince = $('#vendosince').val(data[0].vendosince);

        var balance = $('#balance').val(data[0].balance);

        var Phone = $('#Phone').val(data[0].phone);

        var Mobile = $('#Mobile').val(data[0].phone);

        var District = $('#District').val(data[0].District);

        var Thana = $('#Thana').val(data[0].name);

        var Email = $('#Email').val(data[0].mail);

        var url = $('#url').val(data[0].web);

        var CID = $('#CID').val(data[0].CID);
         $('#autoid').val(data[0].v_id);

        var Area = $('#Area').val(data[0].Area);
        $('#actionupdate').val('update');


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

