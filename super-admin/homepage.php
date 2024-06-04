<!DOCTYPE html>
<html lang="en">
    <head>
	
<?php
require"header_meta.php";
?>
	
	
	<!--http://127.0.0.1/ajoonline.com/member_login/wallet_fund_verify.php?reference=AJO_44638135470-->
</head>	
	
	
 <style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
	*, a{
		font-weight: 100 !important;
		font-family: 'Poppins', sans-serif;
		text-decoration:none;
	}
	
	
#refresh:hover{
transition: all 500ms ease-in-out;
transform: translateX(5px);	
color:green;
margin-left:-1px;	
font-size:10px;
 
}

.get_st{
 -webkit-animation-animation: blinker 1s linear infinite;
 animation: blinker 1s linear infinite;
animation-duration: 1s; 
}
@keyframes blinker {  
  50% { opacity: 0; }
}

a{
text-decoration:none;	
}
</style>


<body class="sb-nav-fixed" >
<?php
$date_time = date('DMYH:i:s');
$user =$username;
$systime=time();
$date = date('DM');
$time= $date_time ;
$user_time= "$user$time";
$date_date="$date$systime";

$amateur='amateur';
$bonafide='bonafide';
$master  ='master';
$verified='verified';
 
	$query_photo ="SELECT `photo` FROM `admin_super_login` WHERE `admin_super_login`.`username`='$username'";
	$query_photo_result=mysqli_query($homedb,$query_photo);
	while ($row = mysqli_fetch_array($query_photo_result)){
		 $cornfirm=$row['photo'];
	}
	

 	
if(empty($_SESSION['username']))
{
header("location: logout.php");
}
 

	//$superlog = new superlog(); 
 
 
 if(isset($_GET['view-profile'])) //yvudfgy
 {    
	echo"<div  id='apicrudModal' class='mymodal' role='dialog'style='z-index:3500;'>


<div class='modal-dialog'>

	<div class='modal-content'>

		<div class='modal-content'>
								
						<center><h5 style='text-decoration:underline;'><br><br> PROFILE VIEW</h5></center><br>
						<center>Profile Photo<br>
	";					
					 if(empty($photo))
					{
					echo"<a href='index.php?photo'><img class='rounded' src='../img/placeholder.png'  width='50px'></a><br>	 $mem_code";	
					}
					else if(!empty($photo))
					{
					echo"<img class='rounded' src='imagefolder/$cornfirm'   width='50px'><br>	 $mem_code";	
					}
						
	echo"					
						</center>
						 <h5 style='text-decoration:underline;'><span class='initialism'><br> 
						 $surname $firstname $middlename </span><br>
						 
						 </h5> <br> 
								 
						<div style='margin-left:5px;'> 
						<div>Referral Code :  <b> $refer_code</b></div>
						<div> Home Address :  <b> $home_address</b></div>
						<div>  Gender :        <b>$gender </b></div>
						<div>  Date of Birth : <b> $date_of_birth </b></div> 
						<div>  State : <b> $state </b></div> 
						<div>  Nationality :   <b>$nationality</b></div>
						
						<div>  Email :         <b>  $username</b></div>
						<div>  Phone Number:   <b> $phone_no</b></div>
						<hr>
					 
						 
								 
						<div>Registered Date : <b>$register_date </b></div>

				 
					 
				

						<hr>
						YOUR BANK DETAILS
						<hr>
						<div>Bank Name :      <b>$bank_name</b></div> 
						<div>Account Name :   <b>$account_name</b></div> 
						<div>Account Number : <b>$account_no</b></div> 
						   
					 </div>
						
		 
							<div class='modal-footer'>	 

							 
								<a href='index.php' class='btn btn-info'style='text-decoration:none;'>Close</a>
							 
								 
							</div>	
					 
						
						</div>		 

					</div>
				</div>

			</div>";
 
	 
}
/////////////////////////////////VIEW PROFILE 

 ///////////////////////////UPDATE BANK DETAILS
