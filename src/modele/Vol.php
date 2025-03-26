<?php
class Vol
{
private $id_vol;
private $destinations;
private $heure_depart;
private $heure_arrivee;
private $ville_arrivee;
private $ref_pilotes;
private $ref_avions;
private $ref_reservation;

public function getIdVol(){
    return $this->id_vol;
}
public function setIdVol($id_vol){
    $this->id_vol = $id_vol;
}
public function getDestinations(){
    return $this->destinations;
}
public function setDestinations($destinations){
    $this->destinations = $destinations;
}
public function getHeureDepart(){
    return $this->heure_depart;
}
public function setHeureDepart($heure_depart){
    $this->heure_depart = $heure_depart;
}
public function getHeureArrivee(){
    return $this->heure_arrivee;
}
public function setHeureArrivee($heure_arrivee){
    $this->heure_arrivee = $heure_arrivee;
}
public function getVilleArrivee(){
    return $this->ville_arrivee;
}
public function setVilleArrivee($ville_arrivee){
    $this->ville_arrivee = $ville_arrivee;
}
public function getRefPilotes(){
    return $this->ref_pilotes;
}
public function setRefPilotes($ref_pilotes){
    $this->ref_pilotes = $ref_pilotes;
}
public function getRefAvions(){
    return $this->ref_avions;
}
public function setRefAvions($ref_avions){
    $this->ref_avions = $ref_avions;
}
public function getRefReservation(){
    return $this->ref_reservation;
}
public function setRefReservation($ref_reservation){
    $this->ref_reservation = $ref_reservation;
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
