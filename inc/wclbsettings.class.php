<?php

/**
 * @User Brendan
 * @Package wp-custom-login-branding
 * @File wclbsettings.class.php
 * @Date 12-Jul-16  11:04 AM
 * @Version
 */


class CustomLoginSettings {
    private $custom_login_settings_options;

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'custom_login_settings_add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'custom_login_settings_page_init' ) );
    }

    public function custom_login_settings_add_plugin_page() {
        add_options_page(
            'Custom Login Settings', // page_title
            'Custom Login Settings', // menu_title
            'manage_options', // capability
            'custom-login-settings', // menu_slug
            array( $this, 'custom_login_settings_create_admin_page' ) // function
        );
    }

    public function custom_login_settings_create_admin_page() {
        $this->custom_login_settings_options = get_option( 'custom_login_settings_option_name' ); ?>

        <div class="wrap">
            <h2>Custom Login Settings</h2>
            <p>Brand your WordPress login screen</p>
            <?php settings_errors(); ?>

            <form method="post" action="options.php">
                <?php
                settings_fields( 'custom_login_settings_option_group' );
                do_settings_sections( 'custom-login-settings-admin' );
                submit_button();
                ?>
            </form>
        </div>
    <?php }

    public function custom_login_settings_page_init() {
        register_setting(
            'custom_login_settings_option_group', // option_group
            'custom_login_settings_option_name', // option_name
            array( $this, 'custom_login_settings_sanitize' ) // sanitize_callback
        );

        add_settings_section(
            'custom_login_settings_setting_section', // id
            'Settings', // title
            array( $this, 'custom_login_settings_section_info' ), // callback
            'custom-login-settings-admin' // page
        );

        add_settings_field(
            'logo_0', // id
            'Logo', // title
            array( $this, 'logo_0_callback' ), // callback
            'custom-login-settings-admin', // page
            'custom_login_settings_setting_section' // section
        );

        add_settings_field(
            'background_image_1', // id
            'Background Image', // title
            array( $this, 'background_image_1_callback' ), // callback
            'custom-login-settings-admin', // page
            'custom_login_settings_setting_section' // section
        );

        add_settings_field(
            'background_colour_2', // id
            'Background Colour', // title
            array( $this, 'background_colour_2_callback' ), // callback
            'custom-login-settings-admin', // page
            'custom_login_settings_setting_section' // section
        );

        add_settings_field(
            'hyperlink_colour_3', // id
            'Hyperlink Colour', // title
            array( $this, 'hyperlink_colour_3_callback' ), // callback
            'custom-login-settings-admin', // page
            'custom_login_settings_setting_section' // section
        );

        add_settings_field(
            'label_colour_4', // id
            'Label Colour', // title
            array( $this, 'label_colour_4_callback' ), // callback
            'custom-login-settings-admin', // page
            'custom_login_settings_setting_section' // section
        );

        add_settings_field(
            'custom_css_5', // id
            'Custom CSS', // title
            array( $this, 'custom_css_5_callback' ), // callback
            'custom-login-settings-admin', // page
            'custom_login_settings_setting_section' // section
        );

        add_settings_field(
            'custom_js_6', // id
            'Custom JS', // title
            array( $this, 'custom_js_6_callback' ), // callback
            'custom-login-settings-admin', // page
            'custom_login_settings_setting_section' // section
        );

        add_settings_field(
            'text_before_form_7', // id
            'Text Before Form', // title
            array( $this, 'text_before_form_7_callback' ), // callback
            'custom-login-settings-admin', // page
            'custom_login_settings_setting_section' // section
        );

        add_settings_field(
            'text_after_form_8', // id
            'Text After Form', // title
            array( $this, 'text_after_form_8_callback' ), // callback
            'custom-login-settings-admin', // page
            'custom_login_settings_setting_section' // section
        );
    }

    public function custom_login_settings_sanitize($input) {
        $sanitary_values = array();
        if ( isset( $input['logo_0'] ) ) {
            $sanitary_values['logo_0'] = sanitize_text_field( $input['logo_0'] );
        }

        if ( isset( $input['background_image_1'] ) ) {
            $sanitary_values['background_image_1'] = sanitize_text_field( $input['background_image_1'] );
        }

        if ( isset( $input['background_colour_2'] ) ) {
            $sanitary_values['background_colour_2'] = sanitize_text_field( $input['background_colour_2'] );
        }

        if ( isset( $input['hyperlink_colour_3'] ) ) {
            $sanitary_values['hyperlink_colour_3'] = sanitize_text_field( $input['hyperlink_colour_3'] );
        }

        if ( isset( $input['label_colour_4'] ) ) {
            $sanitary_values['label_colour_4'] = sanitize_text_field( $input['label_colour_4'] );
        }

        if ( isset( $input['custom_css_5'] ) ) {
            $sanitary_values['custom_css_5'] = esc_textarea( $input['custom_css_5'] );
        }

        if ( isset( $input['custom_js_6'] ) ) {
            $sanitary_values['custom_js_6'] = esc_textarea( $input['custom_js_6'] );
        }

        if ( isset( $input['text_before_form_7'] ) ) {
            $sanitary_values['text_before_form_7'] = esc_textarea( $input['text_before_form_7'] );
        }

        if ( isset( $input['text_after_form_8'] ) ) {
            $sanitary_values['text_after_form_8'] = esc_textarea( $input['text_after_form_8'] );
        }

        return $sanitary_values;
    }

    public function custom_login_settings_section_info() {

    }

    public function logo_0_callback() {
        printf(
            '<input class="regular-text" type="text" name="custom_login_settings_option_name[logo_0]" id="logo_0" value="%s">',
            isset( $this->custom_login_settings_options['logo_0'] ) ? esc_attr( $this->custom_login_settings_options['logo_0']) : ''
        );
    }

    public function background_image_1_callback() {
        printf(
            '<input class="regular-text" type="text" name="custom_login_settings_option_name[background_image_1]" id="background_image_1" value="%s">',
            isset( $this->custom_login_settings_options['background_image_1'] ) ? esc_attr( $this->custom_login_settings_options['background_image_1']) : ''
        );
    }

    public function background_colour_2_callback() {
        printf(
            '<input class="regular-text" type="text" name="custom_login_settings_option_name[background_colour_2]" id="background_colour_2" value="%s">',
            isset( $this->custom_login_settings_options['background_colour_2'] ) ? esc_attr( $this->custom_login_settings_options['background_colour_2']) : ''
        );
    }

    public function hyperlink_colour_3_callback() {
        printf(
            '<input class="regular-text" type="text" name="custom_login_settings_option_name[hyperlink_colour_3]" id="hyperlink_colour_3" value="%s">',
            isset( $this->custom_login_settings_options['hyperlink_colour_3'] ) ? esc_attr( $this->custom_login_settings_options['hyperlink_colour_3']) : ''
        );
    }

    public function label_colour_4_callback() {
        printf(
            '<input class="regular-text" type="text" name="custom_login_settings_option_name[label_colour_4]" id="label_colour_4" value="%s">',
            isset( $this->custom_login_settings_options['label_colour_4'] ) ? esc_attr( $this->custom_login_settings_options['label_colour_4']) : ''
        );
    }

    public function custom_css_5_callback() {
        printf(
            '<textarea class="large-text" rows="5" name="custom_login_settings_option_name[custom_css_5]" id="custom_css_5">%s</textarea>',
            isset( $this->custom_login_settings_options['custom_css_5'] ) ? esc_attr( $this->custom_login_settings_options['custom_css_5']) : ''
        );
    }

    public function custom_js_6_callback() {
        printf(
            '<textarea class="large-text" rows="5" name="custom_login_settings_option_name[custom_js_6]" id="custom_js_6">%s</textarea>',
            isset( $this->custom_login_settings_options['custom_js_6'] ) ? esc_attr( $this->custom_login_settings_options['custom_js_6']) : ''
        );
    }

    public function text_before_form_7_callback() {
        printf(
            '<textarea class="large-text" rows="5" name="custom_login_settings_option_name[text_before_form_7]" id="text_before_form_7">%s</textarea>',
            isset( $this->custom_login_settings_options['text_before_form_7'] ) ? esc_attr( $this->custom_login_settings_options['text_before_form_7']) : ''
        );
    }

    public function text_after_form_8_callback() {
        printf(
            '<textarea class="large-text" rows="5" name="custom_login_settings_option_name[text_after_form_8]" id="text_after_form_8">%s</textarea>',
            isset( $this->custom_login_settings_options['text_after_form_8'] ) ? esc_attr( $this->custom_login_settings_options['text_after_form_8']) : ''
        );
    }

}
if ( is_admin() )
    $custom_login_settings = new CustomLoginSettings();
