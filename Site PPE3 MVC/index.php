<?php 
include "getRacine.php";
include "$racine/controleurs/controleurPrincipal.php";

if (isset($_GET["action"])) {
    $action = $_GET["action"];
} 
else {
    $action = "defaut";
}

$fichier = controleurPrincipal($action);
include "$racine/controleurs/$fichier";
?>