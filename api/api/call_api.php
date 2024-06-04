<?php
 

header('content-type:	application/json;');
header("Access-Control-Allow-Origin:  * ");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");

$homedb = mysqli_connect ('owambextra.com', 'owambext_user',  'referersellblog123123#$',  'owambext_db');

include('api.php');

$api_object = new API();

 
if($_GET["action"] == 'fetch_login')
{
 $data = $api_object->fetch_login();	
}

 
if($_GET["action"] == 'fetch_ox_invest')
{
 $data = $api_object->fetch_ox_invest();	
}

 
if($_GET["action"] == 'fetch_user_invest')
{
 $data = $api_object->fetch_user_invest();	
}

 
if($_GET["action"] == 'fetch_main_wallet')
{
 $data = $api_object->fetch_main_wallet();	
}
 
if($_GET["action"] == 'passwordUpdate')
{
 $data = $api_object->passwordUpdate();	
}


if($_GET["action"] == 'detailsUpdate')
{
 $data = $api_object->detailsUpdate();	
}


 
if($_GET["action"] == 'otp_table')
{

    
 $data = $api_object->otp_table();	
}

 
if($_GET["action"] == 'event_previewMode')
{
   // $encode = file_get_contents('php://input');
   // $decode = json_decode($encode, true);
    $user   =  $_GET['user']; 
    
 $data = $api_object-> event_previewMode($user);
 
}

 
if($_GET["action"] == 'event_previewDelete')
{
  
$data = $api_object-> event_previewDelete($_GET['event_id'], $_GET['banner']);
 
}  

if($_GET["action"] == 'event_previewApprove')
{
  
    
 $data = $api_object-> event_previewApprove($_GET['event_id']);
 
} 

if($_GET["action"] == 'profilePhotoUpdate')
{
  
 				
					
	$loader->filedata = $_FILES['profile_photo'];
	$event_ban = $loader->Upload_file();
 
} 




if($_GET['action'] == 'passreset')
{
	 
    $encode = file_get_contents('php://input');
    $decode = json_decode($encode, true);
    
    $user =  $decode['username']; 
    
    
	$api_object->query = "SELECT * FROM login_table WHERE username = '$user'";
    $total_row = $api_object->total_row();
	$result_row = $api_object->query_result();

	foreach($result_row as $row){
    	 $con_user_firstname =$row['firstname'];
    	 $con_user_surname   =$row['surname'];		
		$passCode = $row['password'];
		$userName = $row['username'];
	}
	
					
				
			if($total_row > 0)
			{
               
		$receiver_email="$user";
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
                     Dear $con_user_firstname $con_user_surname,

					<p>Click on this link below and you can easily reset your password </p>
					<div>
					<a href='https://owambextra.com/reset_account.php?account_reset=$passCode&check=$userName'>Click here </a></div>
					<br><br>

					<br><br><center style='font-size:14px;color:#ccc;'>OWAMBE EXTRA  </center><br>
					<div style='width:100%;height:5px;background: #c908bd'></div>	
					</div>
					";
		
	                 	$api_object->send_email($receiver_email, $subject, $body);
                                            
                                            $data[] = array(
                                            'success'  =>  'ok', 
                                            'feedback2' =>  $user
                                            );
                                    
			}
			else
			{
                                            $data[] = array(
                                            'success'  =>  'failed', 
                                            'feedback2' => 'Account does not exist'
                                            );
			}

			
		 
	
	

 $data ;
}
	
 
 
