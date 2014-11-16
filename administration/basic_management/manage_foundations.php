<?php
	 include '../inc_/functions.php'; 
	 include '../inc_/_dbconnector.php';
?>
<?php
	// ADD LEVEL FORM
	if(isset($_POST['submit_level'])){
		$level_name = mysql_real_escape_string(trim(ucfirst($_POST['level_name'])));		
		$level_tagline = mysql_real_escape_string(trim(ucfirst($_POST['level_tagline'])));
		$level_intro = mysql_real_escape_string(trim(ucfirst($_POST['level_intro'])));
		$level_link = mysql_real_escape_string(trim($_POST['level_link']));
		if(isset($_POST['level_status']) && $_POST['level_status']==true){$level_status = 1;} else {$level_status = 0;}
						
		$iquery = "INSERT INTO vish_levels (level_name,level_tagline,level_intro,level_pagelink,level_status,level_madeon) VALUES('$level_name','$level_tagline','$level_intro','$level_link','$level_status',now())";
		$qfire = mysqli_query($dbcon,$iquery) or trigger_error(mysql_error()." ".$iquery); ;
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
                        Manage LEVELS
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                            <a href="#addlevel_modal" style="color:#fff;" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Add Level</a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <table class="table  table-hover general-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Level name</th>
                                <th>Active</th>
                                <th>Tagline</th>
                                <th>Intro</th>
                                <th>link</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            	$lvl_select = 'select * from vish_levels';
								$lvl_query = mysqli_query($dbcon,$lvl_select);
								if(!$lvl_query){echo 'can not data selected';}	
								$i=1;															
								while($fetch_lvl= mysqli_fetch_assoc($lvl_query)){																
							?>
                           	 <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $fetch_lvl['level_name']; ?></td>
                                <td><?php $check_active = $fetch_lvl['level_status']; 
									if($check_active == 1){?> <span class="badge bg-primary">Yes</span> <?php } else {?> <span class="badge">No</span> <?php }?>
                                </td>
                                <td><?php echo substr($fetch_lvl['level_tagline'],0,40).'...'; ?></td>
                                <td><?php echo substr($fetch_lvl['level_intro'],0,120).'...'; ?></td>
                                <td><?php echo $fetch_lvl['level_pagelink']; ?></td>
                                <td><a href="crud/manipulator.php?elvl=<?php echo $fetch_lvl['level_id']; ?>" class="btn btn-primary" onClick="return confirm('We are going to edit : <?php echo $fetch_lvl['level_name'] ?>');" ><i class="fa fa-pencil"></i></a>    
                                </td>
                                <td><a href="crud/trash.php?dellvl=<?php echo $fetch_lvl['level_id']; ?>" class="btn btn-danger" onClick="return confirm('Are you sure ?');"><i class="fa fa-trash-o"></i></a></td> <?php $i++; } ?>
                            </tr>
                           </tbody>
                        </table>
                    </div>
                </section>
            </div>
            <div class="col-sm-6">
                <section class="panel">
                    <header class="panel-heading">
                        Manage Catagories
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                            <a href="#addcat_modal" style="color:#fff;" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Add Cats</a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <table class="table  table-hover general-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Catagory name</th>
                                <th>Active</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            	$cat_select = 'select * from vish_cats';
								$cat_query = mysqli_query($dbcon,$cat_select);
								if(!$cat_query){echo 'can not data selected';}	
								$i=1;															
								while($fetch_cat= mysqli_fetch_assoc($cat_query)){																
							?>
                           	 <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $fetch_cat['cat_name']; ?></td>
                                <td><?php $check_active = $fetch_cat['cat_status']; 
									if($check_active == 1){?> <span class="badge bg-primary">Yes</span> <?php } else {?> <span class="badge">No</span> <?php }?>
                                </td>
                                <td><a href="crud/manipulator.php?ecat=<?php echo $fetch_cat['cat_id']; ?>" class="btn btn-primary" onClick="return confirm('We are going to edit : <?php echo $fetch_cat['cat_name'] ?>');" ><i class="fa fa-pencil"></i></a>    
                                </td>
                                <td><a href="crud/trash.php?delcat=<?php echo $fetch_cat['cat_id']; ?>" class="btn btn-danger" onClick="return confirm('Are you sure ?');"><i class="fa fa-trash-o"></i></a></td> <?php $i++; } ?>
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

            <form role="form" name="new_level" id="new_level" method="post" action="<?php echo $_SERVER['PHP_SELF'].'?send' ?>">
                <div class="form-group">
                    <label for="level_name">Level Name</label>
                    <input type="text" class="form-control" name="level_name" id="level_name" placeholder="New level name" required>
                </div>                               
                <div class="form-group">
                    <label for="level_tagline">Level Tagline</label>
                    <input type="text" class="form-control" name="level_tagline" id="level_tagline" placeholder="New level tagline" required>
                </div>                                            
                <div class="form-group">
                    <label for="level_intro">Level Intro</label>
                    <textarea name="level_intro" id="level_intro" class="form-control" rows="6" placeholder="About or Intro of new level" required></textarea>
                </div>                                            
                <div class="form-group">
                    <label for="level_link">Level page link</label>
                    <input type="text" class="form-control" name="level_link" id="level_link" placeholder="New level page link" required>
                </div>                                                         
                <div class="form-group">
                    <input type="checkbox" name="level_status" id="label-switch" class="switch-small" checked data-on-label="Active" data-off-label="NO" value="1">
                </div>
                <button type="submit" name="submit_level" id="submit_level" class="btn btn-default">Submit</button>
            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
<!---->
<!--ADD catagory MODAL-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addcat_modal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button"><i class="fa fa-times-circle"></i></button>
                                        <h4 class="modal-title"><i class="fa fa-plus-square"></i> Add new Catagory</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form role="form" name="add_new_cat" id="add_new_cat" method="post" action="<?php echo $_SERVER['PHP_SELF'].'?send' ?>">
                                            <div class="form-group">
                                                <label for="new_cat_name">Menu Name</label>
                                                <input type="text" class="form-control" name="new_cat_name" id="new_cat_name" placeholder="New catagory name">
                                            </div>                                            
                                            <div class="form-group">
                                                <input type="checkbox" name="cat_active" id="label-switch" class="switch-small" checked data-on-label="Active" data-off-label="NO" value="1">
                                            </div>
                                            <button type="submit" name="submit_new_cat" id="submit_new_cat" class="btn btn-default">Submit</button>
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
