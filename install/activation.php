<?php

function smfr_god_activation() {
    // get DB !
    global $wpdb;
    // create table !
    $sql[] = "    CREATE TABLE  ".SMFR_GOD_DB_PREFIX."god (
    id_pantheon int(11) DEFAULT NULL,
    id_type_damage int(11) DEFAULT NULL,
  id_role int(11) DEFAULT NULL,
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(100) DEFAULT NULL,
  title varchar(100) DEFAULT NULL,
  description text,
  icon text,
  favor varchar(45) DEFAULT NULL,
  gem varchar(45) DEFAULT NULL,
  pros varchar(45) DEFAULT NULL,
  release_date timestamp NULL DEFAULT NULL,
  skill1_name varchar(45) DEFAULT NULL,
  skill1_description text,
  skill1_img text,
  skill1_note text,
  skill2_name varchar(45) DEFAULT NULL,
  skill2_description text,
  skill2_img text,
  skill2_note text,
  skill3_name varchar(45) DEFAULT NULL,
  skill3_description text,
  skill3_img text,
  skill3_note text,
  ultimate_name varchar(45) DEFAULT NULL,
  ultimate_description text,
  ultimate_img text,
  ultimate_note text,
  passive_name varchar(45) DEFAULT NULL,
  passive_description text,
  passive_img text,
  passive_note text,
  updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  created_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  status tinyint(4) DEFAULT '2',
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8  ;";


    $sql[] = "CREATE TABLE IF NOT EXISTS ".SMFR_GOD_DB_PREFIX."gods (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `icon` text NOT NULL,
  `pantheon` varchar(100) NOT NULL,
  `rotation` tinyint(1) NOT NULL,
  `pros` text NOT NULL,
  `role` varchar(100) NOT NULL,
  `lore` text NOT NULL,
  `gem` int(11) NOT NULL,
  `favor` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `speed` float NOT NULL,
  `attack_speed` float NOT NULL,
  `attack_speed_per_lvl` float NOT NULL,
  `health5_per_lvl` float NOT NULL,
  `health` float NOT NULL,
  `health_per_five` float NOT NULL,
  `health_per_lvl` float NOT NULL,
  `mp5_per_lvl` float NOT NULL,
  `magic_protection` float NOT NULL,
  `magic_protection_per_lvl` float NOT NULL,
  `magical_power` float NOT NULL,
  `magical_power_per_lvl` float NOT NULL,
  `mana` float NOT NULL,
  `mana_per_five` float NOT NULL,
  `mana_per_lvl` float NOT NULL,
  `physical_power` float NOT NULL,
  `physical_power_per_lvl` float NOT NULL,
  `physical_protection` float NOT NULL,
  `physical_protection_per_lvl` float NOT NULL,
  `basicAttack` text NOT NULL,
  `skill1` varchar(100) NOT NULL,
  `skill2` varchar(100) NOT NULL,
  `skill3` varchar(100) NOT NULL,
  `skill4` varchar(100) NOT NULL,
  `skill5` varchar(100) NOT NULL,
  `skill1_icon` text NOT NULL,
  `skill2_icon` text NOT NULL,
  `skill3_icon` text NOT NULL,
  `skill4_icon` text NOT NULL,
  `skill5_icon` text NOT NULL,
  `skill1_description` text NOT NULL,
  `skill2_description` text NOT NULL,
  `skill3_description` text NOT NULL,
  `skill4_description` text NOT NULL,
  `skill5_description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

    $sql[] = "CREATE TABLE  ".SMFR_GOD_DB_PREFIX."type_skin (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(100) DEFAULT NULL,
  updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  created_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  status tinyint(4) DEFAULT '2',
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8  ;";

    $sql[] = "INSERT INTO ".SMFR_GOD_DB_PREFIX."type_skin (name) VALUES
    ('Skin de base'),
    ('Recolor'),
    ('Maitrise'),
    ('Premium'),
    ('Exclusif'),
    ('Edition Limitée');
";

// execute query !
    foreach($sql as $key => $query){
        $wpdb->query($query);
    }

}