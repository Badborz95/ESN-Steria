<?php
include_once "$racine/modele/bd.famille.php";
        ?>


        <?php
        $listeFamille = getFamille();
        $titre = "Gérer les familles";
        switch ($action) {
            case "gererFamille":
                include "$racine/vue/entete.html.php";
                $profil = $_SESSION["type"];
                if ($profil == 1 || $profil == 2) {
                    include "$racine/vue/v_famille.php";
                }else {
                    $erreur = "Vous n'avez pas accès à cette page !";
                    include "$racine/vue/v_erreur.php";
                }
                include "$racine/vue/pied.html.php";
                break;

            case "modifierFamille":
                include "$racine/vue/entete.html.php";
                $profil = $_SESSION["type"];
                if ($profil == 1) {
                    $titre = "Modifier une famille";
                    $idfamille = $_GET['id_famille'];
                    $nom_code = getFamilleById($idfamille)['nom_code'];
                    include "$racine/vue/v_modifierfamille.php";
                }else {
                    $erreur = "Vous n'avez pas accès à cette page !";
                    include "$racine/vue/v_erreur.php";
                }
                include "$racine/vue/pied.html.php";

                break;

            case "confirmModifierFamille":
                include "$racine/vue/entete.html.php";
                $profil = $_SESSION["type"];
                if ($profil == 1) {
                    $nom_code = $_POST['nomfamille'];
                    $id_famille = $_GET["id_famille"];
                    $listeFamille = modifFamilleById($id_famille, $nom_code);
                    header("Location: index.php?action=gererFamille");
                }else {
                    $erreur = "Vous n'avez pas accès à cette page !";
                    include "$racine/vue/v_erreur.php";
                }
                break;

            case "supprimerFamille":
                include "$racine/vue/entete.html.php";
                $profil = $_SESSION["type"];
                if ($profil == 1) {
                    $id_famille = $_GET["id_famille"];
                    //Evite de supprimer une famille qui est déjà associé a un ou plusieurs domaines techniques (clé etrangère)
                    if (estDejaAssocieFamille($id_famille) > 0) {
                        include "$racine/vue/v_famille.php";
                        $erreur = "/!\ Vous ne pouvez pas supprimer cette famille car elle est associé à des domaines techniques /!\ ";
                        include "$racine/vue/v_erreur.php";
                        include "$racine/vue/pied.html.php";
                        break;
                    } else {
                        delFamille($id_famille);
                        header("Location: index.php?action=gererFamille");
                        break;
                    }
                }else {
                    $erreur = "Vous n'avez pas accès à cette page !";
                    include "$racine/vue/v_erreur.php";
                    break;
                }

            case "creerFamille":
                $titre = "Créer une famille";
                include "$racine/vue/entete.html.php";
                $profil = $_SESSION["type"];
                if ($profil == 1) {
                    include "$racine/vue/v_creerfamille.php";
                }else {
                    $erreur = "Vous n'avez pas accès à cette page !";
                    include "$racine/vue/v_erreur.php";
                }
                include "$racine/vue/pied.html.php";
                break;

            case "ajouterFamille":
                include "$racine/vue/entete.html.php";
                $profil = $_SESSION["type"];
                if ($profil == 1) {
                    $nom_code = $_POST['nomfamille'];
                    addFamille($nom_code);
                    $action = 'gererFamille';
                    header("Location: index.php?action=gererFamille");
                }else {
                    $erreur = "Vous n'avez pas accès à cette page !";
                    include "$racine/vue/v_erreur.php";
                }
                break;
        }
        ?>