<?php
include "inc/header.php";
include "inc/sidebar.php";

?>


<div id="page-wrapper">

            <div class="container-fluid">
                 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            View Users
                        </h1>
                             
                    </div>
                </div>
 				
				
				<div class="row">
				     <div class="col-lg-2 col-sm-2"></div>
				     <div class="col-lg-8 col-sm-8">
					   
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                      </tr>
                                </thead>
                                <tbody>
                                   <?php 
								global $con;
								$select = "select * from customer";
								$run = mysqli_query($con,$select);
								$i = 0;
								while($row=mysqli_fetch_array($run)){
									 
                                    $id = $row['c_id'];
									$name = $row['c_name'];
                                    $email = $row['c_email'];
                                    $password = $row['c_pass'];
								    $i++;
									
									echo "
  
                                    <tr>
                                        <td>$i</td>
                                        <td>$id</td>
                                        <td>$name</td>
                                        <td>$email</td>
                                        <td>$password</td>
										 
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


 
 