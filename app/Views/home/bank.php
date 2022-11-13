<?= $this->extend('layout/home') ?>
<?= $this->section('content') ?>
<!--====== Info Halaman ======-->
<div class="parent gr info-hal">
    <div class="link">
        <a href="<?= base_url() ?>">Home</a> /
        <a href="<?= base_url() ?>/home/sk">Informasi Bank</a>
    </div>
    <div class="heading">Informasi Bank</div>
</div>
<!--====== End Info Halaman ======-->

<!--====== Bank ======-->
<section class="bank parent bg-style">
    <div class="subheading">Berikut Informasi Bank yang tersedia :</div>
    <div class="boxContainer">
        <?php foreach ($result as $r) : ?>
            <div class="box">
                <h2><?= $r->bank ?></h2>
                <p><b>Nomor Rekening :</b> <?= $r->norek ?></p>
                <p><b>Atas Nama :</b> <?= $r->an ?></p>
                <p><b>Cabang :</b> <?= $r->cabang ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<!--====== End Bank ======-->

<?= $this->endSection() ?>