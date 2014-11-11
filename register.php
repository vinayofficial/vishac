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
        		<h1>// Register</h1>
                <span>// Already registered ? <a href="#">Login your account</a> </span>                
            </div>
            <div class="loginbox">
            	<form name="loginform" id="loginform" action="" method="get">
                	<div class="form-grp">
                    	<div class="va-lbls">Full name</div>
                        <div class="va-elmnts">
                        	<input type="text" name="log_uname" id="log_uname" class="" placeholder="ie: vinay singh" />
                        </div>
                    </div>
                    
                	<div class="form-grp">
                    	<div class="va-lbls">E-mail</div>
                        <div class="va-elmnts">
                        	<input type="email" name="log_uname" id="log_uname" class="noClass" placeholder="ie: vinay@vishacademy.com" />
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
                        	<input type="submit" name="log_btn" id="log_btn" class="loginbtn" value="Register" />
                        </div>
                    </div>
                    <div class="form-grp">
                        <div class="va-elmnts">
                            <span class="txt-small">By creating an account, you agree to this site's <a href="#">terms of use</a> and <a href="#">privacy policy </a></span>
                        </div>                        
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