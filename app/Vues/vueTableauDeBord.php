<!-- Titre de la page -->
<?php $this->titre = "Tableau De Bord"; ?>

<div class="row">

    <div class="col-xs-5 col-sm-4 col-md-7 col-xl-5" id="background-image"></div>
    <div class="col-xs-7 col-sm-8 col-md-4 col-xl-7">

        <form action="" method="post">
            <label for="habitation"><p>Choix de l'habitation :</p></label>
            <select name="habitation">
                <?php foreach ($habitations as $key=>$value):?>
                    <option value="<?php echo $value['rue_habitation'] ?>"><?php echo $value['rue_habitation'] ?></option>
                <?php endforeach;?>

            </select>
            <p>Vous êtes chez <?php echo $nom_rue ?></p>
            <input class="submit-button" name="go" type="submit" value="Go!">
        </form></br>
<?php if($i==1):?>
        <table id="tableau">
            <thead>
            <tr style="width: 500px; height:0;">
                <th bgcolor="#5f9ea0" style="width:100px;">Type de capteur</th>
                <th bgcolor="#5f9ea0" style="width:100px;">Nom du capteur</th>
                <th bgcolor="#5f9ea0" style="width:100px;">Pièce</th>
                <th bgcolor="#5f9ea0" style="width:100px;">Dernière valeur enregistrée</th>
                <th bgcolor="#5f9ea0" style="width:100px;">État</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tableauCapPiece as $key=>$value):?>
                    <tr>
                        <td bgcolor="#98C9A3" style="width:100px; text-align:center;"><?php echo $value['type_Capteur'] ?></td>
                        <td bgcolor="#98C9A3" style="width:100px; text-align:center;"><?php echo $value['nom_Capteur'] ?></td>
                        <td bgcolor="#98C9A3" style="width:100px; text-align:center;"><?php echo $value['type_piece'] ?></td>
                        <td bgcolor="#98C9A3" style="width:100px; text-align:center;">0</td>
                        <td bgcolor="#98C9A3" style="width:100px; text-align:center;"><?php if($value['power_state']==1): ?><label class="switch">
                                <input type="checkbox" name="on_off" checked>
                                <span class="slider round"></span>
                            </label><?php endif;?>
                        <?php if($value['power_state']==0):?><label class="switch">
                            <input type="checkbox" name="on_off">
                            <span class="slider round"></span>
                        </label><?php endif;?></td>
                    </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        </br>
        <!--<button class="button" type="button" id="button_piece">Modifier</button>
        <div id="modal_piece" class="modal">


            <div class="modal-content">
                <span class="close">&times;</span>
                <h1>Modifier les caractéristiques du capteur : </h1></br>
                <form action="" method="post">


                    <label for="nom_Capteur"><p>Nouveau nom du capteur :</p></label>
                    <input type="number" name="long_piece"
                           placeholder="Longueur" id="long_piece" min="0" >

                    <label for="nom_Capteur"><p>Nouvel état du capteur :</p></label>
                    <input type="number" name="long_piece"
                           placeholder="Longueur" id="long_piece" min="0" >

                    <label for="TYPE"><p>Nouvel emplacement du capteur :</p></label>
                    <input type="text" name="type_piece"
                           placeholder="Type de piece" id="Type_de_piece"></br>



                    <input class="submit-button" name="Supprimer_capteur" type="submit" value="Enregistrer">
                    <input class="cancel-button" name="Supprimer_capteur" type="submit" value="Annuler">

                    <label Id="IdChampManquant" hidden="true"  >champ(s) manquant(s) </label>
                </form>
            </div>
        </div>
        <script>
            // Get the modals
            var modal = document.getElementById('modal_piece');

            // Get the buttons that opens the modal
            var btn = document.getElementById("button_piece");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];


            // When the user clicks the buttons, open the modals
            btn.onclick = function () {
                modal.style.display = "block";
            };

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            };

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    </div>-->
</div>
<?php endif?>
