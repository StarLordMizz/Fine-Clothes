<?php
$host = "localhost";
$user = "root";
$password =  "";
$db_name = "main_fineclothes";

$con = mysqli_connect($host,$user,$password,$db_name);
 $session_id = session_id();

 if(!$con){
	echo "Connection Error".mysqli_connect_error();
	exit();
}

?>
