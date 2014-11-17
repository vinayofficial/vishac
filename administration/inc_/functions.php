<?php	
	// Constant Declarations	
	define('ADMIN_BASEURL','http://localhost/vishacademy.com/administration/');
	define('USER_BASEURL','http://localhost/vishacademy.com/');
	

//----------------------------------- Insert data function
		
	function push_data($tablename,$fields=null,$values=null){
		global $dbcon;
		if($fields != null){
			$fields = "(".$fields.")";
		}
		$Inserter = "INSERT INTO ".$tablename.$fields." VALUES (".$values.")";			
		
		$pushfire = mysqli_query($dbcon,$Inserter) or die("can not push data. please check provided informations !!");		
		
		return $pushfire;
	}
	
//---------------------------------- select and fetch data function
	
	function pull_data($tablename,$condition=null,$sort=null,$limit=null){
		global $dbcon;
		
		//General Query	
		$selector = "SELECT * FROM ".$tablename;
		
		// If condition is given
		if($condition != null) {		
		 	$selector .= " WHERE ".$condition;
		}
		
		// If Sorting is given
		if($sort != null) {		
		 	$selector .= " ORDER BY ".$sort;
		}
		
		// If Limit is given
		if($limit != null) {		
		 	$selector .= " LIMIT ".$limit;
		}
		
		//CONFUSED !!! ECHO THIS QUERY 
		//echo $selector;
		
		$pulldata = mysqli_query($dbcon,$selector) or die("can not pull data. check provided information");
		
		return $pulldata;
	}
	
// ----------------------------------DELETE DATA
	
	function trash_data($tablename=null, $condition=null){
		global $dbcon;
		
		$trash = "DELETE FROM ".$tablename;
		
		if($condition != null){
		 $trash .= " WHERE ".$condition;
		}		
		$trasher = mysqli_query($dbcon,$trash) or die("can not delete this data. check information");		
		
		
		return $trasher;	
	}
//------------------------ check user login
	function check_login() {
	session_start();	
	if(isset($_SESSION['user']) == false){
		header('location: login.php');
	}
	}
?>