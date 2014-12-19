// JavaScript Document
//----------------------------------------------------------
// Updating subject in select list on manage_fbcommentboxes |
//----------------------------------------------------------
var get_subjects_name = function(){
	var c_level = $.trim($("#plugin_level").val());
	var c_cats = $.trim($("#plugin_cat").val());
	if(c_level != '' && c_cats != ''){
			//ajax function
			$.post('assets/ajax/custom_ajax.php',{
			level : c_level,
			cat : c_cats
			},
			function(data){
				//alert(data);				
				$("#plugin_subj").html(data);				
			}
		);
			//ends here
	}		
	return false;
}

$("#plugin_cat").on('change', get_subjects_name);
$("#plugin_level").on('change', get_subjects_name);

//----------------------------------------------------------
// -----------------------------creating table td editable |
//----------------------------------------------------------

$("table.lets-edit td").on('dblclick',function(){
	$(this).attr("contenteditable","true");
});

$("table.lets-edit td").on('blur',function(){
	$(this).removeAttr("contenteditable");
		
});