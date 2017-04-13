<?php
if( !defined( 'MEDIAWIKI' ) ) die( 'Not an entry point.' );
if( version_compare( $wgVersion, '1.28.0' ) < 0 ) die( 'This version of SensitiveText is for MediaWiki 1.28 or greater' );
/**
 * SensitiveText extension
 * - Extends the MediaWiki article protection to hide some text parts on a public page
 */
define('SENSITIVETEXT_VERSION', '0.1.0, 2017-04-13');

# Load the SensitiveText class and messages
$dir = dirname( __FILE__ ) . '/';
$wgAutoloadClasses['SensitiveText'] = $dir . 'SensitiveText_body.php';

$wgExtensionCredits['parserhook'][] = array(
        'path'        => __FILE__,
        'name'        => "SensitiveText",
        'author'      => "Sandro Lutz",
        'url'         => "",
        'version'     => SENSITIVETEXT_VERSION,
        'descriptionmsg' => 'security-desc',
);

$wgHooks['ParserFirstCallInit'][] = 'SensitiveText::onParserSetup';