<?php
/*
	Plugin Name: Privacy Friendly Facebook
	Plugin URI: http://jonathanmh.com/wordpress-widget-privacy-friendly-facebook-social-plugins/
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
				'description' => 'Display a Privacy Friendly Facebook Social Plugin in any Widget Area'
			)
		);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		echo $before_widget;
		if (!empty($instance['title'])) {
			echo $before_title;
			echo $instance['title'];
			echo $after_title;
		};
		
		
		/* create element, that the facebook plugin will be appended to */
		echo '<div id="fb_container'. $args['widget_id'] . '">'
			. '<a class="load" href="#">'
			. $instance['placeholder']
			. '</a></div>';
		
		$params = 	array(
			  'current_element'		=> 'fb_container' . $args['widget_id']
			, 'page_url'			=> $instance['page_url']
			, 'type'				=> $instance['type']
			, 'width'				=> $instance['width']
			, 'height'				=> $instance['height']
			, 'show_faces'			=> $instance['show_faces']
			, 'show_stream'			=> $instance['show_stream']
			, 'show_header'			=> $instance['show_header']
			, 'disable_priv'		=> $instance['disable_priv']
		);
		
		wp_enqueue_script(	'load_scripts', plugin_dir_url(__FILE__) . 'templates/load_scripts.js', array('jquery'));
		wp_register_style( 'fb_privacy_friendly', plugins_url('css/fb_privacy_friendly.css', __FILE__) );
		wp_enqueue_style( 'fb_privacy_friendly' );
		wp_localize_script( 'load_scripts', 'Option', $params );

		echo $after_widget;
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		if (strip_tags($new_instance['disable_priv']) != 'true'){
			$instance['disable_priv'] = 'false';
		}
		else {
			$instance['disable_priv'] = 'true';
		}
		$instance['page_url'] = strip_tags($new_instance['page_url']);
		$instance['placeholder'] = $new_instance['placeholder'];
		$instance['type'] = strip_tags($new_instance['type']);
		$instance['width'] = strip_tags($new_instance['width']);
		$instance['height'] = strip_tags($new_instance['height']);
		if (strip_tags($new_instance['show_faces']) != 'true'){
			$instance['show_faces'] = 'false';
		}
		else {
			$instance['show_faces'] = 'true';
		}
		
		if (strip_tags($new_instance['show_stream']) != 'true'){
			$instance['show_stream'] = 'false';
		}
		else {
			$instance['show_stream'] = 'true';
		}
		
		if (strip_tags($new_instance['show_header']) != 'true'){
			$instance['show_header'] = 'false';
		}
		else {
			$instance['show_header'] = 'true';
		}
		return $instance;
	}

	function form($instance) {
		$default = 	array(
			  'title'				=> 'Privacy Friendly FB Widget'
			, 'disable_priv'		=> 'false'
			, 'page_url'			=> 'https://www.facebook.com/pages/JonathanMH/159526834122370'
			, 'type'				=> 'like-box'
			, 'width'				=> '292'
			, 'height'				=> '450'
			, 'show_faces'			=> 'true'
			, 'placeholder'			=> '<img src="' . plugin_dir_url(__FILE__) . 'images/facebook.png" style="margin:{0 auto;} display:{block;}" />'
			, 'show_stream'			=> 'false'
			, 'show_header'			=> 'false'
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
