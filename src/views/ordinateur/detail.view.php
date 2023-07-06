<div class="card text-white bg-primary m-3 text-center" style="max-width: 80rem;">
    <div class="card-body">
        <h1 class="card-title"><?= $data['ordinateur']->getNom() ?></h4>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <?= $data['ordinateur']->getDescription() ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <a href="<?= URL ?>ordinateurs/edit/<?= $data['ordinateur']->getId() ?>" class=" btn btn-warning">Modifier</a> <a href="<?= URL ?>ordinateurs/remove/<?= $data['ordinateur']->getId() ?>" class="btn btn-danger"> Supprimer</a>
    </div>
</div>