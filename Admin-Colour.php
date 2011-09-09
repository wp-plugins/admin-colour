<?php
/*
Plugin Name: Admin-Colour
Plugin URI: http://alex3410.com/wordpress/admin-colour
Description: A plugin to change the admin menu colours to make it easier to switch between menu options. Created by Alex Wells while working at Simpsons Creative.
Version: 2.1
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
add_option("admin_colour_dashboard", 'ECECEC', '', 'yes');
add_option("admin_colour_dashboard_text", '21759B', '', 'yes');
add_option("admin_colour_posts", 'ECECEC', '', 'yes');
add_option("admin_colour_posts_text", '21759B', '', 'yes');
add_option("admin_colour_media", 'ECECEC', '', 'yes');
add_option("admin_colour_media_text", '21759B', '', 'yes');
add_option("admin_colour_links", 'ECECEC', '', 'yes');
add_option("admin_colour_links_text", '21759B', '', 'yes');
add_option("admin_colour_page", 'ECECEC', '', 'yes');
add_option("admin_colour_page_text", '21759B', '', 'yes');
add_option("admin_colour_comments", 'ECECEC', '', 'yes');
add_option("admin_colour_comments_text", '21759B', '', 'yes');
add_option("admin_colour_appearance", 'ECECEC', '', 'yes');
add_option("admin_colour_appearance_text", '21759B', '', 'yes');
add_option("admin_colour_plugins", 'ECECEC', '', 'yes');
add_option("admin_colour_plugins_text", '21759B', '', 'yes');
add_option("admin_colour_users", 'ECECEC', '', 'yes');
add_option("admin_colour_users_text", '21759B', '', 'yes');
add_option("admin_colour_settings", 'ECECEC', '', 'yes');
add_option("admin_colour_settings_text", '21759B', '', 'yes');
add_option("admin_colour_tools", 'ECECEC', '', 'yes');
add_option("admin_colour_tools_text", '21759B', '', 'yes');
add_option("admin_colour_active", '2babe2', '', 'yes');
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

$plugindir = get_settings('home').'/wp-content/plugins/'.dirname(plugin_basename(__FILE__));

?>
<div >
<h2>Admin Colour Options</h2>
<h3>Enter Hex code without the  # </h3>
<p>Please note that applying a pre-set theme will overwrite your custom colour schemes</p>
<a href="http://www.twitter.com/alex_simpsons" target="_blank"><img src="<?php echo $plugindir.'/tweet.png'; ?>"  /></a>
<div style="height:20px; width:100%; float:left;"><p>&nbsp;</p></div>

<div style="border:#333333 solid 1px; padding:10px; width:300px; float:left;">
<h3>Custom Colours</h3>
<form method="post" action="options.php">
<input type="submit" value="<?php _e('Save Changes') ?>" />

<?php wp_nonce_field('update-options'); ?>


<h4>dashboard</h4>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_dashboard" type="text" id="admin_colour_dashboard"
value="<?php echo get_option('admin_colour_dashboard'); ?>" />
<br/>
<div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_dashboard_text" type="text" id="admin_colour_dashboard_text"
value="<?php echo get_option('admin_colour_dashboard_text'); ?>" />
<h4>Posts</h4>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_posts" type="text" id="admin_colour_posts"
value="<?php echo get_option('admin_colour_posts'); ?>" />
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_posts_text" type="text" id="admin_colour_posts_text"
value="<?php echo get_option('admin_colour_posts_text'); ?>" />


<h4>Media</h4>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_media" type="text" id="admin_colour_media"
value="<?php echo get_option('admin_colour_media'); ?>" />
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_media_text" type="text" id="admin_colour_media_text"
value="<?php echo get_option('admin_colour_media_text'); ?>" />


<h4>Links</h4>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_links" type="text" id="admin_colour_links"
value="<?php echo get_option('admin_colour_links'); ?>" />
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_links_text" type="text" id="admin_colour_links_text"
value="<?php echo get_option('admin_colour_links_text'); ?>" />

<h4>page</h4>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_page" type="text" id="admin_colour_page"
value="<?php echo get_option('admin_colour_page'); ?>" />
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_page_text" type="text" id="admin_colour_page_text"
value="<?php echo get_option('admin_colour_page_text'); ?>" />

<h4>comments</h4>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_comments" type="text" id="admin_colour_comments"
value="<?php echo get_option('admin_colour_comments'); ?>" />
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_comments_text" type="text" id="admin_colour_comments_text"
value="<?php echo get_option('admin_colour_comments_text'); ?>" />


<h4>appearance</h4>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_appearance" type="text" id="admin_colour_appearance"
value="<?php echo get_option('admin_colour_appearance'); ?>" />
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_appearance_text" type="text" id="admin_colour_appearance_text"
value="<?php echo get_option('admin_colour_appearance_text'); ?>" />

<h4>plugins</h4>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_plugins" type="text" id="admin_colour_plugins"
value="<?php echo get_option('admin_colour_plugins'); ?>" />
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_plugins_text" type="text" id="admin_colour_plugins_text"
value="<?php echo get_option('admin_colour_plugins_text'); ?>" />

<h4>users</h4>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_users" type="text" id="admin_colour_users"
value="<?php echo get_option('admin_colour_users'); ?>" />
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_users_text" type="text" id="admin_colour_users_text"
value="<?php echo get_option('admin_colour_users_text'); ?>" />


<h4>tools</h4>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_tools" type="text" id="admin_colour_tools"
value="<?php echo get_option('admin_colour_tools'); ?>" />
<br/>
<div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_tools_text" type="text" id="admin_colour_tools_text"
value="<?php echo get_option('admin_colour_tools_text'); ?>" />



<h4>settings</h4>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_settings" type="text" id="admin_colour_settings"
value="<?php echo get_option('admin_colour_settings'); ?>" />
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_settings_text" type="text" id="admin_colour_settings_text"
value="<?php echo get_option('admin_colour_settings_text'); ?>" />


<h4>active</h4>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_active" type="text" id="admin_colour_active"
value="<?php echo get_option('admin_colour_active'); ?>" />
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_active_text" type="text" id="admin_colour_active_text"
value="<?php echo get_option('admin_colour_active_text'); ?>" />
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="admin_colour_dashboard, admin_colour_dashboard_text, admin_colour_posts, admin_colour_posts_text, admin_colour_media, admin_colour_media_text, admin_colour_links, admin_colour_links_text, admin_colour_page, admin_colour_page_text, admin_colour_comments, admin_colour_comments_text, admin_colour_appearance, admin_colour_appearance_text, admin_colour_plugins, admin_colour_plugins_text, admin_colour_users, admin_colour_users_text, admin_colour_tools, admin_colour_tools_text, admin_colour_settings, admin_colour_settings_text, admin_colour_active, admin_colour_active_text" />

<p>
<input type="submit" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>
<!-- ''''''''''' START THEME - Default '''''''''''' -->
        <div style="border:#333333 solid 1px; padding:10px; width:100px; float:left;"> 
        <form method="post" action="options.php">
        <?php wp_nonce_field('update-options'); ?>
        <h3>Default</h3>
        <p style="background-color:#ECECEC; color:#21759B; padding:2px;">Dashboard</p>
                        <input name="admin_colour_dashboard" type="hidden" value="ECECEC" />
                        <input name="admin_colour_dashboard_text" type="hidden"  value="21759BF" />
        <p style="background-color:#ECECEC; color:#21759B; padding:2px;">Posts</p>
                        <input name="admin_colour_posts" type="hidden"  value="ECECEC" />
                        <input name="admin_colour_posts_text" type="hidden" value="21759BF" />
        <p style="background-color:#ECECEC; color:#21759B; padding:2px;">Media</p>
                        <input name="admin_colour_media" type="hidden"  value="ECECEC" />
                        <input name="admin_colour_media_text" type="hidden" value="21759BF" />
        <p style="background-color:#ECECEC; color:#21759B; padding:2px;">Links</p>
                        <input name="admin_colour_links" type="hidden"  value="ECECEC" />
                        <input name="admin_colour_links_text" type="hidden" value="21759BF" />
        <p style="background-color:#ECECEC; color:#21759B; padding:2px;">Pages</p>
                        <input name="admin_colour_page" type="hidden"  value="ECECEC" />
                        <input name="admin_colour_page_text" type="hidden" value="21759BF" />
        <p style="background-color:#ECECEC; color:#21759B; padding:2px;">Comments</p>
                        <input name="admin_colour_comments" type="hidden"  value="ECECEC" />
                        <input name="admin_colour_comments_text" type="hidden" value="21759BF" />
        <p style="background-color:#ECECEC; color:#21759B; padding:2px;">Appearance</p>
                        <input name="admin_colour_appearance" type="hidden"  value="ECECEC" />
                        <input name="admin_colour_appearance_text" type="hidden" value="21759BF" />
        <p style="background-color:#ECECEC; color:#21759B; padding:2px;">Plugins</p>
                        <input name="admin_colour_plugins" type="hidden"  value="ECECEC" />
                        <input name="admin_colour_plugins_text" type="hidden" value="21759BF" />
        <p style="background-color:#ECECEC; color:#21759B; padding:2px;">Users</p>
                        <input name="admin_colour_users" type="hidden"  value="ECECEC" />
                        <input name="admin_colour_users_text" type="hidden" value="21759BF" />
        <p style="background-color:#ECECEC; color:#21759B; padding:2px;">Tools</p>
                        <input name="admin_colour_tools" type="hidden"  value="ECECEC" />
                        <input name="admin_colour_tools_text" type="hidden" value="21759BF" />
        <p style="background-color:#ECECEC; color:#21759B; padding:2px;">Settings</p>
                        <input name="admin_colour_settings" type="hidden"  value="ECECEC" />
                        <input name="admin_colour_settings_text" type="hidden" value="21759BF" />
        <p style="background-color:#B0B0B0; color:#000000; padding:2px;">Active</p>
                        <input name="admin_colour_active" type="hidden"  value="B0B0B0" />
                        <input name="admin_colour_active_text" type="hidden" value="000000" />
                        
                        
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="admin_colour_dashboard, admin_colour_dashboard_text, admin_colour_posts, admin_colour_posts_text, admin_colour_media, admin_colour_media_text, admin_colour_links, admin_colour_links_text, admin_colour_page, admin_colour_page_text, admin_colour_comments, admin_colour_comments_text, admin_colour_appearance, admin_colour_appearance_text, admin_colour_plugins, admin_colour_plugins_text, admin_colour_users, admin_colour_users_text, admin_colour_tools, admin_colour_tools_text, admin_colour_settings, admin_colour_settings_text, admin_colour_active, admin_colour_active_text" />
        
        <p>
        <input type="submit" value="<?php _e('Activate Theme') ?>" />
        </p>
        
        </form>
        </div>
<!-- ''''''''''' END THEME '''''''''''' -->


<!-- ''''''''''' START THEME '''''''''''' -->
        <div style="border:#333333 solid 1px; padding:10px; width:100px; float:left;"> 
        <form method="post" action="options.php">
        <?php wp_nonce_field('update-options'); ?>
        <h3>All Green</h3>
        <p style="background-color:#58C31B; color:#FFFFFF; padding:2px;">Dashboard</p>
                        <input name="admin_colour_dashboard" type="hidden" value="58C31B" />
                        <input name="admin_colour_dashboard_text" type="hidden"  value="FFFFFF" />
        <p style="background-color:#58C31B; color:#FFFFFF; padding:2px;">Posts</p>
                        <input name="admin_colour_posts" type="hidden"  value="58C31B" />
                        <input name="admin_colour_posts_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#58C31B; color:#FFFFFF; padding:2px;">Media</p>
                        <input name="admin_colour_media" type="hidden"  value="58C31B" />
                        <input name="admin_colour_media_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#58C31B; color:#FFFFFF; padding:2px;">Links</p>
                        <input name="admin_colour_links" type="hidden"  value="58C31B" />
                        <input name="admin_colour_links_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#58C31B; color:#FFFFFF; padding:2px;">Pages</p>
                        <input name="admin_colour_page" type="hidden"  value="58C31B" />
                        <input name="admin_colour_page_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#58C31B; color:#FFFFFF; padding:2px;">Comments</p>
                        <input name="admin_colour_comments" type="hidden"  value="58C31B" />
                        <input name="admin_colour_comments_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#58C31B; color:#FFFFFF; padding:2px;">Appearance</p>
                        <input name="admin_colour_appearance" type="hidden"  value="58C31B" />
                        <input name="admin_colour_appearance_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#58C31B; color:#FFFFFF; padding:2px;">Plugins</p>
                        <input name="admin_colour_plugins" type="hidden"  value="58C31B" />
                        <input name="admin_colour_plugins_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#58C31B; color:#FFFFFF; padding:2px;">Users</p>
                        <input name="admin_colour_users" type="hidden"  value="58C31B" />
                        <input name="admin_colour_users_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#58C31B; color:#FFFFFF; padding:2px;">Tools</p>
                        <input name="admin_colour_tools" type="hidden"  value="58C31B" />
                        <input name="admin_colour_tools_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#58C31B; color:#FFFFFF; padding:2px;">Settings</p>
                        <input name="admin_colour_settings" type="hidden"  value="58C31B" />
                        <input name="admin_colour_settings_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#58C31B; color:#FFFFFF; padding:2px;">Active</p>
                        <input name="admin_colour_active" type="hidden"  value="58C31B" />
                        <input name="admin_colour_active_text" type="hidden" value="FFFFFF" />
                        
                        
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="admin_colour_dashboard, admin_colour_dashboard_text, admin_colour_posts, admin_colour_posts_text, admin_colour_media, admin_colour_media_text, admin_colour_links, admin_colour_links_text, admin_colour_page, admin_colour_page_text, admin_colour_comments, admin_colour_comments_text, admin_colour_appearance, admin_colour_appearance_text, admin_colour_plugins, admin_colour_plugins_text, admin_colour_users, admin_colour_users_text, admin_colour_tools, admin_colour_tools_text, admin_colour_settings, admin_colour_settings_text, admin_colour_active, admin_colour_active_text" />
        
        <p>
        <input type="submit" value="<?php _e('Activate Theme') ?>" />
        </p>
        
        </form>
        </div>
<!-- ''''''''''' END THEME '''''''''''' -->

<!-- ''''''''''' START THEME '''''''''''' -->
        <div style="border:#333333 solid 1px; padding:10px; width:100px;float:left;"> 
        <form method="post" action="options.php">
        <?php wp_nonce_field('update-options'); ?>
        <h3>All Blue</h3>
        <p style="background-color:#2976f4; color:#FFFFFF; padding:2px;">Dashboard</p>
                        <input name="admin_colour_dashboard" type="hidden" value="2976f4" />
                        <input name="admin_colour_dashboard_text" type="hidden"  value="FFFFFF" />
        <p style="background-color:#2976f4; color:#FFFFFF; padding:2px;">Posts</p>
                        <input name="admin_colour_posts" type="hidden"  value="2976f4" />
                        <input name="admin_colour_posts_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#2976f4; color:#FFFFFF; padding:2px;">Media</p>
                        <input name="admin_colour_media" type="hidden"  value="2976f4" />
                        <input name="admin_colour_media_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#2976f4; color:#FFFFFF; padding:2px;">Links</p>
                        <input name="admin_colour_links" type="hidden"  value="2976f4" />
                        <input name="admin_colour_links_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#2976f4; color:#FFFFFF; padding:2px;">Pages</p>
                        <input name="admin_colour_page" type="hidden"  value="2976f4" />
                        <input name="admin_colour_page_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#2976f4; color:#FFFFFF; padding:2px;">Comments</p>
                        <input name="admin_colour_comments" type="hidden"  value="2976f4" />
                        <input name="admin_colour_comments_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#2976f4; color:#FFFFFF; padding:2px;">Appearance</p>
                        <input name="admin_colour_appearance" type="hidden"  value="2976f4" />
                        <input name="admin_colour_appearance_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#2976f4; color:#FFFFFF; padding:2px;">Plugins</p>
                        <input name="admin_colour_plugins" type="hidden"  value="2976f4" />
                        <input name="admin_colour_plugins_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#2976f4; color:#FFFFFF; padding:2px;">Users</p>
                        <input name="admin_colour_users" type="hidden"  value="2976f4" />
                        <input name="admin_colour_users_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#2976f4; color:#FFFFFF; padding:2px;">Tools</p>
                        <input name="admin_colour_tools" type="hidden"  value="2976f4" />
                        <input name="admin_colour_tools_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#2976f4; color:#FFFFFF; padding:2px;">Settings</p>
                        <input name="admin_colour_settings" type="hidden"  value="2976f4" />
                        <input name="admin_colour_settings_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#2976f4; color:#FFFFFF; padding:2px;">Active</p>
                        <input name="admin_colour_active" type="hidden"  value="2976f4" />
                        <input name="admin_colour_active_text" type="hidden" value="FFFFFF" />
                        
                        
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="admin_colour_dashboard, admin_colour_dashboard_text, admin_colour_posts, admin_colour_posts_text, admin_colour_media, admin_colour_media_text, admin_colour_links, admin_colour_links_text, admin_colour_page, admin_colour_page_text, admin_colour_comments, admin_colour_comments_text, admin_colour_appearance, admin_colour_appearance_text, admin_colour_plugins, admin_colour_plugins_text, admin_colour_users, admin_colour_users_text, admin_colour_tools, admin_colour_tools_text, admin_colour_settings, admin_colour_settings_text, admin_colour_active, admin_colour_active_text" />
        
        <p>
        <input type="submit" value="<?php _e('Activate Theme') ?>" />
        </p>
        
        </form>
        </div>
<!-- ''''''''''' END THEME '''''''''''' -->



<!-- ''''''''''' START THEME '''''''''''' -->
        <div style="border:#333333 solid 1px; padding:10px; width:100px; float:left;"> 
        <form method="post" action="options.php">
        <?php wp_nonce_field('update-options'); ?>
        <h3>All Orange</h3>
        <p style="background-color:#ffb413; color:#FFFFFF; padding:2px;">Dashboard</p>
                        <input name="admin_colour_dashboard" type="hidden" value="ffb413" />
                        <input name="admin_colour_dashboard_text" type="hidden"  value="FFFFFF" />
        <p style="background-color:#ffb413; color:#FFFFFF; padding:2px;">Posts</p>
                        <input name="admin_colour_posts" type="hidden"  value="ffb413" />
                        <input name="admin_colour_posts_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#ffb413; color:#FFFFFF; padding:2px;">Media</p>
                        <input name="admin_colour_media" type="hidden"  value="ffb413" />
                        <input name="admin_colour_media_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#ffb413; color:#FFFFFF; padding:2px;">Links</p>
                        <input name="admin_colour_links" type="hidden"  value="ffb413" />
                        <input name="admin_colour_links_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#ffb413; color:#FFFFFF; padding:2px;">Pages</p>
                        <input name="admin_colour_page" type="hidden"  value="ffb413" />
                        <input name="admin_colour_page_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#ffb413; color:#FFFFFF; padding:2px;">Comments</p>
                        <input name="admin_colour_comments" type="hidden"  value="ffb413" />
                        <input name="admin_colour_comments_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#ffb413; color:#FFFFFF; padding:2px;">Appearance</p>
                        <input name="admin_colour_appearance" type="hidden"  value="ffb413" />
                        <input name="admin_colour_appearance_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#ffb413; color:#FFFFFF; padding:2px;">Plugins</p>
                        <input name="admin_colour_plugins" type="hidden"  value="ffb413" />
                        <input name="admin_colour_plugins_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#ffb413; color:#FFFFFF; padding:2px;">Users</p>
                        <input name="admin_colour_users" type="hidden"  value="ffb413" />
                        <input name="admin_colour_users_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#ffb413; color:#FFFFFF; padding:2px;">Tools</p>
                        <input name="admin_colour_tools" type="hidden"  value="ffb413" />
                        <input name="admin_colour_tools_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#ffb413; color:#FFFFFF; padding:2px;">Settings</p>
                        <input name="admin_colour_settings" type="hidden"  value="ffb413" />
                        <input name="admin_colour_settings_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#ffb413; color:#FFFFFF; padding:2px;">Active</p>
                        <input name="admin_colour_active" type="hidden"  value="ffb413" />
                        <input name="admin_colour_active_text" type="hidden" value="FFFFFF" />
                        
                        
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="admin_colour_dashboard, admin_colour_dashboard_text, admin_colour_posts, admin_colour_posts_text, admin_colour_media, admin_colour_media_text, admin_colour_links, admin_colour_links_text, admin_colour_page, admin_colour_page_text, admin_colour_comments, admin_colour_comments_text, admin_colour_appearance, admin_colour_appearance_text, admin_colour_plugins, admin_colour_plugins_text, admin_colour_users, admin_colour_users_text, admin_colour_tools, admin_colour_tools_text, admin_colour_settings, admin_colour_settings_text, admin_colour_active, admin_colour_active_text" />
        
        <p>
        <input type="submit" value="<?php _e('Activate Theme') ?>" />
        </p>
        
        </form>
        </div>
<!-- ''''''''''' END THEME '''''''''''' -->

<!-- ''''''''''' START THEME '''''''''''' -->
        <div style="border:#333333 solid 1px; padding:10px; width:100px; float:left;"> 
        <form method="post" action="options.php">
        <?php wp_nonce_field('update-options'); ?>
        <h3>All Purple</h3>
        <p style="background-color:#b516ff; color:#FFFFFF; padding:2px;">Dashboard</p>
                        <input name="admin_colour_dashboard" type="hidden" value="b516ff" />
                        <input name="admin_colour_dashboard_text" type="hidden"  value="FFFFFF" />
        <p style="background-color:#b516ff; color:#FFFFFF; padding:2px;">Posts</p>
                        <input name="admin_colour_posts" type="hidden"  value="b516ff" />
                        <input name="admin_colour_posts_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#b516ff; color:#FFFFFF; padding:2px;">Media</p>
                        <input name="admin_colour_media" type="hidden"  value="b516ff" />
                        <input name="admin_colour_media_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#b516ff; color:#FFFFFF; padding:2px;">Links</p>
                        <input name="admin_colour_links" type="hidden"  value="b516ff" />
                        <input name="admin_colour_links_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#b516ff; color:#FFFFFF; padding:2px;">Pages</p>
                        <input name="admin_colour_page" type="hidden"  value="b516ff" />
                        <input name="admin_colour_page_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#b516ff; color:#FFFFFF; padding:2px;">Comments</p>
                        <input name="admin_colour_comments" type="hidden"  value="b516ff" />
                        <input name="admin_colour_comments_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#b516ff; color:#FFFFFF; padding:2px;">Appearance</p>
                        <input name="admin_colour_appearance" type="hidden"  value="b516ff" />
                        <input name="admin_colour_appearance_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#b516ff; color:#FFFFFF; padding:2px;">Plugins</p>
                        <input name="admin_colour_plugins" type="hidden"  value="b516ff" />
                        <input name="admin_colour_plugins_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#b516ff; color:#FFFFFF; padding:2px;">Users</p>
                        <input name="admin_colour_users" type="hidden"  value="b516ff" />
                        <input name="admin_colour_users_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#b516ff; color:#FFFFFF; padding:2px;">Tools</p>
                        <input name="admin_colour_tools" type="hidden"  value="b516ff" />
                        <input name="admin_colour_tools_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#b516ff; color:#FFFFFF; padding:2px;">Settings</p>
                        <input name="admin_colour_settings" type="hidden"  value="b516ff" />
                        <input name="admin_colour_settings_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#b516ff; color:#FFFFFF; padding:2px;">Active</p>
                        <input name="admin_colour_active" type="hidden"  value="b516ff" />
                        <input name="admin_colour_active_text" type="hidden" value="FFFFFF" />
                        
                        
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="admin_colour_dashboard, admin_colour_dashboard_text, admin_colour_posts, admin_colour_posts_text, admin_colour_media, admin_colour_media_text, admin_colour_links, admin_colour_links_text, admin_colour_page, admin_colour_page_text, admin_colour_comments, admin_colour_comments_text, admin_colour_appearance, admin_colour_appearance_text, admin_colour_plugins, admin_colour_plugins_text, admin_colour_users, admin_colour_users_text, admin_colour_tools, admin_colour_tools_text, admin_colour_settings, admin_colour_settings_text, admin_colour_active, admin_colour_active_text" />
        
        <p>
        <input type="submit" value="<?php _e('Activate Theme') ?>" />
        </p>
        
        </form>
        </div>
<!-- ''''''''''' END THEME '''''''''''' -->


<!-- ''''''''''' START THEME '''''''''''' -->
        <div style="border:#333333 solid 1px; padding:10px; width:100px; float:left;"> 
        <form method="post" action="options.php">
        <?php wp_nonce_field('update-options'); ?>
        <h3>All Red</h3>
        <p style="background-color:#fc0006; color:#FFFFFF; padding:2px;">Dashboard</p>
                        <input name="admin_colour_dashboard" type="hidden" value="fc0006" />
                        <input name="admin_colour_dashboard_text" type="hidden"  value="FFFFFF" />
        <p style="background-color:#fc0006; color:#FFFFFF; padding:2px;">Posts</p>
                        <input name="admin_colour_posts" type="hidden"  value="fc0006" />
                        <input name="admin_colour_posts_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#fc0006; color:#FFFFFF; padding:2px;">Media</p>
                        <input name="admin_colour_media" type="hidden"  value="fc0006" />
                        <input name="admin_colour_media_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#fc0006; color:#FFFFFF; padding:2px;">Links</p>
                        <input name="admin_colour_links" type="hidden"  value="fc0006" />
                        <input name="admin_colour_links_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#fc0006; color:#FFFFFF; padding:2px;">Pages</p>
                        <input name="admin_colour_page" type="hidden"  value="fc0006" />
                        <input name="admin_colour_page_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#fc0006; color:#FFFFFF; padding:2px;">Comments</p>
                        <input name="admin_colour_comments" type="hidden"  value="fc0006" />
                        <input name="admin_colour_comments_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#fc0006; color:#FFFFFF; padding:2px;">Appearance</p>
                        <input name="admin_colour_appearance" type="hidden"  value="fc0006" />
                        <input name="admin_colour_appearance_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#fc0006; color:#FFFFFF; padding:2px;">Plugins</p>
                        <input name="admin_colour_plugins" type="hidden"  value="fc0006" />
                        <input name="admin_colour_plugins_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#fc0006; color:#FFFFFF; padding:2px;">Users</p>
                        <input name="admin_colour_users" type="hidden"  value="fc0006" />
                        <input name="admin_colour_users_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#fc0006; color:#FFFFFF; padding:2px;">Tools</p>
                        <input name="admin_colour_tools" type="hidden"  value="fc0006" />
                        <input name="admin_colour_tools_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#fc0006; color:#FFFFFF; padding:2px;">Settings</p>
                        <input name="admin_colour_settings" type="hidden"  value="fc0006" />
                        <input name="admin_colour_settings_text" type="hidden" value="FFFFFF" />
        <p style="background-color:#fc0006; color:#FFFFFF; padding:2px;">Active</p>
                        <input name="admin_colour_active" type="hidden"  value="fc0006" />
                        <input name="admin_colour_active_text" type="hidden" value="FFFFFF" />
                        
                        
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="admin_colour_dashboard, admin_colour_dashboard_text, admin_colour_posts, admin_colour_posts_text, admin_colour_media, admin_colour_media_text, admin_colour_links, admin_colour_links_text, admin_colour_page, admin_colour_page_text, admin_colour_comments, admin_colour_comments_text, admin_colour_appearance, admin_colour_appearance_text, admin_colour_plugins, admin_colour_plugins_text, admin_colour_users, admin_colour_users_text, admin_colour_tools, admin_colour_tools_text, admin_colour_settings, admin_colour_settings_text, admin_colour_active, admin_colour_active_text" />
        
        <p>
        <input type="submit" value="<?php _e('Activate Theme') ?>" />
        </p>
        
        </form>
        </div>
<!-- ''''''''''' END THEME '''''''''''' -->

<!-- ''''''''''' START THEME '''''''''''' -->
        <div style="border:#333333 solid 1px; padding:10px; width:100px; float:left;"> 
        <form method="post" action="options.php">
        <?php wp_nonce_field('update-options'); ?>
        <h3>All Light red</h3>
        <p style="background-color:#f99696; color:#000000; padding:2px;">Dashboard</p>
                        <input name="admin_colour_dashboard" type="hidden" value="f99696" />
                        <input name="admin_colour_dashboard_text" type="hidden"  value="000000" />
        <p style="background-color:#f99696; color:#000000; padding:2px;">Posts</p>
                        <input name="admin_colour_posts" type="hidden"  value="f99696" />
                        <input name="admin_colour_posts_text" type="hidden" value="000000" />
        <p style="background-color:#f99696; color:#000000; padding:2px;">Media</p>
                        <input name="admin_colour_media" type="hidden"  value="f99696" />
                        <input name="admin_colour_media_text" type="hidden" value="000000" />
        <p style="background-color:#f99696; color:#000000; padding:2px;">Links</p>
                        <input name="admin_colour_links" type="hidden"  value="f99696" />
                        <input name="admin_colour_links_text" type="hidden" value="000000" />
        <p style="background-color:#f99696; color:#000000; padding:2px;">Pages</p>
                        <input name="admin_colour_page" type="hidden"  value="f99696" />
                        <input name="admin_colour_page_text" type="hidden" value="000000" />
        <p style="background-color:#f99696; color:#000000; padding:2px;">Comments</p>
                        <input name="admin_colour_comments" type="hidden"  value="f99696" />
                        <input name="admin_colour_comments_text" type="hidden" value="000000" />
        <p style="background-color:#f99696; color:#000000; padding:2px;">Appearance</p>
                        <input name="admin_colour_appearance" type="hidden"  value="f99696" />
                        <input name="admin_colour_appearance_text" type="hidden" value="000000" />
        <p style="background-color:#f99696; color:#000000; padding:2px;">Plugins</p>
                        <input name="admin_colour_plugins" type="hidden"  value="f99696" />
                        <input name="admin_colour_plugins_text" type="hidden" value="000000" />
        <p style="background-color:#f99696; color:#000000; padding:2px;">Users</p>
                        <input name="admin_colour_users" type="hidden"  value="f99696" />
                        <input name="admin_colour_users_text" type="hidden" value="000000" />
        <p style="background-color:#f99696; color:#000000; padding:2px;">Tools</p>
                        <input name="admin_colour_tools" type="hidden"  value="f99696" />
                        <input name="admin_colour_tools_text" type="hidden" value="000000" />
        <p style="background-color:#f99696; color:#000000; padding:2px;">Settings</p>
                        <input name="admin_colour_settings" type="hidden"  value="f99696" />
                        <input name="admin_colour_settings_text" type="hidden" value="000000" />
        <p style="background-color:#f99696; color:#000000; padding:2px;">Active</p>
                        <input name="admin_colour_active" type="hidden"  value="f99696" />
                        <input name="admin_colour_active_text" type="hidden" value="000000" />
                        
                        
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="admin_colour_dashboard, admin_colour_dashboard_text, admin_colour_posts, admin_colour_posts_text, admin_colour_media, admin_colour_media_text, admin_colour_links, admin_colour_links_text, admin_colour_page, admin_colour_page_text, admin_colour_comments, admin_colour_comments_text, admin_colour_appearance, admin_colour_appearance_text, admin_colour_plugins, admin_colour_plugins_text, admin_colour_users, admin_colour_users_text, admin_colour_tools, admin_colour_tools_text, admin_colour_settings, admin_colour_settings_text, admin_colour_active, admin_colour_active_text" />
        
        <p>
        <input type="submit" value="<?php _e('Activate Theme') ?>" />
        </p>
        
        </form>
        </div>
<!-- ''''''''''' END THEME '''''''''''' -->


<!-- ''''''''''' START THEME '''''''''''' -->
        <div style="border:#333333 solid 1px; padding:10px; width:100px; float:left;"> 
        <form method="post" action="options.php">
        <?php wp_nonce_field('update-options'); ?>
        <h3 >Version 1</h3>
        <p style="background-color:#ff2820; color:#ffffff; padding:2px;">Dashboard</p>
                        <input name="admin_colour_dashboard" type="hidden" value="ff2820" />
                        <input name="admin_colour_dashboard_text" type="hidden"  value="ffffff" />
        <p style="background-color:#ff862d; color:#ffffff; padding:2px;">Posts</p>
                        <input name="admin_colour_posts" type="hidden"  value="ff862d" />
                        <input name="admin_colour_posts_text" type="hidden" value="ffffff" />
        <p style="background-color:#ffff00; color:#000000; padding:2px;">Media</p>
                        <input name="admin_colour_media" type="hidden"  value="ffff00" />
                        <input name="admin_colour_media_text" type="hidden" value="000000" />
        <p style="background-color:#3ce620; color:#ffffff; padding:2px;">Links</p>
                        <input name="admin_colour_links" type="hidden"  value="3ce620" />
                        <input name="admin_colour_links_text" type="hidden" value="ffffff" />
        <p style="background-color:#08c2ff; color:#ffffff; padding:2px;">Pages</p>
                        <input name="admin_colour_page" type="hidden"  value="08c2ff" />
                        <input name="admin_colour_page_text" type="hidden" value="ffffff" />
        <p style="background-color:#4575fb; color:#ffffff; padding:2px;">Comments</p>
                        <input name="admin_colour_comments" type="hidden"  value="4575fb" />
                        <input name="admin_colour_comments_text" type="hidden" value="ffffff" />
        <p style="background-color:#7d00ff; color:#ffffff; padding:2px;">Appearance</p>
                        <input name="admin_colour_appearance" type="hidden"  value="7d00ff" />
                        <input name="admin_colour_appearance_text" type="hidden" value="ffffff" />
        <p style="background-color:#ef2fed; color:#ffffff; padding:2px;">Plugins</p>
                        <input name="admin_colour_plugins" type="hidden"  value="ef2fed" />
                        <input name="admin_colour_plugins_text" type="hidden" value="ffffff" />
        <p style="background-color:#c7131b; color:#ffffff; padding:2px;">Users</p>
                        <input name="admin_colour_users" type="hidden"  value="c7131b" />
                        <input name="admin_colour_users_text" type="hidden" value="ffffff" />
        <p style="background-color:#c4e028; color:#ffffff; padding:2px;">Tools</p>
                        <input name="admin_colour_tools" type="hidden"  value="c4e028" />
                        <input name="admin_colour_tools_text" type="hidden" value="ffffff" />
        <p style="background-color:#e09d28; color:#ffffff; padding:2px;">Settings</p>
                        <input name="admin_colour_settings" type="hidden"  value="e09d28" />
                        <input name="admin_colour_settings_text" type="hidden" value="ffffff" />
        <p style="background-color:#758da7; color:#ffffff; padding:2px;">Active</p>
                        <input name="admin_colour_active" type="hidden"  value="758da7" />
                        <input name="admin_colour_active_text" type="hidden" value="ffffff" />
                        
                        
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="admin_colour_dashboard, admin_colour_dashboard_text, admin_colour_posts, admin_colour_posts_text, admin_colour_media, admin_colour_media_text, admin_colour_links, admin_colour_links_text, admin_colour_page, admin_colour_page_text, admin_colour_comments, admin_colour_comments_text, admin_colour_appearance, admin_colour_appearance_text, admin_colour_plugins, admin_colour_plugins_text, admin_colour_users, admin_colour_users_text, admin_colour_tools, admin_colour_tools_text, admin_colour_settings, admin_colour_settings_text, admin_colour_active, admin_colour_active_text" />
        
        <p>
        <input type="submit" value="<?php _e('Activate Theme') ?>" />
        </p>
        
        </form>
        </div>
<!-- ''''''''''' END THEME '''''''''''' -->

<!-- ''''''''''' START THEME - Default '''''''''''' -->
        <div style="border:#333333 solid 1px; padding:10px; width:100px; float:left;"> 
        <form method="post" action="options.php">
        <?php wp_nonce_field('update-options'); ?>
        <h3><a href="http://www.alex3410.com" target="_blank">Alex3410.com </a></h3>
        <p style="background-color:#ffa836; color:#ffffff; padding:2px;">Dashboard</p>
                        <input name="admin_colour_dashboard" type="hidden" value="ffa836" />
                        <input name="admin_colour_dashboard_text" type="hidden"  value="ffffff" />
        <p style="background-color:#2acc15; color:#ffffff; padding:2px;">Posts</p>
                        <input name="admin_colour_posts" type="hidden"  value="2acc15" />
                        <input name="admin_colour_posts_text" type="hidden" value="ffffff" />
        <p style="background-color:#ECECEC; color:#21759B; padding:2px;">Media</p>
                        <input name="admin_colour_media" type="hidden"  value="ECECEC" />
                        <input name="admin_colour_media_text" type="hidden" value="21759BF" />
        <p style="background-color:#ECECEC; color:#21759B; padding:2px;">Links</p>
                        <input name="admin_colour_links" type="hidden"  value="ECECEC" />
                        <input name="admin_colour_links_text" type="hidden" value="21759BF" />
        <p style="background-color:#3a9bee; color:#ffffff; padding:2px;">Pages</p>
                        <input name="admin_colour_page" type="hidden"  value="3a9bee" />
                        <input name="admin_colour_page_text" type="hidden" value="ffffff" />
        <p style="background-color:#ECECEC; color:#21759B; padding:2px;">Comments</p>
                        <input name="admin_colour_comments" type="hidden"  value="ECECEC" />
                        <input name="admin_colour_comments_text" type="hidden" value="21759BF" />
        <p style="background-color:#ECECEC; color:#21759B; padding:2px;">Appearance</p>
                        <input name="admin_colour_appearance" type="hidden"  value="ECECEC" />
                        <input name="admin_colour_appearance_text" type="hidden" value="21759BF" />
        <p style="background-color:#ECECEC; color:#21759B; padding:2px;">Plugins</p>
                        <input name="admin_colour_plugins" type="hidden"  value="ECECEC" />
                        <input name="admin_colour_plugins_text" type="hidden" value="21759BF" />
        <p style="background-color:#ECECEC; color:#21759B; padding:2px;">Users</p>
                        <input name="admin_colour_users" type="hidden"  value="ECECEC" />
                        <input name="admin_colour_users_text" type="hidden" value="21759BF" />
        <p style="background-color:#ECECEC; color:#21759B; padding:2px;">Tools</p>
                        <input name="admin_colour_tools" type="hidden"  value="ECECEC" />
                        <input name="admin_colour_tools_text" type="hidden" value="21759BF" />
        <p style="background-color:#ECECEC; color:#21759B; padding:2px;">Settings</p>
                        <input name="admin_colour_settings" type="hidden"  value="ECECEC" />
                        <input name="admin_colour_settings_text" type="hidden" value="21759BF" />
        <p style="background-color:#7b7b7b; color:#ffffff; padding:2px;">Active</p>
                        <input name="admin_colour_active" type="hidden"  value="7b7b7b" />
                        <input name="admin_colour_active_text" type="hidden" value="ffffff" />
                        
                        
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="admin_colour_dashboard, admin_colour_dashboard_text, admin_colour_posts, admin_colour_posts_text, admin_colour_media, admin_colour_media_text, admin_colour_links, admin_colour_links_text, admin_colour_page, admin_colour_page_text, admin_colour_comments, admin_colour_comments_text, admin_colour_appearance, admin_colour_appearance_text, admin_colour_plugins, admin_colour_plugins_text, admin_colour_users, admin_colour_users_text, admin_colour_tools, admin_colour_tools_text, admin_colour_settings, admin_colour_settings_text, admin_colour_active, admin_colour_active_text" />
        
        <p>
        <input type="submit" value="<?php _e('Activate Theme') ?>" />
        </p>
        
        </form>
        </div>
<!-- ''''''''''' END THEME '''''''''''' -->

        <div style="border:#333333 solid 1px; padding:10px; width:100px; float:left;"> 
        <form method="post" action="options.php">
        <?php wp_nonce_field('update-options'); ?>
        <h3>Red / Green</h3>
        <p style="background-color:#96f99d; color:#000000; padding:2px;">Dashboard</p>
                        <input name="admin_colour_dashboard" type="hidden" value="96f99d" />
                        <input name="admin_colour_dashboard_text" type="hidden"  value="000000" />
        <p style="background-color:#96f99d; color:#000000; padding:2px;">Posts</p>
                        <input name="admin_colour_posts" type="hidden"  value="96f99d" />
                        <input name="admin_colour_posts_text" type="hidden" value="000000" />
        <p style="background-color:#96f99d; color:#000000; padding:2px;">Media</p>
                        <input name="admin_colour_media" type="hidden"  value="96f99d" />
                        <input name="admin_colour_media_text" type="hidden" value="000000" />
        <p style="background-color:#96f99d; color:#000000; padding:2px;">Links</p>
                        <input name="admin_colour_links" type="hidden"  value="96f99d" />
                        <input name="admin_colour_links_text" type="hidden" value="000000" />
        <p style="background-color:#96f99d; color:#000000; padding:2px;">Pages</p>
                        <input name="admin_colour_page" type="hidden"  value="96f99d" />
                        <input name="admin_colour_page_text" type="hidden" value="000000" />
        <p style="background-color:#96f99d; color:#000000; padding:2px;">Comments</p>
                        <input name="admin_colour_comments" type="hidden"  value="96f99d" />
                        <input name="admin_colour_comments_text" type="hidden" value="000000" />
        <p style="background-color:#f99696; color:#000000; padding:2px;">Appearance</p>
                        <input name="admin_colour_appearance" type="hidden"  value="f99696" />
                        <input name="admin_colour_appearance_text" type="hidden" value="000000" />
        <p style="background-color:#f99696; color:#000000; padding:2px;">Plugins</p>
                        <input name="admin_colour_plugins" type="hidden"  value="f99696" />
                        <input name="admin_colour_plugins_text" type="hidden" value="000000" />
        <p style="background-color:#f99696; color:#000000; padding:2px;">Users</p>
                        <input name="admin_colour_users" type="hidden"  value="f99696" />
                        <input name="admin_colour_users_text" type="hidden" value="000000" />
        <p style="background-color:#f99696; color:#000000; padding:2px;">Tools</p>
                        <input name="admin_colour_tools" type="hidden"  value="f99696" />
                        <input name="admin_colour_tools_text" type="hidden" value="000000" />
        <p style="background-color:#f99696; color:#000000; padding:2px;">Settings</p>
                        <input name="admin_colour_settings" type="hidden"  value="f99696" />
                        <input name="admin_colour_settings_text" type="hidden" value="000000" />
        <p style="background-color:#96dcf9; color:#000000; padding:2px;">Active</p>
                        <input name="admin_colour_active" type="hidden"  value="96dcf9" />
                        <input name="admin_colour_active_text" type="hidden" value="000000" />
                        
                        
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="admin_colour_dashboard, admin_colour_dashboard_text, admin_colour_posts, admin_colour_posts_text, admin_colour_media, admin_colour_media_text, admin_colour_links, admin_colour_links_text, admin_colour_page, admin_colour_page_text, admin_colour_comments, admin_colour_comments_text, admin_colour_appearance, admin_colour_appearance_text, admin_colour_plugins, admin_colour_plugins_text, admin_colour_users, admin_colour_users_text, admin_colour_tools, admin_colour_tools_text, admin_colour_settings, admin_colour_settings_text, admin_colour_active, admin_colour_active_text" />
        
        <p>
        <input type="submit" value="<?php _e('Activate Theme') ?>" />
        </p>
        
        </form>
        </div>
<!-- ''''''''''' END THEME '''''''''''' -->


</div><!--End the page i think-->
<?php
}
?>