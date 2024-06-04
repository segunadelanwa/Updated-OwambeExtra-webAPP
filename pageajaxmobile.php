<?php

header('content-type:	application/json;');
header("Access-Control-Allow-Origin:  * ");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");


include("config.php");

include("config_pageajax.php");

$loader = new Loader;
 
 
    if($_GET['action'] ==  'self_event_template')
	{
	    	$current_date  = date('Y-m-d');
        $encode = file_get_contents('php://input');
        $decode = json_decode($encode, true);
 
			      $event_id =time();

		 
					
                       include('font_directory.php');
	                   
						$event_banner = imagecreatefromjpeg($decode['banner_img1']);
						
						
						$text_color  = $decode['text_color'];
						 
                        include('text_color.php');


						
						$top      = "Lets Celebrate";
						$vendor   = strtoupper($decode['event_proxyfirstname'].' '.$decode['event_proxylastname']);
						$location = "Event Venue:";
						$event_n  = strtolower($decode['event_categories']);
						$event    = ucwords($event_n);
						$address  = strtolower($decode['event_location']);
						
						$invite   = "Invitaion Status";
						$status   = $decode['invitaion_degree'];
			
						$realtime = $decode['event_time'];
						$realdate = $decode['event_startdate'];
			
						$time  = "Time:".$decode['event_time'];
						$date  = "Date:".$decode['event_startdate'];
						
						$footer   = "Free IV @ Owambextra.com";
						$city     = ucfirst($decode['event_city']);
						$state    = ucfirst($decode['event_state']);
						$country  = ucfirst($decode['event_country']);
						$date ="Date:";
						$time ="Time:";
						$rsvp ="------RSVP------";
						$rsvpname =ucwords($decode['name_rsvp']);
						$contact =$decode['contact_rsvp'];
						
						
						$dcode ="Dress Code";
						$dresscode =ucwords($decode['event_shortnote']);
						
						$event_ban   = md5($event_id).'.jpg';
						
						$line ="_____________";
						$line2 ="*****************************";

			//                                   
			//                                    FONT AREA LEFT(X,H),  TOP(Y,V)
					    imagettftext($event_banner, 25, 0,     280,      110,  $red,        $font5,  "$top");
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
						imagettftext($event_banner, 19, 0,    300,      820,  $default,    $font,   "$rsvpname");   //white
						imagettftext($event_banner, 19, 0,    300,      850,  $default,    $font,   "$contact");    //white
						
						


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
						
						
						imagettftext($event_banner, 20, 0,    270,      900,  $bblack,     $font,   "$invite");
						imagettftext($event_banner, 19, 0,    290,      910,  $bblack,     $font,   "$line");
						imagettftext($event_banner, 19, 0,    260,      940,  $default,    $font,   "$status");  //white
						
						imagettftext($event_banner, 15,  0,    200,     1050,  $bblack,     $font22,  "$footer");

					  

						imagejpeg($event_banner, "public_banner/$event_ban");
						
			 
		 

 					$queryWallet =("INSERT INTO `public_event` VALUE (
					'', 
					'".mysqli_real_escape_string($homedb, $event_id)."',   
					'".mysqli_real_escape_string($homedb, $decode['event_proxyfirstname'])."', 
					'".mysqli_real_escape_string($homedb, $decode['event_proxylastname'])."',
					'".mysqli_real_escape_string($homedb, $decode['username'])."',  
					'".mysqli_real_escape_string($homedb, $decode['event_categories'])."',  
					'".mysqli_real_escape_string($homedb, $event_ban)."',  
					'".mysqli_real_escape_string($homedb, $decode['event_startdate'])."', 
					'".mysqli_real_escape_string($homedb, $decode['event_time'])."', 
					'".mysqli_real_escape_string($homedb, $decode['event_enddate'])."', 
					'".mysqli_real_escape_string($homedb, '')."',
					'".mysqli_real_escape_string($homedb, $decode['event_location'])."', 
					'".mysqli_real_escape_string($homedb, $decode['event_city'])."', 
					'".mysqli_real_escape_string($homedb, $decode['event_state'])."', 
					'".mysqli_real_escape_string($homedb, $decode['event_country'])."', 
					'".mysqli_real_escape_string($homedb, $decode['event_shortnote'])."',
					'".mysqli_real_escape_string($homedb, $decode['expected_no'])."',
					'".mysqli_real_escape_string($homedb, '0')."',
					'".mysqli_real_escape_string($homedb, '0')."',
					'".mysqli_real_escape_string($homedb, $decode['event_proxyphone'])."',
					'".mysqli_real_escape_string($homedb, $decode['invitaion_degree'])."',
					'".mysqli_real_escape_string($homedb, $ip_address)."',
					'".mysqli_real_escape_string($homedb, $current_date)."',
					'".mysqli_real_escape_string($homedb, 'self')."',
					'".mysqli_real_escape_string($homedb, 'preview')."'
					)");
					
					if(mysqli_query($homedb, $queryWallet))
					{
					 

            					$queryWallet =("INSERT INTO `self_wallet` VALUE (
            					'', 
            					'".mysqli_real_escape_string($homedb, $event_id)."',  
            					'".mysqli_real_escape_string($homedb, $decode['username'])."',  
            					'".mysqli_real_escape_string($homedb, $decode['event_proxyfirstname'])."', 
            					'".mysqli_real_escape_string($homedb, $decode['event_proxylastname'])."', 
            					'".mysqli_real_escape_string($homedb, $decode['event_proxyphone'])."', 
            					'".mysqli_real_escape_string($homedb, '0')."', 
            					'".mysqli_real_escape_string($homedb, '0')."', 
            					'".mysqli_real_escape_string($homedb, $current_datetime)."',
            					'".mysqli_real_escape_string($homedb, '')."', 
            					'".mysqli_real_escape_string($homedb, '')."',  
            					'".mysqli_real_escape_string($homedb, 'open')."'  
            					)");
            					
            					mysqli_query($homedb, $queryWallet);
            					
            					
                            $output[] = array(
                                'success'	=> '1',
                                'feedback'	=> 'You have successfully created an event. Click okay to preview'
                            );
            			
                             
                             	echo json_encode($output);	
                  	}
                  	else
                  	{
                            			$output[] = array(
                            				'success'		=> '0',
                            				'feedback'	    => 'An error has occured'
                            			);
                			
                		  
                		  	echo json_encode($output);	
                				
                  	}	
	 

		
 
	} 
	
	
    if($_GET['action'] ==  'proxy_event_template')
	{
	    	$current_date  = date('Y-m-d');
        $encode = file_get_contents('php://input');
        $decode = json_decode($encode, true);
 
			      $event_id =time();
 

						
 			
					
                       include('font_directory.php');
	                   
						$event_banner = imagecreatefromjpeg($decode['banner_img1']);
						
						
						$text_color  = $decode['text_color'];
						 
                        include('text_color.php');


						
						$top      = "Lets Celebrate";
						$vendor   = strtoupper($decode['event_proxyfirstname'].' '.$decode['event_proxylastname']);
						$location = "Event Venue:";
						$event_n  = strtolower($decode['event_categories']);
						$event    = ucwords($event_n);
						$address  = strtolower($decode['event_location']);
						
						$invite   = "Invitaion Status";
						$status   = $decode['invitaion_degree'];
			
						$realtime = $decode['event_time'];
						$realdate = $decode['event_startdate'];
			
						$time  = "Time:".$decode['event_time'];
						$date  = "Date:".$decode['event_startdate'];
						
						$footer   = "Free IV @ Owambextra.com";
						$city     = ucfirst($decode['event_city']);
						$state    = ucfirst($decode['event_state']);
						$country  = ucfirst($decode['event_country']);
						$date ="Date:";
						$time ="Time:";
						$rsvp ="------RSVP------";
						$rsvpname =ucwords($decode['name_rsvp']);
						$contact =$decode['contact_rsvp'];
						
						
						$dcode ="Dress Code";
						$dresscode =ucwords($decode['event_shortnote']);
						
						$event_ban   = md5($event_id).'.jpg';
						
						$line ="_____________";
						$line2 ="*****************************";

			//                                   
			//                                    FONT AREA LEFT(X,H),  TOP(Y,V)
					    imagettftext($event_banner, 25, 0,     280,      110,  $red,        $font5,  "$top");
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
						imagettftext($event_banner, 19, 0,    300,      820,  $default,    $font,   "$rsvpname");   //white
						imagettftext($event_banner, 19, 0,    300,      850,  $default,    $font,   "$contact");    //white
						
						


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
						
						
						imagettftext($event_banner, 20, 0,    270,      900,  $bblack,     $font,   "$invite");
						imagettftext($event_banner, 19, 0,    290,      910,  $bblack,     $font,   "$line");
						imagettftext($event_banner, 19, 0,    260,      940,  $default,    $font,   "$status");  //white
						
						imagettftext($event_banner, 15,  0,    200,     1050,  $bblack,     $font22,  "$footer");

					  

						imagejpeg($event_banner, "public_banner/$event_ban");
						
			 
		 

 					$queryWallet =("INSERT INTO `public_event` VALUE (
					'', 
					'".mysqli_real_escape_string($homedb, $event_id)."',   
					'".mysqli_real_escape_string($homedb, $decode['event_proxyfirstname'])."', 
					'".mysqli_real_escape_string($homedb, $decode['event_proxylastname'])."',
					'".mysqli_real_escape_string($homedb, $decode['username'])."',  
					'".mysqli_real_escape_string($homedb, $decode['event_categories'])."',  
					'".mysqli_real_escape_string($homedb, $event_ban)."',  
					'".mysqli_real_escape_string($homedb, $decode['event_startdate'])."', 
					'".mysqli_real_escape_string($homedb, $decode['event_time'])."', 
					'".mysqli_real_escape_string($homedb, $decode['event_enddate'])."', 
					'".mysqli_real_escape_string($homedb, '')."',
					'".mysqli_real_escape_string($homedb, $decode['event_location'])."', 
					'".mysqli_real_escape_string($homedb, $decode['event_city'])."', 
					'".mysqli_real_escape_string($homedb, $decode['event_state'])."', 
					'".mysqli_real_escape_string($homedb, $decode['event_country'])."', 
					'".mysqli_real_escape_string($homedb, $decode['event_shortnote'])."',
					'".mysqli_real_escape_string($homedb, $decode['expected_no'])."',
					'".mysqli_real_escape_string($homedb, '0')."',
					'".mysqli_real_escape_string($homedb, '0')."',
					'".mysqli_real_escape_string($homedb, $decode['event_proxyphone'])."',
					'".mysqli_real_escape_string($homedb, $decode['invitaion_degree'])."',
					'".mysqli_real_escape_string($homedb, $ip_address)."',
					'".mysqli_real_escape_string($homedb, $current_date)."',
					'".mysqli_real_escape_string($homedb, 'proxy')."',
					'".mysqli_real_escape_string($homedb, 'preview')."'
					)");
					
					if(mysqli_query($homedb, $queryWallet))
					{
					 

            					$queryWallet =("INSERT INTO `proxy_wallet` VALUE (
            					'', 
            					'".mysqli_real_escape_string($homedb, $event_id)."',  
            					'".mysqli_real_escape_string($homedb, $decode['username'])."',  
            					'".mysqli_real_escape_string($homedb, $decode['event_proxyfirstname'])."', 
            					'".mysqli_real_escape_string($homedb, $decode['event_proxylastname'])."', 
            					'".mysqli_real_escape_string($homedb, $decode['event_proxyphone'])."', 
            					'".mysqli_real_escape_string($homedb, '0')."', 
            					'".mysqli_real_escape_string($homedb, '0')."', 
            					'".mysqli_real_escape_string($homedb, $current_datetime)."',
            					'".mysqli_real_escape_string($homedb, '')."', 
            					'".mysqli_real_escape_string($homedb, '')."',  
            					'".mysqli_real_escape_string($homedb, 'open')."'  
            					)");
            					
            					mysqli_query($homedb, $queryWallet);
            					
            					
                            $output[] = array(
                                'success'	=> '1',
                                'feedback'	=> 'You have successfully created an event. Click okay to preview'
                            );
            			
                             
                             	echo json_encode($output);	
                  	}
                  	else
                  	{
                            			$output[] = array(
                            				'success'		=> '0',
                            				'feedback'	    => 'An error has occured'
                            			);
                			
                		  
                		  	echo json_encode($output);	
                				
                  	}	
	 

		
 
	} 	


	 
    if($_GET['action'] ==  'self_event_no_template')
	{
 
     //$encode = file_get_contents('php://input');
    //$decode = json_decode($encode, true);
 
   
         		  	
    
    $current_date  = date('Y-m-d'); 
    $event_id =time();
    $obj   = $_POST;
    $files = $obj;

 		
  	
						
					$loader->filedata = $_FILES['photo1'];
					$event_ban = $loader->Upload_file();				

			

		 

 					$queryWallet =("INSERT INTO `public_event` VALUE (
					'', 
					'".mysqli_real_escape_string($homedb, $event_id)."',   
					'".mysqli_real_escape_string($homedb, $_POST['event_proxyfirstname'])."', 
					'".mysqli_real_escape_string($homedb, $_POST['event_proxylastname'])."',
					'".mysqli_real_escape_string($homedb, $_POST['username'])."',  
					'".mysqli_real_escape_string($homedb, $_POST['event_categories'])."',  
					'".mysqli_real_escape_string($homedb, $event_ban)."',  
					'".mysqli_real_escape_string($homedb, $_POST['event_startdate'])."', 
					'".mysqli_real_escape_string($homedb, $_POST['event_time'])."', 
					'".mysqli_real_escape_string($homedb, $_POST['event_enddate'])."', 
					'".mysqli_real_escape_string($homedb, '')."',
					'".mysqli_real_escape_string($homedb, $_POST['event_location'])."', 
					'".mysqli_real_escape_string($homedb, $_POST['event_city'])."', 
					'".mysqli_real_escape_string($homedb, $_POST['event_state'])."', 
					'".mysqli_real_escape_string($homedb, $_POST['event_country'])."', 
					'".mysqli_real_escape_string($homedb, $_POST['event_shortnote'])."',
					'".mysqli_real_escape_string($homedb, $_POST['expected_no'])."',
					'".mysqli_real_escape_string($homedb, '0')."',
					'".mysqli_real_escape_string($homedb, '0')."',
					'".mysqli_real_escape_string($homedb, $_POST['event_proxyphone'])."',
					'".mysqli_real_escape_string($homedb, $_POST['invitaion_degree'])."',
					'".mysqli_real_escape_string($homedb, $ip_address)."',
					'".mysqli_real_escape_string($homedb, $current_date)."',
					'".mysqli_real_escape_string($homedb, 'self')."',
					'".mysqli_real_escape_string($homedb, 'preview')."'
					)");
					
					if(mysqli_query($homedb, $queryWallet))
					{
					 

            					$queryWallet =("INSERT INTO `self_wallet` VALUE (
            					'', 
            					'".mysqli_real_escape_string($homedb, $event_id)."',  
            					'".mysqli_real_escape_string($homedb, $_POST['username'])."',  
            					'".mysqli_real_escape_string($homedb, $_POST['event_proxyfirstname'])."', 
            					'".mysqli_real_escape_string($homedb, $_POST['event_proxylastname'])."', 
            					'".mysqli_real_escape_string($homedb, $_POST['event_proxyphone'])."', 
            					'".mysqli_real_escape_string($homedb, '0')."', 
            					'".mysqli_real_escape_string($homedb, '0')."', 
            					'".mysqli_real_escape_string($homedb, $current_datetime)."',
            					'".mysqli_real_escape_string($homedb, '')."', 
            					'".mysqli_real_escape_string($homedb, '')."',  
            					'".mysqli_real_escape_string($homedb, 'open')."'  
            					)");
            					
            					mysqli_query($homedb, $queryWallet);
            					
            					
                            $output[]= array(
                                'success'	=> '1',
                                'feedback'	=> 'You have successfully created an event. Click okay to preview'
                            );
            			
                             echo json_encode($output);	
                              
                  	}
                  	else
                  	{
                            			$output[]= array(
                            				'success'		=> '0',
                            				'feedback'	    => 'An error has occured'
                            			);
                			
                		  
                		  echo json_encode($output);	
                				
                  	}	
	 
	
 
 
	}
	
	
	 
    if($_GET['action'] ==  'proxy_event_no_template')
	{
 
     //$encode = file_get_contents('php://input');
    //$decode = json_decode($encode, true);
 
   
         		  	
    
    $current_date  = date('Y-m-d'); 
    $event_id =time();
    $obj   = $_POST;
    $files = $obj;

 		
  	
						
					$loader->filedata = $_FILES['photo1'];
					$event_ban = $loader->Upload_file();				

			

		 

 					$queryWallet =("INSERT INTO `public_event` VALUE (
					'', 
					'".mysqli_real_escape_string($homedb, $event_id)."',   
					'".mysqli_real_escape_string($homedb, $_POST['event_proxyfirstname'])."', 
					'".mysqli_real_escape_string($homedb, $_POST['event_proxylastname'])."',
					'".mysqli_real_escape_string($homedb, $_POST['username'])."',  
					'".mysqli_real_escape_string($homedb, $_POST['event_categories'])."',  
					'".mysqli_real_escape_string($homedb, $event_ban)."',  
					'".mysqli_real_escape_string($homedb, $_POST['event_startdate'])."', 
					'".mysqli_real_escape_string($homedb, $_POST['event_time'])."', 
					'".mysqli_real_escape_string($homedb, $_POST['event_enddate'])."', 
					'".mysqli_real_escape_string($homedb, '')."',
					'".mysqli_real_escape_string($homedb, $_POST['event_location'])."', 
					'".mysqli_real_escape_string($homedb, $_POST['event_city'])."', 
					'".mysqli_real_escape_string($homedb, $_POST['event_state'])."', 
					'".mysqli_real_escape_string($homedb, $_POST['event_country'])."', 
					'".mysqli_real_escape_string($homedb, $_POST['event_shortnote'])."',
					'".mysqli_real_escape_string($homedb, $_POST['expected_no'])."',
					'".mysqli_real_escape_string($homedb, '0')."',
					'".mysqli_real_escape_string($homedb, '0')."',
					'".mysqli_real_escape_string($homedb, $_POST['event_proxyphone'])."',
					'".mysqli_real_escape_string($homedb, $_POST['invitaion_degree'])."',
					'".mysqli_real_escape_string($homedb, $ip_address)."',
					'".mysqli_real_escape_string($homedb, $current_date)."',
					'".mysqli_real_escape_string($homedb, 'proxy')."',
					'".mysqli_real_escape_string($homedb, 'preview')."'
					)");
					
					if(mysqli_query($homedb, $queryWallet))
					{
					 

            					$queryWallet =("INSERT INTO `proxy_wallet` VALUE (
            					'', 
            					'".mysqli_real_escape_string($homedb, $event_id)."',  
            					'".mysqli_real_escape_string($homedb, $_POST['username'])."',  
            					'".mysqli_real_escape_string($homedb, $_POST['event_proxyfirstname'])."', 
            					'".mysqli_real_escape_string($homedb, $_POST['event_proxylastname'])."', 
            					'".mysqli_real_escape_string($homedb, $_POST['event_proxyphone'])."', 
            					'".mysqli_real_escape_string($homedb, '0')."', 
            					'".mysqli_real_escape_string($homedb, '0')."', 
            					'".mysqli_real_escape_string($homedb, $current_datetime)."',
            					'".mysqli_real_escape_string($homedb, '')."', 
            					'".mysqli_real_escape_string($homedb, '')."',  
            					'".mysqli_real_escape_string($homedb, 'open')."'  
            					)");
            					
            					mysqli_query($homedb, $queryWallet);
            					
            					
                            $output[]= array(
                                'success'	=> '1',
                                'feedback'	=> 'You have successfully created an event. Click okay to preview'
                            );
            			
                             echo json_encode($output);	
                              
                  	}
                  	else
                  	{
                            			$output[]= array(
                            				'success'		=> '0',
                            				'feedback'	    => 'An error has occured'
                            			);
                			
                		  
                		  echo json_encode($output);	
                				
                  	}	
	 
	
 
 
	}	
	
	
	
	 
	if($_GET['action'] == 'event_previewDelete')
	{
	    	 
		 				 
	 					 
	    $event_id = $_GET['event_id'];
	    $banner   = $_GET['banner'];
	    
	    
	    
            
	 
        $loader->query ="DELETE FROM `public_event` WHERE `public_event`.`event_id` = '$event_id'"; 
        $loader->execute_query();
        
        
        $api_object->query="DELETE FROM `self_wallet` WHERE `self_wallet`.`self_event_id` = '$event_id'"; 
        $loader->execute_query();
        
        
        unlink("public_banner/$banner");
        
        
        $data[] = array( 
        'success'  =>  'ok' 
        );	
	 
 
  				 
	echo json_encode($data);	
	
	}
 
    if($_GET["action"] == 'profilePhotoUpdate')
    {
    
 
        $loader->filedata = $_FILES['photo1'];
        $output = $loader->Upload_ProfilePhoto(); 
        
        echo json_encode($output);
    
    } 

 
?>
