<?php

require('../db_config.php');				
 
require"../phpmailer/PHPMailerAutoload.php";
$mail = new PHPMailer;

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
		//$this->home_page = 'http://localhost/tutorial/online_examination/';

 
		$this->connect = new PDO("mysql:host=$this->host; dbname=$this->database", "$this->username", "$this->password");
       // session_start();
	 
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


class loader Extends Connect
{

 

//////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
	function send_email($receiver_email, $subject, $body)
	{
		

		$mail->IsSMTP();

		$mail->setFrom = 'noreply@owambextra.com';

		$mail->FromName = 'OWAMBE EXTRA ';

		$mail->AddAddress($receiver_email, '');

		$mail->IsHTML(true);

		$mail->Subject = $subject;

		$mail->Body = $body;

		$mail->Send();		
	}

	function redirect($page)
	{
		header('location:'.$page.'');
		exit;
	}

	function session_Off()
	{
		if(!isset($_SESSION['username']))
		{
			$this->redirect('logout.php');
		}
	}

	function session_On()
	{
		if(isset($_SESSION['username']))
		{
			$this->redirect('index.php');
		}
	}



 
	function season_date()
	{
	        $this->query = "SELECT `day` FROM `wallet_days_count` ";
 
		$result = $this->query_result();
		foreach($result as $row){
			$day   =  $row['day'];
			 
			 
		}
 
			 return$day;
	}
	
	function season()
	{
		    
	 $output=$this->season_period();
 	 
	return $output;
	}

/////////////////////////////////////////////////////////////////
	function ComWallet()
	{
        $this->query = "SELECT SUM(`com_share`) FROM `com_wallet` ";
 
		$result = $this->query_result();
		foreach($result as $row){
			$com_share =  $row ['SUM(`com_share`)']; 	
		 
		}
		
        $output = number_format($com_share,2);
        return $output;
	}


	function SubWallet()
	{
        $this->query = "SELECT SUM(`current_balance`) FROM `wallet` ";
 
		$result = $this->query_result();
		foreach($result as $row){
			$current_balance =  $row ['SUM(`current_balance`)']; 	
		 
		}
		
        $output = number_format($current_balance,2);
        return $output;
	}

	function ProxyWallet()
	{
        $this->query = "SELECT SUM(`current_balance`) FROM `proxy_wallet` ";
 
		$result = $this->query_result();
		foreach($result as $row){
			$current_balance =  $row ['SUM(`current_balance`)']; 	
		 
		}
		
        $output = number_format($current_balance,2);
        return $output;
	}


	function CashoutWallet()
	{
        $this->query = "SELECT SUM(`cashout_amount`) FROM `cashout` ";
 
		$result = $this->query_result();
		foreach($result as $row){
			$cashout_amount =  $row ['SUM(`cashout_amount`)']; 	
		 
		}
		
        $output = number_format($cashout_amount,2);
        return $output;
	}



	function CashoutPaid()
	{
        $this->query = "SELECT SUM(`cashout_amount`) FROM `cashout` WHERE `payment_status` = 'Admin_Paid'";
 
		$result = $this->query_result();
		foreach($result as $row){
			$cashout_amount =  $row ['SUM(`cashout_amount`)']; 	
		 
		}
		
        $output = number_format($cashout_amount,2);
        return $output;
	}


	function CashoutUnpaid()
	{
        $this->query = "SELECT SUM(`cashout_amount`) FROM `cashout` WHERE `payment_status` = 'Admin_Processing'";
 
		$result = $this->query_result();
		foreach($result as $row){
			$cashout_amount =  $row ['SUM(`cashout_amount`)']; 	
		 
		}
		
        $output = number_format($cashout_amount,2);
        return $output;
	}


 	function SelfEvents()
	{
        $this->query = "SELECT * FROM `public_event` WHERE `event_owner` ='self'";
 
		$output = $this->total_row();
		 
 
		return $output;
	}


 	function ProxyEvents()
	{
        $this->query = "SELECT * FROM `public_event` WHERE `event_owner` ='proxy'";
 
		$output = $this->total_row();
		 
 
		return $output;
	}



 	function Subscriber()
	{
        $this->query = "SELECT * FROM `login_table` ";
 
		$output = $this->total_row();
		 
 
		return $output;
	}



 	function Ticket()
	{
        $this->query = "SELECT * FROM `ticket` ";
 
		$output = $this->total_row();
		 
 
		return $output;
	}


