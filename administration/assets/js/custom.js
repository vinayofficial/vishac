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

$("table.lets-edit td").on('click',function(){
	$(this).attr("contenteditable","true");
});

$("table.lets-edit td").on('blur',function(){
	$(this).removeAttr("contenteditable");	
	var newval = $(this).text();
	var field = $(this).attr('class');
	var tblname = $(this).closest('table').attr('id');
	var id_val = $(this).closest('tr').attr('id');
	var id_fld  = $(this).closest('tr').attr('class');
	var date_fld = $(this).closest('table').attr('data-date');	
	//alert(date_fld);
	//return false;
	$.post('assets/ajax/custom_ajax.php',{
		id_fld : id_fld,
		id_val : id_val,
		tblname : tblname,
		field : field,
		newval : newval,
		date_fld : date_fld},
		function(data){
			alert(data);
	});
});