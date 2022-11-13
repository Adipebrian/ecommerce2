<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>/stock/index">Stock</a></li>
                        <li class="breadcrumb-item active">Edit Barang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Barang</h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url() ?>/stock/edit_barang_action" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="kode">Kode Barang</label>
                                    <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode Barang" required value="<?= (old('kode')) ? old('kode') : $result->kode ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nm_barang">Nama Barang</label>
                                    <input type="text" class="form-control" name="nm_barang" id="nm_barang" placeholder="Nama Barang" required value="<?= (old('nm_barang')) ? old('nm_barang') : $result->nm_barang ?>">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="kategori">Kategori Barang</label>
                                            <select class="form-control select2" name="kategori" id="kategori" required>
                                                <option value="" selected disabled>-- Select Kategori --</option>
                                                <?php foreach ($cat as $c) : ?>
                                                    <option value="<?= $c->kd_cat ?>" <?= (old('kategori') && old('kategori') == $c->kd_cat || $c->kd_cat == $result->kd_cat) ? 'selected' : '' ?>><?= $c->kategori ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="jenis">Jenis Barang</label>
                                            <select class="form-control select2" name="jenis" id="jenis" required>
                                                <option value="" selected disabled>-- Select Jenis --</option>
                                                <?php foreach ($jns as $j) : ?>
                                                    <option value="<?= $j->kd_jns ?>" <?= (old('jenis') && old('jenis') == $j->kd_jns || $j->kd_jns == $result->kd_jns) ? 'selected' : '' ?>><?= $j->jns ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="merk_id">Merk Barang</label>
                                            <select class="form-control select2" name="merk_id" id="merk_id" required>
                                                <option value="" selected disabled>-- Select Merk --</option>
                                                <?php foreach ($merk as $m) : ?>
                                                    <option value="<?= $m->id ?>" <?= (old('merk_id') && old('merk_id') == $m->id || $m->id == $result->merk_id) ? 'selected' : '' ?>><?= $m->merk ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="satuan">Satuan</label>
                                            <select class="form-control select2" name="satuan" id="satuan" required>
                                                <option value="" selected disabled>-- Select Satuan --</option>
                                                <option value="PCS" <?= (old('satuan') && old('satuan') == 'PCS' || 'PCS' == $result->satuan) ? 'selected' : '' ?>>PCS</option>
                                                <option value="KARTON" <?= (old('satuan') && old('satuan') == 'KARTON' || 'KARTON' == $result->satuan) ? 'selected' : '' ?>>KARTON</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="berat"> Berat Barang</label>
                                            <input type="number" class="form-control" name="berat" id="berat" placeholder="Harga Barang" required value="<?= (old('berat')) ? old('berat') : $result->berat ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="stok">Stock Barang</label>
                                            <input type="number" class="form-control" name="stok" id="stok" placeholder="Stock Barang" required value="<?= (old('stok')) ? old('stok') : $result->stok ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga Barang</label>
                                    <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga Barang" required value="<?= (old('harga')) ? old('harga') : $result->harga ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row mb-3 flex-column">
                                    <label for="foto" class="col-sm-4 col-form-label">Image</label>
                                    <div class="col-sm-2">
                                        <img src="<?= base_url() ?>/assets/img/barang/<?= $result->image1 ?>" alt="" class="img-thumbnail img-preview">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="foto" name="foto" onchange="previewImg()">
                                        </div>
                                        <small style="color: red;">
                                            <?= $validation->getError('foto') ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="row mb-3 flex-column">
                                    <label for="foto" class="col-sm-4 col-form-label">Image 2</label>
                                    <div class="col-sm-2">
                                        <img src="<?= base_url() ?>/assets/img/barang/<?= $result->image2 ?>" alt="" class="img-thumbnail img-preview2">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="foto2" name="foto2" onchange="previewImg2()">
                                            <small style="color: red;">
                                                <?= $validation->getError('foto2') ?>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 flex-column">
                                    <label for="foto" class="col-sm-4 col-form-label">Image 3</label>
                                    <div class="col-sm-2">
                                        <img src="<?= base_url() ?>/assets/img/barang/<?= $result->image3 ?>" alt="" class="img-thumbnail img-preview3">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="foto3" name="foto3" onchange="previewImg3()">
                                            <small style="color: red;">
                                                <?= $validation->getError('foto3') ?>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 flex-column">
                                    <label for="foto" class="col-sm-4 col-form-label">Image 4</label>
                                    <div class="col-sm-2">
                                        <img src="<?= base_url() ?>/assets/img/barang/<?= $result->image4 ?>" alt="" class="img-thumbnail img-preview4">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="foto4" name="foto4" onchange="previewImg4()">
                                            <small style="color: red;">
                                                <?= $validation->getError('foto4') ?>
                                            </small>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="ket">Keterangan</label>
                                    <textarea class="form-control summernote" name="ket" id="ket" cols="30" rows="20" placeholder="Keterangan" required><?= (old('ket')) ? old('ket') : $result->ket ?></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Edit</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?= $this->endSection() ?>