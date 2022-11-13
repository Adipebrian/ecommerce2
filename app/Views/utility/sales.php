<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sales Management</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>/utility/index">Utility</a></li>
                        <li class="breadcrumb-item active">Sales Management</li>
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
                            <h3 class="card-title">Sales</h3>
                            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-add">Add Sales</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Sales</th>
                                        <th>Shopee</th>
                                        <th>Lazada</th>
                                        <th>TokoPedia</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($result as $r) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $r->sales; ?></td>
                                            <td><?= $r->shopee; ?></td>
                                            <td><?= $r->lazada; ?></td>
                                            <td><?= $r->tokped; ?></td>
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
                                        <th>Sales</th>
                                        <th>Shopee</th>
                                        <th>Lazada</th>
                                        <th>TokoPedia</th>
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
                <h4 class="modal-title">Add Sales</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>/utility/sales_add" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="sales">Sales Partner</label>
                        <input type="text" class="form-control" placeholder="Sales Partner..." required name="sales">
                    </div>
                    <div class="form-group">
                        <label for="shopee">Shopee</label>
                        <input type="text" class="form-control" placeholder="Link Profile Shopee..." required name="shopee">
                    </div>
                    <div class="form-group">
                        <label for="lazada">Lazada</label>
                        <input type="text" class="form-control" placeholder="Link Profile Lazada..." required name="lazada">
                    </div>
                    <div class="form-group">
                        <label for="tokped">Tokopedia</label>
                        <input type="text" class="form-control" placeholder="Link Profile Tokopedia..." required name="tokped">
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
                <form action="<?= base_url() ?>/utility/sales_edit" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $r->id ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="sales">Sales Partner</label>
                            <input type="text" class="form-control" placeholder="Sales Partner..." required name="sales" value="<?= $r->sales ?>">
                        </div>
                        <div class="form-group">
                            <label for="shopee">Shopee</label>
                            <input type="text" class="form-control" placeholder="Link Profile Shopee..." required name="shopee" value="<?= $r->shopee ?>">
                        </div>
                        <div class="form-group">
                            <label for="lazada">Lazada</label>
                            <input type="text" class="form-control" placeholder="Link Profile Lazada..." required name="lazada" value="<?= $r->lazada ?>">
                        </div>
                        <div class="form-group">
                            <label for="tokped">Tokopedia</label>
                            <input type="text" class="form-control" placeholder="Link Profile Tokopedia..." required name="tokped" value="<?= $r->tokped ?>">
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
                <form action="<?= base_url() ?>/utility/sales_delete" method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $r->id ?>">
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