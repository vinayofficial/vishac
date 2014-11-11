<?php	
	include '_dbconnector.php';
	// Constant Declarations	
	define('ADMIN_BASEURL','http://localhost/vishacademy.com/administration/');
	define('USER_BASEURL','http://localhost/vishacademy.com/');	
	
	function data_selector($tablename=null,$cond=null,$sort=null,$limit=null){
		global $dbcon;
		global $cond;
		global $sort;
		global $limit;
		$myquery = "SELECT * FROM vish_subjects WHERE level_id='1' ORDER BY ASC LIMIT 2";
		
		$query_fire = mysqli_query($dbcon,$myquery) or die('can not fire this query. check either function or given table information');
		
		if ($query_fire){
			// do something
		}
		return $query_fire;
	}
?>