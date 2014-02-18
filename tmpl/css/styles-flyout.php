<?php
/*
* Pixel Point Creative - Cinch Menu Module
* License: GNU General Public License version
* See: http://www.gnu.org/copyleft/gpl.html
* Copyright (c) Pixel Point Creative LLC.
* More info at http://www.pixelpointcreative.com
* Last Updated: 1/17/14
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

$subWidthA = $subWidth - 22;
$subWidthLI = $subWidth - 1;
$subWidthULIE8 = $subWidth + 2;

$style = <<<EOT
	#flyout_menu_{$module->id} {
		background: {$mainItemColor};
	}
	#flyout_menu_{$module->id} a {
		color: {$textLinkColor};
	}
	#flyout_menu_{$module->id} .item-wrapper:hover a,
	#flyout_menu_{$module->id} li.current > .item-wrapper a,
	#flyout_menu_{$module->id} li.opened > .item-wrapper a {
		color: {$textHoverColor};
	}
	#flyout_menu_{$module->id} .ul-wrapper,
	#flyout_menu_{$module->id} li ul {
		width: {$subWidth};
		background: {$mainItemColor};
	}
	#flyout_menu_{$module->id}.lt-ie9 .ul-wrapper {
		width: {$subWidthULIE8}px;
	}
	#flyout_menu_{$module->id} li ul .menu-link,
	#flyout_menu_{$module->id}.horizontal.msie.lt-ie9 .menu-link {
		width: {$subWidthA}px;
	}
	#flyout_menu_{$module->id}.horizontal.msie.lt-ie9 > li > .item-wrapper {
		width: {$subWidthLI}px;
	}
EOT;
