<form method="POST" action="./?action=ConfirmCreerSite">
   <fieldset>
     <legend>Créer Site</legend>
		<p>
			<label for="referent">Nom référent</label>
			<input type="text" name="referent" value="" required>
		</p>
        <p>
			<label for="nomsite">Nom Site</label>
			<input type="text" name="nomsite" value="" required>
		</p>
        <p>
			<label for="adresse">Adresse</label>
			<input type="text" name="adresse" value="" required>
		</p>
        <p>
            Liste Client :
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