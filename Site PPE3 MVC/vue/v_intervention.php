<br/><br/>
<table border=2 width="90%">
    <tr>
        <th>ID</th>
        <th>Intitule</th>
        <th>Contrat</th>
        <th>Date debut</th>
        <th>Date Fin</th>
        <th>Domaine Tech</th>
        <th>Etat</th>
        <th>MODIFIER</th>
        <th>SUPPRIMER</th>

    </tr>
    <p>
    
<?php
foreach($lesInterventions as $intervention)
{
    ?>
    <div class="card">
        <div class="descrCard">
            <tr>
                <td><?= $intervention["Id_interventions"] ?></td>
                <td><?= $intervention["i_intitule"] ?></td>
                <td><?= $intervention["c_intitule"] ?></td>
                <td><?= $intervention["date_D_inter"] ?></td>
                <td><?= $intervention["date_F_inter"] ?></td>
                <td><?= $intervention["libelle"] ?></td>
                <td><?= $intervention["nom"] ?></td>
                <td><a href=./?action=modifierIntervention&intervention=<?php echo $intervention["Id_interventions"] ?>> 
                <img src="images/edit-button.png" TITLE="MODIFIER"></a></td>
                <td><a href=./?action=supprimerIntervention&intervention=<?php echo $intervention["Id_interventions"] ?>> 
                <img src="images/delete.png" TITLE="SUPPRIMER"></a></td>
            </tr>
        </div>
    </div>
    <?php
}

?>
</table>
<a href=./?action=creerIntervention>Creer une Intervention</a> 