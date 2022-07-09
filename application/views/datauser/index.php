<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Data User</h4>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="<?= base_url(); ?>datauser/tambah" type="button" class="btn btn-outline-secondary btn-sm">
                            Tambah Data
                        </a>
                        <a href="<?= base_url(); ?>datauser/hapusAll" type="button" class="btn btn-outline-warning btn-sm">
                            Hapus Semua
                        </a>

                        <div class="table-responsive" style="padding-top: 5px;">
                            <table id="data_siswa" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Password</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;  ?>
                                    <?php foreach ($data_user as $dt) : ?>

                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $dt['nama']; ?></td>
                                            <td><?= $dt['pass']; ?></td>
                                            <td>
                                                <a href="<?= base_url(); ?>datauser/edit/<?= $dt['id'] ?>" type="button" class="btn btn-info btn-sm">
                                                    Edit
                                                </a>
                                                <a href="<?= base_url(); ?>datauser/hapus/<?= $dt['id'] ?>" type="button" class="btn btn-danger btn-sm text-white">
                                                    Hapus
                                                </a>
                                            </td>

                                        </tr>
                                        <?php $no++;  ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>