<script type="text/javascript">
        jQuery(document).ready(function() {
			jQuery('#select_god_role option[value=""]').prop('selected', true);
			jQuery('#select_god_pantheon option[value=""]').prop('selected', true);
	        jQuery('#select_god_role,#select_god_pantheon').on("change", function () {
		        jQuery('figure').each(function () { //loop through each checkbox
			        if (jQuery("#select_god_role").val() == "" && jQuery("#select_god_pantheon").val() == "") {
				        jQuery(this).show();
			        } else {
				        if(jQuery("#select_god_role").val() == ""){
					        if (jQuery(this).attr("data-pantheon") == jQuery("#select_god_pantheon").val()) {
						        jQuery(this).show();
					        } else {
						        jQuery(this).hide();
					        }
				        }else {
					        if (jQuery("#select_god_pantheon").val() == "") {
						        if (jQuery(this).attr("data-role") == jQuery("#select_god_role").val()) {
							        jQuery(this).show();
						        } else {
							        jQuery(this).hide();
						        }
					        }
					        else {
						        if (jQuery(this).attr("data-pantheon") == jQuery("#select_god_pantheon").val() && jQuery(this).attr("data-role") == jQuery("#select_god_role").val()) {
							        jQuery(this).show();
						        } else {
							        jQuery(this).hide();
						        }
					        }
				        }
			        }
		        });
	        });
        });
</script>

<?php
// sinon on affiche la liste :3
// inizialize
$html = '';
// config
$a_we_need = array(
    0 => 'id',
    1 => 'name',
    2 => 'pantheon',
    3 => 'role',
    4 => 'icon',
);
//recup des dieux !
$a_all_god = get_god_spec(0, $a_we_need);
//pr($a_all_god);
// err
echo "<h1 style='color:#ffffff !important;'>Liste des dieux</h1>";
echo "<br class='clear'>";
echo '  Pantheon : ';
echo '<select name="select_god_pantheon" id="select_god_pantheon">
<option selected="selected" value="">Pas de filtre</option>
<option value="Hindou">Hindou</option>
<option value="Maya">Maya</option>
<option value="Égyptien">Égyptien</option>
<option value="Chinois">Chinois</option>
<option value="Grec">Grec</option>
<option value="Romain">Romain</option>
<option value="Nordique">Nordique</option>
</select>';
echo '  Rôle : ';
echo '<select name="select_god_role" id="select_god_role">
<option selected="selected" value="">Pas de filtre</option>
<option value=" Mage">Mage</option>
<option value=" Chasseur">Chasseur</option>
<option value=" Assassin">Assassin</option>
<option value=" Gardien">Gardien</option>
<option value=" Guerrier">Guerrier</option>
</select>';
echo "<br>";
echo "<br class='clear'>";
echo "<div style='display: inline-block;text-align: center; font-size:18px;'>";
//run array and modify role and pantheon
foreach ($a_all_god as $key => $a_god_data) {
    echo '<figure style="display: inline-block;" data-pantheon="'.$a_god_data['pantheon'].'" data-role="'.$a_god_data['role'].'" >';
    echo '<img class="img_smfr_god" alt="'.$a_god_data['name'].'" src="'.$a_god_data['icon'].'">';
    echo '<a href="?id_god='.$a_god_data['id'].'" >';
    echo '<figcaption>';
    echo '<h3 style="font-size:20px;">'.$a_god_data['name'].'<br><span style="color:grey; font-size:10px;" >'.$a_god_data['pantheon'].'</span></h3>';
    echo '<p>'.$a_god_data['role'].'</p>';
    echo '</figcaption>';
    echo '</a>';
    echo '</figure>';
}
echo "</div>";