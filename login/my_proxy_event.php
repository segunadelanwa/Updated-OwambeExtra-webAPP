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
                  <h4> MY PROXY EVENT</h4>
                
				<div> 
                   <em>
				 
				 <a href="index.php" style="color:#777777 !important;"> Home </a> / <a href="#">My ProxyEvents</a>
				  
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
                      

 <div class="row">
			 

				<div class="card-header text-success" styl="background:#c908bd! important;">
				<center><h4>MY PROXY EVENTS</h4></center>
				</div>

	 
<?php  
	

			 
$result = $loader->ProxyEventBanner($username);

foreach($result as $row){

    $resultnow = $loader->ProxyWalletBal(trim($row['event_id']));
	foreach($resultnow as $row_b){
	$dataBal   = number_format($row_b['current_balance'],2);
	 
	}
	
echo'
              <div class="col-lg-6">
                  <div class="card">

                     <div lass="user-block-2" align="center">
					  <a href="../public_banner/'.$row['event_banner'].'">
                        <img class="img-fluid" src="../public_banner/'.$row['event_banner'].'"  width="100%" />
					</a>
                        <h5 class="text-danger"> PROXY EVENT OVERVIEW</h5>
                        <h6 class="text-primary">  Event ID( '.$row['event_id'].' )</h6>
                        <h6>'.$row['event_category'].'</h6>
                     </div>


                     <div class="card-block">
                        <div class="user-block-2-activities">
                           <div class="user-block-2-active">
                              <i class="icofont icofont-users"></i> Guest 
                              <label class="label label-primary"> '.$row['expected_guest'].'</label>
                           </div>
                        </div>
                        <div class="user-block-2-activities">
                           <div class="user-block-2-active">
                              <i class="icofont icofont-users"></i>Invited Guest  
                              <label class="label label-primary"> '.$row['current_guest'].'</label>
                           </div>
                        </div>

                        <div class="user-block-2-activities">
                           <div class="user-block-2-active">
                              <i class="icofont icofont-gift"></i> Gift Arrived 
                              <label class="label label-primary">'.$row['gift_arrived'].'</label>
                           </div>

                        </div>
						
                        <div class="user-block-2-activities">
                           <div class="user-block-2-active">
                              <i class="icofont icofont-bell-alt"></i> Event Time
                              <label class="label label-primary">'.$row['event_time'].'</label>
                           </div>
                        </div>


                        <div class="user-block-2-activities">
                           <div class="user-block-2-active">
                              <i class="icofont icofont-bell-alt"></i> Event Start
                              <label class="label label-primary">'.$row['event_start_date'].'</label>
                           </div>
                        </div>

                        <div class="user-block-2-activities">
                           <div class="user-block-2-active">
                              <i class="icofont icofont-bell-alt"></i> Event End
                              <label class="label label-primary">'.$row['event_end_date'].'</label>
                           </div>
                        </div>
						
                        <div class="user-block-2-activities">
                           <div class="user-block-2-active">
                              <i class="icofont icofont-bell-alt"></i> Event Cashout
                              <label class="label label-primary">₦'.$dataBal.'</label>
                           </div>
                        </div>
						
						
						
                        <div class="text-center">
						       <a href="../public_banner/'.$row['event_banner'].'"  Download>
                                <button type="button" class="btn btn-success waves-effect waves-light text-uppercase">
                                 Download
                                </button>
								</a>
								
                              <a href="prospect_guest.php?event='.$row['event_id'].'"> 
							  <button type="button" class="btn btn-primary waves-effect waves-light text-uppercase">
                                 View Guest    
                                </button>
                              </a>
								<a href="../eventpage.php?id='.$row['event_id'].'" >
								<button type="button" class="btn btn-danger waves-effect waves-light text-uppercase">
                                Goto Page   
                                </button>
								</a>
                        </div>
						
                     </div>
            
			</div>
               </div>
			   

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
          
             </div>
            <!-- 2-1 block end -->
         </div>
         <!-- Main content ends -->
 
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
