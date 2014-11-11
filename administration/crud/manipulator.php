<?php include '../inc_/_dbconnector.php';?>
<?php
	//--------------------------EDIT LEVEL operations
	// GETTING LEVEL DATA
	if(isset($_GET['elvl'])){
		$levelid = $_GET['elvl'];
		$select_qry = "SELECT * FROM vish_levels WHERE level_id='$levelid'";
		$select_level = mysqli_query($dbcon,$select_qry);
		$fetch_lvl = mysqli_fetch_assoc($select_level);
	}
	// Updating level data
	if(isset($_POST['update_level_name'])){
		$new_level_name = mysql_real_escape_string(trim(ucfirst($_POST['updatelevel_name'])));
		$new_level_tagline = mysql_real_escape_string(trim(ucfirst($_POST['uplevel_tagline'])));
		$new_level_intro = mysql_real_escape_string(trim(ucfirst($_POST['uplevel_intro'])));
		$new_level_link = mysql_real_escape_string(trim($_POST['uplevel_link']));
		if(isset($_POST['level_active']) && $_POST['level_active'] == true ){
			$level_active = 1;
		} else{
			$level_active = 0;
		}
		$uplevel_qry = "UPDATE vish_levels SET ";
		$uplevel_qry .="level_name = '$new_level_name',";
		$uplevel_qry .="level_tagline = '$new_level_tagline',";
		$uplevel_qry .="level_intro = '$new_level_intro',";
		$uplevel_qry .="level_pagelink = '$new_level_link',";
		$uplevel_qry .="level_status = '$level_active' ";
		$uplevel_qry .="WHERE level_id='$levelid'";
		$fire_query = mysqli_query($dbcon,$uplevel_qry);
		if(!$fire_query){echo 'Error in DATA UPDATION';}
		else {
			header('Location:../basic_management/manage_foundations.php');}
	}
?>
<?php
	//--------------------------EDIT Catagory operations
	// GETTING LEVEL DATA
	if(isset($_GET['ecat'])){
		$catid = $_GET['ecat'];
		$select_qry = "SELECT * FROM vish_cats WHERE cat_id='$catid'";
		$select_cat = mysqli_query($dbcon,$select_qry);
		$fetch_cat = mysqli_fetch_assoc($select_cat);
	}
	// Updating level data
	if(isset($_POST['update_cat_name'])){
		$new_cat_name = mysql_real_escape_string(trim($_POST['updatecat_name']));
		if(isset($_POST['cat_active']) && $_POST['cat_active'] == true ){
			$cat_active = 1;
		} else{
			$cat_active = 0;
		}
		$uplevel_qry = "UPDATE vish_cats SET ";
		$uplevel_qry .="cat_name = '$new_cat_name',";
		$uplevel_qry .="cat_status = '$cat_active' ";
		$uplevel_qry .="WHERE cat_id='$catid'";		
		$fire_query = mysqli_query($dbcon,$uplevel_qry);
		if(!$fire_query){echo 'Error in DATA UPDATION';}
		else {
			header('Location:../basic_management/manage_foundations.php');}
	}
?>
<?php
	//--------------------------EDIT Subject topic operations
	// Getting subject id for redirection after deletion
		if(isset($_GET['subj'])){
			$subject_name= $_GET['subj'];		
		$selsub = "SELECT * FROM vish_subjects WHERE subj_name = '$subject_name'";
		$firesubject = mysqli_query($dbcon,$selsub);
		$getsubject = mysqli_fetch_assoc($firesubject);
		$videopage_path = $getsubject['subj_redirect_to'].'?subj='.$getsubject['subj_name'];	
		}
	// GETTING Topic  DATA
	if(isset($_GET['tpcid'])){
		$tpcid = $_GET['tpcid'];
		$select_qry = "SELECT * FROM vish_topics WHERE topic_id='$tpcid'";
		$select_tpc = mysqli_query($dbcon,$select_qry);
		$fetch_tpc = mysqli_fetch_assoc($select_tpc);
	}
	// Updating video topic=-=-=-=-==-
	if(isset($_POST['update_topic'])){
		$new_tpc_name = mysql_real_escape_string(trim($_POST['topic_name']));
		if(isset($_POST['topic_active']) && $_POST['topic_active'] == true ){
			$topic_active = 1;
		} else{
			$topic_active = 0;
		}
		$uptpc_qry = "UPDATE vish_topics SET ";
		$uptpc_qry .="topic_name = '$new_tpc_name',";
		$uptpc_qry .="topic_status = '$topic_active' ";
		$uptpc_qry .="WHERE topic_id='$tpcid'";		
		$fire_query = mysqli_query($dbcon,$uptpc_qry);
		if(!$fire_query){echo 'Error in DATA UPDATION';}
		else {
			header('Location:../'.$videopage_path);}
	}
