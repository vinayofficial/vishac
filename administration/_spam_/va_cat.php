<?php
	include 'db_docs/db_con.php';	
	// escape variables for security
	if(isset($_POST['btn_savelevel'])){	
		$newlevel= $_POST['newlevelname'];
		$date = date('Y-m-d H:i:s');	
		$sql="INSERT INTO va_levels (level_name,level_madeon) VALUES ('$newlevel','$date')";	
		if (!mysqli_query($con,$sql)) {
		  die('Error: ' . mysqli_error($con));
		}
		echo 'value submitted';
	}	
	//Deletion
	if(isset($_GET['del'])){
		$delid = $_GET['del'];
		$query = "DELETE FROM va_levels WHERE level_id = $delid";
		$del = mysqli_query($con,$query);
		if(!$del){
			echo mysql_error();
		}
		else{
			header('location:va_cat.php');
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="images/favicon.html">
	<?php include_once 'pages/default_url.php'; ?>
    <title>Base Addition</title>
    <!--Core CSS -->
    <link href="bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
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
        <!--Ajax loader-->
		<div class="blackwall">
        	<center><h2>Loading...</h2></center>
        </div>
        <div class="row">
            <div class="col-sm-12" id="LoadPage">
                <!--section / uploaded series name goes here-->
            </div>
        </div>
        <div class="row">
        	<div class="col-sm-6">
                    <section class="panel">
                        <header class="panel-heading">
								Manage Levels
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                <a href="javascript:;" class="fa fa-cog"></a>
                                <a href="javascript:;" class="fa fa-times"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                        	<form name="customize_levels" id="customize_levels" method="post" action=""> 
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Level Name</th>
                                    <th>Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                  	<?php										
										$query = 'SELECT * FROM va_levels';
										$result = mysqli_query($con,$query);
										if(!$result){
											die('facing error in query firing');
										}
										while($row = mysqli_fetch_assoc($result)){
										?>
									<tr>
									<td><?php echo $row['level_id']  ?></td>
                                    <td><?php echo $row['level_name'] ?></td>
                                    <td>
                                    	<a href="process/editing/edit_level.php?edit=<?php echo $row['level_id'] ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> EDIT</a>
                                        <a href="va_cat.php?del=<?php echo $row['level_id']?>" class="btn btn-danger btn-xs" name="delete_level" id="delete_level" data-toggle="modal"><i class="fa fa-trash-o"></i> Delete</a>                                            
                                    </td> 
									</tr>
									<?php 
									}																		
                                    ?>
                                </tbody>
                            </table>
                            </form>
                            <a class="btn btn-success" data-toggle="modal" href="#myModal">
                                <i class="fa fa-plus"> Add level</i>
                            </a>
                        </div>
                    </section>
                </div>
            <div class="col-sm-6">
                    <section class="panel">
                        <header class="panel-heading">
								Manage Catagories
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                <a href="javascript:;" class="fa fa-cog"></a>
                                <a href="javascript:;" class="fa fa-times"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Catagory Name</th>
                                    <th>Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Web Design</td>
                                    <td>
                                    	<a class="btn btn-info btn-xs" data-toggle="modal" href="#add_cat_popup">
                                            <i class="fa fa-edit"> EDIT</i>
                                        </a>
                                    	<a class="btn btn-danger btn-xs" data-toggle="modal" href="#delete_warning_popup">
                                            <i class="fa fa-trash-o"> DELETE</i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Web Development</td>
                                    <td>
                                    	<button type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> EDIT</button>
                                        <a class="btn btn-danger btn-xs" data-toggle="modal" href="#delete_warning_popup">
                                            <i class="fa fa-trash-o"> DELETE</i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Graphic Design</td>
                                    <td>
                                    	<button type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> EDIT</button>
                                        <a class="btn btn-danger btn-xs" data-toggle="modal" href="#delete_warning_popup">
                                            <i class="fa fa-trash-o"> DELETE</i>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <a class="btn btn-success" data-toggle="modal" href="#add_cat_popup">
                                <i class="fa fa-plus"> Add Catagory</i>
                            </a>
                        </div>
                    </section>
                </div>                                   
        </div>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->
<!--right sidebar will goes here-->
<!-- Modal for ADD LEVEL -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-plus-square"></i> ADD More LEVEL</h4>
            </div>
            <div class="modal-body">
               <div class="position-center">
                     		<form role="form" name="newlevelform" id="newlevelform" method="post" action="">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Type New Level name</label>
                                    <input type="text" class="form-control" id="newlevelname" name="newlevelname" placeholder="New level name..">
                                </div>                                                                                       
                            
               </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button"> &times; Close</button>
                <input type="submit" class="btn btn-primary" id="btn_savelevel" name="btn_savelevel" value="save Level" />
                </form>
            </div>            
        </div>
    </div>
</div>
<!-- Modal for EDIT LEVEL -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal Tittle</h4>
            </div>
            <div class="modal-body">

                Body goes here...

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                <button class="btn btn-success" type="button">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal for ADD  CATAGORY-->
<div class="modal fade" id="add_cat_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-plus-square"></i> ADD More Catagories</h4>
            </div>
            <div class="modal-body">
               <div class="position-center">
                     		<form role="form">
                                <div class="form-group">
                                
									<select>
                                	<?php										
										$query = 'SELECT * FROM va_levels';
										$result = mysqli_query($con,$query);
										if(!$result){
											die('facing error in query firing');
										}
										while($row = mysqli_fetch_assoc($result)){
											echo '
                                    <option>'.$row['level_name'].'</option>';
									}									
                                    ?>                                    
									</select>
                                    <label for="exampleInputEmail1">Type New catagory name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="New catagory name..">
                                </div>                                                                                       
                            </form>
               </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button"> &times; Close</button>
                <button class="btn btn-primary" type="button"><i class="fa fa-save"></i> Save Catagories</button>
            </div>            
        </div>
    </div>
</div>
<!-- Modal for EDIT CATAGORY -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal Tittle</h4>
            </div>
            <div class="modal-body">

                Body goes here...

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                <button class="btn btn-success" type="button">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal for DELETE -->
<div class="modal fade" id="delete_warning_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-warning"></i> DELETE Warning</h4>
            </div>
            <div class="modal-body">

                <h3 class="text-danger">Sahi me DELETE kar du ??</h3>

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">&otimes; Nah, Rehndo</button>
                <button class="btn btn-danger" type="button"><i class="fa fa-trash-o"></i> Hao, Kardo</button>
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


<!--common script init for all pages-->
<script src="js/scripts.js"></script>

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
<?php mysqli_close($con); ?>
</body>

<!-- Mirrored from bucketadmin.themebucket.net/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 May 2014 09:18:28 GMT -->
</html>
