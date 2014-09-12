<?php

/**
 * Description of M_Client
 *
 * @author btssio
 */
class M_Client {
    private $code;
    private $nom;
    private $adresse;
    private $tel;       // téléphone
    private $email;
    private $mdp;       // mot de passe
    
    function __construct($code, $nom, $adresse, $tel, $email, $mdp) {
        $this->code = $code;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->tel = $tel;
        $this->email = $email;
        $this->mdp = $mdp;
    }

    public function getCode() {
        return $this->code;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getTel() {
        return $this->tel;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getMdp() {
        return $this->mdp;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setTel($tel) {
        $this->tel = $tel;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }


    
    
}
