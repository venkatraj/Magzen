<?php
/**
 * The template used for displaying page breadcrumb
 *
 * @package Magzen
 */

 $breadcrumb = get_theme_mod( 'breadcrumb',true ); ?>    

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
	</div>