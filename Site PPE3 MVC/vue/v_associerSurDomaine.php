
<form method="POST" action="index.php?action=associerSousDomaine">
      <legend>Choisissez le Sur Domaine</legend>
      <label for="selectSurDomaine">Sur-Domaine</label>
      <select name="selectSurDomaine" id="selectSurDomaine">
         <?php
         foreach ($listeDomaine as $unDomaine) {
            $id_domaine_tech = $unDomaine['Id_domaine_tech'];
            $libelle = $unDomaine['libelle'];
            ?>
            <option value="<?php echo $id_domaine_tech ?>">
               <?php echo $id_domaine_tech ?> -
               <?php echo $libelle ?>
            </option>
         <?php } ?>
      </select>
      <p>
         <input type="submit" value="Valider" name="valider">
      </p>
</form>