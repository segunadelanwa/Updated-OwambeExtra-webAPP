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
 <style>
 
 
 
 
 </style>
<body class="sb-nav-fixed">
<?php
$paymentstatus="";
$e_card_expire_day="";
require"header_connect.php"; 

if(empty($_SESSION['username']))
{
header("location: logout.php");
}

 
 
 
 $auth_code=rand(10000000, 999999999);
$ticket_id="#$auth_code";
$update_time = date('d M Y H:i:s', $time);
$ticket_status="OPEN";
$admin="BUSY";
$ip = $_SERVER['REMOTE_ADDR'];
 
		$query_photo ="SELECT * FROM `ticket` WHERE `ticket`.`username`='$username' AND `ticket_status` = 'OPEN'";
		$query_photo_result=mysqli_query($homedb,$query_photo);
		$query_num_row = mysqli_num_rows($query_photo_result);
 
 if(isset($_POST["submitform"]))
{ 
 
 
	$my_subject        = trim(htmlentities($_POST['my_subject'])); 
	$my_message       = htmlentities($_POST['my_message']);        
 
 
 
	 
    if($query_num_row >= 1){
		
						echo '<script> alert("Please you already have a ticket we are attending to.Thank you")</script> ';
						echo '<script> window.location ="index.php" </script>';
			 
	}else{
					$data ="INSERT INTO `ticket` VALUES(
					'',
					'".mysqli_real_escape_string($homedb, $ticket_id)."',									 
					'".mysqli_real_escape_string($homedb, $username)."',									 
					'".mysqli_real_escape_string($homedb, $mem_code)."',									 
					'".mysqli_real_escape_string($homedb, $refer_code)."',							 
					'".mysqli_real_escape_string($homedb, $my_subject)."',						 
					'".mysqli_real_escape_string($homedb, $my_message)."',		
					'".mysqli_real_escape_string($homedb, $admin)."',
					'".mysqli_real_escape_string($homedb, $ticket_status)."',
					'".mysqli_real_escape_string($homedb, $update_time)."',
					'".mysqli_real_escape_string($homedb, $ip)."' 
					)";
					 mysqli_query($homedb, $data);
					   
		 
					   
					   
					   
						$mail->setFrom('noreply@ajoonline.com', $ticket_id);
						$mail->addAddress("$username");  
						$mail->isHTML(true);                                  // Set email format to HTML
						$mail->Subject = $my_subject;
						$mail->Body    = $my_message; 

						$mail->send(); 
						
						echo '<script> alert("Ticket has been submitted ")</script> ';
						echo '<script> window.location ="view_ticket.php" </script>';	
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




 

                    <div lass="container-fluid">
                        <h2 class="mt-3" style="text-transform: ;">
 
						</h2>
					   <div lass="row">
						
                            <div class=" col-md-12">
                                <div class="card bg-light text-dark mb-4">
								
                                    <div class="card-body"> 
									<i class="fa fa-mail-forward"style="color:red;font-size:30px;float:right;"></i><br>
									<h3>OPEN TICKET </h3>
									</div>
									
                                    <div class="card-footer d-flex align-items-center justify-content-between ">
										<ol class="breadcrumb mb-4">
										<li class="breadcrumb-item active" style="text-decoration:underline;"><i> <a href="index.php">Home</a>&nbsp; / &nbsp;Ticket </i></li>
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
		<div align="center" style="font-size:20px;">SEND COMPLAINS / REPORT   <i class="fa fa-mail-forward"style="color:red;font-size:30px;float:right;"></i> </div>
		</div>

	<div class="card-body">
	<div class=" col-md-12">	
	
 


 
<div >
	
<form  action="" method="POST"  >
		  
<div class="form-row">
	 
  <div class="form-group col-md-8 " >
	   <label>My email </label>
	   <input type="text" class="form-control" value="<?php echo$username; ?>" name="my_email" placeholder=""  readonly>
	   
   </div>


   <div class="form-group col-md-8 " >
	   <label>My Membership Code </label>
	   <input type="text" class="form-control" value="<?php echo$mem_code; ?>" name="my_memcode" placeholder=""  readonly>
	   
   </div>
   

   <div class="form-group col-md-8 " >
	   <label>Subject </label>
	   <input type="text" class="form-control" value="" name="my_subject" placeholder="Complain / Report title"   >
	   
   </div>



   <div class="form-group col-md-8 " >
	   <label>Compain/Report Box </label>
	   <textarea class="form-control"  rows="10" name="my_message" placeholder="Enter message here"></textarea>
	   
   </div>



   <div class="form-group col-md-8 " >
			
	<button type="submit" id="oxford-btn" name="submitform" class="btn btn-success col-md-12"style="font-size:16px;color:white;border-radius:5px;">Send Message</button>

   </div>
					 
</div>









</form>
	
	

</div>	
	
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