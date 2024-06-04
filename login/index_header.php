<?php
ob_start();
include"../config.php";



$current_file = $_SERVER['SCRIPT_NAME'];
@$http_referer = $_SERVER['HTTP_REFERER'];


$Loader = new Loader();
$time = time(); 
$update_time = date('Y-m-d');
$update = date('Y-m-d');

if(isset($_SESSION['password']) AND !empty($_SESSION['username']))
{
  
   $Loader->query='SELECT * FROM `login_table` WHERE `password`="'.$_SESSION['password'].'" AND `username`="'.$_SESSION['username'].'"';
		
		 if($result = $Loader->query_result()){
	 
		
			foreach($result as $row)
			{
					
			$photo        =  $row['photo'];
			$username     =  $row['username'];
			$surname      =  $row['surname'];
			$firstname    =  $row['firstname'];
			$gender       =  $row['gender'];
			$phone        =  $row['phone'];
			$address      =  $row['address'];
			$username     =  $row['username'];
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
else 
{
	 include "login_core.php";
}


?>