if($_GET['action'] == 'self')
{
    
    $encode = file_get_contents('php://input');
    $decode = json_decode($encode, true);
    
    
    $current_date  = date('Y-m-d');	
	$ip_address = $_SERVER['REMOTE_ADDR'];
	$current_datetime = date("Y-m-d");
	$time = date("H:i:s", STRTOTIME(date('h:i:sa')));
	
	$event_id =time();
	

	
	
	
	 

			if($decode['subsidiary_group'] == 1)
			{
				
			$api_object->filedata = $_FILES['banner_img2'];
			$event_ban = $api_object->Upload_file();				

			}
			else
			{
				
				

				
 	
//               include('../../font_directory.php');
					$font   = dirname(__FILE__) . '..\..\img_gallery\font\Lobster-Regular.ttf'; 
    				$font2  = dirname(__FILE__) . '..\..\img_gallery\font\Poppins-Bold.ttf'; 
  				    $font22 = dirname(__FILE__) . '..\..\img_gallery\font\Poppins-Regular.ttf'; 
    				$font3  = dirname(__FILE__) . '..\..\img_gallery\font\Pacifico-Regular.ttf'; 
    				$font4  = dirname(__FILE__) . '..\..\img_gallery\font\Cardo-Regular.ttf'; 
    				$font5  = dirname(__FILE__) . '..\..\img_gallery\font\OleoScriptSwashCaps-Regular.ttf'; 
               
				$event_banner = imagecreatefromjpeg($decode['banner_img1']);
				
				
				$text_color  = $decode['text_color'];
//include('text_color.php');				 
				 
			    
if($text_color == 1 ){  
//COLOR(white white)	1 
$red      = imagecolorallocate($event_banner, 250, 250, 250);
$default  = imagecolorallocate($event_banner, 250, 250, 250); 
$bblack   = ImageColorAllocate($event_banner, 250, 250, 250);
}elseif($text_color == 2){ 
//COLOR(black and black  )	2
$red      = imagecolorallocate($event_banner, 22, 22, 22);
$default  = imagecolorallocate($event_banner, 22, 22, 22); 
$bblack   = ImageColorAllocate($event_banner, 22, 22, 22);
}elseif($text_color == 3){ 
//COLOR(yello and yellow  )	3
$red      = imagecolorallocate($event_banner, 229, 240, 28);
$default  = imagecolorallocate($event_banner, 229, 240, 28); 
$bblack   = ImageColorAllocate($event_banner, 229, 240, 28);  
}elseif($text_color == 4){ 
//COLOR(blue and blue  )	4
$red      = imagecolorallocate($event_banner, 15,  32, 125);
$default  = imagecolorallocate($event_banner, 15,  32, 125); 
$bblack   = ImageColorAllocate($event_banner, 15,  32, 125);	
}elseif($text_color == 5){ 		
//COLOR(Pink and Pink  )	5
$red      = imagecolorallocate($event_banner, 240, 28, 169);
$default  = imagecolorallocate($event_banner, 240, 28, 169); 
$bblack   = ImageColorAllocate($event_banner, 240, 28, 169);	
}elseif($text_color == 6){ 
//COLOR(Gold and Gold )	6
$red      = imagecolorallocate($event_banner, 242, 230, 65);
$default  = imagecolorallocate($event_banner, 242, 230, 65); 
$bblack   = ImageColorAllocate($event_banner, 242, 230, 65);						
}elseif($text_color == 7){  
//COLOR(white and black  )	7
///////////////////////////////////////////////////////////////////////
$red      = imagecolorallocate($event_banner, 250, 250, 250);
$default  = imagecolorallocate($event_banner, 250, 250, 250); 
$bblack   = ImageColorAllocate($event_banner, 22, 22, 22);
}elseif($text_color == 8){
//COLOR(blue and white )	8 
$red      = imagecolorallocate($event_banner, 250, 250, 250);
$default  = imagecolorallocate($event_banner, 250, 250, 250); 
$bblack   = ImageColorAllocate($event_banner, 15,  32, 125);
}elseif($text_color == 9){
//COLOR(white and gold  )	9
$red      = imagecolorallocate($event_banner, 250, 250, 250);
$default  = imagecolorallocate($event_banner, 250, 250, 250); 
$bblack   = ImageColorAllocate($event_banner, 242, 230, 65);
}elseif($text_color == 10){						
//COLOR(black and blue  )	10
$red      = imagecolorallocate($event_banner, 15,  32, 125);
$default  = imagecolorallocate($event_banner, 15,  32, 125); 
$bblack   = ImageColorAllocate($event_banner, 22, 22, 22);
}elseif($text_color == 11){						
//COLOR(blue and  black )	11
$red      = imagecolorallocate($event_banner, 22, 22, 22);
$default  = imagecolorallocate($event_banner, 22, 22, 22); 
$bblack   = ImageColorAllocate($event_banner, 15,  32, 125);
}



				
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

			  

				imagejpeg($event_banner, "../../public_banner/$event_ban");
				
			}
			

	            $api_object->data = array( 
				':event_category'			=>	$decode['event_categories'],
				':event_start_date'			=>	$decode['event_startdate'],
				':event_time'			    =>	$decode['event_time'],
				':event_end_date'			=>	$decode['event_enddate'],
				':event_location'			=>	$decode['event_location'],
				':event_note'   		    =>	$decode['event_shortnote'],
				':event_city'		        =>	$decode['event_city'],
				':event_state'		        =>	$decode['event_state'],
				':event_country'	        =>	$decode['event_country'],
				':prospect_guest'           =>	$decode['expected_no'],
				':contact_no'	            =>	$decode['contact_rsvp'],
				':security_note'            =>	$decode['invitaion_degree'], 
				':event_banner'		    	=>	$event_ban,
				':event_id'		    	    =>	$event_id, 
				':firstname'		   	    =>	$decode['event_proxyfirstname'],
				':surname'		    	    =>	$decode['event_proxylastname'],
				':username'		    	    =>	$decode['username'],
				':ip_address'		        =>	$ip_address,
				':posted_date'	        	=>	$current_datetime,
				':event_owner'	        	=>	'self',
				':current_guest'	        =>	'0',
				':gift_arrived'	        	=>	'0'
			);

					$api_object->query = "
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

			if($api_object->execute_query())
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
            			
            			if(mysqli_query($homedb, $queryWallet)){
                        
                                       $data[] = array(
                                'success'	   => '1',
                                'feedback'     => 'You have successfully created a self event. click continue to preview'
                                );
                        
                        }else{
                        
                                     $data[]    = array(
                                'success'		=> '0',
                                'feedback'      => 'Failed to due to network problem'
                                );
            	
            			}

			 
            }
            else
            {
            
                         $data[]    = array(
                    'success'		=> '0',
                    'feedback'      => 'An Error has occured',
                    'note'          => $event_banner
                    );
	
			}





 

 $data ;	
}
 


