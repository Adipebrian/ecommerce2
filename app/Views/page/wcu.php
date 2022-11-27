<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">(Why Choose Us) Management</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>/page/index">Utility</a></li>
                        <li class="breadcrumb-item active">WCU Management</li>
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
                            <h3 class="card-title">WCU</h3>
                            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-add">Add WCU</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>WCU</th>
                                        <th>Text</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($result as $r) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td>
                                                <img src="<?= base_url() ?>/assets/img/wcu/<?= $r->img; ?>" style="width: 100px; height:100px;" alt="" class="img-thumbnail img-preview">

                                            </td>
                                            <td><?= $r->text; ?></td>
                                            <td>
                                                <a href="" class="btn btn-success" data-toggle="modal" data-target="#modal-edit<?= $r->id ?>">Edit</a>
                                                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?= $r->id ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>WCU</th>
                                        <th>Text</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
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
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add WCU</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>/page/wcu_add" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="foto" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-2">
                            <img src="/assets/img/wcu" alt="" class="img-thumbnail img-preview2">
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="foto2" name="foto" onchange="previewImg2()">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text">Text</label>
                        <input type="text" class="form-control" placeholder="Text" name="text">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Add</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php foreach ($result as $r) : ?>
    <div class="modal fade" id="modal-edit<?= $r->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Menu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>/page/wcu_edit" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $r->id ?>">
                    <input type="hidden" name="fotoLama" value="<?= $r->img ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="foto" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-2">
                                <img src="<?= base_url() ?>/assets/img/wcu/<?= $r->img ?>" alt="" class="img-thumbnail img-preview3">
                            </div>
                            <div class="col-sm-8">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="foto3" name="foto" onchange="previewImg3()">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="text">Text</label>
                            <input type="text" class="form-control" placeholder="Text" name="text" value="<?= $r->text ?>">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Edit</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>
<?php foreach ($result as $r) : ?>
    <div class="modal fade" id="modal-delete<?= $r->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Menu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>/page/wcu_delete" method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $r->id ?>">
                        <input type="hidden" name="fotoLama" value="<?= $r->img ?>">
                        <p>Apakah anda yakin ingin menghapusnya?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Delete</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>
<script>
    function previewImg3() {
        const foto = document.querySelector('#foto3');
        const imgPreview = document.querySelector('.img-preview3');
        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);
        fileFoto.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<?= $this->endSection() ?>