<!-- Titre de la page -->
<?php $this->titre = "Editer Ma Maison"; ?>

<div id="body">
    <div class="row">


        <div id="background-image" class="col-xs-5 col-sm-4 col-md-4 col-lg-4"></div>

        <div id="form-container" class="col-xs-7 col-sm-8 col-md-8 col-lg-8">

            <form action="" method="post">
                <label for="habitation"><p>Choix de l'habitation :</p></label>
                <select name="habitation">
                    <?php foreach ($habitations as $key=>$value):?>
                        <?php foreach ($value as $key =>$value2):?>
                            <option value="<?php echo $value2 ?>"><?php echo $value2 ?>"</option>
                        <?php endforeach;?>
                    <?php endforeach;?>

                </select>
                <input class="submit-button" name="valider-Piece" type="submit" value="Go!">
            </form></br>

            <!-- Trigger/Open The Modal -->
            <button class="button" type="button" id="button_piece">Ajouter une pièce</button>
            </br>
            <button class="button" type="button" id="button_capteur">Ajouter un capteur</button>
            </br>
            <button class="button" type="button" id="button_piece2">Supprimer une pièce</button>
            </br>
            <button class="button" type="button" id="button_capteur2">Supprimer un capteur</button>
            </br>
            <button class="button" type="button" id="Gestion">Gestion</button>



            <!-- The Modal -->
            <div id="modal_piece" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                  <span class="close">&times;</span>
                  <h1>Ajouter une pièce :</h1>
                  <form action="" method="post">
                    <label for="dimensions"><p>Dimensions :</p></label>
                    <input type="number" name="long_piece"
                           placeholder="Longueur" id="long_piece" min="0" ></br>

                    <input type="number" name="largeur_piece"
                           placeholder="Largeur" id="largeur_piece"></br>

                    <input type="number" name="hauteur_piece"
                           placeholder="Hauteur" id="hauteur_piece"></br>

                        <label for="TYPE"><p>Type de pièce :</p></label>
                        <input type="text" name="type_piece"
                               placeholder="Type de piece" id="Type_de_piece"></br>

                        <label><p>Emplacemnent :</p></label></br>
                        <textarea class="commentaire" name="Emplacement" id="Emplacement" rows="4" cols="40"></textarea>
                        <input class="submit-button" name="valider-Piece" type="submit" value="Valider">
                        <input class="cancel-button" name="valider-Piece" type="submit" value="Annuler">
                        <label Id="IdChampManquant" hidden="true"  >champ(s) manquant(s) </label>
                    </form>
                </div>
            </div>
            <div id="modal_capteur" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h1>Ajouter un capteur :</h1>
                    <form action="" method="post">
                        <label for="type_capteur" id="Type"><p>Type de capteur :</p></label>
                        <select name="type_ca">
                            <option value="Temperature">Température</option>
                            <option value="Humidite">Humidité</option>
                            <option value="CO2">CO2</option>
                            <option value="Presence">Présence</option>
                            <option value="Luminosite">Luminosité</option>
                            <option value="Fumee">Fumée</option>
                        </select>



                        <label for="piece_capteur" id="Piece"><p>Pièce du capteur :</p></label>

                        <select name="type_pieceC">
                            <?php foreach ($pieces as $key=>$value):?>
                                <?php foreach ($value as $key =>$value2):?>
                                    <option value="<?php echo $value2 ?>"><?php echo $value2 ?></option>
                                <?php endforeach;?>
                            <?php endforeach;?>

                        </select>

                        <body>
                        <p>Etat du capteur : </p></br>

                        <label class="switch">
                            <input type="checkbox" name="on_off">
                            <span class="slider round"></span>
                        </label>
                        </body>
                        </html>

                        <label><p>Nom de votre capteur (différent des autres) :</p></label>
                        <input type="text" name="Nom_capteur"></br>
                        <input class="submit-button" name="valider-Capteur" type="submit" value="Valider">
                        <input class="cancel-button" name="Annuler" type="submit" value="Annuler">
                    </form>

                </div>


            </div>
            <div id="modal_piece2" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h1>Supprimer une pièce :</h1>
                    <form action="" method="post">
                        <label for="piece_capteur" id="Piece"><p>Pièce à supprimer :</p></label>

                        <select name="Supprimer_piece">
                            <?php foreach ($pieces as $key=>$value):?>
                                <?php foreach ($value as $key =>$value2):?>
                                    <option value="<?php echo $value2 ?>"><?php echo $value2 ?></option>
                                <?php endforeach;?>
                            <?php endforeach;?>

                        </select>



                        <input class="submit-button" name="Supprimer_Piece" type="submit" value="Valider">
                        <input class="cancel-button" name="Supprimer-Piece" type="submit" value="Annuler">
                        <label Id="IdChampManquant" hidden="true"  >champ(s) manquant(s) </label>
                    </form>
                </div>
            </div>
            <div id="modal_capteur2" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h1>Supprimer un capteur :</h1>
                    <form action="" method="post">
                        <label for="piece_capteur" id="Piece"><p>Piece du capteur à supprimer :</p></label>

                        <select name="Supp-piece">
                            <?php foreach ($pieces as $key=>$value):?>
                                <?php foreach ($value as $key =>$value2):?>
                                    <option value="<?php echo $value2 ?>"><?php echo $value2 ?></option>
                                <?php endforeach;?>
                            <?php endforeach;?>
                        </select>
                        <input class="submit-button" name="supp-piece2" type="submit" value="Selectionner">
                        <label for="piece_capteur" id="Piece"><p>Capteur à supprimer :</p></label>
                        <select name="Suppcapteur">
                            <?php foreach ($capteurs as $key=>$value):?>
                                <?php foreach ($value as $key =>$value2):?>
                                    <option value="<?php echo $value2 ?>"><?php echo $value2 ?></option>
                                <?php endforeach;?>
                            <?php endforeach;?>
                        </select>


                        <input class="submit-button" name="Supprimer_capteur" type="submit" value="Valider">
                        <input class="cancel-button" name="Supprimer_capteur" type="submit" value="Annuler">
                        <label Id="IdChampManquant" hidden="true"  >champ(s) manquant(s) </label>
                    </form>
                </div>
                <!-- Ajouter la partie "script" pour créer la modal, mais le copié/collé ne fonctinne pas-->
                <script>
                    // Get the modals
                    var modal = document.getElementById('modal_piece');
                    var modal2 = document.getElementById('modal_capteur');
                    var modal3 = document.getElementById('modal_piece2');
                    var modal4 = document.getElementById('modal_capteur2');

                    // Get the buttons that opens the modal
                    var btn = document.getElementById("button_piece");
                    var btn2 = document.getElementById("button_capteur");
                    var btn3 = document.getElementById("button_piece2");
                    var btn4 = document.getElementById("button_capteur2");

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];
                    var span2 = document.getElementsByClassName("close")[1];
                    var span3 = document.getElementsByClassName("close")[2];
                    var span4 = document.getElementsByClassName("close")[3];


                    // When the user clicks the buttons, open the modals
                    btn.onclick = function () {
                        modal.style.display = "block";
                    };

                    btn2.onclick = function () {
                        modal2.style.display = "block"
                    }

                    btn3.onclick = function () {
                        modal3.style.display = "block"
                    };
                    btn4.onclick = function () {
                        modal4.style.display = "block"
                    };

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function () {
                        modal.style.display = "none";
                    };

                    span2.onclick = function () {
                        modal2.style.display = "none";
                    };
                    span3.onclick = function () {
                        modal3.style.display = "none";
                    };
                    span4.onclick = function () {
                        modal4.style.display = "none";
                    };

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function (event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                        if (event.target == modal2) {
                            modal2.style.display = "none";
                        }
                        if (event.target == modal3) {
                            modal3.style.display = "none";
                        }
                    }
                </script>

            </div>

        </div>
    </div>
