<!-- VARIABLES NECESSAIRES -->
<!-- Constantes globales  de includes/version.inc.php -->
<!-- loginAuthentification : login si authentification ok -->
<!-- listeCateg : tableau d'objets Categorie -->
<ul class="menugauche">
    <p><b>Menu</b></p><p class="note"><?php echo NOM_VERSION." v. ".NUM_VERSION."<br/>".DESIGNATION_VERSION;?></p>
    <li><a href="./index.php" >Accueil</a></li>
    <hr/>
    <?php
    if (!is_null($this->lire('loginAuthentification'))){  
        echo "<h6>".$this->lire('loginAuthentification')."</h6>";
        echo "<li><a href=\".?controleur=accueil&action=seDeconnecter\">Se d&eacute;connecter</a></li>";
    }else{
        echo "<li><a href=\".?controleur=accueil&action=seConnecter\">Se connecter</a></li>";
    }  
    
    ?>
    <b>Nos produits</b>
    <li><a href=".?controleur=produit&action=afficherTous" >Tous</a></li>
<?php
    foreach ($this->lire('listeCateg') as $categ) {
        echo "<li><a href=\".?controleur=produit&action=afficherUneCateg&id=".$categ->getCode()."\" >".$categ->getLibelle()."</a></li>";
    }
?>
</ul>
