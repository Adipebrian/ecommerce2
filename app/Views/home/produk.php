<?= $this->extend('layout/home') ?>
<?= $this->section('content') ?>
<!--====== Info Halaman ======-->
<div class="parent gr info-hal">
  <div class="link">
    <a href="<?= base_url() ?>">Home</a> /
    <a href="<?= base_url() ?>/home/produk">Produk</a>
  </div>
  <?php if($key): ?>
    <div class="heading"><?= $key ?></div>
    <?php else: ?>
      <div class="heading">Produk</div>
    <?php endif; ?>
</div>
<!--====== End Info Halaman ======-->

<!--====== Product ======-->
<section class="search_produk parent bg-style">
  <div class="heading">
    Filter Data
    <div class="variasi"></div>
  </div>
  <form action="<?= base_url() ?>/home/produk" method="post">
  <?= csrf_field() ?>
    <div class="form-group">
      <div class="group">
        <label for="kategori">Kategori</label>
        <select name="kategori" id="kategori">
          <option value="" selected disabled>-- Select Kategori --</option>
          <?php foreach ($kategori as $k) : ?>
            <option value="<?= $k->kd_cat ?>" <?= ($kd_cat && $kd_cat == $k->kd_cat) ? 'selected' : '' ?>><?= $k->kategori ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="group">
        <label for="jenis">Jenis</label>
        <select name="jenis" id="jenis">
          <option value="" selected disabled>-- Select Jenis --</option>
          <?php foreach ($jenis as $j) : ?>
            <option value="<?= $j->kd_jns ?>" <?= ($kd_jns && $kd_jns == $j->kd_jns) ? 'selected' : '' ?>><?= $j->jns ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <button type="submit" class="btn_submit">
      Search
      <i class="icon_search"></i>
    </button>
  </form>

</section>
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