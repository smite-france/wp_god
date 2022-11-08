<?php

/*
Plugin Name: Smite france god view
Plugin URI:
Description:
Version: 0.1
Author: Tilican
Author Email:
License:

Copyright 2015 Tilican

*/

define( 'SMFR_GOD_URL', plugin_dir_url ( __FILE__ ) );
define( 'SMFR_GOD_URI', plugin_dir_path( __FILE__ ) );
define( 'SMFR_GOD_VERSION', '0.1a' );
define( 'SMFR_GOD_NAME', 'Smite France gestionnaire de dieux' );
define( 'SMFR_GOD_DB_PREFIX' , "smfr_god_");

smfr_god_load();

// CREATE HOOK !
register_activation_hook(__FILE__, 'smfr_god_activation');
register_deactivation_hook(__FILE__, 'smfr_god_deactivation');

function smfr_god_load(){

	// Ajouter un rôle
	add_role('traductor', 'Traducteur', array(
		'read' => false, // true : aurtorise la lecture des page et article 
		'edit_posts' => false, // false : Interdit d'ajouter des articles ou des pages 
		'delete_posts' => false, // false : Interdit de supprimer des articles ou des pages
	));
	$role = get_role('traductor');
	$role->add_cap('smfr_god');

	$role = get_role('editor');
	$role->add_cap('smfr_god');

	$role = get_role('author');
	$role->add_cap('smfr_god');

	$role = get_role('administrator');
	$role->add_cap('smfr_god');

    if (is_admin()) {
        // add admin script
        include_once(SMFR_GOD_URI.'admin/smfr_god_admin.php');
    } else {
        //add front script !
        include_once(SMFR_GOD_URI.'front/smfr_god_front.php');
    }

    // include functions activation / deactivation
    include_once(SMFR_GOD_URI.'install/activation.php');
    include_once(SMFR_GOD_URI.'install/deactivation.php');
}

?>