<br/><br/>
<table border=2 width="90%">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>MODIFIER</th>
        <th>SUPPRIMER</th>

    </tr>
<?php
if((!$lesSecteurActivites)){ ?>
    <a href=./?action=creerSecteurActivite>Creer un Secteur d'activité</a><br>
<?php
}else{
foreach($lesSecteurActivites as $secteurActivite)
{
    ?>

    <div class="card">
        <div class="descrCard">
            <tr>
                <td><?= $secteurActivite["Id_secteur_activite"] ?></td>
                <td><?= $secteurActivite["nom"] ?></td>
                <td><a href=./?action=modifierSecteurActivite&id=<?php echo $secteurActivite["Id_secteur_activite"] ?>> 
                <img src="images/edit-button.png" TITLE="MODIFIER"></a></td>
                <td><a href=./?action=supprimerSecteurActivite&id=<?php echo $secteurActivite["Id_secteur_activite"] ?>> 
                <img src="images/delete.png" TITLE="SUPPRIMER"></a></td>
            </tr>
        </div>
    </div>
    <?php
}
}
    ?>
</table>
<a href=./?action=creerSecteurActivite>Creer un Secteur d'activité</a>