<?php

//smfr_god_shortcode
add_shortcode('smfr_god','smfr_god_shortcode');


function smfr_god_front_scripts() {
    wp_register_script(
        SMFR_GOD_DB_PREFIX.'idTabs',
        SMFR_GOD_URL.'front/js/jquery.idTabs.min.js'
    );
    wp_enqueue_script('jquery');
    wp_enqueue_script(SMFR_GOD_DB_PREFIX.'idTabs');
}

function smfr_god_front_styles() {
    wp_register_style(
        SMFR_GOD_DB_PREFIX.'style',
        SMFR_GOD_URL.'front/css/style.css'
    );
    wp_enqueue_style(SMFR_GOD_DB_PREFIX.'style');
}


function smfr_god_shortcode(){
    smfr_god_front_styles();
    smfr_god_front_scripts();
    /* INCLUDE ALL FUNCTIONS WE NEED ! */
    include('fnc/fnc_god.php');
    include('fnc/fnc_skin.php');
    include('fnc/fnc_debug.php');
    include('fnc/fnc_type_skin.php');
    /* FIN */
    echo "<div class='smfr_god'>";
    // si on a un id dieu selectionné !
    if(isset($_GET['id_god']) && $_GET['id_god'] > 0){
        include 'page/smfr_god_front_pre.php';
    }
    else {
        include 'page/smfr_god_front_list.php';
    }
    echo "</div>";
}