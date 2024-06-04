<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="RSB AJO ONLINE">
    <meta name="author" content="RSB AJO ONLINE">
    <meta name="keywords" content="RSB AJO ONLINE">

	<!-- Title Page-->
    <title>Nigeria N01 AJO ONLINE</title>
	<link rel="apple-touch-icon" href="../assets/images/logo.png">
	<link rel="shortcut icon"    href="../assets/images/logo.png"/>	
	<meta name="theme-color" content="red">

	<script src="../modal/jquery.min.js"></script> 
	<script src="../modal/bootstrap.min.js"></script> 
	
	<link href="../home_css/styles.css" rel="stylesheet" />
	<link href="../home_css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
	<script src="../home_c/all.min.js" crossorigin="anonymous"></script>
 
	<link rel="stylesheet" href="../css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="../css/buttons.dataTables.min.css">

	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" href="../css/ikenne_modal.css">
 </head>
<body class="sb-nav-fixed">
<?php
require"header_connect.php"; 

if(empty($_SESSION['username']))
{
header("location: logout.php");
}

//DISPLAY PHOTO TO PAGE CALL UP/////////////
	$query_photo ="SELECT * FROM `login-table` WHERE `login-table`.`username`='$username'";
	$query_photo_result=mysqli_query($homedb,$query_photo);
	while ($row = mysqli_fetch_array($query_photo_result)){
		$cornfirm=$row['photo']; 
	}

/////////////////////////////////VIEW PROFILE
//Here is otp verification
	$query_photo ="SELECT * FROM `otp_table` WHERE `otp_table`.`username`='$username'";
	$query_photo_result=mysqli_query($homedb,$query_photo);
	while ($row = mysqli_fetch_array($query_photo_result)){
		
		$server_otp_code  =$row['otp_code'];   
	}
	
	
	
