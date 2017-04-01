<?php
/**
 * @package Magzen
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="magazine-post-wrapper">
		<?php 

			if ( has_post_thumbnail() ) : 
				 $post_date = 'img-post-date'; ?>
					<div class="magazine-image"><?php
					    the_post_thumbnail('magzen-vertical-one'); ?>
		            </div><?php
		    else: 
		       $post_date = 'post-date';
			endif; ?>

		<span class="image-date <?php echo $post_date; ?>"><a class="url fn n" href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'),get_the_time('d')); ?>"><?php the_time('j'); ?><span><?php the_time('M');?></span></a></span>

		<div class="latest-content">
			
			<div class="magazine-content-wrapper">
				<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
				<?php if ( 'post' == get_post_type() ) : ?>
				<div class="magazine-slider-top-meta <?php echo $post_date; ?>">
					<?php magzen_entry_top_meta('date','author','comment',false,false,false); ?> 
				</div><!-- .entry-meta -->
				<?php endif; ?>
			
		
				<div class="entry-content">
					<?php
						/* translators: %s: Name of current post */
						the_content( sprintf(
							__( 'Read More', 'magzen' ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						) );
					?>

					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages: ', 'magzen' ),
							'after'  => '</div>',
						) );  
					?>
				</div><!-- .entry-content -->
			</div>
			
		</div>
	</div>

</article><!-- #post-## -->