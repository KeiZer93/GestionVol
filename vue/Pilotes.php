<?php
// Inclure la classe Pilotes (si elle est dans un autre fichier, remplace le chemin)
include_once 'Pilotes.php';

// Exemple de données d'un pilote, vous pouvez remplacer cela par des données réelles venant d'une base de données
$piloteData = [
    'id_pilotes' => 1,
    'prenom' => 'John',
    'nom' => 'Doe',
    'conges' => '2025-06-15 to 2025-06-30'
];

// Créer un objet Pilote avec les données
$pilote = new Pilotes($piloteData);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations Pilote</title>
    <link rel="stylesheet" href="../assets/css/Pilotes.css">
</head>
<body>
<header>
    <h1>Informations du Pilote</h1>
</header>

<div class="container">
    <h2>Détails du Pilote</h2>
    <form action="Pilotes.php" method="POST">
        <div class="form-group">
            <label for="id_pilotes">ID Pilote</label>
            <input type="text" id="id_pilotes" name="id_pilotes" value="<?php echo htmlspecialchars($pilote->getId_pilotes()); ?>" readonly>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($pilote->getPrenom()); ?>" required>
        </div>

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($pilote->getNom()); ?>" required>
        </div>

        <div class="form-group">
            <label for="conges">Congés</label>
            <input type="text" id="conges" name="conges" value="<?php echo htmlspecialchars($pilote->getConges()); ?>" required>
        </div>

        <button type="submit" class="submit-btn">Mettre à jour</button>
    </form>
</div>

</body>
</html>