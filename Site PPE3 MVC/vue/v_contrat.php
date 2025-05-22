<br/><br/>
<table border=2 width="90%">
    <tr>
        <th>Societe Propriétaire</th>
        <th>Responsable Intervenant</th>
        <th>Responsable Commerciale</th>
        <th>Secteur Activité</th>
        <th>Budget</th>
        <th>Adresse Site</th>
        <th>Durée Contrat</th>
        <th>Intitulé Contrat</th>
        <th>Date Début Contrat</th>
        <th>Date Fin Contrat</th>
        <th>Description Contrat</th>
        <th>Voir Intervention</th>
        <?php if($_SESSION['type'] == 1){ ?>
        <th>MODIFIER</th>
        <th>SUPPRIMER</th>
        <?php }?>
    </tr>
    <p>
    

<?php
foreach($LesContrats as $LeContrat)
{
    ?>

    <div class="card">
        <div class="descrCard">
            <tr>
                <td><?= $LeContrat["raison_social"] ?></td>
                <td><?= $LeContrat["nom_inter"] ?> <?= $LeContrat["prenom_inter"] ?></td>
                <td><?= $LeContrat["nom_com"] ?> <?= $LeContrat["prenom_com"] ?></td>
                <td><?= $LeContrat["nom"] ?></td>
                <td><?= $LeContrat["budget"] ?></td>
                <td><?= $LeContrat["adresse_site"] ?></td>
                <td><?= $LeContrat["nb_jour"] ?></td>
                <td><?= $LeContrat["intitule"] ?></td>
                <td><?= $LeContrat["date_debut"] ?></td>
                <td><?= $LeContrat["date_fin"] ?></td>
                <td><?= $LeContrat["description"] ?></td>
                <td><a href=./?action=voirInterventionsbyContrat&idContrat=<?php 
                if($_SESSION['type'] == 1){
                    echo $LeContrat['Id_contrat']; ?>
                    
                    <?php
                }else{
                    echo $LeContrat['Id_contrat'];
                    }?>&type=2 <? ?>
                    <img src="images/edit-button.png" TITLE="Liste Intervention"></a></td>

                    <?php 
                if($_SESSION['type'] == 1){ ?><td><a href=./?action=modifierContrat&idContrat=<?php echo $LeContrat["Id_contrat"] ?>> 
                <img src="images/edit-button.png" TITLE="MODIFIER"></a></td>
                <td><a href=./?action=supprimerContrat&idContrat=<?php echo $LeContrat["Id_contrat"] ?>> 
                <img src="images/delete.png" TITLE="SUPPRIMER"></a></td>
                <?php }?>
            </tr>
        </div>
    </div>
    <?php
}

?>
</table>
<a href=./?action=creerContrat>Creer un Contrat</a> 