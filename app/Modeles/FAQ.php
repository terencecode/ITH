<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 21/01/2018
 * Time: 14:24
 */
equire_once "Modeles/modele.php";

class FAQ extends FAQ
{


    public function enregistrerQuestion($valeurs)
    {
        $sql = "INSERT INTO question (question) VALUES ('$valeurs[0]',)";
        $resultatrequete = $this->executerRequete($sql);
        return $resultatrequete;
    }

}

?>