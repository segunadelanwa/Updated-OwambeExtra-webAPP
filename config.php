<?php
ob_start();
session_start();

$homedb = mysqli_connect ('localhost', 'root',  '',  'owanbe_db');			
//$homedb= mysqli_connect('gse-mart.com', 'gsemartc_home',  'referersellblog123123#$', 'gsemartc_owambe_db');	 


require"phpmailer/PHPMailerAutoload.php";
$current_datetime = date("Y-m-d");
$time = date("H:i:s", STRTOTIME(date('h:i:sa')));


class Connect{
	
	
	
	
	var $host; 
	var $username;
	var $password;
	var $database;
	var $connect;
	var $home_page;
	var $query;
	var $data;
	var $statement;
	var $filedata;
	
	
	
	function __construct()
	{
		
 
		$this->host = 'localhost';
		$this->username = 'root';
		$this->password = '';
		$this->database = 'owanbe_db';
		//$this->home_page = 'http://127.0.0.1/owambextra.com/login/index.php/';
 /*     
   
		$this->host = 'gse-mart.com';
		$this->username = 'gsemartc_home';
		$this->password = 'referersellblog123123#$';
		$this->database = 'gsemartc_owambe_db';
		//$this->home_page = 'http://localhost/tutorial/online_examination/';
  */
  
	  
		$this->connect = new PDO("mysql:host=$this->host; dbname=$this->database", "$this->username", "$this->password");
       
	 
	}

	function execute_query()
	{
		$this->statement = $this->connect->prepare($this->query);
		$this->statement->execute($this->data);
	}

  

	function total_row()
	{
		$this->execute_query();
		return $this->statement->rowCount();
	}

