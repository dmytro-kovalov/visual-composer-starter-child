<?php
/**
 * Visual Composer Starter Child Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package visual-composer-starter-child
 */



/**
 * Enqueue scripts and styles.
 */
function visual_composer_starter_parent_theme_enqueue_styles() {
	wp_enqueue_style( 'visual-composer-starter-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'visual-composer-starter-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[ 'visual-composer-starter-style' ]
	);
}

add_action( 'wp_enqueue_scripts', 'visual_composer_starter_parent_theme_enqueue_styles' );

/**
 * Enqueue test scripts
 */
function visual_composer_starter_child_enqueue_scripts() {
    wp_localize_script('jquery', 'vcsc', array(
		'ajaxurl' => admin_url('admin-ajax.php'), 
		'nonce' => wp_create_nonce('vcsc_ajax_nonce')
	));
}

add_action('wp_enqueue_scripts', 'visual_composer_starter_child_enqueue_scripts');

function visual_composer_starter_child_ajax_callback() {
    if (isset($_POST['nonce']) && wp_verify_nonce($_POST['nonce'], 'vcsc_ajax_nonce')) {
        echo "hellooo";
    } else {
        echo "Invalid nonce.";
    }
    wp_die();
}

add_action('wp_ajax_nopriv_vcsc_test_ajax', 'visual_composer_starter_child_ajax_callback');
add_action('wp_ajax_vcsc_test_ajax', 'visual_composer_starter_child_ajax_callback');
