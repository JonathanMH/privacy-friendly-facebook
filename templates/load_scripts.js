jQuery(document).ready(function() {
	var current_element = '#' + Option.current_element;
	var loaded = false;
	//Option.height = parseInt(Option.height) + 50;
	//console.log(Option.height)
	function loadWidget() {
		jQuery(current_element).children().remove();
		jQuery(current_element).append('<div id="fb-root"></div>');
		jQuery(current_element).append(
			'<fb:' + Option.type
			+ ' href="' + Option.page_url
			+ '" width="' + Option.width
			+ '" height="' + Option.height
			+ '" show_faces="' + Option.show_faces
			+ '" stream="' + Option.show_stream
			+ '" header="' + Option.show_header
			+ '"></fb:'
		   + Option.type +'>'
		);
		
		jQuery.getScript('http://connect.facebook.net/en_US/all.js#xfbml=1', function() {
			FB.init({status: true, cookie: true, xfbml: true});
		});
		
	}
	
	jQuery(current_element).click(function(){
		if (loaded === false){
			loadWidget();
		}
		loaded = true;
		return false;
	});
		
	if (Option.disable_priv === 'true') {
		loadWidget();
		loaded = true;
	}
	
});
