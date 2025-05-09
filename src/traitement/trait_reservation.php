<?php

require_once '../bdd/Bdd.php';
require_once '../modele/Reservation.php';
require_once '../Repository/ReservationRepository.php';

if (!isset($_POST['date_reservations']) || !isset($_POST['prix_billet']) || !isset($_POST['id_vol']) || empty($_POST['date_reservations']) || empty($_POST['prix_billet']) || empty($_POST['id_vol'])) {
    echo "Tous les champs doivent être remplis.";
    header("Location: ../../vue/NouvelleReservation.php");
    exit();
} else {

    $reservation = new Reservation([
        'date_reservation' => $_POST['date_reservations'],
        'prix_billet' => $_POST['prix_billet'],
        'id_vol' => $_POST['id_vol'],
    ]);

    $reservationRepository = new ReservationsRepository();

    $resultat = $reservationRepository->ajouterReservation($reservation);

    if ($resultat) {

        header("Location: ../../vue/MesReservations.php?success=1");
        exit();
    } else {

        header("Location: ../../vue/NouvelleReservation.php?error=1");
        exit();
    }
}
?>