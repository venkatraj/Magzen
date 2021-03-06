<?php
/**
 * The template used for displaying page breadcrumb
 *
 * @package MagZen
 */

 $breadcrumb = get_theme_mod( 'breadcrumb',true );     
if( !is_front_page() ): ?>
	<div class="breadcrumb-wrapper"> 
		<div class="container">
			<div class="breadcrumb clearfix">
				<?php if( $breadcrumb ) : ?>
					<div class="sixteen columns">
					<span class="txt-bread"><?php _e('You are here','magzen');?></span>
						<?php magzen_breadcrumbs(); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div><?php 
endif;