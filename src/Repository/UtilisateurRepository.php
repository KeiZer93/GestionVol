<?php

class UtilisateursRepository
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new bdd();
    }

    public function ajoutUtilisateurs(Utilisateurs $utilisateurs)
    {
        $sql = "INSERT INTO utilisateurs(nom,prenom,mail,mot_de_passe,date_naissance,ville_residence) VALUES (:nom,:prenom,:mail,:mot_de_passe,:date_naissance,:ville_residence)";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute(array(
            'nom' => $utilisateurs->getNom(),
            'prenom' => $utilisateurs->getPrenom(),
            'email' => $utilisateurs->getEmail(),
            'mot_de_passe' => $utilisateurs->getMotDePasse(),
            'date_naissance' => $utilisateurs->getDateNaissance(),
            'ville_residence' => $utilisateurs->getVilleResidence()
        ));
        if ($res == true) {
            return true;
        } else {
            return false;
        }

    }

    public function connexionUtilisateurs(Utilisateurs $utilisateurs)
    {
        $sql = "SELECT * FROM utilisateurs WHERE mail = :mail";
        $req = $this->bdd->getBdd()->prepare($sql);
        $req->execute(array(
            'email' => $utilisateurs->getEmail()
        ));

        $res = $req->fetch();

        if ($res) {
            if (password_verify($utilisateurs->getMotDePasse(), $res['mot_de_passe'])) {
                $utilisateurs->setIdUtilisateur($res['id_utilisateur']);
                $utilisateurs->setNom($res['nom']);
                $utilisateurs->setPrenom($res['prenom']);
                $utilisateurs->setEmail($res['email']);
                $utilisateurs->setRole($res['role']);

                return true;
            }
        }
        return false;
    }

    public function modifUtilisateurs(Utilisateurs $utilisateurs)
    {
        $sql = "INSERT INTO utilisateurs(nom,prenom,mot_de_passe) VALUES (:nom,:prenom,:mot_de_passe)";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute(array(
            'nom' => $utilisateurs->getNom(),
            'prenom' => $utilisateurs->getPrenom(),
            'mot_de_passe' => $utilisateurs->getMotDePasse()
        ));
        if ($res == true) {
            return true;
        } else {
            return false;
        }
    }

    public function getUtilisateurById($id_utilisateur)
    {
        $sql = "SELECT * FROM utilisateurs WHERE id_utilisateur = :id_utilisateur";
        $req = $this->bdd->getBdd()->prepare($sql);
        $req->execute([
            'id_utilisateur' => $id_utilisateur
        ]);

        return $req->fetch();
    }
}
