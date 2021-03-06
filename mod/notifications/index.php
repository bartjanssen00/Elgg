<?php
/**
 * Elgg notifications plugin index
 *
 * @package ElggNotifications
 */

// Load Elgg framework
require_once(dirname(dirname(dirname(__FILE__))) . '/engine/start.php');

// Ensure only logged-in users can see this page
gatekeeper();

set_page_owner(get_loggedin_userid());

$js_url = elgg_view_get_simplecache_url('js', 'friendsPickerv1');
elgg_register_js($js_url, 'friendsPicker');

// Set the context to settings
elgg_set_context('settings');

$title = elgg_echo('notifications:subscriptions:changesettings');

// Get the form
$people = array();
if ($people_ents = elgg_get_entities_from_relationship(array('relationship' => 'notify', 'relationship_guid' => get_loggedin_userid(), 'types' => 'user', 'limit' => 99999))) {
	foreach($people_ents as $ent) {
		$people[] = $ent->guid;
	}
}

$body = elgg_view('notifications/subscriptions/form', array('people' => $people));

$params = array(
	'content' => $body,
	'title' => $title,
);
$body = elgg_view_layout('one_sidebar', $params);

echo elgg_view_page($title, $body);
