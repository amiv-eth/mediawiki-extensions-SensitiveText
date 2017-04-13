<?php
/**
 * SensitiveText class
 */
class SensitiveText {
	
	function setup() {
		global $wgParser;
		$wgParser->setHook("sensitive", array($this, "parseSensitiveTag"));
	}

	/**
	 * parses all <sensitive></sensitive> tags of an article
	 */
	function parseSensitiveTag($input, $argv, &$parser) {
		global $wgUser;
		if ($wgUser->isLoggedIn()===true) {
			return $parser->recursiveTagParse($input);
		}
		return "";
	}
}