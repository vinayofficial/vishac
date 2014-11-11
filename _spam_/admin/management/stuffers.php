<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bucketadmin.themebucket.net/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 May 2014 09:18:28 GMT -->
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.html">

    <title>Stuffers Management</title>

    <!--Core CSS -->
    <link href="bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
	<!---->
    <!--Griter notify-->
    <link rel="stylesheet" type="text/css" href="css/jquery.gritter.css" />
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">google.load('jquery', '1.7.1');</script>
<script type="text/javascript" src="js/jquery.gritter.js"></script>
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
    
<a href="#" id="add-regular">Add regular notification</a>
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->
        <!--Ajax loader-->
		<div class="blackwall">
        	<center><h2>Loading...</h2></center>
        </div>
        <div class="row">
            <div class="col-sm-12" id="LoadPage">
                <section class="panel">
                    <header class="panel-heading">
                        Uploaded Beginners series...
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <div class="subtile"> 
                            <a href="html.html"><img src="images/va/tile_03.png" /></a>
                            <div class="subjname"><a href="html.php">// click here</a></div>
                            <div class="subjcat">// web design</div>
                        </div>
                        <div class="subtile"> 
                            <a href="video.php"><img src="images/va/tile_03.png" /></a>
                            <div class="subjname"><a href="video.php">// HTML 4.01</a></div>
                            <div class="subjcat">// web design</div>
                        </div>
                        <div class="subtile"> 
                            <a href="video.php"><img src="images/va/tile_03.png" /></a>
                            <div class="subjname"><a href="video.php">// HTML 4.01</a></div>
                            <div class="subjcat">// web design</div>
                        </div>
                        <div class="subtile"> 
                            <a href="video.php"><img src="images/va/tile_03.png" /></a>
                            <div class="subjname"><a href="video.php">// HTML 4.01</a></div>
                            <div class="subjcat">// web design</div>
                        </div>
                        <div class="subtile"> 
                            <a href="video.php"><img src="images/va/tile_03.png" /></a>
                            <div class="subjname"><a href="video.php">// HTML 4.01</a></div>
                            <div class="subjcat">// web design</div>
                        </div>
                        <div class="subtile"> 
                            <a href="video.php"><img src="images/va/tile_03.png" /></a>
                            <div class="subjname"><a href="video.php">// HTML 4.01</a></div>
                            <div class="subjcat">// web design</div>
                        </div>
                        <div class="subtile"> 
                            <a href="video.php"><img src="images/va/tile_03.png" /></a>
                            <div class="subjname"><a href="video.php">// HTML 4.01</a></div>
                            <div class="subjcat">// web design</div>
                        </div>
                         <div class="subtile"> 
                            <a href="video.php"><img src="images/va/tile_03.png" /></a>
                            <div class="subjname"><a href="video.php">// HTML 4.01</a></div>
                            <div class="subjcat">// web design</div>
                        </div>
                        <div class="subtile"> 
                            <a class="" data-toggle="modal" href="#myModal2">
                                <img src="images/va/add_img.jpg" />
                            </a>
                        </div>
                         <!-- Modal -->
                            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Add a new subject</h4>
                                        </div>
                                        <div class="modal-body">

                                            <form role="form">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Subject Name</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="New Subject name here...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Catagory</label>
                                   <select class="form-control m-bot15">
                                        <option>Web Design</option>
                                        <option>Web Development</option>
                                        <option>Graphic Design</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Subject Thumb</label>
                                    <input type="file" id="exampleInputFile">
                                    <p class="help-block">(<i>Recommended Size = 159px X 191px</i>)</p>
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
                         <!----Model ends here---->
                    </div>
                </section>
            </div>
        </div>
        <!--<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            	
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Select Catagory</label>
                                    <select class="form-control m-bot15">
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Choose the name</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <input type="file" id="exampleInputFile">
                                    <p class="help-block">Example block-level help text here.</p>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Check me out
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                            </div>
                                
                        </div>
                    </section>

            </div>            
        </div>-->
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->
<!--right sidebar start-->
<div class="right-sidebar">
<div class="search-row">
    <input type="text" placeholder="Search" class="form-control">
