<?php include "inc/header.php"; ?>
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row"> 
 	    				 
			<div class="col-sm-12">    			   			
 				 
					<img src="images/home/cu.png" width="100%"></img>
					</div>
				</div>	
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">	Send Us A Message</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" action="handler/contact.php"  class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control"  placeholder="Name">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control"  placeholder="Email">
				            </div>
				        
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <a href="javascript:void(0)"><input type="submit" name="submit" class="btn btn-primary btn-block" value="Submit"></a>
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>FineClothes</p>
							<p>Canada</p>
							 <p>Mobile: +13443443434</p>
							<p>Email: fineclothes@gmail.com</p>
	    				</address>
	    				
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div>
	
  <!---Footer Starts--->
  <?php include "inc/footer.php"; ?>
	<!---Footer Ends--->