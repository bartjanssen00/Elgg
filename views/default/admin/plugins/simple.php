<?php
/**
 * Elgg administration simple plugin screen
 *
 * Shows an alphabetical list of "simple" plugins.
 *
 * @package Elgg
 * @subpackage Core
 */

elgg_generate_plugin_entities();
$installed_plugins = elgg_get_plugins('any');
$plugin_list = array();

foreach ($installed_plugins as $plugin) {
	if (!$plugin->isValid()) {
		continue;
	}
	$interface = $plugin->manifest->getAdminInterface();
	if ($interface == 'simple') {
		$plugin_list[$plugin->manifest->getName()] = $plugin;
	}
}

ksort($plugin_list);

$form_body  .= <<<___END
	<ul class="admin_plugins margin-top">
___END;

$actions_base = '/action/admin/plugins/';
$ts = time();
$token = generate_action_token($ts);

foreach ($plugin_list as $name => $plugin) {
	$plugin_guid = $plugin->guid;
	$plugin_id = $plugin->getID();
	$active = $plugin->isActive();
	$can_activate = $plugin->canActivate();
	$author = $plugin->manifest->getAuthor();
	$version = $plugin->manifest->getVersion();
	$website = $plugin->manifest->getWebsite();
	$description = $plugin->manifest->getDescription();

	if ($active) {
		$active_class = 'active';
		$checked = 'checked="checked"';
	} else {
		$active_class = 'not_active';
		$checked = '';
	}

	if ($can_activate) {
		$disabled = '';
	} else {
		$disabled = 'disabled="disabled"';
		$description .= '<p>' . elgg_echo('admin:plugins:simple:cannot_activate') . '</p>';
	}

	$description = elgg_view('output/longtext', array('value' => $description));

	$author_html = $link_html = $version_html = $settings_html = '';

	if ($author) {
		$author_html = elgg_echo('admin:plugins:author', array($author));
	}

	if ($version) {
		$version_html = ' | ' . elgg_echo('admin:plugins:version', array($version));
	}

	if ($website) {
		$link_html = " | <a href=\"$website\">" . elgg_echo('admin:plugins:plugin_website') . '</a>';
	}

	if (elgg_view_exists("settings/$plugin_id/edit")) {
		$settings_href = elgg_get_site_url() . "pg/admin/plugin_settings/$plugin_id";
		$settings_html = " | <a class='plugin_settings link' href='$settings_href'>" . elgg_echo('settings') . "</a>";
	}

	$form_body .= <<<___END
	<li class="plugin_details $active_class">
		<span class="plugin_controls">
			<input type="checkbox" id="$plugin_guid" class="plugin_enabled" $checked $disabled name="active_plugin_guids[]" value="$plugin_guid"/>
			<label for="$plugin_guid">$name</label>
		</span>

		<span class="plugin_info">
			<span class="plugin_description">
				$description
			</span>
			<span class="plugin_metadata small">
				$author_html
				$version_html
				$link_html
				$settings_html
			</span>
		</span>
	</li>
___END;
}

$form_body .= '</ul>';
$form_body .= elgg_view('input/submit', array('value' => elgg_echo('save')));
$form_body .= elgg_view('input/reset', array('value' => elgg_echo('reset'), 'class' => 'elgg-action-button disabled'));

echo elgg_view('input/form', array(
	'action' => "action/admin/plugins/simple_update_states",
	'body' => $form_body,
	'class' => 'admin_plugins_simpleview'
));