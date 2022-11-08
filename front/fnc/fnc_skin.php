<?php

function get_skin_spec($id , $name ) {
    global $wpdb;
    $sql = "";
    $a_results = array() ;
    if(is_array($name)){
        $sql = "SELECT ";
        foreach($name as $key => $value){
            $sql .= " ".$value." ,";
        }
        $sql = substr($sql,0,-1);
        $sql .= " FROM ".SMFR_GOD_DB_PREFIX."skin ";
    }else {
        $sql = "SELECT ".$name." FROM ".SMFR_GOD_DB_PREFIX."skin ";
    }
    $sql .= " WHERE status = 2 ";
    if($id != 0 ){
        $sql .= " AND id = ".$id;
    }
    $a_results = $wpdb->get_results($sql, ARRAY_A);
    return $a_results;
}

function get_skin_spec_by_god($id_god , $name ) {
    global $wpdb;
    $sql = "";
    $a_results = array() ;
    if(is_array($name)){
        $sql = "SELECT ";
        foreach($name as $key => $value){
            $sql .= " ".$value." ,";
        }
        $sql = substr($sql,0,-1);
        $sql .= " FROM ".SMFR_GOD_DB_PREFIX."skin ";
    }else {
        $sql = "SELECT ".$name." FROM ".SMFR_GOD_DB_PREFIX."skin ";
    }
    $sql .= " WHERE status = 2";
    if($id_god != 0 ){
        $sql .= " AND id_god = ".$id_god;
    }
    $sql .= " ORDER BY id_type_skin ASC";
    $a_results = $wpdb->get_results($sql, ARRAY_A);
    return $a_results;
}

function get_base_skin_spec_by_god($id_god , $name ) {
    global $wpdb;
    $sql = "";
    $a_results = array() ;
    if(is_array($name)){
        $sql = "SELECT ";
        foreach($name as $key => $value){
            $sql .= " ".$value." ,";
        }
        $sql = substr($sql,0,-1);
        $sql .= " FROM ".SMFR_GOD_DB_PREFIX."skin ";
    }else {
        $sql = "SELECT ".$name." FROM ".SMFR_GOD_DB_PREFIX."skin ";
    }
    $sql .= " WHERE status = 2 AND id_type_skin = 1 ";
    if($id_god != 0 ){
        $sql .= " AND id_god = ".$id_god;
    }
    $sql .= " ORDER BY id_type_skin DESC";
    $a_results = $wpdb->get_results($sql, ARRAY_A);
    return $a_results;
}

function set_skin_spec($id , $name , $value) {
    global $wpdb;
    $bool = false;
    $array = array();
    if($id != 0) {
        if (is_array($name) && is_array($value)) {
            // build temp array !
            for ($i = 0; $i < count($name); $i++) {
                $array[$name[$i]] = $value[$i];
            }
        } else {
            $array = array(
                $name => $value,
            );
        }
        $bool = $wpdb->update(
            SMFR_GOD_DB_PREFIX.'skin',
            $array,
            array('id' => $id)
        );
    }
    return $bool;
}

function add_skin_spec($name , $value){
    global $wpdb;
    if (is_array($name) && is_array($value)) {
        // build temp array !
        for ($i = 0; $i < count($name); $i++) {
            $array[$name[$i]] = $value[$i];
        }
    } else {
        $array = array(
            $name => $value,
        );
    }
    $wpdb->insert(
        SMFR_GOD_DB_PREFIX.'skin',
        $array,
        array()
    );
    return $wpdb->insert_id;
}

function status_skin_spec($id,$status){
    global $wpdb;
    $bool = false;
    if($id > 0){
        $bool = $wpdb->update(
            SMFR_GOD_DB_PREFIX.'skin',
            array('status' => $status),
            array('id' => $id)
        );
    }
    return $bool;
}