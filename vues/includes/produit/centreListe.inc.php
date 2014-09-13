<!-- VARIABLES NECESSAIRES -->
<!-- listeProduits : tableau d'objets Produit -->
<?php
echo "<h3>Liste des produits <br/>";
if (! is_null($this->lire('libelleCateg'))){
    echo " de la catégorie ".$this->lire('libelleCateg')."</h3>\n";
}else{
    echo "</h3>\n";
}
echo "<table>\n";
echo "<tr><th >designation</th><th>prix</th><th>image</th></tr>\n";
// pour chaque enregistrement
foreach ($this->lire('listeProduits') as $produit) {
    echo "<tr>\n";
    // première colonne, nom du produit
    echo "<td>" . $produit->getDesignation() . "</td>\n";
    // deuxième colonne,prix
    echo "<td>" . $produit->getPrix() . "</td>\n";
    // troisième colonne image
    echo "<td><img src=\"../vues/images/" . $produit->getImage() . ".jpg\"> </img></td>\n";
    echo "</tr>\n";
}
echo "</table>\n";
?>
