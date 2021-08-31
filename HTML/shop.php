<?php include("inc/header.php"); ?>
	
	
	
	<section>
		<div class="container">
			<div class="row">
			
		<?php include("inc/sidebar.php"); ?>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">All Products</h2>
						
						<?php
						$select = "select * from product ORDER BY id DESC LIMIT 0,12";
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
										<h2><span>CAD </span>$price</h2>
										<p>$name</p>
										<a href='javascript:void(0)' class='btn btn-default add-to-cart' id='$id' onclick = 'cart($id)'><i class='fa fa-shopping-cart'></i>Add to cart</a>
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
						
						echo "<div id='more'>
                       <input type='hidden' value = 'Loading......' id='last_id' class ='$id'>
   
	                    </div>";
						
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
