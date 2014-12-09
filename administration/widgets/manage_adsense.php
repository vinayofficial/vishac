<?php
	 include '../inc_/functions.php'; 
	 include '../inc_/_dbconnector.php';
	 check_login();
?>
<?php
	// ADD Adsense FORM
	if(isset($_POST['create_adsense'])){
		$adsense_name = mysql_real_escape_string(trim(ucfirst($_POST['adsense_name'])));		
		$adsense_size = mysql_real_escape_string(trim(ucfirst($_POST['adsense_size'])));
		$adsense_code = mysql_real_escape_string(trim($_POST['adsense_code']));
		if(isset($_POST['adsense_status']) && $_POST['adsense_status']==true){$adsense_status = 1;} else {$adsense_status = 0;}
						
		$iquery = "INSERT INTO manage_adsense (ad_name,ad_size,ad_code,ad_status,modified_on) VALUES('$adsense_name','$adsense_size','$adsense_code','$adsense_status',now())";
		$qfire = mysqli_query($dbcon,$iquery) or die("ERROR FOUND : ".mysqli_error($dbcon));
		if($qfire){
			header('Location:'.$_SERVER['PHP_SELF']);
		}
	}
?>
<?php
	// ADD catagory FORM
	if(isset($_POST['submit_new_cat'])){
		$new_cat_name = mysql_real_escape_string(trim($_POST['new_cat_name']));	
		if(isset($_POST['cat_active']) && $_POST['cat_active'] == true ){
			$cat_active = 1;
		} else{
			$cat_active = 0;
		}		
		$newcat_qry = "INSERT INTO vish_cats (cat_name,cat_status,cat_madeon) VALUES('$new_cat_name','$cat_active',now())";
		$fire_newcat_qry = mysqli_query($dbcon,$newcat_qry);
		if(!$fire_newcat_qry){echo 'Facing ERROR IN VALUE SUBMISSION';}
		else{echo 'DATA INSERTED SUCCESSFULLY !!!'; header('Location:'.$_SERVER['PHP_SELF']);}
	}
?>

	
<!DOCTYPE html>
<html lang="en">
<head>
    <title>vishAcademy | Manage Adsense </title>
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
                        Manage Adsense Advertisements
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                            <a href="#addlevel_modal" style="color:#fff;" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Add Advertise</a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <table class="table  table-hover general-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Ad name</th>
                                <th>Ad Size</th>
                                <th>Ad code</th>
                                <th>Modified on</th>                                
                                <th>Active</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            	$ad_select = 'select * from manage_adsense';
								$ad_query = mysqli_query($dbcon,$ad_select);
								if(!$ad_query){echo 'can not data selected';}	
								$i=1;															
								while($fetch_ad= mysqli_fetch_assoc($ad_query)){																
							?>
                           	 <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $fetch_ad['ad_name']; ?></td>                                
                                <td><?php echo $fetch_ad['ad_size']; ?></td>
                                <td><?php echo substr($fetch_ad['ad_code'],0,120).'...'; ?></td>
                                <td><?php echo $fetch_ad['modified_on']; ?></td>
                                <td><?php $check_active = $fetch_ad['ad_status']; 
									if($check_active == 1){?> <span class="badge bg-primary">Yes</span> <?php } else {?> <span class="badge">No</span> <?php }?>
                                </td>
                                <td><a href="crud/manipulator.php?elvl=<?php echo $fetch_ad['ad_id']; ?>" class="btn btn-primary" onClick="return confirm('We are going to edit : <?php echo $fetch_ad['ad_name'] ?>');" ><i class="fa fa-pencil"></i></a>    
                                </td>
                                <td><a href="crud/trash.php?dellvl=<?php echo $fetch_ad['ad_id']; ?>" class="btn btn-danger" onClick="return confirm('Are you sure ?');"><i class="fa fa-trash-o"></i></a></td> <?php $i++; } ?>
                            </tr>
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
<!--ADD Level MODAL-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addlevel_modal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button"><i class="fa fa-times-circle"></i></button>
                                        <h4 class="modal-title"><i class="fa fa-plus-square"></i> Add new Menu in Header</h4>
                                    </div>
                                    <div class="modal-body">

            <form role="form" name="new_adsense" id="new_adsense" method="post" action="<?php echo $_SERVER['PHP_SELF'].'?send' ?>">
                <div class="form-group">
                    <label for="adsense_name">Advertise Name</label>
                    <input type="text" class="form-control" name="adsense_name" id="level_name" placeholder="New Advertise name" required>
                </div>                               
                <div class="form-group">
                    <label for="adsense_size">Advertise Size</label>
                    <input type="text" class="form-control" name="adsense_size" id="adsense_size" placeholder="New Ad size" required>
                </div>                                            
                <div class="form-group">
                    <label for="adsense_code">Adsense code</label>
                    <textarea name="adsense_code" id="adsense_code" class="form-control" rows="6" placeholder="Adsense code for this advertise" required></textarea>
                </div>                                                                                                                   
                <div class="form-group">
                    <input type="checkbox" name="adsense_status" id="label-switch" class="switch-small" checked data-on-label="Active" data-off-label="NO" value="1">
                </div>
                <button type="submit" name="create_adsense" id="create_adsense" class="btn btn-primary">Create new Advertise</button>
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
