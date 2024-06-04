<!DOCTYPE html>
<html>
<head>

<title>REST API CRUD using PHP Mysql  </title>

			
<script ="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<script ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 

<script src="http://127.0.0.1/rest-api-crud.com/jquery.min.js"></script>
<link   rel="stylesheet" href="http://127.0.0.1/rest-api-crud.com/bootstrap.min.css"/>
<script src="http://127.0.0.1/rest-api-crud.com/bootstrap.min.js"></script> 


</head>
<body>

<div class="container">

		<br />
		<h3 align="center">REST API CRUD using  PHP on Mysql  </h3>
		<br />


	<div align="center" >
<button type="button" name="add-button" id="add_button" class="btn btn-success btn-xs "style="margin-bottom:5px;padding:10px;">
Add
</button>

	</div>
	
	
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
				<th>Surame</th>
				<th>lasname</th>
				<th>password</th>
				<th>Edit</th>
				<th>Delete</th>
 
				
				</tr>
			</thead>
			
			
			<tbody>
			
			</tbody>
			
			
			
		 </table>
	</div>


</div>


</body>
</html>

<div  id="apicrudModal" class="modal fade" role="dialog">


	<div class="modal-dialog">

		<div class="modal-content">
			<form method="post" id="api_crud_form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">$times;</button>
					<h4 class="modal-title"> </h4>
				</div>

				<div class="modal-body">
				
					<div class="form-group">
						<label"> Enter Fullname</label>
						<input type="text" name="fullname" id="fullname" class="form-control" />
					</div>

					<div class="form-group">
						
						<label">Username</label>
						<input type="email" name="username" id="username" class="form-control" />
					</div>

					<div class="form-group">
						
						<label">Phone</label>
						<input type="number" name="phone" id="phone" class="form-control" />
					</div>

					<div class="form-group">
						
						<label"> Enter Password</label>
						<input type="password" name="password" id="password" class="form-control" />
					</div>
					
					
				</div>
				
			    <div class="modal-footer">
					 <input type="hidden" name="hidden_id" id="hidden_id"  value="id" /> 
					 <input type="hidden" name="login" id="login"  value="register" /> 
					 <input type="hidden" name="action" id="action"  value="action" /> 
					 
					 
					 <input type="submit" name="button_action" id="button_action" class="btn btn-info" value="insert" />

					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					 
				</div>
				
			</form>
			
			
			
		</div>
	</div>

</div>



 
<script type="text/javascript">
$(document).ready(function()
{
	 fetch_data();
	
	function fetch_data()
	{
		$.ajax({
		  //url:"https://www.oxfordrealvestng.com/api/work/fetch.php",
		  url:"http://127.0.0.1/mobileapi.com/work/fetch.php",
           success:function(data)
		   {
              $('tbody').html(data);
		   }			   
			
		})


	}
	
	
	$('#add_button').click(function()
	{
		$('#action').val('Insert');
		$('#button_action').val('Insert');
		$('.modal-title').text('Add Data');
		$('#apicrudModal').modal('show');
		
	});
	
	$('#api_crud_form').on('submit', function(event)
	{
	 event.preventDefault();
	 
		 if($('#first_name').val()=='')
		 {
           alert("Enter Surname");

		 }
		 else if($('#last_name').val() =='')
		 {
           alert("Enter Lastname");			
			
		 }
		 else if($('#password').val() =='')
		 {
           alert("Enter Password");			
			
		 }
		 else
         {
            var form_data = $(this).serialize();
			$.ajax(
			{
				url:"http://127.0.0.1/mobileapi.com/work/api_verify.php", 
				method:"POST",
				data:form_data,
				dataType:"json",
				success:function(data)
				{
					fetch_data();
					$('#api_crud_form')[0].reset();
					$('#apicrudModal').modal('hide');
					
					if(data.feedback1 == 'insert')
					{
					  alert(data.feedback);
					  
					}else if(data.feedback1 == 'error'){
						
                         alert(data.feedback);
					}				 
					 
					 
					
					if(data.result == 'success')
					{
					   alert(data.feedback);
						
					}else if(data.result == 'error'){
						
                         alert(data.feedback);
					}
					
					
				}
				
				
			});
         }			 
		
		
	});
	
	
	 $(document).on('click', '.edit', function()
	 {
		var id     = $(this).attr('id');
		var action ='action';
		var login  ='fetch_single';
		$.ajax({ 			
			url:"http://127.0.0.1/mobileapi.com/work/api_verify.php",
			method:"POST",
			data:{id:id,  action:action, login:login},
			dataType:"json",
			success:function(data)
			{
			   $('#hidden_id').val(data.id);	
			   $('#fullname').val(data.fullname);	
			   $('#username').val(data.username);	
			   $('#phone').val(data.phone_no);	
			   $('#password').val(data.password);	
			   $('#login').val('update_user');	
			   $('#button_action').val('Update');	
			   $('.modal-title').text('Edit Data');	
			   $('#apicrudModal').modal('show');	
			   
				
			}
		})
		 
	 });
	


	 $(document).on('click', '.delete', function()
	 {
		var id     = $(this).attr('id');
		var action ='action';
		var login  ='delete_single';
		
		if(confirm("Are you sure you want to remove this data ?   ")){
		
				$.ajax({ 			
					url:"http://127.0.0.1/mobileapi.com/work/api_verify.php",
					method:"POST",
					data:{id:id,  action:action, login:login},
					dataType:"json",
					success:function(data)
					{
 	                     fetch_data();
					   
						alert("User Info Deleted!")
					}
				});
		
		}
		 
	 });
	

	
	
});
</script>