</div>
<div class="right-stat-bar">
<ul class="right-side-accordion">
<li class="widget-collapsible">
    <a href="#" class="head widget-head red-bg active clearfix">
        <span class="pull-left">work progress (5)</span>
        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
    </a>
    <ul class="widget-container">
        <li>
            <div class="prog-row side-mini-stat clearfix">
                <div class="side-graph-info">
                    <h4>Target sell</h4>
                    <p>
                        25%, Deadline 12 june 13
                    </p>
                </div>
                <div class="side-mini-graph">
                    <div class="target-sell">
                    </div>
                </div>
            </div>
            <div class="prog-row side-mini-stat">
                <div class="side-graph-info">
                    <h4>product delivery</h4>
                    <p>
                        55%, Deadline 12 june 13
                    </p>
                </div>
                <div class="side-mini-graph">
                    <div class="p-delivery">
                        <div class="sparkline" data-type="bar" data-resize="true" data-height="30" data-width="90%" data-bar-color="#39b7ab" data-bar-width="5" data-data="[200,135,667,333,526,996,564,123,890,564,455]">
                        </div>
                    </div>
                </div>
            </div>
            <div class="prog-row side-mini-stat">
                <div class="side-graph-info payment-info">
                    <h4>payment collection</h4>
                    <p>
                        25%, Deadline 12 june 13
                    </p>
                </div>
                <div class="side-mini-graph">
                    <div class="p-collection">
						<span class="pc-epie-chart" data-percent="45">
						<span class="percent"></span>
						</span>
                    </div>
                </div>
            </div>
            <div class="prog-row side-mini-stat">
                <div class="side-graph-info">
                    <h4>delivery pending</h4>
                    <p>
                        44%, Deadline 12 june 13
                    </p>
                </div>
                <div class="side-mini-graph">
                    <div class="d-pending">
                    </div>
                </div>
            </div>
            <div class="prog-row side-mini-stat">
                <div class="col-md-12">
                    <h4>total progress</h4>
                    <p>
                        50%, Deadline 12 june 13
                    </p>
                    <div class="progress progress-xs mtop10">
                        <div style="width: 50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info">
                            <span class="sr-only">50% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</li>
<li class="widget-collapsible">
    <a href="#" class="head widget-head terques-bg active clearfix">
        <span class="pull-left">contact online (5)</span>
        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
    </a>
    <ul class="widget-container">
        <li>
            <div class="prog-row">
                <div class="user-thumb">
                    <a href="#"><img src="images/avatar1_small.jpg" alt=""></a>
                </div>
                <div class="user-details">
                    <h4><a href="#">Jonathan Smith</a></h4>
                    <p>
                        Work for fun
                    </p>
                </div>
                <div class="user-status text-danger">
                    <i class="fa fa-comments-o"></i>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb">
                    <a href="#"><img src="images/avatar1.jpg" alt=""></a>
                </div>
                <div class="user-details">
                    <h4><a href="#">Anjelina Joe</a></h4>
                    <p>
                        Available
                    </p>
                </div>
                <div class="user-status text-success">
                    <i class="fa fa-comments-o"></i>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb">
                    <a href="#"><img src="images/chat-avatar2.jpg" alt=""></a>
                </div>
                <div class="user-details">
                    <h4><a href="#">John Doe</a></h4>
                    <p>
                        Away from Desk
                    </p>
                </div>
                <div class="user-status text-warning">
                    <i class="fa fa-comments-o"></i>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb">
                    <a href="#"><img src="images/avatar1_small.jpg" alt=""></a>
                </div>
                <div class="user-details">
                    <h4><a href="#">Mark Henry</a></h4>
                    <p>
                        working
                    </p>
                </div>
                <div class="user-status text-info">
                    <i class="fa fa-comments-o"></i>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb">
                    <a href="#"><img src="images/avatar1.jpg" alt=""></a>
                </div>
                <div class="user-details">
                    <h4><a href="#">Shila Jones</a></h4>
                    <p>
                        Work for fun
                    </p>
                </div>
                <div class="user-status text-danger">
                    <i class="fa fa-comments-o"></i>
                </div>
            </div>
            <p class="text-center">
                <a href="#" class="view-btn">View all Contacts</a>
            </p>
        </li>
    </ul>
