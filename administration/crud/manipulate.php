<?php require_once '../inc_/functions.php'; 
//------------------------ check user login
?>

<?php include_once '../inc_/_dbconnector.php';?>
<?php
	// Getting values
	if(isset($_GET['enav'])){
		
		$navid = $_GET['enav'];
		$editQ = "SELECT * FROM header_nav WHERE nav_id = '$navid'";
		$fire = mysqli_query($dbcon,$editQ) or die('could not select'.mysql_error());		
		if(!$fire){
			echo 'Error in database selection';
		}
		$result = mysqli_fetch_assoc($fire);
	}
	// UPDATING values
	if(isset($_POST['update_menu'])){
		$new_navname = $_POST['update_menu_name'];
		$new_navurl = $_POST['update_menu_url'];
		if(isset($_POST['menu_active']) && $_POST['menu_active'] == true ){
			$menu_visible = 1;
			echo 'CHECKED';
		} else{
			$menu_visible = 0;
			echo 'UN-CHECKED';
		}	
		$update_qry = "UPDATE header_nav SET ";
		$update_qry .="nav_name='$new_navname',";
		$update_qry .="nav_url='$new_navurl',";
		$update_qry .="nav_visible='$menu_visible' ";
		$update_qry .="WHERE nav_id='$navid'";
				
		$fire_update = mysqli_query($dbcon,$update_qry);
		
		if(!$fire_update){echo 'error in UPDATION process';}
		else{ header('Location:../basic_management/manage_header.php');}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>vishAcademy | Manipulate </title>
    <?php require_once '../inc_/css_bundle.php';?>    
    <link rel="stylesheet" href="assets/css/bootstrap-switch.css" />
</head>
<body>
<section id="container">
<!--header start-->
<?php include_once '../inc_/admn_header.php';?>
<!--header end-->
<!--sidebar start-->
<?php include_once '../inc_/main_nav.php';?>
<!--sidebar end-->
<!--main content start-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Update HEADER NAVIGATION
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <form role="form" name="update_menu" id="update_manu" method="post" action="">
                            <div class="form-group">
                                <label for="update_menu_name">Menu Name</label>
                                <input type="text" class="form-control" name="update_menu_name" id="update_menu_name" placeholder="New menu name" value="<?php echo $result['nav_name'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="update_menu_url">Menu URL</label>
                                <input type="text" class="form-control"  name="update_menu_url" id="update_menu_url" placeholder="Menu URL" value="<?php echo $result['nav_url'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="menu_active" id="label-switch" class="switch-small" data-on-label="Active" data-off-label="NO" value="1" <?php if($result['nav_visible']==1){echo 'checked';} ?> >
                            </div>
                            <button type="submit" name="update_menu" id="update_menu" class="btn btn-primary">Update</button>
                        </form>
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
