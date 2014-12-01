<?php
// database file is include in functions.php
 require_once 'inc_/functions.php';
?>
<?php
	//----------Alert form
	$error = null;
	if(isset($_POST['altsend'])){
		$altmail = mysqli_real_escape_string($dbcon,trim($_POST['altmail']));
		$altname = mysqli_real_escape_string($dbcon,trim($_POST['altname']));
			if($altmail != '' && $altname != ''){
				$push = push_data("subscribers","sbc_name,sbc_email,sbc_joindate","'$altname','$altmail',NOW()");		
				if($push){
					echo "Success !!";
					header("location: ".$_SERVER['PHP_SELF']);	
						
			}	
		}		
		$error = "No field can be left blank !! ";
	}
?>

<?php
	//**--- Send a message
	if(isset($_POST['msgsender'])){
		$msgname = protect_it($_POST['msgname']);
		$msgusing = mysqli_real_escape_string($dbcon,protect_it($_POST['msgusing']));
		$msgfrom = mysqli_real_escape_string($dbcon,protect_it($_POST['msgfrom']));		
		$msgbody = mysqli_real_escape_string($dbcon,protect_it($_POST['msgbody']));
		$messagesent = push_data("usermsg",null,"null,'$msgusing','$msgfrom','$msgbody',NOW(),0");
		if($messagesent){
			echo '<script>alert(\'success\');</script>';
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Learn major an minor computer science projects with vishAcademy 's Hindi video tutorials</title>
<?php #css and js files >> 
include_once 'inc_/va_files.php'; ?>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<style>
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
	background:	none;
	color:#3a3a3a;
	padding: 4px 0;
	width:26px;
	top:auto;	
	left:auto;
	bottom:0;
	opacity:1;
	text-shadow:none;
}
.carousel-control.right {
	right:10px;
}

.carousel-control.left {
	right: 40px;
}

/*for footer dropdowns*/
.footselect select{
	height:40px;
	background:#252525;
	color:#717c80;
	border:0;
	border-bottom:1px dashed #3a3a3a;}
.footselect select:focus{
	background:#3a3a3a;}
.footselect{
	width:95px;
	overflow:hidden;
	display:inline-block;
	float:left;}
</style>
</head>
<body>	
    <?php #header
	include_once 'inc_/header.php';?>
	<div id="wrapper">
    	<section id="frontsection1">
        	<div class="cmn-cntnr">
            	<!--Welcome text box-->
            	<div class="welcome-txt">
	            	<h2>Free computer science education videos in Hindi Language.</h2>
                    <!--<span class="wlcm-tagline"><b>Learn</b> / <b>Ask</b> / <b>Help</b> everything is totally free for always</span>	-->
                    <a href="#begin" class="btn btn-stroke btn-lg megabtn">Start Learning</a>
                </div>                
                <!--Social login box-->
                <?php /* <div class="frontsocialbox">
                	<p>Get free admission in <b>vish</b>Academy. Sign in with...</p>
                    <ul>
                    	<li class="fb">
                        	<i class="fa fa-facebook fa-2x"></i>
                            <span>facebook</span>
                        </li>
                        <li class="ttr">
                        	<i class="fa fa-twitter fa-2x"></i>
                            <span>twitter</span>
                        </li>
                        <li class="gplus">
                        	<i class="fa fa-google-plus fa-2x"></i>
                            <span>Google+</span>
                        </li>
                        <li class="ml">
                        	<i class="fa fa-envelope fa-2x"></i>
                            <span>Email</span>
                        </li>
                    </ul>
                </div> */ ?>                
                <div class="clr"></div>
                <!--How to use vishAcademy-->
                <!--<div class="howtobx">
                	<div class="howto-heading">
                		<div class="heading">How to use </div>
                    </div>
                    <ul>
                    	<li>
                        	<div class="heading">Beginners</div>
                            <p>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.    	
                            </p>
                            <div class="link"><a href="#" class="fff u">Start here »</a></div>
                        </li>
                        <li>
                        	<div class="heading">Stuffers</div>
                            <p>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.    	
                            </p>
                            <div class="link"><a href="#" class="fff u">Start here »</a></div>
                        </li>
                        <li>
                        	<div class="heading">Trickers</div>
                            <p>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.    	
                            </p>
                            <div class="link"><a href="#" class="fff u">Start here »</a></div>
                        </li>                      
                    </ul>
                </div>-->
            </div>            
        </section>     
        <section id="frontsection2">        	
        	<div class="cmn-cntnr">            
            		<span class="centro"><h1 class="megatitle">// LATEST UPLOAD</h1></span>
                <ul id="latestonva">
                    <li>
                        <h4>// Latest for Beginners</h4>
                        <div class="latestsubx">
                            <!--subject goes here-->
                            <ul class="sub_tile">
                            <!----------->  
                         	    <?php 
									$myquery = data_selector("vish_subjects","level_id='1' AND subj_status='1'","subj_id DESC","LIMIT 2");		
															
										while($fetcher=mysqli_fetch_assoc($myquery)){	
										
										//fetching level
										$levelname = 'beginners';
										$get_level = data_selector("vish_levels","level_name='$levelname'");
 										$fetch = mysqli_fetch_assoc($get_level);
  										 $levelid = $fetch['level_id'];
										 $levelname = $fetch['level_name'];
										 // Select subject			
										 $subjid =$fetcher['subj_id'];							
										$explode_subjname = explode(" ",$fetcher['subj_name']);
										$subjname = implode("_",$explode_subjname);
										// Getting current video
										$vid = data_selector("vish_videodata","subj_id='$subjid'");
										$get_vid = mysqli_fetch_assoc($vid);
										$vidpage_path = strtolower($levelname."/".$subjname."/".$get_vid['vid_pageurl']);																		
								?>                      	
                            	<li>
                                    <div class="tile_img">
                                      <a href="<?php echo $vidpage_path; ?>">
                                        <img src="<?php echo $fetcher['subj_logo_url']; ?>" alt="subject image" />
                                      </a>
                                    </div>                       
                                    <div class="tile_subject">
                                      <a href="<?php echo $vidpage_path; ?>"><?php echo $fetcher['subj_name']; ?></a>
                                    </div>                         	
                                    <div class="tile_cat">
                                    	<?php
											$catid = $fetcher['cat_id'];
                                        	$subquery = data_selector("vish_cats","cat_id='$catid'");
											$subfetch = mysqli_fetch_assoc($subquery) or die('can not fetch sub cat');
											echo $subfetch['cat_name'];
                                        ?>                                    	
                                     </div>
                                    <div class="tile_ago">// 5 Hours ago</div>
                                </li>
                               <?php } // while loop ends here ?>                    			
                            </ul>                            
                       		<div class="clr"></div>
                       </div>
                    </li>
                    <li>
                        <h4>// Latest for Stuffers</h4>
                        <div class="latestsubx">
                            <!--subject goes here-->
                            <ul class="sub_tile">
                            <!----------->  
                         	    <?php 
									$myquery = data_selector("vish_subjects","level_id='2'","subj_id DESC","LIMIT 2");
									while($fetcher=mysqli_fetch_assoc($myquery)){	
									//fetching level
										$levelname = 'Stuffers';
										$get_level = data_selector("vish_levels","level_name='$levelname'");
 										$fetch = mysqli_fetch_assoc($get_level);
  										 $levelid = $fetch['level_id'];
										 $levelname = $fetch['level_name'];
										 // Select subject			
										 $subjid =$fetcher['subj_id'];							
										$explode_subjname = explode(" ",$fetcher['subj_name']);
										$subjname = implode("_",$explode_subjname);
										// Getting current video
										$vid = data_selector("vish_videodata","subj_id='$subjid'");
										$get_vid = mysqli_fetch_assoc($vid);
										$vidpage_path = strtolower($levelname."/".$subjname."/".$get_vid['vid_pageurl']);																			
								?>                      	
                            	<li>
                                    <div class="tile_img">
                                        <a href="<?php echo $vidpage_path; ?>">
                                        <img src="<?php echo $fetcher['subj_logo_url']; ?>" alt="subject image" />
                                        </a>
                                    </div>                       
                                     <div class="tile_subject">
                                     	<a href="<?php echo $vidpage_path; ?>"><?php echo $fetcher['subj_name']; ?></a>
                                     </div>                         	
                                    <div class="tile_cat">
                                    	<?php
											$catid = $fetcher['cat_id'];
                                        	$subquery = data_selector("vish_cats","cat_id='$catid'");
											$subfetch = mysqli_fetch_assoc($subquery) or die('can not fetch sub cat');
											echo $subfetch['cat_name'];
                                        ?>                                    	
                                     </div>
                                    <div class="tile_ago">// 5 Hours ago</div>                                                
                                </li>
                               <?php } // while loop ends here ?>                    			
                            </ul>                            
                       		<div class="clr"></div>                       		
                       </div>
                    </li>
                    <li>
                        <h4>// Latest for Trickers</h4>
                        <div class="latestsubx">
                            <!--subject goes here-->
                            <ul class="sub_tile">
                            <!----------->  
                         	    <?php 
									$myquery = data_selector("vish_subjects","level_id='3'","subj_id DESC","LIMIT 2");		
															
										while($fetcher=mysqli_fetch_assoc($myquery)){	
										//fetching level
										$levelname = 'Stuffers';
										$get_level = data_selector("vish_levels","level_name='$levelname'");
 										$fetch = mysqli_fetch_assoc($get_level);
  										 $levelid = $fetch['level_id'];
										 $levelname = $fetch['level_name'];
										 // Select subject			
										 $subjid =$fetcher['subj_id'];							
										$explode_subjname = explode(" ",$fetcher['subj_name']);
										$subjname = implode("_",$explode_subjname);
										// Getting current video
										$vid = data_selector("vish_videodata","subj_id='$subjid'");
										$get_vid = mysqli_fetch_assoc($vid);
										$vidpage_path = strtolower($levelname."/".$subjname."/".$get_vid['vid_pageurl']);																			
								?>                      	
                            	<li>
                                    <div class="tile_img">
                                        <a href="<?php echo $vidpage_path; ?>"><img src="<?php echo $fetcher['subj_logo_url']; ?>" alt="subject image" /></a>
                                    </div>                       
                                     <div class="tile_subject"> 
                                     	<a href="<?php echo $vidpage_path; ?>"><?php echo $fetcher['subj_name']; ?></a>
                                     </div>                         	
                                    <div class="tile_cat">
                                    	<?php
											$catid = $fetcher['cat_id'];
                                        	$subquery = data_selector("vish_cats","cat_id='$catid'");
											$subfetch = mysqli_fetch_assoc($subquery) or die('can not fetch sub cat');
											echo $subfetch['cat_name'];
                                        ?>                                    	
                                     </div>
                                    <div class="tile_ago">// 5 Hours ago</div>                                                
                                </li>
                               <?php } // while loop ends here ?>                    			
                            </ul>                            
                       		<div class="clr"></div>                       		
                       </div>
                    </li>
                </ul>
               <a name="begin"> <hr class="digonalhr"/> </a>
	             <!--Discussion part-->
                <?php /* <div class="section2part2">
                	<h1 class="title">// Latest for Discussion</h1>
                    <ul class="latestdsqs">
                    	<li>
                        	<div class="dsqs-h"><a href="#">1. Embedded youtube video to have 100% width on responsive webpage.</a></div>
                            <span><a href="#">7 min </a>ago by <a href="#">Digigeek</a> in <a href="#">Web design</a> » <a href="#">html</a></span>
                        </li>
                        <li>
                        	<div class="dsqs-h"><a href="#">2. Embedded youtube video to have 100% width on responsive webpage.</a></div>
                            <span><a href="#">7 min </a>ago by <a href="#">Digigeek</a> in <a href="#">Web design</a> » <a href="#">html</a></span>
                        </li>
                        <li>
                        	<div class="dsqs-h"><a href="#">3. Embedded youtube video to have 100% width on responsive webpage.</a></div>
                            <span><a href="#">7 min </a>ago by <a href="#">Digigeek</a> in <a href="#">Web design</a> » <a href="#">html</a></span>
                        </li>
                        <li>
                        	<div class="dsqs-h"><a href="#">4. Embedded youtube video to have 100% width on responsive webpage.</a></div>
                            <span><a href="#">7 min </a>ago by <a href="#">Digigeek</a> in <a href="#">Web design</a> » <a href="#">html</a></span>
                        </li>                        
                    </ul>
                    <div class="frontad">
                    	<div class="tile_ad300">	
                   			<img src="assets/images/tile_12.png">
                		</div>
                    </div> 
                </div>*/ ?>
            </div>
        </section>
        <section id="frontsection2">
        	<div class="cmn-cntnr">            
            		<span class="centro"><h1 class="megatitle">// BEGINNERS</h1></span>
                    <ul class="subjectrow">
                    	<?php
                        	//Beginner subject fetch							
									$myquery = data_selector("vish_subjects","level_id='1'","subj_id","LIMIT 6");		
															
										while($fetcher=mysqli_fetch_assoc($myquery)){	
										//fetching level
										$levelname = 'Beginners';
										$get_level = data_selector("vish_levels","level_name='$levelname'");
 										$fetch = mysqli_fetch_assoc($get_level);
  										 $levelid = $fetch['level_id'];
										 $levelname = $fetch['level_name'];
										 // Select subject			
										 $subjid =$fetcher['subj_id'];							
										$explode_subjname = explode(" ",$fetcher['subj_name']);
										$subjname = implode("_",$explode_subjname);
										// Getting current video
										$vid = data_selector("vish_videodata","subj_id='$subjid'");
										$get_vid = mysqli_fetch_assoc($vid);
										$vidpage_path = strtolower($levelname."/".$subjname."/".$get_vid['vid_pageurl']);																			
								?> 
						
                    	<li>
                        	<div class="subjimg">
                        		<a href="<?php echo $vidpage_path; ?>">
                                	<img src="<?php echo $fetcher['subj_logo_url']; ?>" />
                                 </a>
                            </div>
                            <div class="subjname">
                            	<a href="<?php echo $vidpage_path; ?>">
                            		<?php echo $fetcher['subj_name']; ?>
                                </a>
                            </div>
                            <div class="tile_cat">
                            	<?php
									$catid = $fetcher['cat_id'];
									$subquery = data_selector("vish_cats","cat_id='$catid'");
									$subfetch = mysqli_fetch_assoc($subquery) or die('can not fetch sub cat');
									echo $subfetch['cat_name'];
								?> 
                            </div>
                            <div class="tile_cat">
                            	// 5 days ago
                            </div>
                        </li>
                        <?php } // while loop ends here ?>                        
                    </ul>
	                <hr class="digonalhr" /> 
                    <span class="centro"> <h1 class="megatitle">// STUFFERS</h1></span>
                    <ul class="subjectrow">
                    	<?php
                        	//Beginner subject fetch							
									$myquery = data_selector("vish_subjects","level_id='2'","subj_id","LIMIT 6");		
															
										while($fetcher=mysqli_fetch_assoc($myquery)){	
										//fetching level
										$levelname = 'Stuffers';
										$get_level = data_selector("vish_levels","level_name='$levelname'");
 										$fetch = mysqli_fetch_assoc($get_level);
  										 $levelid = $fetch['level_id'];
										 $levelname = $fetch['level_name'];
										 // Select subject			
										 $subjid =$fetcher['subj_id'];							
										$explode_subjname = explode(" ",$fetcher['subj_name']);
										$subjname = implode("_",$explode_subjname);
										// Getting current video
										$vid = data_selector("vish_videodata","subj_id='$subjid'");
										$get_vid = mysqli_fetch_assoc($vid);
										$vidpage_path = strtolower($levelname."/".$subjname."/".$get_vid['vid_pageurl']);																			
								?> 
						
                    	<li>
                        	<div class="subjimg">
                        		<a href="<?php echo $vidpage_path; ?>">
                                	<img src="<?php echo $fetcher['subj_logo_url']; ?>" />
                                 </a>
                            </div>
                            <div class="subjname">
                            	<a href="<?php echo $vidpage_path; ?>">
                            		<?php echo $fetcher['subj_name']; ?>
                                </a>
                            </div>
                            <div class="tile_cat">
                            	<?php
									$catid = $fetcher['cat_id'];
									$subquery = data_selector("vish_cats","cat_id='$catid'");
									$subfetch = mysqli_fetch_assoc($subquery) or die('can not fetch sub cat');
									echo $subfetch['cat_name'];
								?> 
                            </div>
                            <div class="tile_cat">
                            	// 5 days ago
                            </div>
                        </li>
                        <?php } // while loop ends here ?>                        
                    </ul>
	                <hr class="digonalhr" /> 
                     <span class="centro"><h1 class="megatitle">// TRICKERS</h1></span>
                    <ul class="subjectrow">
                    	<?php
                        	//Beginner subject fetch							
									$myquery = data_selector("vish_subjects","level_id='3'","subj_id","LIMIT 6");		
															
										while($fetcher=mysqli_fetch_assoc($myquery)){	
										//fetching level
										$levelname = 'Trickers';
										$get_level = data_selector("vish_levels","level_name='$levelname'");
 										$fetch = mysqli_fetch_assoc($get_level);
  										 $levelid = $fetch['level_id'];
										 $levelname = $fetch['level_name'];
										 // Select subject			
										 $subjid =$fetcher['subj_id'];							
										$explode_subjname = explode(" ",$fetcher['subj_name']);
										$subjname = implode("_",$explode_subjname);
										// Getting current video
										$vid = data_selector("vish_videodata","subj_id='$subjid'");
										$get_vid = mysqli_fetch_assoc($vid);
										$vidpage_path = strtolower($levelname."/".$subjname."/".$get_vid['vid_pageurl']);																			
								?> 
						
                    	<li>
                        	<div class="subjimg">
                        		<a href="<?php echo $vidpage_path; ?>">
                                	<img src="<?php echo $fetcher['subj_logo_url']; ?>" />
                                 </a>
                            </div>
                            <div class="subjname">
                            	<a href="<?php echo $vidpage_path; ?>">
                            		<?php echo $fetcher['subj_name']; ?>
                                </a>
                            </div>
                            <div class="tile_cat">
                            	<?php
									$catid = $fetcher['cat_id'];
									$subquery = data_selector("vish_cats","cat_id='$catid'");
									$subfetch = mysqli_fetch_assoc($subquery) or die('can not fetch sub cat');
									echo $subfetch['cat_name'];
								?> 
                            </div>
                            <div class="tile_cat">
                            	// 5 days ago
                            </div>
                        </li>
                        <?php } // while loop ends here ?>                        
                    </ul>
            </div>
        </section>
    </div>	
    
     <!--footer-->
     <section id="footer">
     	<div class="cmn-cntnr">
     		<div class="footbx">
            	<h3><a name="test"><i class="fa fa-user"></i></a> Users Review</h3>
                <!-- Carousel
            ================================================== -->
            <div id="myCarousel" class="carousel slide">
                 <!-- Indicators -->         
                <div class="carousel-inner">           
                    <div class="item active">
                        <blockquote>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                          <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                        </blockquote>
                    </div>
                    <div class="item">
                        <blockquote>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                          <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                        </blockquote>
                     </div>  
                    <div class="item">
                        <blockquote>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                          <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                        </blockquote>
                    </div>                                                                                   
                </div> 
               <div class="carousel-controls">
                  <a class="carousel-control left" href="#myCarousel" data-slide="prev"><span class="fa fa-angle-double-left"></span></a>
                  <a class="carousel-control right" href="#myCarousel" data-slide="next"><span class="fa fa-angle-double-right"></span></a>
              </div>               
                                                            
            </div><!-- End Carousel -->
            </div>
        	<div class="footbx">
            	<h3><i class="fa fa-bell"></i> Join Alerts</h3>
                <div class="footerform">
                	<p>
                      Fill up these information below and join the <i>vish Alerts </i> on your email and we will send you an email on every new subject / video upload on our site / channel.
                    </p><ol></ol>
                    <?php echo $error; ?>
                	<form name="alert-form" id="alert-form" class="footerform" method="post" action="<?php $_SERVER['PHP_SELF']."?joinalert"?>">	
                    	<input type="text" name="altname" id="vstrname" placeholder="// Your Full Name Here" />
                        <input type="email" name="altmail" id="vstrmail" placeholder="// Your Email address Here" />
                        <button type="submit" name="altsend" id="vstrname" class="btn-fff" />
                        	 <i class="fa fa-bell"></i> join Alerts 
                        </button>                        
                    </form>
                </div>
            </div>
        	<div class="footbx">
            	<h3><i class="fa fa-envelope"></i> SEND A MESSAGE</h3>
                <div class="footerform">                	
                	<form name="feedback-form" id="feedback-form" method="post" action="">	
                    	<input type="text" name="msgname" id="msgname" placeholder="// Your Full Name Here" />
                       
                        <div class="footselect">
                            <select name="msgusing" id="msgusing" class="" required>
                                <option value=""> // Select.</option>
                                <option value="email"> Email id »</option>
                                <option value="facebook"> Facebook id »</option>
                                <option value="twitter"> Twitter id »</option>
                            </select>
                        </div>
                        <input name="msgfrom" id="msgfrom" type="text" style="width:246px; margin-top:0;" placeholder="and write here" required>
                        
                        <!--<input type="text" name="vstrsubj" id="vstrsubj" placeholder="// Message subject Here" />-->
                        <textarea name="msgbody" id="msgbody" rows="4" placeholder="// Send Feedback / message / suggestion / question anything you feel about this site..."></textarea>
                        <input type="submit" name="msgsender" id="msgsender" class="btn-fff" value="Send message" /> 
                         </form>                       
                    </form>
                </div>
            </div>
        </div>
     </section>
    <?php include_once 'inc_/footer.php';?>
    <!-- Modal -->
<div class="modal fade Fur" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(e) {
  $('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
			|| location.hostname == this.hostname) {
	
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			   if (target.length) {
				 $('html,body').animate({
					 scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});
 });
</script>
</body>
</html>