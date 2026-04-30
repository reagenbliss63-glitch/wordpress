<?php
/**
 * AniPulse functions and definitions
 */

function anipulse_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // Register navigation menus.
    register_nav_menus( array(
        'menu-1' => esc_html__( 'Primary', 'anipulse' ),
    ) );

    // Switch default core markup to output valid HTML5.
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );
}
add_action( 'after_setup_theme', 'anipulse_setup' );

/**
 * Enqueue scripts and styles.
 */
function anipulse_scripts() {
    // Google Fonts: Outfit and Inter
    wp_enqueue_style( 'anipulse-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@600;700;800&display=swap', array(), null );
    
    // Main stylesheet
    wp_enqueue_style( 'anipulse-style', get_stylesheet_uri(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'anipulse_scripts' );
