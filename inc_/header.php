<?php include_once '_dbconnector.php'; ?>
<header>
    	<div class="cmn-cntnr">
        	<div id="mainav_trgr">
            	<a href="#"><i class="fa fa-bars fa-2x"></i></a>
            </div>
            <div id="usernav_trgr">
            	<a href="#"><i class="fa fa-user fa-2x"></i></a>
            </div>
        	<div class="usernav">
            	<div class="social-icons">
                	<ul>
                    	<li><a href="http://www.facebook.com/vishAcademy" class="fb" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="http://www.twitter.com/vishAcademy" class="ttr" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="http://www.youtube.com/vishAcademy" class="yt" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                        <li><a href="http://www.google.com/+vishAcademy" class="yt" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            	<?php /*<ul>
                	<li><a href="login.php">Login</a></li><!--
                    --><li><a href="register.php">Register</a></li>
                </ul> */?>
<!--                <ul class="usernav_log">
                	<li>
                    	<a href="#"><span class="dp"><img src="assets/images/dp.jpg"></span> Vinay singh</a>
                        <ul class="usr_subnav">
                        	<li><a href="#"><i class="fa fa-user"></i> My Profile</a></li>
                            <li><a href="#"><i class="fa fa-gear"></i> Account Setting</a></li>
                            <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
-->            </div>
        	<div id="logo">
            	<a href="<?php echo SITE_PATH ?>index.php"><img src="<?php echo SITE_PATH ?>assets/images/txtlogo.png" /></a>                
            </div>            
            <nav id="mainav">
            <ul>
            <?php
				$nav_select = 'select * from header_nav WHERE nav_visible=1';
				$nav_query = mysqli_query($dbcon,$nav_select);
				if(!$nav_query){echo 'can not data selected';}																
				while($fetch_nav= mysqli_fetch_assoc($nav_query)){?><!--
                                
                --><li><a href="<?php echo SITE_PATH.$fetch_nav['nav_url'] ?>"><?php echo $fetch_nav['nav_name']; ?></a></li><?php } ?><!--
                --></ul>
            </nav>   
        </div>	
    </header>