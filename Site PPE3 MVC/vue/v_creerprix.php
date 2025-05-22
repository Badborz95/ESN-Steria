<form method="POST" action="./?action=confirmAjouterPrix&salarie=<?php echo $id?>">
     <legend>Création d'un Prix</legend>
        <p>
            <label for="prix" >Prix</label>
            <input type="number" name="prix" required>
        </p>
        <input type="hidden" name="Id_domaine_tech" value="<?php echo $Id_domaine_tech ?>" >
        <p>
         <input type="submit" value="Valider" name="valider">
      </p>
</form>