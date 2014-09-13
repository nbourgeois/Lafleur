<?php

class C_Accueil extends C_ControleurGenerique {

    /**
     * controleur= accueil & action= index
     * Afficher la page d'accueil
     */
    function defaut() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $daoCateg = new M_DaoCategorie();
        $daoCateg->connecter();
        $this->vue->ajouter('listeCateg', $daoCateg->getAll());
        $daoCateg->deconnecter();
        $this->vue->ajouter('loginAuthentification',Session::getAuth('login'));
        $this->vue->ajouter('titreVue',"LAFLEUR : Accueil");
        $this->vue->ajouter('centre',"../vues/accueil/centre.inc.php");

        $this->vue->afficher();
    }

    function seConnecter() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $daoCateg = new M_DaoCategorie();
        $daoCateg->connecter();
        $this->vue->ajouter('listeCateg', $daoCateg->getAll());
        $daoCateg->deconnecter();
        $this->vue->ajouter('loginAuthentification',Session::getAuth('login'));
        $this->vue->ajouter('titreVue',"LAFLEUR : Accueil");
        $this->vue->ajouter('centre',"../vues/accueil/centre.seConnecter.inc.php");

        $this->vue->afficher();
    }

    function authentifier() {

        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $daoCateg = new M_DaoCategorie();
        $daoCateg->connecter();
        $this->vue->ajouter('listeCateg', $daoCateg->getAll());
        $daoCateg->deconnecter();
        $this->vue->ajouter('titreVue',"LAFLEUR : Accueil");
        //------------------------------------------------------------------------
        // VUE CENTRALE
        //------------------------------------------------------------------------
        $daoClient = new M_DaoClient();
        $daoClient->connecter();
        // Vérifier login et mot de passe saisis dans la formulaire d'authentification
        if (isset($_POST['login']) && isset($_POST['mdp'])) {
            $login = $_POST['login'];
            $mdp = $_POST['mdp'];
            if ($daoClient->verifierLogin($login, $mdp)) {
                // Si le login et le mot de passe sont valides, ouvrir une nouvelle session
                Session::authentifier(array('login' => $login)); // service minimum
                $this->vue->ajouter('message',"Authentification réussie");
                $this->vue->ajouter('centre',"../vues/accueil/centre.inc.php");
            } else {
                $this->vue->ajouter('message',"ECHEC d'identification : login ou mot de passe inconnus ");
                $this->vue->ajouter('centre',"../vues/accueil/centre.seConnecter.inc.php");
            }
        } else {
            $this->vue->ajouter('message',"Attention : le login ou le mot de passe ne sont pas renseign&eacute;s");
            $this->vue->ajouter('centre',"../vues/accueil/centre.seConnecter.inc.php");
        }
        //------------------------------------------------------------------------

        $this->vue->ajouter('loginAuthentification',Session::getAuth('login'));
        $daoClient->deconnecter();
        $this->vue->afficher();
    }

    function seDeconnecter() {
        Session::finAuthentification();
        header("Location:  index.php");
    }

}