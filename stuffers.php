<?php require_once 'inc_/_dbconnector.php'; ?>
<?php include_once 'inc_/functions.php'; ?>
<?php
	$slquery = "SELECT * FROM vish_levels WHERE level_name='Stuffers'";
	$frquery = mysqli_query($dbcon,$slquery);
	$fetch = mysqli_fetch_assoc($frquery);
	 $levelid = $fetch['level_id'];
	 $levelname = $fetch['level_name'];	
?>
<?php
	// fetching header nav
	$nav_select = "select * from header_nav WHERE nav_name='$levelname'";
	$nav_query = mysqli_query($dbcon,$nav_select);
	$get_seo = mysqli_fetch_assoc($nav_query) or die ('can not fetch SEO informations');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="Description" CONTENT="<?php echo $get_seo['page_metadesc']; ?>">
<title><?php echo $get_seo['page_metatitle']; ?></title>
<meta name="robots" content="index,follow">
<?php #css and js files >> 
include_once 'inc_/va_files.php'; ?>
</head>
<body>	
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1436564063228333&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <?php #header
	include_once 'inc_/header.php';?>
    <div id="wrapper">
    	<div class="cmn-cntnr">
        	<div class="megah-bx">
        		<h1>// <?php echo $fetch['level_name'];	?></h1>
                <span>// <?php echo $fetch['level_tagline']; ?></span>
            </div>
            	<!--tile 01-->
             <div class="left-content">
                <ul id="subtile">	
                	<?php // selecting beginnners subjects 
						$selsubj = "SELECT * FROM vish_subjects WHERE level_id = '$levelid' AND subj_status='1'";
						$fire_selsubj = mysqli_query($dbcon,$selsubj) or die('can not select subjects');
						while($get_subj = mysqli_fetch_assoc($fire_selsubj)){
							$catid = $get_subj['cat_id'];
							$subjid =$get_subj['subj_id'];
							$explode_subjname = explode(" ",$get_subj['subj_name']);
							$subjname = implode("_",$explode_subjname);
							// course redirection url
							$course_path = USER_BASEURL.$levelname.'/'.$subjname.'.php';
					?>
                	<li>
                    	<div class="tile_img">
                        	<img src="administration/<?php echo $get_subj['subj_logo_url']; ?>" alt="<?php $get_subj['subj_name'] ?>" />
                            <div class="tile_over">
                            	<!--<p><a href="video.php">Make a responsive website from scratch to end within an hour</a></p>-->
                            </div>
                        </div>
                        <?php //fetching videos of this subject
							$selvid = "SELECT * FROM vish_videodata WHERE subj_id='$subjid'";
							$fire_selvid = mysqli_query($dbcon,$selvid);
							$get_vid = mysqli_fetch_assoc($fire_selvid);
							$vidpage_path = strtolower($levelname."/".$subjname."/".$get_vid['vid_pageurl']);
						 ?>
                         <div class="tile_subject"> <a href="<?php echo $vidpage_path ;?>"><?php echo $get_subj['subj_name'] ?></a></div>
                         	<?php 
							// fetching catagory name 
							$selcat = "SELECT * FROM vish_cats WHERE cat_id = '$catid'";
							$fire_selcat = mysqli_query($dbcon,$selcat);
							$get_cat = mysqli_fetch_assoc($fire_selcat);
							?>
                        <div class="tile_cat"> // <?php echo $get_cat['cat_name'] ?></div>
                        <div class="tile_ago"><?php echo $get_vid['vid_pageurl']; ?> </div>                                                
                    </li>
                    <?php } ?>                    
                   <?php /* HTML BACKUP  <li>
                    	<div class="tile_img">
                        	<img src="assets/images/tile_36.png" alt="HTML4" />
                            <div class="tile_over">                            	
                            </div>
                        </div>
                        <div class="tile_cat"> // Web Design</div>
                        <div class="tile_ago">// 5 days ago</div>                                                
                    </li> */ ?>
                </ul>                
            </div>
            <div class="rightcontent">          
                <div class="tile_ad300">	
                    <img src="assets/images/tile_12.png" />
                </div>
                 <div class="tile_ad300">
               	 <div class="fb-like-box" data-href="https://www.facebook.com/vishAcademy" data-width="300" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true"></div>
                </div>
            </div>
        </div>
    </div>
     <!--wrapper ends here-->
    <!--footer-->
    <?php include_once 'inc_/footer.php';?>
</body>
</html>