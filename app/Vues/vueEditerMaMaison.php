<!-- Titre de la page -->
<?php $this->titre = "Editer Ma Maison"; ?>
<script src="public/js/EditerMaMaison.js"></script>

<div id="body">
    <div class="row">


        <div id="background-image" class="col-xs-5 col-sm-4 col-md-4 col-lg-4"></div>

        <div id="form-container" class="col-xs-7 col-sm-8 col-md-8 col-lg-8">

            <!-- Trigger/Open The Modal -->
            <button class="button" type="button" id="button_piece">Ajouter une pièce</button>
            </br>
            <button class="button" type="button" id="button_capteur">Ajouter un capteur</button>
            </br>

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
                               placeholder="Largeur" id="largeur_piece" min="0"></br>

                        <input type="number" name="hauteur_piece"
                               placeholder="Hauteur" id="hauteur_piece" min="0"></br>

                        <label for="TYPE"><p>Type de pièce :</p></label>
                        <input type="text" name="type_piece"
                               placeholder="Type de piece" id="Type_de_piece"></br>

                        <label><p>Emplacemnent :</p></label></br>
                        <textarea class="commentaire" name="Emplacemnent" id="Emplacemnent" rows="4" cols="40"></textarea>
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
                        <input type="text" name="type_ca"></br>



                        <label for="piece_capteur" id="Piece"><p>Pièce du capteur :</p></label>

                        <select name="type_pieceC">
                            <?php foreach ($pieces as $key=>$value):?>
                            <?php foreach ($value as $key =>$value2):?>
                            <option value=""><?php echo $value2 ?></option>
                            <?php endforeach;?>
                            <?php endforeach;?>

                        </select>
                        <html>
                        <head>
                            <meta name="viewport" content="width=device-width, initial-scale=1">
                            <style>
                                .switch {
                                    position: relative;
                                    display: inline-block;
                                    width: 60px;
                                    height: 34px;
                                }

                                .switch input {display:none;}

                                .slider {
                                    position: absolute;
                                    cursor: pointer;
                                    top: 0;
                                    left: 0;
                                    right: 0;
                                    bottom: 0;
                                    background-color: #ccc;
                                    -webkit-transition: .4s;
                                    transition: .4s;
                                }

                                .slider:before {
                                    position: absolute;
                                    content: "";
                                    height: 26px;
                                    width: 26px;
                                    left: 4px;
                                    bottom: 4px;
                                    background-color: white;
                                    -webkit-transition: .4s;
                                    transition: .4s;
                                }

                                input:checked + .slider {
                                    background-color: #2196F3;
                                }

                                input:focus + .slider {
                                    box-shadow: 0 0 1px #2196F3;
                                }

                                input:checked + .slider:before {
                                    -webkit-transform: translateX(26px);
                                    -ms-transform: translateX(26px);
                                    transform: translateX(26px);
                                }

                                /* Rounded sliders */
                                .slider.round {
                                    border-radius: 34px;
                                }

                                .slider.round:before {
                                    border-radius: 50%;
                                }
                            </style>
                        </head>
                        <body>
                        <p>Etat du capteur : </p></br>

                        <label class="switch">
                            <input type="checkbox" name="on_off">
                            <span class="slider round"></span>
                        </label>
                        </body>
                        </html>

                        <label><p>Description :</p></label>
                        <textarea class="commentaire" name="Description" rows="4" cols="40"></textarea>
                        <input class="submit-button" name="valider-Capteur" type="submit" value="Valider">
                        <input class="cancel-button" name="Annuler" type="submit" value="Annuler">
                    </form>

                </div>

            </div>
            <!-- Ajouter la partie "script" pour créer la modal, mais le copié/collé ne fonctinne pas-->
            <script>
                // Get the modals
                var modal = document.getElementById('modal_piece');
                var modal2 = document.getElementById('modal_capteur');

                // Get the buttons that opens the modal
                var btn = document.getElementById("button_piece");
                var btn2 = document.getElementById("button_capteur");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];
                var span2 = document.getElementsByClassName("close")[1];


                // When the user clicks the buttons, open the modals
                btn.onclick = function () {
                    modal.style.display = "block";
                };

                btn2.onclick = function () {
                    modal2.style.display = "block"
                };

                // When the user clicks on <span> (x), close the modal
                span.onclick = function () {
                    modal.style.display = "none";
                };

                span2.onclick = function () {
                    modal2.style.display = "none";
                };

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function (event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                    if (event.target == modal2) {
                        modal2.style.display = "none";
                    }
                }
            </script>

        </div>

    </div>
</div>
