<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/lumen/bootstrap.min.css">

</head>

<body>
    <main role="main" class="container mx-auto my-auto">
        <div class="card text-white bg-primary m-3 text-center" style="max-width: 80rem;">
            <div class="card-body">
                <h1 class="card-title">Veuillez vous connecter</h4>
            </div>
        </div>

        <?php if (isset($errors) && !empty($errors)) : ?>
            <div class="alert alert-danger">
                <?= $errors['message']; ?>
            </div>
        <?php endif ?>
        <div class=" card text-black bg-secondary m-3 text-center" style="max-width: 80rem;">
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label class="col-form-label col-form-label-lg" for="nom">Email</label>
                        <input class="form-control form-control-lg" type="email" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label mt-4">Mot de passe</label>
                        <input class="form-control form-control-lg" type="password" id="password" name="password">
                    </div>

                    <div class="d-grid gap-2 my-3">
                        <input type="submit" class="btn btn-primary" value="Valider" name="submit" id="submit" />
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

</body>

</html>