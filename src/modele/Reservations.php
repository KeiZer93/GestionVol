<?php
class Reservations
{
    private $id_reservation;
    private $date_reservations;
    private $prix_billet;
    private $reservations_en_cours;

    public function getId_reservation(){
        return $this->id_reservation;
    }
    public function setId_reservation($id_reservation){
        $this->id_reservation = $id_reservation;
    }
    public function getDate_reservations(){
        return $this->date_reservations;
    }
    public function setDate_reservations($date_reservations){
        $this->date_reservations = $date_reservations;
    }
    public function getPrix_billet(){
        return $this->prix_billet;
    }
    public function setPrix_billet($prix_billet){
        $this->prix_billet = $prix_billet;
    }
    public function getReservations_en_cours(){
        return $this->reservations_en_cours;
    }
    public function setReservations_en_cours($reservations_en_cours){
        $this->reservations_en_cours = $reservations_en_cours;
    }
    public function __construct(array $donnee)
    {
        $this->hydrate($donnee);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $valeur) {
            $methode = 'set' . ucfirst($key);

            if (method_exists($this, $methode)) {
                $this->$methode($valeur);
            }
        }
    }
}
