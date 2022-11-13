<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->

<!-- Flashdata -->
<div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
<div class="flash-data-warning" data-flashdata="<?= session()->getFlashdata('failed'); ?>"></div>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Stock Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>/stok/index">Stock</a></li>
                        <li class="breadcrumb-item active">Stock Barang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
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
                            <h3 class="card-title">Stock Barang</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Stock</th>
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
                                            <td>
                                                <?php if ($r->stok >= 10) : ?>
                                                    <div class="btn bg-success"><?= $r->stok ?></div>
                                                <?php elseif ($r->stok == 0) : ?>
                                                    <div class="btn bg-danger"><?= $r->stok ?></div>
                                                <?php else : ?>
                                                    <div class="btn bg-warning"><?= $r->stok ?></div>
                                                <?php endif; ?>

                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-edit<?= $r->kode ?>">Edit Stock</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Stock</th>
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
<?php foreach ($result as $r) : ?>
    <div class="modal fade" id="modal-edit<?= $r->kode ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>/edit_stock" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" value="<?= $r->kode ?>" name="kode">
                        <div class="form-group">
                            <label for="stok">Stock Barang</label>
                            <input type="number" class="form-control" name="stok" id="stok" placeholder="Stock Barang" required value="<?= $r->stok ?>">
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

<?= $this->endSection() ?>