<?php
	/*
	Plugin Name: niconico-embed
	Plugin URI: https://github.com/kazsw/wp-niconico-embed
	Description: Niconico embed plugin
	Version: 1.0
	Author: Kazuki Sawada
	Author URI: https://github.com/kazsw
	License: MIT
	*/
	
	add_shortcode("niconico", function($atts, $content = ""){
		return '<iframe width="312" height="176" src="' . plugins_url("proxy.php", __FILE__) . '?http://ext.nicovideo.jp/thumb/' . $atts["id"] . '" scrolling="no" style="border:solid 1px #CCC;" frameborder="0"><a href="http://www.nicovideo.jp/watch/' . $atts["id"] . '">' . $content . '</a></iframe>';
	});
?>
