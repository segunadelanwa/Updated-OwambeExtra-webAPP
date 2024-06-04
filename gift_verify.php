<?php
 
require"config.php";

if(isset($_GET['reference'])){
	
$ref = $_GET['reference'];
	
		if($ref == ""){

		header("location:  index.php");
		}
		
 

}

 

 $loader  = new Loader();


  $curl = curl_init();

  

  curl_setopt_array($curl, array(

    CURLOPT_URL => "https://api.paystack.co/transaction/verify/".rawurlencode($ref),

    CURLOPT_RETURNTRANSFER => true,

    CURLOPT_ENCODING => "",

    CURLOPT_MAXREDIRS => 10,

    CURLOPT_TIMEOUT => 30,

    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

    CURLOPT_CUSTOMREQUEST => "GET",

    CURLOPT_HTTPHEADER => array(
 
      "Authorization: Bearer sk_test_7513c3e133ab3a204c146030e400f4e5e0afbd3b",

      "Cache-Control: no-cache",

    ),

  ));

  

  $response = curl_exec($curl);

  $err = curl_error($curl);

  curl_close($curl);

  

  if ($err) {

    echo "cURL Error #:" . $err;

  } else {

   // echo $response;
   $result = json_decode($response);
  }


 
 

$amount       = $result->data->amount;
$status       = $result->data->status;
$reference    = $result->data->reference;
$sender_names = $result->data->customer->first_name; //Note: from paystack end remains the visitor gift donor full name
$event_id     = $result->data->customer->phone;  //Note:  This  phone indicates public_event ID from database and not a real phone number
$cus_email    = $result->data->customer->last_name; //Note: This last_name replaces our registered customer email from our database
$date_time    = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa'))); 






