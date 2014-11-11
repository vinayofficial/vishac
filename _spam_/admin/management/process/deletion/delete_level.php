<?php
	//connection
	include_once '../../db_docs/db_con.php';
	//Deletion
	if(isset($_GET['del'])){
		$delid = $_GET['del'];
		$query = "DELETE FROM va_levels WHERE level_id = $delid";
		$del = mysqli_query($con,$query);
		if(!$del){
			echo mysql_error();
		}
		else{
			header('location: ../../va_cat.php');
		}
	}
?>