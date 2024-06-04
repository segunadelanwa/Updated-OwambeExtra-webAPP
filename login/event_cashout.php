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


   <div lass="loader-bg">
      <div lass="loader-bar">
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
                  <h4> EVENT WALLET CASHOUT</h4>
                
				<div> 
                   <em>
				 
				 <a href="index.php" style="color:#777777 !important;"> Home </a> / <a href="#">Event Wallet</a>
				  
				 </em>
               </div>

               </div>



            </div>


		<?php
		$date_init=date('Y-m-d');
		if(isset($_GET['cashout'])){
				/////////Search public event  for event owner 
				//Note the wallet will be locked if subscriber widthraw from his wallet
				//1 if the event has not been concluded
				//2 if celebrate has widthraw from this wallet once
				
				$eventOwner  = $loader->GiftOwnerSearch($_GET['cashout']);
				foreach($eventOwner as $row)
				{
				$event_owner =$row['event_owner'];
				$user_owner  =$row['username'];
				$EndDate     =$row['event_end_date'];
				} 
				
		/////////Search   event wallet for either proxy wallet or self wallet
		  if($event_owner == "proxy"){
			   $resultnow = $loader->ProxyWalletBal($_GET['cashout']);
				foreach($resultnow as $row_b)
				{
				$dataBal2   = number_format($row_b['current_balance'],2);
				$Previous   = number_format($row_b['previous_balance'],2);
				$dataBal          = $row_b['current_balance'];
				$lock_status      = $row_b['lock_status'];
				$proxy_firstname  = $row_b['proxy_firstname'];
				$proxy_lastname   = $row_b['proxy_lastname'];

			   }
			   //Check if the event has not been concluded event wallet will be locked
				if($EndDate > $date_init and $lock_status ){
					
					
				}
			   
			   
		  }
		  else if($event_owner == "self")
		  {
			   $resultnow = $loader->selfWalletBal($_GET['cashout']);
				foreach($resultnow as $row_b){
				$dataBal2   = number_format($row_b['current_balance'],2);
				$Previous   = number_format($row_b['previous_balance'],2);
				$dataBal          = $row_b['current_balance'];
				$lock_status      = $row_b['lock_status'];
				$proxy_firstname  = $row_b['self_firstname'];
				$proxy_lastname   = $row_b['self_lastname'];
				}
		  }else{
			  
			  header("Location: index.php");
		  }


			
		 
		}else{
			  
			  header("Location: index.php");
		  }
		?>    
	
	
	
	<div class="container">                          
	<div class="card ">
	
		<div class="card-header">
		<div align="center" style="font-size:18px;">
		<?php echo"Wallet($event_owner)  <br>Balance<br> ₦$dataBal" ?>
		</div>

		<div align="center" style="font-size:18px;color:blue;">
		<?php
         if($lock_status == "open"){
		     echo"<div>Wallet Status:<b><i class='fa fa-unlock'></i> Open</b></div>"; 
		 }elseif($lock_status == "lock"){
			  echo"<div>Wallet Status:<b><i class='fa fa-lock'></i> Locked</b></div>"; 
			 
		 }
		
		?>
		</div>
		</div>
		
		

	</div>
	</div>								 



 
            <div class="row col-md-8">

               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-block">
                        <div class="table-responsive">
 <div  lass="container">
		<div class="col-md-12 m-l">

					<div id="scriptFeedback">
					
					</div>	
		  <form  method="POST" id="wallet_cashout_form">
		  
		    <label for="mname">Payment will be made to your prefrence bank account details below</label>
		   <div class="form-group col-md-6"><br>
		   			    <div> 
				<label>Bank Name    </label> 
 			 
			   <input type="text"  id="bank_name"   name="bank_name"   value="<?php echo"$bank_name";?>"    data-parsley-required data-parsley-required-message='<span style="color:red;font-size:12px;">* Goto settings and update your bank name. </span>'  class="form-control"  readonly/> 
 			    </div>

				
 			    <div> 
				<label>Account Name  </label> 
			   <input type="text"   id="account_name" name="account_name" class="form-control"  value="<?php echo"$account_name";?>"  data-parsley-required data-parsley-required-message='<span style="color:red;font-size:12px;">* Goto settings and update your account name. </span>'  class="form-control"  readonly/> 
               </div>
              
			    <div> 
				<label>Account Number    </label> 			
			   <input type="text"  id="account_no" name="account_no"   class="form-control"   value="<?php echo"$account_no";?>"   data-parsley-required data-parsley-required-message='<span style="color:red;font-size:12px;">* Goto settings and update your account number. </span>'  class="form-control"  readonly/> 
                <div><hr>

                 <div> 
				<label>Event Name   </label> 
				<input type="text" id="proxyEvent" required value="<?php echo"$proxy_firstname $proxy_lastname";  ?>" class="form-control col-md-5"  readonly/>
				<br><br><br><div>


				<div>
				<label > Event Conclude Date </label> 
				<input type="text" id="EndDate" name="EndDate" value="<?php echo$EndDate; ?>"  data-parsley-checkdate data-parsley-checkdate-message='<span style="color:blue;font-size:12px;">Event is still active. Cashout Denied!. </span>' class="form-control col-md-5"  readonly/>
				<input type="hidden" id="event_owner" name="event_owner" value="<?php echo$event_owner; ?>" class="form-control col-md-5"  hidden/>
				<input type="hidden" id="eventID" name="eventID" value="<?php echo$_GET['cashout']; ?>" class="form-control col-md-5"  hidden/>
				<br><br><br><div>

				<div>
				<label> Cashout Amount</label> 
				<input type="text"  id=""    value="₦<?php echo$dataBal2; ?>"   data-parsley-checkamount data-parsley-checkamount-message='<span style="color:bluefont-size:12px;You need to have minimum balance of ₦1,000.00 to cashout from wallet. </span>' class="form-control col-md-5"  readonly/>
				<input type="hidden"  id="cashout_amt"    name="cashout_amt"    value="<?php echo$dataBal; ?>"  hidden/>
				<br><br><br><div>

				<div>
				<label> Previous Cashout</label> 
				<input type="text"      value="₦<?php echo$Previous; ?>"  class="form-control col-md-5"  readonly/>
				<br><br><br><div>

                

	 
			  
			 
                <br> <br> <br>
					<input type="hidden" name="page" id="page"  value="Wallet_cashout" />
					<input type="hidden" name="action" id="action" value="event_cashout" />
					
					
                
				 
					
					<input type="submit" name="proxyCashout" id="proxyCashout"   value="Search Event"   class="btn btn-success"/>
				
					
		

			

				
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

	const eventID      = document.querySelector('#eventID').value; 
	const cashout_amt      = document.querySelector('#cashout_amt').value; 
	
  window.ParsleyValidator.addValidator('checkdate', {
    validateString: function(value){
      return $.ajax({
        url:'../pageajax.php',
        method:'post',
        data:{
			page:'Wallet_cashout', 
			action:'event_date', 
			EndDate:value
			},
        dataType:"json",
        async: false,
        success:function(data)
        {
          return true;
        }
      });
    }
  });

 

  window.ParsleyValidator.addValidator('checkamount', {
    validateString: function(value){
      return $.ajax({
        url:'../pageajax.php',
        method:'post',
        data:{
			page:'Wallet_cashout', 
			action:'check_amount', 
			checkamount:cashout_amt
			},
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

    $('#user_email_address').attr('required', 'required');

    $('#user_email_address').attr('data-parsley-type', 'email');

    $('#user_password').attr('required', 'required');

    $('#confirm_user_password').attr('required', 'required');

    $('#confirm_user_password').attr('data-parsley-equalto', '#user_password');

    $('#user_name').attr('required', 'required');

    $('#user_name').attr('data-parsley-pattern', '^[a-zA-Z ]+$');

    $('#user_surname').attr('required', 'required');

    $('#user_surname').attr('data-parsley-pattern', '^[a-zA-Z ]+$'); 

     $('#user_student_no').attr('required', 'required');
 
    $('#user_student_no').attr('data-parsley-alphanum', '^[0-9][a-zA-Z ]');

	$('#user_city').attr('required', 'required');
 
    $('#user_city').attr('data-parsley-alphanum', '^[0-9][a-zA-Z ]');


	$('#user_state').attr('required', 'required');
 
    $('#user_state').attr('data-parsley-alphanum', '^[0-9][a-zA-Z ]');

	$('#user_country').attr('required', 'required');
 
    $('#user_country').attr('data-parsley-alphanum', '^[0-9][a-zA-Z ]');
	
	
	$('#user_phone').attr('required', 'required');
 
    $('#user_phone').attr('data-parsley-type', 'notblank');
	
	$('#user_gender').attr('required', 'required');
	
	$('#user_address').attr('required', 'required');

    $('#user_agree').attr('required', 'required'); 

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
			$('#proxyCashout').attr('disabled', true);
			$('#proxyCashout').addClass('btn btn-success');
			$('#proxyCashout').val('please wait...');
			},	
           success:function(data)
           {
				 

				alert(data.dataForm1);
				window.location = (data.dataForm2);

			 
  
           }
		
		
      })
    }

  });
	
});

