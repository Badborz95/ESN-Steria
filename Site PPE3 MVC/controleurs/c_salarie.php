<?php
//FAIRE LA PARTIE DE LA QUALIFICATION DE L'INTERVENANT(MANQUE LA SUPPRESSION )
//ENLEVER DE LA LISTE DES ANNEES LES ANNEES DEJA SAISI POUR UN OBJECTIF 
include_once "$racine/modele/bd.salarie.inc.php";
include_once "$racine/modele/bd.secteuractivite.inc.php";
include_once "$racine/modele/bd.intervenant.inc.php";
include_once "$racine/modele/bd.commercial.inc.php";
include_once "$racine/modele/bd.objectif.inc.php";
include_once "$racine/modele/bd.qualification.inc.php";
include_once "$racine/modele/bd.domaine.php";

$action = $_GET['action'];
switch ($action) {
    case 'voirSalarie': {
            $titre = "Liste des Salariés";
            $lesSalaries = getLesSalaries();
            $lesIntervenants = getLesIntervenant();
            $lesCommercials = getLesCommercial();

            include "$racine/vue/entete.html.php";
            if (!$lesSalaries) {
                include "$racine/vue/v_salarie.php";
                $erreur = "Il n'y a pas de salariés";
                include "$racine/vue/v_erreur.php";
            } else {
                include "$racine/vue/v_salarie.php";
            }
            include "$racine/vue/pied.html.php";
            break;
        }
    case 'supprimerSalarie': {
            $titre = "Liste des Salariés";
            $salarie = $_REQUEST['salarie'];
            $job = getJob($salarie);
            SupprimerSalarie($salarie, $job);
            $lesSalaries = getLesSalaries();
            $lesIntervenants = getLesIntervenant();
            $lesCommercials = getLesCommercial();
            include "$racine/vue/entete.html.php";
            if (!$lesSalaries) {
                include "$racine/vue/v_salarie.php";
                $erreur = "Il n'y a pas de salariés";
                include "$racine/vue/v_erreur.php";
            } else {
                include "$racine/vue/v_salarie.php";
            }
            include "$racine/vue/pied.html.php";
            break;
        }
    case 'creerSalarie': {
            $titre = "Cration d'un Salarié";
            $LesSecteurActivites = GetSecteurActivites();
            include "$racine/vue/v_creerSalarie.php";
            break;
        }
    case 'validationCreerSalarie': {
            $titre = "Liste des Salariés";
            $nom = $_REQUEST['nom'];
            $prenom = $_REQUEST['prenom'];
            CreerSalarie($nom, $prenom);
            $fonction = $_REQUEST['fonction'];
            if ($fonction == "commercial") {
                $tel_fixe = $_REQUEST['tel_fixe'];
                $tel_portable = $_REQUEST['tel_portable'];
                $secteur_activite = $_REQUEST['secteur_activite'];
                CreerCommercial($nom, $prenom, $tel_fixe, $tel_portable, $secteur_activite);
            } elseif ($fonction == "intervenant") {
                $niveau_etude = $_REQUEST['niveau_etude'];
                $maitrise_anglais = $_REQUEST['maitrise_anglais'];
                CreerIntervenant($nom, $prenom, $niveau_etude, $maitrise_anglais);
            }
            $lesSalaries = getLesSalaries();
            $lesIntervenants = getLesIntervenant();
            $lesCommercials = getLesCommercial();
            include "$racine/vue/entete.html.php";
            if (!$lesSalaries) {
                include "$racine/vue/v_salarie.php";
                $erreur = "Il n'y a pas de salariés";
                include "$racine/vue/v_erreur.php";
            } else {
                include "$racine/vue/v_salarie.php";
            }
            include "$racine/vue/pied.html.php";
            break;
        }
    case 'modifierSalarie': {
            $titre = "Modification du Salarié";
            $id = $_REQUEST['salarie'];
            $job = getJob($id);
            $leSalarie = GetSalarie($id, $job);
            include "$racine/vue/entete.html.php";
            include "$racine/vue/v_modifierSalarie.php";
            include "$racine/vue/pied.html.php";
            break;
        }
    case 'validationModifierSalarie': {
            $titre = "Liste des Salariés";
            $id = $_REQUEST['salarie'];
            $nom = $_REQUEST['Nom'];
            $prenom = $_REQUEST['Prenom'];
            ModifierSalarie($id, $nom, $prenom);
            $lesSalaries = getLesSalaries();
            $lesIntervenants = getLesIntervenant();
            $lesCommercials = getLesCommercial();
            include "$racine/vue/entete.html.php";
            if (!$lesSalaries) {
                include "$racine/vue/v_salarie.php";
                $erreur = "Il n'y a pas de salariés";
                include "$racine/vue/v_erreur.php";
            } else {
                include "$racine/vue/v_salarie.php";
            }
            include "$racine/vue/pied.html.php";
            break;
        }
    case 'voirObjectifSalarie': {
            $titre = "Objectif du Commercial";
            $id = $_REQUEST['salarie'];
            $job = getJob($id);
            $salarie = GetSalarie($id, $job);
            $LesObjectifs = getObjectif($id);
            include "$racine/vue/entete.html.php";
            include "$racine/vue/v_objectifSalarie.php";
            include "$racine/vue/pied.html.php";
            break;
        }
    case 'ajouterObjectifAn': {
            $titre = "Création d'un Objectif du Commercial";
            $id = $_REQUEST['salarie'];
            include "$racine/vue/entete.html.php";
            include "$racine/vue/v_creerObjectifSalarie.php";
            include "$racine/vue/pied.html.php";
            break;
        }
    case 'confirmAjouterObjectifAn': {
            $titre = "Objectif du Commercial";
            $id = $_REQUEST['salarie'];
            $objectif_vente = $_REQUEST['objectif'];
            $annee = $_REQUEST['annee'];
            ajoutObjectif($id, $annee, $objectif_vente);
            $job = getJob($id);
            $salarie = GetSalarie($id, $job);
            $LesObjectifs = getObjectif($id);
            include "$racine/vue/entete.html.php";
            include "$racine/vue/v_objectifSalarie.php";
            include "$racine/vue/pied.html.php";
            break;
        }
    case 'ajouterCA': {
            $titre = "Ajout du CA du Commercial";
            $id = $_REQUEST['salarie'];
            $objectif = $_REQUEST['objectif'];
            $annee = $_REQUEST['annee'];
            include "$racine/vue/entete.html.php";
            include "$racine/vue/v_creerCA.php";
            include "$racine/vue/pied.html.php";
            break;
        }
    case 'confirmAjouterCA': {
            $titre = "Objectif du Commercial";
            $id = $_REQUEST['salarie'];
            $CA = $_REQUEST['CA'];
            $objectif_vente = $_REQUEST['objectif'];
            $annee = $_REQUEST['annee'];
            ajoutCA($id, $annee, $objectif_vente, $CA);
            $job = getJob($id);
            $salarie = GetSalarie($id, $job);
            $LesObjectifs = getObjectif($id);
            include "$racine/vue/entete.html.php";
            include "$racine/vue/v_objectifSalarie.php";
            include "$racine/vue/pied.html.php";
            break;
        }
    case 'voirQualification': {
            $titre = "Qualification de l'intervenant";
            $id = $_REQUEST['salarie'];
            $job = getJob($id);
            $salarie = GetSalarie($id, $job);
            $LesQualifications = getQualification($id);
            include "$racine/vue/entete.html.php";
            include "$racine/vue/v_qualificationSalarie.php";
            include "$racine/vue/pied.html.php";
            break;
        }
    case 'ajouterQualification': {
            $titre = "Création d'une qualification de l'Intervenant";
            $id = $_REQUEST['salarie'];
            $LesDomainestechniques = getDomaineSalarie($id);
            include "$racine/vue/entete.html.php";
            include "$racine/vue/v_creerQualificationSalarie.php";
            include "$racine/vue/pied.html.php";
            break;
        }
    case 'confirmQualification': {
            $titre = "Qualification de l'intervennant";
            $id = $_REQUEST['salarie'];
            $Id_domaine_tech = $_REQUEST['Id_domaine_tech'];
            ajoutQualification($id, $Id_domaine_tech);
            $job = getJob($id);
            $salarie = GetSalarie($id, $job);
            $LesQualifications = getQualification($id);
            include "$racine/vue/entete.html.php";
            include "$racine/vue/v_qualificationSalarie.php";
            include "$racine/vue/pied.html.php";
            break;
        }
    case 'ajouterPrix': {
            $titre = "Ajout du prix de la qualification de l'intervenant";
            $id = $_REQUEST['salarie'];
            $Id_domaine_tech = $_REQUEST['Id_domaine_tech'];
            include "$racine/vue/entete.html.php";
            include "$racine/vue/v_creerprix.php";
            include "$racine/vue/pied.html.php";
            break;
        }
    case 'confirmAjouterPrix': {
            $titre = "Qualification de l'intervenant";
            $id = $_REQUEST['salarie'];
            $prix = $_REQUEST['prix'];
            $Id_domaine_tech = $_REQUEST['Id_domaine_tech'];
            addPrix($id, $Id_domaine_tech, $prix);
            $job = getJob($id);
            $salarie = GetSalarie($id, $job);
            $LesQualifications = getQualification($id);
            include "$racine/vue/entete.html.php";
            include "$racine/vue/v_qualificationSalarie.php";
            include "$racine/vue/pied.html.php";
            break;
        }
    case 'modifierprix': {
//tedty,jhklklmj, 
    }
    case 'supprimerqualification': {
        $titre = "Qualification de l'intervenant";
        $id = $_REQUEST['salarie'];
        $Id_domaine_tech = $_REQUEST['Id_domaine_tech'];
        delQualification($id, $Id_domaine_tech);
        $job = getJob($id);
        $salarie = GetSalarie($id, $job);
        $LesQualifications = getQualification($id);
        include "$racine/vue/entete.html.php";
        include "$racine/vue/v_qualificationSalarie.php";
        include "$racine/vue/pied.html.php";
        break;
    }
}
