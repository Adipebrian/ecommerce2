<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Merk Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>/stock/index">Stock</a></li>
                        <li class="breadcrumb-item active">Merk Barang</li>
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
                            <h3 class="card-title">Upload Merk Barang</h3>
                        </div>
                        <!-- Flashdata -->
                        <div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
                        <div class="flash-data-warning" data-flashdata="<?= session()->getFlashdata('failed'); ?>"></div>
                        <p><?= $validation->getError('file') ?></p>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="<?= base_url() ?>/stock/import_merk" method="post" enctype="multipart/form-data">
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
                            <h3 class="card-title">Merk Barang</h3>
                            <a href="#" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-add">Add Merk Barang</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Merk ID</th>
                                        <th>Nama Merk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($result as $r) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $r->id ?></td>
                                            <td><?= $r->merk ?></td>
                                            <td>
                                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit<?= $r->id ?>">Edit</a>
                                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?= $r->id ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Merk ID</th>
                                        <th>Nama Merk</th>
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
            <form action="<?= base_url() ?>/stock/add_merk" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="merk">Merk Barang</label>
                        <input type="text" class="form-control" name="merk" id="merk" placeholder="Merk Barang" required>
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
    <div class="modal fade" id="modal-edit<?= $r->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>/stock/edit_merk" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" value="<?= $r->id ?>" name="id">
                        <div class="form-group">
                            <label for="merk">Merk Barang</label>
                            <input type="text" class="form-control" name="merk" id="merk" placeholder="Merk Barang" required value="<?= $r->merk ?>">
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
    <div class="modal fade" id="modal-delete<?= $r->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>/stock/delete_merk" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" value="<?= $r->id ?>" name="id">
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