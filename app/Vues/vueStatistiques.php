<?php $this->titre = "Statistiques"; ?>

<div id="body">
  <table style="width:60%">
    <tr>
      <th>Type Capteur</th>
      <th>Valeure</th>
    </tr>
    <?php foreach ($trames as $key => $trame): ?>
      <tr>
        <td>
          <?php if ($trame['c'] == 3): ?>
            Température
          <?php endif; ?>
          <?php if ($trame['c'] == 4): ?>
            Humidité
          <?php endif; ?>
          <?php if ($trame['c'] == 5): ?>
            Lumiére
          <?php endif; ?>
        </td>
        <td>
          <?php echo $trame['v']; ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>

<style>
table {
  margin: auto;
}

table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}

th, td {
  padding: 20px;
}
</style>
