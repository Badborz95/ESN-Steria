<form method="POST" action="./?action=confirmAjouterObjectifAn&salarie=<?php echo $id?>">
     <legend>Création d'un Objectif</legend>
        <p>
            <label for="objectif" >Objectif</label>
            <input type="number" name="objectif" required>
        </p>
        <p>
        <?php
            echo '<label>Anne :</label><br><select name="annee" data-component="date">';
            for ($year = date('Y') + 1; $year >= 2000; $year--) {
            echo '<option value="'.$year.'">' . $year . '</option>';
            }
        ?>
        </select>		
        </p>
        <p>
         <input type="submit" value="Valider" name="valider">
      </p>
</form>