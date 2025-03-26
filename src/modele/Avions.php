<?php
class Avions
{
private $id_avions;
private $modele;
private $compagnie_aerienne;
private $type_avion;

public function getIdAvions(){
    return $this->id_avions;
}
public function setIdAvions($id_avions){
    $this->id_avions = $id_avions;
}
public function getModele(){
    return $this->modele;
}
public function setModele($modele){
    $this->modele = $modele;
}
public function getCompagnie_aerienne(){
    return $this->compagnie_aerienne;
}
public function setCompagnie($aerienne){
    $this->compagnie_aerienne = $aerienne;
}
public function getType_avions(){
    return $this->type_avion;
}
public function setType($type_avion){
    $this->type_avion = $type_avion;
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