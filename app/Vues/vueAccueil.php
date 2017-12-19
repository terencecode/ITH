<!-- Titre de la page -->
<?php $this->titre = "Accueil"; ?>
<?php if (isset($_SESSION['id']) && $_SESSION['id'] == 1): ?>
  Vous êtes gardien <br><br>

  <table>
    <tr>
      <th>Mail</th>
      <th>Prénom</th>
      <th>Nom</th>
    </tr>

      <?php foreach ($donnees as $key => $value): ?>
        <tr>
          <?php foreach ($value as $key => $donnees): ?>
            <td><?php echo $donnees ?></td>
          <?php endforeach; ?>
        </tr>
      <?php endforeach; ?>

  </table>

<?php elseif (isset($_SESSION['id']) && $_SESSION['id'] == 2): ?>
  vous êtes employé municipal <br><br>

    <table>
      <tr>
        <th>Mail</th>
        <th>Prénom</th>
        <th>Nom</th>
      </tr>

        <?php foreach ($donnees as $key => $value): ?>
          <tr>
            <?php foreach ($value as $key => $donnees): ?>
              <td><?php echo $donnees ?></td>
            <?php endforeach; ?>
          </tr>
        <?php endforeach; ?>

    </table>

<?php else: ?>
  <div id="body">
      <div class="row pub p1">
          <div id="form-container" class="col-xs-12 col-sm-6 col-md-7 col-lg-8">
              <h1>Découvrez nos tout nouveaux produits</h1>
              <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dicta earum maxime quos similique, veritatis. Aspernatur, autem beatae consequuntur culpa, debitis distinctio ea hic minus odio, praesentium quia recusandae tenetur?
              </p>
              <a class="link-button" href="https://www.generationrobots.com/fr/400833-capteur-de-distance-infrarouge.html">En savoir plus</a>
          </div>
          <div id="background-image" class="col-xs-hide col-sm-6 col-md-5 col-lg-4"></div>

      </div>
      <div class="row pub p2">
          <div id="form-container" class="col-xs-12 col-sm-6 col-md-7 col-lg-8">
              <h1>Découvrez nos tout nouveaux produits</h1>
              <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dicta earum maxime quos similique, veritatis. Aspernatur, autem beatae consequuntur culpa, debitis distinctio ea hic minus odio, praesentium quia recusandae tenetur?
              </p>
              <a class="link-button" href="https://www.generationrobots.com/fr/400833-capteur-de-distance-infrarouge.html">En savoir plus</a>
          </div>
          <div id="background-image" class="col-xs-hide col-sm-6 col-md-5 col-lg-4"></div>

      </div>
      <div class="row pub p3">
          <div id="form-container" class="col-xs-12 col-sm-6 col-md-7 col-lg-8">
              <h1>Découvrez nos tout nouveaux produits</h1>
              <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dicta earum maxime quos similique, veritatis. Aspernatur, autem beatae consequuntur culpa, debitis distinctio ea hic minus odio, praesentium quia recusandae tenetur?
              </p>
              <a class="link-button" href="https://www.generationrobots.com/fr/400833-capteur-de-distance-infrarouge.html">En savoir plus</a>
          </div>
          <div id="background-image" class="col-xs-hide col-sm-6 col-md-5 col-lg-4"></div>

      </div>
  </div>
<?php endif; ?>
