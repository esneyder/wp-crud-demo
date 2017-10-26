<?php
/*
Plugin Name: Gleamsoft
Description: Plugin para la creación de CRUD como ejemplo práctico
Version: 1
Author: gleamsoft.com
Author URI: http://gleamsoft.com
*/
// function to create the DB / Options / Defaults					
function ss_options_install() {

    global $wpdb;

    $table_name = $wpdb->prefix . "gleamsoft";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
            `id` varchar(3) CHARACTER SET utf8 NOT NULL,
            `name` varchar(50) CHARACTER SET utf8 NOT NULL,            
            PRIMARY KEY (`id`)
          ) $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'ss_options_install');

//menu items
add_action('admin_menu','gleamsoft_demo_modifymenu');
function gleamsoft_demo_modifymenu() {
	
	//this is the main item for the menu
	add_menu_page('Gleamsoft', //page title
	'Gleamsoft', //menu title
	'manage_options', //capabilities
	'gleamsoft_demo_list', //menu slug
	'gleamsoft_demo_list' //function
	);
	
	//this is a submenu
	add_submenu_page('gleamsoft_demo_list', //parent slug
	'Crear nuevo', //page title
	'Nuevo', //menu title
	'manage_options', //capability
	'gleamsoft_demo_create', //menu slug
	'gleamsoft_demo_create'); //function
	
	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Actualizar registro', //page title
	'Actualizar', //menu title
	'manage_options', //capability
	'gleamsoft_demo_update', //menu slug
	'gleamsoft_demo_update'); //function
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'gleamsoft-list.php');
require_once(ROOTDIR . 'gleamsoft-create.php');
require_once(ROOTDIR . 'gleamsoft-update.php');
