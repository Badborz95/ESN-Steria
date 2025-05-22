<form method="POST" action="./?action=confirmmodifierSite&site=<?php echo $leSite["numero_sequentiel"]?>">
   <fieldset>
     <legend>Modifier Site</legend>
		<p>
			<label for="referent">Nom référent</label>
			<input type="text" name="referent" value="<?php echo $leSite['referent'] ?>" required>
		</p>
        <p>
			<label for="nomsite">Nom Site</label>
			<input type="text" name="nomsite" value="<?php echo $leSite['nom'] ?>" required>
		</p>
        <p>
			<label for="adresse">Adresse</label>
			<input type="text" name="adresse" value="<?php echo $leSite['adresse_site'] ?>" required>
		</p>
        <select name='idClient' required>
            <?php
            foreach ($lesClient as $leClient) {
                echo "<option value ='" . $leClient['Id_Client_societe'] . "'>" . $leClient['raison_social'] . " </option>";
            }
            ?>
        </select>
        <p>
         <input type="submit" value="Valider" name="valider">
      </p>
</form>