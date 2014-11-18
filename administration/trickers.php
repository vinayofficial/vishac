<?php include 'inc_/functions.php'; ?>
<?php include 'inc_/_dbconnector.php'; ?>
<?php
	$currentlevel='trickers';
	// fetching levels
	$sellevel = "SELECT * FROM vish_levels WHERE level_name='$currentlevel'";
	$fr_sellevel = mysqli_query($dbcon,$sellevel) or die('can not fire select level query'); ;
	$get_level = mysqli_fetch_assoc($fr_sellevel) or die('can not select level') ;
	$level_name=strtolower($get_level['level_name']);
	// fetching catagories
	$catselect='SELECT * FROM vish_cats';
	$frcat= mysqli_query($dbcon,$catselect);	
?>
<?php
	if(isset($_POST['add_bcourse'])){
		$fklevelid = $_POST['level_id'];
		$fkcatid = $_POST['cat_id'];
		$bcrs_name = $_POST['bcourse_name'];
		$breakname = explode(" ",$bcrs_name);
		echo $bcrs_url = $level_name.'/'.strtolower(implode("-",$breakname)).'.php';
		//$bcrs_url = $level_name.'/'.$_POST['bcourse_url'];
		$bcrs_title = $_POST['bcourse_title'];
		if(isset($_POST['bcourse_active']) && $_POST['bcourse_active'] == true ){ $bcrs_status =1;} else {$bcrs_status =0;}
		//Image variables
		$name = $_FILES['coursepic']['name'];
		$tmp_name = $_FILES['coursepic']['tmp_name'];	
		// IMAGE UPLOAD
		if($name){
			// start upload process 
			$location = "../assets/images/$name";
			move_uploaded_file($tmp_name,$location) or die("Error in location syntax");		
		}
		$location = "http://".SITE_PATH."assets/images/$name";
		$query = "INSERT INTO vish_subjects (level_id,cat_id,subj_name,subj_redirect_to,subj_logo_url,subj_title,subj_status,subj_madeon) 				VALUES('$fklevelid','$fkcatid','$bcrs_name','$bcrs_url','$location','$bcrs_title','$bcrs_status',now())";
		$fire = mysqli_query($dbcon,$query) or die('Error in firing your insert query');
		if($fire){
			$newfilepath = $bcrs_url;			
			$newfile = fopen($newfilepath, "w") or die("Unable to open file!");
			$txt = "Here is how it will work\n";
			fwrite($newfile, $txt);
			fclose($newfile);
			$sourcefile = "vidmanage_blueprint.php";
			$destfile = $bcrs_url;
			copy($sourcefile,$destfile);
			header('Location:'.$_SERVER['PHP_SELF']);
		}
	}
?>
	
