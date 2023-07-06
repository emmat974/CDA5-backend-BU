<div class="card text-black bg-secondary m-3 text-center" style="max-width: 80rem;">
    <div class="card-body">
        <form method="POST">
            <div class="form-group">
                <label for="idOrdinateur" class="form-label mt-4">Selectionné un poste</label>
                <select class="form-select" id="idOrdinateur" name="idOrdinateur">
                    <?php foreach ($data['ordinateurs'] as $key => $value) : ?>
                        <option value="<?= $value->getId() ?>"><?= $value->getNom() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="idUser" class="form-label mt-4">Selectionné un utilisateur</label>
                <select class="form-select" id="idUser" name="idUser">
                    <?php foreach ($data['utilisateurs'] as $key => $value) : ?>
                        <option value="<?= $value->getId() ?>"><?= $value->getFullname() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="d-grid gap-2 my-3">
                <input type="submit" class="btn btn-primary" value="Valider" name="submit" id="submit" />
            </div>
        </form>
    </div>
</div>