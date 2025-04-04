<?php
class UtilisateurRepository {
    private $bdd;

    public function __construct() {
        $this->bdd = Bdd::getConnexion();
    }

    // ... (vos méthodes existantes) ...

    public function getAllUtilisateurs() {
        $query = "SELECT nom, prenom, email FROM utilisateurs ORDER BY date_inscription DESC";
        $stmt = $this->bdd->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajouterUtilisateur(Utilisateur $utilisateur) {
        $query = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe) 
                 VALUES (:nom, :prenom, :email, :mot_de_passe)";
        $stmt = $this->bdd->prepare($query);

        return $stmt->execute([
            ':nom' => $utilisateur->getNomUtilisateur(),
            ':prenom' => $utilisateur->getPrenomUtilisateur(),
            ':email' => $utilisateur->getMailUtilisateur(),
            ':mot_de_passe' => $utilisateur->getMotDePasse()
        ]);
    }

    public function verifierEmailExistant($email) {
        $query = "SELECT COUNT(*) FROM utilisateurs WHERE email = :email";
        $stmt = $this->bdd->prepare($query);
        $stmt->execute([':email' => $email]);
        return $stmt->fetchColumn() > 0;
    }
}