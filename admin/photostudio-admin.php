<?php

// Add a menu page for the plugin settings
function photostudio_add_menu_page() {
    add_menu_page(
        __( 'Photo Studio Settings', 'photostudio' ),
        __( 'Photo Studio', 'photostudio' ),
        'manage_options',
        'photostudio',
        'photostudio_render_settings_page',
        'dashicons-camera',
        30
    );
}
add_action( 'admin_menu', 'photostudio_add_menu_page' );

// Render the settings page
function photostudio_render_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php _e( 'Photo Studio Settings', 'photostudio' ); ?></h1>
        <form method="post" action="options.php">
            <?php settings_fields( 'photostudio_settings_group' ); ?>
            <?php do_settings_sections( 'photostudio_settings_page' ); ?>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Add settings fields to the page
function photostudio_add_settings_fields() {
    add_settings_section(
        'photostudio_settings_section',
        __( 'General Settings', 'photostudio' ),
        'photostudio_settings_section_callback',
        'photostudio_settings_page'
    );
    add_settings_field(
        'photostudio_email_address',
        __( 'Email Address', 'photostudio' ),
        'photostudio_email_address_callback',
        'photostudio_settings_page',
        'photostudio_settings_section'
    );
    register_setting(
        'photostudio_settings_group',
        'photostudio_email_address'
    );
}
add_action( 'admin_init', 'photostudio_add_settings_fields' );

// Callback function for the settings section
function photostudio_settings_section_callback() {
    echo '<p>' . __( 'Configure general settings for the Photo Studio plugin.', 'photostudio' ) . '</p>';
}

// Callback function for the email address field
function photostudio_email_address_callback() {
    $email = get_option( 'photostudio_email_address' );
    echo '<input type="email" id="photostudio_email_address" name="photostudio_email_address" value="' . esc_attr( $email ) . '" />';
}
