<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery("#pwet_list ul").idTabs();
        jQuery("#skin_list ul").idTabs();
    });
</script>
<?php

//recup du dieux !
$a_the_god = get_god_spec($_GET['id_god'],'*');
$a_the_god = $a_the_god[0];

foreach($a_the_god as $k => $v){
	$a_the_god[$k] = stripslashes($v);
}

$a_the_god = de_serialize_gods($a_the_god);

//pr($a_the_god);

$a_skin_god = get_skin_spec_by_god($_GET['id_god'],'*');
$a_fist_skin = get_base_skin_spec_by_god($_GET['id_god'],'*');
$a_fist_skin = $a_fist_skin[0];

//pr($a_fist_skin);

// netoyage des skins

foreach($a_skin_god as $k99 => $data88){
	foreach($data88 as $k98 => $data) {
		$a_skin_god[$k99][$k98] = htmlspecialchars_decode(stripslashes ($data));
	}
}

?>
<div id="pwet_list" class="usual">
	<div style="text-align:center;">
		<h3 style="font-size:25px;"><?php echo $a_the_god['name']; ?></h3>
		<h3 style="color:grey; font-size:20px;"><?php echo $a_the_god['title']; ?></h3>
		<h3 style="color:grey; font-size:20px;"><?php echo $a_the_god['pantheon']; ?></h3>
	</div>
    <ul>
        <li class="inline_liste" ><a href="#lore">Histoire</a></li>
        <li class="inline_liste" ><a href="#skills">Skills</a></li>
        <li class="inline_liste" ><a href="#skins">Skins</a></li>
    </ul>
    <div id="lore">
	    <table>
		    <tr>
			    <td style="width:180px;">
				    <img src="<?php echo $a_fist_skin['img']; ?>">
			    </td>
			    <td>
				    <h3 style="color:grey; font-size:20px;"><?php echo $a_the_god['type']; ?></h3>
				    <h3 style="color:grey; font-size:20px;"><?php echo $a_the_god['role']; ?></h3>
				    <h3 style="color:grey;" >
					    <?php echo $a_the_god['pros']; ?>
				    </h3>
				    <h3 style="color:grey;" >
					    <?php echo '<img src="'.SMFR_GOD_URL.'/front/img/gem.png">'?>
					    <?php echo $a_the_god['gem']; ?>
				    </h3>
				    <h3 style="color:grey;" >
					    <?php echo '<img src="'.SMFR_GOD_URL.'/front/img/favor.png">'?>
					    <?php echo $a_the_god['favor']; ?>
				    </h3>
				    <p style="color:grey;font-weight:bold;">
					    Vie : <?php echo $a_the_god['health'].' ( + '.$a_the_god['health_per_lvl'].' )'; ?><br/>
					    Régenération Vie : <?php echo $a_the_god['health_per_five'].' ( + '.$a_the_god['health5_per_lvl'].' )'; ?><br/>
					    Mana : <?php echo $a_the_god['mana'].' ( + '.$a_the_god['mana_per_lvl'].' )'; ?><br/>
					    Régenération Mana : <?php echo $a_the_god['mana_per_five'].' ( + '.$a_the_god['mp5_per_lvl'].' )'; ?><br/>
					    Puissance Magique : <?php echo $a_the_god['magical_power'].' ( + '.$a_the_god['magical_power_per_lvl'].' )'; ?><br/>
					    Protection Magique : <?php echo $a_the_god['magic_protection'].' ( + '.$a_the_god['magic_protection_per_lvl'].' )'; ?><br/>
					    Puissance Physique : <?php echo $a_the_god['physical_power'].' ( + '.$a_the_god['physical_power_per_lvl'].' )'; ?><br/>
					    Protection Physique : <?php echo $a_the_god['physical_protection'].' ( + '.$a_the_god['physical_protection_per_lvl'].' )'; ?><br/>
					    Vitesse de déplacement : <?php echo $a_the_god['speed']; ?><br/>
					    Vitesse d'attaque : <?php echo $a_the_god['attack_speed'].' ( + '.$a_the_god['attack_speed_per_lvl'].' )'; ?><br/>
				    </p>
			    </td>
		    </tr>
		    <tr>
			    <td colspan="2">
				    <h3 style="font-size:25px;">Description</h3>
				    <?php echo $a_the_god['lore']; ?>
			    </td>
		    </tr>
	    </table>
    </div>
    <div id="skills">
        <table>
            <tr>
                <td>
                    <h3 style="font-size:25px;">Les sorts</h3>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <h3  style="font-size:20px;">
                        <p style="color:grey;" >Passif</p>
                        <img src="<?php echo $a_the_god['skill5_icon']; ?>" />
                        <?php echo $a_the_god['skill5']; ?>
                    </h3>
	                <p><?php echo $a_the_god['skill5_description']['itemDescription']['description'] ?></p>
	                <p><?php echo $a_the_god['skill5_description']['itemDescription']['cooldown'] ?><br>
	                <?php echo $a_the_god['skill5_description']['itemDescription']['cost'] ?><br>
	                <?php
	                    foreach($a_the_god['skill5_description']['itemDescription']['menuitems'] as $k1 => $v){
							echo $v['description'].' '.$v['value']."<br>";
	                    }
		                foreach($a_the_god['skill5_description']['itemDescription']['rankitems'] as $k1 => $v){
			                echo $v['description'].' '.$v['value']."<br>";
		                }
	                ?>
	                </p>
                </td>
            </tr>
        </table>

        <table>
            <tr>
	            <td>
		            <h3  style="font-size:20px;">
			            <p style="color:grey;" >Sort 1</p>
			            <img src="<?php echo $a_the_god['skill1_icon']; ?>" />
			            <?php echo $a_the_god['skill1']; ?>
		            </h3>
		            <p><?php echo $a_the_god['skill1_description']['itemDescription']['description'] ?></p>
		            <p>Cooldown : <?php echo $a_the_god['skill1_description']['itemDescription']['cooldown'] ?><br>
			        Coût : <?php echo $a_the_god['skill1_description']['itemDescription']['cost'] ?><br>
			       <?php
			            foreach($a_the_god['skill1_description']['itemDescription']['menuitems'] as $k1 => $v){
				            echo $v['description'].' '.$v['value']."<br>";
			            }
			            foreach($a_the_god['skill1_description']['itemDescription']['rankitems'] as $k1 => $v){
				            echo $v['description'].' '.$v['value']."<br>";
			            }
			            ?>
		            </p>
	            </td>
            </tr>
        </table>

        <table>
            <tr>
	            <td>
		            <h3  style="font-size:20px;">
			            <p style="color:grey;" >Sort 2</p>
			            <img src="<?php echo $a_the_god['skill2_icon']; ?>" />
			            <?php echo $a_the_god['skill2']; ?>
		            </h3>
		            <p><?php echo $a_the_god['skill2_description']['itemDescription']['description'] ?></p>
		            <p>Cooldown : <?php echo $a_the_god['skill2_description']['itemDescription']['cooldown'] ?><br>
			        Coût : <?php echo $a_the_god['skill2_description']['itemDescription']['cost'] ?><br>
			           <?php
			            foreach($a_the_god['skill2_description']['itemDescription']['menuitems'] as $k1 => $v){
				            echo $v['description'].' '.$v['value']."<br>";
			            }
			            foreach($a_the_god['skill2_description']['itemDescription']['rankitems'] as $k1 => $v){
				            echo $v['description'].' '.$v['value']."<br>";
			            }
			            ?>
		            </p>
	            </td>
            </tr>
        </table>

        <table>
            <tr>
	            <td>
		            <h3  style="font-size:20px;">
			            <p style="color:grey;" >Sort 3</p>
			            <img src="<?php echo $a_the_god['skill3_icon']; ?>" />
			            <?php echo $a_the_god['skill3']; ?>
		            </h3>
		            <p><?php echo $a_the_god['skill3_description']['itemDescription']['description'] ?></p>
		            <p>Cooldown : <?php echo $a_the_god['skill3_description']['itemDescription']['cooldown'] ?><br>
			        Coût : <?php echo $a_the_god['skill3_description']['itemDescription']['cost'] ?><br>
			           <?php
			            foreach($a_the_god['skill3_description']['itemDescription']['menuitems'] as $k1 => $v){
				            echo $v['description'].' '.$v['value']."<br>";
			            }
			            foreach($a_the_god['skill3_description']['itemDescription']['rankitems'] as $k1 => $v){
				            echo $v['description'].' '.$v['value']."<br>";
			            }
			            ?>
		            </p>
	            </td>
            </tr>
        </table>

        <table>
            <tr>
	            <td>
		            <h3  style="font-size:20px;">
			            <p style="color:grey;" >Sort 4</p>
			            <img src="<?php echo $a_the_god['skill4_icon']; ?>" />
			            <?php echo $a_the_god['skill4']; ?>
		            </h3>
		            <p><?php echo $a_the_god['skill4_description']['itemDescription']['description'] ?></p>
		            <p>Cooldown : <?php echo $a_the_god['skill4_description']['itemDescription']['cooldown'] ?><br>
		            Coût : <?php echo $a_the_god['skill4_description']['itemDescription']['cost'] ?><br>
		                <?php
			            foreach($a_the_god['skill4_description']['itemDescription']['menuitems'] as $k1 => $v){
				            echo $v['description'].' '.$v['value']."<br>";
			            }
			            foreach($a_the_god['skill4_description']['itemDescription']['rankitems'] as $k1 => $v){
				            echo $v['description'].' '.$v['value']."<br>";
			            }
			            ?>
		            </p>
	            </td>
            </tr>
        </table>
    </div>
    <div id="skins">
        <table>
            <tr>
                <td>
                    <h3 style="font-size:25px;">Les skins</h3>
                </td>
            </tr>
        </table>
        <div id="skin_list" class="usual">
            <ul>
                <?php
                //foreach sur tout les skins ! Puis on affiche ;)
                foreach($a_skin_god as $key11 => $a_skin_data) {
                    // on fait les ul li
                    echo '<li class="inline_liste" ><a href="#skin'.$a_skin_data['id'].'">'.$a_skin_data['name'].'</a></li>';
                }
                ?>
            </ul>

            <?php
            foreach($a_skin_god as $key11 => $a_skin_data) {
                // on va chercher le name du type de skin !
                $name_type = get_type_skin_spec($a_skin_data['id_type_skin'] , 'name' );
                $name_type = $name_type[0]['name'];
                ?>
                <div id="skin<?php echo $a_skin_data['id']; ?>">
                    <table >
                        <tr>
                            <td>
                                <img src="<?php echo $a_skin_data['img']; ?>" style="max-width:100%;height:auto;" />
                            </td>
                            <td>
                                <h3 style="font-size:25px;"><?php echo $a_skin_data['name']; ?></h3>
                                <h3 style="font-size:20px;color:grey;" >
                                    <?php echo $name_type ?>
                                </h3>
								<?php
									if($a_skin_data['favor'] != "" && $a_skin_data['favor'] != 0 && is_numeric($a_skin_data['favor'])){
								?>
                                <h3 style="color:grey;" >
                                    <?php echo '<img src="'.SMFR_GOD_URL.'/front/img/favor.png">'?>
                                    <?php echo $a_skin_data['favor']; ?>
                                </h3>
								<?php } ?>
								<?php
									if($a_skin_data['gem'] != "" && $a_skin_data['gem'] != 0 && is_numeric($a_skin_data['gem']) ){
								?>
                                <h3 style="color:grey;" >
                                    <?php echo '<img src="'.SMFR_GOD_URL.'/front/img/gem.png">'?>
                                    <?php echo $a_skin_data['gem']; ?>
                                </h3>
								<?php } ?>
	                            <?php echo $a_skin_data['note']; ?>
                            </td>
                        </tr>
                    </table>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>