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
                  <h4> MY WALLET CASHOUT</h4>
                
				<div> 
                   <em>
				 
				 <a href="index.php" style="color:#777777 !important;"> Home </a> / <a href="#"> Wallet CashOut</a>
				  
				 </em>
               </div>

               </div>



            </div>
        
 

    
	<div class="container">                          
	<div class="card ">
	
		<div class="card-header">
		<div align="center" style="font-size:20px;"><?php echo"Wallet CashOut <br>Balance<br> ₦".$Loader-> wallet($username) ?></div>
		</div>
		
		

	</div>
	</div>								 



 
            <div class="row">

               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-block">
                        <div class="table-responsive">
 <div  class="container">
		<div class="col-md-12 m-l">

		  <form  method="POST" id="wallet_cashout_form">
		  
		  
		   <div class="form-group col-md-6"><br>
		   
			   <label for="mname">Payment will be made to your prefrence bank account details below</label>
			   <input type="text"  id="bank_name"   name="bank_name" class="form-control"  value=" <?php echo"$bank_name";?> " notblank  readonly  data-parsley-notblank data-parsley-notblank-message='<span style="color:blue;">Empty Bank Name Detected!.Please update your bank name</span>'><br>
 
			   <input type="text"   id="account_name" name="account_name" class="form-control" value=" <?php echo"$account_name";?> " notblank readonly      data-parsley-notblank data-parsley-notblank-message='<span style="color:blue;">Empty Account Name Detected!.Please update your account name </span>'><br>
  
			   <input type="text"  id="account_no" name="account_no"  class="form-control"  value=" <?php echo"$account_no";?> "  notblank  readonly      data-parsley-notblank data-parsley-notblank-message='<span style="color:blue;">Empty Account Number Detected!.Please update your account number </span>'><br>
			
			<input type="hidden"  id="account_bal" name="account_bal"  class="form-control"  value="<?php echo$Loader-> wallet_raw($username); ?> "  notblank  readonly      data-parsley-notblank data-parsley-notblank-message='<span style="color:blue;">Empty Account Number Detected!.Please update your account number </span>'><br>
		   
		   
 
 		
		  
		      
			  <label class="form-group col-md-8"><b>Cashout Amount</b></label> 
			  <input type="number"  name="loadCASH" id="loadCASH"    class="form-control col-md-5" value="<?php echo$Loader-> rawWallet($username); ?>" data-parsley-checkemail data-parsley-checkemail-message='<span style="color:red;">* Insufficient Funds.Minimum cashout is ₦1,000.00</span>' readonly />
			
 
				<br><br><hr>
			  
			 
                <br>
					<input type="hidden" name='page' value='wallet_withdraw' />
					<input type="hidden" name="action" value="wallet_withdraw" />

					<input type="submit" name="savings_cashout" id="savings_cashout"   value="Continue to Cashout "   class="btn btn-success"/>

			

                  
				 <label style="color:#f00;">NOTE: <br>
				An OTP will be sent to your <?php echo"<span style='color:blue;'>$username</span>"; ?> For payment confirmation.<br> 
				</label>
	        </div>

		   </form>


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




</body>

</html>

<script>
$(document).ready(function(){

  window.ParsleyValidator.addValidator('checkemail', {
    validateString: function(value){
      return $.ajax({
        url:'../pageajax.php',
        method:'post',
        data:{page:'wallet_bal', action:'check_balance', loadCASH:value},
        dataType:"json",
        async: false,
        success:function(data)
        {
          return true;
        }
      });
    }
  });

  $('#wallet_cashout_form').parsley();

  $('#wallet_cashout_form').on('submit', function(event){
    event.preventDefault();

 

    $('#bank_name').attr('required', 'required');
	
    $('#account_name').attr('required', 'required');
	
    $('#account_no').attr('required', 'required'); 

 

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
         
 
        }
		
		
      })
    }

  });
	
});

</script>

   

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
