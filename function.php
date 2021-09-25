
<?php  
include "db/connection.php";

if(isset($_POST['id'])){
	$id = $_POST['id'];
	
	$select = "select * from product where p_brand ='$id'";
    $run = mysqli_query($con,$select);
						while($row=mysqli_fetch_array($run)){
							$id = $row['id'];
							$name = $row['p_name'];
							$image = $row['p_image'];
							$price = $row['p_price'];
							$qty = $row['qty'];
							
						echo "
						<div class='col-sm-4'>
							<div class='product-image-wrapper'>
								<div class='single-products'>
									<div class='productinfo text-center'>
									<a href='product_details.php?pid=$id' class='btn btn-default add-to-cart' id='$id'><img src='admin/images/$image' alt='' ></a>
										<h2><span>$</span>$price</h2>
										<p>$name</p>
										 "
?>


<?php


if ($qty == 0){
   
	echo '
	<p> Out of stock </p>
		<input 
		class="btn btn-default add-to-cart"
			type="button" 
			value="Sold Out" 
			onclick="cart('.$row['id'].')" 
			disabled
		/>';
}else{
	echo'  ';
	
  
	if(!isset($_SESSION['email'])){
  
  echo ' <p>In stock   </p> <input class="btn btn-default add-to-cart" type="button" value="Add to Cart"  onclick="cart2('.$row['id'].')"  />';
	}else{

		echo' <p>In stock ';?> <?php echo $qty;  ?> <?php echo' </p> <input class="btn btn-default add-to-cart" type="button" value="Add to Cart"  onclick="cart('.$row['id'].')"  />';

	}
 
 
 }
?>

<?php								
echo "
 									</div>
									
								</div>
								<div class='choose'>
									<ul class='nav nav-pills nav-justified'>
										
									</ul>
								</div>
							</div>
						</div>
						";
						}
	
	
}


//sub cat 

if(isset($_POST['sub'])){
	$id = $_POST['sub'];
	
	$select = "select * from product where p_sub ='$id'";
    $run = mysqli_query($con,$select);
						while($row=mysqli_fetch_array($run)){
							$id = $row['id'];
							$name = $row['p_name'];
							$image = $row['p_image'];
							$price = $row['p_price'];
							$qty = $row['qty'];
							
							
							echo "
							<div class='col-sm-4'>
								<div class='product-image-wrapper'>
									<div class='single-products'>
										<div class='productinfo text-center'>
										<a href='product_details.php?pid=$id' class='product-item' id='$id'>
										<div class='p-image'>
										<img src='admin/images/$image' alt='dude' ></a>
										</div>
											<h2><span>$</span>$price</h2>
											<p>$name</p>
												
	
										"
	
	
										?>
	
	
	
	
	
	<?php
	
	
	if ($qty == 0){
	   
		echo '
		<p>out of  stock   </p>
			<input 
			class="btn btn-default add-to-cart"
				type="button" 
				value="Sold Out" 
				onclick="cart('.$row['id'].')" 
				disabled
			/>';
	}else{
		echo' ';
		
	  
		if(!isset($_SESSION['email'])){
	  
	  echo '  <p>In stock   </p> <input class="btn btn-default add-to-cart" type="button" value="Add to Cart"  onclick="cart2('.$row['id'].')"  />';
		}else{
	
			echo' <p>In stock ';?> <?php echo $qty;  ?> <?php echo' </p> <input class="btn btn-default add-to-cart" type="button" value="Add to Cart"  onclick="cart('.$row['id'].')"  />';

		}
	 
	 
	 }
	?>
										<?php
										echo" </div>
									
								</div>
								
								
									<div class='choose'>
									<ul class='nav nav-pills nav-justified'>
										
									</ul>
								</div>
							</div>
						</div>
						";
						}
	
	
}


if(isset($_POST['c_id'])){
	$id = $_POST['c_id'];
	
	$select = "select * from product where p_category ='$id'";
    $run = mysqli_query($con,$select);
						while($row=mysqli_fetch_array($run)){
							$id = $row['id'];
							$name = $row['p_name'];
							$image = $row['p_image'];
							$price = $row['p_price'];
							
							
						echo "
						<div class='col-sm-4'>
							<div class='product-image-wrapper'>
								<div class='single-products'>
									<div class='productinfo text-center'>
										<img src='admin/images/$image' alt='' >
										<h2><span>$</span>$price</h2>
										<p>$name</p>
										<a href='javascript:void(0)' class='btn btn-default add-to-cart' onclick = 'cart($id)'><i class='fa fa-shopping-cart'></i>Add to cart</a>
 									</div>		
								</div>
								<div class='choose'>
									<ul class='nav nav-pills nav-justified'>
										
									</ul>
								</div>
							</div>
						</div>
						";
						}
	
	
}

// Funtion for add to cart

	if(isset($_POST['p_id'])){
		$p_id = $_POST['p_id'];
		$review_cart = "select * from cart where p_id='$p_id' && session_id='$cookie_id'";
		$run_review = mysqli_query($con,$review_cart);
		
		if (mysqli_num_rows($run_review) > 0 ){
		 echo 1;
		 
		}else{
			
		
		$sel = "select * from product where id='$p_id'";
		$query = mysqli_query($con,$sel);
		$row = mysqli_fetch_array($query);
		$name = $row['p_name'];
		$price = $row['p_price'];
		$image = $row['p_image'];
		
		$insert = "insert into cart(p_id,p_title,p_image,p_price,p_qty,session_id) VALUES('$p_id','$name','$image','$price','1','$cookie_id')";
		$run_insert = mysqli_query($con,$insert);
		echo 0;
		}
	}
	
	if(isset($_POST['op_id'])){
		$p_id = $_POST['op_id'];
		$review_cart = "select * from cart where p_id='$p_id' && session_id='$cookie_id'";
		$run_review = mysqli_query($con,$review_cart);
		
		if (mysqli_num_rows($run_review) > 0 ){
		 echo 1;
		 
		}else{
			
		
		$sel = "select * from offerproducts where id='$p_id'";
		$query = mysqli_query($con,$sel);
		$row = mysqli_fetch_array($query);
		$name = $row['p_name'];
		//$price = $row['p_price'];
		$price = $row['m_price'];
		$image = $row['p_image'];
		
		$insert = "insert into cart(p_id,p_title,p_image,p_price,p_qty,session_id) VALUES('$p_id','$name','$image','$price','1','$cookie_id')";
		$run_insert = mysqli_query($con,$insert);
		echo 0;
		}
	}
	
	