if(isset($_GET["delete"]))
{ 


		$delete_code = $_GET["delete"];   


		$queryupdate=" DELETE FROM `cashout` WHERE `cashout`.`cashout_code`='$delete_code'";
		if(mysqli_query($homedb, $queryupdate)){

		echo '<script> alert("Cashout Payment Deleted Successfully ")</script> ';
		echo '<script> window.location ="index.php" </script>';

		} 


}

/////////////////////////////////UPDATING PHOTO TO DASHBOARD




 if(isset($_POST['submit_photo'])) 
 {
	$query_photo ="SELECT `photo` FROM `admin_super_login` WHERE `admin_super_login`.`username`='$username'";
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
	@imagejpeg($new_image1, "customer_folder/$username/".md5($tmp1).'.jpg');
	@unlink($tmp1);
    if(($type1 == 'image/gif')|| ($type1== 'image/png')|| ($type1== 'image/jpeg'))
	{			   
 

		$queryupdate=("UPDATE `admin_super_login` SET
		`photo` = '".mysqli_real_escape_string($homedb,$md5_image1)."' 
		WHERE `admin_super_login`.`username` ='$username'");
		if(mysqli_query($homedb, $queryupdate))
		{

			unlink("imagefolder/$cornfirm");

				 //echo"<span style='color:red;'><b>photo uploaded</b></span>";

			   header("location: index.php?report= You have successfully update your profile photo");
		}else
		{
		 header("location: index.php?report=Image upload failed try again ");
		}

	}
	else
	{
		 header("location: index.php? report=Photo upload failed photo must be 'jpeg','png','gif' extension<br> thank you  ");
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
 
 
 
 /////////////////////////////////UPDATE ADDRESS
  if(isset($_POST['submit_phone'])) 
 {
 
	$phone     = htmlentities($_POST['phone_number']); 


	$queryupdate=("UPDATE `admin_super_login` SET 
	`phone_number`   = '".mysqli_real_escape_string($homedb,$phone)."'
	WHERE `admin_super_login`.`username` ='$username'");
		 
    if(mysqli_query($homedb, $queryupdate))
	{	 
		 header("location: index.php?report=Contact updated successfully  ");	
		 
	}
	else
	{
		 header("location: index.php?report=Contact update failed  ");	
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
					if(isset($_GET['report'])) 
					{
									$report= $_GET['report'];	
					echo'
								
									<div class="alert alert-warning alert-dismissible fade show" role="alert">
									<strong>Notification!</strong> '.$report.'
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
									</div>
					';
						}
 

				
					?>

                    <div class="container-fluid">
                   <h3 class="mt-3" style="text-transform: ;">
						<a href="index.php"><i class="fa fa-refresh" id="refresh"></i></a>
						  SUPER ADMIN <?php echo"$username";?>
				 
						</h3>
                        <div class="breadcrumb row">
 

                  
                        </div>
					<?php
					if(isset($_GET['report'])) 
					{
									$report= $_GET['report'];	
					echo'
								
									<div class="alert alert-warning alert-dismissible fade show" role="alert">
									<strong>Notification!</strong> '.$report.'
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
									</div>
					';
						}
					?>



				


						
						
                        <div class="row">
							
                           <div class="col-xl- col-md-3">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Company Wallet <i class="fa fa-money"style="font-size:30px;float:right;"></i></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="wallet_cashout.php" ></a>
                                        <div class="  text-white"><b> <?php echo "₦".$loader->ComWallet(); ?> </b></div>
                                    </div>
                                </div>
                            </div>

						   <div class="col-xl- col-md-3">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"><span>Tot Sub Wallet   </span> <i class="fa fa-money"style="font-size:30px;float:right;"></i></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="savings_cashout.php"><b>   </b></a>
                                        <div class="  text-white"><b> <?php   echo "₦".$loader->SubWallet(); ?></b> </div>
                                    </div>
                                </div>
                            </div>


							<div class="col-xl- col-md-3">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"><span>Tot Proxy Wallet   </span> <i class="fa fa-money"style="font-size:30px;float:right;"></i></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="savings_cashout.php"><b>   </b></a>
                                        <div class="  text-white"><b> <?php  echo "₦".$loader-> ProxyWallet(); ?></b> </div>
                                    </div>
                                </div>
                            </div>

							
                            <div class="col-xl- col-md-3">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body" style=" "><span>Tot CashOut </span> <i class="fa fa-money"style="font-size:30px;float:right;"></i></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between ">
                                        <a class="small text-white stretched-link" href="loan_request.php"><b></b></a>
                                         <div class="  text-white"><b> <?php  echo "₦".$loader-> CashoutWallet(); ?></b> </div>
										</div>
                                    </div>
                                </div>
								
                        </div> 
                          
		                        <div class="row">
							
                           <div class="col-xl- col-md-2">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"> Paid Amt</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="paid_cashout.php" ></a>
                                        <div class="  text-white"><b> <?php  echo "₦".$loader-> CashoutPaid(); ?></b></div>
                                    </div>
                                </div>
                            </div>

						   <div class="col-xl- col-md-2">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body"> Unpaid Amt</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="approve_cashout.php"><b>   </b></a>
                                        <div class="  text-white"><b> <?php  echo "₦".$loader-> CashoutUnpaid(); ?></b></div>
                                    </div>
                                </div>
                            </div>


							<div class="col-xl- col-md-2">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body"><span>Self Events  </span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="savings_cashout.php"><b>   </b></a>
                                        <div class="  text-white"><b>  <?php  echo $loader-> SelfEvents(); ?>  </b> </div>
                                    </div>
                                </div>
                            </div>

 							
                            <div class="col-xl- col-md-2">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body" style=" "><span>Proxy Events </span> </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between ">
                                        <a class="small text-white stretched-link" href="loan_request.php"><b></b></a>
                                        <div class="  text-white"><b style="font-weight:900;">  <?php  echo $loader-> ProxyEvents(); ?>  </b></div>
										</div>
                                    </div>
                                </div> 

								
                            <div class="col-xl- col-md-2">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body" style=" "><span>Users </span> <i class="fa fa-users"style="font-size:20px;float:right;"></i></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between ">
                                        <a class="small text-white stretched-link" href="loan_request.php"><b></b></a>
                                        <div class="  text-white"><b style="font-weight:900;">  <?php  echo $loader-> Subscriber(); ?>  </b></div>
										</div>
                                    </div>
                                </div> 
								
                            <div class="col-xl- col-md-2">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body" style=" "><span>Ticket </span> <i class="fa fa-tag"style="font-size:20px;float:right;"></i></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between ">
                                        <a class="small text-white stretched-link" href="loan_request.php"><b></b></a>
                                        <div class="  text-white"><b style="font-weight:900;"> <?php  echo $loader-> Ticket(); ?> </b></div>
										</div>
                                    </div>
                                </div> 
								
                        </div> 
                          
							
 

                
			        	

						
                   


<div class="card mb-4">
	<div class="card-header text-white">
	<div style="font-size:22px;"> <i class="fa fa-briefcase mr-1" ></i> CASHOUT PORTFOLIO  </div>
 
	</div>
<div class="card-body">
<div id="example_wrapper" class="table-responsive dataTables_wrapper dt-bootstrap4">
<div class="row">
<div class="col-sm-12">
<table tyle="width: 100%;overflow:auto;" id="SELF" class="table table-hover table-striped table-bordered tataTable dtr-inline" role="grid" aria-describedby="example_info">

 <thead>
                                            <tr>
											
												<th>
												Payment Status
												</th>

												<th>
												OTP Status
												</th>

												<th>
												Cashout ID
												</th>
												
												<th>
												Username
												</th>
												
												<th>
												Amount Cashout 
												</th>
												
												
												<th>
												Prev Bal
												</th>


												<th>
												Main Bal
												</th>


												<th>
												Bank Name
												</th>
                                                 
												<th>
												Account Name          
												</th>

												<th>
												Account No.         
												</th>


												<th>
												Payment officer         
												</th>

												<th>
												Cashout Date         
												</th>
											 
                                            </tr>
                                        </thead>
 
<tbody>

		   <?php
					
	 
			$query_data ="SELECT * FROM `cashout` WHERE `cashout`.`event_select` = 'self' ";
			$query_data_result=mysqli_query($homedb,$query_data);  
			while ($row = mysqli_fetch_array($query_data_result)){
				
				$cashout_amount  = number_format($row['cashout_amount'],2); 
				$current_bal     = number_format($row['current_bal'],2); 
				$left_bal        = number_format($row['left_bal'],2);  
				$account_no      = $row['account_no']; 
				$accountname     = $row['account_name']; 
				$bankname        = $row['bank_name']; 
				$payment_officer = $row['payment_officer']; 
				$cashout_status  = $row['cashout_status']; 
				$payment_status  = $row['payment_status'];  
				$cashout_code    = $row['cashout_code']; 
				$date_init       = $row['date_init'];  
				$username       = $row['username'];  
	


				  

				
				echo"
				<tr role='row' class='odd' >  
				<td  class='btn btn-warning'><a href='approve_cashout.php'>$payment_status</a> </td>	 
				<td>$cashout_status</td>
				<td>$cashout_code</td> 
				<td>$username</td> 
				<td style='font-size:15px;font-weight:700! important;color:green;'>₦$cashout_amount</td>
				<td style='font-size:15px;font-weight:700! important;color:#f00;'>₦$current_bal</td>
				<td style='font-size:15px;font-weight:700! important;color:green'>₦$left_bal</td>
				<td style='font-size:13px;font-weight:700! important;'>$bankname</td>
				<td style='font-size:13px;font-weight:700! important;'>$accountname</td>
				<td>$account_no </td> 
				<td>$payment_officer </td> 
				<td>$date_init </td> 
				</tr>
				";

 		}
			  ?>


 
</tbody>

</table>
</div>
</div>
</div>
</div>
</div>



<div class="card mb-4">
	<div class="card-header text-white">
	<div style="font-size:22px;"> <i class="fa fa-briefcase mr-1" ></i>PROXY  CASHOUT PORTFOLIO </div>
 
	</div>
<div class="card-body">
<div id="example_wrapper" class="table-responsive dataTables_wrapper dt-bootstrap4">
<div class="row">
<div class="col-sm-12">
<table tyle="width: 100%;overflow:auto;" id="PROXY" class="table table-hover table-striped table-bordered tataTable dtr-inline" role="grid" aria-describedby="example_info">

 <thead>
                                            <tr>
											
												<th>
												Payment Status
												</th>
												
												<th>
												Event ID
												</th>

												<th>
												OTP Status
												</th>

												<th>
												Cashout ID
												</th>
												
												<th>
												Username
												</th>
												
												<th>
												Amount Cashout 
												</th>
												
												
												<th>
												Prev Bal
												</th>


												<th>
												Main Bal
												</th>


												<th>
												Bank Name
												</th>
                                                 
												<th>
												Account Name          
												</th>

												<th>
												Account No.         
												</th>


												<th>
												Payment officer         
												</th>

												<th>
												Cashout Date         
												</th>
											 
                                            </tr>
                                        </thead>
 
<tbody>

		   <?php
					
	 
			$query_data ="SELECT * FROM `cashout` WHERE `cashout`.`event_select` = 'proxy' ";
			$query_data_result=mysqli_query($homedb,$query_data);  
			while ($row = mysqli_fetch_array($query_data_result)){
				
				$cashout_amount  = number_format($row['cashout_amount'],2); 
				$current_bal     = number_format($row['current_bal'],2); 
				$left_bal        = number_format($row['left_bal'],2);  
				$account_no      = $row['account_no']; 
				$accountname     = $row['account_name']; 
				$bankname        = $row['bank_name']; 
				$payment_officer = $row['payment_officer']; 
				$cashout_status  = $row['cashout_status']; 
				$payment_status  = $row['payment_status'];  
				$cashout_code    = $row['cashout_code']; 
				$date_init       = $row['date_init'];  
				$username       = $row['username'];  
				$event_id       = $row['event_id_cashout'];  
	


				  

				
				echo"
				<tr role='row' class='odd' >  
				<td  class='btn btn-warning'><a href='approve_cashout.php'>$payment_status</a> </td>	 
				<td>$event_id </td>	 
				<td>$cashout_status</td>
				<td>$cashout_code</td> 
				<td>$username</td> 
				<td style='font-size:15px;font-weight:700! important;color:green;'>₦$cashout_amount</td>
				<td style='font-size:15px;font-weight:700! important;color:#f00;'>₦$current_bal</td>
				<td style='font-size:15px;font-weight:700! important;color:green'>₦$left_bal</td>
				<td style='font-size:13px;font-weight:700! important;'>$bankname</td>
				<td style='font-size:13px;font-weight:700! important;'>$accountname</td>
				<td>$account_no </td> 
				<td>$payment_officer </td> 
				<td>$date_init </td> 
				</tr>
				";

 		}
			  ?>


 
</tbody>

</table>
</div>
</div>
</div>
</div>
</div>


<!--
<div class="card mb-4">
	<div class="card-header text-white">
	<div style="font-size:22px;"> <i class="fa fa-group mr-1" ></i> ALL  MEMBER  </div>
	<span class="btn btn-primary" style="font-size:16px;">Total MEMBER ( <?php echo $superlog -> member_invited()?> )</span>
	<span class="btn btn-success" style="font-size:16px;">ACTIVE MEMBER ( <?php echo $superlog -> active_member()?> )</span>
	<span class="btn btn-warning" style="font-size:16px;">PASSIVE MEMBER ( <?php echo $superlog -> passive_member()?> )</span>
	<span class="btn btn-danger"  style="font-size:16px;">PROSPECT MEMBER ( <?php echo $superlog -> prospect_member()?> )</span>



	</div>
<div class="card-body">
<div id="example_wrapper" class="table-responsive dataTables_wrapper dt-bootstrap4">
<div class="row">
<div class="col-sm-12">
<table tyle="width: 100%;overflow:auto;" id="investment" class="table table-hover table-striped table-bordered tataTable dtr-inline" role="grid" aria-describedby="example_info">

                                        <thead>
                                            <tr>
											
												<th>
												Member Status
												</th>
												
												<th>
												Referral code
												</th>
												
												<th>
												Membership code
												</th>
												
												<th>
												Email
												</th>
												
												
												<th>
												Names
												</th>


												<th>
												Gender
												</th>


												<th>
												Account Verify
												</th>
                                                 
												<th>
												Reg Date           
												</th>

												
												<th>
												Loan Status           
												</th>
												
												<th>
												ECard Code           
												</th>
												
												<th>
												ECard Pay Date           
												</th>
												
												<th>
												ECard Expires           
												</th>
												
												<th>
												Bank Name          
												</th>
												
												<th>
												Account Name          
												</th>
												
												<th>
												Account No          
												</th>
												
												<th>
												Last Login           
												</th>
											 
                                            </tr>
                                        </thead>
 
<tbody>

		   <?php
					
	 
			$investor ="SELECT * FROM `login_table` ORDER BY `id` DESC";
			$investor_result=mysqli_query($homedb, $investor);
			while ($row = mysqli_fetch_array($investor_result))
			{
				$refer_code            =  $row['refer_code'];
				$mem_code              =  $row['mem_code'];
				$username              =  $row['username'];
				$password              =  $row['password'];
				$photo                 =  $row['phone_no'];
				$firstname             =  $row['f_name'];
				$email_verify          =  $row['email_verify'];
				$surname               =  $row['s_name'];  
				$register_date         =  $row['register_date'];
				$home_address          =  $row['address'];
				$gender                =  $row['gender']; 
				$user_status           =  $row['user_status']; 
				$last_login            =  $row['last-login'];
				$loan_status           =  $row['loan_status']; 
				$payment_code          =  $row['payment_code'];
				$bank_name             =  $row['bank_name'];
				$account_name          =  $row['account_name'];
				$account_no            =  $row['account_no'];
				$last_login            =  $row['last-login'];
				$loan_status           =  $row['loan_status'];
				$email_verify          =  $row['email_verify'];
				$e_card_code           =  $row['e_card_code'];
				$e_card_pay_date       =  $row['e_card_pay_date'];
				$e_card_expire_day     =  $row['e_card_expire_day'];
				$account_rate          =  $row['account_rate'];
 
				

				
				echo"
				<tr role='row' class='odd' >";
				 
				if($user_status == 'PROSPECT')
				{
				echo"<td class='btn btn-danger'>$user_status</td>";
				}else if($user_status == 'PASSIVE'){

				 echo"<td class='btn btn-warning'>&nbsp; $user_status &nbsp;</td>";
				 
				}else if($user_status == 'ACTIVE'){ 
				 echo"<td class='btn btn-success'>&nbsp;&nbsp; $user_status &nbsp;&nbsp;</td>";
				}
				echo" 
				<td style='text-transform:uppercase;'>$refer_code </td>
				<td style='text-transform:uppercase;'>$mem_code </td>
				<td>$username</td>
				<td>$firstname $surname</td>
				<td>$gender</td>

				<td>$email_verify </td> 
				<td>$register_date </td> 
				<td>$loan_status </td> 
				<td>$e_card_code </td> 
				<td>$e_card_pay_date </td> 
				<td>$e_card_expire_day </td> 
				<td>$bank_name </td> 
				<td>$account_name </td> 
				<td>$account_no </td> 
				<td>$last_login </td> 
				</tr>";




					

					 
 
	 
			}
			
								
			  ?>


 
</tbody>

</table>
</div>
</div>
</div>
</div>
</div>
              
 -->                  
 
 



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

 </div>
      

 
	
   <script src="../home_js/scripts.js"></script>
 
    </body>
</html>

 
 <script  type="text/javascript" src="slick/jquery.min.js"></script>
<script  type="text/javascript"  src="slick/modernizr.js"></script>
<script  type="text/javascript"  src="slick/owl.carousel.min.js"></script>
<script  type="text/javascript"  src="slick/custom.js"></script>



<script type="text/javascript" src="../css/jquery.dataTables.min.js"></script>

 
<script type="text/javascript" src="../css/buttons.flash.min.js"></script>
<script type="text/javascript" src="../css/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../css/jszip.min.js"></script>
<script type="text/javascript" src="../css/pdfmake.min.js"></script>
<script type="text/javascript" src="../css/vfs_fonts.js"></script>
<script type="text/javascript" src="../css/buttons.html5.min.js"></script>
<script type="text/javascript" src="../css/buttons.print.min.js"></script>
<script src="css/canvasjs.min.js"></script>
 
<script type="text/javascript" src="../js_form/main.07a59de7b920cd76b874.js"></script> 


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
<script>
$(document).ready(function() {
    $("#button_log").click(function() {
        $(this).toggleClass('mymodal').toggleClass('btn-close');
    });


    $('#PROXY').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'        
        ]
    });
    $('#SELF').DataTable({
        dom: 'Bfrtip',
        buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print'     
        ]
    }); 

});
</script>