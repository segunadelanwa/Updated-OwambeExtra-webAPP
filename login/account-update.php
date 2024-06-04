<!DOCTYPE html>
<html lang="en">

<head>
   <title>Owambe Extra Dashboard</title>
 
<?php

include"index_header.php";
include"head_loader.php";
$loader = new Loader;
?>


</head>

<body class="sidebar-mini fixed">


   <div class="loader-bg">
      <div class="loader-bar">
      </div>
   </div>
  
  <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header-top hidden-print">
      <?php
        include"headernav.php";
      ?>
      </header>
      <!-- Side-Nav-->
      <div>

		<?php
	       include"sidebar.php";
		?>

     </div>
		
		
      <div class="content-wrapper">
         <!-- Container-fluid starts -->
         <!-- Main content starts -->
         <div class="container-fluid">
            <div class="row">
               <div class="main-header">
                  <h4>ACCOUNT PROFILE UPDATE</h4>
                
				<div> 
                   <em>
				 
				 <a href="index.php" style="color:#777777 !important;"> Home </a> / <a href="#">Profile Update</a>
				  
				 </em>
               </div>

               </div>



            </div>
       
 

    
	<div class="container">                          
	<div class="card ">
	
		<div class="card-header">
		<div align="center" style="font-size:20px;"> ACCOUNT UPDATE <br><br></div>
		Note: One Time Password (OTP CODE) is required to update your account
		</div>
		
		

	</div>
	</div>								 

 



 
            <div class="row col-md-8">

               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-block">
                        <div class="table-responsive">

	<div lass="container">

	<div class="row">                          
	<div class="card ">
 

	<div class="card-body">
	<div class=" col-md-12 ">	 
	
	
               <form method="POST"  id="account_update_form">
			   
		 
					 
 

	 
									 


			 								 



						 

 <div class="row">
			  
 											 <div class="form-group col-md-12">
									  <label>Username / Email </label>
									  
                                   <input type="text" name="uname" class="form-control" value="<?php echo"$username"; ?>" required readonly>

									   
									 </div>
									 	 

 				   <div class="form-group col-md-6">
					   <label for="name">Firstname</label>
					   <input type="text" name="fname" class="form-control" value="<?php echo"$firstname"; ?>" required>
				   </div>
				   
 			 
 				   <div class="form-group col-md-6  ">
					   <label for="name">Surname</label>
					   <input type="text" name="sname" class="form-control"  value="<?php echo"$surname"; ?>"  required>
				   </div>	


				   
 				   <div class="form-group col-md-6">
					   <label for="name">Home Address</label>
					   <input type="text" name="h_address" class="form-control" value="<?php echo"$address"; ?>" required>
				   </div>

 				   <div class="form-group col-md-6">
					   <label for="name">Gender</label>
						<select name="gender"  required="required" aria-required="true" class="form-control">
						 
						<option><?php echo"$gender"; ?></option>
						<option>Male</option>
						<option>Female</option>
						<option>Other</option>
						</select>
				   </div>


              
 

   				   
				   
				   
				   <div class="form-group col-md-6">
					   <label for="name">Phone</label>
					   <input type="number" name="phone" class="form-control" value="<?php echo"$phone"; ?>"  required>
				   </div>


				   <div class="form-group col-md-6">
					   <label for="name">City</label>
					   <input type="text" name="city" class="form-control" value="<?php echo"$city"; ?>"  required>
				   </div>

				   <div class="form-group col-md-6">
					   <label for="name">State</label>
					   <input type="text" name="state" class="form-control" value="<?php echo"$state"; ?>"  required>
				   </div>


 				   <div class="form-group col-md-6">
					   <label for="name">Nationality</label>
					   <input type="text" name="nationality" class="form-control"  value="<?php echo"$country"; ?>"  required>
				   </div>

 			 
				   </div>
				   
									   
                                    <div style="color:green;"> Bank Account Details Update</div><hr>
				  <div class="row">
									  
				  
				  
							<div class="form-group col-md-8">
							   <label for="name">Bank Name</label>
						   <select class="form-control" name="bank_name" class="form-control" id="fname"  required>
							   <option value="<?php echo"$bank_name"; ?>"><?php echo"$bank_name"; ?></option>
							  
							     <option>Access Bank Plc</option>
								 <option>Access Diamond Plc</option>
								 <option>Fidelity Bank Plc</option>
								 <option>First City Monument Bank Limited</option>
								 <option>First Bank of Nigeria Limited</option>
								 <option>Guaranty Trust Bank Plc</option>
								 <option>Union Bank of Nigeria Plc</option>
								 <option>United Bank for Africa Plc</option>
								 <option>Zenith Bank Plc</option>
								 <option>Citibank Nigeria Limited</option>
								 <option>Ecobank Nigeria</option>
								 <option>Heritage Bank Plc</option>
								 <option>Keystone Bank Limited</option>
								 <option>Polaris Bank Limited</option>
								 <option>Stanbic IBTC Bank Plc</option>
								 <option>Standard Chartered</option>
								 <option>Sterling Bank Plc</option>
								 <option>Titan Trust Bank Limited</option>
								 <option>Unity Bank Plc</option>
								 <option>Wema Bank Plc</option>
						   </select>

						   
						   </div>


						   <div class="form-group col-md-8">
							   <label for="name">Account Name</label>
							   <input type="text" name="account_name" class="form-control" id="fname"  value="<?php echo"$account_name"; ?>" required>
						   </div>


						   <div class="form-group col-md-8">
							   <label for="name">Account Number</label>
							   <input type="number" name="account_number" class="form-control" id="fname"   value="<?php echo"$account_no"; ?>" required>
						   </div>
						   
							<div id="otpupdatebox" class="form-group col-md-8" >
							</div>	  
 
							<div class="form-group col-md-8"><br>
							<label>Receive OTP in your <?php echo$username; ?> by clicking 
							<span href="#" class=" text-danger" id="sendOtp" data-user="<?php echo"$username"; ?>" > Send OTP </span></label>
			  <input type="number" id="loadOTP"     name="loadOTP"    value=" " class="form-control col-md-5"  data-parsley-checkemail data-parsley-checkemail-message='<span style="color:red;">* Please insert correct OTP code</span>' required />

							</div> 
							
							
				   </div>
				   
							   <input type="hidden" name="page"  value="general_otp" hidden>
							   <input type="hidden" name="action"   value="account_update" hidden>

				 
				<input type="submit" name="submitform" id="submitform"  class="btn btn-danger"    value="Update Account" /><br><br><br>
			     

              </form>
	
	
	</div>
	</div>

	</div>
	</div>								 

	</div> 
                        
                        </div>
                     </div>
                  </div>
               </div>
          
             </div>
            <!-- 2-1 block end -->
   </div>
      
	 </div>
 
 </div>




