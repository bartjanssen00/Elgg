<?php
/**
 * Navigation
 *
 * @package Elgg.Core
 * @subpackage UI
 */
?>

/* ***************************************
	PAGINATION
*************************************** */
.elgg-pagination {
	margin: 10px 0;
	display: block;
	text-align: center;
}
.elgg-pagination li {
	display: inline;
	margin: 0 6px 0 0;
	text-align: center;
}
.elgg-pagination a, .elgg-pagination span {
	padding: 2px 6px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	color: #4690d6;
	border: 1px solid #4690d6;
	font-size: 12px;
}
.elgg-pagination a:hover {
	background: #4690d6;
	color: white;
	text-decoration: none;
}
.elgg-pagination .elgg-state-disabled {
	color: #CCCCCC;
	border-color: #CCCCCC;
}
.elgg-pagination .elgg-state-selected {
	color: #555555;
	border-color: #555555;
}
/* ***************************************
	TABS
*************************************** */
.elgg-tabs {
	margin-bottom: 5px;
	border-bottom: 2px solid #cccccc;
	display: table;
	width: 100%;
}
.elgg-tabs li {
	float: left;
	border: 2px solid #cccccc;
	border-bottom-width: 0;
	background: #eeeeee;
	margin: 0 0 0 10px;
	-moz-border-radius-topleft: 5px;
	-moz-border-radius-topright: 5px;
	-webkit-border-top-left-radius: 5px;
	-webkit-border-top-right-radius: 5px;
}
.elgg-tabs a {
	text-decoration: none;
	display: block;
	padding: 3px 10px 0 10px;
	text-align: center;
	height: 21px;
	color: #999999;
}
.elgg-tabs a:hover {
	background: #dedede;
	color:#4690D6;
}
.elgg-tabs .elgg-state-selected {
	border-color: #cccccc;
	background: white;
}
.elgg-tabs .elgg-state-selected a {
	position: relative;
	top: 2px;
	background: white;
}
/* ***************************************
	BREADCRUMBS
*************************************** */
.elgg-breadcrumbs {
	font-size: 80%;
	font-weight: bold;
	line-height: 1.2em;
	color: #bababa;
}
.elgg-breadcrumbs li {
	display: inline;
}
.elgg-breadcrumbs li:after{
	content: "\003E";
	display: inline-block;
	padding: 0 4px 0 4px;
	font-weight: normal;
}
.elgg-breadcrumbs li:last-child:after {
	content: "";
}
.elgg-breadcrumbs a {
	color: #999999;
}
.elgg-breadcrumbs a:hover {
	color: #0054a7;
	text-decoration: underline;
}
.elgg-main .elgg-breadcrumbs {
	position: relative;
	top:-6px;
	left:0;
}
/* ***************************************
	SITE MENU
*************************************** */
.elgg-site-menu {
	position: absolute;
	height: 23px;
	bottom: 0;
	left: 0;
	width: auto;
	z-index: 7000;
}
.elgg-site-menu li {
	display: block;
	float: left;
	height: 23px;
}
.elgg-site-menu > li {
	margin-right: 1px;
}
.elgg-site-menu a {
	color: white;
	font-weight: bold;
	padding: 3px 13px 0px 13px;
	height: 20px;
	display: block;
}
.elgg-site-menu a:hover {
	text-decoration: none;
}
.elgg-site-menu li.elgg-state-selected a,
.elgg-site-menu li a:hover,
.elgg-site-menu .elgg-more:hover a {
	background: white;
	color: #555555;
	-webkit-box-shadow: 2px -1px 1px rgba(0, 0, 0, 0.25);
	-moz-box-shadow: 2px -1px 1px rgba(0, 0, 0, 0.25);
	-moz-border-radius-topleft: 4px;
	-moz-border-radius-topright: 4px;
	-webkit-border-top-left-radius: 4px;
	-webkit-border-top-right-radius: 4px;
}
.elgg-site-menu .elgg-more {
	overflow: hidden;
}
.elgg-site-menu .elgg-more:hover {
	overflow: visible;
}
.elgg-site-menu .elgg-more:hover span {
	background-position: -146px -76px;
}
.elgg-site-menu .elgg-more ul {
	z-index: 7000;
	min-width: 150px;
	border-left: 1px solid #999999;
	border-right: 1px solid #999999;
	border-bottom: 1px solid #999999;
	-moz-border-radius-bottomleft: 4px;
	-moz-border-radius-bottomright: 4px;
	-webkit-border-bottom-left-radius: 4px;
	-webkit-border-bottom-right-radius: 4px;
	-webkit-box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.25);
	-moz-box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.25);
}
.elgg-site-menu .elgg-more ul li {
	float: none;
}
.elgg-site-menu .elgg-more:hover ul li a {
	background: white;
	color: #555555;
	-webkit-border-radius: 0;
	-moz-border-radius: 0;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
}
.elgg-site-menu .elgg-more ul li a:hover {
	background: #4690D6;
	color: white;
}
.elgg-site-menu .elgg-more ul li:last-child a,
.elgg-site-menu .elgg-more ul li:last-child a:hover {
	-moz-border-radius-bottomleft: 4px;
	-moz-border-radius-bottomright: 4px;
	-webkit-border-bottom-left-radius: 4px;
	-webkit-border-bottom-right-radius: 4px;
}

