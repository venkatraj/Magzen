<?php 
get_template_part('inc/widgets/magzen-widget-magazine-posts-boxed');

add_action('widgets_init','magzen_register_magazine_widgets');
if( !function_exists('magzen_register_magazine_widgets') ) {
	function magzen_register_magazine_widgets() {
		register_widget( 'Magzen_Magazine_Post_Boxed_Widget' );
	}  
}
