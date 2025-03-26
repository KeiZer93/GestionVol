<?php

class VolRepository
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new Bdd();
    }

    // Ajouter un vol
    public function ajoutVol(Vol $vol)
    {
        $sql = "INSERT INTO vols (destinations, heure_depart, heure_arrivee, ville_arrivee, ref_pilotes, ref_avions, ref_reservation) 
                VALUES (:destinations, :heure_depart, :heure_arrivee, :ville_arrivee, :ref_pilotes, :ref_avions, :ref_reservation)";
        $req = $this->bdd->prepare($sql);
        $res = $req->execute(array(
            'destinations' => $vol->getDestinations(),
            'heure_depart' => $vol->getHeureDepart(),
            'heure_arrivee' => $vol->getHeureArrivee(),
            'ville_arrivee' => $vol->getVilleArrivee(),
            'ref_pilotes' => $vol->getRefPilotes(),
            'ref_avions' => $vol->getRefAvions(),
            'ref_reservation' => $vol->getRefReservation()
        ));
        return $res ? true : false;
    }

    // Obtenir tous les vols
    public function getAllVols()
    {
        $sql = "SELECT * FROM vols";
        $req = $this->bdd->getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    // Obtenir un vol par son ID
    public function getVolById($id_vol)
    {
        $sql = "SELECT * FROM vols WHERE id_vol = :id_vol";
        $req = $this->bdd->getBdd()->prepare($sql);
        $req->execute(array(
            'id_vol' => $id_vol
        ));
        $result = $req->fetch();
        return $result ? new Vol($result) : null;
    }

    // Modifier un vol
    public function modifVol(Vol $vol)
    {
        $sql = "UPDATE vols SET destinations = :destinations, heure_depart = :heure_depart, 
                heure_arrivee = :heure_arrivee, ville_arrivee = :ville_arrivee, ref_pilotes = :ref_pilotes, 
                ref_avions = :ref_avions, ref_reservation = :ref_reservation 
                WHERE id_vol = :id_vol";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute(array(
            'destinations' => $vol->getDestinations(),
            'heure_depart' => $vol->getHeureDepart(),
            'heure_arrivee' => $vol->getHeureArrivee(),
            'ville_arrivee' => $vol->getVilleArrivee(),
            'ref_pilotes' => $vol->getRefPilotes(),
            'ref_avions' => $vol->getRefAvions(),
            'ref_reservation' => $vol->getRefReservation(),
            'id_vol' => $vol->getIdVol()
        ));
        return $res ? true : false;
    }

    // Supprimer un vol
    public function supprimerVol($id_vol)
    {
        $sql = "DELETE FROM vols WHERE id_vol = :id_vol";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute(array(
            'id_vol' => $id_vol
        ));
        return $res ? true : false;
    }
}
?>