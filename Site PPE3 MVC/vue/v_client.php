<br /><br />
<table border=2 width="90%">
    <tr>
        <?php if ($_SESSION['type'] == 1) { ?>
            <th>ID</th>
        <?php } ?>
        <th>Raison Social</th>
        <th>Adresse (siège social)</th>
        <th>Secteur d'activite</th>
        <?php if ($_SESSION['type'] == 1) { ?>
            <th>MODIFIER</th>
            <th>SUPPRIMER</th>
        <?php } ?>
    </tr>
    <p>


        <?php
        foreach ($LesClient as $client) {
        ?>

    <div class="card">
        <div class="descrCard">
            <tr>
                <?php if ($_SESSION['type'] == 1) { ?>
                    <td><?= $client["Id_Client_societe"] ?></td>
                <?php } ?>
                <td><?= $client["raison_social"] ?></td>
                <td><?= $client["adresse"] ?></td>
                <td><?= $client["nom"] ?></td>

                <?php if ($_SESSION['type'] == 1) { ?>
                    <td><a href=./?action=modifierClient&client=<?php echo $client["Id_Client_societe"] ?>>
                            <img src="images/edit-button.png" TITLE="MODIFIER"></a></td>
                    <td><a href=./?action=supprimerClient&client=<?php echo $client["Id_Client_societe"] ?>>
                            <img src="images/delete.png" TITLE="SUPPRIMER"></a></td>
                <?php } ?>
            </tr>
        </div>
    </div>
<?php
        }

?>
</table>
<?php if ($_SESSION['type'] == 1) { ?>
    <a href=./?action=creerClient>Creer un Client</a>
<?php } ?>