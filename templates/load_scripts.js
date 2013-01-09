jQuery(document).ready(function() {
	var current_element = '#' + Option.current_element

	function loadWidget() { 
		jQuery(current_element).append('<div id="fb-root"></div>');
		jQuery(current_element).append('<fb:like-box href="https://www.facebook.com/pages/JonathanMH/159526834122370" width="300" show_faces="true" stream="false" header="false"></fb:like-box>');
		jQuery.getScript('http://connect.facebook.net/en_US/all.js#xfbml=1', function() {
			FB.init({status: true, cookie: true, xfbml: true});
		});
	}
	
	jQuery(current_element).click(function(){
		loadWidget();
	});
	
});