<?php
/*
Plugin Name: Admin-Colour
Plugin URI: http://alex3410.com/wordpress/admin-colour
Description: A plugin to change the admin menu colours to make it easier to switch between menu options. Created by Alex Wells while working at Simpsons Creative
Version: 0.1
Author: Alex Wells
Author URI: http://www.twitter.com/alex_simpsons
License: GPL
*/
  
 // THIS GIVES US SOME OPTIONS FOR STYLING THE ADMIN AREA
function admin_colors() {
 $output ='<style type="text/css">
 			.menu-icon-dashboard { background-color:#'. get_option('admin_colour_dashboard').'; color:#'. get_option('admin_colour_dashboard_text').' !important;}
 			.menu-icon-post { background-color:#'. get_option('admin_colour_posts').'; color:#'. get_option('admin_colour_posts_text').' !important;}
 			.menu-icon-media { background-color:#'. get_option('admin_colour_media').'; color:#'. get_option('admin_colour_media_text').' !important;}
 			.menu-icon-links { background-color:#'. get_option('admin_colour_links').'; color:#'. get_option('admin_colour_links_text').' !important;}
 			.menu-icon-page { background-color:#'. get_option('admin_colour_page').'; color:#'. get_option('admin_colour_page_text').' !important;}
 			.menu-icon-comments { background-color:#'. get_option('admin_colour_comments').'; color:#'. get_option('admin_colour_comments_text').' !important;}
 			.menu-icon-appearance { background-color:#'. get_option('admin_colour_appearance').'; color:#'. get_option('admin_colour_appearance_text').' !important;}
 			.menu-icon-plugins { background-color:#'. get_option('admin_colour_plugins').'; color:#'. get_option('admin_colour_plugins_text').' !important;}
 			.menu-icon-users { background-color:#'. get_option('admin_colour_users').'; color:#'. get_option('admin_colour_users_text').' !important;}
 			.menu-icon-tools { background-color:#'. get_option('admin_colour_tools').'; color:#'. get_option('admin_colour_tools_text').' !important;}
 			.menu-icon-settings { background-color:#'. get_option('admin_colour_settings').'; color:#'. get_option('admin_colour_settings_text').' !important;}
 			
			
#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu,#adminmenu li.current a.menu-top,.folded #adminmenu li.wp-has-current-submenu,.folded #adminmenu li.current.menu-top,#adminmenu .wp-menu-arrow,#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head {	
background-color: #'. get_option('admin_colour_active').' !important; /* Fallback */
color:#'. get_option('admin_colour_active_text').' !important;
background-image: none;
}

.admin_colour_title { float:left; margin:0px; padding:0px; display:inline; width:100px;} 
         </style>';
		 echo $output;
}
 

add_action('admin_head', 'admin_colors');
  
?>


 
 
 <?php
  // INSTALL AND UNINSTALL SCRIPTS TO CREATE DATABASE ENTRIES FOR THE SETTINGS
/* Runs when plugin is activated */
register_activation_hook(__FILE__,'admin_colour_install'); 

/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, 'admin_colour_remove' );

function admin_colour_install() {
/* Creates new database field */
add_option("admin_colour_dashboard", 'ff2820', '', 'yes');
add_option("admin_colour_dashboard_text", 'ffffff', '', 'yes');
add_option("admin_colour_posts", 'ff862d', '', 'yes');
add_option("admin_colour_posts_text", 'ffffff', '', 'yes');
add_option("admin_colour_media", 'ffff00', '', 'yes');
add_option("admin_colour_media_text", '000', '', 'yes');
add_option("admin_colour_links", '3ce620', '', 'yes');
add_option("admin_colour_links_text", 'ffffff', '', 'yes');
add_option("admin_colour_page", '08c2ff', '', 'yes');
add_option("admin_colour_page_text", 'ffffff', '', 'yes');
add_option("admin_colour_comments", '4575fb', '', 'yes');
add_option("admin_colour_comments_text", 'ffffff', '', 'yes');
add_option("admin_colour_appearance", '7d00ff', '', 'yes');
add_option("admin_colour_appearance_text", 'ffffff', '', 'yes');
add_option("admin_colour_plugins", 'ef2fed', '', 'yes');
add_option("admin_colour_plugins_text", 'ffffff', '', 'yes');
add_option("admin_colour_users", 'c7131b', '', 'yes');
add_option("admin_colour_users_text", 'ffffff', '', 'yes');
add_option("admin_colour_settings", 'e09d28', '', 'yes');
add_option("admin_colour_settings_text", 'ffffff', '', 'yes');
add_option("admin_colour_tools", 'c4e028', '', 'yes');
add_option("admin_colour_tools_text", 'ffffff', '', 'yes');
add_option("admin_colour_active", '758da7', '', 'yes');
add_option("admin_colour_active_text", 'ffffff', '', 'yes');
}

function admin_colour_remove() {
/* Deletes the database field */
delete_option('admin_colour_dashboard_text');
delete_option('admin_colour_dashboard');
delete_option('admin_colour_posts_text');
delete_option('admin_colour_posts');
delete_option('admin_colour_media');
delete_option('admin_colour_media_text');
delete_option('admin_colour_links');
delete_option('admin_colour_links_text');
delete_option('admin_colour_page');
delete_option('admin_colour_page_text');
delete_option('admin_colour_comments');
delete_option('admin_colour_comments_text');
delete_option('admin_colour_appearance');
delete_option('admin_colour_appearance_text');
delete_option('admin_colour_plugins');
delete_option('admin_colour_plugins_text');
delete_option('admin_colour_users');
delete_option('admin_colour_users_text');
delete_option('admin_colour_tools');
delete_option('admin_colour_tools_text');
delete_option('admin_colour_settings');
delete_option('admin_colour_settings_text');
delete_option('admin_colour_active');
delete_option('admin_colour_active_text');
}

?>




<?php

//THE ADMIN AREA SETTINGS PAGE FOR ADDING THE SETTINGS FOR THE PLUGIN


/* Call the html code */
add_action('admin_menu', 'Admin_colour_menu');

function Admin_colour_menu() {
$mypage = add_options_page('Admin Colour', 'Admin Colour', 'administrator',
'hello-world', 'hello_world_html_page');
add_action ("admin_print_scripts-$mypage",'admin_colour_settings');
}

function admin_colour_settings()
{
	$plugindir = get_settings('home').'/wp-content/plugins/'.dirname(plugin_basename(__FILE__));
	wp_enqueue_script('loadjs', $plugindir . '/jscolor.js');
	echo "<script type='text/javascript' src='".$plugindir."/jscolor.js' ></script>\n";
}
?>





<?php
function hello_world_html_page() {
?>
<div>
<h2>Admin Colour Options</h2>
<h3>Enter Hex code without the  # </h3>
<p>Remove values to return to WordPress defaults</p>
<br/>
<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>


<h4>dashboard</h4>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_dashboard" type="text" id="admin_colour_dashboard"
value="<?php echo get_option('admin_colour_dashboard'); ?>" />
(ex.0099cc) 
<br/>
<div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_dashboard_text" type="text" id="admin_colour_dashboard_text"
value="<?php echo get_option('admin_colour_dashboard_text'); ?>" />
(ex.0099cc) 


<h4>Posts</h4>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_posts" type="text" id="admin_colour_posts"
value="<?php echo get_option('admin_colour_posts'); ?>" />
(ex.0099cc) 
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_posts_text" type="text" id="admin_colour_posts_text"
value="<?php echo get_option('admin_colour_posts_text'); ?>" />
(ex.0099cc) 


<h4>Media</h4>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_media" type="text" id="admin_colour_media"
value="<?php echo get_option('admin_colour_media'); ?>" />
(ex.0099cc) 
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_media_text" type="text" id="admin_colour_media_text"
value="<?php echo get_option('admin_colour_media_text'); ?>" />
(ex.0099cc) 


<h4>Links</h4>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_links" type="text" id="admin_colour_links"
value="<?php echo get_option('admin_colour_links'); ?>" />
(ex.0099cc) 
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_links_text" type="text" id="admin_colour_links_text"
value="<?php echo get_option('admin_colour_links_text'); ?>" />
(ex.0099cc) 

<h4>page</h4>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_page" type="text" id="admin_colour_page"
value="<?php echo get_option('admin_colour_page'); ?>" />
(ex.0099cc) 
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_page_text" type="text" id="admin_colour_page_text"
value="<?php echo get_option('admin_colour_page_text'); ?>" />
(ex.0099cc) 

<h4>comments</h4>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_comments" type="text" id="admin_colour_comments"
value="<?php echo get_option('admin_colour_comments'); ?>" />
(ex.0099cc) 
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_comments_text" type="text" id="admin_colour_comments_text"
value="<?php echo get_option('admin_colour_comments_text'); ?>" />
(ex.0099cc) 


<h4>appearance</h4>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_appearance" type="text" id="admin_colour_appearance"
value="<?php echo get_option('admin_colour_appearance'); ?>" />
(ex.0099cc) 
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_appearance_text" type="text" id="admin_colour_appearance_text"
value="<?php echo get_option('admin_colour_appearance_text'); ?>" />
(ex.0099cc) 

<h4>plugins</h4>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_plugins" type="text" id="admin_colour_plugins"
value="<?php echo get_option('admin_colour_plugins'); ?>" />
(ex.0099cc) 
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_plugins_text" type="text" id="admin_colour_plugins_text"
value="<?php echo get_option('admin_colour_plugins_text'); ?>" />
(ex.0099cc) 

<h4>users</h4>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_users" type="text" id="admin_colour_users"
value="<?php echo get_option('admin_colour_users'); ?>" />
(ex.0099cc) 
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_users_text" type="text" id="admin_colour_users_text"
value="<?php echo get_option('admin_colour_users_text'); ?>" />
(ex.0099cc) 


<h4>tools</h4>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_tools" type="text" id="admin_colour_tools"
value="<?php echo get_option('admin_colour_tools'); ?>" />
(ex.0099cc) 
<br/>
<div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_tools_text" type="text" id="admin_colour_tools_text"
value="<?php echo get_option('admin_colour_tools_text'); ?>" />
(ex.0099cc) 



<h4>settings</h4>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_settings" type="text" id="admin_colour_settings"
value="<?php echo get_option('admin_colour_settings'); ?>" />
(ex.0099cc) 
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_settings_text" type="text" id="admin_colour_settings_text"
value="<?php echo get_option('admin_colour_settings_text'); ?>" />
(ex.0099cc) 


<h4>active</h4>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_active" type="text" id="admin_colour_active"
value="<?php echo get_option('admin_colour_active'); ?>" />
(ex.0099cc) 
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_active_text" type="text" id="admin_colour_active_text"
value="<?php echo get_option('admin_colour_active_text'); ?>" />
(ex.0099cc) 



 

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="admin_colour_dashboard, admin_colour_dashboard_text, admin_colour_posts, admin_colour_posts_text, admin_colour_media, admin_colour_media_text, admin_colour_links, admin_colour_links_text, admin_colour_page, admin_colour_page_text, admin_colour_comments, admin_colour_comments_text, admin_colour_appearance, admin_colour_appearance_text, admin_colour_plugins, admin_colour_plugins_text, admin_colour_users, admin_colour_users_text, admin_colour_tools_text, admin_colour_settings, admin_colour_settings_text, admin_colour_active, admin_colour_active_text" />

<p>
<input type="submit" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>
<?php
}
?>