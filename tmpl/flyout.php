<?php
/*
* Pixel Point Creative - Cinch Menu Module
* License: GNU General Public License version
* See: http://www.gnu.org/copyleft/gpl.html
* Copyright (c) Pixel Point Creative LLC.
* More info at http://www.pixelpointcreative.com
* Last Updated: 3/14/13
*/
// No direct access.
defined('_JEXEC') or die;

jimport('joomla.html.parameter');
JHtml::stylesheet('modules/'.$module->module.'/tmpl/css/flyout.css');
$document =& JFactory::getDocument();
include "css" . DS . "styles-flyout.php";
$document->addStyleDeclaration( $style );
include "js" . DS . "flyout.js.php";

$direction = $params->get('stype_layout') == "vertical"?"vertical":"horizontal";

if (isset($menus) && count($menus)) {
	$id = "flyout_menu_$module->id";
	$class = "flyout-menu flyout-menu-{$textAlign} " . $direction;
?>
	<!--[if lt IE 9]><ul class="<?php echo $class;?> msie lt-ie9" id="<?php echo $id;?>"><![endif]-->
	<!--[if IE 9]><ul class="<?php echo $class;?> msie" id="<?php echo $id;?>"><![endif]-->
	<!--[if gt IE 9]><!--><ul class="<?php echo $class;?>" id="<?php echo $id;?>"><!--<![endif]-->
<?php
	$countUlOpened = 1;
	$level = 1;
	for ($i = 0; $i < count($menus); $i++) {
		$class = "";
		if($menus[$i]->id == $itemID) {
			$class.= " class='current'";
		}

		$li = "	<li".$class.">\r\n";
		$li .= "		<div class='item-wrapper item_wrapper_".$module->id."'>\r\n";
		if($showBullet == "true"){
			$divMenuButton = "			<div class='menu-button menu-button-".$bulletAlign." menu_button_".$module->id."' >";
			if($i < count($menus)-1 && $menus[$i+1]->level > $menus[$i]->level){
				$divMenuButton.="<img class='menuicon' alt='' src='".$bulletImage."'/>";
			}
			$divMenuButton .= "</div>";
			$li.=$divMenuButton;
		}
		$target = "";
		switch ($menus[$i]->browserNav) :
			case 1:
				$target=" target='_blank' ";
				break;
			case 2:
				$target = " onclick=\"window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes');return false;\"";
				break;
		endswitch;
		$icon_menu = ($menus[$i]->menu_image != '')?'<img src='.JURI::base().$menus[$i]->menu_image.' alt="menu cion" />':'';
		$divLink = "			<div class='menu-link'><a".$target." href='".$menus[$i]->flink."'>".$icon_menu.$menus[$i]->title."</a></div>\r\n";
		$li.=$divLink;
		if($direction=='horizontal'){
			$li.="			<br style='clear:both;' />\r\n";
		}
		$li.= "		</div>\r\n";
		echo $li;
		if ($i < count($menus)-1 && $menus[$i+1]->level > $menus[$i]->level) {
			echo "	<div class='ul-wrapper direction-".$menu_direction." ul_wrapper_".$module->id."'><ul>\r\n";
			$countUlOpened++;
			$level++;
		}
		if ($i < count($menus)-1 && $menus[$i+1]->level < $menus[$i]->level) {
			echo "	</li></ul></div></li>\r\n";
			$countUlOpened--;
			$level--;
			for($j = 1; $j < $menus[$i]->level - $menus[$i+1]->level; $j++){
				echo "	</ul></div></li>\r\n";
				$countUlOpened--;
				$level--;
			}
		}
		if ($i < count($menus)-1 && $menus[$i+1]->level == $menus[$i]->level) {
			echo "	</li>\r\n";
		}
	}
	for ($i=0; $i < $countUlOpened - 1; $i++){
		echo "	</li></ul></div>\r\n";
	}
	if ($countUlOpened > 1) {
		echo "	</li></ul>\r\n";
	}
}
?>
