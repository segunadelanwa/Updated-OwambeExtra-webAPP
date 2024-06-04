<?php



include("config.php");

include("config_pageajax.php");

$loader = new Loader;
 
 


 
          
      /*      
            $receiver_email='ziggyadex@gmail.com';
            $subject = 'Account Email Verification';
            $body = '
					<div style='width:100%;height:5px;background: #c908bd'></div><br> 
					<div style='font-size:14px;color:black;font-family:lucida sans;'>
						 <center >
						 <img src=\"cid:logo\"  style='text-align:center;height:150px;'/> <br> 
						 <h1>OWAMBE EXTRA </h1>
						 </center><br>
						 
						 
						<p>This is a verification eMail, please click the link to verify your eMail address by clicking this 
						<a>
						<button> VERIFY EMAIL </button>
						</a>.
						</p>
						
						
						
						<span style='font-size:15px;text-align:center;'>OWAMBE EXTRA OTP  <span><br>
						<div style='width:100%;height:5px;background: #c908bd'></div>  
						</div><br><br>
						';
            
        	$loader->send_email($receiver_email, $subject, $body);
		  
		  
 	
	*/

if(isset($_SESSION['password']) AND !empty($_SESSION['username']))
{
  
   $loader->query='SELECT * FROM `login_table` WHERE `password`="'.$_SESSION['password'].'" AND `username`="'.$_SESSION['username'].'"';
		
		 if($result = $loader->query_result()){
	 
		
			foreach($result as $row)
			{
					
			$photo        =  $row['photo'];
			$username     =  $row['username'];
			$surname      =  $row['surname'];
			$firstname    =  $row['firstname'];
			$gender       =  $row['gender'];
			$phone        =  $row['phone'];
			$address      =  $row['address']; 
			$city         =  $row['city'];
			$state        =  $row['state'];
			$country      =  $row['country'];
			$reg_date     =  $row['reg_date'];
			$ip           =  $row['ip'];
			$acc_verify   =  $row['acc_verify'];  
			$ver_code     =  $row['ver_code'];
 			$bank_name    =  $row['bank_name'];
			$account_name =  $row['account_name'];
			$account_no   =  $row['account_no'];
 
			}
	 
	 
   
	         
	 
		 }
 
} 
 


	$current_date  = date('Y-m-d');	
	$ip_address = $_SERVER['REMOTE_ADDR'];
	$current_datetime = date("Y-m-d");
	$time = date("H:i:s", STRTOTIME(date('h:i:sa')));

