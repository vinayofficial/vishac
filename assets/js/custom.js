// JavaScript Document
$('#altsend').on('click', function(){
	var fullname = $.trim($('#altname').val());
	var alertmail = $.trim($('#altmail').val());
	$.post('../ajaxian/ajaxer.php', 		
		{
			name : fullname
		}, 
		function(data){alert(data)
	});	
});