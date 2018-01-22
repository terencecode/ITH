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
            <?php foreach ($tableauCapPiece as $key=>$value):?>
                    <tr>
                        <td bgcolor="#98C9A3" style="width:100px;"><?php echo $value['type_Capteur'] ?></td>
                        <td bgcolor="#98C9A3" style="width:100px;"><?php echo $value['type_piece'] ?></td>
                        <td bgcolor="#98C9A3" style="width:100px;"><?php if($value['power_state']==1): ?><label class="switch">
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
        <button class="button" type="button" id="Gestion">Gestion</button>
    </div>
</div>

