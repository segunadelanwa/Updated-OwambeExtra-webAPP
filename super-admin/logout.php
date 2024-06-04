<?php
require"../config.php";

ob_start();
session_start();

session_destroy();


$current_file = $_SERVER['SCRIPT_NAME'];
@$http_referer = $_SERVER['HTTP_REFERER'];

header("Location: index.php");



?>
<script>
   //  window.location ="index.php"; 

</script> 