$verify_code= time(); 	
$update_time = date('Y-m-d'); 		
$time = time();		
if(isset($_POST["submitform"]))
{ 




 
 			$otp_code       = htmlentities($_POST['otp_code']);
 			$fname          = htmlentities($_POST['fname']);
 			$mname          = htmlentities($_POST['mname']);
 			$sname          = htmlentities($_POST['sname']);
			$address        = htmlentities($_POST['h_address']);
			$gender         = htmlentities($_POST['gender']);  
			$byear          = htmlentities($_POST['byear']);
			$phone          = htmlentities($_POST['phone']); 
			$state          = htmlentities($_POST['state']); 
			$nationality    = htmlentities($_POST['nationality']);
			$bank_name      = htmlentities($_POST['bank_name']); 
			$account_name   = htmlentities($_POST['account_name']); 
			$account_number = htmlentities($_POST['account_number']); 
			
if($server_otp_code === $otp_code)
{ 

 	
			$queryupdate=("UPDATE `login-table` SET
			`f_name` = '".mysqli_real_escape_string($homedb, $fname)."', 
			`m_name` = '".mysqli_real_escape_string($homedb, $mname)."', 
			`s_name` = '".mysqli_real_escape_string($homedb, $sname)."',
			`address` = '".mysqli_real_escape_string($homedb, $address)."', 
			`gender` = '".mysqli_real_escape_string($homedb, $gender)."', 
			`date_birth`= '".mysqli_real_escape_string($homedb, $byear)."', 
			`phone_no`= '".mysqli_real_escape_string($homedb, $phone)."',
			`state`= '".mysqli_real_escape_string($homedb, $state)."',
			`country`= '".mysqli_real_escape_string($homedb, $nationality)."',    
			`bank_name`= '".mysqli_real_escape_string($homedb, $bank_name)."',
			`account_name`= '".mysqli_real_escape_string($homedb, $account_name)."',
			`account_no`= '".mysqli_real_escape_string($homedb, $account_number)."'
			WHERE `login-table`.`username` ='$username'");
			if(mysqli_query($homedb, $queryupdate))
			{
				
				
			//REST OTP TO NULL 
			$queryupdate=("UPDATE `otp_table` SET
			`otp_code`  = '".mysqli_real_escape_string($homedb, $verify_code)."'										 		
			WHERE `otp_table`.`username`='$username'");
			mysqli_query($homedb, $queryupdate);

				$msg_success='
				     <center>
					  <img src="../img/ok.png" height="50" /i><br>	
					Account Update  successful<br><br>
					
					
					 	<a href="index.php" style="text-decoration:underline;"> Continue to Dashboard</a>
					 </center>
				    
					 ';
               

			}
}
else
{
 
				$msg_success='
				     <center>
					  <img src="../img/notok.png" height="50" /i><br>	
					Sorry you have entered a wrong OTP code sent to your email. Please resend otp and try again <br><br>
					
					
					 
					 </center>
				    
					 ';
 
	
}
}

?>
 



  

       <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php"><img src='../assets/images/logo.png' style='height:50px;' /></a>
           <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fa fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <!-- Navbar Search
					<input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
					 Navbar Search-->
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<!--<i class="fas fa-user fa-fw"></i>-->					
					 <?php

					if($password == 'google_password')
					{
					echo'<img class="rounded" src="'.$_SESSION['user_picture_name'].'"   width="50px"  />';															
					}
					else if(empty($photo))
					{
					echo"<a href='user-login.php?photo'><img class='rounded' src='imagefolder/placeholder.png'  width='50px'></a>";	
					}
					else if(!empty($photo))
					{
					echo"<img class='rounded' src='imagefolder/$cornfirm'   width='50px'>";	
					}
					?>
					
					</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="user-login.php?update-profile">Settings</a>
                        <a class="dropdown-item" href="user-login.php?photo">Update Photo</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
		
		
		
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
						<a href="index.php"><i class="fa fa-refresh" id="refresh"></i></a>
						<i class="fa fa-home"></i>
						<div style='font-size:15px;'>
						
						</div>
						</h2>
					   <div class="row">
						
                            <div class=" col-md-12">
                                <div class="card bg-light text-dark mb-4">
                                    <div class="card-body" style=" "> <i class="fa fa-user"style="color:red;font-size:30px;float:right;"></i><br><h3> ACCOUNT EDIT/UPDATE</h3></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between ">
										<ol class="breadcrumb mb-4">
										<li class="breadcrumb-item active" style="text-decoration:underline;"><i> <a href="index.php">Home</a>&nbsp; / &nbsp; Account Update</i></li>
										</ol>
                                        <div class="small text-white"><b>   </b></div>
                                    </div>
                                </div>
                            </div>
                        

					   </div>
						 </center>
 

 
 

	<div class="container">

	<div class="row">                          
	<div class="card ">
 

	<div class="card-body">
	<div class=" col-md-12 ">	 
               <form method="POST" >
			   
		  <div class="form-row">
					 
 

									 <div class="form-group col-md-6">
									  <label>Membership Code</label>
									  
                                   <input type="text" name="fname" class="form-control" value="<?php echo"$mem_code"; ?>" required readonly>

									   
									 </div>
									 

									 <div class="form-group col-md-6">
									  <label>Username / Email </label>
									  
                                   <input type="text" name="fname" class="form-control" value="<?php echo"$username"; ?>" required readonly>

									   
									 </div>
									 
			 								 



						 </div>

 <div class="row">
			  
 			 

 				   <div class="form-group col-md-6">
					   <label for="name">Firstname</label>
					   <input type="text" name="fname" class="form-control" value="<?php echo"$firstname"; ?>" required>
				   </div>
				   
 				   <div class="form-group col-md-6">
					   <label for="name">middlename</label>
					   <input type="text" name="mname" class="form-control"  value="<?php echo"$middlename"; ?>"  required>
				   </div>	

 				   <div class="form-group col-md-12
				   ">
					   <label for="name">Surname</label>
					   <input type="text" name="sname" class="form-control"  value="<?php echo"$surname"; ?>"  required>
				   </div>	


				   
 				   <div class="form-group col-md-6">
					   <label for="name">Home Address</label>
					   <input type="text" name="h_address" class="form-control" value="<?php echo"$home_address"; ?>" required>
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


              
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date Of Birth</label>
                            <input class="form-control" placeholder="yyyy" maxlength="4" type="date" value="<?php echo"$date_of_birth"; ?>" data-val="true"  id="DobYear" name="byear"   />
                            
                        </div>
                    </div>

   				   
				   
				   
				   <div class="form-group col-md-6">
					   <label for="name">Phone</label>
					   <input type="number" name="phone" class="form-control" value="<?php echo"$phone_no"; ?>"  required>
				   </div>


				   <div class="form-group col-md-6">
					   <label for="name">State</label>
					   <input type="text" name="state" class="form-control" value="<?php echo"$state"; ?>"  required>
				   </div>


 				   <div class="form-group col-md-6">
					   <label for="name">Nationality</label>
					   <input type="text" name="nationality" class="form-control"  value="<?php echo"$nationality"; ?>"  required>
				   </div>

 			 
				   </div>
				   
									   
                                    <div style="color:red;"> Bank Account Details Update</div><br>
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
						   
							<div id="otpupdatebox" >
							</div>	  

							<div class="form-group col-md-8"><br>
							<label>Enter OTP sent to your email or click here to 
							<a href="#" class="OTPRESEND text-danger" id="sendOtp" data-user="<?php echo"$username"; ?>"   data-otp="<?php echo$mem_code; ?>"> Send OTP </a></label>
							<input type="text"  id="m_em_code"   class="form-control" name="otp_code"  placeholder="Enter code"  >
							</div> 
				   </div>
				   
				   
				 
				<input type="submit" name="submitform"  style="background-color:red;font-size:17px;color:white;padding:10px;border-radius:5px;"  value="Update Account" />
			     

              </form>
	</div>
	</div>

	</div>
	</div>								 

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

 
      

 
   <script src="../home_js/scripts.js"></script>
 
    </body>
</html>

 


 
<script type="text/javascript" src="../js_form/main.07a59de7b920cd76b874.js"></script>

<script>
$(document).ready(function(){
	

	
	
	var homeUser   ='<?php echo$username; ?>';	 
	var ecode   ='';	 
	var mem_code='';  
	var confirmC    = document.getElementById('confirmC'); 
	
	

	
	
 

$(document).on('click', '#confirmC', function(){
	
		m_em_code=$('#m_em_code').val();
		 
  
	//alert(mem_code);
 
		$.ajax({
			url:"ajax_search.php",
			method:"POST",
			data:{m_em_code:m_em_code, homeUser:homeUser, check:'sendmoney'},
			//dataType:"json",
			success:function(data)
			{
			 
				$('#coinbankOwner').append(data);
				//$('#confirmC').attr('disabled', false);
			   // $('#confirmC').text('Reset Button');
				
				$(document).on('click', '#confirmC', function(){	

				 
				});
		 
			}
		})
	
 
 confirmC.style.display    = "none"; 
});




$(document).on('click', '#sendOtp', function(){
	//alert('clicked');
const sendOtp = document.querySelector('#sendOtp');

 getOtp = sendOtp.dataset.otp;  
 user = sendOtp.dataset.user;  
	//console.log(getOtp);
	
	
		$.ajax({
			url:"ajax_search.php",
			method:"POST",
			data:{getOtp:getOtp, user:user, check:'sendotp'},
		
			success:function(data)
			{
			 $('#otpupdatebox').append(data);
 			}
		})	
	
	
});



})



</script> 