?>
<?php
	// fetching level, cat and subject on value of ?subj=subject_name
	if(isset($_GET['subj'])){
			$subjid = $_GET['subj'];
			$selsubj = "SELECT * FROM vish_subjects WHERE subj_name = '$subjid'";
			$slqry = mysqli_query($dbcon,$selsubj);
			if(!$slqry){echo 'Query not fired';}
			// fetch subjects
			$fetchsubj = mysqli_fetch_assoc($slqry);	
			$levelid = $fetchsubj['level_id'];
			$catid = $fetchsubj['cat_id'];
			$subid = $fetchsubj['subj_id'];
			// fetch level
			$selvl = "SELECT * FROM vish_levels WHERE level_id ='$levelid'";
			$lvlqry = mysqli_query($dbcon,$selvl);		
			$fetchlvl = mysqli_fetch_assoc($lvlqry);		
			// fetch cat
			$selcat = "SELECT * FROM vish_cats WHERE cat_id ='$catid'";		
			$catqry = mysqli_query($dbcon,$selcat);
			$fetchcat = mysqli_fetch_assoc($catqry);			
		}
	// fetching data from video table
	if(isset($_GET['vidid'])){
		$vidid = $_GET['vidid'];
		$selectvid_qry = "SELECT * FROM vish_videodata WHERE vid_id='$vidid'";
		$select_vid = mysqli_query($dbcon,$selectvid_qry);
		$fetch_vid = mysqli_fetch_assoc($select_vid);
		// fetch meta
			$selvidmeta = "SELECT * FROM vish_videometa WHERE vid_id='$vidid'";
			$firevidmeta = mysqli_query($dbcon,$selvidmeta);
			$getmeta = mysqli_fetch_assoc($firevidmeta);	
	}
	
	//Updating video address and general information...
	if(isset($_POST['update_video'])){
		$new_topicid = $_POST['topic_id'];
		$new_entitle = ucfirst($_POST['new_entitle']);
		$new_hintitle = $_POST['new_hintitle'];
		$new_yturl = $_POST['new_yturl'];
		$new_page_description = $_POST['new_page_description'];
		if(isset($_POST['video_active']) && $_POST['video_active'] == true ){
			$video_active = 1;
		} else{
			$video_active = 0;
		}
		$insertvidinfo = "UPDATE vish_videodata SET "; 
		$insertvidinfo .="topic_id= '$new_topicid', ";
		$insertvidinfo .="vid_Ename= '$new_entitle', ";
		$insertvidinfo .="vid_Hname= '$new_hintitle', ";
		$insertvidinfo .="vid_YTurl= '$new_yturl', ";
		$insertvidinfo .="vid_status= '$video_active' ";
		$insertvidinfo .=" WHERE vid_id='$vidid'";
		$firecontent = mysqli_query($dbcon,$insertvidinfo) or die('can not insert content into database') ;
		if(!$firecontent){echo 'Error in DATA UPDATION';}
		else {			
			$updmeta = "UPDATE vish_videometa SET page_title = '$new_entitle', page_description='$new_page_description' WHERE vid_id='$vidid'";
			$fire_upmeta = mysqli_query($dbcon,$updmeta) or die('can not insert data into vish meta table');
			header('Location:../'.$videopage_path);}
	}	
		//Updating video content
		if(isset($_POST['update_vidcontent'])){
			$vidcontent= $_POST['vidcontent'];
			$insertcontent = "UPDATE vish_videodata SET vid_desc1= '$vidcontent' WHERE vid_id='$vidid'";
			$firecontent = mysqli_query($dbcon,$insertcontent) or die('can not insert content into database') ;
			if(!$firecontent){echo 'Error in DATA UPDATION';}
		else {
			header('Location:../'.$videopage_path);}
		}
	?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>vishAcademy | manage header </title>
    <meta  charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">	
    <?php require_once '../inc_/css_bundle.php';?>        
    <link rel="stylesheet" href="assets/ckeditor/contents.css">       
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
        	<?php
				//This form will be displayed only id editing LEVELS
			 if(isset($_GET['elvl'])) { ?>
            <div class="col-sm-6">
                <section class="panel">
                    <header class="panel-heading">
                        Update LEVEL name and features
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">                    	
                        <!-----EDIT LEVEL FORM---->                        
                        <form role="form" name="update_level" id="update_level" method="post" action="">
                            <div class="form-group">
                                <label for="update_name">Level Name</label>
                                <input type="text" class="form-control" name="updatelevel_name" id="updatelevel_name" placeholder="update level name" value="<?php echo $fetch_lvl['level_name']; ?>">
                            </div>                  
                             <div class="form-group">
                    <label for="uplevel_tagline">Level Tagline</label>
                    <input type="text" class="form-control" name="uplevel_tagline" id="uplevel_tagline" placeholder="update level tagline" value="<?php echo $fetch_lvl['level_tagline']; ?>" required>
                </div>                                            
                <div class="form-group">
                    <label for="uplevel_intro">Level Intro</label>
                    <textarea name="uplevel_intro" id="uplevel_intro" class="form-control" rows="6" placeholder="About or Intro of new level" required><?php echo $fetch_lvl['level_intro']; ?></textarea>
                </div>                                            
                <div class="form-group">
                    <label for="uplevel_link">Level page link</label>
                    <input type="text" class="form-control" name="uplevel_link" id="uplevel_link" placeholder="update level page link" value="<?php echo $fetch_lvl['level_pagelink']; ?>" required>
                </div>                          
                            <div class="form-group">
                                <input type="checkbox" name="level_active" id="label-switch" class="switch-small" data-on-label="Active" data-off-label="NO" value="1" <?php if($fetch_lvl['level_status']==1){echo 'checked';} ?>>
                            </div>
                            <button type="submit" name="update_level_name" id="update_level_name" class="btn btn-primary">
                            Update</button>
                         </form>                        
                    </div>
                </section>
            </div>
             <?php } //Edit level form close here ?>
             <?php
			 	// --------------------------------EDIT CATAGORY form----------------------------
				//This form will be displayed only id editing CATAGORIES
			 if(isset($_GET['ecat'])) { ?>
            <div class="col-sm-6">
                <section class="panel">
                    <header class="panel-heading">
                        Update catagory name and features
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">                    	
                        <!-----EDIT catagory FORM---->                        
                        <form role="form" name="update_cat" id="update_cat" method="post" action="">
                            <div class="form-group">
                                <label for="update_name">catagory Name</label>
                                <input type="text" class="form-control" name="updatecat_name" id="updatecat_name" placeholder="update cat name" value="<?php echo $fetch_cat['cat_name']; ?>">
                            </div>                                            
                            <div class="form-group">
                                <input type="checkbox" name="cat_active" id="label-switch" class="switch-small" data-on-label="Active" data-off-label="NO" value="1" <?php if($fetch_cat['cat_status']==1){echo 'checked';} ?>>
                            </div>
                            <button type="submit" name="update_cat_name" id="update_cat_name" class="btn btn-primary">
                            Update catagory</button>
                         </form>                        
                    </div>
                </section>
            </div>
             <?php } //Edit catagory form close here ?>
             
             <?php	// Editsubject topic form
			  ?>
            <?php if(isset($_GET['tpcid'])) { ?>
            <div class="col-sm-6">
                <section class="panel">
                    <header class="panel-heading">
                        Update Topic name and features
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">                    	
                       <!--ADD TOPIC MODAL-->
						<form role="form" name="add_new_menu" id="add_new_manu" method="post" action="<?php // echo $_SERVER['PHP_SELF'].'?send' ?>">                                        	
                        <div class="form-group">
                            <label for="topic_name">Topic Name</label>
                            <input type="text" class="form-control error" name="topic_name" id="cname" placeholder="new topic name" minlength="2" value="<?php echo $fetch_tpc['topic_name']; ?>" />                                              
                        </div>                                            
                        <div class="form-group">
                            <label for="new_menu_url"></label>
                            <input type="checkbox" name="topic_active" id="label-switch" class="switch-small" data-on-label="Active" data-off-label="NO" value="1" <?php if($fetch_tpc['topic_status']==1){echo 'checked';} ?>>
                        </div>
                        <button type="submit" name="update_topic" id="update_topic" class="btn btn-default">Add Topic</button>
                    </form>                        
                                                
                    </div>
                </section>
            </div>
             <?php } //Edit subject topic form close here ?>
             
              <?php if(isset($_GET['vidid'])) { ?>
       </div>
      	 <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <b class="tect-primary">Update Address</b> of current video page
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>                             
                         </span>
                    </header>
                    <div class="panel-body">                    	
                       <!--ADD TOPIC MODAL-->
                       <div class="col-sm-6">
						<form name="addvid_form" id="addvid_form" enctype="multipart/form-data" class="form-horizontal" method="post" action="">  
                           			<div class="form-group">
                                        <label class="col-lg-3 control-label">Subject Name</label>
                                        <div class="col-lg-8">
                                            <input name="subject_name" id="subject_name" type="text" class="form-control" placeholder="Subject title" value="<?php echo $fetchsubj['subj_title'] ?>" readonly>
                                         </div>
                                     </div>
                              		<div class="form-group">                                        
                                        <label class="col-lg-3 control-label">choose topic</label>
                                        <div class="col-lg-8">
                                         <select name="topic_id" id="topic_id" class="form-control m-bot15">
                                        <?php 
											// Selecting already exist topics from topic table
											$selalltopic = "select * from vish_topics WHERE subj_id='$subid'";
											$firealltopic = mysqli_query($dbcon,$selalltopic);																																	
											while($topicrow = mysqli_fetch_assoc($firealltopic)){											
										?>                                        
                                         	<option name="<?php echo $topicrow['topic_id'] ?>" value="<?php echo $topicrow['topic_id'] ?>" ><?php echo $topicrow['topic_name'] ?></option>
                                            <?php }?>
                                         </select>                                         
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Eng title</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="new_entitle" id="new_entitle" class="form-control" placeholder="English title of new video" value="<?php echo $fetch_vid['vid_Ename']; ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Hin title</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="new_hintitle" id="new_hintitle" class="form-control" placeholder="Hindi title of new video" value="<?php echo $fetch_vid['vid_Hname']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Youtube</label>
                                        <div class="col-lg-8">
                                            <input type="text"  name="new_yturl" id="new_yturl" class="form-control" placeholder="8xEssIHsBHk Youtube URL of new video" value="<?php echo $fetch_vid['vid_YTurl'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Page Description</label>
                                        <div class="col-lg-8">
                                           <textarea name="new_page_description" class="form-control" rows="6">
                                           		<?php echo $getmeta['page_description'] ?>
                                           </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-lg-3 control-label" for="new_menu_url">Status</label>
                                        <div class="col-lg-8">
                                         <input type="checkbox" name="video_active" id="label-switch" class="switch-small" data-on-label="Active" data-off-label="NO" value="1" <?php if($fetch_vid['vid_status']==1){echo 'checked';} ?>>
                                        </div>
                                     </div>
                                    <div class="form-group">
                                    	<div class="col-lg-8">
                                          <button id="add_video" class="btn btn-danger" name="update_video" type="submit"><i class="fa fa-plus"></i> Update video</button>
                                        </div>	
                                </div>
                        </form>                        
                       </div>                
                       <div class="col-sm-6">
                       		<h3 class="text-muted">// <?php echo $fetchsubj['subj_title'] ?></h3>
                       		<h5>// <?php echo $fetch_vid['vid_Ename']; ?></h5>
                            <div class="vidbx">
                    			<div class="video">
                         			<iframe src="//www.youtube.com/embed/<?php echo $fetch_vid['vid_YTurl']; ?>?autoplay=0" frameborder="0" allowfullscreen ></iframe>
                                </div>
                            </div>
                       </div>         
                    </div>
                </section>
            </div>            
          </div>
          <div class="row">              
          	  <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Update Content of currrent video page
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">                    	
                       <!--update content of videos-->
                       	<div class="col-sm-6">
							<form name="addvid_form" id="addvid_form" enctype="multipart/form-data" class="form-horizontal" method="post" action="">  
                                    <div class="form-group">
                                         <textarea class="ckeditor" name="vidcontent"><?php echo $fetch_vid['vid_desc1'];?></textarea>
                                     </div>
                                    <div class="form-group">
                                    	<div class="col-lg-8">
                                          <button id="add_video" class="btn btn-danger" name="update_vidcontent" type="submit"><i class="fa fa-plus"></i> Update Content</button>
                                        </div>	
                                </div>
                        </form>                        
                    	  </div>
                          
                       	  <div class="col-sm-6" contentEditable = "true">
								<?php echo $fetch_vid['vid_desc1'];?>
                           </div>               
                    </div>
                </section>
            </div>
        </div>
        <!-- video content updation form ends here-->
         <?php } //Edit subject topic form close here ?>
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
<script src="assets/ckeditor/ckeditor.js"></script>

<script>
	
CKEDITOR.replace( 'editor1', {
	extraPlugins: 'codesnippet',
	codeSnippet_theme: 'monokai_sublime'
} );
</script>

</body>
</html>
