<!DOCTYPE html>
<html lang="en">

<head>
	<title>Nigeria no1 Owanbezone</title>


</head>

<body onload="ConHide()">
	<!-- top-header -->
	<div class="agile-main-top">
		<div class="container-fluid">
			<div class="row main-top-w3l py-2">
				<div class="col-lg-4 header-most-top">
					<p class="text-white text-lg-left text-center">Owambe Zone  
						<i class="fas fa-shopping-cart ml-1"></i>
					</p>
				</div>
			</div>
		</div>
	</div>
 
 

 


	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php">Home</a> /
						 
					</li>

					<li>
						<a href="login">Login</a> /
						 
					</li>
					<li>Account Recovery</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //Main Page -->
<div class="row col-md-12 mb-5">

 <div class="col-md-3">	</div>

 <div class="col-md-6">
			<div class="card" style="margin-top:50px;margin-bottom: 10px;">
        		<div class="card-header" styl="background:#c908bd! important;"><h4>Account Recovery</h4></div>
        	
			<div class="card-body">
				
				<?php
 include"config.php";
 $loader = new Loader;
				if(!empty($msg_remove)) 
				{

				echo'

				<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Notification!</strong> '.$msg_remove.'
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>
				';
				}


				?>

<span id="message"></span>
<?php

include"header.php";

	 
	if(isset($_GET['account_reset'], $_GET['check']))
	{

            if($getRow = $loader->emailRecovery($_GET['account_reset'], $_GET['check']) == 1)
			{
		 

		echo' <form  method="POST" id="wallet_cashout_form">
		  
		  
		   <div class="form-group col-md-"><br>
		   
				 <div id="eventIdDetails">
					 <div class="form-group">
						<label>New Password</label>
						<input type="password" name="user_password" id="user_password" class="form-control" />
					  </div>
					  
					  <div class="form-group">
						<label>Confirm New Password</label>
						<input type="password" name="confirm_user_password" id="confirm_user_password" class="form-control" />
					  </div>

	 
						<input type="hidden" name="user" id="user"  value="'.$_GET['check'].'" />
						<input type="hidden" name="page" id="page"  value="AccountRcover" />
						<input type="hidden" name="action" id="action" value="passwordUPDATE" />
									  
				  </div>			  
			 
               

					<input type="submit" name="savings_cashout" id="savings_cashout"   value="Update Account Password"   class="btn btn-success"/>
									
                
				 
			    </div>		

             </form>
			 ';
			 
			
			
			}else{
				
			echo $msg_remove='<center style="color:red;">!OOPS Account Recovery Link Has Expired </center>';	
			
			}
		
		
		
		
		
		}


				
	
?>


				
					   
					   

				
					
			

				
	        

		   
 
        		</div>
      		
			</div>
    </div>
 
  <div class="col-md-3"> </div>
 
</div>
 
 <div class="copy-right py-3">
		<?php
	include"footer.php";
		?>
	</div>


</body>

</html>

<script>

$(document).ready(function(){

 
  ///////////////////////////////////////////////////////////////////////////////////////
  $('#wallet_cashout_form').parsley();

  $('#wallet_cashout_form').on('submit', function(event){
    event.preventDefault();
 
    $('#user_password').attr('required', 'required');

    $('#confirm_user_password').attr('required', 'required');

    $('#confirm_user_password').attr('data-parsley-equalto', '#user_password');
	
	

    if($('#wallet_cashout_form').parsley().validate())
    {
       $.ajax({
        url:'pageajax.php',
        method:"POST",
        data:new FormData(this),
        dataType:"json",
        contentType:false,
        cache:false,
        processData:false,
        beforeSend:function()
        {
          $('#savings_cashout').attr('disabled', true);
          $('#savings_cashout').val('please wait...');
        },
        success:function(data)
        {
       
	   
	     if(data.success == 'success'){
			
  
         alert('Account Password Updated Successfully!!');
         window.location('login');
		  
        }else{
	     
         alert('Account Password Update Failed!!');
         window.location('account_recovery.php');
		}
		
		
		}
      })
    }

  });
  
  
 
  
  

});


	  
	  
</script>







