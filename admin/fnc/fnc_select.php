<?php

function select_pantheon($id){
    global $wpdb;
//    pr($id);
    $sql = "";
    $a_results = array() ;
    $sql = "SELECT id , name FROM ".SMFR_GOD_DB_PREFIX."pantheon WHERE status = 2";
    //SMFR_GOD_DB_PREFIX
    $a_results = $wpdb->get_results($sql, ARRAY_A);
    $html = "";
    $html .= "<select name='id_pantheon'>";
    $html .= "<option value=''>Choississez ...</option>";
    foreach($a_results as $key => $a_data){
        $html .= "<option value='".$a_data['id']."'";
            if($id == $a_data['id']){
                $html .= " selected ";
            }

        $html .= ">".$a_data['name']."</option>";
    }
    $html .= "</select>";
    return $html;
}

function select_role($id){
    global $wpdb;
    $sql = "";
    $a_results = array() ;
    $sql = "SELECT id , name FROM ".SMFR_GOD_DB_PREFIX."role WHERE status = 2";
    //SMFR_GOD_DB_PREFIX
    $a_results = $wpdb->get_results($sql, ARRAY_A);
    $html = "";
    $html .= "<select name='id_role'>";
    $html .= "<option value='' >Choississez ...</option>";
    foreach($a_results as $key => $a_data){
        $html .= "<option value='".$a_data['id']."' ";
        if($a_data['id'] == $id){
            $html .= " selected ";
        }
        $html .= " >".$a_data['name']."</option>";
    }
    $html .= "</select>";
    return $html;
}

function select_type_skin($id){
    global $wpdb;
    $sql = "";
    $a_results = array() ;
    $sql = "SELECT id , name FROM ".SMFR_GOD_DB_PREFIX."type_skin WHERE status = 2";
    //SMFR_GOD_DB_PREFIX
    $a_results = $wpdb->get_results($sql, ARRAY_A);
    $html = "";
    $html .= "<select name='id_type_skin'>";
    $html .= "<option value='' >Choississez ...</option>";
    foreach($a_results as $key => $a_data){
        $html .= "<option value='".$a_data['id']."' ";
        if($a_data['id'] == $id){
            $html .= " selected ";
        }
        $html .= " >".$a_data['name']."</option>";
    }
    $html .= "</select>";
    return $html;
}

function select_type_damage($id){
    global $wpdb;
    $sql = "";
    $a_results = array() ;
    $sql = "SELECT id , name FROM ".SMFR_GOD_DB_PREFIX."type_damage WHERE status = 2";
    //SMFR_GOD_DB_PREFIX
    $a_results = $wpdb->get_results($sql, ARRAY_A);
    $html = "";
    $html .= "<select name='id_type_damage'>";
    $html .= "<option value='' >Choississez ...</option>";
    foreach($a_results as $key => $a_data){
        $html .= "<option value='".$a_data['id']."' ";
        if($a_data['id'] == $id){
            $html .= " selected ";
        }
        $html .= " >".$a_data['name']."</option>";
    }
    $html .= "</select>";
    return $html;
}