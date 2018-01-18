<?php

require_once "Modeles/modele.php";


class habitation extends Modele
{

  public function chercherHabitations($id)
  {
    $sql = "";
    $resultatRequete = $this->executerRequete($sql, array('id_gerant' => $id_gerant))->fetch();
    return $resultatRequete;
  }

}
