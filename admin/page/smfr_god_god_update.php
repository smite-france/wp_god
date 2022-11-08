<?php
	$god_all_infos = get_god_spec($_GET['id_god'],'*');
	foreach($god_all_infos as $k => $v){
		$god_all_infos[$k] = de_serialize_gods($v);
	}
    $god_all_infos = $god_all_infos[0];
//    pr($god_all_infos);
	$id_god = $_GET['id_god'];
	if(!empty($_POST)) {
        $god_all_infos['icon'] = stripslashes_deep($_POST['icon']);
        $god_all_infos['favor'] = stripslashes_deep($_POST['favor']);
        $god_all_infos['gem'] = stripslashes_deep($_POST['gem']);
        $god_all_infos['lore'] = stripslashes_deep($_POST['lore']);
        $god_all_infos['skill1'] = stripslashes_deep($_POST['skill1']);
        $god_all_infos['skill1_icon'] = stripslashes_deep($_POST['skill1_icon']);
        $god_all_infos['skill1_description']['itemDescription']['description'] = stripslashes_deep($_POST['skill1_description']);
        $god_all_infos['skill2'] = stripslashes_deep($_POST['skill2']);
        $god_all_infos['skill2_icon'] = stripslashes_deep($_POST['skill2_icon']);
        $god_all_infos['skill2_description']['itemDescription']['description'] = stripslashes_deep($_POST['skill2_description']);
        $god_all_infos['skill3'] = stripslashes_deep($_POST['skill3']);
        $god_all_infos['skill3_icon'] = stripslashes_deep($_POST['skill3_icon']);
        $god_all_infos['skill3_description']['itemDescription']['description'] = stripslashes_deep($_POST['skill3_description']);
        $god_all_infos['skill4'] = stripslashes_deep($_POST['skill4']);
        $god_all_infos['skill4_icon'] = stripslashes_deep($_POST['skill4_icon']);
        $god_all_infos['skill4_description']['itemDescription']['description'] = stripslashes_deep($_POST['skill4_description']);
        $god_all_infos['skill5'] = stripslashes_deep($_POST['skill5']);
        $god_all_infos['skill5_icon'] = stripslashes_deep($_POST['skill5_icon']);
        $god_all_infos['skill5_description']['itemDescription']['description'] = stripslashes_deep($_POST['skill5_description']);

        // maintenant re serialiaze tout !
        foreach($god_all_infos as $k => $v){
            if(is_array($v)){
                $god_all_infos[$k] = serialize($v);
            }
        }
//        pr($god_all_infos);

        // c'est con mais on doit tout séparé xD
        $a_colum = array();
        $a_value = array();
        foreach($god_all_infos as $k => $v){
            $a_colum[] = $k;
            $a_value[] = $v;
        }
//        pr($_POST);
//		pr($a_colum);
//		pr($a_value);
		set_god_spec($id_god,$a_colum,$a_value);

        $url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'].'?page='.$_GET['page'].'&a=update&id_god='.$id_god;
          ?>
        <script>
            window.location = <?php echo "'" . $url . "'"; ?>;
        </script>
        <?php
        exit;
    }
