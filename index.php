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
		if (!empty($title)) {
			echo $before_title;
			if ($instance['link_title']){
				echo  $title;
			}
			else {
				echo $title;
			}
			echo $after_title;
		};
		
		/* create element, that the facebook plugin will be appended to */
		echo '<div style="width: 100%;" id="'. $args['widget_id'] . '">Like on facebook</div>';
		
		$params = 	array(
			  'disable_priv'		=> 'true'
			, 'current_element'		=> $args['widget_id']
			, 'page_url'			=> $instance['page_url']
			, 'type'				=> $instance['type']
			, 'width'				=> $instance['width']
			, 'height'				=> $instance['height']
			, 'show_faces'			=> $instance['show_faces']
		);
		
		wp_enqueue_script(	'load_scripts', plugin_dir_url(__FILE__) . 'templates/load_scripts.js', array('jquery'));
		wp_localize_script( 'load_scripts', 'Option', $params );

		echo $after_widget;
		
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['page_url'] = strip_tags($new_instance['page_url']);
		$instance['type'] = strip_tags($new_instance['type']);
		$instance['width'] = strip_tags($new_instance['width']);
		$instance['height'] = strip_tags($new_instance['height']);
		if (strip_tags($new_instance['show_faces']) != 'true'){
			$instance['show_faces'] = 'false';
		}
		else {
			$instance['show_faces'] = 'true';
		}
		return $instance;
	}

	function form($instance) {
		$default = 	array(
			  'title'				=> 'Privacy Friendly FB Widget'
			, 'page_url'			=> 'https://www.facebook.com/pages/JonathanMH/159526834122370'
			, 'type'				=> 'like'
			, 'width'				=> '300'
			, 'height'				=> '450'
			, 'show_faces'			=> 'true'
			);
		
		$supported_types = array(
			  'Like Box'	=> 'like-box'
			, 'Like'		=> 'like'
		);
		
		include(plugin_dir_path(__FILE__) . 'templates/form.php');
	}
	
/* class end */
}
	
add_action('widgets_init', 'priv_fb_widgets');

function priv_fb_widgets(){
	register_widget('priv_fb_widget');
}

/* end of compatability check */
}


?>
