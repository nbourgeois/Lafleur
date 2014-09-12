<?php

class M_DaoProduit extends M_DaoGenerique {

    function __construct() {
        $this->nomTable = "produit";
        $this->nomClefPrimaire = "pdt_ref";
    }
    
    /**
     * retourne les produits d'une catégorie donnée
     * @param string $codeCat
     * @return Array de Produit(s)
     */
    function getListeProduitsParCateg($codeCat) {
        $retour = null;
        // Requête textuelle
        $sql = "SELECT * FROM $this->nomTable WHERE pdt_categorie=? ORDER BY $this->nomClefPrimaire";
        try {
            // préparer la requête PDO
            $queryPrepare = $this->pdo->prepare($sql);
            // exécuter la requête PDO
            if ($queryPrepare->execute(array($codeCat))) {
                // si la requête réussit :
                // initialiser le tableau d'objets à retourner
                $retour = array();
                // pour chaque enregistrement retourné par la requête
                while ($enregistrement = $queryPrepare->fetch(PDO::FETCH_ASSOC)) {
                    // construir un objet métier correspondant
                    $unObjetMetier = $this->enregistrementVersObjet($enregistrement);
                    // ajouter l'objet au tableau
                    $retour[] = $unObjetMetier;
                }
            }
        } catch (PDOException $e) {
            echo get_class($this) . ' - '.__METHOD__ . ' : '. $e->getMessage();
        }
        return $retour;
    }

    public function enregistrementVersObjet($enreg) {
/*
  `pdt_ref` char(3) NOT NULL DEFAULT '',
  `pdt_designation` varchar(50) NOT NULL DEFAULT '',
  `pdt_prix` decimal(5,2) NOT NULL DEFAULT '0.00',
  `pdt_image` varchar(50) NOT NULL DEFAULT '',
  `pdt_categorie` char(3) NOT NULL DEFAULT '',
 */   
        // récupération de l'objet Categorie d'après son code
        $codeCateg=   $enreg['pdt_categorie'];
        $dao = new M_DaoCategorie();
        $dao->connecter();
        $uneCateg = $dao->getOneById($codeCateg);
        $retour = new M_Produit($enreg['pdt_ref'], $enreg['pdt_designation'], $enreg['pdt_prix'], $enreg['pdt_image'], $uneCateg );
        return $retour;        
    }

    public function objetVersEnregistrement($objetMetier) {
/*
    private $ref;
    private $designation;
    private $prix;
    private $image;
    private $categorie;

 */
        // récupération du code de la catégorie
        $codeCat = NULL;
        $laCateg = $objetMetier->getCategorie();
        if (!is_null($laCateg)){
            $codeCat = $laCateg->getCode();
        }
        $retour = array(
            ':ref' => $objetMetier->getRef(),
            ':designation' => $objetMetier->getDesignation(),
            ':prix' => $objetMetier->getPrix(),
            ':image' => $objetMetier->getImage(),
            ':categorie' => $codeCat
        );
        return $retour;
    }

    public function insert($objetMetier) {
        
    }

    public function update($idMetier, $objetMetier) {
        
    }

}

?>
