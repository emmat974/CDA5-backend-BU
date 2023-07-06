<div class="card text-white bg-primary m-3 text-center" style="max-width: 80rem;">
    <div class="card-body">
        <h1 class="card-title"><?= $data['utilisateur']->getNom() ?> <?= $data['utilisateur']->getPrenom() ?></h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <a href="<?= URL ?>utilisateurs/edit/<?= $data['utilisateur']->getId() ?>" class=" btn btn-warning">Modifier</a> <a href="<?= URL ?>utilisateurs/remove/<?= $data['utilisateur']->getId() ?>" class="btn btn-danger"> Supprimer</a>
    </div>
</div>