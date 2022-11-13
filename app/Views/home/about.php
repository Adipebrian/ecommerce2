<?= $this->extend('layout/home') ?>
<?= $this->section('content') ?>
<!--====== Info Halaman ======-->
<div class="parent gr info-hal">
    <div class="link">
        <a href="<?= base_url() ?>">Home</a> /
        <a href="<?= base_url() ?>/home/about">Tentang Kami</a>
    </div>
    <div class="heading">Tentang Kami</div>
</div>
<!--====== End Info Halaman ======-->

<!--====== About ======-->
<section class="about-page parent bg-style">
    <img src="<?= base_url() ?>/assets/img/logo.png" alt="logo">
    <div class="box gr">
        <div class="heading">Tentang Kami</div>
        <div class="content">
            <?= $result->text ?>
        </div>
    </div>
</section>
<!--====== End About ======-->

<?= $this->endSection() ?>