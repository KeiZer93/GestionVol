<?php
require_once '../bdd/Bdd.php';
require_once '../../vue/Inscription.php';
require_once '../modele/Utilisateur.php';
require_once '../Repository/UtilisateurRepository.php';

if (!isset($_POST["nom"]) || !isset($_POST["prenom"]) || !isset($_POST["email"]) || !isset($_POST["mot_de_passe"]) ||
    empty($_POST["nom"]) || empty($_POST["prenom"]) || empty($_POST["email"]) || empty($_POST["mot_de_passe"])) {
    echo "Veuillez remplir tous les champs.";
    header("Location: ../../vue/Inscription.php");
    exit();
} else {
    // Création d'un nouvel utilisateur
    $utilisateur = new Utilisateur([
        'nom' => $_POST["nom"],
        'prenom' => $_POST["prenom"],
        'email' => $_POST["email"],
        'motDePasse' => password_hash($_POST["mot_de_passe"], PASSWORD_BCRYPT), // Hash du mot de passe pour plus de sécurité
    ]);

    // Création du repository pour insérer l'utilisateur
    $utilisateurRepository = new UtilisateurRepository();

    // Vérifier si l'email existe déjà
    $exist = $utilisateurRepository->verifierEmailExistant($utilisateur->getMailUtilisateur());

    if ($exist) {
        echo "Cet email est déjà utilisé. Veuillez en choisir un autre.";
        header("Location: ../../vue/Inscription.php");
        exit();
    } else {
        // Ajout de l'utilisateur dans la base de données
        $ajout = $utilisateurRepository->ajouterUtilisateur($utilisateur);

        if ($ajout) {
            // Création de la session utilisateur
            session_start();
            $_SESSION['id_utilisateur'] = $utilisateur->getIdUtilisateur();
            $_SESSION['nom'] = $utilisateur->getNomUtilisateur();
            $_SESSION['prenom'] = $utilisateur->getPrenomUtilisateur();
            $_SESSION['email'] = $utilisateur->getMailUtilisateur();

            // Redirection vers la page d'accueil
            header("Location: ../../vue/pageAccueil.php");
            exit();
        } else {
            echo "Une erreur est survenue lors de l'inscription. Veuillez réessayer.";
            header("Location: ../../vue/Inscription.php");
            exit();
        }
    }
}
?>