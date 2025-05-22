<?php
include_once "$racine/modele/bd.domaine.php";
include_once "$racine/modele/bd.famille.php";

$listeDomaine = getDomaine();
$listeFamille = getFamille();
$listeAssociation = getAssociationDomaine();
$titre = "Gérer les domaines techniques";

switch ($action) {
    case "gererDomaine":
        include "$racine/vue/entete.html.php";
        $profil = $_SESSION["type"];
        if ($profil == 1 || $profil == 2) {
            include "$racine/vue/v_domaine.php";
        }else {
            $erreur = "Vous n'avez pas accès à cette page !";
            include "$racine/vue/v_erreur.php";
        }
        include "$racine/vue/pied.html.php";
        break;


    case "modifierDomaine":
        $titre = "Modifier un domaine";
        include "$racine/vue/entete.html.php";
        $profil = $_SESSION["type"];
        if ($profil == 1) {
            $id_domaine_tech = $_GET['Id_domaine_tech'];
            $libelle = getDomaineById($id_domaine_tech)['libelle'];
            $idfamille = getDomaineById($id_domaine_tech)['Id_famille'];
            $nom_famille = getFamilleById($idfamille)['nom_code'];
            include "$racine/vue/v_modifierdomaine.php";
        }else {
            $erreur = "Vous n'avez pas accès à cette page !";
            include "$racine/vue/v_erreur.php";
        }
        include "$racine/vue/pied.html.php";
        break;

    case "confirmModifierDomaine":
        include "$racine/vue/entete.html.php";
        $profil = $_SESSION["type"];
        if ($profil == 1) {
            $nom_domaine = $_POST['nomdomaine'];
            $Id_domaine_tech = $_GET["Id_domaine_tech"];
            $id_famille = $_POST['selectFamille'];
            modifDomaineById($nom_domaine, $Id_domaine_tech, $id_famille);
            header("Location: index.php?action=gererDomaine");
        }else {
            $erreur = "Vous n'avez pas accès à cette page !";
            include "$racine/vue/v_erreur.php";
        }
        break;

    case "supprimerDomaine":
        include "$racine/vue/entete.html.php";
        $profil = $_SESSION["type"];
        if ($profil == 1) {
            $id_domaine = $_GET["Id_domaine_tech"];
            if (estDejaAssocieDomaine($id_domaine) > 0) {
                include "$racine/vue/v_domaine.php";
                $erreur = " /!\ Vous ne pouvez pas supprimer ce domaine car il est associé avec un autre domaine (voir le tableau sur domaine au dessus) /!\ ";
                include "$racine/vue/v_erreur.php";
                include "$racine/vue/pied.html.php";
                break;
            } else {
                delDomaine($id_domaine);
                header("Location: index.php?action=gererDomaine");
                break;
            }
        }else {
            $erreur = "Vous n'avez pas accès à cette page !";
            include "$racine/vue/v_erreur.php";
            break;
        }


    case "supprimerSurDomaine":
        include "$racine/vue/entete.html.php";
        $profil = $_SESSION["type"];
        if ($profil == 1) {
            $Id_domaine_tech = $_GET["Id_domaine_tech"];
            $Id_domaine_tech_1 = $_GET["Id_domaine_tech_1"];
            delSurDomaine($Id_domaine_tech, $Id_domaine_tech_1);
            header("Location: index.php?action=gererDomaine");
        }else {
            $erreur = "Vous n'avez pas accès à cette page !";
            include "$racine/vue/v_erreur.php";
        }
        break;


    case "creerDomaine":

        $titre = "Créer un domaine";
        include "$racine/vue/entete.html.php";
        $profil = $_SESSION["type"];
        if ($profil == 1) {
            include "$racine/vue/v_creerDomaine.php";
        }else {
            $erreur = "Vous n'avez pas accès à cette page !";
            include "$racine/vue/v_erreur.php";
        }
        include "$racine/vue/pied.html.php";
        break;

    case "ajouterDomaine":
        include "$racine/vue/entete.html.php";
        $profil = $_SESSION["type"];
        if ($profil == 1) {
            $nom_code = $_POST['nomdomaine'];
            $id_famille = $_POST['selectFamille'];
            addDomaine($nom_code, $id_famille);
            $action = 'gererFamille';
            header("Location: index.php?action=gererDomaine");
        }else {
            $erreur = "Vous n'avez pas accès à cette page !";
            include "$racine/vue/v_erreur.php";
        }
        break;

    case "associerSurDomaine":
        $titre = "Associer un domaine";
        include "$racine/vue/entete.html.php";
        $profil = $_SESSION["type"];
        if ($profil == 1) {
            include "$racine/vue/v_associerSurDomaine.php";
        }else {
            $erreur = "Vous n'avez pas accès à cette page !";
            include "$racine/vue/v_erreur.php";
        }
        include "$racine/vue/pied.html.php";
        break;

    case "associerSousDomaine":
        $titre = "Associer un domaine";
        include "$racine/vue/entete.html.php";
        $profil = $_SESSION["type"];
        if ($profil == 1) {
            $id_domaine_tech1 = $_POST['selectSurDomaine'];
            include "$racine/vue/v_associerSousDomaine.php";
        }else {
            $erreur = "Vous n'avez pas accès à cette page !";
            include "$racine/vue/v_erreur.php";
        }
        include "$racine/vue/pied.html.php";
        break;

    case "confirmAssocierDomaine":
        include "$racine/vue/entete.html.php";
        $profil = $_SESSION["type"];
        if ($profil == 1) {
            $id_domaine_tech1 = $_POST['selectSousDomaine'];
            $id_domaine_tech2 = $_REQUEST['Id_domaine_tech'];
            $id_domaine_tech1 = intval($id_domaine_tech1);
            $id_domaine_tech2 = intval($id_domaine_tech2);
            if (estDejaAssocieSurDomaine($id_domaine_tech1, $id_domaine_tech2) != 0) {
                include "$racine/vue/v_domaine.php";
                $erreur = " /!\ Vous ne pouvez pas associer ces domaines, car le couple existe déjà /!\ ";
                include "$racine/vue/v_erreur.php";
                include "$racine/vue/pied.html.php";
                $action = 'gererDomaine';
                break;
            } else {
                var_dump($id_domaine_tech1, $id_domaine_tech2);
                associerDomaine($id_domaine_tech1, $id_domaine_tech2);
                $action = 'gererDomaine';
                header("Location: index.php?action=gererDomaine");
                break;
            }
        }else {
            $erreur = "Vous n'avez pas accès à cette page !";
            include "$racine/vue/v_erreur.php";
            break;
        }

}
?>