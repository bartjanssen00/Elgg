<?php
/**
 * CSS form elements
 *
 * @package Elgg.Core
 * @subpackage UI
 */
?>
/* ***************************************
	Form Elements
*************************************** */
label {
	font-weight: bold;
	color: #333333;
	font-size: 110%;
}
input, textarea {
	font: 120% Arial, Helvetica, sans-serif;
	padding: 5px;
	border: 1px solid #cccccc;
	color: #666666;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
}
textarea {
	height: 200px;
	width: 98%;
}
input[type="text"], textarea {
	width: 98%;
}
input[type="password"] {
	width: 200px;
}
input[type="text"]:focus, input[type="password"]:focus {
	border: solid 1px #4690d6;
	background: #e4ecf5;
	color:#333333;
}

<?php //@todo prefix with "elgg-" ?>
textarea.monospace {
	font-family: Monaco,"Courier New",Courier,monospace;
	font-size: 13px;
}
a.elgg-longtext-control {
	float: right;
	margin-left: 14px;
}


.elgg-input-access {
	margin:5px 0 0 0;
}
input[type="checkbox"],
input[type="radio"] {
	margin:0 3px 0 0;
	padding:0;
	border:none;
}

input[type="submit"],
input[type="button"],
.elgg-button {
	font-size: 14px;
	font-weight: bold;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	width: auto;
	padding: 2px 4px;
	margin: 10px 0 10px 0;
	cursor: pointer;
	outline: none;
	-webkit-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.40);
	-moz-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.40);
}
input[type="submit"],
.elgg-submit-button {
	color: white;
	text-shadow: 1px 1px 0px black;
	text-decoration: none;
	border: 1px solid #4690d6;
	background-color: #4690d6;
	background-image: url(<?php echo elgg_get_site_url(); ?>_graphics/button_graduation.png);
	background-repeat: repeat-x;
	background-position: left 10px;
}
input[type="submit"]:hover,
.elgg-submit-button:hover {
	border-color: #0054a7;
	text-decoration: none;
	color: white;
	background-color: #0054a7;
	background-image: url(<?php echo elgg_get_site_url(); ?>_graphics/button_graduation.png);
	background-repeat: repeat-x;
	background-position: left 10px;
}
.elgg-cancel-button {
	color: #333333;
	background-color: #dddddd;
	background-image: url(<?php echo elgg_get_site_url(); ?>_graphics/button_graduation.png);
	background-repeat: repeat-x;
	background-position: left 10px;
	border: 1px solid #999999;
}
.elgg-cancel-button:hover {
	color: white;
	background-color: #999999;
	background-position: left 10px;
	text-decoration: none;
}
.elgg-action-button {
	background-color:#cccccc;
	background-image:  url(<?php echo elgg_get_site_url(); ?>_graphics/button_background.gif);
	background-repeat:  repeat-x;
	background-position: 0 0;
	border:1px solid #999999;
	color: #333333;
	padding: 2px 15px 2px 15px;
	text-align: center;
	font-weight: bold;
	text-decoration: none;
	text-shadow: 0 1px 0 white;
	cursor: pointer;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
}
.elgg-action-button:hover,
.elgg-action-button:focus {
	background-position: 0 -15px;
	background-image: url(<?php echo elgg_get_site_url(); ?>_graphics/button_background.gif);
	background-repeat: repeat-x;
	color: #111111;
	text-decoration: none;
	background-color: #cccccc;
	border: 1px solid #999999;
}
/*
<?php //@todo elgg-state-disabled? ?>
.elgg-submit-button.disabled {
	background-color:#999999;
	border-color:#999999;
	color:#dedede;
}
.elgg-submit-button.disabled:hover {
	background-color:#999999;
	border-color:#999999;
	color:#dedede;
}

.elgg-action-button {
	margin-left: 10px;
}
input.elgg-action-button,
a.elgg-action-button {
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	background-color:#cccccc;
	background-image:  url(<?php echo elgg_get_site_url(); ?>_graphics/button_background.gif);
	background-repeat:  repeat-x;
	background-position: 0 0;
	border:1px solid #999999;
	color:#333333;
	padding:2px 15px 2px 15px;
	text-align:center;
	font-weight:bold;
	text-decoration:none;
	text-shadow:0 1px 0 white;
	cursor:pointer;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
}
input.elgg-action-button:hover,
a.elgg-action-button:hover,
input.elgg-action-button:focus,
a.elgg-action-button:focus {
	background-position:0 -15px;
	background-image:  url(<?php echo elgg_get_site_url(); ?>_graphics/button_background.gif);
	background-repeat:  repeat-x;
	color:#111111;
	text-decoration: none;
	background-color:#cccccc;
	border:1px solid #999999;
}
.elgg-action-button:active {
	background-image:none;
}
.elgg-action-button.disabled {
	color:#999999;
	padding:2px 7px 2px 7px;
}
.elgg-action-button.disabled:hover {
	background-position:0 -15px;
	color:#111111;
	border:1px solid #999999;
}
.elgg-action-button.disabled:active {
	background-image:none;
}
.elgg-action-button.download {
	padding: 5px 9px 5px 6px;
}
.elgg-action-button.download:hover {

}
.elgg-action-button.download img {
	margin-right:6px;
	position:relative;
	top:5px;
}
.elgg-action-button.small {
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	width: auto;
	height:8px;
	padding: 4px;
	font-size: 0.9em;
	line-height: 0.6em;
}
.elgg-action-button.small:hover {
	background-color: #4690d6;
	background-image: none;
	border-color: #4690d6;
	color:white;
	text-shadow:0 -1px 0 black;
}

*/

<?php //@todo prefix with elgg- ?>
/* small round delete button */
.delete-button {
	width:14px;
	height:14px;
	margin:0;
	float:right;
}
.delete-button a {
	display:block;
	cursor: pointer;
	width:14px;
	height:14px;
	background: url("<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png") no-repeat -200px top;
	text-indent: -9000px;
	text-align: left;
}
.delete-button a:hover {
	background-position: -200px -16px;
}
