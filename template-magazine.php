<?php
/**
 * Template Name: Magazine Page
 *
 * Description: A custom page template for displaying the magazine homepage widgets.
 *
 * @package MagZen
 */

get_header(); ?>

    <?php do_action('magzen_before_content'); ?>

		<div class="container">  

		<div id="primary" class="content-area eleven columns alpha">

			<main id="main" class="site-main" role="main"> 

				<?php // Display Magazine Homepage Widgets
					if( is_active_sidebar( 'magzen-content-area' ) ) : ?> 

						<div id="magazine-page-widgets" class="widget-area clearfix">

							<?php dynamic_sidebar( 'magzen-content-area' ); ?>

						</div><!-- #magazine-page-widgets -->

					<?php // Display Description about Magazine Homepage Widgets when widget area is empty
					else : 
					
						// Display only to users with permission
						if ( current_user_can( 'edit_theme_options' ) ) : ?>

							<p class="empty-widget-area">
								<?php _e( "Please go to <strong>Appearance &#8594; Widgets and add widget to the 'MagZen: content area'.</strong> You can use the <strong>MagZen widget</strong> to set up magazine page.", 'magzen' ); ?>
							</p> 
							
						<?php endif;

					endif; 

					if( get_theme_mod('enable_magazine_default_content',false) ) {
	                    while ( have_posts() ) : the_post();       
							the_content();
						endwhile; 
					} ?>

			</main><!-- #main -->
		</div><!-- #primary -->

<?php 
get_sidebar();
get_footer(); 
