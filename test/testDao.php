<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>test Dao</title>
    </head>
    <body>
        <?php
        require_once("../includes/parametresSGBD.inc.php");
        require_once("../includes/fonctions.inc.php");
        
        // Test de M_DaoCategorie

        $dao = new M_DaoCategorie();
        $dao->connecter();

        // Categorie : test de sélection par code
        echo "<p>Categorie : test de sélection par code</p>";
        $uneCateg = $dao->getOneById('bul');
        var_dump($uneCateg);

        // Categorie : test de sélection de tous les enregistrements
        echo "<p>Categorie : test de sélection de tous les enregistrements</p>";
        $lesCategs = $dao->getAll();
        var_dump($lesCategs);

        $dao->deconnecter();
        
        // Test de M_DaoClient

        $dao = new M_DaoClient();
        $dao->connecter();

        // Client : test de sélection par code
        echo "<p>Client : test de sélection par code</p>";
        $unClt = $dao->getOneById('c0002');
        var_dump($unClt);

        // Client : test de sélection de tous les enregistrements
        echo "<p>Client : test de sélection de tous les enregistrements</p>";
        $lesClts = $dao->getAll();
        var_dump($lesClts);
        
        // Client : test de correspondance login / mot de passe
        echo "<p>Client : test de correspondance login / mot de passe</p>";
        // cas 1 : un login et un mot de passe qui correspondent
        echo "<p> ---- cas 1 : un login et un mot de passe qui correspondent</p>";
        $login = 'dubois@club-internet.fr';
        $mdp = 'bbb';
        $retour = $dao->verifierLogin($login, $mdp);
        if($retour){
            echo "<p>--------> cas 2 Ok :".$retour." </p>";
        }else{
            echo "<p>--------> cas 1 ECHEC ********** :".$retour."  </p>";
        }
        // cas 2 : un login et un mot de passe qui ne correspondent pas
        echo "<p> ---- cas 2 : un login et un mot de passe qui ne correspondent pas</p>";
        $login = 'dubois@club-internet.fr';
        $mdp = 'xxx';
        $retour = $dao->verifierLogin($login, $mdp);
        if(!$retour){
            echo "<p>--------> cas 2 Ok :".$retour."  </p>";
        }else{
            echo "<p>--------> cas 2 ECHEC ********** :".$retour."  </p>";
        }
            
        
        $dao->deconnecter();
        
        // Test de M_DaoProduit

        $dao = new M_DaoProduit();
        $dao->connecter();

        // Produit : test de sélection par référence
        echo "<p>Produit : test de sélection par référence</p>";
        $unPdt = $dao->getOneById('m02');
        var_dump($unPdt);

        // Produit : test de sélection de tous les enregistrements
        echo "<p>Produit : test de sélection de tous les enregistrements</p>";
        $lesProds = $dao->getAll();
        var_dump($lesProds);
        
        // Produit : tous les produits d'une catégorie
        echo "<p>Produit : tous les produits d'une catégorie</p>";
        $lesProds = $dao->getListeProduitsParCateg('mas');
        var_dump($lesProds);

        $dao->deconnecter();
        
        
        ?>
    </body>
</html>
