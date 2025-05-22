<?php
include_once "bd.inc.php";
function getObjectif($ID){
    try{
        $cnx = connexionPDO();

        $req = $cnx->prepare("SELECT * FROM objectif WHERE objectif.Id_salarie=$ID");
        $req->execute();
        $resultat = $req->fetchALL(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function ajoutObjectif($ID, $ANNEE , $OBJECTIF){
    try{
        $cnx = connexionPDO();

        $req = $cnx->prepare("INSERT INTO objectif VALUES ($ID, $ANNEE, NULL, $OBJECTIF)");
        $resultat = $req->execute();
    }catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function ajoutCA($id, $ANNEE , $OBJECTIF, $CA){
    try{
        $cnx = connexionPDO();

        $req = $cnx->prepare("UPDATE objectif SET CA = $CA WHERE objectif.Id_salarie = $id AND annee = $ANNEE AND objectif_vente = $OBJECTIF");
        $resultat = $req->execute();
    }catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}