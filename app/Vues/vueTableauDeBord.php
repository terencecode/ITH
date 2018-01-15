<!-- Titre de la page -->
<?php $this->titre = "Tableau De Bord"; ?>

<div class="row">

    <div class="col-xs-5 col-sm-4 col-md-7" id="background-image"></div>
    <div class="col-xs-7 col-sm-8 col-md-4">

        <form>
        <input type="button" onclick="ajouterLigne();" value="Ajouter" />
        </form>

        <table id="tableau">
            <thead>
            <tr style="width: 500px; height:0;">
                <th bgcolor="#5f9ea0" style="width:100px;">Type (Capteur/Actionneur)</th>
                <th bgcolor="#5f9ea0" style="width:100px;">Fonction</th>
                <th bgcolor="#5f9ea0" style="width:100px;">Pièce</th>
                <th bgcolor="#5f9ea0" style="width:100px;">Etat</th>
            </tr>
            </thead>
            <tbody>
            <?php //foreach ($pieces as $key=>$value):?>
                <?php //foreach ($value as $key =>$value2):?>
                    <!--<option value=""><?php //echo $value2 ?></option>-->
                <?php //endforeach;?>
            <?php //endforeach;?>
            </tbody>
        </table>


        <!--<script>
            var i = 0;
            function ajouterLigne()
            {
                i++;

                var ligne = tableau.insertRow(-1);

                var colonne1 = ligne.insertCell(0);
                colonne1.innerHTML += '<div style="text-align: center;">Capteur/Actionneur '+i +'</div>';

                var colonne2 = ligne.insertCell(1);
                colonne2.innerHTML += '<div style="text-align: center;">Fonction' +i+'</div>';

                var colonne3 = ligne.insertCell(2);
                colonne3.innerHTML += '<div style="text-align: center;">Salle '+i+'</div>';

                var colonne4 = ligne.insertCell(3);
                colonne4.innerHTML += '<div style="text-align:center;"><label class="switch"><input type="checkbox"><span class="slider round"></span></label></div>'
            }
        </script> -->

    </div>
</div>

