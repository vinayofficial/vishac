<?php
	//include_once '../../inc_/_dbconnector.php';
	include_once '../../inc_/functions.php';
	//----------Alert form	
	$error = null;
	if(isset($_POST['name']) && isset($_POST['email'])){
		$altmail = mysqli_real_escape_string($dbcon,trim($_POST['email']));
		$altname = mysqli_real_escape_string($dbcon,trim($_POST['name']));
			if($altmail != '' && $altname != ''){
				$push = push_data("subscribers","sbc_name,sbc_email,sbc_joindate","'$altname','$altmail',NOW()");		
				if($push){
					echo "Thank you for joining us :)";
					//header("location: ".$_SERVER['PHP_SELF']);							
			}	
		}				
	}
?>
