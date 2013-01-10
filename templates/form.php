<?php
$instance = wp_parse_args( (array) $instance, $default );

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

<?php
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
