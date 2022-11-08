<?php
// inizialize
$html_table = '';
$html_thead = '';
$html_tbody = '';
// config
$a_we_need = array(
    0 => 'id',
    1 => 'icon',
    2 => 'name',
    3 => 'title',
    4 => 'favor',
    5 => 'gem',
    6 => 'pantheon',
    7 => 'role',
);
$a_we_need_lang = array(
    'id' => '',
    'icon' => 'Icone',
    'name' => 'Nom',
    'title' => 'Titre',
    'favor' => 'Prix(Faveur)',
    'gem' => 'Prix(Gemme)',
    'pantheon' => 'Pantheon',
    'role' => 'Role',
    'skin' => 'Skins',
    'update' => 'Modifier',
);
// construct thead
$html_thead .= "<tr>";
foreach($a_we_need_lang as $key => $value){
    if(!empty($value)){
        $html_thead .= "<td><b>".$value."</b></td>";
    }
}
$html_thead .= "</tr>";
//recup des dieux !
$a_all_god = get_god_spec(0,$a_we_need);

//pr($a_all_god);

//run the array !
foreach($a_all_god as $key => $a_god_data){
    $html_tbody .= "<tr>";

    $id_god = $a_god_data['id'];
    foreach($a_god_data as $column => $value){
        switch ($column ){
            case 'id':
                // nothing
                break;
            case 'id_pantheon' :
                $html_tbody .= '<td>'.$pantheon_name.'</td>';
                break;
            case 'id_role' :
                $html_tbody .= '<td>'.$role_name.'</td>';
                break;
            case 'icon' :
                $html_tbody .= '<td><img height="128px" width="128px" src="'.$value.'" /></td>';
                break;
            default:
                $html_tbody .= '<td>'.$value.'</td>';
                break;
        }
    }
    //gestion skins
    $html_tbody .= '<td><a class="smfr_god_view smfr_god_icon16" href="?page=smfr_god&a=skin&id_god='.$id_god.'"></a></td>';
    // update
    $html_tbody .= '<td><a class="smfr_god_update smfr_god_icon16" href="?page=smfr_god&a=update&id_god='.$id_god.'"></a></td>';

    $html_tbody .= "</tr>";
}

$html_table .= "<table id='table_dieux' class='dataTables_wrapper dataTable'>";
$html_table .= "<thead>";
$html_table .= $html_thead;
$html_table .= "</thead>";
$html_table .= "<tbody>";
$html_table .= $html_tbody;
$html_table .= "</tbody>";
$html_table .= "</table>";

echo $html_table;