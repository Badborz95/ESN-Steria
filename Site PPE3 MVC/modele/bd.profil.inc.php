<?php
include_once "bd.inc.php";
function getLesProfils()
{
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM `profil` ");
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

function getProfilbyId($id)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM profil WHERE Id_profil = " . $id . ";");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $ligne;
}

function checkPassword($mdp, $idprofil)
{
    try {
        $leProfil = getProfilbyId($idprofil);
        if ($mdp == $leProfil['mdp']) {
            $resultat = true;
        } else {
            $resultat = false;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function connexionAdmin($mdp, $idprofil)
{
    session_start();
    if(checkPassword($mdp, $idprofil) == true){
        $_SESSION['type'] = 1;
        $_SESSION['idprofil'] = $idprofil;
        $_SESSION['nom'] = 'admin';
        $_SESSION['libelle'] = 'Admin';
        $_SESSION['identifiant'] = 'admin';
        return true;
    }else{
        return false;
    }
}
function connexionIntervenant($mdp, $idprofil, $idsalarie)
{
    session_start();
    if(checkPassword($mdp, $idprofil) == true){
        $_SESSION['type'] = 2;
        $_SESSION['idprofil'] = $idprofil;

        $leSalarie = GetSalarie($idsalarie,"intervenant");
        $_SESSION['nom'] = $leSalarie['nom'];
        $_SESSION['prenom'] = $leSalarie['prenom'];
        $_SESSION['idsalarie'] = $idsalarie;
        $_SESSION['libelle'] = 'Intervenant';
        $_SESSION['identifiant'] = '1';
        return true;
    }else{
        return false;
    }
}
function connexionCommercial($mdp, $idprofil, $idsalarie)
{
    session_start();
    if(checkPassword($mdp, $idprofil) == true){
        $_SESSION['type'] = 3;
        $_SESSION['idprofil'] = $idprofil;
        $Salarie = GetSalarie($idsalarie,"commercial");
        $_SESSION['nom'] = $Salarie['nom'];
        $_SESSION['prenom'] = $Salarie['prenom'];
        $_SESSION['idsalarie'] = $idsalarie;
        $_SESSION['libelle'] = 'Commercial';
        $_SESSION['identifiant'] = '1';
        return true;
    }else{
        return false;
    }
}
function deconnexion(){
    try{
        session_start();
        return session_destroy();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}