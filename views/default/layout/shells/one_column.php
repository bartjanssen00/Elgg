<?php
/**
 * Elgg one-column layout
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['content'] Content string
 * @uses $vars['class']   Additional class to apply to layout
 */

$class = 'elgg-inner clearfix';
if (isset($vars['class'])) {
	$class = "$class {$vars['class']}";
}
?>
<div class="<?php echo $class; ?>" id="elgg-layout-one-column">
	<div class="elgg-body">
	<?php echo $vars['content']; ?>
	<?php
		// @deprecated 1.8
		echo $vars['area1'];
	?>
	</div>
</div>