</li>
<li class="widget-collapsible">
    <a href="#" class="head widget-head purple-bg active">
        <span class="pull-left"> recent activity (3)</span>
        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
    </a>
    <ul class="widget-container">
        <li>
            <div class="prog-row">
                <div class="user-thumb rsn-activity">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="rsn-details ">
                    <p class="text-muted">
                        just now
                    </p>
                    <p>
                        <a href="#">Jim Doe </a>Purchased new equipments for zonal office setup
                    </p>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb rsn-activity">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="rsn-details ">
                    <p class="text-muted">
                        2 min ago
                    </p>
                    <p>
                        <a href="#">Jane Doe </a>Purchased new equipments for zonal office setup
                    </p>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb rsn-activity">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="rsn-details ">
                    <p class="text-muted">
                        1 day ago
                    </p>
                    <p>
                        <a href="#">Jim Doe </a>Purchased new equipments for zonal office setup
                    </p>
                </div>
            </div>
        </li>
    </ul>
</li>
<li class="widget-collapsible">
    <a href="#" class="head widget-head yellow-bg active">
        <span class="pull-left"> shipment status</span>
        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
    </a>
    <ul class="widget-container">
        <li>
            <div class="col-md-12">
                <div class="prog-row">
                    <p>
                        Full sleeve baby wear (SL: 17665)
                    </p>
                    <div class="progress progress-xs mtop10">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                            <span class="sr-only">40% Complete</span>
                        </div>
                    </div>
                </div>
                <div class="prog-row">
                    <p>
                        Full sleeve baby wear (SL: 17665)
                    </p>
                    <div class="progress progress-xs mtop10">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                            <span class="sr-only">70% Completed</span>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</li>
</ul>
</div>
</div>
<!--right sidebar end-->
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


<!--common script init for all pages-->
<script src="js/scripts.js"></script>
<!--script for this page-->


<script>

$(document).ready(function(e) {
    $("#pages_bthumb").click(function(){
		$.ajax({
			type:"POST",
			data: "DoLoadBThumb=0",
			url:"pages/beginners_thumb.php",
			cache:false,
			beforeSend: function(){
				$(".blackwall").css("display", "block");
			},
			success: function(pageContent){
				$(".blackwall").css("display", "none");
				$("#LoadPage").html(pageContent);
			} 
		});
		return false;
	});
});

