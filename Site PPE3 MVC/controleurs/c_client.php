<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.intervention.inc.php";
include_once "$racine/modele/bd.contrat.php";
include_once "$racine/modele/bd.site.php";
include_once "$racine/modele/bd.client.php";
include_once "$racine/modele/bd.secteuractivite.inc.php";
$titre = 'Gérer Client';
include "$racine/vue/entete.html.php";
if (isset($_SESSION['type'])) {
    if ($_SESSION['type'] == 1 or $_SESSION['type'] == 3) {
        $action = $_REQUEST['action'];
        switch ($action) {

            case 'voirClient':
                $LesClient = getLesClients();
                include "$racine/vue/v_client.php";
                break;

    case 'voirClientbySecteur':
        $titre = 'Liste Client par secteur';
        $idSecteur = $_REQUEST['id_Secteur'];
        $LesClient = getLesClientsbySecteur($idSecteur);
        include "$racine/vue/v_client.php";
        break;

            case 'modifierClient':
                $idClient = $_REQUEST['client'];
                $leClient = getLeClientbyId($idClient);
                $lesSecteurs = GetSecteurActivites();
                include "$racine/vue/v_modifierClient.php";
                break;

            case 'ConfirmmodifierClient':
                modifClient($_GET['client'], $_REQUEST['Raison'], $_REQUEST['Adresse'], $_REQUEST['idSecteur']);


                $LesClient = getLesClients();
                include "$racine/vue/v_client.php";
                break;

            case 'supprimerClient':

                $erreur = SupprimerClient($_REQUEST['client']);
                if ($erreur == 1) {
                    $erreur = 'Suppression Réussi';
                } else {
                    $erreur = 'Suppression échoué';
                }
                $LesClient = getLesClients();

                include "$racine/vue/v_erreur.php";
                include "$racine/vue/v_client.php";
                break;

            case 'creerClient':
                $lesSecteurs = GetSecteurActivites();

                include "$racine/vue/v_creerClient.php";

                break;

            case 'ConfirmCreerClient':
                CreerClient($_REQUEST['Raison'], $_REQUEST['Adresse'], $_REQUEST['idSecteur']);
                $LesClient = getLesClients();
                include "$racine/vue/v_client.php";
                break;
        }
    } else {
        $erreur = 'Non connecté / pas la bonne habilitation';
        include "$racine/vue/v_erreur.php";
    }
} else {
    $erreur = 'Non connecté / pas la bonne habilitation';
    include "$racine/vue/v_erreur.php";
}
include "$racine/vue/pied.html.php";
