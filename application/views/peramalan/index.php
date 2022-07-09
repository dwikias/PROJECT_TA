<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Forecasting</h4>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 px-2">
                <div class="card">
                    <div class="card-header">
                        Metode Double Exponential Smoothing dari Brown
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">HITUNG MAPE</h5>
                        <a id="proses_brown" onclick="tampilDataBrown()" type="button" class="btn btn-success text-white"><i class="fa-solid fa-paper-plane"></i> Proses</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Metode Double Exponential Smoothing dari Holt
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">HITUNG MAPE</h5>
                        <a id="proses_holt" onclick="tampilDataHolt()" type="button" class="btn btn-success text-white"> <i class="fa-solid fa-paper-plane"></i> Proses</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 px-2">
                <div class="card">
                    <div class="card-header">
                        Hasil Akurasi Peramalan DES dari Brown
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover px-2">
                                <thead style='text-align: center;'>
                                    <tr>
                                        <th>Alpa</th>
                                        <th>Nilai MAPE (%)</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data_brown" style='text-align: center;'>
                                    <!-- Mape Brown -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 px-2">
                <div class="card">
                    <div class="card-header">
                        Hasil Akurasi Peramalan DES dari Holt
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover px-2" id="mydata">
                                <thead style='text-align: center;'>
                                    <tr>
                                        <th>Alpa</th>
                                        <th>Betha</th>
                                        <th>Nilai MAPE (%)</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data_holt" style='text-align: center;'>
                                    <!-- Mape HOLT -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            //HITUNG MAPE BROWN
            function tampilDataBrown() {
                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url() . "ramal_brown/mape_brown" ?>',
                    async: true,
                    dataType: 'json',
                    async: false,
                    success: function(data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<tr>' + '<td>' + data[i].alpha + '</td>' +
                                '<td>' + data[i].nilai_mape + '</td>' +
                                '<td>' + data[i].kateg + '</td>' +
                                '<td>' +
                                '<a href="<?php echo base_url() . "ramal-brown/detail/" ?>' + data[i].alpha + ' " class="btn btn-info  text-center" >Detail</a>' + ' ' +
                                '</td>' +
                                '</tr>';
                        }
                        $('#show_data_brown').html(html);
                    }

                });
            }
            //HITUNG MAPE HOLT
            function tampilDataHolt() {
                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url() . "ramal_holt/mape_holt" ?>',
                    async: true,
                    dataType: 'json',
                    async: false,
                    success: function(data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<tr>' + '<td>' + data[i].alpha + '</td>' +
                                '<td>' + data[i].betha + '</td>' +
                                '<td>' + data[i].nilai_mape + '</td>' +
                                '<td>' + data[i].kateg + '</td>' +
                                '<td>' +
                                '<a href="<?php echo base_url() . "ramal-holt/detail/" ?>' + data[i].betha + ' " class="btn btn-info  text-center" >Detail</a>' + ' ' +
                                '</td>' +
                                '</tr>';
                        }
                        $('#show_data_holt').html(html);
                    }

                });
            }
        </script>
    </div>
</div>