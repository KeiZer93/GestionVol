<?php
class Pilotes
{
private $id_pilotes;
private $prenom;
private $nom;
private $conges;

public function getId_pilotes(){
    return $this->id_pilotes;
}
public function setId_pilotes($id_pilotes){
    $this->id_pilotes = $id_pilotes;
}
public function getPrenom(){
    return $this->prenom;
}
public function setPrenom($prenom){
    $this->prenom = $prenom;
}
public function getNom(){
    return $this->nom;
}
public function setNom($nom){
    $this->nom = $nom;
}
public function getConges(){
    return $this->conges;
}
public function setConges($conges){
    $this->conges = $conges;
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