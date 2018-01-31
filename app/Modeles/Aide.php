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
    public function voirQuestion()
    {
        //Requete sql
        $sql = "SELECT question, id_question, reponse FROM question";
        $resultatRequete = $this->executerRequete($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $resultatRequete;
    }

    public function enregistrerReponse($reponse, $id)
    {
        $sql = "UPDATE question SET reponse=:reponse WHERE id_question=:id";
        $resultatrequete = $this->executerRequete($sql,array(
            "reponse"=>$reponse,
            "id"=>$id
        ));
        return $resultatrequete;
    }

    public function supprimerQuestion($id)
    {
        $sql = "DELETE FROM question WHERE id_question = :id";
        $resultatrequete = $this->executerRequete($sql, array('id' => $id));
        return $resultatrequete;
    }

    
}
?>