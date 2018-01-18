<!-- Titre de la page -->
<?php $this->titre = "Tableau De Bord"; ?>

<div class="row">

    <div class="col-xs-5 col-sm-4 col-md-7" id="background-image"></div>
    <div class="col-xs-7 col-sm-8 col-md-4">

        <table id="tableau">
            <thead>
            <tr style="width: 500px; height:0;">
                <th bgcolor="#5f9ea0" style="width:100px;">Type de capteur</th>
                <th bgcolor="#5f9ea0" style="width:100px;">Pièce</th>
                <th bgcolor="#5f9ea0" style="width:100px;">Etat</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($capteurs as $key=>$value):?>
                <?php foreach ($value as $key =>$value2):?>
                    <tr>
                        <td bgcolor="#98C9A3" style="width:100px;"><?php echo $value2 ?></td>
                        <td bgcolor="#98C9A3" style="width:100px;"><?php echo $pieces ?></td>

                    </tr>
                <?php endforeach;?>
            <?php endforeach;?>
            </tbody>
        </table>

    </div>
</div>

