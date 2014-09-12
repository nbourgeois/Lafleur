<!-- VARIABLES NECESSAIRES -->
<!-- $this->message : à afficher sous le formulaire -->
<form method="post" action=".?controleur=accueil&action=authentifier">
    <fieldset>
        <label for="login">e-mail :</label>
        <input type="text" name="login" id="login"></input><br/>
        <label for="mdp">mot de passe :</label>
        <input type="password" name="mdp" id="mdp"></input><br/>
        <input type="submit" value="Valider" ></input>
    </fieldset>
</form>
<?php
if (isset($this->message)) {
    echo "<strong>".$this->message."</strong>";
}
?>