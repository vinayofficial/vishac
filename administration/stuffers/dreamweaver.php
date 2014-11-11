<!DOCTYPE html>
<html lang="en">
<head>
	<meta  charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">	
<?php include '../inc_/functions.php'; ?>
<?php include '../inc_/_dbconnector.php'; ?>
<?php
	// Fetch Subject path information for topic add
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
?>
<?php
	// Submiting new TOPIC value
	if(isset($_POST['add_topic'])){
		$topic_name = mysql_real_escape_string(trim(ucfirst($_POST['topic_name'])));
		if(isset($_POST['topic_active']) && $_POST['topic_active'] == true ){ $topic_status =1;} else {$topic_status =0;}
		$tpcqry  = "INSERT INTO vish_topics (level_id,cat_id,subj_id,topic_name,topic_status,topic_madeon) ";
		$tpcqry .= "VALUES ('$levelid','$catid','$subid','$topic_name','$topic_status',now())";
		$tpcfire = mysqli_query($dbcon,$tpcqry);
		if(!$tpcfire){echo 'ERROR in Insertion process into topic name';}
		else{ header('Location:'.$_SERVER['PHP_SELF'].'?subj='.$subjid); echo mysql_affected_rows().' topic added into topics';}
	}
?>
<?php
	// Submitting video data
	if(isset($_POST['add_video'])){
		$vidtopic = $_POST['topic_id'];
		$engtitle = trim(ucfirst($_POST['entitle']));
		$hintitle = $_POST['hintitle'];
		$yturl = trim($_POST['yturl']);
		$pagedescription = trim(ucfirst($_POST['page_description']));
		if(isset($_POST['video_active']) && $_POST['video_active'] == true ){ $video_status =1;} else {$video_status =0;}
		$breaktitle = explode(" ",$engtitle);
		$pageurl = lcfirst(implode("-",$breaktitle).'.php');
		$vidata_qry = "INSERT INTO vish_videodata ";
		$vidata_qry .="(level_id,cat_id,subj_id,topic_id,vid_Ename,vid_Hname,vid_YTurl,vid_pageurl,vid_status,vid_madeon) ";
		$vidata_qry .="VALUES('$levelid','$catid','$subid','$vidtopic','$engtitle','$hintitle','$yturl','$pageurl','$video_status',now())";		
		$vidata_qry= mysqli_query($dbcon,$vidata_qry) or die("can not submit values into video table");	
		//Inserting SEO information of this video
		if($vidata_qry){			
			$select_last_video = "SELECT * FROM vish_videodata ORDER BY vid_id DESC LIMIT 1";
			$get_last_video = mysqli_query($dbcon,$select_last_video) or die ('can not select last video');
			$last_vid = mysqli_fetch_assoc($get_last_video) or die ('can not fetch last video as array');
			$last_vid_id = $last_vid['vid_id'];
			$vidmeta_qry = "INSERT INTO vish_videometa ";
			$vidmeta_qry .="(level_id,cat_id,subj_id,topic_id,vid_id,page_title,page_description)" ;
			$vidmeta_qry .="VALUES ('$levelid','$catid','$subid','$vidtopic','$last_vid_id','$engtitle','$pagedescription')";
			$fire_vidmeta_qry = mysqli_query($dbcon,$vidmeta_qry) or die('can not insert data into video meta table') ;
			if($fire_vidmeta_qry){
				"<script>alert('1 video added successfully');</script>";
			}
		}
	}
	
