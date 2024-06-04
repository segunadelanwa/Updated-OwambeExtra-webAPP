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
                  <h4> PROXY WALLET CASHOUT</h4>
                
				<div> 
                   <em>
				 
				 <a href="index.php" style="color:#777777 !important;"> Home </a> / <a href="#">Proxy Wallet</a>
				  
				 </em>
               </div>

               </div>



            </div>
 

    
	<div class="container">                          
	<div class="card ">
	
		<div class="card-header">
		<div align="center" style="font-size:20px;"><?php echo" Proxy Wallet CashOut <br><br>"; ?></div>
		</div>
		
		

	</div>
	</div>								 



 
            <div class="row col-md-8">

               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-block">
                        <div class="table-responsive">
 <div  class="container">
		<div class="col-md-12 m-l">

					<div id="scriptFeedback">
					
					</div>	
		  <form  method="POST" id="wallet_cashout_form">
		  
		  
		   <div class="form-group col-md-6"><br>
		   
 		 


			  <label class="form-group col-md-8">Enter Event ID </label> 
			  <input type="text" id="eventID"     name="eventID"    value="" class="form-control col-md-5"  data-parsley-checkemail data-parsley-checkemail-message='<span style="color:red;">*Invalid Event ID</span>'  required />
			  <br>
			
              <div id="eventIdDetails">
			  
			  
			  </div>			  
			 
                <br> <br> <br>
					<input type="hidden" name="page" id="page"  value="wallet_search" />
					<input type="hidden" name="action" id="action" value="eventWallet_check" />
					
					
                
				 
					
					<input type="submit" name="savings_cashout" id="savings_cashout"   value="Search Event"   class="btn btn-success"/>
				
					
					<div id="display_con">
					
					</div>
			  

			

				
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




  
	 window.ParsleyValidator.addValidator('checkemail', {
    validateString: function(value){
      return $.ajax({
        url:"../pageajax.php",
        method:'post',
        data:{page:'proxy_event_id_search', action:'search_eventID', eventID:value},
        dataType:"json",
        async: false,
        success:function(data)
        {
			 if(data.success == 'true'){
              return true;
			 }
			   $('#savings_cashout').val('GET EVENT');
        }
      });
    }
  });
  

 
  
  
  
  
  ///////////////////////////////////////////////////////////////////////////////////////
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
          $('#savings_cashout').attr('disabled', true);
          $('#savings_cashout').val('please wait...');
        },
        success:function(data)
        {
       
	   
	     if(data.dataForm == 'error'){
			
		  $('#eventID').attr('disabled', false);
          $('#savings_cashout').attr('disabled', false); 
          $('#savings_cashout').addClass('btn-info')
          $('#savings_cashout').val('SEARCH EVENT');
          $('#eventIdDetails').append('<b class="text-danger">This event ID does not belong to proxy event </b>');
		  
        }else{
	     
		 $('#eventID').attr('disabled', true);
          $('#savings_cashout').attr('disabled', false);
          $('#page').attr('id', 'proxyWallet_cashout').val('proxyWallet_cashout'); 
          $('#action').val('proxyBal_check');
		  
		   $('#eventIdDetails').append(data.dataForm);
          $('#savings_cashout').attr('hidden', true).val('Event ID Checked');
          
         		
          $('#eventIdDetails').append('<input type="submit"  id="proxyCashout"  class="btn btn-danger" value="Continue To Cashout" />');		

		}
		
		
		}
      })
    }

  });
  
  
   ////////////////////////////////////////////////////////////// 
 
 
  $('#wallet_cashout_form').on('click', '#proxyCashout', function(){
	 
	//alert('okay');
	const layoff = document.querySelector('#layoff').value; 
	const eventID = document.querySelector('#eventID').value; 
	const bank_name = document.querySelector('#bank_name').value; 
	const account_name = document.querySelector('#account_name').value; 
	const account_no = document.querySelector('#account_no').value; 
	const cashout_amount = document.querySelector('#cashout_amount').value; 
        $.ajax({
        url:"../pageajax.php",
        method:'POST',
		dataType:'Json',
        data:{
			page:'proxyWallet_cashout', 
			action:'proxyBal_check', 
			layoff:layoff, 
			eventID:eventID,
			bank_name:bank_name,
			account_name:account_name,
			account_no:account_no, 
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


