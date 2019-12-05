<?php


namespace Elementor;

/*
 * Contact form list
 * return array
 */



if( !function_exists('ecf_contact_form_seven') ){
    function ecf_contact_form_seven(){
        $countactform = array();
        $htmega_forms_args = array( 'posts_per_page' => -1, 'post_type'=> 'wpcf7_contact_form' );
        $htmega_forms = get_posts( $htmega_forms_args );

        if( $htmega_forms ){
            foreach ( $htmega_forms as $htmega_form ){
                $countactform[$htmega_form->ID] = $htmega_form->post_title;
            }
        }else{
            $countactform[ esc_html__( 'No contact form found', 'htmega-addons' ) ] = 0;
        }
        return $countactform;
    }
}



/** 
 * Elementor Appointment
 * @since 1.0.0
*/

class Elementor_Contact_Form_Widget extends Widget_Base {
    public function get_name() {
        return 'elementor_contact_form';
    }
    public function get_title(){
        return esc_html__( 'Elementor Contact Form', 'elementor-contact-form' );
    }
    public function get_icon(){
        return 'fa fa-object-ungroup';
    }
    public function get_categories(){
        return [ 'Fortis' ];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'content',
            [
                'label' => esc_html__( 'Content', 'elementor-contact-form' ),
                'tab' =>  Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'form_id',
            [
                'label' => __( 'Contact Form', 'htmega-addons' ),
                'type' => Controls_Manager::SELECT,
                'options' => ecf_contact_form_seven(),
            ]
        );
        $this->add_control(
            'form_style',
            [
                'label' => __( 'Contact Form Style', 'htmega-addons' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'one',
                'options' => array(
                    'one' => 'One',
                    'two' => 'Two',
                ),
            ]
        );



        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        $form_id = $settings['form_id'];
        $form_style = $settings['form_style'];


        if($form_style == 'two'){
            $form_style = 'style-2';
        }else{
            $form_style = 'style-1';
        }

        ?>
        
    <!--Appointment Section Start Here-->
    <div class="elementor-contact-form-wrapper <?php echo esc_attr($form_style);?>">
    <?php
        if( !empty($form_id) ){
            echo do_shortcode( '[contact-form-7  id="'.$form_id.'"]' ); 
        }else{
            echo '<div class="form_no_select">' .__('Please Select contact form.','htmega-button'). '</div>';
        }
    ?>
    </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Elementor_Contact_Form_Widget() );