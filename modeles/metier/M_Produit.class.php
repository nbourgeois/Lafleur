<?php

/**
 * Description of M_Produit
 *
 * @author btssio
 */
class M_Produit {
/*
  `pdt_ref` char(3) NOT NULL DEFAULT '',
  `pdt_designation` varchar(50) NOT NULL DEFAULT '',
  `pdt_prix` decimal(5,2) NOT NULL DEFAULT '0.00',
  `pdt_image` varchar(50) NOT NULL DEFAULT '',
  `pdt_categorie` char(3) NOT NULL DEFAULT '',
 */   
    private $ref;
    private $designation;
    private $prix;
    private $image;
    private $categorie;

    function __construct($ref, $designation, $prix, $image, $categorie) {
        $this->ref = $ref;
        $this->designation = $designation;
        $this->prix = $prix;
        $this->image = $image;
        $this->categorie = $categorie;  // objet de type M_Categorie
    }

    public function getRef() {
        return $this->ref;
    }

    public function getDesignation() {
        return $this->designation;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getImage() {
        return $this->image;
    }

    public function getCategorie() {
        return $this->categorie;
    }

    public function setRef($ref) {
        $this->ref = $ref;
    }

    public function setDesignation($designation) {
        $this->designation = $designation;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function setCategorie($categorie) {
        $this->categorie = $categorie;
    }


    
}
