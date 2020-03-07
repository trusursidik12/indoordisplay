<!DOCTYPE html>
<html>
	<head>
		 <meta http-equiv="refresh" content="60">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>INDOOR DISPLAY</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css'); ?>">
		<link rel="stylesheet" href="<?= base_url('assets/dist/css/sidik.css'); ?>">
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	</head>
	<body>
		<?php foreach($aqms as $id_stasiun => $aqm) : ?>
			<?php if(isset($aqm) > 0) : ?>
				<div class="row">
					<div class="col-12" style="text-align:right;padding:20px 20px 0px 0px;">
						Last Update : <?= $last_update; ?>
					</div>
				</div>
		
				<div class="card p-3" style="margin-top: 40px;">
					<div class="row">
						<div class="col-sm">
							<div class="text-center">
								<h1><?= $info[$id_stasiun]['nama'] ?></h1>
							</div>
						</div>
					</div>
					<div class="d-flex">
						<div class="col-sm-2 text-center" style="padding-top: 0px;">
							<table>
								<tr class="bg-dark">
									<td height="60"> > 300 <br> BERBAHAYA</td>
								</tr>
								<tr class="bg-danger">
									<td height="80"> 200 - 299 <br> SANGAT TIDAK SEHAT</td>
								</tr>
								<tr class="bg-warning">
									<td height="80"> 101 - 199 <br> TIDAK SEHAT</td>
								</tr>
								<tr class="bg-primary">
									<td> 51 - 100 <br> SEDANG</td>
								</tr>
								<tr class="bg-success">
									<td> 1 - 50 <br> BAIK</td>
								</tr>
							</table>
						</div>
						<div class="col-sm-10">
							<div id="chartAqmData_<?= $id_stasiun; ?>" style="height: 370px; width: 100%;"></div>        
						</div>
					</div>
				
					<div class="d-flex">
						<?php foreach($weathers[$id_stasiun] as $key => $values) : ?>
								<div class="col-sm">
									<div class="card text-center p-1 bg-info">
										<h3 style="font-size: 14px;"><b><?= $values["info"]["label"]; ?></b></h3>
										<div class="card m-1 bg-info">
											<h1><b><?= $values["value"]; ?> <?= $values["info"]["unit"]; ?></b></h1>
										</div>
									</div>
								</div>
						<?php endforeach ?>
					</div>
			<?php endif ?>
		<?php endforeach ?>
		<script type="text/javascript" src="<?= base_url('assets/dist/js/chartjs.js') ?>"></script>
		<script>
			window.onload = function () {
				<?php foreach($aqms as $id_stasiun => $aqm) : ?>
					<?php if(isset($aqm) > 0) : ?>
						CanvasJS.addColorSet("greenShades",["#00eaff"]);
						var indoor_<?= $id_stasiun; ?> = new CanvasJS.Chart("chartAqmData_<?= $id_stasiun; ?>", {
							dataPointMaxWidth: 600,
							animationEnabled : true,
							colorSet: "greenShades",
							axisY: {
							  minimum: 0,
							  interval: 50,
							  maximum: 350
							},
							axisX:{
							   labelFontSize: 32,
							   labelFontWeight: "bold",
							 },
							data: [{
							  type: "column",
							  indexLabelFontSize: 27,
							  indexLabel: "{y}",
							  dataPoints: <?php echo json_encode($charts[$id_stasiun], JSON_NUMERIC_CHECK); ?>
							}]
						});
						changeColor(indoor_<?= $id_stasiun; ?>);
						indoor_<?= $id_stasiun; ?>.render();

						
					<?php endif ?>
				<?php endforeach ?>
			}
			
			function changeColor(indoor){
				for (var i = 0; i < indoor.options.data.length; i++){
					for (var j = 0; j < indoor.options.data[i].dataPoints.length; j++){
						y = indoor.options.data[i].dataPoints[j].y;
						if (y >= 0 & y <= 50.99)
							indoor.options.data[i].dataPoints[j].color = "#00ff1e";//green
						else if (y >= 51 & y <= 100.99)
							indoor.options.data[i].dataPoints[j].color = "#0004ff";//blue
						else if (y >= 101 & y <= 199.99)
							indoor.options.data[i].dataPoints[j].color = "#f2ff00";//yellow
						else if (y >= 200 & y <= 299.99)
							indoor.options.data[i].dataPoints[j].color = "#ff1100";//red
						else if (y > 300)
							indoor.options.data[i].dataPoints[j].color = "#000000";//black
					}
				}  
			}
		</script>
	</body>
</html>
