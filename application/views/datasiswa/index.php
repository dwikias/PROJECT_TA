<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Data Aktual</h4>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Aktual Jumlah Siswa
                    </div>
                    <div class="card-body">

                        <a href="javascript:void(0);" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#Modal_Add">
                            <span class="fa fa-plus"></span> Tambah Data
                        </a>
                        <!-- <a href="<?= base_url(); ?>datasiswa/hapusAll" type="button" class="btn btn-warning btn-sm">
                            Hapus Semua
                        </a> -->

                        <div class="table-responsive" style="padding-top: 5px;">
                            <table class="table table-bordered text-center" id="mydata">
                                <thead>
                                    <tr>
                                        <th>Periode</th>
                                        <th>Tahun</th>
                                        <th>Jumlah Siswa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data">

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo base_url() . 'assets/dist/js/jquery-3.2.1.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/dist/js/bootstrap.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/dist/js/jquery.dataTables.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/dist/js/dataTables.bootstrap4.js' ?>"></script>


    <!-- MODAL ADD -->
    <form>
        <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Periode</label>
                            <div class="col-md-10">
                                <input type="text" name="periode" id="periode" class="form-control" placeholder="Periode">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Tahun</label>
                            <div class="col-md-10">
                                <input type="text" name="tahun" id="tahun" class="form-control" placeholder="tahun">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Jumlah Siswa</label>
                            <div class="col-md-10">
                                <input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="jumlah siswa">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--END MODAL ADD-->

    <!-- MODAL EDIT -->
    <form>
        <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Periode</label>
                            <div class="col-md-10">
                                <input type="text" name="periode_edit" id="periode_edit" class="form-control" placeholder="Periode">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Tahun</label>
                            <div class="col-md-10">
                                <input type="text" name="tahun_edit" id="tahun_edit" class="form-control" placeholder="Tahun">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Jumlah Siswa</label>
                            <div class="col-md-10">
                                <input type="text" name="jumlah_edit" id="jumlah_edit" class="form-control" placeholder="Jumlah">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--END MODAL EDIT-->

    <!--MODAL DELETE-->
    <form>
        <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <strong>Apakah Anda yakin ingin menghapus data tersebut?</strong>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="periode_delete" id="periode_delete" class="form-control">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--END MODAL DELETE-->

    <script type="text/javascript">
        $(document).ready(function() {
            show_datasiswa(); //call function show all data

            $('#mydata').dataTable();

            //function show all product
            function show_datasiswa() {
                $.ajax({
                    type: 'ajax',
                    url: '<?php echo site_url('DatasiswaController/data_siswa') ?>',
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td>' + data[i].periode + '</td>' +
                                '<td>' + data[i].tahun + '</td>' +
                                '<td>' + data[i].jumlah + '</td>' +
                                '<td>' +
                                '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-periode="' + data[i].periode + '" data-tahun="' + data[i].tahun + '" data-jumlah="' + data[i].jumlah + '">Edit</a>' + ' ' +
                                '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-periode="' + data[i].periode + '">Delete</a>' +
                                '</td>' +
                                '</tr>';
                        }
                        $('#show_data').html(html);
                    }

                });
            }

            //Save product
            $('#btn_save').on('click', function() {
                var periode = $('#periode').val();
                var tahun = $('#tahun').val();
                var jumlah = $('#jumlah').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('DatasiswaController/save') ?>",
                    dataType: "JSON",
                    data: {
                        periode: periode,
                        tahun: tahun,
                        jumlah: jumlah
                    },
                    success: function(data) {
                        $('[name="periode"]').val("");
                        $('[name="tahun"]').val("");
                        $('[name="jumlah"]').val("");
                        $('#Modal_Add').modal('hide');
                        show_datasiswa();
                    }
                });
                return false;
            });

            //get data for update record
            $('#show_data').on('click', '.item_edit', function() {
                var periode = $(this).data('periode');
                var tahun = $(this).data('tahun');
                var jumlah = $(this).data('jumlah');

                $('#Modal_Edit').modal('show');
                $('[name="periode_edit"]').val(periode);
                $('[name="tahun_edit"]').val(tahun);
                $('[name="jumlah_edit"]').val(jumlah);
            });

            //update record to database
            $('#btn_update').on('click', function() {
                var periode = $('#periode_edit').val();
                var tahun = $('#tahun_edit').val();
                var jumlah = $('#jumlah_edit').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('DatasiswaController/update') ?>",
                    dataType: "JSON",
                    data: {
                        periode: periode,
                        tahun: tahun,
                        jumlah: jumlah
                    },
                    success: function(data) {
                        $('[name="periode_edit"]').val("");
                        $('[name="tahun_edit"]').val("");
                        $('[name="jumlah_edit"]').val("");
                        $('#Modal_Edit').modal('hide');
                        show_datasiswa();
                    }
                });
                return false;
            });

            //get data for delete record
            $('#show_data').on('click', '.item_delete', function() {
                var periode = $(this).data('periode');

                $('#Modal_Delete').modal('show');
                $('[name="periode_delete"]').val(periode);
            });

            //delete record to database
            $('#btn_delete').on('click', function() {
                var periode = $('#periode_delete').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('DatasiswaController/delete') ?>",
                    dataType: "JSON",
                    data: {
                        periode: periode
                    },
                    success: function(data) {
                        $('[name="periode_delete"]').val("");
                        $('#Modal_Delete').modal('hide');
                        show_datasiswa();
                    }
                });
                return false;
            });

        });
    </script>
</div>