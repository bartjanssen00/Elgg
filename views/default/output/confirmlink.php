<?php
/**
 * Elgg confirmation link
 * A link that displays a confirmation dialog before it executes
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['text'] The text of the link
 * @uses $vars['href'] The address
 * @uses $vars['confirm'] The dialog text
 * @uses $vars['text_encode'] Encode special characters?
 */

$confirm = elgg_get_array_value('confirm', $vars, elgg_echo('question:areyousure'));

$encode = elgg_get_array_value('text_encode', $vars, true);

// always generate missing action tokens
$vars['href'] = elgg_add_action_tokens_to_url(elgg_normalize_url($vars['href']), true);

$text = elgg_get_array_value('text', $vars, '');
if ($encode) {
	$text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

$vars['onclick'] = "return confirm('" . addslashes($confirm) . "')";

unset($vars['encode_text']);
unset($vars['text']);
unset($vars['confirm']);

$attributes = elgg_format_attributes($vars);
echo "<a $attributes>$text</a>";
