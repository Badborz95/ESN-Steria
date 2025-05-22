<?php
include_once "bd.inc.php";

function GetLesSalaries() {
    try{

        $cnx = connexionPDO();
        $req= $cnx->prepare("SELECT * FROM salarie");
        $req->execute();

        $lesSalaries = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    
    return $lesSalaries;
}

function getLesCommercial(){
    try{

        $cnx = connexionPDO();
        $req= $cnx->prepare("SELECT * FROM salarie INNER JOIN commercial ON salarie.Id_salarie = commercial.Id_salarie");
        $req->execute();

        $lesCommercials = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    
    return $lesCommercials;
}

function GetSalarie($ID ,$job){
    try{
        $cnx = connexionPDO();

        if($job=="commercial")
        {
            $req = $cnx->prepare("SELECT * FROM salarie INNER JOIN commercial ON salarie.Id_salarie = commercial.Id_salarie WHERE salarie.Id_salarie = $ID");
            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        }
        elseif ($job=="intervenant") 
        {
            $req = $cnx->prepare("SELECT * FROM salarie INNER JOIN intervenant ON salarie.Id_salarie = intervenant.Id_salarie WHERE salarie.Id_salarie = $ID");
            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        }
        else
        {
            $req = $cnx->prepare("SELECT * FROM salarie WHERE salarie.Id_salarie = $ID");
            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        }
    }catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getSalarieById($ID){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM salarie WHERE Id_salarie = :id");
        $req->bindParam(':id', $ID);
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);  // Utilisation de fetch pour récupérer une seule ligne
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function CreerSalarie($nom, $prenom){
    try{
        $cnx = connexionPDO();

        $req = $cnx->prepare("INSERT INTO salarie VALUES(NULL,'$nom','$prenom')");
        
        $resultat = $req->execute();
    }catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
function getJob($ID){
    try{
        $cnx = connexionPDO();
        $reqtest1 = $cnx->prepare("SELECT Id_salarie FROM commercial WHERE commercial.Id_salarie=$ID");
        $reqtest1->execute();
        $resultattest1 = $reqtest1->fetch();
        $reqtest2 = $cnx->prepare("SELECT Id_salarie FROM intervenant WHERE intervenant.Id_salarie=$ID");
        $reqtest2->execute();
        $resultattest2 = $reqtest2->fetch();
        if($resultattest1 != FALSE)
        {
            $resultat = "commercial";
        }
        elseif($resultattest2 != FALSE)
        {
            $resultat = "intervenant";
        }
        else
        {
            $resultat = "noJob";
        }
    }catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
function SupprimerSalarie($ID, $job){
    try{
        $cnx = connexionPDO();

        $reqa = $cnx->prepare("DELETE FROM affectation WHERE affectation.Id_salarie = $ID");
        $resultat = $reqa->execute();
        
        if($job=="commercial")
        {
            $reqa = $cnx->prepare("DELETE FROM contrat WHERE contrat.Id_salarie = $ID");
            $resultat = $reqa->execute();

            $reqca = $cnx->prepare("DELETE FROM objectif WHERE objectif.Id_salarie=$ID");
            $resultat = $reqca->execute();

            $reqjob = $cnx->prepare("DELETE FROM commercial WHERE commercial.Id_salarie=$ID");
            $resultat = $reqjob->execute();
        }
        elseif ($job=="intervenant") 
        {
            $reqs = $cnx->prepare("SELECT Id_contrat FROM contrat WHERE contrat.Id_salarie_1 = $ID");
            $reqs->execute();
            $resultat = $reqs->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultat as $r){
                var_dump($r);
                $reqi = $cnx->prepare("DELETE FROM interventions WHERE interventions.Id_contrat = ".$r['Id_contrat']."");
                $reqi->execute();
            }

            $reqa = $cnx->prepare("DELETE FROM affectation WHERE affectation.Id_salarie = $ID");
            $resultat = $reqa->execute();

            $reqa = $cnx->prepare("DELETE FROM contrat WHERE contrat.Id_salarie_1 = $ID");
            $resultat = $reqa->execute();

            $reqca = $cnx->prepare("DELETE FROM qualification WHERE qualification.Id_salarie=$ID");
            $resultat = $reqca->execute();

            $reqjob = $cnx->prepare("DELETE FROM intervenant WHERE intervenant.Id_salarie=$ID");
            $resultat = $reqjob->execute();
        }

        $req = $cnx->prepare("DELETE FROM salarie WHERE salarie.Id_salarie=$ID");
        $resultat = $req->execute();
    }catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
function ModifierSalarie($ID, $nom, $prenom){
    try{
        $cnx = connexionPDO();

        $req = $cnx->prepare("UPDATE salarie SET nom = '$nom', prenom = '$prenom' WHERE salarie.Id_salarie ='$ID'");
        
        $resultat = $req->execute();
    }catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}