<?php

include"bodyScript.php";
?>



<script>
var $window = $(window);
var nav = $('.fixed-button');
$window.scroll(function(){
    if ($window.scrollTop() >= 200) {
       nav.addClass('active');
    }
    else {
       nav.removeClass('active');
    }
});
</script>

</body>

</html>



<script>

$(document).ready(function(){




  
	 window.ParsleyValidator.addValidator('checkemail', {
    validateString: function(value){
      return $.ajax({
        url:"../pageajax.php",
        method:'post',
        data:{page:'general_otp', action:'confirm_otp', loadOTP:value},
        dataType:"json",
        async: false,
        success:function(data)
        {
           $('#otpupdatebox').append(data);
        }
      });
    }
  });
  

 
  
  
  
  
  ///////////////////////////////////////////////////////////////////////////////////////
  $('#account_update_form').parsley();

  $('#account_update_form').on('submit', function(event){
    event.preventDefault();
 
 

    $('#bank_name').attr('data-parsley-type', 'notblank');
	
    $('#account_name').attr('data-parsley-type', 'notblank');
	
    $('#account_no').attr('data-parsley-type', 'notblank'); 
	
    $('#cashout_amount').attr('data-parsley-type', 'notblank'); 

    if($('#account_update_form').parsley().validate())
    {
       $.ajax({
         url:"../pageajax.php",
        method:"POST",
        data:new FormData(this),
        dataType:"json",
        contentType:false,
        cache:false,
        processData:false,
        beforeSend:function()
        {
			$('#submitform').attr('disabled', true);
			$('#submitform').removeClass('btn-success');
			$('#submitform').addClass('btn-danger');
			$('#submitform').val('please wait...');
        },
        success:function(data)
        {
       
	   
	     if(data.feedback0 == 'success'){
			
			
			 $('#submitform').attr('disabled', true);
			 $('#submitform').removeClass('btn-danger');
			 $('#submitform').addClass('btn-success');
			 $('#submitform').val('UPDATE SUCCESS!!');
			 alert('ACCOUNT UPDATE SUCCESS!!');
			 window.location="account-update.php";
		  
        }else{
	     
			 alert('ACCOUNT UPDATE FAILED!!');
			 $('#submitform').attr('disabled', false);
			 $('#submitform').removeClass('btn-danger'); 
			 $('#submitform').text('UPDATE ACCOUNT');	

		}
		
		
		}
      })
    }

  });
  
  
   ////////////////////////////////////////////////////////////// 
 
 
  $('#account_update_form').on('click', '#sendOtp', function(){
	 
	//alert('okay');
	const sendOtp = document.querySelector('#sendOtp'); 

	const Cashcode  = sendOtp.dataset.user;    
	 
	// cashout = sendOtp.dataset.cashout;    
	
        $.ajax({
        url:"../pageajax.php",
        method:'POST',
		//dataType:'Json',
            data:{
			page:'general_otp',  action:'send_otp'   
			},
			beforeSend:function()
			{
			$('#submitform').attr('disabled', 'disabled');
			$('#submitform').val('Sending OTP...');
			},
			success:function(data)
			{
			 $('#otpupdatebox').append(data);
			 $('#submitform').attr('disabled', false);
			 $('#submitform').removeClass('btn-danger');
			 $('#submitform').addClass('btn-success');
			 $('#submitform').val('UPDATE ACCOUNT');
 			}
		
      });
 
  });
  

  
  
  
  

});


	  
	  
</script>



  