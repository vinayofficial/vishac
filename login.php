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
    	<div class="cmn-cntnr">
        	<div class="megah-bx">
        		<h1>// Login</h1>
                <span>// Not registered yet ? <a href="#">Create an account</a> </span>                
            </div>
            <div class="loginbox">
            	<form name="loginform" id="loginform" action="" method="get">
                	<div class="form-grp">
                    	<div class="va-lbls">E-mail</div>
                        <div class="va-elmnts">
                        	<input type="email" name="log_uname" id="log_uname" class="noClass" placeholder="email address here..." />
                        </div>
                    </div>
                    <div class="form-grp">
                    	<div class="va-lbls">Password</div>
                        <div class="va-elmnts">
                        	<input type="password" name="log_pswd" id="log_pswd" class="noClass" placeholder="password here..." />
                        </div>
                    </div>
                    <div class="form-grp">
                        <div class="va-elmnts">
                        	<input type="submit" name="log_btn" id="log_btn" class="loginbtn" value="Login" />
                        </div>
                    </div>
                    <div class="form-grp">
                        <div class="va-elmnts">
                        	<input type="checkbox" name="log_remember" id="log_remember" class="noClass" />
                            <span class="txt-small">Remember me</span>
                        </div>                        
                        <div class="pswd_lnk"><a href="#" class="txt-small">I forgot my password !! </a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
     <!--wrapper ends here-->
    <!--footer-->
    <?php include_once 'inc_/footer.php';?>
</body>
</html>