<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="OXFORD  INTERNATIONAL GROUP">
    <meta name="author" content="OXFORD INTERNATIONAL GROUP">
    <meta name="keywords" content="OXFORD INTERNATIONAL GROUP">

	<!-- Title Page-->
	<title> OWAMBE EXTRA DASHBOARD   </title>
	<link rel="apple-touch-icon" href="img/logo2.png">
	<link rel="shortcut icon"    href="img/logo2.png"/>	
	<meta name="theme-color" content="red">

	<script src="../modal/jquery.min.js"></script> 
	<script src="../modal/bootstrap.min.js"></script> 
	<link href="../home_css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
	
	<link href="../home_css/styles.css" rel="stylesheet" />
	<link href="../home_css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
	<script src="../home/all.min.js" crossorigin="anonymous"></script>


	<link rel="stylesheet" href="../css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="../css/buttons.dataTables.min.css">


	<link rel="stylesheet" href="css/font-awesome.css">
	
 	<script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
	<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


 	<script src="../dataTable/jquery-1.12.4.js"></script> 
	<script src="../dataTable/jquery.dataTables.min.js"></script>
	<script src="../dataTable/dataTables.bootstrap.min.js"></script>
	<link rel="stylesheet" href="../dataTable/bootstrap-datepicker.css" />
	<script src="../dataTable/bootstrap-datepicker.js"></script>
	<script src="../dataTable/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


</head>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
	*{
		font-weight: 100 !important;
		font-family: 'Poppins', sans-serif;
	}
	
.t_head{
width:100%;	
color:green;
font-weight:500;
	
}

 
	
#refresh:hover{
transition: all 500ms ease-in-out;
transform: translateX(5px);	
color:green;
margin-left:-1px;	
font-size:10px;
 
}
</style>
<body class="sb-nav-fixed">
 
 
 
 
<?php

 require"../phpmailer/PHPMailerAutoload.php";

$mail  = new PHPMailer();
 
$current_date  = date('Y-m-d');
 
 
if(empty($_SESSION['username']))
{
header("location: logout.php");
}

	
//DISPLAY PHOTO TO PAGE CALL UP/////////////
	$query_photo ="SELECT * FROM `mortgagevest_admin` WHERE `mortgagevest_admin`.`username`='$username'";
	$query_photo_result=mysqli_query($homedb,$query_photo);
	while ($row = mysqli_fetch_array($query_photo_result)){
		$cornfirm=$row['photo']; 
	}


 
 
 	$query_build ="SELECT returns_date FROM `clone_mortgagevest` WHERE  $current_date < returns_date AND running_invest='Running'";
	$build_portfolio=mysqli_query($homedb,$query_build);
	$running_invest=mysqli_num_rows($build_portfolio);

 	$query_build ="SELECT returns_date FROM `clone_mortgagevest` WHERE  $current_date < returns_date AND running_invest='Pending'";
	$build_portfolio=mysqli_query($homedb,$query_build);
	$onpend_invest=mysqli_num_rows($build_portfolio);

 	$query_estate ="SELECT returns_date FROM `clone_mortgagevest` WHERE  $current_date > returns_date ";
	$matured_portfolio=mysqli_query($homedb, $query_estate);
	$matured_invest=mysqli_num_rows($matured_portfolio);
	
 
$sqltsub = "SELECT SUM(`cash_invested`)FROM `clone_mortgagevest` WHERE payment_approval='Approved' ";
$resulttsub =mysqli_query($homedb,$sqltsub);
while ($row = mysqli_fetch_array($resulttsub)){
$payment_recieved =number_format($row ['SUM(`cash_invested`)'],2); 	
 
} 

$query_sales = "SELECT SUM(`cash_invested`)FROM `clone_mortgagevest` WHERE payment_approval='Pending' ";
$resulttsub =mysqli_query($homedb,$query_sales);
while ($row = mysqli_fetch_array($resulttsub)){
$payment_pending =number_format($row ['SUM(`cash_invested`)'],2); 		
 
} 
 
 ///////////////////////////////VIEW PROFILE 
 
 if(isset($_GET['view'])) 
 {
$get_now=$_GET['view'];

$query_del ="DELETE FROM `buildbay_portfolio` WHERE `buildbay_portfolio`.`id`=$get_now";
if($resulttsub =mysqli_query($homedb,$query_del))
{
$report="Estate property has been deleted ";
}	

 }
 

 if(isset($_GET['password_updat'])) 
 {

	
	echo"<div  id='apicrudModal' lass='mymodal'class='alert alert-warning alert-dismissible fade show' role='alert'>


<div class='modal-dialog'>

	<div class='modal-content'>

		<div class='modal-content'>
				<center><h5 style='text-decoration:underline;'><br><br>UPDATE PASSWORD</h5></center><br>		
 
				
 
				
							 <form  method='POST' action=''  enctype='multipart/form-data'><br><br>

 					   
							<div class='form-group col-xl-auto '>
								<label>Password</label>
								<input type='password' name='ones'   class='form-control' required='required' aria-required='true'/>
							</div>

							<div class='form-group col-xl-auto '>
								<label>Confirm Password</label>
								<input type='password' name='twos'   class='form-control' required='required' aria-required='true'/>
								 
							</div>
 
					
					
					
						<div class='modal-footer'>
						  <input type='submit' name='submit_bank' id='button_action' class='btn btn-info' value='Update' />
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
							</button>
						</div>
						
					
			 
				
 
</form>	
</div>
				
					 
			</div>
		</div>

	</div>";
	 }
