<?php
// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit();

if ( ! function_exists('is_plugin_active')) { include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); }

class Elementor_Contact_Form_Function{

    public function __construct(){

        add_action( 'elementor/widgets/widgets_registered', array( $this, 'elementor_contact_form_includes_widgets' ) );
        add_action( 'admin_menu', array ( $this, 'elementor_contact_form_adminbar_menu' ), 10 );
        add_action( 'wp_enqueue_scripts', array ( $this, 'elementor_contact_form_enqueue_frontend_styles' ), 10 );
    }

    public function elementor_contact_form_includes_widgets(){
        require_once ELEMENTOR_CONTACT_FORM_PATH.'includes/widgets/contactform-addon.php';

    }

     public function elementor_contact_form_adminbar_menu(){
        $menu = 'add_menu_' . 'page';
            $menu( 
                'ecf_panel', 
                __( 'Elementor Contact Form', 'htevent' ), 
                'read', 
                'htevent', 
                NULL, 
                'dashicons-calendar-alt', 
                40 
            );
    }

    public function elementor_contact_form_enqueue_frontend_styles(){
        wp_enqueue_style( 'elementor-contact-form-style', ELEMENTOR_CONTACT_FORM_URL . 'assets/css/elementor-contact-form.css' );
    }

}
new Elementor_Contact_Form_Function();
