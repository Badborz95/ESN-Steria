<dic class="container text-center">
    <div class="row mt-5">
        <?php if($_SESSION['type'] == 1){?>
        <div class="col-lg-4 ">
            <a class="btn btn-outline-secondary" href="./?action=voirSalarie">salarie</a>
        </div>
        <?php }?>
        <?php if($_SESSION['type'] == 1 or $_SESSION['type'] == 2){?>
        <div class="col-lg-4">
            <a class="btn btn-outline-secondary" href="./?action=voirInterventions">Voir les interventions</a>
        </div>
        <?php }?>
        <div class="col-lg-4">
            <a class="btn btn-outline-secondary" href="./?action=voirSite">Voir les sites</a>
        </div>
    </div>
    <div class="row mt-5">
    <?php if($_SESSION['type'] == 1 or $_SESSION['type'] == 3){?>
        <div class="col-lg-4">
            <a class="btn btn-outline-secondary " href="./?action=voirClient">Voir les clients</a>
        </div>
    <?php }?>
        <div class="col-lg-4">
            <a class="btn btn-outline-secondary" href="./?action=voirContrat">Voir les contrats</a>
        </div>
        <?php if($_SESSION['type'] == 1 or $_SESSION['type'] == 2){?>
        <div class="col-lg-4">
            <a class="btn btn-outline-secondary" href="./?action=gererFamille">Voir les familles</a>
        </div>
        <?php }?>
    </div>
    <div class="row mt-5">
    <?php if($_SESSION['type'] == 1 or $_SESSION['type'] == 2){?>
        <div class="col-lg-6">
            <a class="btn btn-outline-secondary" href="./?action=gererDomaine">Voir les domaines techniques</a>
        </div>
        <?php }?>
        <?php if($_SESSION['type'] == 1){?>
        <div class="col-lg-6">
            <a class="btn btn-outline-secondary" href="./?action=voirSecteurActivite">Voir les secteurs d'activités</a>
        </div>
        <?php }?>
    </div>
    </div>