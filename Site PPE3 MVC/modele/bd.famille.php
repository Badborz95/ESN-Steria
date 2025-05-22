<?php

include_once "bd.inc.php";
function getFamille()
{
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from famille");
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

function getFamilleById($id_famille)
{

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from famille where Id_famille=:id_famille");
        $req->bindValue(':id_famille', $id_famille, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function delFamille($id_famille)
{

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("delete from famille where Id_famille =:id_famille");
        $req->bindValue(':id_famille', $id_famille, PDO::PARAM_INT);

        $req->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $req;
}

function addFamille($nom_code)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO famille (`Id_famille`, `nom_code`) VALUES (NULL, :nom_code);");
        $req->bindValue(':nom_code', $nom_code, PDO::PARAM_STR);

        $req->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $req;
}

function modifFamilleById($id_famille, $nom_code)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("UPDATE famille SET nom_code = :nom_code WHERE Id_famille = :id_famille");
        $req->bindValue(':id_famille', $id_famille, PDO::PARAM_INT);
        $req->bindValue(':nom_code', $nom_code, PDO::PARAM_STR);

        $req->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $req;
}

function estDejaAssocieFamille($id_famille)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT COUNT(*) FROM domaine_tech WHERE Id_famille = :id_famille");
        $req->bindValue(':id_famille', $id_famille, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetchColumn();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

?>