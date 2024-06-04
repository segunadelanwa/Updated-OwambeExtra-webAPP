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
									<i class="fa fa-money"style="color:red;font-size:30px;float:right;"></i><br>
									<h3> VIEW TICKET </h3>
									</div>
									
                                    <div class="card-footer d-flex align-items-center justify-content-between ">
										<ol class="breadcrumb mb-4">
										<li class="breadcrumb-item active" style="text-decoration:underline;"><i> <a href="index.php">Home</a>&nbsp; / &nbsp;ECARD </i></li>
										</ol>
                                        <div class="small text-white"><b>   </b></div>
                                    </div>
									
                                </div>
                            </div>
                        

					   </div>
						 </center>
 

 
 <?php
 
 
  
	$query_photo ="SELECT * FROM `ticket` WHERE `ticket`.`username`='$username'";
	$query_photo_result=mysqli_query($homedb,$query_photo);
	while ($row = mysqli_fetch_array($query_photo_result)){
		
		$ticket_id  =$row['ticket_id']; 
		$username =$row['username']; 
		$mem_code =$row['mem_code']; 
		$subject =$row['subject']; 
		$message =$row['message']; 
		$admin_name =$row['admin_name']; 
		$ticket_status =$row['ticket_status']; 
		$date =$row['date']; 

  
  
  
  echo'
  
  
 	<div class="container">

	                          
	<div class="card ">
	
		<div class="card-header">
		<div align="center" style="font-size:20px;">TICKET ID:'.$ticket_id.'<br>DATE:'.$date.' </div>
		</div>

		<div class="card-body">
			<div class="col-md-12">	
			
				 <div class="row">
				 <div class="btn btn-primary"><i class="fa fa-tag"></i>TICKET STATUS: '.$ticket_status.'  <i class="fa fa-check"></i></div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 <div class="btn btn-primary"><i class="fa fa-user"></i> ADMIN : '.$admin_name.'  <i class="fa fa-check"></i></div>
				 </div>
				 
				 
				 <div class="m-5">SUBJECT:<br> '.$subject.' </div>
				 <div class="m-5">MESSAGE:<br> '.$message.' </div>

		 
			</div>
		</div>

	</div>


							 

	</div><br>
   
  
  
  
  ';
 
 	} 
 ?>

                              
 
 			 
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