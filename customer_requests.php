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
                            User Requests
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
								global $con;
								$select = "select * from contact";
								$run = mysqli_query($con,$select);
								$i = 0;
								while($row=mysqli_fetch_array($run)){
									$id = $row['id'];
									$name = $row['name'];
                                    $email = $row['email'];
                                    $message = $row['message'];
								    $i++;
									
									echo "
  
                                    <tr>
                                        <td>$i</td>
                                        <td>$name</td>
                                        <td>$email</td>
                                        <td>$message</td>
										<td>
										<a href='customer_requests.php?d_id=$id' class='btn btn-danger' style=''><i class='fa fa-trash-o' aria-hidden='true'></i></a>
										</td>
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
		
		
</div>


<?php
if(isset($_GET['d_id'])){
	$id = $_GET['d_id'];
	
	$delete = "delete from contact where id=$id";
	$run = mysqli_query($con,$delete);
	
	if($run){
		echo "<script>window.open('customer_requests.php','_self')</script>";
	}else{
		echo "<script>alert('Something Went Wrong !!')</script>";
		echo "<script>window.open('view_brand.php','_self')</script>";
	}
	
	
}


?>

