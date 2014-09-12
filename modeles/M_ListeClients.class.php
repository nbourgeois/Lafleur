<?php

class M_ListeClients extends Modele {
	protected $table='clientconnu';
	protected $clePrimaire='clt_code';
        
/**
 * verifierLogin
 * @param string $login
 * @param string $mdp
 * @return boolean 
 */
function verifierLogin($login, $mdp) {
    $cnx = $this->connecter();
    if ($cnx) {
        $sql = "SELECT COUNT(*) nbRes FROM $this->table WHERE clt_email=:l AND clt_motPasse=:m";
        $stmt = $cnx->prepare($sql);
        $execute = $stmt->execute(array(':l' => $login, ':m' => $mdp));
        $row= $stmt->fetch(PDO::FETCH_ASSOC);
        $resu = ($row['nbRes'] == 1);
    } else {
        $resu = false;
    }
    $this->deconnecter();
    return $resu;
}
        
}

?>
