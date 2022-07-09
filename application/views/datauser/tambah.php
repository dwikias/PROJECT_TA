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
                            Form Tambah Data User
                        </div>
                        <div class="card-body">

                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= validation_errors(); ?>
                                </div>
                            <?php endif; ?>

                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                                    <input type="text" name="pass" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <button type="submit" class="btn btn-success text-white">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>