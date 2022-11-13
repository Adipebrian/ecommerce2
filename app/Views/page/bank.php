<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Info Bank</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>/page/index">Page</a></li>
                        <li class="breadcrumb-item active">Info Bank</li>
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
                            <h3 class="card-title">Bank</h3>
                            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-add">Add Bank</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Bank</th>
                                        <th>No. Rekening</th>
                                        <th>A/N</th>
                                        <th>Cabang</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($result as $r) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $r->bank ?></td>
                                            <td><?= $r->norek ?></td>
                                            <td><?= $r->an ?></td>
                                            <td><?= $r->cabang ?></td>
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
                                        <th>Bank</th>
                                        <th>No. Rekening</th>
                                        <th>A/N</th>
                                        <th>Cabang</th>
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
                <h4 class="modal-title">Add Bank</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>/page/bank_add" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="bank">Nama Bank</label>
                        <input type="text" class="form-control" required placeholder="Nama Bank" name="bank">
                    </div>
                    <div class="form-group">
                        <label for="norek">No. Rekening</label>
                        <input type="text" class="form-control" required placeholder="No. Rekening" name="norek">
                    </div>
                    <div class="form-group">
                        <label for="an">Atas Nama</label>
                        <input type="text" class="form-control" required placeholder="Atas Nama" name="an">
                    </div>
                    <div class="form-group">
                        <label for="cabang">Cabang</label>
                        <input type="text" class="form-control" required placeholder="Cabang" name="cabang">
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
                <form action="<?= base_url() ?>/page/bank_edit" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $r->id ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="bank">Nama Bank</label>
                            <input type="text" class="form-control" required placeholder="Nama Bank" name="bank" value="<?= $r->bank ?>">
                        </div>
                        <div class="form-group">
                            <label for="norek">No. Rekening</label>
                            <input type="text" class="form-control" required placeholder="No. Rekening" name="norek" value="<?= $r->norek ?>">
                        </div>
                        <div class="form-group">
                            <label for="an">Atas Nama</label>
                            <input type="text" class="form-control" required placeholder="Atas Nama" name="an" value="<?= $r->an ?>">
                        </div>
                        <div class="form-group">
                            <label for="cabang">Cabang</label>
                            <input type="text" class="form-control" required placeholder="Cabang" name="cabang" value="<?= $r->cabang ?>">
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
                <form action="<?= base_url() ?>/page/bank_delete" method="POST">
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
<?= $this->endSection() ?>