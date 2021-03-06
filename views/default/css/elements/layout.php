<?php
/**
 *
 */
?>

/* ***************************************
	PAGE LAYOUT
*************************************** */
<?php //@todo should be in base/reset ?>
body {
	background-color: white;
}

/***** TOPBAR ******/

.elgg-page-topbar {
	background: #333333 url(<?php echo elgg_get_site_url(); ?>_graphics/toptoolbar_background.gif) repeat-x top left;
	border-bottom: 1px solid #000000;
	min-width: 998px;
	position: relative;
	height: 24px;
	z-index: 9000;
}
.elgg-page-topbar > .elgg-inner {
	padding: 2px 10px 2px 8px;
}

<?php //@todo location-dependent styles ?>
.elgg-page-topbar a {
	color: #eeeeee;
	float: left;
	margin: 2px 30px 0 0;
	line-height: 1.1em;
}
.elgg-page-topbar a.elgg-alt {
	float: right;
	margin: 2px 0 0 30px;
}
.elgg-page-topbar a:hover {
	color: #71cbff;
	text-decoration: none;
}
/* elgg logo and user avatar need to be adjusted slightly */
.elgg-page-topbar img {
	margin-top: -1px;
}

/***** PAGE MESSAGES ******/
.elgg-system-messages {
	position:fixed;
	top:24px;
	right:20px;
	max-width:500px;
	z-index:9600;
}

/***** PAGE HEADER ******/

.elgg-page-header {
	x-overflow: hidden;
	position: relative;
	background-color: #4690D6;
	background-image: url(<?php echo elgg_get_site_url(); ?>_graphics/header_shadow.png);
	background-repeat: repeat-x;
	background-position: bottom left;
}

<?php //@todo Put all elgg-classic styles together ?>
.elgg-classic .elgg-page-header > .elgg-inner {
	width: 990px;
	margin: 0 auto;
	height: 90px;
	position: relative;
}

<?php //@todo location-dependent styles ?>
.elgg-page-header h1 a {
	font-size: 2em;
	line-height: 1.4em;
	color: white;
	font-style: italic;
	font-family: Georgia, times, serif;
	text-shadow: 1px 2px 4px #333333;
	text-decoration: none;
}

/***** PAGE BODY ******/

.elgg-page-body > .elgg-inner {
	min-height: 360px;
}
.elgg-classic .elgg-page-body > .elgg-inner {
	width: 990px;
	margin: 0 auto;
}

<?php //@todo layout object is different from page object -- put in separate files? ?>
#elgg-layout-one-column {
	padding: 10px 0;
}
#elgg-layout-sidebar {
	background-image: url(<?php echo elgg_get_site_url(); ?>_graphics/sidebar_background.gif);
	background-repeat: repeat-y;
	background-position: right top;
}
#elgg-layout-two-sidebar {
	background-image: url(<?php echo elgg_get_site_url(); ?>_graphics/two_sidebar_background.gif);
	background-repeat: repeat-y;
	background-position: right top;
}
.elgg-main {
	position: relative;
	min-height: 360px;
	padding: 10px;
}

.elgg-aside {
	padding: 20px 10px;
	position: relative;
	min-height: 360px;
}
.elgg-sidebar {
	float: right;
	width: 210px;
	margin: 0 0 0 10px;
}
.elgg-sidebar.elgg-alt {
	float: left;
	width: 160px;
	margin: 0 10px 0 0;
}

.elgg-main .elgg-header {
	border-bottom: 1px solid #CCCCCC;
	padding-bottom: 3px;
}

<?php //@todo location-dependent styles ?>
.elgg-main .elgg-header h2 {
	float: left;
	max-width: 530px;
	margin-right: 10px;
}

.elgg-main > .elgg-header a {
	float: right;
}

/***** PAGE FOOTER ******/

.elgg-page-footer {
	position: relative;
	z-index: 999;
}
.elgg-classic .elgg-page-footer > .elgg-inner {
	width: 990px;
	margin: 0 auto;
	padding: 5px 0;
	border-top: 1px solid #DEDEDE;
}

<?php //@todo location-dependent styles ?>
.elgg-page-footer a {
	float: left;
}
.elgg-page-footer a.elgg-alt {
	float: right;
}
.elgg-page-footer .elgg-menu {
	float: left;
	width: 100%;
}
.elgg-page-footer .elgg-inner,
.elgg-page-footer .elgg-inner a,
.elgg-page-footer .elgg-inner p {
	color: #999999;
}
.elgg-page-footer .elgg-inner a:hover {
	color: #666666;
}
