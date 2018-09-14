<?php
$magzen_page_builder = __( 'Page Builder', 'magzen' );      
$magzen_page_builder_details = __('MagZen Pro supports Page Builder.  You can drag and drop our MagZenPro widgets with page builder visual editor.', 'magzen' );
$magzen_page_layout = __( 'Page Layout', 'magzen' );
$magzen_page_layout_details = __('MagZenPro offers many different page layouts so you can quickly and easily create your pages with various layout without any hassle!', 'magzen' );
$magzen_unlimited_sidebar = __( 'Unlimited Sidebar', 'magzen' );
$magzen_unlimited_sidebar_details = __( 'Unlimited sidebars allows you to create multiple sidebars. Check out our demo site to see how different pages displays different sidebars!', 'magzen' );
$magzen_style_design = __( 'Magazine Style Design', 'magzen' );
$magzen_style_design_details = __( 'MagZenPro comes with beautiful and well thought magazine style design that will make your blog or magazine site stand out and gain more visitors.', 'magzen' );
$magzen_typography = __( 'Typography', 'magzen' );
$magzen_typography_details = __('MagZen Pro loves typography, you can choose from over 500+ Google Fonts and Standard Fonts to customize your site!', 'magzen' );
$magzen_slider = __( 'Awesome Sliders', 'magzen' );
$magzen_slider_details = __('MagZen Pro includes two types of slider. You can use both Flex and Elastic sliders anywhere in your site.', 'magzen' );
$magzen_woocommerce = __( 'Woo Commerce', 'magzen' );
$magzen_woocommerce_details = __("MagZen Pro has full design/code integration for WooCommerce, your shop will look as good as the rest of your site! and <strong>Lot More Options are available in MagZenPro.</strong>", 'magzen' );
$magzen_custom_widget = __( 'Custom Widget', 'magzen' );
$magzen_custom_widget_details = __( 'We offer many custom widgets that are stylized and ready for use. Simply drag &amp; drop into place to activate!', 'magzen' );
$magzen_advanced_admin = __( 'Advanced Admin', 'magzen' );
$magzen_advanced_admin_details = __( ' you can customize any part of your site quickly and easily using customize options!', 'magzen' );
$magzen_font_awesome = __( 'Font Awesome', 'magzen' );
$magzen_font_awesome_details = __( 'Font Awesome icons are fully integrated into the theme. Use them anywhere in your site in 6 different sizes!', 'magzen' );
$magzen_responsive_layout = __( 'Responsive Layout', 'magzen' );
$magzen_responsive_layout_details = __('MagZen Pro is fully responsive and can adapt to any screen size. Resize your browser window to view it!', 'magzen' );
$magzen_social_media = __( 'Social Media', 'magzen' );
$magzen_social_media_details = __( 'Want your users to stay in touch? No problem, magzen Pro has Social Media icons all throughout the theme!', 'magzen' ); 
$magzen_view_demo = __( 'View Demo', 'magzen');
$magzen_upgrade_to_pro = __( 'Upgrade To Pro', 'magzen' );  
 

$magzen_why_upgrade = <<< FEATURES
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-camera"></i></div>
	<h3>$magzen_style_design</h3>
	<p>$magzen_style_design_details</p>
</div>

<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-cog"></i></div>
	<h3>$magzen_page_builder</h3>
	<p>$magzen_page_builder_details</p>
</div>

<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-th-large"></i></div>
	<h3>$magzen_page_layout</h3>
	<p>$magzen_page_layout_details</p>
</div>

<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-th"></i></div>
	<h3>$magzen_unlimited_sidebar</h3>
	<p>$magzen_unlimited_sidebar_details</p>
</div>

<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-font"></i></div>
	<h3>$magzen_typography</h3>
	<p>$magzen_typography_details</p>
</div>

<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-slideshare"></i></div>
	<h3>$magzen_slider</h3>
	<p>$magzen_slider_details</p>
</div>

<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-tasks"></i></div>
	<h3>$magzen_custom_widget</h3>
	<p>$magzen_custom_widget_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-dashboard"></i></div>
	<h3>$magzen_advanced_admin</h3>
	<p>$magzen_advanced_admin_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-magic"></i></div>
	<h3>$magzen_font_awesome</h3>
	<p>$magzen_font_awesome_details</p>
</div>
<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-arrows"></i></div>
	<h3>$magzen_responsive_layout</h3>
	<p>$magzen_responsive_layout_details</p>
</div>

<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-twitter"></i></div>
	<h3>$magzen_social_media</h3>
	<p>$magzen_social_media_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-leaf"></i></div>
	<h3>$magzen_woocommerce</h3>
	<p>$magzen_woocommerce_details</p>
</div>

FEATURES;

