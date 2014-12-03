<?php
	//include_once '../../inc_/_dbconnector.php';
	include_once '../../inc_/functions.php';
	//---------------------//
	//----------Alert form-//	
	//---------------------//
	$error = null;
	if(isset($_POST['name']) && isset($_POST['email'])){
		// check their values
		$altmail = mysqli_real_escape_string($dbcon,trim($_POST['email'])); 
		$altname = mysqli_real_escape_string($dbcon,trim($_POST['name']));
			$checkmail = pull_data("subscribers","sbc_email = '$altmail'");
			if(mysqli_num_rows($checkmail) == 0){
				//submit form
				if($altmail != '' && $altname != ''){
				$push = push_data("subscribers","sbc_name,sbc_email,sbc_joindate","'$altname','$altmail',NOW()");
				if($push){
					echo "
					<h3>
						<i class='fa fa-bell fa-2x'></i>
						Thank you for joining us :)
					<h3>
					<p>
						We will get in touch very soon !!
					</p>";
					//header("location: ".$_SERVER['PHP_SELF']);							
			}else{
				echo "<i class='fa fa-warning fa-2x'></i> Valid inputs are required dear :/ ";}	
		}		
				
			} else{
				// already a subscriber
				echo 'dont worry, you are alreadt a subscriber';
			}		
		}
	
	//---------------------//
	//---user message form-//	
	//---------------------//
	
	if(isset($_POST['msgbody'])){		
		trim($_POST['msgbody']);
		if(empty($_POST['msgbody'])== false){
			if(empty($_POST['msgby'])== false){
				if(empty($_POST['msgfrom'])== false){
					$msgname = protect_it($_POST['msgby']);
					$msgusing = mysqli_real_escape_string($dbcon,protect_it($_POST['msgusing']));
					$msgfrom = mysqli_real_escape_string($dbcon,protect_it($_POST['msgfrom']));		
					$msgbody = mysqli_real_escape_string($dbcon,protect_it($_POST['msgbody']));
					$messagesent = push_data("usermsg",null,"null,'$msgname','$msgusing','$msgfrom','$msgbody',NOW(),0");
					if($messagesent){
						echo 'Yo !!! You sent a message';
					}
				}{echo ' must have any facebook / twitter / google id !! didn\'t send anything';}				
			}else{echo 'didn\' wrote your name ? didn\'t send anything';}						
		}else{echo 'its a empty message :/ didn\'t send anything';}
				
	}
?>