if($_GET["action"] == 'register_api')
{
 


 
	   	
        $encode = file_get_contents('php://input');
        $decode = json_decode($encode, true);
        
        $receiver_email = $decode['accountusername'];
        $password    	= password_hash($decode['userpassword'], PASSWORD_DEFAULT); 
        $firstname      = $decode['userfirstname'];
        $surname	    = $decode['usersurname'];
		$gender	        = $decode['usergender'];
		$phone	        = $decode['userphone']; 
		$address	    = $decode['useraddress']; 
        $cur_date       = date("Y-m-d");
        $ip_address     = $_SERVER['REMOTE_ADDR'];
        
        $user_verf_code = md5(rand());
        
        
        
        
        $api_object->query = " SELECT * FROM login_table  WHERE username = '$receiver_email' ";
        $api_object->execute_query();
        
        
        $total_row = $api_object->total_row();
			 

	if($total_row < 1)
	{

	 
	     				$query_login =("INSERT INTO login_table VALUE (
    					'', 
    					'".mysqli_real_escape_string($homedb, 'placeholder.png')."',  
    					'".mysqli_real_escape_string($homedb, $receiver_email)."',  
    					'".mysqli_real_escape_string($homedb, $password)."',
    					'".mysqli_real_escape_string($homedb, $surname)."',
                        '".mysqli_real_escape_string($homedb, $firstname)."',
                        '".mysqli_real_escape_string($homedb, $gender)."',
                        '".mysqli_real_escape_string($homedb, $phone)."',
                        '".mysqli_real_escape_string($homedb, $address)."',
                        '".mysqli_real_escape_string($homedb, '')."',
                        '".mysqli_real_escape_string($homedb, '')."',
                        '".mysqli_real_escape_string($homedb, '')."',
                        '".mysqli_real_escape_string($homedb, $cur_date)."',
                        '".mysqli_real_escape_string($homedb, $ip_address)."',
                        '".mysqli_real_escape_string($homedb, 'no')."',
                        '".mysqli_real_escape_string($homedb, $user_verf_code)."',
                        '".mysqli_real_escape_string($homedb, '')."',
                        '".mysqli_real_escape_string($homedb, '')."',
                        '".mysqli_real_escape_string($homedb, '')."'
    					)");
    					
    					if(mysqli_query($homedb, $query_login))
    					{
                        	
                                $queryOtp =("INSERT INTO otp_table VALUE (
                                '', 
                                '".mysqli_real_escape_string($homedb, $receiver_email)."',  
                                '".mysqli_real_escape_string($homedb, '')."',  
                                '".mysqli_real_escape_string($homedb, '')."',
                                '".mysqli_real_escape_string($homedb, $current_datetime)."'
                                )");
                                
                                mysqli_query($homedb, $queryOtp);
    					
                           
    					     
    						$subject = 'Account Email Verification';
    
    						$body = "
    						<div style='width:100%;height:5px;background: linear-gradient(to left, red, black)'></div><br> 
    						<div style='font-size:14px;color:black;font-family:lucida sans;'>
    						<center >
    						<img src=\"cid:logo\"  style='text-align:center;height:150px;'/> <br> 
    						<h1>OWAMBE EXTRA </h1>
    						</center><br>
    
    
    						<p>Thank you for registering.</p>
    						<p>This is a verification mail, please click the link to verify your eMail address by clicking this button below<br>
    						<a href='https://owambextra.com/login/index.php?user=$receiver_email&code=$user_verf_code' >
    						<button style='padding:10px;color:white; border-radius:10px; background-color:#c908bd;'> VERIFY EMAIL </button>
    						</a><br>
    						</p>
    
    
    						<span style='font-size:15px;text-align:center;'>OWAMBE EXTRA OTP  <span><br>
    						<div style='width:100%;height:5px;background: linear-gradient(to left, #e81212, #1A330C, gold)'></div>  
    						</div><br><br>
    						</div>			
    						";
    
    						$api_object->send_email($receiver_email, $subject, $body);
    					
    
            				$data[] = array(
            				'success'  =>  'ok',
            				'feedback' =>  'Account Registration Successfully!',
            				'feedback2' =>  $receiver_email
            				);
            				
            	 
			
			}
			else
			{

				$data[] = array(
				'success'  =>  'ok',
				'feedback' =>  'Account Registration Failed!',
			    'feedback2' =>  $receiver_email
				);						    
			    
			}
			
					 



	}
	else
	{
		$data[] = array(
		 'success'  =>  'ok',
		 'feedback'  =>  'Account already registered !'
		);
	}

			
			
 $data;
 
}

 
if($_GET["action"] == 'fingerPrintlogin')
{
 
 
	$encode = file_get_contents('php://input');
	$decode = json_decode($encode, true);
	
	    $user =  $_GET['user']; 
 
 
  
				$api_object->query = "SELECT SUM(`current_balance`) FROM `self_wallet` WHERE `username` ='$user'";
				$result_user_wallet = $api_object->query_result();
				foreach($result_user_wallet as $row){
					$my_wall_balance =  number_format($row['SUM(`current_balance`)'],2);
				}
	   
				$api_object->query = "SELECT SUM(`current_balance`) FROM `proxy_wallet` WHERE `username` ='$user'";
				$result_user_wallet = $api_object->query_result();
				foreach($result_user_wallet as $row){
					$my_proxy_balance =  number_format($row['SUM(`current_balance`)'],2);
				}
	   
	     		

                $api_object->query = "SELECT * FROM `public_event` WHERE `username` ='$user' AND `event_owner`='self' ORDER BY `id` DESC";
                $user_event = $api_object->total_row(); 

                $api_object->query = "SELECT * FROM `public_event` WHERE `username` ='$user' AND `event_owner`='proxy' ORDER BY `id` DESC";
                $proxy_event = $api_object->total_row(); 

	     	
	     	
                $api_object->query = " SELECT * FROM login_table  WHERE username = '".$user."' "; 
                $total_row = $api_object->total_row();
			 

		 
				$result = $api_object->query_result();

				foreach($result as $row)
				{
				 
							 
				 	

									$data[] = array(
                                    'success'      =>  'ok', 
                                    'username'     =>  $row['username'], 
                                    'photo'        =>  $row['photo'], 
                                    'surname'      =>  $row['surname'], 
                                    'firstname'    =>  $row['firstname'], 
                                    'gender'       =>  $row['gender'], 
                                    'phone'        =>  $row['phone'], 
                                    'address'      =>  $row['address'], 
                                    'city'         =>  $row['city'], 
                                    'state'        =>  $row['state'], 
                                    'country'      =>  $row['country'], 
                                    'reg_date'     =>  $row['reg_date'], 
                                    'bank_name'    =>  $row['bank_name'], 
                                    'account_name' =>  $row['account_name'],
                                    'account_no'   =>  $row['account_no'],
                                    
                                    'my_wall_balance' => $my_wall_balance,
                                    'my_proxy_balance'=> $my_proxy_balance,
                                    'user_event'     =>  $user_event,
                                    'proxy_event'    =>  $proxy_event,
                                    
	                     
									);
				 
			 
				}
 
	 


   		
			
 
 $data ;

  
}


 
if($_GET["action"] == 'login')
{
//$data = $api_object->login();

 
 
	$encode = file_get_contents('php://input');
	$decode = json_decode($encode, true);
	
	    $user =  $decode['username'];
	    $pass =  $decode['password'];
 
 
	 
	 
	 
				$api_object->query = "SELECT SUM(`current_balance`) FROM `self_wallet` WHERE `username` ='$user'";
				$result_user_wallet = $api_object->query_result();
				foreach($result_user_wallet as $row){
					$my_wall_balance =  number_format($row['SUM(`current_balance`)'],2);
				}
				
				
				
	   
				$api_object->query = "SELECT SUM(`current_balance`) FROM `proxy_wallet` WHERE `username` ='$user'";
				$result_user_wallet = $api_object->query_result();
				foreach($result_user_wallet as $row){
					$my_proxy_balance =  number_format($row['SUM(`current_balance`)'],2);
				}
	   
	     		

                $api_object->query = "SELECT * FROM `public_event` WHERE `username` ='$user' AND `event_owner`='self' ORDER BY `id` DESC";
                $user_event = $api_object->total_row(); 

                $api_object->query = "SELECT * FROM `public_event` WHERE `username` ='$user' AND `event_owner`='proxy' ORDER BY `id` DESC";
                $proxy_event = $api_object->total_row(); 

	     	
	     	
                $api_object->query = " SELECT * FROM login_table  WHERE username = '".$user."' "; 
                $total_row = $api_object->total_row();
			 

			if($total_row > 0)
			{
				$result = $api_object->query_result();

				foreach($result as $row)
				{
					if($row['acc_verify'] == 'yes')
					{
					  
							 
						 if(password_verify(trim($pass), $row['password']))
						{
							

									$data[] = array(
                                    'success'      =>  'ok', 
                                    'username'     =>  $row['username'], 
                                    'photo'        =>  $row['photo'], 
                                    'surname'      =>  $row['surname'], 
                                    'firstname'    =>  $row['firstname'], 
                                    'gender'       =>  $row['gender'], 
                                    'phone'        =>  $row['phone'], 
                                    'address'      =>  $row['address'], 
                                    'city'         =>  $row['city'], 
                                    'state'        =>  $row['state'], 
                                    'country'      =>  $row['country'], 
                                    'reg_date'     =>  $row['reg_date'], 
                                    'bank_name'    =>  $row['bank_name'], 
                                    'account_name' =>  $row['account_name'],
                                    'account_no'   =>  $row['account_no'],
                                    
                                    'my_wall_balance'     =>  $my_wall_balance,
                                    'my_proxy_balance'    =>  $my_proxy_balance,
                                    'user_event'          =>  $user_event,
                                    'proxy_event'         =>  $proxy_event 
                                    
                                    
									);
									
						}
						else
						{
									$data[] = array(
									'success'  =>  'You have entered wrong password '
									);
							
						}
					}
					else
					{
									$data[] = array(
									'success'  =>  'Account email not verified. Please click a verification link that was sent to your email to continue '
									);
					}
				}
			}
			else
			{
					$data[] = array(
					'success'  =>  'Invalid Account ',
					'feedback'  =>  $pass
					);
			}

	 

   		
			
 
 $data ;

  
}


