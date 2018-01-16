<?php $this->titre = "Utilisateur" ?>

<!--DataTables -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

<h1>Nom</h1>

<table id="myTable" class="hover row-border stripe">

  <thead>

  </thead>

  <tbody>

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