<!DOCTYPE html>
<html lang="en">
<head>
    <title>vishAcademy | manage header </title>
    <?php require_once 'inc_/css_bundle.php';?>    
    <link rel="stylesheet" href="assets/css/bootstrap-switch.css" />    
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-fileupload/bootstrap-fileupload.css" />
</head>
<body>
<section id="container">
<!--header start-->
<?php include_once 'inc_/admn_header.php';?>
<!--header end-->
<!--sidebar start-->
<?php include_once 'inc_/main_nav.php';?>
<!--sidebar end-->
<!--main content start-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-8">
                <section class="panel">
                    <header class="panel-heading">
                        Manage Beginners Subject / courses
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                            <a href="#addlevel_modal" style="color:#fff;" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Add Subject</a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <!--content will be shown here-->                        
                         <!----------------------------------------------------------------->
                         <ul id="subtile">	
                         <?php 	
						 	$fetch_levelid = $get_level['level_id'];
							$select = "Select * FROM vish_subjects WHERE level_id='$fetch_levelid'";
							$fired = mysqli_query($dbcon,$select) or die('can not select subjects') ;							
							while($fetch = mysqli_fetch_assoc($fired)){	
							$temp_catid = $fetch['cat_id'];			
							$subject_name = urlencode($fetch['subj_name']);										
						 ?>                         
                			<li>
                    	<div class="tile_img">
                        	<img src="<?php echo $fetch['subj_logo_url'];?>" alt="HTML4" />
                            <div class="tile_over">
                            	<p><a href="<?php echo $fetch['subj_redirect_to']."?subj=".strtolower($subject_name);?>"><?php echo $fetch['subj_name'];?></a></p>
                            </div>
                        </div>
                        <div class="tile_cat"> 
                        	<?php  // Now getting entry into table vish_cats
								
								$temp_selcat = "SELECT * FROM vish_cats WHERE cat_id='$temp_catid'";
								$fr_selcat = mysqli_query($dbcon,$temp_selcat);
								$fetch_cat = mysqli_fetch_assoc($fr_selcat);
							?>
                        		// <?php echo substr($fetch_cat['cat_name'],0,10); ?> 
                        	<span class="pull-right">
                            	<a href="#" class="badge 
									<?php if($fetch['subj_status']==1) { echo 'bg-primary';} 
									else { echo 'bg-default'; }?>"><i class="fa fa-power-off"></i></a>
                            </span>
                        </div>
                        <div class="course-setting">
                        	<a href="crud/manipulator.php?subj=<?php echo urlencode($subject_name);?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a> 
                            <a href="crud/trash.php?bcrsid=<?php echo $fetch['subj_id'];?>" class="btn btn-danger btn-xs" onClick="return confirm('Do you want to delete <?php echo substr($fetch['subj_name'],0,10);  ?>')"><i class="fa fa-trash-o"></i></a>
                        </div>                                                
                    </li>
                    <?php }?>                    		
                        </ul>
                <!---------------------------------------------------------------------------------------------->
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
<!--ADD New Subject MODAL-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addlevel_modal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button"><i class="fa fa-times-circle"></i></button>
                                        <h4 class="modal-title"><i class="fa fa-plus-square"></i> Add new Course for BEGINNERS</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form role="form" name="bcourse" id="bcourse" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'].'?send' ?>">			
                                        
                                            <div class="form-group">
                                                 <select name="level_id" class="form-control m-bot15">
                                                <?php 
													$sellevel = "SELECT * FROM vish_levels WHERE level_name='$currentlevel'";
													$fr_sellevel = mysqli_query($dbcon,$sellevel) or die('can not fire select level query');
													while($get_level = mysqli_fetch_assoc($fr_sellevel)){  
                                                    $levelid = $get_level['level_id'] ;
                                                    $levelname = $get_level['level_name'] ;?>                                                    <option name="<?php echo $get_level['level_id']; ?>" value="<?php echo $get_level['level_id']; ?>"><?php echo $levelname ;?></option>
												<?php } ?>
                                                </select>
                                                 <p>This is the content for Layout P Tag</p>
                                            </div>                            
                                             <div class="form-group">
                                                <select name="cat_id" class="form-control m-bot15">
	                                            <?php 
													while($fcat = mysqli_fetch_assoc($frcat)){ 
													$catid = $fcat['cat_id'];
													$catname = $fcat['cat_name'];?>
													<option name="<?php echo $catid;?>" value="<?php echo $catid;?>"><?php echo $catname;?></option>
												<?php } ?>
                                                </select>
                                            </div>                            
                                            <div class="form-group">
                                                <label for="new_level_name">New Course name</label>
                                                <input type="text" class="form-control" name="bcourse_name" id="bcourse_name" placeholder="New course name">
                                            </div>
                                            <div class="form-group">
                                                <label for="new_level_name">Subject redirects to</label>
                                                <input type="text" class="form-control" name="bcourse_url" id="bcourse_url" placeholder="i.e.. This_course_name.php">
                                            </div> 
                                            <div class="form-group">
                                                <label for="new_level_name">Subject title</label>
                                                <input type="text" class="form-control" name="bcourse_title" id="bcourse_title" placeholder="i.e.. HTML in Hindi">
                                            </div>
                                            <div class="form-group last">
                                <label class="control-label col-md-3">Image Upload</label>
                                <div class="col-md-9">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="assets/images/va/AAAAAA&text=no+image.gif" alt="" />
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        <div>
                                                   <span class="btn btn-white btn-file">
                                                   <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                   <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                   <input type="file"  name="coursepic" class="default" />
                                                   </span>
                                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                        </div>
                                    </div>
                                    <span class="label label-danger">NOTE!</span>
                                             <span>	156X192px </span>
                                </div>
                            </div>                                            
                                            <div class="form-group">
                                                <input type="checkbox" name="bcourse_active" id="label-switch" class="switch-small" checked data-on-label="Active" data-off-label="NO" value="1">
                                            </div>
                                            <button type="submit" name="add_bcourse" id="add_bcourse" class="btn btn-danger">Add course</button>
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

<script type="text/javascript" src="assets/js/bootstrap-fileupload/bootstrap-fileupload.js"></script>

</body>
</html>