	function CheckCode($cashout_code, $username)
	{
			$this->query = "SELECT * FROM `cashout` WHERE `cashout_code`='$cashout_code' AND `username`= '$username'";

			$output = $this->total_row();
			
			 return $output;

	}
//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
	function loan($username)
	{
        $loan_balance =0;
        $this->query = "SELECT `loan_balance` FROM `loan` WHERE `username` ='$username'";
 
		$result = $this->query_result();
		foreach($result as $row){
			$loan_balance =  $row['loan_balance'];
		}
		
        $output = number_format($loan_balance, 2);
        return $output;
	}


	function account_lock($username)
	{
		$account_lock="";
        $this->query = "SELECT `account_lock` FROM `login_table` WHERE `username` ='$username'";
 
		$result = $this->query_result();
		foreach($result as $row){
			$account_lock   =  $row['account_lock'];
      	}
	 
 
        return $account_lock ;
	}



	function grouphead($refer_code)
	{
        $this->query = "SELECT * FROM `login_table` WHERE `mem_code` ='$refer_code'";
 
		$result = $this->query_result();
		foreach($result as $row){
			$username   =  $row['username'];
			 
			 
		}
		$grouphead="$username";
 
        return $grouphead ;
	}



	function savings($username)
	{
        $this->query = "SELECT * FROM `savings` WHERE `username` ='$username'";
 
		$result = $this->query_result();
		foreach($result as $row){
			$current_balance =  $row['current_balance'];
			$available_bal =  $row['available_bal'];
			$savings=$available_bal+$current_balance;
		}
		
        $output = number_format($savings,2);
        return $output;
	}


	function dividend_shares($mem_code)
	{
        $this->query = "SELECT * FROM `login_table` WHERE `refer_code` ='$mem_code' AND `user_status` = 'ACTIVE'";
 
		$result_row = $this->total_row();
		 $output= number_format($result_row * 1000,2);
 
		return $output;
	}
		
		
		function username_row($username)
	{
		$this->query = "
        SELECT * FROM `login_table` WHERE `login_table`.`username` = '$username'
		";

		return $this->total_row();
	}
	
	
	function query_username($username)
	{
		$this->query = "
        SELECT * FROM `login_table` WHERE `login_table`.`username` = '$username'
		";

		return $this->query_result();
	}


	function query_login($user, $pass)
	{
		$this->query = "
       SELECT * FROM `login_table` WHERE `username`='$user' AND `password` ='$pass'
		";

		return $this->execute_query();
	}


	function Check_ip($ip_chk)
	{
		$this->query = "
        SELECT * FROM `login_table` WHERE `login_table`.`ip_address` = '$ip_chk'
		";

		return $this->total_row();
	}


	function Check_phone($phone)
	{
		$this->query = "
        SELECT * FROM `login_table` WHERE `login_table`.`phone_no` = '$phone'
		";

		return $this->total_row();
	}


	function Check_email($email)
	{
		$this->query = "
        SELECT * FROM `login_table` WHERE `login_table`.`username`='$email'
		";

		return $this->total_row();
	}


	function Check_mem_code($mem_code)
	{
		$this->query = "SELECT * FROM `login_table` WHERE `login_table`.`mem_code`='$mem_code'";
        
		return $this->total_row();
	}


	function Get_mem_code($mem_code)
	{
		$this->query = "SELECT * FROM `login_table` WHERE `login_table`.`mem_code`='$mem_code'";
        
		return $result = $this->query_result();
	}


	function chk_refer_exist($refer_code)
	{
		$this->query = "
        SELECT * FROM `login_table` WHERE `login_table`.`mem_code`='$refer_code'
		";

		return $this->total_row();
	}


	function Get_refer_data($refer_code)
	{
		$this->query = "
		SELECT * FROM `login_table` WHERE `login_table`.`mem_code`='$refer_code'
		";
		
		return $result = $this->query_result();

	}


	function ecode($ecode,$mem_code)
	{
		$this->query = "
		SELECT * FROM `login_table` WHERE `e_card_code`='$ecode' AND `mem_code`='$mem_code'
		";
		
		return $this->total_row();
		 

	}

