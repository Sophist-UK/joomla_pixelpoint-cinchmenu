<?php 
/*
* Pixel Point Creative - Cinch Menu Module
* License: GNU General Public License version
* See: http://www.gnu.org/copyleft/gpl.html
* Copyright (c) Pixel Point Creative LLC.
* More info at http://www.pixelpointcreative.com
* Last Updated: 3/14/13
*/
?>
<?php defined( '_JEXEC' ) or die( 'Restricted access' ); ?>

<script type="text/javascript">
var onProcess = false;
jQuery(document).ready(function($){
	var acMenu = $("#accordion_menu_<?php echo $module->id;?>");
	acMenu.children("li").eq(0).addClass("first");
	acMenu.children("li").eq(acMenu.children("li").length - 1 ).addClass("last");
	
	acMenu.find("a").click(function(){
		if ($(this).attr("target") == '_blank') {
			window.open($(this).attr("href"));
		} else {
			location = $(this).attr("href");
		}		
		return false;
	});
	
	try{
		var current = $("#accordion_menu_<?php echo $module->id;?> li.opened");
		var root = current.parents('.accordion-menu'), lis = current.parents('li');
		$('li', root).filter(lis).addClass('opened');
	} catch(e){
		console.log(e.message);
	}
//	if(current.length != 0){
//		while(!current.parent().hasClass("accordion-menu")){
//			if(current.parent().prop("li")){
//				current.parent().addClass("opened");
//			}
//			current = current.parent();	
//		}
//	}
	$("#accordion_menu_<?php echo $module->id;?> li.opened > .ul-wrapper").css("display","block");
	$("#accordion_menu_<?php echo $module->id;?> li.opened > .item-wrapper  .menu-button img").attr("src", "<?php echo $bulletActive;?>");
 
<?php if($event == "click"){?>
acMenu.find(".item-wrapper").click(function(){
	var li = $(this).parent();
	if(!li.hasClass("opened")){
		var openedLi = li.parent().children(".opened");
		var ul = li.children(".ul-wrapper");
		openedLi.children(".ul-wrapper").slideUp(<?php echo $duration;?>);
		openedLi.children(".item-wrapper").children(".menu-button").children("img").attr("src", "<?php echo $bulletImage;?>");
		openedLi.removeClass("opened");
		if(li.children(".ul-wrapper").length !=0){
			li.addClass("opened");
			li.children(".item-wrapper").children(".menu-button").children("img").attr("src", "<?php echo $bulletActive;?>");
			ul.slideDown(<?php echo $duration;?>);
		}
}	else{
		li.children(".item-wrapper").children(".menu-button").children("img").attr("src", "<?php echo $bulletImage;?>");
		li.children(".ul-wrapper").slideUp(<?php echo $duration;?>);
		li.removeClass("opened");
	}
	return false;
});
});
<?php echo "</script>";}else{?>
	acMenu.find("li").mouseenter(function(){
		if(onProcess) return true;
		var ul = $(this).children(".ul-wrapper");
		if(ul.length){ 
			onProcess = true;
			$(this).addClass("opened");
			$(this).children(".item-wrapper").children(".menu-button").children("img").attr("src", "<?php echo $bulletActive;?>");
			ul.slideDown(<?php echo $duration;?>,function(){
				onProcess = false;
			});
		}
	}).mouseleave(function(){
		if(onProcess) return true;
		if($(this).children(".ul-wrapper").length){ 
			onProcess = true;
			$(this).children(".item-wrapper").children(".menu-button").children("img").attr("src", "<?php echo $bulletImage;?>");
			$(this).children(".ul-wrapper").slideUp(<?php echo $duration;?>,function(){
				onProcess = false;
			});
		}
        onProcess = false;
		$(this).removeClass("opened");
	});
});
<?php echo "</script>";} ?>