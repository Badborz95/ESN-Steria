<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Titre</title>
    <style type="text/css">
        @import url("css/creeintervention.css");
    </style>
</head>
<body>

<?php
if ($_SESSION['type'] == 2) {
    echo "<br/><br/><h1>{$Intervenant['nom']} {$Intervenant['prenom']}</h1>";
}
?>

<form method="POST" action="./?action=confirmCreerIntervention" class="d-flex">
    <?php if ($_SESSION['type'] == 1) { ?>
        <div class="form-inline col-md-6">
            <label for="Intervenant">Intervenant</label>
            <select id="Intervenant" name="Intervenant" class="form-control" required>
                <option selected>Les intervenants...</option>
                <?php foreach ($lesIntervenants as $Intervenant) {
                    echo "<option value='{$Intervenant['i_Idsalarie']}'>{$Intervenant['nom']}</option>";
                } ?>
            </select>
        </div>
    <?php } ?>
    <div class="form-inline col-md-6 mb-3">
        <div class="form-group col-auto">
            <label for="intitule">Intitule</label>
            <input type="text" class="form-control" id="intitule" name="intitule" placeholder="Intitule" required>
        </div>
        <div class="form-group col-auto">
            <label for="date_debut">Date Début</label>
            <input type="date" class="form-control" id="date_debut" name="date_debut" placeholder="Date Début" required>
        </div>
        <div class="form-group col-auto">
            <label for="date_fin">Date Fin</label>
            <input type="date" class="form-control" id="date_fin" name="date_fin" placeholder="Date Fin" required>
        </div>
        <div class="form-inline col-md-6 mb-3">
            <div class="form-group col-auto">
                <label for="duree">Duree:</label>
                <input type="text" class="form-control" id="duree" name="duree" placeholder="Duree en J" required>
            </div>
        </div>
        <div class="form-row col-auto">
            <div class="form-group col-auto">
                <label for="domaintech">Domaine Technologique</label>
                <select id="domaintech" name="domaintech" class="form-control" required>
                    <option selected>Domaine Technologique...</option>
                    <?php foreach ($lesdomaines as $domaine) {
                        echo "<option value='{$domaine['Id_domaine_tech']}'>{$domaine['libelle']}</option>";
                    } ?>
                </select>
            </div>
            <div class="form-group col-auto">
                <label for="contrat">Contrats</label>
                <select id="contrat" name="contrat" class="form-control" required>
                    <option selected>Contrats...</option>
                    <?php foreach ($contrats as $contrat) {
                        echo "<option value='{$contrat['Id_contrat']}'>{$contrat['intitule']}</option>";
                    } ?>
                </select>
            </div>
            <div class="form-group col-auto">
                <label for="Etat">Etat d'intervention</label>
                <select id="Etat" name="Etat" class="form-control" required>
                    <option selected>Etat d'intervention...</option>
                    <?php foreach ($etats as $etat) {
                        echo "<option value='{$etat['Id_etat']}'>{$etat['nom']}</option>";
                    } ?>
                </select>
            </div>
        </div>
        <div class="Bouttons">
            <button type="reset" class="btn btn-primary annuler">Annuler</button>
            <button type="submit" class="btn btn-primary confirmer">Confirmer</button>
        </div>
    </div>
</form>

</body>
</html>
