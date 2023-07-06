<?php

namespace App\Controllers;

use App\Models\OrdinateurModel;
use App\Models\ReservationModel;
use App\Models\UtilisateurModel;

final class ReservationController extends Controller
{

    private ReservationModel $models;

    public function __construct()
    {
        $this->models = new ReservationModel;
    }


    public function home()
    {
        $this->render('reservation/index', [
            'reservations' => $this->models->readAll()
        ], 'Gérez tous nos ordinateurs');
    }

    public function create()
    {
        if (isset($_POST['submit']) && !empty($_POST['submit'])) {
            $data = [
                "idOrdinateur" => $_POST['idOrdinateur'],
                "idUser" => $_POST['idUser']
            ];

            $this->models->create($data);

            $this->redirectionTo('reservations');
        }

        $repOrdinateur = new OrdinateurModel;
        $repUtilisateur = new UtilisateurModel;

        $ordinateurs = $repOrdinateur->readAll();
        $utilisateurs = $repUtilisateur->readAll();
        $reservations = $this->models->readAll();

        $ordinateurIdsReserved = array_map(function ($reservation) {
            return $reservation->getIdOrdinateur();
        }, $reservations);


        $ordinateurs = array_filter($ordinateurs, function ($ordinateur) use ($ordinateurIdsReserved) {
            return !in_array($ordinateur->getId(), $ordinateurIdsReserved);
        });

        $utilisateurIdsReserved = array_map(function ($reservation) {
            return $reservation->getIdUtilisateur();
        }, $reservations);

        $utilisateurs = array_filter($utilisateurs, function ($utilisateur) use ($utilisateurIdsReserved) {
            return !in_array($utilisateur->getId(), $utilisateurIdsReserved);
        });

        $this->render('reservation/form', [
            'ordinateurs' => $ordinateurs,
            'utilisateurs' => $utilisateurs
        ], 'Gérez tous nos ordinateurs');
    }

    public function delete(int $id): void
    {
        $this->models->remove($id);
        $this->redirectionTo('reservations');
    }
}
