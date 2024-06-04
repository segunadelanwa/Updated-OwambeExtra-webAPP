 <!DOCTYPE html>
<html lang="en">
<head>
	 
<?php

 include"header.php";
 
 
 include"config.php";
 $loader = new Loader;
 $date = date("Y-m-d");
 
 @$http_referer = $_SERVER['HTTP_REFERER'];
 
$auto_id =time();// + $rand;
$ref_id ="GT$auto_id"; 

$id = $_GET['id'];
$result = $loader->Subcriber($_GET['id']); 
if(empty($result)){
	
	header("Location: index.php");
}

foreach($result as $row)
{

$vendor =strtoupper($row['first_name'].' '.$row['sur_name']);
$image = 'public_banner/'.$row['event_banner'];
$category = strtoupper($row['event_category']);
$url ='https://owambextra.gse-mart.com';
}

$name_com ="$category"; 
?> 	

		
 
<head>

	 
	
	  <meta http-equiv="content-type" content="text/html; charset=UTF-8">

 	
        <meta name="msapplication-TileImage" content='<?php echo"$url/eventpage.php?id=$id"?>'>
		<meta property='og:url'              content='<?php echo"$url/eventpage.php?id=$id"?>'>
		<meta property='og:site_name'        content='Owambe Extra Celebity Page'>  
		<meta property='og:title'            content='<?php echo"$vendor is inviting you to his  $name_com event. Kindly visit page to reserve a seat for you. "; ?>'>
		<meta property="og:image:secure_url" content='<?php echo"$url/$image"?>'>
		<meta property="og:image"            content='<?php echo"$url/$image"?>'>
		<meta property='og:description'      content='Your presence will be so much appreciated.Thanks' >
		<meta property="og:image:type"       content="image/jpeg">
		<meta property="og:image:width"      content="700">
		<meta property="og:image:height"     content="700">
		<meta property='al:ios:url'          content='<?php echo"$url/eventpage.php?id=$id"?>'>
		<meta property='al:ios:app_store_id' content=''>
		<meta property='fb:app_id'           content='232273500911428'>


		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width	initial-scale=1" />	   
		<link rel="stylesheet" type="text/css" href="home.css" />
		<link rel="stylesheet" type="text/css" href="mobile.css" />
		<link rel="shortcut icon" href="<?php echo"$url/$image"?>" />
    
	

  <title>
<?php echo"$vendor is inviting you to his  $name_com event. Kindly visit page to reserve a seat for you. "; ?>
</title>		
</head>
 	
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>

   <div id="fb-root"></div>
   
    <script>
			(function (d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id))
						return;
					js = d.createElement(s);
					js.id = id;
					js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3&appId=232273500911428";
					fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));

			function fb_share(dlink, dtitle) { 
			//console.log(dtitle);
				var app_id = '232273500911428';
				var pageURL="https://facebook.com/dialog/feed?app_id=" + app_id + "&link=" + dlink;
				var w = 600;
				var h = 400;
				var left = (screen.width / 2) - (w / 2);
				var top = (screen.height / 2) - (h / 2);
				window.open(pageURL, dtitle, 'toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=no, resizable=no, copyhistory=no, width=' + 500 + ', height=' + 450 + ', top=' + top + ', left=' + left)
			return false;
			}
    </script> 
  <script>

