<?php

class PilotesRepository
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new Bdd();
    }

    // Ajouter un pilote
    public function ajoutPilote(Pilotes $pilote)
    {
        $sql = "INSERT INTO pilotes (prenom, nom, conges) 
                VALUES (:prenom, :nom, :conges)";
        $req = $this->bdd->prepare($sql);
        $res = $req->execute(array(
            'prenom' => $pilote->getPrenom(),
            'nom' => $pilote->getNom(),
            'conges' => $pilote->getConges()
        ));
        return $res ? true : false;
    }

    // Obtenir tous les pilotes
    public function getAllPilotes()
    {
        $sql = "SELECT * FROM pilotes";
        $req = $this->bdd->getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    // Obtenir un pilote par son ID
    public function getPiloteById($id_pilotes)
    {
        $sql = "SELECT * FROM pilotes WHERE id_pilotes = :id_pilotes";
        $req = $this->bdd->getBdd()->prepare($sql);
        $req->execute(array(
            'id_pilotes' => $id_pilotes
        ));
        $result = $req->fetch();
        return $result ? new Pilotes($result) : null;
    }

    // Modifier un pilote
    public function modifPilote(Pilotes $pilote)
    {
        $sql = "UPDATE pilotes SET prenom = :prenom, nom = :nom, conges = :conges 
                WHERE id_pilotes = :id_pilotes";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute(array(
            'prenom' => $pilote->getPrenom(),
            'nom' => $pilote->getNom(),
            'conges' => $pilote->getConges(),
            'id_pilotes' => $pilote->getId_pilotes()
        ));
        return $res ? true : false;
    }

    // Supprimer un pilote
    public function supprimerPilote($id_pilotes)
    {
        $sql = "DELETE FROM pilotes WHERE id_pilotes = :id_pilotes";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute(array(
            'id_pilotes' => $id_pilotes
        ));
        return $res ? true : false;
    }
}
?>