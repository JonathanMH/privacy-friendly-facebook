<?php
/*
	Plugin Name: Privacy Friendly Facebook Plugins
	Plugin URI: ?
	Description: Plugin for displaying a facebook plugin in a widget area after user clicks load
	Author: Jonathan M. Hethey
	Version: 0.1
	Author URI: http://jonathanmh.com
*/

global $wp_version;
if((float)$wp_version >= 2.8){
class priv_fb_widget extends WP_Widget {

	/*
	* construct
	*/
	
	function priv_fb_widget() {
		parent::WP_Widget(
			'priv_fb_widget'
			, 'Privacy Friendly FB widget'
			, array(
				'description' => 'Display a Privacy Friendly Facebook Plugin in any Widget Area'
			)
		);
	}
	
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		echo $before_widget;
		if (!empty($title) == 'on') {
			echo $before_title;
			if ($instance['link_title']){
				echo '<a href="'. $permalink .'">'. $title . '</a>';
			}
			else {
				echo $title;
			}
			echo $after_title;
		};
		
		
		echo '<div style="height: 100px; width: 100px; background: black;" id="'. $args['widget_id'] . '"></div>';
		
		$params = array(
			'current_element' => $args['widget_id']
		);
		
		print_r($params);
		
		wp_enqueue_script(	'load_scripts', plugin_dir_url(__FILE__) . 'templates/load_scripts.js', array('jquery'));
		wp_localize_script( 'load_scripts', 'Option', $params );
		//include('templates/load_scripts.php');

		echo $after_widget;
		
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['page_url'] = strip_tags($new_instance['page_url']);
		return $instance;
	}

	function form($instance) {
		$default = 	array(
			  'title'				=> 'Privacy Friendly FB Widget'
			, 'page_url'			=> 'https://www.facebook.com/pages/JonathanMH/159526834122370'
			);
		
		$instance = wp_parse_args( (array) $instance, $default );

		$field_page_url_id = $this->get_field_id('page_url');
		$field_page_url_length = $this->get_field_name('page_url');
		echo "\r\n"
			.'<p><label for="'
			.$field_id
			.'">'
			.__('Excerpt Length')
			.': </label><input type="text" id="'
			.$field_page_url_id
			.'" name="'
			.$field_page_url_length
			.'" value="'
			.esc_attr( $instance['page_url'] )
			.'" /></p>';
		
		
	}
	
/* class end */
}
}

add_action('widgets_init', 'priv_fb_widgets');

function priv_fb_widgets(){
	register_widget('priv_fb_widget');
}

?>
