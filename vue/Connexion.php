<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="../assets/css/Connexion.css" rel="stylesheet">
</head>
<body>
<hr>
<header>
    <h1>Connexion</h1>
    <div class="tagline">Connectez-vous à votre compte</div>
</header>
<hr>
<form action ="../src/traitement/trait_connexion.php" method="post">
<div class="form-group">
    <label for="email"><i class="zmdi zmdi-email"></i></label>
    <input type="email" name="email" id="email" placeholder="Votre Email" required/>
</div>
<div class="form-group">
    <label for="mot_de_passe"><i class="zmdi zmdi-lock"></i></label>
    <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Votre mot de passe" required/>
</div>
    <div class="form-group form-button">
<input type = "submit" name ="validation">
    </div>
</form>
<div class="form-group form-button">
<a href ="Inscription.php"><p>Vous n'êtes pas membre de notre site ? Inscrivez vous juste ici</p></a>
</div>
</body>
</html>

