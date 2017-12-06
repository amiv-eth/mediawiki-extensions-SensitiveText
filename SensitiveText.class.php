<?php
/**
 * @copyright Copyright (c) 2017, AMIV an der ETH
 *
 * @author Sandro Lutz <code@temparus.ch>
 *
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

use MediaWiki\Auth\AuthManager;
use MediaWiki\Auth\AbstractPasswordPrimaryAuthenticationProvider;
use MediaWiki\Auth\AuthenticationRequest;
use MediaWiki\Auth\PasswordAuthenticationRequest;
use MediaWiki\Auth\AuthenticationResponse;

class SensitiveText
{
	public static function onParserSetup( Parser $parser ) {
		// When the parser sees the <sensitive> tag, it executes renderSensitiveTag
		// When the parser sees the <hide> tag, it executes renderHideTag
		$parser->setHook( 'sensitive', 'SensitiveText::renderSensitiveTag' );
		$parser->setHook( 'hide', 'SensitiveText::renderHideTag' );
	}

	// Render <sensitive>
	public static function renderSensitiveTag($input, array $args, Parser $parser, PPFrame $frame) {
		global $wgUser;
		if ($wgUser->isLoggedIn() === true) {
				return "<span class=\"sensitivetext-sensitive\" title=\"Sensitive Daten\">" .$parser->recursiveTagParse($input) ."</span>";
		} else {
				return "";
		}
	}
	
	// Render <hide>
	public static function renderHideTag($input, array $args, Parser $parser, PPFrame $frame) {
		return "<span class=\"sensitivetext-hide\" data-text=\"" .$input ."\" onclick=\"toggleHide(this);\">**********</span>";
	}
}