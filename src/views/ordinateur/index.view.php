<div class="card text-white bg-primary m-3 text-center" style="max-width: 80rem;">
    <div class="card-body">
        <h1 class="card-title">Gérez vos ordinateurs</h4>
    </div>
</div>


<table class="table table-hover text-center">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nom de la marchine</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['ordinateurs'] as $key => $value) : ?>
            <tr>
                <th scope="row"><?= $value->getId() ?></th>
                <td><a href="<?= URL ?>ordinateurs/detail/<?= $value->getId() ?>"> <?= $value->getNom() ?> </a></td>
                <td><a href="<?= URL ?>ordinateurs/edit/<?= $value->getId() ?>" class="btn btn-warning">Modifier</a> <a href="<?= URL ?>ordinateurs/remove/<?= $value->getId() ?>" class="btn btn-danger">Supprimer</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="row">
    <div class="col-md-12">
        <a href="<?= URL ?>ordinateurs/create" class="btn btn-success">Créer un nouveau poste</a>
    </div>
</div>