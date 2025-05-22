<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
$titre = "Accueil";
include "$racine/vue/entete.html.php";
include "$racine/vue/v_accueil.php";
include "$racine/vue/pied.html.php";
