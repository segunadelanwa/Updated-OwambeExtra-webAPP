<?php

ob_start();
session_start();
if(empty($_SESSION['username']))
{
header("location: logout.php");
}

//DISPLAY PHOTO TO PAGE CALL UP/////////////
	$query_photo ="SELECT * FROM `login-table` WHERE `login-table`.`username`='$username'";
	$query_photo_result=mysqli_query($homedb,$query_photo);
	while ($row = mysqli_fetch_array($query_photo_result)){
		$cornfirm=$row['photo']; 
	}

 $invitee = new Refer;
$refer = $invitee->member_invited($mem_code);
$refer_left = $invitee->targer_left($mem_code);

?>


 