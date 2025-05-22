<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.contrat.php";
include_once "$racine/modele/bd.intervenant.inc.php";
include_once "$racine/modele/bd.commercial.inc.php";
include_once "$racine/modele/bd.secteuractivite.inc.php";
include_once "$racine/modele/bd.client.php";
include_once "$racine/modele/bd.intervention.inc.php";
include_once "$racine/modele/bd.site.php";
$titre = "Gérer Contrat";
include "$racine/vue/entete.html.php";
if(isset($_SESSION['type'])){
$action = $_REQUEST['action'];
switch ($action) {
    case 'voirContrat':
        if($_SESSION['type'] == 2){
            $LesContrats = getContratsDetailedBySalarieID($_SESSION['idsalarie']);
        }else{
            $LesContrats = getContratsDetailed();
        }
        include "$racine/vue/v_contrat.php";
        break;
    case 'supprimerContrat':
        delContratbyID($_REQUEST['idContrat']);
        $LesContrats = getContratsDetailed();
        include "$racine/vue/v_contrat.php";
        break;
    case 'creerContrat': 
        $listeintervenant = GetLesIntervenant();
        $listeCommerciale = getLesCommercialDetailed();
        $listesecteur = GetSecteurActivites();
        $listeClient = getLesClients();
        $lesSite = getSites();
        include "$racine/vue/v_creerContrat.php";
        break;
    case 'modifierContrat':
        $leContrat = getContratsbyID($_REQUEST['idContrat']);

        $listeintervenant = GetLesIntervenant();
        $listeCommerciale = getLesCommercialDetailed();
        $listesecteur = GetSecteurActivites();
        $listeClient = getLesClients();
        $lesSite = getSites();
        include "$racine/vue/v_modifContrat.php";
        break;

    case 'confirmmodifierContrat':
        $budget = $_REQUEST['budget'];
        $nbjour = $_REQUEST['nb_jour'];
        $intitule = $_REQUEST['intitule'];
        $date_D = $_REQUEST['date_D'];
        $date_F = $_REQUEST['date_F'];
        $description = $_REQUEST['description'];
        $idClient = $_REQUEST['idClient'];
        $idSecteur = $_REQUEST['idSecteur'];
        $idSite = $_REQUEST['idSite'];
        $idSalariecommercial = $_REQUEST['id_salarie-commercial'];
        $idSalarie1intervenant = $_REQUEST['id_salarie_1-intervenant'];
        $idContrat = $_REQUEST['idContrat'];
        updateContrat($idContrat,$budget,$nbjour,$intitule,$date_D,$date_F,$description,$idClient,$idSecteur,$idSite,$idSalariecommercial,$idSalarie1intervenant );




        $LesContrats = getContratsDetailed();
        include "$racine/vue/v_contrat.php";
        break;
    case 'ConfirmCreerContrat':
        $budget = $_REQUEST['budget'];
        $nbjour = $_REQUEST['nb_jour'];
        $intitule = $_REQUEST['intitule'];
        $date_D = $_REQUEST['date_D'];
        $date_F = $_REQUEST['date_F'];
        $description = $_REQUEST['description'];
        $idClient = $_REQUEST['idClient'];
        $idSecteur = $_REQUEST['idSecteur'];
        $idSite = $_REQUEST['idSite'];
        $idSalariecommercial = $_REQUEST['id_salarie-commercial'];
        $idSalarie1intervenant = $_REQUEST['id_salarie_1-intervenant'];
        creerContrat($budget,$nbjour,$intitule,$date_D,$date_F,$description,$idClient,$idSecteur,$idSite,$idSalariecommercial,$idSalarie1intervenant );
        
        $titre = "Liste Contrat";
        $LesContrats = getContratsDetailed();
        include "$racine/vue/v_contrat.php";
        break;
}
}else{
    $erreur = 'Non connecté / pas la bonne habilitation';
    include "$racine/vue/v_erreur.php";
}
include "$racine/vue/pied.html.php";