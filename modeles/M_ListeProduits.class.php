<?php

class M_ListeProduits extends Modele {

    protected $table = 'produit';
    protected $clePrimaire = 'pdt_ref';

    function getListeProduitsParCateg($id) {
        $cnx = $this->connecter();
        $sql = "SELECT * FROM $this->table WHERE pdt_categorie=?";
        $stmt = $cnx->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $retour = $stmt->fetchAll(PDO::FETCH_CLASS, $this->nomClasseMetier);
        $this->deconnecter();
        return $retour;
    }

}

?>
