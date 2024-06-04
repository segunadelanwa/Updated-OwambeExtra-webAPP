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

//DISPLAY PHOTO TO PAGE CALL UP/////////////

	$query_photo ="SELECT * FROM `cashout` WHERE `cashout`.`username`='$username'";
	$query_photo_result=mysqli_query($homedb,$query_photo);
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
$loan_code="loan_$cash_code";
$approval_status="";
$status="loan";
 


//////////////////////////////
$loan_start_date=date('Y-m-d');
$curr_time=date("H:i:s a");
$loan_end_date  = date('d-m-Y', strtotime('+5 days'));

	$query_photo ="SELECT * FROM `savings` WHERE `savings`.`username`='$username'";
	$query_photo_result=mysqli_query($homedb,$query_photo);
	while ($row = mysqli_fetch_array($query_photo_result)){
		
		$current_bal  =$row['current_balance']; 
		$wallet_previous_balance =$row['previous_balance']; 
	} 
  
  $query_photo ="SELECT * FROM `loan_request` WHERE `loan_request`.`username`='$username'";
	$query_photo_result=mysqli_query($homedb,$query_photo);
	while ($row = mysqli_fetch_array($query_photo_result)){
		
		$approval_status  =$row['approve_status'];  
	} 
  


if(isset($_POST["submit_loan"]))
{ 
    $approval="Group Head Approval Needed";
    $admin="Admin Approval Needed";


 
	$savings_deduction = htmlentities($_POST['savings_deduction']); 
	$loan_amount       = htmlentities($_POST['loan_amount']); 
	$proccess_loan     = htmlentities($_POST['proccess_loan']);        
 
 
if(!empty($proccess_loan)){
	 
    if($approval_status == $approval){
		
						echo '<script> alert("Please you already have an outstanding loan sent to  GROUP Head for approval")</script> ';
						echo '<script> window.location ="index.php" </script>';
			 
	}else if($approval_status == $admin){
		
						echo '<script> alert("You have an outstanding loan under Admin verification. Thank you")</script> ';
						echo '<script> window.location ="index.php" </script>';
			 
	}else{
					$data ="INSERT INTO `loan_request` VALUES(
					'',
					'".mysqli_real_escape_string($homedb, $loan_code)."',									 
					'".mysqli_real_escape_string($homedb, $mem_code)."',									 
					'".mysqli_real_escape_string($homedb, $username)."',									 
					'".mysqli_real_escape_string($homedb, $current_bal)."',							 
					'".mysqli_real_escape_string($homedb, $savings_deduction)."',						 
					'".mysqli_real_escape_string($homedb, $proccess_loan)."',		
					'".mysqli_real_escape_string($homedb, '')."',
					'".mysqli_real_escape_string($homedb, '')."',
					'".mysqli_real_escape_string($homedb, $refer_code)."',
					'".mysqli_real_escape_string($homedb, $approval)."',
					'".mysqli_real_escape_string($homedb, '')."',
					'".mysqli_real_escape_string($homedb, '')."',
					'".mysqli_real_escape_string($homedb, $mem_ip)."',
					'".mysqli_real_escape_string($homedb, '')."',
					'".mysqli_real_escape_string($homedb, '')."',
					'".mysqli_real_escape_string($homedb, '')."',
					'".mysqli_real_escape_string($homedb, '')."' 
					)";
					 
					
					if(mysqli_query($homedb, $data)) 
					{
					   
					   
					$query_wallet_ref ="INSERT INTO `wallet_history` VALUE (
					'',
					'".mysqli_real_escape_string($homedb, $refer_code)."',									 
					'".mysqli_real_escape_string($homedb, $username)."',									 
					'".mysqli_real_escape_string($homedb, $loan_amount)."',									 
					'".mysqli_real_escape_string($homedb, $proccess_loan)."',									 
					'".mysqli_real_escape_string($homedb, $savings_deduction)."',
					'".mysqli_real_escape_string($homedb, '')."',
					'".mysqli_real_escape_string($homedb, $loan_start_date)."', 
					'".mysqli_real_escape_string($homedb, $curr_time)."',
					'".mysqli_real_escape_string($homedb, $loan_code)."',
					'".mysqli_real_escape_string($homedb, $status)."'
					)";

					mysqli_query($homedb,$query_wallet_ref); 
					   
					   
					   
						$mail->setFrom('noreply@ajoonline.com', 'LOAN REQUEST');
						$mail->addAddress("$username");  
						$mail->isHTML(true);                                  // Set email format to HTML
						$mail->Subject = 'LOAN APPROVER SENT TO GROUP HEAD (GH)';
						$mail->Body    = "
						<div style='border:1px solid #777777;font-size:13px;;'>
						<center> <img src=\"cid:logo\"  style='text-align:center;height:100px;'/></center><br>
						<center><h2>RSB AJO ONLINE</h2></center>  <br><br>

						<p><span style='text-transform:capitalize;'> Dear $surname $firstname,</span><br><br>
						 
                        We want to let you know that your loan has been sent to your GROUP HEAD for approval.<br>
						Thanks.<br><br>
                          
						 </p> 
			 

						<span style='font-size:15px;text-align:center;'>RSB AJO ONLINE  <span><br>
						<div style='width:100%;height:5px;background: linear-gradient(to left, #e81212, #1A330C, gold)'></div><br><br> </div>

						";
						$mail->AddEmbeddedImage('assets/images/logo.png', 'logo', 'assets/images/logo.png'); 

						$mail->send(); 
						
						echo '<script> alert("Your loan has been sent to your Group Head (GH) for approval")</script> ';
						echo '<script> window.location ="index.php" </script>';	
					}
 
           }

}else{
	
echo '<script> alert("Please select your loan prefrence")</script> ';
echo '<script> window.location ="loan_request.php" </script>';

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
									<h3> LOAN REQUEST </h3>
									</div>
									
                                    <div class="card-footer d-flex align-items-center justify-content-between ">
										<ol class="breadcrumb mb-4">
										<li class="breadcrumb-item active" style="text-decoration:underline;"><i> <a href="index.php">Home</a>&nbsp; / &nbsp;Loan </i></li>
										</ol>
                                        <div class="small text-white"><b>   </b></div>
                                    </div>
									
                                </div>
                            </div>
                        

					   </div>
						 </center>
 

 
 

	<div class="container">

	                          
	<div class="card ">
	
		<div class="card-header">
		<div align="center" style="font-size:20px;"><?php echo"Savings Bal: ₦".$Loader-> savings($username) ?></div>
		</div>

	<div class="card-body">
	<div class=" col-md-12">	
	
 <form action="" method="POST"  >

   
		  
			   <label for="mname">Your wallet will be credited once your loan request is approved</label>
  
 
 

 		<div class="form-group col-md-5"> 
			<label ><b>Select Loan Amount</b></label>
			
			<select name="loan_amount"   class="form-control"  id="oxf" required="required" >
			<option data-value="">SELECT AMOUNT</option>
			<option data-value="5000">₦5,000.00  </option>
			<option data-value="15000">₦15,000.00  </option>
			<option data-value="30000">₦30,000.00  </option>
			<option data-value="40000">₦40,000.00  </option>
			<option data-value="50000">₦50,000.00  </option>
			<option data-value="100000">₦100,000.00  </option>
			
			</select>			  
			</div>


		<div class="form-group">

		<b>Savings Deduction  </b><br>
			<div class="input-group col-md-5"> 
			
			  <span class="input-group-text">₦</span>
			  <input type="integer"   value="" id="deductCASH" name="savings_deduction"   class="form-control"  readonly/>  
		      <span class="input-group-text">.00</span>
			  
		</div>
		</div><hr>


		<div class="form-group">

		<b>Proccess Loan</b><br>
			<div class="input-group col-md-5"> 
			
			  <span class="input-group-text">₦</span>
			  <input type="integer"   value="" id="managFee" name="proccess_loan"   class="form-control"  readonly/>  
		      <span class="input-group-text">.00</span>
			  
		</div>
		</div><hr>

 
  

  <div class="form-submit">
 	<input type="submit" name="submit_loan"   value="Proccess Loan" style="padding:10px;border-radius:5px;" class="btn btn-success"/>
 </div>
 
 
 <label style="color:#f00;">NOTE: <br>
To bona-fide member for easy loan approval you must have a minimum balance of N2,500.00 from your savings account<br>
Your group head (GH) or inviter will approve your load request before loan can be <br>

 </label>

</form>

<br><br>
	
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
	var roiget='20';
	var getamnt='';
	var result='';


$('#oxf').on('change',function(){ 
	var getValue=$(this).find('option:selected')
	loanValue=parseInt(getValue.data('value')); 

	//console.log(roiget);
 

//var latestroi =parseInt($('#amountivest').val())/100*roiget
getamnt = result.replace(/,/g, "")
$('#loadCASH').val(getamnt);


	
	
console.log(getamnt)
calculate()
console.log(calculate())

	
 
});



function calculate(){
		var a= parseFloat(loanValue); 
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
		 
        //mang_fee = ((perc/100) * 7.5); 
		  $('#deductCASH').val(perc);
		  
		  
	    mFee =(perc + mang_fee); 	
	    tmFee =(a - mFee); 	
	    dCASH= (a + mFee);
	
      
        $('#managFee').val(tmFee);
	 
 
			
 
		$('#currentROI').val(mFee); 
    }

})
</script>