/////////////////////////////UPDATE BANK DETAILS

/////////////////////////////////UPDATING PHOTO TO DASHBOARD

////////////////////////////////////////////////

$current_date = date('Y-m-d');
 


 if(isset($_POST['submit_photo'])) 
 {
	$query_photo ="SELECT `photo` FROM `mortgagevest_admin` WHERE `mortgagevest_admin`.`username`='$username'";
	$query_photo_result=mysqli_query($homedb,$query_photo);
	while ($row = mysqli_fetch_array($query_photo_result)){
		$cornfirm=$row['photo'];
	}

	$max_size =3145728;
		
	$image1 =$_FILES['photo']['name'];
	$tmp1 =$_FILES['photo']['tmp_name'];
	$type1 =$_FILES['photo']['type'];

	@$image_size1   = getimagesize($tmp1);
	$image_width1  = $image_size1[0];
	$image_height1 = $image_size1[1];

	@$new_size1   = ($image_width1 + $image_height1 )/($image_width1*($image_height1/175)); 
	$new_width1  =$image_width1 * $new_size1;
	$new_height1 =$image_height1 * $new_size1;

	@$new_image1 = imagecreatetruecolor($new_width1, $new_height1);

	if($type1=='image/jpeg'){
	$old_image1 = imagecreatefromjpeg($tmp1);
	imagecopyresized($new_image1, $old_image1, 0, 0, 0, 0, $new_width1, $new_height1, $image_width1, $image_height1);
	}else
	if($type1 == 'image/png'){	
	$old_image1 = imagecreatefrompng($tmp1);
	imagecopyresized($new_image1, $old_image1, 0, 0, 0, 0, $new_width1, $new_height1, $image_width1, $image_height1);
	}else
	if(@$type== 'image/gif'){
	$old_image1 = imagecreatefromgif($tmp1);
	imagecopyresized($new_image1, $old_image1, 0, 0, 0, 0, $new_width1, $new_height1, $image_width1, $image_height1);
	}	
	   

	$md5_image1=md5($tmp1).'.jpg';
	@imagejpeg($new_image1, "image/".md5($tmp1).'.jpg');
	@unlink($tmp1);
    if(($type1 == 'image/gif')|| ($type1== 'image/png')|| ($type1== 'image/jpeg'))
	{			   
 

		$queryupdate=("UPDATE `mortgagevest_admin` SET
		`photo` = '".mysqli_real_escape_string($homedb, $md5_image1)."' 
		WHERE `mortgagevest_admin`.`username` ='$username'");
		if(mysqli_query($homedb, $queryupdate))
		{

			unlink("image/$cornfirm");

				 //echo"<span style='color:red;'><b>photo uploaded</b></span>";

			header("location: index.php?report= You have successfully update your profile photo");
		}else
		{
		$report="Image upload failed try again ";
		}

	}
	else
	{
		$report="Photo upload failed photo must be 'jpeg','png','gif' extension<br> thank you  ";
	}

}

   if(isset($_GET['photo'])) 
	 {

	echo"
	
	<div  id='apicrudModal' class='mymodal' role='dialog'style='z-index:3500;'>


			<div class='modal-dialog'>

				<div class='modal-content'>

					<div class='modal-content'>
				 <form  method='POST' action=''  enctype='multipart/form-data'><br><br>

						   <div class='form-group col-xl-auto '>
								<label>Update Profile Photo</label>
								<input type='file' name='photo' id='first_name' class='form-control' />
							</div>


						
						<div class='modal-footer'>
						  <input type='submit' name='submit_photo' id='button_action' class='btn btn-info' value='Upload' />
						  <a href='index.php' class='btn btn-warning' style='text-decoration:none;'>Close</a>
						</div>
						
					
				</form>	

			</div>							 
							 
					</div>
				</div>

			</div>";
	 }


///////////////////////////////////////////////////////
      if(isset($_GET['details_mortgagevest'])) 
	 {
		$details_invest=$_GET['details_mortgagevest'];
		
	$query_photo ="SELECT * FROM `clone_mortgagevest` WHERE `invoice_no`='$details_invest'";
	$query_photo_result=mysqli_query($homedb,$query_photo);
	
	while ($row = mysqli_fetch_array($query_photo_result)) 
	 {
			$investor_tab_ids       =$row['id']; 
			$invoice_nos            =$row['invoice_no']; 
			$usernames              =$row['username']; 
			$firstnames             =$row['firstname'];
			$middlenames            =$row['middlename'];
	        $surnames               =$row['surname']; 
			$phones                 =$row['phone'];    
			$marketer_codes         =$row['marketer_code']; 
			$running_invests        =$row['running_invest']; 
			$investment_names       =$row['investment_name'];    
			$invest_approvals       =$row['invest_approval']; 
			$payment_approvals      =$row['payment_approval'];  
			@$cash_investeds        =$row['cash_invested']; 
			$duration_of_plans      =$row['duration_of_plan']; 
			$returns_dates          =$row['returns_date']; 
			@$expected_returnss      =$row['expected_returns']; 
			$mode_of_payments       =$row['mode_of_payment']; 
			$date_of_purchases     =$row['date_of_purchase']; 
			$mode_of_payments       =$row['mode_of_payment'];   
			$approval_officers      =$row['approval_officer']; 
			$date_approveds         =$row['date_approved']; 
		}
		
		
	echo"<div  id='apicrudModal' class='mymodal' role='dialog'style='z-index:3500;'>


	<div class='modal-dialog'>

		<div class='modal-content'style='padding-left:20px;'>
 
<center><h5 style='text-decoration:underline;'><br><br>Mortgagevest Full Details on Invoice:$invoice_nos </h5></center><br>
 
		 
<div style='margin-left:5px;'> 
<div>Investor name : <b> $firstnames $middlenames $surnames </b></div>
<div>Investor email : <b> $usernames  </b></div>   
<div>Investor phone : <b> $phones</b></div> <hr>

<div>Investor marketer : <b> $marketer_codes</b></div>
<div>Payment approval : <b> $payment_approvals </b></div>
<div>Investment approval : <b> $invest_approvals </b></div>
<div>Investment status : <b> $running_invests</b></div> <hr>

<div>Investment plan : <b> $investment_names</b></div>  
<div>Investment duration : <b> $duration_of_plans Months</b></div>  
<div>Cash Invested : <b> N$cash_investeds </b></div>  
<div>Expected Returns: <b> N$expected_returnss </b></div>  
<div>Returns Date : <b> $returns_dates</b></div> <hr>



<div>Mode of payment : <b> $mode_of_payments</b></div>   
<div>Investment date: <b> $date_of_purchases</b></div> <hr>


<div>Approved Officer staff ID: <b> $approval_officers </b></div>  
<div>Approved date: <b> $date_approveds</b></div> 
 
 
</div>
				
						 
					<div class='modal-footer'>	 

					 
						<a href='index.php' class='btn btn-warning' style='text-decoration:none;'>Close</a>
						 
						 
					</div>	
			</div>
	 

	</div>";
	 }

 
      if(isset($_GET['view-profile'])) 
	 {

	
	echo"	<div  id='apicrudModal' class='mymodal' role='dialog'style='z-index:3500;'>


			<div class='modal-dialog'>

				 

					<div class='modal-content'>
				  
						
				<center><h5 style='text-decoration: ;'><br><br>  <small> STAFF ID : $staff_id</small></h5></center>  
				<center><h5 style='text-decoration:underline;'> PROFILE VIEW</h5></center> 
				<center>Profile Photo<br><img src='image/$cornfirm' style='height:100px;border-radius:700px;'/></center>
				
				 <center><h5 style='text-decoration:underline;'><span class='initialism'><br> $surname $firstname   </span></h5> </center><br> 
						 
				<div style='margin-left:5px;'> 
					<div> Home Address : <b> $home_address</b></div><br>
					<div> Gender : <b>$gender </b></div><br>
					<div> Date of Birth : <b> $date_of_birth </b></div><br>
					<div> City : <b> $city</b></div><br>
					<div> State : <b> $state </b></div><br>
					<div> Nationality : <b>$nationality</b></div><br><br>
					
					<div>Email : <b>  $username</b></div>
					<div>Phone Number: <b> $number</b></div>
				
                </div>

 
 

				


				<div class='modal-footer'>	 
				<a href='index.php' class='btn btn-warning' style='text-decoration:none;'>Close</a>
				</div>	
			 
		</div>
		</div>

	</div>";
	 }
 

/////////////////////////////////////////////////////// 
  if(isset($_POST['approve_mortgagevest_payment'])) 
 {
	$_1     =trim(htmlentities($_POST['1']));
	$_2     =trim(htmlentities($_POST['2'])); 




		$query_table ="SELECT * FROM `clone_mortgagevest` WHERE `clone_mortgagevest`.`invoice_no`='$_1'";
		$query_t_result=mysqli_query($homedb,$query_table);
		while($row = mysqli_fetch_array($query_t_result))
		{	$account_user      =$row['username'];
		 	$firstnames        =$row['firstname'];
		 	$surnames          =$row['surname'];
		 	$investment_name   =$row['investment_name'];
			$cash_invest       =number_format($row['cash_invested'],2);
		 	$duration_of_planss=$row['duration_of_plan'];
		 	$returns_dates     =$row['returns_date'];
		 	$expected_returnss =$row['expected_returns'];
		 	$date_approved     =$row['date_approved'];
		 	$date_of_purchase  =$row['date_of_purchase'];
		 	$invest_approval   =$row['invest_approval'];
		 	$payment_approval  =$row['payment_approval'];
		 	$upfront_payment   =$row['upfront_payment'];
	    }
		
 


		

		if(!empty($account_user))
		{

					if($_2 == 'Approved')
					{
						
						if($payment_approval =='Approved')
						{	
						header("Location: index.php?report=Sorry this invoice no. $_1 payment has been approved already");

						}
						else
						{

									$queryupdate=("UPDATE `clone_mortgagevest` SET 
									`running_invest`    ='".mysqli_real_escape_string($homedb,'Running')."',
									`invest_approval`   ='".mysqli_real_escape_string($homedb,$_2)."',
									`grace_period`      ='".mysqli_real_escape_string($homedb,'Paid')."',
									`payment_approval`  ='".mysqli_real_escape_string($homedb,$_2)."',
									`approval_officer`  ='".mysqli_real_escape_string($homedb,$staff_id)."',
									`date_approved`     ='".mysqli_real_escape_string($homedb,$update_time)."'
									WHERE `clone_mortgagevest`.`invoice_no` ='$_1'");
									
									
									
									 if(mysqli_query($homedb, $queryupdate))
									 {	
		 
										$operator="$firstname $surname"	;	
										$event="$operator approve $firstnames $surnames mortgagevest payment  under subsidiary $_0 by ";								 
										$query_insert2 =("INSERT INTO `add_admin_history` VALUE (
										'',
										'".mysqli_real_escape_string($homedb, $username)."',
										'".mysqli_real_escape_string($homedb, $operator)."',
										'".mysqli_real_escape_string($homedb, 'MORTGAGEVEST DASHBOARD')."',
										'".mysqli_real_escape_string($homedb, $update_time)."',
										'".mysqli_real_escape_string($homedb, $event)."'
										)");
										 mysqli_query($homedb,$query_insert2);  


										 
												$mail->SMTPDebug = 1;                                       // Enable verbose debug output
												$mail->setFrom('noreply@oxfordbuildvest.com', 'Oxford  International Group');
												@$mail->addAddress("$account_user", "$firstname $surname");   // Name is optional 
												$mail->isHTML(true);                                  // Set email format to HTML
												$mail->Subject = 'Mortgagevest Payment Confirmation ';
												$mail->Body    = "
									  
											<div style='width:100%;height:5px;background: linear-gradient(to left, red, black)'></div><br>
											 <center> <img src=\"cid:logo\"  style='text-align:center;height:100px;'/></center><br>
											<div style='width:100%;height:5px;background: linear-gradient(to left, red, black)'></div><br>
											
										<div style='font-size:11px;'>	
										Dear $firstnames $surnames, <br><br>
										
										As a valued customer, we appreciate the business relationship <br>you have with us.<br><br> 					

										We want to let you know that your payment has been received, and your investment has been fully approved <br><br>
										
										Your invoice number is<b> $_1</b><br><br>	

										Please see a list of things that are contained in the invoice<br><br>
										Investment Plan     : $investment_name <br>
										Cash Invested       : NGN$cash_invest <br> 
										Expected Return     : NGN$expected_returnss<br><br>
										Duration Of Plan    : $duration_of_planss Month <br>
										Investment Set out  : $date_of_purchase <br>
										-------------------------------------------------------<br>								
										Returns Date        : $returns_dates<br>
										Approved Date       : $update_time<br>
										
										
			 

										
										 
									 
										 
										 
									 
										 
										<br><br><center style='font-size:14px;color:#ccc;'>OXFORD  INTERNATIONAL GROUP </center><br>
										<div style='width:100%;height:5px;background: linear-gradient(to left, red, black)'></div>
										
									</div>";
												   $mail->AddEmbeddedImage('../img/logo.png', 'logo', '../img/logo.png'); 

											 
											   if($mail->send())
												echo ' ';
											 else
												echo " ";		  
									header("Location: index.php?report=Mortgagevest Investment payment approved successfully");	
										 
									}
									else
									{
								     header("Location: index.php?report=Error has occured due to network problem please try agin <br> Thank you ");
									}
									
						}
							 
					}
					else
					if($_2 == 'Disapproved')
					{

						 if($payment_approval =='Approved')
						{	
						header("Location: index.php?report=Sorry this invoice no. $_1 payment has been approved already");

						}
						else
						{

									$queryupdate=("UPDATE `clone_mortgagevest` SET 
									`running_invest`   ='".mysqli_real_escape_string($investdb,'Canceled')."',
									`invest_approval`   ='".mysqli_real_escape_string($homedb,$_2)."',
									`payment_approval`  ='".mysqli_real_escape_string($homedb,$_2)."',
									`approval_officer`  ='".mysqli_real_escape_string($homedb,$staff_id)."',
									`date_approved`     ='".mysqli_real_escape_string($homedb,$update_time)."'
									 WHERE `clone_mortgagevest`.`invoice_no` ='$_1'");
									
									 if(mysqli_query($homedb, $queryupdate))
									 {	
										$operator="$firstname $surname"	;	
										$event="$operator disapproved $firstnames $surnames Mortgagevest investment payment  under subsidiary $_0 by ";								 
										$query_insert2 =("INSERT INTO `add_admin_history` VALUE (
										'',
										'".mysqli_real_escape_string($homedb, $username)."',
										'".mysqli_real_escape_string($homedb, $operator)."',
										'".mysqli_real_escape_string($homedb, 'ALPHA DEPT')."',
										'".mysqli_real_escape_string($homedb, $update_time)."',
										'".mysqli_real_escape_string($homedb, $event)."'
										)");
										 mysqli_query($homedb,$query_insert2);  
										 
									 
											$mail->SMTPDebug = 1;                                       // Enable verbose debug output
												$mail->setFrom('noreply@oxfordbuildvest.com', 'Oxford International Group');
												@$mail->addAddress("$account_user", "$firstname $surname");   // Name is optional 
												$mail->isHTML(true);                                  // Set email format to HTML
												$mail->Subject = 'Payment Disapproved Confirmation ';
												$mail->Body    = "
									  
											<div style='width:100%;height:5px;background: linear-gradient(to left, red, black)'></div><br>
											 <center> <img src=\"cid:logo\"  style='text-align:center;height:40px;'/></center><br>
											<div style='width:100%;height:5px;background: linear-gradient(to left, red, black)'></div><br>
											
										<div style='font-size:14px;'>	
										Dear $firstnames $surnames, <br><br>
										
										As a valued customer, we appreciate the business relationship <br>you have with us.<br><br> 					

										We regret to let you know that your mortgagevest investment payment has been disapproved
										
																		
										Your invoice number is<b> $_1</b><br><br>		

										Please see a list of things that are contained in the invoice<br><br>
										Investment          : $investment_name <br>
										Cash Invested       : NGN$cash_invest <br> 
										Expected Return     : NGN$expected_returnss<br><br>
										Duration Of Plan    : $duration_of_planss Month <br>
										Investment Set out  : $date_of_purchase <br>
										-------------------------------------------------------<br>								
										Returns Date        : $returns_dates<br>
										Approved Date       : $update_time<br>
										
			 
										 
									 
										 
										 
									 
										 
										<br><br><center style='font-size:14x;color:#ccc;'>OXFORD INTERNATIONAL GROUP </center><br>
										<div style='width:100%;height:5px;background: linear-gradient(to left, red, black)'></div>
										
									</div>";
												   $mail->AddEmbeddedImage('../img/logo.png', 'logo', '../img/logo.png'); 

											 
											   if($mail->send())
												echo ' ';
											 else
												echo " ";		  		  
									header("Location: index.php?report= mortgagevest Investment payment Canceled successfully");	
										 
									}
									else
									{
									header("Location: index.php?report= Error has occured due to network problem please try agin <br> Thank you ");
									}
						  }

					}	
					else
					if($_2 == 'Upfront Payment')
					{

						   if($invest_approval =='Approved')
						   {
									  $not_req="Not Requested";
								   if($upfront_payment == $not_req)
								   {
							   
							   
											$upfront ="$expected_returnss paid on $update_time";
											$queryupdate=("UPDATE `clone_mortgagevest` SET 
											`upfront_payment`  ='".mysqli_real_escape_string($homedb,$upfront)."'
											WHERE `clone_mortgagevest`.`invoice_no` ='$_1'");
											
											 if(mysqli_query($homedb, $queryupdate))
											 {	
										 
										$operator="$firstname $surname"	;	
										$event="$operator approve $firstnames $surnames Mortgagevest investment Upfront Payment  by MORTGAGEVEST DASHBOARD ";								 
										$query_insert2 =("INSERT INTO `add_admin_history` VALUE (
										'',
										'".mysqli_real_escape_string($homedb, $username)."',
										'".mysqli_real_escape_string($homedb, $operator)."',
										'".mysqli_real_escape_string($homedb, 'MORTGAGEVEST DASHBOARD')."',
										'".mysqli_real_escape_string($homedb, $update_time)."',
										'".mysqli_real_escape_string($homedb, $event)."'
										)");
										 mysqli_query($homedb,$query_insert2); 
											 
														$mail->SMTPDebug = 0;                                       // Enable verbose debug output
														$mail->setFrom('noreply@oxfordbuildvest.com', 'Oxford International Group ');
														@$mail->addAddress("$account_user", "$firstname $surname");   // Name is optional 
														$mail->isHTML(true);                                  // Set email format to HTML
														$mail->Subject = 'Mortgagevest Upfront Payment Confirmation ';
														$mail->Body    = "
											  
													<div style='width:100%;height:5px;background: linear-gradient(to left, red, black)'></div><br>
													 <center> <img src=\"cid:logo\"  style='text-align:center;height:40px;'/></center><br>
													<div style='width:100%;height:5px;background: linear-gradient(to left, red, black)'></div><br>
													
												<div style='font-size:15px;'>	
												Dear $firstnames $surnames, <br><br>
												
												As a valued customer, we appreciate the business relationship <br>you have with us.<br><br> 					

												We want to let you know that your Mortgagevest investment upfront payment has been paid<br><br>
												
																				
												Your Mortgagevest invoice no. <b> $_1</b><br><br>		

												Please see a list of things that are contained in the invoice<br><br>
												Investment Plan     : $investment_name <br>
												Cash Invested       : NGN$cash_invest <br> 
												Expected Return     : NGN$expected_returnss<br><br>
												Duration Of Plan    : $duration_of_planss Month <br>
												Investment Set out  : $date_of_purchase <br>
												-------------------------------------------------------<br>								
												Returns Date        : $returns_dates<br>
												Approved Date       : $update_time<br>
												
					 
												-------------------------------------------------------<br>
												Upfront Payment     : NGN$upfront<br>
												Payment  Date       : $update_time<br>
												-------------------------------------------------------<br>
												 
											 
												 
												 
											 
												 
												<br><br><center style='font-size:14px;color:#ccc;'>OXFORD INTERNATIONAL GROUP </center><br>
												<div style='width:100%;height:5px;background: linear-gradient(to left, red, black)'></div>
												
											</div>";
														   $mail->AddEmbeddedImage('../img/logo.png', 'logo', '../img/logo.png'); 

													 
													   if($mail->send())
														echo ' ';
													 else
														echo " ";		  		  
											header("Location: index.php?report= Mortgagevest Investment upfront payment paid successfully ");	
												 
											}
											 else
											  {
											header("Location: index.php?report=Error has occured due to network problem please try agin <br> Thank you ");
											}
									}
									else
									{
										header("Location: index.php?report=!Sorry the Mortgagevest investment Upfront payment has already been paid <br> Thank you ");
									}	
						   }
						   else
						   {
							 header("Location: index.php?report=Mortgagevest Investment need to be approved before Upfront can be paid out <br> Thank you. ");

						   }

					}	

		}
		else
		{
		header("Location: index.php?report=Sorry you have input an invalid Mortgagevest  investment invoice no.");	
		}

       

 }
 
 
 if(isset($_GET['delete_mortgagevest'])) 
{
	$querydelete=("DELETE FROM `clone_mortgagevest` WHERE `clone_mortgagevest`.`invoice_no`='".$_GET['delete_mortgagevest']."'");
	if(mysqli_query($homedb, $querydelete))
	{
		 header("location: index.php?report=Investment Invoice no. ".$_GET['delete_invest']." has been  deleted successfully");	
	}
}

 ////////////////////////////////////////////// 
 
 if(isset($_GET['approve_investment'])) 
{

 
	echo"<div  id='apicrudModal' class='mymodal' role='dialog'style='z-index:3500;'>


<div class='modal-dialog'>

	<div class='modal-content'>

		<div class='modal-content'>
				<center><h6 style='text-decoration:underline;'><br><br> 	APPROVE INVESTMENT PAYMENT</h6></center><br>		
 

				<form  method='POST' action=''  enctype='multipart/form-data'><br><br>
				
				
							<div class='form-group col-xl-auto '>
								<label>Investment invoice no</label>
								<input type='text' name='1' id='first_name' class='form-control' required='required' aria-required='true'/>
							</div>
							
							
							<div class='form-group col-xl-auto '>
								<label>Payment Option </label>
	                            <select               name='2'  required='required' class='form-control' aria-required='true'>
									<option disabled='disabled' selected='selected'>Select Option</option>
									
									<option>Upfront Payment</option>
									<option>Approved</option>
									<option>Disapproved </option> 
								</select>							
						  </div>

 
						
					
				
				

				
						 
					<div class='modal-footer'>	 

						 
						  <input type='submit' name='approve_mortgagevest_payment' id='button_action' class='btn btn-info' value='Approve paymnet' />
						<a href='index.php' class='btn btn-warning'   style='text-decoration:none;'>Close</a>
					 
						 
					</div>	
			     </form>	
                 </div>		
					
			</div>
		</div>

	</div>";
	
	
	 
}
 
 ?>


  

       <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php"><img src='../img/logo3.png' style='height:50px;' /></a>
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

			 
					echo"<img class='rounded' src='image/$cornfirm'   width='50px'>";	
				 
					?>
					
					</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="index.php?password_update">Update password</a>
                        <a class="dropdown-item" href="index.php?photo">Update Photo</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
		
		
		
  <div id="layoutSidenav">
       <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"><i class="fa fa-tachometer-alt"></i> MORTGAGEVEST DASHBOARD</div>
							
                          											<a href="index.php?password_update"  class="nav-link" >
									<div class="sb-nav-link-icon"></div>
									<i class="fa fa-upload"></i>  &nbsp;   password
									</a>

									<a href="index.php?view-profile"  class="nav-link" >
									<div class="sb-nav-link-icon"></div>
									<i class="fa fa-eye"></i> &nbsp; View   profile 
									</a>  

									<a href="index.php?photo" class="nav-link" >
									<div class="sb-nav-link-icon"></div>
									<i class="fa fa-photo"></i> &nbsp; Change  photo 
									</a>  
                            </a>

                            <a class="nav-link" href="index.php?approve_investment">
                                <div class="sb-nav-link-icon"></div>
                               <i class="fa fa-check-circle"></i>  &nbsp; Approve Invest
                            </a>

 

                            <a class="nav-link" href="index.php?approve_investment">
                                <div class="sb-nav-link-icon"></div>
                               <i class="fa fa-check"></i>  &nbsp; Approve Upfront
                            </a>

  
 

 
                             
							
  
 

                           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
								<a class="nav-link" href="logout.php">
								<div class="sb-nav-link-icon"><i class="fa fa-toggle-off"></i></div>
								Logout
								</a>
                                
                            </a>
                        
 <!-- 
						<div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                          
							<div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>-->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo" $username";?>
                    </div>
                </nav>
            </div>
      
      <div id="layoutSidenav_content">
                <main>
	<?php
 
				
					if(!empty($report)) 
					{
								 
					echo'
								
									<div class="alert alert-warning alert-dismissible fade show" role="alert">
									<strong>Notification!</strong> '.$report.'
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
									</div>
					     ';
					}
					if(isset($_GET['p_w'])) 
					{
								 
					echo'
								
									<div class="alert alert-warning alert-dismissible fade show" role="alert">
									<strong>Notification!</strong> password updated successfully 
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
									</div>
					     ';
					}
						
					 if("$password" == "670b14728ad9902aecba32e22fa4f6bd")
					 {
					 echo' 

					<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong><i class="fa fa-bell"></i>Notification!</strong>
								   
								   <div style="text-transform:capitalize;"> '.$firstname.' '. $surname.' kindly update your password from default password </div><br>
									<a href="index.php?password_update" style="text-decoration:none;"> 
									<div style="background-color:red;font-size:17px;color:white;padding:10px;border-radius:5px;"> 
									   Continue To Update
									</div>
									</a>
									
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>  

					';
					 }
				
									if(isset($_GET['report'])) 
					{
						$report=$_GET['report'];		 
					echo'
								
									<div class="alert alert-warning alert-dismissible fade show" role="alert">
									<strong>Notification!</strong> '.$report.'
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
									</div>
					     ';
					}
				
	if(isset($_GET['password_update'])) 
 {

	
	echo"<div  class='col-md-6 alert alert-dismissible fade show' role='alert'>
				<center><h5 style='text-decoration:underline;'><br><br>UPDATE PASSWORD</h5></center><br>		
 
				
 
				
							 <form  method='POST' action=''  enctype='multipart/form-data'><br><br>

 					   
							<div class='form-group col-xl-auto '>
								<label>Password</label>
								<input type='password' name='ones'   class='form-control' required='required' aria-required='true'/>
							</div>

							<div class='form-group col-xl-auto '>
								<label>Confirm Password</label>
								<input type='password' name='twos'   class='form-control' required='required' aria-required='true'/>
								 
							</div>
 
					
					
					
						<div class='modal-footer'>
						  <input type='submit' name='submit_pass' id='button_action' class='btn btn-info' value='Update' />
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
							</button>
						</div>
						
					
			 
				
 
</form>	
</div>
 ";
	 }

 if(isset($_POST['submit_pass'])) 
 {
            $pass1          = MD5(($_POST['ones']));
			$pass2          = MD5(($_POST['twos']));
			 
		 

 if($pass1 == $pass2)
 {
		$queryupdate=("UPDATE `mortgagevest_admin` SET  
		`password`='".mysqli_real_escape_string($homedb,$pass2)."'
		WHERE `mortgagevest_admin`.`username` ='$username'");
		if(mysqli_query($homedb, $queryupdate))
		{

		  header("Location: index.php?p_w=success");	
		}
 }
 else
 {
    $report="Your password did not match ";
 }	 
	
 
 }
 			
 
	?>


                    <div class="container-fluid">
                        <h2 class="mt-4" style="text-transform:uppercase;"> <a href="index.php"><i class="fa fa-refresh" id="refresh"></i></a> MORTGAGEVEST ADMIN   </h2>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"><?php echo"Welcome $surname  $firstname ";?></li>
                        </ol>
						
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body" style=" "><span>RUNNING INVESTMENT</span> <i class="fa fa-line-chart"style="font-size:30px;float:right;"></i></div>
                                    <div class="card-footer align-items-center justify-content-between ">
                                        
                                        <div class="text-white"style="font-size:20px;text-align:center;"><b> <?php echo"$running_invest";?> </b></div>
                                    </div>
                                </div>
                            </div>

							 
                            <div class="col-xl-4">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body" style=" "><span>PENDING INVESTMENT</span> <i class="fa fa-pause"style="font-size:30px;float:right;"></i></div>
                                    <div class="card-footer align-items-center justify-content-between ">
                                        
                                        <div class="text-white"style="font-size:20px;text-align:center;"><b> <?php echo"$onpend_invest";?> </b></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body"><span> MATURED INVESTMENT </span> <i class="fa fa-stop-circle"style="font-size:30px;float:right;"></i></div>
                                    <div class="card-footer align-items-center justify-content-between">
                                    
                                        <div class="text-white" style="font-size:20px;text-align:center;"><b><?php echo"$matured_invest";?></b></div>
                                    </div>
                                </div>
                            </div>
				 
                            <div class="col-xl-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">PAYMENT RECIEVED<i class="fa fa-money" style="font-size:30px;float:right;"></i></div>
                                    <div class="card-footer align-items-center justify-content-between">
                                      
                                        <div class="text-white" style="font-size:20px;text-align:center;"><b><?php echo"₦$payment_recieved";?></b></div>
                                    </div>
                                </div>
                            </div>
							
                        <div class="col-xl-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">PAYMENT PENDING   <i class="fa fa-money"style="font-size:30px;float:right;"></i></div>
                                    <div class="card-footer align-items-center justify-content-between">
                                        
                                        <div class="text-white" style="font-size:20px;text-align:center;"><b><?php echo"₦$payment_pending";?></b></div>
                                    </div>
                                </div>
                            </div> 
                        </div>
						
                        <div class="row">
	                            <div class="col-xl-12">
                         
                                        

                            
                            </div>						

 
                        </div>
						
<?php						
$today_returns_d=date('Y-m-d');
$one_week=date('Y-m-d',   strtotime('-1 week'));
$two_week=date('Y-m-d',   strtotime('-2 week'));
$three_week=date('Y-m-d', strtotime('-3 week'));
$one_month=date('Y-m-d',  strtotime('-1 month'));
$two_month=date('Y-m-d',  strtotime('-2 month'));
$six_month=date('Y-m-d',  strtotime('-6 month')); 

{
	
echo'
<div class="card mb-4">

<div class="card-header">
<i class="fa fa-table mr-1"></i>
<b> <i class="fa fa-refresh reload_table"></i> MORTGAGEVEST INVESTMENT </b>


</div>

<div class="row">&nbsp;

	



		 <div class="dropdown col-md-3"> 
   
		  
		</div>
		
	 
	 
		 <div class="row col-md-6 input-daterange">
		 
			  <div class="col-md-6">
			  <input type="text" name="start_date" id="start_date" placeholder="yyyy-mm-dd" class="form-control" />
			  </div>
			  
			  <div class="col-md-6">
			   <input type="text"   name="end_date" id="end_date" placeholder="yyyy-mm-dd" class="form-control" />
			  </div> 

  
		  
		 </div>


		 <div class="col-md-3">
		  <input type="button" data-table="approve_data"  name="datesearch" id="datesearch" value="Search" class="btn btn-info" />
		 </div>
	 
</div>

<div class="card-body">

						<div class="table-responsive" >
				<table  id="approve_data"
					class="table table-hover table-striped table-bordered tataTable dtr-inline"
					role="grid" aria-describedby="example_info">
 
					<thead  style="width: 100%;overflow:auto;"> 
						<tr role="row" id="table_details">
							<th>
							Invoice no.
							</th>


							<th>
							Payment status
							</th>

							<th>
							Investment status
							</th>

							<th>
							Cash Invested
							</th>
							
							<th>
							Expected Returns
							</th>

							<th>
							Matured date
							</th>
							
							<th>
							Aprroved Date 
							</th>
							


							<th>
							Upfront Payment
							</th>
							
							<th>
							Shares Allocated
							</th>
							
							<th>
							Investment Date
							</th>


							<th>
							Action
							</th>



						</tr>
	                 </thead>
					 
					 
			 
					</table>
	 </div>
				
</div>
 
</div>
';	
	
}


										
 ?> 



				  </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Oxford International Group 2021</div>
                            <div>
                                 
                              
                            </div>
                        </div>
                    </div>
                </footer>
            </div>

 </div>
      
 
   <script src="../home_js/scripts.js"></script>
 
    </body>
</html>

 


<script type="text/javascript" src="../css/jquery.dataTables.min.js"></script>

 
<script type="text/javascript" src="../css/buttons.flash.min.js"></script>
<script type="text/javascript" src="../css/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../css/jszip.min.js"></script>
<script type="text/javascript" src="../css/pdfmake.min.js"></script>
<script type="text/javascript" src="../css/vfs_fonts.js"></script>
<script type="text/javascript" src="../css/buttons.html5.min.js"></script>
<script type="text/javascript" src="../css/buttons.print.min.js"></script>
<script src="../css/canvasjs.min.js"></script>
 

<script type="text/javascript">
 

Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: <?php echo json_encode($labelPoints, JSON_NUMERIC_CHECK); ?>,
    
    datasets: [{
      label: "Growth NGN",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: <?php echo json_encode($dataPoints); ?>,
      
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 15
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max:  <?php echo$expected_returns_cart; ?>,
          maxTicksLimit: 10
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

</script>
<script type="text/javascript" src="../js_form/main.07a59de7b920cd76b874.js"></script> 


<script>
  $('.input-daterange').datepicker({
  todayBtn:'linked',
  format: "yyyy-mm-dd",
  autoclose: true
 });
</script>

 <script>
  $('.input-daterange').datepicker({
  todayBtn:'linked',
  format: "yyyy-mm-dd",
  autoclose: true
 });
</script>

<script>
$(document).ready(function() {
 
 


 fetch_data('no');


	var filterTable ='';

	 function fetch_data(is_date_search, start_date='', end_date='')
	 {
 
	 
			 var dataTable = $('#approve_data').DataTable({
			   "processing" : true,
			   "serverSide" : true,
			   "order" : [],
			   ajax :({
				url:"range_fetch.php",
				type:"POST",
				data:{is_date_search:is_date_search, start_date:start_date, end_date:end_date, page:'view_table', action:'fetch_all_invest'}
	 
			       }),
			   
		 
				dom: 'Bfrtip',
				buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
				]

		  
			});
 
 
 }
	 	  

 
	 
 
	
	
	           $('#datesearch').click(function(){
			 
			  var start_date = $('#start_date').val();
			  var end_date = $('#end_date').val(); 
			   var table_name =  $(this).data('table');
				
			  if(start_date != '' && end_date !='')
			  {
			   $('#'+table_name).DataTable().destroy();
			   fetch_data('yes', start_date, end_date);
			  }
			  else
			  {
			   alert("Both Date is Required");
			  }
		    });


		 $('.active_sort').click(function(){
		  var start_date =  $(this).data('name');
		  var end_date =  $(this).data('id');
		  var table_name =  $(this).data('table');

		   $('#'+table_name).DataTable().destroy();
		   fetch_data('yes', start_date, end_date);

		 }); 
		 

		 $('.reload_table').click(function(){ 
		 
			location.reload();
 
		 }); 


 }); 
</script>