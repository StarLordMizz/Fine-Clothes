<?php include "db/connection.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Fine Clothes</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>

   
	<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script type="text/javascript" src="notif/js/notif.js"></script>
    <link href="notif/css/notif.css" rel="stylesheet"> 
	
</head><!--/head-->

<body>
	<header id="header" ><!--header-->
	 
		<div class="row">
		<div id="left-slide-menu" class=" col-xs-12 visible-xs">
					   <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
					
                            	<div class="left-sidebar">
						<h2>Category</h2>
					<div class="panel-group category-products" id="accordian" style="border:0px">
						<?php
						$select = "select * from category";
						$run = mysqli_query($con,$select);
						

						while($row=mysqli_fetch_array($run)){
							$cat_id = $row['id'];
							$cat_name = $row['name'];
							$cat_accordian = $cat_name.$cat_id;
							
							$select_sub = "select * from sub_category where cat_id='$cat_id'";
							$run_sub = mysqli_query($con,$select_sub);
							$check = mysqli_num_rows($run_sub);
							
							if($check>0){	
								
								
								?>
								
								     <div class='panel panel-default'>
								<div class='panel-heading'  style="background:#111111;">
									<h4 class='panel-title'> 
										<a data-toggle='collapse' data-parent='#accordian' href='#<?php echo $cat_accordian;?>' style="color:white">
											<span class='badge pull-right'><i class='fa fa-plus'></i></span>
											<?php echo "$cat_name";  ?>
										</a>
									</h4>
								</div>
								<div id='<?php echo $cat_accordian;?>' class='panel-collapse collapse'>
									<div class='panel-body'>
										<ul>
										<?php  
										  while($fetch_sub = mysqli_fetch_array($run_sub)){
											  $sub_id = $fetch_sub['id'];
								              $sub_cat = $fetch_sub['cat_id'];
										     $sub_name = $fetch_sub['name'];
											echo "<li><a href='shop.php?sub=$sub_id '>$sub_name </a></li>";
										  } 
											?>
										</ul>
									</div>
								</div>
							</div>
								
								<?php 
								
								
							} else{

							
								echo "<div class='panel panel-default'>
								<div class='panel-heading' style='background:#e1e1e1;'>
										
									<h4 class='panel-title'><a href='shop.php?c_id=$cat_id' style='color:black;'>$cat_name</a></h4>
								</div>
							</div>";
							} 
							
							
						} 
						
						
						?>
							
						
						</div>
					
						<div class="brands_products" style="margin-bottom:50px;">
							<h2>Brands</h2>
							<?php  
							$select_brand = "select * from brand";
							$run_brand = mysqli_query($con,$select_brand);
							while($fetch_brand = mysqli_fetch_array($run_brand)){
								   $b_id = $fetch_brand['id'];
								   $b_title = $fetch_brand['title'];
								   
								   $sel_count = "select * from product where p_brand='$b_id'";
								   $run_count = mysqli_query($con,$sel_count);
								   $count = mysqli_num_rows($run_count);
								   if($count>0){
									   $count_num = $count;
								   }else{
									   $count_num = 0;
								   }
							
							
							?>
							<div class="brands-name" style="border:0px;">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="shop.php?b_id=<?php echo $b_id;?>" style="background:#111111;color:white;"><span class="pull-right">(<?php echo $count_num; ?>)</span><?php echo $b_title; ?></a></li>
									
								</ul>
							</div>
							<?php } ?>
						</div>
						
						
						
					
					</div>
					   
                      </div>
					  <span style="font-size:30px;cursor:pointer;background:black;color:white;display:block;padding-left:5px;" onclick="openNav()">&#9776;</span>
					
					</div>
					</div>	 
		
		<div class="header-middle" style="background:#B8E2E8;"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">

						<img src="images/logo.png" class="new" alt=""  height=100 width=150/>
						<h2>Fine Clothes</h2><h2>&nbsp;</h2><h2></h2>
 						</div>
						
					</div>
					
					<div class="col-sm-8">
					
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">

							<li><a href="<?php echo $nav ?>.php"><i class="fa fa-user"></i> <?php echo $user; ?></a></li>
							<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart&nbsp;<span class="badge" id="count">0</span></a></li>

							<!--<?php
							if(isset($_SESSION['email'])){?>

								<li><a href="<?php echo  $MyProfile ?>.php"> <?php echo 'My Profile'?></a></li>


						<?php	}?>-->



								<li><a href="<?php echo  $sign ?>.php"> <?php echo  $sign ?></a></li>
							</ul>
						
						
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
		
			<div class="container">
				<div class="row">
				
					<div class="col-sm-9">
						<div class="navbar-header" >
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php">Home</a></li>
								
								<li><a href="shop.php">All Products</a></li>
								<li><a href="offers.php">Offers</a></li>
								<li><a href="ContactUs.php">Contact us</a></li>
								<li><a href="AboutUs.php">About us</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box  pull-right">
						
							<input type="text" placeholder="Search" id="search">
						<a href="javascript:void(0)" class="btn btn-info" style="position:relative;right:2px;" id="search_btn"><span class="glyphicon glyphicon-search"></span></a>
						
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
		
	</header><!--/header-->
	
	<script>
	
	setInterval(function(){
		$("#count").load("function.php?cart_count=<?php echo $cookie_id ?>").fadeIn("slow");
	},100);
	
	$("#search_btn").on("click",function(){
		var search = $("#search").val();
		window.location = 'search.php?search=' + search;
	});
	</script>
	<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

 
</script>
