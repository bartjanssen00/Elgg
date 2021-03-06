<?php
/**
 * View a single page
 *
 * @package ElggPages
 */

$page_guid = get_input('guid');
$page = get_entity($page_guid);
if (!$page) {
	forward();
}

elgg_set_page_owner_guid($page->getContainerGUID());

group_gatekeeper();

$container = elgg_get_page_owner_entity();
if (!$container) {
}

$title = $page->title;

if (elgg_instanceof($container, 'group')) {
	elgg_push_breadcrumb($container->name, "pg/pages/group/$container->guid/owner");
} else {
	elgg_push_breadcrumb($container->name, "pg/pages/owner/$container->username");
}
pages_prepare_parent_breadcrumbs($page);
elgg_push_breadcrumb($title);

$content = elgg_view_entity($page, true);
$content .= elgg_view_comments($page);

$buttons = '';
if ($page->canEdit()) {
	$url = "pg/pages/add/$page->guid";
	$buttons = elgg_view('output/url', array(
			'text' => elgg_echo('pages:newchild'),
			'href' => $url,
			'class' => 'elgg-action-button',
		));
}

$body = elgg_view_layout('content', array(
	'filter' => '',
	'buttons' => $buttons,
	'content' => $content,
	'title' => $title,
	'sidebar' => elgg_view('pages/sidebar/navigation'),
));

echo elgg_view_page($title, $body);
