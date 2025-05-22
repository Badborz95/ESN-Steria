<?php
include_once "bd.inc.php";

function getInterventions(){
    try{
        $cnx = connexionPDO();
        $req = $cnx->prepare("Select * from interventions");
        $req ->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne){
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
function getEtat(){
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM etat");
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

function getInterventionsByContratID($Id_contrat){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT *, interventions.date_debut as date_D_inter, interventions.date_fin as date_F_inter , contrat.date_debut as date_D_contrat,contrat.date_fin as date_F_contrat,contrat.intitule as c_intitule, interventions.intitule as i_intitule
        FROM interventions
        INNER JOIN contrat on contrat.Id_contrat = interventions.Id_contrat
        INNER JOIN domaine_tech on domaine_tech.Id_domaine_tech = interventions.Id_domaine_tech
        INNER JOIN etat on etat.Id_etat = interventions.Id_etat
        WHERE interventions.Id_contrat = $Id_contrat");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getInterventionsDetailsbyIdSalarie($id){
    $resultat = array();
    try{
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT *,interventions.Id_interventions as i_id_intervention, interventions.date_debut as date_D_inter, interventions.date_fin as date_F_inter , contrat.date_debut as date_D_contrat,contrat.date_fin as date_F_contrat,contrat.intitule as c_intitule, interventions.intitule as i_intitule
        FROM interventions
        INNER JOIN contrat on contrat.Id_contrat = interventions.Id_contrat
        INNER JOIN domaine_tech on domaine_tech.Id_domaine_tech = interventions.Id_domaine_tech
        INNER JOIN etat on etat.Id_etat = interventions.Id_etat
        WHERE Id_salarie_1 = $id");
        $req ->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne){
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getInterventionByid($id){

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT *,interventions.Id_interventions as i_id_intervention, interventions.date_debut as date_D_inter, interventions.date_fin as date_F_inter , contrat.date_debut as date_D_contrat,contrat.date_fin as date_F_contrat,contrat.intitule as c_intitule, interventions.intitule as i_intitule
        FROM interventions
        INNER JOIN contrat on contrat.Id_contrat = interventions.Id_contrat
        INNER JOIN domaine_tech on domaine_tech.Id_domaine_tech = interventions.Id_domaine_tech
        INNER JOIN etat on etat.Id_etat = interventions.Id_etat 
        WHERE interventions.Id_interventions = $id");
        $req ->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $ligne;
}

function getInterventionsDetailed() {
    $resultat = array(); // Initialisation de la variable $resultat

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT *,interventions.Id_interventions as i_id_intervention, interventions.date_debut as date_D_inter, interventions.date_fin as date_F_inter , contrat.date_debut as date_D_contrat,contrat.date_fin as date_F_contrat,contrat.intitule as c_intitule, interventions.intitule as i_intitule
        FROM interventions
        INNER JOIN contrat on contrat.Id_contrat = interventions.Id_contrat
        INNER JOIN domaine_tech on domaine_tech.Id_domaine_tech = interventions.Id_domaine_tech
        INNER JOIN etat on etat.Id_etat = interventions.Id_etat");
        $req->execute();

        // Utilisation de fetchAll pour récupérer toutes les lignes
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Erreur !: " . $e->getMessage());
    } finally {
        // Fermeture de la connexion
        $cnx = null;
    }

    // Vérifier si $resultat est null, et renvoyer un tableau vide dans ce cas
    return $resultat !== null ? $resultat : array();
}


function InsererIntervention($id_contrat,$id_interventions,$intitule,$date_debut,$date_fin,$id_domaine_tech,$id_etat){
    $resultat = -1;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("insert into interventions (id_contrat,id_interventions,intitule,date_debut,date_fin,id_domaine_tech,id_etat) values(:id_contrat,:id_interventions,:intitule,:date_debut,:date_fin,:id_domaine_tech,:id_etat)");
        $req->bindValue(':id_contrat', $id_contrat, PDO::PARAM_INT);
        $req->bindValue(':id_interventions', $id_interventions, PDO::PARAM_INT);
        $req->bindValue(':intitule', $intitule, PDO::PARAM_STR);
        $req->bindValue(':date_debut', $date_debut, PDO::PARAM_INT);
        $req->bindValue(':date_fin', $date_fin, PDO::PARAM_INT);
        $req->bindValue(':id_domaine_tech', $id_domaine_tech, PDO::PARAM_INT);
        $req->bindValue(':id_etat', $id_etat, PDO::PARAM_INT);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function deleteAffectationByIdIntervention($id_interventions){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM affectation WHERE Id_interventions = $id_interventions");
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function deleteAffectationByIdContrat($id_contrat){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM affectation WHERE Id_contrat = $id_contrat");
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
function supprimerInterventionEtAffectation($id){
    try{
        $cnx = connexionPDO();

        $req = $cnx->prepare("Select * from interventions where Id_interventions = $id");
        $req->execute();
        $listinter = $req->fetchAll();
        foreach($listinter as $Inter){
            deleteAffectationByIdIntervention($Inter['Id_interventions']);
            $req = $cnx->prepare("DELETE FROM interventions WHERE Id_interventions ='".$Inter['Id_interventions']."'");
            $resultat = $req->execute();
        }
    }catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
function getAffectationbyIdintervention($id_int){
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM affectation WHERE Id_interventions = ".$id_int.";");
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

function modifIntervention($id, $intitule, $date_debut, $date_fin, $Id_domaine_tech, $Id_contrat, $Id_etat){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("UPDATE interventions SET Id_contrat = :Id_contrat, intitule = :intitule, date_debut = :date_debut, date_fin = :date_fin, Id_domaine_tech = :Id_domaine_tech, Id_etat = :Id_etat WHERE Id_interventions = :id");

        $req->bindParam(':Id_contrat', $Id_contrat);
        $req->bindParam(':intitule', $intitule);
        $req->bindParam(':date_debut', $date_debut);
        $req->bindParam(':date_fin', $date_fin);
        $req->bindParam(':Id_domaine_tech', $Id_domaine_tech);
        $req->bindParam(':Id_etat', $Id_etat);
        $req->bindParam(':id', $id);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
function creeIntervention($Id_salarie,$duree,$id_contrat, $intitule, $date_debut, $date_fin, $Id_domaine_tech, $Id_etat){
    try {
        $cnx = connexionPDO();
        $cnx->beginTransaction();  // Début de la transaction

         //Recuperer le id_interventions
         $stmt = $cnx->prepare("SELECT MAX(id_interventions) AS max_id FROM interventions");
         $stmt->execute();
         $result = $stmt->fetch(PDO::FETCH_ASSOC);
         $max_id = $result['max_id'];
 
         // Ajouter 1 pour obtenir le nouvel ID
         $new_id = $max_id + 1;

        // Première insertion
        $stmt = $cnx->prepare("INSERT INTO interventions VALUES (:Id_contrat,:new_id, :intitule, :date_debut, :date_fin, :Id_domaine_tech, :Id_etat)");
        $stmt->bindParam(':Id_contrat', $id_contrat);
        $stmt->bindParam(':new_id', $new_id);
        $stmt->bindParam(':intitule', $intitule);
        $stmt->bindParam(':date_debut', $date_debut);
        $stmt->bindParam(':date_fin', $date_fin);
        $stmt->bindParam(':Id_domaine_tech', $Id_domaine_tech);
        $stmt->bindParam(':Id_etat', $Id_etat);
        $resultat1 = $stmt->execute();
        
        // Deuxième insertion
        // Vous pouvez utiliser la même logique que la première insertion ou définir de nouvelles valeurs
        $stmt = $cnx->prepare("INSERT INTO affectation VALUES (:id_salarie, :Id_contrat,:new_id,:duree)");
        $stmt->bindParam(':id_salarie', $Id_salarie);
        $stmt->bindParam(':Id_contrat', $id_contrat);
        $stmt->bindParam(':new_id', $new_id);
        $stmt->bindParam(':duree', $duree);
        $resultat2 = $stmt->execute();

        // Valide la transaction si toutes les requêtes sont réussies
        $cnx->commit();
    } catch (PDOException $e) {
        $cnx->rollBack();  // Annule la transaction en cas d'erreur
        print "Erreur !: " . $e->getMessage();
        throw $e;  // Lève l'exception pour une gestion plus flexible au niveau supérieur
    }

    // Vous pouvez retourner un tableau de résultats ou autre selon vos besoins
    return [$resultat1, $resultat2];
}
?>