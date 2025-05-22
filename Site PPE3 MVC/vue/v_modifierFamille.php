<form method="POST" action="index.php?action=confirmModifierFamille&id_famille=<?= $idfamille ?>">
   <fieldset>
     <legend>Modifier famille</legend>
		<p>
			<label for="nomfamille">Nom</label>
			<input type="nomfamille" name="nomfamille" value="<?php echo $nom_code ?>" required>
		</p>

        <p>
         <input type="submit" value="Valider" name="valider">
      </p>
</form>