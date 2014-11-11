<?php	
	include '_dbconnector.php';
	// Constant Declarations	
	define('ADMIN_BASEURL','http://localhost/vishacademy.com/administration/');
	define('USER_BASEURL','http://localhost/vishacademy.com/');	
	
	function data_selector($tablename=null,$conds=null,$sort=null,$limit=null){
		global $dbcon;
		
		$myquery = "SELECT * FROM ".$tablename." ";
		
		if($conds != null){
			$myquery .= "WHERE ".$conds;
		}
		if($sort != null){
			$myquery .= " ORDER BY ".$sort;
		}
		if($limit != null){
			$myquery .= " ".$limit;
		}		
		$query_fire = mysqli_query($dbcon,$myquery) or die('can not fire this query. check either function or given table information');
		
		if ($query_fire){
			//do something
		}
		//echo $myquery;
		return $query_fire;
	}
?>