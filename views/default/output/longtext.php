<?php
/**
 * Elgg display long text
 * Displays a large amount of text, with new lines converted to line breaks
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['value'] The text to display
 * @uses $vars['parse_urls'] Whether to turn urls into links. Default is true.
 * @uses $vars['class']
 */

$class = 'elgg-text';
$additional_class = elgg_get_array_value('class', $vars, '');
if ($additional_class) {
	$class = "$class $additional_class";
}

$parse_urls = elgg_get_array_value('parse_urls', $vars, true);

$text = $vars['value'];

$text = filter_tags($text);

if ($parse_urls) {
	$text = parse_urls($text);
}

$text = autop($text);

echo "<div class=\"$class\">$text</div>";
