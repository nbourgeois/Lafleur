<?php
// inclusions globales
include_once ("../includes/version.inc.php");           // données de version
include_once ("../includes/fonctions.inc.php");         // autoload, getParametre, getNomClasse...
include_once ("../includes/parametresSGBD.inc.php");    // paramètres d'accès à la BD



//recherche du nom du controleur 'accueil' par défaut
$nomControleur= getParametre('controleur', 'accueil');
//recherche du nom de l'action 'defaut' par défaut
$action= getParametre('action', 'defaut');

// Formation du nom du contrôleur
$nomClasseControleur= getNomClasse('C',$nomControleur); 
// Instanciation du controleur
$objetControleur=new $nomClasseControleur();

// Déclenchement de l'action
$objetControleur->$action();
