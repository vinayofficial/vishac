// JavaScript Document
$('#altsend').on('click', function(){
	var fullname = $.trim($('#vstrname').val());
	var alertmail = $.trim($('#vstrmail ').val());
	$.post('assets/ajaxian/ajaxer.php',{
		name : fullname,
		email : alertmail},
		function(data){
			$('.footbx:nth-child(2)').html('<h3> <i class="fa fa-bell fa-2x"></i> '+data+'</h3>');
			$('#vstrname').val('');
			$('#vstrmail ').val('');
		}
	);
	return false;
});