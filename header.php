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
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row no-padding">
					<div class="col-sm-3">
						<div class="logo pull-left">
							<a href="http://localhost/fine-clothes">
							<img src="images/logo.png" class="site-logo" alt=""  height=80 width=80/>
						</a>
						</div>
					</div>
					
					<div class="col-sm-9">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
							<li><a href="<?php echo $nav ?>.php"><i class="fa fa-user"></i> <?php echo $user; ?></a></li>
							<?php  
										if(!isset($_SESSION['email'])){
											echo '	<li><a href="login.php"><i class="fa fa-shopping-cart"></i> Cart&nbsp;<span class="badge" >0</span></a></li>
											';
										}else{

						echo '	 <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart&nbsp;<span class="badge" id="count">0</span></a></li>';
									}
							?>
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
								<li><a href="offer_products.php">Offers</a></li>
								<li><a href="ContactUs.php">Contact us</a></li>
								<li><a href="AboutUs.php">About us</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box  pull-right">
						
							<input type="text" placeholder="Search" id="search" required>
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
