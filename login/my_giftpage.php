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
                  <h4> MY GIFT PAGE</h4>
                
				<div> 
                   <em>
				 
				 <a href="index.php" style="color:#777777 !important;"> Home </a> / <a href="#">Gift Page</a>
				  
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
				<center><h4>   ARRIVED GIFT <i style="font-size:40px;" class="fa fa-gift"></i>  </h4></center>
				</div>

			<div class="card-body">
			
             <div>


 				
 
<div class="card mb-4">

   <div class="card-header">
<i class="fa fa-briefcase mr-1"></i>
<b> ARRIVED GIFT PORTFOLIO  </b>


</div>
 

	<div class="card-body">

			<div class="table-responsive" >
				<table  id="gift_table" class="table table-hover table-striped table-bordered tataTable dtr-inline"role="grid" aria-describedby="example_info">


									<thead>
										   <th>
										  Event ID
										   </th>
										   
										   
										   <th>
											Transaction ID
										  </th>

										  
										   <th>
										   Gift Sender
										   </th>

										   <th>
										  Gift Price
										   </th>
							 
										   <th>
										   Gift Type
										   </th>

										   
										   <th>
										  Date Arrived
										   </th>
										   
						 
									</thead>

									 
									   
<?php
$result = $loader->myGiftPage($username);
 
foreach($result  as $row){
$price = number_format($row['gift_price'],2);
echo'	 

	 <tr role="row" class="odd">
		<td tabindex="0" class="sorting_1">'.$row['gift_event_id'].'</td>
		<td>'.$row['gift_reference_id'].'</td>
		<td>'.$row['gift_sender_names'].'</td>
		<td>₦'.$price.'</td>
		<td>'.$row['gift_name'].'<img src="../gift/'.$row['gift_image'].'" height="30px" /></td>
		<td>'.$row['date'].'</td>
 
	</tr> 
	
';
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
