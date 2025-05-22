<form method="POST" action="./?action=validationModifierSalarie&salarie=<?php echo $leSalarie["Id_salarie"]?>">
   <fieldset>
     <legend>Modifier Salarie</legend>
		<p>
			<label for="Nom">Nom</label>
			<input type="Nom" name="Nom" value="<?php echo $leSalarie['nom'] ?>" required>
		</p>
        <p>
			<label for="Prenom">Prenom</label>
			<input type="Prenom" name="Prenom" value="<?php echo $leSalarie['prenom'] ?>" required>
		</p>
        <p>
         <input type="submit" value="Valider" name="valider">
      </p>
</form>