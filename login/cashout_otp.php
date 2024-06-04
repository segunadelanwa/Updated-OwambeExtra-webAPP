<!DOCTYPE html>
<html lang="en">

<head>
   <title>Owambe Extra Dashboard</title>
   <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
     <![endif]-->
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
                  <h4> OTP CONFIRMATION</h4>
                
				<div> 
                   <em>
				 
				 <a href="index.php" style="color:#777777 !important;"> Home </a> / <a href="#"> OTP Page</a>
				  
				 </em>
               </div>

               </div>



            </div>
            <!-- 4-blocks row start -->
     

    
	<div class="container">                          
	<div class="card ">
	
		<div class="card-header">
		<div align="center" style="font-size:20px;"><?php echo"Wallet CashOut <br>Balanace<br> ₦".$Loader-> wallet($username) ?></div>
		</div>
		
		

	</div>
	</div>								 



 
            <div class="row">

               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-block">
                        <div class="table-responsive">
 <div  lass="container">
		<div lass="col-md-12 m-l">

<?php 
 

	

if($Loader->CheckCode($_GET['code'], $username) == 1)
{
$event_code = $Loader->ProxyCheckCode($_GET['code']);	
echo'
		  <form  method="POST" id="wallet_cashout_form">
		  
		  	<div id="eventIdDetails">
			  
			 
			</div>
			  
		     <div class="form-group col-md-6"><br>
		   
			   <label for="mname">Please provide the OTP sent to your registered email address</label>
			

			  <label class="form-group col-md-8">Enter OTP Code Sent to <b class="text-blue">'.$username.' </b></label> 
			  <input type="number" id="loadOTP"     name="loadOTP"    value=""  class="form-control col-md-5"  data-parsley-checkemail data-parsley-checkemail-message=\'<span style="color:red;">* Wrong OTP Code</span>\'  required />
			  <br>
			
			  
			 
					<input type="hidden" name="page"  id="page" value="wallet_otp" />
					<input type="hidden" name="action"  id="action" value="otp_approve" />
					              
								  
								  
	 
					
					
				</div>	
  <div class="col-md-12">
				<input type="submit" name="savings_cashout" id="savings_cashout"   value="Submit OTP"   class="btn btn-success"/>

				<input type="button" id="sendOtp" data-code="'.$_GET['code'].'"    value="Resend OTP"   class="btn btn-primary"/>
	<div>		 
 
			

				
	        

		   </form>
';
}else
{

echo'

					  <h4 class="m-b-50">
						 <label style="color:#f00;">	<i class="fa fa-bell"></i> <br><br>
						 INVALID TRANSATION DETECTED!!
						 <br></label><br><br>
					THIS "'.$_GET['code'].'" CASHOUT CODE DOES NOT EXIST
						
					</h4>

';



	
}
?>
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



<script>

$(document).ready(function(){
	
	const event_id = '<?php echo $event_code; ?>'; 
	const cashout_code = '<?php echo $_GET["code"]; ?>'; 
	
	
	 window.ParsleyValidator.addValidator('checkemail', {
    validateString: function(value){
      return $.ajax({
        url:"../pageajax.php",
        method:'post',
        data:{page:'wallet_otp', action:'confirm_otp', event_id:event_id, loadOTP:value},
        dataType:"json",
        async: false,
        success:function(data)
        {
			
			if(data.feedback0 == 'proxy'){
			   $('#page').attr('id', 'proxyWallet_cashout').val('proxyWallet_cashout'); 
			   $('#action').attr('name', 'event_id').val(event_id); 
			  $('#eventIdDetails').append('<input type="hidden" name="action" value="otp_proxy_approve" />');
			}else{
				 
				 
				  $('#eventIdDetails').append('<input type="hidden" name="cashout_code" value="'+cashout_code+'" />');
			}
			   
		  return true;	 
        }
      });
    }
  });
  
  
 
  $('#wallet_cashout_form').parsley();

  $('#wallet_cashout_form').on('submit', function(event){
    event.preventDefault();
 
 

    $('#bank_name').attr('data-parsley-type', 'notblank');
	
    $('#account_name').attr('data-parsley-type', 'notblank');
	
    $('#account_no').attr('data-parsley-type', 'notblank'); 
	
    $('#cashout_amount').attr('data-parsley-type', 'notblank'); 

    if($('#wallet_cashout_form').parsley().validate())
    {
       $.ajax({
        url:'../pageajax.php',
        method:"POST",
        data:new FormData(this),
        dataType:"json",
        contentType:false,
        cache:false,
        processData:false,
        beforeSend:function()
        {
          $('#savings_cashout').attr('disabled', 'disabled');
          $('#savings_cashout').val('please wait...');
        },
        success:function(data)
        {
         
             alert(data.feedback1);
			 window.location = data.feedback2;
         


          $('#savings_cashout').attr('disabled', false);

          $('#savings_cashout').val('Cashout Successful');
        }
		
      })
    }

  });
  
  
 
	$(document).on('click', '#sendOtp', function(){
	 
		
	const sendOtp = document.querySelector('#sendOtp'); 

	const Cashcode  = sendOtp.dataset.code;  
	// user    = sendOtp.dataset.user;    
	// cashout = sendOtp.dataset.cashout;    
	 
		
			$.ajax({
				url:"../pageajax.php",
				method:"POST",
                data:{page:'wallet_otp', Cashcode:Cashcode, action:'reSendOtp'},
				beforeSend:function()
				{
				$('#sendOtp').attr('disabled', 'disabled');
				$('#sendOtp').val('Sending OTP...');
				},
				success:function(data)
				{
				   alert(data);
				   $('#sendOtp').val('RESEND OTP');
				   $('#sendOtp').attr('disabled', false);
				}
			});	
		
		
	});

  
  
  
  

});


	  
	  
</script>


