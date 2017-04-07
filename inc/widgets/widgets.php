<?php 
get_template_part('inc/widgets/magzen-featured-post');

add_action('widgets_init','magzen_register_magazine_widgets');
if( !function_exists('magzen_register_magazine_widgets') ) {
	function magzen_register_magazine_widgets() {
		register_widget( 'MagZen_Featured_Post_Widget' );
	}  
}
