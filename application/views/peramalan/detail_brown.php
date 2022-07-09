<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h5 class="page-title">Detail Hasil Peramalan Metode DES dari Brown </h5>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 px-2">
                <div class="card card-primary">
                    <div class="card-header">
                        <h6 class="card-title">Data Hasil Peramalan</h5>
                    </div>
                    <div class="card-body">
                        <a type="button" class="btn btn-danger btn-sm text-white" target="_blank" href=" <?= base_url(); ?>ramal_brown/cetak">Cetak-Pdf</a>
                        <div class="table-responsive" style="padding-top: 5px;">
                            <table id="data_siswa" class="table table-bordered">
                                <thead style='text-align: center;'>
                                    <tr>
                                        <th>Periode</th>
                                        <th>Tahun</th>
                                        <th>Hasil Prediksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($hitung_brown as $dt) : ?>
                                        <tr style='text-align: center;'>
                                            <td><?= $dt['periode']; ?></td>
                                            <td><?= $dt['tahun']; ?></td>
                                            <td><?= $dt['nilai_ramal']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h6 class="card-title">Grafik Hasil</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="brownChart"></canvas>
                    </div>
                </div>
                <!-- <div class="card card-primary">
                    <div class="card-header">
                        <h6 class="card-title">Kesimpulan</h6>
                    </div>
                    <div class="card-body">
                        Berdasarkan hasil perhitungan peramalan, maka didapat: <br>

                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <script src="<?php echo base_url() ?>assets/dist/js/chart.min.js"></script>
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

</div>