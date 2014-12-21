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
						
		$iquery = "INSERT INTO manage_widgets (wdgt_name,wdgt_size,wdgt_code,wdgt_status,wdgt_date) VALUES('$adsense_name','$adsense_size','$adsense_code','$adsense_status',now())";
		$qfire = mysqli_query($dbcon,$iquery) or die("ERROR FOUND : ".mysqli_error($dbcon));
		if($qfire){
			header('Location:'.$_SERVER['PHP_SELF']);
		}
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
                        <table class="table table-hover general-table lets-edit" id="manage_widgets" data-date="wdgt_date">
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
                            	$ad_select = 'select * from manage_widgets';
								$ad_query = mysqli_query($dbcon,$ad_select);
								if(!$ad_query){echo 'can not data selected';}	
								$i=1;															
								while($fetch_ad= mysqli_fetch_assoc($ad_query)){																
							?>
                           	 <tr class="wdgt_id" id="<?php echo $fetch_ad['wdgt_id']; ?>">
                                <td><?php echo $i; ?></td>
                                <td class="wdgt_name"><?php echo $fetch_ad['wdgt_name']; ?></td>
                                <td class="wdgt_size"><?php echo $fetch_ad['wdgt_size']; ?></td>
                                <td style="max-width:300px !important; overflow:hidden;" class="wdgt_code"><?php echo substr($fetch_ad['wdgt_code'],0,120).'...'; ?></td>
                                <td class="wdgt_date">
                                <abbr title="<?php echo $fetch_ad['wdgt_date']; ?>">
									<?php //echo $fetch_ad['ad_date']; 
										$ts= $fetch_ad['wdgt_date'];
										echo time_ago($ts);
									?>                                            
                                 </abbr>                        
                                </td>
                                <td class="wdgt_status"><?php $check_active = $fetch_ad['wdgt_status']; 
									if($check_active == 1){?> <span class="badge bg-primary">Yes</span> <?php } else {?> <span class="badge">No</span> <?php }?>
                                </td>
                                <td><a href="crud/manipulator.php?elvl=<?php echo $fetch_ad['wdgt_id']; ?>" class="btn btn-primary" onClick="return confirm('We are going to edit : <?php echo $fetch_ad['wdgt_name'] ?>');" ><i class="fa fa-pencil"></i></a>    
                                </td>
                                <td><a href="crud/trash.php?dellvl=<?php echo $fetch_ad['wdgt_id']; ?>" class="btn btn-danger" onClick="return confirm('Are you sure ?');"><i class="fa fa-trash-o"></i></a></td> <?php $i++; } ?>
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
<!--Custom script-->
<script src="assets/js/custom.js"></script>

</body>
</html>