?>
    <script>
        jQuery(document).ready(function() {
            jQuery( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
        });
    </script>
<?php

$a_settings = array(
    'textarea_rows' => 5,
);
echo "<p><a href='?page=".$_GET['page']."&a=view'><button class='button button-primary' >Retour a la liste des dieux !</button></a></p>";
echo "<h3>Ajout d'un dieu</h3>";
// affichage du formulaire !
echo "<form action='' method='post'>";
echo '<table class="widefat">';
echo "<tr>";
echo "<th><label for='name'>Nom</label></th>";
echo "<td>";
echo $god_all_infos['name'];
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='icon'>Portrait</label></td>";
echo '<td> <input type="text"  name="icon" ';
if(isset($god_all_infos['icon'])) echo 'value="'.$god_all_infos['icon'].'"';
echo '/> <input type="button" class="onetarek-upload-button button" value="Choisir une image" /></td>';
echo "</tr>";
echo "<tr>";
echo "<td><label for='favor'>Prix en faveur</label></td>";
echo "<td><input name='favor' type='text'";
if(isset($god_all_infos['favor'])) echo 'value="'.$god_all_infos['favor'].'"';
echo "></td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='gem'>Prix en gemmes</label></td>";
echo "<td><input name='gem' type='text'";
if(isset($god_all_infos['gem'])) echo 'value="'.$god_all_infos['gem'].'"';
echo "></td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='lore'>Description / Lore</label></td>";
echo "<td>";  wp_editor( $god_all_infos['lore'], 'lore' , $a_settings );echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='2'><hr></td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='skill5'>Nom passif</label></td>";
echo "<td><input name='skill5' type='text'";
if(isset($god_all_infos['skill5'])) echo 'value="'.$god_all_infos['skill5'].'"';
echo "></td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='skill5_icon'>Image passif</label></td>";
echo '<td> <input type="text"  name="skill5_icon" ';
if(isset($god_all_infos['skill5_icon'])) echo 'value="'.$god_all_infos['skill5_icon'].'"';
echo '/> <input type="button" class="onetarek-upload-button button" value="Choisir une image" /></td>';
echo "</tr>";

echo "<tr>";
echo "<td><label for='skill5_description'>Description passif</label></td>";
echo "<td>";  wp_editor( $god_all_infos['skill5_description']['itemDescription']['description'], 'skill5_description' , $a_settings); echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td colspan='2'><hr></td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='skill1'>Nom sort 1</label></td>";
echo "<td><input name='skill1' type='text'";
if(isset($god_all_infos['skill1'])) echo 'value="'.$god_all_infos['skill1'].'"';
echo "></td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='skill1_icon'>Image sort 1</label></td>";
echo '<td> <input type="text"  name="skill1_icon" ';
if(isset($god_all_infos['skill1_icon'])) echo 'value="'.$god_all_infos['skill1_icon'].'"';
echo '/> <input type="button" class="onetarek-upload-button button" value="Choisir une image" /></td>';
echo "</tr>";

echo "<tr>";
echo "<td><label for='skill1_description'>Description sort 1</label></td>";
echo "<td>";  wp_editor( $god_all_infos['skill1_description']['itemDescription']['description'], 'skill1_description' , $a_settings); echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td colspan='2'><hr></td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='skill2'>Nom sort 2</label></td>";
echo "<td><input name='skill2' type='text'";
if(isset($god_all_infos['skill2'])) echo 'value="'.$god_all_infos['skill2'].'"';
echo "></td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='skill2_icon'>Image sort 2</label></td>";
echo '<td> <input type="text"  name="skill2_icon" ';
if(isset($god_all_infos['skill2_icon'])) echo 'value="'.$god_all_infos['skill2_icon'].'"';
echo '/> <input type="button" class="onetarek-upload-button button" value="Choisir une image" /></td>';
echo "</tr>";

echo "<tr>";
echo "<td><label for='skill2_description'>Description sort 1</label></td>";
echo "<td>";  wp_editor( $god_all_infos['skill2_description']['itemDescription']['description'], 'skill2_description' , $a_settings); echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td colspan='2'><hr></td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='skill3'>Nom sort 3</label></td>";
echo "<td><input name='skill3' type='text'";
if(isset($god_all_infos['skill3'])) echo 'value="'.$god_all_infos['skill3'].'"';
echo "></td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='skill3_icon'>Image sort 3</label></td>";
echo '<td> <input type="text"  name="skill3_icon" ';
if(isset($god_all_infos['skill3_icon'])) echo 'value="'.$god_all_infos['skill3_icon'].'"';
echo '/> <input type="button" class="onetarek-upload-button button" value="Choisir une image" /></td>';
echo "</tr>";

echo "<tr>";
echo "<td><label for='skill3_description'>Description sort 1</label></td>";
echo "<td>";  wp_editor( $god_all_infos['skill3_description']['itemDescription']['description'], 'skill3_description' , $a_settings); echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td colspan='2'><hr></td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='skill4'>Nom ultimate</label></td>";
echo "<td><input name='skill4' type='text'";
if(isset($god_all_infos['skill4'])) echo 'value="'.$god_all_infos['skill4'].'"';
echo "></td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='skill4_icon'>Image ultimate</label></td>";
echo '<td> <input type="text"  name="skill4_icon" ';
if(isset($god_all_infos['skill4_icon'])) echo 'value="'.$god_all_infos['skill4_icon'].'"';
echo '/> <input type="button" class="onetarek-upload-button button" value="Choisir une image" /></td>';
echo "</tr>";

echo "<tr>";
echo "<td><label for='skill4_description'>Description sort 1</label></td>";
echo "<td>";  wp_editor( $god_all_infos['skill4_description']['itemDescription']['description'], 'skill4_description' , $a_settings); echo "</td>";
echo "</tr>";

echo "</table>";
submit_button("Enregistrer");
echo "</form>";