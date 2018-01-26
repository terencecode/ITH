<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 21/01/2018
 * Time: 14:24
 */
require_once "Modeles/modele.php";


class Aide extends Modele
{


    public function enregistrerQuestion($valeurs)
    {
        $sql = "INSERT INTO question (question) VALUES ('$valeurs[0]')";
        $resultatrequete = $this->executerRequete($sql);
        return $resultatrequete;
    }
    public function voirQuestion($question)
    {
        $sql = "SELECT question FROM question('$question') ";
        $resultatRequete = $this->executerRequete($sql,array('question' => $question))->fetch();
return $resultatRequete;
    }
}
?>