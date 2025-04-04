<?php
require_once '../src/Repository/ReservationsRepository.php';
$reservationRepo = new ReservationsRepository();
$allReservations = $reservationRepo->getAllReservations(); // À implémenter dans votre repository
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Gestion des Réservations</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        body {
            background-color: #f5f5f5;
        }
        header {
            background: linear-gradient(45deg, #1e88e5, #039be5);
            color: white;
            padding: 20px;
            text-align: center;
        }
        nav {
            background: #0288d1;
            padding: 15px;
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
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #039be5;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .action-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            color: white;
        }
        .edit-btn {
            background-color: #ff9800;
        }
        .delete-btn {
            background-color: #f44336;
        }
        .search-bar {
            margin: 20px 0;
        }
        .search-bar input {
            padding: 10px;
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<header>
    <h1>Administration - Gestion des Réservations</h1>
</header>

<nav>
    <a href="admin.php">Tableau de bord</a>
    <a href="admin_utilisateurs.php">Utilisateurs</a>
    <a href="admin_reservations.php">Réservations</a>
</nav>

<div class="container">
    <div class="search-bar">
        <input type="text" placeholder="Rechercher une réservation...">
    </div>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Utilisateur</th>
            <th>Date</th>
            <th>Prix</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($allReservations as $reservation): ?>
            <tr>
                <td><?= $reservation['id_reservation'] ?></td>
                <td>User #<?= $reservation['id_utilisateur'] ?></td>
                <td><?= date('d/m/Y', strtotime($reservation['date_reservations'])) ?></td>
                <td><?= $reservation['prix_billet'] ?> €</td>
                <td><?= $reservation['reservations_en_cours'] ? 'Active' : 'Annulée' ?></td>
                <td>
                    <button class="action-btn edit-btn">Modifier</button>
                    <button class="action-btn delete-btn">Supprimer</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>