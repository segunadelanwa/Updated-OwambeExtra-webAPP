<?php
 
require"header_connect.php";

if(isset($_GET['reference'])){
	
$ref = $_GET['reference'];
	
		if($ref == ""){

		header("location:  javascript://history.go(-1)");
		}
		
 

}

 

 $mail  = new PHPMailer();


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


if($result->data->status == 'success')
{
	
$unique1=rand(0, 9999);
$unique2=rand(0, 9999);
$unique3=rand(0, 9999);

$unique_id="$unique1-$unique2-$unique3"; 




   $amount    = $result->data->amount;
   $status    = $result->data->status;
   $reference = $result->data->reference;
   $ccode1    = $result->data->customer->first_name;
   $ccode     = $result->data->customer->last_name;
   $cus_email = $result->data->customer->email; 
   $date_time = date('Y-m-d');
   $time = date('h:i:s a' , time());
   $e_card_expire = date('Y/m', strtotime('+1 month'));
   $e_card_expire_day ="$e_card_expire/25";
   
   
			$query_cert_table  ="SELECT * FROM `login-table` WHERE `username`='$username'";
			$query_certs_result=mysqli_query($homedb,$query_cert_table); 
			while($row = mysqli_fetch_array($query_certs_result))
			{
				$payment_code      =$row['payment_code'];
 
			}


			$query_cert_table  ="SELECT * FROM `savings` WHERE `mem_code`='$refer_code'";
			$query_certs_result=mysqli_query($homedb,$query_cert_table); 
			while($row = mysqli_fetch_array($query_certs_result))
			{
				
				$available_bal           =$row['available_bal'];
				$current_balance_sav     =$row['current_balance'];
				$previous_balance_sav    =$row['previous_balance'];
				$username_sav            =$row['username']; 
				$last_payment_otp_sav    =$row['last_payment_otp']; 
 
 
			}

			$query_cert_table  ="SELECT * FROM `wallet` WHERE `mem_code`='$refer_code'";
			$query_certs_result=mysqli_query($homedb,$query_cert_table); 
			while($row = mysqli_fetch_array($query_certs_result))
			{
				$current_balance_ref      =$row['current_balance'];
				$previous_balance_ref     =$row['previous_balance'];
				$username_ref             =$row['username']; 
				$last_payment_otp_ref     =$row['last_payment_otp']; 
 
 
			}
			
			
			
		if($payment_code === $ref)
		{
					echo"<br><br><br><br><div align='center' style='font-size:30px;'>  
					<img src='../img/ok.png' height='100px'/> <br>
					Payment Successfull,  Your E-CARD is Active<br><br>
					<a href='index.php'> Back To Home</a>
					</div>";
        }
		else
        {	
////////////////////////wallet account calc		
		$active ="ACTIVE";	 
		$amount_cal_tot =$amount/100;	 
		$fund_pay_ref   =$current_balance_ref + 1000 ;
 /////////////////////////savings update calc
        $fixed_amn   = 250 ;
        $fund_savings   = 500 ;
		
		$ava_bal        = $available_bal + $fixed_amn ;
		$fund_pay_sav   =$current_balance_sav + $fixed_amn ;	 
        $amount_cal      = $amount_cal_tot +  $fund_savings;
		//////////////////////////////////////// Memberlogin table update		
		//////////////////////////////////////// Member wallet		
		//////////////////////////////////////// Member savings		
		$query_update=("UPDATE `login-table` SET
		`user_status`      = '".mysqli_real_escape_string($homedb, $active)."',
		`payment_code`     = '".mysqli_real_escape_string($homedb, $reference)."',
		`e_card_code`      = '".mysqli_real_escape_string($homedb, $unique_id)."',   		
		`e_card_pay_date`  = '".mysqli_real_escape_string($homedb, $date_time)."', 		
		`e_card_expire_day`= '".mysqli_real_escape_string($homedb, $e_card_expire_day)."' 		
		WHERE `username`='$username'");
		mysqli_query($homedb, $query_update);

         //////////////////////////////////////// Member Referer wallet
         //////////////////////////////////////// Member Referer wallet

		$queryupdate=("UPDATE `savings` SET
		`current_balance`  = '".mysqli_real_escape_string($homedb, $fund_pay_sav)."',
		`previous_balance` = '".mysqli_real_escape_string($homedb, $current_balance_sav)."',
		`date`             = '".mysqli_real_escape_string($homedb, $date_time)."', 
		`time`             = '".mysqli_real_escape_string($homedb, $time)."',
		`last_payment_otp` = '".mysqli_real_escape_string($homedb, $reference )."',
        `last_pay_status`  = '".mysqli_real_escape_string($homedb, $status )."',  		
        `available_bal`    = '".mysqli_real_escape_string($homedb, $ava_bal)."'  		
		WHERE `savings`.`mem_code`='$refer_code'");
		mysqli_query($homedb, $queryupdate);


		$queryupdate=("UPDATE `wallet` SET
		`current_balance`  = '".mysqli_real_escape_string($homedb, $fund_pay_ref)."',
		`previous_balance`  = '".mysqli_real_escape_string($homedb, $current_balance_ref)."',
		`date`             = '".mysqli_real_escape_string($homedb, $date_time)."', 
		`time`             = '".mysqli_real_escape_string($homedb, $time)."',
		`last_payment_otp` = '".mysqli_real_escape_string($homedb, $reference)."',
        `last_pay_status`  = '".mysqli_real_escape_string($homedb, $status)."'  		
		WHERE `wallet`.`mem_code`='$refer_code'");
		mysqli_query($homedb, $queryupdate);
		

        ///////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////

		$query_wallet_ref =("INSERT INTO `wallet_history` VALUE (
		'',
		'".mysqli_real_escape_string($homedb, $refer_code)."',									 
		'".mysqli_real_escape_string($homedb, $username_ref)."',									 
		'".mysqli_real_escape_string($homedb, $fund_pay_ref)."',									 
		'".mysqli_real_escape_string($homedb, $current_balance_ref)."',									 
		'".mysqli_real_escape_string($homedb, $previous_balance_ref)."',
		'".mysqli_real_escape_string($homedb, $amount_cal)."',
		'".mysqli_real_escape_string($homedb, $date_time)."', 
		'".mysqli_real_escape_string($homedb, $time)."',
		'".mysqli_real_escape_string($homedb, $reference)."',
		'".mysqli_real_escape_string($homedb, $status)."'
		)");

		mysqli_query($homedb,$query_wallet_ref);
										
     

				    echo"<br><br><br><br><div align='center' style='font-size:30px;'>  
					<img src='../img/ok.png' height='100px'/> <br>
					Payment Successfull,  Your E-CARD is Active<br><br>
					<a href='index.php'> Back To Home</a>
					</div>";
		
		}
}
else
{
	 			echo"<br><br><br><br><div align='center' style='font-size:30px;'>  
					<img src='../img/notok.png' height='100px'/> <br>
					Transaction Cancelled <br><br>
					<a href='index.php'> Back To Home</a>
					</div>";
}







?>


