<?php
/**
 * Elgg show the users who liked the object
 *
 * @uses $vars['annotation']
 */

if (!isset($vars['annotation'])) {
	return true;
}

$like = $vars['annotation'];

$user = $like->getOwnerEntity();
if (!$user) {
	return true;
}

$user_icon = elgg_view("profile/icon", array('entity' => $user, 'size' => 'tiny'));
$user_link = elgg_view('output/url', array(
	'href' => $user->getURL(),
	'text' => $user->name,
));

$likes_string = elgg_echo('likes:this');

$friendlytime = elgg_view_friendly_time($like->time_created);

if ($like->canEdit()) {
	$delete_button = elgg_view("output/confirmlink",array(
						'href' => "action/likes/delete?annotation_id={$like->id}",
						'text' => elgg_echo('delete'),
						'confirm' => elgg_echo('deleteconfirm')
					));
	$delete_button = "<span class=\"delete-button\">$delete_button</span>";
}

$body = <<<HTML
<p class="mbn">
	$delete_button
	$user_link $likes_string
	<span class="elgg-list-subtitle">
		$friendlytime
	</span>
</p>
HTML;

echo elgg_view_image_block($user_icon, $body);
