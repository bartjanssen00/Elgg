<?php
/**
 * Tab navigation
 *
 * @uses string $vars['type'] horizontal || vertical - Defaults to horizontal
 * @uses array $vars['tabs'] A multi-dimensional array of tab entries in the format array(
 * 	'title' => string, // Title of link
 * 	'url' => string, // URL for the link
 * 	'class' => string  // Class of the li element
 * 	'id' => string, // ID of the li element
 * 	'selected' => bool // if this li element is currently selected
 * 	'url_class' => string, // Class to pass to the link
 * 	'url_id' => string, // ID to pass to the link
 * )
 */

$type = elgg_get_array_value('type', $vars, 'horizontal');
if ($type == 'horizontal') {
	$type_class = "elgg-tabs elgg-htabs mtm";
} else {
	$type_class = "elgg-tabs elgg-vtabs";
}

if (isset($vars['tabs']) && is_array($vars['tabs']) && !empty($vars['tabs'])) {
?>
	<ul class="<?php echo $type_class; ?>">
	<?php
	foreach ($vars['tabs'] as $info) {
		$class = elgg_get_array_value('class', $info, '');
		$id = elgg_get_array_value('id', $info, '');
		
		$selected = elgg_get_array_value('selected', $info, FALSE);
		if ($selected) {
			$class .= ' elgg-state-selected';
		}

		$class_str = ($class) ? "class=\"$class\"" : '';
		$id_str = ($id) ? "id=\"$id\"" : '';
		$title = htmlspecialchars($info['title'], ENT_QUOTES, 'UTF-8');
		$url = htmlspecialchars($info['url'], ENT_QUOTES, 'UTF-8');

		$options = array(
			'href' => $url,
			'title' => $title,
			'text' => $title
		);

		if (isset($info['url_class'])) {
			$options['class'] = $info['url_class'];
		}

		if (isset($info['url_id'])) {
			$options['internalid'] = $info['url_id'];
		}

		$link = elgg_view('output/url', $options);

		echo "<li $class_str $js>$link</li>";
	}
	?>
		</ul>
	<?php
}