?>
 
    <title>vishAcademy | manage header </title>
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
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                       <span class="badge bg-important" style="font-size:14px;"><i class="fa fa-play-circle"></i> <?php echo $subjid ?> Video management</span>                       
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                            <a href="#topic_modal" style="color:#fff;" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Add Topic</a>
                             <a href="#video_modal" style="color:#fff;" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Add Video</a>                             
                         </span>
                    </header>
                    <div class="panel-body">
                   	   <div class="dd" id="nestable">
                           <ol class="dd-list topic"> 
                           		<?php
                                	// Selecting Topic belongs to this playlist
									$seltopic = "SELECT * FROM vish_topics WHERE subj_id='$subid'";
									$firetopic= mysqli_query($dbcon,$seltopic) or die('can not fetch topics');																											
									
								?>
                                <!----Topic List---->
                               <?php while($gettopic = mysqli_fetch_assoc($firetopic)){ ?>
                               		<?php $topicid = $gettopic['topic_id']; ?>		
                               	                                                                   
                                    <li class="dd-item" data-id="1">
                                        <div class="dd-handle topic"><?php echo $gettopic['topic_name']; ?> </div>
                                        <div class="pull-right icover videditor">
                                            <a href="crud/manipulator.php?subj=<?php echo urlencode($subjid) ?>&tpcid=<?php echo $gettopic['topic_id']; ?>" title="Edit" class="badge bg-warning"><i class="fa fa-pencil"></i></a>
                                            <a href="crud/trash.php?subj=<?php echo urlencode($subjid) ?>&tpcid=<?php echo $gettopic['topic_id']; ?>" title="Delete" class="badge bg-important"><i class="fa fa-trash-o"></i></a>
                                            <a href="#" title="status" class="badge <?php if($gettopic['topic_status']==1) { echo 'bg-success';} 
									else { echo 'bg-default'; }?>">
                                              <i class="fa fa-power-off"></i>
                                            </a>
                                        </div>          
                                        <!----Video List---->                          	
                                        <ol class="dd-list">
                                        	<?php 
											$selvid = "SELECT * FROM vish_videodata WHERE topic_id='$topicid'";
											$firevid = mysqli_query($dbcon,$selvid);
											while ($getvid = mysqli_fetch_assoc($firevid)){
											?>                                            
                                            <li class="dd-item" data-id="1">
                                            <div class="dd-handle topic"><?php echo $getvid['vid_Ename']; ?> </div>
                                            <div class="pull-right icover videditor">
                                                <a href="crud/manipulator.php?subj=<?php echo urlencode($subjid) ?>&vidid=<?php echo $getvid['vid_id']; ?>" title="Edit" class="badge bg-warning"><i class="fa fa-pencil"></i></a>
                                                <a href="crud/trash.php?subj=<?php echo urlencode($subjid) ?>&vidid=<?php echo $getvid['vid_id']; ?>" title="Delete" class="badge bg-important"><i class="fa fa-trash-o"></i></a>
                                                <a href="#" title="status" class="badge bg-primary">
                                                    <i class="fa fa-power-off"></i>
                                                </a>
                                            </div>
                                        </li>     
                                        	<?php } ?>                                       
                                        </ol>
                                </li>  
                                <?php } ?>                                  
                            </ol>                              
                       </div>                    	
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
<!--ADD TOPIC MODAL-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="topic_modal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button"><i class="fa fa-times-circle"></i></button>
                                        <h4 class="modal-title"><i class="fa fa-plus-square"></i> Add new Topic in this playlist </h4>
                                    </div>
                                    <div class="modal-body">

                                        <form role="form" name="add_new_menu" id="add_new_manu" method="post" action="<?php // echo $_SERVER['PHP_SELF'].'?send' ?>">
                                        
                                        	<p class="text-primary">  
                                            	You are going to add topic in » <b><?php echo $fetchlvl['level_name'] ?></b> » <b><?php echo $fetchcat['cat_name'] ?></b> » <b><?php echo $fetchsubj['subj_name'].' playlist' ?></b>
                                            </p>
                                            <div class="form-group">
                                                <label for="topic_name">Topic Name</label>
                                                <input type="text" class="form-control error" name="topic_name" id="cname" placeholder="new topic name" minlength="2" value="" />                                              
                                            </div>                                            
                                            <div class="form-group">
                                                <label for="new_menu_url"></label>
                                                <input type="checkbox" name="topic_active" id="label-switch" class="switch-small" checked data-on-label="Active" data-off-label="NO" value="1">
                                            </div>
                                            <button type="submit" name="add_topic" id="add_topic" class="btn btn-primary"><i class="fa fa-plus"></i> Add Topic</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                
<!--ADD VIDEO MODAL-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="video_modal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button"><i class="fa fa-times-circle"></i></button>
                                        <h4 class="modal-title"><i class="fa fa-plus-square"></i> Add new VIDEO in this playlist </h4>
                                    </div>
                                    <div class="modal-body">                                                         	
                            <form name="addvid_form" id="addvid_form" enctype="multipart/form-data" class="form-horizontal" method="post" action="">  
                              		<div class="form-group">                                        
                                        <label class="col-lg-3 control-label">choose topic</label>
                                        <div class="col-lg-8">
                                         <select name="topic_id" id="topic_id" class="form-control m-bot15">
                                        <?php 
											// Selecting already exist topics from topic table
											$selalltopic = "select * from vish_topics WHERE subj_id='$subid'";
											$firealltopic = mysqli_query($dbcon,$selalltopic);																																	
											while($topicrow = mysqli_fetch_assoc($firealltopic)){	?>
                                         	<option name="<?php echo $topicrow['topic_id'] ?>" value="<?php echo $topicrow['topic_id'] ?>" ><?php echo $topicrow['topic_name'] ?></option>
                                            <?php }?>
                                         </select>                                         
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Eng title</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="entitle" id="entitle" class="form-control" placeholder="English title of new video">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Hin title</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="hintitle" id="hintitle" class="form-control" placeholder="Hindi title of new video">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Youtube</label>
                                        <div class="col-lg-8">
                                            <input type="text"  name="yturl" id="yturl" class="form-control" placeholder="8xEssIHsBHk Youtube URL of new video">
                                        </div>
                                    </div>                       
                              		<div class="form-group">
                                        <label class="col-lg-3 control-label">Page Description</label>
                                        <div class="col-lg-8">
                                           <textarea name="page_description" class="form-control" rows="6"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                                <label for="new_menu_url"></label>
                                                <input type="checkbox" name="video_active" id="label-switch" class="switch-small" checked data-on-label="Active" data-off-label="NO" value="1">
                                            </div>
                                    <div class="form-group">
                                    	<div class="col-lg-8">
                                          <button id="add_video" class="btn btn-primary" name="add_video" type="submit"><i class="fa fa-plus"></i> Add video</button>
                                        </div>	
                                    </div>                                                           
                             
                        	
                        </form> <!--=-=-=ADD VIdeo form ends here-=-=-=--->
                    </div>
                </div>
            </div>
        </div>
        
