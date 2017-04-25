<?php
/***
 * Magazine Posts Boxed Widget
 *
 * Display the latest posts from a selected category in a boxed layout. 
 * Intented to be used in the Magazine Homepage widget area to built a magzen layouted page.
 *
 * @package MagZen
 */
   
class MagZen_Featured_Post_Widget extends WP_Widget {  
   
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(  
			'magzen-featured-post-widget', // Base ID
			sprintf( esc_html__( '%s : Featured Post', 'magzen' ), wp_get_theme()->Name ), // Name
			array( 'description' => __( 'Displays your latest posts or post from a selected category . Please use this widget  in the MagZen: Content Area.', 'magzen' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
        extract( $instance );

        global $post;
        $instance = wp_parse_args( $instance, array(
			'post_cat' => '', 
			'post_count' => 4,
			'post_model' => __('latest','magzen'),
			'post_layout' => __( 'vertical', 'magzen' ),	
			'post_col' => 1,		
		) );

        if( isset($post_model) && $post_model == 'latest' ) {
        	$magzen_args = array(
        		'posts_per_page'        => intval($post_count),
	            'post_type'             => 'post',
	            'post_status'            => 'publish',
	            'ignore_sticky_posts'    => true,
			    'order'                  => 'DESC',
        	);
        }else {
            $magzen_args = array(
        		'posts_per_page'        => intval($post_count),
	            'post_type'             => 'post',
	            'post_status'            => 'publish',
	            'ignore_sticky_posts'    => true,
			    'order'                  => 'DESC',
	            'category__in'          => absint($post_cat)
        	);
        }

       // Title
        if( isset($post_cat) && $post_cat && $post_model != 'latest') {
           $post_cat_name = get_the_category_by_ID($post_cat);
          
        }else{
        	$post_cat_name = apply_filters('magzen_recent_post_title', __('Latest Post','magzen') );
        }

        $title = apply_filters( 'widget_title', $post_cat_name );
        
        // Post Col
        switch ($post_col) {
        	case '2':
        		$col_class = 'eight columns';
        		break;
        	default:
        		$col_class = 'single-post-full-vertical';
        		break;
        }

        //Post layout
        if( $post_layout == 'horizontal') {
           $post_image_class = 'four columns horizontal-image';	
           $post_content_class = 'twelve columns';
           $post_date_class = "horizontal-date ";  

        }else{
           $post_image_class = '';
           $post_content_class = '';
           $post_date_class = '';
        } 

        /* Image cropping size */
        if($post_layout == 'horizontal' && $post_col == 2 ) {
             $image_size = 'magzen-horizontal-two'; 
        }elseif($post_layout == 'horizontal' && $post_col == 1 ) {
            $image_size = 'magzen-horizontal-one';
        }elseif($post_layout == 'vertical' && $post_col == 2 ) {
            $image_size = 'magzen-vertical-two';
        }elseif($post_layout == 'vertical' && $post_col == 1 ) {
            $image_size = 'magzen-vertical-one';
        }   


		echo $before_widget;

		
		$magzen_featured_posts = new WP_Query( $magzen_args );
		
        if( $magzen_featured_posts->have_posts() ) :

            if ( ! empty( $title ) ) {
			   echo $before_title .'<span class="mag-divider">'. $title .'</span>'. $after_title;
		    }
        	while( $magzen_featured_posts->have_posts() ) : 
        		$magzen_featured_posts->the_post(); ?>
                <div class="<?php echo $col_class; ?>">
	                <div class="magazine-post-wrapper clearfix <?php echo $post_layout .' '. $image_size; ?>">
		                <div class="magazine-image <?php echo $post_image_class; ?>">					
						<?php  if( has_post_thumbnail() ) :
						   $post_date = 'img-post-date'; ?>
						   <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail($image_size, array( 'title' => esc_attr( $title ), 'alt' => esc_attr( $title ) )); ?></a>
						<?php else: 
						   $post_date = 'post-date'; ?>
						<?php endif; ?>
						</div><!-- .entry-header -->
						<?php  if( $post_layout == 'vertical') : ?>
						     <span class="image-date <?php echo $post_date_class; echo $post_date; ?>"><a class="url fn n" href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'),get_the_time('d')); ?>"><?php the_time('j'); ?><span><?php the_time('M');?></span></a></span>		
						<?php endif; ?>	
						<div class="magazine-content-wrapper <?php echo $post_content_class; ?>">
							<a href="<?php the_permalink() ?>"><?php the_title('<h4 class="entry-title">','</h4>'); ?></a>
							<div class="magazine-slider-top-meta <?php echo $post_date; ?>">
		                       <?php magzen_entry_top_meta('date','author','comment',false,false,false); ?>
							</div>
							<div class="magazine-content">  
							   <?php the_content(); ?>
							</div>
						</div>
					</div>
				</div><?php 
			endwhile;

        endif;
        // Reset Post Data
        wp_reset_postdata();   
		echo $after_widget;
	}

	/**
	 * Display the flexcount widget form.
	 *
	 * @param array $instance
	 * @return string|void
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( $instance, array(
			'post_cat' => '',
			'post_count' => 4,
			'post_model' => __('latest','magzen'),
			'post_layout' => __( 'vertical', 'magzen' ),	
			'post_col' => 1,	
		) );

	?>
      <?php echo '<p style="display:block; margin: 20px 0px;">Layout will be as below:<br><img  src="'. get_template_directory_uri() .'/images/mag-featured-post.png"></p>';?>

		<p>
			<label for="<?php echo $this->get_field_id('post_count') ?>"><?php _e('No. of Posts to display', 'magzen') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('post_count') ?>" name="<?php echo $this->get_field_name('post_count') ?>" value="<?php echo esc_attr($instance['post_count']) ?>" />
		</p>

	    <p>
	         <input type="radio" <?php checked($instance['post_model'],'latest') ?> id="<?php echo $this->get_field_id( 'post_model' ); ?>" name="<?php echo $this->get_field_name( 'post_model' ); ?>" value="latest"/><?php _e( 'Show latest Posts', 'magzen' );?><br />
	         <input type="radio" <?php checked($instance['post_model'],'category') ?> id="<?php echo $this->get_field_id( 'post_model' ); ?>" name="<?php echo $this->get_field_name( 'post_model' ); ?>" value="category"/><?php _e( 'Show posts from a category', 'magzen' );?><br />
	    </p>


		<p>
			<label for="<?php echo $this->get_field_id('post_cat') ?>"><?php _e(' Select Category ', 'magzen') ?></label>
			<?php wp_dropdown_categories( array( 'name' => $this->get_field_name( 'post_cat' ), 'show_option_all'  => __('All Category','magzen'), 'show_count' => true, 'selected' =>  $instance['post_cat'] ) ); ?>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('post_layout') ?>"><?php _e('Post Layout', 'magzen') ?></label>
			<select id="<?php echo $this->get_field_id('post_layout') ?>" name="<?php echo $this->get_field_name('post_layout') ?>">
				<option value="horizontal" <?php selected($instance['post_layout'], "horizontal") ?>>Horizontal Arrangement</option>
				<option value="vertical" <?php selected($instance['post_layout'], "vertical") ?>>Vertical Arrangement</option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('post_col') ?>"><?php _e('Column', 'magzen') ?></label>
			<select id="<?php echo $this->get_field_id('post_col') ?>" name="<?php echo $this->get_field_name('post_col') ?>">
				<option value="1" <?php selected($instance['post_col'], "1") ?>>1</option>
				<option value="2" <?php selected($instance['post_col'], "2") ?>>2</option>
			</select>
		</p>


		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['post_cat'] = ( ! empty( $new_instance['post_cat'] ) ) ? strip_tags( $new_instance['post_cat'] ) : '';
		$instance['post_count'] = ( ! empty( $new_instance['post_count'] ) ) ? strip_tags( $new_instance['post_count'] ) : '';
		$instance['post_layout'] = ( ! empty( $new_instance['post_layout'] ) ) ? strip_tags( $new_instance['post_layout'] ) : '';
		$instance['post_col'] = ( ! empty( $new_instance['post_col'] ) ) ? strip_tags( $new_instance['post_col'] ) : '';
		$instance['post_model'] = ( ! empty( $new_instance['post_model'] ) ) ? strip_tags( $new_instance['post_model'] ) : '';
		
		return $instance;
	}

} // class Foo_Widget