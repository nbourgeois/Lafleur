<?php
// Constantes globales
define("NOM_VERSION", "Lafleur MVC Objet");
define("NUM_VERSION", "2.0");
define("DESIGNATION_VERSION","12/09/2014 - MVC-objet - Sessions-objet");

/******************************************************************************
 * 
 * NOTES DE VERSION
 * Version 2.0
 * - version précédente  1.1 de 2013
 * - introduction de classes métier
 * - le contrôleur général n'inclut pas la vue, c'est le contrôleur spécialisé
 * - la structure MVC est revue :
     -> controleurs contient les classes controleur spécialisées et les services web (pour Ajax)
     -> modeles contient les classes métier et les classes Dao
     -> vues contient la classe générique Vue, les templates ainsi que les fichiers d'inclusion : css, javascript, images, inclusions HTML
     -> includes contient les bibliothèques externes, les classes utilitaires, les fonctions et déclarations globales PHP à inclure
     -> test contient les programmes de tests unitaires
     -> public contient les fichiers publiquement accessibles, donc le contrôleur général
 * 
 * 
14/10/2013
  modification : le titre affiche le libellé de la catégorie de produits sélectionnés dans afficherUneCateg
06/10/2012
  version MVC Objet : inspirée du blog de Erwan Gallene

01/10/2012
  Site Lafleur
  version Session : 
    - authentification et contrôle d'accès par variables de session
    - mise en oeuvre d'une classe statique MaSession

 */