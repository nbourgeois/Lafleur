<?php

class M_DaoClient extends M_DaoGenerique {

    function __construct() {
        $this->nomTable = "clientconnu";
        $this->nomClefPrimaire = "clt_code";
    }

    /**
     * verifierLogin
     * @param string $login
     * @param string $mdp
     * @return boolean 
     */
    function verifierLogin($login, $mdp) {
        $retour = FALSE;
        // Requête textuelle
        $sql = "SELECT COUNT(*) nbRes FROM $this->nomTable WHERE clt_email=:l AND clt_motPasse=:m";
        try {
            // préparer la requête PDO
            $queryPrepare = $this->pdo->prepare($sql);
            // exécuter la requête PDO
            if ($queryPrepare->execute(array(':l' => $login, ':m' => $mdp))) {
                // si la requête réussit :
                if ($enregistrement = $queryPrepare->fetch(PDO::FETCH_ASSOC)) {
                    // test du nombre d'enregistrments trouvés
                    $retour = ($enregistrement['nbRes'] == 1);
                }
            }
        } catch (PDOException $e) {
            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }

    public function enregistrementVersObjet($enreg) {
        /*
          `clt_code` varchar(5) NOT NULL,
          `clt_nom` varchar(30) NOT NULL,
          `clt_adresse` varchar(50) NOT NULL,
          `clt_tel` varchar(20) DEFAULT NULL,
          `clt_email` varchar(50) NOT NULL,
          `clt_motPasse`
         */
        $retour = new M_Client($enreg['clt_code'], $enreg['clt_nom'], $enreg['clt_adresse'], $enreg['clt_tel'], $enreg['clt_email'], $enreg['clt_motPasse']);
        return $retour;
    }

    public function objetVersEnregistrement($objetMetier) {
        /*
          private $code;
          private $nom;
          private $adresse;
          private $tel;       // téléphone
          private $email;
          private $mdp;       // mot de passe
         */

        $retour = array(
            ':code' => $objetMetier->getCode(),
            ':nom' => $objetMetier->getNom(),
            ':adresse' => $objetMetier->getAdresse(),
            ':tel' => $objetMetier->getTel(),
            ':email' => $objetMetier->getEmail(),
            ':mdp' => $objetMetier->getMdp()
        );
        return $retour;
    }

    public function insert($objetMetier) {
        return FALSE;
    }

    public function update($idMetier, $objetMetier) {
        return FALSE;
    }

}

?>
