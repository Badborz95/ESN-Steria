<form method="POST" action="index.php?action=ajouterDomaine">
      <legend>Créer un domaine</legend>
      <p>
         <label for="nomdomaine">Nom</label>
         <input type="text" name="nomdomaine" required>
      </p>
      <label for="selectFamille">Choisir une famille :</label>
      <select name="selectFamille" id="selectFamille">
         <?php
         foreach ($listeFamille as $uneFamille) {
            $id_famille = $uneFamille['Id_famille'];
            $libelle = $uneFamille['nom_code'];
            ?>
            <option value="<?php echo $id_famille ?>">
               <?php echo $libelle ?> -
               <?php echo $id_famille ?>
            </option>
         <?php } ?>
      </select>
      <p>
         <input type="submit" value="Valider" class="bouton" name="valider">
      </p>
</form>