function popup(s1,s2){
  //alert('Okay');
  var s1 = document.getElementById(s1);
  var s2 = document.getElementById(s2);
  s2.innerHTML = "";

	if(s1.value == "Diamond")
	{
     $(s2).html('<center><img src="gift/diamond.jpg" /> <hr><b>Diamond ₦1,000,000+</b> 	 <br>     <div class="form-group"> <label for="name">Enter Amount</label> <input type="number"   id="amount" name="amount"   class="form-control" min="1000000" max="20000000"   required /> </div></center>');
				
	} 
	else	
    if(s1.value == "Gold"){
     $(s2).html('<center><img src="gift/gold.jpg" />    <hr><b>Gold ₦500,001 - ₦1,000,000</b> <br> 	<div class="form-group"> <label for="name">Enter Amount</label> <input type="number"   id="amount" name="amount"   class="form-control" min="500001" max="1000000"   required /> </div></center>');
   }
	else	
    if(s1.value == "Sliver"){
     $(s2).html('<center><img src="gift/sliver.jpg" />  <hr><b>Sliver ₦100,001 - ₦500,000</b> <br> 	<div class="form-group"> <label for="name">Enter Amount</label> <input type="number"   id="amount" name="amount"   class="form-control" min="100001" max="500000"   required /> </div></center>');	
    }
	else	
    if(s1.value == "Bronze"){
     $(s2).html('<center><img src="gift/bronze.jpg" /> <hr><b>Bronde ₦1,000 - ₦100,000</b> <br><div class="form-group"> <label for="name">Enter Amount</label> <input type="number"   id="amount" name="amount"   class="form-control" min="1000" max="100000"   required /> </div></center>');
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

<style>

.mytextfont1{
	font-size:19px !important;	
}
</style>

<body>
	<!-- top-header -->
	<div class="agile-main-top">
		<div class="container-fluid">
			<div class="row main-top-w3l py-2">
				<div class="col-lg-12 eader-most-top">
					<center>
					<h4 class="text-white text-center">
					
						<i class="fas fa-gift ml-1"></i><i class="fas fa-gift ml-1"></i><i class="fas fa-gift ml-1"></i>
						<i class="fas fa-gift ml-1"></i><i class="fas fa-gift ml-1"></i><i class="fas fa-gift ml-1"></i>
						<i class="fas fa-gift ml-1"></i><i class="fas fa-gift ml-1"></i><i class="fas fa-gift ml-1"></i>
						<i class="fas fa-gift ml-1"></i><i class="fas fa-gift ml-1"></i><i class="fas fa-gift ml-1"></i> 
					Owambe Extra  
						<i class="fas fa-gift ml-1"></i><i class="fas fa-gift ml-1"></i><i class="fas fa-gift ml-1"></i>
						<i class="fas fa-gift ml-1"></i><i class="fas fa-gift ml-1"></i><i class="fas fa-gift ml-1"></i>
						<i class="fas fa-gift ml-1"></i><i class="fas fa-gift ml-1"></i><i class="fas fa-gift ml-1"></i>
						<i class="fas fa-gift ml-1"></i><i class="fas fa-gift ml-1"></i><i class="fas fa-gift ml-1"></i>
						
					</h4>
					</center>
				</div>
			</div>
		</div>
	</div>

 
 
<!--
	<div class="header-bot">
		<div class="container">
			<div class="row header-bot_inner_wthreeinfo_header_mid">
				<!-- logo 
				<div class="col-md-3  ">
					<h1 class="text-center">
						<a href="index.html" class="font-weight-bold font-itali">
							<img src="images/logo.jpeg" alt=" " class="img-fluid">
						</a>
					</h1>
				</div>
				<!-- //logo  
				<!-- header-bot  
				<div class="col-md-9  mt-4 mb-md-0 mb-4">
					<div class="row">
						<!-- search  
						<div class="col-10 agileits_search">
							<form class="form-inline" action="#" method="post">
								<input class="form-control mr-sm-2" type="search" placeholder="Search Event" aria-label="Search" required>
								<button class="btn my-2 my-sm-0" type="submit">Search</button>
							</form>
						</div>
	 
					</div>
				</div>
			</div>
		</div>
	</div>


	 banner-2 -->
	<div lass="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb" style="background-color:#000;">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php">Home</a>
						<i>|</i>
					</li>
					<li>
						<a href="signup.php">Free Signup</a>
						<i>|</i>
					</li>
					<li><a href="./login">Login</a></li>
				</ul>
			</div>
		</div>
	</div>
	
		<!-- //page -->
		
		<!-- Event Page -->
 <?php

 $result_two = $loader->Subcriber($_GET['id']); 

foreach($result_two as $row){


 	
echo'	
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span style="font-weight:bold;color:#000;">'.$vendor.' </span><hr>
				<span>O</span>nline
				<span>E</span>vent
				<span>P</span>age</h3>
			<!-- //tittle heading -->
			
			
			
			<div class="row">
			
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="public_banner/'.$row['event_banner'].'">
									<div class="thumb-image">
										<img src="public_banner/'.$row['event_banner'].'" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
								<li data-thumb="public_banner/'.$row['event_banner'].'">
									<div class="thumb-image">
										<img src="public_banner/'.$row['event_banner'].'" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
								<li data-thumb="public_banner/'.$row['event_banner'].'">
									<div class="thumb-image">
										<img src="public_banner/'.$row['event_banner'].'" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-7 single-right-left simpleCart_shelfItem" >
					<h3 lass="mb-3" style="text-decoration:capitalize! important;font-size:30px;">('.($row['event_category']).') <soan style="color:#c908bd;"> </span></h3>
					
					<p class="mb-3 mytextfont1">
						<label> <b>Expected Guest </b></label>: <i class="fa fa-users"></i> (<span class="item_price">'.($row['expected_guest']).'</span>)
						
						 
					
					</p>

 
					 
					<div class="single-infoagile" >
						<ul>
							<li class="mb-3 mytextfont1">
						   <b>Dress Code:	<span style="color:#c908bd;">'.($row['event_note']).' <?span></b>
							</li>

							<li class="mb-3 mytextfont1">
						   <b>Time:	<span style="color:#c908bd;">'.($row['event_time']).' <?span></b>
							</li>
							<li class="mb-3 mytextfont1">
								<b>Event Commence Date:	<span style="color:#c908bd;">'.($row['event_start_date']).' <?span></b>
							</li>
							<li class="mb-3 mytextfont1">
							<b>Event Conclude Date:	<span style="color:#c908bd;">'.($row['event_end_date']).' <?span></b>
							</li>
							<li class="mb-3 mytextfont1">
								<b>Event Contact no:	<span style="color:#c908bd;">'.($row['contact_no']).' <?span></b>
							</li>
						</ul>
					</div>
					<div class="product-single-w3l">
						<p class="my-3 mytextfont1">
							<span>Event Location <i class="far fa-hand-point-right mr-2"></i>
							<label><span style="color:#c908bd;">'.($row['event_location']).' <?span></p>
						<ul>
							<li class="mb-1 mytextfont1">
								<span>Event City <i class="far fa-hand-point-right mr-2"></i>
							<label><span style="color:#c908bd;">'.($row['event_city']).' <?span></p>
							</li>
							<li class="mb-1 mytextfont1">
								<span>Event State <i class="far fa-hand-point-right mr-2"></i>
							<label><span style="color:#c908bd;">'.($row['event_state']).' <?span></p>
							</li>
							<li class="mb-1 mytextfont1">
								<span>Event Country <i class="far fa-hand-point-right mr-2"></i>
							<label><span style="color:#c908bd;">'.($row['event_country']).' <?span></p>
							</li>
							<li class="mb-1 mytextfont1">
								<span>Invitation Status <i class="far fa-hand-point-right mr-2"></i>
							<label><span style="color:#c908bd;">'.($row['security_note']).' <?span></p>
							</li>
							<li class="mb-1 mytextfont1">
								<span>Date Uploaded <i class="far fa-hand-point-right mr-2"></i>
							<label><span style="color:#c908bd;">'.($row['posted_date']).' <?span></p>
							</li>
						</ul>
						<p class="my-sm-4 my-3">
							<i class="fas fa-money mr-3"></i>Payment Gateway / Transfer/ ATM Card / Paystack
						</p>
					</div>
					<div>
						<div>
								<span id="message"></span>
							<form action="#"  method="POST" >
						 
								 
								
								<div class="form-group">
								<label>Guest Fullname</label>
								<input type="text" name="visitor_name" id="visitor_name"  placeholder="name"  class="form-control" /> 
								<span id="msg"></span>
								</div>


								<div class="form-group">
								<label>Guest Phone no.</label>
								<input type="number" name="visitor_number" id="visitor_number"  placeholder="number"  class="form-control"   required/> <span id="msg"></span>
								</div>
								
								 <input type="text" name="event_id" id="event_id"  value="'.$row['event_id'].'"    hidden />
								 <input type="text" name="event_username" id="event_username"  value="'.$row['username'].'"     hidden/>
		
								<input type="submit" name="user_login" id="user_login" value="Reserve a Seat" class="btn btn-danger col-md-12" />
						 
								
						</form><br>

						</div>
					
								<div style="display:flex;justify-content:space-between;">
								     <div class="btn btn-default  col-md-6" style="background-color:#c908bd;color:#fff;">
								     <a  href="#" data-toggle="modal" data-target="#exampleModal" style="color:white;">
									Send Gift <i class="fa fa-gift"></i>
									</a>
									</div>
									
									
									<div class="btn btn-primary ml-2 col-md-6" >
									<a href="public_banner/'.$row['event_banner'].'" style="color:white;" Download>
									
									Download IV Card <i class="fa fa-download"></i> 
									</a> 
									</div> 
								 </div>	<br>
								<div style="display:flex;justify-content:space-between;">
';
?>							
<div class="btn btn-primary ml-2 col-md-6" >	
<a href='javascript:void(0);' class='text-white' onclick="fb_share('https://owambextra.gse-mart.com/eventpage.php?id=<?php echo$_GET['id']; ?>', '<?php echo'Celebrate '.$vendor.'  event'; ?>')   ">								
Facebook Share <i class="fa fa-facebook"></i>
</a>
</div>	

<a class="btn btn-success ml-2 col-md-6"  style='color:white;'href='whatsapp://send?text=https://owambextra.gse-mart.com/eventpage.php?id=<?php echo$_GET['id']; ?>' >					
Whatapp Share  <i class="fa fa-whatsapp"></i>  
</a>

<?php									
echo'									
					           
					            </div>
				</div>

							</div>

';
}


?>			

	<div class="modal fade" id="exampleModal"  >
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h7 class="modal-title text-center">SEND GIFT TO <br><i class="fa fa-gift"></i> <?php echo"$vendor";?> </h7>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				
					<form id="paymentForm">
	 
	  				   <div class="form-group">
					   <label for="name">Select Gift To Buy</label>
						<select id="poplink" name="poplink"  onchange="popup('poplink', 'banner')" aria-required="true" class="form-control">
						 
					 
						<option value="">Gift Option</option>
						<option value="Diamond">Diamond </option>
						<option value="Gold">Gold </option>
						<option value="Sliver">Sliver </option>
						<option value="Bronze">Bronze </option> 
						</select>
				   </div>
				   

					<div class="form-group">
					<label for="name">Sender FullName</label>
					<input type="text"   id="first_name" name="first_name"   class="form-control" placeholder="Sender name"   required />
					</div>

					<div class="form-group">
					<label for="name">Sender Email</label>
					<input type="text"   id="email_address" name="first_name"   class="form-control" placeholder="Enter email"   required />
					</div>


					<div class="form-group"  id="banner">

					</div>


						 
						 <input type="text"  id="last_name"     name="last_name"    value="<?php echo$row['event_id']; ?>"   hidden />
						 
						 <input type="email" id="username"      name="username"     value="<?php echo$row['username']; ?>"      hidden  />
						 
						 <input type="text"  id="id"            name="id"           value="<?php echo$ref_id; ?>"        hidden />
						
						<div class="right-w3l">
							<input type="submit" onclick="payWithPaystack()"  class="form-control" value="Buy Gift">
						</div> 
					 
						
					</form>
					
					
				</div>
			</div>
		</div>
	</div>
	
	
	
			</div>
		</div>
	</div>
	<!-- //Event Page -->

 

	<!-- footer -->
	<footer>
		<div class="footer-top-first">
			<div class="container py-md-5 py-sm-4 py-3">
				<!-- footer first section -->
				<h2 class="footer-top-head-w3l font-weight-bold mb-2">Owembe Extra :</h2>
				<p class="footer-main mb-4">
					 is a new innovations, that makes your event count, receive and count all your valuable prospect guest . Addtionally
				Owembe extra provides a platform for you to receive an online coded gift from  your lovely friends and family around the globe. Our joy is to  
				make your events productive and give your  events an online visibilities. 
				</p>
				<!-- //footer first section -->
				<!-- footer second section -->
				<div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fa fa-gift" style="color:#c908bd;"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Set Up Event</h3>
								<p>Today & Receive Gift</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer my-md-0 my-4">
						<div class="row">
							<div class="col-4 icon-fot" >
								<i class="fa fa-users"  style="color:#c908bd;"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Assign Seat  </h3>
								<p>Number to invited Guest</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="far fa-photo"  style="color:#c908bd;"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Free IV Card </h3>
								<p>For Your Event</p>
							</div>
						</div>
					</div>
				</div>
				<!-- //footer second section -->
			</div>
		</div>
	
	<!-- footer third section -->
		<div class="w3l-middlefooter-sec">
			<div class="container py-md-5 py-sm-4 py-3">
				<div class="row footer-info w3-agileits-info">
					<!-- footer categories -->
					<div class="col-md-3 col-sm-6 footer-grids">
						<h3 class="text-white font-weight-bold mb-3">Event Categories</h3>
						<ul>
							<li class="mb-3">
								<a href="#">Birthday </a>
							</li>
							<li class="mb-3">
								<a href="#">Wedding</a>
							</li>
							<li class="mb-3">
								<a href="#">Anniversary</a>
							</li>
							<li class="mb-3">
								<a href="#">House Warming</a>
							</li>
							<li class="mb-3">
								<a href="#">Celebration Of Life</a>
							</li>
							<li>
								<a href="#">Other Events</a>
							</li>
						</ul>
					</div>
					<!-- //footer categories -->
					<!-- quick links -->
					<div class="col-md-3 col-sm-6 footer-grids mt-sm-0 mt-4">
						<h3 class="text-white font-weight-bold mb-3">Quick Links</h3>
						<ul>
							<li class="mb-3">
								<a href="about.html">About Us</a>
							</li>
							<li class="mb-3">
								<a href="contact.html">Contact Us</a>
							</li>

							<li class="mb-3">
								<a href="faqs.html">Faqs</a>
							</li>
							<li class="mb-3">
								<a href="terms.html">Terms of use</a>
							</li>
							<li>
								<a href="privacy.html">Privacy Policy</a>
							</li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 footer-grids mt-md-0 mt-4">
						<h3 class="text-white font-weight-bold mb-3">Get in Touch</h3>
						<ul>
							<li class="mb-3">
								<i class="fas fa-map-marker"></i> 343, Agege Motor Road. Lagos</li>
							<li class="mb-3">
								<i class="fas fa-mobile"></i> +2347036561809 </li>
							<li class="mb-3">
								<i class="fas fa-phone"></i> +2348094903086 </li>
							<li class="mb-3">
								<i class="fas fa-envelope"></i>
								<a href="mailto:surpport@owambextra.co"> surpport@owambextra.com</a>
							</li>
							 
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 footer-grids w3l-agileits mt-md-0 mt-4">
						<!-- newsletter -->
						<h3 class="text-white font-weight-bold mb-3">Newsletter</h3>
						<p class="mb-3">Get an update from us!</p>
						<form action="#" method="post">
							<div class="form-group">
								<input type="email" class="form-control" placeholder="Email" name="email" required="">
								<input type="submit" value="Go">
							</div>
						</form>
						<!-- //newsletter -->
						<!-- social icons -->
						<div class="footer-grids  w3l-socialmk mt-3">
							<h3 class="text-white font-weight-bold mb-3">Follow Us on</h3>
							<div class="social">
								<ul>
									<li>
										<a class="icon fb" href="#">
											<i class="fab fa-facebook-f"></i>
										</a>
									</li>
									<li>
										<a class="icon tw" href="#">
											<i class="fab fa-twitter"></i>
										</a>
									</li>
									<li>
										<a class="icon gp" href="#">
											<i class="fab fa-google-plus-g"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- //social icons -->
					</div>
				</div>
				<!-- //quick links -->
			</div>
		</div>
 
	</footer>
	<!-- //footer -->
	<!-- copyright -->
	<div class="copy-right py-3">
		<div class="container">
		<?php
	include"footer.php";
		?>
		</div>
	</div>

 <script>

$(document).ready(function(){

    var countNow = <?php echo$_GET['id']; ?>;
		  
 //alert(countNow);
 
   $.ajax({
	url:"pageajax.php",
	method:"POST",
	data:{page:'Reserve', action:'count', countNow:countNow},
	success:function(data)
	{
	 
		$('#guestCount').html('<span>'+data+'</span>');
	  
	}
  });


 $('#user_login').on('click', function(){


const fuLName = document.querySelector('#visitor_name').value;
const fuLNo   = document.querySelector('#visitor_number').value;
const eventId = document.querySelector('#event_id').value;
const eUser   = document.querySelector('#event_username').value;
 //alert(fuLName);
  
  
 
		  
		  $.ajax({
			url:"pageajax.php",
			method:"POST",
			 data:{page:'Reserve', action:'seat', fuLName:fuLName, fuLNo:fuLNo, eventId:eventId, eUser:eUser},
			dataType:"json",
			beforeSend:function()
			{
			  $('#user_login').attr('disabled', 'disabled');
			  $('#user_login').val('Please Wait...');
			},
			success:function(data)
			{
				  if(data.success)
				  {
						 $('#message').html('<div class="alert alert-success">'+data.success+'</div>');
						 //$('#guestCount').html('<span>'+data.count+'</span>');
									
						 $('#user_login').attr('disabled', true);
						 $('#user_login').val('Seat Reserved');
				  
				  }
				  else
				  {
						$('#msg').html('<div class="text-danger">'+data.error+'</div>');
						$('#user_login').attr('disabled', false);
						$('#user_login').val('Reserve a Seat');
				  }


			}
			
	});
		

	 
 	  

});




});
</script>

	
 <script src="js/jquery-2.2.3.min.js"></script>


 

	<!-- flexslider -->
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

	<script src="js/jquery.flexslider.js"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
 
	<script src="js/SmoothScroll.min.js"></script>
 
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>

	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
 
	<script src="js/bootstrap.js"></script>
 
</body>

</html>
 <script src="https://js.paystack.co/v1/inline.js"></script> 		
 <script>
const countNow = <?php echo$_GET['id']; ?>;
const paymentForm = document.getElementById('paymentForm');

	
	
paymentForm.addEventListener("submit", payWithPaystack, false);

function payWithPaystack(e) {

  e.preventDefault();

  let handler = PaystackPop.setup({

    key: 'pk_test_e71cc81bac23486cee2d272af354ef96f79ba336', //*******************This  public key will be Replace with your Oxford Public key*********************


	email:document.getElementById("email_address").value,
	amount:document.getElementById("amount").value * 100,
	ref:document.getElementById("id").value,
    firstname:document.getElementById("first_name").value,
	lastname: document.getElementById("username").value,
	
    phone: document.getElementById("last_name").value,
	 
    //''+Math.floor((Math.random() * 1000000000) + 1),

    onClose: function(){
		
      alert('Transaction Cancel.');		
       // window.location = "http://127.0.0.1/owambextra.com/eventpage.php?id="+countNow;
        window.location = "https://owambextra.gse-mart.com/gift_verify.php?reference="+countNow;

    },

    callback: function(response){

      let message = 'Gift Payment Completed! Reference: ' + response.reference;
      alert(message);
 	// window.location ="http://127.0.0.1/owambextra.com/gift_verify.php?reference="+ response.reference; //********THIS DOMAIN NAME WILL BE CHANGE********************
 	 window.location ="https://owambextra.gse-mart.com/gift_verify.php?reference="+ response.reference; //********THIS DOMAIN NAME WILL BE CHANGE********************

    }

  });

  handler.openIframe();

}

</script> 
 
 
