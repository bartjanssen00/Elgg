<?php
/**
* Profile widgets/tools
* 
* @package ElggGroups
*/ 
	 
// tools widget area
echo "<div id='group_tools_latest' class='clearfix'>";
	
	// enable tools to extend this area
	echo elgg_view("groups/tool_latest", array('entity' => $vars['entity']));

echo "</div>";		 
?>
<script type="text/javascript">
$(document).ready(function () { // subclass every other group tool widget
	$('#group_tools_latest').find('.group_tool_widget:odd').addClass('odd');
});
</script>	 
