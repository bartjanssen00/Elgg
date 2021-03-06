<?php
/**
 * Discussion function library
 */

/**
 * List all discussion topics
 */
function discussion_handle_all_page() {

	elgg_pop_breadcrumb();
	elgg_push_breadcrumb(elgg_echo('discussion'));

	$content = elgg_list_entities(array(
		'type' => 'object',
		'subtype' => 'groupforumtopic',
		'annotation_name' => 'generic_comment',
		'order_by' => 'e.last_action desc',
		'limit' => 40,
		'fullview' => false,
	));

	$params = array(
		'content' => $content,
		'title' => elgg_echo('discussion:latest'),
		'filter' => '',
		'buttons' => '',
	);
	$body = elgg_view_layout('content', $params);

	echo elgg_view_page($title, $body);
}

/**
 * List discussion topics in a group
 *
 * @param int $guid Group entity GUID
 */
function discussion_handle_list_page($guid) {

	elgg_set_page_owner_guid($guid);

	$group = get_entity($guid);
	if (!$group) {
		register_error(elgg_echo('group:notfound'));
		forward();
	}
	elgg_push_breadcrumb($group->name);

	group_gatekeeper();

	$title = elgg_echo('item:object:groupforumtopic');
	
	$options = array(
		'type' => 'object',
		'subtype' => 'groupforumtopic',
		'limit' => 20,
		'order_by' => 'e.last_action desc',
		'container_guid' => $guid,
		'fullview' => true,
	);
	$content = elgg_list_entities($options);


	$params = array(
		'content' => $content,
		'title' => $title,
		'filter' => '',
	);

	if (!$group->isMember() && !$group->canEdit()) {
		$params['buttons'] = '';
	}

	$body = elgg_view_layout('content', $params);

	echo elgg_view_page($title, $body);
}

/**
 * Edit or add a discussion topic
 *
 * @param string $type 'add' or 'edit'
 * @param int    $guid GUID of group or topic
 */
function discussion_handle_edit_page($type, $guid) {
	gatekeeper();

	if ($type == 'add') {
		elgg_set_page_owner_guid($guid);
		$group = get_entity($guid);
		if (!$group) {
			register_error(elgg_echo('group:notfound'));
			forward();
		}
		group_gatekeeper();

		$title = elgg_echo('groups:addtopic');

		elgg_push_breadcrumb($group->name, "pg/discussion/owner/$group->guid");
		elgg_push_breadcrumb($title);

		$body_vars = discussion_prepare_form_vars();
		$content = elgg_view_form('discussion/save', array(), $body_vars);
	} else {
		$topic = get_entity($guid);
		if (!$topic || !$topic->canEdit()) {
			register_error(elgg_echo('discussion:topic:notfound'));
			forward();
		}
		$group = $topic->getContainerEntity();
		if (!$group) {
			register_error(elgg_echo('group:notfound'));
			forward();
		}
		elgg_set_page_owner_guid($group->getGUID());

		$title = elgg_echo('groups:edittopic');

		elgg_push_breadcrumb($group->name, "pg/discussion/owner/$group->guid");
		elgg_push_breadcrumb($topic->title, $topic->getURL());
		elgg_push_breadcrumb($title);

		$body_vars = discussion_prepare_form_vars($topic);
		$content = elgg_view_form('discussion/save', array(), $body_vars);
	}

	$params = array(
		'content' => $content,
		'title' => $title,
		'filter' => '',
		'buttons' => '',
	);
	$body = elgg_view_layout('content', $params);

	echo elgg_view_page($title, $body);
}

/**
 * View a discussion topic
 *
 * @param int $guid GUID of topic
 */
function discussion_handle_view_page($guid) {
	// We now have RSS on topics
	global $autofeed;
	$autofeed = true;

	$topic = get_entity($guid);
	if (!$topic) {
		register_error(elgg_echo('discussion:topic:notfound'));
		forward();
	}

	$group = $topic->getContainerEntity();
	if (!$group) {
		register_error(elgg_echo('group:notfound'));
		forward();
	}

	elgg_set_page_owner_guid($group->getGUID());

	group_gatekeeper();

	elgg_push_breadcrumb($group->name, "pg/discussion/owner/$group->guid");
	elgg_push_breadcrumb($topic->title);

	$content = elgg_view_entity($topic, true);
	if ($topic->status == 'closed') {
		$content .= elgg_view_comments($topic, false);
		$content .= elgg_view('discussion/closed');
	} elseif ($group->isMember() || isadminloggedin()) {
		$content .= elgg_view_comments($topic);
	} else {
		$content .= elgg_view_comments($topic, false);
	}

	$params = array(
		'content' => $content,
		'title' => $topic->title,
		'filter' => '',
		'buttons' => '',
	);
	$body = elgg_view_layout('content', $params);

	echo elgg_view_page($title, $body);
}

/**
 * Prepare discussion topic form variables
 *
 * @param ElggObject $topic Topic object if editing
 * @return array
 */
function discussion_prepare_form_vars($topic = NULL) {
	// input names => defaults
	$values = array(
		'title' => '',
		'description' => '',
		'status' => '',
		'access_id' => ACCESS_DEFAULT,
		'tags' => '',
		'container_guid' => elgg_get_page_owner_guid(),
		'guid' => null,
		'entity' => $topic,
	);

	if ($topic) {
		foreach (array_keys($values) as $field) {
			$values[$field] = $topic->$field;
		}
	}

	if (elgg_is_sticky_form('topic')) {
		foreach (array_keys($values) as $field) {
			$values[$field] = elgg_get_sticky_value('topic', $field);
		}
	}

	elgg_clear_sticky_form('topic');

	return $values;
}
