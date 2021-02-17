<?php

// Register style sheet.
add_action( 'wp_enqueue_scripts', 'vi_footer_register_plugin_styles' );

/**
 * Register style sheet.
 */
function vi_footer_register_plugin_styles() {
	wp_register_style( 'vi-footer-style', plugins_url( 'wp-vervocity-footer/public/css/vi-footer-style.css' ) );
	wp_enqueue_style( 'vi-footer-style' );
}

function vi_footer_copyright() {
    $site_title = get_bloginfo( 'name' );
    
    $output = '';
    $output .= '<div class="vi-footer">';
      $output .= '<div class="copyright"> © '. date('Y') .' '.$site_title.'</div>';
      $output .= '<div class="developed-by"><a target="_blank" title="Site Developed by Vervocity" href="https://vervocity.io">
        <img alt="Site Developed by Vervocity" src="'.plugin_dir_url( dirname( __FILE__ )).'public/images/vervocity-logo-100x25.png" /></a></div>';
    $output .= '</div>';

    echo $output;
}
add_action( 'wp_footer', 'vi_footer_copyright' );
