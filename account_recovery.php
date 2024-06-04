<!DOCTYPE html>
<html lang="en">

<head>
	<title>Nigeria no1 Owanbezone</title>
<?php

include"header.php";

	 
	if(isset($_GET['user'], $_GET['code']))
	{

            if($getRow = $loader->emailVerification($_GET['user'], $_GET['code']) == 1)
			{
		 
		        if($loader->confirmVerification($_GET['user'], $_GET['code']) == 'no')
				{
							$loader->data = array(
							':user_email_verified'	=>	'yes',
							':user_email'	=>	''.$_GET['user'].''
							);

							$loader->query = "
							UPDATE login_table
							SET acc_verify = :user_email_verified 
							WHERE username = :user_email
							";
							
                            $verify_status = $loader->execute_query();
							
				
							$msg_remove='Account Verified Successful!!';

					 

					}else{

					$msg_remove='Account Already Verified ';	

					}			

			
			}else{
				
			$msg_remove='Invalid Account Verification!! ';	
			
			}
		
		
		
		
		
		}

	
	
?>



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
					   
					   
		  <form  method="POST" id="wallet_cashout_form">
		  
		  
		   <div class="form-group col-md-"><br>
		   
 		 


			  <label class="form-group col-md-">Enter Email Address </label> 
			  <input type="email" id="userID"     name="userID"    placeholder="example@example.com" class="form-control "  data-parsley-checkemail data-parsley-checkemail-message='<span style="color:red;">*This email is  not registered. Please goto Signup to get started </span>'  required />
			  <br>
			
    		  
			 
               
					<input type="hidden" name="page" id="page"  value="AccountRcover" />
					<input type="hidden" name="action" id="action" value="SendLink" />
					
					
                
				 
					
					<input type="submit" name="savings_cashout" id="savings_cashout"   value="Search Account"   class="btn btn-primary"/>
				

				 
				
					
			

				
	        </div>

		   </form>
 
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


const userID = document.querySelector('#userID');
const otpBtn = document.querySelector('#otpBtn');
const sCashout = document.querySelector('#savings_cashout');

$(otpBtn).attr('disabled', true);
  
	 window.ParsleyValidator.addValidator('checkemail', {
    validateString: function(value){
      return $.ajax({
        url:"pageajax.php",
        method:'post',
        data:{page:'AccountRcover', action:'check_email', email:value},
        dataType:"json",
        async: false,
		 beforeSend:function()
        {
           $(otpBtn).attr('disabled', true); 
        },
        success:function(data)
        {
			if(data.success == 'success'){
                   $(otpBtn).attr('disabled', false);
                   $(sCashout).attr('display', false);
				   $(sCashout).attr('id', 'sendLink').val('Send Recovery Link To Email'); 				   
				   $(sCashout).addClass('btn-success'); 				   
                    			   
            }
        }
      });
    }
  });
  

 

 
  
  
  
  
  ///////////////////////////////////////////////////////////////////////////////////////
  $('#wallet_cashout_form').parsley();

  $('#wallet_cashout_form').on('submit', function(event){
    event.preventDefault();
 
 

    $('#user_email_address').attr('required', 'required');

    $('#user_email_address').attr('data-parsley-type', 'email');
 
	
	
	

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
          $('#sendLink').attr('disabled', true);
          $('#sendLink').val('Sending link please wait...');
        },
        success:function(data)
        {
       
	   
	     if(data.success == 'success'){
			
          $('#sendLink').attr('disabled', true);
          $('#sendLink').val('Recovery Link Sent');
		  
        }else{

          $('#sendLink').attr('disabled', false);
          $('#sendLink').val('Resend Recovery Link To Email');	     
		 		

		}
		
		
		}
      })
    }

  });
  
  
 
  
  

});


	  
	  
</script>