	function query_result()
	{
		$this->execute_query();
		return $this->statement->fetchAll();
	}

}


		class Loader Extends Connect
		{

  
			function send_email($receiver_email, $subject, $body)
			{
				
			$mail = new PHPMailer;

			//$mail->IsSMTP();

			//$mail->Host = 'smtp host';

			//$mail->Port = '587';

			//$mail->SMTPAuth = true;

			//$mail->Username = '';

			//$mail->Password = '';

			//$mail->SMTPSecure = '';
            $mail->SMTPDebug = 0;  
			$mail->setFrom('noreply@gse-mart.com', 'OWAMBE EXTRA');

			$mail->FromName = 'OWAMBE EXTRA';
			
			$mail->AddReplyTo = 'surpport@owambextra.com';

			$mail->AddAddress($receiver_email, '');

			$mail->IsHTML(true);

			$mail->Subject = $subject;

			$mail->Body = $body;
			
			$mail->AddEmbeddedImage('images/logo.png', 'logo', 'images/logo.png'); 

			$mail->Send();		
			}	
			
			
			function redirect()
			{
				header('location:  index.php');
				exit;
			}

			function admin_session_private()
			{
				if(!isset($_SESSION['admin_id']))
				{
					$this->redirect('login.php');
				}
			}

			function admin_session_public()
			{
				if(isset($_SESSION['admin_id']))
				{
					$this->redirect('index.php');
				}
			}

			function create_wallet($receiver_email)
			{
			 
			}

			function myGift($username)
			{
				
				$this->query = "SELECT SUM(`gift_arrived`) FROM `public_event` WHERE `username`='$username' AND `event_owner`='self'";
				$result = $this->query_result();
				foreach($result as $row){
				$output =  $row ['SUM(`gift_arrived`)']; 	
				}

				//$output = number_format($current_balance,2);
				return $output;
			}

			function event($username)
			{
					$this->query = "SELECT * FROM `public_event` WHERE `username` ='$username' AND `event_owner`='self' ORDER BY `id` DESC";
		 
				   $result = $this->total_row();
			 
		 
					 return$result;
			}


			function proxyAccount($username)
			{
					$this->query = "SELECT * FROM `public_event` WHERE `username` ='$username' AND `event_owner`='proxy'";
		 
				   $result = $this->total_row();
			 
		 
					 return$result;
			}
			
 

			function wallet($username)
			{
				$this->query = "SELECT `current_balance` FROM `wallet` WHERE `username` ='$username'";
		 
				$result = $this->query_result();
				foreach($result as $row){
					$current_balance =  $row['current_balance'];
				}
				
				$output = number_format($current_balance,2);
				return $output;
			}


			function rawWallet($username)
			{
				$this->query = "SELECT `current_balance` FROM `wallet` WHERE `username` ='$username'";
		 
				$result = $this->query_result();
				foreach($result as $row){
					$output =  $row['current_balance'];
				}
				
			 
				return $output;
			}


			function wallet_raw($username)
			{
				$this->query = "SELECT `current_balance` FROM `wallet` WHERE `username` ='$username'";
		 
				$result = $this->query_result();
				foreach($result as $row){
					$current_balance =  $row['current_balance'];
				}
				
				$output = $current_balance;
				return $output;
			}


			function Upload_file()
			{
				if(!empty($this->filedata['name']))
				{
					$extension = pathinfo($this->filedata['name'], PATHINFO_EXTENSION);

					$new_name = uniqid() . '.' . $extension;

					$_source_path = $this->filedata['tmp_name'];

					$target_path = 'public_banner/' . $new_name;

					move_uploaded_file($_source_path, $target_path);

					return $new_name;
				}
			}


			function Subcriber($id)
			{
 
		 
				$this->query = "
				SELECT * FROM  `public_event` WHERE `event_id` = '$id' AND `check_preview` ='approved'
				";
				 
				$output = $this->query_result();
				 
				return $output;

			}


 			function myEventPreview($username)
			{
				$this->query = "SELECT * FROM `public_event` WHERE `check_preview` ='preview' AND `username` ='$username' ";
		 
				$output = $this->query_result();
				 
				return $output;
			}

 			function myEventBanner($username)
			{
				$this->query = "SELECT * FROM `public_event` WHERE `username` ='$username' AND `event_owner`='self'  AND `check_preview` ='approved' ORDER BY `id` DESC";
		 
				$output = $this->query_result();
				 
				return $output;
			}


 			function ProxyEventBanner($username)
			{
				$this->query = "SELECT * FROM `public_event` WHERE `username` ='$username' AND `event_owner`='proxy'  AND `check_preview` ='approved' ORDER BY `id` DESC";
		 
				$output = $this->query_result();
				 
				return $output;
			}

 			function HomeEventBanner($username)
			{
				$this->query = "SELECT * FROM `public_event` WHERE `username` ='$username' AND `event_owner`='self'  AND `check_preview` ='approved' ORDER BY `id` DESC";
		 
				$output = $this->query_result();
				 
				return $output;
			}


 			function DisplayEvent()
			{
				 
				$rands = rand(1, 5);
				//$this->query = "SELECT * FROM `public_event` ";
				$this->query = "SELECT * FROM `public_event` WHERE `check_preview` = 'approved' ORDER BY `id` DESC LIMIT 0,3";
		 
				$output = $this->query_result();
				 
				return $output;
			}

 			function EventPage($id)
			{
				$this->query = "SELECT * FROM `public_event` WHERE `id` = '$id' ";
		 
				$output = $this->query_result();
				 
				return $output;
			}


 			function SeatReserved($event_id)
			{
				$this->query = "SELECT * FROM `public_event` WHERE `event_id` = '$event_id' ";
		 
				$result = $this->query_result();
				foreach($result as $row){
					
				$current_guest = $row['current_guest'];  
				$expected_guest = $row['expected_guest'];  
					
				}
				 
				if(!$expected_guest < 1)
				{
					
					$newcount = $current_guest + 1;
					$oldcount = $expected_guest - 1;


					$this->query = "UPDATE `public_event` SET `current_guest` = '$newcount' WHERE `public_event`.`event_id` = '$event_id'";
					$this->execute_query();


					$this->query = "UPDATE `public_event` SET `expected_guest` = '$oldcount' WHERE `public_event`.`event_id` = '$event_id'";
					$this->execute_query();

					return $newcount;
				 
				}
				else
				{
					
					 $newcount = 0;
					return $newcount;
				}
				 
				 
			} 			 
 
 			function SeatCount($event_id)
			{
				$this->query = "SELECT * FROM `public_event` WHERE `event_id` = '$event_id' ";
		 
				$result = $this->query_result();
				foreach($result as $row){
					
				$newcount = $row['current_guest'];
					
				}
		 
	 
				 return $newcount;
				 
			}


 			function GiftOwnerSearch($event_id)
			{
				$this->query = "SELECT * FROM `public_event` WHERE `event_id` = '$event_id' ";
		 
				$output = $this->query_result();
		 
	 
				 return $output;
				 
			}

 			function WalletBal($cus_email)
			{
				$this->query = "SELECT * FROM `wallet` WHERE `username` = '$cus_email' ";
		 
				$output = $this->query_result();
		 
	 
				 return $output;
				 
			}


 			function ProxyWalletBal($event_id)
			{
				$this->query = "SELECT * FROM `proxy_wallet` WHERE `proxy_event_id` = '$event_id' ";
		 
				$output = $this->query_result();
		 
	 
				 return $output;
				 
			}

 			function DuplicateT_wallet($last_payment_id)
			{
				$this->query = "SELECT * FROM `wallet` WHERE `last_payment_id` = '$last_payment_id' ";
		 
				$output = $this->total_row();
		 
	 
				 return $output;
	 
			}

 			function DuplicateT_proxy_wallet($event_id, $reference)
			{
				$this->query = "SELECT * FROM `proxy_wallet` WHERE `proxy_event_id` = '$event_id' AND `last_payment_id` ='$reference'";
		 
				$output = $this->total_row();
		 
	 
				 return $output;
	 
			}


 			function CheckCode($cashout_code, $username)
			{
					$this->query = "SELECT * FROM `cashout` WHERE `cashout_code`='$cashout_code' AND `username`= '$username'";

					$output = $this->total_row();
					
					 return $output;
	 
			}

 			
 			function ProxyCheckCode($cashout_code)
			{
					$this->query = "SELECT * FROM `cashout` WHERE `cashout_code`='$cashout_code'";

					$result = $this->query_result();
					foreach($result as $row){
						@$output = $row['event_id_cashout'];
					}
					
					 return $output;
	 
			}
 	
         	function giftName($amount)
			{
					$this->query = "SELECT * FROM `gift` WHERE `gift_price` ='$amount'";

					$output = $this->query_result();
					
	            return $output;
	 
			}

 			function myGiftPage($username)
			{
				$this->query = "SELECT * FROM `gift_event` WHERE `gift_owner_email` = '$username' ";
		 
				$output = $this->query_result();
		 
	 
				 return $output;
				 
			}

 			function ProspectGuest($username, $eventID)
			{
				$this->query = "SELECT * FROM `coming_guest` WHERE `event_user` = '$username' AND `eventid` = '$eventID'";
		 
				$output = $this->query_result();
		 
	 
				 return $output;
				 
			}
	

 			function CashoutID($username)
			{
				$this->query = "SELECT * FROM `cashout` WHERE `username` = '$username'";
 
		 
				$output = $this->query_result();
		 
	 
				 return $output;
				 
			}
			
			
	 		function eventEndDate($event_id)
			{
				$this->query = "SELECT * FROM `public_event` WHERE `event_id` = '$event_id'";
		 
				$result = $this->query_result();
		          foreach($result as $row){
					  
					 $output   = $row['event_end_date'];  
				  }
				 return $output;
				 
			}
	
         	function emailVerification($user, $code)
			{
				$this->query = "SELECT * FROM `login_table` WHERE `username` = '$user' AND `ver_code` ='$code'";
		 
				$output = $this->total_row();
					
				 return $output;
				 
			}

         	function confirmVerification($user, $code)
			{
				$this->query = "SELECT * FROM `login_table` WHERE `username` = '$user' AND `ver_code` ='$code'";
		 
				$output = $this->query_result();
					
				 foreach($output as $row){
					 
					$output=$row['acc_verify']; 
					 
				 }
				 
				  return $output;
			}
	

         	function deleteBanner($event_id)
			{
				
				$this->query = "SELECT * FROM `public_event` WHERE `public_event`.`event_id` = '$event_id'";
				$result = $this->query_result();
				foreach($result as $row){
				$event_owner = $row['event_owner'];

				}
				
				
				 if($event_owner == 'proxy')
				 { 
			 
				    $this->query = "DELETE FROM `public_event` WHERE `event_id` = '$event_id'";
		 
					$this->query_result();

					$output ="proxy";


				
				}
				elseif($event_owner == 'self')
				{
					
				    $this->query = "DELETE FROM `public_event` WHERE `event_id` = '$event_id'";
		 
					$this->query_result();					
					

					$output ="self";				
				}
				
				
				return $output;
				
			}
	
         	function approveBanner($event_id)
			{

				$this->query = "SELECT * FROM `public_event` WHERE `public_event`.`event_id` = '$event_id'";
				$result = $this->query_result();
				foreach($result as $row){
                 $event_owner = $row['event_owner'];
				 }
				
				 if($event_owner == 'proxy')
				 { 
					$this->query = "UPDATE `public_event` SET `check_preview` = 'approved' WHERE `public_event`.`event_id` = '$event_id'";


					$this->query_result();

					$output ="proxy";


				
				}
				elseif($event_owner == 'self')
				{
				
					$this->query = "UPDATE `public_event` SET `check_preview` = 'approved' WHERE `public_event`.`event_id` = '$event_id'";


					$this->query_result();

					$output ="self";				
				}
				
				return $output;
			}
	
	
         	function previewCheck($username)
			{
				 
		 		 $this->query = "SELECT * FROM `public_event` WHERE `check_preview` = 'preview' AND `username` = '$username'";
			 
	 
				$output = $this->total_row();
					
				 return $output;
				 
			}
	

          	function emailRecovery($code, $check)
			{
				$this->query = "SELECT * FROM `login_table` WHERE `password` = '$code' AND `username` ='$check'";
		 
				$output = $this->total_row();
					
				 return $output;
				 
			}

 
 }
?>
 
 
 
 
 
 
 
 
 