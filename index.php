<?php require_once 'inc_/functions.php'; ?>
<?php //include 'inc_/_dbconnector.php'; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Learn major an minor computer science projects with vishAcademy 's Hindi video tutorials</title>
<?php #css and js files >> 
include_once 'inc_/va_files.php'; ?>
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
                <div class="howtobx">
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
                       <?php /*  <li>
                        	<div class="heading">Discussions</div>
                            <p>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.    	
                            </p>
                            <div class="link"><a href="#" class="fff u">Start here »</a></div>
                        </li> */ ?>
                    </ul>
                </div>
            </div>            
        </section>     
        <section id="frontsection2">        	
        	<div class="cmn-cntnr">            
            		<span class="centro"><h1 class="megatitle">// LATEST UPLOAD</h1></span>
                <ul id="latestonva">
                    <li>
                        <h1 class="title">// Latest for Beginners</h1>
                        <div class="latestsubx">
                            <!--subject goes here-->
                            <ul class="sub_tile">
                            <!----------->  
                         	    <?php 
									$myquery = mysqli_query($dbcon,"SELECT * FROM vish_subjects WHERE level_id='1' ORDER BY subj_id DESC LIMIT 2") or die("can not fire this shitty query");		
															
										while($fetcher=mysqli_fetch_assoc($myquery)){																				
								?>                      	
                            	<li>
                                    <div class="tile_img">
                                        <a href="#"><img src="<?php echo SITE_PATH.$fetcher['subj_logo_url']; ?>" alt="subject image" /></a>
                                    </div>                       
                                     <div class="tile_subject"> <a href="#"><?php echo $fetcher['subj_name']; ?></a></div>                         	
                                    <div class="tile_cat">// Web design</div>
                                    <div class="tile_ago">// 5 Hours ago</div>                                                
                                </li>
                               <?php } // while loop ends here ?>                    			
                            </ul>                            
                       		<div class="clr"></div>
                       		<!--<div class="brwslinkbx">
                         	<a href="#" class="themeBtn-std">Browse all »</a>   
                        </div>-->
                       </div>
                    </li>
                    <li>
                        <h1 class="title">// Latest for Stuffers</h1>
                        <div class="latestsubx">
                            <!--subject goes here-->
                            <ul class="sub_tile">
                            	<li>
                                    <div class="tile_img">
                                       <a href="#"><img src="assets/images/tile_03.png" alt="subject image" /></a>
                                    </div>                       
                                     <div class="tile_subject"> <a href="#">HTML 4</a></div>                         	
                                    <div class="tile_cat">// Web design</div>
                                    <div class="tile_ago">// 5 Hours ago</div>                                                
                                </li>
                                <li>
                                    <div class="tile_img">
                                        <a href="#"><img src="assets/images/tile_03.png" alt="subject image" /></a>
                                    </div>                       
                                     <div class="tile_subject"> <a href="#">HTML 4</a></div>                         	
                                    <div class="tile_cat">// Web design</div>
                                    <div class="tile_ago">// 5 Hours ago</div>                                                
                                </li>
                            </ul>                            
                       		<div class="clr"></div>                       		
                       </div>
                    </li>
                    <li>
                        <h1 class="title">// Latest for Trickers</h1>
                        <div class="latestsubx">
                            <!--subject goes here-->
                            <ul class="sub_tile">
                            	<li>
                                    <div class="tile_img">
                                       <a href="#"><img src="assets/images/tile_03.png" alt="subject image" /></a>
                                    </div>                       
                                     <div class="tile_subject"> <a href="#">HTML 4</a></div>                         	
                                    <div class="tile_cat">// Web design</div>
                                    <div class="tile_ago">// 5 Hours ago</div>                                                
                                </li>
                                
                                <li>
                                    <div class="tile_img">
                                        <a href="#"><img src="assets/images/tile_03.png" alt="subject image" /></a>
                                    </div>                       
                                     <div class="tile_subject"> <a href="#">HTML 4</a></div>                         	
                                    <div class="tile_cat">// Web design</div>
                                    <div class="tile_ago">// 5 Hours ago</div>                                                
                                </li>
                            </ul>                            
                       		<div class="clr"></div>                       		
                       </div>
                    </li>
                </ul>
                <hr class="digonalhr"/>                                                
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
                    	<li>
                        	<div class="subjimg">
                        		<a href="#"><img src="assets/images/sqr_html.jpg" /></a>
                            </div>
                            <div class="subjname">
                            	<a href="#">
                            		HTML 4
                                </a>
                            </div>
                            <div class="tile_cat">
                            	// Web design
                            </div>
                            <div class="tile_cat">
                            	// 5 days ago
                            </div>
                        </li>
                        <li>
                        	<div class="subjimg">
                        		<a href="#"><img src="assets/images/sqr_css2.jpg" /></a>
                            </div>
                            <div class="subjname">
                            	<a href="#">
                            		CSS 2
                                </a>
                            </div>
                            <div class="tile_cat">
                            	// Web design
                            </div>
                            <div class="tile_cat">
                            	// 5 days ago
                            </div>
                        </li>
                        <li>
                        	<div class="subjimg">
                        		<a href="#"><img src="assets/images/sqr_html5.jpg" /></a>
                            </div>
                            <div class="subjname">
                            	<a href="#">
                            		HTML5
                                </a>
                            </div>
                            <div class="tile_cat">
                            	// Web design
                            </div>
                            <div class="tile_cat">
                            	// 5 days ago
                            </div>
                        </li>
                        <li>
                        	<div class="subjimg">
                        		<a href="#"><img src="assets/images/sqr_css3.jpg" /></a>
                            </div>
                            <div class="subjname">
                            	<a href="#">
                            		CSS 3
                                </a>
                            </div>
                            <div class="tile_cat">
                            	// Web design
                            </div>
                            <div class="tile_cat">
                            	// 5 days ago
                            </div>
                        </li>
                        <li>
                        	<div class="subjimg">
                        		<a href="#"><img src="assets/images/sqr_js.jpg" /></a>
                            </div>
                            <div class="subjname">
                            	<a href="#">
                            		JavaScript
                                </a>
                            </div>
                            <div class="tile_cat">
                            	// Web design
                            </div>
                            <div class="tile_cat">
                            	// 5 days ago
                            </div>
                        </li>
                        <li>
                        	<div class="subjimg">
                        		<a href="#"><img src="assets/images/sqr_ajax.jpg" /></a>
                            </div>
                            <div class="subjname">
                            	<a href="#">
                            		AJAX
                                </a>
                            </div>
                            <div class="tile_cat">
                            	// Web design
                            </div>
                            <div class="tile_cat">
                            	// 5 days ago
                            </div>
                        </li>
                    </ul>
	                <hr class="digonalhr" /> 
                    <span class="centro"> <h1 class="megatitle">// STUFFERS</h1></span>
                    <ul class="subjectrow">
                    	<li>
                        	<div class="subjimg">
                        		<a href="#"><img src="assets/images/sqr_html.jpg" /></a>
                            </div>
                            <div class="subjname">
                            	<a href="#">
                            		Responsive website from start to finish
                                </a>
                            </div>
                            <div class="tile_cat">
                            	// Web design
                            </div>
                            <div class="tile_cat">
                            	<i class="fa fa-clock-o"></i> 5 days ago 
                                <span class="fright">
                                	<i class="fa fa-play-circle"></i> 40 Videos
                                </span>
                            </div>
                        </li>
                        <li>
                        	<div class="subjimg">
                        		<a href="#"><img src="assets/images/sqr_css2.jpg" /></a>
                            </div>
                            <div class="subjname">
                            	<a href="#">
                            		JQuery plugin implementation guide
                                </a>
                            </div>
                            <div class="tile_cat">
                            	// Web design
                            </div>
                             <div class="tile_cat">
                            	<i class="fa fa-clock-o"></i> 5 days ago 
                                <span class="fright">
                                	<i class="fa fa-play-circle"></i> 25 Videos
                                </span>
                            </div>
                        </li>
                        <li>
                        	<div class="subjimg">
                        		<a href="#"><img src="assets/images/sqr_html5.jpg" /></a>
                            </div>
                            <div class="subjname">
                            	<a href="#">
                            		AJAX implementation with php
                                </a>
                            </div>
                            <div class="tile_cat">
                            	// Web design
                            </div>
                            <div class="tile_cat">
                            	// 5 days ago
                            </div>
                        </li>
                        <li>
                        	<div class="subjimg">
                        		<a href="#"><img src="assets/images/sqr_css3.jpg" /></a>
                            </div>
                            <div class="subjname">
                            	<a href="#">
                            		Register and login system
                                </a>
                            </div>
                            <div class="tile_cat">
                            	// Web design
                            </div>
                            <div class="tile_cat">
                            	// 5 days ago
                            </div>
                        </li>
                        <li>
                        	<div class="subjimg">
                        		<a href="#"><img src="assets/images/sqr_js.jpg" /></a>
                            </div>
                            <div class="subjname">
                            	<a href="#">
                            		Dynamic responsive website with php
                                </a>
                            </div>
                            <div class="tile_cat">
                            	// Web design
                            </div>
                            <div class="tile_cat">
                            	// 5 days ago
                            </div>
                        </li>
                        <li>
                        	<div class="subjimg">
                        		<a href="#"><img src="assets/images/sqr_ajax.jpg" /></a>
                            </div>
                            <div class="subjname">
                            	<a href="#">
                            		Super flexible and dynamic bootstrap website
                                </a>
                            </div>
                            <div class="tile_cat">
                            	// Web design
                            </div>
                            <div class="tile_cat">
                            	// 5 days ago
                            </div>
                        </li>
                    </ul>
	                <hr class="digonalhr" /> 
                     <span class="centro"><h1 class="megatitle">// TRICKERS</h1></span>
                    <ul class="subjectrow">
                    	<li>
                        	<div class="subjimg">
                        		<a href="#"><img src="assets/images/sqr_html.jpg" /></a>
                            </div>
                            <div class="subjname">
                            	<a href="#">
                            		HTML 4
                                </a>
                            </div>
                            <div class="tile_cat">
                            	// Web design
                            </div>
                            <div class="tile_cat">
                            	// 5 days ago
                            </div>
                        </li>
                        <li>
                        	<div class="subjimg">
                        		<a href="#"><img src="assets/images/sqr_css2.jpg" /></a>
                            </div>
                            <div class="subjname">
                            	<a href="#">
                            		CSS 2
                                </a>
                            </div>
                            <div class="tile_cat">
                            	// Web design
                            </div>
                            <div class="tile_cat">
                            	// 5 days ago
                            </div>
                        </li>
                        <li>
                        	<div class="subjimg">
                        		<a href="#"><img src="assets/images/sqr_html5.jpg" /></a>
                            </div>
                            <div class="subjname">
                            	<a href="#">
                            		HTML5
                                </a>
                            </div>
                            <div class="tile_cat">
                            	// Web design
                            </div>
                            <div class="tile_cat">
                            	// 5 days ago
                            </div>
                        </li>
                        <li>
                        	<div class="subjimg">
                        		<a href="#"><img src="assets/images/sqr_css3.jpg" /></a>
                            </div>
                            <div class="subjname">
                            	<a href="#">
                            		CSS 3
                                </a>
                            </div>
                            <div class="tile_cat">
                            	// Web design
                            </div>
                            <div class="tile_cat">
                            	// 5 days ago
                            </div>
                        </li>
                        <li>
                        	<div class="subjimg">
                        		<a href="#"><img src="assets/images/sqr_js.jpg" /></a>
                            </div>
                            <div class="subjname">
                            	<a href="#">
                            		JavaScript
                                </a>
                            </div>
                            <div class="tile_cat">
                            	// Web design
                            </div>
                            <div class="tile_cat">
                            	// 5 days ago
                            </div>
                        </li>
                        <li>
                        	<div class="subjimg">
                        		<a href="#"><img src="assets/images/sqr_ajax.jpg" /></a>
                            </div>
                            <div class="subjname">
                            	<a href="#">
                            		AJAX
                                </a>
                            </div>
                            <div class="tile_cat">
                            	// Web design
                            </div>
                            <div class="tile_cat">
                            	// 5 days ago
                            </div>
                        </li>
                    </ul>
            </div>
        </section>
    </div>	
     <!--footer-->
     <section id="footer">
     	<div class="cmn-cntnr">
     		<div class="footbx">Hello there</div>
        	<div class="footbx"></div>
        	<div class="footbx">
            	<h1>// SEND MESSAGE</h1>
                <div class="text-tiny">// Send Feedback / message / suggestion / question anything...</div>
                <div class="footerform">
                	<form name="feedback-form" id="feedback-form" method="post" action="">	
                    	<input type="text" name="vstrname" id="vstrname" placeholder="// Your Full Name Here" />
                        <input type="email" name="vstrmail" id="vstrmail" placeholder="// Your Email address Here" />
                        <input type="text" name="vstrsubj" id="vstrsubj" placeholder="// Message subject Here" />
                        <textarea name="vstrmsg" id="vstrmsg" rows="4" placeholder="Message Here"></textarea>
                        <button type="submit" name="vstrname" id="vstrname" /> <i class="fa fa-send"></i> SEND MESSAGE </form>                       
                    </form>
                </div>
            </div>
        </div>
     </section>
    <?php include_once 'inc_/footer.php';?>
</body>
</html>