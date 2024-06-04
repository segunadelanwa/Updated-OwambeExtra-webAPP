<?php
header('content-type:	application/json;');
header("Access-Control-Allow-Origin:  *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");

$homedb = mysqli_connect ('owambextra.com', 'owambext_user',  'referersellblog123123#$',  'owambext_db');	

header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
include("../api/api.php");
$date = date('Y-m-d');
$time = date("H:i:s", STRTOTIME(date('h:i:sa'))); 






 $json = file_gets_contents('php://input');
 $obj = json_decode($json,true);
 
 $email    = $obj['username'];
 $password = $obj['password'];
 $action   = $obj['action'];
 $login    = $obj['login'];
 
 
	 	 
    if($login  == 'login')
	{
	    
       $username = $_POST['username'];

		$form_data = array(	
		     'username'    => $email ,
		     'password'    =>$password 
		 );
		 
 

		 
		 
				 $api_url = "https://owambextra.com/api/api/call_api.php?action=login"; 
				 
				 
				 $client = curl_init($api_url);
				 curl_setopt($client, CURLOPT_POST, true);
				 curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				 curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				 $response = curl_exec($client);
				 curl_close($client);
				$result = json_decode($response);
				foreach($result as $row)
				 {
					if( $row->success == '0')
					{
							$response = array(
		
			                     "id"              => $row->id, 
			                     "photo          " => $row->photo,
			                     "username"        => $row->username, 
			                     "fullname"        => $row->fullname, 
			                     "phone_no"        => $row->phone_no, 
			                     "acc_verify"      => $row->acc_verify, 
			                     "registered_date" => $row->registered_date,  
			                     "staus"           => "success" 
			                   );		
					}
					elseif( $row->success == '1')
					{
							$response = array(
			                     "feedback1" => "1", 
			                     "feedback" => "Wrong Password Detected!" 
			                   );	
					}
					elseif( $row->success == '2')
					{
							$response = array(
			                     "feedback1" => "2", 
			                     "feedback" => "Email  is not verify. Check your email for verification link" 
			                   );	
					}
					elseif($row->success == '3')
					{
							$response = array(
			                     "feedback1" => "3", 
			                     "feedback" => "This email address is not registered. <br/>Please register below to get started" 
			                   );	
					}
					
					 
				 }
		 
		 
	  echo json_encode($response);
	 
  } 
 


$api_object = new API();

