<?php

/**
 * Display more lightweight error page for files users generally don't request directly.
 *
 * Requires the parent theme to have a 404 template. If put into full themes just omit the include in the last line.
 *
 * - CSS/JS files
 * - Font files
 * - Icon files (including Apple's touch icons)
 * - Outlook's autoconfig.xml
 *
 * It is not just blank for cases where users actually do request these files directly.
 * It contains a favicon inlined with a data URI to prevent the extra request.
 */

defined( 'ABSPATH' ) || exit;

if ( preg_match( '/(\.css|\.js|\.ttf|\.otf|\.woff|\.woff2|\.eot|\.ico|apple-touch-icon[^.]*\.png|autoconfig\.xml)(\?.*)?$/i', $_SERVER['REQUEST_URI'] ) )
{
	header("HTTP/1.0 404 Not Found");
	header("Content-Type: text/html; charset=utf-8");
	echo '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">' . PHP_EOL;
	echo '<html><head>' . PHP_EOL;
	echo '<title>404 Not Found</title>' . PHP_EOL;
	echo '<meta name="robots" content="noindex, nofollow">' . PHP_EOL;
	echo '<link rel="shortcut icon" type="image/x-icon" href="data:image/x-icon;base64,AAABAAEAEBACAAEAAQCwAAAAFgAAACgAAAAQAAAAIAAAAAEAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD///ME///zBP//8wT///ME///zBP//8wT///ME///zBP//8wT///ME///zBP//8wT///ME///zBP//8wT///ME" />' . PHP_EOL;
	echo '</head><body>' . PHP_EOL;
	echo '<h1>Not Found</h1>' . PHP_EOL;
	echo '<p>The requested URL was not found on this server.</p>' . PHP_EOL;
	echo '</body></html>' . PHP_EOL;
	die();
}
include( get_template_directory() . '/404.php');