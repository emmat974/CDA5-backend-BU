<div class="card text-black bg-secondary m-3 text-center" style="max-width: 80rem;">
    <div class="card-body">
        <form method="POST">
            <div class="form-group">
                <label class="col-form-label col-form-label-lg" for="nom">Nom</label>
                <input class="form-control form-control-lg" type="text" id="nom" name="nom" value="<?= $data['form']->getNom() ?>">
            </div>
            <div class="form-group">
                <label for="description" class="form-label mt-4">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"><?= $data['form']->getDescription() ?></textarea>
            </div>

            <div class="d-grid gap-2 my-3">
                <input type="submit" class="btn btn-primary" value="Valider" name="submit" id="submit" />
            </div>
        </form>
    </div>
</div>