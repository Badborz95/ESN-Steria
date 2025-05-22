
<?php
include_once "bd.inc.php";

function CreerIntervenant($nom, $prenom, $niveau_etude, $maitrise_anglais){
    try{

        $cnx1 = connexionPDO();
        $req1= $cnx1->prepare("SELECT * FROM salarie WHERE nom='$nom' AND prenom='$prenom'");
        $req1->execute();

        $salarie = $req1->fetch(PDO::FETCH_ASSOC);
        
        $Id_salarie = $salarie['Id_salarie'];

        $cnx2 = connexionPDO();
        $req2= $cnx2->prepare("INSERT INTO intervenant VALUES ($Id_salarie, '$niveau_etude', '$maitrise_anglais')");
        $req2->execute();

    } catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function GetIntervenant($id){
    try{

        $cnx = connexionPDO();
        $req= $cnx->prepare("SELECT * FROM intervenant WHERE intervenant.Id_salarie = $id");
        $req->execute();

        $intervenant = $req->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $intervenant;
}


function GetLesIntervenant(){
    try{

        $cnx = connexionPDO();
        $req= $cnx->prepare("SELECT *,intervenant.Id_salarie as i_Idsalarie FROM salarie INNER JOIN intervenant ON salarie.Id_salarie = intervenant.Id_salarie");
        $req->execute();

        $lesIntervenants = $req->fetchAll(PDO::FETCH_ASSOC);

    } catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    
    return $lesIntervenants;
}

function getIntervenantByidIntervention($idintervention) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("Select id_salarie_1 FROM interventions 
        INNER JOIN contrat on interventions.Id_contrat = contrat.Id_contrat
        where id_interventions = idintervention");
        $req->bindParam(':idintervention', $idintervention);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}