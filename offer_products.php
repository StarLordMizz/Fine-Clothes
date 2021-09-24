<?php include("inc/header2.php"); ?>
	
	
	
	<section>
		<div class="container">
			<div class="row">
			
		<?php include("inc/sidebar.php"); ?>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Offer Products</h2>
						
						<?php
						$select = "select * from offerproducts ORDER BY id DESC LIMIT 0,12";
						$run = mysqli_query($con,$select);
						while($row=mysqli_fetch_array($run)){
							$id = $row['id'];
							$name = $row['p_name'];
							$image = $row['p_image'];
							$price = $row['p_price'];
                            $dprice = $row['d_price'];
							$qtyof = $row['qty_o'];
							
							
						echo "
						<div class='col-sm-4'>
							<div class='product-image-wrapper'>
								<div class='single-products'>
									<div class='productinfo text-center'>
									<a href='offer_product_details.php?pid=$id' class='btn btn-default add-to-cart' id='$id'><img src='admin/images/$image' alt='' ></a>
										<h2 style='text-decoration: line-through'><span>$</span>$price</h2>
                                        <h5>Discount : $<span style='font-family:COMIC SANS MS;'>$dprice</span></h5>

										<p>$name</p>"?>
										


										<?php


if ($qtyof == 0){
   
	echo '
	<p>out of stock </p>
		<input 
		class="btn btn-default add-to-cart"
			type="button" 
			value="Sold Out" 
			onclick="cart('.$row['id'].')" 
			disabled
		/>';
}else{

	
  
	if(!isset($_SESSION['email'])){
  
  echo '  <p>In stock   </p> <input class="btn btn-default add-to-cart" type="button" value="Add to Cart"  onclick="cart2('.$row['id'].')"  />';
	}else{

		echo' <p>In stock ';?> <?php echo $qtyof;  ?> <?php echo' </p> <input class="btn btn-default add-to-cart" type="button" value="Add to Cart"  onclick="cart('.$row['id'].')"  />';

	}
 
 
 }
?>



										
										<?php
										echo"		</div>
									
								</div>
								<div class='choose'>
									<ul class='nav nav-pills nav-justified'>
										
									</ul>
								</div>
							</div>
						</div>
						";
						}
						
						//echo "<div id='more'>
                       //<input type='hidden' value = 'Loading......' id='last_id' class ='$id'>
   
	                    //</div>";
						
						?>
						
						
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	   <!---Footer Starts--->
	   <?php include "inc/footer.php"; ?>
	<!---Footer Ends--->
	<script>
$(document).ready(function(){
$(window).scroll(function(){
    if($(window).scrollTop() == $(document).height() - $(window).height()){
	   var id = $('#last_id').attr('class');
	   
	   $.ajax({
		   url: 'fetch.php',
		   method : 'post',
		   data:{id:id},
		   beforeSend: function(){
			 $('#last_id').attr('type','submit');  
		   },
		   success : function(html){
			   $('#more').remove();
			   $('.features_items').append(html);
			   
		   }
	   })
	
	
	}
	
	});
	
	});
	



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
		var op_id = $pro_id;
		
		$.ajax({
			url:"function.php",
			method:"post",
			data:{op_id:op_id},
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

<?php
if(isset($_GET['b_id'])){
	$id = $_GET['b_id'];
	echo "
<script>
$(document).ready(function(){
	var id = $id;
	$.ajax({
		url : 'function.php',
		method:'post',
		data : {id:id},
		success : function(data){
			$('.features_items').html(data);
		}
		
	})
	
});

</script>
";
}
?>

<?php
if(isset($_GET['sub'])){
	$id = $_GET['sub'];
	echo "
<script>
$(document).ready(function(){
	var id = $id;
	$.ajax({
		url : 'function.php',
		method:'post',
		data : {sub:id},
		success : function(data){
			$('.features_items').html(data);
		} 
		
	})
	
});

</script>
";
}
?>

<?php
if(isset($_GET['c_id'])){
	$id = $_GET['c_id'];
	echo "
<script>
$(document).ready(function(){
	var id = $id;
	$.ajax({
		url : 'function.php',
		method:'post',
		data : {c_id:id},
		success : function(data){
			$('.features_items').html(data);
		} 
		
	})
	
});

</script>
";
}
?>
