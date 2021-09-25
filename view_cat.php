<?php
include "inc/header.php";
include "inc/sidebar.php";

?>


<div id="page-wrapper">

            <div class="container-fluid">
			     <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            View Category
                        </h1>
                           
                    </div>
                </div>
                <!-- /.row -->
				
				
				<div class="row">
				     <div class="col-lg-2 col-sm-2"></div>
				     <div class="col-lg-8 col-sm-8">
					  
					       
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S.NO</th>
                                      
                                        <th>Category Name</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
								<?php 
								global $con;
								$select = "select * from category";
								$run = mysqli_query($con,$select);
								$i = 0;
								while($row=mysqli_fetch_array($run)){
									$id = $row['id'];
									
									$name = $row['name'];
								    $i++;
									
								
									
									
									echo "
  
                                    <tr>
                                        <td>$i</td>
                                        <td>$name</td>
                                      
										
									
                                    </tr>
									";
									
								}
								
							?>
                                </tbody>
                            </table>
                        </div>
						
					 </div>
					 <div class="col-lg-2 col-sm-2"></div>
				</div>
				
		</div>
		<?php 
		   if(isset($_GET['edit_id'])){
			   $e_id = $_GET['edit_id'];
			   
			   $select = "select * from sub_category where id='$e_id'";
			   $query = mysqli_query($con,$select);
			   $row=mysqli_fetch_array($query);
				   $name = $row['name'];
				   
				   echo "<center><div style='width:50%;'>
				   <form method='post' action='view_sub.php?u_id=$e_id'>
				   <input class='form-control' name='c_name' value='$name'><br>
			       <button type='submit' class='btn btn-primary' name='update' style='padding:5px;width:20%;font-size:15px;'>UPDATE</button>
                   </form>
				   </div></center>";
			   
			   
		   }
		?>
		
</div>


<?php
if(isset($_GET['d_id'])){
	$id = $_GET['d_id'];
	
	$delete = "delete from sub_category where id=$id";
	$run = mysqli_query($con,$delete);
	
	if($run){
		echo "<script>window.open('view_sub.php','_self')</script>";
	}else{
		echo "<script>alert('Something Went Wrong !!')</script>";
		echo "<script>window.open('view_sub.php','_self')</script>";
	}
	
	
}


?>


<?php

if(isset($_GET['u_id'])){
	$id = $_GET['u_id'];
	$name = $_POST['c_name'];
	
	$update = "update sub_category set name='$name' WHERE id='$id'";
	$query = mysqli_query($con,$update);
	
	if($query){
		echo "<script>window.open('view_sub.php','_self')</script>";
	}else{
		echo "<script>alert('Something Went Wrong')</script>";
	}
}

?>