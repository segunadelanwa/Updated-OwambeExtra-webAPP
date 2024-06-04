<!DOCTYPE html>
<html lang="en">
    <head>
<?php
require"header_meta.php";
?>
 </head>
<body class="sb-nav-fixed">
<?php
require"header_connect.php"; 
  
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
									<h3> PAID CASHOUT </h3>
									</div>
									
                                    <div class="card-footer d-flex align-items-center justify-content-between ">
										<ol class="breadcrumb mb-4">
										<li class="breadcrumb-item active" style="text-decoration:underline;"><i> <a href="index.php">Home</a>&nbsp; / &nbsp;Paid Cashout </i></li>
										</ol>
                                        <div class="small text-white"><b>   </b></div>
                                    </div>
									
                                </div>
                            </div>
                        

					   </div>
				
				 
 

 

 
 
<div class="card mb-4">
	<div class="card-header text-white">
	<div style="font-size:22px;"> <i class="fa fa-briefcase mr-1" ></i>PAID CASHOUT PORTFOLIO </div>
 
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
					
	 
			$query_data ="SELECT * FROM `cashout` WHERE `cashout`.`payment_status` = 'Admin_Paid' ";
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
				<td  class='btn btn-success'>$payment_status </td>	 
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

 

<script>
$(document).ready(function() {
    $("#button_log").click(function() {
        $(this).toggleClass('mymodal').toggleClass('btn-close');
    });


    $('#approved_loan').DataTable({
        dom: 'Bfrtip',
        buttons: [
              
        ]
    });
    $('#admin_approved_loan').DataTable({
        dom: 'Bfrtip',
        buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print'     
        ]
    });
    $('#loan').DataTable({
        dom: 'Bfrtip',
        buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print'     
        ]
    });

    $('#grop_h_approved_loan').DataTable({
        dom: 'Bfrtip',
        buttons: [
             
        ]
    });

});
</script>