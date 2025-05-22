<br/><br/>
<table border=2 width="90%">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>MODIFIER</th>
        <th>SUPPRIMER</th>

    </tr>
    <p>

<?php
if((!$lesSalaries)){ ?>
    <a href=./?action=creerSalarie>Creer un Salarié</a><br>
<?php
}else{
foreach($lesSalaries as $salarie)
{
    ?>

    <div class="card">
        <div class="descrCard">
            <tr>
                <td><?= $salarie["Id_salarie"] ?></td>
                <td><?= $salarie["nom"] ?></td>
                <td><?= $salarie["prenom"] ?></td>
                <td><a href=./?action=modifierSalarie&salarie=<?php echo $salarie["Id_salarie"] ?>> 
                <img src="images/edit-button.png" TITLE="MODIFIER"></a></td>
                <td><a href=./?action=supprimerSalarie&salarie=<?php echo $salarie["Id_salarie"] ?>> 
                <img src="images/delete.png" TITLE="SUPPRIMER"></a></td>
            </tr>
        </div>
    </div>
    <?php
}
    ?>
</table>
<a href=./?action=creerSalarie>Creer un Salarié</a>
<div class="row">
    <div class="col-md-5">
        <table border=2 width="90%">
            <tr>
                <th>Les Intervenants</th>
                <th>Le niveau d'étude</th>
                <th>La maitrise d'anglais</th>
            </tr>
                <?php
                    if(!$lesIntervenants){
                ?>
                    <tr><td>Il n'y a pas d'intervenant</td></tr>
                <?php
                    }else{
                        foreach($lesIntervenants as $intervenant){
                ?>
                <div class="card">
                    <div class="descrCard">
                        <tr>
                            <td><?= $intervenant["nom"] ,' ', $intervenant["prenom"] ?></td>
                            <td><?= $intervenant["niveau_etude"]?></td>
                            <td><?= $intervenant["maitrise_anglais"]?></td>
                            <td><a href=./?action=voirQualification&salarie=<?php echo $intervenant["Id_salarie"] ?>>Qualification</a></td>
                        </tr>
                    </div>
                </div>
                <?php
                        }
                    }       
                ?>
        </table>
    </div>
    <div class="col-md-7">
        <table border=2 width="90%">
            <tr>
                <th>Les Commerciaux</th>
                <th>Le téléphone fixe</th>
                <th>Le téléphone portable</th>
                <th>Le secteur d'activiter</th>
            </tr>
            <tr>
            <?php
                if(!$lesCommercials){
            ?>
                <td>Il n'y a pas de commercial</td>
            <?php
                }else{
                    foreach($lesCommercials as $commercial){
            ?>
                <div class="card">
                    <div class="descrCard">
                        <tr>
                            <td><?= $commercial["nom"] ,' ', $commercial["prenom"] ?></td>
                            <td><?= $commercial["tel_fixe"]?></td>
                            <td><?= $commercial["tel_portable"]?></td>
                            <td><?= $commercial["Id_secteur_activite"]?></td>
                            <td><a href=./?action=voirObjectifSalarie&salarie=<?php echo $commercial["Id_salarie"] ?>>Objectif</a></td>
                        </tr>
                    </div>
                </div>
            <?php
                    }
                }       
            ?> 
            </tr>
        </table>
    </div>
</div>
<?php }