<form method="POST" action="./?action=ConfirmmodifierClient&client=<?php echo $leClient["Id_Client_societe"] ?>">
    <fieldset>
        <legend>Modifier Salarie</legend>
        <p>
            <label for="Raison">Raison Social</label>
            <input type="text" name="Raison" value="<?php echo $leClient['raison_social'] ?>" required>
        </p>
        <p>
            <label for="Adresse">Adresse</label>
            <input type="text" name="Adresse" value="<?php echo $leClient['adresse'] ?>" required>
        </p>
        <label for="idSecteur">Secteur d'activité</label>
        <select name='idSecteur' required>
            <?php
            foreach ($lesSecteurs as $LeSecteur) {
                echo "<option value ='" . $LeSecteur['Id_secteur_activite'] . "'>" . $LeSecteur['nom'] . " </option>";
            }
            ?>
        </select>
        <br/>
        <br/>
        <p>
            <input type="submit" value="Valider" name="valider">
        </p>
</form>