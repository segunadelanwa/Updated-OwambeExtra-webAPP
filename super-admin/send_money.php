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

//////////////////////////////
$reg_start=date('Y-m-d');
$curr_time=date("H:i:s a");

if(isset($_POST["sendM"]))
{ 



     
 	$amount          = trim(htmlentities($_POST['amount'])); 
 	$receivercode    = trim(htmlentities($_POST['m_em_code']));  
 	@$name_receiver  = htmlentities($_POST['name_receiver']);  
 	$otp_check       = htmlentities($_POST['otp_check']);  
 	$ecard_ckeck     = htmlentities($_POST['ecard_ckeck']);  
	
		$receiver_code=strtoupper($receivercode);
	
	
	
	$query_photo ="SELECT * FROM `login-table` WHERE `login-table`.`mem_code`='$receivercode'";
	$query_photo_result=mysqli_query($homedb,$query_photo);
	$query_num_row = mysqli_num_rows($query_photo_result);
 
	
$msg="Money transfer $mem_code to $receivercode";

	$query_photo ="SELECT * FROM `wallet` WHERE `wallet`.`mem_code`='$receiver_code'";
	$query_photo_result=mysqli_query($homedb,$query_photo);
	while ($row = mysqli_fetch_array($query_photo_result)){
		
		$receiver_current_balance  =$row['current_balance']; 
		$receiver_previous_balance =$row['previous_balance']; 
		$receiver_username         =$row['username']; 
	}



	$query_photo ="SELECT * FROM `otp_table` WHERE `otp_table`.`username`='$username'";
	$query_photo_result=mysqli_query($homedb,$query_photo);
	while ($row = mysqli_fetch_array($query_photo_result)){
		
		$otp_code  =$row['otp_code'];   
	}
	

	
	@$money_transfer_sender = $owner_current_balance - $amount; 
//..........................................................
    @$money_transfer_reciver =  $receiver_current_balance + $amount;
 
//..........................................................
if($e_card_code == $ecard_ckeck){	
		if($otp_check == $otp_code){


			if($query_num_row == 1){
					
					if($mem_code === $receiver_code)
						{

								$msg_success='
									 <center>
									  <img src="../img/notok.png" height="50" /><br>	
									Sorry you can not send money to your personal wallet <br><br>
									
								 
										<a href="index.php" style="text-decoration:underline;"> Continue to Dashboard</a>
									 </center>
									
									 ';

						}
						else
						{
								if($amount > $owner_current_balance)
								{
									
										$msg_success='
											 <center>
											  <img src="../img/notok.png" height="50" /><br>
														  
											You do not have '.$amount.' on your wallet <br><br>
											 </center>
											
											 ';
								}
								else
								{

										//SENDER WALLET 
										$queryupdate=("UPDATE `wallet` SET
										`current_balance`  = '".mysqli_real_escape_string($homedb, $money_transfer_sender)."',
										`previous_balance`  = '".mysqli_real_escape_string($homedb, $owner_current_balance)."',
										`date`             = '".mysqli_real_escape_string($homedb, $reg_start)."', 
										`time`             = '".mysqli_real_escape_string($homedb, $curr_time)."',
										`last_payment_otp` = '".mysqli_real_escape_string($homedb, $sav_code)."',
										`last_pay_status`  = '".mysqli_real_escape_string($homedb, $msg)."'  		
										WHERE `wallet`.`mem_code`='$mem_code'");
										mysqli_query($homedb, $queryupdate);
										
										
										
										// RECIVER WALLET
										
										$queryupdate=("UPDATE `wallet` SET
										`current_balance`  = '".mysqli_real_escape_string($homedb, $money_transfer_reciver)."',
										`previous_balance`  = '".mysqli_real_escape_string($homedb, $receiver_current_balance)."',
										`date`             = '".mysqli_real_escape_string($homedb, $reg_start)."', 
										`time`             = '".mysqli_real_escape_string($homedb, $curr_time)."',
										`last_payment_otp` = '".mysqli_real_escape_string($homedb, $sav_code)."',
										`last_pay_status`  = '".mysqli_real_escape_string($homedb, $msg)."'  		
										WHERE `wallet`.`mem_code`='$receiver_code'");
										if(mysqli_query($homedb, $queryupdate)){

								 
										$query_wallet_ref =("INSERT INTO `wallet_history` VALUE (
										'',
										'".mysqli_real_escape_string($homedb, $mem_code)."',									 
										'".mysqli_real_escape_string($homedb, $username)."',									 
										'".mysqli_real_escape_string($homedb, $money_transfer_reciver)."',									 
										'".mysqli_real_escape_string($homedb, $receiver_current_balance)."',									 
										'".mysqli_real_escape_string($homedb, '')."',
										'".mysqli_real_escape_string($homedb, $amount)."',
										'".mysqli_real_escape_string($homedb, $reg_start)."', 
										'".mysqli_real_escape_string($homedb, $curr_time)."',
										'".mysqli_real_escape_string($homedb, $sav_code)."',
										'".mysqli_real_escape_string($homedb, $msg)."'
										)");

										mysqli_query($homedb,$query_wallet_ref);
									   


										$query_wallet_ref =("INSERT INTO `wallet_history` VALUE (
										'',
										'".mysqli_real_escape_string($homedb, $receiver_code)."',									 
										'".mysqli_real_escape_string($homedb, $receiver_username)."',									 
										'".mysqli_real_escape_string($homedb, $money_transfer_reciver)."',									 
										'".mysqli_real_escape_string($homedb, $receiver_current_balance)."',									 
										'".mysqli_real_escape_string($homedb, '')."',
										'".mysqli_real_escape_string($homedb, $amount)."',
										'".mysqli_real_escape_string($homedb, $reg_start)."', 
										'".mysqli_real_escape_string($homedb, $curr_time)."',
										'".mysqli_real_escape_string($homedb, $sav_code)."',
										'".mysqli_real_escape_string($homedb, $msg)."'
										)");

										mysqli_query($homedb,$query_wallet_ref);
											
										//REST OTP TO NULL 
										$queryupdate=("UPDATE `otp_table` SET
										`otp_code`  = '".mysqli_real_escape_string($homedb, '')."'										 		
										WHERE `otp_table`.`username`='$username'");
										mysqli_query($homedb, $queryupdate);
										
										
										
										$msg_success='
											 <center>
											  <img src="../img/ok.png" height="50" /><br>	
											You have successfully send '.$amount.' to '.$name_receiver.' wallet<br><br>
											
										 
												<a href="index.php" style="text-decoration:underline;"> Continue to Dashboard</a>
											 </center>
											
											 ';
									   

									   }
								}
							   
						}

				}
				else
				{
					
											$msg_success='
											 <center>
											  <img src="../img/ok.png" height="50" /><br>	
											You have inserted wrong Membership code <br><br>
											
										 
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
		
		wrong eCard code inserted please try again<br><br>


		<a href="index.php" style="text-decoration:underline;"> Continue to Dashboard</a>
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
									<h3>SEND MOMEY TO OTHER WALLET  </h3>
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
 

 
 

	<div class="container">

	<div class="row">                          
	<div class="card ">
 <div class="card-header">
	<div align="center" style="font-size:20px;"><a href="send_money.php"><i class="fa fa-refresh"></i> </a><?php echo"Wallet Bal: ₦".$Loader-> wallet($username);  ?></div>
 </div>

	<div class="card-body">
	<div class=" col-md-12 ">	
	
 <form  method="POST" Action="">
 	<span style="color:red;text-decoration:underline;"><i class="fa fa-flag-checkered"></i> 
	PLEASE READ BEFORE SENDING MONEY FROM YOUR WALLET TO WALLET:</span><br>
	Please do note that on clicking Send Money you are sending money from your  wallet  
	to Reciever Membership Code   wallet <br><br> <br><br>
 
		<div id="otpupdatebox" >

		 
 
		
		</div>
 
 

		   <div class="form-group col-md-6"><br>
			   <label for="mname">Reciever Membership Code</label>
			   <input type="text"  id="m_em_code"   class="form-control" name="m_em_code"  placeholder="Enter code"  >
		   </div> 


 
		<div id="coinbankOwner" >

		 
 
		
		</div>
 


  <div class="form-submit">
 
	<input type="button" name="confirmC"  id="confirmC"   value="Confirm Code" style="padding:10px;border-radius:5px;" class="btn btn-info"/>
	<button type="submit" name="sendM"  id="sendM"   value="" style="padding:10px;border-radius:5px;" class="btn btn-success">Send Money <i class="fa fa-long-arrow-right"></i></button>
 
 </div>





</form><br><br>
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

 


<script type="text/javascript" src="../css/jquery.dataTables.min.js"></script>

 
 
<script src="../css/canvasjs.min.js"></script>
<script type="text/javascript" src="../js_form/main.07a59de7b920cd76b874.js"></script> 

<script>
$(document).ready(function(){
	

	
	
	var homeUser   ='<?php echo$username; ?>';	 
	var ecode   ='';	 
	var mem_code='';  
	var confirmC    = document.getElementById('confirmC');
	var sendM    = document.getElementById('sendM');
	
	

	
	
sendM.style.display    = "none"; 


$(document).on('click', '#confirmC', function(){
	
		m_em_code=$('#m_em_code').val();
		 
       $('#sendM').attr('disabled', false);
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

				//window.location ="send_money.php"; 
				});
		 
			}
		})
	
 sendM.style.display    = "block"; 
 confirmC.style.display    = "none"; 
});




$(document).on('click', '#sendOtp', function(){
	
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