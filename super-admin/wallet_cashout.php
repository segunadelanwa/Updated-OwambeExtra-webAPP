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
 
	<link rel="stylesheet" href="../css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="../css/buttons.dataTables.min.css">

	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" href="../css/ikenne_modal.css">
 </head>
<body class="sb-nav-fixed">
<?php
require"header_connect.php"; 
$paymentstatus="";
if(empty($_SESSION['username']))
{
header("location: logout.php");
}


	$query_photo ="SELECT `lock_status` FROM `wallet_days_count`";
	$query_photo_result=mysqli_query($homedb,$query_photo); 
	while ($row = mysqli_fetch_array($query_photo_result)){
		
		$lock_status = $row['lock_status']; 
	}

if($lock_status == 'locked' AND $loan_status == 'active' || $loan_status == 'passive')
{
header("location:  index.php");
}

//DISPLAY PHOTO TO PAGE CALL UP/////////////

	$query_photo ="SELECT * FROM `cashout` WHERE `cashout`.`username`='$username'";
	$query_photo_result=mysqli_query($homedb,$query_photo); 
	while ($row = mysqli_fetch_array($query_photo_result)){
		
		$paymentstatus = $row['payment_status']; 
	}

 
	
	$query_photo ="SELECT * FROM `wallet` WHERE `wallet`.`username`='$username'";
	$query_photo_result=mysqli_query($homedb,$query_photo);
	while ($row = mysqli_fetch_array($query_photo_result)){
		
		$wallet_current_balance  =$row['current_balance']; 
		$wallet_previous_balance =$row['previous_balance']; 
	} 
  
/////////////////////////////////VIEW PROFILE

 $mem_ip = $_SERVER['REMOTE_ADDR'];
$cash_code=rand(1000, 99999);
$cashout_code="cash_$cash_code";

$auth_code=rand(1000, 99999);
$otp="$auth_code";
$payment_status="OTP Required";
$cashout_status="OTP Required";
$officer_email="Pending";
$payment_officer="Processing..";
$ecard_code="$e_card_code";
//////////////////////////////
$date_init=date('Y-m-d');
$curr_time=date("H:i:s a");




