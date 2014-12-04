<?php
	//include_once '../../inc_/_dbconnector.php';
	include_once '../../inc_/functions.php';
	//---------------------//
	//----------Alert form-//	
	//---------------------//
	
	if(isset($_POST['name']) && isset($_POST['email'])){
		$altname = mysqli_real_escape_string($dbcon,protect_it($_POST['name']));
		$altmail = mysqli_real_escape_string($dbcon,protect_it($_POST['email']));
		if(empty($_POST['name'])==false){
			//check for valid email
			if (preg_match("/^[a-zA-Z ]*$/",$altname)) {							
				if(empty($_POST['email'])==false){
					if(filter_var($altmail, FILTER_VALIDATE_EMAIL)){
					//check uniqueness of email
					$mail_exist = pull_data("subscribers","sbc_email='$altmail'");
					if(mysqli_num_rows($mail_exist)==0){
						// unique email.. submit it
						$ip = $_SERVER['REMOTE_ADDR'];
						$submit = push_data("subscribers",null,"null,'$altname','$altmail',0,now(),'$ip',0") or die('can not submit values');
						if($submit){
							echo "Hurray !! You joined the alert list.";
						}else{ echo "Something went wrong dear :/ ";}
					}else{echo 'You are alredy a subscriber with us.Thank you :) ';}
				} else{echo "Naah !! Notta good email address. Type correctly";}
			}else{echo 'Email fields is empty';}
			}else{ echo "Invalid Name :/ Try Again";}
		}else{echo 'Name is empty';}
	}
	
	//---------------------//
	//---user message form-//	
	//---------------------//
	
	if(isset($_POST['msgby']) && isset($_POST['msgfrom']) && isset($_POST['msgbody']) ){		
		$msgr_name = mysqli_real_escape_string($dbcon,ucfirst(protect_it($_POST['msgby'])));
		$msgr_email = mysqli_real_escape_string($dbcon,protect_it($_POST['msgfrom']));		
		$msg_body = mysqli_real_escape_string($dbcon,protect_it($_POST['msgbody']));
		if(empty($msgr_name)==false ){
			if (preg_match("/^[a-zA-Z ]*$/",$msgr_name)) {				
				if(empty($msgr_email)==false){
					if(filter_var($msgr_email, FILTER_VALIDATE_EMAIL)){
						if(empty($msg_body)==false){
							$ip = $_SERVER['REMOTE_ADDR'];
							//Now we can send
							$sendmsg = push_data("usermsg",null,"null,'$msgr_name','$msgr_email','$msg_body',now(),'$ip',0") or die("Gotta error ->".mysqli_error($dbcon));
							if($sendmsg){
								echo "Thank you :) We will read your word and get in touch very soon";
							}
						}else{echo "Well, your message is blank";}
					}else{echo "Naah !!! Notta good email address :/ Try with valid email id";}
				}else{echo "Naah !! Email should not be empty or invalid :/ try again";}
			}else{echo "Seems like an <b>INVALID NAME</b> :/ try again";}
		}else{echo "Oops !! Fill all fields, then send :)";}
		
	}
?>
