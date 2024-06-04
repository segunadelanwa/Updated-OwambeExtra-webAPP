 <?php

//ajax_action.php 
include('../config.php');

$Loader = new Loader;
$invitee = new Refer;

$current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
$current_date_no_time = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('00:00:00')));

	if($_POST['check'] == 'coinbank')
	{
		
		
		
		
		$ecode     = trim($_POST['ecode']); 
		$m_em_code = trim($_POST['m_em_code']); 		
		if(!empty($ecode) && !empty($m_em_code)){
		

		
              $result = $Loader->Get_mem_code($m_em_code);
              $ecode_row = $Loader->ecode($ecode,$m_em_code);
              $coinworth = $invitee->Mortgage($m_em_code);
              $naira_worth = $invitee->coinbank_worth($m_em_code);
             // $naira_worth =number_format($coinworth * 1,2);
		
		   
		
				$owner1 = '';
				$owner2 = '';
				$owner3 = '';
				
				if($ecode_row == 1)
				{
					
					
							foreach($result as $row)
							{

							$f_name         =$row['f_name']; 
							$s_name         =$row['s_name']; 
							$m_name         =$row['m_name']; 

							}	
			 
				
				$owner1 =' 
						<div class="form-group">

						<b>Coinbank Owner  </b><br>
						<div class="input-group col-md-5"> 


						<input type="integer"   value="'.$f_name.' '.$m_name.' '.$s_name.'" id="deductCASH" name="savings_deduction"   class="form-control"  readonly/>  


						</div>
						</div><hr>
						  ';



				$owner2 ='
						<div class="form-group">

						<b>Coinbank value  </b><br>
						<div class="input-group col-md-5"> 


						<input type="integer"   value="RCB'.$coinworth.'" id="deductCASH" name="savings_deduction"   class="form-control"  readonly/>  


						</div>
						</div><hr>
							';
			
				$owner3 ='
						<div class="form-group">

						<b>	Naira selling worth</b><br>
						<div class="input-group col-md-5"> 

						<span class="input-group-text">₦</span>
						<input type="integer"   value="'.$naira_worth.'" id="managFee" name="proccess_loan"   class="form-control"  readonly/>  
						<span class="input-group-text">.00</span>

						</div>
					';
				}
				else
				{
					
					
					$owner3 ='
								<div class="col-xl- col-md-6">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong>
								   
								 Invalid eCode or Memerbership code inserted
								 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>  
    		</div>';
					 
					
					
					
				}
				
				
				echo "
				$owner1<br>
				$owner2<br>
				$owner3<br>
				";
	}//



}



