jQuery(document).ready(function($){
		
	$('.vertical-tabs').before('<div class="branding">Boutique Framework 1.1</div>');
	$(".vertical-tab-button:eq(0)").addClass('global');
	$(".vertical-tab-button:eq(1)").addClass('regions');
	$(".vertical-tab-button:eq(2)").addClass('layout');
	$(".vertical-tab-button:eq(3)").addClass('contact');

	$id = $('#edit-color-scheme');
	$id.hide();

	switch($('#edit-color-scheme').val()){
		case "green": $('a.skin_default').parent().addClass('active'); break;
		case "blue": $('a.skin_blue').parent().addClass('active'); break;
		case "orange": $('a.skin_orange').parent().addClass('active'); break;
	}

	$('a.skin_default').click(function(){ 
		$id.val('green'); 
		$(this).parent().addClass('active');
		$('a.skin_blue, a.skin_orange').parent().removeClass('active');
	});	

	$('a.skin_blue').click(function(){ 
		$id.val('blue'); 
		$(this).parent().addClass('active');
		$('a.skin_default, a.skin_orange').parent().removeClass('active');
	});

	$('a.skin_orange').click(function(){
		$id.val('orange'); 
		$(this).parent().addClass('active');
		$('a.skin_blue, a.skin_default').parent().removeClass('active');
	});		      

});
