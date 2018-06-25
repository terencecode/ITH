<?php $this->titre = "Statistiques"; ?>

<div id="body">

  <div class="table">
    <h2>Lumiere</h2>
    <table id="lumiere">
      <thead>
        <td>Objet</td>
        <td>Valeure</td>
      </thead>

      <tbody>
        <?php foreach ($trames['lumiere'] as $key => $lumiere): ?>
          <tr>
            <td>
              <?php echo $lumiere['o'] ?>
            </td>
            <td>
              <?php echo $lumiere['v'] ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <div class="table">
    <h2>Humidite</h2>
    <table id="humidite">
      <thead>
        <td>Objet</td>
        <td>Valeure</td>
      </thead>

      <tbody>
        <?php foreach ($trames['humidite'] as $key => $humidite): ?>
          <tr>
            <td>
              <?php echo $humidite['o'] ?>
            </td>
            <td>
              <?php echo $humidite['v'] ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <div class="table">
    <h2>Temperature</h2>
    <table id="temperature">
      <thead>
        <td>Objet</td>
        <td>Valeure</td>
      </thead>

      <tbody>
        <?php foreach ($trames['temperature'] as $key => $temperature): ?>
          <tr>
            <td>
              <?php echo $temperature['o'] ?>
            </td>
            <td>
              <?php echo $temperature['v'] ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>

<style>
.table {
  display: inline-block;
  margin-left: 18%
}

th, td {
  padding: 10px
}

table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>
