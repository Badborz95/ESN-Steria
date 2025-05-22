<?php

include_once "bd.inc.php";
function getDomaine()
{
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from domaine_tech");
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
function getDomaineById($id_domaine_tech)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from domaine_tech where Id_domaine_tech =:Id_domaine_tech");
        $req->bindValue(':Id_domaine_tech', $id_domaine_tech, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
function delDomaine($id_domaine_tech)
{

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("delete from domaine_tech where Id_domaine_tech = :id_domaine_tech");
        $req->bindValue(':id_domaine_tech', $id_domaine_tech, PDO::PARAM_INT);

        $req->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $req;
}

function addDomaine($nom_code, $id_famille)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO domaine_tech (`Id_domaine_tech`, `libelle`, `Id_famille`) VALUES (NULL, :nom_code, :id_famille);");
        $req->bindValue(':nom_code', $nom_code, PDO::PARAM_STR);
        $req->bindValue(':id_famille', $id_famille, PDO::PARAM_INT);

        $req->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $req;
}

function modifDomaineById($nom_domaine, $Id_domaine_tech, $id_famille)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("UPDATE domaine_tech SET `libelle` = :nom_domaine, `Id_famille` = :id_famille WHERE `domaine_tech`.`Id_domaine_tech` = :Id_domaine_tech;");
        $req->bindValue(':nom_domaine', $nom_domaine, PDO::PARAM_STR);
        $req->bindValue(':id_famille', $id_famille, PDO::PARAM_INT);
        $req->bindValue(':Id_domaine_tech', $Id_domaine_tech, PDO::PARAM_INT);

        $req->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $req;
}


function associerDomaine($id_domaine_tech, $id_domaine_tech1)
{
    try {
        $cnx = connexionPDO();
        var_dump($id_domaine_tech,$id_domaine_tech1);
        $req = $cnx->prepare("INSERT INTO sur_domaine (`Id_domaine_tech`, `Id_domaine_tech_1`) VALUES (".$id_domaine_tech.", ".$id_domaine_tech1.")");

        $req->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $req;
}

function getAssociationDomaine()
{
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from sur_domaine");
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

function delSurDomaine($Id_domaine_tech, $Id_domaine_tech_1)
{

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("delete from sur_domaine where Id_domaine_tech = :id_domaine_tech AND Id_domaine_tech_1 = :Id_domaine_tech_1");
        $req->bindValue(':id_domaine_tech', $Id_domaine_tech, PDO::PARAM_INT);
        $req->bindValue(':Id_domaine_tech_1', $Id_domaine_tech_1, PDO::PARAM_INT);

        $req->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $req;
}



function estDejaAssocieDomaine($id_domaine_tech)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT COUNT(*) FROM sur_domaine WHERE id_domaine_tech = :id_domaine_tech OR Id_domaine_tech_1 = :id_domaine_tech");
        $req->bindValue(':id_domaine_tech', $id_domaine_tech, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetchColumn();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function estDejaAssocieSurDomaine($id_domaine_tech, $id_domaine_tech1)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT COUNT(*) FROM sur_domaine WHERE (Id_domaine_tech = $id_domaine_tech1 AND Id_domaine_tech_1 = $id_domaine_tech) OR (id_domaine_tech = $id_domaine_tech AND Id_domaine_tech_1 = $id_domaine_tech1)");
        $req->execute();

        $resultat = $req->fetchColumn();

    } catch (PDOException $e) {
        var_dump($id_domaine_tech,$id_domaine_tech1);
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getDomaineSalarie($id){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM `domaine_tech` WHERE Id_domaine_tech not in (SELECT Id_domaine_tech FROM qualification where qualification.Id_salarie = $id )");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: ". $e->getMessage();
        die();
    }
    return $resultat;
}
?>