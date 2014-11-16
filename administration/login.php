<?php
	session_start();
	include_once 'inc_/_dbconnector.php';
	include_once 'inc_/functions.php';
	$error = null;
	if(isset($_POST['admnlgn'])){
		$admin = mysqli_real_escape_string($dbcon,stripslashes(trim($_POST['admnusr'])));
		$admnpass = mysqli_real_escape_string($dbcon,stripslashes(trim($_POST['admnpswd'])));
		$fire = pull_data("administration","admin_username='$admin' AND admin_password='$admnpass'");
			
		if (mysqli_num_rows($fire)!= 1){
			echo $error = "<span class=\"alert alert-danger\"> Wrong Credential </span>";
		}else{
			echo $error = "<span class=\"alert alert-success\"> Eligible for login </span>";
			
			$_SESSION['user'] = $admin;			
			header('location: index.php');			
		}
		
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>vishAcademy | manage header </title>
    <?php require_once 'inc_/css_bundle.php';?>    
    <link rel="stylesheet" href="assets/css/bootstrap-switch.css" />
    <style>
		body{
			background:url("http://fc00.deviantart.net/fs37/i/2008/278/e/5/The_Bridge_by_Gate_To_Nowhere.jpg");
			}
	</style>
</head>
<body>
<section id="container">
<!--main content start-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section>
                		<div class="col-lg-3 col-md-3 col-md-offset-3">                  
                        <form name="loginform" id="loginform" method="post">
                        	<div class="input-group m-bot15">
                                <span class="input-group-addon btn-danger"><i class="fa fa-user"></i></span>
                                <input type="text" name="admnusr" id="admnusr" placeholder="Username" class="form-control">
                            </div>
                            <div class="input-group m-bot15">
                                <span class="input-group-addon btn-danger"><i class="fa fa-key"></i></span>
                                <input type="password" name="admnpswd" id="admnpswd" placeholder="password" class="form-control">
                            </div>
                            <div class="m-bot15">                                
                                <input type="submit" name="admnlgn" id="admnlgn" value="Admin login" class="form-control btn-danger">
                            </div>
                        </form>
                        </div>        
                        <div class="col-lg-9 col-md-offset-3">
                        	
                        </div>          
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->
</section>
<!-- Placed js at the end of the document so the pages load faster -->


<!--Core js-->
<script src="assets/js/jquery.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<!--Side panel toggle script-->
<script src="assets/js/jquery.nicescroll.js"></script>
<!--common script init for all pages-->
<script src="assets/js/scripts.js"></script>	
<!--for modal-->
<script src="assets/bs3/js/bootstrap.min.js"></script>
<!--CHeck uncheck button -->
<script src="assets/js/bootstrap-switch.js"></script>
<script src="assets/js/toggle-init.js"></script>

</body>
</html>
