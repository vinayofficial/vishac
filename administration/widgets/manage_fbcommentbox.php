<?php
	 include '../inc_/functions.php'; 
	 include '../inc_/_dbconnector.php';
	 check_login();
?>
<?php
	// ADD fb plugin FORM
	if(isset($_POST['create_plugin'])){
		$cmnt_subjid = mysql_real_escape_string(trim(ucfirst($_POST['plugin_subj'])));		
		$cmnt_name = mysql_real_escape_string(trim(ucfirst($_POST['plugin_name'])));
		$cmnt_code = mysql_real_escape_string(trim(ucfirst($_POST['plugin_code'])));
		$cmnt_nofposts = mysql_real_escape_string(trim(ucfirst($_POST['plugin_posts'])));
		//fetching subject name
		$query = pull_data("vish_subjects","subj_id='$cmnt_subjid'");		
		$subjname = mysqli_fetch_assoc($query);
		$subject =  $subjname['subj_name'];
				
		if(isset($_POST['plugin_status']) && $_POST['plugin_status']==true){$plugin_status = 1;} else {$plugin_status = 0;}
						
		$iquery = "INSERT INTO fbcommentboxes (cmnt_subjid,cmnt_name,cmnt_code,cmnt_nof_posts,cmnt_date,cmnt_status) VALUES('$cmnt_subjid','$subject','$cmnt_code','$cmnt_nofposts',now(),'$plugin_status')";
		$qfire = mysqli_query($dbcon,$iquery) or die("ERROR FOUND : ".mysqli_error($dbcon));
		if($qfire){
			$update = renew_data("vish_subjects","cmnt_plugin='1'","subj_id='$cmnt_subjid'");
			if($update){
				header('Location:'.$_SERVER['PHP_SELF']);
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>vishAcademy | Manage Comment plugins</title>
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
                            <a href="#addlevel_modal" style="color:#fff;" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Add comment plugin</a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <table class="table  table-hover general-table lets-edit">
                            <thead>
                            <tr>
                                <th>#</th>                                
                                <th>Assigned to</th>
                                <th>plugin code</th>
                                <th>No. of posts</th>
                                <th>Modified on</th>                                
                                <th>Active</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            	$ad_select = 'select * from fbcommentboxes';
								$ad_query = mysqli_query($dbcon,$ad_select);
								if(!$ad_query){echo 'can not data selected';}	
								$i=1;															
								while($fetch_ad= mysqli_fetch_assoc($ad_query)){																
							?>
                           	 <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $fetch_ad['cmnt_name']; ?></td>                                
                                <td><?php echo $fetch_ad['cmnt_code']; ?></td>
                                <td><?php echo $fetch_ad['cmnt_nof_posts']; ?></td>
                                <td><?php echo $fetch_ad['cmnt_date']; ?></td>                               
                                <td><?php $check_active = $fetch_ad['cmnt_status']; 
									if($check_active == 1){?> <span class="badge bg-primary">Yes</span> <?php } else {?> <span class="badge">No</span> <?php }?>
                                </td>
                                <td><a href="crud/manipulator.php?elvl=<?php echo $fetch_ad['cmnt_id']; ?>" class="btn btn-primary" onClick="return confirm('We are going to edit : <?php echo $fetch_ad['cmnt_name'] ?>');" ><i class="fa fa-pencil"></i></a>    
                                </td>
                                <td><a href="crud/trash.php?dellvl=<?php echo $fetch_ad['cmnt_id']; ?>" class="btn btn-danger" onClick="return confirm('Are you sure ?');"><i class="fa fa-trash-o"></i></a></td> <?php $i++; } ?>
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
                                        <h4 class="modal-title"><i class="fa fa-plus-square"></i> Add new Comment plugin for a subject</h4>
                                    </div>
                                    <div class="modal-body">

            <form role="form" name="new_adsense" id="new_adsense" method="post" action="<?php echo $_SERVER['PHP_SELF'].'?send' ?>">
                <div class="form-group">
                    <label for="plugin_level">Select level</label>
                    <select class="form-control" name="plugin_level" id="plugin_level" onChange="" required>
                    <option value="">Choose a level</option>
                    <?php 
						$pull_level = pull_data("vish_levels");
						while($get_level = mysqli_fetch_assoc($pull_level)){							
					 ?>
                     <option value="<?php echo $get_level['level_id']; ?>"><?php echo $get_level['level_name']; ?></option>
                     <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="plugin_cat">Select catagory</label>
                    <select class="form-control" name="plugin_cat" id="plugin_cat" placeholder="choose catagory" onChange="" required>
                    <option value="">Choose catagory</option>
                    <?php 
						$pull_cats = pull_data("vish_cats");
						while($get_cats = mysqli_fetch_assoc($pull_cats)){							
					 ?>
                     <option value="<?php echo $get_cats['cat_id']; ?>"><?php echo $get_cats['cat_name']; ?></option>
                     <?php } ?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="plugin_subj">Select subject</label>
                    <select class="form-control" name="plugin_subj" id="plugin_subj" placeholder="choose subject" onChange="" required>
             		<option value="">No subject found</option>      
                    </select>
                </div>                               
                <div class="form-group">
                    <label for="adsense_size">Plugin name</label>
                    <input type="text" class="form-control" name="plugin_name" id="plugin_name" placeholder="New plugin name" required>
                </div>                                            
                <div class="form-group">
                    <label for="plugin_code">Plugin code</label>
                    <textarea name="plugin_code" id="plugin_code" class="form-control" rows="6" placeholder="Plugin code for choosen subject" required></textarea>
                </div> 
                <div class="form-group">
                    <label for="plugin_code">No. of posts</label>
                     <input type="number" class="form-control" name="plugin_posts" id="plugin_posts" placeholder="No. of posts">
                </div>                                                                                                                   
                <div class="form-group">
                    <input type="checkbox" name="plugin_status" id="label-switch" class="switch-small" checked data-on-label="Active" data-off-label="NO" value="1">
                </div>
                <button type="submit" name="create_plugin" id="create_plugin" class="btn btn-primary">Create new comment plugin</button>
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
<!--Custom script-->
<script src="assets/js/custom.js"></script>

</body>
</html>
