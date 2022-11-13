<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Menu</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>/ultility/index">Utility</a></li>
                        <li class="breadcrumb-item active">Menu</li>
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
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Menu</h3>
                            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-add-m">Add Menu</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Menu</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($menu as $m) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $m->menu; ?></td>
                                            <td>
                                                <a href="" class="btn btn-success" data-toggle="modal" data-target="#modal-edit-m<?= $m->id ?>">Edit</a>
                                                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-m<?= $m->id ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Menu</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">SubMenu</h3>
                            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-add">Add SubMenu</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Menu</th>
                                        <th>Kategori</th>
                                        <th>Jenis</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($result as $r) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= get_menu($r->menu_id); ?></td>
                                            <td><?= $r->kategori; ?></td>
                                            <td>
                                                <?php foreach (explode(',', $r->kd_jns) as $j) : ?>
                                                    <span class="badge bg-success"><?= jns($j) ?></span>
                                                <?php endforeach; ?>
                                            </td>
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
                                        <th>Menu</th>
                                        <th>Kategori</th>
                                        <th>Jenis</th>
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
                <h4 class="modal-title">Add SubMenu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>/utility/submenu_add" method="POST">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="menu">Menu</label>
                        <select name="menu" id="menu" class="form-control select2" required>
                            <option value="" selected disabled>-- Select Menu --</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m->id ?>"><?= $m->menu ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cat">Kategori</label>
                        <select name="cat" id="cat" class="form-control select2" required>
                            <option value="" selected disabled>-- Select Category --</option>
                            <?php foreach ($cat as $c) : ?>
                                <option value="<?= $c->kd_cat ?>"><?= $c->kategori ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jns">Jenis</label>
                        <select name="jns[]" id="jns" class="form-control select2" multiple="multiple" required>
                            <?php foreach ($jns as $j) : ?>
                                <option value="<?= $j->kd_jns ?>"><?= $j->jns ?></option>
                            <?php endforeach; ?>
                        </select>
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
<div class="modal fade" id="modal-add-m">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>/utility/menu_add" method="POST">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="group">Menu</label>
                        <input type="text" name="menu" placeholder="Menu" class="form-control" required>
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
                    <h4 class="modal-title">Edit SubMenu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>/utility/submenu_edit" method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $r->id ?>">
                        <div class="form-group">
                            <label for="menu">Menu</label>
                            <select name="menu" id="menu" class="form-control" required>
                                <option value="" selected disabled>-- Select Menu --</option>
                                <?php foreach ($menu as $m) : ?>
                                    <option value="<?= $m->id ?>" <?= ($m->id == $r->menu_id) ? 'selected' : '' ?>><?= $m->menu ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cat">Kategori</label>
                            <select name="cat" id="cat" class="form-control " required>
                                <option value="" selected disabled>-- Select Category --</option>
                                <?php foreach ($cat as $c) : ?>
                                    <option value="<?= $c->kd_cat ?>" <?= ($c->kd_cat == $r->kd_cat) ? 'selected' : '' ?>><?= $c->kategori ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jns">jenis</label>
                            <select name="jns[]" class="form-control smartsearch_keyword" multiple="multiple" required>
                                <option value="" disabled>-- Select Jenis --</option>
                                <?php $jenis = explode(',', $r->kd_jns) ?>
                                <?php foreach ($jns as $j) : ?>
                                    <option value="<?= $j->kd_jns ?>" <?= (in_array($j->kd_jns, $jenis)) ? 'selected' : '' ?>><?= $j->jns ?></option>
                                <?php endforeach; ?>
                            </select>
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
<?php foreach ($menu as $m) : ?>
    <div class="modal fade" id="modal-edit-m<?= $m->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Menu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>/utility/menu_edit" method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $m->id ?>">
                        <div class="form-group">
                            <label for="group">Menu</label>
                            <input type="text" name="menu" placeholder="Menu" class="form-control" required value="<?= $m->menu ?>">
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
                <form action="<?= base_url() ?>/utility/submenu_delete" method="POST">
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
<?php foreach ($menu as $m) : ?>
    <div class="modal fade" id="modal-delete-m<?= $m->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Menu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>/utility/menu_delete" method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $m->id ?>">
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