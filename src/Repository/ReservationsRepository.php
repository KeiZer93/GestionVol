<?php

class UtilisateursRepository
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new bdd();
    }

    public function ajoutReservation(Reservations $reservation)
    {
        $sql = "INSERT INTO reservations (id_utilisateur, date_reservations, prix_billet, reservations_en_cours) VALUES (:id_utilisateur,:date_reservations, :prix_billet, :reservations_en_cours)";
        $req = $this->bdd->prepare($sql);
        $res = $req->execute(array(
            'id_utilisateur' => $reservation->getIdUtilisateur(),
            'date_reservations' => $reservation->getDate_reservations(),
            'prix_billet' => $reservation->getPrix_billet(),
            'reservations_en_cours' => $reservation->getReservations_en_cours()
        ));
        if ($res == true) {
            return true;
        } else {
            return false;
        }
    }

    public function getReservationsByUtilisateurs($id_utilisateur)
    {
        $sql = "SELECT * FROM reservations WHERE id_utilisateur = :id_utilisateur";
        $req = $this->bdd->getBdd()->prepare($sql);
        $req->execute(array(
            'id_utilisateur' => $id_utilisateur
        ));
        return $req->fetchAll();
    }

    public function modifReservation(Reservations $reservation)
    {
        $sql = "UPDATE reservations SET id_reservation = :id_reservation, date_reservations = :date_reservations, 
                prix_billet = :prix_billet, reservations_en_cours = :reservations_en_cours 
                WHERE id_reservation = :id_reservation";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute(array(
            'date_reservations' => $reservation->getDate_reservations(),
            'prix_billet' => $reservation->getPrix_billet(),
            'reservations_en_cours' => $reservation->getReservations_en_cours(),
            'id_reservation' => $reservation->getId_reservation()
        ));
        if ($res == true) {
            return true;
        } else {
            return false;
        }
    }

    public function annulerReservation($id_reservation)
    {
        $sql = "DELETE FROM reservations WHERE id_reservation = :id_reservation";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute(array(
            'id_reservation' => $id_reservation
        ));
        if ($res == true) {
            return true;
        } else {
            return false;
        }
    }
    public function getReservationById($id_reservation)
    {
        $sql = "SELECT * FROM reservations WHERE id_reservation = :id_reservation";
        $req = $this->bdd->getBdd()->prepare($sql);
        $req->execute(array(
            'id_reservation' => $id_reservation
        ));

        return $req->fetch();
    }
}
?>