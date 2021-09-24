<?php include "inc/header.php"; ?>

<?php include "inc/sidebar.php"; ?>
 
        <div id="page-wrapper">

            <div class="container-fluid">

                 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To <small>Admin Dashboard</small>
                        </h1>
                        
                    </div>
                </div>
 
                  
                     
            </div>
 
        </div>
 
   

    

</body>

</html>
<?php
	if(isset($_GET['logout'])){
		echo "<script>
		window.open('index.php','_self')
		alert('You have logged out successfully')</script>";
		
	}
    ?>