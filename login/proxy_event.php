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
 <script>

function popup(s1,s2){
  //alert('Okay');
  var s1 = document.getElementById(s1);
  var s2 = document.getElementById(s2);
  s2.innerHTML = "";

	if(s1.value == "1")
	{
     $(s2).html('<div class="alert alert-success"> <label>Upload Banner Image</label>   <input type="file" name="banner_img2" id="banner_img2" /></div>');
	} else	
    if(s1.value == "2"){
   $(s2).html('<div class="alert alert-primary"><a href="gallery.php"><div class="btn btn-danger">Select Banner Image</div> </a>  </div>');
	
    }




    for(var option in optionArray) {
      var pair = optionArray[option].split("|");
	  var newOption = document.createElement("option");
		   newOption.value = pair[0];
		   newOption.innerHTML = pair[1];
		   s2.options.add(newOption);
	  
	}


}


</script>
 
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
                  <h4> CREATE PROXY EVENT</h4>
                
				<div> 
                   <em>
				 
				 <a href="index.php" style="color:#777777 !important;"> Home </a> / <a href="#"> Create Proxy Event</a>
				  
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
                      

 <div class="col-md-6">
			 

				<div class="card-header text-success" styl="background:#c908bd! important;">
				<h4>CREATE PROXY EVENT</h4>
				</div>

			<div class="card-body">
				
       			   <div id="message"></div>
					<form method="POST"   id="user_event_form">
<?php
if(isset($_GET["ref"])){

 echo'              

				  
					<div class="form-group">
					<label for="name">Upload Event Banner</label>
	';?>				
	                <select id="subsidiary_group" name="subsidiary_group"  onchange="popup('subsidiary_group', 'banner')" aria-required="true" class="form-control">
   <?php
   echo'

					
					<option value="2">I will create my banner here</option>
					</select>
					</div>
					
                 <div class="input-group col-md-12">  
					   <div class="form-group col-md-8">

						<label>Selected Event Banner</label>
						<input type="text"  value="'.$_GET["ref"].'"  name="banner_img1" id="banner_img1" aria-required="true" class="form-control" Readonly/>
			 
						<a href="self_event.php" class="btn btn-danger"> Refresh</a>
					  </div>
                  </div>					
		';			
					

}else{
echo'					

				   
					   <div class="form-group">
						   <label for="name">Upload Event Banner</label>
		';?>
						<select id="subsidiary_group" name="subsidiary_group"  onchange="popup('subsidiary_group', 'banner')" aria-required="true" class="form-control">
		<?php
         echo'		
					 
						<option value="">Select Option</option>
						<option value="1">I have my banner</option>
						<option value="2">I will create my banner here</option>
						</select>
				      </div>
					  
					    <div class="form-group"  id="banner">
					 
					   </div>
					   
           ';
}
?>




							 <div class="form-group">
							  <label>Select  Categories <span style="color:red;">&#42;</span> </label>
								<select class="form-control"  name="event_categories" id="event_categories" >
																			  
								<?php 
								include('../categories.html');
								?>	
								</select>
							</div>





                  <div class="form-group">
                    <label>Proxy First Name (If wedding Bridegroom eg Jason WED ) </label>
                    <input type="text" name="event_proxyfirstname" id="event_proxyfirstname" maxlength="10"  class="form-control" />
                  </div>

                  <div class="form-group">
                    <label>Proxy Last Name (If wedding Bride eg Emmy )</label>
                    <input type="text" name="event_proxylastname" id="event_proxylastname" maxlength="10"  class="form-control" />
                  </div> 
				  
				  
                  <div class="form-group">
                    <label>Proxy Phone</label>
                    <input type="number" name="event_proxyphone" id="event_proxyphone"   class="form-control" />
                  </div> 
 

                  <div class="form-group">
                    <label>Event Commence Date</label>
                    <input type="date" name="event_startdate" id="event_startdate" class="form-control" />
                  </div>
				  
                  <div class="form-group">
                    <label>Event Commence Time</label>
                    <input type="time" name="event_time" id="event_time" class="form-control" />
                  </div>
				  
				  
                  <div class="form-group">
                    <label>Event Conclude Date</label>
                    <input type="date" name="event_enddate" id="event_enddate" class="form-control" /> 
                  </div>

                  <div class="form-group">
                    <label>Event Location</label>
                    <textarea name="event_location" id="event_location" class="form-control"></textarea>
                  </div>

                  <div class="form-group">
                    <label>Event Dress Code</label>
                    <textarea name="event_shortnote" id="event_shortnote" class="form-control"></textarea>
                  </div>

				   <div class="form-group">
                    <label>Event City</label>
                    <input type="text" name="event_city" id="event_city" class="form-control" /> 
                  </div>

				  <div class="form-group">
                    <label>Event State</label>
                    <input type="text" name="event_state" id="event_state" class="form-control" /> 
                  </div>


				  
                  <div class="form-group">
                    <label>Event Country</label>
                    <input type="text" name="event_country" id="event_country" class="form-control" />
                  </div>
					   


                  <div class="form-group">
                    <label>Total no of  Guest Expected</label>
                    <input type="number" name="expected_no" id="expected_no" class="form-control" /> 
                  </div>
				  
				  
                  <div class="form-group">
                    <label> RSVP Phone</label>
                    <input type="digits" name="contact_rsvp" id="contact_rsvp" class="form-control" /> 
                  </div>
				  

				  
 				   <div class="form-group">
					   <label for="name">Invitation Degree</label>
						<select id="invitaion_degree" name="invitaion_degree"  class="form-control">
						 
					 
						<option value="">Select Option</option>
						<option value="Strictly By Invitation">Strictly By Invitation</option>
						<option value="Open To Public">General Public</option>
						</select>
				   </div>


						
						
						<div id="preview">
						
                    <input type="hidden" name='page' value='proxy' />
                    <input type="hidden" name="action" value="register" />

						<input type="submit" name="user_login" id="user_login" class="btn btn-success col-md-12" value="Create Event">
						
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
         <!-- Main content ends -->
         <!-- Container-fluid ends -->
    
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
          if(data.success == 'success')
          {
			//	alert('Preview your event and continue');
          //       window.location="event_preview.php?id="+data.page;
          $('#user_login').attr('hidden', true); 
		  $('#preview').html('<a class="btn btn-primary"  href="event_preview.php?id='+data.page+'">'+data.success+'!!. Preview Event Created</a>');
				
          }
          else
          {
            $('#message').html('<div class="alert alert-danger">Error creating an event</div>');
          }


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
