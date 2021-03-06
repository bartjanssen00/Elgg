<?php
/**
 * List body
 *
 * Sample output
 * <ul class="elgg-list-metadata"><li>Public</li><li>Like this</li></ul>
 * <h3><a href="">Title</a></h3>
 * <p class="elgg-list-subtitle">Posted 3 hours ago by George</p>
 * <p class="elgg-tags"><a href="">one</a>, <a href="">two</a></p>
 * <div class="elgg-list-content">Excerpt text</div>
 *
 * @uses $vars['entity']    ElggEntity
 * @uses $vars['title']     Title link (optional) false = no title, '' = default
 * @uses $vars['metadata']  HTML for entity metadata and actions (optional)
 * @uses $vars['subtitle']  HTML for the subtitle (optional)
 * @uses $vars['tags']      HTML for the tags (optional)
 * @uses $vars['content']   HTML for the entity content (optional)
 */

$entity = $vars['entity'];

$title_link = elgg_get_array_value('title', $vars, '');
if ($title_link === '') {
	if (isset($entity->title)) {
		$text = $entity->title;
	} else {
		$text = $entity->name;
	}
	$params = array(
		'text' => $text,
		'href' => $entity->getURL(),
	);
	$title_link = elgg_view('output/url', $params);
}

$metadata = elgg_get_array_value('metadata', $vars, '');
$subtitle = elgg_get_array_value('subtitle', $vars, '');
$content = elgg_get_array_value('content', $vars, '');

$tags = elgg_get_array_value('tags', $vars, '');
if (!$tags) {
	$tag_text = elgg_view('output/tags', array('tags' => $entity->tags));
	if ($tag_text) {
		$tags = '<p class="elgg-tags">' . $tag_text . '</p>';
	}
}

if ($metadata) {
	echo $metadata;
}
echo "<h3>$title_link</h3>";
echo "<p class=\"elgg-list-subtitle\">$subtitle</p>";
echo $tags;
if ($content) {
	echo "<div class=\"elgg-list-content\">$content</div>";
}
