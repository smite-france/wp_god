<?php

function get_god_spec($id , $name ) {
    global $wpdb;
    $sql = "";
    $a_results = array() ;
    if(is_array($name)){
        $sql = "SELECT ";
        foreach($name as $key => $value){
            $sql .= " ".$value." ,";
        }
        $sql = substr($sql,0,-1);
        $sql .= " FROM ".SMFR_GOD_DB_PREFIX."gods ";
    }else {
        $sql = "SELECT ".$name." FROM ".SMFR_GOD_DB_PREFIX."gods ";
    }
    if($id != 0 ){
        $sql .= "WHERE id = ".$id;
    }else{
        $sql .= "ORDER BY name asc";
    }

//	pr($sql);

    $a_results = $wpdb->get_results($sql, ARRAY_A);
    return $a_results;
}

function set_god_spec($id , $name , $value) {
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
            SMFR_GOD_DB_PREFIX.'gods ',
            $array,
            array('id' => $id)
        );
    }
    return $bool;
}

function add_god_spec($name , $value){
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
        SMFR_GOD_DB_PREFIX.'gods ',
        $array,
        array()
    );
    return $wpdb->insert_id;
}

function status_god_spec($id,$status){
    global $wpdb;
    $bool = false;
    if($id > 0){
        $bool = $wpdb->update(
            SMFR_GOD_DB_PREFIX.'gods ',
            array('status' => $status),
            array('id' => $id)
        );
    }
    return $bool;
}

function de_serialize_gods($array){
	$temp = $array;
		foreach($temp as $k2 => $v2){
			$data = @unserialize($v2);
			if ($data !== false) {
				$array[$k2] = unserialize($v2);
			}
		}
	return $array;
}
