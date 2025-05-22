<br/><br/>
<?php
    if(!$LesQualifications){ ?>
        <td>L'intervenant n'as pas de qualification.</td><br><br>
        <td><a href=./?action=ajouterQualification&salarie=<?php echo $salarie["Id_salarie"] ?>>Ajouter une Qualification</a></td>

<?php }else{ ?>
    <td><a href=./?action=ajouterQualification&salarie=<?php echo $salarie["Id_salarie"] ?>>Ajouter un Qualification</a></td>
    <table border=2 width="90%">
    <tr>
        <th>Domaine technique</th>
        <th>Supprimer du domaine technique</th>
        <th>Prix</th>
        <th>Modifier Prix</th>
    </tr>
    <?php foreach ($LesQualifications as $qualification) {?>
    <div class="card">
        <div class="descrCard">
            <tr>
                <td><?= $qualification["Id_domaine_tech"] ?></td>
                <td><a href=./?action=supprimerqualification&salarie=<?php echo $salarie["Id_salarie"]?>&Id_domaine_tech=<?php echo $qualification["Id_domaine_tech"]?>> 
                <img src="images/delete.png" TITLE="SUPPRIMER"></a></td>
                <?php if($qualification["prix"]== NULL){ ?>
                <td><a href=./?action=ajouterPrix&salarie=<?php echo $salarie["Id_salarie"]?>&Id_domaine_tech=<?php echo $qualification["Id_domaine_tech"]?>>Ajouter le prix</td>
                <?php }else{ ?>
                <td><?= $qualification["prix"] ?></td>
                <td><a href=./?action=modifierprix&salarie=<?php echo $salarie["Id_salarie"]?>&Id_domaine_tech=<?php echo $qualification["Id_domaine_tech"]?>> 
                <img src="images/edit-button.png" TITLE="MODIFIER"></a></td>
                <?php } ?>
            </tr>   
        </div>
    </div>
    
    <p>
<?php }}?> 
<a href="./?action=voirSalarie">Retourner en arrière</a>
    

