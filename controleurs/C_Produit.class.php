<?php

class C_Produit extends Controleur {

    function afficherTous() {
        $this->vue->loginAuthentification = MaSession::get('login');
        $this->vue->titreVue = "LAFLEUR : Produits";

        $this->vue->entete = "../vues/templates/entete.inc.php";

        $lesCategories = new M_ListeCategories();
        $this->vue->listeCateg = $lesCategories->getAll();
        $this->vue->gauche = "../vues/templates/gauche.inc.php";

        $this->vue->pied = "../vues/templates/pied.inc.php";

        if (MaSession::estAuthentifie(array('login'))) {
            $lesProduits = new M_ListeProduits();
            $this->vue->listeProduits = $lesProduits->getAll();
            $this->vue->centre = "../vues/produit/templates/centreListe.inc.php";
        } else {
            $this->vue->message = "Vous n'êtes pas authentifié";
            $this->vue->centre = "../vues/accueil/templates/centre.inc.php";
        }

        $this->vue->afficher();
    }

    function afficherUneCateg() {
        $this->vue->loginAuthentification = MaSession::get('login');
        $this->vue->titreVue = "LAFLEUR : Produits par catégorie";

        $this->vue->entete = "../vues/templates/entete.inc.php";

        $lesCategories = new M_ListeCategories();
        $this->vue->listeCateg = $lesCategories->getAll();
        $this->vue->gauche = "../vues/templates/gauche.inc.php";

        $this->vue->pied = "../vues/templates/pied.inc.php";

        if (MaSession::estAuthentifie(array('login'))) {
            $lesProduits = new M_ListeProduits();
            $id = getRequest("id", "bul");
            // récupérer le libellé de la catégorie de produits
            $categ= $lesCategories->get($id);
            $this->vue->libelleCateg= $categ->cat_libelle;

            // récupérer la liste des produits de cette catégorie
            $this->vue->listeProduits = $lesProduits->getListeProduitsParCateg($id);
            $this->vue->centre = "../vues/produit/templates/centreListe.inc.php";
        }else{
            $this->vue->message = "Vous n'êtes pas authentifié";
            $this->vue->centre = "../vues/accueil/templates/centre.inc.php";
        }
        $this->vue->afficher();
    }

}