if(isset($_POST['page']))
{
	if($_POST['page'] == 'register')
	{
		if($_POST['action'] == 'check_email')
		{
			$loader->query = "
			SELECT * FROM login_table 
			WHERE username = '".trim($_POST["email"])."'
			";

			$total_row = $loader->total_row();

			if($total_row == 0)
			{
				$output = array(
					'success'		=>	true
				);
				echo json_encode($output);
			}
		}

		if($_POST['action'] == 'register')
		{
			$user_verfication_code = md5(rand());

			$receiver_email = $_POST['user_email_address'];

			//$loader->filedata = $_FILES['user_image'];

			//$user_image = $loader->Upload_file();
 
			
           
					$queryOtp =("INSERT INTO `otp_table` VALUE (
					'', 
					'".mysqli_real_escape_string($homedb, $receiver_email)."',  
					'".mysqli_real_escape_string($homedb, '')."',  
					'".mysqli_real_escape_string($homedb, '')."',
					'".mysqli_real_escape_string($homedb, $current_datetime)."'
					)");
					
					mysqli_query($homedb, $queryOtp);
					
					$loader->data = array(
						':username'	   =>	$receiver_email,
						':password'	   =>	password_hash($_POST['user_password'], PASSWORD_DEFAULT),
						':ver_code'    =>	$user_verfication_code,
						':firstname'   =>	$_POST['user_name'],
						':surname'	   =>	$_POST['user_surname'],
						':gender'	   =>	$_POST['user_gender'],
						':phone'	   =>	$_POST['user_phone'],
						':address'	   =>	$_POST['user_address'],
						':city'		   =>	$_POST['user_city'],
						':state'	   =>	$_POST['user_state'],
						':country'	   =>	$_POST['user_country'], 
						':reg_date'	   =>	$current_datetime, 
						':acc_verify'  =>	'no',
						':photo'       =>	'photo',
						':ip'		   =>	$ip_address,
						':empty'	   =>	''
					);
					
					$loader->query = "
					INSERT INTO login_table 
					(photo, username, password, surname, firstname, gender, phone, address, city, state, country, reg_date, ip, acc_verify, ver_code, bank_name, account_name, account_no)
					VALUES
					(:photo, :username, :password, :surname, :firstname, :gender, :phone, :address, :city, :state, :country, :reg_date, :ip, :acc_verify, :ver_code, :empty, :empty, :empty )
					";

					$loader->execute_query();
					
						
			 
            
             
            
            $subject = 'Account Email Verification';
            
            $body = "
					<div style='width:100%;height:5px;background: #c908bd'></div><br> 
					<div style='font-size:14px;color:black;font-family:lucida sans;'>
						 <center >
						 <img src=\"cid:logo\"  style='text-align:center;height:150px;'/> <br> 
						 <h1>OWAMBE EXTRA </h1>
						 </center><br>

									 
			           <p>Thank you for registering.</p>
						<p>This is a verification mail, please click the link to verify your eMail address by clicking this button below<br>
						<a href='https://owambextra.com/login/index.php?user=$receiver_email&code=$user_verfication_code' >
						<button style='padding:10px;color:white; border-radius:10px; background-color:#c908bd;'> VERIFY EMAIL </button>
						</a><br>
						</p>
						
						
						<span style='font-size:15px;text-align:center;'>OWAMBE EXTRA OTP  <span><br>
						<div style='width:100%;height:5px;background: #c908bd'></div>  
						</div><br><br>
			         </div>			
					 ";
            
                   $loader->send_email($_POST['user_email_address'], $subject, $body);
 

                    $output = array(
						'feedback'		=>	'success'
					);

					echo json_encode($output);
			
			 
		}
 
	}

	if($_POST['page'] == 'login')
	{
 

		if($_POST['action'] == 'login_check')
		{
			$loader->data = array(
				':user_email_address'	=>	$_POST['user_email_address']
			);

			$loader->query = "
			SELECT * FROM login_table 
			WHERE username = :user_email_address
			";

			$total_row = $loader->total_row();

			if($total_row > 0)
			{
				$result = $loader->query_result();

				foreach($result as $row)
				{
					if($row['acc_verify'] == 'yes')
					{
						if(password_verify(trim($_POST['user_password']), $row['password']))
						{
							$_SESSION['username'] = $row['username'];
							$_SESSION['password'] = $row['password'];

							$output = array(
								'success'	=>	true
							);
						}
						else
						{
							$output = array(
								'error'		=>	'Wrong Password Detected!. <br/>Please try again or click Recover Account below'
							);
							
						}
					}
					else
					{
						$output = array(
							'error'		=>	'Email  is not verify'
						);
					}
				}
			}
			else
			{
				$output = array(
					'error'		=>	'This email address is not registered. <br/>Please register below to get started'
				);
			}

			echo json_encode($output);
		}



		
 	}

 	if($_POST['page'] == 'self')
	{
		if($_POST['action'] == 'register')
		{
			$event_id =time();

			
 
					if($_POST['subsidiary_group'] == 1)
					{
						
					$loader->filedata = $_FILES['banner_img2'];
					$event_ban = $loader->Upload_file();				

					}
					else
					{
						
						

						
 			
                       include('font_directory.php');
	
	                   
						$event_banner = imagecreatefromjpeg("img_gallery/".$_POST['banner_img1']);
						
						
						$text_color  = $_POST['text_color'];
						 
					    
						include('text_color.php');


						
						$top      = "Lets Celebrate";
						$vendor   = strtoupper($_POST['event_proxyfirstname'].' '.$_POST['event_proxylastname']);
						$location = "Event Venue:";
						$event_n  = strtolower($_POST['event_categories']);
						$event    = ucwords($event_n);
						$address  = strtolower($_POST['event_location']);
						
						$invite   = "Invitaion Status";
						$status   = $_POST['invitaion_degree'];
			
						$realtime = $_POST['event_time'];
						$realdate = $_POST['event_startdate'];
			
						$time  = "Time:".$_POST['event_time'];
						$date  = "Date:".$_POST['event_startdate'];
						
						$footer   = "Free IV @ Owambextra.com";
						$city     = ucfirst($_POST['event_city']);
						$state    = ucfirst($_POST['event_state']);
						$country  = ucfirst($_POST['event_country']);
						$date ="Date:";
						$time ="Time:";
						$rsvp ="------RSVP------";
						$rsvpname =ucwords($_POST['name_rsvp']);
						$contact =$_POST['contact_rsvp'];
						
						
						$dcode ="Dress Code";
						$dresscode =ucwords($_POST['event_shortnote']);
						
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
						
					}
					

					$loader->data = array( 
						':event_category'			=>	$_POST['event_categories'],
						':event_start_date'			=>	$_POST['event_startdate'],
						':event_time'			    =>	$_POST['event_time'],
						':event_end_date'			=>	$_POST['event_enddate'],
						':event_location'			=>	$_POST['event_location'],
						':event_note'   		    =>	$_POST['event_shortnote'],
						':event_city'		        =>	$_POST['event_city'],
						':event_state'		        =>	$_POST['event_state'],
						':event_country'	        =>	$_POST['event_country'],
						':prospect_guest'           =>	$_POST['expected_no'],
						':contact_no'	            =>	$_POST['contact_rsvp'],
						':security_note'            =>	$_POST['invitaion_degree'], 
						':event_banner'		    	=>	$event_ban,
						':event_id'		    	    =>	$event_id, 
						':firstname'		   	    =>	$_POST['event_proxyfirstname'],
						':surname'		    	    =>	$_POST['event_proxylastname'],
						':username'		    	    =>	$username,
						':ip_address'		        =>	$ip_address,
						':posted_date'	        	=>	$current_datetime,
						':event_owner'	        	=>	'self',
						':current_guest'	        =>	'0',
						':gift_arrived'	        	=>	'0'
					);

							$loader->query = "
							INSERT INTO public_event 
							(
							event_id, 
							first_name, 
							sur_name, 
							username, 
							event_category, 
							event_banner, 
							event_start_date, 
							event_time, 
							event_end_date,
							event_location,
							event_city,
							event_state,
							event_country,
							event_note,
							expected_guest,
							current_guest,
							gift_arrived,
							contact_no,
							security_note, 
							ip_address, 
							posted_date,
							event_owner
							)
							VALUES 
							(
							:event_id, 
							:firstname, 
							:surname, 
							:username, 
							:event_category, 
							:event_banner, 
							:event_start_date, 
							:event_time, 
							:event_end_date,
							:event_location,
							:event_city,
							:event_state,
							:event_country,
							:event_note,
							:prospect_guest,
							:current_guest,
							:gift_arrived,
							:contact_no,
							:security_note, 
							:ip_address,
							:posted_date,
							:event_owner

							)
					";

					$loader->execute_query();

					$queryWallet =("INSERT INTO `self_wallet` VALUE (
					'', 
					'".mysqli_real_escape_string($homedb, $event_id)."',  
					'".mysqli_real_escape_string($homedb, $username)."',  
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

					$output = array(
						'success'		=>	'success'
					);
					
	 
 
       

			$output = array(
				'success'		=> 'success',
				'page'		   => ''.$event_id.''
			);
			
			echo json_encode($output);
	 

			
		}
	}

	if($_POST['page'] == 'proxy')
	{
		if($_POST['action'] == 'register')
		{
			$event_id =time();

		   if($_POST['event_proxyphone'] == $phone)
		   {	
		   
				$output = array(
					'error'		=>"You can't use your phone number for proxy account event"
				);

		   }
		   else 
		   {
					if($_POST['subsidiary_group'] == 1)
					{
						
					$loader->filedata = $_FILES['banner_img2'];
					$event_ban = $loader->Upload_file();				

					}
					else
					{
						
						

						
 			
					
                       include('font_directory.php');
	                   
						$event_banner = imagecreatefromjpeg("img_gallery/".$_POST['banner_img1']);
						
						
						$text_color  = $_POST['text_color'];
						 
                        include('text_color.php');


						
						$top      = "Lets Celebrate";
						$vendor   = strtoupper($_POST['event_proxyfirstname'].' '.$_POST['event_proxylastname']);
						$location = "Event Venue:";
						$event_n  = strtolower($_POST['event_categories']);
						$event    = ucwords($event_n);
						$address  = strtolower($_POST['event_location']);
						
						$invite   = "Invitaion Status";
						$status   = $_POST['invitaion_degree'];
			
						$realtime = $_POST['event_time'];
						$realdate = $_POST['event_startdate'];
			
						$time  = "Time:".$_POST['event_time'];
						$date  = "Date:".$_POST['event_startdate'];
						
						$footer   = "Free IV @ Owambextra.com";
						$city     = ucfirst($_POST['event_city']);
						$state    = ucfirst($_POST['event_state']);
						$country  = ucfirst($_POST['event_country']);
						$date ="Date:";
						$time ="Time:";
						$rsvp ="------RSVP------";
						$rsvpname =ucwords($_POST['name_rsvp']);
						$contact =$_POST['contact_rsvp'];
						
						
						$dcode ="Dress Code";
						$dresscode =ucwords($_POST['event_shortnote']);
						
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
						
					}
					

					$loader->data = array( 
						':event_category'			=>	$_POST['event_categories'],
						':event_start_date'			=>	$_POST['event_startdate'],
						':event_time'			    =>	$_POST['event_time'],
						':event_end_date'			=>	$_POST['event_enddate'],
						':event_location'			=>	$_POST['event_location'],
						':event_note'   		    =>	$_POST['event_shortnote'],
						':event_city'		        =>	$_POST['event_city'],
						':event_state'		        =>	$_POST['event_state'],
						':event_country'	        =>	$_POST['event_country'],
						':prospect_guest'           =>	$_POST['expected_no'],
						':contact_no'	            =>	$_POST['contact_rsvp'],
						':security_note'            =>	$_POST['invitaion_degree'], 
						':event_banner'		    	=>	$event_ban,
						':event_id'		    	    =>	$event_id, 
						':firstname'		   	    =>	$_POST['event_proxyfirstname'],
						':surname'		    	    =>	$_POST['event_proxylastname'],
						':username'		    	    =>	$username,
						':ip_address'		        =>	$ip_address,
						':posted_date'	        	=>	$current_datetime,
						':event_owner'	        	=>	'proxy',
						':current_guest'	        =>	'0',
						':gift_arrived'	        	=>	'0'
					);

							$loader->query = "
							INSERT INTO public_event 
							(
							event_id, 
							first_name, 
							sur_name, 
							username, 
							event_category, 
							event_banner, 
							event_start_date, 
							event_time, 
							event_end_date,
							event_location,
							event_city,
							event_state,
							event_country,
							event_note,
							expected_guest,
							current_guest,
							gift_arrived,
							contact_no,
							security_note, 
							ip_address, 
							posted_date,
							event_owner
							)
							VALUES 
							(
							:event_id, 
							:firstname, 
							:surname, 
							:username, 
							:event_category, 
							:event_banner, 
							:event_start_date, 
							:event_time, 
							:event_end_date,
							:event_location,
							:event_city,
							:event_state,
							:event_country,
							:event_note,
							:prospect_guest,
							:current_guest,
							:gift_arrived,
							:contact_no,
							:security_note, 
							:ip_address,
							:posted_date,
							:event_owner

							)
					";

					$loader->execute_query();

					$queryWallet =("INSERT INTO `proxy_wallet` VALUE (
					'', 
					'".mysqli_real_escape_string($homedb, $event_id)."',  
					'".mysqli_real_escape_string($homedb, $username)."',  
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

					$output = array(
						'success'		=>	'success'
					);
					
		   } 
			
			echo json_encode($output);
	 

			
		}
	}

	if($_POST['page'] == 'Reserve')
	{
			if($_POST['action'] == 'seat')
			{
				if(trim($_POST['fuLName'] != ''))
				{

						if(trim($_POST['fuLNo'] != ''))
						{
					

 
 
								$loader->query = "
								SELECT * FROM `coming_guest` 
								WHERE `visitor_number` = '".trim($_POST['fuLNo'])."' AND `eventid` = '".$_POST['eventId']."'
								";

								$result_row = $loader->query_result();
								$total_row = $loader->total_row();
								
								foreach($result_row as $row){

								 
								$seat_no = $row['seat_no'] ;

								}
								
								if($total_row == 1)
								{
									
						
									 
								
									$output = array(
										'success'		=>	"<i class='fa fa-times' style='font-size:20px;'> Seat No. (00$seat_no) already reserved for you. Kindly send a gift to the celebrant Thank you.</i>"
										 
									);
									echo json_encode($output);
									
								}
								else
								{
									
								$count = $loader->SeatReserved($_POST['eventId']);
									
								if($count != 0)
								{
									
									$count_new = "00$count";
									$queryWallet =("INSERT INTO `coming_guest` VALUE (
									'', 
									'".mysqli_real_escape_string($homedb, $_POST['eventId'])."',  
									'".mysqli_real_escape_string($homedb, $_POST['eUser'])."',  
									'".mysqli_real_escape_string($homedb, $_POST['fuLName'])."', 
									'".mysqli_real_escape_string($homedb, $_POST['fuLNo'])."',  
									'".mysqli_real_escape_string($homedb, $current_datetime)."',
									'".mysqli_real_escape_string($homedb, $ip_address)."',
									'".mysqli_real_escape_string($homedb, $count_new)."' 
									)");

									if(mysqli_query($homedb, $queryWallet))
									{
										$output = array(
										'success'		=>	"<i class='fa fa-check' style='font-size:20px;'> Seat No. (00$count) is reserved for you successfully!!.Kindly send a gift to the celebrant Thank you.</i>"
										 
										);
										echo json_encode($output);
									}
								
								}else
								{
									
									 
									{
										$output = array(
										'success'		=>	"<div  class='fa fa-times' style='font-size:20px;'>Thanks for visiting. All event seat reserved .</div>"
									 
										);
										echo json_encode($output);
									}
									
								}
								
								
								
							}
				 
						}
						else
						{
							
								$output = array(
								'error'		=>	"Field Required"
								);
								echo json_encode($output);
						}
				
			    }
				else
				{
					
						$output = array(
						'error'		=>	"Field Required"
						);
						echo json_encode($output);
				}
		
           
	      }
		  
			if($_POST['action'] == 'count')
			{
			 
					 

								$loader->query = "
								SELECT * FROM `public_event` 
								WHERE `event_id` = '".trim($_POST['countNow'])."' 
								";

								$result = $loader->query_result();

							    foreach($result as $row)
								{
									$count=$row['current_guest']; 
								}
 
		
                                 
										echo$count;
									   
									
									
									  
				  
	     }
    }

    if($_POST['page'] == 'wallet_withdraw')
	{
		if($_POST['action'] == 'wallet_withdraw')
		{


	        $cash_code=time();
			$cashout_code="cash_$cash_code";

			$auth_code=rand(1000, 99999);
			$otp="$auth_code";
			$payment_sta="OTP Required";
			$cashout_sta="OTP Required";
			$officer_email="Pending";
			$payment_officer="Processing..";
			//////////////////////////////
			$date_init=date('Y-m-d');
			$curr_time=date("H:i:s a");




					$bank_name      = trim(htmlentities($_POST['bank_name'])); 
					$account_name   = trim(htmlentities($_POST['account_name'])); 
					$account_no     = trim(htmlentities($_POST['account_no']));    
					$cashout_amount = trim(htmlentities($_POST['account_bal']));        
					$account_bal    = trim(htmlentities($_POST['account_bal']));      

	  
	         	$left_bal    = $account_bal - $cashout_amount; 

				$loader->query = "SELECT * FROM `cashout` WHERE `username` ='$username' AND `cashout_status` ='OTP Required'";
		        
				$num_row = $loader->total_row();
				$result = $loader->query_result();
				
		
				
				
			if($num_row >= 1)
			{
						 
						
							$output = array(
							'feedback1'		=>	'Please you already have an out-standing cashout under processing',
							'feedback2'		=>	'cashout.php'
							
							);
							echo json_encode($output);		
			}
            else
			{
					

			
			 
                     // INSERT DATA TO CASHOUT TABLE
					$data ="INSERT INTO `cashout` VALUES(
					'',									 
					'".mysqli_real_escape_string($homedb, $username)."',									 
					'".mysqli_real_escape_string($homedb, $cashout_amount)."',								 
					'".mysqli_real_escape_string($homedb, $account_bal)."',							 
					'".mysqli_real_escape_string($homedb, $left_bal)."',
					'".mysqli_real_escape_string($homedb, $bank_name)."',
					'".mysqli_real_escape_string($homedb, $account_name)."',
					'".mysqli_real_escape_string($homedb, $account_no)."',
					'".mysqli_real_escape_string($homedb, $payment_officer)."',
					'".mysqli_real_escape_string($homedb, $officer_email)."',
					'".mysqli_real_escape_string($homedb, $otp)."',
					'".mysqli_real_escape_string($homedb, $cashout_sta)."',
					'".mysqli_real_escape_string($homedb, $payment_sta)."',
					'".mysqli_real_escape_string($homedb, $date_init)."',
					'".mysqli_real_escape_string($homedb, $ip_address)."',
					'".mysqli_real_escape_string($homedb, $cashout_code)."',
					'".mysqli_real_escape_string($homedb, 'self_wallet')."',
					'".mysqli_real_escape_string($homedb, 'self')."'
					
					)";
					 
					
					if(mysqli_query($homedb, $data)) 
					{
						

					
					
					$queryupdate=("UPDATE `otp_table` SET 										 		
					`otp_code`     = '".mysqli_real_escape_string($homedb, $otp)."',										 		
					`otp_status`   = '".mysqli_real_escape_string($homedb, 'widthdraw')."',										 		
					`reg_date`     = '".mysqli_real_escape_string($homedb, $date_init)."' 
					
					WHERE `otp_table`.`username`='$username'");
					
					mysqli_query($homedb, $queryupdate);
					
						//SENDING OTP MAIL

					 
						$receiver_email = "$username";  
					                                  // Set email format to HTML
						$subject = 'CASHOUT OTP CONFIRMATION';
						$body    = "
								<div style='width:100%;height:5px;background: #c908bd'></div><br> 
								<div style='font-size:14px;color:black;font-family:lucida sans;'>
									 <center >
									 <img src=\"cid:logo\"  style='text-align:center;height:150px;'/> <br> 
									 <h1>OWAMBE EXTRA </h1>
									 </center><br>
            
            						<p>Please do not disclose your OTP to anybody</p><br><br>
            						<p>Your payment transaction OTP code is :<b>$otp</b> </p> 
            			 
            
            						<span style='font-size:15px;text-align:center;'>OWAMBE EXTRA OTP  <span><br>
            						<div style='width:100%;height:5px;background: #c908bd'></div>  
                                    </div><br><br>
            						";
						//$mail->AddEmbeddedImage('assets/images/logo.png', 'logo', 'assets/images/logo.png'); 

					 	$loader->send_email($receiver_email, $subject, $body);
							
	 
							$output = array(
							'feedback1'		=>	'Please OTP Code has been sent to '.$username.'',
							'feedback2'		=>	'cashout_otp.php?code='.$cashout_code.''

						        );
							echo json_encode($output);	
							
							
						
						}
						else
						{
						

						//echo '<script> alert("")</script> ';
						//echo '<script> window.location ="" </script>';
						
						
							$output = array(
							'feedback1'		=>	'Please OTP Code has been sent to '.$username.'',
							'feedback2'		=>	'cashout_otp.php?code='.$cashout_code.''

							);
							echo json_encode($output);
						
						} 											
				   
			
				   }
			
				 
				
            }

    }
	
	if($_POST['page'] == 'wallet_bal')
	{
		if($_POST['action'] == 'check_balance')
		{
			$loader->query = "
			SELECT * FROM `wallet` 
			WHERE `username` = '$username'
			";

			$result = $loader->query_result();

             foreach($result as $row){
				 $bal = $row['current_balance'];
			 }

			if($_POST["loadCASH"] > "999" )
			{
 				$output = array(
				'feedback'		=>	'success'
				);
				echo json_encode($output);
				
			}
			else
			{
			
 				
			}
				
		}
    }
 
    if($_POST['page'] == 'wallet_otp')
	{

		if($_POST['action'] == 'confirm_otp')
		{


              if($_POST['event_id'] == 'self_wallet'){
 


			$loader->query = " SELECT `otp_code` FROM `otp_table` WHERE `username` = '$username' ";

			$result = $loader->query_result();

			foreach($result as $row){  $otp_code = $row['otp_code'];  }
			 

					if($_POST["loadOTP"] == $otp_code )
					{

						$output = array(
						'feedback0' => 'self'
						);
						echo json_encode($output);							
						
						
					}else
				    {

					} 
					
			  }
			  else
			  {
							$loader->query ="SELECT * FROM `public_event` WHERE `event_id` = '".$_POST['event_id']."' ";

			$result1 = $loader->query_result();

			foreach($result1 as $row){ $event_owner = $row['event_owner']; }


			$loader->query = " SELECT `otp_code` FROM `otp_table` WHERE `username` = '$username' ";

			$result = $loader->query_result();

			foreach($result as $row){  $otp_code = $row['otp_code'];  }
			 

					if($_POST["loadOTP"] == $otp_code )
					{
						$output = array(
						'feedback0' => ''.$event_owner.''
						);
						echo json_encode($output);	
						
						
						
					}else
				    {

					}   
			  }
				
         }

		if($_POST['action'] == 'otp_approve')
		{





 
		$loadOTP   = trim(htmlentities($_POST['loadOTP']));      

	  
	

				$loader->query = "SELECT * FROM `cashout` WHERE `username` ='$username' AND `cashout_code` ='".$_POST['cashout_code']."'";
		        
				$num_row = $loader->total_row();
				$result = $loader->query_result();
				
				foreach($result as $row){
					
					$cashout_amount   = $row['cashout_amount'];
					$current_bal      = $row['current_bal'];
					$left_bal         = $row['left_bal'];
					$payment_status   = $row['payment_status'];
					$event_owner      = $row['event_select'];
					$event_id        = $row['event_id_cashout'];
					
				}

		           
               				   
	
				if($payment_status == 'Admin_Processing')
				{
					
									$output = array(
									'feedback1'		=>	'Payment is Under Admin Processing..',
									'feedback2'		=>	'cashout.php'

									);
									echo json_encode($output);				
			    }
				elseif($payment_status == 'Admin_Paid')
				{
					
									$output = array(
									'feedback1'		=>	'Payment has been made already',
									'feedback2'		=>	'cashout.php'

									);
									echo json_encode($output);				
			    }
				else
                {

						   if($num_row == 1)
						   {					
							//UPDATING wallet
								  if($event_owner == "proxy"){
									  
										$queryupdate=("UPDATE `proxy_wallet` SET 										 		
										`current_balance`   = '".mysqli_real_escape_string($homedb, $current_bal)."',										 		
										`previous_balance`  = '".mysqli_real_escape_string($homedb, $left_bal)."',	
                                        `lock_status`       = '".mysqli_real_escape_string($homedb, 'lock')."',										
										`date`              = '".mysqli_real_escape_string($homedb, $current_datetime)."' 
										WHERE `proxy_wallet`.`proxy_event_id`='$event_id'");

										mysqli_query($homedb, $queryupdate);
								  }
								  elseif($event_owner == "self")
								  {
									 
										$queryupdate=("UPDATE `self_wallet` SET 										 		
										`current_balance`   = '".mysqli_real_escape_string($homedb, $current_bal)."',										 		
										`previous_balance`  = '".mysqli_real_escape_string($homedb, $left_bal)."',										 		
										`lock_status`       = '".mysqli_real_escape_string($homedb, 'lock')."',										 		
										`date`              = '".mysqli_real_escape_string($homedb, $current_datetime)."' 
										WHERE `self_wallet`.`self_event_id`='$event_id'");

										mysqli_query($homedb, $queryupdate);
								}
								

							//UPDATING Cahout
							$queryupdate=("UPDATE `cashout` SET 								 									 		
							`cashout_status`  = '".mysqli_real_escape_string($homedb, 'OTP_Success')."',
							`payment_status`  = '".mysqli_real_escape_string($homedb, 'Admin_Processing')."'	
							WHERE `cashout`.`cashout_code`='".$_POST['cashout_code']."'");
							mysqli_query($homedb, $queryupdate);

							//RESET OTP TABLE 
							$queryupdate=("UPDATE `otp_table` SET 										 		
							`otp_code`    = '".mysqli_real_escape_string($homedb, '')."',										 		
							`otp_status`   = '".mysqli_real_escape_string($homedb, '')."'	

							WHERE `otp_table`.`username`='$username'");
							mysqli_query($homedb, $queryupdate);


							//DELETING THE GIFT FROM USER ACCOUNT 
							$queryupdate=("DELETE FROM `gift_event` 
							WHERE `gift_event`.`gift_owner_email` = '$username'");
							mysqli_query($homedb, $queryupdate);

							//DELETING THE GIFT FROM USER PUBLIC EVENT TABLE 
							$queryupdate=("UPDATE `public_event` SET 										 		
							`gift_arrived`    = '".mysqli_real_escape_string($homedb, '0')."'	
							WHERE `public_event`.`username`='$username' AND `event_owner`='self'");
							mysqli_query($homedb, $queryupdate);
						   
			
							   
							   
				
									$output = array(
									'feedback1'		=>	'Payment Cashout Processing..',
									'feedback2'		=>	'cashout.php'

									);
									echo json_encode($output);	
						   }					

				}					
			
		 }
			
				 
		if($_POST['action'] == 'reSendOtp')
		{

		
					$verify_code= rand(1000, 99999); 
					$otp="$verify_code";	
		

	                $queryupdate=("UPDATE `cashout` SET 										 		
					`otp`     = '".mysqli_real_escape_string($homedb, $otp)."'  
        			WHERE `username`='$username' AND `cashout_code` = '".$_POST['Cashcode']."'");
					mysqli_query($homedb, $queryupdate);
				    

						$queryupdate=("UPDATE `otp_table` SET 										 		
					`otp_code`     = '".mysqli_real_escape_string($homedb, $otp)."',										 		
					`otp_status`   = '".mysqli_real_escape_string($homedb, 'widthdraw')."',										 		
					`reg_date`     = '".mysqli_real_escape_string($homedb, $time)."' 
					
					WHERE `otp_table`.`username`='$username'");
					
						if(mysqli_query($homedb, $queryupdate))
						{
					
						//SENDING OTP MAIL

					 
						$receiver_email = "$username";                                    // Set email format to HTML
						$subject = 'CASHOUT OTP CONFIRMATION';
						$body    = "
						<div style='width:100%;height:5px;background: #c908bd'></div><br> 
						<div style='font-size:14px;color:black;font-family:lucida sans;'>
							 <center >
							 <img src=\"cid:logo\"  style='text-align:center;height:150px;'/> <br> 
							 <h1>OWAMBE EXTRA </h1>
							 </center><br>

						<p>Please do not disclose your OTP to anybody</p><br><br>
						<p>Your payment transaction OTP is :<b>$otp</b> </p> 
			 

						<span style='font-size:15px;text-align:center;'>OWAMBE EXTRA OTP  <span><br>
						<div style='width:100%;height:5px;background: #c908bd'></div> 
						</div><br><br>

						";
						 
							$loader->send_email($receiver_email, $subject, $body);
							
	 
							$output ='OTP code has been sent to your '.$username.'';

									 
			              echo $output;
							
							
						
						}
						else
						{
						

				 
							$output ='OTP code has been sent to your '.$username.'';

									 
			              echo $output;
						} 											
				   
					}

		
     

    }
  

    if($_POST['page'] == 'proxy_event_id_search')
	{

		if($_POST['action'] == 'search_eventID')
		{

			$loader->query = "
			SELECT * FROM `public_event` WHERE `event_id` ='".trim($_POST["eventID"])."'AND`username` = '$username'
			";



			if($result = $loader->query_result())
			{
				$output = array(
				'success'		=>	'true'
				);
				echo json_encode($output); 
			}
			else
			{
				
				
			}

				
         }

	}
	
 

    if($_POST['page'] == 'proxyWallet_cashout')
	{
		if($_POST['action'] == 'proxyBal_check')
		{
			
			$cash_code=time();
			$cashout_code="proxy_cash_$cash_code";

			$auth_code=rand(1000, 99999);
			$otp="$auth_code";
			$payment_sta="OTP Required";
			$cashout_sta="OTP Required";
			$officer_email="Pending";
			$payment_officer="Processing.."; 
			$date_init=date('Y-m-d');
			$curr_time=date("H:i:s a");

			$loader->query = "SELECT * FROM `cashout` WHERE `event_id_cashout` ='".trim($_POST["eventID"])."'  ";
			$result_id = $loader->query_result();
			$num_row = $loader->total_row();
			
			foreach($result_id as $row)
			{

			$cashout_code_db = $row['cashout_code'];  
			}
			
			
				 if($_POST['event_owner'] == 'proxy')
				 {
				  
					  $_result = $loader->ProxyWalletBal(trim($_POST['eventID']));
					  
					 foreach($_result as $row)
					 { 
						 $current_bal      = $row['current_balance']; 
						 $previous_balance = $row['previous_balance']; 
						 $lock_status      = $row['lock_status']; 
					 }

					 if($lock_status === "lock")
					 {	
						   
									$output = array(
									'dataForm0'		=>	'error',
									'dataForm1'		=>	'The event ID ('.$_POST['eventID'].') is locked for cashout payment.Contact Admin to Reactivate Event Wallet',
									'dataForm2'		=>  'index.php'

									);
									echo json_encode($output);					
					 }
					 else
					 {
								$EndDate        = trim(htmlentities($_POST['EndDate'])); 
								$cashout_amt    = trim(htmlentities($_POST['cashout_amt'])); 
								$event_owner    = trim(htmlentities($_POST['event_owner'])); 
								$eventID        = trim(htmlentities($_POST['eventID'])); 
								$bank_name      = trim(htmlentities($_POST['bank_name'])); 
								$account_name   = trim(htmlentities($_POST['account_name'])); 
								$account_no     = trim(htmlentities($_POST['account_no']));	

								
								if($_POST['EndDate'] > $current_date)
								{
			 
					
								
								
										if($cashout_amt >= 1000)
										{

											if($num_row > 0)
											{


												$output = array(
												'dataForm0'		=>	'error',
												'dataForm1'		=>	'OTP required to proccess event ID ('.$eventID.') cashout payment',
												'dataForm2'		=>	'cashout_otp.php?code='.$cashout_code_db.''

												);
												echo json_encode($output);		
											}
											else
											{

											$left_bal =$cashout_amt - $current_bal;
											$cur_pre_bal = $previous_balance + $cashout_amt;
											
											
											// INSERT DATA TO CASHOUT TABLE
											$data ="INSERT INTO `cashout` VALUES(
											'',									 
											'".mysqli_real_escape_string($homedb, $username)."',									 
											'".mysqli_real_escape_string($homedb, $cashout_amt)."',								 
											'".mysqli_real_escape_string($homedb, $left_bal)."',							 
											'".mysqli_real_escape_string($homedb, $cur_pre_bal)."',
											'".mysqli_real_escape_string($homedb, $bank_name)."',
											'".mysqli_real_escape_string($homedb, $account_name)."',
											'".mysqli_real_escape_string($homedb, $account_no)."',
											'".mysqli_real_escape_string($homedb, $payment_officer)."',
											'".mysqli_real_escape_string($homedb, $officer_email)."',
											'".mysqli_real_escape_string($homedb, $otp)."',
											'".mysqli_real_escape_string($homedb, $cashout_sta)."',
											'".mysqli_real_escape_string($homedb, $payment_sta)."',
											'".mysqli_real_escape_string($homedb, $date_init)."',
											'".mysqli_real_escape_string($homedb, $ip_address)."',
											'".mysqli_real_escape_string($homedb, $cashout_code)."',
											'".mysqli_real_escape_string($homedb, $eventID)."',
											'".mysqli_real_escape_string($homedb, 'proxy')."'
											)";


											if(mysqli_query($homedb, $data)) 
											{




											$queryupdate=("UPDATE `otp_table` SET 										 		
											`otp_code`     = '".mysqli_real_escape_string($homedb, $otp)."',										 		
											`otp_status`   = '".mysqli_real_escape_string($homedb, 'widthdraw')."',										 		
											`reg_date`     = '".mysqli_real_escape_string($homedb, $date_init)."' 
											WHERE `otp_table`.`username`='$username'");

											mysqli_query($homedb, $queryupdate);

											//SENDING OTP MAIL

											 
											$receiver_email ="$username";                                    // Set email format to HTML
											$subject = 'CASHOUT OTP CONFIRMATION';
											$body    = "
														<div style='width:100%;height:5px;background: #c908bd'></div><br> 
														<div style='font-size:14px;color:black;font-family:lucida sans;'>
															 <center >
															 <img src=\"cid:logo\"  style='text-align:center;height:150px;'/> <br> 
															 <h1>OWAMBE EXTRA </h1>
															 </center><br>

														<p>Please do not disclose your OTP to anybody</p><br><br>
														<p>Your payment transaction OTP is :<b>$otp</b> </p> 


														<span style='font-size:15px;text-align:center;'>OWAMBE EXTRA OTP  <span><br>
														<div style='width:100%;height:5px;background: #c908bd'></div>
														</div><br><br>
														";
									 

												 $loader->send_email($receiver_email, $subject, $body);
										 

											 



											 


													$output = array(
													'dataForm0'		=>	'success',
													'dataForm1'		=>	'Please OTP Code has been sent to '.$username.'',
													'dataForm2'		=>	'cashout_otp.php?code='.$cashout_code.''

													);
													echo json_encode($output);		

													 

																				


											}



											}

										}
										else
										{

											
											
											$output = array(
											'dataForm0'		=>	'error',
											'dataForm1'		=>	'Insuffient Wallet Bal. Minimum amount to withdraw is N1,000.00',
											'dataForm2'		=>	'index.php'
											
											);
											echo json_encode($output); 
										
										
										}

			//////////////////////////
								}
								else
								{

									
									$output = array(
									'dataForm0'		=>	'error',
									'dataForm1'		=>	'Proxy wallet access denied. Event date '.$EndDate.'is still active',
									'dataForm2'		=>	'my_proxy_event.php'
									
									);
									echo json_encode($output); 
								
								
								}
							
					 }
						  
				 }
				 elseif($_POST['event_owner'] == 'self')
				 {

					 $_result = $loader->selfWalletBal(trim($_POST['eventID']));
					 
					 foreach($_result as $row)
					 { 
						 $current_bal      = $row['current_balance']; 
						 $previous_balance = $row['previous_balance']; 
					     $lock_status      = $row['lock_status']; 
					 }

					 if($lock_status === "lock")
					 {	
						   
									$output = array(
									'dataForm0'		=>	'error',
									'dataForm1'		=>	'The event ID ('.$_POST['eventID'].') is locked for cashout payment. Contact Admin to Reactivate Event Wallet',
									'dataForm2'		=>  'index.php'

									);
									echo json_encode($output);					
					 }
					 else
					 {
								$EndDate        = trim(htmlentities($_POST['EndDate'])); 
								$cashout_amt    = trim(htmlentities($_POST['cashout_amt'])); 
								$event_owner    = trim(htmlentities($_POST['event_owner'])); 
								$eventID        = trim(htmlentities($_POST['eventID'])); 
								$bank_name      = trim(htmlentities($_POST['bank_name'])); 
								$account_name   = trim(htmlentities($_POST['account_name'])); 
								$account_no     = trim(htmlentities($_POST['account_no']));	

								
								if($_POST['EndDate'] > $current_date)
								{
			 
					
								
								
										if($cashout_amt >= 1000)
										{

											if($num_row > 0)
											{


												$output = array(
												'dataForm0'		=>	'error',
												'dataForm1'		=>	'OTP required to proccess event ID ('.$eventID.') cashout payment',
												'dataForm2'		=>	'cashout_otp.php?code='.$cashout_code_db.''

												);
												echo json_encode($output);		
											}
											else
											{

											$left_bal =$cashout_amt - $current_bal;
											$cur_pre_bal = $previous_balance + $cashout_amt;
											
											
											// INSERT DATA TO CASHOUT TABLE
											$data ="INSERT INTO `cashout` VALUES(
											'',									 
											'".mysqli_real_escape_string($homedb, $username)."',									 
											'".mysqli_real_escape_string($homedb, $cashout_amt)."',								 
											'".mysqli_real_escape_string($homedb, $left_bal)."',							 
											'".mysqli_real_escape_string($homedb, $cur_pre_bal)."',
											'".mysqli_real_escape_string($homedb, $bank_name)."',
											'".mysqli_real_escape_string($homedb, $account_name)."',
											'".mysqli_real_escape_string($homedb, $account_no)."',
											'".mysqli_real_escape_string($homedb, $payment_officer)."',
											'".mysqli_real_escape_string($homedb, $officer_email)."',
											'".mysqli_real_escape_string($homedb, $otp)."',
											'".mysqli_real_escape_string($homedb, $cashout_sta)."',
											'".mysqli_real_escape_string($homedb, $payment_sta)."',
											'".mysqli_real_escape_string($homedb, $date_init)."',
											'".mysqli_real_escape_string($homedb, $ip_address)."',
											'".mysqli_real_escape_string($homedb, $cashout_code)."',
											'".mysqli_real_escape_string($homedb, $eventID)."',
											'".mysqli_real_escape_string($homedb, 'self')."'
											)";


											if(mysqli_query($homedb, $data)) 
											{




											$queryupdate=("UPDATE `otp_table` SET 										 		
											`otp_code`     = '".mysqli_real_escape_string($homedb, $otp)."',										 		
											`otp_status`   = '".mysqli_real_escape_string($homedb, 'widthdraw')."',										 		
											`reg_date`     = '".mysqli_real_escape_string($homedb, $date_init)."' 
											WHERE `otp_table`.`username`='$username'");

											mysqli_query($homedb, $queryupdate);

											//SENDING OTP MAIL

											 
											$receiver_email ="$username";                                    // Set email format to HTML
											$subject = 'CASHOUT OTP CONFIRMATION';
											$body    = "
														<div style='width:100%;height:5px;background: #c908bd'></div><br> 
														<div style='font-size:14px;color:black;font-family:lucida sans;'>
															 <center >
															 <img src=\"cid:logo\"  style='text-align:center;height:150px;'/> <br> 
															 <h1>OWAMBE EXTRA </h1>
															 </center><br>

														<p>Please do not disclose your OTP to anybody</p><br><br>
														<p>Your payment transaction OTP is :<b>$otp</b> </p> 


														<span style='font-size:15px;text-align:center;'>OWAMBE EXTRA OTP  <span><br>
														<div style='width:100%;height:5px;background: #c908bd'></div>
														</div><br><br>
														";
									 

												 $loader->send_email($receiver_email, $subject, $body);
										 

											 



											 


													$output = array(
													'dataForm0'		=>	'success',
													'dataForm1'		=>	'Please OTP Code has been sent to '.$username.'',
													'dataForm2'		=>	'cashout_otp.php?code='.$cashout_code.''

													);
													echo json_encode($output);		

													 

																				


											}



											}

										}
										else
										{

											
											
											$output = array(
											'dataForm0'		=>	'error',
											'dataForm1'		=>	'Insuffient Wallet Bal. Minimum amount to withdraw is N1,000.00',
											'dataForm2'		=>	'index.php'
											
											);
											echo json_encode($output); 
										
										
										}

			//////////////////////////
								}
								else
								{

									
									$output = array(
									'dataForm0'		=>	'error',
									'dataForm1'		=>	'Proxy wallet access denied. Event date '.$EndDate.'is still active',
									'dataForm2'		=>	'my_proxy_event.php'
									
									);
									echo json_encode($output); 
								
								
								}
						 
						}
				
				
				}	 
					
			 



			}

 		if($_POST['action'] == 'otp_proxy_approve')
		{





 
		$loadOTP   = trim(htmlentities($_POST['loadOTP']));      

	  
	

				$loader->query = "SELECT * FROM `cashout` WHERE `username` ='$username' AND `event_id_cashout` ='".$_POST['event_id']."'";
		        
				$num_row = $loader->total_row();
				$result = $loader->query_result();
				
				foreach($result as $row){
					
					$cashout_amount = $row['cashout_amount'];
					$current_bal    = $row['current_bal'];
					$left_bal       = $row['left_bal'];
					$event_owner    = $row['event_select'];
					
				}

		       
	
						   if($num_row == 1)
						   {					
                                 
                               

								  if($event_owner == "proxy"){
									  
										$queryupdate=("UPDATE `proxy_wallet` SET 										 		
										`current_balance`   = '".mysqli_real_escape_string($homedb, $current_bal)."',										 		
										`previous_balance`  = '".mysqli_real_escape_string($homedb, $left_bal)."',	
                                        `lock_status`       = '".mysqli_real_escape_string($homedb, 'lock')."',										
										`date`              = '".mysqli_real_escape_string($homedb, $current_datetime)."' 
										WHERE `proxy_wallet`.`proxy_event_id`='".$_POST['event_id']."'");

										mysqli_query($homedb, $queryupdate);
								  }
								  elseif($event_owner == "self")
								  {
									 
										$queryupdate=("UPDATE `self_wallet` SET 										 		
										`current_balance`   = '".mysqli_real_escape_string($homedb, $left_bal)."',										 		
										`previous_balance`  = '".mysqli_real_escape_string($homedb, $cur_pre_bal)."',										 		
										`lock_status`       = '".mysqli_real_escape_string($homedb, 'lock')."',										 		
										`date`              = '".mysqli_real_escape_string($homedb, $current_datetime)."' 
										WHERE `self_wallet`.`self_event_id`='".$_POST['event_id']."'");

										mysqli_query($homedb, $queryupdate);
								}
								
								

								//UPDATING Cahout
								$queryupdate=("UPDATE `cashout` SET 								 									 		
								`cashout_status`  = '".mysqli_real_escape_string($homedb, 'OTP_Success')."',
								`payment_status`  = '".mysqli_real_escape_string($homedb, 'Admin_Processing')."'	
								WHERE `cashout`.`event_id_cashout`='".$_POST['event_id']."'");
								mysqli_query($homedb, $queryupdate);


								//RESET OTP TABLE 
								$queryupdate=("UPDATE `otp_table` SET 										 		
								`otp_code`    = '".mysqli_real_escape_string($homedb, '')."',										 		
								`otp_status`   = '".mysqli_real_escape_string($homedb, '')."'	
								WHERE `otp_table`.`username`='$username'");
								mysqli_query($homedb, $queryupdate);
						   
			
							   
							   
				
									$output = array(
									'feedback1'		=>	'Proxy Payment Cashout Processing..',
									'feedback2'		=>	'cashout.php'

									);
									echo json_encode($output);	
						   }					
						   
			
				   }
			
	
		
	}		

	 		 
	if($_POST['page'] == 'general_otp')
	{
		if($_POST['action'] == 'send_otp')
		{

 

			$auth_code=rand(1000, 99999);
			$otp="$auth_code"; 
			////////////////////////////// 


 
					
					$data=("UPDATE `otp_table` SET 										 		
					`otp_code`     = '".mysqli_real_escape_string($homedb, $otp)."',										 		
					`otp_status`   = '".mysqli_real_escape_string($homedb, 'account update')."',										 		
					`reg_date`     = '".mysqli_real_escape_string($homedb, $current_datetime)."' 
					WHERE `otp_table`.`username`='$username'");
					if(mysqli_query($homedb, $data)) 
					{
						
					
						//SENDING OTP TO MAIL

						 
						$receiver_email = "$username";                                    // Set email format to HTML
						$subject = 'ONE TIME PASSWORD';
						$body    = "
						<div style='width:100%;height:5px;background: #c908bd'></div><br> 
						<div style='font-size:14px;color:black;font-family:lucida sans;'>
							 <center >
							 <img src=\"cid:logo\"  style='text-align:center;height:150px;'/> <br> 
							 <h1>OWAMBE EXTRA </h1>
							 </center><br>
						
						 

						<p>Please do not disclose your OTP to anybody</p><br><br>
						<p>Your payment transaction OTP is :<b>$otp</b> </p> 
			 

						<span style='font-size:15px;text-align:center;'>OWAMBE EXTRA OTP  <span><br><br>
						<div style='width:100%;height:5px;background: #c908bd'></div>  
                       </div><br><br>
						";
						 

					     $loader->send_email($receiver_email, $subject, $body);
					 
							 
						 echo $feedback1	="<span style='color:green;font-size:18px;'>*OTP Code sent to $username</span>";

						 							
					}
					else
					{
						
 
						
							 
							echo $feedback1	='<span style="color:red;font-size:14px;">*Error occured while sending OTP code. Please try again</span>';
							 
							 
							  
						
						} 											
				   
			
	 
				 
				
            }
		
		if($_POST['action'] == 'confirm_otp')
		{


            
 


			$loader->query = "SELECT `otp_code` FROM `otp_table` WHERE `username` = '$username' ";

			$result = $loader->query_result();

			foreach($result as $row){  
			$otp_code = $row['otp_code'];  
			}
			
			 

					if($_POST["loadOTP"] == $otp_code )
					{

						$output = array(
						'feedback0' => 'success'
						);
						echo json_encode($output);							
						
						
						
					}else
				    {

					} 
					
	 
		 	
         }
				
		if($_POST['action'] == 'account_update')
		{

 
 		 
					$fname          = htmlentities($_POST['fname']); 
					$sname          = htmlentities($_POST['sname']);
					$address        = htmlentities($_POST['h_address']);
					$gender         = htmlentities($_POST['gender']);   
					$phone          = htmlentities($_POST['phone']); 
					$city           = htmlentities($_POST['city']); 
					$state          = htmlentities($_POST['state']); 
					$nationality    = htmlentities($_POST['nationality']);
					$bank_name      = htmlentities($_POST['bank_name']); 
					$account_name   = htmlentities($_POST['account_name']); 
					$account_number = htmlentities($_POST['account_number']); 
					
	 
			
					$queryupdate=("UPDATE `login_table` SET
					`firstname`   = '".mysqli_real_escape_string($homedb, $fname)."',  
					`surname`      = '".mysqli_real_escape_string($homedb, $sname)."',
					`address`      = '".mysqli_real_escape_string($homedb, $address)."', 
					`gender`       = '".mysqli_real_escape_string($homedb, $gender)."',  
					`phone`        = '".mysqli_real_escape_string($homedb, $phone)."',
					`city`         = '".mysqli_real_escape_string($homedb, $city)."',
					`state`        = '".mysqli_real_escape_string($homedb, $state)."',
					`country`      = '".mysqli_real_escape_string($homedb, $nationality)."',    
					`bank_name`    = '".mysqli_real_escape_string($homedb, $bank_name)."',
					`account_name` = '".mysqli_real_escape_string($homedb, $account_name)."',
					`account_no`   = '".mysqli_real_escape_string($homedb, $account_number)."'
					WHERE `login_table`.`username` ='$username'");
					if(mysqli_query($homedb, $queryupdate))
					{
						
						
					//REST OTP TO NULL 
					$queryupdate=("UPDATE `otp_table` SET 										 		
					`otp_code`     = '".mysqli_real_escape_string($homedb, '')."',										 		
					`otp_status`   = '".mysqli_real_escape_string($homedb, 'account update')."',										 		
					`reg_date`     = '".mysqli_real_escape_string($homedb, $time)."' 
                    WHERE `otp_table`.`username`='$username'");
				   mysqli_query($homedb, $queryupdate);

						$output = array(
						'feedback0' => 'success'
						);
						echo json_encode($output);	
					   

					}
 
		 
  				 
		 	
       
         }


	}
 
	
 	if($_POST['page'] == 'AccountRcover')
	{
		if($_POST['action'] == 'check_email')
		{
			$loader->query = "
			SELECT * FROM login_table 
			WHERE username = '".trim($_POST["email"])."'
			";

			$total_row = $loader->total_row();

			if(!$total_row == 0)
			{
				
 

				
				$output = array(
					'success'		=>	'success' 
					  
					
				);
				echo json_encode($output);
			   }
			
		
		}
	

    	if($_POST['action'] == 'SendLink')
		{
			 
			
			$loader->query = "
			SELECT * FROM login_table 
			WHERE username = '".trim($_POST["userID"])."'
			";

			$result_row = $loader->query_result();

			foreach($result_row as $row){
				
				$passCode = $row['password'];
				$userName = $row['username'];
			}
				$receiver_email=''.trim($_POST['userID']).'';
				$subject = 'Account Recovery Link';
				$body = "
						<div style='width:100%;height:5px;background: #c908bd'></div><br> 
						<div style='font-size:14px;color:black;font-family:lucida sans;'>
							 <center>
							 <img src=\"cid:logo\"  style='text-align:center;height:150px;'/> <br> 
							 <h1>OWAMBE EXTRA </h1>
							 </center><br>
							 
							<div style='font-size:17px;'>	<br><br>


							<h3 style='font-family:lucida sans;color:#777777;'>Account Recovery Link</h3>


							<p>Click on this link below and you can easily reset your password </p>
							<div>
							<a href='https://owambextra.gse-mart.com/reset_account.php?account_reset=$passCode&check=$userName'>Click here </a></div>
							<br><br>

							<br><br><center style='font-size:14px;color:#ccc;'>OWAMBE EXTRA  </center><br>
							<div style='width:100%;height:5px;background: #c908bd'></div>	
							</div>
							";
				
				$loader->send_email($receiver_email, $subject, $body);

					$output = array(
					'success'		=>	'success' 

					);
					
				echo json_encode($output);
			
			
	 
		
		}
	


    	if($_POST['action'] == 'passwordUPDATE')
		{
			 
			$newPassword = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
			$user = $_POST['user'];
			 
				
				 	$queryupdate=("UPDATE `login_table` SET 										 		
					`password`     = '".mysqli_real_escape_string($homedb, $newPassword)."' 
					WHERE `login_table`.`username`='$user'");
					
					
					mysqli_query($homedb, $queryupdate);

					$output = array(
					'success'		=>	'success' 

					);
					
				echo json_encode($output);
			
			
	 
		
		}
	

  

	
	}
 
 
}
?>
