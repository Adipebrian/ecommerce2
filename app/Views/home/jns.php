<?= $this->extend('layout/home') ?>
<?= $this->section('content') ?>
<!--====== Info Halaman ======-->
<div class="parent gr info-hal">
  <div class="link">
    <a href="<?= base_url() ?>">Home</a> /
    <a href="<?= base_url() ?>/home/produk">Produk</a>
  </div>
      <div class="heading">Jenis</div>
</div>
<!--====== End Info Halaman ======-->

<!--====== Product ======-->
<section class="produk parent bg-style">
  <div class="boxContainer">
    <?php if($barang): ?>
    <?php foreach ($barang as $b) : ?>
      <a href="<?= base_url() ?>/home/detail/<?= $b->kode ?>" class="box">
        <img src="<?= base_url() ?>/assets/img/barang/<?= $b->image ?>" alt="" />
        <div class="title"><?= $b->nm_barang ?></div>
        <div class="harga">
          <!-- <div class="disc">Rp. 20.000.000</div> -->
          <div class="netto">Rp. <?= $b->harga ?></div>
        </div>
        <!-- <div class="cart gr">Add Cart <i class="icon_chart"></i></div> -->
      </a>
    <?php endforeach; ?>
    <?php else: ?>
      <div class="heading">Tidak Ditemukan!</div>
    <?php endif; ?>
  </div>
</section>
<!--====== End Product ======-->
<?= $this->endSection() ?>