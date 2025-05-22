<?php
include_once "$racine/modele/bd.secteuractivite.inc.php";

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

$titre = "Gérer les secteurs d'activité";
$action=$_REQUEST['action'];
switch($action){

    case 'voirSecteurActivite': 
    {
        $lesSecteurActivites = GetSecteurActivites();
        include "$racine/vue/entete.html.php";
        include "$racine/vue/v_secteurActivite.php";
        include "$racine/vue/pied.html.php";
        break;
    }
    case 'modifierSecteurActivite':
    {
        $titre = "Modifier les secteurs d'activité";
        $id = $_REQUEST['id'];
        $nom = GetSecteurActivitesByID($id)["nom"];
        include "$racine/vue/entete.html.php";
        include "$racine/vue/v_modifierSecteurActivite.php";
        include "$racine/vue/pied.html.php";
        break;
    }
    case 'confirmmodifierSecteurActivite':
    {
        $id = $_REQUEST['id'];
        $nom = $_REQUEST['nom'];
        modifSecteurActivite($id, $nom);
        $lesSecteurActivites = GetSecteurActivites();
        include "$racine/vue/entete.html.php";
        include "$racine/vue/v_secteurActivite.php";
        include "$racine/vue/pied.html.php";
        break;
    }
    case 'creerSecteurActivite':
    {
        $titre = "Créer un secteur d'activité";
        include "$racine/vue/entete.html.php";
        include "$racine/vue/v_creerSecteurActivite.php";
        include "$racine/vue/pied.html.php";
        break;
    }
    case 'confirmcreerSecteurActivite':
    {
        $nom = $_REQUEST['nom'];
        creerSecteurActivite($nom);
        $lesSecteurActivites = GetSecteurActivites();
        include "$racine/vue/entete.html.php";
        include "$racine/vue/v_secteurActivite.php";
        include "$racine/vue/pied.html.php";
        break;
    }
    case 'supprimerSecteurActivite':
    {
        $lesSecteurActivites = GetSecteurActivites();
        $id = $_REQUEST['id'];
        $test = estDejaPresentSecteurActivite($id);
        if($test["count(*)"] > 0){
            include "$racine/vue/entete.html.php";
            include "$racine/vue/v_secteurActivite.php";
            $erreur = "/!\ Vous ne pouvez pas supprimer ce secteur d'activité car il est présent dans d'autres tables /!\ ";
            include "$racine/vue/v_erreur.php";
            include "$racine/vue/pied.html.php";
            break;
        }else{
            supprimerSecteurActivite($id);
            include "$racine/vue/entete.html.php";
            include "$racine/vue/v_secteurActivite.php";
            include "$racine/vue/pied.html.php";
            break;
        }

    }
}
