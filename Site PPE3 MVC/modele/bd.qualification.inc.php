<?php
include_once "bd.inc.php";

function getQualification($ID){
    try{
        $cnx = connexionPDO();

        $req = $cnx->prepare("SELECT * FROM qualification WHERE qualification.Id_salarie=$ID");
        $req->execute();
        $resultat = $req->fetchALL(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function ajoutQualification($id, $Id_domaine_tech){
    try{
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO `qualification` (`Id_salarie`, `Id_domaine_tech`) VALUES ($id, $Id_domaine_tech)");
        $req->execute();

    }catch(PDOException $e){
        print "Erreur !: ". $e->getMessage();
        die();
    }

}

function addPrix($id, $Id_domaine_tech, $prix){
    try{
        $cnx = connexionPDO();
        $req = $cnx->prepare("UPDATE qualification SET prix = $prix WHERE qualification.id_salarie = $id AND qualification.Id_domaine_tech = $Id_domaine_tech");
        $req->execute();

    }catch(PDOException $e){
        print "Erreur :! ". $e->getMessage();
        die();
    }
    return $req;
}

function delQualification($id, $Id_domaine_tech){
    try{
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM qualification WHERE qualification.id_salarie = $id AND qualification.Id_domaine_tech = $Id_domaine_tech");
        $req->execute();
    }catch(PDOException $e){
        print "Erreur :! ". $e->getMessage();
        die();
    }
    return $req;
}
