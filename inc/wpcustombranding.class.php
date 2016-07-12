<?php
/**
 * @User Brendan
 * @Package wp-custom-login-branding
 * @File wpcustombranding.class.php
 * @Date 12-Jul-16  10:44 AM
 * @Version 1.0
 */
class wpCustomBranding
{


    function __construct()
    {


        add_action('login_message', array($this, 'wclb_before_form'));
        add_action('login_footer', array($this, 'wclb_after_form'));
        add_action( 'login_enqueue_scripts', array($this, 'wclb_css'));

    }


    function wclb_css()
    {
        $wclb_options = get_option('custom_login_settings_option_name');
        $bg_image = $wclb_options['background_image_1'];
        $bg_colour = $wclb_options['background_colour_2'];
        $main_logo = $wclb_options['logo_0'];
    ?>
        <style>
            body{
                background-image: url('<?php echo $bg_image;?>')!important;
                background-color: <?php echo $bg_colour;?>!important;
            }
            body.login div#login h1 a {
                background-image: url('<?php echo $main_logo;?>');
            }



        </style>

        <?php
    }

    function wclb_custom_css()
    {


    }

    function wclb_custom_js()
    {


    }


    function wclb_before_form(){


        $wclb_options = get_option('custom_login_settings_option_name');

        $before_form_text = $wclb_options['text_before_form_7'];

        echo $before_form_text;


    }

    function wclb_after_form(){

        $wclb_options = get_option('custom_login_settings_option_name');

        $after_form_text = $wclb_options['text_after_form_8'];

        echo $after_form_text;


    }


}

$wclb = new wpCustomBranding();