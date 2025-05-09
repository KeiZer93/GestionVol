<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs - Admin</title>
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
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
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

        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            color: white;
        }

        .btn-edit {
            background-color: #ff9800;
        }

        .btn-delete {
            background-color: #f44336;
        }

        .btn-add {
            background-color: #4CAF50;
            padding: 10px 15px;
            margin-bottom: 20px;
        }

        .search-bar {
            margin: 20px 0;
            display: flex;
        }

        .search-bar input {
            padding: 10px;
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 4px 0 0 4px;
        }

        .search-bar button {
            padding: 10px 15px;
            background-color: #039be5;
            color: white;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
        }
    </style>
</head>
<body>
<header>
    <h1>Administration des Utilisateurs</h1>
</header>

<nav>
    <a href="Admin.php">Tableau de bord</a>
    <a href="admin_utilisateurs.php">Utilisateurs</a>
    <a href="admin_reservations.php">Réservations</a>
    <a href="admin_avions.php">Avions</a>
</nav>

<div class="container">
    <div class="search-bar">
        <input type="text" placeholder="Rechercher un utilisateur...">
        <button>Rechercher</button>
    </div>

    <button class="btn btn-add">+ Ajouter un utilisateur</button>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Exemple d'affichage des données PHP
        // $users = $userRepository->getAllUsers();
        // foreach($users as $user):
        ?>
        <tr>
            <td>1</td>
            <td>Dupont</td>
            <td>Jean</td>
            <td>jean.dupont@example.com</td>
            <td>Administrateur</td>
            <td>
                <button class="btn btn-edit">Modifier</button>
                <button class="btn btn-delete">Supprimer</button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Martin</td>
            <td>Marie</td>
            <td>marie.martin@example.com</td>
            <td>Utilisateur</td>
            <td>
                <button class="btn btn-edit">Modifier</button>
                <button class="btn btn-delete">Supprimer</button>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>