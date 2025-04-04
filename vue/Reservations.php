<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle Réservation</title>
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
        .container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        .submit-btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .submit-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<header>
    <h1>Nouvelle Réservation</h1>
</header>

<div class="container">
    <form action="../src/traitement/trait_reservation.php" method="POST">
        <div class="form-group">
            <label for="date">Date de réservation</label>
            <input type="date" id="date" name="date_reservations" required>
        </div>

        <div class="form-group">
            <label for="prix">Prix du billet (€)</label>
            <input type="number" id="prix" name="prix_billet" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="vol">Vol</label>
            <select id="vol" name="id_vol" required>
                <option value="">Sélectionnez un vol</option>
                <option value="1">Paris - New York (Boeing 747)</option>
                <option value="2">Londres - Dubai (Airbus A380)</option>
            </select>
        </div>

        <button type="submit" class="submit-btn">Confirmer la réservation</button>
    </form>
</div>
</body>
</html>