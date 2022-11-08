<?php
if(isset($_GET['id_god']) && $_GET['id_god'] > 0){
    // array de tout les skins pour un dieu !
    $a_all_skin = array();
    // get id_god
    $id_god = 0;
    $id_god = $_GET['id_god'];
    echo "<table>";
    echo "<tr>";
    echo "<td><a href='?page=smfr_god&a=skin_add&id_god=".$id_god."'><button class='button button-primary'>Ajouter un skin</button></a></td>";
    echo "<td><a href='?page=".$_GET['page']."'><button class='button button-primary' >Retour a la liste des dieux</button></a></td>";
    echo "<tr>";
    echo "</table>";


    // chargement de tout les skins !
    $a_we_need = array(
        0 => 'id',
        1 => 'name',
        3 => 'id_type_skin',
        4 => 'gem',
        5 => 'favor',

    );

    $a_we_need_lang = array(
        'name' => 'Nom',
        'id_type_skin' => 'Type de skin',
        'gem' => 'Prix(Gemme)',
        'favor' => 'Prix(Faveur)',
        'update' => 'Modifier',
        'delete' => 'Supprimer',
    );

    $a_skin = get_skin_spec_by_god($id_god,$a_we_need);

    //netoyage
    foreach($a_skin as $k99 => $data88){
        foreach($data88 as $k98 => $data) {
            $a_skin[$k99][$k98] = htmlspecialchars_decode(stripslashes ($data));
        }
    }

    $html = "";
    $html .= "<table id='table_dieux' class='dataTables_wrapper dataTable'><thead><tr>";
    foreach($a_we_need_lang as $k0 => $data){
        if($data != 'id') {
            $html .= "<td>".$data."</td>";
        }
    }
    $html .= "</tr></thead><tbody>";
    foreach($a_skin as $k0 => $a_skin_data){
        $html .= "<tr>";
        $type_skin_name = get_type_skin_spec_by_skin($a_skin_data['id_type_skin'],'name');
        $type_skin_name = $type_skin_name[0]['name'];
        foreach($a_skin_data as $k1 => $data){
            switch ($k1) {
                case 'id':
                    $id_skin = $data;
                    break;
                case 'id_type_skin':
                    $html .= "<td>".$type_skin_name."</td>";
                    break;
                default:
                    $html .= "<td>".$data."</td>";
                    break;
            }
        }
        $html .= "<td><a class='smfr_god_icon16 smfr_god_update' href='?page=".$_GET['page']."&a=skin_update&id_god=".$id_god."&id_skin=".$id_skin."'></a></td>";
        $html .= "<td><a class='smfr_god_icon16 smfr_god_delete' href='?page=".$_GET['page']."&a=skin_delete&id_god=".$id_god."&id_skin=".$id_skin."'></a></td>";
        $html .= "</tr>";
    }
    $html .= "</tbody></table>";
    echo $html;
}
