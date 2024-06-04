 <?php

require"header_connect.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="RSB GROUP MORTGAGE">
    <meta name="author" content="RSB GROUP MORTGAGE">
    <meta name="keywords" content="RSB GROUP MORTGAGE">

	<!-- Title Page-->
	<title>RSB GROUP MORTGAGE    </title>
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
 
require"load_function/head_loader.php";
 
/////////////////////////////////VIEW PROFILE
 
/////////////////////////////////UPDATING PHOTO TO DASHBOARD
 if($user_status == "ACTIVE")
 {
	header("Location:  index.php");
 }

	if(isset($_POST["cart_submit"]))
	{ 
 
$rands=rand(00001, 10000000);
$invoice_no="OXBB$rands"; 

//////////////////////////CHECKING IF THE SCRIPT HAS NOT GENERATED DOUBLE INVOICE  
$query_invoice_no ="SELECT * FROM `buidbay_customer` WHERE `invoice_no`='$invoice_no'";
$query_invoice=mysqli_query($homedb,$query_invoice_no); 
$query_num_invoice = mysqli_num_rows($query_invoice);
/////////////////////////////////////////////////////////////////////////////////////////////////////	   
 
            $zero=0;
		 	$daily_payment = htmlentities($_POST['daily_payment']);
			$total_payment = htmlentities($_POST['total_payment']);
			$total_days    = htmlentities($_POST['total_days']);
			$item_name     = htmlentities($_POST['item_name']);
		    $end_date      = date('Y-m-d', strtotime("+ $total_days days"));
		    $pay_date      = date('Y-m-d');
 
		if($query_num_invoice < 1) // This line will check if invoive already exist
		{

				$query_insert =("INSERT INTO `buidbay_customer` VALUE (
				'',
				'".mysqli_real_escape_string($homedb, $invoice_no)."',
				'".mysqli_real_escape_string($homedb, $firstname)."',
				'".mysqli_real_escape_string($homedb, $surname)."',
				'".mysqli_real_escape_string($homedb, $username)."',
				'".mysqli_real_escape_string($homedb, $phone_number)."',
				'".mysqli_real_escape_string($homedb, $daily_payment)."',
				'".mysqli_real_escape_string($homedb, $total_payment)."',
				'".mysqli_real_escape_string($homedb, $zero)."',
				'".mysqli_real_escape_string($homedb, $total_days)."',
				'".mysqli_real_escape_string($homedb, $current_date)."',
				'".mysqli_real_escape_string($homedb, $end_date)."',
				'".mysqli_real_escape_string($homedb, $zero)."',
				'".mysqli_real_escape_string($homedb, $pay_date)."',
				'".mysqli_real_escape_string($homedb, $item_name)."',
				'".mysqli_real_escape_string($homedb, $marketer_staff_id)."',
				'".mysqli_real_escape_string($homedb, $subsidiary_code)."',
				'".mysqli_real_escape_string($homedb, 'Card Payment')."'
				)");

				if(mysqli_query($homedb,$query_insert))
				{
					$msg_remove="You have subscribed to <b>$item_name</b>  proceed To payment below";
					 
				}

		}
		else
		{
			
			header("Location:    buildbay.php?msg_remove=Please kindly try again network error");
		}


 unset($_SESSION["buildbay_cart"]);
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
					if(!empty($msg_remove)) 
					{
									 
					echo'
								
									<div class="alert alert-warning alert-dismissible fade show" role="alert">
									<strong>Notification!</strong> '.$msg_remove.'
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
									</div>
					';
					}
					?>




 
 

                    <div class="container-fluid">
                    
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active" style="text-decoration:underline;"><i> <a href="index.php">Home</a>&nbsp; / eCard Payment</i></li>
                        </ol>
						
                       <center>
					   <div class="row">
						
                            <div class=" col-md-12">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body" style=" "> <i class="fa fa-money"style="font-size:30px;float:right;"></i><br><h3>ECARD PAYMENT/RENEWAL GATEWAY</h3></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between ">
                                        <a class="small text-white stretched-link" href="#"> <i class="fa fa-google-wallet mr-1"></i>eCard Payment/Renewal Payment    </a>
                                        <div class="small text-white"><b>   </b></div>
                                    </div>
                                </div>
                            </div>
                        

					   </div>
						 </center>
 <div class="row">
 <!--
    <div class="card col-md-6">
                            <div class="card-header" align="center">
                              
                             <i class="fa fa-money"style="font-size:;"></i>
							 BANK TRANSFER
                            </div>
                            <div class="card-body">
 <b> 					
 <p>RFERERSELLBLOG</p>
 
ACCESS DIAMOND : <span style="color:red;">0101877489</span>
  <br>
</b>
 
						
							</div>
						</div>

 
-->
 <div class="card col-md-6">
                            <div class="card-header" align="center">
                              
                             <i class="fa fa-credit-card"style="font-size:;"></i>
							 CARD PAYMENT
                            </div>
                            <div class="card-body">
						
 
<?php

$mail  = new PHPMailer();

$unique=rand(001, 100000000000);
$unique_id="AJO_$unique"; 
$time = date('h:i:s a' , time());
$date = date('Y-m-d');


 		
 ?>
 
			
 

 <form id="paymentForm" method="POST" Action="">

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
 
 
 
			  
 		  <label class="form-group col-md-8">eCard monthly fixed Amount</label>
			<div class="input-group col-md-8"> 
			
			
			  <span class="input-group-text">₦</span>
			  <input type="text" id="amount"  name="amount" value="2000" class="form-control col-md-5" placeholder="amount to fund"required readonly>
			  <span class="input-group-text">.00</span>
			  
			</div>

		   <div class="form-group col-md-6"><br>
			   <label for="mname">Email Address</label>
			   <input type="text"  id="email-address"   class="form-control" name="email-address"  value="<?php echo"$username";?>" readonly>
		   </div>



		   <div class="form-group col-md-6">
			  
			   <input type="hidden"  value="<?php echo"$unique_id";?>"   class="form-control" name="id" id="id" required>
		   </div>

	</div> 
 

  </div>

  <div class="form-submit">
 

    <center> <input type="submit" name="payment_gateway"onclick="payWithPaystack()" value="MAKE PAYMENT" style="padding:10px;border-radius:5px;" class="btn btn-success"/></center>	
	

 </div>

</form><br><br>



<?php
 

	if(isset($_POST["payment_gateway"]))
	{ 
 
 
			$uni_id = htmlentities($_POST['id']);

		$queryupdate=("UPDATE `wallet` SET
		`last_payment_otp`  = '".mysqli_real_escape_string($homedb, $uni_id)."',
		`date`             = '".mysqli_real_escape_string($homedb, $date)."', 
		`time`             = '".mysqli_real_escape_string($homedb, $time)."', 
		`last_pay_status`  = '".mysqli_real_escape_string($homedb, 'Pending')."'  
		WHERE `wallet`.`username`='$username'");
		mysqli_query($homedb, $queryupdate);

	}			
 ?>
						
							</div>
						</div>

 </div>
 
				  </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
						<?php
						include("../footer.php");
						?>
                            <div>
                                 
                              
                            </div>
                        </div>
                    </div>
                </footer>
            </div>

 </div>
      
 

	  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="home_js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
 <script src="https://js.paystack.co/v1/inline.js"></script> 		
<script>
const paymentForm = document.getElementById('paymentForm');

paymentForm.addEventListener("submit", payWithPaystack, false);

function payWithPaystack(e) {

  e.preventDefault();

  let handler = PaystackPop.setup({

    key: 'pk_test_e71cc81bac23486cee2d272af354ef96f79ba336', //*******************This  public key will be Replace with your Oxford Public key*********************

    email: document.getElementById("email-address").value,
    amount: document.getElementById("amount").value * 100,
    firstname: document.getElementById("first-name").value,
    lastname: document.getElementById("last-name").value ,
    ref: document.getElementById("id").value,

 

    onClose: function(){
		
      alert('Transaction Cancel.');		
      window.location = "../member_login/wallet_fund_verify.php?transaction=call" ;//****************THIS DOMAIN NAME WILL BE CHANGE********************
      
   },

    callback: function(response){

      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);
     window.location ="../member_login/wallet_fund_verify.php?reference="+ response.reference; 
     

    }

  });

  handler.openIframe();

}

</script> 

    </body>
</html>
 
 
 