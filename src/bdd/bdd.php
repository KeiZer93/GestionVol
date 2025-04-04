<?php
class Bdd {
    private $nomBDD = 'GestionVol';
    private $serveur = 'localhost';
    private $user= 'root';
    private $Password = '';
    private $bdd;

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser(string $user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getServeur(): string
    {
        return $this->serveur;
    }

    /**
     * @param string $serveur
     */
    public function setServeur(string $serveur)
    {
        $this->serveur = $serveur;
    }

    /**
     * @return string
     */
    public function getNomBDD(): string
    {
        return $this->nomBDD;
    }

    /**
     * @param string $nomBDD
     */
    public function setNomBDD(string $nomBDD)
    {
        $this->nomBDD = $nomBDD;
    }
    public function __construct()
    {
        $this->bdd = new PDO("mysql:dbname=".$this->nomBDD.";host=".$this->serveur, $this->user, $this->password);
    }

    public function getBdd(){
        return $this->bdd;
    }
    private static $connexion = null;

    public static function getConnexion() {
        if (self::$connexion === null) {
            try {
                self::$connexion = new PDO(
                    'mysql:host=localhost;dbname=nom_de_votre_base;charset=utf8',
                    'votre_utilisateur',
                    'votre_mot_de_passe'
                );
                self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                die('Erreur de connexion : '.$e->getMessage());
            }
        }
        return self::$connexion;
    }
}