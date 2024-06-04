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
$invitee = new Refer;
if(empty($_SESSION['username']))
{
header("location: logout.php");
}

 


	
	$query_photo ="SELECT * FROM `wallet` WHERE `wallet`.`username`='$username'";
	$query_photo_result=mysqli_query($homedb,$query_photo);
	while ($row = mysqli_fetch_array($query_photo_result)){
		
		$owner_current_balance  =$row['current_balance'];  
		$owner_previous_balance =$row['previous_balance'];  
	}
 // $cur_bal_placeholder         = $savings_available_bal;
  //$sav_avai         =  number_format($savings_available_bal,2);
/////////////////////////////////VIEW PROFILE

$verify_code= MD5(rand(00001, time())); 
$auth_code=rand(10000, time());
$sav_code="transfer-$auth_code";
$msg="Coinbank Transfer mang fee";
//////////////////////////////
$reg_start=date('Y-m-d');
$curr_time=date("H:i:s a");

if(isset($_POST["submittransfer"]))
{ 



         
 	$Sender_code      = trim(htmlentities($_POST['Sender_code'])); 
 	$Reciever_code    = trim(htmlentities($_POST['Reciever_code']));   
 	$input_otp_code   = trim(htmlentities($_POST['otp_code']));   
 	$input_card_code  = trim(htmlentities($_POST['ecard_code']));   
 	$manag_fee        = trim(htmlentities($_POST['manag_fee']));   
	
	 
	
	
	
	$query_photo ="SELECT * FROM `login-table` WHERE `login-table`.`refer_code``='$mem_code'";
	$query_photo_result=mysqli_query($homedb,$query_photo);
	$Sender_coinbank_row = mysqli_num_rows($query_photo_result);


	$query_photo ="SELECT * FROM `login-table` WHERE `login-table`.`mem_code`='$Sender_code'";
	$query_photo_result=mysqli_query($homedb,$query_photo);
	$Sender_code_num_row = mysqli_num_rows($query_photo_result);


	
	$query_photo ="SELECT * FROM `login-table` WHERE `login-table`.`mem_code`='$Reciever_code'";
	$query_photo_result=mysqli_query($homedb,$query_photo);
	$Reciever_code_code_num_row = mysqli_num_rows($query_photo_result);
	while ($row = mysqli_fetch_array($query_photo_result)){
	
	$f_name  =$row['f_name'];   
	$s_name  =$row['s_name'];   
}
	
 
	


//Here is otp verification
	$query_photo ="SELECT * FROM `otp_table` WHERE `otp_table`.`username`='$username'";
	$query_photo_result=mysqli_query($homedb,$query_photo);
	while ($row = mysqli_fetch_array($query_photo_result)){
		
		$otp_code  =$row['otp_code'];   
	}
	

	
 
//..........................................................
if($Sender_coinbank_row >= 5)
{//..........................................................
if($owner_current_balance >= 2000)
{
	$new_cur_bal = $owner_current_balance-2000;
	
	
	if($e_card_code == $input_card_code)
	{	
			if($input_otp_code == $otp_code)
			{


				if($Sender_code_num_row == 1)
				{
						
						if($Reciever_code_code_num_row == 1)
						{
	 
	 
											//SENDER WALLET 
											$queryupdate=("UPDATE `login-table` SET
											`refer_code`  = '".mysqli_real_escape_string($homedb, $Reciever_code)."'										 		
											WHERE `login-table`.`refer_code`='$Sender_code'");
											mysqli_query($homedb, $queryupdate);
											 
											//REST OTP TO NULL 
											$queryupdate=("UPDATE `otp_table` SET
											`otp_code`  = '".mysqli_real_escape_string($homedb, $verify_code)."'										 		
											WHERE `otp_table`.`username`='$username'");
											mysqli_query($homedb, $queryupdate);


											//UPDATING WALLET
											$queryupdate=("UPDATE `wallet` SET
											`current_balance`  = '".mysqli_real_escape_string($homedb,  $new_cur_bal)."',										 		
											`previous_balance`  = '".mysqli_real_escape_string($homedb, $owner_current_balance)."'										 		
											WHERE `wallet`.`username`='$username'");
											mysqli_query($homedb, $queryupdate);
											
											

											
											

											$query_wallet_ref =("INSERT INTO `wallet_history` VALUE (
											'',
											'".mysqli_real_escape_string($homedb, $mem_code)."',									 
											'".mysqli_real_escape_string($homedb, $username)."',									 
											'".mysqli_real_escape_string($homedb, $new_cur_bal)."',									 
											'".mysqli_real_escape_string($homedb, $new_cur_bal)."',									 
											'".mysqli_real_escape_string($homedb, $owner_current_balance)."',
											'".mysqli_real_escape_string($homedb, '2000')."',
											'".mysqli_real_escape_string($homedb, $reg_start)."', 
											'".mysqli_real_escape_string($homedb, $curr_time)."',
											'".mysqli_real_escape_string($homedb, $sav_code)."',
											'".mysqli_real_escape_string($homedb, $msg)."'
											)");

											mysqli_query($homedb,$query_wallet_ref);
												
											
											$msg_success='
												 <center>
												  <img src="../img/ok.png" height="50" /><br>	
												You have successfully transfer all your group member to '.$f_name.' '.$s_name.' group <br><br>
												
											 
													 
												 </center>
												
												 ';
										   

						}		
						else
						{

							$msg_success='
							 <center>
							  <img src="../img/ok.png" height="50" /><br>	
							Invalid sender Membership code inserted<br><br>										 
								 
							 </center>
							
							 ';


						}

					 

				}
				else
				{

					$msg_success='
					 <center>
					  <img src="../img/ok.png" height="50" /><br>	
					Invalid sender Membership code inserted<br><br>										 
						 
					 </center>
					
					 ';
					
					
				}


			}
			else
			{

			$msg_success='
			<center>
			<img src="../img/notok.png" height="50" /><br>	
			wrong OTP code inserted please try again<br><br>


			<a href="index.php" style="text-decoration:underline;"> Continue to Dashboard</a>
			</center>

			';


			}

	}
	else
	{
			$msg_success='
			<center>
			<img src="../img/notok.png" height="50" /><br>	
			
			Wrong eCard code inserted please try again<br><br>

			</center>

			';
		
	}

}
else
{
		$msg_success='
		<center>
		<img src="../img/notok.png" height="50" /><br>	
		
		Sorry you need to have minimum balance of NGN2,000.00 in your wallet <br><br>

 	    </center>

		';
	
}

}
else
	{
			$msg_success='
			<center>
			<img src="../img/notok.png" height="50" /><br>	
			
			You must have minimum 5 member before you can sell your coin bank <br><br>

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
 
						</h2>
					   <div class="row">
						
                            <div class=" col-md-12">
                                <div class="card bg-light text-dark mb-4">
								
                                    <div class="card-body"> 
									<i class="fa fa-money"style="color:red;font-size:30px;float:right;"></i><br>
									<h3>COIN BANK TRANSFER </h3>
									</div>
									
                                    <div class="card-footer d-flex align-items-center justify-content-between ">
										<ol class="breadcrumb mb-4">
										<li class="breadcrumb-item active" style="text-decoration:underline;"><i> <a href="index.php">Home</a>&nbsp; / &nbsp; Send Money</i></li>
										</ol>
                                        <div class="small text-white"><b>   </b></div>
                                    </div>
									
                                </div>
                            </div>
                        

					   </div>
						 </center>
 

 
 

                          
	<div class="card ">
	
		<div class="card-header">
		<div align="center" style="font-size:30px;">RCB<?php echo"".$invitee->Mortgage($mem_code);   ?></div>
		</div>

	<div class="card-body"> 	
	
 <form  method="POST" Action="" class=" col-md-12">
 	<span style="color:red;text-decoration:underline;"><i class="fa fa-flag-checkered"></i> 
	PLEASE READ BEFORE SELLING YOUR COINBANK:</span><br>
	Please do note that selling your coinbank means you are loosing your group member to your propect buyer.<br>
   This transaction attract NGN2,000.00 Management Fees	<br><br> <br><br>
 
		<div id="otpupdatebox" >

		 
 
		
		</div>
 
 

		   <div class="form-group col-md-6"><br>
			   <label for="mname">Sender Membership Code</label>
			   <input type="text"  id="m_em_code"   class="form-control" name="Sender_code" value="<?php echo$mem_code; ?>" readonly>
		   </div> 


		   <div class="form-group col-md-6"><br>
			   <label for="mname">Reciever Membership Code</label>
			   <input type="text"  id="m_em_code"   class="form-control" name="Reciever_code"  placeholder="Enter code"  >
		   </div> 



		   <div class="form-group col-md-6"><br>
		 <label>Enter OTP sent to your email or click here to 
		 <a href="#" class="OTPRESEND text-danger" id="sendOtp" data-user="<?php echo"$username"; ?>"   data-otp="<?php echo$mem_code; ?>"> Send OTP </a></label>
			   <input type="text"  id="m_em_code"   class="form-control" name="otp_code"  placeholder="Enter code"  >
		   </div> 


		   <div class="form-group col-md-6"><br>
			   <label for="mname">Enter eCard Code</label>
			   <input type="text"  id="m_em_code"   class="form-control" name="ecard_code"  placeholder="Enter code"  >
		   </div> 


 		  <label class="form-group col-md-8"> Management Fee  </label>
		  
			<div class="input-group col-md-8"> 
			
			
			  <span class="input-group-text">₦</span>
			  <input type="integer" id="cashout_amount"    value="2000"  name="manag_fee"  class="form-control col-md-5" required  readonly>
			  <span class="input-group-text">.00</span>
			  
			</div><br><br>



 
 
 


  <div class="form-submit">
 
	<input type="submit" name="submittransfer"  id="confirmC"   value="Transfer CoinBank" style="padding:10px;border-radius:5px;" class="btn btn-info"/>
 
 </div>





</form><br><br>
	 
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

 


<script type="text/javascript" src="../css/jquery.dataTables.min.js"></script>

 
 
<script src="../css/canvasjs.min.js"></script>
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