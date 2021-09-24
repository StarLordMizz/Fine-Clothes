<?php include "inc/header.php" ?>
	<section>
		<div class="container">
			<div class="row">
		<?php include("inc/sidebar.php"); ?>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items">
						<h2 class="title text-center">Search Result</h2>
							<?php
							if(isset($_GET['search'])){
								$search = $_GET['search'];
							
						$select = "select * from offerproducts where p_name LIKE '%$search%'";
						$run = mysqli_query($con,$select);
						while($row=mysqli_fetch_array($run)){
							$id = $row['id'];
							$name = $row['p_name'];
							$image = $row['p_image'];
							$price = $row['p_price'];
							$qtyof = $row['qty'];
							
							
						echo "
						<div class='col-sm-4'>
							<div class='product-image-wrapper'>
								<div class='single-products'>
									<div class='productinfo text-center'>
									<a href='offer_product_details.php?pid=$id' class='btn btn-default add-to-cart' id='$id'><img src='admin/images/$image' alt='' ></a>
										<h2><span>$</span>$price</h2>
										<p>$name</p>

										"?>



<?php


if ($qtyof == 0){
   
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
								echo"
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
						}else{
							echo "<script>
							 window.location.href = 'index.php';
							</script>";
						}
						?>
						
					</div>
				</div>
				</div>
				</div>
		</section>
 	<script>
 




 function cart2($pro_id){
		var p_id = $pro_id;
		
		$.ajax({
			url:"index.php",
			method:"post",
			data:{p_id:p_id},
			success: function($data){
			    if($data > 0){
					notif({
						msg:"Login please!!!",
						type:"warning",
						width:330,
						height:40,
						timeout:1000,
						
					})
					
				}else {
					notif({
						msg:"Login please!!!",
						type:"warning",
						width:330,
						height:40,
						timeout:1000,
						
					})
				}
				   	
			}
			
		})
		
	}





	
	function cart($pro_id){
		var p_id = $pro_id;
		
		$.ajax({
			url:"function.php",
			method:"post",
			data:{p_id:p_id},
			success: function($data){
			    if($data > 0){
					notif({
						msg:"Product Already Added !!!",
						type:"warning",
						width:330,
						height:40,
						timeout:1000,
						
					})
					
				}else{
					notif({
						msg:"Added to Cart",
						type:"success",
						width:330,
						height:40,
						timeout:1000,
						
					})
				}
				   	
			}
			
		})
		
	}
	
	 



</script>