<?php
include_once "bd.inc.php";
function getLesClients(){

    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM `client_societe` INNER JOIN secteur_activite ON secteur_activite.Id_secteur_activite = client_societe.Id_secteur_activite ");
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

function getLesClientsbySecteur($idSecteur){
    
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM `client_societe` INNER JOIN secteur_activite ON secteur_activite.Id_secteur_activite = client_societe.Id_secteur_activite Where client_societe.Id_secteur_activite = :idsecteur ");
        $req->bindValue(':idsecteur', $idSecteur, PDO::PARAM_INT);
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

function getLeClientbyId($idClient){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM `client_societe` INNER JOIN secteur_activite ON secteur_activite.Id_secteur_activite = client_societe.Id_secteur_activite Where client_societe.Id_Client_societe = :idclient ");
        $req->bindValue(':idclient', $idClient, PDO::PARAM_INT);
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $ligne;
}
function modifClient($id,$raison,$adresse,$idSecteur){
        try{
            $cnx = connexionPDO();
    
            $req = $cnx->prepare("UPDATE client_societe SET raison_social = '$raison', adresse = '$adresse' , Id_secteur_activite = '$idSecteur' WHERE Id_Client_societe ='$id'");
            
            $resultat = $req->execute();
        }catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    
}
function SupprimerClient($id){
    try{


        $cnx = connexionPDO();

        

        $listContrat = getContratsbyIDClient($id);
        foreach($listContrat as $leContrat){
            deleteAffectationByIdContrat($leContrat['Id_contrat']);
            $req = $cnx->prepare("DELETE FROM interventions WHERE Id_contrat='".$leContrat['Id_contrat']."'");
            $resultat = $req->execute();
        }

        delAllContratbyIdClient($id);
        delSitebyIdCli($id);

        $req = $cnx->prepare("DELETE FROM client_societe WHERE Id_Client_societe='$id'");
        $resultat = $req->execute();
    }catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function CreerClient($raison, $adresse,$idSecteur){
    try{
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO client_societe VALUES (NULL,'$raison','$adresse','$idSecteur')");
        
        $resultat = $req->execute();
    }catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getAllContratCLient($id){
    
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM `contrat` Where contrat.Id_Client_societe = :idclient ");
        $req->bindValue(':idclient', $id, PDO::PARAM_INT);
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


