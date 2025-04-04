<?php
session_start();
require_once '../src/Repository/ReservationsRepository.php';
$reservationRepo = new ReservationsRepository();
$reservations = $reservationRepo->getReservationsByUtilisateurs($_SESSION['utilisateur']->getIdUtilisateur());
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Réservations</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        body {
            background-color: #e3f2fd;
            color: #333;
        }
        header {
            background: linear-gradient(45deg, #1e88e5, #039be5);
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        nav {
            background: #0288d1;
            padding: 15px;
            text-align: center;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            padding: 5px 10px;
            border-radius: 4px;
        }
        nav a:hover {
            background-color: #0277bd;
        }
        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
        }
        .reservation-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .reservation-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        .reservation-id {
            font-weight: bold;
            color: #039be5;
        }
        .reservation-date {
            color: #666;
        }
        .reservation-price {
            font-size: 1.2em;
            font-weight: bold;
            color: #2e7d32;
        }
        .reservation-status {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 0.9em;
        }
        .status-active {
            background-color: #c8e6c9;
            color: #2e7d32;
        }
        .status-cancelled {
            background-color: #ffcdd2;
            color: #c62828;
        }
        .action-btn {
            padding: 8px 15px;
            margin-top: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .modify-btn {
            background-color: #ff9800;
            color: white;
        }
        .cancel-btn {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>
<header>
    <h1>Mes Réservations</h1>
</header>

<nav>
    <a href="espace_utilisateur.php">Mon Profil</a>
    <a href="mes_reservations.php">Mes Réservations</a>
    <a href="Deconnexion.php">Déconnexion</a>
</nav>

<div class="container">
    <?php foreach ($reservations as $reservation): ?>
        <div class="reservation-card">
            <div class="reservation-header">
                <span class="reservation-id">Réservation #<?= $reservation['id_reservation'] ?></span>
                <span class="reservation-date"><?= date('d/m/Y', strtotime($reservation['date_reservations'])) ?></span>
            </div>

            <div>
                <p><strong>Prix :</strong> <span class="reservation-price"><?= $reservation['prix_billet'] ?> €</span></p>
                <p><strong>Statut :</strong>
                    <span class="reservation-status <?= $reservation['reservations_en_cours'] ? 'status-active' : 'status-cancelled' ?>">
                        <?= $reservation['reservations_en_cours'] ? 'Active' : 'Annulée' ?>
                    </span>
                </p>
            </div>

            <?php if ($reservation['reservations_en_cours']): ?>
                <div>
                    <button class="action-btn modify-btn">Modifier</button>
                    <button class="action-btn cancel-btn">Annuler</button>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>