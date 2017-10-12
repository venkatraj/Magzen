<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package magzen
 */
  
/**
 * Set up the WordPress core custom header feature.
 *
 * @uses magzen_header_style()
 */
function magzen_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'magzen_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'video'                  => true,
		'header_text'            => true,
		'wp-head-callback'       => 'magzen_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'magzen_custom_header_setup' );


if ( ! function_exists( 'magzen_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see magzen_custom_header_setup().  
 */
function magzen_header_style() {
  
	// If we get this far, we have custom styles. Let's do this.
	
	if ( get_header_image() ) { ?>
		<style type="text/css">
			.header-image {
				background-image: url(<?php echo esc_url(get_header_image()); ?>);
				display: block;
			}   
			.custom-header-media img {
					display: none;
			}   
		</style><?php
	}
   /* Header Video Settings */
    if(function_exists('is_header_video_active') ) {
		if ( is_header_video_active() ) { ?>
			<style type="text/css">    
				#wp-custom-header-video-button {
				    position: absolute;
				    z-index:1;
				    top:20px;
				    right: 20px;
				    background:rgba(34, 34, 34, 0.5);
				    border: 1px solid rgba(255,255,255,0.5);
				}
				.wp-custom-header iframe,
				.wp-custom-header video {
				      display: block;
				      //height: auto;
				      max-width: 100%;
				      height: 100vh;
				      width: 100vw;
				      overflow: hidden;
				}

		    </style><?php
		}
    }

     $header_text_color = get_header_textcolor();

	/*
	 * If no custom options for text are set, let's bail.
	 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
	 */
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
		return;
	} ?>
    <style type="text/css">   
	     <?php
			// Has the text been hidden?
			if ( ! display_header_text() ) :
		?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
			// If the user has set a custom color for the text use that.
			else :
		?>
			.branding .site-branding .site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?> 
	</style><?php
}
endif; // magzen_header_style



/**
 * Customize video play/pause button in the custom header.
 */
if(!function_exists('magzen_video_controls') ) {
	function magzen_video_controls( $settings ) {
		$settings['l10n']['play'] = '<span class="screen-reader-text">' . __( 'Play background video', 'magzen' ) . '</span><i class="fa fa-play"></i>';
		$settings['l10n']['pause'] = '<span class="screen-reader-text">' . __( 'Pause background video', 'magzen' ) . '</span><i class="fa fa-pause"></i>';
		return $settings;
	}
}
add_filter( 'header_video_settings', 'magzen_video_controls' );
