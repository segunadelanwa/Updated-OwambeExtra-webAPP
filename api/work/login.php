 <!DOCTYPE html>
<html>
<head>

<title>REST API CRUD using PHP Mysql  </title>

			
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 

<script src="http://127.0.0.1/rest-api-crud.com/jquery.min.js"></script>
<link   rel="stylesheet" href="http://127.0.0.1/rest-api-crud.com/bootstrap.min.css"/>
<script src="http://127.0.0.1/rest-api-crud.com/bootstrap.min.js"></script> 


</head>
<body>

<div class="container">
<br><br><br><br><br><br><br><br><br><br><br>

<div class="col-md-4">
</div>


 <div class=" col-md-4 card">

 <h2> Account Login </h2>
			<form method="post" id="api_crud_form">
 

				<div class="card-body">
				
					<div class="form-group">
						<label"> Username</label>
						<input type="text" name="username" id="username" class="form-control" />
					</div>

					<div class="form-group">
						
						<label">Password</label>
						<input type="password" name="password" id="password" class="form-control" />
					</div>

	 

 
					
					
				</div>
				
			    <div class="modal-footer">
					 <input type="hidden" name="login" id="login"  value="login" /> 
					 <input type="hidden" name="action" id="action"  value="action" /> 
					 
					 
					 <input type="submit" name="button_action" id="button_action" class="btn btn-info" value="Login" />

					 
					 
				</div>
				
			</form>
			
			
			
	 
	</div>


<div class="col-md-4">
</div>
</div>

	
 


</div>


</body>
</html>


<script type="text/javascript">
$(document).ready(function()
{
	 fetch_data();
	
	function fetch_data()
	{
		$.ajax({
		  
		  url:"http://127.0.0.1/mobileapi.com/api/work/fetch.php",
           success:function(data)
		   {
              $('tbody').html(data);
		   }			   
			
		})


	}
	
	
	$('#button_action').click(function()
	{ 
		$('#button_action').text('Wait..');
		
	});
	
	$('#api_crud_form').on('submit', function(event)
	{
	 event.preventDefault();
	 
		 if($('#username').val()=='')
		 {
           alert("Enter Surname");

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
				//url:"https://oxfordrealvestng.com/api/work/login_verify.php",
				method:"POST", 
				data:form_data,
				dataType:"json",  
				success:function(data)
				{
					fetch_data();
					$('#api_crud_form')[0].reset();
					$('#apicrudModal').modal('hide');
					 
						//alert(data.feedback1);
				 
					
					if(data == 'update')
					{
					  alert("Data update using PHP API");	
					}
					
					
				}
				
				
			});
         }			 
		
		
	});
	
	
	 $(document).on('click', '.edit', function()
	 {
		var id     = $(this).attr('id');
		var action ='fetch_single';
		$.ajax({
			
			url:"http://127.0.0.1/mobileapi.com/work/api_verify.php",
			method:"POST",
			data:{id:id,  action:action},
			dataType:"json",
			success:function(data)
			{
			   $('#hidden').val(id);	
			   $('#first_name').val(data.first_name);	
			   $('#last_name').val(data.last_name);	
				
			}
		})
		 
	 });
	
	
	
});
</script>

