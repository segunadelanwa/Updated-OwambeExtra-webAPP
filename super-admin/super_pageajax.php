<?php
require('../config.php');
 $loader = new Loader;
 
require('../phpmailer/PHPMailerAutoload.php');

$mail = new PHPMailer;

if(isset($_SESSION['username']) && !empty($_SESSION['username']))
{
  
   $loader->query='SELECT * FROM `admin_super_login` WHERE  `username`="'.$_SESSION['username'].'"';
		
		 if($result = $loader->query_result()){
	 
		
			foreach($result as $row)
			{
					 
			$username            =  $row['username'];
			$password            =  $row['password'];
			$f_name              =  $row['firstname'];
			$m_name              =  $row['middlename'];
			$surname             =  $row['surname'];
			$home_address        =  $row['home_address'];
			$gender              =  $row['gender'];
			$date_of_birth       =  $row['date_of_birth'];
			$number              =  $row['number'];
			$email               =  $row['email'];
			$register_date       =  $row['register_date'];
	 
			
		  
			}
	 
	 
   
 
	 
		 }
 
} 
else 
{
	 include "index.php";
}


$current_date  = date('Y-m-d');	

$ip_address = $_SERVER['REMOTE_ADDR'];
$current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
$time = date("H:i:s", STRTOTIME(date('h:i:sa')));

if(isset($_POST['page']))
{
 
    if($_POST['page'] == 'wallet_otp')
	{

		if($_POST['action'] == 'confirm_otp')
		{


              if($_POST['event_id'] == 'self_wallet'){
 


			$loader->query = " SELECT `otp_code` FROM `otp_table` WHERE `username` = '$username' ";

			$result = $loader->query_result();

			foreach($result as $row){  $otp_code = $row['otp_code'];  }
			 

					if($_POST["loadOTP"] == $otp_code )
					{

						$output = array(
						'feedback0' => 'self'
						);
						echo json_encode($output);							
						
						
					}else
				    {

					} 
					
			  }
			  else
			  {
							$loader->query ="SELECT * FROM `public_event` WHERE `event_id` = '".$_POST['event_id']."' ";

			$result1 = $loader->query_result();

			foreach($result1 as $row){ $event_owner = $row['event_owner']; }


			$loader->query = " SELECT `otp_code` FROM `otp_table` WHERE `username` = '$username' ";

			$result = $loader->query_result();

			foreach($result as $row){  $otp_code = $row['otp_code'];  }
			 

					if($_POST["loadOTP"] == $otp_code )
					{
						$output = array(
						'feedback0' => ''.$event_owner.''
						);
						echo json_encode($output);	
						
						
						
					}else
				    {

					}   
			  }
				
         }

		if($_POST['action'] == 'otp_approve')
		{



		$officer_name="$f_name $surname";           
			             

 
		$Cashcode   = trim(htmlentities($_POST['Cashcode']));      
		$loadOTP   = trim(htmlentities($_POST['loadOTP']));      

	  
	

				$loader->query = "SELECT * FROM `otp_admin` WHERE `otp_admin`.`username` ='$email'";
		        $result = $loader->query_result();
				 
				
				
				foreach($result as $row){
					
					$otp_code = $row['otp_code']; 
					
				}

		       
	
						   if($otp_code ===  $loadOTP)
						   {					
	 

							  //UPDATING Cahout
								$queryupdate=("UPDATE `cashout` SET 								 									 		
								`payment_officer`  = '".mysqli_real_escape_string($homedb, $officer_name)."',
								`officer_email`    = '".mysqli_real_escape_string($homedb, $email)."',
								`payment_status`   = '".mysqli_real_escape_string($homedb, 'Admin_Paid')."'	
								WHERE `cashout`.`cashout_code`='$Cashcode'");
								mysqli_query($homedb, $queryupdate);

								//RESET OTP TABLE 
								$queryupdate=("UPDATE `otp_admin` SET 										 		
								`otp_code`     = '".mysqli_real_escape_string($homedb, '')."',										 		
								`otp_status`   = '".mysqli_real_escape_string($homedb, '')."'	
								WHERE `otp_admin`.`username`='$email'");
								mysqli_query($homedb, $queryupdate);

						   
			
							   
							   
				
									$output = array(
									 
									'feedback1'		=>	'Cashout Payment Successfull!!',
									'feedback2'		=>	'paid_cashout.php'

									);
									echo json_encode($output);	
									
								}
							else
							{
								$output = array(
								 
								'feedback1'		=>	'Invalid OTP code  Inserted!!',
								'feedback2'		=>	'approve_cashout.php'

								);
								echo json_encode($output);										
								
							}
						  					
						   
			
		}
			
		if($_POST['action'] == 'reSendOtp')
		{

		
					$verify_code= rand(1000, 99999); 
					$otp="$verify_code";	
		

	    
				    

						$queryupdate=("UPDATE `otp_admin` SET 										 		
					`otp_code`     = '".mysqli_real_escape_string($homedb, $otp)."',										 		
					`otp_status`   = '".mysqli_real_escape_string($homedb, 'payment approval')."',										 		
					`reg_date`     = '".mysqli_real_escape_string($homedb, $time)."' 
					
					WHERE `otp_admin`.`username`='$email'");
					
					if(mysqli_query($homedb, $queryupdate))
					{
					
						//SENDING OTP MAIL

						$mail->setFrom('noreply@owambextra.com', 'OWAMBE EXTRA OTP');
						$mail->addAddress("$email");  
						$mail->isHTML(true);                                  // Set email format to HTML
						$mail->Subject = 'ADMIN OTP CONFIRMATION';
						$mail->Body    = "
						<div style='border:1px solid #777777;font-size:13px;;'>
						<center> <img src=\"cid:logo\"  style='text-align:center;height:100px;'/></center><br>
						<center><h2>OWAMBE EXTRA ADMIN OTP</h2></center>  <br><br>

						<p>Please do not disclose your OTP to anybody</p><br><br>
						<p>Your payment transaction OTP is :<b>$otp</b> </p> 
			 

						<span style='font-size:15px;text-align:center;'>OWAMBE EXTRA OTP  <span><br>
						<div style='width:100%;height:5px;background: linear-gradient(to left, #e81212, #1A330C, gold)'></div><br><br> </div>

						";
						$mail->AddEmbeddedImage('../assets/images/logo.png', 'logo', '../assets/images/logo.png'); 

						if($mail->send()){
							
	 
							$output ='OTP code has been sent to your '.$email.'';

									 
			              echo $output;
							
							
						
						}
						else
						{
						

				 
							$output ='OTP code has been sent to your '.$email.'';

									 
			              echo $output;
						} 											
				   
					}

		
     

        }
  

	}
 
}




?>
