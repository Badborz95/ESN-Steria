<form method="POST" action="./?action=confirmModifierIntervention&intervention=<?php echo $leIntervention["Id_interventions"] ?>">
    <fieldset>
        <legend>Modifier Intervention</legend>
        <p>
            <label for="intitule">Intitule</label>
            <input type="text" name="intitule" value="<?php echo $leIntervention['i_intitule'] ?>" required>
        </p>
        <p>
            <label for="date_debut">Date Debut</label>
            <input type="date" name="date_debut" value="<?php echo $leIntervention['date_D_inter'] ?>" required>
        </p>
        <p>
            <label for="date_fin">Date Fin</label>
            <input type="date" name="date_fin" value="<?php echo $leIntervention['date_F_inter'] ?>" required>
        </p>
        <label for="domaine_tech">Domaine technologique</label>
        <select name='domaine_tech' required>
            <?php
            foreach ($lesdomaines as $domaine) {
                echo "<option value ='" . $domaine['Id_domaine_tech'] . "'>" . $domaine['libelle'] . " </option>";
            }
            ?>
        </select>
        <p>
            <label for="contrat">Contrat</label>
            <select name='contrat' required>
            <?php
            foreach ($contrats as $contrat) {
                echo "<option value ='" . $contrat['Id_contrat'] . "'>" . $contrat['intitule'] . " </option>";
            }
            ?>
        </select>
        </p>
        <p>
            <label for="etat">Etat de intervention</label>
            <select name='etat' required>
            <?php
            foreach ($etats as $etat) {
                echo "<option value ='" . $etat['Id_etat'] . "'>" . $etat['nom'] . " </option>";
            }
            ?>
        </select>
        </p>
        <br/>
        <br/>
        <p>
            <input type="submit" value="Valider" name="valider">
        </p>
</form>