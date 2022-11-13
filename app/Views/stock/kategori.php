<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kategori Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>/stock/index">Stock</a></li>
                        <li class="breadcrumb-item active">Kategori Barang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Upload Kategori Barang</h3>
                        </div>
                        <!-- Flashdata -->
                        <div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
                        <div class="flash-data-warning" data-flashdata="<?= session()->getFlashdata('failed'); ?>"></div>
                        <p><?= $validation->getError('file') ?></p>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="<?= base_url() ?>/import_kategori" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <input type="file" name="fileexcel" id="file" class="form-control mb-2" required>
                                <button class="btn btn-success" type="submit">Import</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <?php if (session()->getFlashdata('sts')) : ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Status Upload</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                    </button>
                                </div>
                            </div>
                            <?php
                            $arr = json_decode(session()->getFlashdata('sts'));
                            $i = 1
                            ?>
                            <div class="card-body" style="height: 140px; overflow: auto;">
                                <?php if ($arr) : ?>
                                    <?php foreach ($arr as $a) : ?>
                                        <?php if ($a->sts == 1) : ?>
                                            <p style="color:white;background-color: green;">(<?= $i++ ?>) <?= $a->note ?></p>
                                        <?php else : ?>
                                            <p style="color:white;background-color: red;">(<?= $i++ ?>) <?= $a->note ?></p>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kategori Barang</h3>
                            <a href="#" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-add">Add Kategori Barang</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Kategori</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($result as $r) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $r->kd_cat ?></td>
                                            <td><?= $r->kategori ?></td>
                                            <td>
                                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit<?= $r->kd_cat ?>">Edit</a>
                                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?= $r->kd_cat ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Kategori</th>
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


<!-- Modal -->
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>/add_kategori" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori Barang</label>
                        <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Kategori Barang" required>
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
<!-- /.modal -->
<!-- Modal -->
<?php foreach ($result as $r) : ?>
    <div class="modal fade" id="modal-edit<?= $r->kd_cat ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>/edit_kategori" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" value="<?= $r->kd_cat ?>" name="kode">
                        <div class="form-group">
                            <label for="kategori">Kategori Barang</label>
                            <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Kategori Barang" required value="<?= $r->kategori ?>">
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
    <!-- /.modal -->
<?php endforeach; ?>
<?php foreach ($result as $r) : ?>
    <div class="modal fade" id="modal-delete<?= $r->kd_cat ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>/delete_kategori" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" value="<?= $r->kd_cat ?>" name="kode">
                        <p>Apakah anda yakin ingin menghapusnya?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger"><i class="fas fa-check"></i> Delete</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>

<?= $this->endSection() ?>