if($_GET["action"] == 'LoginUpdate')
{
 
        
        
   
	           $user = $_GET['user'];
			 
		 
 
			
				$api_object->query = "SELECT SUM(`current_balance`) FROM `self_wallet` WHERE `username` ='$user'";
				$result_user_wallet = $api_object->query_result();
				foreach($result_user_wallet as $row){
					$my_wall_balance =  number_format($row['SUM(`current_balance`)'],2);
				}
	   
				$api_object->query = "SELECT SUM(`current_balance`) FROM `proxy_wallet` WHERE `username` ='$user'";
				$result_user_wallet = $api_object->query_result();
				foreach($result_user_wallet as $row){
					$my_proxy_balance =  number_format($row['SUM(`current_balance`)'],2);
				}
	   
	     		

                $api_object->query = "SELECT * FROM `public_event` WHERE `username` ='$user' AND `event_owner`='self' AND `check_preview`='approved' ";
                $user_event = $api_object->total_row(); 

                $api_object->query = "SELECT * FROM `public_event` WHERE `username` ='$user' AND `event_owner`='proxy' AND `check_preview`='approved'";
                $proxy_event = $api_object->total_row(); 

	     	
	     	
                $api_object->query = " SELECT * FROM login_table  WHERE username = '".$user."' "; 
                $total_row = $api_object->total_row();
			 

			if($total_row > 0)
			{
				$result = $api_object->query_result();

            				foreach($result as $row)
            				{ 
            				    
            
            									$data[] = array(
                                                'success'      =>  'ok', 
                                                'username'     =>  $row['username'], 
                                                'photo'        =>  $row['photo'], 
                                                'surname'      =>  $row['surname'], 
                                                'firstname'    =>  $row['firstname'], 
                                                'gender'       =>  $row['gender'], 
                                                'phone'        =>  $row['phone'], 
                                                'address'      =>  $row['address'], 
                                                'city'         =>  $row['city'], 
                                                'state'        =>  $row['state'], 
                                                'country'      =>  $row['country'], 
                                                'reg_date'     =>  $row['reg_date'], 
                                                'bank_name'    =>  $row['bank_name'], 
                                                'account_name' =>  $row['account_name'],
                                                'account_no'   =>  $row['account_no'],
                                                
                                                'my_wall_balance'     =>  $my_wall_balance,
                                                'my_proxy_balance'    =>  $my_proxy_balance,
                                                'user_event'          =>  $user_event,
                                                'proxy_event'         =>  $proxy_event
                                                
                         
                                                
                                                
                                                
            									);
            				 
            			 
            				}
			} 

	 

   		
			
 
 $data ;
		
 	}

 
