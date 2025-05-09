<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlaneExplorer - Administration</title>
    <link rel="stylesheet" href="../assets/css/pageAccueil.css">
    <style>
        /* Styles supplémentaires spécifiques à l'admin */
        .admin-stats {
            display: flex;
            justify-content: space-around;
            margin: 30px 0;
            flex-wrap: wrap;
        }

        .stat-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            width: 30%;
            min-width: 250px;
            margin: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
        }

        .stat-value {
            font-size: 2.5em;
            color: #1e88e5;
            margin: 10px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #1e88e5;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .action-btn {
            padding: 5px 10px;
            margin: 0 3px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: white;
        }

        .edit-btn {
            background-color: #ff9800;
        }

        .delete-btn {
            background-color: #f44336;
        }

        .admin-actions {
            display: flex;
            gap: 15px;
            margin: 20px 0;
        }

        .admin-actions button {
            padding: 10px 15px;
            background: #039be5;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<header>
    <h1>PlaneExplorer Admin</h1>
    <p class="tagline">Panneau d'administration du système</p>
</header>
<nav>
    <a href="pageAccueil.php">Accueil</a>
    <a href="admin_utilisateurs.php">Utilisateurs</a>
    <a href="admin_reservations.php">Réservations</a>
    <a href="admin_avions.php">Avions</a>
    <a href="admin_historique.php">Historique</a>
    <a href="admin_parametres.php">Paramètres</a>
</nav>

<div class="main-content">
    <section>
        <h2>Tableau de bord administratif</h2>
        <p>Gérez l'ensemble du système PlaneExplorer depuis cette interface.</p>
    </section>

    <div class="admin-stats">
        <div class="stat-card">
            <h3>Utilisateurs</h3>
            <div class="stat-value">0</div>
            <p>Inscrits ce mois</p>
        </div>

        <div class="stat-card">
            <h3>Réservations</h3>
            <div class="stat-value">0</div>
            <p>Effectuées aujourd'hui</p>
        </div>

        <div class="stat-card">
            <h3>Avions</h3>
            <div class="stat-value">3</div>
            <p>Dans notre flotte</p>
        </div>
    </div>

    <section>
        <h2>Dernières réservations</h2>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Utilisateur</th>
                <th>Avion</th>
                <th>Date</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>#RES-7854</td>
                <td>Jean Dupont</td>
                <td>Boeing 747</td>
                <td>2025-04-15</td>
                <td>Confirmée</td>
                <td>
                    <button class="action-btn edit-btn">Modifier</button>
                    <button class="action-btn delete-btn">Annuler</button>
                </td>
            </tr>
            <tr>
                <td>#RES-7853</td>
                <td>Marie Martin</td>
                <td>Airbus A380</td>
                <td>2025-07-14</td>
                <td>En attente</td>
                <td>
                    <button class="action-btn edit-btn">Modifier</button>
                    <button class="action-btn delete-btn">Annuler</button>
                </td>
            </tr                                                                                                                          >
            </tbody>
        </table>
    </section>

    <div class="admin-actions">
        <button>Exporter les données</button>
        <button>Générer un rapport</button>
        <button>Envoyer une notification</button>
    </div>
</div>

<footer>
    <p>&copy; 2025 PlaneExplorer Admin | Tous droits réservés.</p>
    <p>
        <a href="#">Mentions légales</a> |
        <a href="#">Journal d'activité</a>
    </p>
</footer>
</body>
</html>