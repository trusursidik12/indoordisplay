<!DOCTYPE html>
<html>
<head>
	<title>Report Aqm Data</title>

	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-buttons/css/buttons.dataTables.min.css') ?>">
</head>
<body>
	<div class="card-header">
      <a href="<?= site_url('idstasiun/'.$idstasiun['id_stasiun']) ?>"><button>HOME</button></a>
    </div>

	<div class="card p-3">
		<div class="table-responsive">
			<table id="example1" class="table">
				<thead class="thead-dark">
					<?php foreach($aqmalldata as $data) : ?>
						<?php if($idstasiun['id_stasiun'] == $data['id_stasiun']) : ?>
							<tr>
								<th>Id Stasiun</th>
								<th>WAKTU</th>
								<?= $data['pm10'] != NULL ? '<th>PM10</th>' : ''?>
								<?= $data['pm25'] != NULL ? '<th>PM25</th>' : ''?>
								<?= $data['so2'] != NULL ? '<th>SO2</th>' : ''?>
								<?= $data['co'] != NULL ? '<th>CO</th>' : ''?>
								<?= $data['o3'] != NULL ? '<th>O3</th>' : ''?>
								<?= $data['no2'] != NULL ? '<th>NO2</th>' : ''?>
								<?= $data['hc'] != NULL ? '<th>HC</th>' : ''?>
								<?= $data['voc'] != NULL ? '<th>VOC</th>' : ''?>
								<?= $data['nh3'] != NULL ? '<th>NH3</th>' : ''?>
								<?= $data['no'] != NULL ? '<th>NO</th>' : ''?>
								<?= $data['h2s'] != NULL ? '<th>H2S</th>' : ''?>
								<?= $data['cs2'] != NULL ? '<th>CS2</th>' : ''?>
								<?= $data['ws'] != NULL ? '<th>KEC. ANGIN</th>' : ''?>
								<?= $data['wd'] != NULL ? '<th>ARAH ANGIN</th>' : ''?>
								<?= $data['humidity'] != NULL ? '<th>KELEMBABAN</th>' : ''?>
								<?= $data['temperature'] != NULL ? '<th>TEMPERATUR</th>' : ''?>
								<?= $data['pressure'] != NULL ? '<th>TEKANAN</th>' : ''?>
								<?= $data['sr'] != NULL ? '<th>SOLAR RADIASI</th>' : ''?>
								<?= $data['rain_intensity'] != NULL ? '<th>CURAH HUJAN</th>' : ''?>
							</tr>
							<?php break; ?>
						<?php endif ?>
					<?php endforeach ?>
				</thead>
				<tbody>
					<?php foreach($aqmalldata as $data) : ?>
						<?php if($idstasiun['id_stasiun'] == $data['id_stasiun']) : ?>
							<tr>
								<td><?= $data['id_stasiun'] ?></td>
								<td><?= $data['waktu'] ?></td>
								<?= $data['pm10'] != NULL ? '<td>'.$data['pm10'].'</td>' : ''?>
								<?= $data['pm25'] != NULL ? '<td>'.$data['pm25'].'</td>' : ''?>
								<?= $data['so2'] != NULL ? '<td>'.$data['so2'].'</td>' : ''?>
								<?= $data['co'] != NULL ? '<td>'.$data['co'].'</td>' : ''?>
								<?= $data['o3'] != NULL ? '<td>'.$data['o3'].'</td>' : ''?>
								<?= $data['no2'] != NULL ? '<td>'.$data['no2'].'</td>' : ''?>
								<?= $data['hc'] != NULL ? '<td>'.$data['hc'].'</td>' : ''?>
								<?= $data['voc'] != NULL ? '<td>'.$data['voc'].'</td>' : ''?>
								<?= $data['nh3'] != NULL ? '<td>'.$data['nh3'].'</td>' : ''?>
								<?= $data['no'] != NULL ? '<td>'.$data['no'].'</td>' : ''?>
								<?= $data['h2s'] != NULL ? '<td>'.$data['h2s'].'</td>' : ''?>
								<?= $data['cs2'] != NULL ? '<td>'.$data['cs2'].'</td>' : ''?>
								<?= $data['ws'] != NULL ? '<td>'.$data['ws'].'</td>' : ''?>
								<?= $data['wd'] != NULL ? '<td>'.$data['wd'].'</td>' : ''?>
								<?= $data['humidity'] != NULL ? '<td>'.$data['humidity'].'</td>' : ''?>
								<?= $data['temperature'] != NULL ? '<td>'.$data['temperature'].'</td>' : ''?>
								<?= $data['pressure'] != NULL ? '<td>'.$data['pressure'].'</td>' : ''?>
								<?= $data['sr'] != NULL ? '<td>'.$data['sr'].'</td>' : ''?>
								<?= $data['rain_intensity'] != NULL ? '<td>'.$data['rain_intensity'].'</td>' : ''?>
							</tr>
						<?php endif ?>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
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
		$(function () {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>
</body>
</html>