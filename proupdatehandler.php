<?php
include('db.php');
if(isset($_POST['update'])){
	$newid=$_POST['id'];
	$newname=$_POST['p_name'];
	$newprice=$_POST['p_price'];
	$newcat = $_POST['p_cat'];

	$newsub = $_POST['p_sub'];
	$newbrand = $_POST['p_brand'];
 	$newdesc = addslashes($_POST['p_desc']);
	$newqty = $_POST['p_qty'];
	$image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];

  
$sql="UPDATE product set p_name='$newname', p_price='$newprice', p_desc='$newdesc', p_category='$newcat', p_sub='$newsub', p_brand='$newbrand', qty='$newqty', p_image='$image' where id='$newid'";

$run = mysqli_query($con,$sql);
if($run){
	move_uploaded_file($tmp_image,"images/$image");
	echo "<script>alert('Product updated Successfully !!')</script>";
	echo "<script>window.open('view_p.php','_self')</script>";
	
}else{
	
	echo $sql;
	//echo "<script>alert('Something went wrong !!')</script>";
	//echo "<script>window.open('update_product.php?pid=$id','_self')</script>";
}
 

}


?>