if(isset($_POST["action"]))
{

 
    if($_POST["login"]  == 'register')
	{
	    
    $username = $_POST['username'];

		$form_data = array(	
		     'username'    =>$_POST['username'],
		     'fullname'    =>$_POST['fullname'],
		     'phone'       =>$_POST['phone'],
		     'password'    =>$_POST['password']
		 );
		 
		 
			$api_object->query = " SELECT * FROM `login_table`  WHERE `username` = '$username' ";
			$total_row = $api_object->total_row();

	if($total_row == 0)
	{

				
		 
		    $querywallet =("INSERT INTO `refer_wallet` VALUE (
			'', 
			'".mysqli_real_escape_string($homedb, $_POST['username'])."',  
			'".mysqli_real_escape_string($homedb, '')."',  
			'".mysqli_real_escape_string($homedb, '')."',   
			'".mysqli_real_escape_string($homedb, '')."',    
			'".mysqli_real_escape_string($homedb, $date)."'   
			)");
			mysqli_query($homedb, $querywallet);

		    $querywallet =("INSERT INTO `main_wallet` VALUE (
			'', 
			'".mysqli_real_escape_string($homedb, $_POST['username'])."',  
			'".mysqli_real_escape_string($homedb, '')."',  
			'".mysqli_real_escape_string($homedb, '')."',   
			'".mysqli_real_escape_string($homedb, $date)."', 
			'".mysqli_real_escape_string($homedb, $time)."', 
			'".mysqli_real_escape_string($homedb, '')."',
			'".mysqli_real_escape_string($homedb, '')."' 
			)");
			mysqli_query($homedb, $querywallet); 



		    $querywallet =("INSERT INTO `otp_table` VALUE (
			'', 
			'".mysqli_real_escape_string($homedb, $_POST['username'])."',  
			'".mysqli_real_escape_string($homedb, '')."',  
			'".mysqli_real_escape_string($homedb, '')."',   
			'".mysqli_real_escape_string($homedb, $date)."' 
			)");
			mysqli_query($homedb, $querywallet); 
		 
		 
				 $api_url ="https://owambextra.com/api/api/call_api.php?action=register";
				 
				 
				 $client = curl_init($api_url);
				 curl_setopt($client, CURLOPT_POST, true);
				 curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				 curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				 $response = curl_exec($client);
				 curl_close($client);
				$result = json_decode($response, true);
				foreach ($result as $keys => $values)
				 {
					if($result[$keys]['success'] == '1')
					{
							$response = array(
		
			                     "feedback1" => "insert", 
			                     "feedback" => "Account Registered!" 
			                   );		
					}
					else
					{
							$response = array(
			                     "feedback1" => "failed", 
			                     "feedback" => "Account Registration Failed!" 
			                   );	
					}
					 
				 }
		 

		 
	 }
	 else
	 {
		$response = array(
		     "feedback1" => "error", 
			  "feedback" => "Account Aleady Registered!" 
                );
     }
	 
  } 
	

    if($_POST["login"]  == 'login')
	{
	    
       $username = $_POST['username'];

		$form_data = array(	
		     'username'    =>$_POST['username'],
		     'password'    =>$_POST['password'] 
		 );
		 
 

		 
		 
				 $api_url = "https://owambextra.com/api/api/call_api.php?action=login"; 
				 
				 
				 $client = curl_init($api_url);
				 curl_setopt($client, CURLOPT_POST, true);
				 curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				 curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				 $response = curl_exec($client);
				 curl_close($client);
				$result = json_decode($response);
				foreach($result as $row)
				 {
					if( $row->success == '0')
					{
							$response = array(
		
			                     "id"              => $row->id, 
			                     "photo          " => $row->photo,
			                     "username"        => $row->username, 
			                     "fullname"        => $row->fullname, 
			                     "phone_no"        => $row->phone_no, 
			                     "acc_verify"      => $row->acc_verify, 
			                     "registered_date" => $row->registered_date,  
			                     "staus"           => "success" 
			                   );		
					}
					elseif( $row->success == '1')
					{
							$response = array(
			                     "feedback1" => "1", 
			                     "feedback" => "Wrong Password Detected!" 
			                   );	
					}
					elseif( $row->success == '2')
					{
							$response = array(
			                     "feedback1" => "2", 
			                     "feedback" => "Email  is not verify. Check your email for verification link" 
			                   );	
					}
					elseif($row->success == '3')
					{
							$response = array(
			                     "feedback1" => "3", 
			                     "feedback" => "This email address is not registered. <br/>Please register below to get started" 
			                   );	
					}
					 
				 }
		 
		 
	  
	 
  } 
	 
  	
    if($_POST["login"] =='fetch_single')
	{
	  $id= $_POST["id"];
	  
	   $api_url = "https://owambextra.com/api/api/call_api.php?action=fetch_single&id=$id";
	   $client = curl_init($api_url);
	   curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
	   $re_sult = curl_exec($client);
	   $result = json_decode($re_sult);
	   
		foreach($result as $row)
		{
			 
				$response = array(
				 "id"          => $row->id,  
				 "username"    => $row->username, 
				 "fullname"    => $row->fullname, 
				 "phone_no"    => $row->phone_no, 
				 "password"    => $row->password 
				 
		         );
	     }	
	}	

    if($_POST["login"] =='update_user')
	{
		$form_data = array(
		'fullname'  => $_POST['fullname'],
		'username'  => $_POST['username'],
		'password'  => $_POST['password'],
		'hidden_id' => $_POST['hidden_id']
		);
		
		
	   $api_url = "https://api.owambextra.com/api/api/call_api.php?action=update";
		 $client = curl_init($api_url);
		 curl_setopt($client, CURLOPT_POST, true);
		 curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		 curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		 $response = curl_exec($client);
		 curl_close($client);
		$result = json_decode($response);
		
		foreach($result as  $row)
		{
			
				if($row->success  == '1')
				{
					
							$response = array(
			                     "result"   => "success", 
			                     "feedback" => "User Account Updated" 
			                   );
					
				}else{
					
							$response = array(
			                     "result"   => "error",
                                 "feedback" => "User Account Failed!"								 
			                   );
					
				}
			
		}
		
		
	}



     if($_POST["login"] =='delete_single')
	{
	  $id= $_POST["id"];
	  
	   $api_url = "https://owambextra.com/api/api/call_api.php?action=delete&id=$id";
	   $client = curl_init($api_url);
	   curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
	   $re_sult = curl_exec($client);
	   $response = json_decode($re_sult);
	   
	 	
	}	








  echo json_encode($response); 
   
}










?>