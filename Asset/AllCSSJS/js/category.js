$('#dvLoading').hide();

 $(document).ready(function(){  
		showcategory();
		
 $(document).on('click', '.delete', function(){
  var id = $(this).attr("id");
   var _token = $('input[name="_token"]').val();
  if(confirm("Are you sure you want to delete this records?"))
  {
   $.ajax({
	    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    url:"./category/delete_data",
    method:"POST",
    data:{id:id, _token:_token},
    success:function(data)
    {
     $('#message').html(data);
     showcategory();
    }
   });
  }
 });	
		
	$('#formLike').submit(function( event ) {
    event.preventDefault();
    $.ajax({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: './category/add_data',
			type: 'post',
			data: $('#formLike').serialize(),
			cache: false,
			success: function(data) {
			location.reload();
			//alert(data);
			console.log(data);
			},
			error: function() {
			alert('error handling here');
			}
    });
});
//https://laracasts.com/discuss/channels/laravel/laravel-56-ajax-call-419-unknown-status
/*		
	  $(document).on('click', '.addcategory', function(){  
           var CategoryName=$("#CategoryName").val(); 
		   alert();
           var xuser=$("#xuser").val(); 
		   if(CategoryName=="")
		   {
			   alert('Insert the Category');
		   }
		   else 
		   {
			   
				//alert(xuser);
				var action = "add category";
				$.ajax({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url:'./category/add_data',
				data:'CategoryName='+CategoryName+'&xuser='+xuser+'&action='+action,
				type:'POST',
				error:function() { 
				alert('error')
				},
				success:function(data)
				{
				//alert(data);
				//showcategory();
				$('#test').html(data);
				}
				});
		   }
      });
	  /*
	//updateuser
		$(document).on('click', '.updatecategory', function(){  
		   var EditCategoryName = $("#EditCategoryName").val(); 
           var ID=$("#CategoryID").val(); 
		   var action = "Update_Category";
			$.ajax({
			url:'save_data.php',
			data:'EditCategoryName='+EditCategoryName+'&action='+action+'&ID='+ID,
			type:'POST',
			error:function() { 
			alert('error')
			},
			success:function(data)
			{
			alert(data);
			}
			});
		});
  */ 
 });

 function showcategory()
 {
	$.ajax({
	headers: {
	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	},
	url:"./category/fetch_data",
	dataType:"json",
	success:function(data)
	{
	var html = '';
	for(var count=0; count < data.length; count++)
	{
	html +='<tr>';
	html +='<td contenteditable class="column_name" data-column_name="CategoryName" data-id="'+data[count].id+'">'+data[count].CategoryName+'</td>';
	html += '<td contenteditable class="column_name" data-column_name="EnteredBy" data-id="'+data[count].id+'">'+data[count].EnteredBy+'</td>';
	html += '<td><button type="button" class="btn btn-danger btn-xs delete" id="'+data[count].id+'">Delete</button></td></tr>';
	}
	$('tbody').html(html);
	}
	});

 }
 /*
 function getcategory(getcategory)
 {

			var action = "Show Category for Edit";
	 		$.ajax({
			url:'save_data.php',
			data:'action='+action+'&getcategory='+getcategory,
			type:'POST',
			error:function() { 
			alert('error')
			},
			success:function(data)
			{
			$('#editform').html(data);
			}
			});
 }
//deletecategory
 function deletecategory(deletecategory)
 {
			//alert(deletecategory);
			var action = "Delete Category";
	 		$.ajax({
			url:'save_data.php',
			data:'action='+action+'&deletecategory='+deletecategory,
			type:'POST',
			error:function() { 
			alert('error')
			},
			success:function(data)
			{
			$('#editform').html(data);
			location.reload();
			}
			});
 }
 */