if($_GET["action"] == 'app_version')
{
 
 
		 
                $api_object->query = "SELECT * FROM `app_version` ";
                $result_user_wallet = $api_object->query_result();
             	foreach($result_user_wallet as $row)
				{ 
				    

					$data[] = array(
                    'old_version'    =>  $row['old_version'],
                    'new_version'    =>  $row['new_version'],
                    'appcloud_lik'   =>  $row['appcloud_lik'],
                    'playstore_link' =>  $row['playstore_link']
          
					);
				 
			 
				}
	 

   		
			
 
 $data ;
		
 	}

 
 
if($_GET["action"] == 'email_verify')
{
$data = $api_object->email_verify($_GET["user"], $_GET["code"]);	
}



if($_GET["action"] == 'walletCashout')
{
					     
        $encode = file_get_contents('php://input');
        $decode = json_decode($encode, true);
        
        $username          = $decode['username'];      
        $event_id          = $decode['event_id'];         
        $bank_name         = $decode['setBank_name'];     
        $account_name      = $decode['setAccount_name'];  
        $account_no        = $decode['account_no']; 
        $lock_status       = $decode['lock_status'];      
        $eventOwner        = $decode['eventOwner'];
        $cashout_amt       = $decode['cashoutAmt'];
        
        
        $cash_code=time();
        $cashout_code="event_cash_$cash_code";
        
        $otp="Mobile Cashout";
        $payment_sta="Mobile Cashout";
        $cashout_sta="Mobile Cashout";
        $officer_email="Pending";
        $payment_officer="Processing.."; 
        $date_init=date('Y-m-d');
        $curr_time=date("H:i:s a");
        $ip_address = $_SERVER['REMOTE_ADDR'];
 
 				 if($eventOwner == 'proxy')
				 {
				  
			           $resultnow = $api_object->ProxyWalletBal($event_id); 
                        foreach($resultnow as $row_b){
                        
                        $cur_bal     = $row_b['current_balance'];
                        $prev_bal   = number_format($row_b['previous_balance'],2);
                        }
                       $new_bal =   $cur_bal - $cashout_amt;
                       
                                                        $queryupdate=("UPDATE `proxy_wallet` SET 										 		
                                                        `lock_status`      = '".mysqli_real_escape_string($homedb, 'lock')."',	
                                                        `current_balance`  = '".mysqli_real_escape_string($homedb, $new_bal)."',	
                                                        `previous_balance` = '".mysqli_real_escape_string($homedb, $cur_bal)."'	
                                                        WHERE `proxy_wallet`.`proxy_event_id`='$event_id'"); 
                                                        if(mysqli_query($homedb, $queryupdate))
                                                        {
 
 
                                                         
                                                         	// INSERT DATA TO CASHOUT TABLE
                                                            $queryupdate ="INSERT INTO `cashout` VALUES(
                                                            '',									 
                                                            '".mysqli_real_escape_string($homedb, $username)."',									 
                                                            '".mysqli_real_escape_string($homedb, $cashout_amt)."',								 
                                                            '".mysqli_real_escape_string($homedb, $cur_bal)."',							 
                                                            '".mysqli_real_escape_string($homedb, $new_bal)."',
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
                                                            '".mysqli_real_escape_string($homedb, $event_id)."',
                                                            '".mysqli_real_escape_string($homedb, $eventOwner)."'
                                                            )"; 
                                                            mysqli_query($homedb, $queryupdate);
                                                            
                                                            
                                                        
                                                        $receiver_email ="$username";                                    // Set email format to HTML
                                                        $subject = 'PROXY EVENT CASHOUT NOTIFICATION';
                                                        $body    = "
                                                                    <div style='width:100%;height:5px;background: #c908bd'></div><br> 
                                                                    <div style='font-size:14px;color:black;font-family:lucida sans;'>
                                                                    
                                                                        <center >
                                                                        
                                                                        <img src=\"cid:logo\"  style='text-align:center;height:150px;'/> <br> 
                                                                        <h1>OWAMBE EXTRA PROXY EVENT CASHOUT</h1>
                                                                        </center><br>
                                                                    
                                                                        <p>
                                                                        Please, do note that there was proxy event cashout from your account<br>
                                                                        Check the  proxy event cashout details below:<br><br>  
                                                                        
                                                                        Email Address- $username <hr>         
                                                                        Event ID - $event_id <hr>               
                                                                        Bank Name -  $bank_name     <hr>    
                                                                        Account Name - $account_name  <hr>    
                                                                        Account Number - $account_no    <hr>     
                                                                        Account Status -$lock_status   <hr>         
                                                                        Amount Cashout -  $cashout_amt   <hr>     
                                                                        
                                                                        </p><br><br>
                                                                    
                                                                    
                                                                    <span style='font-size:15px;text-align:center;'>OWAMBE EXTRA CASHOUT NOTIFICATION  <span><br>
                                                                    <div style='width:100%;height:5px;background: #c908bd'></div>
                                                                    </div><br><br>
                                                                ";
                                                                 $api_object->send_email($receiver_email, $subject, $body);
                                                                
                                                                 $api_object->send_email($receiver_email, $subject, $body);
                                                                                                                                
                                                                $data[] = array(
                                                                'success'		=>	'ok',
                                                                'feedback'		=>	'Self Event Cashout Submitted'
            
                                                                );
                                                        }
                                                        else{
                                                            
                                                                $data[] = array(
                                                                'success'		=>	'eer',
                                                                'feedback'		=>	'Self Event Cashout Submission failed'
            
                                                                );
                                                        }
                                                                
                                                                
				 }
				  elseif($eventOwner == 'self')
				 {
                        $resultnow = $api_object->selfWalletBal($event_id); 
                        foreach($resultnow as $row_b){
                        
                        $cur_bal     = $row_b['current_balance'];
                        $prev_bal   = number_format($row_b['previous_balance'],2);
                        }
                        $new_bal     =  $cur_bal - $cashout_amt; 
                        
                                                         $queryupdate=("UPDATE `self_wallet` SET 										 		
                                                        `lock_status`      = '".mysqli_real_escape_string($homedb, 'lock')."',	
                                                        `current_balance`  = '".mysqli_real_escape_string($homedb, $new_bal )."',	
                                                        `previous_balance` = '".mysqli_real_escape_string($homedb, $cur_bal)."'	
                                                         WHERE `self_wallet`.`self_event_id`='$event_id'"); 
                                                        if(mysqli_query($homedb, $queryupdate)){
                                                        
                                                        
                                                         	// INSERT DATA TO CASHOUT TABLE
                                                            $queryupdate ="INSERT INTO `cashout` VALUES(
                                                            '',									 
                                                            '".mysqli_real_escape_string($homedb, $username)."',									 
                                                            '".mysqli_real_escape_string($homedb, $cashout_amt)."',								 
                                                            '".mysqli_real_escape_string($homedb, $cur_bal)."',							 
                                                            '".mysqli_real_escape_string($homedb, $new_bal)."',
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
                                                            '".mysqli_real_escape_string($homedb, $event_id)."',
                                                            '".mysqli_real_escape_string($homedb, $eventOwner)."'
                                                            )"; 
                                                            mysqli_query($homedb, $queryupdate);
                                                            
                                                            
                                                            
                                                            
                                                            
                                                        
                                                        $receiver_email ="$username";                                    
                                                        $subject = 'SELF EVENT CASHOUT NOTIFICATION';
                                                        $body    = "
                                                                    <div style='width:100%;height:5px;background: #c908bd'></div><br> 
                                                                    <div style='font-size:14px;color:black;font-family:lucida sans;'>
                                                                    
                                                                        <center >
                                                                        
                                                                        <img src=\"cid:logo\"  style='text-align:center;height:150px;'/> <br> 
                                                                        <h1>OWAMBE EXTRA SELF EVENT CASHOUT</h1>
                                                                        </center><br>
                                                                    
                                                                        <p>
                                                                        Please, do note that there was proxy event cashout from your account<br>
                                                                        Check the  proxy event cashout details below:<br><br>  
                                                                        
                                                                        Email Address- $username <hr>         
                                                                        Event ID - $event_id <hr>               
                                                                        Bank Name -  $bank_name     <hr>    
                                                                        Account Name - $account_name  <hr>    
                                                                        Account Number - $account_no    <hr>     
                                                                        Account Status -$lock_status   <hr>         
                                                                        Amount Cashout -  $cashout_amt   <hr>     
                                                                        
                                                                        </p><br><br>
                                                                    
                                                                    
                                                                    <span style='font-size:15px;text-align:center;'>OWAMBE EXTRA CASHOUT NOTIFICATION  <span><br>
                                                                    <div style='width:100%;height:5px;background: #c908bd'></div>
                                                                    </div><br><br>
                                                                ";
                                                                
                                                                 $api_object->send_email($receiver_email, $subject, $body);
                                                                                                                                
                                                                $data[] = array(
                                                                'success'		=>	'ok',
                                                                'feedback'		=>	'Self Event Cashout Submitted'
            
                                                                );
                                                        }
                                                        else{
                                                            
                                                                $data[] = array(
                                                                'success'		=>	'eer',
                                                                'feedback'		=>	'Self Event Cashout Submission failed'
            
                                                                );
                                                        }
                                                                
                        
				 }
				 
				 
				 
				 
 
				 
	$data;			 
				 
}




 
if($_GET["action"] == 'userlogin')
{
 
 	$encode = file_get_contents('php://input');
	$decode = json_decode($encode, true);
	
    $user =  $decode['username']; 
    
    
    $api_object->query = " SELECT * FROM login_table  WHERE username = '$user'";
    $result = $api_object->query_result();
    
    foreach($result as $row)
    { 
  
    
        $data[] = array(
        'success'      =>  'ok', 
        'photo'        =>  $row['photo'], 
        'surname'      =>  $row['surname'], 
        'firstname'    =>  $row['firstname'], 
        'city'         =>  $row['city'], 
        'state'        =>  $row['state'], 
        'country'      =>  $row['country'], 
        'reg_date'     =>  $row['reg_date'], 
        'bank_name'    =>  $row['bank_name'], 
        'bank_name'    =>  $row['bank_name'], 
        'account_number'=>  $row['account_number']
        );
    }
  
 
 $data;
	
 
}


 ///CASHOUT HISTORY CALLS
