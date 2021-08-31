<?php include "inc/header.php"; ?>
<?php
$sel_info = "select * from customer where c_email='$s_email'";
$run_info = mysqli_query($con,$sel_info);
$info = mysqli_fetch_array($run_info);
$n = $info['c_name'];
$c_id = $info['c_id'];
$e = $info['c_email'];
$p = $info['c_pass'];
 

?>
<link href="css/account.css" rel="stylesheet">

<div class="col-lg-12 col-sm-12 col-xs-12">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="images/banner.jpg">

        </div>
        
        <div class="card-info"> <span class="card-title"><?php echo $n; ?></span>

        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="">My Account</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                <div class="">My Orders</div>
            </button>
        </div>
        
    </div>

        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
          <div class="container">
      <div class="row">
      
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info" id="edit_ajax">
            <div class="panel-heading">
              <h3 class="panel-title">Your Account Details</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                
               
                <div class="col-md-12 col-lg-12 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name :</td>
                        <td><?php echo $n; ?></td>
                      </tr>
                      <tr>
                        <td>Email :</td>
                        <td><?php echo $e; ?></td>
                      </tr>
                      <tr>
                        <td>Password </td>
                        <td>*********</td>
                      </tr>
					   
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                 
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <center><div class="" style="height:20px;margin-bottom:15px;">
						 <a href="javascript:void(0)" data-original-title="Edit this user" data-toggle="tooltip" type="button" id="edit" class="btn btn-md btn-warning"><i class="glyphicon glyphicon-edit"></i>&nbsp;Edit your account</a>

                        </div></center>
                    </div>
            
          </div>
        </div>
      </div>
    </div>
        </div>
        <div class="tab-pane fade in" id="tab2">
                <div class="row">
      
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
    </div>
      </div>
    
		  
        </div>
        
      </div>
    </div>
    
    </div>
        <!---Footer Starts--->
  <?php include "inc/footer.php"; ?>
	<!---Footer Ends--->      
    
          
          <script>
		  
$(document).ready(function() {
$(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).removeClass("btn-default").addClass("btn-primary");   
});

$("#edit").on("click",function(){
	
	$.ajax({
		url:"function.php?edit_user=<?php echo $s_email; ?>",
		method:"post",
		success($data){
			$("#edit_ajax").html($data);
		}
	});
	
});


});
</script>
 
<?php
if(isset($_GET["edit_yes"])){
	echo "<script>
	     notif({
						msg:'Account Details has been updated',
						type:'success',
						width:330,
						height:40,
						timeout:2000,
						
					})
		 
		 
		 
		 </script>
	";
}

?>
<script>
$(".cancel").on("click",function(){
	var c_id = $(this).data("cancel");
	
	$.ajax({
		url:"function.php",
		method:"post",
		data:{c_id:c_id},
		success: function($cancel){
			if($cancel > 0){
				 
                 window.location.reload(true);
			}
		}
	})
	
});



</script>















