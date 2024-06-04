<?php



					
					$font   = dirname(__FILE__) . '.\img_gallery\font\Lobster-Regular.ttf'; 
    				$font2  = dirname(__FILE__) . '.\img_gallery\font\Poppins-Bold.ttf'; 
  				    $font22 = dirname(__FILE__) . '.\img_gallery\font\Poppins-Regular.ttf'; 
    				$font3  = dirname(__FILE__) . '.\img_gallery\font\Pacifico-Regular.ttf'; 
    				$font4  = dirname(__FILE__) . '.\img_gallery\font\Cardo-Regular.ttf'; 
    			    $font5  = dirname(__FILE__) . '.\img_gallery\font\OleoScriptSwashCaps-Regular.ttf'; 
 		 /*	
    			    $font   = './img_gallery/font/Lobster-Regular.ttf'; 
    				$font2  = './img_gallery/font/Poppins-Bold.ttf'; 
    				$font22 = './img_gallery/font/Poppins-Regular.ttf'; 
    				$font3  = './img_gallery/font/Pacifico-Regular.ttf'; 
    			    $font4  = './img_gallery/font/Cardo-Regular.ttf'; 
					$font5  ='./img_gallery/font/OleoScriptSwashCaps-Regular.ttf';
		 
	 		 */		 
	
	
	
						$event_banner = imagecreatefromjpeg("img_gallery/g19.jpg");
						
						$event_ban=time();
			/*			//COLOR(white white)	1 
						$red      = imagecolorallocate($event_banner, 250, 250, 250);
						$default  = imagecolorallocate($event_banner, 250, 250, 250); 
                        $bblack   = ImageColorAllocate($event_banner, 250, 250, 250);
						
						//COLOR(black and black  )	3
						$red      = imagecolorallocate($event_banner, 22, 22, 22);
						$default  = imagecolorallocate($event_banner, 22, 22, 22); 
                        $bblack   = ImageColorAllocate($event_banner, 22, 22, 22);
           
		   				//COLOR(white and black  )	3
						$red      = imagecolorallocate($event_banner, 250, 250, 250);
						$default  = imagecolorallocate($event_banner, 250, 250, 250); 
                        $bblack   = ImageColorAllocate($event_banner, 22, 22, 22);
						
						//COLOR(yello and yellow  )	3
						$red      = imagecolorallocate($event_banner, 229, 240, 28);
						$default  = imagecolorallocate($event_banner, 229, 240, 28); 
                        $bblack   = ImageColorAllocate($event_banner, 229, 240, 28);
						
						//COLOR(blue and blue  )	3
						$red      = imagecolorallocate($event_banner, 15,  32, 125);
						$default  = imagecolorallocate($event_banner, 15,  32, 125); 
                        $bblack   = ImageColorAllocate($event_banner, 15,  32, 125);
						
					   //COLOR(Pink and Pink  )	3
						$red      = imagecolorallocate($event_banner, 240, 28, 169);
						$default  = imagecolorallocate($event_banner, 240, 28, 169); 
                        $bblack   = ImageColorAllocate($event_banner, 240, 28, 169);

///////////////////////////////////////////////////////////////////////
		   			   //COLOR(blue and white )	2 
						$red      = imagecolorallocate($event_banner, 250, 250, 250);
						$default  = imagecolorallocate($event_banner, 250, 250, 250); 
                        $bblack   = ImageColorAllocate($event_banner, 15,  32, 125);
						
						
						//COLOR(white and gold  )	3
						$red      = imagecolorallocate($event_banner, 250, 250, 250);
						$default  = imagecolorallocate($event_banner, 250, 250, 250); 
                        $bblack   = ImageColorAllocate($event_banner, 242, 230, 65);
						
					    
						//COLOR(black and blue  )	4 
						$red      = imagecolorallocate($event_banner, 242, 230, 65);
						$default  = imagecolorallocate($event_banner, 242, 230, 65); 
                        $bblack   = ImageColorAllocate($event_banner, 22, 22, 22);
						
						
						//COLOR(black and blue  )	5
						$red      = imagecolorallocate($event_banner, 15,  32, 125);
						$default  = imagecolorallocate($event_banner, 15,  32, 125); 
                        $bblack   = ImageColorAllocate($event_banner, 22, 22, 22);


						//COLOR(gold and gold  )	3
						$red      = imagecolorallocate($event_banner, 242, 230, 65);
						$default  = imagecolorallocate($event_banner, 242, 230, 65); 
                        $bblack   = ImageColorAllocate($event_banner, 242, 230, 65);
           */

						//COLOR(black and blue  )	4 
						$red      = imagecolorallocate($event_banner, 22, 22, 22);
						$default  = imagecolorallocate($event_banner, 22, 22, 22); 
                        $bblack   = ImageColorAllocate($event_banner, 22, 22, 22);

						
						$top      = "Lets Celebrate";
						$vendor   = strtoupper("SEGUN ADELANWA");
						$location = "Event Venue:";
						$event_n  = strtolower("Birthday Party");
						$event    = ucwords($event_n);
						$address  = strtolower("47,Ogungbaye street"); 
						
						$invite   = "Invitaion Status";
						$status   = ucwords("Strictly BY Invitation");
			
						$realtime = date('h:i:sa');
						$realdate = date("d-M-Y");
						
						$footer   = "Free IV @ Owambextra.com";
						$city     = ucfirst("Ikeja");
						$state    = ucfirst("Lagos State");
						$country  = ucfirst("Nigeria");
						$date ="Date:";
						$time ="Time:";
						$rsvp ="----RSVP----";
						$rsvpname ="Tolani Bukky";
						
						$dcode ="Dress Code";
						$dresscode =ucwords("Pink On Gold");
						
						$contact ="07080492155";
						$line ="_____________";
						$line2 ="*****************************";

			//                                    FONT AREA LEFT(X,H),  TOP(Y,V)
						imagettftext($event_banner, 25, 0,     280,      110,   $red,        $font5,  "$top");
						imagettftext($event_banner, 37, 0,     120,      200,  $bblack,     $font5,  "$vendor");
						
						imagettftext($event_banner, 50, 0,     120,      350,  $default,    $font,  "$event");////white
						imagettftext($event_banner, 20, 0,     150,      400,  $bblack,     $font,   "$line2");
						
						imagettftext($event_banner, 30, 0,     80,      500,  $bblack,     $font5,   "$location");
						imagettftext($event_banner, 20, 0,     80,      510,  $bblack,     $font,   "$line");
						imagettftext($event_banner, 20,  0,    80,      550,  $bblack,     $font22, "$address");
						imagettftext($event_banner, 20,  0,    80,      580,  $bblack,     $font22, "$city"); 
						imagettftext($event_banner, 20,  0,    80,      610,  $bblack,     $font22, "$state"); 
						imagettftext($event_banner, 20,  0,    80,      640,  $bblack,     $font22, "$country"); 	
						
						imagettftext($event_banner, 30, 0,    500,      500,  $bblack,     $font5,  "$date");	
						imagettftext($event_banner, 20, 0,    500,      550,  $bblack,     $font22, "$realdate");						
						imagettftext($event_banner, 30, 0,    500,      600,  $bblack,     $font5,  "$time");
						imagettftext($event_banner, 20, 0,    500,      650,  $bblack,     $font22, "$realtime");


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						
						imagettftext($event_banner, 20, 0,    300,      700,  $bblack,     $font,   "$dcode");
						imagettftext($event_banner, 19, 0,    300,      720,  $bblack,     $font,   "$line");
						imagettftext($event_banner, 19, 0,    300,      750,  $default,    $font,   "$dresscode");   //white

						
						imagettftext($event_banner, 20, 0,    300,      790,  $bblack,     $font,   "$rsvp"); 
						imagettftext($event_banner, 19, 0,    300,      810,  $default,    $font,   "$rsvpname");   //white
						imagettftext($event_banner, 19, 0,    300,      840,  $default,    $font,   "$contact");    //white
						
						


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
						
						
						imagettftext($event_banner, 20, 0,    270,      900,  $bblack,     $font,   "$invite");
						imagettftext($event_banner, 19, 0,    290,      910,  $bblack,     $font,   "$line");
						imagettftext($event_banner, 19, 0,    260,      940, $default,    $font,   "$status");  //white
						
						imagettftext($event_banner, 15,  0,    200,     1050,  $bblack,     $font22,  "$footer");

					  

						imagejpeg($event_banner, "public_banner/".md5($event_ban).'.jpg');