<?php
/**
 * Elgg image block pattern
 *
 * Common pattern where there is an image, icon, media object to the left
 * and a descriptive block of text to the right.
 * 
 * ---------------------------------------------------------------
 * |          |                                      |    alt    |
 * |  image   |               body                   |   image   |
 * |  block   |               block                  |   block   |
 * |          |                                      | (optional)|
 * ---------------------------------------------------------------
 *
 * @uses $vars['body']        HTML content of the body block
 * @uses $vars['image']       HTML content of the image block
 * @uses $vars['image_alt']   HTML content of the alternate image block
 * @uses $vars['class']       Optional additional class for media element
 * @uses $vars['id']          Optional id for the media element
 */

$body = elgg_get_array_value('body', $vars, '');
$image = elgg_get_array_value('image', $vars, '');
$alt_image = elgg_get_array_value('image_alt', $vars, '');

$class = 'elgg-image-block';
$additional_class = elgg_get_array_value('class', $vars, '');
if ($additional_class) {
	$class = "$class $additional_class";
}

$id = '';
if (isset($vars['id'])) {
	$id = "id=\"{$vars['id']}\"";
}


$body = "<div class=\"elgg-body\">$body</div>";

if ($image) {
	$image = "<div class=\"elgg-image\">$image</div>";
}

if ($alt_image) {
	$alt_image = "<div class=\"elgg-image elgg-alt\">$alt_image</div>";
}

echo <<<HTML
<div class="$class clearfix" $id>
	$image$alt_image$body
</div>
HTML;