if($_GET["action"] == 'cashHistory')
{
 
 	$encode = file_get_contents('php://input');
	$decode = json_decode($encode, true);
	
    $user =  $_GET['username']; 
    
    
    $api_object->query = " SELECT * FROM cashout  WHERE username = '$user'";
    $result = $api_object->query_result();
    
    foreach($result as $row)
    { 
  
    
        $data[] = array(
                'id'               =>  $row['id'],
                'username'         =>  $row['username'], 
                'cashout_amount'   =>  $row['cashout_amount'], 
                'current_bal'      =>  $row['current_bal'], 
                'left_bal'         =>  $row['left_bal'], 
                'bank_name'        =>  $row['bank_name'], 
                'account_name'     =>  $row['account_name'], 
                'account_no'       =>  $row['account_no'], 
                'payment_officer'  =>  $row['payment_officer'], 
                'officer_email'    =>  $row['officer_email'], 
                'cashout_status'   =>  $row['cashout_status'],
                'payment_status'   =>  $row['payment_status'],
                'event_id_cashout' =>  $row['event_id_cashout'],
                'event_select'     =>  $row['event_select'],
                'date_init'        =>  $row['date_init'],
                'cashout_code'     =>  $row['cashout_code']
        );
    }
  
 
 $data;
	
 
}


