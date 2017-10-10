(function($){
	"use strict";
	$(document).ready(function(){
		// Minisite Sidebar Multilevel
		$("#minisite_sidebar_nav .control").unbind('click').click(function(){
			var li=$(this).parent();
			if(li.hasClass('open')){
				$(this).siblings('ul').slideUp(200,'linear',function(){
					li.removeClass('open');
				});
			}else{
				li.addClass('open');
				$(this).siblings('ul').slideDown(200);
			}
		});
		$("#minisite_sidebar_nav .mcontrol").unbind('click').click(function(){
			var li=$(this).parent();
			if(li.hasClass('open')){
				li.siblings('li').slideUp(200,'linear',function(){
					li.removeClass('open');
				});
			}else{
				li.addClass('open');
				li.siblings('li').slideDown(200);
			}
		});

	});
}(jQuery));