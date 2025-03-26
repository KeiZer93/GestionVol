<?php
require_once '../bdd/Bdd.php';
require_once '../../vue/Connexion.php';
require_once '../modele/Utilisateur.php';
require_once '../Repository/UtilisateurRepository.php';

if (!isset($_POST["mail"]) || !isset($_POST["mot_de_passe"]) || empty($_POST["mail"]) || empty($_POST["mot_de_passe"])) {
    echo "Ce n'est pas bien, vous avez laissé une case vide";
    header("Location: ../../vue/Connexion.php");
    exit();
} else {
    $utilisateurs = new Utilisateur([
        'email' => $_POST["email"],
        'motDePasse' => $_POST["mot_de_passe"]
    ]);
    $utilisateursRepository = new UtilisateursRepository();
    $resultat = $utilisateursRepository->connexionUtilisateurs($utilisateurs);

    if ($resultat) {
        session_start();

        $_SESSION['id_utilisateur'] = $utilisateurs->getIdUtilisateur();
        $_SESSION['nom'] = $utilisateurs->getNomUtilisateur();
        $_SESSION['prenom'] = $utilisateurs->getPrenomUtilisateur();
        $_SESSION['email'] = $utilisateurs->getMailUtilisateur();
        $_SESSION['motDePasse'] = $utilisateurs->getMdpUtilisateur();
        $_SESSION['role'] = $utilisateurs->getRoleUtilisateur();

        header("Location: ../../vue/pageAccueil.php");
        exit();
    } else {
        session_destroy();
        header("Location: ../../vue/Connexion.php");
        exit();
    }
}
?>