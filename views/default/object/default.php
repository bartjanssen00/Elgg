<?php
/**
 * ElggObject default view.
 *
 * @warning This view may be used for other ElggEntity objects
 *
 * @package Elgg
 * @subpackage Core
 */

$icon = elgg_view('graphics/icon', array(
	'entity' => $vars['entity'],
	'size' => 'small',
));


$title = $vars['entity']->title;
if (!$title) {
	$title = $vars['entity']->name;
}
if (!$title) {
	$title = get_class($vars['entity']);
}

if (elgg_instanceof($vars['entity'], 'object')) {
	$metadata = elgg_view('layout/objects/list/metadata', $vars);
}

$owner_link = '';
$owner = $vars['entity']->getOwnerEntity();
if ($owner) {
	$owner_link = elgg_view('output/url', array(
		'href' => $owner->getURL(),
		'text' => $owner->name,
	));
}

$date = elgg_view_friendly_time($vars['entity']->time_created);

$subtitle = "$owner_link $date";

$params = array(
	'entity' => $vars['entity'],
	'title' => $title,
	'metadata' => $metadata,
	'subtitle' => $subtitle,
	'tags' => $vars['entity']->tags,
);
$body = elgg_view('layout/objects/list/body', $params);

echo elgg_view_image_block($icon, $body);
