<?php
ob_start();
session_start();
include"config.php";



$current_file = $_SERVER['SCRIPT_NAME'];
@$http_referer = $_SERVER['HTTP_REFERER'];


$superlog = new admin_super_login();
$loader = new loader();
$time = time(); 
$update_time = date('Y-m-d');
$update = date('Y-m-d');

if(isset($_SESSION['username']) && !empty($_SESSION['username']))
{
  
   $superlog->query='SELECT * FROM `admin_super_login` WHERE  `username`="'.$_SESSION['username'].'"';
		
		 if($result = $superlog->query_result()){
	 
		
			foreach($result as $row)
			{
					 
			$username            =  $row['username'];
			$password            =  $row['password'];
			$f_name              =  $row['firstname'];
			$m_name              =  $row['middlename'];
			$surname             =  $row['surname'];
			$home_address        =  $row['home_address'];
			$gender              =  $row['gender'];
			$date_of_birth       =  $row['date_of_birth'];
			$number              =  $row['number'];
			$email               =  $row['email'];
			$register_date       =  $row['register_date'];
	 
			
		  
			}
	 
	 
   
	         include 'homepage.php';
	 
		 }
 
} 
else 
{
	 include "newlogin-core.php";
}
//if ($query = $homedb [' query("SELECT * FROM `login-table` WHERE `password`='".$_SESSION['md_password']."'AND `username`='".$_SESSION['username']."'")){


?>