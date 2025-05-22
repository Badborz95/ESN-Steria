<form method="POST" action="index.php?action=confirmModifierDomaine&Id_domaine_tech=<?= $id_domaine_tech ?>">
	<fieldset>
		<legend>Modifier un domaine</legend>
		<p>
			<label for="nomdomaine">Nom </label>
			<input type="text" name="nomdomaine" value="<?php echo $libelle ?>" required>
		</p>
		<label for="selectFamille">Choisir une famille :</label>
		<select name="selectFamille" id="selectFamille">
			<!-- Pour mettre la famille du domaine technique déjà selectionné -->
			<option value="<?php echo $idfamille ?>">
				<?php echo $nom_famille ?> -
				<?php echo $idfamille ?>
			</option>
			<?php
			foreach ($listeFamille as $uneFamille) {
				$id_famille = $uneFamille['Id_famille'];
				$libelle = $uneFamille['nom_code'];
				//Pour éviter que la famille du domaine technique selectionné apparaisse une deuxième fois
				if ($idfamille == $id_famille) {
					?>
				<?php } else { ?>
					<option value="<?php echo $id_famille ?>">
						<?php echo $libelle ?> -
						<?php echo $id_famille ?>
					</option>
				<?php } ?>
			<?php } ?>
		</select>
		<p>
			<input type="submit" value="Valider" name="valider">
		</p>
</form>