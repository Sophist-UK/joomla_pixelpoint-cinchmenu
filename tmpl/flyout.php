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
jimport( 'joomla.html.parameter' );
$document =& JFactory::getDocument();
ob_start();
include   "css" . DS . 'styles-flyout.php';
$style = ob_get_contents();
ob_end_clean();
$document->addStyleDeclaration( $style );
include "js/flyout.js.php";


?>

	<?php if(isset($menus) && count($menus)){
		$countUlOpened = 0;
		$level = 1;
		for($i = 0; $i < count($menus); $i++){
			if($i == 0){?>
			<!--[if lt IE 9]><ul class="flyout-menu msie lt-ie9 <?php echo ($params->get('stype_layout') == 'vertical')?'vertical':'horizontal'; ?>" id="flyout_menu_<?php echo $module->id;?>"><![endif]-->
			<!--[if IE 9]><ul class="flyout-menu msie <?php echo ($params->get('stype_layout') == 'vertical')?'vertical':'horizontal'; ?>" id="flyout_menu_<?php echo $module->id;?>"><![endif]-->
			<!--[if gt IE 9]><!--><ul class="flyout-menu <?php echo ($params->get('stype_layout') == 'vertical')?'vertical':'horizontal'; ?>" id="flyout_menu_<?php echo $module->id;?>"><!--<![endif]-->
			<?php	$countUlOpened++;
			}
			$class = "";
			if($menus[$i]->id == $itemID){
				$class.= "class='current ";
				$class .= "'";
			}

			$li = "<li ".$class.">";
			$li .= "<div class='item-wrapper item_wrapper_".$module->id."'>";
			if($showBullet == "true"){
				$divMenuButton = "<div class='menu-button menu_button_".$module->id."' >";
				if($i < count($menus)-1 && $menus[$i+1]->level > $menus[$i]->level){
					$divMenuButton.="<img class='menuicon' alt='' src='".$bulletImage."'/>";
				}
				$divMenuButton .= "</div>";
				$li.=$divMenuButton;
			}
			$style = "";
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
			$divLink = "<div class='menu-link' ".$style."><a ".$target." href='".$menus[$i]->flink."'>".$icon_menu.$menus[$i]->title."</a></div>";
			$li.=$divLink;
			$li.= "</div>";
			echo $li;
			if($i < count($menus)-1  && $menus[$i+1]->level > $menus[$i]->level ){
				if($params->get('stype_layout') == 'vertical'){
					echo "<div style='".$menu_direction.":100%;' class='ul-wrapper ul_wrapper_".$module->id."'><ul>";
				}else{
					echo "<div  class='ul-wrapper direction-".$menu_direction." ul_wrapper_".$module->id."'><ul>";	
				}
				$countUlOpened++;
				$level++;
			}
			if($i < count($menus)-1 && $menus[$i+1]->level < $menus[$i]->level ){
				echo "</li></ul></div></li>";
				$countUlOpened--;
				$level--;
				for($j = 1; $j < $menus[$i]->level - $menus[$i+1]->level; $j++){
					echo "</ul></div></li>";
					$countUlOpened--;
					$level--;
				}
			}
			if( $i < count($menus)-1 && $menus[$i+1]->level == $menus[$i]->level){
				echo "</li>";
			}
		}
		for($i=0; $i< $countUlOpened - 1; $i++){
			echo "</li></ul></div>";
		}
		echo "</li></ul>";
	}
?>


