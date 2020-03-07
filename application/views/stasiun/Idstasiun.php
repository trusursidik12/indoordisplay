<!DOCTYPE html>
<html>

<?php foreach($aqmalldata as $aqmdata) : ?>
  <?php if($idstasiun['id_stasiun'] == $aqmdata['id_stasiun']) : ?>
    <?php if($aqmdata['pm10'] != NULL || $aqmdata['pm25'] != NULL || $aqmdata['so2'] != NULL|| $aqmdata['co'] != NULL || $aqmdata['o3'] != NULL || $aqmdata['no2'] != NULL || $aqmdata['hc'] != NULL || $aqmdata['voc'] != NULL || $aqmdata['nh3'] != NULL || $aqmdata['no'] != NULL || $aqmdata['h2s'] != NULL || $aqmdata['cs2'] != NULL) : ?>
        <?php
        $AllDataAqmByIdStasiun = array(
            array("label"=> 'PM10', "y" => $aqmdata['pm10']),
            array("label"=> 'PM25', "y" => $aqmdata['pm25']),
            array("label"=> 'CO', "y" => $aqmdata['co']),
            array("label"=> 'O3', "y" => $aqmdata['o3']),
            array("label"=> 'NO2', "y" => $aqmdata['no2']),
            array("label"=> 'HC', "y" => $aqmdata['hc']),
            array("label"=> 'VOC', "y" => $aqmdata['voc']),
            array("label"=> 'NH3', "y" => $aqmdata['nh3']),
            array("label"=> 'NO', "y" => $aqmdata['no']),
            array("label"=> 'H2S', "y" => $aqmdata['h2s']),
            array("label"=> 'CS2', "y" => $aqmdata['cs2'])
        );

        ?>
    <?php break ?>
    <?php endif ?>
  <?php endif ?>
<?php endforeach ?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $idstasiun['nama'] ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/sidik.css'); ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body>

    <div class="card-header">
      <a href="<?= site_url('report/idstasiun/'.$idstasiun['id_stasiun']) ?>"><button>DOWNLOAD DATA</button></a>
    </div>

  <div class="card p-3" style="margin-top: 40px;">
    <div class="row">
      <div class="col-sm">
        <div class="text-center">
          <h1><?= $idstasiun['nama'] ?></h1>
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
        <div id="chartAqmData" style="height: 370px; width: 100%;"></div>        
      </div>
    </div>
  <?php foreach($aqmalldata as $aqmdata) : ?>
    <?php if($idstasiun['id_stasiun'] == $aqmdata['id_stasiun']) : ?>
      <div class="d-flex">
        <?php if($aqmdata['pressure'] != NULL) : ?>
          <div class="col-sm">
            <div class="card text-center p-1 bg-info">
              <h3 style="font-size: 14px;"><b>TEKANAN</b></h3>
              <div class="card m-1 bg-info">
                <h1><b><?= $aqmdata['pressure'] ?></b></h1>
              </div>
            </div>
          </div>
        <?php endif ?>
        <?php if($aqmdata['temperature'] != NULL) : ?>
          <div class="col-sm">
            <div class="card text-center p-1 bg-info">
              <h3 style="font-size: 14px;"><b>TEMPERATUR</b></h3>
              <div class="card m-1 bg-info">
                <h1><b><?= $aqmdata['temperature'] ?></b></h1>
              </div>
            </div>
          </div>
        <?php endif ?>
        <?php if($aqmdata['ws'] != NULL) : ?>
          <div class="col-sm">
            <div class="card text-center p-1 bg-info">
              <h3 style="font-size: 14px;"><b>KEC. ANGIN</b></h3>
              <div class="card m-1 bg-info">
                <h1><b><?= $aqmdata['ws'] ?></b></h1>
              </div>
            </div>
          </div>
        <?php endif ?>
        <?php if($aqmdata['wd'] != NULL) : ?>
          <div class="col-sm">
            <div class="card text-center p-1 bg-info">
              <h3 style="font-size: 14px;"><b>ARAH ANGIN</b></h3>
              <div class="card m-1 bg-info">
                <h1><b><?= $aqmdata['wd'] ?></b></h1>
              </div>
            </div>
          </div>
        <?php endif ?>
        <?php if($aqmdata['humidity'] != NULL) : ?>
          <div class="col-sm">
            <div class="card text-center p-1 bg-info">
              <h3 style="font-size: 14px;"><b>KELEMBABAN</b></h3>
              <div class="card m-1 bg-info">
                <h1><b><?= $aqmdata['humidity'] ?></b></h1>
              </div>
            </div>
          </div>
        <?php endif ?>
        <?php if($aqmdata['sr'] != NULL) : ?>
          <div class="col-sm">
            <div class="card text-center p-1 bg-info">
              <h3 style="font-size: 14px;"><b>SOLAR RADIASI</b></h3>
              <div class="card m-1 bg-info">
                <h1><b><?= $aqmdata['sr'] ?></b></h1>
              </div>
            </div>
          </div>
        <?php endif ?>
        <?php if($aqmdata['rain_intensity'] != NULL) : ?>
          <div class="col-sm">
            <div class="card text-center p-1 bg-info">
              <h3 style="font-size: 14px;"><b>CURAH HUJAN</b></h3>
              <div class="card m-1 bg-info">
                <h1><b><?= $aqmdata['rain_intensity'] ?></b></h1>
              </div>
            </div>
          </div>
        <?php endif ?>
      </div>
      <?php break ?>
    <?php endif ?>
  <?php endforeach ?>

<!-- chart -->
<script type="text/javascript" src="<?= base_url('assets/dist/js/chartjs.js') ?>"></script>

<script>
  window.onload = function () {

  CanvasJS.addColorSet("greenShades",
              [
              "#00eaff"               
              ]);
   
  var indoor = new CanvasJS.Chart("chartAqmData", {
    // legend :{
      dataPointMaxWidth: 600,
      // title:{
      //   text : "GRESIK TEK 01"
      // },
    // },
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
      dataPoints: <?php echo json_encode($AllDataAqmByIdStasiun, JSON_NUMERIC_CHECK); ?>
    }]
  });
  changeColor(indoor);
  indoor.render();

  function changeColor(indoor)
  {
    for (var i = 0; i < indoor.options.data.length; i++)
    {
      for (var j = 0; j < indoor.options.data[i].dataPoints.length; j++)
      {
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

}

</script>
</body>
</html>
