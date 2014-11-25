<?php require_once '../inc_/functions.php'; ?>
<?php
	 include_once '../inc_/_dbconnector.php';
	 check_login();
?>
<?php
	if(isset($_POST['submit_new_menu'])){
		$new_menu_name = $_POST['new_menu_name'];
		$new_menu_url = $_POST['new_menu_url'];		
		if(isset($_POST['menu_active']) && $_POST['menu_active'] == true ){
			$menu_active = 1;
			echo 'CHECKED';
		} else{
			$menu_active = 0;
			echo 'UN-CHECKED';
		}		
		$newmenu_qry = "INSERT INTO header_nav (nav_name,nav_url,nav_visible) VALUES('$new_menu_name','$new_menu_url','$menu_active')";
		$fire_newmenu_qry = mysqli_query($dbcon,$newmenu_qry);
		if(!$fire_newmenu_qry){echo 'Facing ERROR IN VALUE SUBMISSION';}
		else{echo 'DATA INSERTED SUCCESSFULLY !!!'; header('Location:'.$_SERVER['PHP_SELF']);}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>vishAcademy | manage header </title>
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
                        Vish Academy <b>Alert / Subscribers List</b>
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                            <a href="#myModal" style="color:#fff;" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Add Menu</a>
                         </span>
                    </header>
                    <div class="panel-body">
                    	<!--content goes here-->
                        <table class="table  table-hover general-table">
                            <thead>
                            <tr>
                                <th> #</th>
                                <th>Navigation</th>
                                <th>Redirect to</th>
                                <th>Active</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            	$nav_select = 'select * from subscribers';
								$nav_query = mysqli_query($dbcon,$nav_select);
								if(!$nav_query){echo 'can not data selected';}	
								$i=1;															
								while($fetch_nav= mysqli_fetch_assoc($nav_query)){																
							?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $fetch_nav['sbc_name']; ?></td>
                                <td><?php echo $fetch_nav['sbc_email'] ?></td>
                                <td><?php $check_active = $fetch_nav['sbc_status']; 
									if($check_active == 1){?> <span class="badge bg-primary"><i class="fa fa-bell"></i></span> <?php } else {?> <span class="badge bg-warning"><i class="fa fa-times"></i>
</span> <?php }?>
                                </td>
                                <td><a href="crud/manipulate.php?enav=<?php echo $fetch_nav['sbc_id']; ?>" class="btn btn-primary" onClick="return confirm('We are going to edit : <?php echo $fetch_nav['sbc_name'] ?>');" ><i class="fa fa-pencil"></i></a>    
                                </td>
                                <td><a href="crud/trash.php?delnav=<?php echo $fetch_nav['sbc_id']; ?>" class="btn btn-danger" onClick="return confirm('Are you sure ?');"><i class="fa fa-trash-o"></i></a></td>
                            </tr>    
                            <?php $i++; } ?>
                            </tbody>
                        </table>                        
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
<!--ADD NAVIGATION MODAL-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button"><i class="fa fa-times-circle"></i></button>
                                        <h4 class="modal-title"><i class="fa fa-plus-square"></i> Add new Menu in Header</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form role="form" name="add_new_menu" id="add_new_manu" method="post" action="<?php echo $_SERVER['PHP_SELF'].'?send' ?>">
                                            <div class="form-group">
                                                <label for="new_menu_name">Menu Name</label>
                                                <input type="text" class="form-control" name="new_menu_name" id="new_menu_name" placeholder="New menu name">
                                            </div>
                                            <div class="form-group">
                                                <label for="new_menu_url">Menu URL</label>
                                                <input type="text" class="form-control"  name="new_menu_url" id="new_menu_url" placeholder="Menu URL">
                                            </div>
                                            <div class="form-group">
                                                <label for="new_menu_url"></label>
                                                <input type="checkbox" name="menu_active" id="label-switch" class="switch-small" checked data-on-label="Active" data-off-label="NO" value="1">
                                            </div>
                                            <button type="submit" name="submit_new_menu" id="submit_new_menu" class="btn btn-default">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
<!---->
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
