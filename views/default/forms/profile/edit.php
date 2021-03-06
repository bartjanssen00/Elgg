<?php
/**
 * Edit profile form
 *
 * @uses vars['entity']
 */

?>

<p>
	<label><?php echo elgg_echo('user:name:label'); ?></label>
	<?php echo elgg_view('input/text',array('internalname' => 'name', 'value' => $vars['entity']->name)); ?>
</p>
<?php

$profile_fields = elgg_get_config('profile_fields');
if (is_array($profile_fields) && count($profile_fields) > 0) {
	foreach ($profile_fields as $shortname => $valtype) {
		$metadata = get_metadata_byname($vars['entity']->guid, $shortname);
		if ($metadata) {
			if (is_array($metadata)) {
				$value = '';
				foreach ($metadata as $md) {
					if (!empty($value)) {
						$value .= ', ';
					}
					$value .= $md->value;
					$access_id = $md->access_id;
				}
			} else {
				$value = $metadata->value;
				$access_id = $metadata->access_id;
			}
		} else {
			$value = '';
			$access_id = ACCESS_DEFAULT;
		}

?>
<p>
	<label><?php echo elgg_echo("profile:{$shortname}") ?></label>
	<?php
		$params = array(
			'internalname' => $shortname,
			'value' => $value,
		);
		echo elgg_view("input/{$valtype}", $params);
		$params = array(
			'internalname' => "accesslevel[$shortname]",
			'value' => $access_id,
		);
		echo elgg_view('input/access', $params);
	?>
</p>
<?php
	}
}
?>
<p>
<?php
	echo elgg_view('input/hidden', array('internalname' => 'guid', 'value' => $vars['entity']->guid));
	echo elgg_view('input/submit', array('value' => elgg_echo('save')));
?>
</p>
