<?php  

 header("Content-type: image/jpeg");
 $font = dirname(__FILE__) . '.\font\Lobster-Regular.ttf'; 
 $font2 = dirname(__FILE__) . '.\font\Poppins-Bold.ttf'; 
 $font22 = dirname(__FILE__) . '.\font\Poppins-Regular.ttf'; 
 $font3 = dirname(__FILE__) . '.\font\Pacifico-Regular.ttf'; 
 $font4 = dirname(__FILE__) . '.\font\Cardo-Regular.ttf'; 
    //$image = imagecreate(400,300);
    //$event_banner = dirname(__FILE__) . '\event_banners.jpeg';
	
	$event_banner = imagecreatefromjpeg("g3.jpeg");
    $red   = imagecolorallocate($event_banner, 254, 15, 15);
    $default = imagecolorallocate($event_banner, 226, 168, 7);
    $other = ImageColorAllocate($event_banner, 85, 154, 201);
    $white = ImageColorAllocate($event_banner, 167, 170, 170);

     
	$top = "YOU ARE INVITED TO";
	$head = "SAVE THE DATE!";
	$location = "Location:";
	$event = "WEDDING PARTY!";
    $vendor  = "ADEWALE SEGUN";
    $address  = "343, Agege Motor Road";
    $invite  = "Invitaion Status:";
    $status  = "STRICT";
    $time  = "Time: 9:00 Am";
    $date  = "Date: 12/07/2021";
    $footer  = "Free banner @ Owambextra.com";
	$city = "Mushin";
	$state = "Lagos State";
	$country = "Nigeria";
	$mark ="|";
	$line ="_______________";
	
 
   //                                     FONT   AREA LEFT(X),TOP(Y)
				imagettftext($event_banner, 11, 90, 150, 400, $red,     $font3,   "$head");
				imagettftext($event_banner, 9,  0, 250, 100,   $red,     $font2, "$top");
				imagettftext($event_banner, 18, 1, 200, 190,  $white,   $font3,  "$vendor");
				
				imagettftext($event_banner, 16, 1, 230, 270,  $default, $font, "$event");
				
				imagettftext($event_banner, 12, 0, 300, 330,  $other, $font, "$location");
				imagettftext($event_banner, 14, 0, 250, 360,  $default, $font, "$address");
				
				imagettftext($event_banner, 14, 0, 280, 380,  $white, $font, "$mark");
				imagettftext($event_banner, 14, 0, 390, 380,  $white, $font, "$mark"); 
				
				
				imagettftext($event_banner, 9, 0, 220, 380,  $red, $font22, "$city"); 
				imagettftext($event_banner, 9, 0, 300, 380,  $red, $font22, "$state"); 
				imagettftext($event_banner, 9, 0, 410, 380,  $red, $font22, "$country"); 
				
				
				imagettftext($event_banner, 12, 0, 280, 420,  $other, $font, "$invite");
				imagettftext($event_banner, 12, 0, 300, 440,  $default, $font, "$status");
				imagettftext($event_banner, 12, 0, 280, 450,  $default, $font, "$line");
				
				imagettftext($event_banner, 12, 0, 280, 500,  $default, $font, "$time");
				imagettftext($event_banner, 12, 0, 280, 530,  $default, $font, "$date");
				imagettftext($event_banner, 8,  0, 140, 560,  $red, $font22, "$footer");

  
  
		$target = dirname(__FILE__) . '..\public_banner'; 
		//$md5_image2=md5($event_banner).'.jpg';
		imagejpeg($event_banner);
		//imagejpeg($event_banner, "../public_banner/".time().'.jpg');
		 
         imagedestroy($event_banner);
 
?>

