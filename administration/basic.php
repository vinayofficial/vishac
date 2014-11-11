<!DOCTYPE html>
<html lang="en">
<head>
    <title>vishAcademy | manage header </title>
    <?php require_once 'inc_/css_bundle.php';?>    
    <link rel="stylesheet" href="assets/css/bootstrap-switch.css" />
</head>
<body>
<section id="container">
<!--header start-->
<?php include_once 'inc_/admn_header.php';?>
<!--header end-->
<!--sidebar start-->
<?php include_once 'inc_/main_nav.php';?>
<!--sidebar end-->
<!--main content start-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                    Here will be the add video and topic button
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        Here will be the video list.
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->
</section>
<!-- Placed js at the end of the document so the pages load faster -->


<!--Core js-->
<script src="assets/js/jquery.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<!--Side panel toggle script-->
<script src="assets/js/jquery.nicescroll.js"></script>
<!--common script init for all pages-->
<script src="assets/js/scripts.js"></script>	
<!--for modal-->
<script src="assets/bs3/js/bootstrap.min.js"></script>
<!--CHeck uncheck button -->
<script src="assets/js/bootstrap-switch.js"></script>
<script src="assets/js/toggle-init.js"></script>

</body>
</html>
