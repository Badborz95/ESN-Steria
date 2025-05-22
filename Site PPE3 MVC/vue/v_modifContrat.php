<form method="POST" action="./?action=confirmmodifierContrat&idContrat=<?php echo $leContrat['Id_contrat']?>" class="col-12">
   <fieldset>
     <legend>Modifer Contrat</legend>
		<p>
			<label for="budget">Budget</label>
			<input type="number" name="budget" value="<?php echo $leContrat['budget']?>" required>
		</p>
        <p>
			<label for="intitule">Intitule</label>
			<input type="text" name="intitule" value="<?php echo $leContrat['intitule']?>" required>
		</p>
        <p>
			<label for="date_D">Date de début du contrat</label>
			<input type="date" name="date_D" value="<?php echo $leContrat['date_debut']?>" required>
		</p>
        <p>
			<label for="date_F">Date de fin du contrat</label>
			<input type="date" name="date_F" value="<?php echo $leContrat['date_fin']?>" required>
		</p>
        <p>
			<label for="nb_jour">Nombre de jour</label>
			<input type="number" name="nb_jour" value="<?php echo $leContrat['nb_jour']?>" required>
		</p>
        <p>
			<label for="description">Description</label>
			<input type="text" name="description" value="<?php echo $leContrat['description']?>" required>
		</p>
        <p>
            Client : 
        </p>
        <select name='idClient' required>
            <?php
            foreach ($listeClient as $leClient) {
                if($leContrat['Id_Client_societe'] ==  $leClient['Id_Client_societe']){
                    echo "<option value ='" . $leClient['Id_Client_societe'] . "' selected='selected'>" . $leClient['raison_social'] . " </option>";
                }else{
                    echo "<option value ='" . $leClient['Id_Client_societe'] . "'>" . $leClient['raison_social'] . " </option>";
                }
            }
            ?>
        </select>
        <p>
            Secteur d'activité
        </p>
        <select name='idSecteur' required>
            <?php
            foreach ($listesecteur as $secteur) {
                if($leContrat['Id_secteur_activite'] ==$secteur['Id_secteur_activite'] ){
                    echo "<option value ='" . $secteur['Id_secteur_activite'] . "' selected='selected'>" . $secteur['nom'] . " </option>";
                }else{
                    echo "<option value ='" . $secteur['Id_secteur_activite'] . "'>" . $secteur['nom'] . " </option>";
                }
            }
            ?>
        </select>
        <p>
            Liste des Sites :
        </p>
        <select name='idSite' required>
            <?php
            foreach ($lesSite as $site) {
                if($site['numero_sequentiel'] == $leContrat['numero_sequentiel']){
                    echo "<option value ='" . $site['numero_sequentiel'] . "' selected='selected'> Referent :" . $site['referent'] . " Adresse :".$site['adresse_site']." </option>";
                }else{
                echo "<option value ='" . $site['numero_sequentiel'] . "'> Referent :" . $site['referent'] . " Adresse :".$site['adresse_site']." </option>";
                }
            }
            ?>
        </select>
        <p>
        Responsable commercial :
        </p>
        <select name='id_salarie-commercial' required>
            <?php
            foreach ($listeCommerciale as $commerciale) {
                if($commerciale['Id_salarie'] == $leContrat['Id_salarie']){
                    echo "<option value ='" . $commerciale['Id_salarie'] . "' selected='selected'>" . $commerciale['name'] . " " . $commerciale['prenom'] . " Spécialité : " . $commerciale['nom_secteur'] . " </option>";
                }else{
                echo "<option value ='" . $commerciale['Id_salarie'] . "'>" . $commerciale['name'] . " " . $commerciale['prenom'] . " Spécialité : " . $commerciale['nom_secteur'] . " </option>";
                }
            }
            ?>
        </select>
        <p>
        Responsable Intervenant :
        </p>
        <select name='id_salarie_1-intervenant' required>
            <?php
            foreach ($listeintervenant as $intervenant) {
                if($intervenant['Id_salarie'] == $leContrat['Id_salarie_1']){
                    echo "<option value ='" . $intervenant['Id_salarie'] . "' selected='selected'>" . $intervenant['nom']. " " . $intervenant['prenom']. " Niveau d'étude " .$intervenant['niveau_etude'] . " Niveau d'anglais " . $intervenant['maitrise_anglais'] . " </option>";
                }else{
                echo "<option value ='" . $intervenant['Id_salarie'] . "'>" . $intervenant['nom']. " " . $intervenant['prenom']. " Niveau d'étude " .$intervenant['niveau_etude'] . " Niveau d'anglais " . $intervenant['maitrise_anglais'] . " </option>";
                }
            }
            ?>
        </select>
        <p>
         <input type="submit" value="Valider" name="valider">
      </p>
        </fieldset>
</form>