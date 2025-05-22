<?php
include_once "bd.inc.php";

function getContrats() {
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM contrat");
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

function getContratsbyIDSalarie($idsalarie) {
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM contrat WHERE Id_salarie = ".$idsalarie.";");
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

function getContratsbyIDClient($idClient) {
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM contrat WHERE Id_Client_societe = ".$idClient.";");
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

function getContratsbyID($id) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM contrat WHERE Id_contrat = ".$id.";");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $ligne;
}

function getContratsDetailed() {
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * , site.adresse as adresse_site , (SELECT nom from salarie where id_salarie = contrat.Id_salarie_1) as nom_inter,(SELECT prenom from salarie where id_salarie = contrat.Id_salarie_1) as prenom_inter , (SELECT prenom from salarie where id_salarie = contrat.Id_salarie) as prenom_com ,(SELECT nom from salarie where id_salarie = contrat.Id_salarie) as nom_com FROM `contrat` INNER JOIN secteur_activite on contrat.Id_secteur_activite = secteur_activite.Id_secteur_activite INNER JOIN client_societe on client_societe.Id_Client_societe = contrat.Id_Client_societe INNER JOIN site on site.numero_sequentiel = contrat.numero_sequentiel and site.Id_Client_societe = contrat.Id_Client_societe;");
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


function getContratsDetailedBySalarieID($idsalarie){
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * , site.adresse as adresse_site , (SELECT nom from salarie where id_salarie = contrat.Id_salarie_1) as nom_inter,(SELECT prenom from salarie where id_salarie = contrat.Id_salarie_1) as prenom_inter , (SELECT prenom from salarie where id_salarie = contrat.Id_salarie) as prenom_com ,(SELECT nom from salarie where id_salarie = contrat.Id_salarie) as nom_com FROM `contrat` INNER JOIN secteur_activite on contrat.Id_secteur_activite = secteur_activite.Id_secteur_activite INNER JOIN client_societe on client_societe.Id_Client_societe = contrat.Id_Client_societe INNER JOIN site on site.numero_sequentiel = contrat.numero_sequentiel and site.Id_Client_societe = contrat.Id_Client_societe WHERE Id_salarie = $idsalarie or Id_salarie_1 = $idsalarie;");
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

function delAllContratbyIdClient($idClient) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM contrat where Id_Client_societe = ".$idClient."");
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function delContratbyID($id){
    try {
        $cnx = connexionPDO();
        deleteAffectationByIdContrat($id);
        $req = $cnx->prepare("DELETE FROM interventions where Id_contrat = ".$id."");
        $resultat = $req->execute();
        $req = $cnx->prepare(" DELETE FROM contrat where Id_contrat = ".$id."");
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function creerContrat($budget,$nbjour,$intitule,$date_D,$date_F,$description,$idClient,$idSecteur,$idSite,$idSalariecommercial,$idSalarie1intervenant ){
    try{
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO `contrat` (`budget`, `nb_jour`, `intitule`, `date_debut`, `date_fin`, `description`, `Id_Client_societe`, `numero_sequentiel`, `id_salarie`, `Id_secteur_activite`, `Id_salarie_1`) VALUES ('".$budget."', '".$nbjour."','".$intitule."', '".$date_D."', '".$date_F."', '".$description."', '".$idClient."', '".$idSite."', '".$idSalariecommercial."', '".$idSecteur."', '".$idSalarie1intervenant."');");
        $resultat = $req->execute();
    }catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function updateContrat($idContrat,$budget,$nbjour,$intitule,$date_D,$date_F,$description,$idClient,$idSecteur,$idSite,$idSalariecommercial,$idSalarie1intervenant ){
    try{
        $cnx = connexionPDO();
        $req = $cnx->prepare("UPDATE`contrat` SET `budget` ='".$budget."' , `nb_jour`=  '".$nbjour."', `intitule`= '".$intitule."', `date_debut`= '".$date_D."', `date_fin`= '".$date_F."', `description`= '".$description."', `Id_Client_societe`=  '".$idClient."' , `numero_sequentiel`= '".$idSite."', `id_salarie`= '".$idSalariecommercial."', `Id_secteur_activite`= '".$idSecteur."', `Id_salarie_1`= '".$idSalarie1intervenant."'  where Id_contrat = ".$idContrat.";");
        $resultat = $req->execute();
    }catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
?>