</script>


<script>

$(document).ready(function(){



 
 
  $('#wallet_cashout_form').on('click', '#diabled', function(){
	 
	//alert('okay');
	const event_owner  = document.querySelector('#event_owner').value; 
	const EndDate      = document.querySelector('#EndDate').value; 
	const eventID      = document.querySelector('#eventID').value; 
	const bank_name    = document.querySelector('#bank_name').value; 
	const account_name = document.querySelector('#account_name').value; 
	const account_no   = document.querySelector('#account_no').value; 
	const cashout_amt  = document.querySelector('#cashout_amt').value; 
	
        $.ajax({
        url:"../pageajax.php",
        method:'POST',
		dataType:'Json',
        data:{
			page:'proxyWallet_cashout', 
			action:'proxyBal_check', 
			EndDate:EndDate, 
			eventID:eventID,
			event_owner:event_owner, 
			bank_name:bank_name,
			account_name:account_name,
			account_no:account_no, 
			cashout_amt:cashout_amt
			},
			beforeSend:function()
			{
			$('#proxyCashout').attr('disabled', true);
			$('#proxyCashout').addClass('btn btn-success');
			$('#proxyCashout').val('please wait...');
			},	
           success:function(data)
           {
				 

				alert(data.dataForm1);
				window.location = (data.dataForm2);

			 
  
           }
		
      });
 
  });
  

  
  
  
  

});


	  
	  
</script>


