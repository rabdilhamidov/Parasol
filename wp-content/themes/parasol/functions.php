<?php 

function theme_setup() {
	// load_theme_textdomain( 'kulynad');
	remove_filter('the_excerpt', 'wpautop');
	add_theme_support( 'post-thumbnails' );
}

add_action( 'after_setup_theme', 'theme_setup' );


/**
 * Добавляет секции, параметры и элементы управления (контролы) на страницу настройки темы
 */

function extend_theme_params($customizer){
    $customizer->add_section(
        'extended_section',
        array(
            'title' => 'Контакты',
            'priority' => 35,
        )
    );

	$customizer->add_setting(
		'phone',
		array('default' => '+38 095 060 25 69')
	);    
	
	$customizer->add_setting(
		'email',
		array('default' => 'info@kulynad.com')
	);
	
	$customizer->add_control(
		'email',
		array(
			'label' => 'e-mail',
			'section' => 'extended_section',
			'type' => 'text',
		)
	);

	$customizer->add_control(
		'phone',
		array(
			'label' => 'phone',
			'section' => 'extended_section',
			'type' => 'text',
		)
	);	
}
add_action('customize_register', 'extend_theme_params');

function ppr($_arr, $_arr_name = NULL){
    echo"<p>$_arr_name</p><pre>";print_r($_arr);echo"</pre>";   
}  

function get_post_slug($postName, $type="post", $output = OBJECT){
	global $wpdb;
	$post = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_name = %s AND post_type='".$type."'", $postName ));
	if ( $post ){
		return get_post($post, $output);
	}
	return false;
} 

?>