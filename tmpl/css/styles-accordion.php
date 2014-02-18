<?php
/*
* Pixel Point Creative - Cinch Menu Module
* License: GNU General Public License version
* See: http://www.gnu.org/copyleft/gpl.html
* Copyright (c) Pixel Point Creative LLC.
* More info at http://www.pixelpointcreative.com
* Last Updated: 3/14/13
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

$style = <<<EOT
	#accordion_menu_{$module->id} {
		background: {$mainItemColor};
	}
	#accordion_menu_{$module->id} a {
		color: {$textLinkColor};
	}
	#accordion_menu_{$module->id} .item-wrapper:hover a,
	#accordion_menu_{$module->id} li.current > .item-wrapper a {
		color: {$textHoverColor};
	}
EOT;
