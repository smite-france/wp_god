<?php

add_action('admin_menu', 'smfr_god_admin_menu');
add_action('admin_print_scripts', 'smfr_god_admin_scripts');
add_action('admin_print_styles', 'smfr_god_admin_styles');


function smfr_god_admin_menu() {
    add_menu_page('Gestion dieux' , 'Gestion des dieux', 'smfr_god', 'smfr_god', 'smfr_god_admin_page');
}

function smfr_god_admin_scripts() {
    if (isset($_GET['page']) && $_GET['page'] == 'smfr_god')
    {

        wp_register_script(
            SMFR_GOD_DB_PREFIX.'upload',
            SMFR_GOD_URL.'admin/js/choose_media.js',
            array('jquery','media-upload','thickbox')
        );

        wp_register_script(
            SMFR_GOD_DB_PREFIX.'datatable',
            SMFR_GOD_URL.'admin/js/jquery.datatables.js'
        );

        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_script(SMFR_GOD_DB_PREFIX.'upload');
        wp_enqueue_script(SMFR_GOD_DB_PREFIX.'datatable');

    }
}

function smfr_god_admin_styles() {
    if (isset($_GET['page']) && $_GET['page'] == 'smfr_god')
    {
        wp_register_style(
            SMFR_GOD_DB_PREFIX.'style',
            SMFR_GOD_URL.'admin/css/style.css'
        );

        wp_register_style(
            SMFR_GOD_DB_PREFIX.'datatable',
            SMFR_GOD_URL.'admin/css/jquery.datatables.css'
        );

        wp_register_style(
            SMFR_GOD_DB_PREFIX.'datatable-theme',
            SMFR_GOD_URL.'admin/css/jquery.datatables_themeroller.css'
        );

        wp_enqueue_style('thickbox');
        wp_enqueue_style(SMFR_GOD_DB_PREFIX.'style');
        wp_enqueue_style(SMFR_GOD_DB_PREFIX.'datatable');
        wp_enqueue_style(SMFR_GOD_DB_PREFIX.'datatable-theme');
        wp_enqueue_style('jquery-style', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css');
    }
}

function smfr_god_admin_page() {
    /* INCLUDE ALL FUNCTIONS WE NEED ! */
    include('fnc/fnc_debug.php');
    include('fnc/fnc_god.php');
    include('fnc/fnc_select.php');
    include('fnc/fnc_skin.php');
    include('fnc/fnc_type_skin.php');
    /* FIN */
    echo '<div class="wrap">';
    echo '<h1>Gestion des dieux</h1>';
    if(!isset($_GET['a']) || $_GET['a'] == ''){
        $_GET['a'] = 'view';
    }
    switch($_GET['a']){
        case 'update' :
            include 'page/smfr_god_god_update.php';
            break;
        case 'skin' :
            include('page/datatable_script.php');
            include 'page/smfr_god_skin.php';
            break;
        case 'skin_update' :
            include 'page/smfr_god_skin_update.php';
            break;
        case 'skin_add' :
            include 'page/smfr_god_skin_update.php';
            break;
        case 'skin_delete' :
            include 'page/smfr_god_skin_delete.php';
            break;
        default:
            include('page/datatable_script.php');
            include 'page/smfr_god_god.php';
            break;
    }
    echo "<hr>";
    echo "Pour Smite France de la part de Tilican &copy;";
    echo "</div>";
}