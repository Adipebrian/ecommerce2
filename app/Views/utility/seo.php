<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">SEO</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>/admin/index">Admin</a></li>
                        <li class="breadcrumb-item active">SEO</li>
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">SEO</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="<?= base_url() ?>/utility/seo_update" method="post">
                                <?= csrf_field() ?>
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input type="text" id="author" name="author" class="form-control" placeholder="Author" required value="<?= $result->author ?>">
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama Website</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Nama Website" required value="<?= $result->name ?>">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Deskripsi</label>
                                    <textarea name="desc" id="desc" cols="30" rows="10" class="summernote"><?= $result->desc ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="keyword">Kata Kunci <small>(*jika banyak, pisahkan dengan koma(,))</small></label>
                                    <textarea name="keyword" id="keyword" cols="30" rows="10" class="summernote"><?= $result->keyword ?></textarea>
                                </div>
                                <div class="row mb-3 flex-column">
                                    <label for="foto" class="col-sm-2 col-form-label">Gambar</label>
                                    <div class="col-sm-2">
                                        <input type="hidden" name="fotoLama" value="<?= $result->img ?>">
                                        <img src="/assets/img/<?= $result->img ?>" alt="" class="img-thumbnail img-preview">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="foto" name="foto" onchange="previewImg()">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn bg-success">Save</button>
                            </form>
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


<?= $this->endSection() ?>