if(isset($_POST["savings_cashout"]))
{ 


	$bank_name      = htmlentities($_POST['bank_name']); 
	$account_name   = htmlentities($_POST['account_name']); 
	$account_no     = htmlentities($_POST['account_no']);    
	$t_deduction    = trim(htmlentities($_POST['t_deduction']));  
	$p_cashout      = trim(htmlentities($_POST['p_cashout']));    

    //$current_bal = $wallet_current_balance - 1000;   
    $current_bal = $wallet_current_balance;   
	$left_bal    = $wallet_current_balance - $t_deduction; 
	
 
	
	 
		if(!empty($account_name) AND !empty($account_no) AND !empty($bank_name)){
			
			if(!$paymentstatus == "Cashout Submited"){
				
				if($t_deduction > $current_bal)	
				{
					
				 echo'<script>alert("Cashout can not be proccess due to insufficient funds on your wallet")</script>';
				 
				}else if($paymentstatus === $payment_status){
				 
				echo'<script>alert("You already have a pending cashout under processing...")</script>'; 						
																
				}else if($t_deduction < 1000){
					echo'<script>alert("Minimum amount to cashout  is ₦1,000.00")</script>';  
				    echo '<script> window.location ="wallet_cashout.php" </script>';
				}
				else
				{

			 

					$data ="INSERT INTO `cashout` VALUES(
					'',
					'".mysqli_real_escape_string($homedb, $mem_code)."',									 
					'".mysqli_real_escape_string($homedb, $username)."',									 
					'".mysqli_real_escape_string($homedb, $p_cashout)."',								 
					'".mysqli_real_escape_string($homedb, $current_bal)."',							 
					'".mysqli_real_escape_string($homedb, $left_bal)."',
					'".mysqli_real_escape_string($homedb, $bank_name)."',
					'".mysqli_real_escape_string($homedb, $account_name)."',
					'".mysqli_real_escape_string($homedb, $account_no)."',
					'".mysqli_real_escape_string($homedb, $ecard_code)."',
					'".mysqli_real_escape_string($homedb, $payment_officer)."',
					'".mysqli_real_escape_string($homedb, $officer_email)."',
					'".mysqli_real_escape_string($homedb, $otp)."',
					'".mysqli_real_escape_string($homedb, $cashout_status)."',
					'".mysqli_real_escape_string($homedb, $payment_status)."',
					'".mysqli_real_escape_string($homedb, $date_init)."',
					'".mysqli_real_escape_string($homedb, $mem_ip)."',
					'".mysqli_real_escape_string($homedb, $cashout_code)."'
					)";
					 
					
					if(mysqli_query($homedb, $data)) 
					{
						
						
						
					//UPDATING login table
					$queryupdate=("UPDATE `login-table` SET 										 		
					`loan_status`  = '".mysqli_real_escape_string($homedb, 'passive')."'										 		
					WHERE `login-table`.`username`='$username'");
					mysqli_query($homedb, $queryupdate);
					   
						$mail->setFrom('noreply@ajoonline.com', 'RSB AJO ONLINE');
						$mail->addAddress("$username"); 
						$mail->addReplyTo('surpport@ajoonline.com');
						$mail->isHTML(true);                                  // Set email format to HTML
						$mail->Subject = 'CASHOUT OTP CONFIRMATION';
						$mail->Body    = "
						<div style='border:1px solid #777777;font-size:13px;;'>
						<center> <img src=\"cid:logo\"  style='text-align:center;height:100px;'/></center><br>
						<center><h2>RSB AJO ONLINE</h2></center>  <br><br>

						<p>Please do not disclose your OTP to anybody</p><br><br>
						<p>Your payment transaction OTP is :<b>$otp</b> </p> 
			 

						<span style='font-size:15px;text-align:center;'>RSB AJO ONLINE  <span><br>
						<div style='width:100%;height:5px;background: linear-gradient(to left, #e81212, #1A330C, gold)'></div><br><br> </div>

						";
						$mail->AddEmbeddedImage('assets/images/logo.png', 'logo', 'assets/images/logo.png'); 

						if($mail->send()){
							
						echo '<script> alert("Please OTP Code has been sent to '.$username.'")</script> ';
						echo '<script> window.location ="cashout_otp.php?code='.$cashout_code.'" </script>';
						
						}else{
						

						echo '<script> alert("Please OTP Code has been sent to '.$username.'")</script> ';
						echo '<script> window.location ="cashout_otp.php?code='.$cashout_code.'" </script>';

						
						}//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////																		
																
				   
			
				 }
				}
				 
			}else{
						echo '<script> alert("Please you already have out-standing cashout under processing")</script> ';
						echo '<script> window.location ="index.php" </script>';	
			}


	}else{
				echo '<script> alert("Please you need to update your bank details to continue.")</script> ';
				echo '<script> window.location ="index.php" </script>';	
	}

 
}


