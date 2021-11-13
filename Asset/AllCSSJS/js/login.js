$('#dvLoading').hide();
 $(document).ready(function(){  

		showuser();
		$(document).on('click', '.login', function(){  
           var UserName=$("#UserName").val(); 
           var Password=$("#Password").val(); 
		   var action = "login";
			$.ajax({
			url:'loginsuccessfull.php',
			data:'UserName='+UserName+'&Password='+Password+'&action='+action,
			type:'POST',
			error:function() { 
			alert('error')
			},
			success:function(data)
			{
				//alert(data);
			$('#error_message').html(data);
			}
			});

      }); 
	  $(document).on('click', '.adduser', function(){  
           var FullName=$("#FullName").val(); 
           var UserName=$("#UserName").val(); 
           var Password=$("#Password").val(); 
           var AccessLevel=$("#AccessLevel").val(); 
           var xuser= $("#xuser").val(); 
		   var action = "createuser";
		   	var a=[];
			$('.myCheckboxes').each(function() { //loop through each checkbox
                if(this.checked) a.push(this.value);
				//alert(a);
            });
			$.ajax({
			url:'save_data.php',
			data:'FullName='+FullName+'&UserName='+UserName+'&Password='+Password+'&action='+action+'&xuser='+xuser+'&AccessLevel='+AccessLevel+'&ids='+a,
			type:'POST',
			error:function() { 
			alert('error')
			},
			success:function(data)
			{
			//	alert(data);
				showuser();
			$('#test').html(data);
			}
			});
      });
	//updateuser
		$(document).on('click', '.updateuser', function(){  
		   var FullName=$("#EditFullName").val(); 
           var UserName=$("#EditUserName").val(); 
           var Password=$("#EditPassword").val(); 
           var AccessLevel=$("#EditAccessLevel").val(); 
           var Editxuser=$("#Editxuser").val(); 
           var ID=$("#ID").val(); 
		   	var a=[];
			$('.myCheckboxes').each(function() { //loop through each checkbox
                if(this.checked) a.push(this.value);
				//alert(a);
            });
		   var action = "Update_User";
			$.ajax({
			url:'save_data.php',
			data:'FullName='+FullName+'&UserName='+UserName+'&Password='+Password+'&action='+action+'&ID='+ID+'&Editxuser='+Editxuser+'&ids='+a+'&AccessLevel='+AccessLevel,
			type:'POST',
			error:function() { 
			alert('error')
			},
			success:function(data)
			{
				showuser();
		//	alert(data);
			location.reload();
			}
			});
		});
  
 });
 function showuser()
 {
			var action = "Show User";
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
 function getuser(getuser)
 {
	 var id = $(this).attr('data-id');
	// alert(getuser);
	 var action = "Show User Edit";
	 		$.ajax({
			url:'save_data.php',
			data:'action='+action+'&getuser='+getuser,
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
//delete_Userlist
 function deleteid(deleteid)
 {
	 //alert(a);
	 //var answer = confirm('Are you sure you want to delete this?');
	
		//alert('Start');
	
	 var action = "delete_Userlist";
	 		$.ajax({
			url:'save_data.php',
			data:'action='+action+'&deleteid='+deleteid,
			type:'POST',
			error:function() { 
			alert('error')
			},
			success:function(data)
			{
				//alert(data);
			$('#editform').html(data);
			}
			});
	
 }