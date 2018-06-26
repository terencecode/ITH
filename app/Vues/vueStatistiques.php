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
              <?php echo $lumiere['v'] / 10 ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <div class="table">
    <h2>Distance</h2>
    <table id="temperature">
      <thead>
        <td>Objet</td>
        <td>Valeure</td>
      </thead>

      <tbody>
        <?php foreach ($trames['distance'] as $key => $distance): ?>
          <tr>
            <td>
              <?php echo $distance['o'] ?>
            </td>
            <td>
              <?php echo $distance['v'] / 10 ?>
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
  margin-left: 25%
}

th, td {
  padding: 10px
}

table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>
