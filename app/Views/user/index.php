<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">My Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active">My Profile</li>
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
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" style="width: 80px; height: 80px;"
                                    src="../assets/img/user/<?= $user->image ?>" alt="User profile picture">
                                <h3 class="profile-username text-center"><?= $user->username ?></h3>
                                <div class="d-flex flex-column">
                                    <small>Jenis Akun</small>
                                    <?php if ($user->jns_akun == 1) : ?>
                                    <span class="badge bg-success">Individu</span>
                                    <?php else : ?>
                                    <span class="badge bg-success">Instansi</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <form class="form-horizontal" action="/user/update" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#basic"
                                            data-toggle="tab">Basic</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#akun" data-toggle="tab">Akun</a>
                                    </li>
                                    <?php if ($user->jns_akun == 2) : ?>
                                    <li class="nav-item"><a class="nav-link" href="#lengkap"
                                            data-toggle="tab">Lengkap</a></li>
                                    <?php endif; ?>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="basic">
                                        <input type="hidden" name="id" value="<?= user_id() ?>">
                                        <input type="hidden" name="usernameLama" value="<?= $user->username ?>">
                                        <input type="hidden" name="fotoLama" value="<?= $user->image ?>">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="input" name="username"
                                                    class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>"
                                                    id="inputName" placeholder="Username"
                                                    value="<?= (old('username')) ? old('username') : $user->username ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('username') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" name="email" disabled class="form-control"
                                                    id="inputEmail" value="<?= $user->email ?>">
                                                <small>Jika ingin edit email<a href="<?= base_url() ?>/forgot">klik
                                                        disini</a></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="tgl_lahir" class="form-control"
                                                    placeholder="Tanggal Lahir" value="<?= $user->tgl_lahir ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nohp" class="col-sm-2 col-form-label">No. Handphone</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="nohp" class="form-control"
                                                    placeholder="No. Handphone" value="<?= $user->nohp ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nohp" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <textarea name="alamat" id="alamat" cols="30" rows="10"
                                                    placeholder="Alamat"
                                                    class="form-control"><?= $user->alamat ?></textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="foto" class="col-sm-2 col-form-label">Image</label>
                                            <div class="col-sm-2">
                                                <img src="../assets/img/user/<?= $user->image ?>" alt=""
                                                    class="img-thumbnail img-preview">
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group mb-3">
                                                    <input type="file"
                                                        class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>"
                                                        id="foto" name="foto" onchange="previewImg()">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('foto') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="akun">
                                        <div class="form-group row">
                                            <label for="npwp" class="col-sm-2 col-form-label">Npwp</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="npwp" class="form-control" id="npwp"
                                                    placeholder="Npwp..." value="<?= $user->npwp ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nm_bank" class="col-sm-2 col-form-label">Nama Bank</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nm_bank" class="form-control" id="nm_bank"
                                                    placeholder="Nama. Bank..." value="<?= $user->nm_bank ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="norek" class="col-sm-2 col-form-label">No. Rekening</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="norek" class="form-control" id="norek"
                                                    placeholder="No. Rekening..." value="<?= $user->norek ?>">
                                            </div>
                                        </div>


                                    </div>
                                    <?php if ($user->jns_akun == 2) : ?>
                                    <div class="tab-pane" id="lengkap">
                                        <div class="form-group row">
                                            <label for="nm_inst" class="col-sm-2 col-form-label">Nama Instansi</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nm_inst" class="form-control" id="nm_inst"
                                                    placeholder="Nama Instansi..." value="<?= $user->nm_inst ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nohp_inst" class="col-sm-2 col-form-label">No. Telp.
                                                Instansi</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nohp_inst" class="form-control" id="nohp_inst"
                                                    placeholder="No. Telp. Instansi..." value="<?= $user->nohp_inst ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pkp_inst" class="col-sm-2 col-form-label">PKP. Instansi</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="pkp_inst" class="form-control" id="nohp_inst"
                                                    placeholder="PKP. Instansi..." value="<?= $user->pkp ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email_inst" class="col-sm-2 col-form-label">Email
                                                Instansi</label>
                                            <div class="col-sm-10">
                                                <input type="email" name="email_inst" class="form-control"
                                                    id="email_inst" placeholder="Email Instansi..."
                                                    value="<?= $user->email_inst ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat_inst" class="col-sm-2 col-form-label">Alamat
                                                Instansi</label>
                                            <div class="col-sm-10">
                                                <textarea name="alamat_inst" id="alamat_inst" cols="30" rows="10"
                                                    class="form-control"
                                                    placeholder="Alamat Instansi.."><?= $user->alamat_inst ?></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <?php endif; ?>
                                    <!-- /.tab-pane -->
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal-change">Ubah Jenis Akun</button>
                            </div>
                        </div>
                        <!-- /.card -->
                    </form>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-change">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Jenis Akun</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>/user/change_akun" method="POST">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" value="<?= user_id() ?>">
                        <select name="jns_akun" id="jns_akun" class="form-control">
                            <option value="" selected disabled>-- Select One --</option>
                            <option value="1" <?= ($user->jns_akun == 1) ? 'selected' : '' ?>>Individu</option>
                            <option value="2" <?= ($user->jns_akun == 2) ? 'selected' : '' ?>>Instansi</option>
                        </select>
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

<?= $this->endSection() ?>