// To refresh number of product count in the cart

if(isset($_GET['cart_count'])){
	$cookie = $_GET['cart_count'];
	$check_cart = "select p_id from cart where session_id='$cookie'";
	$run_check = mysqli_query($con,$check_cart);
	$count_cart = mysqli_num_rows($run_check);
	echo $count_cart;
	
}


// To delete product from cart 
if(isset($_POST['del'])){
	$del_id = $_POST['del'];
	$del_cart = "delete from cart where p_id='$del_id' && session_id='$cookie_id'";
	$run_del = mysqli_query($con,$del_cart);
	if($run_del){
		echo 1;
	}else{
		echo 0;
	}
}


// To update cart qty

if(isset($_POST['qty'])){
	$qty = $_POST['qty'];
	$pro_id = $_POST['pro_id'];

	$sel_p = "select * from product where id='$pro_id'";
	$run_p = mysqli_query($con,$sel_p);
	$prod_data = mysqli_fetch_array($run_p);
	$prod_qty = $prod_data['qty'];


	if($prod_qty >= $qty){
	
	$update_cart = "update cart set p_qty='$qty' where session_id='$cookie_id' && p_id='$pro_id'";
    $run_update_cart = mysqli_query($con,$update_cart);
	}



	$sel_op = "select * from offerproducts where id='$pro_id'";
	$run_op = mysqli_query($con,$sel_op);
	$prod_odata = mysqli_fetch_array($run_op);
	$prod_oqty = $prod_odata['qty_o'];
    

	
	if($prod_oqty >= $qty ){
	$update_ocart = "update cart set p_qty='$qty' where session_id='$cookie_id' && p_id='$pro_id'";
    $run_update_cart = mysqli_query($con,$update_ocart);
	}
	
	
	
}

 

 




// function to edit account of user

if(isset($_GET['edit_user'])){
	$u_edit = $_GET['edit_user'];
$sel_u = "select * from customer where c_email='$u_edit'";
$run_u = mysqli_query($con,$sel_u);
$user_data = mysqli_fetch_array($run_u);
$user_id = $user_data['c_id'];
$user_n = $user_data['c_name'];
$cus_id = $user_data['c_id'];
$user_e = $user_data['c_email'];
$user_p = $user_data['c_pass'];
 	
	echo "<div class='panel-heading'>
              <h3 class='panel-title'>Edit Your Account</h3>
            </div>
			<div class='panel-body'>
			<div class='row'>
			<div class='col-xs-8 col-xs-offset-2'>
			      <form class='form-horizontal' role='form' enctype='multipart/form-data' action='function.php' method='post'>
				     <div class='form-group'>
					    <label for='user_name'>Name : </label>
					    <input type='text' class='form-control' value='$user_n' name='user_name' id='user_name'>
					 </div>
					 
					 <div class='form-group'>
					    <label for='user_email'>Email : </label>
					    <input type='text' class='form-control' value='$user_e' id='user_email' name='user_email'>
					 </div>
					 
					 <div class='form-group'>
					    <label for='user_pass'>Password : </label>
					    <input type='text' class='form-control' value='$user_p' id='user_pass' name='user_pass'>
					 </div>
					 
				  <input type='submit' id='save' value='Save' name='save' class='btn btn-block btn-success' style='padding:5px;'>
				  </form>
	        </div>
	 </div>
	</div>
	<div class='panel-footer'>
              <center><div>
				          
                        </div></center>
            </div>
			
	
	";
	
	
	
	
	
}
// Function to edit user account

if(isset($_POST['save'])){
	$u_n = $_POST['user_name'];
	$u_e = $_POST['user_email'];
	$u_p = $_POST['user_pass'];
 
	
	if($u_i != ""){
		$update_edit = "update customer set c_name='$u_n',c_email='$u_e',c_pass='$u_p' WHERE c_email='$s_email'"; 
	    $run_insert_edit = mysqli_query($con,$update_edit);
	}else{
		$update_edit = "update customer set c_name='$u_n',c_email='$u_e',c_pass='$u_p' WHERE c_email='$s_email'"; 
	    $run_insert_edit = mysqli_query($con,$update_edit);
	}
	
	if($run_insert_edit){
 		header("location:account.php?edit_yes");
	}
	
}
	
// Function to cancel an order by user

if(isset($_POST['c_id'])){
    $cancel_id = $_POST['c_id'];
	
	$cancel_order = "update order_address set order_status='cancelled' WHERE order_id='$cancel_id'";
	$run_cancel =  mysqli_query($con,$cancel_order);
	if($run_cancel){
		echo 1;
	}
	
}	

if(isset($_POST['forgot'])){
	$forgot = $_POST['forgot'];
	$check_user = "select * from customer where c_email = '$forgot'";
	$run_check_user = mysqli_query($con,$check_user);
	$num_user = mysqli_num_rows($run_check_user);
	if($num_user == 1){
		echo 1;
	}else{
		echo 0;
	}
	
}

 
 




?>