<?= $this->extend('layout/home') ?>
<?= $this->section('content') ?>
<!--====== Info Halaman ======-->
<div class="parent gr info-hal">
    <div class="link">
        <a href="<?= base_url() ?>">Home</a> /
        <a href="<?= base_url() ?>/home/kontak">Kontak Kami</a>
    </div>
    <div class="heading">Kontak Kami</div>
</div>
<!--====== End Info Halaman ======-->

<!--====== Kontak ======-->
<section class="kontak parent bg-style">
    <div class="boxContainer">
        <div class="box gr">
            <img src="<?= base_url() ?>/assets/img/send.png" alt="">
            <h2 class="font2">Email</h2>
            <h5><?= $result->email ?></h5>
        </div>
        <div class="box gr">
            <img src="<?= base_url() ?>/assets/img/contact.png" alt="">
            <h2 class="font2">No. Whatsapp</h2>
            <h5><?= $result->wa ?></h5>
        </div>
        <div class="box gr">
            <img src="<?= base_url() ?>/assets/img/cs.png" alt="">
            <h2 class="font2">Customer Service</h2>
            <p><?= $result->cs ?></p>
        </div>
    </div>
</section>
<!--====== End Kontak ======-->

<?= $this->endSection() ?>