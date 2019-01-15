<?php

class patients {

    public $id = 0;
    public $lastname = '';
    public $firstname = '';
    public $birthdate = '00/00/0000';
    public $email = '';
    public $phone = 0000000000;
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', '*****', '*****');
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    /**
     * methode permettant d'inserer des données dns la table patient :
     * @return array
     */
    public function addPatients() {
        $query = 'INSERT INTO `patients`(`lastname`, `firstname`, `birthdate`, `phone`, `mail`) '
                . 'VALUES (:lastname, :firstname, :birthdate, :phone, :mail)';
//on a query prepare
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryResult->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryResult->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $queryResult->bindValue(':phone', $this->phone, PDO::PARAM_INT);
        $queryResult->bindValue(':mail', $this->mail, PDO::PARAM_STR);
//query execute
        return $queryResult->execute();
//query closecursor
        //  $queryResult->closeCursor();   
    }
        
        public function modifyPatientSelected() {
        $query = 'UPDATE `patients` SET lastname = :nvlastname, firstname = :nvfirstname, birthdate = :nvbirthdate, phone = :nvphone, mail = :nvmail WHERE ID = :ID';
        $queryResult = $this->db->prepare($query);
        $queryResult ->bindValue(':nvlastname', $this->lastname, PDO::PARAM_STR);
        $queryResult->bindValue(':nvfirstname', $this->firstname, PDO::PARAM_STR);
        $queryResult ->bindValue(':nvbirthdate', $this->birthdate, PDO::PARAM_STR);
        $queryResult->bindValue(':nvphone', $this->phone, PDO::PARAM_STR);
        $queryResult->bindValue(':nvmail', $this->mail, PDO::PARAM_STR);
        return $queryResult->execute();
    }


    public function getPatientList() {
        //on declare result comme un tableau vide
        $result = array();
        //on lance la requete dans la BDD
        $query = 'SELECT `id`,`lastname`,`firstname` FROM `patients` ORDER BY`lastname`';
        //On declare et charge l'attribut $queryResult avec : "dans la bdd la requete"
        $queryResult = $this->db->query($query);
        //is_object — Détermine si une variable est de type objet
        //si le resultat de la requete est bien un objet charge 
        //$result avec le tableau en type objet.
        if (is_object($queryResult)){
            $result = $queryResult->fetchAll(PDO::FETCH_OBJ);
        }
        //else { $result = array(); MAIS vu qu'on l'a deja intialisé a vide au dessus, si ca rentre dans la condition du else il correspondra automatiquement a tableau vide. C'est pour ca qu'on code pas le else.
        // au final on retourne la var result dans tous les cas, sa depend de ce qu'on a chargé dedans.
        return $result;
    }

    public function getPatientSelect() {
        $query = 'SELECT `id`,`lastname`,`firstname`,DATE_FORMAT(`birthdate`,\'%d/%m/%Y\') AS `birthdate`,`phone`,`mail` FROM `patients`where id = :id';
        //on prepare la requette
        $queryResult = $this->db->prepare($query);
        //on associe nore marqueur nominatif a notre attribut ID. 
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }
}
