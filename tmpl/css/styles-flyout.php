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
    ul.flyout-menu li ul,.flyout-menu.horizontal,.flyout-menu.vertical,ul.flyout-menu li { list-style: none !important;padding:0px !important;margin: 0px !important; }
    #flyout_menu_<?php echo $module->id;?>{text-align: <?php echo $textAlign;?>;background: <?php echo $mainItemColor;?>;border: 1px solid #1a1a1a;}
    #flyout_menu_<?php echo $module->id;?> a{color: <?php echo $textLinkColor;?>;float: <?php echo $textAlign;?>;}
    #flyout_menu_<?php echo $module->id;?> li{cursor: pointer;	padding-<?php echo $textAlign;?>: 5px ;}
    #flyout_menu_<?php echo $module->id;?> li:last-child, #flyout_menu_<?php echo $module->id;?> > li.last{border-bottom: none;}
    #flyout_menu_<?php echo $module->id;?> .item-wrapper:hover a, #flyout_menu_<?php echo $module->id;?> li.current > .item-wrapper a{color: <?php echo $textHoverColor;?>;	}
    #flyout_menu_<?php echo $module->id;?> > li > .item-wrapper{text-align: <?php echo $textAlign;?>;}
    #flyout_menu_<?php echo $module->id;?> li .item-wrapper .menu-button{float:<?php echo $bulletAlign;?>;margin-<?php echo $bulletAlign;?>:9px;}
    #flyout_menu_<?php echo $module->id;?> li .item-wrapper .menu-link{float: <?php echo $textAlign;?>;padding-<?php echo $textAlign;?>: 5px;}
    #flyout_menu_<?php echo $module->id;?> li.opened > .item-wrapper a{color: <?php echo $textHoverColor;?>;	}
    #flyout_menu_<?php echo $module->id;?> > li.last .item-wrapper{border-bottom: none;}
    #flyout_menu_<?php echo $module->id;?>  li li{position: relative;}
    #flyout_menu_<?php echo $module->id;?>  li ul {border: 1px solid #1a1a1a;width: <?php echo $subWidth;?>;background: <?php echo $mainItemColor;?>;margin: 0px; padding: 0px;}
    #flyout_menu_<?php echo $module->id;?>  li ul li:last-child{border: none;}