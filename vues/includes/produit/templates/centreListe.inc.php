<!-- VARIABLES NECESSAIRES -->
<!-- $this->listeProduits : tableau de <Enregistrement> avec les champs 'pdt_designation', 'pdt_prix' et 'pdt_image' -->
<?php
echo "<h3>Liste des produits <br/>";
if (isset($this->libelleCateg)){
    echo " de la catégorie ".$this->libelleCateg."</h3>\n";
}else{
    echo "</h3>\n";
}
echo "<table>\n";
echo "<tr><th >designation</th><th>prix</th><th>image</th></tr>\n";
// pour chaque enregistrement
foreach ($this->listeProduits as $produit) {
    echo "<tr>\n";
    // première colonne, nom du produit
    echo "<td>" . $produit->pdt_designation . "</td>\n";
    // deuxième colonne,prix
    echo "<td>" . $produit->pdt_prix . "</td>\n";
    // troisième colonne image
    echo "<td><img src=\"../vues/images/" . $produit->pdt_image . ".jpg\"> </img></td>\n";
    echo "</tr>\n";
}
echo "</table>\n";
?>
