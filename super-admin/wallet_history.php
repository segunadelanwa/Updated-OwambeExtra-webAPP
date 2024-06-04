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
	<title>RSB GROUP HISTORY    </title>
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
 
<style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
	*{
		font-weight: 100 !important;
		font-family: 'Poppins', sans-serif;
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


</style>
</head>

<body class="sb-nav-fixed">
 


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
                 
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active" style="text-decoration:underline;"><i> <a href="index.php">Home</a>&nbsp; / History</i></li>
                        </ol>
                       <center>
					   <div class="row">
						
                            <div class=" col-md-12">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body" style=" "> <i class="fa fa-money"style="font-size:30px;float:right;"></i><br>
									<h3> 
									TOT WALLET BAL:<?php echo "₦".$superlog-> wallet(); ?> </h3>
									</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between ">
                                        <a class="small text-white stretched-link" href="#"></a>
                                        <div class="small text-white"><b> <?php echo"$";?> </b></div>
                                    </div>
                                </div>
                            </div>
                        

					   </div>
						 </center>
 
						
 					
						
						
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fa fa-history mr-1"></i>
                             Transactions  History
                            </div>
                            <div class="card-body">
								<div id="example_wrapper" class="table-responsive dataTables_wrapper dt-bootstrap4">
								<div class="row">
								<div class="col-sm-12">
								<table tyle="width: 100%;overflow:auto;" id="investment" class="table table-hover table-striped table-bordered tataTable dtr-inline" role="grid" aria-describedby="example_info">
								  <thead>
                                            <tr>
												<th>
												 ID
												</th>
												
												<th>
												 STATUS
												</th>
												
												<th>
												USERNAME
												</th>

												<th>
												AMOUNT1
												</th>
												<th>
												AMOUNT2
												</th>
												<th>
												AMOUNT3
												</th>

												<th>
												 FUND  
												</th>
												
												<th>
												DATE
												</th>

												<th>
												TIME
												</th>
												
												
                                            </tr>
                                        </thead>
 
                                        <tbody>
     
          
                                                                        
									   <?php
												
								 
										$wallet_query ="SELECT * FROM `wallet_history` ORDER BY `id` DESC";
										$investor_result=mysqli_query($homedb, $wallet_query);
										while ($row = mysqli_fetch_array($investor_result))
										{
											$last_payment_otp   =$row['last_payment_otp'];
											$user_name          =$row['username']; 
											$date               =$row['date']; 
											$time               =$row['time']; 
											$main_balance       =number_format($row['main_balance'],2); 
											$current_balance    =number_format($row['current_balance'],2); 
											$previous_balance   =number_format($row['previous_balance'],2); 
											$current_amt_paid   =number_format($row['current_amt_paid'],2); 
							                $last_pay_status     =$row['last_pay_status']; 
								 
											echo"<tr role='row' class='odd' >
											<td>$last_payment_otp </td>
											<td class='btn btn-success'>$last_pay_status </td> 
											<td>$user_name </td>
											<td>₦$main_balance </td>
											<td>₦$current_balance </td>
											<td>₦$previous_balance </td>
											<td>₦$current_amt_paid </td>
											<td>$date </td>
											<td>$time</td>
											
 											
											
										 
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
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Oxford International Group 2020</div>
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


    $('#investment').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf'   
        ]
    });
    $('#buildbay').DataTable({
        dom: 'Bfrtip',
        buttons: [
               
        ]
    });
    $('#property').DataTable({
        dom: 'Bfrtip',
        buttons: [
        'csv', 'excel', 'pdf' 
        ]
    });

    $('#mortgage').DataTable({
        dom: 'Bfrtip',
        buttons: [
             
        ]
    });

});
</script>