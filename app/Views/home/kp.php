<?= $this->extend('layout/home') ?>
<?= $this->section('content') ?>
<!--====== Info Halaman ======-->
<div class="parent gr info-hal">
    <div class="link">
        <a href="<?= base_url() ?>">Home</a> /
        <a href="<?= base_url() ?>/home/sk">Kebijakan Privasi</a>
    </div>
    <div class="heading">Kebijakan Privasi</div>
</div>
<!--====== End Info Halaman ======-->

<!--====== Kebijakan Privasi ======-->
<section class="about-page parent bg-style">
    <div class="box gr">
        <div class="heading">Kebijakan Privasi</div>
        <div class="content">
            <?= $result->text ?>
        </div>
    </div>
</section>
<!--====== End Kebijakan Privasi ======-->

<?= $this->endSection() ?>