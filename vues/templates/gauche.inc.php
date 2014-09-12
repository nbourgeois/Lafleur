<!-- VARIABLES NECESSAIRES -->
<!-- Constantes globales  de includes/version.inc.php -->
<!-- $this->loginAuthentification : login si authentification ok -->
<!-- $this->listeCateg : tableau de <Enregistrement> avec les champs 'cat_code' et 'cat_libelle' -->
<ul class="menugauche">
    <p><b>Menu</b></p><p class="note"><?php echo NOM_VERSION." v. ".NUM_VERSION."<br/>".DESIGNATION_VERSION;?></p>
    <li><a href="./index.php" >Accueil</a></li>
    <hr/>
    <?php
    if (isset($this->loginAuthentification)){  
        echo "<h6>".$this->loginAuthentification."</h6>";
        echo "<li><a href=\".?controleur=accueil&action=seDeconnecter\">Se déconnecter</a></li>";
    }else{
        echo "<li><a href=\".?controleur=accueil&action=seConnecter\">Se connecter</a></li>";
    }  
    
    ?>
    <b>Nos produits</b>
    <li><a href=".?controleur=produit&action=afficherTous" >Tous</a></li>
<?php
    foreach ($this->listeCateg as $categ) {
        echo "<li><a href=\".?controleur=produit&action=afficherUneCateg&id=".$categ->cat_code."\" >".$categ->cat_libelle."</a></li>";
    }
?>
</ul>
