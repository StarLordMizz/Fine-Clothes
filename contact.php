<?php
include("../db/connection.php");
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];

$sql="INSERT INTO contact(name,email,message) VALUES('$name','$email','$message')";

$con->query($sql);


echo "<script> 
			alert('Your message submitted successfully');
			window.location.href='../ContactUs.php';
			</script>";



?>