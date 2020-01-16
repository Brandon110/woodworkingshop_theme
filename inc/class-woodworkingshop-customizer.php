<?php
/**
 * WoodWorkingShop customizer
 * 
 * @package woodworkingshop
 */

class WoodWorkingShop_Customizer {

    /**
     * Customizer constructor
     */
    public function __construct() {

        add_action( 'customize_register', array( $this, 'register_customize_sections' ) );
    }

    /**
     * Add all sections and panels
     */
    public function register_customize_sections( $wp_customize ) {

        /**
         * Add settings to sections
         */
        $this->site_identity_section( $wp_customize );
    }

    /**
     * Section: Site Identity
     */
    private function site_identity_section( $wp_customize ) {

        $wp_customize->add_setting( 'wws_tagline_display', array(
            'default' => 'true',
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_validate_boolean',
        ) );
    
        $wp_customize->add_control( 'wws_tagline_display',
        array(
            'label' => __( 'Show Tagline', 'woodworkingshop' ),
            'section' => 'title_tagline',
            'type' => 'checkbox'
        ) );

        $wp_customize->add_setting( 'wws_logo_url', array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'woodworkingshop_sanitize_image',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wws_header_logo',
        array(
            'label' => __( 'Upload Logo', 'woodworkingshop' ),
            'description' => 'Upload your website logo here, your logo will be seen instead of <strong>Site Title</strong> and <strong>Tagline</strong>.',
            'section' => 'title_tagline',
            'settings' => 'wws_logo_url',
        ) ) );
    }
}

new WoodWorkingShop_Customizer();