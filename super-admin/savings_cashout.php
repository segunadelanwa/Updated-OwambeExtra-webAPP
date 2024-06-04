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

//DISPLAY PHOTO TO PAGE CALL UP/////////////

	$query_photo ="SELECT * FROM `login-table` WHERE `login-table`.`username`='$username'";
	$query_photo_result=mysqli_query($homedb,$query_photo);
	while ($row = mysqli_fetch_array($query_photo_result)){
		$cornfirm=$row['photo']; 
	}


	$query_photo ="SELECT * FROM `savings` WHERE `savings`.`username`='$username'";
	$query_photo_result=mysqli_query($homedb,$query_photo);
	while ($row = mysqli_fetch_array($query_photo_result)){
		
		$saving_current_balance  =$row['current_balance']; 
		$savings_previous_balance =$row['previous_balance']; 
		$savings_available_bal =$row['available_bal']; 
	}
	
	
	$query_photo ="SELECT * FROM `wallet` WHERE `wallet`.`username`='$username'";
	$query_photo_result=mysqli_query($homedb,$query_photo);
	while ($row = mysqli_fetch_array($query_photo_result)){
		
		$wallet_current_balance  =$row['current_balance']; 
		$wallet_previous_balance =$row['previous_balance']; 
	}
  $cur_bal_placeholder         = $savings_available_bal;
  $sav_avai         =  number_format($savings_available_bal,2);
/////////////////////////////////VIEW PROFILE

$verify_code= MD5(rand(00001, 9999999)); 
$auth_code=rand(00001, 99999);
$sav_code="save-$auth_code";
$msg="Saving Cashout";
//////////////////////////////
$reg_start=date('Y-m-d');
$curr_time=date("H:i:s a");

if(isset($_POST["savings_cashout"]))
{ 

    $cur_bal         = $savings_available_bal; //half 
 	$amount          = htmlentities($_POST['amount']); 
	$new_saving_bal  = $cur_bal - $amount;
    $new_wallet_bal  = $wallet_current_balance + $amount;
	
 
if($amount > $cur_bal)
{
		$msg_success='
			 <center>
			  <img src="../img/notok.png" height="50" /><br>
             			  
			You are only allow  to cash out 50% of your savings<br><br>
			 </center>
			
			 ';
}
else
{


		$queryupdate=("UPDATE `wallet` SET
		`current_balance`  = '".mysqli_real_escape_string($homedb, $new_wallet_bal)."',
		`previous_balance`  = '".mysqli_real_escape_string($homedb, $wallet_current_balance)."',
		`date`             = '".mysqli_real_escape_string($homedb, $reg_start)."', 
		`time`             = '".mysqli_real_escape_string($homedb, $curr_time)."',
		`last_payment_otp` = '".mysqli_real_escape_string($homedb, $sav_code)."',
        `last_pay_status`  = '".mysqli_real_escape_string($homedb, $msg)."'  		
		WHERE `wallet`.`mem_code`='$mem_code'");
		mysqli_query($homedb, $queryupdate);

 

 
		$queryupdate=("UPDATE `savings` SET
		`previous_balance`  = '".mysqli_real_escape_string($homedb, $saving_current_balance)."',
		`date`             = '".mysqli_real_escape_string($homedb, $reg_start)."', 
		`time`             = '".mysqli_real_escape_string($homedb, $curr_time)."',
		`last_payment_otp` = '".mysqli_real_escape_string($homedb, $sav_code)."',
		`available_bal`    = '".mysqli_real_escape_string($homedb, $new_saving_bal)."',
        `last_pay_status`  = '".mysqli_real_escape_string($homedb, $msg)."'  		
		WHERE `savings`.`mem_code`='$mem_code'");
		mysqli_query($homedb, $queryupdate);
		
 



		$query_wallet_ref =("INSERT INTO `wallet_history` VALUE (
		'',
		'".mysqli_real_escape_string($homedb, $mem_code)."',									 
		'".mysqli_real_escape_string($homedb, $username)."',									 
		'".mysqli_real_escape_string($homedb, $new_wallet_bal)."',									 
		'".mysqli_real_escape_string($homedb, $wallet_current_balance)."',									 
		'".mysqli_real_escape_string($homedb, $wallet_previous_balance)."',
		'".mysqli_real_escape_string($homedb, $amount)."',
		'".mysqli_real_escape_string($homedb, $reg_start)."', 
		'".mysqli_real_escape_string($homedb, $curr_time)."',
		'".mysqli_real_escape_string($homedb, $sav_code)."',
		'".mysqli_real_escape_string($homedb, $msg)."'
		)");

		if(mysqli_query($homedb,$query_wallet_ref)) 
	   {

		$msg_success='
			 <center>
			  <img src="../img/ok.png" height="50" /><br>	
			You have successfully cashout to your wallet<br><br>
			
	 	 
				<a href="index.php" style="text-decoration:underline;"> Continue to Dashboard</a>
			 </center>
			
			 ';
	   

	   }
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
									<h3> SAVING ACCOUNT </h3>
									</div>
									
                                    <div class="card-footer d-flex align-items-center justify-content-between ">
										<ol class="breadcrumb mb-4">
										<li class="breadcrumb-item active" style="text-decoration:underline;"><i> <a href="index.php">Home</a>&nbsp; / &nbsp; Savings Cashout</i></li>
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
	<div align="center" style="font-size:20px;"><?php echo"Savings Main Bal: ₦".$Loader-> savings($username)." <br> Savings Avail Bal:₦$sav_avai";  ?></div>
 </div>

	<div class="card-body">
	<div class=" col-md-12 ">	
	
 <form  method="POST" Action="">

  <div class="form-group">

	<div class="form-row">

		   <div class="form-group col-md-8">
			   <label for="name">First Name</label>
			   <input type="text" id="first-name" name="first-name" class="form-control" value="<?php echo"$firstname";?>"  readonly>
		   </div>

		   <div class="form-group col-md-8">
			   <label for="mname">Last Name</label>
			   <input type="text"  id="last-name"  class="form-control"  name="last-name" value="<?php echo"$surname";?>"  readonly>
		   </div>
 
 
 
			  
 		  <label class="form-group col-md-8">Fund wallet</label>
			<div class="input-group col-md-8"> 
			
			
			  <span class="input-group-text">₦</span>
			  <input type="text" id="amount"  name="amount" value="" class="form-control col-md-5" placeholder="<?php echo$cur_bal_placeholder; ?>"required  >
			  <span class="input-group-text">.00</span>
			  
			</div>

		   <div class="form-group col-md-6"><br>
			   <label for="mname">Email Address</label>
			   <input type="text"  id="email-address"   class="form-control" name="email-address"  value="<?php echo"$username";?>" readonly>
		   </div>


 

	</div> 
 

  </div>

  <div class="form-submit">
 
	<input type="submit" name="savings_cashout"   value="Cashout to wallet " style="padding:10px;border-radius:5px;" class="btn btn-success"/>
 
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

 
<script type="text/javascript" src="../css/buttons.flash.min.js"></script>
<script type="text/javascript" src="../css/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../css/jszip.min.js"></script>
<script type="text/javascript" src="../css/pdfmake.min.js"></script>
<script type="text/javascript" src="../css/vfs_fonts.js"></script>
<script type="text/javascript" src="../css/buttons.html5.min.js"></script>
<script type="text/javascript" src="../css/buttons.print.min.js"></script>
<script src="../css/canvasjs.min.js"></script>
<script type="text/javascript" src="../js_form/main.07a59de7b920cd76b874.js"></script> 
