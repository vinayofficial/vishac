<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bucketadmin.themebucket.net/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 May 2014 09:18:28 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.html">

    <title>Vish Academy | Boss Area</title>

    <!--Core CSS -->
    <link href="bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/bootstrap-switch.css" />
    <link rel="stylesheet" type="text/css" href="js/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="js/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />

    <link rel="stylesheet" type="text/css" href="js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="js/bootstrap-timepicker/css/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="js/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="js/bootstrap-datetimepicker/css/datetimepicker.css" />

    <link rel="stylesheet" type="text/css" href="js/jquery-multi-select/css/multi-select.css" />
    <link rel="stylesheet" type="text/css" href="js/jquery-tags-input/jquery.tagsinput.css" />

    <link rel="stylesheet" type="text/css" href="js/select2/select2.css" />
    
    
    <link rel="stylesheet" type="text/css" href="js/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
	
    <!--form steps-->
	<link rel="stylesheet" href="css/jquery.stepsc4ca.css" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    
    <!----------Nestable----------------->
    <link rel="stylesheet" type="text/css" href="js/nestable/jquery.nestable.css" />
    <!----Summernote text editor---->
    <!-- include summernote css/js-->
	<link href="summernote.css" />
	<script src="summernote.min.js"></script>


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<section id="container" >
<!--header start-->
<?php include_once 'admn_header.php';?>
<!--header end-->
<?php include_once 'main_nav.php';?>
<!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->        	
        	<div class="row">                
                <div class="col-lg-12">
                    <section class="panel">                        
                        <div class="panel-body">
                            <section class="panel">                       
                        <div class="panel-body">
                            <div class="text-right">
                                <a class="btn btn-info" data-toggle="modal" href="#new_topic_popup">
                                    <i class="fa fa-plus"> New Topic</i>
                                </a>
                                <a class="btn btn-info" data-toggle="modal" href="#new_topic_popup">
                                    <i class="fa fa-plus"> New Video</i>
                                </a>
                            </div>
                        </div>
                    </section>
                        </div>
                    </section>
                </div>                
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <section class="panel">
                        <header class="panel-heading">
                            Available Videos
                             <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                            </span>
                        </header>
                        <div class="panel-body">
                            <div class="dd" id="nestable_list_1">
                                <ol class="dd-list">
                                    <li class="dd-item" data-id="1">
                                        <div class="dd-handle">Item 1</div>
                                    </li>
                                    <li class="dd-item" data-id="2">
                                        <div class="dd-handle">Item 2</div>
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="3">
                                                <div class="dd-handle">Item 3</div>
                                            </li>
                                            <li class="dd-item" data-id="4">
                                                <div class="dd-handle">Item 4</div>
                                            </li>
                                            <li class="dd-item" data-id="5">
                                                <div class="dd-handle">Item 5</div>
                                                <ol class="dd-list">
                                                    <li class="dd-item" data-id="6">
                                                        <div class="dd-handle">Item 6</div>
                                                    </li>
                                                    <li class="dd-item" data-id="7">
                                                        <div class="dd-handle">Item 7</div>
                                                    </li>
                                                    <li class="dd-item" data-id="8">
                                                        <div class="dd-handle">Item 8</div>
                                                    </li>
                                                </ol>
                                            </li>
                                            <li class="dd-item" data-id="9">
                                                <div class="dd-handle">Item 9</div>
                                            </li>
                                            <li class="dd-item" data-id="10">
                                                <div class="dd-handle">Item 10</div>
                                            </li>
                                        </ol>
                                    </li>
                                    <li class="dd-item" data-id="11">
                                        <div class="dd-handle">Item 11</div>
                                    </li>
                                    <li class="dd-item" data-id="12">
                                        <div class="dd-handle">Item 12</div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-6">
                    <section class="panel">
                        <header class="panel-heading">
                            Create new topic for this series
                             <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                            </span>
                        </header>
                        <div class="panel-body">
                            <section class="panel">                       
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">New topic name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="New topic name here..">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Publish
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-info">Create new topic</button>
                            </form>
                            </div>

                        </div>
                    </section>
                        </div>
                    </section>
                </div>                
            </div>
        <!-- page end-->
        	<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Basic Wizard
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">

                        <div id="wizard">
                            <h2>First Step</h2>

                            <section>
                                <form class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Select topic</label>
                                            <div class="col-lg-8">
                                                <select class="form-control m-bot15">
                                                    <option>Introduction</option>
                                                    <option>Head section</option>
                                                    <option>text formation</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">video title (E)</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" placeholder="name of new vidoe here...">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">video title (H)</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" placeholder="name of new vidoe here...">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Video URL</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" placeholder="youtube link here...">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Source file</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" placeholder="Sorce file location here...">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Discussion link</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" placeholder="Discussion link here...">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Live Code</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" placeholder="Live code link here...">
                                            </div>
                                        </div>
                                    </form>
                            </section>
                            <h2>Second Step</h2>
                            <section>
                                <form class="form-horizontal">
                                    <div class="form-group">
                                <label class="control-label col-md-2">WYSIHTML5 Editor</label>
                                <div class="col-md-10">
                                    <textarea class="wysihtml5 form-control" rows="9"></textarea>
                                </div>
                            </div>
                                </form>
                            </section>

                            <h2>Third Step</h2>
                            <section>
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Page title</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="page title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Page name</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="page name here...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Page Description</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="page description here...">
                                        </div>
                                    </div>
                                    
                                </form>
                            </section>

                           <!-- <h2>Final Step</h2>
                            <section>
                                <p>Congratulations This is the Final Step</p>
                            </section>
                            <h2>Fifth Step</h2>
                            <section>
                                <p>Congratulations This is the Final Step</p>
                            </section>-->
                        </div>
                    </div>
                </section>                
            </div>
        </div>
        </section>
    </section>
    <!--form-->
    
    <!--main content end-->
<!--right sidebar will goes here-->

<!-- Modal -->
<div class="modal fade" id="new_topic_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add a new Topic</h4>
            </div>
            <div class="modal-body">
                <form role="form">
    <div class="form-group">
        <label for="exampleInputEmail1">New topic name</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="New Topic name here...">
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox"> Publish Subject
        </label>
    </div>
    <!--<button type="submit" class="btn btn-info">Submit</button>-->
</form>                           

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                <button class="btn btn-warning" type="button"> Confirm</button>
            </div>
        </div>
    </div>
</div>

</section>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="js/jquery.js"></script>
<script src="bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--Easy Pie Chart-->
<script src="js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="js/sparkline/jquery.sparkline.js"></script>
<!--jQuery Flot Chart-->
<script src="js/flot-chart/jquery.flot.js"></script>
<script src="js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="js/flot-chart/jquery.flot.resize.js"></script>
<script src="js/flot-chart/jquery.flot.pie.resize.js"></script>

<script src="js/nestable/jquery.nestable.js"></script>

<!--common script init for all pages-->
<script src="js/scripts.js"></script>

<!--script for this page-->
<script src="js/nestable.js"></script>
<script src="js/jquery-steps/jquery.steps.js"></script>
<!--Editor-->
<script src="js/ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="js/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="js/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script src="js/jquery-tags-input/jquery.tagsinput.js"></script>
<!---form wizard-->
<script>
    $(function ()
    {
        $("#wizard").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "slideLeft"
        });

        $("#wizard-vertical").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            stepsOrientation: "vertical"
        });
    });


</script>


</body>

<!-- Mirrored from bucketadmin.themebucket.net/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 May 2014 09:18:28 GMT -->
</html>
