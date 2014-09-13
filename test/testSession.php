<?php
require_once("../includes/fonctions.inc.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>test Session authentifiée</title>
    </head>
    <body>
        <?php
        // Test de session
        echo "<h4>Test de la classe Session implémentant IAuthentifiable</h4>";
        
        // Ouverture d'une nouvelle session;
        Session::demarrer();
        echo "<p>Session ouverte</p>";

        // Test de valeur simple
        $valTest = '999';
        Session::set('donnee1', $valTest);
        $val = Session::get('donnee1');
        echo "<p>----> test de get - donnee1 : " . $val . " - ";
        echo ($val == $valTest) ? " test REUSSI </p>" : " *** ECHEC du test *** </p>";

        // test de d'écriture des valeurs d'authentification
        Session::authentifier(array('auth1' => 'valeur1', 'auth2' => 'valeur2'));
        echo "<p>Session authentifiée</p>";

        // test de récupération d'une valeur d'authentification
        $val = Session::getAuth('auth2');
        echo "<p>----> test de getAuth - auth2 : " . $val . "</p>";

        // test de vérification de l'ensemble des valeurs d'authentification
        // cas nominal 
        if (Session::estAuthentifie(array('auth1', 'auth2'))) {
            echo "<p>----> test d'authentification correcte REUSSI </p>";
        } else {
            echo "<p>----> *** ECHEC du test d'authentification correcte *** </p>";
        }
        // cas d'échec 
        if (!Session::estAuthentifie(array('data1', 'auth2'))) {
            echo "<p>----> test d'authentification <b><i>incorrecte</i></b> REUSSI </p>";
        } else {
            echo "<p>----> *** ECHEC du test d'authentification <b><i>incorrecte</i></b> *** </p>";
        }

        // test de fermeture de la session
        echo "<p>Fermeture de la session</p>";
        Session::finAuthentification();
        $sid = session_id();
        echo (empty($sid)) ? "<p>---->test de fermeture de la session REUSSI <p>" : "<p>----> *** ECHEC du test de fermeture de la session <p>";
        // Test de valeur simple : il doit échouer
        $val = Session::get('donnee1');
        echo "<p>----> test de get - donnee1 : " . $val . " - ";
        echo ($val == $valTest) ? " test REUSSI </p>" : " *** ECHEC du test *** </p>";
        
        ?>
    </body>
</html>
