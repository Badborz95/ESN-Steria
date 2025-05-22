<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/modele/bd.profil.inc.php";
include_once "$racine/modele/bd.intervenant.inc.php";
include_once "$racine/modele/bd.commercial.inc.php";
include_once "$racine/modele/bd.salarie.inc.php";


$action = $_REQUEST['action'];
switch ($action) {
    case 'voirEspacePersonnel':
        $titre = "Espace Personnel";
        include "$racine/vue/entete.html.php";
        if (!isset($_SESSION['type'])) {
            $erreur = 'Non connecté';
            include "$racine/vue/v_erreur.php";
            include "$racine/vue/pied.html.php";
            break;
        }
        $erreur = "Bienvenue " . $_SESSION['libelle'] . " " . $_SESSION['nom'] . "";
        include "$racine/vue/v_erreur.php";
        include "$racine/vue/v_espacePersonnel.php";
        include "$racine/vue/pied.html.php";
        break;
    case 'connexion':
        $listProfil = getLesProfils();
        $titre = "Connexion";
        include "$racine/vue/entete.html.php";
        include "$racine/vue/v_connexion.php";
        include "$racine/vue/pied.html.php";
        break;

    case 'confirmConnexion1':
        $profil = $_REQUEST['idprofil'];
        $titre = "Connexion";
        if ($profil == 2) {
            $listsalarie = GetLesIntervenant();
        }
        if ($profil == 3) {
            $listsalarie = getLesCommercialDetailed();
        }
        include "$racine/vue/entete.html.php";
        include "$racine/vue/v_connexion.php";
        include "$racine/vue/pied.html.php";
        break;

    case 'confirmConnexion2':
        $session = true;
        if ($_REQUEST['profil'] == 1) {
            if (connexionAdmin($_REQUEST['mdp'], $_REQUEST['profil']) == true) {
                $titre = "Espace Personnel";
                $erreur = 'connexion réussi';
                include "$racine/vue/entete.html.php";
                include "$racine/vue/v_erreur.php";
                include "$racine/vue/v_espacePersonnel.php";
                include "$racine/vue/pied.html.php";
                break;
            } else {
                $titre = "Erreur";
                $erreur = 'connexion échoué (pas le bon mdp)';
                include "$racine/vue/entete.html.php";
                include "$racine/vue/v_erreur.php";
                include "$racine/vue/pied.html.php";
                break;
            }
        }
        if ($_REQUEST['profil'] == 2) {
            if (connexionIntervenant($_REQUEST['mdp'], $_REQUEST['profil'], $_REQUEST['idsalarie']) == true) {;
                $titre = "Espace Personnel";
                $erreur = 'connexion réussi';
                include "$racine/vue/entete.html.php";
                include "$racine/vue/v_erreur.php";
                include "$racine/vue/v_espacePersonnel.php";
                include "$racine/vue/pied.html.php";
                break;
            } else {
                $titre = "Erreur";
                $erreur = 'connexion échoué (pas le bon mdp)';
                include "$racine/vue/entete.html.php";
                include "$racine/vue/v_erreur.php";
                include "$racine/vue/pied.html.php";
                break;
            }
        }
        if ($_REQUEST['profil'] == 3) {
            if (connexionCommercial($_REQUEST['mdp'], $_REQUEST['profil'], $_REQUEST['idsalarie']) == true) {;
                $titre = "Espace Personnel";
                $erreur = 'connexion réussi';
                include "$racine/vue/entete.html.php";
                include "$racine/vue/v_erreur.php";
                include "$racine/vue/v_espacePersonnel.php";
                include "$racine/vue/pied.html.php";
                break;
            } else {
                $titre = "Erreur";
                $erreur = 'connexion échoué (pas le bon mdp)';
                include "$racine/vue/entete.html.php";
                include "$racine/vue/v_erreur.php";
                include "$racine/vue/pied.html.php";
                break;
            }
        }

        include "$racine/vue/v_connexion.php";
        include "$racine/vue/pied.html.php";
        break;

    case 'deconnexion':
        if (deconnexion() == true) {
            $erreur = "Déconnexion réussi";
        } else {
            $erreur = "Déconnexion échoué";
        }
        $titre = 'Accueil';
        include "$racine/vue/entete.html.php";
        include "$racine/vue/v_erreur.php";
        include "$racine/vue/v_accueil.php";
        include "$racine/vue/pied.html.php";
        break;
}
