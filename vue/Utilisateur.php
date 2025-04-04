global$utilisateur; global$utilisateur; <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Espace Utilisateur</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
        }

        header {
            background: linear-gradient(45deg, #1e88e5, #039be5);
            color: white;
            padding: 20px;
            text-align: center;
        }

        nav {
            background: #0288d1;
            padding: 10px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 5px;
        }

        .user-info {
            display: flex;
            margin-bottom: 30px;
        }

        .avatar {
            width: 100px;
            height: 100px;
            background-color: #ddd;
            border-radius: 50%;
            margin-right: 20px;
        }

        .details {
            flex: 1;
        }

        h2 {
            color: #039be5;
            margin-bottom: 10px;
        }

        .info-item {
            margin-bottom: 8px;
        }

        .info-label {
            font-weight: bold;
            display: inline-block;
            width: 120px;
        }

        .btn {
            padding: 8px 15px;
            background-color: #039be5;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 10px;
        }

        .reservations {
            margin-top: 30px;
        }

        .reservation-item {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }
    </style>
</head>
<body>
<header>
    <h1>Mon Espace Personnel</h1>
</header>

<nav>
    <a href="espace_utilisateur.php">Profil</a>
    <a href="mes_reservations.php">Mes Réservations</a>
    <a href="parametres.php">Paramètres</a>
    <a href="Deconnexion.php">Déconnexion</a>
</nav>

<div class="container">
    <div class="user-info">
        <div class="avatar"></div>
        <div class="details">
            <h2>Informations Personnelles</h2>
            <div class="info-item">
                <span class="info-label">Nom :</span>
                <?php echo htmlspecialchars($user->getNomUtilisateur()); ?>
            </div>
            <div class="info-item">
                <span class="info-label">Prénom :</span>
                <?php echo htmlspecialchars($user->getPrenomUtilisateur()); ?>
            </div>
            <div class="info-item">
                <span class="info-label">Email :</span>
                <?php echo htmlspecialchars($user->getMailUtilisateur()); ?>
            </div>
            <div class="info-item">
                <span class="info-label">Rôle :</span>
                <?php echo htmlspecialchars($user->getRoleUtilisateur()); ?>
            </div>
            <button class="btn">Modifier mon profil</button>
        </div>
    </div>

    <div class="reservations">
        <h2>Mes Dernières Réservations</h2>
        <div class="reservation-item">
            <strong>Boeing 747</strong> - 15 juin 2025
            <span style="float: right;">Statut: Confirmée</span>
        </div>
        <div class="reservation-item">
            <strong>Airbus A380</strong> - 10 juin 2025
            <span style="float: right;">Statut: Terminée</span>
        </div>
    </div>
</div>
</body>
</html>