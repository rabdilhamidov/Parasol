<?php
/*
Plugin Name: GB Under Construction
Plugin URI: http://twog.me/plugins#underconst
Description: Супер-легкий плагин, который включит на вашем сайте режим "В разработке" для гостей, в это же время вы сможете спокойно работать со своим сайтом.
Author: Bogdan Grigoruk + RA
Version: 1.0
Author URI: http://twog.me
*/

function gb_underconst() {
if( (strpos($_SERVER['REQUEST_URI'], 'wp-admin') > 0) || (strpos($_SERVER['REQUEST_URI'], 'wp-login') > 0) || (is_admin()) ){

	}else{

		if( !is_user_logged_in() ){
			// header( 'Location: /index.html' );
			
			readfile ( 'underconstruct/index.html');

			die();
		}

	}
}
add_action('init','gb_underconst',1);
?>