</script>
<script type="text/javascript">

	$(function(){

		// global setting override
        /*
		$.extend($.gritter.options, {
		    class_name: 'gritter-light', // for light notifications (can be added directly to $.gritter.add too)
		    position: 'bottom-left', // possibilities: bottom-left, bottom-right, top-left, top-right
			fade_in_speed: 100, // how fast notifications fade in (string or int)
			fade_out_speed: 100, // how fast the notices fade out
			time: 3000 // hang on the screen for...
		});
        */

		$('#add-sticky').click(function(){

			var unique_id = $.gritter.add({
				// (string | mandatory) the heading of the notification
				title: 'This is a sticky notice!',
				// (string | mandatory) the text inside the notification
				text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" style="color:#ccc">magnis dis parturient</a> montes, nascetur ridiculus mus.',
				// (string | optional) the image to display on the left
				image: 'http://s3.amazonaws.com/twitter_production/profile_images/132499022/myface_bigger.jpg',
				// (bool | optional) if you want it to fade out on its own or just sit there
				sticky: true,
				// (int | optional) the time you want it to be alive for before fading out
				time: '',
				// (string | optional) the class name you want to apply to that specific message
				class_name: 'my-sticky-class'
			});

			// You can have it return a unique id, this can be used to manually remove it later using
			/*
			setTimeout(function(){

				$.gritter.remove(unique_id, {
					fade: true,
					speed: 'slow'
				});

			}, 6000)
			*/

			return false;

		});

		$('#add-regular').click(function(){

			$.gritter.add({
				// (string | mandatory) the heading of the notification
				title: 'This is a regular notice!',
				// (string | mandatory) the text inside the notification
				text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" style="color:#ccc">magnis dis parturient</a> montes, nascetur ridiculus mus.',
				// (string | optional) the image to display on the left
				image: 'http://a0.twimg.com/profile_images/59268975/jquery_avatar_bigger.png',
				// (bool | optional) if you want it to fade out on its own or just sit there
				sticky: false,
				// (int | optional) the time you want it to be alive for before fading out
				time: ''
			});

			return false;

		});

        $('#add-max').click(function(){

            $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: 'This is a notice with a max of 3 on screen at one time!',
                // (string | mandatory) the text inside the notification
                text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" style="color:#ccc">magnis dis parturient</a> montes, nascetur ridiculus mus.',
                // (string | optional) the image to display on the left
                image: 'http://a0.twimg.com/profile_images/59268975/jquery_avatar_bigger.png',
                // (bool | optional) if you want it to fade out on its own or just sit there
                sticky: false,
                // (function) before the gritter notice is opened
                before_open: function(){
                    if($('.gritter-item-wrapper').length == 3)
                    {
                        // Returning false prevents a new gritter from opening
                        return false;
                    }
                }
            });

            return false;

        });

		$('#add-without-image').click(function(){

			$.gritter.add({
				// (string | mandatory) the heading of the notification
				title: 'This is a notice without an image!',
				// (string | mandatory) the text inside the notification
				text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" style="color:#ccc">magnis dis parturient</a> montes, nascetur ridiculus mus.'
			});

			return false;
		});

        $('#add-gritter-light').click(function(){

            $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: 'This is a light notification',
                // (string | mandatory) the text inside the notification
                text: 'Just add a "gritter-light" class_name to your $.gritter.add or globally to $.gritter.options.class_name',
                class_name: 'gritter-light'
            });

            return false;
        });

		$('#add-with-callbacks').click(function(){

			$.gritter.add({
				// (string | mandatory) the heading of the notification
				title: 'This is a notice with callbacks!',
				// (string | mandatory) the text inside the notification
				text: 'The callback is...',
				// (function | optional) function called before it opens
				before_open: function(){
					alert('I am called before it opens');
				},
				// (function | optional) function called after it opens
				after_open: function(e){
					alert("I am called after it opens: \nI am passed the jQuery object for the created Gritter element...\n" + e);
				},
				// (function | optional) function called before it closes
				before_close: function(e, manual_close){
                    var manually = (manual_close) ? 'The "X" was clicked to close me!' : '';
					alert("I am called before it closes: I am passed the jQuery object for the Gritter element... \n" + manually);
				},
				// (function | optional) function called after it closes
				after_close: function(e, manual_close){
                    var manually = (manual_close) ? 'The "X" was clicked to close me!' : '';
					alert('I am called after it closes. ' + manually);
				}
			});

			return false;
		});

		$('#add-sticky-with-callbacks').click(function(){

			$.gritter.add({
				// (string | mandatory) the heading of the notification
				title: 'This is a sticky notice with callbacks!',
				// (string | mandatory) the text inside the notification
				text: 'Sticky sticky notice.. sticky sticky notice...',
				// Stickeh!
				sticky: true,
				// (function | optional) function called before it opens
				before_open: function(){
					alert('I am a sticky called before it opens');
				},
				// (function | optional) function called after it opens
				after_open: function(e){
					alert("I am a sticky called after it opens: \nI am passed the jQuery object for the created Gritter element...\n" + e);
				},
				// (function | optional) function called before it closes
				before_close: function(e){
					alert("I am a sticky called before it closes: I am passed the jQuery object for the Gritter element... \n" + e);
				},
				// (function | optional) function called after it closes
				after_close: function(){
					alert('I am a sticky called after it closes');
				}
			});

			return false;

		});

		$("#remove-all").click(function(){

			$.gritter.removeAll();
			return false;

		});

		$("#remove-all-with-callbacks").click(function(){

			$.gritter.removeAll({
				before_close: function(e){
					alert("I am called before all notifications are closed.  I am passed the jQuery object containing all  of Gritter notifications.\n" + e);
				},
				after_close: function(){
					alert('I am called after everything has been closed.');
				}
			});
			return false;

		});


	});
</script>
</body>

<!-- Mirrored from bucketadmin.themebucket.net/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 May 2014 09:18:28 GMT -->
</html>
