<?php

namespace App\Controllers;

use App\Class\Ordinateur;
use App\Models\OrdinateurModel;

final class OrdinateurController extends Controller
{
    private OrdinateurModel $models;

    public function __construct()
    {
        $this->models = new OrdinateurModel;
    }

    public function readAll(): void
    {
        $this->render('ordinateur/index', [
            'ordinateurs' => $this->models->readAll()
        ], 'Gérez tous nos ordinateurs');
    }

    public function read(int $id): void
    {
        $this->render('ordinateur/detail', [
            'ordinateur' => $this->models->read($id)
        ], 'Voir un ordinateur');
    }

    public function create(): void
    {
        if (isset($_POST['submit']) && !empty($_POST['submit'])) {
            $data = [
                "nom" => $_POST['nom'],
                "description" => $_POST['description']
            ];

            $this->models->create($data);

            $this->redirectionTo('ordinateurs');
        }

        $this->render('ordinateur/form', ['form' => new Ordinateur], 'Création d\'un nouveau poste');
    }

    public function edit(int $id): void
    {
        if (isset($_POST['submit']) && !empty($_POST['submit'])) {
            $data = [
                "nom" => $_POST['nom'],
                "description" => $_POST['description']
            ];

            $this->models->update($id, $data);

            $this->redirectionTo('ordinateurs');
        }

        $this->render('ordinateur/form', ['form' => $this->models->read($id)], 'Création d\'un nouveau poste');
    }

    public function delete(int $id): void
    {
        $this->models->remove($id);
        $this->redirectionTo('ordinateurs');
    }
}
