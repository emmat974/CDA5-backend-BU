<div class="card text-white bg-primary m-3 text-center" style="max-width: 80rem;">
    <div class="card-body">
        <h1 class="card-title">Gérez vos utilisateurs</h4>
    </div>
</div>


<table class="table table-hover text-center">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nom & prénom</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['utilisateurs'] as $key => $value) : ?>
            <tr>
                <th scope="row"><?= $value->getId() ?></th>
                <td><a href="<?= URL ?>utilisateurs/detail/<?= $value->getId() ?>"> <?= $value->getFullname() ?> </a></td>
                <td><a href="<?= URL ?>utilisateurs/edit/<?= $value->getId() ?>" class="btn btn-warning">Modifier</a> <a href="<?= URL ?>utilisateurs/remove/<?= $value->getId() ?>" class="btn btn-danger">Supprimer</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="row">
    <div class="col-md-12">
        <a href="<?= URL ?>utilisateurs/create" class="btn btn-success">Créer un utilisateur</a>
    </div>
</div>