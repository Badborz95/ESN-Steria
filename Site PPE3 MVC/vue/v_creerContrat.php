<form method="POST" action="./?action=ConfirmCreerContrat" class="col-12">
   <fieldset>
     <legend>Créer Contrat</legend>
		<p>
			<label for="budget">Budget</label>
			<input type="number" name="budget" value="" required>
		</p>
        <p>
			<label for="intitule">Intitule</label>
			<input type="text" name="intitule" value="" required>
		</p>
        <p>
			<label for="date_D">Date de début du contrat</label>
			<input type="date" name="date_D" value="" required>
		</p>
        <p>
			<label for="date_F">Date de fin du contrat</label>
			<input type="date" name="date_F" value="" required>
		</p>
        <p>
			<label for="nb_jour">Nombre de jour</label>
			<input type="number" name="nb_jour" value="" required>
		</p>
        <p>
			<label for="description">Description</label>
			<input type="text" name="description" value="" required>
		</p>
        <p>
            Client : 
        </p>
        <select name='idClient' required>
            <?php
            foreach ($listeClient as $leClient) {
                echo "<option value ='" . $leClient['Id_Client_societe'] . "'>" . $leClient['raison_social'] . " </option>";
            }
            ?>
        </select>
        <p>
            Secteur d'activité
        </p>
        <select name='idSecteur' required>
            <?php
            foreach ($listesecteur as $secteur) {
                echo "<option value ='" . $secteur['Id_secteur_activite'] . "'>" . $secteur['nom'] . " </option>";
            }
            ?>
        </select>
        <p>
            Liste des Sites :
        </p>
        <select name='idSite' required>
            <?php
            foreach ($lesSite as $site) {
                echo "<option value ='" . $site['numero_sequentiel'] . "'> Referent :" . $site['referent'] . " Adresse :".$site['adresse_site']." </option>";
            }
            ?>
        </select>
        <p>
        Responsable commercial :
        </p>
        <select name='id_salarie-commercial' required>
            <?php
            foreach ($listeCommerciale as $commerciale) {
                var_dump($commerciale);
                echo "<option value ='" . $commerciale['Id_salarie'] . "'>" . $commerciale['name'] . " " . $commerciale['prenom'] . " Spécialité : " . $commerciale['nom_secteur'] . " </option>";
            }
            ?>
        </select>
        <p>
        Responsable Intervenant :
        </p>
        <select name='id_salarie_1-intervenant' required>
            <?php
            foreach ($listeintervenant as $intervenant) {
                echo "<option value ='" . $intervenant['Id_salarie'] . "'>" . $intervenant['nom']. " " . $intervenant['prenom']. " Niveau d'étude " .$intervenant['niveau_etude'] . " Niveau d'anglais " . $intervenant['maitrise_anglais'] . " </option>";
            }
            ?>
        </select>
        <p>
         <input type="submit" value="Valider" name="valider">
      </p>
        </fieldset>
</form>