<!--ADD META INFO MODAL-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="meta_modal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button"><i class="fa fa-times-circle"></i></button>
                                        <h4 class="modal-title"><i class="fa fa-plus-square"></i> Create / edit page with SEO informtation </h4>
                                    </div>
                                    <div class="modal-body">                                                         	
                            <form name="addvid_form" id="addvid_form" enctype="multipart/form-data" class="form-horizontal" method="post" action="">       
                          
                            <h2>General</h2>
                            
                              		<div class="form-group">                                        
                                        <label class="col-lg-3 control-label">choose Video</label>
                                        <div class="col-lg-8">
                                         <select name="vid_id" id="vid_id" class="form-control m-bot15">
                                         <?php 
											// Selecting already exist topics from topic table
											$selalltopic = "select * from vish_topics WHERE subj_id='$subid'";
											$firealltopic = mysqli_query($dbcon,$selalltopic);																																	
											while($topicrow = mysqli_fetch_assoc($firealltopic)){	
											$vidtopicid = $topicrow['topic_id'];										
										?>                                           
                                        <optgroup label="<?php echo $topicrow['topic_name']; ?>" class="text-primary"> 
                                        	 <?php 
											// Selecting already exist topics from topic table
											$selallvideos = "select * from vish_videodata WHERE subj_id='$subid' AND topic_id='$vidtopicid' ORDER BY topic_id";
											$fireallvideos = mysqli_query($dbcon,$selallvideos) or die('can not select videos');																																	
											while($videorow = mysqli_fetch_assoc($fireallvideos)){											
											?>
                                         	<option name="<?php echo $videorow['vid_id'] ?>" value="<?php echo $videorow['vid_id'] ?>" class="text-muted"><?php echo $videorow['vid_Ename'] ?></option>
                                            <?php }?>
                                            </optgroup>
                                       <?php } ?>
                                         </select>                                         
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Page Description</label>
                                        <div class="col-lg-8">
                                           <textarea class="form-control" rows="6"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Hin title</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="hintitle" id="hintitle" class="form-control" placeholder="Hindi title of new video">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Youtube</label>
                                        <div class="col-lg-8">
                                            <input type="text"  name="yturl" id="yturl" class="form-control" placeholder="8xEssIHsBHk Youtube URL of new video">
                                        </div>
                                    </div>
                                                        	                                    
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Subject Name</label>
                                        <div class="col-lg-8">
                                            <input name="dsqs_url" id="dsqs_url" type="text" class="form-control" placeholder="Discuss link of this subject">
                                         </div>
                                     </div>                              
                              	
                                    <div class="form-group">
                                                <label for="new_menu_url"></label>
                                                <input type="checkbox" name="video_active" id="label-switch" class="switch-small" checked data-on-label="Active" data-off-label="NO" value="1">
                                            </div>
                                    <div class="form-group">
                                    	<div class="col-lg-8">
                                          <button id="add_video" class="btn btn-primary" name="add_video" type="submit"><i class="fa fa-plus"></i> Add video</button>
                                        </div>	
                                    </div>                                                           
                             
                        	
                        </form> <!--=-=-=ADD VIdeo form ends here-=-=-=--->
                    </div>
                </div>
            </div>
        </div>

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
<!--nestable list-->
<script src="assets/js/nestable/jquery.nestable.js"></script>
<script src="assets/js/nestable.js"></script>
<!----Form step---->
<script src="assets/js/jquery-steps/jquery.steps.js"></script>
<script src="assets/ckeditor/ckeditor.js"></script>
<script>
    $(function ()
    {
        $("#wizard").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "slideLeft"
        });

        $("#wizard-vertical").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            stepsOrientation: "vertical"
        });
    });
</script>
<script>
	
CKEDITOR.replace( 'editor1', {
	extraPlugins: 'codesnippet',
	codeSnippet_theme: 'monokai_sublime'
} );
</script>
<script>
$('#nestable').nestable({
    });
    $('#nestable').nestable('collapseAll');
</script>
</body>
</html>