?>
 



  
  		<?php

		include"headernav.php";

		?> 
		
		
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

					if(isset($_GET['msg'])) 
					{
									 
					echo'
								
									<div class="alert alert-warning alert-dismissible fade show" role="alert">
									<strong>Notification!</strong> Please check your wallet balance and continue 
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
									<h3> WALLET ACCOUNT </h3>
									</div>
									
                                    <div class="card-footer d-flex align-items-center justify-content-between ">
										<ol class="breadcrumb mb-4">
										<li class="breadcrumb-item active" style="text-decoration:underline;"><i> <a href="index.php">Home</a>&nbsp; / &nbsp; wallet Cashout</i></li>
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
  <div align="center" style="font-size:20px;"><?php echo"Wallet Bal: ₦".$Loader-> wallet($username) ?></div>
 </div>

	<div class="card-body">
	<div class=" col-md-12 ">	
	
 <form  method="POST" action="">

  <div class="form-group">

	<div class="form-row">
		   <div class="form-group col-md-6"><br>
			   <label for="mname">Payment are to be made to the bank account details below</label>
			   <input type="text"  id="email-address"   name="bank_name" class="form-control"  value="<?php echo"$bank_name";?>" readonly><br>
 
			   <input type="text"   id="first-name" name="account_name" class="form-control" value="<?php echo"$account_name";?>"  readonly><br>
  
			   <input type="text"  id="last-name" name="account_no"  class="form-control"  value="<?php echo"$account_no";?>"  readonly>
		   </div>
 
 
 
			  
 		  <label class="form-group col-md-8"><b>Enter Amount</b></label>
		  
			<div class="input-group col-md-8"> 
			
			
			  <span class="input-group-text">₦</span>
			  <input type="integer" id="cashout_amount"    value="" class="form-control col-md-5" placeholder="<?php echo$wallet_current_balance; ?>"required  >
			  <span class="input-group-text">.00</span>
			  
			</div>



 

	</div> 
 
		<div class="form-group">

		 
		<div style="display:flex;width:50%;">
		 <input type="text"          name="3" id="loadCASH" class="form-control" style="width:130px;height:30px;"required="required"  hidden/>
 		</div>

		</div><hr>

		<div class="form-group">

		<b>Management Fee</b><br>
		<div class="input-group col-md-5"> 
		<span class="input-group-text">₦</span> 
		<input type="integer" id="currentROI"  value="" name="m_fee"  class="form-control"  readonly/>  
		<span class="input-group-text">.00</span>
		</div>
		
		
		</div><hr>

		<div class="form-group">

		<b>Total Deduction  </b><br>
			<div class="input-group col-md-5"> 
			
			  <span class="input-group-text">₦</span>
			  <input type="integer"   value="" id="deductCASH" name="t_deduction"   class="form-control"  readonly/>  
		      <span class="input-group-text">.00</span>
			  
		</div>
		</div><hr>



		<div class="form-group">

		<b>Proccess Cashout</b><br>
			<div class="input-group col-md-5"> 
			
			  <span class="input-group-text">₦</span>
			  <input type="integer"   value="" id="managFee" name="p_cashout"   class="form-control"  readonly/>  
		      <span class="input-group-text">.00</span>
			  
		</div>
		</div><hr>



  </div>

  <div class="form-submit">
 
	<input type="submit" name="savings_cashout"   value="Continue to Cashout " style="padding:10px;border-radius:5px;" class="btn btn-success"/>
 </div>
 <label style="color:#f00;">NOTE: <br>
 An OTP will be sent to your <?php echo"<span style='color:blue;'>$username</span>"; ?> for payment confirmation.<br> 

 </label>

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
							//echo$cash_code=MD5('000000');
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
	
	var get_name='';	
	var roiget='10';
	var getamnt='';
	var result='';



$('#cashout_amount').on('input', function(){
	
result=$('#cashout_amount').val()


//var latestroi =parseInt($('#amountivest').val())/100*roiget
getamnt = result.replace(/,/g, "")
$('#loadCASH').val(getamnt);


	
	
console.log(getamnt)
calculate()
console.log(calculate())

	
 
})



function calculate(){
		var a= parseFloat(getamnt); 
		var b = parseFloat(roiget);
		var perc="";
		var mang_fee="";
		var mFee="";
			if(isNaN(a) || isNaN(b))
			{
			perc=" ";
			}
			else
			{
			
			perc = ((b/100) * a); 
			}
		 
        mang_fee = ((perc/100) * 7.5); 
		
	    mFee =(perc + mang_fee); 	
	    tmFee =(a - mFee); 	
	    dCASH= (a + mFee);
	
        $('#deductCASH').val(dCASH);
        $('#managFee').val(tmFee);
	 
 
			
 
		$('#currentROI').val(mFee); 
    }

})
</script>