<?php
include_once "bd.inc.php";
function GetSecteurActivites()
{
    try {

        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM secteur_activite");
        $req->execute();

        $LesSecteurActivites = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }

    return $LesSecteurActivites;
}

function GetSecteurActivitesByID($id)
{

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from secteur_activite where Id_secteur_activite=:id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function modifSecteurActivite($id, $nom)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("UPDATE secteur_activite SET nom='$nom' WHERE Id_secteur_activite =$id");
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $cnx;
}

function creerSecteurActivite($nom)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO secteur_activite VALUES(NULL, '$nom')");
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function supprimerSecteurActivite($id)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM secteur_activite WHERE Id_secteur_activite =$id");
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function estDejaPresentSecteurActivite($id)
{

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT count(*) from contrat 
        INNER JOIN commercial ON commercial.Id_secteur_activite = contrat.Id_secteur_activite 
        INNER JOIN secteur_activite ON secteur_activite.Id_secteur_activite = commercial.Id_secteur_activite 
        INNER JOIN client_societe ON client_societe.Id_secteur_activite = secteur_activite.Id_secteur_activite 
        WHERE secteur_activite.Id_secteur_activite = $id");

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}