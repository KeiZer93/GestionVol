<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion</title>
</head>
<body>
<h1>Déconnexion</h1>
<p>Êtes-vous sûr de vouloir vous déconnecter ?</p>

<form action="../src/traitement/trait_deconnexion.php" method="post">
    <input type="submit" name="confirm_logout" value="Confirmer la déconnexion">
</form>

<a href="Connexion.php">Se reconnecter</a>
</body>
</html>