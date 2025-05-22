<?php

function controleurPrincipal($action)
{
    $lesActions = array();
    $lesActions["defaut"] = "c_accueil.php";
    $lesActions["voirEspacePersonnel"] = "c_espacePersonnel.php";
    $lesActions["connexion"] = "c_espacePersonnel.php";
    $lesActions["confirmConnexion1"] = "c_espacePersonnel.php";
    $lesActions["confirmConnexion2"] = "c_espacePersonnel.php";
    $lesActions["deconnexion"] = "c_espacePersonnel.php";
    /*ACTION POUR C_SALARIE*/
    $lesActions["voirSalarie"] = "c_salarie.php";
    $lesActions["supprimerSalarie"] = "c_salarie.php";
    $lesActions["creerSalarie"] = "c_salarie.php";
    $lesActions["modifierSalarie"] = "c_salarie.php";
    $lesActions["validationCreerSalarie"] = "c_salarie.php";
    $lesActions["validationModifierSalarie"] = "c_salarie.php";
    $lesActions["voirObjectifSalarie"] = "c_salarie.php";
    $lesActions["ajouterObjectifAn"] = "c_salarie.php";
    $lesActions["confirmAjouterObjectifAn"] = "c_salarie.php";
    $lesActions["ajouterCA"] = "c_salarie.php";
    $lesActions["confirmAjouterCA"] = "c_salarie.php";
    $lesActions["voirQualification"] = "c_salarie.php";
    $lesActions["ajouterQualification"] = "c_salarie.php";
    $lesActions["confirmQualification"] = "c_salarie.php";
    $lesActions["ajouterPrix"] = "c_salarie.php";
    $lesActions["confirmAjouterPrix"] = "c_salarie.php";
    $lesActions["modifierprix"] = "c_salarie.php";
    $lesActions["confirmmodifierprix"] = "c_salarie.php";
    $lesActions["supprimerqualification"] = "c_salarie.php";
    /*ACTION POUR C_FAMILLE*/
    $lesActions["gererFamille"] = "c_gererFamille.php";
    $lesActions["creerFamille"] = "c_gererFamille.php";
    $lesActions["ajouterFamille"] = "c_gererFamille.php";
    $lesActions["supprimerFamille"] = "c_gererFamille.php";
    $lesActions["modifierFamille"] = "c_gererFamille.php";
    $lesActions["confirmModifierFamille"] = "c_gererFamille.php";
    /*ACTION POUR C_INTERVENTION*/
    $lesActions["voirInterventions"] = "c_intervention.php";
    $lesActions["voirInterventionsbyContrat"] = "c_intervention.php";
    $lesActions["modifierIntervention"] = "c_intervention.php";
    $lesActions["confirmModifierIntervention"] = "c_intervention.php";
    $lesActions["creerIntervention"] = "c_intervention.php";
    $lesActions["confirmCreerIntervention"] = "c_intervention.php";
    $lesActions["supprimerIntervention"] = "c_intervention.php";
    /*ACTION Pour C_SECTEURActivité*/
    $lesActions["voirSecteurActivite"] = "c_gererSecteurActivite.php";
    $lesActions["supprimerSecteurActivite"] = "c_gererSecteurActivite.php";
    $lesActions["creerSecteurActivite"] = "c_gererSecteurActivite.php";
    $lesActions["modifierSecteurActivite"] = "c_gererSecteurActivite.php";
    $lesActions["confirmcreerSecteurActivite"] = "c_gererSecteurActivite.php";
    $lesActions["confirmmodifierSecteurActivite"] = "c_gererSecteurActivite.php";
    /*ACTION POUR C_CLIENT */
    $lesActions["voirClient"] = "c_client.php";
    $lesActions["voirClientbySecteur"] = "c_client.php";
    $lesActions["supprimerClient"] = "c_client.php";
    $lesActions["creerClient"] = "c_client.php";
    $lesActions["modifierClient"] = "c_client.php";
    $lesActions["ConfirmmodifierClient"] = "c_client.php";
    $lesActions["ConfirmCreerClient"] = "c_client.php";
    /*ACTION POUR C_SITE*/
    $lesActions["voirSite"] = "c_gererSite.php";
    $lesActions["supprSite"] = "c_gererSite.php";
    $lesActions["creerSite"] = "c_gererSite.php";
    $lesActions["modifierSite"] = "c_gererSite.php";
    $lesActions["confirmmodifierSite"] = "c_gererSite.php";
    $lesActions["ConfirmCreerSite"] = "c_gererSite.php";

    /*ACTION POUR C_DOMAINE*/
    $lesActions["gererDomaine"] = "c_gererDomaine.php";
    $lesActions["supprimerDomaine"] = "c_gererDomaine.php";
    $lesActions["creerDomaine"] = "c_gererDomaine.php";
    $lesActions["ajouterDomaine"] = "c_gererDomaine.php";
    $lesActions["modifierDomaine"] = "c_gererDomaine.php";
    $lesActions["confirmModifierDomaine"] = "c_gererDomaine.php";
    $lesActions["associerSurDomaine"] = "c_gererDomaine.php";
    $lesActions["associerSousDomaine"] = "c_gererDomaine.php";
    $lesActions["confirmAssocierDomaine"] = "c_gererDomaine.php";
    $lesActions["supprimerSurDomaine"] = "c_gererDomaine.php";

    /* ACTION POUR C_CONTRAT */
    $lesActions["voirContrat"] = "c_gererContrat.php";
    $lesActions["supprimerContrat"] = "c_gererContrat.php";
    $lesActions["creerContrat"] = "c_gererContrat.php";
    $lesActions["modifierContrat"] = "c_gererContrat.php";
    $lesActions["confirmmodifierContrat"] = "c_gererContrat.php";
    $lesActions["ConfirmCreerContrat"] = "c_gererContrat.php";
    
    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } else {
        return $lesActions["defaut"];
    }
}
