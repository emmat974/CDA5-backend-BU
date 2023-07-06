<?php

namespace App\Controllers;

use App\Class\Utilisateur;
use App\Models\UtilisateurModel;

final class UtilisateurController extends Controller
{
    private UtilisateurModel $models;

    public function __construct()
    {
        $this->models = new UtilisateurModel;
    }

    public function readAll(): void
    {
        $this->render('utilisateur/index', [
            'utilisateurs' => $this->models->readAll()
        ], 'Gérez tous vos utilisateurs');
    }

    public function read(int $id): void
    {
        $this->render('utilisateur/detail', [
            'utilisateur' => $this->models->read($id)
        ], 'Voir un utilisateur');
    }

    public function create(): void
    {
        if (isset($_POST['submit']) && !empty($_POST['submit'])) {
            $data = [
                "nom" => $_POST['nom'],
                "prenom" => $_POST['prenom']
            ];

            $this->models->create($data);

            $this->redirectionTo('utilisateurs');
        }

        $this->render('utilisateur/form', ['form' => new Utilisateur], 'Création d\'un nouveau utilisateur');
    }

    public function edit(int $id): void
    {
        if (isset($_POST['submit']) && !empty($_POST['submit'])) {
            $data = [
                "nom" => $_POST['nom'],
                "prenom" => $_POST['prenom']
            ];

            $this->models->update($id, $data);

            $this->redirectionTo('utilisateurs');
        }

        $this->render('utilisateur/form', ['form' => $this->models->read($id)], 'Édité un utilisateur');
    }

    public function delete(int $id): void
    {
        $this->models->remove($id);
        $this->redirectionTo('utilisateurs');
    }
}
