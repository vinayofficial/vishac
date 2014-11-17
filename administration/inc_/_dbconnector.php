<?php	
	check_login();
	define('DB_SERVER','localhost');
	define('DB_USER','root');
	define('DB_PASSKEY','');
	define('DB_NAME','visharzq_vishac');		
	$dbcon = mysqli_connect(DB_SERVER,DB_USER,DB_PASSKEY,DB_NAME);	
	if(!$dbcon){
		echo 'CONNECTION FAILED to database named '.DB_NAME;}
	//UTF-8 QUERIES
	mysqli_query($dbcon,'SET character_set_results=utf8');       
	mysqli_query($dbcon,'SET names=utf8');       
	mysqli_query($dbcon,'SET character_set_client=utf8');       
	mysqli_query($dbcon,'SET character_set_connection=utf8');
	mysqli_query($dbcon,'SET collation_connection=utf8_general_ci');
	
	// Default Site path
	$fullurl = $_SERVER['HTTP_HOST'].'/vishac/';
	define("SITE_PATH",$fullurl,TRUE);
	
?>
