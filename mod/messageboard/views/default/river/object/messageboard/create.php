<?php

$performed_by = get_entity($vars['item']->subject_guid);
$performed_on = get_entity($vars['item']->object_guid);

$url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
$string = elgg_echo("messageboard:river:added", array($url))  . " <a href=\"{$performed_on->getURL()}\">" . $performed_on->name . "'s</a> " . elgg_echo("messageboard:river:messageboard");


echo $string;
