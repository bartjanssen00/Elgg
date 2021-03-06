<?php
/**
 * Group search
 *
 * @package ElggGroups
 */
$url = elgg_get_site_url() . 'pg/groups/world';
$body = elgg_view_form('groups/search', array('action' => $url, 'method' => 'get'));

echo elgg_view('layout/objects/module', array(
	'title' => elgg_echo('groups:searchtag'),
	'body' => $body,
	'class' => 'elgg-aside-module',
));
