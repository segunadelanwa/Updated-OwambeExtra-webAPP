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
 
$http_referer = $_SERVER['HTTP_REFERER'];
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
                  <h4>TEMPLATE GALLERY</h4>
                
				<div> 
                   <em>
				 
				 <a href="index.php" style="color:#777777 !important;"> Home </a> / <a href="#">  Template Gallery</a>
				  
				 </em>
               </div>

               </div>



            </div>
            <!-- 4-blocks row start -->
            <?php
            include"account_bars.php";

           ?>           
            <!-- 4-blocks row end -->

            <!-- 1-3-block row start -->

            <div class="row">

    
 

        

           </div>
            <!-- 1-3-block row end -->

            <!-- 2-1 block start -->
            <div class="row">

               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-block">
                        <div class="table-responsive">
                      

 <div class="col-md-12">
			 

				<div class="card-header text-success" styl="background:#c908bd! important;">
				<h4>TEMPLATE GALLERY</h4>
				</div>

			<div class="card-body">
				<?php
                
             		$loader->query = "SELECT * FROM `galley`";
		 
				     $result = $loader->query_result();

				foreach($result as $row){
					$output =   '
					  <div class="col-md-4">
						  <a href="'.$http_referer.'?ref='.$row['banner_name'].'">
						   <img src="../img_gallery/'.$row['banner_name'].'" style="width: 100%"  />
						 </a>
					  </div><br>
					';
				   echo $output;
				}
				 ?>
  
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
         <div class="fixed-button">
            <a href="#!" class="btn btn-md btn-primary">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i> OWAMBE EXTRA
            </a>
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

  $('#user_login_form').parsley();

  $('#user_login_form').on('submit', function(event){
    event.preventDefault();

    $('#user_email_address').attr('required', 'required');

    $('#user_email_address').attr('data-parsley-type', 'email');

    $('#user_password').attr('required', 'required');

    if($('#user_login_form').parsley().validate())
    {
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
        success:function(data)
        {
          if(data.success)
          {
            location.href='index.php';
          }
          else
          {
            $('#message').html('<div class="alert alert-danger">'+data.error+'</div>');
          }

          $('#user_login').attr('disabled', false);

          $('#user_login').val('Login');
        }
      })
    }

  });

});


</script>

 <script>

function popup(s1,s2){
  //alert('Okay');
  var s1 = document.getElementById(s1);
  var s2 = document.getElementById(s2);
  s2.innerHTML = "";

	if(s1.value == "1")
	{
     $(s2).html('<div class="alert alert-success"> <label>Upload Banner Image</label>   <input type="file" name="user_image" id="user_image" /></div>');
	} else	
    if(s1.value == "2"){
   $(s2).html('<div class="alert alert-primary"><a href="gallery.php"><button class="btn btn-danger">Select banner Image</button> </a>  </div>');
	
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
 