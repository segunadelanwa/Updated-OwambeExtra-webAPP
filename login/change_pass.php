 <!DOCTYPE html>
<html lang="en">

<head>
   <title>Owambe Extra Dashboard</title>
   <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
     <![endif]-->
<?php

include"index_header.php";
include"head_loader.php";
$loader = new Loader;
?>


</head>

<body class="sidebar-mini fixed">


   <div lass="loader-bg">
      <div lass="loader-bar">
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
                  <h4> ACCOUNT PASSWORD UPDATE</h4>
                
				<div> 
                   <em>
				 
				 <a href="index.php" style="color:#777777 !important;"> Home </a> / <a href="#">Password  Update</a>
				  
				 </em>
               </div>

               </div>



            </div>
            <!-- 4-blocks row start -->
     

    
	<div class="container">                          
	<div class="card ">
	
		<div class="card-header">
		<div align="center" style="font-size:20px;"> ACCOUNT PASSWORD UPDATE <br><br></div>
		Note: One Time Password (OTP CODE) is required to update your account password
		</div>
		
		

	</div>
	</div>								 

 
            <div class="row">

               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-block">
                        <div class="table-responsive">
 <div  lass="container">
		<div lass="col-md-12 m-l">

 
	

<!--if($Loader->CheckCode($_GET['code'], $username) == 1)
 -->
		  <form  method="POST" id="password_form">
		  
		  	<div id="eventIdDetails">
			  
			 
			</div>
			  
		     <div class="form-group col-md-6"><br>
		   
			   <label for="mname">
			   Please provide the OTP sent to your registered email address</label>
			

 

		<div class="form-group"><!-- form-group Starts -->

		<label> Customer Password </label>

				<div class="input-group "><!-- input-group Starts -->

				<div class="input-group-addon ">
				<!-- input-group-addon Starts -->
				<i class="fa fa-check tick1"> </i>  <i class="fa fa-times cross1"> </i>
				</div>
				<!-- input-group-addon Ends -->
				
				<input type="password" class="form-control" id="user_password" name="user_password"  required>


				</div>
				<!-- input-group Ends -->

		</div><!-- form-group Ends -->


		<div class="form-group">
		
		
				<div class="input-group-addon"><!-- input-group-addon Starts -->

					<div style="width:100%;"><!-- meter_wrapper Starts -->

					

					<div id="meter"> 
					<center style="padding:10px, 0, 5px, 0;"><b  id="passType"> </b></center>
					</div>	 

					
				</div><!-- input-group-addon Ends -->

		</div>
		</div>
		<!-- form-group Starts --> 
       <div class="form-group">
		<label> Confirm Password </label>

		<div class="input-group"><!-- input-group Starts -->

		<span class="input-group-addon" id="btn"><!-- input-group-addon Starts -->

		<i class="fa fa-eye-slash" style='font-size:15px;'> </i> 

		</span><!-- input-group-addon Ends -->

		<input type="password" class="form-control confirm" name="confirm_user_password"  id="confirm_user_password" required>

		</div><!-- input-group Ends -->

		</div><!-- form-group Ends -->


		
		
<div class="form-group"><!-- form-group Starts -->

<label>Insert OTP Code send to <b style="color:blue;"><?php echo$username; ?></b> </label>

	<div class="input-group "><!-- input-group Starts -->

	<div class="input-group-addon ">
	<!-- input-group-addon Starts -->
	<i class="fa fa-envelope"> </i>  
	</div>
	<!-- input-group-addon Ends -->
     <input type="number" name="user_email_address" id="user_email_address" class="form-control" data-parsley-checkotp data-parsley-checkotp-message='<span style="color:red;">Incorrect OTP or expired OTP code inserted</span>' />
       
	</div>
<!-- input-group Ends -->

</div><!-- form-group Ends -->	  
			 
					<input type="hidden" name="page"  id="page" value="general_otp" />
					<input type="hidden" name="action"  id="action" value="password_update" />
					              
								  
								  
	 
					
					
				</div>	
				
				<div class="col-md-12">
				<div id="feedback">
				</div>
					<input type="submit" name="savings_cashout" id="savings_cashout"   value="Submit OTP"   class="btn btn-success"/>

					<input type="button" id="sendOtp"     value="Resend OTP"   class="btn btn-primary"/>
				<div>		 

			

				
	        

		   </form>
 
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


 

</body>

</html>



 
<script>

$(document).ready(function(){

$("#user_password").keyup(function(){

check_pass();

});

});

