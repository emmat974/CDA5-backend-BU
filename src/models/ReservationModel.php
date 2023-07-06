<?php

namespace App\Models;

use App\Class\Ordinateur;
use App\Class\Reservation;
use App\Class\Utilisateur;
use PDO;

final class ReservationModel extends Models
{
    protected string $table = "reservation";

    protected string $className = "Reservation";

    public function readAll(): ?array
    {
        $req = "SELECT r.id, o.id AS idOrdinateur, u.id AS idUser, o.nom AS ordinateurNom, u.nom AS utilisateurNom FROM reservation r JOIN ordinateur o ON r.idOrdinateur = o.id JOIN utilisateur u ON r.idUser = u.id ORDER BY r.id ASC;";
        $stmt = $this->connect()->prepare($req);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $reservations = [];

        foreach ($results as $row) {
            $reservation = new Reservation();
            $reservation->setId($row['id']);
            $reservation->setIdOrdinateur($row['idOrdinateur']);
            $reservation->setIdUtilisateur($row['idUser']);

            $ordinateur = new Ordinateur();
            $ordinateur->setId($row['idOrdinateur']);
            $ordinateur->setNom($row['ordinateurNom']);
            $reservation->setOrdinateur($ordinateur);

            $utilisateur = new Utilisateur();
            $utilisateur->setId($row['idUser']);
            $utilisateur->setNom($row['utilisateurNom']);
            $reservation->setUtilisateur($utilisateur);

            $reservations[] = $reservation;
        }

        return $reservations;
    }
}
