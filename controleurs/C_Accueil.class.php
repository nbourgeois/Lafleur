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
        $lesCategories = new M_ListeCategories();
        $this->vue->listeCateg = $lesCategories->getAll();
        $this->vue->loginAuthentification = Session::getAuth('login');
        $this->vue->titreVue = "LAFLEUR : Accueil";

        $this->vue->entete = "../vues/templates/entete.inc.php";
        $this->vue->gauche = "../vues/templates/gauche.inc.php";
        $this->vue->pied = "../vues/templates/pied.inc.php";

        $this->vue->centre = "../vues/accueil/templates/centre.seConnecter.inc.php";

        $this->vue->afficher();
    }

    function authentifier() {

        $lesCategories = new M_ListeCategories();
        $this->vue->listeCateg = $lesCategories->getAll();
        $this->vue->titreVue = "LAFLEUR : Accueil";

        $this->vue->entete = "../vues/templates/entete.inc.php";
        $this->vue->gauche = "../vues/templates/gauche.inc.php";
        $this->vue->pied = "../vues/templates/pied.inc.php";

        //------------------------------------------------------------------------
        // VUE CENTRALE
        //------------------------------------------------------------------------
        $lesClients = new M_ListeClients();
        // Vérifier login et mot de passe saisis dans la formulaire d'authentification
        if (isset($_POST['login']) && isset($_POST['mdp'])) {
            $login = $_POST['login'];
            $mdp = $_POST['mdp'];
            if ($lesClients->verifierLogin($login, $mdp)) {
                // Si le login et le mot de passe sont valides, ouvrir une nouvelle session
                Session::authentifier(array('login' => $login)); // service minimum
                $this->vue->message = "Authentification réussie";
                $this->vue->centre = "../vues/accueil/templates/centre.inc.php";
            } else {
                $this->vue->message = "ECHEC d'identification : login ou mot de passe inconnus ";
                $this->vue->centre = "../vues/accueil/templates/centre.seConnecter.inc.php";
            }
        } else {
            $this->vue->message = "Attention : le login ou le mot de passe ne sont pas renseign&eacute;s";
            $this->vue->centre = "../vues/accueil/templates/centre.seConnecter.inc.php";
        }
        //------------------------------------------------------------------------

        $this->vue->loginAuthentification = Session::getAuth('login');
        $this->vue->afficher();
    }

    function seDeconnecter() {
        Session::finAuthentification();
        header("Location:  index.php");
    }

}