function check_pass() {
 var val   = document.getElementById("user_password").value;
 var meter = document.getElementById("meter");
 var passtype = document.getElementById("passType");
 var no    = 0;
 if(val!="")
 {
	 
   // If the password length is less than or equal to 6
   if(val.length<=6)no=1;
	

 // If the password length is greater than 6 and contain any lowercase alphabet or any number or any special character
  if(val.length>6 && (val.match(/[a-z]/) || val.match(/\d+/) || val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))no=2;

  // If the password length is greater than 6 and contain alphabet,number,special character respectively
  if(val.length>6 && ((val.match(/[a-z]/) && val.match(/\d+/)) || (val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) || (val.match(/[a-z]/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))))no=3;

  // If the password length is greater than 6 and must contain alphabets,numbers and special characters
  if(val.length>6 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))no=4;

  if(no==1)
  {
   $("#meter").animate({width:'15%'},300);
   meter.style.backgroundColor="red";
   passtype.innerHTML="10% Very Weak";
   //$('#passtype').val('Very Weak');
  }

  if(no==2)
  {
   $("#meter").animate({width:'40%'},300);
   meter.style.backgroundColor="#F5BCA9";
   passtype.innerHTML="40% Weak";
   
  }

  if(no==3)
  {
   $("#meter").animate({width:'60%'},300);
   meter.style.backgroundColor="#FF8000";
   passtype.innerHTML="60% Strong"; 
  }

  if(no==4)
  {
   $("#meter").animate({width:'100%'},300);
   meter.style.backgroundColor="#00FF40";
   passtype.innerHTML="100% Strong";
   
  }
 }

 else
 {
  meter.style.backgroundColor="";
  document.getElementById("pass_type").innerHTML="";
 }
}

</script>

<script>

$(document).ready(function(){

$('.tick1').hide();
$('.cross1').hide();

$('.tick2').hide();
$('.cross2').hide();


	$('.confirm').focusout(function(){

	var password = $('#user_password').val();

	var confirmPassword = $('#confirm_user_password').val();

		if(password == confirmPassword)
		{

			$('.tick1').show();
			$('.cross1').hide();

			$('.tick2').show();
			$('.cross2').hide();



		}
		else
		{

			$('.tick1').hide();
			$('.cross1').show();

			$('.tick2').hide();
			$('.cross2').show();


		}


	});


});

</script>


<script>

$(document).ready(function(){

  window.ParsleyValidator.addValidator('checkotp', {
    validateString: function(value){
      return $.ajax({
        url:"../pageajax.php",
        method:'post',
        data:{page:'general_otp', action:'confirm_otp', loadOTP:value},
        dataType:"json",
        async: false,
        success:function(data)
        {
          return true;
        }
      });
    }
  });

  $('#password_form').parsley();

  $('#password_form').on('submit', function(event){
    event.preventDefault();

    $('#user_email_address').attr('required', 'required');

    $('#user_email_address').attr('data-parsley-type', 'email');

    $('#user_password').attr('required', 'required');

    $('#confirm_user_password').attr('required', 'required');

    $('#confirm_user_password').attr('data-parsley-equalto', '#user_password');

    $('#user_name').attr('required', 'required');

    $('#user_name').attr('data-parsley-pattern', '^[a-zA-Z ]+$');

    $('#user_surname').attr('required', 'required');

    $('#user_surname').attr('data-parsley-pattern', '^[a-zA-Z ]+$'); 

 

		if($('#password_form').parsley().validate())
		{
				  $.ajax({
					url:'../pageajax.php',
					method:"POST",
					data:new FormData(this),
					dataType:"json",
					contentType:false,
					cache:false,
					processData:false,
					beforeSend:function()
					{
					  $('#user_register').attr('disabled', 'disabled');
					  $('#user_register').val('please wait...');
					},
					success:function(data)
					{
					  if(data.feedback0 == 'success')
					  {
						 alert("Account passwaord updated successfully!!. You'll will need to logout to continue with the new updated password");
						  window.location=data.feedback1;
						
				 
					  }else{
						  
						 alert("Account passwaord updated Failed!. Please try again");
						  

					   
					  }


					}
					
					
				  });
		}

  });
	
});

</script>

 
<script>
 
const feedBack = document.querySelector('#feedback');
const sendOtp = document.querySelector('#sendOtp');
const btn = document.querySelector('#btn');
const pass2 = document.querySelector('#confirm_user_password');
const pass = document.querySelector('#user_password');

btn.addEventListener('click', function(){
	if(pass.type == 'text')
	{
	pass.type = 'password';
	btn.innerHTML = "<b ><i class='fa fa-eye-slash'style='color:#fff;font-size:15px;'></i></b>";//
	 
	}
	else
	{
		pass.type = 'text';
		btn.innerHTML = "<b ><i class='fa fa-eye'style='color:fff;font-size:15px;' ></i></b>";//hide
	 
	}
	
});


btn.addEventListener('click', function(){
	if(pass2.type == 'text')
	{
	pass2.type = 'password';
	btn.innerHTML = "<b ><i class='fa fa-eye-slash'style='color:red;font-size:15px;' ></i></b>";//
	 
	}
	else
	{
		pass2.type = 'text';
		btn.innerHTML = "<b ><i class='fa fa-eye'style='color:fff;font-size:15px;' ></i></b>";//hide
		 
	}
	
});

sendOtp.addEventListener('click', function(){
	//alert("okay");
	
       $.ajax({
        url:"../pageajax.php",
        method:'post',
        data:{page:'general_otp', action:'send_otp'},
        //dataType:"json",
        beforeSend:function()
        {
          $('#sendOtp').attr('disabled', 'disabled');
          $('#sendOtp').val('Sending OTP wait...');
        },
        success:function(data)
        {
			
         feedBack.innerHTML = data;
          $('#sendOtp').val('OTP Sent!');
           
		  }

 	
		
      });
         
});
</script>

