<? // General / foundation files ?>
<link rel="stylesheet" href="<?php echo SITE_PATH ?>assets/styles/style.css" />
<link rel="stylesheet" href="<?php echo SITE_PATH ?>assets/styles/screens.css" />
<link rel="stylesheet" href="<?php echo SITE_PATH ?>assets/plugs/awesome/css/font-awesome.css" /> 
<script src="<?php  echo SITE_PATH ?>assets/js/jquery-1.11.0.min.js"></script>
<script src="<?php //echo SITE_PATH ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo SITE_PATH ?>assets/js/platform.js"></script>
<!--sidr-->
<link rel="stylesheet" href="<?php echo SITE_PATH ?>assets/plugs/sidr/stylesheets/jquery.sidr.light.css" />
<script src="<?php echo SITE_PATH ?>assets/plugs/sidr/jquery.sidr.min.js"></script>
<script>$(document).ready(function() {$('#playlist-btn,.sidrman').sidr();});</script>
<?php #accordians ?>
<link rel="stylesheet" href="<?php echo SITE_PATH ?>assets/styles/colorbox.css" />
<link rel="stylesheet" href="<?php echo SITE_PATH ?>assets/styles/mediabox.css" />
<script src="<?php echo SITE_PATH ?>assets/js/jquery.colorbox.js"></script>
<script src="<?php echo SITE_PATH ?>assets/js/jMenu.js"></script>
<?php #Code highlight ?>
<link href="<?php echo SITE_PATH ?>assets/plugs/highlight/styles/docco.css" rel="stylesheet" />
<script src="<?php echo SITE_PATH ?>assets/plugs/highlight/highlight.pack.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
<?php #Bootstrap files?>
<link href="<?php echo SITE_PATH ?>assets/styles/bootstrap.min.css" rel="stylesheet">
<!-- Latest compiled and minified JavaScript -->
<script src="<?php echo SITE_PATH ?>assets/js/bootstrap.min.js"></script>

<?php #Bootstrap FIles ?>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

<?php #new simple and fast accordian ?>
<!-- JS -->
<script type="text/javascript">
  $(document).ready(function($) {
    $('#accordion').find('.accordion-toggle').click(function(){

      //Expand or collapse this panel
      $(this).next().slideToggle('fast');

      //Hide the other panels
      $(".accordion-content").not($(this).next()).slideUp('fast');

    });
  });
</script>
<!-- CSS -->
<style>
  .accordion-toggle {cursor: pointer;}
  .accordion-content {display: none;}
  .accordion-content.default {display: block;}
</style>