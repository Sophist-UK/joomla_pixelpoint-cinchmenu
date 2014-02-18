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
jQuery(document).ready(function($){

	var acMenu = $("#flyout_menu_<?php echo $module->id;?>");
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
	
<?php if($event == "click"){?>
	acMenu.find(".item-wrapper").click(function(){
		var li = $(this).parent();
		if(!li.hasClass("opened")){
			var openedLi = li.parent().children(".opened");
			var ul = li.children(".ul-wrapper");
			openedLi.children(".ul-wrapper").hide(<?php echo $duration;?>);
			openedLi.removeClass("opened");
			openedLi.children(".item-wrapper").children(".menu-button").children("img").attr("src", "<?php echo $bulletImage;?>");
			li.addClass("opened");
			li.children(".item-wrapper").children(".menu-button").children("img").attr("src", "<?php echo $bulletActive;?>");
			ul.show(<?php echo $duration;?>);
		}else{
			li.children(".ul-wrapper").hide(<?php echo $duration;?>);
			li.removeClass("opened");
			li.children(".item-wrapper").children(".menu-button").children("img").attr("src", "<?php echo $bulletImage;?>");
		}
		return false;
	});
	$("body").click(function(){
		$(".opened").removeClass("opened");
		$(".ul-wrapper").hide(<?php echo $duration;?>); 
	});	
});
<?php echo "</script>";}else{?>
	acMenu.find("li").mouseenter(function(){
		var ul = $(this).children(".ul_wrapper_<?php echo $module->id;?>");
		$(this).addClass("opened");
		ul.show(<?php echo $duration;?>);
		$(this).children(".item_wrapper_<?php echo $module->id;?>").children(".menu_button_<?php echo $module->id;?>").children("img").attr("src", "<?php echo $bulletActive;?>");
	}).mouseleave(function(){
		$(this).children(".ul_wrapper_<?php echo $module->id;?>").hide(<?php echo $duration;?>);
		$(this).removeClass("opened");
		$(this).children(".item_wrapper_<?php echo $module->id;?>").children(".menu_button_<?php echo $module->id;?>").children("img").attr("src", "<?php echo $bulletImage;?>");
		$(this).find(".ul_wrapper_<?php echo $module->id;?>").css("display","none");
		$(this).find(".opened").removeClass("opened");
	});
});
<?php echo "</script>";} ?>
