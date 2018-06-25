<?php

require_once "Modeles/modele.php";


class Capteurs extends Modele
{

    public function afficherEtat($id_piece)
    {
        $sql = "SELECT * FROM capteur WHERE id_piece=:id_piece";
        $resultatRequete = $this->executerRequete($sql, array('id_piece' => $id_piece))->fetchAll(PDO::FETCH_ASSOC);
        return $resultatRequete;
    }

    public function joinCapteurPiece($id_gerant)
    {
        $sql = "SELECT * FROM capteur JOIN piece ON capteur.id_piece=piece.id_piece WHERE piece.id_gerant=:id_gerant";
        $resultatRequete = $this->executerRequete($sql, array('id_gerant' => $id_gerant))->fetchAll(PDO::FETCH_ASSOC);
        return $resultatRequete;
    }

    public function enregistrerCapteur($valeurs)
    {
        $sql = "INSERT INTO capteur (type_Capteur,power_state, id_piece,nom_Capteur) VALUES ('$valeurs[0]', '$valeurs[1]','$valeurs[3]','$valeurs[6]')";
        $resultatRequete = $this->executerRequete($sql);
        return $resultatRequete;
    }

    public function chercher_id_piece($type_piece)
    {
        $sql = "SELECT id_piece FROM piece WHERE type_piece=:type_piece";
        $resultatRequete = $this->executerRequete($sql, array('type_piece' => $type_piece))->fetchAll(PDO::FETCH_ASSOC);
        return $resultatRequete;
    }
    public function chercher_id_pieceG($id_gerant)
    {
        $sql = "SELECT id_piece FROM piece WHERE id_gerant=:id_gerant ";
        $resultatRequete = $this->executerRequete($sql, array('id_gerant' => $id_gerant))->fetchAll(PDO::FETCH_ASSOC);
        return $resultatRequete;
    }


    public function supprimer_capteur($nom_Capteur)
    {
        $sql = "DELETE FROM capteur WHERE nom_Capteur=:nom_Capteur";
        $resultatRequete = $this->executerRequete($sql, array('nom_Capteur' => $nom_Capteur));
        return $resultatRequete;
    }

    public function supprimer_capteur_piece($id_piece)
    {
        $sql = "DELETE FROM capteur WHERE id_piece=:id_piece ";
        $resultatRequete = $this->executerRequete($sql, array('id_piece' => $id_piece));
        return $resultatRequete;
    }

    public function update_capteur($Update)
    {
        $sql = "UPDATE capteur SET nom_Capteur='$Update[0]',id_piece='$Update[1]',power_state='$Update[2]' WHERE nom_Capteur='$Update[3]'";
        $resultatRequete = $this->executerRequete($sql);//, array('Update'=>$Update))->fetch();
        return $resultatRequete;
    }

    public function recuperer_trams()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=002B");
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);
        $data_tab = str_split($data,33);

        $lumiere = [];
        $humidite = [];
        $temperature = [];
        for($i=0, $size=count($data_tab); $i<$size - 1; $i++) {
            list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) = sscanf($data_tab[$i],"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
            $trame = array('t' => $t, 'o' => $o, 'r' => $r, 'c' => $c, 'n' => $n, 'v' => $v, 'a' => $a, 'x' => $x, 'year' => $year, 'month' => $month, 'day' => $day, 'hour' => $hour, 'min' => $min, 'sec' => $sec);
            //$trames[$i] = $trame;
            if ($trame['c'] == 3) {
              $temperature[] = $trame;
            }
            if ($trame['c'] == 4) {
              $humidite[] = $trame;
            }
            if ($trame['c'] == 5) {
              $lumiere[] = $trame;
            }
        }
        $trames = array('lumiere' => $lumiere, 'humidite' => $humidite, 'temperature' => $temperature);
        return $trames;
    }

}
?>
