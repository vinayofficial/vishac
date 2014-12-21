<?php
	include '../inc_/functions.php';
	include '../inc_/_dbconnector.php' ;
	check_login();
	// delete main header navigations / menus
	if(isset($_GET['delnav'])){
		$delnav = $_GET['delnav'];
		$delnav_qry = "DELETE FROM header_nav WHERE nav_id='$delnav'";
		$fire_delnav_qry = mysqli_query($dbcon,$delnav_qry);
		if(!$fire_delnav_qry){
			echo 'ERROR IN DELETION PROCESS';
		}
		else{
			header('Location:../basic_management/manage_header.php');
		}
	}
		
	// delete vishAcademy LEVELS from fundamental management
	if(isset($_GET['dellvl'])){
		$dellvl = $_GET['dellvl'];
		$dellvl_qry = "DELETE FROM vish_levels WHERE level_id='$dellvl'";
		$fire_dellvl_qry = mysqli_query($dbcon,$dellvl_qry);
		if(!$fire_dellvl_qry){
			echo 'ERROR IN DELETION PROCESS';
		}
		else{
			header('Location:../basic_management/manage_foundations.php');
		}
	}
	
	// delete vishAcademy CATAGORIES from fundamental management
	if(isset($_GET['delcat'])){
		$delcat = $_GET['delcat'];
		$delcat_qry = "DELETE FROM vish_cats WHERE cat_id='$delcat'";
		$fire_delcat_qry = mysqli_query($dbcon,$delcat_qry);
		if(!$fire_delcat_qry){
			echo 'ERROR IN DELETION PROCESS';
		}
		else{
			header('Location:../basic_management/manage_foundations.php');
		}
	}	
		
	// delete vishAcademy BEGINNER"S COURSE from fundamental management
	if(isset($_GET['bcrsid'])){
		$bcrsid = $_GET['bcrsid'];
		$selbcrs = "SELECT * FROM vish_subjects WHERE subj_id='$bcrsid'";
		$fire_selbcrs = mysqli_query($dbcon,$selbcrs);
		$bcrs = mysqli_fetch_assoc($fire_selbcrs);
		 $bcrsid_qry = "DELETE FROM vish_subjects WHERE subj_id='$bcrsid'";
		$fire_bcrsid_qry = mysqli_query($dbcon,$bcrsid_qry);
		if(!$fire_bcrsid_qry){
			echo 'ERROR IN DELETION PROCESS';
		}
		else{
			$image_path = $bcrs['subj_logo_url'];
			$page_path ='../'.$bcrs['subj_redirect_to'];
			unlink($image_path) or die('IMAGE file not deleted');
			unlink($page_path) or die('manage video page  of this subject not deleted');
			header('Location:../beginners.php');
		}
	}
	
	// delete vishAcademy's  Video TOPIX from any video page of courses
			// Getting subject id for redirection after deletion
		if(isset($_GET['subj'])){
			$subject_name= $_GET['subj'];
		}
		$selsub = "SELECT * FROM vish_subjects WHERE subj_name='$subject_name'";
		$firesubject = mysqli_query($dbcon,$selsub);
		$getsubject = mysqli_fetch_assoc($firesubject);
		$videopage_path = $getsubject['subj_redirect_to'].'?subj='.$getsubject['subj_name'];	
	if(isset($_GET['tpcid'])){
		$tpcid = $_GET['tpcid'];
		$deltpc_qry = "DELETE FROM vish_topics WHERE topic_id='$tpcid'";
		$fire_deltpc_qry = mysqli_query($dbcon,$deltpc_qry);
		if(!$fire_deltpc_qry){
			echo 'ERROR IN DELETION PROCESS';
		}
		else{
			 header('Location:../'.$videopage_path);			
		}
	}
	
	// delete vishAcademy's  Video from any video page of courses
			//This code is Getting subject id for redirection from topic deletion code
		
	if(isset($_GET['vidid'])){
		$vidid = $_GET['vidid'];
		$delmeta_qry = "DELETE FROM vish_videometa WHERE vid_id='$vidid'";
		$fire_delmeta_qry = mysqli_query($dbcon,$delmeta_qry);
		$delvid_qry = "DELETE FROM vish_videodata WHERE vid_id='$vidid'";
		$fire_delvid_qry = mysqli_query($dbcon,$delvid_qry);
		if(!$fire_delvid_qry){
			echo 'ERROR IN DELETION PROCESS';
		}
		else{
			 header('Location:../'.$videopage_path);			
		}
	}
?>