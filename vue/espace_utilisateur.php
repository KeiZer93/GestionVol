<?php
// Vérification de la session et récupération de l'utilisateur
session_start();
if (!isset($_SESSION['utilisateur'])) {
    header("Location: Connexion.php");
    exit();
}
$utilisateur = $_SESSION['utilisateur'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Utilisateur - PlaneExplorer</title>
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
            line-height: 1.6;
        }

        header {
            background: linear-gradient(45deg, #1e88e5, #039be5);
            color: white;
            padding: 25px 0;
            text-align: center;
            margin-bottom: 20px;
        }

        nav {
            background: #0288d1;
            padding: 15px;
            text-align: center;
            margin-bottom: 30px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            padding: 8px 15px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #0277bd;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        .profile-section {
            background: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            display: flex;
            align-items: center;
        }

        .avatar {
            width: 120px;
            height: 120px;
            background-color: #bbdefb;
            border-radius: 50%;
            margin-right: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5em;
            font-weight: bold;
            color: #0d47a1;
        }

        .profile-info {
            flex: 1;
        }

        h2 {
            color: #0288d1;
            margin-bottom: 20px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 150px 1fr;
            gap: 10px;
            margin-bottom: 20px;
        }

        .info-label {
            font-weight: bold;
            color: #555;
        }

        .btn {
            padding: 10px 20px;
            background-color: #039be5;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0288d1;
        }

        .reservations-section {
            background: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .reservation-item {
            padding: 15px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .reservation-item:last-child {
            border-bottom: none;
        }

        .status {
            padding: 5px 10px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 0.9em;
        }

        .status-confirmed {
            background-color: #c8e6c9;
            color: #2e7d32;
        }

        .status-completed {
            background-color: #bbdefb;
            color: #0d47a1;
        }

        @media (max-width: 768px) {
            .profile-section {
                flex-direction: column;
                text-align: center;
            }

            .avatar {
                margin-right: 0;
                margin-bottom: 20px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
<header>
    <h1>Mon Espace Personnel</h1>
    <p>Bienvenue sur votre espace utilisateur</p>
</header>

<nav>
    <a href="espace_utilisateur.php">Mon Profil</a>
    <a href="mes_reservations.php">Mes Réservations</a>
    <a href="parametres.php">Paramètres</a>
    <a href="Deconnexion.php">Déconnexion</a>
</nav>

<div class="container">
    <div class="profile-section">
        <div class="avatar">
            <?php
            // Affiche les initiales de l'utilisateur
            echo strtoupper(substr($utilisateur->getPrenomUtilisateur(), 0, 1)) .
                strtoupper(substr($utilisateur->getNomUtilisateur(), 0, 1));
            ?>
        </div>
        <div class="profile-info">
            <h2>Informations Personnelles</h2>
            <div class="info-grid">
                <div class="info-label">Nom :</div>
                <div><?php echo htmlspecialchars($utilisateur->getNomUtilisateur()); ?></div>

                <div class="info-label">Prénom :</div>
                <div><?php echo htmlspecialchars($utilisateur->getPrenomUtilisateur()); ?></div>

                <div class="info-label">Email :</div>
                <div><?php echo htmlspecialchars($utilisateur->getMailUtilisateur()); ?></div>

                <div class="info-label">Rôle :</div>
                <div><?php echo htmlspecialchars($utilisateur->getRoleUtilisateur()); ?></div>
            </div>
            <button class="btn">Modifier mon profil</button>
        </div>
    </div>

    <div class="reservations-section">
        <h2>Mes Dernières Réservations</h2>
        <div class="reservation-item">
            <div>
                <strong>Vol #FL-7894 - Boeing 747</strong><br>
                <small>Paris (CDG) → New York (JFK) - 15 juin 2025</small>
            </div>
            <span class="status status-confirmed">Confirmée</span>
        </div>
        <div class="reservation-item">
            <div>
                <strong>Vol #FL-6521 - Airbus A380</strong><br>
                <small>Londres (LHR) → Dubai (DXB) - 10 juin 2025</small>
            </div>
            <span class="status status-completed">Terminée</span>
        </div>
    </div>
</div>
</body>
</html>