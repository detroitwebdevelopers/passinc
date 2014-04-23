<?php
/*
Plugin Name: Dynamic Image Links
Plugin URI: http://www.bjoernahrens.de
Description: Makes links to files in upload directory of wordpress in posts (e.g. images) "dynamic". Allows use of relative image URLs in posts and makes domain changes easier.
Version: 0.2
Author: Bj&ouml;rn Ahrens
Author URI: http://www.bjoernahrens.de
License: GPL2
*/

/*  Copyright 2011 Björn Ahrens (email : bjoern@ahrens.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function dlink_content_substitute_uploadbase ($content) {
	$uploads = wp_upload_dir();
	$content = str_replace('href=\"'.$uploads['baseurl'], 'href=\"{uploads}', $content);
	$content = str_replace('src=\"'.$uploads['baseurl'], 'src=\"{uploads}', $content);
	return $content;
}

function dlink_content_set_uploadbase ($content) {
	$options = get_option('dlink_settings');
	$blog_base = '';
	if ( is_multisite() ) {
		global $blog_id;
		$current_blog_details = get_blog_details( array( 'blog_id' => $blog_id ) );
		if( !empty($current_blog_details->blogname) ) {
			$blog_base = '/'.$current_blog_details->blogname;
		}
	}
	
	if ($options['relative']) {
		$uploads = wp_upload_dir();
		$siteurl = site_url();
		if (substr($uploads['baseurl'],0,strlen($siteurl))==$siteurl)
			$path=substr($uploads['baseurl'],strlen($siteurl));
		else
			$path=$uploads['baseurl'];
		$sitearr = parse_url($siteurl);
		$content = str_replace('{uploads}', $sitearr['path'].$blog_base.$path, $content);
	} else {
		$uploads = wp_upload_dir();
		$content = str_replace('{uploads}', $uploads['baseurl'], $content);
	}
	return $content;
}

function dlink_rss_set_uploadbase ($content) {
	$uploads = wp_upload_dir();
	$content = str_replace('{uploads}', $uploads['baseurl'], $content);
	return $content;
}

add_filter('content_save_pre','dlink_content_substitute_uploadbase',99);
add_filter('the_content','dlink_content_set_uploadbase',99);
add_filter('the_editor_content','dlink_content_set_uploadbase',99);
add_filter('the_content_rss','dlink_rss_set_uploadbase',99);
add_filter('the_content_feed','dlink_rss_set_uploadbase',99);


/***
	Settings
***/
add_action('admin_menu', 'dlink_create_menu');

function dlink_create_menu() {
	add_options_page('Dynamic Links Settings', 'Dynamic Links', 'manage_options', 'gcp_dlink', 'dlink_settings_page');
	add_action( 'admin_init', 'dlink_register_settings' );
}

function dlink_register_settings() {
	register_setting( 'dlink_settings', 'dlink_settings', 'dlink_validate_settings');
	
	add_settings_section('dlink-settings-main', 'Settings', 'dlink_main_text', 'gcp_dlink');
	add_settings_field('dlink-relative-field', 'Use relative path', 'dlink_relative_input', 'gcp_dlink', 'dlink-settings-main');
}

function dlink_validate_settings ($input) {
	if ($input['relative']=='userelative')
		$newinput['relative']=true;
	else
		$newinput['relative']=false;
	return $newinput;
}

function dlink_main_text() {
	echo '<p>General settings.</p>';
}

function dlink_relative_input() {
	$options = get_option('dlink_settings');
	echo "<input id='dlink-relative-field' name='dlink_settings[relative]' type='checkbox' ".($options['relative']?"checked='checked'":'')."' value='userelative' />";
}

function dlink_settings_page() {
?>
<div class="wrap">
<h2>Dynamic Links Settings</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'dlink_settings' ); ?>
    <?php do_settings_sections( 'gcp_dlink' ); ?>
    <p class="submit">
		<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>
</div>
<?php }
?>