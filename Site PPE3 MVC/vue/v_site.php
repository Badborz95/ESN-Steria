<br/><br/>
<table border=2 width="90%">
    <tr>
        <th>Societe Propriétaire</th>
        <th>Numero sequentiel</th>
        <th>referent</th>
        <th>Adresse Site</th>
        <th>Nom Site</th>
        <?php if ($_SESSION['type'] == 1) { ?>
        <th>MODIFIER</th>
        <th>SUPPRIMER</th>
        <?php } ?>

    </tr>
    <p>
    

<?php
foreach($LesSites as $site)
{
    ?>

    <div class="card">
        <div class="descrCard">
            <tr>
                <td><?= $site["raison_social"] ?></td>
                <td><?= $site["numero_sequentiel"] ?></td>
                <td><?= $site["referent"] ?></td>
                <td><?= $site["adresse_site"] ?></td>
                <td><?= $site["nom"] ?></td>
                <?php if ($_SESSION['type'] == 1) { ?>
                <td><a href=./?action=modifierSite&idsite=<?php echo $site["numero_sequentiel"] ?>&client=<?php echo $site["Id_Client_societe"] ?>> 
                <img src="images/edit-button.png" TITLE="MODIFIER"></a></td>
                <td><a href=./?action=supprSite&idsite=<?php echo $site["numero_sequentiel"] ?>&client=<?php echo $site["Id_Client_societe"] ?>> 
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
<a href=./?action=creerSite>Creer un Site</a> 
<?php } ?>