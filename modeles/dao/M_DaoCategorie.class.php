<?php

class M_DaoCategorie extends M_DaoGenerique {
        
    function __construct() {
        $this->nomTable = "categorie";
        $this->nomClefPrimaire = "cat_code";
    }
    
    public function enregistrementVersObjet($unEnregistrement) {
        $retour = new M_Categorie($unEnregistrement['cat_code'], $unEnregistrement['cat_libelle']);
        return $retour;        
    }

    public function objetVersEnregistrement($objetMetier) {
        $retour = array(
            ':code' => $objetMetier->getCode(),
            ':libelle' => $objetMetier->getLibelle()
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
