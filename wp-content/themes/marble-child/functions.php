<?php
// Add custom Theme Functions here
function theme_enqueue_child_js() {
    // Đăng ký và tải file JavaScript từ child theme
    wp_enqueue_script('custom-child-js', get_stylesheet_directory_uri() . '/customize-app.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_child_js');