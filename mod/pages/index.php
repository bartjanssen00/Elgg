<?php
/**
 * List a user's or group's pages
 *
 * @package ElggPages
 */

$guid = get_input('guid');

elgg_set_page_owner_guid($guid);
$owner = elgg_get_page_owner_entity();
if (!$owner) {

}

// access check for closed groups
group_gatekeeper();

$title = elgg_echo('pages:owner', array($owner->name));

elgg_push_breadcrumb($owner->name);

$content = elgg_list_entities(array(
	'types' => 'object',
	'subtypes' => 'page_top',
	'container_guid' => elgg_get_page_owner_guid(),
	'limit' => $limit,
	'full_view' => false,
));
if (!$content) {
	$content = '<p>' . elgg_echo('pages:none') . '</p>';
}

$filter_context = '';
if (elgg_get_page_owner_guid() == get_loggedin_userid()) {
	$filter_context = 'mine';
}

$params = array(
	'filter_context' => $filter_context,
	'content' => $content,
	'title' => $title,
	'sidebar' => elgg_view('pages/sidebar/navigation'),
);

if (elgg_instanceof($owner, 'group')) {
	$params['filter'] = '';
}

$body = elgg_view_layout('content', $params);

echo elgg_view_page($title, $body);
