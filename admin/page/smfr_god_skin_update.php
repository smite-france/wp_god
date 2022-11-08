<?php
$id_skin = 0;
$id_god = 0;
if(isset($_GET['id_skin']) && $_GET['id_skin'] > 0 ){
    $id_skin = $_GET['id_skin'];
}
if(isset($_GET['id_god']) && $_GET['id_god'] > 0 ){
    $id_god = $_GET['id_god'];
}

$a_settings = array(
	'textarea_rows' => 5,
);

// go cherché le nom du dieu !
$god_name = get_god_spec($id_god , 'name' );
$god_name = $god_name[0]['name'];

//pr($god_name);

// go cherché toute les infos du skin !
if($id_skin > 0){
    $a_skin_infos = get_skin_spec($id_skin , '*' );
    $a_skin_infos = $a_skin_infos['0'];
}else{
    $a_skin_infos = array();
}

foreach($a_skin_infos as $k99 => $data88){
        $a_skin_infos[$k99]= htmlspecialchars_decode(stripslashes ($data88));
}

//pr($a_skin_infos);

// construction du form !
if(isset($_POST) && !empty($_POST)){
    if(!empty($_POST)) {
        $a_colum = array();
        $a_value = array();
        foreach ($_POST as $key => $value) {
            if ($key != 'submit') {
                $a_colum[] = $key;
                $a_value[] = htmlspecialchars($value);
            }
        }
        if($id_skin == 0 ){
            $id_skin = add_skin_spec($a_colum, $a_value);
        }else{
            set_skin_spec($id_skin,$a_colum,$a_value);
        }

        $url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'].'?page='.$_GET['page'].'&a=skin_update&id_god='.$id_god."&id_skin=".$id_skin;
        ?>
        <script>
            window.location = <?php echo "'" . $url . "'"; ?>;
        </script>
        <?php
        exit;
    }
}
if($_GET['a'] == 'skin_add'){
    echo "<h2>Ajout d'un skin a ".$god_name."</h2>";
}
if($_GET['a'] == 'skin_update'){
    echo "<h2>Modification d'un skin de : ".$god_name."</h2>";
}

echo "<a href='?page=".$_GET['page']."&a=skin&id_god=".$_GET['id_god']."'><button class='button button-primary' >Retour a la liste des skins de ".$god_name."</button></a>";
echo "<form action='' method='post'>";
echo "<table class='widefat'>";
echo "<tr>";
echo "<td><label for='name'>Nom du skin</label></td>";
echo "<td>";
echo '<input type="text" id="name" name="name" ';
if(isset($a_skin_infos['name']) && !empty($a_skin_infos['name'])){
    echo 'value ="'.$a_skin_infos['name'].'" />';
}
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='id_type_skin'>Type de skin</label></td>";
echo "<td>";
echo select_type_skin($a_skin_infos['id_type_skin']);
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='favor'>Prix(Faveur)</label></td>";
echo "<td>";
echo '<input type="text" id="favor" name="favor" ';
if(isset($a_skin_infos['favor']) && !empty($a_skin_infos['favor'])){
    echo 'value ="'.$a_skin_infos['favor'].'" />';
}
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='gem'>Prix(Gemme)</label></td>";
echo "<td>";
echo '<input type="text" id="gem" name="gem" ';
if(isset($a_skin_infos['gem']) && !empty($a_skin_infos['gem'])){
    echo 'value ="'.$a_skin_infos['gem'].'" />';
}
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='img'>Image</label></td>";
echo '<td> <input type="text"  name="img" ';
if(isset($a_skin_infos['img'])) echo 'value="'.$a_skin_infos['img'].'"';
echo '/> <input type="button" class="onetarek-upload-button button" value="Choisir une image" /></td>';
echo "</tr>";
echo "<tr>";
echo "<td><label for='note'>Note</label></td>";
echo "<td>";  wp_editor( $a_skin_infos['note'], 'note' , $a_settings );echo "</td>";
echo "</tr>";
echo "</table>";
echo "<input type='hidden' name='id_god' value='".$id_god."'>";
submit_button('Enregistrer');
echo "</form>";