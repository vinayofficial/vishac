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

<?php
		//Update Inline editable values in table
		// timezone declaration
		date_default_timezone_set("Asia/Kolkata");
		//
		if(isset($_POST['newval']) && isset($_POST['field']) && isset($_POST['tblname']) && isset($_POST['id_val'])){						
			$newval = trim($_POST['newval']);
			$field = trim($_POST['field']);
			$tblname = trim($_POST['tblname']);
			$id_val = trim($_POST['id_val']);
			$id = trim($_POST['id_fld']);
			$date = trim($_POST['date_fld']);
			//echo $id." : ".$id_val;
			$update = renew_data("$tblname","$field='$newval',$date=now()","$id='$id_val'") or die('can not update data');
			if($update){
				echo "data updated successfully";
			} else{
				die(mysqli_error($dbcon));
			}
		}	
?>