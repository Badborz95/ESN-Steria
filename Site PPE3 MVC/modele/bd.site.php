<?php
include_once "bd.inc.php";
function getSites() {
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT *,site.adresse as adresse_site, client_societe.adresse as adresse_client FROM `site` INNER JOIN client_societe on client_societe.Id_Client_societe = site.Id_Client_societe");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getSitebyId($idCLi, $idSite){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT *,site.adresse as adresse_site, client_societe.adresse as adresse_client FROM `site` INNER JOIN client_societe on client_societe.Id_Client_societe = site.Id_Client_societe WHERE site.Id_Client_societe = ". $idCLi ." and site.numero_sequentiel = ".$idSite." ");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $ligne;
}

function getSitebyClient($idCLi){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT *,site.adresse as adresse_site, client_societe.adresse as adresse_client FROM `site` INNER JOIN client_societe on client_societe.Id_Client_societe = site.Id_Client_societe WHERE site.Id_Client_societe = ". $idCLi ." ");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $ligne;
}

function getMaxNumberSitebyClient($idCLi){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT MAX(numero_sequentiel) as max FROM `site` INNER JOIN client_societe on client_societe.Id_Client_societe = site.Id_Client_societe WHERE site.Id_Client_societe = ".$idCLi."");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $ligne;
}


function modifSite($idCli,$idSite,$referent,$nomsite,$adresse){
    try{
        $cnx = connexionPDO();

        $req = $cnx->prepare("UPDATE `site` SET referent = '".$referent."', site.nom = '".$nomsite."', adresse = '".$adresse."'  WHERE `site`.`Id_Client_societe` = ".$idCli." AND `site`.`numero_sequentiel` = ".$idSite.";");
        $resultat = $req->execute();
    }catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function autoIncrimentNumero($idCli){
    try{
        $number = 1;
        if(null != getSitebyClient($idCli)){
            $number += getMaxNumberSitebyClient($idCli)['max'];
        }
    }catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $number;
}

function creerSite($idCli,$referent,$nomsite,$adresse){
    try{
        $idsite = autoIncrimentNumero($idCli);
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO `site` (`Id_Client_societe`, `numero_sequentiel`, `referent`, `nom`, `adresse`) VALUES ('".$idCli."', '".$idsite."', '".$referent."', '".$nomsite."', '".$adresse."');");
        $resultat = $req->execute();
    }catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function delSite($idCli,$idSite){
        try{
            $cnx = connexionPDO();
            $req = $cnx->prepare("DELETE FROM site WHERE `site`.`Id_Client_societe` = ".$idCli." AND `site`.`numero_sequentiel` = ".$idSite."");
            $resultat = $req->execute();
        }catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
}

function delSitebyIdCli($idCli){
    try{
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM site WHERE `site`.`Id_Client_societe` = ".$idCli."");
        $resultat = $req->execute();
    }catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}