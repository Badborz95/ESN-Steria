<br/><br/>
<?php
    if(!$LesObjectifs){ ?>
        <td>Le commercial n'as pas d'Objectif d'enregistrer.</td><br><br>
        <td><a href=./?action=ajouterObjectifAn&salarie=<?php echo $salarie["Id_salarie"] ?>>Ajouter un Objectif</a></td>

<?php }else{ ?>
    <td><a href=./?action=ajouterObjectifAn&salarie=<?php echo $salarie["Id_salarie"] ?>>Ajouter un Objectif</a></td>
    <table border=2 width="90%">
    <tr>
        <th>ANNEE</th>
        <th>OBJECTIF</th>
        <th>CA</th>
    </tr>
    <?php foreach ($LesObjectifs as $objectif) {?>
    <div class="card">
        <div class="descrCard">
            
                <tr>
                <td><?= $objectif["annee"] ?></td>
                <td><?= $objectif["objectif_vente"] ?></td>
                <?php if($objectif["CA"]== NULL){ ?>
                <td><a href=./?action=ajouterCA&salarie=<?php echo $salarie["Id_salarie"]?>&annee=<?php echo $objectif["annee"]?>&objectif=<?php echo $objectif["objectif_vente"]?>>Ajouter le chiffre d'affaire</td>
                <?php }else{ ?>
                <td><?= $objectif["CA"] ?></td>
                <?php } ?>
            </tr>   
        </div>
    </div>
    
    <p>
<?php }}?> 
<a href="./?action=voirSalarie">Retourner en arrière</a>
    

