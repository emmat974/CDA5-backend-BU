<div class="card text-white bg-primary m-3 text-center" style="max-width: 80rem;">
    <div class="card-body">
        <h1 class="card-title">Gérez vos réservation</h4>
    </div>
</div>


<table class="table table-hover text-center">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Poste occupé</th>
            <th scope="col">Utilisateur</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($data['reservations'] as $key => $value) : ?>

            <tr>
                <th scope="row"><?= $value->getId() ?></th>
                <td><a href="<?= URL ?>ordinateurs/detail/<?= $value->getOrdinateur()->getId() ?>"> <?= $value->getOrdinateur()->getNom() ?> </a></td>
                <td><a href="<?= URL ?>utilisateurs/detail/<?= $value->getUtilisateur()->getId() ?>"> <?= $value->getUtilisateur()->getFullname() ?> </a></td>
                <td><a href="<?= URL ?>reservations/remove/<?= $value->getId() ?>" class="btn btn-primary">Ordinateur rendu</a> </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="row">
    <div class="col-md-12">
        <a href="<?= URL ?>reservations/create" class="btn btn-success">Créer une nouvelle réservation</a>
    </div>
</div>