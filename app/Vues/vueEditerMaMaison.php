<!-- Titre de la page -->
<?php $this->titre = "Editer Ma Maison"; ?>

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
                    <form action="#" method="post">
                        <label for="dimensions"><p>Dimensions :</p></label>
                        <input type="text" name="longueur"
                               placeholder="longueur"></br>
                        <input type="text" name="largeur"
                               placeholder="largeur"></br>
                        <input type="text" name="hauteur"
                               placeholder="hauteur"></br>
                        <label for="type_de_piece"><p>Type de pièce :</p></label>
                        <select class="choix">
                            <option value="chambre">Chambre</option>
                            <option value="cuisine">Cuisine</option>
                            <option value="bureau">Bureau</option>
                            <option value="salon">Salon</option>
                            <option value="autre">Autre</option>
                        </select></br>
                        <label for="emplacement"><p>Emplacement :</p></label>
                        <input type="text" name="emplacement"></br>
                        <label><p>Description :</p></label>
                        <textarea class="commentaire" name="Description" rows="4" cols="40"></textarea>
                        <input class="submit-button" name="valider" type="submit" value="Valider">
                        <input class="cancel-button" name="valider" type="submit" value="Annuler">
                    </form>


                </div>

            </div>
            <!-- Modale des capteurs-->


            <!-- The Modal -->
            <div id="modal_capteur" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h1>Ajouter un capteur :</h1>
                    <form action="" method="post">
                        <label for="type_capteur" id="Type"><p>Type de capteur :</p></label>
                        <input type="text" name="type_capteur"></br>
                        <label for="fonction_capteur" id="Fonction"><p>Fonction du capteur :</p></label>
                        <input type="text" name="capteur"></br>
                        <label for="piece_capteur" id="Piece"><p>Pièce du capteur :</p></label>
                        <select name="id_piece">
                            <option value="chambre">Chambre</option>
                            <option value="cuisine">Cuisine</option>
                            <option value="bureau">Bureau</option>
                            <option value="salon">Salon</option>
                        </select>
                        <label for="etat_capteur" id="Etat"><p>Etat du capteur :</p></label>
                        <select name="on_off">
                            <option value="ON">ON</option>
                            <option value="OFF">OFF</option>
                        </select>
                        <label><p>Description :</p></label>
                        <textarea class="commentaire" name="Description" rows="4" cols="40"></textarea>
                        <input class="submit-button" name="valider" type="submit" value="Valider">
                        <input class="cancel-button" name="valider" type="submit" value="Annuler">
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
