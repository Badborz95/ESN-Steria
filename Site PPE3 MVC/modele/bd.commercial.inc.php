
<?php
include_once "bd.inc.php";

function CreerCommercial($nom, $prenom, $tel_fixe, $tel_portable, $secteur_activite){
    try{

        $cnx1 = connexionPDO();
        $req1= $cnx1->prepare("SELECT * FROM salarie WHERE nom='$nom' AND prenom='$prenom'");
        $req1->execute();

        $salarie = $req1->fetch(PDO::FETCH_ASSOC);
        
        $Id_salarie = $salarie['Id_salarie'];

        $cnx2 = connexionPDO();
        $req2= $cnx2->prepare("INSERT INTO commercial VALUES ($Id_salarie, $tel_fixe, $tel_portable, $secteur_activite)");
        $req2->execute();

    } catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function GetCommercial($ID){
    try{

        $cnx = connexionPDO();
        $req= $cnx->prepare("SELECT * FROM commercial WHERE commercial.Id_salarie = $ID");
        $req->execute();

        $commercial = $req->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $commercial;
}

function getLesCommercialDetailed(){
    try{
        $cnx = connexionPDO();
        $req= $cnx->prepare("SELECT * , secteur_activite.nom  as nom_secteur , salarie.nom as name FROM commercial INNER JOIN salarie on salarie.Id_salarie = commercial.Id_salarie INNER JOIN secteur_activite on secteur_activite.Id_secteur_activite = commercial.Id_secteur_activite");
        $req->execute();

        $lesCommercials = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $lesCommercials;
}