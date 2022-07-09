<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Dashboard</h4>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h6 class="card-title">Grafik Hasil Metode Brown's DES</h6>
          </div>
          <div class="card-body">
            <canvas id="brownChart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h6 class="card-title">Grafik Hasil Metode Holt's DES</h6>
          </div>
          <div class="card-body">
            <canvas id="holtChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="<?php echo base_url() ?>assets/dist/js/chart.min.js"></script>
<!-- Grafik Brown DES -->
<script>
  var brownCanvas = document.getElementById("brownChart");

  Chart.defaults.global.defaultFontFamily = "Lato";
  Chart.defaults.global.defaultFontSize = 18;

  var dataFirst = {
    label: "Data Aktual",
    data: [<?php foreach ($data_aktual as $key) {
              echo  '"' . $key['jumlah'] . '",';
            } ?>],
    lineTension: 0.3,
    fill: false,
    borderColor: 'red',
    backgroundColor: 'transparent',
    pointBorderColor: 'red',
    pointBackgroundColor: 'lightgreen',
    pointRadius: 5,
    pointHoverRadius: 15,
    pointHitRadius: 30,
    pointBorderWidth: 2,
    pointStyle: 'rect'
  };

  var dataSecond = {
    label: "Data Forecasting",
    data: [0, <?php foreach ($hitung_brown as $key) {
                echo  '"' . $key['nilai_ramal'] . '",';
              } ?>],
    lineTension: 0.3,
    fill: false,
    borderColor: 'purple',
    backgroundColor: 'transparent',
    pointBorderColor: 'purple',
    pointBackgroundColor: 'lightgreen',
    pointRadius: 5,
    pointHoverRadius: 15,
    pointHitRadius: 30,
    pointBorderWidth: 2
  };

  var brownData = {
    labels: [<?php foreach ($data_aktual as $key) {
                echo  '"' . $key['tahun'] . '",';
                $tahun_next1 = $key['tahun'] + 1;
                $tahun_next2 = $key['tahun'] + 2;
                $tahun_next3 = $key['tahun'] + 3;
              } ?> <?php echo $tahun_next1 . "," . $tahun_next2 . "," . $tahun_next3; ?>],
    datasets: [dataFirst, dataSecond]
  };

  var chartOptions = {
    legend: {
      display: true,
      position: 'top',
      labels: {
        boxWidth: 80,
        fontColor: 'black'
      }
    }
  };

  var lineChart = new Chart(brownCanvas, {
    type: 'line',
    data: brownData,
    options: chartOptions
  });
</script>

<!-- Grafik Holt's DES -->
<script>
  var holtCanvas = document.getElementById("holtChart");

  Chart.defaults.global.defaultFontFamily = "Lato";
  Chart.defaults.global.defaultFontSize = 18;

  var dataFirst = {
    label: "Data Aktual",
    data: [<?php foreach ($data_aktual as $key) {
              echo  '"' . $key['jumlah'] . '",';
            } ?>],
    lineTension: 0.3,
    fill: false,
    borderColor: 'red',
    backgroundColor: 'transparent',
    pointBorderColor: 'red',
    pointBackgroundColor: 'lightgreen',
    pointRadius: 5,
    pointHoverRadius: 15,
    pointHitRadius: 30,
    pointBorderWidth: 2,
    pointStyle: 'rect'
  };

  var dataSecond = {
    label: "Data Forecasting",
    data: [0, <?php foreach ($hitung_holt as $key) {
                echo  '"' . $key['nilai_ramal'] . '",';
              } ?>],
    lineTension: 0.3,
    fill: false,
    borderColor: 'purple',
    backgroundColor: 'transparent',
    pointBorderColor: 'purple',
    pointBackgroundColor: 'lightgreen',
    pointRadius: 5,
    pointHoverRadius: 15,
    pointHitRadius: 30,
    pointBorderWidth: 2
  };

  var holtData = {
    labels: [<?php foreach ($data_aktual as $key) {
                echo  '"' . $key['tahun'] . '",';
                $tahun_next1 = $key['tahun'] + 1;
                $tahun_next2 = $key['tahun'] + 2;
                $tahun_next3 = $key['tahun'] + 3;
              } ?> <?php echo $tahun_next1 . "," . $tahun_next2 . "," . $tahun_next3; ?>],
    datasets: [dataFirst, dataSecond]
  };

  var chartOptions = {
    legend: {
      display: true,
      position: 'top',
      labels: {
        boxWidth: 80,
        fontColor: 'black'
      }
    }
  };

  var lineChart = new Chart(holtCanvas, {
    type: 'line',
    data: holtData,
    options: chartOptions
  });
</script>