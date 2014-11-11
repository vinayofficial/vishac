<?php require_once '../inc_/functions.php'; ?>
<?php include_once '../inc_/_dbconnector.php'; ?>
<?php
	// submitting SEO Information
	if(isset($_POST['submit_seo'])){
		$page = $_POST['nav_id'];
		$metatitle = $_POST['page_title'];
		$page_desc = $_POST['page_description'];
		$insertseo = "UPDATE header_nav SET page_metatitle='$metatitle', page_metadesc='$page_desc' WHERE nav_id='$page'";
		$fireseo = mysqli_query($dbcon,$insertseo) or die('meta information submission process FAILED !!!');
		if($fireseo){
		header('Location :'.$_SERVER['PHP_SELF']);
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>vishAcademy | manage header </title>
    <?php require_once '../inc_/css_bundle.php';?>    
    <link rel="stylesheet" href="assets/css/bootstrap-switch.css" />
</head>
<body>
<section id="container">
<!--header start-->
<?php include_once '../inc_/admn_header.php';?>
<!--header end-->
<!--sidebar start-->
<?php include_once '../inc_/main_nav.php';?>
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
                            <a href="#seoModal" style="color:#fff;" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Update SEO</a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <table class="table  table-hover general-table">
                            <thead>
                            <tr>
                                <th> #</th>
                                <th>Page</th>
                                <th>page URL</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Edit</th>
                                <th>Delete</th>     
                                <th>User visit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            	$nav_select = 'select * from header_nav';
								$nav_query = mysqli_query($dbcon,$nav_select);
								if(!$nav_query){echo 'can not data selected';}	
								$i=1;															
								while($fetch_nav= mysqli_fetch_assoc($nav_query)){																
							?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $fetch_nav['nav_name']; ?></td>
                                <td><?php echo $fetch_nav['nav_url'] ?></td>
                                <td><?php echo $fetch_nav['page_metatitle']?></td>
                                <td><?php echo $fetch_nav['page_metadesc']?></td>
                                <td><a href="crud/manipulate.php?enav=<?php echo $fetch_nav['nav_id']; ?>" class="btn btn-primary" onClick="return confirm('We are going to edit : <?php echo $fetch_nav['nav_name'] ?>');" ><i class="fa fa-pencil"></i></a>    
                                </td>
                                <td><a href="crud/trash.php?delnav=<?php echo $fetch_nav['nav_id']; ?>" class="btn btn-danger" onClick="return confirm('Are you sure ?');"><i class="fa fa-trash-o"></i></a></td>                                
                                <td><a href="<?php echo USER_BASEURL.$fetch_nav['nav_url']?>" class="btn btn-primary" target="_blank"><i class="fa fa-users"></i> Users  </a></td>
                            </tr>    
                            <?php $i++; } ?>
                            </tbody>
                        </table>
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
<!--ADD SEO FOR PAGE MODAL-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="seoModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button"><i class="fa fa-times-circle"></i></button>
                                        <h4 class="modal-title"><i class="fa fa-plus-square"></i> Add SEO information for pages</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form role="form" name="page_seo" id="page_seo" method="post" action="<?php echo $_SERVER['PHP_SELF'].'?send' ?>">
                                        	<div class="form-group">
                                                <label for="new_menu_name">Page Name</label>
                                                <select class="form-control m-bot15" name="nav_id" id="nav_id">
                                                <option>---select page for SEO---</option>
                                                <?php
                                                	$nav_select = 'select * from header_nav';
													$nav_query = mysqli_query($dbcon,$nav_select);
													while($fetch_nav= mysqli_fetch_assoc($nav_query)){
												?>
                                                	
                                                    <option name="<?php echo $fetch_nav['nav_id']; ?>" value="<?php echo $fetch_nav['nav_id']; ?>"><?php echo $fetch_nav['nav_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="new_menu_name">Page title</label>
                                                <input type="text" class="form-control" name="page_title" id="page_title" placeholder="Meta page title">
                                            </div>
                                            <div class="form-group">
                                                <label for="new_menu_url">Page Description</label>
                                                <textarea class="form-control" rows="3" name="page_description">
                                                </textarea>
                                            </div>                                            
                                            <button type="submit" name="submit_seo" id="submit_seo" class="btn btn-primary">Submit SEO information</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
<!---->

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
