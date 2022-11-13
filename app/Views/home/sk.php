<?= $this->extend('layout/home') ?>
<?= $this->section('content') ?>
<!--====== Info Halaman ======-->
<div class="parent gr info-hal">
    <div class="link">
        <a href="<?= base_url() ?>">Home</a> /
        <a href="<?= base_url() ?>/home/sk">Syarat dan Ketentuan</a>
    </div>
    <div class="heading">Syarat dan Ketentuan</div>
</div>
<!--====== End Info Halaman ======-->

<!--====== Syarat dan Ketentuan ======-->
<section class="about-page parent bg-style">
    <div class="box gr">
        <div class="heading">Syarat dan Ketentuan</div>
        <div class="content">
            <?= $result->text ?>
        </div>
    </div>
</section>
<!--====== End Syarat dan Ketentuan ======-->

<?= $this->endSection() ?>