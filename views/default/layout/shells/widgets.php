<?php
/**
 * Elgg widgets layout
 *
 * @uses $vars['box']              Optional display box at the top of layout
 * @uses $vars['num_columns']      Number of widget columns for this layout (3)
 * @uses $vars['show_add_widgets'] Display the add widgets button and panel (true)
 * @uses $vars['exact_match']      Widgets must match the current context (false)
 * @uses $vars['show_access']      Show the access control (true)
 */

$box = elgg_get_array_value('box', $vars, '');
$num_columns = elgg_get_array_value('num_columns', $vars, 3);
$show_add_widgets = elgg_get_array_value('show_add_widgets', $vars, true);
$exact_match = elgg_get_array_value('exact_match', $vars, false);
$show_access = elgg_get_array_value('show_access', $vars, true);

$owner = elgg_get_page_owner_entity();
$context = elgg_get_context();
elgg_push_context('widgets');

$widgets = elgg_get_widgets($owner->guid, $context);

if (elgg_can_edit_widget_layout($context)) {
	if ($show_add_widgets) {
		echo elgg_view('layout/shells/widgets/add_button');
	}
	$params = array(
		'widgets' => $widgets,
		'context' => $context,
		'exact_match' => $exact_match,
	);
	echo elgg_view('layout/shells/widgets/add_panel', $params);
}

echo $vars['box'];

$widget_class = "elgg-col-1of{$num_columns}";
for ($column_index = 1; $column_index <= $num_columns; $column_index++) {
	$column_widgets = $widgets[$column_index];

	echo "<div class=\"$widget_class elgg-widgets\" id=\"elgg-widget-col-$column_index\">";
	if (is_array($column_widgets) && sizeof($column_widgets) > 0) {
		foreach ($column_widgets as $widget) {
			echo elgg_view_entity($widget, array('show_access' => $show_access));
		}
	}
	echo '</div>';
}

elgg_pop_context();

echo elgg_view('graphics/ajax_loader', array('internalid' => 'elgg-widget-loader'));
