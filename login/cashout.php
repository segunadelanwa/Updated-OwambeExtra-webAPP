<!DOCTYPE html>
<html lang="en">

<head>
   <title>Owambe Extra Dashboard</title>

<?php
 
include"index_header.php";
include"head_loader.php";
$loader = new Loader;
?>


</head>
 
<body class="sidebar-mini fixed">
   <div class="loader-bg">
      <div class="loader-bar">
      </div>
   </div>
   <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header-top hidden-print">
      <?php
        include"headernav.php";
      ?>
      </header>
      <!-- Side-Nav-->
      <div>

		<?php
	       include"sidebar.php";
		?>

     </div>


      <div class="content-wrapper">
         <!-- Container-fluid starts -->
         <!-- Main content starts -->
         <div class="container-fluid">
            <div class="row">
               <div class="main-header">
                  <h4> Cashout Page</h4>
                
				<div> 
                   <em>
				 
				 <a href="index.php" style="color:#777777 !important;"> Home </a> / <a href="#">Cashout Page</a>
				  
				 </em>
               </div>

               </div>



            </div>
 
 



            <!-- 2-1 block start -->
            <div class="row">

               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-block">
                        <div class="table-responsive">
                      

 <div class="col-md-12">
			 

				<div class="card-header text-success" styl="background:#c908bd! important;">
				<center><h4> CASHOUT  <i style="font-size:20px;" class="fa fa-money"></i>  </h4></center>
				</div>

			<div class="card-body">
			
             <div>


 				
 
<div class="card mb-4">

   <div class="card-header">
<i class="fa fa-briefcase mr-1"></i>
<b>   CASHOUT  </b>


</div>
 

	<div class="card-body">

			<div class="table-responsive" >
				<table  id="gift_table" class="table table-hover table-striped table-bordered tataTable dtr-inline"role="grid" aria-describedby="example_info">


									<thead>
										   <th>
										  Cashout ID
										   </th>
										   
										   
										   <th>
										  Cashout Amount
										  </th>	


										  <th>
										  Current Bal 
										  </th>										   
										   
										   <th>
										  Previous Bal 
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
											Cashout Status
										  </th>

										  
										   <th>
										   Payment Status
										   </th>

										   <th>
										   Date 
										   </th>
							 
						 
										   
						 
									</thead>

									 
									   
<?php
@$eventID = $_GET['event'];
$result = $loader->CashoutID($username);
 
foreach($result  as $row){ 
$cashoutamount = number_format($row['cashout_amount'],2);
$currentbal = number_format($row['current_bal'],2);
$leftbal = number_format($row['left_bal'],2);
//cashout_otp.php?code=cash_1630768045
if($row['cashout_status'] == 'OTP Required')
{
echo'	 

	 <tr role="row" class="odd">
	   
		<td tabindex="0" class="sorting_1">
		<a href="cashout_otp.php?code='.$row['cashout_code'].'" class="btn btn-danger">
        Enter OTP
		</a>
		</td>
		
		<td>₦'.$cashoutamount.'</td>
		<td>₦'.$currentbal.'</td>
		<td>₦'.$leftbal.'</td>
		<td>'.$row['bank_name'].'</td>
		<td>'.$row['account_name'].'</td>
		<td>'.$row['account_no'].'</td>
		<td>'.$row['cashout_status'].'</td>
		<td>'.$row['payment_status'].'</td>
		<td>'.$row['date_init'].'</td>
 
	</tr> 
	
';
}
elseif($row['cashout_status'] == 'OTP_Success' AND $row['payment_status'] == 'Admin_Processing')
{
	echo'	 

	 <tr role="row" class="odd">
		<td tabindex="0" class="sorting_1 btn btn-info">
		  
		  '.$row['cashout_code'].'
		 
		</td>
		<td>₦'.$cashoutamount.'</td>
		<td>₦'.$currentbal.'</td>
		<td>₦'.$leftbal.'</td>
		<td>'.$row['bank_name'].'</td>
		<td>'.$row['account_name'].'</td>
		<td>'.$row['account_no'].'</td>
		<td>'.$row['cashout_status'].'</td>
		<td>'.$row['payment_status'].'</td>
		<td>'.$row['date_init'].'</td>
 
	</tr> 
	';
}
elseif($row['cashout_status'] == 'OTP_Success' AND $row['payment_status'] == 'Admin_Paid')
{
	echo'	 

	 <tr role="row" class="odd">
		<td tabindex="0" class="sorting_1 btn btn-success">
		  
		  '.$row['cashout_code'].'
		 
		</td>
		<td>₦'.$cashoutamount.'</td>
		<td>₦'.$currentbal.'</td>
		<td>₦'.$leftbal.'</td>
		<td>'.$row['bank_name'].'</td>
		<td>'.$row['account_name'].'</td>
		<td>'.$row['account_no'].'</td>
		<td>'.$row['cashout_status'].'</td>
		<td>'.$row['payment_status'].'</td>
		<td>'.$row['date_init'].'</td>
 
	</tr> 
	
';
	
}


}
?>							
				</table>

			</div>
	
	</div>


 
 </div>

 			 
             </div>			

           </div>
      		 
    </div>



                        </div>
                     </div>
                  </div>
               </div>
          
             </div>
            <!-- 2-1 block end -->
         </div>
    
      </div>
   </div>




