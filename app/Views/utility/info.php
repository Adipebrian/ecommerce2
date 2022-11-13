<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Info Management</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>/utility/index">Utility</a></li>
                        <li class="breadcrumb-item active">Info Management</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Flashdata -->
    <div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
    <div class="flash-data-warning" data-flashdata="<?= session()->getFlashdata('failed'); ?>"></div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Info</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="<?= base_url() ?>/utility/info_edit" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <input type="hidden" name="fotoLama" value="<?= $result->logo ?>">
                                <input type="hidden" name="id" value="<?= $result->id ?>">
                                <div class="form-group">
                                    <label for="foto" class="col-sm-2 col-form-label">Logo</label>
                                    <div class="col-sm-2">
                                        <img src="<?= base_url() ?>/assets/img/info/<?= ($result) ? $result->logo : '' ?>" alt="" class="img-thumbnail img-preview2">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="foto2" name="foto" onchange="previewImg2()">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kontak">Kontak 1</label>
                                    <input type="text" name="kontak1" class="form-control" placeholder="Kontak" value="<?= ($result) ? $result->kontak1 : '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="kontak">Kontak 2</label>
                                    <input type="text" name="kontak2" class="form-control" placeholder="Kontak" value="<?= ($result) ? $result->kontak2 : '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="kontak">Kontak 3</label>
                                    <input type="text" name="kontak3" class="form-control" placeholder="Kontak" value="<?= ($result) ? $result->kontak3 : '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="fb">Link Facebook</label>
                                    <input type="text" name="fb" class="form-control" placeholder="Link Facebook" value="<?= ($result) ? $result->fb : '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="ig">Link Instagram</label>
                                    <input type="text" name="ig" class="form-control" placeholder="Link Instagram" value="<?= ($result) ? $result->ig : '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tw">Link Twitter</label>
                                    <input type="text" name="tw" class="form-control" placeholder="Link Twitter" value="<?= ($result) ? $result->tw : '' ?>">
                                </div>
                                <div class="row justify-content-center">
                                    <button type="submit" class="btn btn-success m-3">Save</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection() ?>