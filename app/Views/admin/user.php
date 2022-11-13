<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Management</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>/admin/index">Admin</a></li>
                        <li class="breadcrumb-item active">User Management</li>
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
            <?= view('Myth\Auth\Views\_message_block') ?>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Users</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Active</th>
                                        <!-- <th>Role</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($result as $r) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $r->email ?></td>
                                            <td><?= $r->username ?></td>
                                            <td>
                                                <?php if ($r->active == 1) : ?>
                                                    <a href="<?= base_url() ?>/admin/nonactive_user/<?= $r->id ?>" class="badge badge-primary">active</a>
                                                <?php else : ?>
                                                    <a href="<?= base_url() ?>/admin/active_user/<?= $r->id ?>" class="badge badge-secondary">nonactive</a>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-editrole<?= $r->id ?>">Edit Role</a>
                                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?= $r->id ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Active</th>
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
    <!-- Modal -->
    <div class="modal fade" id="modal-delete<?= $r->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>/delete_user" method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapusnya?
                        <input type="hidden" value="<?= $r->id ?>" name="id">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>
<!-- role -->
<?php foreach ($result as $g) : ?>
    <!-- Modal -->
    <div class="modal fade" id="modal-editrole<?= $g->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>/admin/change_role_user" method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="user_id">Users</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    <option selected value="<?= $g->id ?>"><?= $g->username ?></option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="group">Group</label>
                                <select name="group" id="group" class="form-control">
                                    <?php foreach ($group_all as $ga) : ?>
                                        <option value="<?= $ga->id ?>" <?= ($g->group_id == $ga->id) ? 'selected' : '' ?>><?= $ga->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-key"></i> Change</button>
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
    <div class="modal fade" id="modal-addrole<?= $r->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>/admin/add_role_user" method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="user_id">Users</label>
                                <select name="user_id" id="user_id" class="form-control" required>
                                    <option value="<?= $r->id ?>" selected><?= $r->username ?></option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="group">Group</label>
                                <select name="group" id="group" class="form-control" required>
                                    <option value="" selected disabled>-- Select --</option>
                                    <?php foreach ($group_all as $ga) : ?>
                                        <option value="<?= $ga->id ?>"><?= $ga->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-key"></i> Add</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

<?php endforeach; ?>

<?= $this->endSection() ?>