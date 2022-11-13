<?= $this->extend('layout/home') ?>
<?= $this->section('content') ?>
<!-- Flashdata -->
<div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
<div class="flash-data-warning" data-flashdata="<?= session()->getFlashdata('failed'); ?>"></div>
<!--====== Banner ======-->
<section class="banner">
    <div class="swiper-container">
        <!-- swiper slides -->
        <div class="swiper-wrapper">
            <?php foreach ($banner as $b) : ?>
                <div class="swiper-slide" style="background-image: url(<?= base_url() ?>/assets/img/banner/<?= $b->img ?>)">
                    <h2><?= $b->text ?></h2>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- !swiper slides -->

        <!-- next / prev arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <!-- !next / prev arrows -->

        <!-- pagination dots -->
        <div class="swiper-pagination"></div>
        <!-- !pagination dots -->
    </div>
</section>
<!--====== End Banner ======-->

<!--====== Why Choose Us ======-->
<section class="parent bg-style wcu">
    <div class="box-container">
        <?php foreach ($wcu as $w) : ?>
            <div class="box gr">
                <img src="<?= base_url() ?>/assets/img/wcu/<?= $w->img ?>" alt="cart" />
                <div class="title font2"><?= $w->text ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<!--====== End Why Choose Us ======-->
<!--====== Product ======-->
<section class="produk parent bg-style">
    <div class="heading">
        Produk Terlaris
        <div class="variasi"></div>
    </div>
    <div class="boxContainer">
    <?php if($laris): ?>
    <?php foreach ($laris as $b) : ?>
      <a href="<?= base_url() ?>/home/detail/<?= $b->kode ?>" class="box">
        <img src="<?= base_url() ?>/assets/img/barang/<?= $b->image1 ?>" alt="" />
        <div class="title"><?= $b->nm_barang ?></div>
        <div class="harga">
          <!-- <div class="disc">Rp. 20.000.000</div> -->
          <div class="netto">Rp. <?= $b->harga ?></div>
        </div>
        <!-- <div class="cart gr">Add Cart <i class="icon_chart"></i></div> -->
      </a>
    <?php endforeach; ?>
    <?php endif; ?>
    </div>
</section>
<!--====== End Product ======-->
<?= $this->endSection() ?>