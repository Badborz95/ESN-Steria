<form method="POST" action="index.php?action=confirmAssocierDomaine&Id_domaine_tech=<?php echo $id_domaine_tech1 ?>">
   <legend>Choisissez le Sous Domaine</legend>
   <label for="selectSousDomaine">Sous-Domaine</label>
   <select name="selectSousDomaine" id="selectSousDomaine">
      <?php
      foreach ($listeDomaine as $unDomaine) {
         $id_domaine_tech = $unDomaine['Id_domaine_tech'];
         $libelle = $unDomaine['libelle'];
         if ($id_domaine_tech == $id_domaine_tech1) {
            ?>
         <?php } else { ?>
            <option value="<?php echo $id_domaine_tech ?>">
            <?php echo $id_domaine_tech ?> -
               <?php echo $libelle ?>
            </option>
         <?php } ?>
      <?php } ?>
   </select>
   <p>
      <input type="submit" value="Valider" name="valider">
   </p>
</form>