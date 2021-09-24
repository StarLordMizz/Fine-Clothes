<?php
include "inc/header.php";

?>



<?php include "inc/sidebar.php"; ?>

 <div id="page-wrapper">

            <div class="container-fluid">
			     <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Update Product
                        </h1>
                             
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
				     <div class="col-lg-2 col-sm-2"></div>
				     <div class="col-lg-8 col-sm-8">
					 <form role="form" method="post" enctype="multipart/form-data" action="proupdatehandler.php">
					     

					 


				<?php
					$pid=$_GET['pid'];

					 
					$sql="Select * from product WHERE id='$pid'";

				$results=$con->query($sql);

				$final=$results->fetch_assoc();


?>


                            <div class="form-group">
                                <label>Product Name</label>
                                <input class="form-control" name="p_name" value="<?php echo $final['p_name']?>" required="required">
                                <p class="help-block"></p>
                            </div>
							<input type="hidden" id="id" name="id" value="<?php echo $final['id'];?>"  placeholder="id" required>

							
							 <div class="form-group">
                                <label>Product Category</label>
                                <select class="form-control" name='p_cat' required="required">
                                    <option value="">Select a Category</option>
									<?php 
									$select = "SELECT * FROM category";
									$run = mysqli_query($con,$select);
									while($row=mysqli_fetch_array($run)){
										$id = $row['id'];
										$name = $row['name'];
										echo "<option value='$id'>$name</option>";
									}
									
									?>
                                    
									
                                </select>
                            </div>
							
								 <div class="form-group">
                                <label>Select Sub-Category</label>
                                <select class="form-control" name='p_sub' required="required">
                                    <option value="">Select a Sub-Category</option>
									<?php 
									$select = "SELECT * FROM sub_category";
									$run = mysqli_query($con,$select);
									while($row=mysqli_fetch_array($run)){
										$id = $row['id'];
										$name = $row['name'];
										echo "<option value='$id'>$name</option>";
									}
									
									?>
                                    
									
                                </select>
                            </div>
							
							<div class="form-group">
                                <label>Product Brand</label>
                                <select class="form-control" name='p_brand' required="required">
                                    <option value="">Select a Brand</option>
                                    <?php 
									$select = "SELECT * FROM brand";
									$run = mysqli_query($con,$select);
									while($row=mysqli_fetch_array($run)){
										$id = $row['id'];
										$title = $row['title'];
										echo "<option value='$id'>$title</option>";
									}
									
									?>
									
                                </select>
                            </div>
							
							 <div class="form-group">
                                <label>Product Price</label>
                                <input type="number" class="form-control" name="p_price" value="<?php echo $final['p_price'] ?>" required="required">
                                <p class="help-block"></p>
                            </div>
							
							<div class="form-group">
                                <label>Product Description</label>
                                <textarea class="form-control" name="p_desc" rows="10" cols="15" value="<?php echo $final['p_desc'] ?>" required="required"></textarea>
                                <p class="help-block"></p>
                            </div>
							
						 <div class="form-group">
                                <label>Quantity Available</label>
                                <input type="number" class="form-control" name="p_qty" value="<?php echo $final['qty'] ?>"required="required">
                                <p class="help-block"></p>
                            </div>
							
							 <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" name='image' value="<?php echo $final['p_image'] ?>" required="required">
                            </div>
							<br>
 
							<center> <button type="submit" name="update" class="btn btn-primary" style="padding:5px;width:100%;font-size:25px;">Update</button></center>
							
					 </form>
					 </div>
				     <div class="col-lg-2 col-sm-2"></div>
				</div>
			  <br>
			  <br>
			</div>
</div>

