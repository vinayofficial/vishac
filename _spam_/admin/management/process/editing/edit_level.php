<?php
	include_once '../../db_docs/db_con.php';
	
	if(isset($_GET['edit'])){
		$lvl_id = $_GET['edit'];
		$lvl_slct = "SELECT * FROM va_levels WHERE level_id = $lvl_id";
		$lvl_fetch = mysqli_query($con,$lvl_slct);		
		if(!$lvl_fetch){
			echo 'ERROR in editing process';
		}
		$result = mysqli_fetch_assoc($lvl_fetch);		
	}	
			
	//updation
	
	if(isset($_POST['updatelevel'])){
		$newlevelname = $_POST['ulevelname'];
		$ulvl_query = "UPDATE va_levels SET level_name='$newlevelname' WHERE id= '$lvl_id' ";
		$lvl_fire = mysqli_query($con,$ulvl_query);
		if(!$lvl_fire){
			echo 'Error in new value insersion process';
		}
		else{
			header('location: ../../va_cat.php');
		}
	}
?>
<html>
	<head>
    	<title>Editing Process</title>        
    </head>
    <body>
    	<form name="editlevel" id="editlevel" method="post" action="">
        	<input type="text" name="ulevelname" id="ulevelname" value="<?php echo $result['level_name']; ?>" />
            <input type="hidden" name="levelid" id="levelid" value="<?php echo $result['level_id'] ?>">
            <input type="submit" name="updatelevel" id="updatelevel" value="update" />
        </form>        
    </body>
</html>