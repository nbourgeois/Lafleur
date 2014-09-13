<?php

class C_Produit extends C_ControleurGenerique {

    function afficherTous() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $daoCateg = new M_DaoCategorie();
        $daoCateg->connecter();
        $this->vue->ajouter('listeCateg', $daoCateg->getAll());
        $daoCateg->deconnecter();
        $this->vue->ajouter('loginAuthentification',Session::getAuth('login'));
        $this->vue->ajouter('titreVue',"LAFLEUR : Produits");
        $this->vue->ajouter('centre',"../vues/includes/accueil/centre.inc.php");

        if (Session::estAuthentifie(array('login'))) {
            $daoProduit = new M_DaoProduit();
            $daoProduit->connecter();
            $this->vue->ajouter('listeProduits',$daoProduit->getAll());
            $this->vue->ajouter('centre',"../vues/includes/produit/centreListe.inc.php");
            $daoProduit->deconnecter();
        } else {
            $this->vue->ajouter('message',"Vous n'êtes pas authentifié");
            $this->vue->ajouter('centre',"../vues/includes/accueil/centre.inc.php");
        }

        $this->vue->afficher();
    }

    function afficherUneCateg() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $daoCateg = new M_DaoCategorie();
        $daoCateg->connecter();
        $this->vue->ajouter('listeCateg', $daoCateg->getAll());
        $this->vue->ajouter('loginAuthentification',Session::getAuth('login'));
        $this->vue->ajouter('titreVue',"LAFLEUR : Produits par catégorie");
        $this->vue->ajouter('centre',"../vues/includes/accueil/centre.inc.php");

        if (Session::estAuthentifie(array('login'))) {
            $daoProduit = new M_DaoProduit();
            $daoProduit->connecter();
            $id = getParametre("id", "bul");
            // récupérer le libellé de la catégorie de produits
            $categ= $daoCateg->getOneById($id);
            $this->vue->ajouter('libelleCateg',$categ->getLibelle());
            $this->vue->ajouter('listeProduits',$daoProduit->getListeProduitsParCateg($id));
            $this->vue->ajouter('centre',"../vues/includes/produit/centreListe.inc.php");
            $daoProduit->deconnecter();
        } else {
            $this->vue->ajouter('message',"Vous n'êtes pas authentifié");
            $this->vue->ajouter('centre',"../vues/includes/accueil/centre.inc.php");
        }

        $daoCateg->deconnecter();
        $this->vue->afficher();
        
    }

}