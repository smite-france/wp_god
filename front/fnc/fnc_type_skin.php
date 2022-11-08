<?php

function get_type_skin_spec_by_skin($id , $name ) {
    global $wpdb;
    $sql = "";
    $a_results = array() ;
    if(is_array($name)){
        $sql = "SELECT ";
        foreach($name as $key => $value){
            $sql .= " ".$value." ,";
        }
        $sql = substr($sql,0,-1);
        $sql .= " FROM ".SMFR_GOD_DB_PREFIX."type_skin ";
    }else {
        $sql = "SELECT ".$name." FROM ".SMFR_GOD_DB_PREFIX."type_skin ";
    }
    $sql .= " WHERE status = 2";
    if($id != 0 ){
        $sql .= " AND id = ".$id;
    }
    $a_results = $wpdb->get_results($sql, ARRAY_A);
    return $a_results;
}

function get_type_skin_spec($id , $name ) {
    global $wpdb;
    $sql = "";
    $a_results = array() ;
    if(is_array($name)){
        $sql = "SELECT ";
        foreach($name as $key => $value){
            $sql .= " ".$value." ,";
        }
        $sql = substr($sql,0,-1);
        $sql .= " FROM ".SMFR_GOD_DB_PREFIX."type_skin ";
    }else {
        $sql = "SELECT ".$name." FROM ".SMFR_GOD_DB_PREFIX."type_skin ";
    }
    $sql .= " WHERE status = 2";
    if($id != 0 ){
        $sql .= " AND id = ".$id;
    }
    $a_results = $wpdb->get_results($sql, ARRAY_A);
    return $a_results;
}