<?php


	
 
 class config
{
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
		$this->database = 'oxfordg4_home_db';
		//$this->home_page = 'http://localhost/tutorial/online_examination/';

		$this->connect = new PDO("mysql:host=$this->host; dbname=$this->database", "$this->username", "$this->password");

		//session_start();
/*
		$this->host = 'localhost';
		$this->username = 'oxfordbu_home_connect';
		$this->password = 'G_gG$&CoYp$}';
		$this->database = 'oxfordbu__home_db';
		//$this->home_page = 'http://localhost/tutorial/online_examination/';

		$this->connect = new PDO("mysql:host=$this->host; dbname=$this->database", "$this->username", "$this->password");
*/
		//session_start();
		
		
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

	function send_email($receiver_email, $subject, $body)
	{
		$mail = new PHPMailer;

		$mail->IsSMTP();

		$mail->Host = 'smtp host';

		$mail->Port = '587';

		$mail->SMTPAuth = true;

		$mail->Username = '';

		$mail->Password = '';

		$mail->SMTPSecure = '';

		$mail->From = 'info@webslesson.info';

		$mail->FromName = 'info@webslesson.info';

		$mail->AddAddress($receiver_email, '');

		$mail->IsHTML(true);

		$mail->Subject = $subject;

		$mail->Body = $body;

		$mail->Send();		
	}

 

	function query_result()
	{
		$this->execute_query();
		return $this->statement->fetchAll();
	}
	

	function query_mortgage()
	{
		$this->query = "SELECT SUM(`cash_invested`)FROM `clone_mortgagevest` WHERE payment_approval='Approved' ";
		$result = $this->query_result();
		foreach($result as $row){
		return$payment_recieved =number_format($row ['SUM(`cash_invested`)'],2); 	
		 
		} 
	}
	

	function query_mortgage_in()
	{
		$this->query = "SELECT * FROM `clone_mortgagevest` WHERE payment_approval='Approved' ";
		$payment_recieved =$this->total_row();
		return$payment_recieved;
	 
	}

	function query_realvest()
	{
		$this->query = "SELECT SUM(`cash_invested`)FROM `clone_invest` WHERE payment_approval='Approved' ";
		$result = $this->query_result();
		foreach($result as $row){
		return$payment_recieved =number_format($row ['SUM(`cash_invested`)'],2); 	
		 
		} 
	}
	

	function query_realvest_in()
	{
		$this->query = "SELECT * FROM `clone_invest` WHERE payment_approval='Approved' ";
		$payment_recieved =$this->total_row();
		return$payment_recieved;
	 
	}
	
	
	
	function query_estate()
	{
		$this->query = "SELECT SUM(`order_total`)FROM `clone_property` WHERE payment_approval='Approved' ";
		$result = $this->query_result();
		foreach($result as $row){
		return$payment_recieved =number_format($row ['SUM(`order_total`)'],2); 	
		 
		} 
	}
	

	function query_estate_in()
	{
		$this->query = "SELECT * FROM `clone_property` WHERE payment_approval='Approved' ";
		$payment_recieved =$this->total_row();
		return$payment_recieved;
	 
	}
	
	
}
 
 ?>
 