<?php if (!isset($profil)) { ?>
    <form method="POST" action="./?action=confirmConnexion1">
        <select name='idprofil' required>
            <?php
            foreach ($listProfil as $profil) {
                echo "<option value ='" . $profil['Id_profil'] . "'>" . ucfirst($profil['libelle']) . " </option>";
            }
            ?>
        </select>
        <button type='submit' class='boutton' name='continue'>Suivant</button>
    </form>

<?php }
if ($profil == 2 or $profil == 3 or $profil == 1) { ?>
    <h1>Connexion en tant que
        <?php
        if ($profil == 1) {
            echo 'Admin';
        }
        if ($profil == 2) {
            echo 'Intervenant';
        }
        if ($profil == 3) {
            echo 'Commerciale';
        }
        ?>
    </h1>

    <form method="POST" action="./?action=confirmConnexion2&profil=<?php echo $profil ?>">
        <?php if ($profil == 2) { ?>
            <table border=2 width="90%">
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Niveau d'étude</th>
                    <th>Maitrise Anglais</th>
                    <th>Choix</th>
                </tr>
                <?php foreach ($listsalarie as $salarie) {
                    ?>

                    <div class="card">
                        <div class="descrCard">
                            <tr>
                                <td>
                                    <?= $salarie["nom"] ?>
                                </td>
                                <td>
                                    <?= $salarie["prenom"] ?>
                                </td>
                                <td>
                                    <?= $salarie["niveau_etude"] ?>
                                </td>
                                <td>
                                    <?= $salarie["maitrise_anglais"] ?>
                                </td>
                                <td><input type="radio" name="idsalarie" value="<?php echo $salarie['Id_salarie'] ?>" required></td>
                            </tr>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </table>
        <?php } ?>
        <?php if ($profil == 3) { ?>
            <table border=2 width="90%">
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Téléphone Fixe</th>
                    <th>Téléphone Portable</th>
                    <th>Secteur </th>
                    <th>Choix</th>
                </tr>
                <?php foreach ($listsalarie as $salarie) {
                    ?>
                    <div class="card">
                        <div class="descrCard">
                            <tr>
                                <td>
                                    <?= $salarie["nom"] ?>
                                </td>
                                <td>
                                    <?= $salarie["prenom"] ?>
                                </td>
                                <td>
                                    <?= $salarie["tel_fixe"] ?>
                                </td>
                                <td>
                                    <?= $salarie["tel_portable"] ?>
                                </td>
                                <td>
                                    <?= $salarie["nom_secteur"] ?>
                                </td>
                                <td><input type="radio" name="idsalarie" value="<?php echo $salarie['Id_salarie'] ?>" required></td>
                            </tr>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </table>
        <?php } ?>
        <p>Mot de passe</p>
        <input type="password" name="mdp">
        <button type='submit' class='boutton' name='continue'>Suivant</button>
    </form>




<?php } ?>