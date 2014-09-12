<!DOCTYPE html >
<html lang="fr">
    <head>
        <meta  content="text/html;charset=UTF-8" />
        <link rel="stylesheet" href="../vues/css/styleLargeurFixe.css" />
        <title><?php echo $this->titreVue; ?></title>
    </head>
    <body>
	<div id="conteneur">
            <div id="header">
               <?php include("$this->entete"); ?>
            </div>
            <div id="gauche">
               <?php include("$this->gauche"); ?>
            </div>
            <div id="centre">
                <?php include("$this->centre");?>
            </div>
            <div id="pied">
                <?php include("$this->pied");?>
            </div>
        </div>
    </body>
</html>
