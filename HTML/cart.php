   
	<?php include "inc/header.php"; ?>
	

 
	
	
	<section>
		<div class="container">
			<div class="row">
			
		 <!---Sidebar Ends--->
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Cart Items</h2>
				        
						
                        
                        
                        <h2 class="text-center">&nbsp;</h2>
                        <h2 class="text-center">&nbsp;</h2>
                        <h2 class="text-center">&nbsp;</h2>
                        <h2 class="text-center">Cart is empty</h2>
                        <h2 class="text-center">&nbsp;</h2>
                        <h2 class="text-center">&nbsp;</h2>
                        <h2 class="text-center">&nbsp;</h2>
                        <h2 class="text-center">&nbsp;</h2>
					
					
				</div>
			</div>
		</div>
	</section>
  <!---Footer Starts--->
	<?php include "inc/footer.php"; ?>
	<!---Footer Ends--->
<script>
	 
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
	if(isset($_GET['logout'])){
		echo "<script>
		window.open('index.php','_self')
		alert('You have logged out successfully')</script>";
		
	}
	
	if(isset($_GET['login'])){
		echo "<script>
		window.open('index.php','_self')
		alert('login successfully')

					</script>
		";
		
	}

		
	
 
	
	
	?>