/* ***************************************
	PAGE MENU
*************************************** */
.elgg-page-menu a {
	display: block;
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	background-color: white;
	margin: 0 0 3px 0;
	padding: 2px 4px 2px 8px;
}
.elgg-page-menu a:hover {
	background-color: #0054A7;
	color: white;
	text-decoration: none;
}
.elgg-page-menu li.elgg-state-selected > a {
	background-color: #4690D6;
	color: white;
}
.elgg-page-menu .elgg-child-menu {
	display: none;
	margin-left: 15px;
}
.elgg-page-menu .elgg-menu-closed:before, .elgg-menu-opened:before {
	display: inline-block;
	padding-right: 4px;
}
.elgg-page-menu .elgg-menu-closed:before {
	content: "\002B";
}
.elgg-page-menu .elgg-menu-opened:before {
	content: "\002D";
}
/* ***************************************
	HOVER MENU
*************************************** */
.elgg-hover-menu {
	display: none;
	position: absolute;

	width: 165px;
	border-top: solid 1px #E5E5E5;
	border-left: solid 1px #E5E5E5;
	border-right: solid 1px #999999;
	border-bottom: solid 1px #999999;
	background-color: #FFFFFF;
	-webkit-box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.50);
	-moz-box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.50);
}
.elgg-hover-menu > li {
	border-bottom: 1px solid #dddddd;
}
.elgg-hover-menu > li:last-child {
	border-bottom: none;
}
.elgg-hover-menu a {
	display: block;
	padding: 2px 8px;
	font-size: 92%;
}
.elgg-hover-menu a:hover {
	background: #cccccc;
	text-decoration: none;
}
.elgg-hover-admin a {
	color: red;
}
.elgg-hover-admin a:hover {
	color: white;
	background-color: red;
}

<?php //@todo needs revamp ?>
.avatar_menu_button {
	width:15px;
	height:15px;
	position:absolute;
	cursor:pointer;
	display:none;
	right:0;
	bottom:0;
}
.avatar_menu_arrow {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat -150px top;
	width:15px;
	height:15px;
}
.avatar_menu_arrow_on {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat -150px -16px;
	width:15px;
	height:15px;
}
.avatar_menu_arrow_hover {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat -150px -32px;
	width:15px;
	height:15px;
}

/* ***************************************
	OWNER BLOCK
*************************************** */
.elgg-owner-block-menu li {
	float: left;
	width: 50%;
	font-size: 90%;
}
/* ***************************************
	FOOTER
*************************************** */
.elgg-footer-menu li {
	float: left;
}
.elgg-footer-menu li:after{
	content: "\007C";
	display: inline-block;
	padding: 0 4px 0 4px;
	font-weight: normal;
}
.elgg-footer-menu li:last-child:after {
	content: "";
}
