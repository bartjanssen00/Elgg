<?php
/**
 * Elgg tags
 *
 * Tags can be a single string (for one tag) or an array of strings
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['tags'] The tags to display
 * @uses $vars['type'] The entity type, optional
 * @uses $vars['subtype'] The entity subtype, optional
 */

if (!empty($vars['subtype'])) {
	$subtype = "&subtype=" . urlencode($vars['subtype']);
} else {
	$subtype = "";
}
if (!empty($vars['object'])) {
	$object = "&object=" . urlencode($vars['object']);
} else {
	$object = "";
}

if (empty($vars['tags']) && !empty($vars['value'])) {
	$vars['tags'] = $vars['value'];
}

if (!empty($vars['tags'])) {
	if (!is_array($vars['tags'])) {
		$vars['tags'] = array($vars['tags']);
	}

	echo '<ul class="elgg-tags">';
	foreach($vars['tags'] as $tag) {
		if (!empty($vars['type'])) {
			$type = "&type={$vars['type']}";
		} else {
			$type = "";
		}
		$url = elgg_get_site_url() . 'pg/search/?q=' . urlencode($tag) . "&search_type=tags{$type}{$subtype}{$object}";
		if (is_string($tag)) {
			echo '<li>';
			echo "<a rel=\"tag\" href=\"$url\">" . htmlspecialchars($tag, ENT_QUOTES, 'UTF-8') . "</a>";
			echo '</li>';
		}
	}
	echo '</ul>';
}
