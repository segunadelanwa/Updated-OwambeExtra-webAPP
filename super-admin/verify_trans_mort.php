<?php
include('config.php'); 

if(isset($_GET['reference'])){
	
$ref = $_GET['reference'];
	
		if($ref == ""){

		header("location:  javascript://history.go(-1)");
		}
		
					$query_cert_table  ="SELECT * FROM `clone_mortgagevest` WHERE `clone_mortgagevest`.`invoice_no`='$ref'";
			$query_certs_result=mysqli_query($homedb,$query_cert_table); 
			while($row = mysqli_fetch_array($query_certs_result))
			{$invoice_no         =$row['invoice_no'];}
	 
 	
		if(empty($invoice_no)){

		//header("location:  user-login.php");
		}

}


require"phpmailer/PHPMailerAutoload.php";
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


if($result->data->status == 'success'){
	
   $status    = $result->data->status;
   $reference = $result->data->reference;
   $ccode     = $result->data->customer->id;
   $cus_email = $result->data->customer->email; 
   $date_time = date('Y-m-d');

  
			$query_cert_table  ="SELECT * FROM `clone_mortgagevest` WHERE `clone_mortgagevest`.`invoice_no`='$reference'";
			$query_certs_result=mysqli_query($homedb,$query_cert_table); 
			while($row = mysqli_fetch_array($query_certs_result))
			{
				$username           =$row['username'];
				$firstname          =$row['firstname'];
				$surname            =$row['surname'];
				$invoice_no         =$row['invoice_no'];
				$investment_name    =$row['investment_name'];
				$type_of_plan       =$row['duration_of_plan'];
				$cash_invested2     =number_format($row['cash_invested'],2);
				$expected_rtn       =number_format($row['expected_returns'],2);
			}
			
		$queryupdate=("UPDATE `clone_mortgagevest` SET
		`invest_approval`   = '".mysqli_real_escape_string($homedb, 'Approved')."',
		`running_invest`    = '".mysqli_real_escape_string($homedb, 'Running')."',
		`payment_approval`  = '".mysqli_real_escape_string($homedb, 'Approved')."',
		`approval_officer`  = '".mysqli_real_escape_string($homedb, 'Payment Gateway')."',
		`date_approved`     = '".mysqli_real_escape_string($homedb, $date_time)."'
		WHERE `clone_mortgagevest`.`invoice_no`='$reference'");
		if(mysqli_query($homedb, $queryupdate))
		{
   $mail->SMTPDebug = 1;                                       // Enable verbose debug output
											$mail->setFrom('noreply@oxfordgroupngbizinvest.com', 'Oxford International Group');
											@$mail->addAddress("$username", "$firstname $surname");   // Name is optional 
											$mail->isHTML(true);                                  // Set email format to HTML
											$mail->Subject = 'Customer Invoice no. ';
											$mail->Body    = "
								  
								<div style='width:100%;height:5px;background: linear-gradient(to left, red, black)'></div><br> 
								 <center> <img src=\"cid:logo\"  style='text-align:center;height:50px;'/></center><br> 
								<div style='width:100%;height:5px;background: linear-gradient(to left, red, black)'></div><br>
							 <div style='background-color:;font-size:15px;'>	
									Dear $firstname $surname, <br><br>
									
									As a valued customer, we appreciate the business relationship <br>you have with us.<br><br> 					

									Your invoice number is $invoice_no<br><br>	

									Please see a list of things that are contained in the invoice<br><br>
									Investment Name     : $investment_name <br>
									Investment Plan     : $type_of_plan Month <br>
									Cash Invested       : NGN$cash_invested2 <br>  
									Expected Return     : NGN$expected_rtn<br>
									-------------------------------------------------------<br>
									 
									 
									 
									 
									
									If you have any issues, please do not hesitate to reply to this email.Our customer support team is available 24/7 to assist
									you with any issue you may be having<br><br>
									
									Thanks for hoosing Oxford International Group.<br><br>
									 
								 
									 
									<br><br><center style='font-size:18px;color:#ccc;'>OXFORD INTERNATIONAL GROUP </center><br>
									<div style='width:100%;height:5px;background: linear-gradient(to left, red, black)'></div>
									
								</div>";
											   $mail->AddEmbeddedImage('img/logo.png', 'logo', 'img/logo.png'); 

										 
										   if($mail->send())
											echo ' ';
										 else
											echo " ";
										
        header("Location: https://oxfordgroupngbizinvest.com/user-login.php?success=$username"); 
		}  
}
else
{
	 header("Location: https://oxfordgroupngbizinvest.com/user-login.php?failed=$username");
}







?>