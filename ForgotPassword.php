<!DOCTYPE html>
<html lang="en">

<body class="animsition">
 
<?php include "inc/header.php"; ?>

 

	
	<section class="bg-img1 txt-center p-lr-15 p-tb-92">
		<h3 class="bg-img1 txt-center p-lr-15 p-tb-92" style="margin-left: 50px;">
		Forgot password
		</h3>
	</section>	

 
	<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				 
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="handler/forgothandler.php" method="post" role="form" style="display: block;">
									
								<div class="form-group">

									<input type="text" name="email" placeholder="Enter Email Address " required tabindex="2" class="form-control">

 									</div>

									 <div class="form-group">
									<input type="text" name="new_password" placeholder="Enter your new password here" required tabindex="1" class="form-control" value="">

 									</div>

									 <div class="form-group">
									<input type="text" name="con_password" placeholder="Confirm your password here" required tabindex="1" class="form-control" value="">

 									</div>
								 
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
											<button class="form-control btn btn-login" name="requestpassword">
						  Change password
						</button>
 											</div>
										</div>
									</div>
									 
							 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	 

</body>
</html>