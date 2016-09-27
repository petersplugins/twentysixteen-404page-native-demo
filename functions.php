<?php

$pp404 = false;

// Activate 404page native support
if ( defined( 'PP_404' ) && pp_404_is_active() ) {
  pp_404_set_native_support();
  $pp404 = true;
}

// Enqueue the parents style
add_action( 'wp_enqueue_scripts', 'mydemo_enqueue_styles' );

function mydemo_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

// include single.php instead of 404.php template
add_filter( 'template_include', 'mydemo_remove_404template', 99 );

function mydemo_remove_404template( $template ) {
  global $pp404;
	if ( is_404() ) {
		$new_template = locate_template( array( 'single.php' ) );
		if ( '' != $new_template ) {
			return $new_template ;
		}
	}
	return $template;
}


?>