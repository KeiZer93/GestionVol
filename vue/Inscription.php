<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="../assets/css/Inscription.css" rel="stylesheet">
    <style>
        .error-message { color: red; margin-top: 5px; }
        .term-service {
            color: #039be5;
            font-weight: bold;
            text-decoration: none;
        }
        .term-service:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<h2 class="form-title">Inscription</h2>

<?php if (isset($_GET['error'])): ?>
    <div class="error-message">
        <?php
        if ($_GET['error'] === 'conditions') {
            echo "Vous devez accepter les conditions d'utilisation";
        } elseif ($_GET['error'] === 'email_existant') {
            echo "Cet email est déjà utilisé. Veuillez en choisir un autre.";
        } elseif ($_GET['error'] === 'champs_vides') {
            echo "Veuillez remplir tous les champs.";
        }
        ?>
    </div>
<?php endif; ?>

<form method="POST" class="register-form" id="register-form" action="../src/traitement/trait_inscription.php">
    <div class="form-group">
        <label for="nom"><i class="zmdi zmdi-account"></i></label>
        <input type="text" name="nom" id="nom" placeholder="Votre nom" value="<?= isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : '' ?>" required/>
    </div>
    <div class="form-group">
        <label for="prenom"><i class="zmdi zmdi-account"></i></label>
        <input type="text" name="prenom" id="prenom" placeholder="Votre prénom" value="<?= isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : '' ?>" required/>
    </div>

    <div class="form-group">
        <label for="email"><i class="zmdi zmdi-email"></i></label>
        <input type="email" name="email" id="email" placeholder="Votre Email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" required/>
    </div>
    <div class="form-group">
        <label for="mot_de_passe"><i class="zmdi zmdi-lock"></i></label>
        <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Votre mot de passe" required/>
    </div>

    <div class="form-group">
        <input type="checkbox" name="acceptConditions" id="acceptConditions" class="agree-term" required />
        <label for="acceptConditions" class="label-agree-term">
            <span><span></span></span>J'accepte les <a href="Conditions_d'utilisation.html" class="term-service">conditions d'utilisation</a>
        </label>
    </div>
    <div class="form-group form-button">
        <a href="Connexion.php" class="button-link">S'inscrire</a>
    </div>
</form>

<div class="form-group form-button">
    <a href="Connexion.php" class="link-to-login">Déjà membre ? Connectez-vous ici</a>
</div>
</body>
</html>