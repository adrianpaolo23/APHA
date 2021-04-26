<?php
/**
 * SwipeWP Theme Customizer
 *
 * @package SwipeWP
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function swipewp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'swipewp_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'swipewp_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'swipewp_customize_register' );

/**
 * Required customizer files
 */

require get_template_directory() . '/inc/customizer/panels/define-panels.php';
require get_template_directory() . '/inc/customizer/controls/custom-controls.php';
require get_template_directory() . '/inc/customizer/sanitize.php';
require get_template_directory() . '/inc/customizer/callback.php';
require get_template_directory() . '/inc/customizer/partials.php';

$swipewp_sub_sections = array(
	'general'		=> array( 'assign-sections', 'theme-options' ),
	'header'		=> array( 'top', 'menu', 'innerpage' ),
	'front'			=> array( 'banner', 'services', 'portfolio', 'team', 'blog', 'cta', 'testimonials', 'sponsors' ),
	'design'		=> array( 'archive', 'page', 'post' ),
	'footer'		=> array( 'widget-area', 'sub' ),
	'additional' 	=> array( 'social-media', 'scroll-to-top' )
);

foreach ( $swipewp_sub_sections as $key => $value ) {
	foreach ( $value as $k => $v ) {
		require get_template_directory() . '/inc/customizer/sections/'. $key . '/' . $v .'.php';
	}
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function swipewp_customize_preview_js() {
	wp_enqueue_script( 'swipewp-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'swipewp_customize_preview_js' );

/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue required scripts/styles for customizer panel
 *
 * @since 1.0.0
 */
function swipewp_customize_backend_scripts() {
 	
    global $swipewp_version;
	
	wp_enqueue_style( 'swipewp-font-awesome', get_template_directory_uri() . '/assets/library/font-awesome/css/all.min.css', array(), '5.8.1' );

	wp_enqueue_style( 'swipewp-font-awesome-v4', get_template_directory_uri() . '/assets/library/font-awesome/css/v4-shims.css', array(), '5.8.1' );

	wp_enqueue_style( 'swipewp-customizer-style', get_template_directory_uri() . '/assets/css/customizer-style.css', array(), esc_attr( $swipewp_version ) );

    wp_enqueue_script( 'swipewp-customizer-script', get_template_directory_uri() . '/assets/js/customizer-controls.js', array( 'jquery' ), esc_attr( $swipewp_version ), true );
}
add_action( 'customize_controls_enqueue_scripts', 'swipewp_customize_backend_scripts', 10 );

if ( class_exists( 'WP_Customize_Section' ) ) {

/*-----------------------------------------------------------------------------------------------------------------------*/
    
    /**
     * Upsell customizer section.
     *
     * @since  1.0.2
     * @access public
     */
    class Swipewp_Customize_Section_Upsell extends WP_Customize_Section {

        /**
         * The type of customize section being rendered.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $type = 'mt-upsell';

        /**
         * Custom button text to output.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $pro_text = '';

        /**
         * Custom pro button URL.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $pro_url = '';

        /**
         * Add custom parameters to pass to the JS via JSON.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function json() {
            $json = parent::json();

            $json['pro_text'] = $this->pro_text;
            $json['pro_url']  = esc_url( $this->pro_url );

            return $json;
        }

        /**
         * Outputs the Underscore.js template.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        protected function render_template() { ?>

            <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
                <h3 class="accordion-section-title">
                    {{ data.title }}

                    <# if ( data.pro_text && data.pro_url ) { #>
                        <a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
                    <# } #>
                </h3>
            </li>
        <?php }
    }
}

add_action( 'customize_register', 'swipewp_pro_link_section' );

function swipewp_pro_link_section( $wp_customize ) {

	$wp_customize->register_section_type( 'Swipewp_Customize_Section_Upsell' );

    /**
     * Register theme upsell sections.
     *
     * @since 1.0.2
     */
    $wp_customize->add_section( new Swipewp_Customize_Section_Upsell(
        $wp_customize,
            'swipewp_theme_upsell',
            array(
                'title'    	=> esc_html__( 'Swipe Pro', 'swipewp' ),
                'pro_text' 	=> esc_html__( 'Buy Now', 'swipewp' ),
                'pro_url'  	=> 'https://mysterythemes.com/wp-themes/swipe-pro/',
                'priority' 	=> 1,
            )
        )
    );

}