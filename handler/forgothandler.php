 <?php
include("../db/connection.php");

 
$email = $_POST['email'];
$new_password=$_POST['new_password'];
$con_password=$_POST['con_password'];

 $m_email=mysqli_query($con,"SELECT * FROM customer WHERE c_email='$email'");
$m_email1=mysqli_fetch_array($m_email);
$data_email=$m_email1['c_email'];
if (!empty($email) && !empty($new_password)) {
if($data_email==$email){
if($new_password==$con_password){
$update_pwd=mysqli_query($con,"UPDATE customer SET c_pass='$new_password' WHERE c_email='$email'");
echo "<script> alert('Updated Successfully!');
window.open('../Login.php','_self');
</script>";
}
else{
	echo "<script> alert('Your new and Retype Password is not match !!!');
	window.open('../ForgotPassword.php','_self');
 	</script>";
 }
}
else
{
	echo "<script> alert('Your email is wrong !!!');
	window.open('../ForgotPassword.php','_self'); 	</script>";
 }

}
else{
	echo "<script> alert('Enter all fields');
	window.open('../ForgotPassword.php','_self');
 	</script>";
}


?>