<?php
/**
 * SensitiveText class
 */
class SensitiveText {
        // Register any render callbacks with the parser
        public static function onParserSetup( Parser $parser ) {
                // When the parser sees the <sample> tag, it executes renderTagSample (see below)
                $parser->setHook( 'sensitive', 'SensitiveText::renderSensitiveTag' );
        }

        // Render <sensitive>
        public static function renderSensitiveTag($input, array $args, Parser $parser, PPFrame $frame) {
                global $wgUser;
                if ($wgUser->isLoggedIn() === true) {
                        // Nothing exciting here, just escape the user-provided input and throw it back out again (as example)
                        return "<span title=\"Sensitive Daten\" style=\"background-color:#ffc; border:1px solid #ccc;\">" .$parser->recursiveTagParse($input) ."</span>";
                } else {
                        return "";
                }
        }
}