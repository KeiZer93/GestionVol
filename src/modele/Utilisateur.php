<?php
class Utilisateur
{

    private $id_utilisateur;
    private $nom_utilisateur;
    private $prenom_utilisateur;
    private $mail;
    private $mot_de_passe;
    private $role_utilisateur;
    public function getIdUtilisateur(){
        return $this->id_utilisateur;
    }
    public function setIdUtilisateur($id_utilisateur){
        $this->id_utilisateur = $id_utilisateur;
        return $this;
    }
    public function getNomUtilisateur(){
        return $this->nom_utilisateur;
    }
    public function setNomUtilisateur($nom_utilisateur){
        $this->nom_utilisateur = $nom_utilisateur;
    }
    public function getPrenomUtilisateur(){
        return $this->prenom_utilisateur;
    }
    public function setPrenomUtilisateur($prenom_utilisateur){
        $this->prenom_utilisateur = $prenom_utilisateur;
    }
    public function getMail(){
        return $this->mail;
    }
    public function setMail($mail){
        $this->mail = $mail;
    }
    public function getMotDePasse(){
        return $this->mot_de_passe;
    }
    public function setMotDePasse($mot_de_passe){
        $this->mot_de_passe = $mot_de_passe;
    }
    public function getRoleUtilisateur(){
        return $this->role_utilisateur;
    }
    public function setRoleUtilisateur($role_utilisateur){
        $this->role_utilisateur = $role_utilisateur;
    }
    public function __construct(array $donnee){
        $this->hydrate($donnee);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $valeur)
        {
            $methode = 'set'.ucfirst($key);

            if (method_exists($this, $methode))
            {
                $this->$methode($valeur);
            }
        }
    }
}
