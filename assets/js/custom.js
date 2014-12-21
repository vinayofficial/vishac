// JavaScript Document
/*
////////////////////////User ALERT / SUBSCRIBERS
*/
var default_path = 'http://localhost/vishac/assets/ajaxian/ajaxer.php';
$('#altsend').on('click', function(){
	var fullname = $.trim($('#vstrname').val());
	var alertmail = $.trim($('#vstrmail ').val());	    					
			$.post(default_path,{
			name : fullname,
			email : alertmail},
			function(data){
				$('#alterr').html("<font color='#FE7C7C'>"+data+"</font>");
				$('#vstrname').val('');
				$('#vstrmail ').val('');
			}
		);
		
	return false;
});

/*
////////////////////////User message
*/
$('form#feedback-form').on('submit', function(){
	var msgby = $.trim($('#msgname').val());
	var msgfrom = $.trim($('#msgfrom').val());
	var msgbody = $.trim($('#msgbody').val());
	$.post(default_path,{
		msgby : msgby,
		msgfrom : msgfrom,
		msgbody : msgbody },
		function(data){
			$('#msgerr').html("<font color='#FE7C7C'>"+data+"</font>");
			$('#msgname').val('');			
			$('#msgfrom').val('');
			$('#msgbody').val('');
		}
	);
	return false;
});