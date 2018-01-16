<!-- Titre de la page -->
<?php $this->titre = "Accueil"; ?>
<?php if (isset($_SESSION['id']) && $_SESSION['id'] == 1): ?>


  <!--DataTables -->
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

  <table id="myTable" class="hover row-border stripe">

    <thead>
      <tr>
        <th>Mail</th>
        <th>Prénom</th>
        <th>Nom</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($donnees as $key => $value): ?>
          <tr onclick="window.location.href='http://localhost:8080/ITH/<?php echo $value['id_u'] ?>' ">
            <td> <?php echo $value['email_u'] ?> </td>
            <td> <?php echo $value['prenom_u'] ?> </td>
            <td> <?php echo $value['nom_u'] ?> </td>
          </tr>
      <?php endforeach; ?>
    </tbody>

  </table>

  <script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable({
      paging: false,
      info: false
    });
  });
  </script>

<?php else: ?>
  <div id="body">
      <div class="row">
          <div class="col-lg-2"></div>
          <div id="form-container" class="col-lg-2">
              <h2>Qui sommes-nous ?</h2>
                  Domisep est une entreprise spécialisée dans la télésurveillance d'immeubles, grâce à la pose de systèmes d'alarme sans fil adaptés aux besoins des particuliers et une centrale d'alarme opérationnelle 24h/24. Domisep gère un parc de plusieurs milliers d’habitations dans plus d’une dizaine de pays en Europe.
                  </div>
          <div class="col-lg-1"></div>
          <div id="form-container" class="col-lg-2">
              <h2>Ce que nous proposons</h2>
              Domisep offrira à chacun de ses clients, la possibilité de se connecter en toute sécurité afin de :<br>
              <ul class="pres">
                  <li>
                      Piloter son domicile : ouvertures et fermetures automatiques, mise en route et extinction d'équipements électroniques, etc.
                  </li>
                  <li>
                      Protéger son domicile : détection d'intrusion, alarmes, détection de fuites, etc.
                  </li>
                  <li>
                      Réduire ses factures de chauffage ou d'énergie : contrôle de température
                  </li>
              </ul>
          </div>
          <div class="col-lg-1"></div>
          <div id="form-container" class="col-lg-2">
              <h2>Pour qui ?</h2>
              Dans le cadre de son expansion et de la diversification de ses activités, Domisep souhaite proposer une gestion complète des habitations connectées (immeubles et maisons) pour les particuliers. Domisep souhaite, pour ce faire, rassembler toutes les technologies de l'informatique, des télécommunications et de l'électronique et les mettre au service de ses clients, grâce à un traitement optimisé des signaux et des informations.
          </div>
          <div class="col-lg-2"></div>
      </div>

  </div>

<?php endif; ?>
