<form method="POST" action="./?action=confirmAjouterCA&salarie=<?php echo $id?>">
     <legend>Création d'un Objectif</legend>
        <p>
            <label for="CA" >CA</label>
            <input type="number" name="CA" required>
        </p>
        <input type="hidden" name="annee" value="<?php echo $annee ?>" >
        <input type="hidden" name="objectif" value="<?php echo $objectif ?>" >
        <p>
         <input type="submit" value="Valider" name="valider">
      </p>
</form>