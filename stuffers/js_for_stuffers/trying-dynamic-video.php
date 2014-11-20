<?php require_once '../../inc_/functions.php'; ?>
<?php require_once '../../inc_/_dbconnector.php'; ?>
<?php
$url = $_SERVER['PHP_SELF'];
$url = trim($url, '/');
$pagename = substr($url, strrpos($url, '/')+1);
$selvid = "SELECT * FROM vish_videodata WHERE vid_pageurl='$pagename' AND vid_status='1'";
$fire_selvid = mysqli_query($dbcon,$selvid);
$get_vid = mysqli_fetch_assoc($fire_selvid);
$subjid = $get_vid['subj_id'];
$levelid = $get_vid['level_id'];
$videoid = $get_vid['vid_id'];
// fetching current subject name
$selsubj = "SELECT * FROM vish_subjects WHERE subj_id='$subjid'";
$fire_selsubj = mysqli_query($dbcon,$selsubj);
$get_subj = mysqli_fetch_assoc($fire_selsubj);
$subjname = $get_subj['subj_name'];
$subjtitle = $get_subj['subj_title'];
// fetching current level name
$sellvl = "SELECT * FROM vish_levels WHERE level_id='$levelid'";
$fire_sellvl = mysqli_query($dbcon,$sellvl);
$get_lvl = mysqli_fetch_assoc($fire_sellvl);
$levelname = $get_lvl['level_name'];
// Selecting META Information for videos
$selmeta = "SELECT * FROM vish_videometa WHERE vid_id='$videoid'";
$fire_selmeta = mysqli_query($dbcon,$selmeta) or die("can not select meta data from videos");;
$get_meta = mysqli_fetch_assoc($fire_selmeta);
// Fetching previous video data
$selprevid = "SELECT * FROM vish_videodata WHERE vid_id<'$videoid' AND subj_id='$subjid' ORDER BY vid_id DESC LIMIT 1";
$fire_selprevid = mysqli_query($dbcon,$selprevid);
$previd = mysqli_fetch_assoc($fire_selprevid);
if($previd){
$previdurl = $previd['vid_pageurl'];
}else {
$previdurl = '#';
}
// Fetching Next video data
$selnextvid = "SELECT * FROM vish_videodata WHERE vid_id>'$videoid' AND subj_id='$subjid' ORDER BY vid_id LIMIT 1";
$fire_nextvid = mysqli_query($dbcon,$selnextvid) or die('can not select next video.');
$nextvid = mysqli_fetch_assoc($fire_nextvid);
if($nextvid){
$nextvidurl = $nextvid['vid_pageurl'];
}else {
$nextvidurl = '#';
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $get_meta['page_title'].' | vishAcademy';?></title>
<meta name="Description" content="<?php echo $get_meta['page_description'];?>" />
<meta property="og:title" content="<?php echo $get_meta['page_title'];?>" />
<meta property="og:type" content="website" />
<meta property="og:description" content="<?php echo $get_meta['page_description'];?>" />
<meta property="og:image" content="thumbnail_image" />
<meta property="og:url" content="<?php echo $_SERVER['PHP_SELF'];?>" />
<link rel="author" href="https://plus.google.com/117511589032708005943"/>
<!---->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<style>
body { padding-top: 50px; }

/*#####################
Additional Styles (required)
######################*/

.carousel-inner .item img {
	width:100%;
	height:100%;
}
.item .thumbnail {
	margin-bottom:0;
}
.carousel-control.left, .carousel-control.right {
	background-image:none !important;
}
.carousel-control {
	background:	#39b3d7;
	color:#fff;
	padding: 4px 0;
	width:26px;
	top:auto;	
	left:auto;
	bottom:8px;
	opacity:1;
	text-shadow:none;
}
.carousel-control.right {
	right:10px;
}

.carousel-control.left {
	right: 40px;
}
</style>
<?php #css and js files >>
include_once '../../inc_/va_files.php'; ?>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src="//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1436564063228333&version=v2.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php #header
include_once '../../inc_/header.php';?>
<!---playlist----->
<div id="sidr">
<span style="float:right;"><a class="sidrman" href="#" style="color:#CE5037 ;"><i class="fa fa-times-circle fa-2x"></i></a></span>
<div id="accord_box">
<div class="libbox">
<!--Video history box-->
<div class="accordian">
<ul class="gallery clearfix">
<?php
$seltpc = "SELECT * FROM vish_topics WHERE subj_id='$subjid' AND topic_status='1' ORDER BY topic_id";
$fire_seltpc = mysqli_query($dbcon,$seltpc);
while($get_tpc = mysqli_fetch_assoc($fire_seltpc)){
$topic_id = $get_tpc['topic_id'];
?>
<li><?php echo $get_tpc['topic_name']; ?></li>
<li>
<?php $sel_thisvid = "SELECT * FROM vish_videodata WHERE topic_id='$topic_id' AND vid_status='1'";
$fire_sel_thisvid = mysqli_query($dbcon,$sel_thisvid);
while($get_thisvid = mysqli_fetch_assoc($fire_sel_thisvid)){
$url_thisvid = SITE_PATH.$levelname."/".$subjname."/".$get_thisvid['vid_pageurl'];
?>
<p class="vidtitle_en iframe" >
<a href="<?php echo $url_thisvid; ?>" data-tooltip="<?php echo $get_thisvid['vid_Hname'] ?>"> » <?php echo $get_thisvid['vid_Ename']; ?> </a>
</p>
<?php } ?>
</li>
<?php } ?>
</ul>
<?php // <<<< accordian wrapper ends here-?>
</div>
</div> <!--Libbox ends here-->
</div>
</div>
<!----// playlist ends here----->
<div id="wrapper">

<div class="blacky">
<div class="cmn-cntnr">
<div class="vidbx">
<div class="video">
<?php if($get_vid['vid_YTurl'] == null || $get_vid['vid_YTurl'] == '' || $get_vid['vid_YTurl'] == 'something' || $get_vid['vid_YTurl'] == 'No video') { ?>
		<img src="<?php echo SITE_PATH ?>assets/images/video404.jpg">	
<?php } else {?>

<iframe src="http://www.youtube.com/embed/<?php echo $get_vid['vid_YTurl'] ?>?autoplay=0" frameborder="0" allowfullscreen ></iframe>
<?php } ?>
</div>
</div>
<div class="video_ad">
<img src="<?php echo SITE_PATH ?>assets/images/tile_12.png">
<!--<br /><span class="adtag">Advertisement</span>-->
</div>
</div>
</div>
<div class="video_navs">
<div class="cmn-cntnr">
<ul>
<li><a id="playlist-btn" href="#" style="color:#CE5037;"><i class="fa fa-list fa-lg"></i><span class="vidnav_lbl">Playlist</span></a></li><!--
--><li><a <?php
if($previdurl !== '#'){?>
href="<?php echo $previdurl; } ?>"
<?php if($previdurl =='#'){?> class="disableicon" <?php ;}?>><i class="fa fa-backward fa-lg"></i><span class="vidnav_lbl">Previous</span></a></li><!--
--><li><a href="#"><i class="fa fa-download fa-lg"></i><span class="vidnav_lbl">Source files</span></a></li><!--
--><!--<li><a href="#"><i class="fa fa-comments fa-lg"></i><span class="vidnav_lbl">Discuss it</span></a></li><!--
--><li>
<a id="facebookbtn-link" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http:/<?php echo $_SERVER['PHP_SELF']; ?>">
<i class="fa fa-facebook-square fa-lg"></i><span class="vidnav_lbl">Share on facebook</span></a></li><!--
--><li><a href="http://www.twitter.com/share?text=Just I found a very helpful video tutorial on #vishAcademy Watch it..."><i class="fa fa-twitter-square fa-lg"></i><span class="vidnav_lbl">Share on twitter</span></a></li><!--
--><li><a target="_blank" href="https://plus.google.com/share?url=http:/<?php echo $_SERVER['PHP_SELF']; ?>"><i class="fa fa-google-plus-square fa-lg"></i><span class="vidnav_lbl">Share on G.plus</span></a></li><!--
--><li><a <?php
if($nextvidurl !='#'){?>
href="<?php echo $nextvidurl; } ?>"
<?php if($nextvidurl =='#'){?> class="disableicon" <?php ;}?>><i class="fa fa-forward fa-lg"></i><span class="vidnav_lbl">Next</span></a></li>
</ul>
</div>
</div>
<div class="cmn-cntnr">
<div class="left-content">
<h1 class="water">// <?php echo $subjtitle ?></h1>
<h2 class="title">// <?php echo $get_vid['vid_Ename']; ?></h2>
<div id="text-content">
<?php echo $get_vid['vid_desc1']; ?>
</div>
<div class="ad_bnr728">
<img src="<?php echo SITE_PATH ?>assets/images/728x90.jpg" />
</div>
<div class="fb-comments-bx">
<div class="fb-comments" data-href="http://www.vishacademy.com" data-width="100%" data-num-posts="10"></div>
</div>
</div>
<!---right content----->
<div class="rightcontent">
<h4>Related tutorials...</h4>
<div class="box3x3">
<div class="box50"><a href="#"><img src="http://placehold.it/155x140/ff6600/fff" /></a></div>
<div class="box50"><a href="#"><img src="http://placehold.it/155x140" /></a></div>
<div class="box50"><a href="#"><img src="http://placehold.it/155x140" /></a></div>
<div class="box50"><a href="#"><img src="http://placehold.it/155x140" /></a></div>
           
<div class="allink"><a href="tile.php" class="lnk-normal">Browse all tutorials...</a></div>
</div>
<div class="tile_ad300">
<img src="<?php echo SITE_PATH ?>assets/images/tile_12.png" />
</div>
<div class="tile_ad300 fblikebx">
<div class="fb-like-box" data-href="https://www.facebook.com/vishAcademy" data-width="300" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true"></div>
</div>
</div>
</div>
</div>
<!--footer-->
<?php include_once '../../inc_/footer.php';?>
</div>
</body>
</html>