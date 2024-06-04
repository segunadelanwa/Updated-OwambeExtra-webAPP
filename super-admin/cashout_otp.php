 <!DOCTYPE html>
<html lang="en">
    <head>
<?php
require"header_meta.php";
?>
 </head>
<body class="sb-nav-fixed">
<?php
require"header_connect.php"; 


include"headernav.php";

?> 


  
 	
		
		
  <div id="layoutSidenav">
  		<?php

		include"sidebar.php";

		?> 
      <div id="layoutSidenav_content">
                <main>
					<?php
					if(!empty($msg_success)) 
					{
									 
					echo'
								
									<div class="alert alert-warning alert-dismissible fade show" role="alert">
									<strong>Notification!</strong> '.$msg_success.'
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
									</div>
					';
					}
					?>




 

                    <div class="container-fluid">
                        <h2 class="mt-3" style="text-transform: ;">
 
						</h2>
					   <div class="row">
						
                            <div class=" col-md-12">
                                <div class="card bg-light text-dark mb-4">
								
                                    <div class="card-body"> 
									<i class="fa fa-lock"style="color:red;font-size:30px;float:right;"></i><br>
									<h3> OTP CONFIRMATION </h3>
									</div>
									
                                    <div class="card-footer d-flex align-items-center justify-content-between ">
										<ol class="breadcrumb mb-4">
										<li class="breadcrumb-item active" style="text-decoration:underline;"><i> <a href="index.php">Home</a>&nbsp; / &nbsp; Payment confirmation</i></li>
										</ol>
                                        <div class="small text-white"><b>   </b></div>
                                    </div>
									
									 
                                </div>
                            </div>
                        

					   </div>
						 </center>
 

 
 



		<div class="card col-md-12 m-l">
	 <div  class="container">
<?php 
 

	

if(isset($_POST['cashout_code']))
{
   $event_code = $_POST['cashout_code'];
	
echo'
		  <form  method="POST" id="wallet_cashout_form">
		  
		  
		   <div class="form-group col-md-6"><br>
		   
			   <label for="mname">Please provide the OTP sent to your registered email address</label>
			

			  <label class="form-group col-md-8">Enter OTP Code Sent to <b class="text-blue">'.$email.' </b></label> 
			  <input type="number" id="loadOTP"     name="loadOTP"    value=" " class="form-control col-md-5"  data-parsley-checkemail data-parsley-checkemail-message=\'<span style="color:red;">* Wrong OTP Code</span>\'  required />
			  <br>
			
			  
			 
                <br> <br> <br> <br> 
					<input type="hidden" name="page"  id="page" value="wallet_otp" />
					<input type="hidden" name="action"  id="action" value="otp_approve" />
					              
								  
								  
			  <div id="eventIdDetails">
			  
			 
			  </div>	
					
					
					
 
				<input type="submit" name="send_otp" id="send_otp" data-code="'.$event_code.'"   value="Submit OTP"   class="btn btn-success"/>
				
				<input type="button" id="sendOtp"  value="Resend OTP"   class="btn btn-primary"/>
			 
 
			

				
	        </div>

		   </form>
';
}
else
{

echo'

					  <h4 class="m-b-50 mt-3" align="center">
						 <label style="color:#f00;">	<i class="fa fa-bell"></i> <br><br>
						 OTP VERIFICATION FAILED!!
						 <br></label><br><br> 
						
					</h4>

';



	
}
?>
		</div>
</div>
      	
 


                                
 

 
				  
                </main>

	<footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between  ">
                            <div class="text-muted">
							<?php
							include("../footer.php");
							?>
						   </div> 
                            <div>
                                 
                              
                            </div>
                        </div>
                    </div>
                </footer>
           

   </div>


 
      





</body>

</html>


<script>

$(document).ready(function(){
	

	

 
	$(document).on('click', '#send_otp', function(){
	 
	
		
	const sendOtp = document.querySelector('#send_otp'); 
	const loadOTP = document.querySelector('#loadOTP').value; 

	const Cashcode  = sendOtp.dataset.code;  
	// user    = sendOtp.dataset.user;    
	// cashout = sendOtp.dataset.cashout;    
	 
		
			$.ajax({
				url:"super_pageajax.php",
				method:"POST",
				dataType:"json",
                data:{
					page:'wallet_otp', 
					Cashcode:Cashcode, 
					action:'otp_approve',
			        loadOTP:loadOTP},
				beforeSend:function()
				{
				$('#send_otp').attr('disabled', 'disabled');
				$('#send_otp').val('Checking OTP...');
				},
				success:function(data)
				{
				   alert(data.feedback1);
				   window.location=(data.feedback2);
				   
				   $('#send_otp').val('RESEND OTP');
				   $('#send_otp').attr('disabled', false);
				}
			});	
		
		
	});
	
	
	
 
	$(document).on('click', '#sendOtp', function(){
	 
	
		
	const sendOtp = document.querySelector('#sendOtp'); 

	const Cashcode  = sendOtp.dataset.code;  
	// user    = sendOtp.dataset.user;    
	// cashout = sendOtp.dataset.cashout;    
	 
		
			$.ajax({
				url:"super_pageajax.php",
				method:"POST",
                data:{page:'wallet_otp', Cashcode:Cashcode, action:'reSendOtp'},
				beforeSend:function()
				{
				$('#sendOtp').attr('disabled', 'disabled');
				$('#sendOtp').val('Sending OTP...');
				},
				success:function(data)
				{
				   alert(data);
				   $('#sendOtp').val('RESEND OTP');
				   $('#sendOtp').attr('disabled', false);
				}
			});	
		
		
	});

  
  
  
  

});


	  
	  
</script>