<?php

include"bodyScript.php";
?>


<script>
var $window = $(window);
var nav = $('.fixed-button');
$window.scroll(function(){
    if ($window.scrollTop() >= 200) {
       nav.addClass('active');
    }
    else {
       nav.removeClass('active');
    }
});
</script>

</body>

</html>
  
<script type="text/javascript" src="../css/buttons.flash.min.js"></script>
<script type="text/javascript" src="../css/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../css/jszip.min.js"></script>
<script type="text/javascript" src="../css/pdfmake.min.js"></script>
<script type="text/javascript" src="../css/vfs_fonts.js"></script>
<script type="text/javascript" src="../css/buttons.html5.min.js"></script>
<script type="text/javascript" src="../css/buttons.print.min.js"></script>
<script type="text/javascript" src="../css/canvasjs.min.js"></script>
 
 
 

<script>
 
$(document).ready(function(){

  $('#user_event_form').parsley();

  $('#user_event_form').on('submit', function(event){
    event.preventDefault();

    $('#banner_img1').attr('required', 'required');

    $('#event_categories').attr('required', 'required');

    $('#event_startdate').attr('required', 'required');
	
    $('#event_time').attr('required', 'required');

    $('#event_enddate').attr('required', 'required');

    $('#event_location').attr('required', 'required');

    $('#event_shortnote').attr('required', 'required');

    $('#event_city').attr('required', 'required');

    $('#event_state').attr('required', 'required');

    $('#event_country').attr('required', 'required');

    $('#expected_no').attr('required', 'required');

    $('#contact_no').attr('required', 'required');

    $('#subsidiary_group').attr('required', 'required');

    $('#invitaion_degree').attr('required', 'required');

    if($('#user_event_form').parsley().validate())
    {
      $.ajax({
        url:"../pageajax.php",
         method:"POST",
        data:new FormData(this),
        dataType:"json",
        contentType:false,
        cache:false,
        processData:false,
        beforeSend:function()
        {
          $('#user_login').attr('disabled', 'disabled');
          $('#user_login').val('please wait...');
        },
        success:function(data)
        {
          if(data.success)
          {
				$('#message').html('<div class="alert alert-caution"><h3>Event Created Successfully!</h3></div>');
				$('#user_event_form')[0].reset();
				$('#user_event_form').parsley().reset();
          }
          else
          {
            $('#message').html('<div class="alert alert-danger">Error creating an event</div>');
          }

          $('#user_login').attr('disabled', false);

          $('#user_login').val('Login');
        }
      })
    }

  });

});

    $('#gift_table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy','excel', 'pdf', 'print'
        ]
    });
</script>
<!--
$.ajax({
        url:"../pageajax.php",
        method:"POST",
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function()
        {
          $('#user_login').attr('disabled', 'disabled');
          $('#user_login').val('please wait...');
        },




-->