if($_POST['check'] == 'sendmoney')
{
	
	
	
	
 
	$m_em_code = strtoupper(trim($_POST['m_em_code'])); 		
	$homeUser  = strtolower(trim($_POST['homeUser'])); 		
	if(!empty($m_em_code)){
	

	
		  $result = $Loader->Get_mem_code($m_em_code); 
		  $ecode_row =$Loader->Check_mem_code($m_em_code);
	
	 		 
	
			$owner1 = ''; 
			
			if($ecode_row == 1)
			{
				
				
						foreach($result as $row)
						{

						$f_name         =$row['f_name']; 
						$s_name         =$row['s_name']; 
						$m_name         =$row['m_name']; 
						$f_username         =$row['username']; 

						}	
		 
			
			$owner1 =' 
				 

					<label>Names on Reciever Wallet   </label>
					<div class="input-group col-md-5"> 


					<input type="integer"   value="'.$f_name.' '.$m_name.' '.$s_name.'" id="deductCASH" name="name_receiver"   class="form-control"  readonly/>  


					</div><br>


					<label>Reciever Email  Account</label>
					<div class="input-group col-md-5"> 


					<input type="integer"   value="'.$f_username.'" id="deductCASH" name="savings_deduction"   class="form-control"  readonly/>  


					</div><br>
					
					
										
				<label class="form-group col-md-8">Amount to Send</label>
				<div class="input-group col-md-8"> 


				<span class="input-group-text">₦</span>
				<input type="text" id="amount"  name="amount" value="" class="form-control col-md-5" placeholder="1000"required  >
				<span class="input-group-text">.00</span>

				</div><br>

					  
					<label>Enter OTP sent to your email or click here to <a href="#" class="OTPRESEND text-danger" data-user="'.$homeUser.'"  id="sendOtp" data-otp="'.$m_em_code.'"> Send OTP </a></label>
					<div class="input-group col-md-5"> 


					<input type="text"  id=" " name="otp_check"   class="form-control"  required/>  


					</div><br>



					<label>Enter Your eCard Code</label>
					<div class="input-group col-md-5"> 


					<input type="integer"    id=" " name="ecard_ckeck"   class="form-control"  required/>  


					</div><br>						
					  
					  
					  
					 <div id="sendM" > 
						You are about to send moeny to <span class="text-danger"> '.$f_name.' '.$m_name.' '.$s_name.'</span> wallet from your wallet
						 
						</div>
				<br>
					  
					  
					  
					  
					  
					  
					  ';



		
		
			}
			else
			{
				
				
				$owner1 ='
				<div class="col-xl- col-md-6">
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong>
									   
									 Invalid  Memerbership code inserted
									 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
				</div>  
				
				

				
				
				
			   ';
				 
				
				
				
			}
			
			
			echo "
			$owner1
			";
}//



}

if($_POST['check'] == 'sendotp')
{
	
		
    $verify_code= rand(1000, 99999); 
	$sav_code="$verify_code";	
		
	 
	$m_em_code = strtoupper(trim($_POST['getOtp'])); 		
	$user      = strtolower(trim($_POST['user'])); 	


  $ecode_row =$Loader->Check_mem_code($m_em_code);	
	if($ecode_row == 1)
	{

		$queryupdate=("UPDATE `otp_table` SET 
        `otp_code`  = '".mysqli_real_escape_string($homedb, $sav_code)."'  		
		WHERE `otp_table`.`username`='$user'");
		mysqli_query($homedb, $queryupdate);
		
		
		



	$mail->SMTPDebug = 0;                                       // Enable verbose debug output
	$mail->setFrom('noreply@ajoonline.com', 'OTP CODE');
	$mail->addAddress("$user");  
	$mail->addReplyTo('surpport@ajoonline.com');
	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject = ' RSB AJO ONLINE OTP CODE  ';
	$mail->Body    = "
	<div style='border:1px solid #777777;font-size:13px;;'>
	<center> <img src=\"cid:logo\"  style='text-align:center;height:100px;'/></center><br>
	<center><h2>RSB AJO ONLINE</h2></center>  <br><br>

	<p>Hi Your OTP CODE is !
	<span style='color:blue;font-size:20px;'> $sav_code </span>
	</p> 



	<span style='font-size:15px;text-align:center;'>RSB AJO ONLINE  <span><br>
	<div style='width:100%;height:5px;background: linear-gradient(to left, #e81212, #1A330C, gold)'></div><br><br> </div>

	";
	$mail->AddEmbeddedImage('assets/images/logo.png', 'logo', 'assets/images/logo.png'); 

	if($mail->send())
	{

	$owner1 ='
	<div class="col-xl- col-md-12">
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong>

	OTP code has been sent to your '.$user.'

	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</button>
	</div>  

	';

	}
	else
	{


	$owner1 ='
	<div class="col-xl- col-md-12">
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong>

	Error occured while sending OTP code . Please try again later.

	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</button>
	</div>  

	';
	}

	



	}
	else
	{


	$owner1 ='
	<div class="col-xl- col-md-12">
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong>

	You have inserted invalid Memerbership code
	
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</button>
	</div>  

	';
	}


echo "$owner1";
}



 

?>