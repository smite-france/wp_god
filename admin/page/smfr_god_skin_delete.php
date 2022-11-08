<?php
if(isset($_POST['submit']) && $_POST['submit'] == 'Supprimer') {
    if (isset($_GET['id_skin']) && $_GET['id_skin'] > 0) {
        status_skin_spec($_GET['id_skin'], 0);
        $url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'].'?page='.$_GET['page']."&a=skin&id_god=".$_GET['id_god'];
        ?>
        <script>
            window.location= <?php echo "'" . $url . "'"; ?>;
        </script>
    <?php
    }
}
echo "<form action='' method='post'>";
submit_button('Supprimer');
echo "</form>";
echo "<a href='?page=".$_GET['page']."&a=skin&id_god=".$_GET['id_god']."'><button class='button button-primary' >Retour a la liste des skins</button></a>";