	function email_verify($verify)
	{
		$this->query = "SELECT * FROM `login_table` WHERE `payment_code` ='$verify' AND `email_verify` = 'no'";
      
		
        $result = $this->query_result();
		$result_row = $this->total_row();
		if($result_row == 1){
			
			foreach($result as $row)
			{

			$f_name         =$row['f_name']; 
			$s_name         =$row['s_name']; 
			$user_name      =$row['username']; 
			$payment_code   =$row['payment_code']; 
			$status_verify  =$row['email_verify']; 
			
			}				
	
		$this->query ="UPDATE `login_table` SET 
		`email_verify` = 'yes', 
		`payment_code`= 'Pending' 
		WHERE `username` = '$user_name'";
		

			 $this->execute_query();
			 
			 
			 
		 		return	$output = 
					'<center>
						<div align="center"class="alert alert-warning alert-dismissible fade show" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true" style="font-size:16px;"><i class="fa fa-times"></i></span>
						</button>
						<strong>Notification!</strong> <br>'.$f_name.' '. $s_name.' Your account has been verified<br> Login to continue
					 
					</center>
					';
					   
			 
		}
		
	 
	}

	
	
	function clean_data($data)
	{
	 	$data = trim($data);
	  	$data = stripslashes($data);
	  	$data = htmlspecialchars($data);
	  	return $data;
	}

 
 
	function execute_question_with_last_id()
	{
		$this->statement = $this->connect->prepare($this->query);

		$this->statement->execute($this->data);

		return $this->connect->lastInsertId();
	}

 

 
 

	function Upload_file()
	{
		if(!empty($this->filedata['name']))
		{
			$extension = pathinfo($this->filedata['name'], PATHINFO_EXTENSION);

			$new_name = uniqid() . '.' . $extension;

			$_source_path = $this->filedata['tmp_name'];

			$target_path = 'upload/' . $new_name;

			move_uploaded_file($_source_path, $target_path);

			return $new_name;
		}
	}
 

}
 


class Refer Extends Connect {
	
 //public $totRef=5;

	public function member_invited($mem_code)
	{
		$this->query = "SELECT * FROM `member_table` WHERE `member_table`.`refer_code`='$mem_code'";
        
		return $result_row = $this->total_row();
		  
	}

	public function active_member($mem_code)
	{
		$this->query = "SELECT * FROM `login_table` WHERE `login_table`.`refer_code`='$mem_code' AND `user_status`='ACTIVE'";
        
		return $result_row = $this->total_row();
		  
	}

	public function passive_member($mem_code)
	{
		$this->query = "SELECT * FROM `login_table` WHERE `login_table`.`refer_code`='$mem_code' AND `user_status`='PASSIVE'";
        
		return $result_row = $this->total_row();
		  
	}

	public function prospect_member($mem_code)
	{
		$this->query = "SELECT * FROM `login_table` WHERE `login_table`.`refer_code`='$mem_code' AND `user_status`='PROSPECT'";
        
		return $result_row = $this->total_row();
		  
	}

	public function targer_left($mem_code)
	{
		//$this->query = "SELECT * FROM `member_table` WHERE `member_table`.`refer_code`='$mem_code'";
		$result = $this->member_invited($mem_code);
		 
		$output = 5 - $result;

		return $output;
	}

	public function Mortgage($m_em_code)
	{
		$this->query = "SELECT * FROM `login_table` WHERE `refer_code`='$m_em_code'   ";
		$result =   $this->total_row(); 
		$output = $result * 1000 / 2;
        //$output=number_format($out_put,2);
		return $output;
	}


	public function coinbank_worth($m_em_code)
	{
		//$this->query = "SELECT * FROM `login_table` WHERE `refer_code`='$m_em_code' AND `user_status` = 'ACTIVE' ";
		//$result =   $this->total_row(); 
		//$out_put = $result * 1000 / 2 * 2;
		
		 $out_put = $this->Mortgage($m_em_code) * 2;
       // $output=number_format($out_put,2);
		return $out_put;
	}

}	


class admin_super_login Extends Connect
{

 

//////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
	function send_email($receiver_email, $subject, $body)
	{
		

		@$mail->IsSMTP();

		@$mail->setFrom = 'noreply@rsbgroupmortage.com';

		@$mail->FromName = 'RSB AJO ONLINE ADMIN';

		@$mail->AddAddress($receiver_email, '');

		@$mail->IsHTML(true);

		@$mail->Subject = $subject;

		@$mail->Body = $body;

		@$mail->Send();		
	}

