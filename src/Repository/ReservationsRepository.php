<?php

class ReservationsRepository
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new Bdd();
    }

    public function ajoutReservation(Reservations $reservation)
    {
        $sql = "INSERT INTO reservations (id_utilisateur, date_reservations, prix_billet, reservations_en_cours) 
                VALUES (:id_utilisateur, :date_reservations, :prix_billet, :reservations_en_cours)";
        $req = $this->bdd->prepare($sql);
        return $req->execute([
            'id_utilisateur' => $reservation->getIdUtilisateur(),
            'date_reservations' => $reservation->getDate_reservations(),
            'prix_billet' => $reservation->getPrix_billet(),
            'reservations_en_cours' => $reservation->getReservations_en_cours()
        ]);
    }

    public function getReservationsByUtilisateurs($id_utilisateur)
    {
        $sql = "SELECT * FROM reservations WHERE id_utilisateur = :id_utilisateur ORDER BY date_reservations DESC";
        $req = $this->bdd->getBdd()->prepare($sql);
        $req->execute(['id_utilisateur' => $id_utilisateur]);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    // Nouvelle méthode ajoutée
    public function getAllReservations()
    {
        $sql = "SELECT r.*, u.nom_utilisateur, u.prenom_utilisateur 
                FROM reservations r
                JOIN utilisateurs u ON r.id_utilisateur = u.id_utilisateur
                ORDER BY r.date_reservations DESC";
        $req = $this->bdd->getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function modifReservation(Reservations $reservation)
    {
        $sql = "UPDATE reservations 
                SET date_reservations = :date_reservations, 
                    prix_billet = :prix_billet, 
                    reservations_en_cours = :reservations_en_cours 
                WHERE id_reservation = :id_reservation";
        $req = $this->bdd->getBdd()->prepare($sql);
        return $req->execute([
            'date_reservations' => $reservation->getDate_reservations(),
            'prix_billet' => $reservation->getPrix_billet(),
            'reservations_en_cours' => $reservation->getReservations_en_cours(),
            'id_reservation' => $reservation->getId_reservation()
        ]);
    }

    public function annulerReservation($id_reservation)
    {
        $sql = "UPDATE reservations 
                SET reservations_en_cours = 0 
                WHERE id_reservation = :id_reservation";
        $req = $this->bdd->getBdd()->prepare($sql);
        return $req->execute(['id_reservation' => $id_reservation]);
    }

    public function getReservationById($id_reservation)
    {
        $sql = "SELECT r.*, u.nom_utilisateur, u.prenom_utilisateur 
                FROM reservations r
                JOIN utilisateurs u ON r.id_utilisateur = u.id_utilisateur
                WHERE r.id_reservation = :id_reservation";
        $req = $this->bdd->getBdd()->prepare($sql);
        $req->execute(['id_reservation' => $id_reservation]);
        return $req->fetch(PDO::FETCH_ASSOC);
    }
}
?>