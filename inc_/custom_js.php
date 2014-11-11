<?php # user navigations toggling ?>
<script>
	$(document).ready(function(){
		$('#mainav_trgr').click(function(){
			$('.usernav').slideUp();
			 $('#mainav').slideToggle();
		});
		/*user nav trigger*/
		$('#usernav_trgr').click(function(){
			$('#mainav').slideUp();
			 $('.usernav').slideToggle();
		});
	});
</script>
<?php # send message popup ?>
<script>
 	$(document).ready(function(e) {
		// Showing feedbackform
		$('.v-trgr').live('click',function(){
			$('.blackwall').fadeIn();
		});
		// Hiding feedback form
        $('.x-trgr').live('click',function(){
			$('.blackwall').fadeOut();
		});
    });
 </script>
