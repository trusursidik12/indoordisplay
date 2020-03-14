<!DOCTYPE html>
<html>
<head>
  <title>Export Data</title>
  <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-buttons/css/buttons.dataTables.min.css') ?>">
</head>
<body>

  <div class="card">
    <div class="card-header">
      <a href="<?= site_url()?>?apikey=<?= $_GET["apikey"]; ?>&workstation=<?= $_GET["workstation"]; ?>"><button>Lihat Chart</button></a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr class="text-center">
            <th>NO</th>
            <th>ID STATION</th>
            <th>TIME</th>
            <th>H2S [μg]</th>
            <th>CS2 [μg]</th>
            <th>H2S [ppm]</th>
            <th>CS2 [ppm]</th>
            <th>WS</th>
            <th>WD</th>
            <th>HUMIDITY</th>
            <th>TEMPERATURE</th>
            <th>PRESSURE</th>
            <th>SR</th>
            <th>RAIN INTENSITY</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach($alldata as $data) : ?>
          <?php $h2sppm = @$data['h2s'] / 1500; ?>
          <?php $cs2ppm = @$data['cs2'] / 3130; ?>
          <tr>
            <td></td>
            <td><?= $data['id_stasiun']; ?></td>
            <td><?= $data['waktu']; ?></td>
            <td><?= $data['h2s']; ?></td>
            <td><?= $data['cs2']; ?></td>
            <td><?= round($h2sppm, 3); ?></td>
            <td><?= round($cs2ppm, 3); ?></td>
            <td><?= $data['ws']; ?></td>
            <td><?= $data['wd']; ?></td>
            <td><?= $data['humidity']; ?></td>
            <td><?= $data['temperature']; ?></td>
            <td><?= $data['pressure']; ?></td>
            <td><?= $data['sr']; ?></td>
            <td><?= $data['rain_intensity']; ?></td>
          </tr>
          <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.card-body -->
  </div>

  <!-- jQuery -->
  <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- DataTables -->
  <script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.js') ?>"></script>
  <script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>


  <script src="<?= base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
  <script src="<?= base_url('assets/plugins/datatables-buttons/js/jszip.min.js') ?>"></script>
  <script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>

  <script>
    $(document).ready(function() {
      var t = $('#example1').DataTable( {
          dom: 'Bfrtip',
          lengthMenu: [
              [ 10, 25, 50, 100, 300, 500, -1 ],
              [ '10 rows', '25 rows', '50 rows', '100 rows', '300 rows', '500 rows', 'Show all' ]
          ],
          buttons: [
            'pageLength', 'excel'
          ],
          "order": [[ 1 , 'asc']]
      } );
      t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
    } );
  </script>

</body>
</html>