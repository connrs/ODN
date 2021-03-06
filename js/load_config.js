$(document).ready(function() {

	setup_modal_dialogs();
	
	$("#ServiceTitle").each(function() {
		if($(this).val()!='other') {
			$(this).parent().next("input").removeAttr('name').hide();
		};
	});
	
	$("#ServiceTitle").change(function() {
		var desiredName = $(this).attr('name');
		if($(this).val()=='other') {
			$(this).parent().next("input").attr('name',desiredName).fadeIn('fast');
			$(this).parent().next("input").select();
		} else {
			$(this).parent().next("input").removeAttr('name').fadeOut('fast');
		}
	});

	$('.customer_menu').addClass('jd_menu').jdMenu();
	
	$('ul.note_list li,.infobox div[class*=highlight]').bind('mouseover',function(e){
		var currClass = $(this).attr('class');
		var match = /highlight_/i;
		var start = currClass.search(match);
		var hstring = currClass.substr(start);
		if(hstring!='') {
			$('.'+hstring).attr('rel','highlight').data('highlighted','yes');
		}
	});

	$('ul.note_list li,.infobox div[class*=highlight]').bind('mouseout',function(e){
		var currClass = $(this).attr('class');
		var match = /highlight_/i;
		var start = currClass.search(match);
		var hstring = currClass.substr(start);
		var isChild = $(e.currentTarget).has($(e.relatedTarget)).length;
		if(!(isChild) && hstring!='') {
			$('.'+hstring).data('highlighted','no');
			window.setTimeout(function() {
				if($('.'+hstring).data('highlighted')=='no') {
					$('.'+hstring).attr('rel','');
				}
			},500);
		}
	});

	$('.collapse_hook').bind('click',function(e){
		$(this).parent().find('.collapse').toggle('slow');
		$(this).toggleClass('hidemore');
	});
	
	$('#d_menu li').filter(function(index){ return $('div',this).length==1; }).bind({
		mouseover: function(e){
			var isChild = $(e.currentTarget).has($(e.relatedTarget)).length;
			if(!isChild) {
				var leftpoint = $(this).position().left + 'px';
				$(this).children('div').css('left',leftpoint).fadeIn('fast');
			}
		},
		mouseout: function(e){
			var isChild = $(e.currentTarget).has($(e.relatedTarget)).length;
			if(!(isChild)) {
				$(this).children('div').fadeOut('fast')
			}
		}
	});

	$('#content > h2, .infobox > h3, .infobox h4, .infobox h5, div.note_list ul.note_list h3').hookMenu();
	$('ul.tab_hooks').duxTab();
	$('ul.hook_ajax_pagination').hookPagination();

});