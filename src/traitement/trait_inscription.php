<?php
require_once '../bdd/Bdd.php';
require_once '../modele/Utilisateur.php';
require_once '../Repository/UtilisateurRepository.php';

if (!isset($_POST['acceptConditions'])) {
    header('Location: ../../vue/Inscription.php?error=conditions');
    exit();
}

if (empty($_POST["nom"]) || empty($_POST["prenom"]) || empty($_POST["email"]) || empty($_POST["mot_de_passe"])) {
    header("Location: ../../vue/Inscription.php?error=champs_vides");
    exit();
}

$utilisateur = new Utilisateur([
    'nom' => trim($_POST["nom"]),
    'prenom' => trim($_POST["prenom"]),
    'email' => trim($_POST["email"]),
    'motDePasse' => password_hash($_POST["mot_de_passe"], PASSWORD_BCRYPT),
]);

$UtilisateurRepository = new UtilisateurRepository();

if ($UtilisateurRepository->verifierEmailExistant($utilisateur->getMailUtilisateur())) {
    header("Location: ../../vue/Inscription.php?error=email_existant");
    exit();
}

$ajout = $UtilisateurRepository->ajouterUtilisateur($utilisateur);

if ($ajout) {

    session_start();
    $_SESSION['id_utilisateur'] = $utilisateur->getIdUtilisateur();
    $_SESSION['nom'] = $utilisateur->getNomUtilisateur();
    $_SESSION['prenom'] = $utilisateur->getPrenomUtilisateur();
    $_SESSION['email'] = $utilisateur->getMailUtilisateur();

    header("Location: ../../vue/Connexion.php?inscription=success");
    exit();
} else {

    header("Location: ../../vue/Inscription.php?error=erreur_inscription");
    exit();
}