if($_GET["action"] == 'proxyEvent')
{
 
 	$encode = file_get_contents('php://input');
	$decode = json_decode($encode, true);
	
    $user =  $decode['username']; 
    
    
    $api_object->query = " SELECT * FROM public_event  WHERE username = '$user' AND event_owner = 'proxy'";
    $result = $api_object->query_result();
    
    	$i=0;
    foreach($result as $row)
    { 
   
				$data[$i] = $row;
				$i++;
    }
  
 
 $data;
	
 
}

if($_GET["action"] == 'MyEvent')
{
 
 	$encode = file_get_contents('php://input');
	$decode = json_decode($encode, true);
	
    $user =  $decode['username']; 
    
    
    $api_object->query = " SELECT * FROM public_event  WHERE username = '$user' AND event_owner = 'self'";
    $result = $api_object->query_result();
    
    	$i=0;
    foreach($result as $row)
    { 
   
				$data[$i] = $row;
				$i++;
    }
  
 
 $data;
	
 
}
 
if($_GET["action"] == 'update')
{
$data = $api_object->update();	
}
 
if($_GET["action"] == 'bankDetailsUpdate')
{
$data = $api_object->bankDetailsUpdate();	
}


 
if($_GET["action"] == 'delete')
{
$data = $api_object->event($_GET["id"]); 
}



if($_GET["action"] == 'cashoutevent' )
{
 
 
		$date_init=date('Y-m-d');
		

				
				$eventOwner  = $api_object->GiftOwnerSearch($_GET['eventid']);
				
				foreach($eventOwner as $row)
				{
				$event_owner =$row['event_owner'];
				$user_owner  =$row['username'];
				$EndDate     =$row['event_end_date'];
				} 
				

			
 
 $data;


}


