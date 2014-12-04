// JavaScript Document

/*function validation(){
		
	var fullname = $.trim($('#vstrname').val());
	var alertmail = $.trim($('#vstrmail ').val());
	if(fullname == null || fullname == "" || alertmail == "" || alertmail == null){
		alert("Please fill all fields ");	
		document.getElementById('vstrname').focus();
		return false;
	}
	else {
	    if(fullname != '' || alteremail != ''){						
			$.post('assets/ajaxian/ajaxer.php',{
			name : fullname,
			email : alertmail},
			function(data){
				$('.footerform p').html(data);
				$('#vstrname').val('');
				$('#vstrmail ').val('');
			}
		);
	} else{
		
		$('.footerform p').html("<i class='fa fa-warning'></i> All fields are required :/");
			return false;
	}	
	}
}*/



/*
////////////////////////User ALERT / SUBSCRIBERS
*/
$('#altsend').on('click', function(){
	var fullname = $.trim($('#vstrname').val());
	var alertmail = $.trim($('#vstrmail ').val());	    					
			$.post('assets/ajaxian/ajaxer.php',{
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
	$.post('assets/ajaxian/ajaxer.php',{
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