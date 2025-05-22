<form method="POST" action="./?action=confirmmodifierSecteurActivite&id=<?= $id ?>">
    <fieldset>
        <legend>Modifier un secteur d'activité</legend>
        <p>
            <label for="nom">Nom</label>
            <input type="nom" name="nom" value="<?php echo $nom ?>" required>
        </p>
        <br />
        <p>
            <input type="submit" value="Valider" name="valider">
        </p>
</form>