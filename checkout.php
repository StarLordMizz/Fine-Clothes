<?php include "db/connection.php"; ?>
<?php 
if(!isset($_SESSION['email'])){
	header("location:Login.php");
}

require('config.php');

?>
<html>
<head>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<style>
 
@import url(http://fonts.googleapis.com/css?family=Montserrat);
 * {
margin: 0;
padding: 0;
}
html {
height: 100%;
 background: url('http://thecodeplayer.com/uploads/media/gs.png');
 background: linear-gradient(rgba(196, 102, 0, 0.2), rgba(155, 89, 182, 0.2)),  url('http://thecodeplayer.com/uploads/media/gs.png');
}
body {
font-family: montserrat, arial, verdana;
}
 #msform {
width: 400px;
margin: 50px auto;
text-align: center;
position: relative;
}
#msform fieldset {
background: white;
border: 0 none;
border-radius: 3px;
box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
padding: 20px 30px;
box-sizing: border-box;
width: 80%;
margin: 0 10%;
 position: absolute;
}
 #msform fieldset:not(:first-of-type) {
display: none;
}
 #msform input, #msform textarea {
padding: 15px;
border: 1px solid #ccc;
border-radius: 3px;
margin-bottom: 10px;
width: 100%;
box-sizing: border-box;
font-family: montserrat;
color: #2C3E50;
font-size: 13px;
}
 #msform .action-button {
width: 100px;
background: #27AE60;
font-weight: bold;
color: white;
border: 0 none;
border-radius: 1px;
cursor: pointer;
padding: 10px 5px;
margin: 10px 5px;
}
#msform .action-button:hover, #msform .action-button:focus {
box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
}
 .fs-title {
font-size: 15px;
text-transform: uppercase;
color: #2C3E50;
margin-bottom: 10px;
}
.fs-subtitle {
font-weight: normal;
font-size: 13px;
color: #666;
margin-bottom: 20px;
}
 #progressbar {
margin-bottom: 30px;
overflow: hidden;
 counter-reset: step;
}
#progressbar li {
list-style-type: none;
color: white;
text-transform: uppercase;
font-size: 9px;
width: 33.33%;
float: left;
position: relative;
}
#progressbar li:before {
content: counter(step);
counter-increment: step;
width: 20px;
line-height: 20px;
display: block;
font-size: 10px;
color: #333;
background: white;
border-radius: 3px;
margin: 0 auto 5px auto;
}
 #progressbar li:after {
content: '';
width: 100%;
height: 2px;
background: white;
position: absolute;
left: -50%;
top: 9px;
z-index: -1;
}
#progressbar li:first-child:after {
 content: none;
}
 
#progressbar li.active:before, #progressbar li.active:after {
background: #27AE60;
color: white;
}

.submit{
	width:300px;
	padding:2px;
}
</style>
<title>Checkout</title>
</head>
<body>

<h1 style="margin-top:50px" align="center">Complete your Payment</h1>
 <form id="msform" action="submit.php" method="post" >
 <ul id="progressbar">
<li class="active">DELIVERY ADDRESS</li>
<li>PAYMENT</li>
 </ul>
  <fieldset>
<h2 class="fs-title">Delivery Address</h2>
<h3 class="fs-subtitle">Please mention your Address</h3>
<input type="text" name="d_name" id="d_name" placeholder="Name...."  required/>
<input type="text" name="d_city" id="d_city" placeholder="City" required>
<textarea cols="5" rows="5" placeholder="Your Full Address.." name="d_address" id="d_address"></textarea>
<a href="index.php"><input type="button" class="action-button" value="Cancel" style="background:red;"></a>
<input type="button" name="next" id="step1" class="next action-button" value="Next" disabled="disabled" style="background:#ddd;">

</fieldset>


   

<fieldset>
<h2 class="fs-title">Payment</h2>
<h3 class="fs-subtitle">Pay Securely with Us</h3>
<?php 
				$total = 0;
				$sel = "select * from cart where session_id='$cookie_id'";
				$run = mysqli_query($con,$sel);
				$count_cart = mysqli_num_rows($run);
				while($row=mysqli_fetch_array($run)){
					$p_id = $row['p_id'];
					$p_title = $row['p_title'];
					$p_image = $row['p_image'];
					$p_price = $row['p_price'];
					$p_qty = $row['p_qty'];
					
					
					$total += ($p_price * $p_qty);


					$sel_p = "select * from product where id='$p_id'";
					$run_p = mysqli_query($con,$sel_p);
					$prod_data = mysqli_fetch_array($run_p);
					if($prod_data != null){
					
					$prod_qty = $prod_data['qty'];
					


                    $pq =   $prod_qty - $p_qty;
					$update_prod = "update product set qty='$pq' where id='$p_id'";
                    $run_update_cart = mysqli_query($con,$update_prod);
					}else{

					$sel_op = "select * from offerproducts where id='$p_id'";
					$run_op = mysqli_query($con,$sel_op);
					$prod_odata = mysqli_fetch_array($run_op);
					$prod_oqty = $prod_odata['qty_o'];


                    $pqo =   $prod_oqty - $p_qty;
					$update_oprod = "update offerproducts set qty_o='$pqo' where id='$p_id'";
                    $run_update_cart = mysqli_query($con,$update_oprod);
					}


				}
				
				$random = mt_rand(1000,10000000);
				
				$get_user = "select c_id from customer where c_email ='$s_email'";
				$run_get = mysqli_query($con,$get_user);
				$get = mysqli_fetch_array($run_get);
				$u_id = $get['c_id'];

				$update_prod = "update product set p_qty='$p_qty' where id='$p_id'";
                $run_update_cart = mysqli_query($con,$update_prod);



				
?>



 
<script
src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="<?php echo $pub_key ?>"
data-amount="<?php echo $total * 100; ?>"
data-name="Fine clothes"
data-description=""
data-image=""
data-currency="cad"
>


</script>
 

 
<input type="button" name="total" id="total" value="Total Payment $ <?php echo $total; ?>" style="background:#66B5F0;font-weight:bolder;">
<a href="index.php"><input type="button" class="action-button" value="Cancel" style="background:red;"></a>
 </fieldset>


<fieldset>
<h2 class="fs-title">Confirmation</h2>
<h3 class="fs-subtitle">Your Order Has been Confirmed</h3>
<h1>Your Order ID is </h1><br><h2><?php echo $random; ?></h2><br>

</fieldset>

</form>
 

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 <script src="js/jquery.easing.min.js" type="text/javascript"></script> 
<script>
$(function() {

 var current_fs, next_fs, previous_fs;
var left, opacity, scale; 
var animating;

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	next_fs.show(); 
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			scale = 1 - (1 - now) * 0.2;
			left = (now * 50)+"%";
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		easing: 'easeInOutBack'
	});
});

$(".paynow").on('click',function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	next_fs.show(); 
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
		
			scale = 1 - (1 - now) * 0.2;
			left = (now * 50)+"%";
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		easing: 'easeInOutBack'
		
		

	});
	
	
	

	
});

 


$(".submit").click(function(){
	return false;
})

});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script>
$("#d_name, #d_city, textarea").on("keyup", function(){
    if($("#d_name").val() != "" && $("textarea").val() != "" && $("#d_city").val() != ""){
        $("#step1").removeAttr("disabled").css("background","#27AE60");
    } else {
        $("#step1").attr("disabled", "disabled").css("background","#ddd");
    }
});

 



</script>





</body>

</html>




