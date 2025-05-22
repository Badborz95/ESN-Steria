<form method="POST" action="./?action=ConfirmCreerClient">
    <fieldset>
        <legend>Créer un Client</legend>
        <p>
            <label for="Raison">Raison Social</label>
            <input type="text" name="Raison" value="" required>
        </p>
        <p>
            <label for="Adresse">Adresse</label>
            <input type="text" name="Adresse" value="" required>
        </p>
        <label for="idSecteur">Secteur d'activité</label>
        <select name='idSecteur' required>
            <?php
            foreach ($lesSecteurs as $LeSecteur) {
                echo "<option value ='" . $LeSecteur['Id_secteur_activite'] . "'>" . $LeSecteur['nom'] . " </option>";
            }
            ?>
        </select>
        <br />
        <br />
        <p>
            <input type="submit" value="Valider" name="valider">
        </p>
</form>