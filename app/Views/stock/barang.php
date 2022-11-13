<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>/stock/index">Stock</a></li>
                        <li class="breadcrumb-item active">Barang</li>
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
                            <h3 class="card-title">Upload Barang</h3>
                        </div>
                        <!-- Flashdata -->
                        <div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('success'); ?>">
                        </div>
                        <div class="flash-data-warning" data-flashdata="<?= session()->getFlashdata('failed'); ?>">
                        </div>
                        <p><?= $validation->getError('file') ?></p>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="<?= base_url() ?>/import_barang" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="form-group">
                                    <label for="fileexcel mb-2">File Excel</label>
                                    <input type="file" name="fileexcel" id="file" class="form-control" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="fileimg">File Image</label>
                                    <input type="file" name="fileimg" id="file" class="form-control" required>
                                </div>
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
                            <h3 class="card-title">Barang</h3>
                            <a href="<?= base_url() ?>/stock/add_barang" class="btn btn-success float-right">Add Barang</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Barang</th>
                                        <th>Jenis</th>
                                        <th>Satuan</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($result as $r) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $r->kode ?></td>
                                            <td><?= $r->nm_barang ?></td>
                                            <td><?= $r->kd_jns ?></td>
                                            <td><?= $r->satuan ?></td>
                                            <td><?= $r->harga ?></td>
                                            <td>
                                                <a href="<?= base_url() ?>/stock/edit_barang/<?= $r->kode ?>" class="btn btn-primary" >Edit</a>
                                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?= $r->kode ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Barang</th>
                                        <th>Jenis</th>
                                        <th>Satuan</th>
                                        <th>Harga</th>
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


<?php foreach ($result as $r) : ?>
    <div class="modal fade" id="modal-delete<?= $r->kode ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>/delete_barang" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" value="<?= $r->kode ?>" name="kode">
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