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
                  <h4> EVENT PREVIEW</h4>
                
				<div> 
                   <em>
				 
				 <a href="index.php" style="color:#777777 !important;"> Home </a> / <a href="#">Event Preview</a>
				  
				 </em>
               </div>

               </div>



            </div>
            <!-- 4-blocks row start -->
            <?php
            include"account_bars.php";

           ?>           
            <!-- 4-blocks row end -->
 



            <!-- 2-1 block start -->
            <div class="row">

               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-block">
                        <div class="table-responsive">
                      

 <div lass="col-md-12">
			 

				<div class="card-header text-success" styl="background:#c908bd! important;">
				<center><h4>UNFINISHED IV CARD PREVIEW</h4></center>
				</div>

			<div class="row">
			
             
<?php
if(isset($_GET['delete'])){
	$resultDELETE = $loader->deleteBanner($_GET['delete']);
 
	  
  if( $resultDELETE == "self"){
	  
		echo'<script> alert("Event invitation card deleted successfully!"); </script>';
		echo'<script> window.location="self_event.php" </script>';
		
  }elseif( $resultDELETE == "proxy"){
	  	
		echo'<script> alert("Event invitation card deleted successfully!"); </script>';
		echo'<script> window.location="proxy_event.php" </script>';
  }

}

 


if(isset($_GET['approve'])){
	$resultAPPROVE = $loader->approveBanner($_GET['approve']);
	
  if( $resultAPPROVE == "self"){
	  
		echo'<script> alert("Event invitation card approved and saved successfully!"); </script>';
		echo'<script> window.location="my_events.php" </script>';
		
  }elseif( $resultAPPROVE == "proxy"){
	  	
		echo'<script> alert("Event invitation card approved and saved successfully!"); </script>';
		echo'<script> window.location="my_proxy_event.php" </script>';
  }
	 
}


$result = $loader->myEventPreview($username);

foreach($result as $row){
	
echo'
              <div class="col-lg-6">
                  <div class="card">

                     <div lass="user-block-2" align="center">
                        <img class="img-fluid" src="../public_banner/'.$row['event_banner'].'"  height="100%" /> 
                     </div><br>


                  
						
						
						
                        <div class="text-center">
						         <a href="event_preview.php?delete='.$row['event_id'].'"> 
                                <button type="button" class="btn btn-danger waves-effect waves-light text-uppercase m-r-30">
                                DELETE  
                                </button>
								</a>

								 
                                <button type="button" class="btn btn-success waves-effect waves-light text-uppercase m-r-30">
                               OR 
                                </button>
								 
								
                              <a href="event_preview.php?approve='.$row['event_id'].'"> 
							  <button type="button" class="btn btn-primary waves-effect waves-light text-uppercase">
                                APPROVE      
                                </button>
								
								
                              </a>
								 
                        </div>
						
                     </div>
            
			</div>
               </div>
			   

 ';
} 

?>
			 <div>
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
