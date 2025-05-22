<?php if ($profil == 1 || $profil == 2) {
    if (count($listeDomaine) > 0) { ?>
        <table border=2 width="90%">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Famille</th>
                <th>ID Famille</th>
                <?php if ($profil == 1) { ?>
                    <th>MODIFIER</th>
                    <th>SUPPRIMER</th>
                <?php } ?>

            </tr>
            <h1>Liste des domaines techniques</h1>
            <p>

                <?php

                for ($i = 0; $i < count($listeDomaine); $i++) {
                    $nom_code = getFamilleById($listeDomaine[$i]['Id_famille'])['nom_code'];
                    ?>

                    <tr>
                        <td>
                            <?= $listeDomaine[$i]['Id_domaine_tech'] ?>
                        </td>
                        <td>
                            <?= $listeDomaine[$i]['libelle'] ?>
                        </td>
                        <td>
                            <?= $nom_code ?>
                        </td>
                        <td>
                            <?= $listeDomaine[$i]['Id_famille'] ?>
                        </td>

                        <?php if ($profil == 1) { ?>
                            <td>
                                <a href="./?&action=modifierDomaine&Id_domaine_tech=<?= $listeDomaine[$i]['Id_domaine_tech'] ?>"><img
                                        src="images/edit-button.png" alt="modifier" /></a>
                            </td>
                            <td>
                                <a href="./?action=supprimerDomaine&Id_domaine_tech=<?= $listeDomaine[$i]['Id_domaine_tech'] ?>"><img
                                        src="images/delete.png" alt="supprimer" /></a>
                            </td>
                        <?php } ?>
                    </tr>
                    <?php
                }
                ?>
        </table>
    <?php } else {

        $erreur = "Il n'y a pas de domaines techniques";
        $titre = "Gérer les domaines techniques";
        include "$racine/vue/v_erreur.php";
    } ?>

    <?php if (count($listeFamille) > 0 && $profil == 1) { ?>

        <br><a href="./?action=creerDomaine" class="bouton">Créer un Domaine</a><br>
    <?php } ?>

    <?php if (count($listeAssociation) > 0) { ?>
        <table border=2 width="90%">
            <tr>
                <th>ID Sur Domaine</th>
                <th>Sur Domaine</th>
                <th>ID Sous Domaine</th>
                <th>Sous Domaine</th>
                <?php if ($profil == 1) { ?>
                    <th>SUPPRIMER</th>
                <?php } ?>
            </tr>
            <h1>Liste des Sur Domaines</h1>
            <p>

                <?php

                for ($i = 0; $i < count($listeAssociation); $i++) {
                    $nom_code = getDomaineById($listeAssociation[$i]['Id_domaine_tech'])['libelle'];
                    $nom_code1 = getDomaineById($listeAssociation[$i]['Id_domaine_tech_1'])['libelle'];
                    ?>

                    <tr>
                        <td>
                            <?= $listeAssociation[$i]['Id_domaine_tech'] ?>
                        </td>
                        <td>
                            <?= $nom_code ?>
                        </td>
                        <td>
                            <?= $listeAssociation[$i]['Id_domaine_tech_1'] ?>
                        </td>
                        <td>
                            <?= $nom_code1 ?>
                        </td>
                        <?php if ($profil == 1) { ?>
                            <td>
                                <a
                                    href="./?action=supprimerSurDomaine&Id_domaine_tech=<?= $listeAssociation[$i]['Id_domaine_tech'] ?>&Id_domaine_tech_1=<?= $listeAssociation[$i]['Id_domaine_tech_1'] ?>"><img
                                        src="images/delete.png" alt="supprimer" /></a>
                            </td>
                        <?php } ?>
                    </tr>
                    <?php
                }
                ?>

        </table>
    <?php } else {

        $erreur = "Il n'y a pas d'association domaines techniques";
        $titre = "Gérer les domaines techniques";
        include "$racine/vue/v_erreur.php";
    } ?>
    <?php if (count($listeDomaine) > 1 && $profil == 1) { ?>
        <br><a href="./?action=associerSurDomaine" class="bouton">Associer un Domaine</a><br>
    <?php }
}

?>