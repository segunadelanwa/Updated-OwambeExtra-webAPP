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




if(isset($_POST["update_password"]))
{ 

 
	$passd1     = htmlentities(MD5($_POST['pws1']));
	$passd2     = htmlentities(MD5($_POST['pws2'])); 

	if($passd1 === $passd2)
	{
		$queryupdate=("UPDATE `login-table` SET 
		`password` = '".mysqli_real_escape_string($homedb,$passd1)."'
		WHERE `login-table`.`username` ='$username'");
		 mysqli_query($homedb, $queryupdate);
		 
			
			echo'<script>alert("You have successfully change your password. Login with your new password now")</script>';
			echo '<script> window.location ="logout.php" </script>';	
		 
	}
	else
	{
		 echo'<script>alert("Your password did not match please try again")</script>';
		 
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
									<i class="fa fa-lock"style="color:red;font-size:30px;float:right;"></i><br>
									<h3> PASSWORD UPDATE </h3>
									</div>
									
                                    <div class="card-footer d-flex align-items-center justify-content-between ">
										<ol class="breadcrumb mb-4">
										<li class="breadcrumb-item active" style="text-decoration:underline;"><i> <a href="index.php">Home</a>&nbsp; / &nbsp; Password Update</i></li>
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
  <div align="center" style="font-size:20px;color:white;">CHANGE PASSWORD</div>
 </div>

	<div class="card-body">
	<div class=" col-md-12 ">	
	
 <form  method="POST" action="">

  <div class="form-group">

	<div class="form-row">

 
  <label for="mname">Changing your password now will make you loose your old password</label>
 
			  
		  
			<div class="form-group col-md-8"> 
			  <label class="form-group col-md-8"><b>Enter new password</b></label>
			  <input type="password" id="" name="pws1"   value="" class="form-control col-md-5" required  >  
			</div>


			<div class="form-group col-md-8"> 
			  <label class="form-group col-md-8"><b>Confirm new password</b></label>
			  <input type="password" id="" name="pws2"   value="" class="form-control col-md-5" required  >  
			</div>



 

	</div> 
 


  </div>

  <div class="form-submit">
 
	<input type="submit" name="update_password"   value="Chaange Password" style="padding:10px;border-radius:5px;" class="btn btn-success"/>
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