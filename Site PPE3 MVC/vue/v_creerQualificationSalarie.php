<?php if(!$LesDomainestechniques){ ?>
	<a href="./?action=voirQualification&salarie=<?php echo $id ?>">Retourner en arrière | L'intervennant est associé à tout les domaine technique.</a>
<?php }else { ?>
<form method="POST" action="./?action=confirmQualification&salarie=<?php echo $id?>">
    <legend>Création d'un Objectif</legend>
        <p>
					<label>Le domaine technique</label>
					<select name="Id_domaine_tech" id="Id_domaine_tech">
						<?php 
						foreach($LesDomainestechniques AS $domaine_tech){
						?>
							<option value="<?= $domaine_tech["Id_domaine_tech"]?>"><?= $domaine_tech["libelle"]?></option>
						<?php
							}
						?>
					</select>
		</p>
        <p>
         <input type="submit" value="Valider" name="valider">
      </p>
</form>
<?php } ?>