<?php
$instance = wp_parse_args( (array) $instance, $default );

/* TITLE */
$field_title_id = $this->get_field_id('title');
$field_title = $this->get_field_name('title');
echo "\r\n"
	.'<p><label for="'
	.$field_title_id
	.'">'
	.__('Widget Title')
	.': </label><input type="text" id="'
	.$field_title_id
	.'" name="'
	.$field_title
	.'" value="'
	.esc_attr( $instance['title'] )
	.'" /></p>';

/* DISABLE PRIV */
$field_disable_priv_id = $this->get_field_id('disable_priv');
$field_disable_priv = $this->get_field_name('disable_priv');

if ($instance['disable_priv'] == 'true'){
	$checked = 'checked="checked"';
}
else {
	$checked = '';
}

echo "\r\n"
	.'<p><input type="checkbox" id="'
	.$field_disable_priv_id
	.'" name="'
	.$field_disable_priv
	.'" value="true"'
	.$checked
	.'/> <label for="'
	.$field_disable_priv_id
	.'">'
	.__('Disable Privacy Protection and load directly')
	.' </label></p>';


/* PAGE URL */
$field_page_url_id = $this->get_field_id('page_url');
$field_page_url = $this->get_field_name('page_url');
echo "\r\n"
	.'<p><label for="'
	.$field_page_url_id
	.'">'
	.__('Facebook Page URL')
	.': </label><input type="text" id="'
	.$field_page_url_id
	.'" name="'
	.$field_page_url
	.'" value="'
	.esc_attr( $instance['page_url'] )
	.'" /></p>';


/* PLUGIN TYPE */
$field_type_id = $this->get_field_id('type');
$field_type = $this->get_field_name('type');
?>
<p><label for=" <?php echo $field_type_id; ?>">
<?php echo __('Social Plugin Type'); ?>: </label>
<select name="<?php echo $field_type; ?>" id="<?php echo $field_type_id; ?>">
<?php
	foreach ($supported_types as $type_name => $type){
		if ($type == $instance['type']){
			$selected = 'selected="selected"';
		}
		else {
			$selected='';
		}
		echo '<option value="'
			.$type.'"'
			.$selected.'>'
			.$type_name
			.'</option>';
	};
?>
</select>
</p>

<?php
/* PLACEHOLDER */
$field_placeholder_id = $this->get_field_id('placeholder');
$field_placeholder = $this->get_field_name('placeholder');
echo "\r\n"
	.'<p><label for="'
	.$field_placeholder_id
	.'">'
	.__('Placeholder')
	.': </label><textarea style="width:100%" rows="6" id="'
	.$field_placeholder_id
	.'" name="'
	.$field_placeholder.'">'
	.esc_attr( $instance['placeholder'] )
	. '</textarea></p>';


/* WIDTH */
$field_width_id = $this->get_field_id('width');
$field_width = $this->get_field_name('width');
echo "\r\n"
	.'<p><label for="'
	.$field_width_id
	.'">'
	.__('Width')
	.': </label><input type="text" id="'
	.$field_width_id
	.'" name="'
	.$field_width
	.'" value="'
	.esc_attr( $instance['width'] )
	.'" /></p>';

/* HEIGHT */

$field_height_id = $this->get_field_id('height');
$field_height = $this->get_field_name('height');
echo "\r\n"
	.'<p><label for="'
	.$field_height_id
	.'">'
	.__('Height')
	.': </label><input type="text" id="'
	.$field_height_id
	.'" name="'
	.$field_height
	.'" value="'
	.esc_attr( $instance['height'] )
	.'" /></p>';


/* SHOW FACES */
$field_show_faces_id = $this->get_field_id('show_faces');
$field_show_faces = $this->get_field_name('show_faces');

if ($instance['show_faces'] == 'true'){
	$checked = 'checked="checked"';
}
else {
	$checked = '';
}

echo "\r\n"
	.'<p><input type="checkbox" id="'
	.$field_show_faces_id
	.'" name="'
	.$field_show_faces
	.'" value="true"'
	.$checked
	.'/> <label for="'
	.$field_show_faces_id
	.'">'
	.__('Show Faces')
	.' </label></p>';

/* SHOW Stream */
$field_show_stream_id = $this->get_field_id('show_stream');
$field_show_stream = $this->get_field_name('show_stream');

if ($instance['show_stream'] == 'true'){
	$checked = 'checked="checked"';
}
else {
	$checked = '';
}

echo "\r\n"
	.'<p><input type="checkbox" id="'
	.$field_show_stream_id
	.'" name="'
	.$field_show_stream
	.'" value="true"'
	.$checked
	.'/> <label for="'
	.$field_show_stream_id
	.'">'
	.__('Show Stream')
	.' </label></p>';

/* SHOW HEADER */
$field_show_header_id = $this->get_field_id('show_header');
$field_show_header = $this->get_field_name('show_header');

if ($instance['show_header'] == 'true'){
	$checked = 'checked="checked"';
}
else {
	$checked = '';
}

echo "\r\n"
	.'<p><input type="checkbox" id="'
	.$field_show_header_id
	.'" name="'
	.$field_show_header
	.'" value="true"'
	.$checked
	.'/> <label for="'
	.$field_show_header_id
	.'">'
	.__('Show Header')
	.' </label></p>';
