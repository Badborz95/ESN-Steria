<?php if ($profil == 1 || $profil == 2) {
    if (count($listeFamille) > 0 && $profil) {
        ?>
        <div class="fond conteneurTableau col-lg-12">
            <table class="tableauVoir" border=2 width="90%">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <?php if ($profil == 1) { ?>
                        <th>MODIFIER</th>
                        <th>SUPPRIMER</th>
                    <?php } ?>

                </tr>
                <h1>Liste des Familles</h1>
                <p>

                    <?php

                    for ($i = 0; $i < count($listeFamille); $i++) {
                        ?>
                        <tr>
                            <td>
                                <?= $listeFamille[$i]['Id_famille'] ?>
                            </td>
                            <td>
                                <?= $listeFamille[$i]['nom_code'] ?>
                            </td>
                            <?php if ($profil == 1) { ?>
                                <td>
                                    <a href="./?&action=modifierFamille&id_famille=<?= $listeFamille[$i]['Id_famille'] ?>"><img
                                            src="images/edit-button.png" alt="modifier" /></a>
                                </td>
                                <td>
                                    <a href="./?action=supprimerFamille&id_famille=<?= $listeFamille[$i]['Id_famille'] ?>"><img
                                            src="images/delete.png" alt="supprimer" /></a>
                                </td>
                            <?php } ?>
                        </tr>
                        <?php
                    }
                    ?>
            </table>
        <?php } else {
        $erreur = "Il n'y a pas de famille";
        $titre = "Gérer les familles";
        include "$racine/vue/v_erreur.php";
    } ?>

        <?php if ($profil == 1) { ?>
            <br>
            <a href="./?action=creerFamille" class="bouton">Créer une Famille</a>
            <br>
        <?php }
} else {
    $erreur = "Vous n'avez pas accès à cette page !";
    include "$racine/vue/v_erreur.php";
} ?>
</div>