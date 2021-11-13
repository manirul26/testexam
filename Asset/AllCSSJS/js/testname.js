$('#dvLoading').hide();
 $(document).ready(function(){  
		showtestname();
	  $(document).on('click', '.addtestname', function(){  
           var FullName=$("#FullName").val(); 
           var categoryname=$("#categoryname").val(); 
           var xuser=$("#xuser").val(); 
		   if(FullName=="" || categoryname=="")
		   {
			   alert('Insert the Test Name and Category Name');
		   }
		   else  
		   {
				//alert(xuser);
				var action = "add testname";
				$.ajax({
				url:'save_data.php',
				data:'FullName='+FullName+'&categoryname='+categoryname+'&xuser='+xuser+'&action='+action,
				type:'POST',
				error:function() { 
				alert('error')
				},
				success:function(data)
				{
				alert(data);
				
				$('#test').html(data);
				location.reload();
				}
				});
		   }
      });
	//updateuser
		$(document).on('click', '.updatetestname', function(){  
		   var EditTestName = $("#EditTestName").val(); 
		   var Editcategoryname = $("#Editcategoryname").val(); 
           var ID=$("#EditTestNameID").val(); 
		   var action = "Update_TestName";
			$.ajax({
			url:'save_data.php',
			data:'EditTestName='+EditTestName+'&Editcategoryname='+Editcategoryname+'&action='+action+'&ID='+ID,
			type:'POST',
			error:function() { 
			alert('error')
			},
			success:function(data)
			{
			alert(data);
			location.reload();
			}
			});
		});
  
 });
 function showtestname()
 {
	// alert('P');
			var action = "Show Testname";
	 		$.ajax({
			url:'save_data.php',
			data:'action='+action,
			type:'POST',
			error:function() { 
			alert('error')
			},
			success:function(data)
			{
			$('#datagridshow').html(data);
			}
			});
 }
 function gettestname(gettestname)
 {
			//alert(gettestname);
			var action = "Show testname for Edit";
	 		$.ajax({
			url:'save_data.php',
			data:'action='+action+'&gettestname='+gettestname,
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
//deletecategory
 function deletetestname(deletetestname)
 {
			//alert(deletecategory);
			var action = "Delete TestName";
	 		$.ajax({
			url:'save_data.php',
			data:'action='+action+'&deletetestname='+deletetestname,
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
