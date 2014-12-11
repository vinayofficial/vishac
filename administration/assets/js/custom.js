// JavaScript Document
$("#plugin_level").on('change',function(){
	var x = $(this).val();
	$.post('../ajax/custom_ajax.php',{
		level = x
	});
});