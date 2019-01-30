(function($){
	"use strict";
	$(document).ready(function(){
		// Minisite Sidebar Multilevel
		$("#minisite_sidebar_nav > li").filter('.current,.section').addClass('open');
		$("#minisite_sidebar_nav .control").unbind('click').click(function(){
			var li=$(this).parent();
			if(li.hasClass('open')){
				$(this).siblings('ul').slideUp(200,'linear',function(){
					li.removeClass('open').addClass('closed');
				});
			}else{
				li.removeClass('closed').addClass('open');
				$(this).siblings('ul').slideDown(200);
			}
		});
	});
}(jQuery));