
<?php
ob_start();
session_start();
$homedb = mysqli_connect ('localhost', 'root',  '',  'owanbe_db');			
require("../db_config.php");

$current_file = $_SERVER['SCRIPT_NAME'];
@$http_referer = $_SERVER['HTTP_REFERER'];



$time = time(); 
$update_time = date('Y-m-d');
$update = date('Y-m-d');

if(isset($_SESSION['username'])&&!empty($_SESSION['username'])){
    if ($query = $homedb -> query("SELECT * FROM `owambe_admin` WHERE `username`='".$_SESSION['username']."'")){
	
		while($row = $query-> fetch_object()){

 
	$username              =  $row->username; 
	$password              =  $row->password;  
	
	
	
 }
$query->free();	
}
 
	 include 'homepage.php'; 
 
} 
else 
{
	 include "newlogin-core.php";
}


 






/*
ob_start(); 
session_start();
require"../db_config.php";

$current_file = $_SERVER['SCRIPT_NAME'];
@$http_referer = $_SERVER['HTTP_REFERER'];



$time = time(); 
$update_time = date('Y-m-d');
$update = date('Y-m-d');

if(isset($_SESSION['surname'])&&!empty($_SESSION['surname'])){
    if ($query = $homedb -> query("SELECT * FROM `owambe_admin` WHERE `surname`='".$_SESSION['surname']."'")){
	
while($row = $query-> fetch_object()){

 
	$username              =  $row->username; 
	$staff_id              =  $row->staff_id; 
	$photo                 =  $row->photo; 
	$firstname             =  $row->firstname;
	$surname               =  $row->surname;
	$password              =  $row->password;
	$home_address          =  $row->home_address;
	$gender                =  $row->gender;
	$date_of_birth         =  $row->date_of_birth;
	$number                =  $row->number;
	$email                 =  $row->email;
	$city                  =  $row->city;
	$state                 =  $row->state;
	$nationality           =  $row->nationality;
	$register_date         =  $row->register_date;

	
	
	
 }
 
$query->free();	
}
 
	 include 'homepage.php';
 
} 
else 
{
	 include 'newlogin-core.php';
}

*/
?>