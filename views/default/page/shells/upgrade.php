<?php
/**
 * Page shell for upgrade script
 *
 * Displays an ajax loader until upgrade is complete
 */
?>
<html>
	<head>
		<title><?php echo elgg_echo('upgrading'); ?></title>
		<meta http-equiv="refresh" content="1;url=<?php echo elgg_get_site_url(); ?>upgrade.php?upgrade=upgrade"/>
	</head>
	<body bgcolor="white">
		<table width="100%" height="100%" border="0" style="margin: 0px; padding: 0px">
			<tr>
				<td width="100%" height="100%" valign="middle" align="center">
					<img src="<?php echo elgg_get_site_url(); ?>_graphics/ajax_loader_bw.gif"  alt="upgrading" />
				</td>
			</tr>
		</table>
	</body>
</html>