if($_GET["action"] == 'eventcashout' )
{
 
 
		$date_init=date('Y-m-d');
		
		
	 
		    
				/////////Search public event  for event owner 
				//Note the wallet will be locked if subscriber widthraw from his wallet
				//1 if the event has not been concluded
				//2 if celebrate has widthraw from this wallet once
				
				$eventOwner  = $api_object->GiftOwnerSearch($_GET['eventid']);
				
				foreach($eventOwner as $row)
				{
				$event_owner =$row['event_owner'];
				$user_owner  =$row['username'];
				$EndDate     =$row['event_end_date'];
				} 
				
	             	/////////Search   event wallet for either proxy wallet or self wallet
	     if($event_owner == "proxy")
	     {
			   $resultnow = $api_object->ProxyWalletBal($_GET['eventid']);
				    
				foreach($resultnow as $row_b){
				    
                $dataBal2   = number_format($row_b['current_balance'],2);
                $dataBal_raw= $row_b['current_balance'];
                $Previous   = number_format($row_b['previous_balance'],2);
                        
    				$data[] = array( 
    				    
        				'dataBal'          => $dataBal2,
        				'dataBal_raw'      => $dataBal_raw,
        				'Previous'         => $Previous, 
        				'lock_status'      => $row_b['lock_status'],
        				'firstname'        => $row_b['self_firstname'],
        				'lastname'         => $row_b['self_lastname'],
        				'event_owner'      => $event_owner
    				
    				);
				}
 
			   
		  }
		 else if($event_owner == "self")
		 {
			   $resultnow = $api_object->selfWalletBal($_GET['eventid']);
			   
				foreach($resultnow as $row_b){
				    
                $dataBal2   = number_format($row_b['current_balance'],2);
                $dataBal_raw= $row_b['current_balance'];
                $Previous   = number_format($row_b['previous_balance'],2);
                        
    				$data[] = array( 
    				    
        				'dataBal'        => $dataBal2,
        				'dataBal_raw'    => $dataBal_raw,
        				'Previous'       => $Previous, 
        				'lock_status'    => $row_b['lock_status'],
        				'firstname'      => $row_b['self_firstname'],
        				'lastname'       => $row_b['self_lastname'],
        				'event_owner'    => $event_owner
    				
    				);
				}
		  }
         
         //$data="$event_owner";
			
 
 $data;


}




if(($_GET["viewguest_id"] != '') AND  ($_GET["user"] != ''))
{
 
 $a = $_GET["user"];
 $b = $_GET["viewguest_id"];
 
	$resultnow  = $api_object->ProspectGuest($a,$b);

	 	
	 
			$i=0;			
		foreach($resultnow as $row)
		{
			
				$data[$i] = $row;
				$i++;
		}
			
  $data;
       
       
	    
	    /*
    	foreach($resultnow as $row_b)
    	{
    	     
                
    		$data[]=array( 
    		    
    			'eventid'          => $row_b['eventid'],
    			'visitor_fullname' => $row_b['visitor_fullname'],
    			'visitor_number'   => $row_b['visitor_number'],
    			'seat_no'          => $row_b['seat_no'],
    			'date'             => $row_b['date']
    		
    		);
    	*/
     
    

}



if(($_GET["action"] == 'event_gift'))
{
 
 
 $e = $_GET["event_id"];
 
	$resultnow  = $api_object->GetGiftMoney($e);

	 	
	 
// 			$i=0;			
// 		foreach($resultnow as $row)
// 		{
			
// 				$data[$i] = $row;
// 				$i++;
// 		}
		
		
		 foreach($resultnow as $row_b)
    	{
    	     
                
    		$data[]=array( 
    		    
    			'id'                => $row_b['id'],
    			'gift_reference_id' => $row_b['gift_reference_id'],
    			'gift_event_id'     => $row_b['gift_event_id'],
    			'gift_sender_names' => $row_b['gift_sender_names'],
    			'gift_price'        => number_format($row_b['gift_price'],2),
    			'charges_fee'       => number_format($row_b['charges_fee'],2),
    			'gift_name'         => $row_b['gift_name'],
    			'gift_image'        => $row_b['gift_image'],
    			'gift_owner_email'  => $row_b['gift_owner_email'],
    			'date'              => $row_b['date']
    		
    		);
    	}	
  $data;
       
       

    

}



if(($_GET["my_wallet_call"] ))
{
 
 
	
    $user =  $_GET["my_wallet_call"]; 
    
    
    $api_object->query = " SELECT * FROM self_wallet  WHERE username = '$user'";
    $result = $api_object->query_result();
 	
	 
			$i=0;			
		foreach($result as $row)
		{
			
				$data[$i] = $row;
				$i++;
		}
			
  $data;
       
       
 
     
    

}



if(($_GET["my_proxywallet_call"] ))
{
 
 
	
    $user =  $_GET["my_proxywallet_call"]; 
    
    
    $api_object->query = " SELECT * FROM proxy_wallet  WHERE username = '$user'";
    $result = $api_object->query_result();
 	
	 
			$i=0;			
		foreach($result as $row)
		{
			
				$data[$i] = $row;
				$i++;
		}
			
  $data;
       
       
 
     
    

}

 

if(($_GET["event_gallery"]=='action' ))
{
 
 
	
   
    
    
    $api_object->query = " SELECT * FROM galley ";
    $result = $api_object->query_result();
 	
	 
			$i=0;			
		foreach($result as $row)
		{
			
				$data[$i] = $row;
				$i++;
		}
			
  $data;
       
       
 
     
    

}

 

//echo json_encode($data, JSON_PRETTY_PRINT);
echo json_encode($data);
 
?>