<?php

class C_Accueil extends C_ControleurGenerique {

    function index() {
        $lesCategories = new M_ListeCategories();
        $this->vue->listeCateg = $lesCategories->getAll();
        $this->vue->loginAuthentification = MaSession::get('login');
        $this->vue->titreVue = "LAFLEUR : Accueil";

        $this->vue->entete = "../vues/templates/entete.inc.php";
        $this->vue->gauche = "../vues/templates/gauche.inc.php";
        $this->vue->pied = "../vues/templates/pied.inc.php";

        $this->vue->centre = "../vues/accueil/templates/centre.inc.php";

        $this->vue->afficher();
    }

    function seConnecter() {
        $lesCategories = new M_ListeCategories();
        $this->vue->listeCateg = $lesCategories->getAll();
        $this->vue->loginAuthentification = MaSession::get('login');
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
                MaSession::nouvelle(array('login' => $login)); // service minimum
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

        $this->vue->loginAuthentification = MaSession::get('login');
        $this->vue->afficher();
    }

    function seDeconnecter() {
        MaSession::fermer();
        header("Location:  index.php");
    }

}