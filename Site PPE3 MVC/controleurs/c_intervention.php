<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.intervention.inc.php";
include_once "$racine/modele/bd.contrat.php";
include_once "$racine/modele/bd.domaine.php";
include_once "$racine/modele/bd.intervenant.inc.php";
include_once "$racine/modele/bd.salarie.inc.php";
// recuperation des donnees GET, POST, et SESSION
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
// Action Switch
include "$racine/vue/entete.html.php";
switch($action){

    case 'voirInterventions':
        $titre = "Liste Interventions";
        $lesInterventions = getInterventionsDetailed();
        include "$racine/vue/v_intervention.php";
        break;

    case 'voirInterventionsbyContrat':
        $titre = "Liste Interventions";
        $lesInterventions = getInterventionsByContratID($_REQUEST['idContrat']);
        $Contrat_intitule = getContratsbyID($_REQUEST['idContrat'])['intitule'];
        $erreur = "Liste des Intervention du Contrat ayant l'intitulé : " . $Contrat_intitule . "";
        include "$racine/vue/v_erreur.php";
        include "$racine/vue/v_intervention.php";
        break;

    case 'modifierIntervention':
        $titre = 'Modifier Intervention';
        $idintervention = $_REQUEST['intervention'];
        $leIntervention = getInterventionByid($idintervention);
        $contrats = getContrats();
        $lesdomaines = getDomaine();
        $etats = getEtat();
        include "$racine/vue/v_modifierIntervention.php";
        break;

    case 'confirmModifierIntervention':
        modifIntervention($_REQUEST['intervention'],$_REQUEST['intitule'],$_REQUEST['date_debut'], $_REQUEST['date_fin'],$_REQUEST['domaine_tech'],$_REQUEST['contrat'], $_REQUEST['etat']);

        $titre = 'Liste Intervention';
        $lesInterventions = getInterventionsDetailed();
        include "$racine/vue/v_intervention.php";
        break;

    case 'creerIntervention':
        $titre = 'Création Intervention';
        if($_SESSION['type'] == 2){
            $Intervenant = getSalarieById($_SESSION['idsalarie']);
        }
        if($_SESSION['type'] == 1){
            $lesIntervenants = GetLesIntervenant();
        }
        $lesInterventions = getInterventionsDetailed();
        $contrats = getContrats();
        $lesdomaines = getDomaine();
        $etats = getEtat();
        include "$racine/vue/v_creeIntervention.php";
        break;

    case 'confirmCreerIntervention':
        if($_SESSION['type'] == 1){
        creeIntervention($_REQUEST['Intervenant'],$_REQUEST['duree'],$_REQUEST['contrat'],$_REQUEST['intitule'],$_REQUEST['date_debut'],$_REQUEST['date_fin'],$_REQUEST['domaintech'],$_REQUEST['Etat']);
        }
        else if($_SESSION['type'] == 2){
        creeIntervention($_SESSION['idsalarie'],$_REQUEST['duree'],$_REQUEST['contrat'],$_REQUEST['intitule'],$_REQUEST['date_debut'],$_REQUEST['date_fin'],$_REQUEST['domaintech'],$_REQUEST['Etat']);
        }
        $titre = 'Liste Interventions';
        $lesInterventions = getInterventionsDetailed();
        include "$racine/vue/v_intervention.php";
        break;

    case 'supprimerIntervention':
        $erreur = supprimerInterventionEtAffectation($_REQUEST['intervention']);
        if($erreur == true){
            $erreur = 'Suppression Réussi';
        }
        if($erreur == false){
            $erreur = 'La suppresion echoué';
        }
        $titre = 'Liste Interventions';
        $lesInterventions = getInterventionsDetailed();
        include "$racine/vue/v_intervention.php";
        break;
}
include "$racine/vue/pied.html.php";
// appel du script de vue qui permet de gerer l'affichage des donnees
?>