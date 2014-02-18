<?php 
/*
* Pixel Point Creative - Cinch Menu Module
* License: GNU General Public License version
* See: http://www.gnu.org/copyleft/gpl.html
* Copyright (c) Pixel Point Creative LLC.
* More info at http://www.pixelpointcreative.com
* Last Updated: 3/14/13
*/
defined('_JEXEC') or die;
jimport( 'joomla.html.parameter' );
$document =& JFactory::getDocument();
ob_start();
include  "css" . DS . 'styles-accordion.php';
$style = ob_get_contents();
ob_end_clean();
$document->addStyleDeclaration( $style );
include "js/accordion.js.php";
?>

	<?php if(isset($menus) && count($menus)){
		$countUlOpened = 0;
		$level = 1;
		$menu		= $app->getMenu();
		$active = ($menu->getActive()) ? $menu->getActive() : $menu->getDefault();
		$path		= $active->tree;
		
		for($i = 0; $i < count($menus); $i++){
			if($i == 0){?>
			     <ul class='accordion-menu' id='accordion_menu_<?php echo $module->id;?>'>
			<?php	$countUlOpened++;
			}
			$class = "";
			if(in_array($menus[$i]->id, $path)){
				$class.= "class='current ";
				$class.= "opened ";
				$class .= "'";
			}

			$li = "<li ".$class.">";
			$li .= "<div class='item-wrapper' >";
			if($showBullet == "true"){
				$divMenuButton = "<div class='menu-button' >";
				if($i < count($menus)-1 && $menus[$i+1]->level > $menus[$i]->level){
					$divMenuButton.="<img class='menuicon' alt='' src='".$bulletImage."'/>";
				}
				$divMenuButton .= "</div>";
				$li.=$divMenuButton;
			}
			$style = "";
			$target = "";
			//echo $menus[$i]->browserNav . '<br/>';
			switch ($menus[$i]->browserNav) :
				
				case 1:
					$target=" target='_blank' ";
					break;
				case 2:
					$target = " on-click=\"window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes');return false;\"";
					break;
			endswitch;
			$icon_menu = ($menus[$i]->menu_image != '')?'<img src='.JURI::base().$menus[$i]->menu_image.' alt="menu icon" />':'';
			$divLink = "<div class='menu-link' ".$style."><a ".$target." href='".$menus[$i]->flink."'>".$icon_menu.$menus[$i]->title."</a></div>";
			$li.=$divLink;
			$li.= "</div>";
			echo $li;
			if($i < count($menus)-1  && $menus[$i+1]->level > $menus[$i]->level ){
				echo "<div class='ul-wrapper'><ul>";
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
			if( ($i < count($menus)-1 && $menus[$i+1]->level == $menus[$i]->level) || $i == count($menus)-1){
				echo "</li>";
			}
		}
		for($i=0; $i< $countUlOpened - 1; $i++){
			echo "</ul></div>";
		}
		echo "</ul>";
	}

?>


