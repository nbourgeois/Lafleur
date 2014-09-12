<!-- VARIABLES NECESSAIRES -->
<!-- $this->message : à afficher sous le formulaire -->
<h3>Dites-le avec Lafleur</h3>
<p><img src="../vues/images/accueil.jpg" alt="image d'accueil" /></p>
<p> Appelez notre service commercial au 03.22.84.65.74 pour recevoir un bon de commande</p>
<?php
if (isset($this->message)) {
    echo "<strong>" . $this->message . "</strong>";
}
?>