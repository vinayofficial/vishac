 
<?php	
	include '_dbconnector.php';
	// timezone declaration
	date_default_timezone_set("Asia/Kolkata");
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
		//echo $myquery;		
		$query_fire = mysqli_query($dbcon,$myquery) or die('can not fire this query. check either function or given table information');
		
		if ($query_fire){
			//do something
		}
		//echo $myquery;
		return $query_fire;
	}
/***********************Admin functions***********************************/
//----------------------------------- Insert data function
		
	function push_data($tablename,$fields=null,$values=null){
		global $dbcon;
		if($fields != null){
			$fields = "(".$fields.")";
		}
		$Inserter = "INSERT INTO ".$tablename.$fields." VALUES (".$values.")";			
		
		$pushfire = mysqli_query($dbcon,$Inserter) or die("<br /> can not push data. please check provided informations !!". mysqli_error($dbcon));		
		
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
		//echo $selector; die;
		
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
//----------------------- Send secure data
	function protect_it($data){
		 $protected = trim(htmlentities(strip_tags($data)));
		 return $protected;
	}
//----------------------- Fetch Widget and Adsense code
	function get_ad($ad_name){
		$get_ad = pull_data("manage_widgets","wdgt_name='$ad_name' AND wdgt_status='1'");				
		$near_vid_ad = mysqli_fetch_assoc($get_ad);
		$adsense = $near_vid_ad['wdgt_code'];
		return $adsense;
	}
?>
				
<?php

// CLASS FOR CONVERTING TIME TO AGO
class convertToAgo {

    function convert_datetime($str) {
	
   		list($date, $time) = explode(' ', $str);
    	list($year, $month, $day) = explode('-', $date);
    	list($hour, $minute, $second) = explode(':', $time);
    	$timestamp = mktime($hour, $minute, $second, $month, $day, $year);
    	return $timestamp;
    }

    function makeAgo($timestamp){
	
   		$difference = time() - $timestamp;
   		$periods = array("sec", "min", "hr", "day", "week", "month", "year", "decade");
   		$lengths = array("60","60","24","7","4.35","12","10");
   		for($j = 0; $difference >= $lengths[$j]; $j++)
   			$difference /= $lengths[$j];
   			$difference = round($difference);
   		if($difference != 1) $periods[$j].= "s";
   			$text = "$difference $periods[$j] ago";
   			return $text;
    }
	
} // END CLASS
////////////phpdevtips Time ago function
function time_ago( $date )
{
    if( empty( $date ) )
    {
        return "No date provided";
    }

    $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");

    $lengths = array("60","60","24","7","4.35","12","10");

    $now = time();

    $unix_date = strtotime( $date );

    // check validity of date

    if( empty( $unix_date ) )
    {
        return "Bad date";
    }

    // is it future date or past date

    if( $now > $unix_date )
    {
        $difference = $now - $unix_date;
        $tense = "ago";
    }
    else
    {
        $difference = $unix_date - $now;
        $tense = "from now";
    }

    for( $j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++ )
    {
        $difference /= $lengths[$j];
    }

    $difference = round( $difference );

    if( $difference != 1 )
    {
        $periods[$j].= "s";
    }

    return "$difference $periods[$j] {$tense}";

}
?>