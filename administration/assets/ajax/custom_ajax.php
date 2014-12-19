<?php 
	require_once '../../inc_/_dbconnector.php';
	require_once '../../inc_/functions.php';
	if(isset($_POST['level']) && isset($_POST['cat'])){
		$levelid = $_POST['level'];		
		$catid = $_POST['cat'];
		$query = pull_data("vish_subjects","level_id='$levelid' AND cat_id='$catid' AND cmnt_plugin='0'");
		$row = mysqli_num_rows($query);							
		while($rslt = mysqli_fetch_assoc($query)){
			echo '<option value="'.$rslt['subj_id'].'">'.$rslt['subj_name'].'</option>';
		}
	}
?>