<?php
class Settings {

    private $options;

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    public function add_plugin_page() {
        add_options_page(
            'Photostudio Settings',
            'Photostudio Settings',
            'manage_options',
            'photostudio-settings',
            array( $this, 'create_admin_page' )
        );
    }

    public function create_admin_page() {
        $this->options = get_option( 'photostudio_settings' ); ?>

        <div class="wrap">
            <h1>Photostudio Settings</h1>
            <form method="post" action="options.php">
            <?php
                settings_fields( 'photostudio_settings_group' );
                do_settings_sections( 'photostudio-settings-admin' );
                submit_button();
            ?>
            </form>
        </div>
    <?php }

    public function page_init() {
        register_setting(
            'photostudio_settings_group',
            'photostudio_settings'
        );

        add_settings_section(
            'photostudio_settings_section',
            'Company Information',
            array( $this, 'print_section_info' ),
            'photostudio-settings-admin'
        );

        add_settings_field(
            'company_name',
            'Company Name',
            array( $this, 'company_name_callback' ),
            'photostudio-settings-admin',
            'photostudio_settings_section'
        );

        add_settings_field(
            'company_address',
            'Company Address',
            array( $this, 'company_address_callback' ),
            'photostudio-settings-admin',
            'photostudio_settings_section'
        );

        add_settings_field(
            'company_phone',
            'Company Phone',
            array( $this, 'company_phone_callback' ),
            'photostudio-settings-admin',
            'photostudio_settings_section'
        );

        add_settings_field(
            'company_email',
            'Company Email',
            array( $this, 'company_email_callback' ),
            'photostudio-settings-admin',
            'photostudio_settings_section'
        );
    }

    public function print_section_info() {
        print 'Enter your company information below:';
    }

    public function company_name_callback() {
        printf(
            '<input type="text" id="company_name" name="photostudio_settings[company_name]" value="%s" />',
            isset( $this->options['company_name'] ) ? esc_attr( $this->options['company_name']) : ''
        );
    }

    public function company_address_callback() {
        printf(
            '<textarea id="company_address" name="photostudio_settings[company_address]" rows="5" cols="50">%s</textarea>',
            isset( $this->options['company_address'] ) ? esc_attr( $this->options['company_address']) : ''
        );
    }
public function company_phone_callback() {
    printf(
        '<input type="text" id="company_phone" name="photostudio_settings[company_phone]" value="%s" />',
        isset( $this->options['company_phone'] ) ? esc_attr( $this->options['company_phone']) : ''
    );

  }
  public function company_email_callback() {
    printf(
        '<input type="text" id="company_email" name="photostudio_settings[company_email]" value="%s" />',
        isset( $this->options['company_email'] ) ? esc_attr( $this->options['company_email']) : ''
    );

  }
}