function magzen_theme_page() {
	$title = esc_html(__('MagZen Theme','magzen'));
	add_theme_page( 
		__( 'Upgrade To MagZenPro','magzen'),
		$title.'<i class="fa fa-plane theme-icon"></i>', 
		'edit_theme_options', 
		'magzen_upgrade',
		'magzen_display_upgrade'
	);
}

add_action('admin_menu','magzen_theme_page');

 
function magzen_display_upgrade() {

    $theme_data = wp_get_theme('magzen');
    // Check for current viewing tab
    $tab = null;
    if ( isset( $_GET['tab'] ) ) {
        $tab = $_GET['tab'];
    } else {
        $tab = null;
    }

    $current_action_link =  admin_url( 'themes.php?page=magzen_upgrade&tab=pro_features' ); ?>

    <div class="magzen-wrapper about-wrap">
        <h1><?php printf(esc_html__('Welcome to MagZen - Version %1$s', 'magzen'), $theme_data->Version ); ?></h1>
        <div class="about-text"><?php esc_html_e( 'MagZen is a perfect responsive magazine style WordPress theme. Suitable for news, newspaper, magazine, publishing, business and any kind of sites. It uses skeleton framework for grids which keeps minimal css. Stylesheet is generated using SASS and so stays DRY. Core feature of WordPress  Has 3 Footer Widget Areas.', 'magzen' ); ?></div>
        <a href="https://webulousthemes.com/" target="_blank" class="wp-badge welcome-logo"></a>  
        <p class="upgrade-btn"><a class="upgrade" href="https://www.webulousthemes.com/theme/magzen-pro/" target="_blank"><?php esc_html_e( 'Buy MagZen Pro - $39', 'magzen' ); ?></a></p>

	   <h2 class="nav-tab-wrapper">
	        <a href="?page=magzen_upgrade" class="nav-tab<?php echo is_null($tab) ? ' nav-tab-active' : null; ?>"><?php esc_html_e( 'MagZen', 'magzen' ) ?></a>
	        <a href="?page=magzen_upgrade&tab=pro_features" class="nav-tab<?php echo $tab == 'pro_features' ? ' nav-tab-active' : null; ?>"><?php esc_html_e( 'PRO Fearures', 'magzen' );  ?></a>
	        <?php do_action( 'magzen_admin_more_tabs' ); ?>
	    </h2>  


        <?php if ( is_null( $tab ) ) { ?>
            <div class="theme_info info-tab-content">
                <div class="theme_info_column clearfix">
                	<div id="webulous-create-web">
						<div id="webulous-mode-wrap">
						    <h3>New to Creating a Website?</h3> 
						    <p>We will build you a complete website based on the theme you selected. We will populate content, change colors and do any look and feel customisation work you prefer.</p>
						</div>
						<div class="image-wrap">
							<a href="https://www.webulousthemes.com/checkout?edd_action=add_to_cart&download_id=23052" target="_blank">
							<?php echo sprintf ( '<img src="'. get_template_directory_uri() .'/images/api.png" alt="%1$s" />',__('Image','magzen') ); ?>
							</a>
						</div>
					</div>
                    <div class="theme_info_left">
                        <div class="theme_link">
                            <h3><?php esc_html_e( 'Theme Customizer', 'magzen' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('%s supports the Theme Customizer for all theme settings. Click "Customize" to start customize your site.', 'magzen'), $theme_data->Name); ?></p>
                            <p>
                                <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php esc_html_e('Start Customize', 'magzen'); ?></a>
                            </p>
                        </div>
                        <div class="theme_link">
                            <h3><?php esc_html_e( 'Theme Documentation', 'magzen' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('Need any help to setup and configure %s? Please have a look at our documentations instructions.', 'magzen'), $theme_data->Name); ?></p>
                            <p>
                                <a href="<?php echo esc_url( 'https://www.webulousthemes.com/magzen-free/' ); ?>" target="_blank" class="button button-secondary"><?php esc_html_e('Documentation', 'magzen'); ?></a>
                            </p>
                            <?php do_action( 'magzen_dashboard_theme_links' ); ?>
                        </div>
                        <div class="theme_link">
                            <h3><?php esc_html_e( 'Having Trouble, Need Support?', 'magzen' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('Support for %s WordPress theme is conducted through Webulous free support ticket system.', 'magzen'), $theme_data->Name); ?></p>
                            <p>
                                <a href="<?php echo esc_url('https://www.webulousthemes.com/free-support-request/' ); ?>" target="_blank" class="button button-secondary"><?php echo sprintf( esc_html('Create a support ticket', 'magzen'), $theme_data->Name); ?></a>
                            </p>
                        </div>
                    </div>

                    <div class="theme_info_right">
                        <img src="<?php echo get_template_directory_uri(); ?>/screenshot.jpg" alt="Theme Screenshot" />
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if ( $tab == 'pro_features' ) { ?>
            <div class="pro-features-tab info-tab-content"><?php
			    global $magzen_why_upgrade; ?>
				<div class="wrap clearfix">
				    <?php echo $magzen_why_upgrade; ?>
				</div><?php 
		} ?>
    </div><?php
}
   
	$options = array(
		'capability' => 'edit_theme_options',
		'type' => 'theme_mod',
		'panels' => apply_filters( 'magzen_customizer_options', array(
			'magzen' => array(
				'priority'       => 9,
				'title'          => __('Theme Options', 'magzen'),
				'description'    => __('Theme Options', 'magzen'),
				'sections' => array(
					'general' => array(
						'title' => __('General', 'magzen'),
						'description' => __('General settings that affects overall site', 'magzen'),
						'fields' => array(
							'breadcrumb' => array(
								'type' => 'checkbox',
								'label' => __('Enable Breadcrumb', 'magzen'),
								'default' => 0,
								'sanitize_callback' => 'magzen_boolean',
							),
							'breadcrumb_char' => array(
								'type' => 'select',
								'label' => __('Select Breadcrumb Character', 'magzen'),
								'choices' => array(
									'1' => ' &raquo; ',
									'2' => ' // ',
									'3' => ' > '
								),
								'sanitize_callback' => 'magzen_breadcrumb_char_choices',
								'default' => '1',
							),
							'numeric_pagination' => array(
                                'type' => 'checkbox',
                                'label' => __('Enable Numeric Page Navigation', 'magzen'),
                                'description' => __('Check to display numeric page navigation, instead of Previous Posts / Next Posts links.', 'magzen'),
                                'default' => 1,  
                                'sanitize_callback' => 'magzen_boolean',
                            ),
						),
					),
					'header' => array(
						'title' => __('Header', 'magzen'),
						'description' => __('Header options', 'magzen'),
						'fields' => array(
							'logo_title' => array(
								'type' => 'checkbox',
								'label' => __('Logo as Title', 'magzen'),
								'default' => 0,
								'sanitize_callback' => 'magzen_boolean',
							),
							'tagline' => array(
								'type' => 'checkbox',
								'label' => __('Show site Tagline', 'magzen'),
								'default' => 1,
								'sanitize_callback' => 'magzen_boolean',
							),
							'header_show_date' => array( 
                                'type' => 'checkbox',
                                'label' => __('Show Date in Header', 'magzen'),
                                'default' => 1,
                                'sanitize_callback' => 'magzen_boolean',
                            ),
							'header_search' => array(
                                'type' => 'checkbox',
                                'label' => __('Show Search box in Navigation', 'magzen'),
                                'default' => 1,
                                'sanitize_callback' => 'magzen_boolean', 
                            ),
                            'header_breaking_news' => array(
                                'type' => 'checkbox',
                                'label' => __('Enable Breaking News', 'magzen'),
                                'default' => 1,
                                'sanitize_callback' => 'magzen_boolean', 
                            ),
                            'header_breaking_news_title' => array(
                                'type' => 'text',
                                'label' => __('Breaking News Title', 'magzen'),
                                'description' => __('BREAKING NEWS', 'magzen'),
                                'sanitize_callback' => 'magzen_footer_copyright',
                            ),

						),
					),
					'footer' => array(
						'title' => __('Footer', 'magzen'),
						'description' => __('Footer related options', 'magzen'),
						'fields' => array(
							'footer_widgets' => array(
								'type' => 'checkbox',
								'label' => __('Footer Widget Area', 'magzen'),
								'default' => 1,
								'sanitize_callback' => 'magzen_boolean',
							),
							'copyright' => array(
                                'type' => 'textarea',
                                'label' => __('Footer Copyright Text (Validated that it\'s HTML Allowed)', 'magzen'),
                                'description' => __('HTML Allowed. <b>This field is even HTML validated! </b>', 'magzen'),
                                'sanitize_callback' => 'magzen_footer_copyright',
                            ),
						),
					),
					'home' => array(
						'title' => __('Home', 'magzen'),
						'description' => __('Please go to Appearance &#8594; Widgets and add widget to the "Magazine Page" widget area. You can use the MagZen : Magazine Posts Boxed widgets to set up magazine page.', 'magzen'),
						'fields' => array(
							/* 'slider_field' => array(   
								'type' => 'checkbox',
								'label' => __('Enable Home Page Slider Section', 'magzen'),
								'default' => 1,
								'sanitize_callback' => 'magzen_boolean',
							),
							'slider_cat' => array(
								'type' => 'category',
								'label' => __('Slider Posts Category', 'magzen'),
								'sanitize_callback' => 'absint',
							),
							'slider_count' => array(
								'type' => 'text',
								'label' => __('No. of Sliders', 'magzen'),
								'sanitize_callback' => 'absint',
								'default' => 3,
							),
							'enable_recent_post_service' => array(
                                'type' => 'checkbox',
                                'label' => __('Enable Home Page Recent Post Section', 'magzen'),
                                'description' => __('Enable recent post section in home page', 'magzen'),
                                'default' => 1,  
                            ),
							'recent_posts_count' => array(
								'type' => 'text',
								'label' => __('No. of Recent Posts', 'magzen'),
								'sanitize_callback' => 'absint',
								'default' => 6,
							),*/
							'enable_magazine_default_content' => array(
                                'type' => 'checkbox',
                                'label' => __('Enable Magazine Page Default Content', 'magzen'),
                                'default' => 0, 
                                'sanitize_callback' => 'magzen_boolean'  
                            ), 
						),
					),
					'blog' => array(
						'title' => __('Blog', 'magzen'),
						'description' => __('Blog Related Posts options', 'magzen'),
						'fields' => array(
                             'author_bio_box' => array(
                                'type' => 'checkbox',
                                'label' => __(' Enable Author Bio Box below single post', 'magzen'),
                                'description' => __('Show Author information box below single post.', 'magzen'),
                                'default' => 0, 
                                'sanitize_callback' => 'magzen_boolean' 
                            ),
                            'related_posts' => array(
                                'type' => 'checkbox',
                                'label' => __('Show Related posts', 'magzen'),
                                'description' => __('Show related posts.', 'magzen'),
                                'default' => 0,  
                                'sanitize_callback' => 'magzen_boolean'
                            ),
                            'related_posts_hierarchy' => array(
                                'type' => 'radio',
                                'label' => __('Related Posts Must Be Shown As:', 'magzen'),
                                'choices' => array(
                                    '1' => 'Related Posts By Tags',
                                    '2' => 'Related Posts By Categories',      
                                ),
                               'default' => '1', 
                               'sanitize_callback' => 'absint'  
                            ),
                            'comments' => array(
                                'type' => 'checkbox',
                                'label' => __(' Show Comments', 'magzen'),
                                'description' => __('Show Comments', 'magzen'),
                                'default' => 1, 
                                'sanitize_callback' => 'magzen_boolean' 
                            ),
						),
					),
					'single_blog' => array(
						'title' => __('Single Blog', 'magzen'),
						'description' => __('Single Blog page Related Posts options', 'magzen'),
						'fields' => array(
							'social_sharing_box' => array(
								'type' => 'checkbox',
								'label' => __(' Enable Social Sharing Box below single post', 'magzen'),
								'default' => 0,
								'sanitize_callback' => 'magzen_boolean',    
							),
							'facebook_sb' => array(
								'type' => 'checkbox',
								'label' => __(' Enable Facebook Sharing option below single post', 'magzen'),
								'default' => 0,
								'sanitize_callback' => 'magzen_boolean',    
							),
							'twitter_sb' => array(
								'type' => 'checkbox',
								'label' => __(' Enable Twitter Sharing option below single post', 'magzen'),
								'default' => 0,
								'sanitize_callback' => 'magzen_boolean',    
							),
							'linkedin_sb' => array(
								'type' => 'checkbox',
								'label' => __(' Enable Linkedin Sharing option below single post', 'magzen'),
								'default' => 0,
								'sanitize_callback' => 'magzen_boolean',    
							),
							'google-plus_sb' => array(
								'type' => 'checkbox',
								'label' => __(' Enable Google Plus Sharing option below single post', 'magzen'),
								'default' => 0,
								'sanitize_callback' => 'magzen_boolean',    
							),
							'email_sb' => array(
								'type' => 'checkbox',
								'label' => __(' Enable Email Sharing option below single post', 'magzen'),
								'default' => 0,
								'sanitize_callback' => 'magzen_boolean',    
							),
						),
					),
				)
			),
		) 
	)
	);

function magzen_boolean($value) {
	if(is_bool($value)) {
		return $value;
	} else {
		return false;
	}
}

function magzen_breadcrumb_char_choices($value='') {
	$choices = array('1','2','3');

	if( in_array($value, $choices)) {
		return $value;
	} else {
		return '1';
	}
}

if ( ! function_exists( 'magzen_footer_copyright' ) ) {

    function magzen_footer_copyright($string) {
        $allowed_tags = array(    
                            'a' => array(
                            	'href' => array(),
								'title' => array(),
								'target' => array(),
                            ),
							'img' => array(
								'src' => array(),  
								'alt' => array(),
							),
							'p' => array(),
							'br' => array(),
							'em' => array(),
                            'strong' => array(),
        );
        return wp_kses( $string,$allowed_tags);

    }
}

