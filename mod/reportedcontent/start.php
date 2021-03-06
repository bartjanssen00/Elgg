<?php
/**
 * Elgg Reported content.
 *
 * @package ElggReportedContent
 */

elgg_register_event_handler('init', 'system', 'reportedcontent_init');

/**
 * Initialize the plugin
 */
function reportedcontent_init() {

	// Register a page handler, so we can have nice URLs
	register_page_handler('reportedcontent', 'reportedcontent_page_handler');
	
	// Extend CSS
	elgg_extend_view('css/screen', 'reportedcontent/css');
	elgg_extend_view('css/admin', 'reportedcontent/admin_css');

	// Extend footer with report content link
	if (isloggedin()) {
		elgg_extend_view('footer/links', 'reportedcontent/footer_link');
	}

	elgg_register_plugin_hook_handler('register', 'menu:user_hover', 'reportedcontent_user_hover_menu');

	// Add admin menu item
	elgg_add_admin_menu_item('reportedcontent', elgg_echo('reportedcontent'), 'utilities');

	elgg_register_widget_type(
			'reportedcontent',
			elgg_echo('reportedcontent'),
			elgg_echo('reportedcontent:widget:description'),
			'admin');

	// Register actions
	$action_path = elgg_get_plugin_path() . "reportedcontent/actions";
	elgg_register_action('reportedcontent/add', "$action_path/add.php");
	elgg_register_action('reportedcontent/delete', "$action_path/delete.php", 'admin');
	elgg_register_action('reportedcontent/archive', "$action_path/archive.php", 'admin');
}

/**
 * Reported content page handler
 *
 * Serves the add report page
 *
 * @param array $page Array of page routing elements
 */
function reportedcontent_page_handler($page) {
	// only logged in users can report things
	gatekeeper();

	$content .= elgg_view_title(elgg_echo('reportedcontent:this'));
	$content .= elgg_view('reportedcontent/form');
	$sidebar = elgg_echo('reportedcontent:instructions');

	$params = array(
		'content' => $content,
		'sidebar' => $sidebar,
	);
	$body = elgg_view_layout('one_sidebar', $params);

	echo elgg_view_page(elgg_echo('reportedcontent:this'), $body);
}

/**
 * Add report user link to hover menu
 */
function reportedcontent_user_hover_menu($hook, $type, $return, $params) {
	$user = $params['entity'];

	$profile_url = urlencode($user->getURL());
	$name = urlencode($user->name);
	$url = "pg/reportedcontent/add/?address=$profile_url&title=$name";

	if (isloggedin() && get_loggedin_userid() != $user->guid) {
		$item = new ElggMenuItem(
				'reportuser',
				elgg_echo('reportedcontent:user'),
				$url);
		$item->setSection('action');
		$return[] = $item;
	}

	return $return;
}