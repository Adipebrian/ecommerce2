<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Location Management</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>/utility/index">Utility</a></li>
                        <li class="breadcrumb-item active">Location Management</li>
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
                            <h3 class="card-title">Location</h3>
                            <a href="" class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#modal-add-l">Add Location</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Lokasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($lokasi as $r) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $r->lokasi; ?></td>
                                        <td>
                                            <a href="" class="btn btn-success" data-toggle="modal"
                                                data-target="#modal-edit-l<?= $r->id ?>">Edit</a>
                                            <a href="" class="btn btn-danger" data-toggle="modal"
                                                data-target="#modal-delete-l<?= $r->id ?>">Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Lokasi</th>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tempat</h3>
                            <a href="" class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#modal-add">Add Tempat</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Lokasi</th>
                                        <th>Tempat</th>
                                        <th>Alamat</th>
                                        <th>No.Wa & No.Telp</th>
                                        <th>Waktu Kerja</th>
                                        <th>Maps</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($result as $r) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $r->lokasi; ?></td>
                                        <td><?= $r->tempat; ?></td>
                                        <td><?= $r->alamat; ?></td>
                                        <td><?= $r->wa; ?> | <?= $r->telp; ?></td>
                                        <td><?= $r->wkt_kerja; ?></td>
                                        <td><?= $r->maps; ?></td>
                                        <td>
                                            <a href="" class="btn btn-success" data-toggle="modal"
                                                data-target="#modal-edit<?= $r->id ?>">Edit</a>
                                            <a href="" class="btn btn-danger" data-toggle="modal"
                                                data-target="#modal-delete<?= $r->id ?>">Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Lokasi</th>
                                        <th>Tempat</th>
                                        <th>Alamat</th>
                                        <th>No.Wa & No.Telp</th>
                                        <th>Waktu Kerja</th>
                                        <th>Maps</th>
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
<div class="modal fade" id="modal-add-l">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Location</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>/utility/lokasi_add" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" placeholder="Lokasi..." required name="lokasi">
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
<?php foreach ($lokasi as $r) : ?>
<div class="modal fade" id="modal-edit-l<?= $r->id ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Location</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>/utility/lokasi_edit" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $r->id ?>">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" placeholder="Lokasi..." required name="lokasi"
                            value="<?= $r->lokasi ?>">
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
<?php foreach ($lokasi as $r) : ?>
<div class="modal fade" id="modal-delete-l<?= $r->id ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Location</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>/utility/lokasi_delete" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $r->id ?>">
                        <p>Apakah anda yakin ingin menghapusnya?</p>
                    </div>
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
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Tempat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>/utility/lokasi_add_tempat" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="lokasi">Location</label>
                        <select name="lokasi" id="lokasi" class="select2 form-control">
                            <?php foreach ($lokasi as $l) : ?>
                            <option value="<?= $l->id ?>"><?= $l->lokasi ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tempat">Tempat</label>
                        <input type="text" class="form-control" placeholder="Tempat..." required name="tempat">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" placeholder="Alamat..." required name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="wa">No. Whatsapp</label>
                        <input type="text" class="form-control" placeholder="No. Whatsapp..." required name="wa">
                    </div>
                    <div class="form-group">
                        <label for="telp">No. Telp</label>
                        <input type="text" class="form-control" placeholder="No. Telp..." required name="telp">
                    </div>
                    <div class="form-group">
                        <label for="maps">Maps</label>
                        <input type="text" class="form-control" placeholder="Maps..." required name="maps">
                    </div>
                    <div class="form-group">
                        <label for="waktu">Waktu Kerja</label>
                        <input type="text" class="form-control" placeholder="Waktu Kerja..." required name="waktu">
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
                <h4 class="modal-title">Edit Tempat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>/utility/lokasi_edit" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $r->id ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="lokasi">Location</label>
                        <select name="lokasi" id="lokasi" class="select2 form-control">
                            <?php foreach ($lokasi as $l) : ?>
                            <option value="<?= $l->id ?>" <?php ($l->id == $r->id) ?>><?= $l->lokasi ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tempat">Tempat</label>
                        <input type="text" class="form-control" placeholder="Tempat..." required name="tempat"
                            value="<?= $r->tempat ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" placeholder="Alamat..." required name="alamat" value="<?= $r->alamat ?>">
                    </div>
                    <div class="form-group">
                        <label for="wa">No. Whatsapp</label>
                        <input type="text" class="form-control" placeholder="No. Whatsapp..." required name="wa" value="<?= $r->wa ?>">
                    </div>
                    <div class="form-group">
                        <label for="telp">No. Telp</label>
                        <input type="text" class="form-control" placeholder="No. Telp..." required name="telp" value="<?= $r->telp ?>">
                    </div>
                    <div class="form-group">
                        <label for="maps">Maps</label>
                        <input type="text" class="form-control" placeholder="Maps..." required name="maps" value="<?= $r->maps ?>">
                    </div>
                    <div class="form-group">
                        <label for="waktu">Waktu Kerja</label>
                        <input type="text" class="form-control" placeholder="Waktu Kerja..." required name="waktu" value="<?= $r->wkt_kerja ?>">
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
                <h4 class="modal-title">Delete Tempat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>/utility/lokasi_delete_tempat" method="POST">
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
<?php foreach ($result as $r) : ?>
<div class="modal fade" id="modal-delete-l<?= $r->id ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Lokasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>/utility/lokasi_delete" method="POST">
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