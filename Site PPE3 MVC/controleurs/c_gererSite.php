<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.site.php";
include_once "$racine/modele/bd.client.php";
$titre = 'Gérer Site';
include "$racine/vue/entete.html.php";
if(isset($_SESSION['type'])){
$action = $_REQUEST['action'];
switch ($action) {

    case 'voirSite':
        $LesSites = getSites();
        include "$racine/vue/v_site.php";
        break;

    case 'modifierSite':
        $leSite = getSitebyId($_REQUEST['client'], $_REQUEST['idsite']);
        $lesClient = getLesClients();
        include "$racine/vue/v_modifierSite.php";
        break;
    case 'confirmmodifierSite':
        modifSite($_REQUEST['idClient'], $_REQUEST['site'], $_REQUEST['referent'], $_REQUEST['nomsite'], $_REQUEST['adresse']);
        $LesSites = getSites();
        include "$racine/vue/v_site.php";
        break;

    case 'supprSite':
        delSite($_REQUEST['client'], $_REQUEST['idsite']);
        $lesClient = getLesClients();
        $LesSites = getSites();
        include "$racine/vue/v_site.php";
        break;

    case 'creerSite':
        $lesClient = getLesClients();
        include "$racine/vue/v_creerSite.php";
        break;

    case 'ConfirmCreerSite':
        creerSite($_REQUEST['idClient'], $_REQUEST['referent'], $_REQUEST['nomsite'], $_REQUEST['adresse']);
        $LesSites = getSites();
        include "$racine/vue/v_site.php";
        break;
}
}else{
    $erreur = 'Non connecté / pas la bonne habilitation';
    include "$racine/vue/v_erreur.php";
}
include "$racine/vue/pied.html.php";
