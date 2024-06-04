   <?php
         	
			////////////// GRAPHIC WITHOUT IMAGE
    				$font   = dirname(__FILE__) . '.\..\img_gallery\font\Lobster-Regular.ttf'; 
    				$font2  = dirname(__FILE__) . '.\..\img_gallery\font\Poppins-Bold.ttf'; 
  				    $font22 = dirname(__FILE__) . '.\..\img_gallery\font\Poppins-Regular.ttf'; 
    				$font3  = dirname(__FILE__) . '.\..\img_gallery\font\Pacifico-Regular.ttf'; 
    				$font4  = dirname(__FILE__) . '.\..\img_gallery\font\Cardo-Regular.ttf'; 
    				$font5  = dirname(__FILE__) . '.\..\img_gallery\font\OleoScriptSwashCaps-Regular.ttf'; 
    			/*
    			    $font   = '../img_gallery/font/Lobster-Regular.ttf'; 
    				$font2  = '../img_gallery/font/Poppins-Bold.ttf'; 
    				$font22 = '../img_gallery/font/Poppins-Regular.ttf'; 
    				$font3  = '../img_gallery/font/Pacifico-Regular.ttf'; 
    			    $font4  = '../img_gallery/font/Cardo-Regular.ttf'; 
					$font5  ='./../img_gallery/font/OleoScriptSwashCaps-Regular.ttf
				*/ 
                        $event_id=time();
						$event_banner = imagecreatefromjpeg("../img_gallery/g1.jpeg");
						
						$event_ban=md5($event_id).'.jpg';
						 
 						$red      = imagecolorallocate($event_banner, 254, 15, 15);
						$default  = imagecolorallocate($event_banner, 193, 153, 57);
						$other    = ImageColorAllocate($event_banner, 85,  154, 201);
						$white    = ImageColorAllocate($event_banner, 167, 170, 170);
                        $bblack   = ImageColorAllocate($event_banner, 15,  32, 125);

						$head = "SAVE THE DATE!!";
						$top = "Lets Celebrate";
						$vendor  = strtoupper('ADELANWA SEUN ');
						$location = "Location:";
						$event_n = strtolower('Induction Lunch');
						$event = ucwords($event_n);
						$address  =strtolower('20, SANUSI STREET'); 
						
						$invite  = "Invitaion Status";
						$status  = 'Strictly By Invitation';
			
						$realtime  = "9:00 AM" ;
						$realdate  = "20/09/2021";//.$_POST['event_startdate'];
						
						$footer  = "Free IV @ Owambextra.com";
						$city = 'Agege Motor Road';//$_POST['event_city'];
						$state = 'Lagos State';//$_POST['event_state'];
						$country = 'Nigeria';//$_POST['event_country'];
						$date ="Date:";
						$time ="Time:";
						$rsvp ="RSVP";
						
						$dcode ="Dress Code";
						$dresscode =ucwords("purple and gold");
						
						$contact ="O7O8O492155";
						$line ="_____________";
						$line2 ="***************";

			//                                    FONT AREA  LEFT(X,H), TOP(Y,V)
						
						imagettftext($event_banner, 14, 0,     250,      90,   $red,        $font5,  "$top");
						imagettftext($event_banner, 15, 0,     220,      130,  $bblack,     $font4,  "$vendor");
						
						imagettftext($event_banner, 25, 0,     210,      190,  $default,    $font5,  "$event");
						imagettftext($event_banner, 12, 0,     250,      220,  $bblack,     $font,   "$line2");
						
						imagettftext($event_banner, 14, 0,     170,      270,  $bblack,     $font,   "$location");
						imagettftext($event_banner, 12, 0,     170,      285,  $bblack,     $font,   "$line");
						imagettftext($event_banner, 9,  0,     170,      300,  $bblack,     $font22, "$address");
						imagettftext($event_banner, 9,  0,     170,      320,  $bblack,     $font22, "$city"); 
						imagettftext($event_banner, 9,  0,     170,      340,  $bblack,     $font22, "$state"); 
						imagettftext($event_banner, 9,  0,     170,      360,  $bblack,     $font22, "$country"); 	
						
						imagettftext($event_banner, 15, 0,    380,      270,  $bblack,     $font5,  "$date");	
						imagettftext($event_banner, 12, 0,    380,      300,  $bblack,     $font22, "$realdate");
						
						imagettftext($event_banner, 15, 0,    380,      340,  $bblack,     $font5,  "$time");
						imagettftext($event_banner, 12, 0,    380,      370,  $bblack,     $font22, "$realtime");


						
						
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						imagettftext($event_banner, 12, 0,    200,      410,  $bblack,     $font,   "$rsvp");
						imagettftext($event_banner, 12, 0,    200,      420,  $bblack,     $font,   "$line");
						imagettftext($event_banner, 12, 0,    200,      440,  $default,    $font,   "$contact"); 
						
						

						imagettftext($event_banner, 12, 0,    330,      410,  $bblack,     $font,   "$dcode");
						imagettftext($event_banner, 12, 0,    330,      420,  $bblack,     $font,   "$line");
						imagettftext($event_banner, 12, 0,    330,      440,  $default,    $font,   "$dresscode"); 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
						
						
						imagettftext($event_banner, 14, 0,    230,      500,  $bblack,     $font,   "$invite");
						imagettftext($event_banner, 12, 0,    240,      510,  $bblack,     $font,   "$line");
						imagettftext($event_banner, 12, 0,    220,      530,  $default,    $font,   "$status");
						
						imagettftext($event_banner, 8,  0,    140,      570,  $bblack,     $font22,  "$footer");
 
						 
				
						imagejpeg($event_banner, "../public_banner/".md5($event_id).'.jpg');
						 
			       
		/*	   
 	//////////////GRAPHIC WITH IMAGE
			
    				$font   = dirname(__FILE__) . '.\..\img_gallery\font\Lobster-Regular.ttf'; 
    				$font2  = dirname(__FILE__) . '.\..\img_gallery\font\Poppins-Bold.ttf'; 
  				    $font22 = dirname(__FILE__) . '.\..\img_gallery\font\Poppins-Regular.ttf'; 
    				$font3  = dirname(__FILE__) . '.\..\img_gallery\font\Pacifico-Regular.ttf'; 
    				$font4  = dirname(__FILE__) . '.\..\img_gallery\font\Cardo-Regular.ttf'; 
    				$font5  = dirname(__FILE__) . '.\..\img_gallery\font\OleoScriptSwashCaps-Regular.ttf'; 
    			 
    			    $font   = '../img_gallery/font/Lobster-Regular.ttf'; 
    				$font2  = '../img_gallery/font/Poppins-Bold.ttf'; 
    				$font22 = '../img_gallery/font/Poppins-Regular.ttf'; 
    				$font3  = '../img_gallery/font/Pacifico-Regular.ttf'; 
    			    $font4  = '../img_gallery/font/Cardo-Regular.ttf'; 
					$font5  ='./../img_gallery/font/OleoScriptSwashCaps-Regular.ttf
				 
                        $event_id=time();
						$event_banner = imagecreatefromjpeg("../img_gallery/g1.jpeg");
						
						$event_ban=md5($event_id).'.jpg';
						 
 						$red      = imagecolorallocate($event_banner, 254, 15, 15);
						$default  = imagecolorallocate($event_banner, 193, 153, 57);
						$other    = ImageColorAllocate($event_banner, 85,  154, 201);
						$white    = ImageColorAllocate($event_banner, 167, 170, 170);
                        $bblack   = ImageColorAllocate($event_banner, 15,  32, 125);

						$head = "SAVE THE DATE!!";
						$top = "Lets Celebrate";
						$vendor  = strtoupper('ADELANWA SEUN ');
						$location = "Location:";
						$event_n = strtolower('Induction Lunch');
						$event = ucwords($event_n);
						$address  =strtolower('20, SANUSI STREET'); 
						
						$invite  = "Invitaion Status";
						$status  = 'Strictly By Invitation';
			
						$realtime  = "9:00 AM" ;
						$realdate  = "20/09/2021";//.$_POST['event_startdate'];
						
						$footer  = "Free IV @ Owambextra.com";
						$city = 'Agege Motor Road';//$_POST['event_city'];
						$state = 'Lagos State';//$_POST['event_state'];
						$country = 'Nigeria';//$_POST['event_country'];
						$date ="Date:";
						$time ="Time:";
						$rsvp ="RSVP";
						
						$dcode ="Dress Code";
						$dresscode =ucwords("purple and gold");
						
						$contact ="O7O8O492155";
						$line ="_____________";
						$line2 ="***************";

			//                                    FONT AREA  LEFT(X,H), TOP(Y,V)
						
						imagettftext($event_banner, 14, 0,     250,      90,   $red,        $font5,  "$top");
						imagettftext($event_banner, 15, 0,     220,      130,  $bblack,     $font4,  "$vendor");
						
						imagettftext($event_banner, 25, 0,     210,      190,  $default,    $font5,  "$event");
						imagettftext($event_banner, 12, 0,     250,      220,  $bblack,     $font,   "$line2");
						
						imagettftext($event_banner, 14, 0,     170,      270,  $bblack,     $font,   "$location");
						imagettftext($event_banner, 12, 0,     170,      285,  $bblack,     $font,   "$line");
						imagettftext($event_banner, 9,  0,     170,      300,  $bblack,     $font22, "$address");
						imagettftext($event_banner, 9,  0,     170,      320,  $bblack,     $font22, "$city"); 
						imagettftext($event_banner, 9,  0,     170,      340,  $bblack,     $font22, "$state"); 
						imagettftext($event_banner, 9,  0,     170,      360,  $bblack,     $font22, "$country"); 	
						
						imagettftext($event_banner, 15, 0,    380,      270,  $bblack,     $font5,  "$date");	
						imagettftext($event_banner, 12, 0,    380,      300,  $bblack,     $font22, "$realdate");
						
						imagettftext($event_banner, 15, 0,    380,      340,  $bblack,     $font5,  "$time");
						imagettftext($event_banner, 12, 0,    380,      370,  $bblack,     $font22, "$realtime");


						
						
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						imagettftext($event_banner, 12, 0,    200,      410,  $bblack,     $font,   "$rsvp");
						imagettftext($event_banner, 12, 0,    200,      420,  $bblack,     $font,   "$line");
						imagettftext($event_banner, 12, 0,    200,      440,  $default,    $font,   "$contact"); 
						
						

						imagettftext($event_banner, 12, 0,    330,      410,  $bblack,     $font,   "$dcode");
						imagettftext($event_banner, 12, 0,    330,      420,  $bblack,     $font,   "$line");
						imagettftext($event_banner, 12, 0,    330,      440,  $default,    $font,   "$dresscode"); 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
						
						
						imagettftext($event_banner, 14, 0,    230,      500,  $bblack,     $font,   "$invite");
						imagettftext($event_banner, 12, 0,    240,      510,  $bblack,     $font,   "$line");
						imagettftext($event_banner, 12, 0,    220,      530,  $default,    $font,   "$status");
						
						imagettftext($event_banner, 8,  0,    140,      570,  $bblack,     $font22,  "$footer");
 
						 
						$image_size   = getimagesize('../images/segun.jpg');
						$image_width  = $image_size[0];
						$image_height = $image_size[1];

						//$new_size    = ($image_width + $image_height )/($image_width*($image_height/1100)); 
						//$new_width   = $image_width * $new_size;
						//$new_height  = $image_height * $new_size;
						$new_image2  = imagecreatetruecolor($image_width, $image_height);
						$old_img     = imagecreatefromjpeg('../images/segun.jpg'); 
						imagecopyresized($new_image2, $old_img, 0, 0, 0, 0, 120, 120, $image_width, $image_height);
			
						//$watermark = imagecreatefromjpeg('../speaker.jpg');
						//$watermark_width  = imagesx($watermark);
						//$watermark_height = imagesy($watermark);
                               //                                 LEFT TOP LEFT TOP   W    H  OPACITY
						imagecopymerge($event_banner, $new_image2, 370, 455, 0, 0, 120,  120, 100);
						imagejpeg($event_banner, "../public_banner/".md5($event_id).'.jpg');
						 
			
*/
			
			
			 
						