	function redirect($page)
	{
		header('location:'.$page.'');
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



	function season_period()
	{
		 
		$day = $this->season_date();		
			 

			$cur_month=$day;
			 
			
			$array_season   = array('25', '26', '27', '28'); 	
			$array_season2   = array('29', '30', '31'); 	
			 
			 if(in_array($cur_month, $array_season, true))
			 {
			   $qua ="<span style='color:green;'>WALLET CASHOUT OPENS</span>";
			 }
			else if(in_array($cur_month, $array_season, true))
			 {
			   $qua ="<span style='color:red;'>WALLET CASHOUT OPENS</span>";
			 }
			else if(in_array($cur_month, $array_season, true))
			 {
			   $qua ="<span style='color:red;'>WALLET CASHOUT OPENS</span>";
			 }
			 else if(in_array($cur_month, $array_season, true))
			 {
			   $qua ="<span style='color:red;'>WALLET CASHOUT OPENS</span>";
			 }
			 else if(in_array($cur_month, $array_season2, true))
			 {
			   $qua ="<span style='color:yellow;'>WALLET CASHOUT PHASE-OUT</span>";
			 }
			else if(in_array($cur_month, $array_season2, true))
			 {
			   $qua ="<span style='color:yellow;'>WALLET CASHOUT  PHASE-OUT</span>";
			 }
			 else if(in_array($cur_month, $array_season2, true))
			 {
			   $qua ="<span style='color:yellow;'>WALLET CASHOUT  PHASE-OUT</span>";
			 } 
			 else 
			 {
			   $qua ="CASHOUT PAYMENTS ON-GOING";
			 }
		 

			return$qua;
			 
		 
	}

	function season_date()
	{
	        $this->query = "SELECT `day` FROM `wallet_days_count` ";
 
		$result = $this->query_result();
		foreach($result as $row){
			$day   =  $row['day'];
			 
			 
		}
 
			 return$day;
	}
	
	function season()
	{
		    
	 $output=$this->season_period();
 	 
	return $output;
	}


	function wallet()
	{
        $this->query = "SELECT  SUM(`current_balance`) FROM `wallet` ";
 
		$result = $this->query_result();
		foreach($result as $row){
			$current_balance =  $row ['SUM(`current_balance`)']; 	
		}
		
        $output = number_format($current_balance,2);
        return $output;
	}

 
	function loanaquire()
	{
        $loan_balance =0;
        $this->query = "SELECT SUM(`loan_balance`) FROM `loan`";
 
		$result = $this->query_result();
		foreach($result as $row){
			$loan_balance = $row ['SUM(`loan_balance`)']; 	
		}
		
        $output = number_format($loan_balance, 2);
        return $output;
	}


	function account_lock($username)
	{
		$account_lock="";
        $this->query = "SELECT `account_lock` FROM `login_table` WHERE `username` ='$username'";
 
		$result = $this->query_result();
		foreach($result as $row){
			$account_lock   =  $row['account_lock'];
      	}
	 
 
        return $account_lock ;
	}



	function grouphead($refer_code)
	{
        $this->query = "SELECT * FROM `login_table` WHERE `mem_code` ='$refer_code'";
 
		$result = $this->query_result();
		foreach($result as $row){
			$username   =  $row['username'];
			 
			 
		}
		$grouphead="$username";
 
        return $grouphead ;
	}




	function savings_avail()
	{
        $this->query = "SELECT SUM(`available_bal`) FROM `savings` ";
 
		$result = $this->query_result();
		foreach($result as $row){
			$available_bal =  $row ['SUM(`available_bal`)']; 	
		 
		}
		
        $output = number_format($available_bal,2);
        return $output;
	}



	function manag_fee()
	{
        $this->query = "SELECT SUM(`mana_fee`) FROM `cashout` ";
 
		$result = $this->query_result();
		foreach($result as $row){
			$available_bal =  $row ['SUM(`mana_fee`)']; 	
		 
		}
		
        $output = number_format($available_bal,2);
        return $output;
	}
	
	
	function charges_fee()
	{
        $this->query = "SELECT SUM(`charges_fee`) FROM `admin_wallet_profit` ";
 
		$result = $this->query_result();
		foreach($result as $row){
			$available_bal =  $row ['SUM(`charges_fee`)']; 	
		 
		}
		
        $output = number_format($available_bal,2);
        return $output;
	}

	
	function loan_repay()
	{
        $this->query = "SELECT SUM(`loan_repayment`) FROM `admin_wallet_profit` ";
 
		$result = $this->query_result();
		foreach($result as $row){
			$available_bal =  $row ['SUM(`loan_repayment`)']; 	
		 
		}
		
        $output = number_format($available_bal,2);
        return $output;
	}


 


	function group_member($username)
	{
        $this->query = "SELECT * FROM `login_table` WHERE `username` ='$username' AND `email_verify` = 'yes'";
 
		$output = $this->total_row();
		 
 
		return $output;
	}

	function dividend_shares($mem_code)
	{
        $this->query = "SELECT * FROM `login_table` WHERE `refer_code` ='$mem_code' AND `user_status` = 'ACTIVE'";
 
		$result_row = $this->total_row();
		 $output= number_format($result_row * 1000,2);
 
		return $output;
	}
		
		
		function username_row($username)
	{
		$this->query = "
        SELECT * FROM `admin_super_login` WHERE `admin_super_login`.`username` = '$username'
		";

		return $this->total_row();
	}
	
	
	function query_username($username)
	{
		$this->query = "
        SELECT * FROM `admin_super_login` WHERE `admin_super_login`.`username` = '$username'
		";

		return $this->query_result();
	}


	function query_login($username, $password)
	{
		$this->query = "SELECT * FROM `admin_super_login` WHERE `username`='$username' AND `password` ='$password'";

		return $this->execute_query();
	}


	function Check_ip($ip_chk)
	{
		$this->query = "
        SELECT * FROM `admin_super_login` WHERE `admin_super_login`.`ip_address` = '$ip_chk'
		";

		return $this->total_row();
	}


	function Check_phone($phone)
	{
		$this->query = "
        SELECT * FROM `admin_super_login` WHERE `admin_super_login`.`phone_no` = '$phone'
		";

		return $this->total_row();
	}


	function Check_email($email)
	{
		$this->query = "
        SELECT * FROM `admin_super_login` WHERE `admin_super_login`.`username`='$email'
		";

		return $this->total_row();
	}

 

	function Get_refer_data($refer_code)
	{
		$this->query = "
		SELECT * FROM `login_table` WHERE `login_table`.`mem_code`='$refer_code'
		";
		
		return $result = $this->query_result();

	}
	function Get_mem_data($mem_code)
	{
		$this->query = "
		SELECT * FROM `login_table` WHERE `login_table`.`mem_code`='$mem_code'
		";
		
		return $result = $this->query_result();

	}


	function ecode($ecode,$mem_code)
	{
		$this->query = "
		SELECT * FROM `login_table` WHERE `e_card_code`='$ecode' AND `mem_code`='$mem_code'
		";
		
		return $this->total_row();
		 

	}

	function email_verify($verify)
	{
		$this->query = "SELECT * FROM `login_table` WHERE `payment_code` ='$verify' AND `email_verify` = 'no'";
      
		
        $result = $this->query_result();
		$result_row = $this->total_row();
		if($result_row == 1){
			
			foreach($result as $row)
			{

			$f_name         =$row['f_name']; 
			$s_name         =$row['s_name']; 
			$user_name      =$row['username']; 
			$payment_code   =$row['payment_code']; 
			$status_verify  =$row['email_verify']; 
			
			}				
	
		$this->query ="UPDATE `login_table` SET 
		`email_verify` = 'yes', 
		`payment_code`= 'Pending' 
		WHERE `username` = '$user_name'";
		

			 $this->execute_query();
			 
			 
			 
		 		return	$output = 
					'<center>
						<div align="center"class="alert alert-warning alert-dismissible fade show" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true" style="font-size:16px;"><i class="fa fa-times"></i></span>
						</button>
						<strong>Notification!</strong> <br>'.$f_name.' '. $s_name.' Your account has been verified<br> Login to continue
					 
					</center>
					';
					   
			 
		}
		
	 
	}
	
 
	
	function clean_data($data)
	{
	 	$data = trim($data);
	  	$data = stripslashes($data);
	  	$data = htmlspecialchars($data);
	  	return $data;
	}

 
 
 

	public function member_invited()
	{
		$this->query = "SELECT * FROM `login_table`";
        
		return $result_row = $this->total_row();
		  
	}

	public function active_member()
	{
		$this->query = "SELECT * FROM `login_table` WHERE `user_status`='ACTIVE'";
        
		return $result_row = $this->total_row();
		  
	}

	public function passive_member()
	{
		$this->query = "SELECT * FROM `login_table` WHERE `user_status`='PASSIVE'";
        
		return $result_row = $this->total_row();
		  
	}

	public function prospect_member()
	{
		$this->query = "SELECT * FROM `login_table` WHERE  `user_status`='PROSPECT'";
        
		return $result_row = $this->total_row();
		  
	}


	public function open_ticket()
	{
		$this->query = "SELECT * FROM `ticket` WHERE  `ticket_status`='OPEN'";
        
		return $result_row = $this->total_row();
		  
	}
	
	
	public function close_ticket()
	{
		$this->query = "SELECT * FROM `ticket` WHERE  `ticket_status`='CLOSED'";
        
		return $result_row = $this->total_row();
		  
	}
}
 
 ?>
 
 
 
 
 
 
 
 
 
 
 