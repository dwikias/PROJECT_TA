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
                    <div class="card">
                        <div class="card-header">
                            Form Ubah Data User
                        </div>
                        <div class="card-body">

                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= validation_errors(); ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?= base_url(); ?>datauser/proses_edit/<?= $data_user['id'] ?>" method="POST">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                    <input type="text" name="periode" class="form-control" id="exampleFormControlInput1" value="<?= $data_user['nama']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                                    <input type="text" name="tahun" class="form-control" id="exampleFormControlInput1" value="<?= $data_user['pass']; ?> ">
                                </div>

                                <button type="submit" class="btn btn-success text-white">Save</button>
                                <a href="<?= base_url(); ?>datauser/index" type="button" class="btn btn-danger text-white">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>