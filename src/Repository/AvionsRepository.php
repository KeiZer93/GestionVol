<?php

class UtilisateursRepository
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new bdd();
    }

    public function ajoutAvion(Avion $avion)
    {
        $sql = "INSERT INTO avions (id_avion, modele, type_avion, compagnie_aerienne) 
                VALUES (:id_avion, :modele, :type_avion, :compagnie_aerienne)";
        $req = $this->bdd->prepare($sql);
        $res = $req->execute(array(
            'id_avion' => $avion->getId_avion(),
            'modele' => $avion->getModele(),
            'type_avion' => $avion->getType_avion(),
            'compagnie_aerienne' => $avion->getCompagnie_aerienne()
        ));
        return $res ? true : false;
    }
    public function getAllAvions()
    {
        $sql = "SELECT * FROM avions";
        $req = $this->bdd->getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    // Modifier un avion
    public function modifAvion(Avion $avion)
    {
        $sql = "UPDATE avions SET nom_avion = :nom_avion, capacite = :capacite, 
                type_avion = :type_avion, prix_billet = :prix_billet 
                WHERE id_avion = :id_avion";
        $req = $this->bdd->prepare($sql);
        $res = $req->execute(array(
            'id_avion' => $avion->getId_avion(),
            'modele' => $avion->getModele(),
            'type_avion' => $avion->getType_avion(),
            'compagnie_aerienne' => $avion->getCompagnie_aerienne()
        ));
        return $res ? true : false;
    }

    // Supprimer un avion
    public function supprimerAvion($id_avion)
    {
        $sql = "DELETE FROM avions WHERE id_avion = :id_avion";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute(array(
            'id_avion' => $id_avion
        ));
        return $res ? true : false;
    }

    // Obtenir un avion par son ID
    public function getAvionById($id_avion)
    {
        $sql = "SELECT * FROM avions WHERE id_avion = :id_avion";
        $req = $this->bdd->getBdd()->prepare($sql);
        $req->execute(array(
            'id_avion' => $id_avion
        ));
        return $req->fetch();
    }
}

?>