if($result->data->status == 'success')
{
	
	
//search if the gift owner statue and gift arrived is proxy or self	
	$result=$loader->GiftOwnerSearch($event_id);//Public_event
	 
	foreach($result as $row){

	$gift_owner   = $row['event_owner'];
	$gift_arrived = $row['gift_arrived'];
	$first_name   = $row['first_name'];
	$sur_name = $row['sur_name'];
	$id = $row['id'];

	}
////////////////////////////////////////////////////////////////////////	
			if(!empty($gift_owner))
			{

					if($gift_owner == "self")
					{

						/////////////////////////////////////////////////GET WALLET BALANCE	/ PREVIOUS

							$result=$loader->WalletBal($cus_email);

							foreach($result as $row){

							$current_balance   = $row['current_balance'];
							$previous_balance  = $row['previous_balance'];
							$last_payment_id   = $row['last_payment_id'];

							}
						/////////////VETTING FOR  DUPLICATE TRANSACTION WALLET

						  $result_wallet=$loader->DuplicateT_wallet($reference);


						  
						/////////////SEARCHING GIFT NAME  
						////////////////////////Company Shares Percentage share  	////////////////////////////////////////	
										  $amount_cal=$amount/100;
										 $com_share_cal = $amount_cal / 100 * 10 ;
										  
						///////////////////////////////Celebrant Percentage share
								 
										  $celeb_share_cal = $amount_cal - $com_share_cal ;
										  $new_cur_bal = $current_balance + $celeb_share_cal;
										  
						/////////////////////////////////////    /Updating Arrived Gift  	
										 $newGiftArrived = $gift_arrived + 1 ; 
										 
										 
									 
							
						 				$result = $loader->giftName($amount_cal);
										foreach($result as $row){

										$gift_image = $row['gift_image'];
										$giftname = $row['gift_name'];
										}

											
											
										if($result_wallet == 1 )
										{
													echo"<br><br><br><br><div align='center' style='font-size:30px;'>  
													<img src='images/ok.png' height='100px'/> <br>
													<span style='color:red;'>Gift Payment Received</span><br> 
													Your Gift  has already been sent to $first_name $sur_name<br><br>
													<a href='eventpage.php?id=$id'> Back To Home</a>
													</div>";
										}
										else
										{	


						 


										 ////////////////////////////////////////  	
										//////////////////////////////////////// UPDATE `public_event`	
										$query_update=("UPDATE `public_event` SET
										`gift_arrived`      = '".mysqli_real_escape_string($homedb, $newGiftArrived)."'	
										WHERE `public_event`.`id`='$id'");
										mysqli_query($homedb, $query_update);

										 ////////////////////////////////////////  
										 //////////////////////////////////////// Celebrant Wallet

										$queryupdate=("UPDATE `wallet` SET
										`current_balance`  = '".mysqli_real_escape_string($homedb, $new_cur_bal)."',
										`previous_balance` = '".mysqli_real_escape_string($homedb, $current_balance)."',
										`date`             = '".mysqli_real_escape_string($homedb, $date_time)."',  
										`last_payment_id`  = '".mysqli_real_escape_string($homedb, $reference )."',
										`last_pay_status`  = '".mysqli_real_escape_string($homedb, $status )."'  		
										WHERE `wallet`.`username`='$cus_email'");
										mysqli_query($homedb, $queryupdate);
						 

										///////////////////////////////////////////////////////////////////
														

										$query_gift_ref =("INSERT INTO `gift_event` VALUE (
										'',
										'".mysqli_real_escape_string($homedb, $reference)."',							 
										'".mysqli_real_escape_string($homedb, $event_id)."',									 
										'".mysqli_real_escape_string($homedb, $sender_names)."',									 
										'".mysqli_real_escape_string($homedb, $celeb_share_cal)."',							 
										'".mysqli_real_escape_string($homedb, $giftname)."',						 
										'".mysqli_real_escape_string($homedb, $gift_image)."',						 
										'".mysqli_real_escape_string($homedb, $cus_email)."',							 
										'".mysqli_real_escape_string($homedb, $date_time)."'							 
										 
										)");

										mysqli_query($homedb,$query_gift_ref);


										$query_wallet_ref =("INSERT INTO `com_wallet` VALUE (
										'',
										'".mysqli_real_escape_string($homedb, $cus_email)."',
										'".mysqli_real_escape_string($homedb, $com_share_cal)."',
										'".mysqli_real_escape_string($homedb, $celeb_share_cal)."',
										'".mysqli_real_escape_string($homedb, $date_time)."',  
										'".mysqli_real_escape_string($homedb, $reference)."',
										'".mysqli_real_escape_string($homedb, $event_id)."',
										'".mysqli_real_escape_string($homedb, $sender_names)."',
										'".mysqli_real_escape_string($homedb, $gift_owner)."'
										
										)");

										mysqli_query($homedb,$query_wallet_ref);
										///////////////////////////////////////////////////////////////////

										$query_history_ref =("INSERT INTO `wallet_history` VALUE (
										'',
										'".mysqli_real_escape_string($homedb, $event_id)."',									 
										'".mysqli_real_escape_string($homedb, $cus_email)."',									 
										'".mysqli_real_escape_string($homedb, $new_cur_bal)."',									 
										'".mysqli_real_escape_string($homedb, $current_balance)."',									 
										'".mysqli_real_escape_string($homedb, $previous_balance)."',
										'".mysqli_real_escape_string($homedb, $celeb_share_cal)."',
										'".mysqli_real_escape_string($homedb, $date_time)."',  
										'".mysqli_real_escape_string($homedb, $reference)."',
										'".mysqli_real_escape_string($homedb, $gift_owner)."'
										)");

										mysqli_query($homedb,$query_history_ref);
																		
									 

													echo"<br><br><br><br><div align='center' style='font-size:30px;'>  
													<img src='images/ok.png' height='100px'/> <br>
													Payment Successfull.<br>$first_name $sur_name is saying a big thanks <br><br>
													<a href='eventpage.php?id=$id'> Back To Home</a>
													</div>";
										
										}


					}
					else if($gift_owner == "proxy")
					{
						/////////////////////////////////////////////////GET WALLET BALANCE	/ PREVIOUS

							$result=$loader->ProxyWalletBal($event_id);

							foreach($result as $row){

							$current_balance   = $row['current_balance'];
							$previous_balance  = $row['previous_balance'];
							$last_payment_id   = $row['last_payment_id'];

							}
						/////////////VETTING FOR  DUPLICATE TRANSACTION WALLET			 
						  /////////////VETTING FOR  DUPLICATE TRANSACTION WALLET

						  $result_wallet_proxy=$loader->DuplicateT_proxy_wallet($event_id, $reference);
						  
						  ////////////////////////Company Shares Percentage share  	////////////////////////////////////////	
							  $amount_cal=$amount/100; 
							  $com_share_cal = $amount_cal / 100 * 10 ;
							  
			///////////////////////////////Celebrant Percentage share
					 
							  $celeb_share_cal = $amount_cal - $com_share_cal ;
							  $new_cur_bal = $current_balance + $celeb_share_cal;
							  
			//////////////////////////////////////////////////////////Updating Arrived Gift  	
							  $newGiftArrived = $gift_arrived + 1 ; 


								$result = $loader->giftName($amount_cal);
								foreach($result as $row){

								$gift_image = $row['gift_image'];
								$giftname = $row['gift_name'];
								}

							if($result_wallet_proxy >= 1 )
							{
										echo"<br><br><br><br><div align='center' style='font-size:30px;'>  
										<img src='images/ok.png' height='100px'/> <br>
										<span style='color:red;'>Gift Payment Received</span><br> 
										Your Gift  has already been sent to   $first_name $sur_name<br><br>
										<a href='eventpage.php?id=$id'> Back To Home</a>
										</div>";
							}
							else
							{	


							 ////////////////////////////////////////  	
							//////////////////////////////////////// UPDATE `public_event`	
							$query_update=("UPDATE `public_event` SET
							`gift_arrived`      = '".mysqli_real_escape_string($homedb, $newGiftArrived)."'	
							WHERE `id`='$id'");
							mysqli_query($homedb, $query_update);

							 ////////////////////////////////////////  
							 //////////////////////////////////////// Celebrant Wallet

							$queryupdate=("UPDATE `proxy_wallet` SET
							`current_balance`  = '".mysqli_real_escape_string($homedb, $new_cur_bal)."',
							`previous_balance` = '".mysqli_real_escape_string($homedb, $current_balance)."',
							`date`             = '".mysqli_real_escape_string($homedb, $date_time)."',  
							`last_payment_id`  = '".mysqli_real_escape_string($homedb, $reference )."',
							`last_pay_status`  = '".mysqli_real_escape_string($homedb, $status )."'  		
							WHERE `proxy_wallet`.`proxy_event_id`='$event_id'");
							mysqli_query($homedb, $queryupdate);
			 

							///////////////////////////////////////////////////////////////////
											

							$query_gift_ref =("INSERT INTO `gift_event` VALUE (
							'',
							'".mysqli_real_escape_string($homedb, $reference)."',							 
							'".mysqli_real_escape_string($homedb, $event_id)."',									 
							'".mysqli_real_escape_string($homedb, $sender_names)."',									 
							'".mysqli_real_escape_string($homedb, $amount)."',							 
							'".mysqli_real_escape_string($homedb, $giftname)."',						 
							'".mysqli_real_escape_string($homedb, $gift_image)."',						 
							'".mysqli_real_escape_string($homedb, $cus_email)."',							 
							'".mysqli_real_escape_string($homedb, $date_time)."'							 
							 
							)");

							mysqli_query($homedb,$query_gift_ref);


							$query_wallet_ref =("INSERT INTO `com_wallet` VALUE (
							'',
							'".mysqli_real_escape_string($homedb, $cus_email)."',
							'".mysqli_real_escape_string($homedb, $com_share_cal)."',
							'".mysqli_real_escape_string($homedb, $celeb_share_cal)."',
							'".mysqli_real_escape_string($homedb, $date_time)."',  
							'".mysqli_real_escape_string($homedb, $reference)."',
							'".mysqli_real_escape_string($homedb, $event_id)."',
							'".mysqli_real_escape_string($homedb, $sender_names)."',
							'".mysqli_real_escape_string($homedb, $gift_owner)."'
							
							)");

							mysqli_query($homedb,$query_wallet_ref);
							///////////////////////////////////////////////////////////////////

							$query_history_ref =("INSERT INTO `wallet_history` VALUE (
							'',
							'".mysqli_real_escape_string($homedb, $event_id)."',									 
							'".mysqli_real_escape_string($homedb, $cus_email)."',									 
							'".mysqli_real_escape_string($homedb, $new_cur_bal)."',									 
							'".mysqli_real_escape_string($homedb, $current_balance)."',									 
							'".mysqli_real_escape_string($homedb, $previous_balance)."',
							'".mysqli_real_escape_string($homedb, $celeb_share_cal)."',
							'".mysqli_real_escape_string($homedb, $date_time)."',  
							'".mysqli_real_escape_string($homedb, $reference)."',
							'".mysqli_real_escape_string($homedb, $gift_owner)."'
							)");

							mysqli_query($homedb,$query_history_ref);
															
						 

										echo"<br><br><br><br><div align='center' style='font-size:30px;'>  
										<img src='images/ok.png' height='100px'/> <br>
										Payment Successfull.<br>A big thanks from $first_name $sur_name <br><br>
										<a href='eventpage.php?id=$id'> Back To Home</a>
										</div>";
							
							}


					}



			}
			else
			{
					echo"<br><br><br><br><div align='center' style='font-size:30px;'>  
						<img src='images/notok.png' height='100px'/> <br>
						Transaction Cancelled. <br><br>
						<a href='eventpage.php?id=$id'> Back To Home</a>
						</div>";
			}

   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
}
else
{
	 			echo"<br><br><br><br><div align='center' style='font-size:30px;'>  
					<img src='images/notok.png' height='100px'/> <br>
					Transaction Cancelled <br><br>
					<a href='eventpage.php?id=$ref'> Back To Home</a>
					</div>";
}





?>


