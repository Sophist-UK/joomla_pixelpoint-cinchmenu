<?php
/*
* Pixel Point Creative - Cinch Menu Module
* License: GNU General Public License version
* See: http://www.gnu.org/copyleft/gpl.html
* Copyright (c) Pixel Point Creative LLC.
* More info at http://www.pixelpointcreative.com
* Last Updated: 3/14/13
*/

defined( '_JEXEC' ) or die( 'Restricted access' ); ?>

<script type="text/javascript">
jQuery(document).ready(function($){

	var acMenu = $("#flyout_menu_<?php echo $module->id;?>");
	acMenu.children("li").first().addClass("first");
	acMenu.children("li").last().addClass("last");
	acMenu.find("ul").each(function() {
		$(this).children("li").first().addClass("first");
		$(this).children("li").last().addClass("last");
	});
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
		if(li.hasClass("opened")){
			// Close this item and once hide is complete, ensure children are also closed
			li.children(".ul-wrapper").hide(<?php echo $duration;?>, function() {
				li.find(".item-wrapper > .menu-button > img").attr("src", "<?php echo $bulletImage;?>");
				li.find("li.opened").removeClass("opened");
				li.removeClass("opened");
			});
		}else{
			// Close all siblings (and their children) and open this one
			var openedLi = li.parent().children("li.opened");
			openedLi.children(".ul-wrapper").hide(<?php echo $duration;?>, function() {
				openedLi.find(".item-wrapper > .menu-button > img").attr("src", "<?php echo $bulletImage;?>");
				openedLi.find("li.opened").removeClass("opened");
				openedLi.find(".ul-wrapper").css("display","none");
				openedLi.removeClass("opened");
			});
			li.addClass("opened");
			li.children(".item-wrapper").children(".menu-button").children("img").attr("src", "<?php echo $bulletActive;?>");
			li.children(".ul-wrapper").show(<?php echo $duration;?>);
		}
		return false;
	});
	$("body").click(function(){
		$(".flyout-menu .opened").removeClass("opened");
		$(".flyout-menu .ul-wrapper").hide(<?php echo $duration;?>);
	});
});
<?php }else{ ?>
	acMenu.find("li").mouseenter(function(){
		$(this).addClass("opened");
		$(this).children(".item-wrapper").children(".menu-button").children("img").attr("src", "<?php echo $bulletActive;?>");
		$(this).children(".ul-wrapper").show(<?php echo $duration;?>);
	}).mouseleave(function(){
		$(this).children(".ul-wrapper").hide(<?php echo $duration;?>);
		$(this).removeClass("opened");
		$(this).children(".item-wrapper").children(".menu-button").children("img").attr("src", "<?php echo $bulletImage;?>");
		$(this).find(".opened").removeClass("opened");
	});
});
<?php } ?>
</script>
