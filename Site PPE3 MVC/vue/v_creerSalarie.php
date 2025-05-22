<head>
	<script>
		function afficherOption() {
			var select = document.getElementById("maListe");
			var option1 = document.getElementById("commercial");
			var option2 = document.getElementById("intervenant");
					
			if (select.value === "commercial") {
				option1.style.display = "block";
				option2.style.display = "none";
			} else if (select.value === "intervenant") {
				option1.style.display = "none";
				option2.style.display = "block";
			}
		}
	</script>
</head>
<form method="POST" action="./?action=validationCreerSalarie">
   <fieldset>
     <legend>Créer une Salarié</legend>
		<p>
			<label for="nom" >Nom</label>
			<input type="text" name="nom" required>
		</p>
        <p>
			<label for="prenom" >Prenom</label>
			<input type="text" name="prenom" required>
		</p>
		<p>
			<label for="maListe">Fonction du salarié :</label>
			<select name="fonction" id="maListe" onchange="afficherOption()">
				<option value="commercial">Commercial</option>
				<option value="intervenant">Intervenant</option>
			</select>
			<div id="commercial" style="display: block;">
				<p>
					<label for="tel_fixe" >Numéro de téléphone fixe</label>
					<input type="tel" name="tel_fixe" >
				</p>
				<p>
					<label for="tel_portable" >Numéro de téléphone portable</label>
					<input type="tel" name="tel_portable" >
				</p>
				<p>
					<label>Le secteur d'activite</label>
					<select name="secteur_activite" id="secteur_activite">
						<?php 
						foreach($LesSecteurActivites AS $SecteurActivite){
						?>
							<option value="<?= $SecteurActivite["Id_secteur_activite"]?>"><?= $SecteurActivite["nom"]?></option>
						<?php
							}
						?>
					</select>
				</p>
			</div>
			<div id="intervenant" style="display: none;">
				<p>
					<label>Niveau d'étude</label>
					<select name="niveau_etude" id="niveau_etude">
						<option value="CAP, BEP">CAP, BEP</option>
						<option value="Baccalauréat">Baccalauréat</option>
						<option value="DEUG, BTS, DUT, DEUST">DEUG, BTS, DUT, DEUST</option>
						<option value="Licence, Licence LMD, licence professionnelle">Licence, Licence LMD, licence professionnelle</option>
						<option value="Maîtrise">Maîtrise</option>
						<option value="MasterDEA, DESS, diplôme d'ingénieur">Master, DEA, DESS, diplôme d'ingénieur</option>
						<option value="Doctorat, habilitation à diriger des recherches">Doctorat, habilitation à diriger des recherches</option>
					</select>
				</p>
				<p>
					<label>Niveau de maitrise de l'anglais</label>
					<select name="maitrise_anglais" id="maitrise_anglais">
						<option value="A1">A1</option>
						<option value="A2">A2</option>
						<option value="B1">B1</option>
						<option value="B2">B2</option>
						<option value="C1">C1</option>
						<option value="C2">C2</option>
					</select>
				</p>
			</div>
		</p>
        <p>
        <input type="submit" value="Valider" name="valider">
	</form>